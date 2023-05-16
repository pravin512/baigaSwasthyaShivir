-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2023 at 08:31 AM
-- Server version: 10.11.2-MariaDB
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--
CREATE DATABASE IF NOT EXISTS `health` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `health`;

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

DROP TABLE IF EXISTS `patient_data`;
CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `fatherHusband` varchar(50) DEFAULT NULL,
  `mother` varchar(50) DEFAULT NULL,
  `weight` varchar(11) DEFAULT NULL,
  `height` varchar(11) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `aadhar` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `tahsil` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `vibhag` varchar(50) NOT NULL,
  `otherdisease` varchar(50) DEFAULT NULL,
  `patientStatus` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `prescription` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `registration_number` int(11) NOT NULL,
  `patient_status_when_other` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `name`, `age`, `fatherHusband`, `mother`, `weight`, `height`, `sex`, `aadhar`, `mobile`, `tahsil`, `address`, `vibhag`, `otherdisease`, `patientStatus`, `created_at`, `updated_at`, `prescription`, `added_by`, `registration_number`, `patient_status_when_other`) VALUES
(1, 'Teena', '33', 'Donald', '', '', '', 'Female', '', '7987547763', 'kawardha', '', 'gynecology', '', 'PSKSTDH', '2023-05-15 13:03:40', '2023-05-15 13:03:40', '/test', 2, 101, ''),
(2, 'Devon', '33', 'Tod', '', '', '', 'Female', '', '7987547763', 'kawardha', '', 'gynecology', '', 'PSKSTDH', '2023-05-15 13:03:40', '2023-05-15 13:03:40', '/test', 2, 101, ''),
(3, 'Ted', '33', 'Baily', '', '', '', 'Male', '', '7987547763', 'kawardha', '', 'eye', '', 'PSKTAC', '2023-05-15 14:17:21', '2023-05-15 14:17:21', '/test', 2, 103, ''),
(4, 'Alex', '33', 'Swain', '', '', '', 'Male', '', '7987547763', 'kawardha', '', 'orthopedic', '', 'PSKTAC', '2023-05-16 06:45:33', '2023-05-16 06:45:33', '/test', 2, 101, ''),
(5, 'Justin', '33', 'Jon snow', '', '', '', 'Male', '', '7987547763', 'pandariya', '', 'neurology', '', 'PSKTAC', '2023-05-16 07:12:45', '2023-05-16 07:12:45', '/test', 2, 101, ''),
(6, 'Christina', '24', '', '', '', '', 'male', '', '', 'bodla', '', 'ENT', '', 'DHSTHC', '2023-05-16 07:40:10', '2023-05-16 07:40:10', '/test', 3, 400, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `tahsil` varchar(50) DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `tahsil`, `status`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL, 1),
(2, 'Pravin', 'pravinPSK', 'e10adc3949ba59abbe56e057f20f883e', 'PHC', 'kawardha', 1),
(3, 'Pravin', 'pravinDH', 'e10adc3949ba59abbe56e057f20f883e', 'DH', 'kawardha', 1),
(4, 'phckawardha', 'phckawardha', '5d4a648b0a5de3eb4fa829d2cd1f39e6', 'PHC', 'kawardha', 1),
(5, 'dhkawardha', 'dhkawardha', '88a2b12e68bf5081eb8212b6598f27b1', 'DH', 'kawardha', 1),
(6, 'actw', 'actw', '491f0cb232020635c9b04e9dc7ffcbcc', 'ACT', 'kawardha', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
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
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
