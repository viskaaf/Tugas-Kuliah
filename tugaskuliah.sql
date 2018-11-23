-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Nov 2018 pada 10.30
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaskuliah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Aktif','Belum Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `status`) VALUES
(1, 'tugaskuliah473@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_fakultasprodi`
--

CREATE TABLE `detail_fakultasprodi` (
  `id_det_fakultasprodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_fakultasprodi`
--

INSERT INTO `detail_fakultasprodi` (`id_det_fakultasprodi`, `id_fakultas`, `id_prodi`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 1, 1, '2018-08-05 19:30:22', '2018-08-05 17:22:30', 0),
(2, 2, 2, '2018-08-09 11:34:22', '2018-08-09 09:22:34', 0),
(3, 2, 3, '2018-08-09 11:45:22', '2018-08-09 09:22:45', 0),
(4, 2, 4, '2018-08-09 11:58:22', '2018-08-09 09:22:58', 0),
(5, 3, 5, '2018-08-09 11:57:24', '2018-08-09 09:24:57', 0),
(6, 4, 6, '2018-08-09 11:54:27', '2018-08-09 09:27:54', 0),
(7, 5, 7, '2018-08-18 10:34:31', '2018-08-18 08:31:34', 0),
(8, 6, 8, '2018-09-10 00:43:12', '2018-09-09 22:12:43', 0),
(9, 6, 9, '2018-09-10 00:53:12', '2018-09-09 22:12:53', 0),
(10, 6, 10, '2018-09-10 00:04:13', '2018-09-09 22:13:04', 0),
(11, 6, 11, '2018-09-10 00:14:13', '2018-09-09 22:13:14', 0),
(12, 6, 12, '2018-09-10 00:24:13', '2018-09-09 22:13:24', 0),
(13, 7, 13, '2018-09-10 00:46:13', '2018-09-09 22:13:46', 0),
(14, 7, 14, '2018-09-10 00:02:14', '2018-09-09 22:14:02', 0),
(15, 7, 15, '2018-09-10 00:13:14', '2018-09-09 22:14:13', 0),
(16, 7, 16, '2018-09-10 00:26:14', '2018-09-09 22:14:26', 0),
(17, 7, 17, '2018-09-10 00:36:14', '2018-09-09 22:14:36', 0),
(18, 8, 18, '2018-09-10 00:58:14', '2018-09-09 22:14:58', 0),
(19, 9, 19, '2018-09-10 00:15:15', '2018-09-09 22:15:15', 0),
(20, 10, 20, '2018-09-10 00:32:15', '2018-09-09 22:15:32', 0),
(21, 11, 21, '2018-09-26 18:47:44', '2018-09-26 16:44:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_univfakultas`
--

CREATE TABLE `detail_univfakultas` (
  `id_det_univfakultas` int(11) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_univfakultas`
--

INSERT INTO `detail_univfakultas` (`id_det_univfakultas`, `id_univ`, `id_fakultas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 1, 1, '2018-08-05 19:15:22', '2018-08-05 17:22:15', 0),
(2, 1, 2, '2018-08-09 11:04:21', '2018-08-09 09:21:04', 0),
(3, 1, 3, '2018-08-09 11:46:24', '2018-08-09 09:24:46', 0),
(4, 1, 4, '2018-08-09 11:51:26', '2018-08-09 09:26:51', 0),
(5, 1, 5, '2018-08-13 10:36:37', '2018-08-13 08:37:36', 0),
(6, 2, 6, '2018-09-10 00:31:11', '2018-09-09 22:11:31', 0),
(7, 2, 7, '2018-09-10 00:49:11', '2018-09-09 22:11:49', 0),
(8, 2, 8, '2018-09-10 00:00:12', '2018-09-09 22:12:00', 0),
(9, 2, 9, '2018-09-10 00:18:12', '2018-09-09 22:12:18', 0),
(10, 2, 10, '2018-09-10 00:28:12', '2018-09-09 22:12:28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `id_user`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, '987654', 2, NULL, '0000-00-00 00:00:00', 0),
(2, '912345', 1, NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `status_fakultas` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `status_fakultas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Biologi', 'Aktif', '2018-08-05 19:14:22', '2018-08-05 17:22:14', 0),
(2, 'Ekonomika dan Bisnis', 'Aktif', '2018-08-09 11:04:21', '2018-08-09 09:21:04', 0),
(3, 'Farmasi', 'Aktif', '2018-08-09 11:46:24', '2018-08-09 09:24:46', 0),
(4, 'Filsafat', 'Aktif', '2018-08-09 11:51:26', '2018-08-09 09:26:51', 0),
(5, 'Geografi', 'Aktif', '2018-08-13 10:36:37', '2018-08-13 08:37:36', 0),
(6, 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'Aktif', '2018-09-10 00:31:11', '2018-09-09 22:11:31', 0),
(7, 'Fakultas Teknik', 'Aktif', '2018-09-10 00:49:11', '2018-09-09 22:11:49', 0),
(8, 'Fakultas Kedokteran', 'Aktif', '2018-09-10 00:00:12', '2018-09-09 22:12:00', 0),
(9, 'Fakultas Kedokteran Gigi', 'Aktif', '2018-09-10 00:18:12', '2018-09-09 22:12:18', 0),
(10, 'Fakultas Farmasi', 'Aktif', '2018-09-10 00:28:12', '2018-09-09 22:12:28', 0),
(11, 'Fakultas Teknik', 'Aktif', '2018-09-26 18:30:44', '2018-09-26 16:44:30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_essay`
--

CREATE TABLE `jawaban_essay` (
  `id_jawaban_essay` int(11) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `id_soal_essay` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_pilgan`
--

CREATE TABLE `jawaban_pilgan` (
  `id_jawaban_pilgan` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `status` enum('B','S') NOT NULL,
  `id_soal_pilgan` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jawaban_pilgan`
--

INSERT INTO `jawaban_pilgan` (`id_jawaban_pilgan`, `jawaban`, `status`, `id_soal_pilgan`, `id_mhs`, `createDtm`, `updateDtm`) VALUES
(1, 'A', 'B', 25, 1, '2018-11-05 03:35:28', '0000-00-00 00:00:00'),
(2, 'A', 'B', 26, 1, '2018-11-05 03:35:28', '0000-00-00 00:00:00'),
(3, 'B', 'B', 27, 1, '2018-11-05 03:35:28', '0000-00-00 00:00:00'),
(4, 'B', 'B', 28, 1, '2018-11-05 03:35:28', '0000-00-00 00:00:00'),
(5, 'A', 'S', 25, 1, '2018-11-05 03:44:43', '0000-00-00 00:00:00'),
(6, 'B', 'S', 26, 1, '2018-11-05 03:44:43', '0000-00-00 00:00:00'),
(7, 'C', 'S', 27, 1, '2018-11-05 03:44:43', '0000-00-00 00:00:00'),
(8, 'B', 'S', 28, 1, '2018-11-05 03:44:43', '0000-00-00 00:00:00'),
(9, 'A', 'S', 25, 1, '2018-11-05 03:16:46', '0000-00-00 00:00:00'),
(10, 'B', 'S', 26, 1, '2018-11-05 03:16:46', '0000-00-00 00:00:00'),
(11, 'C', 'B', 27, 1, '2018-11-05 03:16:46', '0000-00-00 00:00:00'),
(12, 'B', 'S', 28, 1, '2018-11-05 03:16:46', '0000-00-00 00:00:00'),
(13, 'B', 'B', 25, 3, '2018-11-05 06:57:49', '0000-00-00 00:00:00'),
(14, 'A', 'B', 26, 3, '2018-11-05 06:57:49', '0000-00-00 00:00:00'),
(15, 'A', 'S', 27, 3, '2018-11-05 06:57:49', '0000-00-00 00:00:00'),
(16, 'C', 'S', 28, 3, '2018-11-05 06:57:49', '0000-00-00 00:00:00'),
(17, 'A', 'B', 30, 1, '2018-11-07 04:49:18', '0000-00-00 00:00:00'),
(18, 'C', 'S', 19, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(19, 'A', 'S', 20, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(20, 'B', 'B', 21, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(21, 'B', 'S', 22, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(22, 'A', 'B', 23, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(23, 'B', 'S', 24, 1, '2018-11-07 05:28:29', '0000-00-00 00:00:00'),
(24, 'B', 'B', 42, 3, '2018-11-18 05:52:10', '0000-00-00 00:00:00'),
(25, 'B', 'B', 42, 3, '2018-11-18 05:50:13', '0000-00-00 00:00:00'),
(26, 'B', 'B', 42, 3, '2018-11-18 05:13:14', '0000-00-00 00:00:00'),
(27, 'B', 'B', 42, 3, '2018-11-18 05:10:18', '0000-00-00 00:00:00'),
(28, 'B', 'B', 42, 3, '2018-11-18 05:22:20', '0000-00-00 00:00:00'),
(29, 'B', 'B', 42, 1, '2018-11-19 03:08:38', '0000-00-00 00:00:00'),
(30, 'B', 'B', 42, 3, '2018-11-19 05:25:31', '0000-00-00 00:00:00'),
(31, 'B', 'B', 42, 3, '2018-11-19 05:19:34', '0000-00-00 00:00:00'),
(32, 'B', 'B', 42, 3, '2018-11-19 05:10:35', '0000-00-00 00:00:00'),
(33, 'B', 'B', 42, 3, '2018-11-19 05:12:36', '0000-00-00 00:00:00'),
(34, 'B', 'B', 42, 3, '2018-11-19 05:08:39', '0000-00-00 00:00:00'),
(35, 'B', 'B', 42, 3, '2018-11-19 05:27:40', '0000-00-00 00:00:00'),
(36, 'C', 'S', 42, 3, '2018-11-19 05:07:43', '0000-00-00 00:00:00'),
(37, 'B', 'B', 42, 3, '2018-11-19 05:09:45', '0000-00-00 00:00:00'),
(38, 'A', 'S', 42, 3, '2018-11-19 05:52:46', '0000-00-00 00:00:00'),
(39, 'B', 'B', 42, 3, '2018-11-19 05:25:50', '0000-00-00 00:00:00'),
(40, 'A', 'S', 42, 3, '2018-11-19 05:13:51', '0000-00-00 00:00:00'),
(41, 'D', 'S', 42, 3, '2018-11-19 05:47:53', '0000-00-00 00:00:00'),
(42, 'B', 'S', 30, 3, '2018-11-19 05:37:56', '0000-00-00 00:00:00'),
(43, 'A', 'B', 30, 3, '2018-11-19 05:00:57', '0000-00-00 00:00:00'),
(44, 'B', 'B', 42, 3, '2018-11-19 05:43:57', '0000-00-00 00:00:00'),
(45, 'B', 'B', 42, 3, '2018-11-19 05:46:58', '0000-00-00 00:00:00'),
(46, 'B', 'B', 42, 3, '2018-11-19 05:42:59', '0000-00-00 00:00:00'),
(47, 'B', 'B', 42, 3, '2018-11-19 06:43:00', '0000-00-00 00:00:00'),
(48, 'B', 'B', 42, 3, '2018-11-19 06:03:01', '0000-00-00 00:00:00'),
(49, 'B', 'B', 42, 3, '2018-11-19 06:23:01', '0000-00-00 00:00:00'),
(50, 'B', 'B', 42, 3, '2018-11-19 06:56:01', '0000-00-00 00:00:00'),
(51, 'B', 'B', 42, 3, '2018-11-19 06:51:13', '0000-00-00 00:00:00'),
(52, 'B', 'B', 42, 3, '2018-11-19 06:09:14', '0000-00-00 00:00:00'),
(53, 'B', 'B', 42, 3, '2018-11-19 06:26:14', '0000-00-00 00:00:00'),
(54, 'B', 'S', 1, 3, '2018-11-19 06:33:15', '0000-00-00 00:00:00'),
(55, 'B', 'B', 1, 3, '2018-11-19 06:54:21', '0000-00-00 00:00:00'),
(56, 'A', 'B', 12, 3, '2018-11-19 06:45:23', '0000-00-00 00:00:00'),
(57, 'B', 'S', 1, 3, '2018-11-19 06:35:25', '0000-00-00 00:00:00'),
(58, 'B', 'S', 1, 3, '2018-11-19 06:44:26', '0000-00-00 00:00:00'),
(59, 'A', 'B', 12, 3, '2018-11-19 06:39:27', '0000-00-00 00:00:00'),
(60, 'A', 'B', 12, 3, '2018-11-19 06:18:28', '0000-00-00 00:00:00'),
(61, 'B', 'S', 1, 3, '2018-11-19 06:49:31', '0000-00-00 00:00:00'),
(62, 'A', 'B', 3, 3, '2018-11-19 06:49:31', '0000-00-00 00:00:00'),
(63, 'A', 'B', 12, 3, '2018-11-19 06:49:31', '0000-00-00 00:00:00'),
(64, 'B', 'S', 19, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(65, 'A', 'S', 20, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(66, 'B', 'B', 21, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(67, 'A', 'B', 22, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(68, 'A', 'B', 23, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(69, 'A', 'B', 24, 3, '2018-11-19 06:22:33', '0000-00-00 00:00:00'),
(70, 'A', 'S', 13, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(71, 'B', 'S', 14, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(72, 'A', 'B', 15, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(73, 'B', 'B', 16, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(74, 'A', 'S', 17, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(75, 'B', 'S', 18, 3, '2018-11-19 06:06:36', '0000-00-00 00:00:00'),
(76, 'B', 'B', 31, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(77, 'B', 'B', 32, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(78, 'A', 'S', 33, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(79, 'A', 'S', 34, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(80, 'B', 'B', 35, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(81, 'B', 'B', 36, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(82, 'A', 'S', 37, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(83, 'A', 'S', 38, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(84, 'B', 'B', 39, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(85, 'B', 'B', 40, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(86, 'A', 'S', 41, 3, '2018-11-19 06:08:38', '0000-00-00 00:00:00'),
(87, 'B', 'B', 31, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(88, 'B', 'B', 32, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(89, 'B', 'B', 33, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(90, 'B', 'B', 34, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(91, 'B', 'B', 35, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(92, 'B', 'B', 36, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(93, 'B', 'B', 37, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(94, 'B', 'B', 38, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(95, 'B', 'B', 39, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(96, 'D', 'S', 40, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(97, 'C', 'S', 41, 3, '2018-11-20 04:04:26', '0000-00-00 00:00:00'),
(98, 'A', 'B', 57, 3, '2018-11-20 04:40:31', '0000-00-00 00:00:00'),
(99, 'B', 'B', 58, 3, '2018-11-20 04:40:31', '0000-00-00 00:00:00'),
(100, 'B', 'S', 59, 3, '2018-11-20 04:40:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `status_kelas` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_det_fakultasprodi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode`, `status_kelas`, `id_det_fakultasprodi`, `id_dosen`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Biologi A', 'b1li07', 'Aktif', 1, 2, '2018-09-09 21:13:09', '0000-00-00 00:00:00', 0),
(9, 'Farmasi A', 'yp1bom', 'Aktif', 5, 2, '2018-09-20 00:40:44', '0000-00-00 00:00:00', 0),
(10, 'Manajemen B1', 'zsfz82', 'Aktif', 4, 2, '2018-09-20 00:36:45', '0000-00-00 00:00:00', 0),
(11, 'Biologi C', 'z4zqe4', 'Aktif', 1, 2, '2018-09-20 00:11:46', '0000-00-00 00:00:00', 0),
(12, 'Farmai B', 'dj934f', 'Aktif', 5, 2, '2018-09-20 00:33:46', '0000-00-00 00:00:00', 0),
(15, 'Kimia A', 'rtw7af', 'Aktif', 17, 1, '2018-10-22 21:34:44', '0000-00-00 00:00:00', 0),
(16, 'Kimia B', '6aguxw', 'Aktif', 17, 1, '2018-10-23 09:33:11', '0000-00-00 00:00:00', 0),
(17, 'Kimia C', 'xvw7v9', 'Aktif', 17, 1, '2018-10-23 09:58:33', '0000-00-00 00:00:00', 0),
(18, 'Kimia D', 'zu2256', 'Aktif', 17, 1, '2018-10-23 09:36:37', '0000-00-00 00:00:00', 0),
(19, 'serah', 'oiot2r', 'Aktif', 13, 1, '2018-10-23 09:13:40', '0000-00-00 00:00:00', 0),
(20, 'jjjj', '7wnpm9', 'Aktif', 13, 1, '2018-10-23 10:57:53', '0000-00-00 00:00:00', 0),
(21, 'dsad', '4f3632', 'Aktif', 13, 1, '2018-10-23 10:25:56', '0000-00-00 00:00:00', 0),
(22, 'ddd', '5dtg7a', 'Aktif', 10, 1, '2018-10-23 10:51:57', '0000-00-00 00:00:00', 0),
(23, 'uuuuu', 'zj8c6u', 'Aktif', 14, 1, '2018-10-23 11:41:04', '0000-00-00 00:00:00', 0),
(28, 'aaaaaaaaa', 'w1li2l', 'Aktif', 15, 1, '2018-10-23 11:02:22', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas_mhs` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_kelas_mhs`, `id_mhs`, `id_kelas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 1, 1, '2018-10-24 16:29:26', '2018-10-24 14:26:29', 0),
(3, 3, 1, '2018-11-05 13:17:48', '2018-11-05 12:48:17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createDtm` datetime NOT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `id_user`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, '15/386079/SV/09465', 4, '0000-00-00 00:00:00', '2018-10-24 13:16:59', 0),
(3, '15/386079/SV/09465', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `id_mhs`, `id_tugas`, `createDtm`, `updateDtm`) VALUES
(1, -100, 3, 70, '2018-11-19 11:50:25', '0000-00-00 00:00:00'),
(2, -200, 3, 70, '2018-11-19 11:51:14', '0000-00-00 00:00:00'),
(3, -300, 3, 70, '2018-11-19 11:53:47', '0000-00-00 00:00:00'),
(4, 0, 3, 64, '2018-11-19 11:56:37', '0000-00-00 00:00:00'),
(5, 0, 3, 64, '2018-11-19 11:57:00', '0000-00-00 00:00:00'),
(6, 0, 3, 70, '2018-11-19 11:57:43', '0000-00-00 00:00:00'),
(7, 0, 3, 70, '2018-11-19 11:58:46', '0000-00-00 00:00:00'),
(8, 55, 3, 69, '2018-11-19 12:38:08', '0000-00-00 00:00:00'),
(9, 36, 3, 69, '2018-11-20 10:26:04', '0000-00-00 00:00:00'),
(10, 67, 3, 74, '2018-11-20 10:31:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `pengumuman` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `createDtm` datetime NOT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `pengumuman`, `id_kelas`, `createDtm`, `updateDtm`) VALUES
(1, 'Halo', 1, '2018-10-21 15:41:41', '2018-10-21 13:41:41'),
(2, 'Hai', 1, '2018-10-21 16:47:15', '2018-10-21 14:15:47'),
(3, 'Kelas kosong hari ini.', 9, '2018-10-22 13:31:14', '2018-10-22 11:14:31'),
(4, 'Saya tidak masuk.', 11, '2018-10-22 15:10:26', '2018-10-22 13:26:10'),
(5, 'Kelas kosong.', 11, '2018-10-22 15:01:27', '2018-10-22 13:27:01'),
(6, 'Kosong', 11, '2018-10-22 15:15:27', '2018-10-22 13:27:15'),
(7, 'Libur', 1, '2018-10-22 15:28:27', '2018-10-22 13:27:28'),
(8, 'Saya terlambat', 1, '2018-10-18 00:00:00', '2018-10-26 16:33:34'),
(9, 'Saya tidak bisa datang kelas hari ini.', 15, '2018-10-26 18:46:50', '2018-10-26 16:50:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `status_prodi` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `status_prodi`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Biologi', 'Aktif', '2018-08-05 19:30:22', '0000-00-00 00:00:00', 0),
(2, 'Akuntansi', 'Aktif', '2018-08-09 11:34:22', '0000-00-00 00:00:00', 0),
(3, 'Ilmu Ekonomi', 'Aktif', '2018-08-09 11:45:22', '0000-00-00 00:00:00', 0),
(4, 'Manajemen', 'Aktif', '2018-08-09 11:58:22', '0000-00-00 00:00:00', 0),
(5, 'Farmasi', 'Aktif', '2018-08-09 11:57:24', '0000-00-00 00:00:00', 0),
(6, 'Filsafat', 'Aktif', '2018-08-09 11:54:27', '0000-00-00 00:00:00', 0),
(7, 'Geografi', 'Aktif', '2018-08-18 10:34:31', '0000-00-00 00:00:00', 0),
(8, 'Matematika', 'Aktif', '2018-09-10 00:43:12', '0000-00-00 00:00:00', 0),
(9, 'Statistika', 'Aktif', '2018-09-10 00:52:12', '0000-00-00 00:00:00', 0),
(10, 'Aktuaria', 'Aktif', '2018-09-10 00:04:13', '0000-00-00 00:00:00', 0),
(11, 'Fisika', 'Aktif', '2018-09-10 00:14:13', '0000-00-00 00:00:00', 0),
(12, 'Kimia', 'Aktif', '2018-09-10 00:24:13', '0000-00-00 00:00:00', 0),
(13, 'Arsitektur', 'Aktif', '2018-09-10 00:46:13', '0000-00-00 00:00:00', 0),
(14, 'Arsitektur Interior', 'Aktif', '2018-09-10 00:02:14', '0000-00-00 00:00:00', 0),
(15, 'Teknik Elektro', 'Aktif', '2018-09-10 00:13:14', '0000-00-00 00:00:00', 0),
(16, 'Teknik Industri', 'Aktif', '2018-09-10 00:26:14', '0000-00-00 00:00:00', 0),
(17, 'Teknik Kimia', 'Aktif', '2018-09-10 00:36:14', '0000-00-00 00:00:00', 0),
(18, 'Pendidikan Dokter', 'Aktif', '2018-09-10 00:58:14', '0000-00-00 00:00:00', 0),
(19, 'Pendidikan Dokter Gigi', 'Aktif', '2018-09-10 00:15:15', '0000-00-00 00:00:00', 0),
(20, 'Farmasi', 'Aktif', '2018-09-10 00:32:15', '0000-00-00 00:00:00', 0),
(21, 'Teknik Sipil', 'Aktif', '2018-09-26 18:47:44', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_essay`
--

CREATE TABLE `soal_essay` (
  `id_soal_essay` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal_essay`
--

INSERT INTO `soal_essay` (`id_soal_essay`, `keterangan`, `path_file`, `id_tugas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'bv', '', 30, '2018-09-19 07:10:46', '2018-09-19 05:46:10', 0),
(2, 's', 'Surat_Komitmen.pdf', 30, '2018-09-19 09:42:02', '0000-00-00 00:00:00', 0),
(3, 'kerjakan', 'manual_ujian_online.pdf', 30, '2018-09-19 18:59:36', '0000-00-00 00:00:00', 0),
(4, 'b', 'manual_ujian_online.pdf', 30, '2018-09-19 18:15:38', '0000-00-00 00:00:00', 0),
(5, 'kerjain', 'manual_ujian_online.pdf', 32, '2018-09-19 23:40:17', '0000-00-00 00:00:00', 0),
(6, 'd', 'manual_ujian_online.pdf', 35, '2018-09-19 23:16:20', '0000-00-00 00:00:00', 0),
(7, 'kerjakan', 'Surat_Komitmen.pdf', 32, '2018-09-26 20:50:05', '0000-00-00 00:00:00', 0),
(8, 'kerjakan', 'Surat_Komitmen.pdf', 32, '2018-09-26 20:27:06', '0000-00-00 00:00:00', 0),
(9, 'kerjakan', 'Surat_Komitmen.pdf', 32, '2018-09-26 20:56:06', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_pilgan`
--

CREATE TABLE `soal_pilgan` (
  `id_soal_pilgan` int(11) NOT NULL,
  `soal_pilgan` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `pil_a` varchar(255) NOT NULL,
  `pil_b` varchar(255) NOT NULL,
  `pil_c` varchar(255) DEFAULT NULL,
  `pil_d` varchar(255) DEFAULT NULL,
  `pil_e` varchar(255) DEFAULT NULL,
  `kunci` varchar(255) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `soal_pilgan`
--

INSERT INTO `soal_pilgan` (`id_soal_pilgan`, `soal_pilgan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci`, `id_tugas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Hewan pemakan daging adalah ...', '', 'karnivora', 'herbivora', 'omnivora', '', '', 'A', 57, '2018-10-08 18:58:04', '2018-10-08 16:26:48', 0),
(3, 'Termasuk hewan apakah sapi?', 'sapi.JPG', 'mamalia', 'ikan', 'serangga', 'burung', NULL, 'A', 57, NULL, '2018-10-11 11:44:49', 0),
(12, 'jkn', NULL, 'jk', 'oij', NULL, NULL, NULL, 'A', 57, NULL, '2018-10-12 10:56:46', 0),
(13, 'heq', '', 'vu', 'bh', '', '', '', 'B', 60, '2018-10-12 15:39:34', '2018-10-12 13:34:39', 0),
(14, 'bhef', '', 'ygd', 'ydw', '', '', '', 'A', 60, '2018-10-12 15:10:35', '2018-10-12 13:35:10', 0),
(15, 'gavduw', '', 'jkf', 'ef', '-', '-', '-', 'A', 60, '2018-10-12 15:02:37', '2018-10-12 13:37:02', 0),
(16, 'bfe', '', 'jbewf', 'efw', '-', '-', '-', 'B', 60, '2018-10-12 15:32:38', '2018-10-12 13:38:32', 0),
(17, 'qek', '', 'f', 'vf', '-', '-', '-', 'C', 60, '2018-10-12 15:11:39', '2018-10-12 13:39:11', 0),
(18, 'jeq', '', 'ef', 'efbi', '-', '-', '-', 'C', 60, '2018-10-12 15:45:39', '2018-10-12 13:39:45', 0),
(19, 'Ikan bernapas menggunakan ...', '', 'insang', 'paru-paru', 'trakhea', '-', '-', 'A', 61, '2018-10-17 13:11:24', '2018-10-17 12:15:19', 0),
(20, 'Semut bernapas menggunakan ...', 'semut.jpg', 'paru-paru', 'trakhea', '-', '-', '-', 'B', 61, '2018-10-17 13:18:26', '2018-10-17 11:26:18', 0),
(21, 'sapi bernapas menggunakan ...', '', 'hidung', 'paru-paru', 'insang', '', '', 'B', 61, '2018-10-17 14:43:01', '2018-10-17 12:01:43', 0),
(22, 'paus bernapas menggunakan ...', '', 'paru-paru', 'insang', '', '', '', 'A', 61, '2018-10-17 14:53:08', '2018-10-17 12:08:53', 0),
(23, 'kerbau bernapas menggunakan ...', '', 'paru-paru', 'hidung', '', '', '', 'A', 61, '2018-10-17 14:44:21', '2018-10-17 12:21:44', 0),
(24, 'kambing bernapas menggunakan ...', '', 'paru-paru', 'insang', 'hidung', '-', '-', 'A', 61, '2018-10-17 14:56:28', '2018-10-17 12:28:56', 0),
(25, 'Sapi adalah hewan berkaki ...', '', '2', '4', '', '', '', 'B', 62, '2018-10-20 10:53:47', '2018-10-20 08:50:46', 0),
(26, 'Ayam adalah hewan berkaki ...', '', '2', '3', '4', '', '', 'A', 62, '2018-10-20 10:19:48', '2018-10-20 08:48:19', 0),
(27, 'Kucing adalah hewan berkaki ...', '', '3', '2', '4', '1', '', 'C', 62, '2018-10-20 10:51:48', '2018-10-20 08:48:51', 0),
(28, 'Bebek adalah hewan berkaki ...', NULL, '5', '4', '3', '2', '1', 'E', 62, NULL, '2018-10-20 08:59:09', 0),
(29, 'Partikel terkecil suatu zat yang tidak dapat dipecah lagi atau dibagi-bagi lagi disebut ...', '', 'Atom', 'Sel', '', '', '', 'A', 63, '2018-10-22 21:54:56', '2018-10-22 19:56:54', 0),
(30, 'fvgbhnj', '', 'bnm', 'vbn', '', '', '', 'A', 64, '2018-10-26 18:08:46', '2018-10-26 16:46:08', 0),
(31, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 13:59:35', '2018-11-11 12:35:59', 0),
(32, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 13:04:51', '2018-11-11 12:51:04', 0),
(33, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 13:44:55', '2018-11-11 12:55:44', 0),
(34, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:03:03', '2018-11-11 13:03:03', 0),
(35, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:59:03', '2018-11-11 13:03:59', 0),
(36, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:47:08', '2018-11-11 13:08:47', 0),
(37, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:47:08', '2018-11-11 13:08:47', 0),
(38, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:25:10', '2018-11-11 13:10:25', 0),
(39, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:19:12', '2018-11-11 13:12:19', 0),
(40, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', NULL, 'B', 69, '2018-11-11 14:14:29', '2018-11-11 13:29:14', 0),
(41, 'Termasuk binatang apakah buaya itu?', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', 'Serangga', 'B', 69, '2018-11-11 14:10:37', '2018-11-11 13:37:10', 0),
(42, 'Buaya', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', 'Serangga', 'B', 70, '2018-11-11 15:56:00', '2018-11-11 14:00:56', 0),
(57, 'Pemakan', '', 'Karnivora', 'Herbivora', 'Omnivora', '', '', 'A', 74, '2018-11-20 11:40:29', '2018-11-20 10:29:40', 0),
(58, 'Pemakan tumbuhan', '', 'Karnivora', 'Herbirova', 'Omnivora', '', '', 'B', 74, '2018-11-20 11:20:30', '2018-11-20 10:30:20', 0),
(59, 'Pemakan segala', '', 'Karnivora', 'Herbivora', 'Omnivora', '', '', 'C', 74, '2018-11-20 11:50:30', '2018-11-20 10:30:50', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status_tugas` enum('Aktif','Tidak Aktif') NOT NULL,
  `jenis_tugas` enum('Pilihan Ganda','Essay') NOT NULL,
  `waktu` int(5) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `tgl_mulai`, `tgl_selesai`, `status_tugas`, `jenis_tugas`, `waktu`, `id_kelas`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(30, 'tugas', '2018-09-10 00:00:00', '2018-09-12 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-09-10 16:06:49', '2018-09-12 12:02:14', 0),
(31, 'quiz', '2018-09-15 00:00:00', '2018-09-16 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-14 19:36:33', '0000-00-00 00:00:00', 0),
(32, 'tugas1', '2018-09-18 00:00:00', '2018-09-19 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-09-17 19:31:07', '0000-00-00 00:00:00', 0),
(35, 'tugas3', '2018-09-19 00:00:00', '2018-09-20 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-09-19 18:16:49', '0000-00-00 00:00:00', 0),
(40, 'quiz1', '2018-09-26 00:00:00', '2018-09-27 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 17:31:57', '0000-00-00 00:00:00', 0),
(41, 'quiz2', '2018-09-26 00:00:00', '2018-09-27 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 20:34:13', '0000-00-00 00:00:00', 0),
(42, 'quiz3', '2018-09-26 00:00:00', '2018-09-28 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 20:14:21', '0000-00-00 00:00:00', 0),
(43, 'quiz_4', '2018-09-26 00:00:00', '2018-09-28 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 20:17:26', '0000-00-00 00:00:00', 0),
(44, 'quiz5', '2018-09-26 00:00:00', '2018-09-28 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 20:23:32', '0000-00-00 00:00:00', 0),
(45, 'quiz6', '2018-09-26 00:00:00', '2018-09-28 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-09-26 22:57:00', '0000-00-00 00:00:00', 0),
(46, 'quiz5', '2018-10-02 00:00:00', '2018-10-02 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-02 12:30:39', '0000-00-00 00:00:00', 0),
(47, 'kuis', '2018-10-02 00:00:00', '2018-10-02 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-02 13:49:02', '0000-00-00 00:00:00', 0),
(48, 'kuis', '2018-10-02 00:00:00', '2018-10-02 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-02 13:25:18', '0000-00-00 00:00:00', 0),
(49, 'kuis1', '2018-10-03 00:00:00', '2018-10-03 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-03 15:37:45', '0000-00-00 00:00:00', 0),
(50, 'kuis9', '2018-10-05 00:00:00', '2018-10-05 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-05 11:35:37', '0000-00-00 00:00:00', 0),
(51, 'kuis20', '2018-10-07 00:00:00', '2018-10-07 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-07 13:44:36', '0000-00-00 00:00:00', 0),
(52, 'kuis22', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 0, 1, '2018-10-08 11:21:21', '0000-00-00 00:00:00', 0),
(53, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-10-08 12:33:50', '0000-00-00 00:00:00', 0),
(54, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 9, '2018-10-08 12:43:51', '0000-00-00 00:00:00', 0),
(55, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 13:02:24', '0000-00-00 00:00:00', 0),
(56, 'kuis10', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 17:22:24', '0000-00-00 00:00:00', 0),
(57, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2018-10-08 18:39:04', '0000-00-00 00:00:00', 0),
(58, 'kuis27', '2018-10-11 00:00:00', '2018-10-11 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2018-10-11 18:25:41', '0000-00-00 00:00:00', 0),
(59, 'kuis9', '2018-10-12 00:00:00', '2018-10-12 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-10-12 12:44:50', '0000-00-00 00:00:00', 0),
(60, 'kuis30', '2018-10-12 00:00:00', '2018-10-12 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2018-10-12 15:15:32', '0000-00-00 00:00:00', 0),
(61, 'kuis41', '2018-10-17 00:00:00', '2018-10-17 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2018-10-17 13:34:19', '0000-00-00 00:00:00', 0),
(62, 'kuis42', '2018-10-20 00:00:00', '2018-10-20 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2018-10-20 10:03:47', '0000-00-00 00:00:00', 0),
(63, 'kuis 1', '2018-10-22 00:00:00', '2018-10-23 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 15, '2018-10-22 21:05:55', '0000-00-00 00:00:00', 0),
(64, 'kuis50', '2018-10-26 00:00:00', '2018-10-26 00:00:00', 'Aktif', 'Pilihan Ganda', 1, 1, '2018-10-26 18:49:45', '2018-10-30 10:51:08', 0),
(69, 'kuis9', '2018-11-11 00:00:00', '2018-11-11 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-11 12:26:41', '0000-00-00 00:00:00', 0),
(70, 'kuis9', '2018-11-11 00:00:00', '2018-11-11 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-11 15:40:00', '0000-00-00 00:00:00', 0),
(74, 'kuis20', '2018-11-20 00:00:00', '2018-11-20 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-20 11:12:29', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id_univ` int(11) NOT NULL,
  `nama_univ` varchar(50) NOT NULL,
  `status_univ` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id_univ`, `nama_univ`, `status_univ`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Universitas Gadjah Mada', 'Aktif', '2018-08-05 19:48:21', '0000-00-00 00:00:00', 0),
(2, 'Universitas Indonesia', 'Aktif', '2018-08-05 19:03:22', '0000-00-00 00:00:00', 0),
(3, 'Institut Teknologi Bandung', 'Aktif', '2018-08-09 10:57:12', '0000-00-00 00:00:00', 0),
(4, 'Universitas Padjadjaran', 'Aktif', '2018-08-09 10:39:13', '0000-00-00 00:00:00', 0),
(5, 'Universitas Sebelas Maret', 'Aktif', '2018-08-09 10:12:15', '0000-00-00 00:00:00', 0),
(6, 'Universitas Brawijaya', 'Aktif', '2018-08-09 10:05:43', '0000-00-00 00:00:00', 0),
(7, 'Universitas Diponegoro', 'Aktif', '2018-08-09 10:15:44', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Belum Aktif') NOT NULL,
  `id_userrole` int(11) NOT NULL,
  `id_univ` int(11) DEFAULT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `email`, `password`, `foto_profil`, `status`, `id_userrole`, `id_univ`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Viska', 'Ayu F', 'Laki-Laki', 'fatchianav@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user4-128x128.jpg', 'Aktif', 1, 1, '2018-07-30 11:51:29', '2018-09-19 00:52:30', 0),
(2, 'Bu', 'Kar', 'Perempuan', 'caramelchiato@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Aktif', 1, 2, '2018-08-02 09:40:10', '2018-09-17 15:24:52', 0),
(4, 'Pansy', 'Sy', 'Perempuan', 'pansy.stuff@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'food1.jpg', 'Aktif', 2, NULL, '2018-08-10 23:01:09', '2018-10-27 12:08:42', 0),
(7, 'Budi', 'Yanto', 'Laki-Laki', 'vfatchiana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2018-10-25 10:28:56', '2018-11-05 08:23:59', 0),
(10, 'Ani', 'Inawati', 'Perempuan', 'viska.ayu.f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, NULL, '2018-11-05 11:23:49', '2018-11-05 06:54:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_userrole` int(11) NOT NULL,
  `nama_userrole` varchar(30) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_userrole`, `nama_userrole`, `createDtm`, `updateDtm`, `isDeleted`) VALUES
(1, 'Dosen', NULL, '0000-00-00 00:00:00', 0),
(2, 'Mahasiswa', NULL, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_fakultasprodi`
--
ALTER TABLE `detail_fakultasprodi`
  ADD PRIMARY KEY (`id_det_fakultasprodi`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `detail_univfakultas`
--
ALTER TABLE `detail_univfakultas`
  ADD PRIMARY KEY (`id_det_univfakultas`),
  ADD KEY `id_univ` (`id_univ`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jawaban_essay`
--
ALTER TABLE `jawaban_essay`
  ADD PRIMARY KEY (`id_jawaban_essay`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `jawaban_essay_ibfk_1` (`id_soal_essay`);

--
-- Indexes for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  ADD PRIMARY KEY (`id_jawaban_pilgan`),
  ADD KEY `id_soal_pilgan` (`id_soal_pilgan`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_det_fakultasprodi` (`id_det_fakultasprodi`);

--
-- Indexes for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD PRIMARY KEY (`id_kelas_mhs`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `soal_essay`
--
ALTER TABLE `soal_essay`
  ADD PRIMARY KEY (`id_soal_essay`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  ADD PRIMARY KEY (`id_soal_pilgan`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_univ`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `userrole_ibfk_1` (`id_userrole`),
  ADD KEY `id_univ` (`id_univ`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_userrole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_fakultasprodi`
--
ALTER TABLE `detail_fakultasprodi`
  MODIFY `id_det_fakultasprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `detail_univfakultas`
--
ALTER TABLE `detail_univfakultas`
  MODIFY `id_det_univfakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jawaban_essay`
--
ALTER TABLE `jawaban_essay`
  MODIFY `id_jawaban_essay` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  MODIFY `id_jawaban_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id_soal_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id_soal_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_userrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_fakultasprodi`
--
ALTER TABLE `detail_fakultasprodi`
  ADD CONSTRAINT `detail_fakultasprodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_fakultasprodi_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_univfakultas`
--
ALTER TABLE `detail_univfakultas`
  ADD CONSTRAINT `detail_univfakultas_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id_univ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_univfakultas_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_essay`
--
ALTER TABLE `jawaban_essay`
  ADD CONSTRAINT `jawaban_essay_ibfk_1` FOREIGN KEY (`id_soal_essay`) REFERENCES `soal_essay` (`id_soal_essay`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  ADD CONSTRAINT `jawaban_pilgan_ibfk_1` FOREIGN KEY (`id_soal_pilgan`) REFERENCES `soal_pilgan` (`id_soal_pilgan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`id_det_fakultasprodi`) REFERENCES `detail_fakultasprodi` (`id_det_fakultasprodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD CONSTRAINT `kelas_mhs_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_mhs_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_essay`
--
ALTER TABLE `soal_essay`
  ADD CONSTRAINT `soal_essay_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  ADD CONSTRAINT `soal_pilgan_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_userrole`) REFERENCES `user_role` (`id_userrole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id_univ`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
