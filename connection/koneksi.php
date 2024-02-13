<?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_longsorbengkulu');
    if(!$koneksi){
        die ("Koneksi Database Gagal".mysqli_connect_error());
    }
?>