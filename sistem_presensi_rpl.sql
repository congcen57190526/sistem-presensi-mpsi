-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_presensi_rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_user` varchar(255) NOT NULL,
  `class_code` varchar(11) NOT NULL,
  `class_siswa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`class_siswa`)),
  `class_meet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_user`, `class_code`, `class_siswa`, `class_meet`) VALUES
(1, 'joko', '', '[\"joko\",\"andy\",\"mike\"]\n', 1),
(2, 'joko', '', '[\"joko\",\"andy\",\"mike\"]', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(9) NOT NULL,
  `mapel_name` varchar(255) NOT NULL,
  `mapel_starttime` time NOT NULL,
  `mapel_endtime` time NOT NULL,
  `mapel_member` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`mapel_member`)),
  `user_id` varchar(25) NOT NULL,
  `mapel_day` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapel_name`, `mapel_starttime`, `mapel_endtime`, `mapel_member`, `user_id`, `mapel_day`) VALUES
(3, 'Kalkulus', '00:00:00', '00:00:00', '', '3', 'day'),
(41, 'Kalkulus', '00:00:00', '23:55:00', '[\"joko\",\"andy\",\"mike\"]', '11', 'Sunday'),
(42, 'Biologi', '10:00:00', '23:45:00', '[\"joko\",\"andy\",\"mike\"]', '12', 'Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `usert`
--

CREATE TABLE `usert` (
  `user_id` int(9) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `user_code` int(11) NOT NULL,
  `mapel_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usert`
--

INSERT INTO `usert` (`user_id`, `user_name`, `user_role`, `user_code`, `mapel_id`) VALUES
(3, 'test', 0, 1234, NULL),
(11, 'Joko', 1, 2020, 41),
(12, 'guru2', 1, 2021, 42),
(21, 'admin', 2, 9010, NULL);

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
-- Indexes for table `usert`
--
ALTER TABLE `usert`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `usert`
--
ALTER TABLE `usert`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
