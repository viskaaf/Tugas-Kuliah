-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2018 pada 14.42
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
  `jawaban` varchar(255) NOT NULL,
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
(139, 'A', 'B', 60, 3, '2018-11-26 06:02:07', '0000-00-00 00:00:00'),
(140, 'C', 'B', 61, 3, '2018-11-26 06:02:07', '0000-00-00 00:00:00'),
(141, 'C', 'S', 62, 3, '2018-11-26 06:02:07', '0000-00-00 00:00:00'),
(142, 'C', 'S', 63, 3, '2018-11-26 06:02:07', '0000-00-00 00:00:00'),
(149, 'A', 'S', 69, 3, '2018-12-01 21:45:28', '0000-00-00 00:00:00'),
(150, 'A', 'B', 70, 3, '2018-12-01 21:45:28', '0000-00-00 00:00:00'),
(151, 'D', 'S', 69, 5, '2018-12-05 03:03:44', '0000-00-00 00:00:00'),
(152, 'A', 'B', 70, 5, '2018-12-05 03:03:44', '0000-00-00 00:00:00');

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
(20, 'jjjj', '7wnpm9', 'Aktif', 13, 1, '2018-10-23 10:57:53', '0000-00-00 00:00:00', 0);

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
(3, 3, 1, '2018-11-05 13:17:48', '2018-11-05 12:48:17', 0),
(5, 5, 1, '2018-12-04 09:28:47', '2018-12-04 08:47:28', 0);

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
(3, '15/386079/SV/09465', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, '0972646819', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
(32, 50, 3, 88, '2018-12-02 03:28:45', '0000-00-00 00:00:00'),
(34, 0, 3, 83, '2018-12-04 12:10:26', '0000-00-00 00:00:00'),
(35, 50, 5, 88, '2018-12-05 09:44:03', '0000-00-00 00:00:00');

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
(13, 'kerjakan soal ini yaaaaa', '78-Article_Text-234-1-10-20170518.pdf', 83, '2018-11-30 18:59:23', '0000-00-00 00:00:00', 0),
(14, 'zzzzz', '56.pdf', 85, '2018-11-30 18:22:28', '0000-00-00 00:00:00', 0),
(15, 'kerjakan dengan benar', '56.pdf', 80, NULL, '0000-00-00 00:00:00', 0);

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
(29, 'Partikel terkecil suatu zat yang tidak dapat dipecah lagi atau dibagi-bagi lagi disebut ...', '', 'Atom', 'Sel', '', '', '', 'A', 63, '2018-10-22 21:54:56', '2018-10-22 19:56:54', 0),
(60, 'Enzim yang terdapat di lambung adalah ...', '', 'HCl', 'Ptialin', 'Lipase', 'Tripsin', '', 'A', 75, '2018-11-26 10:41:27', '2018-11-26 09:27:41', 0),
(61, 'Saat makan lebih baik mengunyah makanan sebanyak ... kali', '', '20', '25', '32', '31', '', 'C', 75, '2018-11-26 10:03:29', '2018-11-26 09:29:03', 0),
(62, 'Lidah bagian belakang berfungsi untuk mengecap rasa ...', '', 'manis', 'pahit', 'asin', 'asam', '', 'B', 75, '2018-11-26 10:57:29', '2018-11-26 09:29:57', 0),
(63, 'Bakteri Ecoli berada pada usus ...', '', 'usus halus', 'usus 12 jari', 'usus buntu', 'usus besar', '', 'D', 75, '2018-11-26 10:20:31', '2018-11-26 09:31:20', 0),
(69, 'Sapi', NULL, 'Pisces', 'Reptil', 'Aves', 'Mamalia', 'Serangga', 'B', 88, '2018-12-01 10:35:34', '2018-12-01 09:34:35', 0),
(70, 'Burung', NULL, 'Aves', 'Pisces', 'Mamalia', NULL, NULL, 'A', 88, '2018-12-01 10:35:34', '2018-12-01 09:34:35', 0);

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
(54, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 9, '2018-10-08 12:43:51', '0000-00-00 00:00:00', 0),
(55, 'kuis9', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 13:02:24', '0000-00-00 00:00:00', 0),
(56, 'kuis10', '2018-10-08 00:00:00', '2018-10-08 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 9, '2018-10-08 17:22:24', '0000-00-00 00:00:00', 0),
(63, 'kuis 1', '2018-10-22 00:00:00', '2018-10-23 00:00:00', 'Aktif', 'Pilihan Ganda', 120, 15, '2018-10-22 21:05:55', '0000-00-00 00:00:00', 0),
(75, 'Kuis Pencernaan', '2018-11-26 00:00:00', '2018-11-28 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-11-26 10:32:25', '0000-00-00 00:00:00', 0),
(80, 'tugas essay', '2018-11-30 00:00:00', '2018-11-30 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-11-30 17:52:39', '0000-00-00 00:00:00', 0),
(83, 'tugas essayyyyy', '2018-11-30 00:00:00', '2018-12-01 00:00:00', 'Aktif', 'Essay', 0, 1, '2018-11-30 18:25:20', '0000-00-00 00:00:00', 0),
(84, 'tugasss', '2018-11-30 00:00:00', '2018-12-03 00:00:00', 'Aktif', 'Essay', 0, 9, '2018-11-30 18:05:28', '0000-00-00 00:00:00', 0),
(85, 'tugasss', '2018-11-30 00:00:00', '2018-12-03 00:00:00', 'Aktif', 'Essay', 0, 9, '2018-11-30 18:05:28', '0000-00-00 00:00:00', 0),
(88, 'kuis9', '2018-12-01 00:00:00', '2018-12-01 00:00:00', 'Aktif', 'Pilihan Ganda', 60, 1, '2018-12-01 10:24:34', '0000-00-00 00:00:00', 0);

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
(7, 'Budi', 'Yanto', 'Laki-Laki', 'vfatchiana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2018-10-25 10:28:56', '2018-11-05 08:23:59', 0),
(10, 'Ani', 'Inawati', 'Perempuan', 'viska.ayu.f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, NULL, '2018-11-05 11:23:49', '2018-11-05 06:54:47', 0),
(11, 'Anto', 'Anti', 'Laki-Laki', 'anto@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2018-11-28 17:01:34', '0000-00-00 00:00:00', 0),
(12, 'Ana', 'Ani', 'Perempuan', 'ana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2018-11-28 17:31:42', '0000-00-00 00:00:00', 0),
(13, 'Ini', 'Budi', 'Laki-Laki', 'inibudi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 1, 1, '2018-11-28 17:14:44', '0000-00-00 00:00:00', 0),
(16, 'Hida', 'Hidayati', 'Laki-Laki', 'hida@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Aktif', 2, NULL, NULL, '2018-12-04 02:24:29', 0);

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
  MODIFY `id_jawaban_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  MODIFY `id_jawaban_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  MODIFY `id_soal_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `soal_pilgan`
--
ALTER TABLE `soal_pilgan`
  MODIFY `id_soal_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
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
