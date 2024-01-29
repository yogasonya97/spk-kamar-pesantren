-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2024 at 05:29 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-kamar-pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_kamar`
--

CREATE TABLE `master_kamar` (
  `kamarId` int(11) NOT NULL,
  `kodeKamar` varchar(50) NOT NULL,
  `namaKamar` varchar(100) NOT NULL,
  `aliasKamar` varchar(20) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_kriteria_bobot`
--

CREATE TABLE `master_kriteria_bobot` (
  `kriteriaId` int(11) NOT NULL,
  `kodeKriteria` varchar(50) NOT NULL,
  `namaKriteria` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_penilaian_kamar`
--

CREATE TABLE `trx_penilaian_kamar` (
  `id` int(11) NOT NULL,
  `kamarId` int(11) NOT NULL,
  `kriteriaId` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullName` varchar(13) NOT NULL,
  `noHp` varchar(13) NOT NULL,
  `levelUser` enum('1','2') NOT NULL COMMENT '1 = ''Admin'',\r\n2 = ''Client''',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kamar`
--
ALTER TABLE `master_kamar`
  ADD PRIMARY KEY (`kamarId`);

--
-- Indexes for table `master_kriteria_bobot`
--
ALTER TABLE `master_kriteria_bobot`
  ADD PRIMARY KEY (`kriteriaId`);

--
-- Indexes for table `trx_penilaian_kamar`
--
ALTER TABLE `trx_penilaian_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kamar`
--
ALTER TABLE `master_kamar`
  MODIFY `kamarId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kriteria_bobot`
--
ALTER TABLE `master_kriteria_bobot`
  MODIFY `kriteriaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_penilaian_kamar`
--
ALTER TABLE `trx_penilaian_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
