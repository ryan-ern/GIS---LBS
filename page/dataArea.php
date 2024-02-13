<?php
include("connection/validate.php");
include("connection/koneksi.php");

if (!isset($_SESSION['role']) && !$_SESSION['role'] == 'admin') {
    header("Location: ./login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $namaFile = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $uploadPath = "./page/data/"; // Specify your upload directory

    if (move_uploaded_file($fileTmpName, $uploadPath . $namaFile)) {
        $query = "INSERT INTO tb_area (`file`) VALUES ('$namaFile')";
        mysqli_query($koneksi, $query);
        header("Location: ?page=Data-Area");
        exit();
    } else {
        echo "File upload failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <h3 class="text-white">DATA AREA INSTALASI</h3>
    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    ?>
        <button type="button" class="btn btn-light bg-white shadow-sm px-3 py-2 mt-3 mb-2 float-left" data-toggle="modal" data-target="#tambahDataModal">
            <i class="bi bi-file-earmark-plus-fill text-primary"></i>
            <small class="text-uppercase font-weight-bold">Tambah Data</small>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="file">Pilih File:</label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="table-responsive">
        <table border="1" width="700px" cellpadding="4" cellspacing="2" class="table table-bordered table-dark table-striped-columns" style="color:black;">
            <thead>
                <tr bgcolor="#808080" align="center">
                    <th>No</th>
                    <th>Nama File</th>
                    <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                    ?>
                        <th>Aksi</th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tb_area ORDER BY id DESC";
                $result = mysqli_query($koneksi, $query);
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <tr bgcolor="white" align="center">
                        <td><?= $no++ ?></td>
                        <td><?= $row['file'] ?></td>
                        <?php
                        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                        ?>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" name="hapus-area">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                endwhile;
                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>