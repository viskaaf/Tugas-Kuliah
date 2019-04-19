-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Apr 2019 pada 12.24
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
(1, 'tugaskuliah473@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_fakultasprodi`
--

CREATE TABLE `detail_fakultasprodi` (
  `id_det_fakultasprodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_fakultasprodi`
--

INSERT INTO `detail_fakultasprodi` (`id_det_fakultasprodi`, `id_fakultas`, `id_prodi`, `createDtm`, `updateDtm`) VALUES
(1, 1, 1, '2018-08-05 19:30:22', '2018-08-05 17:22:30'),
(2, 2, 2, '2018-08-09 11:34:22', '2018-08-09 09:22:34'),
(3, 2, 3, '2018-08-09 11:45:22', '2018-08-09 09:22:45'),
(4, 2, 4, '2018-08-09 11:58:22', '2018-08-09 09:22:58'),
(5, 3, 5, '2018-08-09 11:57:24', '2018-08-09 09:24:57'),
(6, 4, 6, '2018-08-09 11:54:27', '2018-08-09 09:27:54'),
(7, 5, 7, '2018-08-18 10:34:31', '2018-08-18 08:31:34'),
(8, 6, 8, '2018-09-10 00:43:12', '2018-09-09 22:12:43'),
(9, 6, 9, '2018-09-10 00:53:12', '2018-09-09 22:12:53'),
(10, 6, 10, '2018-09-10 00:04:13', '2018-09-09 22:13:04'),
(11, 6, 11, '2018-09-10 00:14:13', '2018-09-09 22:13:14'),
(12, 6, 12, '2018-09-10 00:24:13', '2018-09-09 22:13:24'),
(13, 7, 13, '2018-09-10 00:46:13', '2018-09-09 22:13:46'),
(14, 7, 14, '2018-09-10 00:02:14', '2018-09-09 22:14:02'),
(15, 7, 15, '2018-09-10 00:13:14', '2018-09-09 22:14:13'),
(16, 7, 16, '2018-09-10 00:26:14', '2018-09-09 22:14:26'),
(17, 7, 17, '2018-09-10 00:36:14', '2018-09-09 22:14:36'),
(18, 8, 18, '2018-09-10 00:58:14', '2018-09-09 22:14:58'),
(19, 9, 19, '2018-09-10 00:15:15', '2018-09-09 22:15:15'),
(20, 10, 20, '2018-09-10 00:32:15', '2018-09-09 22:15:32'),
(21, 11, 21, '2018-09-26 18:47:44', '2018-09-26 16:44:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_univfakultas`
--

CREATE TABLE `detail_univfakultas` (
  `id_det_univfakultas` int(11) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_univfakultas`
--

INSERT INTO `detail_univfakultas` (`id_det_univfakultas`, `id_univ`, `id_fakultas`, `createDtm`, `updateDtm`) VALUES
(1, 1, 1, '2018-08-05 19:15:22', '2018-08-05 17:22:15'),
(2, 1, 2, '2018-08-09 11:04:21', '2018-08-09 09:21:04'),
(3, 1, 3, '2018-08-09 11:46:24', '2018-08-09 09:24:46'),
(4, 1, 4, '2018-08-09 11:51:26', '2018-08-09 09:26:51'),
(5, 1, 5, '2018-08-13 10:36:37', '2018-08-13 08:37:36'),
(6, 2, 6, '2018-09-10 00:31:11', '2018-09-09 22:11:31'),
(7, 2, 7, '2018-09-10 00:49:11', '2018-09-09 22:11:49'),
(8, 2, 8, '2018-09-10 00:00:12', '2018-09-09 22:12:00'),
(9, 2, 9, '2018-09-10 00:18:12', '2018-09-09 22:12:18'),
(10, 2, 10, '2018-09-10 00:28:12', '2018-09-09 22:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `id_user`, `createDtm`, `updateDtm`) VALUES
(1, '987654', 2, NULL, '0000-00-00 00:00:00'),
(2, '912345', 1, NULL, '0000-00-00 00:00:00'),
(3, '11019288', 17, NULL, '0000-00-00 00:00:00'),
(4, '99999999', 7, NULL, '0000-00-00 00:00:00'),
(5, '3456987654', 19, NULL, '0000-00-00 00:00:00'),
(6, '987654', 25, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `status_fakultas` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `status_fakultas`, `createDtm`, `updateDtm`) VALUES
(1, 'Biologi', 'Aktif', '2018-08-05 19:14:22', '2018-08-05 17:22:14'),
(2, 'Ekonomika dan Bisnis', 'Aktif', '2018-08-09 11:04:21', '2018-08-09 09:21:04'),
(3, 'Farmasi', 'Aktif', '2018-08-09 11:46:24', '2018-08-09 09:24:46'),
(4, 'Filsafat', 'Aktif', '2018-08-09 11:51:26', '2018-08-09 09:26:51'),
(5, 'Geografi', 'Aktif', '2018-08-13 10:36:37', '2018-08-13 08:37:36'),
(6, 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'Aktif', '2018-09-10 00:31:11', '2018-09-09 22:11:31'),
(7, 'Fakultas Teknik', 'Aktif', '2018-09-10 00:49:11', '2018-09-09 22:11:49'),
(8, 'Fakultas Kedokteran', 'Aktif', '2018-09-10 00:00:12', '2018-09-09 22:12:00'),
(9, 'Fakultas Kedokteran Gigi', 'Aktif', '2018-09-10 00:18:12', '2018-09-09 22:12:18'),
(10, 'Fakultas Farmasi', 'Aktif', '2018-09-10 00:28:12', '2018-09-09 22:12:28'),
(11, 'Fakultas Teknik', 'Aktif', '2018-09-26 18:30:44', '2018-09-26 16:44:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_essay`
--

CREATE TABLE `jawaban_essay` (
  `id_jawaban_essay` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `id_soal_essay` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jawaban_essay`
--

INSERT INTO `jawaban_essay` (`id_jawaban_essay`, `jawaban`, `path_file`, `id_soal_essay`, `id_mhs`, `createDtm`, `updateDtm`) VALUES
(1, 'ini', '(Rev_2)_Project_Management_Plan_SI__Taaruf_Yuk.pdf', 13, 3, '2019-04-09 21:29:30', '2019-04-10 02:30:29'),
(2, 'jawaban', 'BAB_I.pdf', 22, 3, '2019-04-10 07:43:28', '2019-04-10 12:28:43'),
(3, 'ini jawabannya', '(Rev_2)_Project_Management_Plan_SI__Taaruf_Yuk.pdf', 25, 3, '2019-04-11 03:07:23', '2019-04-11 03:23:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_pilgan`
--

CREATE TABLE `jawaban_pilgan` (
  `id_jawaban_pilgan` int(11) NOT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `status` enum('B','S') DEFAULT NULL,
  `id_soal_pilgan` int(11) DEFAULT NULL,
  `id_mhs` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jawaban_pilgan`
--

INSERT INTO `jawaban_pilgan` (`id_jawaban_pilgan`, `jawaban`, `status`, `id_soal_pilgan`, `id_mhs`, `createDtm`, `updateDtm`) VALUES
(153, 'B', 'S', 29, 5, '2018-12-19 02:22:34', '0000-00-00 00:00:00'),
(243, 'A', 'B', 71, 3, '2019-04-09 05:57:18', '0000-00-00 00:00:00'),
(244, 'A', 'S', 72, 3, '2019-04-09 05:57:18', '0000-00-00 00:00:00'),
(245, 'A', 'S', 73, 3, '2019-04-09 05:57:18', '0000-00-00 00:00:00'),
(246, 'A', 'B', 74, 3, '2019-04-09 05:57:18', '0000-00-00 00:00:00'),
(251, 'A', 'S', 69, 3, '2019-04-09 05:31:30', '0000-00-00 00:00:00'),
(252, 'C', 'S', 70, 3, '2019-04-09 05:31:30', '0000-00-00 00:00:00'),
(253, NULL, 'S', 69, 3, '2019-04-09 21:06:15', '0000-00-00 00:00:00'),
(254, NULL, 'S', 70, 3, '2019-04-09 21:06:15', '0000-00-00 00:00:00'),
(255, 'B', 'B', 75, 3, '2019-04-10 07:26:27', '0000-00-00 00:00:00'),
(256, 'A', 'B', 76, 3, '2019-04-10 07:26:27', '0000-00-00 00:00:00'),
(257, NULL, 'S', 80, 3, '2019-04-11 03:55:21', '0000-00-00 00:00:00'),
(258, NULL, 'S', 81, 3, '2019-04-11 03:55:21', '0000-00-00 00:00:00'),
(259, 'A', 'B', 80, 3, '2019-04-11 03:22:22', '0000-00-00 00:00:00'),
(260, 'B', 'B', 81, 3, '2019-04-11 03:22:22', '0000-00-00 00:00:00'),
(261, 'A', 'B', 60, 3, '2019-04-14 10:42:17', '0000-00-00 00:00:00'),
(262, 'C', 'B', 61, 3, '2019-04-14 10:42:17', '0000-00-00 00:00:00'),
(263, 'C', 'S', 62, 3, '2019-04-14 10:42:17', '0000-00-00 00:00:00'),
(264, 'D', 'B', 63, 3, '2019-04-14 10:42:17', '0000-00-00 00:00:00');

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
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode`, `status_kelas`, `id_det_fakultasprodi`, `id_dosen`, `createDtm`, `updateDtm`) VALUES
(1, 'Biologi A', 'b1li07', 'Aktif', 1, 2, '2018-09-09 21:13:09', '2019-04-04 03:40:43'),
(9, 'Farmasi A', 'yp1bom', 'Aktif', 5, 2, '2018-09-20 00:40:44', '0000-00-00 00:00:00'),
(10, 'Manajemen B1', 'zsfz82', 'Aktif', 4, 2, '2018-09-20 00:36:45', '0000-00-00 00:00:00'),
(11, 'Biologi C', 'z4zqe4', 'Tidak Aktif', 1, 2, '2018-09-20 00:11:46', '2019-03-30 06:28:53'),
(15, 'Kimia A', 'rtw7af', 'Aktif', 17, 1, '2018-10-22 21:34:44', '0000-00-00 00:00:00'),
(16, 'Kimia B', '6aguxw', 'Aktif', 17, 1, '2018-10-23 09:33:11', '0000-00-00 00:00:00'),
(17, 'Kimia C', 'xvw7v9', 'Aktif', 17, 1, '2018-10-23 09:58:33', '0000-00-00 00:00:00'),
(18, 'Kimia D', 'zu2256', 'Aktif', 17, 1, '2018-10-23 09:36:37', '0000-00-00 00:00:00'),
(20, 'Akuntansi B1', 'cy9su4', 'Aktif', 2, 2, '2018-12-19 20:46:25', '0000-00-00 00:00:00'),
(21, 'Filsafat AB', 'nu338k', 'Tidak Aktif', 6, 2, '2018-12-19 20:10:30', '2019-04-02 20:33:03'),
(23, 'Bio2', 'q1m1la', 'Aktif', 1, 2, '2018-12-19 20:07:36', '2019-04-11 02:52:43'),
(24, 'Ekonomi A17', '483ezx', 'Aktif', 3, 2, '2019-02-01 07:43:43', '2019-03-31 00:54:25'),
(25, 'Teknik A', 'up4yx5', 'Aktif', 16, 3, '2019-04-02 10:13:55', '0000-00-00 00:00:00'),
(26, 'ABC', '6pk82z', 'Aktif', 13, 3, '2019-04-02 11:12:04', '0000-00-00 00:00:00'),
(27, 'AB', 'zmcr6v', 'Aktif', 15, 3, '2019-04-02 11:20:08', '0000-00-00 00:00:00'),
(43, 'Algoritma Pemrograman', 'w18xfs', 'Aktif', 3, 2, '2019-04-08 05:38:41', '0000-00-00 00:00:00'),
(45, 'PAPB1', '5gkrp2', 'Aktif', 1, 2, '2019-04-08 07:31:56', '0000-00-00 00:00:00'),
(46, 'Ekonomi', 'apo3sr', 'Aktif', 3, 6, '2019-04-10 14:02:17', '0000-00-00 00:00:00'),
(47, 'coba', 'y3af5e', 'Aktif', 1, 2, '2019-04-11 09:15:04', '0000-00-00 00:00:00'),
(48, 'Ekonomi A', 'st3vf1', 'Aktif', 3, 2, '2019-04-11 10:30:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas_mhs` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_kelas_mhs`, `id_mhs`, `id_kelas`, `createDtm`, `updateDtm`) VALUES
(3, 3, 1, '2018-11-05 13:17:48', '2018-11-05 12:48:17'),
(5, 5, 1, '2018-12-04 09:28:47', '2018-12-04 08:47:28'),
(18, 5, 9, '2019-03-30 00:52:36', '2019-03-29 23:36:52'),
(19, 6, 9, NULL, '2019-03-31 08:38:53'),
(21, 8, 9, NULL, '2019-03-31 08:40:25'),
(28, 3, 9, NULL, '2019-03-31 09:19:02'),
(37, 3, 10, NULL, '2019-04-04 01:13:05'),
(45, 8, 1, NULL, '2019-04-05 04:33:51'),
(82, 6, 1, NULL, '2019-04-08 00:01:26'),
(84, 3, 45, NULL, '2019-04-08 06:01:11'),
(85, 5, 45, NULL, '2019-04-08 06:45:51'),
(86, 3, 46, NULL, '2019-04-10 12:18:44'),
(87, 6, 46, NULL, '2019-04-10 12:18:44'),
(88, 3, 24, '2019-04-11 04:05:37', '2019-04-10 22:52:44'),
(92, 3, 47, NULL, '2019-04-11 02:11:42'),
(94, 3, 23, '2019-04-11 09:46:43', '2019-04-11 02:46:43'),
(95, 3, 48, NULL, '2019-04-11 03:16:24'),
(96, 6, 48, NULL, '2019-04-11 03:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `id_user`, `createDtm`, `updateDtm`) VALUES
(3, '15/386079/SV/09465', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '15/386079/SV/08253', 16, '0000-00-00 00:00:00', '2018-12-17 10:18:17'),
(6, '1234567', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '564356', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '5535638', 11, NULL, '0000-00-00 00:00:00'),
(11, '5678998', 21, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `status_materi` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `path_file`, `status_materi`, `id_kelas`, `createDtm`, `updateDtm`) VALUES
(7, 'Sistem Respirasi', 'doc.pdf', 'Aktif', 1, '2019-02-01 00:27:54', '2019-03-29 20:21:34'),
(8, 'Ekosistem Alam', 'Artikel_11104011.pdf', 'Aktif', 1, '2019-03-29 20:57:53', '2019-04-02 19:30:57'),
(9, 'Materi1', '380446_20171_uts__20171125090353.pdf', 'Aktif', 45, '2019-04-08 00:14:57', '2019-04-08 05:57:14'),
(10, 'ekonomi', '2014-1-00918-SI_Bab1001.pdf', 'Aktif', 46, '2019-04-10 07:41:21', '2019-04-10 12:21:41'),
(11, 'Sistem Pernapasan', '10-37-1-PB.pdf', 'Aktif', 47, '2019-04-11 02:41:28', '2019-04-11 02:28:41'),
(12, 'Materi1', 'Artikel_11104011.pdf', 'Aktif', 48, '2019-04-11 03:34:20', '2019-04-11 03:20:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai` tinyint(3) NOT NULL,
  `status_nilai` enum('Sudah Dinilai','Belum Dinilai','Belum Dikerjakan','Tidak Dikerjakan') NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `status_nilai`, `id_mhs`, `id_tugas`, `createDtm`, `updateDtm`) VALUES
(1, 0, 'Tidak Dikerjakan', 3, 83, '2019-04-10 15:14:47', '2019-04-10 15:14:47'),
(2, 0, 'Tidak Dikerjakan', 5, 83, '2019-04-10 14:59:50', '2019-04-10 09:50:59'),
(3, 0, 'Tidak Dikerjakan', 6, 83, '2019-04-10 14:59:50', '2019-04-10 09:50:59'),
(4, 0, 'Tidak Dikerjakan', 8, 83, '2019-04-10 14:59:50', '2019-04-10 09:50:59'),
(5, 90, 'Sudah Dinilai', 3, 83, '2019-04-10 02:33:26', '2019-04-09 21:26:33'),
(6, 0, 'Tidak Dikerjakan', 3, 125, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(7, 0, 'Tidak Dikerjakan', 5, 125, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(8, 0, 'Tidak Dikerjakan', 3, 126, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(9, 0, 'Tidak Dikerjakan', 5, 126, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(10, 100, 'Sudah Dinilai', 3, 127, '2019-04-10 12:27:26', '2019-04-10 07:26:27'),
(11, 0, 'Tidak Dikerjakan', 6, 127, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(13, 0, 'Tidak Dikerjakan', 6, 128, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(14, 0, 'Belum Dinilai', 3, 128, '2019-04-10 12:28:43', '0000-00-00 00:00:00'),
(15, 0, 'Tidak Dikerjakan', 3, 129, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(16, 0, 'Tidak Dikerjakan', 5, 129, '2019-04-10 19:30:38', '2019-04-10 19:30:38'),
(17, 0, 'Belum Dikerjakan', 3, 130, '2019-04-10 19:19:43', '0000-00-00 00:00:00'),
(18, 0, 'Belum Dikerjakan', 5, 130, '2019-04-10 19:19:43', '0000-00-00 00:00:00'),
(19, 0, 'Belum Dikerjakan', 3, 131, '2019-04-11 02:16:14', '0000-00-00 00:00:00'),
(20, 0, 'Belum Dikerjakan', 3, 132, '2019-04-11 02:45:22', '0000-00-00 00:00:00'),
(21, 0, 'Sudah Dinilai', 3, 133, '2019-04-11 03:22:22', '2019-04-11 03:22:22'),
(22, 0, 'Belum Dikerjakan', 6, 133, '2019-04-11 03:21:17', '0000-00-00 00:00:00'),
(23, 0, 'Belum Dikerjakan', 3, 134, '2019-04-11 03:43:19', '0000-00-00 00:00:00'),
(24, 0, 'Belum Dikerjakan', 6, 134, '2019-04-11 03:43:19', '0000-00-00 00:00:00'),
(25, 90, 'Sudah Dinilai', 3, 134, '2019-04-11 03:23:57', '2019-04-11 03:57:23');

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
(3, 'Kelas kosong hari ini.', 9, '2018-10-22 13:31:14', '2018-10-22 11:14:31'),
(4, 'Saya tidak masuk.', 11, '2018-10-22 15:10:26', '2018-10-22 13:26:10'),
(5, 'Kelas kosong.', 11, '2018-10-22 15:01:27', '2018-10-22 13:27:01'),
(6, 'Kosong', 11, '2018-10-22 15:15:27', '2018-10-22 13:27:15'),
(9, 'Saya tidak bisa datang kelas hari ini.', 15, '2018-10-26 18:46:50', '2018-10-26 16:50:46'),
(10, 'Hari ini kuis. Mohon persiapkan diri dengan baik.', 9, '2018-12-19 21:14:10', '2018-12-19 20:10:14'),
(11, 'Kelas kosong hari ini. Terimakasih', 1, '2018-12-20 11:03:15', '2018-12-20 10:15:03'),
(14, 'Hari ini kuis bab terakhir.', 1, '2018-12-21 11:55:01', '2018-12-21 10:01:55'),
(15, 'Saya terlambat masuk 15 menit.', 1, '2019-03-28 06:19:52', '2019-03-28 05:52:19'),
(16, 'Tugas dikumpulkan diruangan saya. Terimakasih.', 1, '2019-03-28 06:44:52', '2019-03-28 05:52:44'),
(17, 'Ada tugas baru silahkan dikerjakan', 1, '2019-03-30 03:18:55', '2019-03-30 02:55:18'),
(20, 'kerjakan', 10, '2019-04-04 02:34:33', '2019-04-04 00:33:34'),
(21, 'lanjut', 10, '2019-04-04 02:51:34', '2019-04-04 00:34:51'),
(22, 'kosong', 10, '2019-04-04 02:47:39', '2019-04-04 00:39:47'),
(23, 'telat', 10, '2019-04-04 02:20:57', '2019-04-04 00:57:20'),
(24, 'coba', 10, '2019-04-04 02:45:58', '2019-04-04 00:58:45'),
(25, 'coba1', 10, '2019-04-04 02:33:59', '2019-04-04 00:59:33'),
(26, 'coba2', 10, '2019-04-04 03:43:13', '2019-04-04 01:13:43'),
(27, 'coba3', 10, '2019-04-04 03:32:15', '2019-04-04 01:15:32'),
(49, 'Pengumuman', 45, '2019-04-08 07:30:57', '2019-04-08 05:57:30'),
(50, 'kelas kosong hari ini.', 46, '2019-04-10 14:24:19', '2019-04-10 12:19:24'),
(51, 'aaa', 20, '2019-04-11 03:04:49', '2019-04-10 20:49:04'),
(53, 'kelas kosong', 47, '2019-04-11 09:09:29', '2019-04-11 02:29:09'),
(54, 'kelas kosong', 48, '2019-04-11 10:01:21', '2019-04-11 03:21:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `status_prodi` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `status_prodi`, `createDtm`, `updateDtm`) VALUES
(1, 'Biologi', 'Aktif', '2018-08-05 19:30:22', '0000-00-00 00:00:00'),
(2, 'Akuntansi', 'Aktif', '2018-08-09 11:34:22', '0000-00-00 00:00:00'),
(3, 'Ilmu Ekonomi', 'Aktif', '2018-08-09 11:45:22', '0000-00-00 00:00:00'),
(4, 'Manajemen', 'Aktif', '2018-08-09 11:58:22', '0000-00-00 00:00:00'),
(5, 'Farmasi', 'Aktif', '2018-08-09 11:57:24', '0000-00-00 00:00:00'),
(6, 'Filsafat', 'Aktif', '2018-08-09 11:54:27', '0000-00-00 00:00:00'),
(7, 'Geografi', 'Aktif', '2018-08-18 10:34:31', '0000-00-00 00:00:00'),
(8, 'Matematika', 'Aktif', '2018-09-10 00:43:12', '0000-00-00 00:00:00'),
(9, 'Statistika', 'Aktif', '2018-09-10 00:52:12', '0000-00-00 00:00:00'),
(10, 'Aktuaria', 'Aktif', '2018-09-10 00:04:13', '0000-00-00 00:00:00'),
(11, 'Fisika', 'Aktif', '2018-09-10 00:14:13', '0000-00-00 00:00:00'),
(12, 'Kimia', 'Aktif', '2018-09-10 00:24:13', '0000-00-00 00:00:00'),
(13, 'Arsitektur', 'Aktif', '2018-09-10 00:46:13', '0000-00-00 00:00:00'),
(14, 'Arsitektur Interior', 'Aktif', '2018-09-10 00:02:14', '0000-00-00 00:00:00'),
(15, 'Teknik Elektro', 'Aktif', '2018-09-10 00:13:14', '0000-00-00 00:00:00'),
(16, 'Teknik Industri', 'Aktif', '2018-09-10 00:26:14', '0000-00-00 00:00:00'),
(17, 'Teknik Kimia', 'Aktif', '2018-09-10 00:36:14', '0000-00-00 00:00:00'),
(18, 'Pendidikan Dokter', 'Aktif', '2018-09-10 00:58:14', '0000-00-00 00:00:00'),
(19, 'Pendidikan Dokter Gigi', 'Aktif', '2018-09-10 00:15:15', '0000-00-00 00:00:00'),
(20, 'Farmasi', 'Aktif', '2018-09-10 00:32:15', '0000-00-00 00:00:00'),
(21, 'Teknik Sipil', 'Aktif', '2018-09-26 18:47:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_essay`
--

CREATE TABLE `soal_essay` (
  `id_soal_essay` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `status_soal_essay` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal_essay`
--

INSERT INTO `soal_essay` (`id_soal_essay`, `keterangan`, `path_file`, `status_soal_essay`, `id_tugas`, `createDtm`, `updateDtm`) VALUES
(13, 'bbb', 'BAB_I.pdf', 'Aktif', 83, '2019-04-08 05:39:20', '2019-04-08 03:20:39'),
(14, 'zzzzz', '56.pdf', 'Aktif', 85, '2018-11-30 18:22:28', '0000-00-00 00:00:00'),
(21, 'Buat aartikel!', 'Artikel_11104011.pdf', 'Aktif', 122, '2019-04-08 08:32:47', '2019-04-08 06:47:32'),
(22, 'kerjakan', '12349384.pdf', 'Aktif', 128, '2019-04-10 14:15:25', '0000-00-00 00:00:00'),
(23, 'aaa', 'VISKA_AYU_F.pdf', 'Aktif', 130, '2019-04-11 02:29:46', '0000-00-00 00:00:00'),
(24, 'dikerjakan', 'Artikel_11104011.pdf', 'Aktif', 132, '2019-04-11 09:24:26', '0000-00-00 00:00:00'),
(25, 'kerjakan', '10-37-1-PB.pdf', 'Aktif', 134, '2019-04-11 10:03:20', '0000-00-00 00:00:00');

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
  `status_soal_pilgan` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `soal_pilgan`
--

INSERT INTO `soal_pilgan` (`id_soal_pilgan`, `soal_pilgan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci`, `status_soal_pilgan`, `id_tugas`, `createDtm`, `updateDtm`) VALUES
(29, 'Partikel terkecil suatu zat yang tidak dapat dipecah lagi atau dibagi-bagi lagi disebut ...', '', 'Atom', 'Sel', '', '', '', 'A', 'Aktif', 63, '2018-10-22 21:54:56', '2018-10-22 19:56:54'),
(60, 'Enzim yang terdapat di lambung adalah ...', '', 'HCl', 'Ptialin', 'Lipase', 'Tripsin', '', 'A', 'Aktif', 75, '2018-11-26 10:41:27', '2018-11-26 09:27:41'),
(61, 'Saat makan lebih baik mengunyah makanan sebanyak ... kali', '', '20', '25', '32', '31', '', 'C', 'Aktif', 75, '2018-11-26 10:03:29', '2018-11-26 09:29:03'),
(62, 'Lidah bagian belakang berfungsi untuk mengecap rasa ...', '', 'manis', 'pahit', 'asin', 'asam', '', 'B', 'Aktif', 75, '2018-11-26 10:57:29', '2018-11-26 09:29:57'),
(63, 'Bakteri Ecoli berada pada usus ...', '', 'usus halus', 'usus 12 jari', 'usus buntu', 'usus besar', '', 'D', 'Aktif', 75, '2018-11-26 10:20:31', '2018-11-26 09:31:20'),
(67, 'soal1', '', '1', '2', '3', '4', '5', 'A', 'Aktif', 121, '2019-04-08 05:32:49', '2019-04-08 01:29:33'),
(68, 'soal2', NULL, '1', '2', '3', '4', '5', 'B', 'Aktif', 121, '2019-04-08 05:32:49', '2019-04-08 03:49:32'),
(69, 'aaaa', '', 'a', 'b', 'c', 'd', '', 'B', 'Aktif', 123, '2019-04-09 09:55:31', '2019-04-09 07:31:55'),
(70, 'bbb', '', 'a', 'b', 'c', 'd', '', 'A', 'Aktif', 123, '2019-04-09 09:13:32', '2019-04-09 07:32:13'),
(71, 'aaaaaaa', '', 'a', 'a', '', '', '', 'A', 'Aktif', 124, '2019-04-09 10:39:32', '2019-04-09 08:32:39'),
(72, 'bbbbbbbb', '', 'a', 'b', '', '', '', 'B', 'Aktif', 124, '2019-04-09 10:50:32', '2019-04-09 08:32:50'),
(73, 'ccccccc', '', 'e', 'q', '', '', '', 'B', 'Aktif', 124, '2019-04-09 10:00:33', '2019-04-09 08:33:00'),
(74, 'qqqqqqqq', '', 'w', 'e', '', '', '', 'A', 'Aktif', 124, '2019-04-09 10:09:33', '2019-04-09 08:33:09'),
(75, 'aaaaa', '', 'a', 'b', 'c', 'd', '', 'B', 'Aktif', 127, '2019-04-10 14:40:23', '2019-04-10 12:23:40'),
(76, 'bbbb', '', 'a', 'b', 'c', 'd', '', 'A', 'Aktif', 127, '2019-04-10 14:56:23', '2019-04-10 12:23:56'),
(77, 'aaa', NULL, 'a', 'b', 'c', NULL, NULL, 'B', 'Aktif', 129, '2019-04-10 16:02:47', '2019-04-10 14:47:02'),
(78, 'hewan dibawah ini termasuk hewan pemakan ...', 'peternakan-sapi.jpg', 'daging', 'tumbuhan', 'biji', 'segala', '', 'B', 'Aktif', 131, '2019-04-11 09:10:20', '2019-04-11 02:20:10'),
(79, 'hewan pemakan daging adalah', '', 'karnivora', 'herbivora', 'omnivora', 'segala', '', 'A', 'Aktif', 131, '2019-04-11 09:45:20', '2019-04-11 02:20:45'),
(80, 'apakah ini?', '', 'a', 'b', 'c', 'd', '', 'A', 'Aktif', 133, '2019-04-11 10:42:18', '2019-04-11 03:18:42'),
(81, 'ekonomi adalah ...', '', 'a', 'b', 'c', 'd', '', 'B', 'Aktif', 133, '2019-04-11 10:09:19', '2019-04-11 03:19:09');

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
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_tugas`, `tgl_mulai`, `tgl_selesai`, `status_tugas`, `jenis_tugas`, `waktu`, `id_kelas`, `createDtm`, `updateDtm`) VALUES
(63, 'kuis 1', '2018-10-22 00:00:00', '2018-10-23 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 15, '2018-10-22 21:05:55', '0000-00-00 00:00:00'),
(75, 'Kuis Pencernaan', '2018-11-26 00:00:00', '2018-11-28 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-26 10:32:25', '0000-00-00 00:00:00'),
(83, 'Tugas Sistem Respirasi', '2018-11-30 00:00:00', '2018-12-01 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-11-30 18:25:20', '2018-12-06 22:04:39'),
(85, 'tugasss', '2018-11-30 00:00:00', '2018-12-03 00:00:00', 'Aktif', 'Essay', 0, 9, '2018-11-30 18:05:28', '2019-04-03 01:41:15'),
(115, 'coba3', '2019-04-07 00:00:00', '2019-04-07 00:00:00', 'Aktif', 'Essay', 0, 1, '2019-04-07 08:19:03', '0000-00-00 00:00:00'),
(116, 'coba7', '2019-04-07 00:00:00', '2019-04-07 13:13:00', 'Aktif', 'Essay', 0, 1, '2019-04-07 08:06:06', '2019-04-07 06:12:06'),
(117, 'kuis9', '2019-04-07 00:00:00', '2019-04-07 13:22:00', 'Aktif', 'Essay', 0, 1, '2019-04-07 08:59:19', '2019-04-07 06:20:59'),
(121, 'kuis1', '2019-04-08 00:00:00', '2019-04-08 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 43, '2019-04-08 05:08:47', '0000-00-00 00:00:00'),
(122, 'tugas1', '2019-04-08 00:00:00', '2019-04-09 00:00:00', 'Aktif', 'Essay', 0, 45, '2019-04-08 07:11:58', '0000-00-00 00:00:00'),
(123, 'kuis1', '2019-04-09 00:00:00', '2019-04-09 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 45, '2019-04-09 09:11:31', '0000-00-00 00:00:00'),
(124, 'kuis10', '2019-04-09 00:00:00', '2019-04-09 00:00:00', 'Aktif', 'Pilihan Ganda', 240, 45, '2019-04-09 10:26:32', '0000-00-00 00:00:00'),
(125, 'kuis9', '2019-04-10 00:00:00', '2019-04-10 00:00:00', 'Aktif', 'Essay', 0, 45, '2019-04-10 09:15:00', '0000-00-00 00:00:00'),
(126, 'tugas2', '2019-04-10 00:00:00', '2019-04-10 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 45, '2019-04-10 09:40:00', '0000-00-00 00:00:00'),
(127, 'kuis1', '2019-04-10 00:00:00', '2019-04-10 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 46, '2019-04-10 14:44:22', '0000-00-00 00:00:00'),
(128, 'tugas1', '2019-04-10 00:00:00', '2019-04-10 00:00:00', 'Aktif', 'Essay', 0, 46, '2019-04-10 14:45:24', '0000-00-00 00:00:00'),
(129, 'coba', '2019-04-10 00:00:00', '2019-04-10 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 45, '2019-04-10 16:12:21', '0000-00-00 00:00:00'),
(130, 'coba1', '2019-04-11 00:00:00', '2019-04-11 00:00:00', 'Aktif', 'Essay', 0, 45, '2019-04-11 02:19:43', '0000-00-00 00:00:00'),
(131, 'kuis1', '2019-04-11 00:00:00', '2019-04-11 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 47, '2019-04-11 09:16:14', '0000-00-00 00:00:00'),
(132, 'tugas1', '2019-04-11 00:00:00', '2019-04-12 00:00:00', 'Aktif', 'Essay', 0, 47, '2019-04-11 09:45:22', '0000-00-00 00:00:00'),
(133, 'kuis1', '2019-04-11 00:00:00', '2019-04-11 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 48, '2019-04-11 10:21:17', '0000-00-00 00:00:00'),
(134, 'tugas1', '2019-04-11 00:00:00', '2019-04-11 00:00:00', 'Aktif', 'Essay', 0, 48, '2019-04-11 10:43:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id_univ` int(11) NOT NULL,
  `nama_univ` varchar(50) NOT NULL,
  `status_univ` enum('Aktif','Tidak Aktif') NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`id_univ`, `nama_univ`, `status_univ`, `createDtm`, `updateDtm`) VALUES
(1, 'Universitas Gadjah Mada', 'Aktif', '2018-08-05 19:48:21', '0000-00-00 00:00:00'),
(2, 'Universitas Indonesia', 'Aktif', '2018-08-05 19:03:22', '0000-00-00 00:00:00'),
(3, 'Institut Teknologi Bandung', 'Aktif', '2018-08-09 10:57:12', '0000-00-00 00:00:00'),
(4, 'Universitas Padjadjaran', 'Aktif', '2018-08-09 10:39:13', '0000-00-00 00:00:00'),
(5, 'Universitas Sebelas Maret', 'Aktif', '2018-08-09 10:12:15', '0000-00-00 00:00:00'),
(6, 'Universitas Brawijaya', 'Aktif', '2018-08-09 10:05:43', '0000-00-00 00:00:00'),
(7, 'Universitas Diponegoro', 'Aktif', '2018-08-09 10:15:44', '0000-00-00 00:00:00'),
(8, 'Universitas Jakarta', 'Aktif', '2019-04-10 06:57:30', '0000-00-00 00:00:00'),
(9, 'Universitas Yogyakarta', 'Tidak Aktif', '2019-04-10 06:06:33', '2019-04-09 23:16:36'),
(10, 'Institut Pertanian Bogor', 'Aktif', '2019-04-10 06:43:34', '0000-00-00 00:00:00'),
(11, 'Universitas Muhammdiyah Yogyakarta', 'Aktif', '2019-04-10 14:30:30', '0000-00-00 00:00:00'),
(12, 'Universitas Muhammdiyah Yogyakarta', 'Aktif', '2019-04-10 14:30:30', '0000-00-00 00:00:00');

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
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `email`, `password`, `foto_profil`, `status`, `id_userrole`, `id_univ`, `createDtm`, `updateDtm`) VALUES
(1, 'Viska', 'Ayu F', 'Laki-Laki', 'fatchianav@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'user4-128x128.jpg', 'Aktif', 1, 1, '2018-07-30 11:51:29', '2019-04-11 02:13:03'),
(2, 'Bu', 'Kar', 'Perempuan', 'caramelchiato@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 2, '2018-08-02 09:40:10', '2019-03-28 23:47:42'),
(7, 'Budi', 'Yanto', 'Laki-Laki', 'vfatchiana@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, 'Aktif', 1, 1, '2018-10-25 10:28:56', '2019-04-02 23:43:06'),
(10, 'Ani', 'Inawati', 'Perempuan', 'viska.ayu.f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-05 11:23:49', '2018-12-17 08:58:24'),
(11, 'Anto', 'Anti', 'Laki-Laki', 'antoanti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-28 17:01:34', '2019-04-07 20:10:58'),
(12, 'Ana', 'Ani', 'Perempuan', 'ana20@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-28 17:31:42', '2019-04-07 20:11:09'),
(16, 'Hida', 'Hidayati', 'Laki-Laki', 'shou3@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ERD_HERA.jpg', 'Aktif', 2, 1, NULL, '2019-04-07 07:51:34'),
(17, 'Zhel', 'zhel', 'Laki-Laki', 'zhel@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 2, '2019-04-02 10:26:51', '2019-04-02 18:24:19'),
(19, 'shou', 'shou', 'Perempuan', 'shou@yopmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL, 'Belum Aktif', 1, 1, '2019-04-03 01:41:40', '2019-04-10 05:54:35'),
(20, 'coba', 'coba', 'Perempuan', 'shou20@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, NULL, '2019-04-04 10:46:03', '2019-04-04 08:04:15'),
(21, 'Nisa', 'Nis', 'Perempuan', 'nisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2019-04-05 07:18:19', '2019-04-07 20:12:47'),
(22, 'coba', 'coba', 'Laki-Laki', 'annisaduwie@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Belum Aktif', 1, 2, '2019-04-08 05:44:11', '0000-00-00 00:00:00'),
(23, 'Umar', 'Taufiq', 'Laki-Laki', 'umartaufiq8284@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Belum Aktif', 1, 1, '2019-04-08 05:51:36', '0000-00-00 00:00:00'),
(24, 'Irkham', 'Huda', 'Laki-Laki', 'hidaaa@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2019-04-08 08:59:19', '2019-04-08 06:21:07'),
(25, 'Umar', 'Taufiq', 'Laki-Laki', 'umar@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Belum Aktif', 1, 1, '2019-04-10 14:14:14', '2019-04-10 07:25:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_userrole` int(11) NOT NULL,
  `nama_userrole` varchar(30) NOT NULL,
  `createDtm` datetime DEFAULT NULL,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_userrole`, `nama_userrole`, `createDtm`, `updateDtm`) VALUES
(1, 'Dosen', NULL, '0000-00-00 00:00:00'),
(2, 'Mahasiswa', NULL, '0000-00-00 00:00:00');

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
  ADD KEY `id_soal_essay` (`id_soal_essay`),
  ADD KEY `id_mhs` (`id_mhs`);

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
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kelas` (`id_kelas`);

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
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jawaban_essay`
--
ALTER TABLE `jawaban_essay`
  MODIFY `id_jawaban_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  MODIFY `id_jawaban_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id_soal_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id_soal_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
  ADD CONSTRAINT `jawaban_essay_ibfk_1` FOREIGN KEY (`id_soal_essay`) REFERENCES `soal_essay` (`id_soal_essay`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_essay_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  ADD CONSTRAINT `jawaban_pilgan_ibfk_1` FOREIGN KEY (`id_soal_pilgan`) REFERENCES `soal_pilgan` (`id_soal_pilgan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_pilgan_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

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
