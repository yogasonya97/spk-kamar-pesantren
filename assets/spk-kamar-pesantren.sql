-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2024 at 06:55 PM
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
  `jenisKamar` enum('A','I') NOT NULL,
  `namaAsrama` varchar(100) NOT NULL,
  `namaKamar` varchar(100) NOT NULL,
  `aliasKamar` varchar(20) NOT NULL,
  `namaPembina` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kamar`
--

INSERT INTO `master_kamar` (`kamarId`, `jenisKamar`, `namaAsrama`, `namaKamar`, `aliasKamar`, `namaPembina`, `createdAt`, `updatedAt`) VALUES
(1, 'I', 'Al-Fahd', 'Kamar Al', 'Al-Husna', 'Reza', '2024-02-04 05:23:19', '2024-02-18 00:27:41'),
(2, 'A', 'K-2', 'Kamar Al', 'Al-Husni', 'Yoga', '2024-02-04 05:28:09', '2024-02-10 09:54:48'),
(3, 'A', 'K-3', 'Kamar 3', 'Kamar 3', 'Komar', '2024-02-08 18:17:40', '2024-02-10 09:54:55'),
(4, 'A', 'K-4', 'Kamar 4', 'Kamar 4', 'Eri', '2024-02-08 18:17:52', '2024-02-10 09:55:03'),
(5, 'I', 'Asrama Al-Fahd', 'Kamar Al-Hadid', 'Al-Hadid', 'Ust.Somad', '2024-02-18 00:31:03', '2024-02-18 00:31:03'),
(6, 'I', 'Asrama Al-Fahd', 'Kamar Al-Hajat', 'Al-Hajat', 'Ust. Adi', '2024-02-18 00:31:51', '2024-02-18 00:31:51');

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

--
-- Dumping data for table `master_kriteria`
--

INSERT INTO `master_kriteria` (`kriteriaId`, `kodeKriteria`, `namaKriteria`, `createdAt`, `updatedAt`) VALUES
(1, 'A1', 'Kebersihan', '2024-02-07 23:45:36', '2024-02-07 23:45:36'),
(2, 'A2', 'Kerapian', '2024-02-08 18:19:02', '2024-02-08 18:19:02'),
(3, 'A3', 'Kelengkapan', '2024-02-08 18:19:19', '2024-02-08 18:19:19'),
(4, 'A4', 'Estetika', '2024-02-08 18:19:58', '2024-02-08 18:19:58'),
(5, 'A5', 'Wangi', '2024-02-08 18:20:13', '2024-02-08 18:20:13');

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
  `notes` text,
  `attachment` text,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_penilaian_kamar`
--

INSERT INTO `trx_penilaian_kamar` (`id`, `kamarId`, `kriteriaId`, `nilai`, `notes`, `attachment`, `createdAt`, `updatedAt`) VALUES
(1, 1, 1, '30', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(2, 2, 1, '20', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(3, 3, 1, '25', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(4, 4, 1, '40', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(5, 1, 2, '40', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(6, 2, 2, '50', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(7, 3, 2, '30', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(8, 4, 2, '45', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(9, 1, 3, '40', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(10, 2, 3, '50', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(11, 3, 3, '30', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(12, 4, 3, '45', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(13, 1, 4, '40', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(14, 2, 4, '50', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(15, 3, 4, '30', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(16, 4, 4, '45', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(17, 1, 5, '40', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(18, 2, 5, '50', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(19, 3, 5, '30', NULL, NULL, '2024-02-08 18:23:09', '2024-02-08 18:23:09'),
(20, 4, 5, '50', NULL, NULL, '2024-02-08 18:23:09', '2024-02-10 10:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullName` varchar(13) NOT NULL,
  `jenisKelamin` enum('A','I') DEFAULT NULL,
  `noHp` varchar(13) DEFAULT NULL,
  `levelUser` enum('1','2') NOT NULL COMMENT '1 = ''Admin'',\r\n2 = ''Client''',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `fullName`, `jenisKelamin`, `noHp`, `levelUser`, `createdAt`, `updatedAt`) VALUES
(1, 'client@gmail.com', '0192023a7bbd73250516f069df18b500', 'Yoga SA', 'A', '081377675308', '2', '2024-02-01 07:33:41', '2024-02-18 00:15:38'),
(2, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', NULL, '081377675308', '1', '2024-02-01 21:45:05', '2024-02-01 21:45:05'),
(3, 'yogasonya12@gmail.com', '0192023a7bbd73250516f069df18b500', 'Yoga Agsar', 'I', NULL, '2', '2024-02-03 06:20:22', '2024-02-18 01:10:22'),
(4, 'dummy@gmail.com', '0511a9321acdc4ba658238b78f5cef6f', 'Yoga S Agsar', NULL, NULL, '2', '2024-02-03 06:22:54', '2024-02-03 06:22:54');

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
  MODIFY `kamarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  MODIFY `kriteriaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trx_penilaian_kamar`
--
ALTER TABLE `trx_penilaian_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
