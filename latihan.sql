-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2018 at 06:38 PM
-- Server version: 5.7.18-1
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
  `nim` int(12) UNSIGNED NOT NULL,
  `kelas_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(4) NOT NULL,
  `nama` text NOT NULL,
  `enrol` varchar(5) NOT NULL,
  `nip` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(4) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `anggota_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuiz`
--

CREATE TABLE `kuiz` (
  `kuiz_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `post_id` int(4) NOT NULL,
  `waktu` datetime NOT NULL,
  `nip` int(12) UNSIGNED NOT NULL,
  `kelas_id` int(4) NOT NULL,
  `jenis` enum('pengumuman','tugas','kuiz') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(4) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `pilihan_id` int(4) NOT NULL,
  `kuiz_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(4) NOT NULL,
  `judul` text NOT NULL,
  `instruksi` text NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `topik_id` int(4) DEFAULT NULL,
  `materi` text NOT NULL,
  `post_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is_dosen` tinyint(1) NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_dosen`, `is_confirmed`, `is_deleted`, `first_name`, `last_name`) VALUES
(6, 'admin', 'admin@gmail.com', 'e024c87bcd6c66be9c143c741cd0d284bec7403139cf10bdf6b2faaa8b4afea25878a5fef8dc286c1576a38fc35b1803cd7d35b24494698b28a0464dd836e643sG2+xWHye2U+c4bUDESiB6a+9HfpEgFlRgUZuGi4od8=', 'default.jpg', '2018-02-15 17:48:35', NULL, 0, 0, 0, '', NULL),
(7, 'janu', 'janu@gmail.com', 'cd7caedca5987d34e8ae4617fad0dd0be1a401a510ba02ace2e3bbf86f4220e28e6b686bb9f3ded1722ac18627884dc281148c9c35fb142d395e918cb7f73a15CaCP6FwhVPiEAJCVAsqPbp9y8Pjapi49czoMRFoL85Q=', 'default.jpg', '2018-07-03 03:50:29', NULL, 0, 0, 0, '', NULL),
(8, 'jokotri', 'joko.trianto@gmail.com', 'e219cfd39ed6e127cda1ffe380c81cae74bd9f14106d67692c421898a761790c465a6278f0009b2694e7922ffc7cb09ce1226660f6be3d74181a489a1148d426SEchVNqF4eyzczUiaU+T/Mx+I5munD8rxrgi5TjtVu8=', 'default.jpg', '2018-07-03 04:08:36', NULL, 1, 0, 0, '', NULL);

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
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`),
  ADD KEY `topik_id` (`topik_id`),
  ADD KEY `post_id` (`post_id`);

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
  ADD KEY `pilihan_id` (`pilihan_id`),
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
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tugas_upload_ibfk_1` FOREIGN KEY (`murid_id`) REFERENCES `anggota` (`anggota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_upload_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
