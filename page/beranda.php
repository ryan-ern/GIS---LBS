<?php
include("../connection/validate.php");
include("../connection/koneksi.php");

if (!isset($_SESSION['role']) && !$_SESSION['role'] == 'admin') {
    header("Location: ./login.php");
    exit();
}
// Query to get filenames from the database
$query = "SELECT file FROM tb_area";
$result = mysqli_query($koneksi, $query);

// Fetch filenames into an array
$filenames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $filenames[] = $row['file'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Sukur Network Indonesia</title>
    <style>
        html,
        body,
        #map {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <!-- Leaflet-KMZ -->
    <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>

    <!-- Boostrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav" id="sidebar">
        <div class="py-2 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <div>
                    <h4 class="m-0">
                        Sukur Network Indonesia
                    </h4>
                </div>
            </div>
        </div>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="./beranda.php" class="nav-link text-dark">
                    <i class="bi bi-house-door-fill mr-3 text-primary fa-fw"></i>
                    Area Instalasi
                </a>
                <hr />
            </li>
            <li class="nav-item">
                <a href="../dashboard.php?page=Peta" class="nav-link text-dark">
                    <i class="bi bi-geo-alt-fill mr-3 text-primary fa-fw"></i>
                    Peta Pemesan
                </a>
                <hr />
            </li>
            <li class="nav-item">
                <a href="../dashboard.php?page=Data-Area" class="nav-link text-dark">
                    <i class="bi bi-journals mr-3 text-primary fa-fw"></i>
                    Data Area Instalasi
                </a>
                <hr />
            </li>
            <li class="nav-item">
                <a href="../dashboard.php?page=Data-Pemesan" class="nav-link text-dark">
                    <i class="bi bi-table mr-3 text-primary fa-fw"></i>
                    Data Pemesan
                </a>
                <hr />
            </li>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            ?>
                <li class="nav-item">
                    <a href="../dashboard.php?page=Data-Pengguna" class="nav-link text-dark">
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
            <a href="./logout.php">
                <button type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4 float-right">
                    <i class="bi bi-door-open-fill text-primary fa-fw"></i>

                    <small class="text-uppercase font-weight-bold">Logout</small>
                </button>
            </a>
        <?php
        }
        ?>
        <div class="col-lg-12">
            <div id="map" style="height: 80vh; border-radius: 20px;" class="shadow"></div>

            <script>
                var map = L.map('map', {
                    preferCanvas: true // recommended when loading large layers.
                });
                map.setView(new L.LatLng(-5.36709878, 105.26142815), 15);

                var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                    maxZoom: 20,
                    attribution: 'Sukur Network Indonesia',
                    opacity: 0.90
                });
                OpenTopoMap.addTo(map);

                // Instantiate KMZ layer (async)
                var kmz = L.kmzLayer().addTo(map);

                kmz.on('load', function(e) {
                    control.addOverlay(e.layer, e.name);
                    // e.layer.addTo(map);
                });
                <?php foreach ($filenames as $filename) : ?>
                    kmz.load('./data/<?= $filename ?>');
                <?php endforeach; ?>


                var control = L.control.layers(null, null, {
                    collapsed: true
                }).addTo(map);
            </script>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="../main.js"></script>
</body>

</html>