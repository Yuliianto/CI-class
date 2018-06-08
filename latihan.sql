-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2018 at 06:32 AM
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `teacher_id` int(12) NOT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `kode` varchar(12) NOT NULL,
  `material` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(12) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `posted_at` date NOT NULL,
  `user_own` int(12) NOT NULL,
  `for_course` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(12) NOT NULL,
  `notif` varchar(200) NOT NULL,
  `posted_at` date NOT NULL,
  `id_post` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(12) NOT NULL,
  `post` varchar(200) NOT NULL,
  `posted_at` date NOT NULL,
  `course_id` int(12) NOT NULL,
  `file_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TABLE 7`
--

CREATE TABLE `TABLE 7` (
  `kode_provinsi` int(2) DEFAULT NULL,
  `nama_provinsi` varchar(20) DEFAULT NULL,
  `kode_kabkota` int(4) DEFAULT NULL,
  `nama_kabkota` varchar(11) DEFAULT NULL,
  `kecamatan` varchar(11) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `program` varchar(14) DEFAULT NULL,
  `jumlah_penduduk` int(6) DEFAULT NULL,
  `jumlah_penduduk_miskin` int(4) DEFAULT NULL,
  `kategori` varchar(12) DEFAULT NULL,
  `blm_apbn` decimal(6,2) DEFAULT NULL,
  `blm_apbd` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TABLE 7`
--

INSERT INTO `TABLE 7` (`kode_provinsi`, `nama_provinsi`, `kode_kabkota`, `nama_kabkota`, `kecamatan`, `tahun`, `program`, `jumlah_penduduk`, `jumlah_penduduk_miskin`, `kategori`, `blm_apbn`, `blm_apbd`) VALUES
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Berbah', 2009, 'PNPM Perkotaan', 51632, 6234, 'Sedang', 616.00, 154.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Berbah', 2010, 'PNPM Perkotaan', 51632, 6234, 'Sedang', 520.00, 130.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Berbah', 2011, 'PNPM Perkotaan', 51632, 6234, 'Sedang', 480.00, 120.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Berbah', 2012, 'PNPM Perkotaan', 51632, 6234, 'Sedang', 959.50, 50.50),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Berbah', 2013, 'PNPM Perkotaan', 51632, 6234, 'Sedang', 926.25, 48.75),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Cangkringan', 2012, 'PNPM Perdesaan', 27883, 5728, 'Sedang', 570.00, 30.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2008, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 735.00, 315.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2009, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 564.00, 141.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2010, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 480.00, 100.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2011, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 130.00, 20.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2012, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 475.00, 25.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Depok', 2013, 'PNPM Perkotaan', 182510, 4370, 'Tidak Miskin', 237.50, 12.50),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Gamping', 2008, 'PNPM Perkotaan', 97426, 8664, 'Tidak Miskin', 1225.00, 525.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Gamping', 2009, 'PNPM Perkotaan', 97426, 8664, 'Tidak Miskin', 920.00, 230.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Gamping', 2010, 'PNPM Perkotaan', 97426, 8664, 'Tidak Miskin', 1000.00, 200.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Gamping', 2012, 'PNPM Perkotaan', 97426, 8664, 'Tidak Miskin', 1045.00, 55.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Godean', 2008, 'PNPM Perkotaan', 66514, 7643, 'Tidak Miskin', 1085.00, 465.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Sleman', 2008, 'PNPM Perkotaan', 64845, 9385, 'Sedang', 380.00, 60.00),
(34, 'Prov. D I Yogyakarta', 3404, 'Kab. Sleman', 'Sleman', 2009, 'PNPM Perkotaan', 64845, 9385, 'Sedang', 960.00, 240.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`, `first_name`, `last_name`) VALUES
(4, 'user', 'user@gmail.com', '3814417b27fdb8f17a81ca95b3b457eeaa731301015f47d8ff1b6c67f3b9e861b32f778fe3902ff7a9ee3d57679919700f128a89fff89c708dd4b22ffbba7af6E/eavkGTslSWg4tfso/t5ZFZLctvPCRFcuG3lNlfHVo=', 'default.jpg', '2018-02-15 09:25:31', NULL, 1, 0, 0, '', NULL),
(5, 'kali', 'kali@gmail.com', '2d2156b8cee5b95a9035de3a8caa523bc3ba918b829224b70cbb901928e91abac96f974b925568e2e0a268b99926648c57b01c796139b5a88feae64e2b202eb0bGyjKwPdeHyB77mqnIvOvDY6+K8dTvMnbGAX50LYnGM=', 'default.jpg', '2018-02-15 15:05:53', NULL, 0, 0, 0, '', NULL),
(6, 'admin', 'admin@gmail.com', 'e024c87bcd6c66be9c143c741cd0d284bec7403139cf10bdf6b2faaa8b4afea25878a5fef8dc286c1576a38fc35b1803cd7d35b24494698b28a0464dd836e643sG2+xWHye2U+c4bUDESiB6a+9HfpEgFlRgUZuGi4od8=', 'default.jpg', '2018-02-15 17:48:35', NULL, 0, 0, 0, '', NULL),
(7, 'clien', 'clien@gmail.com', '2443534cc8f6f34df1bd43a12e9396b5c407643c0cfabb69d7b4ef70d33704f23690d1dff587013f8fb69dd0e076d1920714f9a26386f45ceb296c3b3c70b586+f8l3LBQhp/i6GgV+nJA0mWdFcXDWOqN92cxFtZ6NZo=', 'default.jpg', '2018-02-15 20:05:54', NULL, 0, 0, 0, '', NULL),
(8, 'root', 'root@gmail.com', 'ad21e6a3333cb7bb19e3821e80272129a0f323511395f51c6103ba12b8fdd3bafd736aaba68318006ff51b8900c07b29a22dfd65b3092913920d52d9a7502b24zCmheZ0DmwDZs/zjv/iwPtAMlFTeJ5m8WVhATH8JOFE=', 'default.jpg', '2018-02-17 21:24:13', NULL, 0, 0, 0, '', NULL),
(9, 'test', 'test@gmail.com', '70c58e8ccea0fed417167c04243b116688b7d63aa56781bce4527bd07675d033b81ecea6618ce96f2f2fe5ee554dae6a9c25d7eb1599cafeb61529cd081de969EGm7w1m/WnUJQteEKhHY0p4DWqaXae9/bRkvzGjDOjs=', 'default.jpg', '2018-03-11 19:21:39', NULL, 0, 0, 0, '', NULL),
(10, 'yulianto', 'yulianto@gmail.com', '259ed82076c91dc89c3d0f814144621d384b4310dc3d91cd01fbaea948fe450c491cca207a5769a885d5e93782e1974955235228af48b9bf5f41e280dd53186bWLDVFVXbRbGrWbCkgMu+tdir9L46O2HeTG+85m849nQ=', 'default.jpg', '2018-03-11 19:49:11', NULL, 0, 0, 0, 'yulianto', 'yulianto'),
(11, 'hantu123', 'hantu@gmail.com', '42c701dab3323991d22eadba8e644a15a2590701543517dc4ae7bfef9b196ef63c5bf95725971afa456d5fefdb1b00a65dadc4d4348aaa7d4c493b44502dc1f64bG1DREdvVlmZ8mw+laEk6vf43DwtB9RhTA3dk22MDo=', 'default.jpg', '2018-04-07 16:44:04', NULL, 0, 0, 0, 'hantu', 'kampus'),
(12, 'laila', 'laila@gmail.com', 'dcfa7801b4bad18e990c3ba8123ef177ed9f9567a16048b7fda385ed53f148687dc876fe15cb7d943c9f6ae7d65690a22aa7cf0addab8340e5f44d6f54f7a592PY2tBKk2xh04urEd0CbXzWezqi1j1fmwraN+ZEoBjxI=', 'default.jpg', '2018-06-03 14:08:04', NULL, 0, 0, 0, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
