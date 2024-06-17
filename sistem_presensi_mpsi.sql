-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 01:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_presensi_mpsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(25) NOT NULL,
  `class_mapel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_mapel_id`) VALUES
(1, 'IV - 2', 41),
(2, 'IV - 1', 42);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(9) NOT NULL,
  `mapel_name` varchar(255) NOT NULL,
  `mapel_starttime` time NOT NULL,
  `mapel_endtime` time NOT NULL,
  `mapel_class_id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `mapel_day` varchar(25) NOT NULL,
  `mapel_meet` int(11) NOT NULL,
  `mapel_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapel_name`, `mapel_starttime`, `mapel_endtime`, `mapel_class_id`, `user_id`, `mapel_day`, `mapel_meet`, `mapel_max`) VALUES
(3, 'Kalkulus', '00:00:00', '00:00:00', 0, '3', 'day', 0, 16),
(41, 'Kalkulus', '00:00:00', '23:59:00', 1, '11', 'Monday', 0, 16),
(42, 'Biologi', '10:00:00', '23:45:00', 2, '12', 'Saturday', 2, 16),
(43, 'Fisika', '00:00:00', '23:55:00', 1, '11', 'Sunday', 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(25) NOT NULL,
  `member_code` int(11) NOT NULL,
  `member_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_code`, `member_class_id`) VALUES
(1, 'Cong Cen', 90909090, 1),
(2, 'Nay', 90909091, 1),
(3, 'Tulus', 90909092, 1),
(4, 'Layla', 90909093, 2),
(5, 'Sergio', 90909094, 1),
(6, 'Magina', 90909095, 2),
(7, 'Kael', 90909096, 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL,
  `record_mapel_id` int(11) NOT NULL,
  `record_attend` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `record_mapel_id`, `record_attend`) VALUES
(1, 41, ''),
(2, 42, '[{\"member_name\":\"Layla\",\"member_code\":\"90909093\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Magina\",\"member_code\":\"90909095\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Layla\",\"week\":2,\"status\":\"H\"},{\"member_name\":\"Magina\",\"week\":2,\"status\":\"H\"}]'),
(3, 43, '[{\"member_name\":\"Cong Cen\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Nay\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Tulus\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Sergio\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Kael\",\"week\":1,\"status\":\"H\"},{\"member_name\":\"Cong Cen\",\"week\":2,\"status\":\"H\"},{\"member_name\":\"Nay\",\"week\":2,\"status\":\"H\"},{\"member_name\":\"Tulus\",\"week\":2,\"status\":\"H\"},{\"member_name\":\"Sergio\",\"week\":2,\"status\":\"H\"},{\"member_name\":\"Kael\",\"week\":2,\"status\":\"I\"},{\"member_name\":\"Cong Cen\",\"week\":3,\"status\":\"H\"},{\"member_name\":\"Nay\",\"week\":3,\"status\":\"H\"},{\"member_name\":\"Tulus\",\"week\":3,\"status\":\"S\"},{\"member_name\":\"Sergio\",\"week\":3,\"status\":\"H\"},{\"member_name\":\"Kael\",\"week\":3,\"status\":\"H\"},{\"member_name\":\"Cong Cen\",\"week\":4,\"status\":\"H\"},{\"member_name\":\"Nay\",\"week\":4,\"status\":\"H\"},{\"member_name\":\"Tulus\",\"week\":4,\"status\":\"H\"},{\"member_name\":\"Sergio\",\"week\":4,\"status\":\"H\"},{\"member_name\":\"Kael\",\"week\":4,\"status\":\"H\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `usert`
--

CREATE TABLE `usert` (
  `assign_id` int(11) NOT NULL,
  `user_id` int(9) NOT NULL,
  `user_nip` int(11) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `user_code` int(11) NOT NULL,
  `mapel_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usert`
--

INSERT INTO `usert` (`assign_id`, `user_id`, `user_nip`, `user_name`, `user_role`, `user_code`, `mapel_id`) VALUES
(1, 3, NULL, 'test', 0, 1234, NULL),
(101, 11, 80808080, 'Joko Susilo', 1, 2020, 41),
(102, 12, 80808081, 'Budi Berlinton', 1, 2021, 42),
(103, 11, 80808080, 'Joko Susilo', 1, 2020, 43),
(201, 21, 80808082, 'Baim Wrong', 2, 9010, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `usert`
--
ALTER TABLE `usert`
  ADD PRIMARY KEY (`assign_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usert`
--
ALTER TABLE `usert`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
