-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2024 pada 04.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_longsorbengkulu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_area`
--

CREATE TABLE `tb_area` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_area`
--

INSERT INTO `tb_area` (`id`, `file`) VALUES
(10, 'CLR06-02-017_Open Area Labuan Ratu Area Nusantara Sampai Angkasa_KMZ.kmz'),
(11, 'CLR11-99-043_Pudak Tahap 1 Kumpeh Ulu_APD KMZ DISTRIBUSI.kmz'),
(12, 'CLR11-99-046_Pudak Tahap 4 Kumpeh Ulu_APD KMZ DISTRIBUSI.kmz'),
(15, 'SF11-99-031_SF-Desa Kasang Kota Karang_APD KMZ SUBFEEDER.kmz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `keterangan` varchar(500) NOT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `status` enum('-','pending','diproses','sukses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data`
--

INSERT INTO `tb_data` (`id`, `invoice`, `tanggal`, `nama`, `email`, `alamat`, `nomor`, `keterangan`, `latitude`, `longitude`, `status`) VALUES
(44, 'INV-2024021119023', '2024-02-11', 'Muhammad Alvadi', 'muhammadalvadi999@gmail.com', 'Jl. P. Singkep Gg. Perum Asri No. 77 Sukarame, Sukarame Baru, Bandar Lampung, Lampung', '081273376778', 'Instalasi Jaringan Internet', '', '', 'sukses'),
(45, 'INV-2024021120745', '2024-02-11', 'Muhammad Alvadi', 'alvadi@gmail.com', 'jalan pulau sanama', '081273376778', 'Stopping Buckle Clamp', '-5.3802372', '105.2744431', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `role`) VALUES
(12, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(13, 'karyawan', '07142c5501c3ea09303d899012e2b47d', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`invoice`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
