<?php

if (!isset($_SESSION['role'])) {
    header("Location: page/login.php");
    exit();
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use a secure hashing algorithm
    $role = $_POST['role'];

    $query = "INSERT INTO tb_login (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        mysqli_close($koneksi);
        echo "<script>
                alert('Tambah Data Pengguna Sukses');
                window.location.href = '?page=Data-Pengguna';
            </script>";
        exit();
    } else {
        echo "<script>
                alert('Failed to register user');
            </script>";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_login WHERE id='$id'");
    mysqli_close($koneksi);
    header("Location: ?page=Data-Pengguna");
    exit();
}

if (isset($_POST['edit-user'])) {
    $id = $_POST['id'];
    $newUsername = $_POST['newUsername'];
    $newRole = $_POST['newRole'];
    $newPassword = md5($_POST['newPassword']); // Use a secure hashing algorithm

    $query = "UPDATE tb_login SET username='$newUsername', role='$newRole', password='$newPassword' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        mysqli_close($koneksi);
        echo "<script>
                alert('User registered successfully');
                window.location.href = '?page=Data-Pengguna';
            </script>";
        exit();
    } else {
        echo "<script>
                alert('Failed to update user');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="mt-2">
        <!-- Registration Form Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registrationModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <input type="text" name="role" value="karyawan" hidden>

                            <button type="submit" class="btn btn-primary" name="register">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-white">Data Pengguna</h2>
        <button type="button" class="btn btn-light bg-white shadow-sm px-3 py-2 mt-3 mb-4 float-left" data-toggle="modal" data-target="#registrationModal">
            <i class="bi bi-file-earmark-plus-fill text-primary"></i>
            <small class="text-uppercase font-weight-bold">Tambah Data</small>
        </button>

        <?php
        $query = "SELECT * FROM tb_login";
        $result = mysqli_query($koneksi, $query);

        if ($result->num_rows > 0) {
            echo '<table border="1" width="700px" cellpadding="4" cellspacing="2" class="table table-bordered table-light table-striped-columns" style="color:black;">';
            echo "<thead class='thead-dark'><tr bgcolor='#808080' align='center'><th>ID</th><th>Username</th><th>Role</th><th>Aksi</th></tr></thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "
                <td>
                <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal{$row['id']}'> <i class='bi bi-trash-fill'></i></button>
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editModal{$row['id']}'><i class='bi bi-pencil'></i></button>
                      </td>";
                echo "</tr>";

                // Edit Modal
                echo "<div class='modal fade' id='editModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel{$row['id']}' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='editModalLabel{$row['id']}'>Edit Pengguna</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <form action='' method='POST'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <div class='form-group'>
                            <label for='newUsername'>Username:</label>
                            <input type='text' class='form-control' name='newUsername' value='{$row['username']}' required>
                        </div>
                        <div class='form-group'>
                              <label for='newRole'>Role:</label>
                        <select class='form-control' name='newRole' required>
                            <option value='admin' " . ($row['role'] == 'admin' ? 'selected' : '') . ">Admin</option>
                            <option value='karyawan' " . ($row['role'] == 'karyawan' ? 'selected' : '') . ">Karyawan</option>
                        </select>
                        </div>
                        <div class='form-group'>
                            <label for='newPassword'>Password:</label>
                            <input type='password' class='form-control' name='newPassword' value='{$row['password']}' required>
                        </div>
                        <button type='submit' class='btn btn-primary' name='edit-user'>Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";

                // Delete Modal
                echo "<div class='modal fade' id='deleteModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel{$row['id']}' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='deleteModalLabel{$row['id']}'>Hapus Pengguna</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    ";

                // Check if the role is not admin before displaying the delete button
                if (
                    $row['role'] != 'admin'
                ) {
                    echo "<form action='' method='POST'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <p>Apakah kamu yakin ingin menghapus data ini?</p>
            <button type='submit' class='btn btn-danger' name='delete'>Hapus</button>
          </form>";
                } else {
                    echo "<p>Akun admin tidak bisa dihapus.</p>";
                }

                echo "</div>
            </div>
        </div>
    </div>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No users found.</p>";
        }

        mysqli_close($koneksi);
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>