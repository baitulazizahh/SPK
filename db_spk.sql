-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 01:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_alternatif2` varchar(10) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `id_alternatif2`, `nama_alternatif`) VALUES
(43, 'A01', 'A1'),
(44, 'A02', 'A2'),
(45, 'A03', 'A3'),
(48, 'A04', 'A4'),
(49, 'A05', 'A5'),
(50, 'A06', 'A6'),
(52, 'A07', 'A7'),
(53, 'A08', 'A8'),
(54, 'A09', 'A9'),
(55, 'A10', 'A10'),
(59, 'A11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_permohonan`, `hasil`) VALUES
(121, 27, 0.812788),
(122, 35, 0.788403),
(123, 37, 0.652034),
(124, 30, 0.561348),
(125, 34, 0.543317),
(126, 29, 0.542641),
(127, 28, 0.531119),
(128, 38, 0.52461),
(129, 36, 0.455913),
(130, 33, 0.439758),
(131, 27, 0.812788),
(132, 42, 0.803171),
(133, 35, 0.788403),
(134, 37, 0.652034),
(135, 30, 0.561348),
(136, 34, 0.543317),
(137, 29, 0.542641),
(138, 28, 0.531119),
(139, 38, 0.52461),
(140, 36, 0.455913),
(141, 33, 0.439758),
(142, 27, 0.812788),
(143, 42, 0.803171),
(144, 35, 0.788403),
(145, 37, 0.652034),
(146, 30, 0.561348),
(147, 34, 0.543317),
(148, 29, 0.542641),
(149, 28, 0.531119),
(150, 38, 0.52461),
(151, 36, 0.455913),
(152, 33, 0.439758),
(153, 27, 0.812788),
(154, 42, 0.803171),
(155, 35, 0.788403),
(156, 37, 0.652034),
(157, 30, 0.561348),
(158, 34, 0.543317),
(159, 29, 0.542641),
(160, 28, 0.531119),
(161, 38, 0.52461),
(162, 36, 0.455913),
(163, 45, 0.449377),
(164, 33, 0.439758),
(165, 27, 0.812788),
(166, 35, 0.788403),
(167, 37, 0.652034),
(168, 30, 0.561348),
(169, 34, 0.543317),
(170, 29, 0.542641),
(171, 28, 0.531119),
(172, 38, 0.52461),
(173, 36, 0.455913),
(174, 33, 0.439758);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `jenis_kriteria` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `id_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot`) VALUES
(48, 'K048', 'Jenis usaha', 'Benefit', 0.1),
(49, 'K049', 'Riwayat Bantuan', 'Cost', 0.1),
(50, 'K050', 'Jumlah Tanggungan', 'Benefit', 0.2),
(51, 'K051', 'Pendapatan', 'Cost', 0.3),
(52, 'K052', 'Kelengkapan Persyaratan', 'Benefit', 0.15),
(56, 'K056', 'SKU', 'Benefit', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `id_penerima` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerima`
--

INSERT INTO `tb_penerima` (`id_penerima`, `id_permohonan`, `nik`, `hasil`) VALUES
(1, 27, '1305134402020008', 0.812788),
(2, 42, '', 0.803171),
(3, 35, '', 0.788403),
(4, 37, '', 0.652034),
(5, 30, '', 0.561348),
(6, 34, '', 0.543317),
(7, 29, '', 0.542641),
(8, 28, '', 0.531119),
(9, 38, '', 0.52461),
(10, 36, '', 0.455913),
(11, 42, '1305112402020002', 0.449377),
(12, 33, '', 0.439758);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_permohonan`, `id_kriteria`, `id_subkriteria`, `nilai`, `created_at`) VALUES
(331, 28, 48, 19, 4, '2024-09-04 02:23:50'),
(332, 28, 49, 24, 4, '2024-09-04 02:23:50'),
(333, 28, 50, 29, 3, '2024-09-04 02:23:50'),
(334, 28, 51, 32, 3, '2024-09-04 02:23:50'),
(335, 28, 52, 37, 2, '2024-09-04 02:23:50'),
(336, 28, 56, 39, 4, '2024-09-04 02:23:50'),
(337, 29, 48, 21, 3, '2024-09-04 03:51:14'),
(338, 29, 49, 24, 4, '2024-09-04 03:51:14'),
(339, 29, 50, 46, 1, '2024-09-04 03:51:14'),
(340, 29, 51, 33, 2, '2024-09-04 03:51:14'),
(341, 29, 52, 35, 4, '2024-09-04 03:51:14'),
(342, 29, 56, 39, 4, '2024-09-04 03:51:14'),
(343, 30, 48, 19, 4, '2024-09-04 13:03:21'),
(344, 30, 49, 24, 4, '2024-09-04 13:03:21'),
(345, 30, 50, 29, 3, '2024-09-04 13:03:21'),
(346, 30, 51, 32, 3, '2024-09-04 13:03:21'),
(347, 30, 52, 36, 3, '2024-09-04 13:03:21'),
(348, 30, 56, 39, 4, '2024-09-04 13:03:21'),
(355, 33, 48, 19, 4, '2024-09-05 04:17:42'),
(356, 33, 49, 24, 4, '2024-09-05 04:17:42'),
(357, 33, 50, 46, 1, '2024-09-05 04:17:42'),
(358, 33, 51, 32, 3, '2024-09-05 04:17:42'),
(359, 33, 52, 37, 2, '2024-09-05 04:17:42'),
(360, 33, 56, 39, 4, '2024-09-05 04:17:42'),
(361, 34, 48, 21, 3, '2024-09-07 03:03:57'),
(362, 34, 49, 24, 4, '2024-09-07 03:03:57'),
(363, 34, 50, 29, 3, '2024-09-07 03:03:57'),
(364, 34, 51, 32, 3, '2024-09-07 03:03:57'),
(365, 34, 52, 36, 3, '2024-09-07 03:03:57'),
(366, 34, 56, 39, 4, '2024-09-07 03:03:57'),
(367, 36, 48, 19, 4, '2024-09-07 03:04:57'),
(368, 36, 49, 24, 4, '2024-09-07 03:04:57'),
(369, 36, 50, 29, 3, '2024-09-07 03:04:57'),
(370, 36, 51, 32, 3, '2024-09-07 03:04:57'),
(371, 36, 52, 37, 2, '2024-09-07 03:04:57'),
(372, 36, 56, 40, 1, '2024-09-07 03:04:57'),
(373, 35, 48, 19, 4, '2024-09-07 03:05:20'),
(374, 35, 49, 25, 1, '2024-09-07 03:05:20'),
(375, 35, 50, 28, 4, '2024-09-07 03:05:20'),
(376, 35, 51, 33, 2, '2024-09-07 03:05:20'),
(377, 35, 52, 36, 3, '2024-09-07 03:05:20'),
(378, 35, 56, 39, 4, '2024-09-07 03:05:20'),
(379, 38, 48, 26, 2, '2024-09-07 03:05:41'),
(380, 38, 49, 24, 4, '2024-09-07 03:05:41'),
(381, 38, 50, 46, 1, '2024-09-07 03:05:41'),
(382, 38, 51, 33, 2, '2024-09-07 03:05:41'),
(383, 38, 52, 35, 4, '2024-09-07 03:05:41'),
(384, 38, 56, 39, 4, '2024-09-07 03:05:41'),
(385, 37, 48, 19, 4, '2024-09-07 03:06:04'),
(386, 37, 49, 24, 4, '2024-09-07 03:06:04'),
(387, 37, 50, 29, 3, '2024-09-07 03:06:04'),
(388, 37, 51, 33, 2, '2024-09-07 03:06:04'),
(389, 37, 52, 35, 4, '2024-09-07 03:06:04'),
(390, 37, 56, 39, 4, '2024-09-07 03:06:04'),
(415, 27, 48, 26, 2, '2024-09-27 10:39:26'),
(416, 27, 49, 24, 4, '2024-09-27 10:39:26'),
(417, 27, 50, 28, 4, '2024-09-27 10:39:26'),
(418, 27, 51, 34, 1, '2024-09-27 10:39:26'),
(419, 27, 52, 36, 3, '2024-09-27 10:39:26'),
(420, 27, 56, 39, 4, '2024-09-27 10:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `riwayat_bantuan` varchar(255) NOT NULL,
  `pendapatan` varchar(255) NOT NULL,
  `tanggungan` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` year(4) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `id_user`, `nik`, `nama_usaha`, `riwayat_bantuan`, `pendapatan`, `tanggungan`, `proposal`, `sku`, `kk`, `ktp`, `status`, `created`, `date_created`) VALUES
(27, 33, '1305134402020008', 'Usaha Pertanian/Peternakan', 'Belum pernah', 'Kurang dari Rp 1.000.000', 'Lebih 4 orang', 'Panduan-TA-JSI.pdf', 'Panduan-TA-JSI.pdf', 'logo.png', 'logo.png', 'Diterima', 2023, '2024-09-04 10:20:15'),
(28, 34, '1308114402040007', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Rp 1.000.000 - Kurang dari Rp 1.500.000', '3 orang', 'Panduan-TA-JSI1.pdf', 'Panduan-TA-JSI1.pdf', 'kk.jpg', 'ktp.png', 'Ditolak', 2024, '2024-09-04 10:30:00'),
(29, 31, '1305114402030005', 'Usaha Jasa', 'Belum pernah', 'Rp 1.000.000 - Kurang dari Rp 1.500.000', '1-2 orang', 'Panduan-TA-JSI2.pdf', 'Panduan-TA-JSI2.pdf', 'kk1.jpg', 'ktp1.png', 'Ditolak', 2024, '2024-09-04 10:55:23'),
(30, 32, '1305144402020000', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Rp 1.000.000 - Kurang dari Rp 1.500.000', '1-2 orang', 'Panduan-TA-JSI3.pdf', 'Panduan-TA-JSI3.pdf', 'kk2.jpg', 'ktp2.png', 'Diterima', 2024, '2024-09-04 11:05:43'),
(33, 35, '1305214402030001', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Kurang dari Rp 1.000.000', 'Lebih 4 orang', 'Panduan-TA-JSI6.pdf', 'Panduan-TA-JSI6.pdf', 'kk5.jpg', 'ktp5.png', 'Ditolak', 2024, '2024-09-05 06:12:21'),
(34, 36, '1302114402010009', 'Usaha Jasa', 'Belum pernah', 'Rp 1.000.000 - kurang dari Rp 1.500.000', '1-2 orang', '', '', '', '', 'Diterima', 2024, '2024-09-07 04:48:06'),
(35, 37, '1305114402020004', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Kurang dari Rp 1.000.000', '3 orang', '', '', '', '', 'Diterima', 2024, '2024-09-07 04:51:48'),
(36, 38, '1305114402020002', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Kurang dari Rp 1.000.000', '4 orang', '', '', '', '', 'Ditolak', 2024, '2024-09-07 04:51:48'),
(37, 39, '1305334402020007', 'Usaha Kuliner/Makanan', 'Belum pernah', 'Rp 1.500.000 - kurang dari Rp 2.000.000', 'Lebih 4 orang', 'Panduan-TA-JSI6.pdf', '', '', '', 'Diterima', 2024, '2024-09-07 04:54:01'),
(38, 40, '1307114402040001', 'Usaha Pertanian/Peternakan', 'Belum pernah', 'Rp 1.500.000 - kurang dari Rp 2.000.000', '1-2 orang', '', '', '', '', 'Ditolak', 2024, '2024-09-07 04:54:01'),
(41, 42, '1305114402020003', 'Usaha Jasa', 'Belum pernah', 'Rp 1.500.000 - Kurang dari Rp 2.000.000', '3 orang', 'Panduan-TA-JSI8.pdf', 'Panduan-TA-JSI8.pdf', 'kk7.jpg', 'ktp7.png', 'Diproses', 2024, '2024-09-12 10:40:36'),
(42, 43, '1305112402020002', 'Usaha Kuliner', 'Belum pernah', 'Kurang dari Rp 1.000.000', 'Lebih 4 orang', 'BAB_4_Metode_ARAS_FIX1.pdf', 'BAB_4_Metode_ARAS_FIX.pdf', 'indo.png', 'unnd.png', 'Diterima', 2023, '2023-09-16 13:30:48'),
(45, 44, '1305114402020007', 'Usaha Pertanian/Peternakan', 'Belum pernah', 'Kurang dari Rp 1.000.000', '3 orang', 'proposal2.pdf', 'SKU2.pdf', 'kk10.jpg', 'ktp10.png', 'Ditolak', 2023, '2024-09-23 05:42:29'),
(46, 43, '1305112402020002', 'Usaha Kuliner', 'Sudah Pernah', 'Kurang dari Rp 1.000.000', '3 orang', 'proposal3.pdf', 'SKU3.pdf', 'kk11.jpg', 'ktp11.png', 'Diproses', 2024, '2024-09-23 08:14:11'),
(49, 33, '1305134402020008', 'Usaha Pertanian/Peternakan', 'Sudah Pernah', 'Kurang dari Rp 1.000.000', 'Lebih 4 orang', 'proposal8.pdf', 'SKU8.pdf', 'kk16.jpg', 'ktp16.png', 'Diproses', 2024, '2024-09-27 12:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai`) VALUES
(17, 55, 'Ada', 4),
(19, 48, 'Usaha Kuliner', 4),
(21, 48, 'Usaha Jasa', 3),
(24, 49, 'Belum pernah', 4),
(25, 49, 'Sudah pernah', 1),
(26, 48, 'Usaha Pertanian/Peternakan', 2),
(27, 48, 'Usaha Lainnya', 1),
(28, 50, 'Lebih dari 4 orang', 4),
(29, 50, '4 orang', 3),
(30, 50, ' 3 orang', 2),
(31, 51, 'Kurang dari Rp 1.000.000', 4),
(32, 51, 'Rp 1.000.000 - kurang dari Rp 1.500.000', 3),
(33, 51, 'Rp 1.500.000 - kurang dari Rp 2.000.000', 2),
(34, 51, 'Lebih dari Rp 2.000.000', 1),
(35, 52, 'Sangat lengkap', 4),
(36, 52, 'Lengkap', 3),
(37, 52, 'Kurang lengkap', 2),
(38, 52, 'Tidak lengkap', 1),
(39, 56, 'Ada', 4),
(40, 56, 'Tidak ada', 1),
(46, 50, '1-2 orang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_role`, `nama`, `password`, `email`, `no_hp`, `alamat`, `date_created`) VALUES
(16, 1, 'Baitul Azizah', '$2y$10$.SpET4SFSo6/IQgFddYd4.JRupukQ9nQ3BVTj7rW8facNL6YUZlVq', 'Baitul@gmail.com', '', '', 1722224069),
(31, 2, 'Edwido Pratama', '$2y$10$VqXyOnzqj5LyB3jFaCRQ6.47GCLrbGgyh0sTtoIv7i4petlO5jzy6', 'edwido@gmail.com', '081371295793', 'Pariaman', 1724851233),
(32, 2, 'Nur Syamsi', '$2y$10$IvN01AUR6iSOi0C9PjvJ6OX1m7DtGfq.o/9HztyXxLdrt2SE5wGrK', 'nur@gmail.com', '082174234567', 'Padang', 1724851347),
(33, 2, 'Karmila', '$2y$10$wvb41CpSBg7Ny4qdjT1lOuuLxWs2Yc7g0YjdFRWEjV5LFGV2E7dh6', 'karmila@gmail.com', '087838236789', 'Padang', 1724854910),
(34, 2, 'Nurhayati', '$2y$10$X8YqPqllyqUPrDrTFvu7leXRMuAmTECeH9pyhUZr5fzUCY7DO9WVi', 'nurhayati@gmail.com', '081267483711', 'Pauhhh', 1724855731),
(35, 2, 'Fahraini', '$2y$10$YRQ/wkd1rmn3A6PN4gpPruNtt7jfF7EwR3IRBYHHxoZu.y3J0CHiC', 'fahraini@gmail.com', '0814835840961', 'Batang Anai', 1725422532),
(36, 2, 'Helmi Yanti', '$2y$10$9Yftz5akuPGDOo6RaMKb7enCZgy2f7egQzPP5JpqKiqW4DUBGcVYG', 'helmi@gmail.com', '081327148259', 'Padang', 1725677001),
(37, 2, 'Fitri Mailinda', '$2y$10$tm9OOHLJP8XD0yJdRh1tf.ayr9/m/9uoLLGl4gmGjnkJ2QAzYxfiG', 'fitri@gmail.com', '081375947645', 'Padang', 1725677033),
(38, 2, 'Andi Satria', '$2y$10$5HCKggm/k5XZg2NQUIiqPeMIOh8DJiU.YpPqxuF9Yi6Moryg8YI8S', 'andi@gmail.com', '0812898204935', 'Padang', 1725677063),
(39, 2, 'Ramsini', '$2y$10$bWVWKJCRWKUHwYc1yn6MR.F1tmIw3TM0yvGsjuOpbs.MhzCdlJI0.', 'ramsini@gmail.com', '081312895356', 'Padang', 1725677091),
(40, 2, 'Nuraisyah', '$2y$10$LoCGI/An2uURnjeyOgKhn.6dhCpwVshjP4WxQlLVeYMGoa.M7Unxm', 'nuraisyah@gmail.com', '081247504968', 'Pauh', 1725677141),
(41, 2, 'Yuyu', '$2y$10$Mh7ph/OWWfwM5PgATeDBNOTm1L0yXE7zg/DFMRbQXDv3Sk39C4niu', 'user6@gmail.com', '082819048243', 'Pauh', 1725966149),
(42, 2, 'zeze', '$2y$10$4L/9amqwWT/YkFinDe.ozegmNy.XW/WldAF6gJkb5YeKq18qrK1H6', 'zeze@gmail.com', '0812849883746', 'Pauh', 1726129911),
(43, 2, 'Welly', '$2y$10$oLSzR7Ly3V4JSatOdP91Fu8xEbYHehp.oG3vInWJxobvK9zUj8p3S', 'welly@gmail.com', '081267483712', 'Pauh', 1726816704),
(44, 2, 'Sukma', '$2y$10$iSrFJ2MuOz0xmxVaynbLhuVKD418X7UMreW/A/8qIT5/CsjV4wEAe', 'sukma@gmail.com', '081217729485', 'Pariaman', 1727059438);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
