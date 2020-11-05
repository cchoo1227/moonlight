-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2020 at 07:01 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f38ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `particulars`
--

CREATE TABLE IF NOT EXISTS `particulars` (
  `bookingarray` varchar(50) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `dateofbirth` varchar(50) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `transactionKey` varchar(30) NOT NULL,
  PRIMARY KEY (`transactionKey`),
  UNIQUE KEY `customername` (`customername`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `particulars`
--

INSERT INTO `particulars` (`bookingarray`, `customername`, `dateofbirth`, `contactnumber`, `email`, `transactionKey`) VALUES
('1', 'Choo', '1998-12-27', '90000000', 'ss@heh.com', '56153986'),
('2,3,4', 'Hi', '1993-12-15', '98765432', 'ss@hehsss.com', '92202274');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
