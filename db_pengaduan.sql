-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2026 pada 18.03
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
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `status` enum('Menunggu','Proses','Selesai') NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `nis`, `id_kategori`, `lokasi`, `ket`, `status`, `feedback`, `tanggal`) VALUES
(9, 123, 1, 'Ruang RPL', 'aaa', 'Proses', 'sedang ditinjau', '2026-01-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Keamanan'),
(9, 'Alat'),
(10, 'Keamanannnnnnn'),
(11, 'Alat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `kelas`) VALUES
(12, 'fahhhh', 'XI RPL'),
(123, 'fahs', 'XI RPL');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
