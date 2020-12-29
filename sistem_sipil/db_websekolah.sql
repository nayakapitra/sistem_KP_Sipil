-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 06:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_websekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `Nama1` varchar(80) DEFAULT NULL,
  `Nama2` varchar(80) DEFAULT NULL,
  `Nim1` int(9) DEFAULT NULL,
  `Nim2` int(9) DEFAULT NULL,
  `Transkip1` varchar(120) DEFAULT NULL,
  `Transkip2` varchar(120) DEFAULT NULL,
  `Status_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `siswa_id`, `pembimbing_id`, `Nama1`, `Nama2`, `Nim1`, `Nim2`, `Transkip1`, `Transkip2`, `Status_daftar`) VALUES
(14, 42, 0, 'fiayv', 'fiayv', 21116002, 21116002, 'Transkip_NIM1.pdf', 'Transkip_NIM2.pdf', 1),
(15, 41, 0, 'Lovenia Elanda', 'nayaka', 21116089, 21117089, 'Transkip_NIM14.pdf', 'Transkip_NIM24.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_siswa`
--

CREATE TABLE `file_siswa` (
  `file_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `data1` varchar(120) NOT NULL,
  `data2` varchar(120) NOT NULL,
  `status_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_siswa`
--

INSERT INTO `file_siswa` (`file_id`, `siswa_id`, `data1`, `data2`, `status_surat`) VALUES
(2, 42, 'Surat_Mulai_Kerja_Praktek.pdf', 'Surat_Selesai_Kerja_Praktek.pdf', 1),
(3, 41, 'Surat_Mulai_Kerja_Praktek1.pdf', 'Surat_Selesai_Kerja_Praktek1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `file_laporan` varchar(120) NOT NULL,
  `Status_laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `progress` varchar(120) NOT NULL,
  `owner` varchar(80) NOT NULL,
  `kontraktor` varchar(120) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  `Status_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `siswa_id`, `progress`, `owner`, `kontraktor`, `nilai`, `deskripsi`, `foto`, `file`, `Status_proyek`) VALUES
(5, 42, 'baik baik', 'pak agung', 'PT.agung jaya', 'Rp.10.000.000.000', 'ngasal', 'gambar_Proyek__perusahaan.zip', 'Surat_Balasan_Pengantar.pdf', 1),
(6, 41, 'asdfqUDWE', 'PAK RAHMAT', 'pt jaya ', 'Rp.5.000.0000.000', 'ywi9whdpwqd', 'gambar_Proyek__perusahaan1.zip', 'Surat_Balasan_Pengantar1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `Nama_file` varchar(120) DEFAULT NULL,
  `file_oleh` varchar(60) DEFAULT NULL,
  `file_data` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `pengguna_id`, `Nama_file`, `file_oleh`, `file_data`) VALUES
(1, 1, 'surat pengantar', 'admin', 'Form-Pendaftaran-KP.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) NOT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(1, 'Rahmat Kurniawan ,ST.,MT.', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'RahmatKurniawan@gmail.com', 1, '1', '2016-09-03 06:07:55', 'db5dec647062751f2fb236b9bc3f1c54.png'),
(7, 'Alvaro Sanchez', 'alvaro', '98db6b79acb71383b5a83e0bbc1cadd4', 'alvaro@gmail.com', 1, '2', '2019-05-16 07:52:04', '3de86bfde28f1a617d780e84699a00ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(70) DEFAULT NULL,
  `email_siswa` varchar(120) DEFAULT NULL,
  `siswa_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `email_siswa`, `siswa_password`) VALUES
(40, '21116001', 'Zana Samosir', 'Zana.21116001@student.itera.ac.id', '9588ba47f89d44ff6e08c6e584758429'),
(41, '21116089', 'Lovenia Elanda', 'Lovenia.21116089@student.itera.ac.id', '16eca1a07af503265660c15a342d44e9'),
(42, '21116002', 'fiayv', 'f@itera.ac.id', '8fa14cdd754f91cc6554c9e71929cce7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `daftar_siswa_1` (`siswa_id`);

--
-- Indexes for table `file_siswa`
--
ALTER TABLE `file_siswa`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `foreign_key_file_siswa` (`siswa_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `daftar_laporan_1` (`siswa_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `proyek_siswa_1` (`siswa_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `foreign_key_file_pengguna` (`pengguna_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `file_siswa`
--
ALTER TABLE `file_siswa`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `daftar_siswa_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`siswa_id`);

--
-- Constraints for table `file_siswa`
--
ALTER TABLE `file_siswa`
  ADD CONSTRAINT `foreign_key_file_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`siswa_id`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `daftar_laporan_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`siswa_id`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_siswa_1` FOREIGN KEY (`siswa_id`) REFERENCES `tbl_siswa` (`siswa_id`);

--
-- Constraints for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD CONSTRAINT `foreign_key_file_pengguna` FOREIGN KEY (`pengguna_id`) REFERENCES `tbl_pengguna` (`pengguna_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
