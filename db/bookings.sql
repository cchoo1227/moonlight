-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 03:30 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `ticketType`, `totalPrice`, `screeningId`, `seats`, `transactionKey`) VALUES
(5, 'adult', 20, 6, 'E6,E7', '18829369'),
(6, 'student', 12, 6, 'E2,E3', '99979798'),
(7, 'adult', 20, 2, 'E2,E3', '99979798');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
