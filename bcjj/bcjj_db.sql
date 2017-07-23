-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 04:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcjj_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_labs`
--

CREATE TABLE `g_labs` (
  `id` int(11) NOT NULL,
  `subscriber_number` varchar(100) NOT NULL,
  `access_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NO` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `PLATFORM` varchar(100) NOT NULL,
  `CONTACTNO` varchar(15) NOT NULL,
  `SMSSETUP` varchar(10) NOT NULL,
  `TIME` varchar(50) NOT NULL,
  `TO_LOCATION` varchar(500) NOT NULL,
  `FROM_LOCATION` varchar(500) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `DELETION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NO`, `NAME`, `EMAIL`, `PASSWORD`, `PLATFORM`, `CONTACTNO`, `SMSSETUP`, `TIME`, `TO_LOCATION`, `FROM_LOCATION`, `DATE`, `DELETION`) VALUES
(1, 'Johnmark Abril', 'johnmarkabril@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'Local', '09208317004', 'YES', '10:24 AM', 'Guillermo Gagalangin Tondo, Manila', 'Ayala Avenue', 'July 23, 2017', 0),
(4, 'Jm Abril', '1685771221436281@facebook.com', '9849c740ae4f7650ef1eb88e272d20f6', 'Facebook', '', 'NO', '', '', '', 'July 24, 2017', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_labs`
--
ALTER TABLE `g_labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_labs`
--
ALTER TABLE `g_labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
