<?php
include("connection/validate.php");
include("connection/koneksi.php");

if (!isset($_SESSION['role'])) {
    header("Location: page/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php
            $title = @$_GET["page"];
            if (!empty($title)) {
                if ($title == "Beranda") {
                    echo "Pantau Longsor Bengkulu";
                } elseif ($title == "Data-Pemesan") {
                    echo "Data Pemesan";
                } elseif ($title == "Data-Pengguna") {
                    echo "Data Pengguna";
                } elseif ($title == "Data-Area") {
                    echo "Data-Area";
                } elseif ($title == "Info-Longsor") {
                    echo "Halaman Info Longsor";
                } elseif ($title == "Peta") {
                    echo "Halaman Peta";
                } elseif ($title == "Tambah-Data") {
                    echo "Halaman Tambah Data";
                } else {
                    echo "404 Not Found";
                }
            } else {
                echo "Pantau Longsor Bengkulu";
            }
            ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-2 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <div class="media-body">
                    <h4 class="m-0">
                        Sukur Network Indonesia
                    </h4>
                </div>
            </div>
        </div>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="./page/beranda.php" class="nav-link text-dark">
                    <i class="bi bi-house-door-fill mr-3 text-primary fa-fw"></i>
                    Area Instalasi
                </a>
                <hr />
            </li>

            <li class="nav-item">
                <a href="?page=Peta" class="nav-link text-dark">
                    <i class="bi bi-geo-alt-fill mr-3 text-primary fa-fw"></i>
                    Peta Pemesan
                </a>
                <hr />
            </li>
            <li class="nav-item">
                <a href="?page=Data-Area" class="nav-link text-dark">
                    <i class="bi bi-journals mr-3 text-primary fa-fw"></i>
                    Data Area Instalasi
                </a>
                <hr />
            </li>
            <li class="nav-item">
                <a href="?page=Data-Pemesan" class="nav-link text-dark">
                    <i class="bi bi-table mr-3 text-primary fa-fw"></i>
                    Data Pemesan
                </a>
                <hr />
            </li>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            ?>
                <li class="nav-item">
                    <a href="?page=Data-Pengguna" class="nav-link text-dark">
                        <i class="bi bi-people-fill mr-3 text-primary fa-fw"></i>
                        Data Pengguna
                    </a>
                    <hr />
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="page-content p-5" id="content" style="background-color: #354b8f; min-height: 100vh;">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
            <i class="bi bi-menu-button-wide-fill text-primary fa-fw"></i>
            <small class="text-uppercase font-weight-bold">Menu</small>
        </button>
        <?php
        if (isset($_SESSION['role'])) {
        ?>
            <a href="page/logout.php">
                <button type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4 float-right">
                    <i class="bi bi-door-open-fill text-primary fa-fw"></i>

                    <small class="text-uppercase font-weight-bold">Logout</small>
                </button>
            </a>
        <?php
        }
        ?>
        <div class="col-lg-12">
            <?php
            $page = @$_GET["page"];
            if (!empty($page)) {
                switch ($page) {
                    case "Peta":
                        include "page/peta.html";
                        break;
                    case "Data-Pemesan":
                        include "page/dataPemesan.php";
                        break;
                    case "Data-Area":
                        include "page/dataArea.php";
                        break;
                    case "Data-Pengguna":
                        include "page/pengguna.php";
                        break;
                    case "Info-Longsor":
                        include "page/info.php";
                        break;
                    case "Tambah-Data":
                        include "page/tambahdata.php";
                        break;
                    case "Edit-Data":
                        include "page/editdata.php";
                        break;
                    case "Edit-Status":
                        include "page/editdatastatus.php";
                        break;
                    default:
                        include "page/404.php";
                        break;
                }
            } else {
                include "page/beranda.php";
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
</body>

</html>