-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2018 at 07:12 PM
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
(8, '5150411259', 15),
(9, '5150411259', 11),
(10, '5150411259', 22);

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(4) NOT NULL,
  `nama` text NOT NULL,
  `section` text,
  `deskripsi` text,
  `enrol` varchar(5) NOT NULL,
  `nip` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama`, `section`, `deskripsi`, `enrol`, `nip`) VALUES
(9, 'Pemograman', 'Kecerdasan buatan', 'belajar pemograman', '39536', '1121103'),
(10, 'Pemograman client server', 'semester 4', 'kelas unggulan', 'a9291', '1121103'),
(11, 'Kelas AI', 'Kecerdasan buatan', 'belajar pemograman', '0c62c', '1121103'),
(15, 'Basis data', 'triger', 'kelas A', 'bd385', '1121103'),
(20, 'Pemograman web', 'Belajar pemograman web', 'untuk kelas khusus', '82976', '1121104'),
(21, 'Basis data II', 'Pelajaran basis data tingkat lanjut', 'untuk kelas semester atas', '1322c', '1121104'),
(22, 'colay', 'colay bareng ', 'untuk kelas D', '885c7', '1121104'),
(23, 'bahasa pemograman', 'tes', 'tes', 'd1420', '1121109');

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
('5150411259', 'YULIANTO', '1996-07-15', 'laki-laki', 'islam');

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
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `pilih_id` int(11) NOT NULL,
  `pilih` text NOT NULL,
  `soal_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, '5150411259', 'yulianto@gmail.com', 'd20e841ca480c9e577d961f07979bfda84a23542966a7c8cbd564c86d4316a7b813ca4861e7ea8af12b2030e7bad738657b923207f240ba132630126e78d8ff4WTE+TDS+8Lt7YQOV+hAqCFa9p3vpNiH40AQN42L2nbI=', 'default.jpg', '2018-07-06 22:45:22', NULL, '0', 0, 0, '', NULL),
(19, '1121104', 'budi@gmail.com', '990d7c0176d5a0a3d39efb87039433f436b5c113f3b8a4c1689f4432e3f836f38f1b294be91dbee8d94d64c96e3de3ea2743fd4163b2fdd3c7a852c42d403d78+OD9uyykzaIFJdezvvJign/0e/BKJlJ00We/vqmju+U=', 'default.jpg', '2018-07-07 13:44:00', NULL, '1', 0, 0, '', NULL),
(20, '1121109', 'jihan@gmail.com', 'a0553b3a8685852246dc758103edd7c29ed0c017226ff32c840dae84ed4de1660eebc4e4fe69adbcb76cb96680bbe1c67130e4a0bb905eaa16af0a5877740df1s2ULVB3/WVybiNpHY30SEDXMhAmGaq/CA8EeoHozv64=', 'default.jpg', '2018-07-07 18:53:06', NULL, '1', 0, 0, '', NULL),
(21, '5150411210', 'imawan@gmail.com', 'b170a2c6f87d790ffbf3486701d395571b2c91140f9f6e0a1cd76b02b75bd8759ecb20f2ea5d3bc4344e13a50d99af4b020ead431af05aa4c4cbade8acb799e9+ao6UKB/NWsxQzm4N+Bxje6JFWGVJWj/iN3Dqn2hJNE=', 'default.jpg', '2018-07-07 18:53:46', NULL, '0', 0, 0, '', NULL);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `pilih_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
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
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `pilihan_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tugas_upload_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posting` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
