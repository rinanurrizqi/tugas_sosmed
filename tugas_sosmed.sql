-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2026 pada 03.24
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
-- Struktur dari tabel `akun_facebook`
--

CREATE TABLE `akun_facebook` (
  `id_facebook` varchar(20) NOT NULL,
  `link_facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_instagram`
--

CREATE TABLE `akun_instagram` (
  `id_instagram` varchar(20) NOT NULL,
  `link_instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_instagram`
--

INSERT INTO `akun_instagram` (`id_instagram`, `link_instagram`) VALUES
('IG001', 'https://www.instagram.com/uhsdiwj'),
('IG002', 'https://instagram.com/username');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_tiktok`
--

CREATE TABLE `akun_tiktok` (
  `id_tiktok` varchar(20) NOT NULL,
  `link_tiktok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_wa`
--

CREATE TABLE `akun_wa` (
  `id_wa` varchar(20) NOT NULL,
  `no_wa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_email`
--

CREATE TABLE `alamat_email` (
  `id_email` varchar(20) NOT NULL,
  `alamat_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`) VALUES
('P001', 'rina');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tugas`
--

CREATE TABLE `jadwal_tugas` (
  `id_jadwal` varchar(20) NOT NULL,
  `hari_jadwal` varchar(20) NOT NULL,
  `jam_jadwal` time NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `id_instagram` varchar(20) DEFAULT NULL,
  `detail_tugas_instagram` text DEFAULT NULL,
  `id_facebook` varchar(20) DEFAULT NULL,
  `detail_tugas_facebook` text DEFAULT NULL,
  `id_tiktok` varchar(20) DEFAULT NULL,
  `detail_tugas_tiktok` text DEFAULT NULL,
  `id_email` varchar(20) DEFAULT NULL,
  `detail_tugas_email` text DEFAULT NULL,
  `id_website` varchar(20) DEFAULT NULL,
  `detail_tugas_website` text DEFAULT NULL,
  `id_wa` varchar(20) DEFAULT NULL,
  `detail_tugas_wa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_harian`
--

CREATE TABLE `progress_harian` (
  `id_progress` varchar(20) NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `tanggal_progress` date NOT NULL,
  `progress_tugas_instagram` text DEFAULT NULL,
  `progress_tugas_facebook` text DEFAULT NULL,
  `progress_tugas_tiktok` text DEFAULT NULL,
  `progress_tugas_email` text DEFAULT NULL,
  `progress_tugas_website` text DEFAULT NULL,
  `progress_tugas_wa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` varchar(20) NOT NULL,
  `link_website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_facebook`
--
ALTER TABLE `akun_facebook`
  ADD PRIMARY KEY (`id_facebook`);

--
-- Indeks untuk tabel `akun_instagram`
--
ALTER TABLE `akun_instagram`
  ADD PRIMARY KEY (`id_instagram`);

--
-- Indeks untuk tabel `akun_tiktok`
--
ALTER TABLE `akun_tiktok`
  ADD PRIMARY KEY (`id_tiktok`);

--
-- Indeks untuk tabel `akun_wa`
--
ALTER TABLE `akun_wa`
  ADD PRIMARY KEY (`id_wa`);

--
-- Indeks untuk tabel `alamat_email`
--
ALTER TABLE `alamat_email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indeks untuk tabel `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`);

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
-- Indeks untuk tabel `progress_harian`
--
ALTER TABLE `progress_harian`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `fk_progress_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_tugas`
--
ALTER TABLE `jadwal_tugas`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`id_email`) REFERENCES `alamat_email` (`id_email`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_facebook` FOREIGN KEY (`id_facebook`) REFERENCES `akun_facebook` (`id_facebook`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_instagram` FOREIGN KEY (`id_instagram`) REFERENCES `akun_instagram` (`id_instagram`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `data_petugas` (`id_petugas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tiktok` FOREIGN KEY (`id_tiktok`) REFERENCES `akun_tiktok` (`id_tiktok`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wa` FOREIGN KEY (`id_wa`) REFERENCES `akun_wa` (`id_wa`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_website` FOREIGN KEY (`id_website`) REFERENCES `website` (`id_website`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress_harian`
--
ALTER TABLE `progress_harian`
  ADD CONSTRAINT `fk_progress_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_tugas` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
