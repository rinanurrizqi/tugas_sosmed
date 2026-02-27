-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2026 pada 08.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_sosmed`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tugas`
--

CREATE TABLE `jadwal_tugas` (
  `id_jadwal` int(11) NOT NULL,
  `hari_jadwal` varchar(20) DEFAULT NULL,
  `jam_jadwal` time DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_instagram` int(11) DEFAULT NULL,
  `detail_tugas_insta` text DEFAULT NULL,
  `id_facebook` int(11) DEFAULT NULL,
  `detail_tugas_fb` text DEFAULT NULL,
  `id_tiktok` int(11) DEFAULT NULL,
  `detail_tugas_tiktok` text DEFAULT NULL,
  `id_email` int(11) DEFAULT NULL,
  `detail_tugas_email` text DEFAULT NULL,
  `id_website` int(11) DEFAULT NULL,
  `detail_tugas_web` text DEFAULT NULL,
  `id_wa` int(11) DEFAULT NULL,
  `detail_tugas_wa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_tugas`
--
ALTER TABLE `jadwal_tugas`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_petugas` (`id_petugas`),
  ADD KEY `fk_instagram` (`id_instagram`),
  ADD KEY `fk_facebook` (`id_facebook`),
  ADD KEY `fk_tiktok` (`id_tiktok`),
  ADD KEY `fk_email` (`id_email`),
  ADD KEY `fk_website` (`id_website`),
  ADD KEY `fk_wa` (`id_wa`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_tugas`
--
ALTER TABLE `jadwal_tugas`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`id_email`) REFERENCES `akun_email` (`id_email`),
  ADD CONSTRAINT `fk_facebook` FOREIGN KEY (`id_facebook`) REFERENCES `akun_facebook` (`id_facebook`),
  ADD CONSTRAINT `fk_instagram` FOREIGN KEY (`id_instagram`) REFERENCES `akun_instagram` (`id_instagram`),
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `data_petugas` (`id_petugas`),
  ADD CONSTRAINT `fk_tiktok` FOREIGN KEY (`id_tiktok`) REFERENCES `akun_tiktok` (`id_tiktok`),
  ADD CONSTRAINT `fk_wa` FOREIGN KEY (`id_wa`) REFERENCES `akun_wa` (`id_wa`),
  ADD CONSTRAINT `fk_website` FOREIGN KEY (`id_website`) REFERENCES `website` (`id_website`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
