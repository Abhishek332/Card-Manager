-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 09:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `card-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `Sr.` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `cpassword` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `whatsapp` int(10) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `company` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` blob NOT NULL,
  `github` varchar(1200) NOT NULL,
  `linkedin` varchar(1200) NOT NULL,
  `twitter` varchar(1200) NOT NULL,
  `instagram` varchar(1200) NOT NULL,
  `facebook` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`Sr.`, `fname`, `lname`, `email`, `password`, `cpassword`, `phone`, `whatsapp`, `address`, `company`, `designation`, `photo`, `github`, `linkedin`, `twitter`, `instagram`, `facebook`) VALUES
(1, '', '', 'mstax2018@gmail.com', '$2y$10$4Lo3V/Ky', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(2, '', '', 'abhishek@gmail.com', '$2y$10$3C8x0txz', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(3, '', '', 'payal@gmail.com', '$2y$10$iXAqXvMr', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(4, '', '', 'mohan@gmail.com', '$2y$10$tmfENue0', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(5, '', '', 'rajiv@gmail.com', '$2y$10$wq2MEeLL', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(6, '', '', 'rajesh@gmail.com', '$2y$10$0Un2DWV8', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(7, '', '', 'rahul@gmail.com', '$2y$10$5/CHl/TK', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(8, '', '', 'sharda@gmail.com', '$2y$10$0XvYZ.Lt', '', 0, 0, '', '', '', '', '', '', '', '', ''),
(9, '', '', 'yuvraj@gmail.com', '$2y$10$qKsWXsXd', '', 0, 0, '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`Sr.`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `Sr.` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
