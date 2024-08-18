-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 11:21 AM
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
-- Database: `login_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(9, 'Rohit', 'Pawar', 'Rohitpawar@gmail.com', '$2y$10$zZ1v.I.McHnHtvr6RM.2FeAO2xL5zEykB98dekEiLBjvJ8DSnTAxi', '2024-02-22 09:11:27'),
(10, 'abhijeet', 'ekhande', 'abhijeetekhande43@gmail.com', '$2y$10$LPGg.M3yeOA0XuzAhmFz5.sc.3rUYU.Eq.OIaJGvSGMogdksMPQPi', '2024-02-22 10:36:59'),
(12, 'Pratik', 'Badgujar', 'Vicky@gmail.com', '$2y$10$VEJ8wvtH/APgTeJ85xVojevM1zmB.1Bv1Cp0IQp2RMC6IEqQ8IWfO', '2024-02-22 10:53:01'),
(13, 'asfsafcsacdsfds', 'dfdsfd', 'safsafsadfa@gmail.com', '$2y$10$g0qwJu26BDAqFar7UzG/t.oTVjziLwnc/G./iuVHMT7U.WW4gl5r.', '2024-02-22 13:16:13'),
(14, 'Dipak', 'Firake', 'dcfirake2@gmail.com', '$2y$10$B5R8DxFLAuHvFSw/b1Okh.hW58Uh1k7Net8NqNjg1a1sVnPh2rjwq', '2024-02-22 14:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `U_ID` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(38, '', '', '', '$2y$10$DYQqjKvZFcSJXc8unaJVi.ddFRpShpliLStNB0GqkhdzqCDxVSP5G', '2024-02-21 17:44:31'),
(41, 'Rohit', 'Pawar', 'Rohitpawar@gmail.com', '$2y$10$ff5N0t1RhrCDQSGcUWJBzeDc9AUb3SwPlI/7lragMJt2GCrT6UsSe', '2024-02-21 17:46:12'),
(42, 'abhijeet', 'ekhande', 'abhijeetekhande43@gmail.com', '$2y$10$VBSuYtd8cD4pg1CDNw/cXuVq36uDyWIINnxXs45POtzsnGnjuB1gm', '2024-02-21 17:51:38'),
(44, 'Pratik', 'Badgujar', 'Vicky@gmail.com', '$2y$10$ckhj8rIiTUmdvb9KBNULm.jiL6gT4xNfmFAooEtEH1uo6c8p0KDZC', '2024-02-22 09:09:02'),
(45, 'abhu', 'ekhande', 'abhaaaijsssseetessssskhande43@gmail.com', '$2y$10$0xNILm2GJF5O4LRZUT0Gc.6vTLZTkrJAVcpppDuk2NUTNbyHn7lIq', '2024-02-22 09:58:17'),
(46, 'Suyog', 'Pagar', 'suyog@gmail.com', '$2y$10$x8FkEQQaNAsQIj5gqv2wKe.QlAbHns07NXndgaSp6UMag0Fj1qxYW', '2024-02-22 10:31:07'),
(48, 'asfsaaafcsacdsfds', 'dfdsfd', 'safaasafsadfa@gmail.com', '$2y$10$/7Qht478UINtyFr.Pgal1eyN9ghNo8/6q9mCWwaNOwD1AYT5Scayi', '2024-02-22 13:14:29'),
(50, 'Dipak', 'Firake', 'dcfirake2@gmail.com', '$2y$10$aqGtGeLqei5IEjbpkLgRwuuBonvccUGGxT2qq.y.hEll/UqXPglbq', '2024-02-22 14:27:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`U_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `U_ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
