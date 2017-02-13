-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net

-- Server version: 10.0.28-MariaDB
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `Subscriber`
--

CREATE TABLE `Subscriber` (
  `ID_Subscriber` int(11) NOT NULL COMMENT 'Subscriber index',
  `FirstName` varchar(255) NOT NULL COMMENT 'The first name.',
  `LastName` varchar(255) NOT NULL COMMENT 'The last name.',
  `Email` varchar(255) NOT NULL COMMENT 'The email.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The table for a newsletter subscriber.';

--
-- Indexes for table `Subscriber`
--
ALTER TABLE `Subscriber`
  ADD PRIMARY KEY (`ID_Subscriber`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for table `Subscriber`
--
ALTER TABLE `Subscriber`
  MODIFY `ID_Subscriber` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Subscriber index';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
