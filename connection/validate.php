<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pw = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($user) && !empty($pw)) {
        $user = mysqli_real_escape_string($koneksi, $user);
        $pw = mysqli_real_escape_string($koneksi, $pw);
        $pw = md5($pw);

        $query = "SELECT * FROM tb_login WHERE username='$user' AND password='$pw'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $fetch = mysqli_fetch_array($result);
            if (!empty($fetch['id'])) {
                $_SESSION['id'] = $fetch['id'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['role'] = $fetch['role'];
                header("location: ../page/beranda.php");
                exit;
            } else {
                echo "<script>alert('Username atau Password salah');</script>";
                echo "<script>window.location.href='../page/login.php';</script>";
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}

if (isset($_POST['tambah'])) {
    $invoice = $_POST['invoice'];
    $tgl = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $keterangan = $_POST['keterangan'];
    // $lat = $_POST['latitude'];
    // $long = $_POST['longitude'];

    $query = mysqli_query($koneksi, "INSERT INTO tb_data (invoice, tanggal, nama, email, alamat, nomor, keterangan, latitude, longitude, status) VALUES ('$invoice', '$tgl', '$nama', '$email', '$alamat', '$nomor', '$keterangan', '', '', '-')");
    if ($query) {
        mysqli_close($koneksi);
        echo "<script>alert('Berhasil Tambah Data'); window.location.href = '?page=Data-Pemesan';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Tambah Data');</script>";
    }
}

if (isset($_POST['tambah-pesanan'])) {
    $invoice = $_POST['invoice'];
    $tgl = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $keterangan = $_POST['keterangan'];

    $query = mysqli_query($koneksi, "INSERT INTO tb_data (invoice, tanggal, nama, email, alamat, nomor, keterangan, latitude, longitude, status) VALUES ('$invoice', '$tgl', '$nama', '$email', '$alamat', '$nomor', '$keterangan', '', '', '-')");
    if ($query) {
        mysqli_close($koneksi);
        $whatsappMessage = "Halo, saya ingin melakukan pemesanan dengan detail:\nInvoice: $invoice\nNama: $nama\nTanggal: $tgl\nJenis Layanan: $keterangan\nAlamat: $alamat";

        // Create WhatsApp link
        $whatsappLink = "https://wa.me/+6285609557754/?text=" . urlencode($whatsappMessage);

        echo "<script>alert('Berhasil Tambah Data'); window.location.href = '$whatsappLink';</script>";
        echo "<script>alert('Berhasil Tambah Data'); window.location.href = '../index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Tambah Data');</script>";
    }
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_data WHERE id='$id'");
    mysqli_close($koneksi);
    header("Location: ?page=Data-Pemesan");
}

if (isset($_POST['hapus-area'])) {
    $id = $_POST['id'];

    // Fetch the filename associated with the area
    $query = mysqli_query($koneksi, "SELECT file FROM tb_area WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);
    $filenameToDelete = $row['file'];

    // Delete the area from the database
    mysqli_query($koneksi, "DELETE FROM tb_area WHERE id='$id'");

    // Unlink (delete) the associated file from the server
    $uploadPath = "./page/data/";
    $filePathToDelete = $uploadPath . $filenameToDelete;
    if (file_exists($filePathToDelete)) {
        unlink($filePathToDelete);
    }

    mysqli_close($koneksi);
    header("Location: ?page=Data-Area");
    exit();
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $invoice = $_POST['invoice'];
    $tgl = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $keterangan = $_POST['keterangan'];
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];
    $status = $_POST['status'];

    $query = "UPDATE tb_data SET invoice='$invoice', tanggal='$tgl', nama='$nama', email='$email', alamat='$alamat', nomor='$nomor', status='$status', keterangan='$keterangan', latitude='$lat', longitude='$long' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Berhasil mengedit data'); window.location.href = '?page=Data-Pemesan';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengedit data');</script>";
    }
}

if (isset($_POST['search'])) {
    $searchInvoice = $_POST['searchInvoice'];

    // Query dengan operator LIKE
    $sql = "SELECT * FROM tb_data WHERE invoice LIKE '%$searchInvoice%'";

    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        echo "<h5 class='text-white mt-5'>Hasil Pencarian untuk Invoice: '$searchInvoice'</h5>";
        echo "<table class='table table-bordered table-light'>";
        echo "<thead class='thead-light'>";
        echo "<tr>";
        echo "<th>Invoice</th>";
        echo "<th>Tanggal</th>";
        echo "<th>Jenis Pesanan</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['invoice'] . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='text-white mt-5'>Tidak ada hasil ditemukan.</p>";
    }
}
