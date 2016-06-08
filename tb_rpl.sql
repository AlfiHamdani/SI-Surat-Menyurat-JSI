-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jun 2016 pada 18.43
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tb_rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
`id` int(11) NOT NULL,
  `id_suma` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi_disposisi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tindak_lanjut` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_suke`
--

CREATE TABLE IF NOT EXISTS `jenis_suke` (
`id_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_suke`
--

INSERT INTO `jenis_suke` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Izin mengambil data'),
(2, 'Permohonan Bantuan Dana'),
(3, 'Izin Tidak Mengikuti Perkuliahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
`id_suke` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `no_surat` varchar(50) NOT NULL DEFAULT '',
  `tgl_surat` date DEFAULT NULL,
  `untuk` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `tempat` varchar(20) DEFAULT NULL,
  `dana_bantuan` varchar(20) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `disetujui` enum('0','1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suke`, `id_jenis`, `id_user`, `no_surat`, `tgl_surat`, `untuk`, `perihal`, `keperluan`, `tgl_mulai`, `tgl_akhir`, `tempat`, `dana_bantuan`, `hari`, `waktu`, `disetujui`) VALUES
(1, 1, 2, '1/UN.16.15.5.2/PP/2016', '2016-06-07', 'Staff Pengajar Sistem Informasi', 'Izin Mengambil Data', 'Rekayasa Perangkat Lunak', '0000-00-00', '0000-00-00', '', '', '', '', '0'),
(2, 2, 3, '2/UN.16.15.5.2/PP/2016', '2016-06-07', 'Dekan Fakultas Teknologi Informasi', 'Permohonan Bantuan Dana', 'Musyawarah Besar IV Himpunan Mahasiswa Sistem Info', '0000-00-00', '0000-00-00', 'Ruang Seminar Gedung', 'Rp 100.000.000,-', 'Sabtu-Minggu', '08.00 WIB - Selesai', '2'),
(3, 3, 2, '3/UN.16.15.5.2/PP/2016', '2016-06-07', 'Staf Pengajar Jurusan Sistem Informasi & Staf Peng', 'Surat Izin Tidak Mengikuti Perkuliahan', 'Kerja Praktek', '0000-00-00', '0000-00-00', 'Cabang Badan Pusat S', '', '', '', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
`id_suma` int(11) NOT NULL,
  `jenis_id` int(5) NOT NULL,
  `no_surat` int(10) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `asal_surat` varchar(50) DEFAULT NULL,
  `tujuan_surat` varchar(50) DEFAULT NULL,
  `perihal` varchar(20) DEFAULT NULL,
  `file_surat` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_orang`
--

CREATE TABLE IF NOT EXISTS `surat_orang` (
`id_surat_orang` int(11) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nim` int(18) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_orang`
--

INSERT INTO `surat_orang` (`id_surat_orang`, `id_surat`, `nama`, `nim`) VALUES
(1, 1, 'Alfi Hamdani', 1311521035),
(2, 1, 'Khairiyatin Nuzha', 1311521001),
(3, 2, 'Ronald Chandra G', 1311521021),
(4, 3, 'Alfi Hamdani', 1311521035),
(5, 3, 'Hausa Yoruba', 1311522007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_surat`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_surat` (
`jenis_id` int(5) NOT NULL,
  `jenis_surat` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`jenis_id`, `jenis_surat`) VALUES
(1, 'Undangan'),
(2, 'Rahasia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`u_id` int(3) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `u_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `u_paswd` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nim` bigint(30) NOT NULL,
  `role` varchar(15) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`u_id`, `nama`, `u_name`, `u_paswd`, `nim`, `role`) VALUES
(1, 'Super Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(2, 'Alfi Hamdani', 'al_ham', '827ccb0eea8a706c4c34a16891f84e7b', 1311521035, 'user'),
(3, 'Ronald Chandra G', 'onel', '827ccb0eea8a706c4c34a16891f84e7b', 1311521021, 'user'),
(4, 'Darwison, MT', 'kajur', '827ccb0eea8a706c4c34a16891f84e7b', 196409141995121001, 'kajur'),
(5, 'Fadhilla Kusuma', 'dila', '827ccb0eea8a706c4c34a16891f84e7b', 1311522017, 'user'),
(6, 'Khairiyatin Nuzha', 'nuzha', '827ccb0eea8a706c4c34a16891f84e7b', 1311521001, 'user'),
(7, 'Hausa Yoruba', 'oca', '827ccb0eea8a706c4c34a16891f84e7b', 1311522007, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_suke`
--
ALTER TABLE `jenis_suke`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
 ADD PRIMARY KEY (`id_suke`), ADD UNIQUE KEY `no_surat` (`no_surat`), ADD UNIQUE KEY `no_surat_2` (`no_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
 ADD PRIMARY KEY (`id_suma`);

--
-- Indexes for table `surat_orang`
--
ALTER TABLE `surat_orang`
 ADD PRIMARY KEY (`id_surat_orang`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
 ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_suke`
--
ALTER TABLE `jenis_suke`
MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
MODIFY `id_suke` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
MODIFY `id_suma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surat_orang`
--
ALTER TABLE `surat_orang`
MODIFY `id_surat_orang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
MODIFY `jenis_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `u_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
