-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2024 at 04:15 PM
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

--
-- Dumping data for table `master_kamar`
--

INSERT INTO `master_kamar` (`kamarId`, `kodeKamar`, `namaKamar`, `aliasKamar`, `createdAt`, `updatedAt`) VALUES
(1, 'K-1', 'Kamar Al-Husna', 'Al-Husna', '2024-02-04 05:23:19', '2024-02-04 05:23:19'),
(2, 'K-1', 'Kamar Al-Husna', 'Al-Husna', '2024-02-04 05:28:09', '2024-02-04 05:28:09'),
(3, 'K-1', 'Kamar Al-Husna', 'Al-Husna', '2024-02-04 05:30:08', '2024-02-04 05:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `master_kriteria`
--

CREATE TABLE `master_kriteria` (
  `kriteriaId` int(11) NOT NULL,
  `kodeKriteria` varchar(50) NOT NULL,
  `namaKriteria` varchar(100) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `idMenu` int(11) NOT NULL,
  `namaMenu` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `icon` text,
  `role` enum('1','2') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`idMenu`, `namaMenu`, `url`, `icon`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'Data Kamar', '/admin/data-kamar', NULL, '1', '2024-02-03 06:53:22', '2024-02-03 06:53:22');

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
  `noHp` varchar(13) DEFAULT NULL,
  `levelUser` enum('1','2') NOT NULL COMMENT '1 = ''Admin'',\r\n2 = ''Client''',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `fullName`, `noHp`, `levelUser`, `createdAt`, `updatedAt`) VALUES
(1, 'client@gmail.com', '0192023a7bbd73250516f069df18b500', 'Yoga SA', '081377675308', '2', '2024-02-01 07:33:41', '2024-02-01 22:32:22'),
(2, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', '081377675308', '1', '2024-02-01 21:45:05', '2024-02-01 21:45:05'),
(3, 'yogasonya12@gmail.com', '0511a9321acdc4ba658238b78f5cef6f', 'Yoga Agsar', NULL, '2', '2024-02-03 06:20:22', '2024-02-03 06:20:22'),
(4, 'dummy@gmail.com', '0511a9321acdc4ba658238b78f5cef6f', 'Yoga S Agsar', NULL, '2', '2024-02-03 06:22:54', '2024-02-03 06:22:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kamar`
--
ALTER TABLE `master_kamar`
  ADD PRIMARY KEY (`kamarId`);

--
-- Indexes for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  ADD PRIMARY KEY (`kriteriaId`);

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`idMenu`);

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
  MODIFY `kamarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  MODIFY `kriteriaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trx_penilaian_kamar`
--
ALTER TABLE `trx_penilaian_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
