-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 27, 2023 at 08:30 PM
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
-- Database: `db_bookingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `organisation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `surname`, `email`, `position`, `organisation`, `password`, `urole`) VALUES
(15, 'Danai', 'Jantapalaboon', 'danai.athlon@gmail.com', 'นักวิทยาศาสตร์การแพทย์ปฏิบัติการ', '', '$2y$10$2XynJyx/yUAp.B5baY1c/eG.rHNGAQ4Jk654ydkrjfoznPmTg0AYG', 'user'),
(16, 'Thippawan', 'Khongnium', 'Tiktok1988@gmail.com', 'ATMP Production Specialist', 'sodsaisoft', '$2y$10$g/X98bCjlldb.sHwgGA7KOGSLJFWJFWL9Il/HAZO/STpP7LPRV/wC', 'user'),
(17, 'ดนัย', 'จันทพลาบูรณ์', 'danai_athlon@hotmail.com', 'ATMP Facility', '', '$2y$10$LPM1DfIuqA9mB0FOQhs3y.Rpph7W8QFf1.MjqC5iSgeyBNpt.9N/C', 'user'),
(18, 'Dana', 'Chan', 'dana.c@gmail.com', 'Hogwarts\' Student', '', '$2y$10$mxLB/ner7Gz0HMKVnVq2.eas6fhNkwxvW9TlKVk/lw0n35A1uTpTm', 'user'),
(19, 'Dana', 'Chan', 'dana.chan@gmail.com', 'Hogwarts\' Student', '', '$2y$10$zZJny1kdfrLp2QDMh3ZG/OthZxQRe4piujDwPPtGJiUboaCwd3hO6', 'user'),
(20, 'test11', 'test', 'test11@gmail.com', 'master', '123', '$2y$10$9tmf7UttyB42bCpHeqjH6u1JrDHS.6aSryX.45uwH0Q.J9E2pvghe', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `scheduler` varchar(50) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `editby` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `scheduler`, `purpose`, `room`, `start`, `end`, `editby`, `timestamp`) VALUES
(35, 'Danai Jantapalaboon ', 'ทดสอบเวลา003CR106', 'Cleanroom 106', '2022-08-05', '2022-08-05', 'Thippawan Khongnium', '2022-08-03 12:09:08'),
(36, 'Danai Jantapalaboon ', 'AABBCR304', 'Cleanroom 304', '2022-08-04', '2022-08-05', 'Danai Jantapalaboon', '2022-08-03 13:23:02'),
(39, 'Danai Jantapalaboon ', 'test confirm booking123', 'Cleanroom 106', '2022-08-04', '2022-08-05', '', '2022-08-03 11:55:14'),
(40, 'Thippawan Khongnium ', 'test001', 'Lab 106', '2022-08-10', '2022-08-10', '', '2022-08-03 12:56:38'),
(41, 'Danai Jantapalaboon ', 'AABB', 'Cleanroom 304', '2022-08-06', '2022-08-09', '', '2022-08-03 13:06:33'),
(42, 'Thippawan Khongnium ', 'ทดสอบจองใหม่', 'Cleanroom 304', '2022-08-17', '2022-08-17', '', '2022-08-03 13:08:27'),
(43, 'Danai Jantapalaboon ', 'ทดสอบทดสอบ', 'Cleanroom 106', '2022-08-11', '2022-08-12', '', '2022-08-03 13:14:04'),
(44, 'Danai Jantapalaboon ', 'delete 12a', 'Cleanroom 304', '2022-08-21', '2022-08-21', '', '2022-08-03 13:17:52'),
(45, 'Dana Chan ', 'test new account2', 'Cleanroom 304', '2022-08-19', '2022-08-20', 'Dana Chan', '2022-08-04 16:02:12'),
(46, 'Dana Chan ', 'ทดสอบจอง 2', 'Lab 307', '2022-08-03', '2022-08-03', '', '2022-08-03 13:35:47'),
(47, 'Danai Jantapalaboon ', 'ทดสอบจองหลังแก้ bug', 'Lab 307', '2022-08-12', '2022-08-13', '', '2022-08-04 15:34:39'),
(48, 'Dana Chan ', 'จองทดสอบ 3', 'Lab 106', '2022-08-15', '2022-08-17', '', '2022-08-04 16:01:14'),
(50, 'Thippawan Khongnium ', 'ทดสอบจองหลัง filter', 'Lab 106', '2022-08-09', '2022-08-10', '', '2022-08-07 04:49:00'),
(51, 'Danai Jantapalaboon ', 'ทดสอบ 023', 'Room2', '2023-06-29', '2023-06-30', '', '2023-06-27 18:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
