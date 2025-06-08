-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2025 at 06:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `pvrparking`
--

CREATE TABLE `pvrparking` (
  `id` int(11) NOT NULL,
  `slot_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pvrparking`
--

INSERT INTO `pvrparking` (`id`, `slot_no`, `name`, `vehicle_no`, `in_time`, `out_time`) VALUES
(1, 1, 'karthi', 'py01r4566', '2025-02-22 11:35:00', '2025-02-22 13:37:00'),
(2, 2, 'karthi', 'tn44n7898', '2025-02-22 13:43:00', '2025-02-22 15:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pvrparking`
--
ALTER TABLE `pvrparking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slot_no` (`slot_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pvrparking`
--
ALTER TABLE `pvrparking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
