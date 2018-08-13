-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2018 at 12:28 PM
-- Server version: 5.6.30-1
-- PHP Version: 5.6.26-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(4) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `kelas_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `nim`, `kelas_id`) VALUES
(12, '5150411210', 21),
(16, '5150411210', 25),
(18, '5150411210', 23),
(20, '5150411259', 23),
(21, '5150411259', 21),
(22, '5150411222', 21),
(23, '5150411260', 21),
(24, '5150411260', 24);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('6edd8c7f7eb491b434a692d8bc3c397fb48e7ee9', '::1', 1518614890, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531383631343838343b);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(14) NOT NULL,
  `nama` text NOT NULL,
  `ttl` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `ttl`, `gender`, `agama`) VALUES
('1121103', 'joko', '1996-07-15', 'laki-laki', 'islam'),
('1121104', 'budi', '1996-07-15', 'laki-laki', 'islam'),
('1121109', 'jihan', '2018-07-18', 'laki-laki', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `jawab_id` int(4) NOT NULL,
  `soal_id` int(4) NOT NULL,
  `jawaban` int(4) NOT NULL,
  `anggota_id` int(4) NOT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`jawab_id`, `soal_id`, `jawaban`, `anggota_id`, `status`) VALUES
(10, 41, 80, 21, 'benar'),
(11, 42, 82, 21, 'benar'),
(12, 43, 86, 21, 'benar'),
(13, 41, 80, 12, 'benar'),
(14, 42, 82, 12, 'benar'),
(15, 43, 86, 12, 'benar'),
(16, 41, 80, 22, 'benar'),
(17, 42, 82, 22, 'benar'),
(18, 43, 85, 22, 'salah'),
(19, 41, 81, 23, 'salah'),
(20, 42, 82, 23, 'benar'),
(21, 43, 85, 23, 'salah'),
(22, 44, 88, 21, 'salah'),
(23, 45, 90, 21, 'benar');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(4) NOT NULL,
  `kelas` text NOT NULL,
  `section` text,
  `deskripsi` text,
  `enrol` varchar(5) NOT NULL,
  `nip` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas`, `section`, `deskripsi`, `enrol`, `nip`) VALUES
(21, 'Basis data II', 'Pelajaran basis data tingkat lanjut', 'untuk kelas semester atas', '1322c', '1121104'),
(23, 'Desain web', 'belajar pemograman desain web dengan html, css dan javascript ', 'kelas B', '7a637', '1121104'),
(24, 'Algoritma Pemrograman', 'Belajar flowchart algoritma ', 'kelas B', 'a0e1b', '1121103'),
(25, 'RPL', 'bagaimana cara membangun dan mengembangkan sistem yang baik', 'Kelas B', '7f8e1', '1121109');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(4) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `anggota_id` int(4) UNSIGNED NOT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `komentar`, `waktu`, `anggota_id`, `post_id`) VALUES
(5, 'Nice info gan \n', '2018-07-26 19:07:25', 18, 42),
(6, 'Viral keunn euyy,,, !! \n', '2018-07-26 19:07:44', 18, 42),
(8, 'Have fun yaa nakkk :*\n', '2018-07-26 19:24:36', 19, 99),
(9, 'ok\n', '2018-07-27 09:49:45', 18, 42),
(10, 'pak saya sudah mengerjakan kuiz nya \n', '2018-07-28 16:17:02', 18, 100),
(11, 'nice\n', '2018-07-30 19:22:26', 18, 100),
(12, 'good \n', '2018-07-30 19:22:41', 18, 99),
(13, 'saya dosen \n', '2018-08-06 11:56:07', 19, 104),
(14, 'ohh iya terimakasih pak \n', '2018-08-06 11:56:26', 18, 104);

-- --------------------------------------------------------

--
-- Table structure for table `kuiz`
--

CREATE TABLE `kuiz` (
  `kuiz_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL,
  `deskrip` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuiz`
--

INSERT INTO `kuiz` (`kuiz_id`, `post_id`, `deskrip`) VALUES
(74, 100, 'kuiz lagi '),
(76, 104, 'deskripsi kuis');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` text NOT NULL,
  `ttl` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `ttl`, `gender`, `agama`) VALUES
('5150411210', 'MUHAMMAD IMAWAN', '1996-07-15', 'laki-laki', 'islam'),
('5150411222', 'Andika', '1992-07-10', 'laki - laki', 'islam'),
('5150411259', 'YULIANTO', '1996-07-15', 'laki-laki', 'islam'),
('5150411260', 'eko', '1992-07-28', 'laki-laki', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(4) NOT NULL,
  `pengumuman` text NOT NULL,
  `topik_id` int(4) DEFAULT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `pengumuman`, `topik_id`, `post_id`) VALUES
(1, '<h3>Pengumuman</h3>\r\n<p>kalo besuk itu libur gaessss</p>', NULL, 99),
(2, '<p>test pengumuman&nbsp;</p>', NULL, 101);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `pilih_id` int(11) NOT NULL,
  `pilih` text NOT NULL,
  `soal_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`pilih_id`, `pilih`, `soal_id`) VALUES
(80, 'jawaban pertama ', 41),
(81, 'jawaban kedia ', 41),
(82, 'benar', 42),
(83, 'salah', 42),
(84, 'salah', 42),
(85, 'salah', 43),
(86, 'benar', 43),
(87, 'jawab', 44),
(88, 'bukan', 44),
(89, 'bukan', 45),
(90, 'jawab', 45);

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `post_id` int(4) NOT NULL,
  `waktu` datetime NOT NULL,
  `nip` varchar(12) NOT NULL,
  `kelas_id` int(4) NOT NULL,
  `jenis` enum('pengumuman','tugas','kuiz') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`post_id`, `waktu`, `nip`, `kelas_id`, `jenis`) VALUES
(18, '2018-07-18 00:07:11', '1121104', 23, 'tugas'),
(37, '2018-07-20 19:07:27', '1121104', 21, 'tugas'),
(42, '2018-07-20 19:32:46', '1121104', 21, 'tugas'),
(99, '2018-07-26 19:07:30', '1121104', 21, 'pengumuman'),
(100, '2018-07-28 16:07:31', '1121104', 21, 'kuiz'),
(101, '2018-08-02 20:08:47', '1121103', 24, 'pengumuman'),
(102, '2018-08-02 20:30:55', '1121103', 24, 'tugas'),
(104, '2018-08-06 11:08:46', '1121104', 21, 'kuiz');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(4) NOT NULL,
  `soal` text NOT NULL,
  `kunci` int(4) DEFAULT NULL,
  `kuiz_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soal_id`, `soal`, `kunci`, `kuiz_id`) VALUES
(41, 'soanya adalah ?', 80, 74),
(42, 'soal dua adalah ?', 82, 74),
(43, 'soal ketiga ?', 86, 74),
(44, 'soal pertama ', 87, 76),
(45, 'soal kedua ?', 90, 76);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(4) NOT NULL,
  `judul` text NOT NULL,
  `instruksi` text NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `topik_id` varchar(4) DEFAULT NULL,
  `materi` text,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`tugas_id`, `judul`, `instruksi`, `batas_waktu`, `topik_id`, `materi`, `post_id`) VALUES
(15, 'Tugas Desain Web', '<p>kerjakan soal yang kemarin dengan teliti dan benar<br />tugas dikumpul di e learning denga format sebagai&nbsp;<br />berikut :<br />Nama_Nim.zip</p>', '2018-07-20 04:10:12', NULL, '/var/www/html/CI-class/uploads/bahan_tugas/7a637/18', 18),
(20, 'asdfda', '<p>asdfaf</p>', '2018-07-21 19:32:46', NULL, '/var/www/html/CI-class/uploads/bahan_tugas/1322c/42', 42),
(21, 'Tugas pemograman', '<p>Ini tugas pemograman pertama&nbsp;<br />tolong dikerjakan dengan benar ya&nbsp;<br />karenan ini penentu kelulusan kalian&nbsp;<br /><br /></p>', '2018-08-07 20:30:55', NULL, '/var/www/html/CI-class/uploads/bahan_tugas/a0e1b/102', 102);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_upload`
--

CREATE TABLE `tugas_upload` (
  `upload_id` int(4) NOT NULL,
  `dir_upload` text NOT NULL,
  `murid_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_upload`
--

INSERT INTO `tugas_upload` (`upload_id`, `dir_upload`, `murid_id`, `post_id`) VALUES
(18, './uploads/upload_mhs/7a637/1820', 20, 18),
(19, './uploads/upload_mhs/1322c/4212', 12, 42),
(20, './uploads/upload_mhs/1322c/424221', 21, 42),
(21, './uploads/upload_mhs/1322c/4223', 23, 42),
(22, './uploads/upload_mhs/a0e1b/10224', 24, 102);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_dosen` varchar(15) NOT NULL,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_dosen`, `is_confirmed`, `is_deleted`, `first_name`, `last_name`) VALUES
(17, '1121103', 'joko@gmail.com', '2ad25eb465166eac607aa0a1a0ac43d123718176207ef9fbc2174a9a336d920026b0fd50d107feaca628c361d26726d3ce36fb858348cac3938ea7c8bbd1a45eePlHBt+YmWDcCbHTMtBTrgwoqVeHzaSn0W0hcjJHelk=', 'default.jpg', '2018-07-06 22:44:39', NULL, '1', 0, 0, '', NULL),
(18, '5150411259', 'junivindo@gmial.com', '7440043f2923db5dcfad401e1a047b4d4069a457b1a8e73569e47333253d8a4107d37905728c5599857703059de78b1ea355550521dbb3dbaf9d3fe72535400ba5XAlx9ZE4oWrXjVS3kdTg7HAUWyjCemQQGZmerh9j8=', 'default.jpg', '2018-07-06 22:45:22', NULL, '0', 0, 0, 'Yulianto', 'yulianto'),
(19, '1121104', 'budi@gmail.com', '990d7c0176d5a0a3d39efb87039433f436b5c113f3b8a4c1689f4432e3f836f38f1b294be91dbee8d94d64c96e3de3ea2743fd4163b2fdd3c7a852c42d403d78+OD9uyykzaIFJdezvvJign/0e/BKJlJ00We/vqmju+U=', 'default.jpg', '2018-07-07 13:44:00', NULL, '1', 0, 0, '', NULL),
(20, '1121109', 'jihan@gmail.com', 'a0553b3a8685852246dc758103edd7c29ed0c017226ff32c840dae84ed4de1660eebc4e4fe69adbcb76cb96680bbe1c67130e4a0bb905eaa16af0a5877740df1s2ULVB3/WVybiNpHY30SEDXMhAmGaq/CA8EeoHozv64=', 'default.jpg', '2018-07-07 18:53:06', NULL, '1', 0, 0, '', NULL),
(21, '5150411210', 'junivindo@gmail.com', '48fa1b66f091abdfdc1ad0d2ad3c71e5d6bdb0fb39c6a0dadadca98bf26593878a2ec72d1b7c6eb2451fd45ddd84f703f75c1ceead479f9401f920c7473b6ef6/8JMd5uB0ATjqV8jSLDWsymuQtwwEINhaCYk1GnLdsI=', 'default.jpg', '2018-07-07 18:53:46', NULL, '0', 0, 0, 'Muhammad Imawan ', 'madjid'),
(22, '5150411222', 'andika@gmail.com', '778c61c052e8bb212eb3639a5e602650b2d0e25d8730b000e0b098ed6b19f7607c73049c767862fbffbcc02f2dbc864d79415b908bccef017ee615111a3393eaaUt4CtCfndK6z8kpeUttZV8EiLHmwDNQOiKPepUJOa8=', 'default.jpg', '2018-07-21 17:07:17', NULL, '0', 0, 0, '', NULL),
(23, '5150411260', 'ekoardiansyah@gmail.com', '351d8f8f25e777e954b3668bdea19a6fe30fd0ef9bb0d8c0e1d611df0d310046a2b968fd275e33a6835e96fa0d3e50b3db30209530131d875bb3b0635794460fRCC0pBZyf93ZGbmMGvQrzhz6c94uxfJBeu3GOsuU5Wo=', 'default.jpg', '2018-07-21 17:07:38', NULL, '0', 0, 0, 'Eko', 'Ardiansyah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `user_id` (`nim`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawab_id`),
  ADD KEY `soal_id` (`soal_id`,`jawaban`,`anggota_id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `jawaban` (`jawaban`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `user_id` (`nip`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `murid_id` (`anggota_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD PRIMARY KEY (`kuiz_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`),
  ADD KEY `topik_id` (`topik_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`pilih_id`),
  ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`nip`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `user_id_2` (`nip`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `pilihan_id` (`kunci`),
  ADD KEY `kuiz_id` (`kuiz_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `topik_id` (`topik_id`);

--
-- Indexes for table `tugas_upload`
--
ALTER TABLE `tugas_upload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `murid_id` (`murid_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawab_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kuiz`
--
ALTER TABLE `kuiz`
  MODIFY `kuiz_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `pilih_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tugas_upload`
--
ALTER TABLE `tugas_upload`
  MODIFY `upload_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`jawaban`) REFERENCES `pilihan` (`pilih_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD CONSTRAINT `kuiz_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `pilihan_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`kuiz_id`) REFERENCES `kuiz` (`kuiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_upload`
--
ALTER TABLE `tugas_upload`
  ADD CONSTRAINT `tugas_upload_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_upload_ibfk_3` FOREIGN KEY (`murid_id`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
