<?php
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';

// Jalankan kueri SQL untuk mengambil data dari tabel
$query = 'SELECT * FROM tb_data';
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Kueri SQL gagal: ' . mysqli_error($koneksi));
}

// Buat array kosong untuk menampung data
$data = array();

// Loop melalui hasil kueri dan tambahkan setiap baris ke array data
while ($row = mysqli_fetch_assoc($result)) {

    // // Menghapus kolom "id"
    // unset($row['id']);

    // Mengubah format tanggal menjadi "Y-m-d"
    $row['tanggal'] = date('Y-m-d', strtotime($row['tanggal']));

    // Menambahkan informasi lainnya ke array data
    $data['type'] = 'FeatureCollection';
    $data['name'] = 'Data_Pemesanan';
    $data['crs'] = array(
        'type' => 'name',
        'properties' => array(
            'name' => 'urn:ogc:def:crs:OGC:1.3:CRS84'
        )
    );

    // Menambahkan data ke array features
    $feature = array(
        'type' => 'Feature',
        'properties' => $row,
        'geometry' => array(
            'type' => 'Point',
            'coordinates' => array($row['longitude'], $row['latitude'])
        )
    );
    $data['features'][] = $feature;
}

// Tutup koneksi database
mysqli_close($koneksi);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo 'var json_Data_Pemesanan = ' . json_encode($data) . ';';
