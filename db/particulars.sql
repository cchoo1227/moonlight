-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2020 at 08:18 PM
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
('6,7', 'hi', '2020-11-18', '123', 'ss@heh.com', '05465021'),
('5', 'ddasdd', '2020-11-12', '333', 'ss@heh.com', '07707582'),
('4', 'ssssss', '2020-11-13', '123', 'ss@heh.com', '22959142'),
('3', 'ddd', '2020-10-26', '123', 'ss@heh.com', '33390639'),
('1,2', 'Choo', '2020-10-05', '123', 'ccc@dsd.com', '49261110'),
('8,9', 'Lucy', '2020-10-13', '123', 'ss@heh.com', '70699014');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
