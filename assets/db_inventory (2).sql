-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2021 pada 03.17
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inventaris`
--

CREATE TABLE `tbl_inventaris` (
  `id_inventaris` char(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jenis_brg` varchar(50) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_register` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_inventaris`
--

INSERT INTO `tbl_inventaris` (`id_inventaris`, `nama_brg`, `jenis_brg`, `kondisi`, `jumlah`, `tgl_register`) VALUES
('IN001', 'iii', 'tt', 'Baik', 6, '2021-03-04'),
('IN002', 'gg', 'ff', 'Baik', 7, '2021-03-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` char(5) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `nama_level`) VALUES
('L0001', 'Administrator'),
('L0002', 'Peminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjam` varchar(30) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_peminjaman` varchar(15) NOT NULL,
  `id_pengguna` char(5) NOT NULL,
  `id_inventaris` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjam`, `tgl_pinjam`, `tgl_kembali`, `jumlah`, `status_peminjaman`, `id_pengguna`, `id_inventaris`) VALUES
('PNJ-20210305035257', '2021-03-05', '2021-03-12', 1, 'Dikembalikan', 'P0002', 'IN001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` char(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_level` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `password`, `nama`, `id_level`) VALUES
('P0001', '123', 'sri', 'L0001'),
('P0002', '123', 'Sri Wulandari', 'L0001'),
('P0004', 'wulandari12', 'tes', 'L0002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_inventaris`
--
ALTER TABLE `tbl_inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`,`id_inventaris`),
  ADD UNIQUE KEY `id_pengguna_2` (`id_pengguna`,`id_inventaris`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD CONSTRAINT `tbl_pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
