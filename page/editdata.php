<?php

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ?page=Data-Pemesan");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #d8e8e6;
        }
    </style>
</head>

<body>
    <h3 class="text-white">EDIT DATA KOORDINAT PEMESAN</h3>
    <form action="?page=Edit-Data" method="POST" class="text-white">
        <?php
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_data WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_assoc($result)) :
        ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group">
                <label for="invoice">Invoice:</label>
                <input type="text" class="form-control" id="invoice" name="invoice" value="<?= $data['invoice'] ?>" readonly>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="status" name="status" value="pending" hidden>
            </div>

            <div class="form-group">
                <label for="Tanggal">Tanggal:</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="Nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nomor">Nomor:</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $data['nomor'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="keterangan">Jenis Pesanan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" readonly><?= $data['alamat'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $data['latitude'] ?>" required>
            </div>

            <div class="form-group">
                <label for="Longitude">Longitude:</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $data['longitude'] ?>" required>
            </div>

            <button type="submit" class="btn btn-success" name="edit">Edit Data</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            <button type="button" class="btn btn-primary" onClick="window.location.href='?page=Data-Pemesan'">Keluar</button>
        <?php
        endwhile;
        mysqli_close($koneksi);
        ?>
    </form>
</body>

</html>