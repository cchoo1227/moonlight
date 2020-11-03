-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2020 at 08:17 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingId` int(11) NOT NULL AUTO_INCREMENT,
  `ticketType` varchar(20) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `screeningId` int(11) NOT NULL,
  `seats` varchar(150) NOT NULL,
  `transactionKey` varchar(30) NOT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `ticketType`, `totalPrice`, `screeningId`, `seats`, `transactionKey`) VALUES
(1, 'adult', 40, 1, 'C3,C4,E1,E2', '49261110'),
(2, 'student', 12, 6, 'E1,E2', '49261110'),
(3, 'adult', 20, 2, 'E3,E4', '33390639'),
(4, 'adult', 20, 2, 'E5,E6', '22959142'),
(5, 'student', 12, 1, 'E7,E8', '07707582'),
(6, 'adult', 20, 1, 'D7,D8', '05465021'),
(7, 'adult', 20, 7, 'E4,E5', '05465021'),
(8, 'adult', 20, 3, 'E5,E6', '70699014'),
(9, 'adult', 20, 3, 'E8,E9', '70699014');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
