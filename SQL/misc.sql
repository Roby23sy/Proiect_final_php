-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2022 at 08:35 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misc`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
--

CREATE TABLE `autos` (
  `autos_id` int(11) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`autos_id`, `make`, `model`, `year`, `mileage`) VALUES
(6, 'Sapele', 'Multuring', 48, 28),
(7, 'Supports', 'Excessive', 50, 74),
(8, 'tq', 't', 2, 2),
(10, 't', NULL, 2, 2),
(11, 'we', NULL, 222, 222),
(12, 'we', NULL, 222, 222),
(13, 'Kia', NULL, 2016, 245132),
(14, '<b>FCA US LLC Bold</b>', NULL, 1991, 348617),
(15, 'Subaru', NULL, 2011, 48104),
(16, '<b>FCA Italy Bold</b>', NULL, 1997, 123281),
(17, 'Land Rover', NULL, 1974, 125323),
(19, 'McLaren Automotive ', NULL, 2005, 267807),
(20, '<b>Subaru Bold</b>', NULL, 2008, 192540),
(21, 'Ferrari\'; DROP TABLE autos;\'-- ?', NULL, 2015, 244366);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`autos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autos`
--
ALTER TABLE `autos`
  MODIFY `autos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
