-- phpMyAdmin SQL Dump
-- version 5.2.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2025 at 01:39 AM
-- Server version: 11.4.4-MariaDB-3-log
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escapegame`
--
CREATE DATABASE IF NOT EXISTS `escapegame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `escapegame`;

-- --------------------------------------------------------

--
-- Table structure for table `tblChiefEnterprise`
--

DROP TABLE IF EXISTS `tblChiefEnterprise`;
CREATE TABLE `tblChiefEnterprise` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblChiefEnterprise`
--

INSERT INTO `tblChiefEnterprise` (`id`, `login`, `pwd`) VALUES
(1, 'bossCEO973', 'V€Ry_S€CuR€_PA55W0RD_F0R_TH€_R1CH_B0SS€S');

-- --------------------------------------------------------

--
-- Table structure for table `tblGroups`
--

DROP TABLE IF EXISTS `tblGroups`;
CREATE TABLE `tblGroups` (
  `id` int(11) NOT NULL,
  `groupName` varchar(15) NOT NULL,
  `points` int(11) NOT NULL,
  `startTime` timestamp NOT NULL,
  `endTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblGroups`
--

INSERT INTO `tblGroups` (`id`, `groupName`, `points`, `startTime`, `endTime`) VALUES
(16, 'test', 4, '2025-01-31 20:12:10', '2025-01-31 20:45:49'),
(17, 'testt', 4, '2025-01-31 20:12:57', '2025-01-31 20:29:10'),
(18, 'testtt', 4, '2025-01-31 20:30:53', '2025-01-31 20:32:44'),
(19, 'testttt', 0, '2025-01-31 20:37:11', NULL),
(20, 'testtttt', 0, '2025-01-31 20:40:31', NULL),
(21, 'okijhbokp', 0, '2025-01-31 20:41:02', NULL),
(22, 'escape', 0, '2025-02-02 15:50:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblChiefEnterprise`
--
ALTER TABLE `tblChiefEnterprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblGroups`
--
ALTER TABLE `tblGroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNQ_groupName` (`groupName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblChiefEnterprise`
--
ALTER TABLE `tblChiefEnterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblGroups`
--
ALTER TABLE `tblGroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
