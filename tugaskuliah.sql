-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mar 2019 pada 08.26
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
(2, '912345', 1, NULL, '0000-00-00 00:00:00');

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
(1, 'ini jawabannya', '56.pdf', 13, 3, '2018-12-06 09:32:44', '2018-12-06 09:32:44'),
(4, 'Berikut ini jawaban dari soal tersebut', 'Artikel_11104011.pdf', 13, 5, '2018-12-06 05:19:09', '2018-12-06 11:09:19'),
(5, 'Berikut ini jawabannya', '10-37-1-PB.pdf', 14, 6, '2018-12-06 17:19:09', '2018-12-06 23:09:19'),
(6, 'Berikut jawaban', '', 14, 5, '2018-12-19 02:47:35', '2018-12-19 08:35:47');

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
(139, 'A', 'B', 60, 3, '2018-11-26 06:02:07', '2018-12-06 04:44:00'),
(140, 'C', 'B', 61, 3, '2018-11-26 06:02:07', '2018-12-06 04:43:52'),
(141, 'C', 'S', 62, 3, '2018-11-26 06:02:07', '2018-12-06 04:43:45'),
(142, 'C', 'S', 63, 3, '2018-11-26 06:02:07', '2018-12-06 04:43:36'),
(153, 'B', 'S', 29, 5, '2018-12-19 02:22:34', '0000-00-00 00:00:00'),
(155, 'B', 'S', 60, 5, '2018-12-19 02:27:36', '0000-00-00 00:00:00'),
(156, 'B', 'S', 61, 5, '2018-12-19 02:28:36', '0000-00-00 00:00:00'),
(157, 'B', 'B', 62, 5, '2018-12-19 02:28:36', '0000-00-00 00:00:00'),
(158, 'D', 'B', 63, 5, '2018-12-19 02:28:36', '0000-00-00 00:00:00');

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
(1, 'Biologi A', 'b1li07', 'Aktif', 1, 2, '2018-09-09 21:13:09', '0000-00-00 00:00:00'),
(9, 'Farmasi A', 'yp1bom', 'Aktif', 5, 2, '2018-09-20 00:40:44', '0000-00-00 00:00:00'),
(10, 'Manajemen B1', 'zsfz82', 'Aktif', 4, 2, '2018-09-20 00:36:45', '0000-00-00 00:00:00'),
(11, 'Biologi C', 'z4zqe4', 'Tidak Aktif', 1, 2, '2018-09-20 00:11:46', '2018-12-25 09:55:44'),
(12, 'Farmai B', 'dj934f', 'Aktif', 5, 2, '2018-09-20 00:33:46', '0000-00-00 00:00:00'),
(15, 'Kimia A', 'rtw7af', 'Aktif', 17, 1, '2018-10-22 21:34:44', '0000-00-00 00:00:00'),
(16, 'Kimia B', '6aguxw', 'Aktif', 17, 1, '2018-10-23 09:33:11', '0000-00-00 00:00:00'),
(17, 'Kimia C', 'xvw7v9', 'Aktif', 17, 1, '2018-10-23 09:58:33', '0000-00-00 00:00:00'),
(18, 'Kimia D', 'zu2256', 'Aktif', 17, 1, '2018-10-23 09:36:37', '0000-00-00 00:00:00'),
(19, 'serah', 'oiot2r', 'Aktif', 13, 1, '2018-10-23 09:13:40', '0000-00-00 00:00:00'),
(20, 'Akuntansi B1', 'cy9su4', 'Aktif', 2, 2, '2018-12-19 20:46:25', '0000-00-00 00:00:00'),
(21, 'Filsafat AB', 'nu338k', 'Aktif', 6, 2, '2018-12-19 20:10:30', '0000-00-00 00:00:00'),
(22, 'Bio 1', '0ggfpk', 'Aktif', 1, 2, '2018-12-19 20:35:32', '0000-00-00 00:00:00'),
(23, 'Bio2', 'q1m1la', 'Tidak Aktif', 1, 2, '2018-12-19 20:07:36', '2018-12-25 10:24:00'),
(24, 'Ekonomi A17', '483ezx', 'Aktif', 3, 2, '2019-02-01 07:43:43', '0000-00-00 00:00:00'),
(25, 'A', 'z2gbuf', 'Aktif', 13, 2, '2019-03-25 23:35:53', '0000-00-00 00:00:00');

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
(15, 6, 1, NULL, '2019-03-28 23:58:38'),
(16, 7, 1, NULL, '2019-03-28 23:58:58'),
(17, 8, 1, NULL, '2019-03-29 00:01:17'),
(18, 5, 9, '2019-03-30 00:52:36', '2019-03-29 23:36:52');

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
(7, '9876543', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '564356', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(8, 'Ekosistem Alam', 'Artikel_11104011.pdf', 'Aktif', 1, '2019-03-29 20:57:53', '2019-03-29 20:15:54');

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
(29, 50, 3, 75, '2018-11-26 16:24:54', '0000-00-00 00:00:00'),
(38, 70, 5, 83, '2018-12-06 15:35:36', '0000-00-00 00:00:00'),
(40, 100, 6, 85, '2018-12-06 17:24:24', '0000-00-00 00:00:00'),
(41, 0, 5, 63, '2018-12-19 08:34:22', '0000-00-00 00:00:00'),
(42, -100, 5, 63, '2018-12-19 08:35:03', '0000-00-00 00:00:00'),
(43, 50, 5, 75, '2018-12-19 08:36:28', '0000-00-00 00:00:00'),
(44, -200, 5, 63, '2018-12-19 10:27:58', '0000-00-00 00:00:00');

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
(17, 'Ada tugas baru silahkan dikerjakan', 1, '2019-03-30 03:18:55', '2019-03-30 02:55:18');

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
(13, 'kerjakan soal ini yaaaaa', '78-Article_Text-234-1-10-20170518.pdf', 'Aktif', 83, '2018-11-30 18:59:23', '0000-00-00 00:00:00'),
(14, 'zzzzz', '56.pdf', 'Aktif', 85, '2018-11-30 18:22:28', '0000-00-00 00:00:00');

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
(64, 'Hewan pemakan daging adalah ...', NULL, 'Karnivora', 'Herbivora', 'Omnivora', 'Pemakan segala', NULL, 'A', 'Aktif', 90, NULL, '2019-03-27 22:14:01'),
(65, 'Hewan pemakan tumbuhan adalah ...', NULL, 'Omnivora', 'Herbivora', 'Karnivora', 'Pemakan segala', NULL, 'B', 'Aktif', 90, NULL, '2019-03-27 22:15:47');

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
(54, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 9, '2018-10-08 12:43:51', '0000-00-00 00:00:00'),
(55, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 13:02:24', '0000-00-00 00:00:00'),
(56, 'kuis10', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 17:22:24', '0000-00-00 00:00:00'),
(63, 'kuis 1', '2018-10-22 00:00:00', '2018-10-23 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 15, '2018-10-22 21:05:55', '0000-00-00 00:00:00'),
(75, 'Kuis Pencernaan', '2018-11-26 00:00:00', '2018-11-28 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-26 10:32:25', '0000-00-00 00:00:00'),
(83, 'Tugas Sistem Respirasi', '2018-11-30 00:00:00', '2018-12-01 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-11-30 18:25:20', '2018-12-06 22:04:39'),
(85, 'tugasss', '2018-11-30 00:00:00', '2018-12-03 00:00:00', 'Aktif', 'Essay', 0, 9, '2018-11-30 18:05:28', '0000-00-00 00:00:00'),
(89, 'kuis respirasi', '2019-01-08 00:00:00', '2019-01-09 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2019-01-08 19:29:43', '0000-00-00 00:00:00'),
(90, 'Kuis Makhluk Hidup', '2019-03-26 00:00:00', '2019-03-26 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 1, '2019-03-26 01:14:01', '2019-03-29 00:59:20'),
(91, 'kuis coba', '2019-03-26 00:00:00', '2019-03-27 00:00:00', 'Aktif', 'Essay', 0, 1, '2019-03-26 01:21:21', '0000-00-00 00:00:00');

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
(7, 'Universitas Diponegoro', 'Aktif', '2018-08-09 10:15:44', '0000-00-00 00:00:00');

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
(1, 'Viska', 'Ayu F', 'Laki-Laki', 'fatchianav@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user4-128x128.jpg', 'Aktif', 1, 1, '2018-07-30 11:51:29', '2019-03-29 20:13:58'),
(2, 'Bu', 'Kar', 'Perempuan', 'caramelchiato@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 2, '2018-08-02 09:40:10', '2019-03-28 23:47:42'),
(7, 'Budi', 'Yanto', 'Laki-Laki', 'vfatchiana@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', NULL, 'Aktif', 2, 1, '2018-10-25 10:28:56', '2019-03-28 23:59:24'),
(10, 'Ani', 'Inawati', 'Perempuan', 'viska.ayu.f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-05 11:23:49', '2018-12-17 08:58:24'),
(11, 'Anto', 'Anti', 'Laki-Laki', 'anto@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-28 17:01:34', '2019-03-28 23:37:01'),
(12, 'Ana', 'Ani', 'Perempuan', 'ana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, '2018-11-28 17:31:42', '2018-12-06 23:02:10'),
(16, 'Hida', 'Hidayati', 'Laki-Laki', 'hida@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, 1, NULL, '2019-03-29 17:29:57');

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
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_soal_essay` (`id_soal_essay`);

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
  MODIFY `id_jawaban_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  MODIFY `id_jawaban_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id_soal_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id_soal_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
