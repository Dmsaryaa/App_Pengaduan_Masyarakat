-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2023 pada 04.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_pengaduan_try`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masyarakar`
--

CREATE TABLE `tbl_masyarakar` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masyarakar`
--

INSERT INTO `tbl_masyarakar` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`, `deleted_at`) VALUES
(1, '1234567891234567', 'masyarakat123', 'masyarakat', '$2y$10$0YbM1BlzNl/PE96sYWxtCe6WwCEPE1gQoXJf589u6iVaI9QT04f8e', '082365984568', NULL),
(2, '1235127283918273', 'Kira', 'kira', '$2y$10$5h3L59i7f5Wpe.1lXDYd4uBqU/jJtS4y6Uj6xv0ptqVYhSztCnCvq', '098372638172', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','Proses','Selesai') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `deleted_at`) VALUES
(1, '2023-02-09', '1234567891234567', 'tes', '1675923290_9b4d08d169b641da171f.png', '0', '2023-02-09 21:16:42'),
(2, '2023-02-09', '1234567891234567', 'tes', '1675923316_7d916e157efc3377be11.png', '0', '2023-02-08 23:15:25'),
(3, '2023-02-09', '1234567891234567', 'tesla', '1675923340_d6d4f14c30b508a57d3e.png', '0', '2023-02-09 23:51:24'),
(4, '2023-02-10', '1234567891234567', 'Tes 3', '1676002102_1434cfe67fffaaf35621.png', '0', '2023-02-09 23:51:20'),
(5, '2023-02-10', '1234567891234567', '4', '1676002930_3021702507b2a8db14cd.png', '0', '2023-02-09 23:51:17'),
(6, '2023-02-10', '1234567891234567', '5', '1676003712_36a8a4b8bd6c5981684c.png', 'Selesai', NULL),
(7, '2023-02-10', '1234567891234567', '6', '1676003903_5d72b719d7ee466e12c9.png', 'Selesai', NULL),
(8, '2023-02-10', '1234567891234567', '7', '1676004002_ac8eadb57079e0ee3807.png', 'Selesai', NULL),
(9, '2023-02-10', '1234567891234567', '8', '1676004259_da0033e0b0bda49a7cc8.png', 'Selesai', NULL),
(10, '2023-02-10', '1234567891234567', 'huhu', '1676007542_804c1bf5ab1ff5f7d2da.png', 'Selesai', NULL),
(11, '2023-02-10', '1234567891234567', 'sa', '1676009270_2619a1e1be2e44678306.png', 'Selesai', NULL),
(12, '2023-02-10', '1234567891234567', 'asasaasasasasasasasa', '1676009700_ab905737884314db90d9', 'Selesai', NULL),
(13, '2023-02-10', '1234567891234567', 'asasaasasasasasasasa', '1676009713_fcb2fdcb68071650a19b.png', 'Selesai', NULL),
(14, '2023-02-10', '1234567891234567', 'one', '1676011898_8e768a8f2ab1c75a58bb.png', 'Selesai', NULL),
(15, '2023-02-10', '1234567891234567', 'two', '1676011908_75b0e31da2fe39cc4114.png', '0', '2023-02-10 04:43:02'),
(16, '2023-02-10', '1234567891234567', 'three', '1676011919_de5124db93e516dd978f.png', '0', '2023-02-10 04:42:59'),
(17, '2023-02-10', '1234567891234567', 'jlideiuifulijkfcjk', '1676015385_54153965a5c7c36d7fbf.png', 'Selesai', NULL),
(18, '2023-02-10', '1234567891234567', 'SS', '1676029127_ae7694af1b2da14cb6f6.jpg', 'Selesai', NULL),
(19, '2023-02-10', '1234567891234567', 'op', '', 'Selesai', NULL),
(20, '2023-02-10', '1234567891234567', 'dscdsdc', '1676030138_d569b6fd1ab91f847ed2.jpg', '0', '2023-02-10 05:04:58'),
(21, '2023-02-10', '1234567891234567', '', '1676030269_bed147a5d4df1361494e.jpg', 'Selesai', NULL),
(22, '2023-02-22', '1234567891234567', 'sasasa', '1677037056_0b7ab4f90a11343d81df.png', 'Selesai', NULL),
(23, '2023-02-22', '1234567891234567', 'popopo', '1677091836_25e4db2229b839ebc280.png', 'Selesai', NULL),
(24, '2023-02-22', '1234567891234567', 'sa', '1677100876_14f026b9146a486532d0.png', 'Selesai', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `deleted_at`) VALUES
(1, 'admin', 'admin', '$2y$10$3JP/AJ2Igyii10f6mjb5jOupr680rAWqrOW1OvhTTGaPXKUIFpdDq', '085632984563', 'admin', NULL),
(2, 'petugas', 'petugas', '$2y$10$VFaEUgKcogatB9XhGNqmTOKbWGKhTNRF818ZECw8tYO6z49ZyUP1a', '085632465987', 'petugas', NULL),
(3, 'tes', 'tes', '$2y$10$yiOVlq51exafRWn8F5u/GO8VE9xlZj5skj8QPZVnECcX2ii1e4Zfm', '123', 'petugas', '2023-02-06 21:22:09'),
(4, 'Asa', 'asa', '$2y$10$bJ0caBn48f3svDp.FwdfJuRjSBtUJd0nM/SaaJvnP/aN23K0dtoo6', '089283718293', 'petugas', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `tgl_tanggapan` date DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tanggapan`
--

INSERT INTO `tbl_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `deleted_at`) VALUES
(1, NULL, NULL, 'selesai', NULL, NULL),
(2, NULL, NULL, 'sa', NULL, NULL),
(3, NULL, NULL, 'asas', NULL, NULL),
(4, NULL, NULL, '4', NULL, NULL),
(5, NULL, '2023-02-10', '5', 1, NULL),
(6, NULL, '2023-02-10', '6', 1, NULL),
(7, NULL, '2023-02-10', '7', 1, NULL),
(8, NULL, '2023-02-10', 's', 1, NULL),
(9, NULL, '2023-02-10', 'as', 1, NULL),
(10, NULL, '2023-02-10', 'sa', 1, NULL),
(11, NULL, '2023-02-10', 'as', 1, NULL),
(12, NULL, '2023-02-10', 'asa\r\n', 1, NULL),
(13, NULL, '2023-02-10', 'as', 1, NULL),
(14, NULL, '2023-02-10', 'sdsdsds\r\n', 1, NULL),
(15, NULL, '2023-02-10', 'asa', 1, NULL),
(16, NULL, '2023-02-10', 'sasa', 1, NULL),
(17, 13, '2023-02-10', 'sasa', 1, NULL),
(18, 12, '2023-02-10', 'ax', 1, NULL),
(19, 0, '2023-02-10', 'asa', 1, NULL),
(20, 0, '2023-02-10', 'sas', 1, NULL),
(21, 11, '2023-02-10', 'ax', 1, NULL),
(22, 10, '2023-02-10', 'adada', 1, NULL),
(23, 9, '2023-02-10', 'sa', 1, NULL),
(24, 8, '2023-02-10', 'a', 1, NULL),
(25, 7, '2023-02-10', 'L,', 1, NULL),
(26, 6, '2023-02-10', 'ds', 1, NULL),
(27, 14, '2023-02-10', 'sa', 1, NULL),
(28, 17, '2023-02-10', 'iyaaa', 2, NULL),
(29, 18, '2023-02-10', 'm', 2, NULL),
(30, 19, '2023-02-10', 'uiknjkn', 2, NULL),
(31, 21, '2023-02-20', 'sasa', 1, NULL),
(32, 0, '2023-02-22', 'sa', 1, NULL),
(33, 22, '2023-02-22', 'lololo', 1, NULL),
(34, 23, '2023-02-22', 'cekkk', 1, NULL),
(35, 24, '2023-02-27', 'testanggapan', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_masyarakar`
--
ALTER TABLE `tbl_masyarakar`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_masyarakar`
--
ALTER TABLE `tbl_masyarakar`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
