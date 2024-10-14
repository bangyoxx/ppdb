-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 11:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `status` enum('Diterima','Cadangan','Ditolak') DEFAULT 'Cadangan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `user_id`, `nama_lengkap`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `nomor_telepon`, `agama`, `email`, `program_studi`, `status`) VALUES
(43, 7, 'a', 'a', 'a', '2000-02-22', 'Laki-laki', 'a', '11111111111', 'av', 'aads@gmail.com', 'a', 'Cadangan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(6, 'admin', '$2y$10$6.e2k3dCMyWi23qVStVH/OkLkopx4bA9QDTMRuE.YuUWcWw/cAsB6', 'admin'),
(7, 'user', '$2y$10$QYS/fIMVe6ucz4cpZNBO6eDF7XAKT9eFKvUX8hY4pq4gCAU71EfC2', 'user'),
(8, 'user2', '$2y$10$9MkSY7PBwwAmb71X9OLvDO..ZnIkL1tZL1TTOcDQrGUx409S.came', 'user'),
(9, 'tes', '$2y$10$u5zmzErdNPXC33U0J03GE.oxSeC7ccuGr/5P/dBUfwt2.a6G1trGi', 'user'),
(10, 'test', '$2y$10$sFI2AD2fVbVCfMZgHLbZDeoRx6iuH2H03vGcK0NCHGVG74zPVVWRq', 'user'),
(11, 'hola', '$2y$10$HDrMSwiQIzKMrKmR7zqC8e5Fu9Y7ltBxpfpkgDLiwIx3mF/.D4DMa', 'user'),
(12, 'hola', '$2y$10$oOLeHfMPHASO8A..npYSi.QRC7dBF/cntE4FQlVnrj//UDIl69UFa', 'user'),
(13, '123', '$2y$10$cv9gH9TSDeuC9amh85ltkeEpM/3LN7ZCZoS1gCA1R617klfcKcIEi', 'user'),
(14, '1234', '$2y$10$YFm9K3wUIFLPYHWWQOEiuObd55/MmOfQKJx9/b90Qu98Dg.gDzdBq', 'user'),
(15, 'admin', '$2y$10$NcttpwDIQmOvRIQBmlxl8O7MlRTpvQvfRcim4a2CM1uJTwJV/9H4m', 'user'),
(16, 'admin', '$2y$10$0D7iTzQwdEQnvoQ.SdH8xOHjUmA2DelYZnyjhgqYBlVwXUsAm5Unu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
