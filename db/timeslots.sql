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
-- Table structure for table `timeslots`
--

CREATE TABLE IF NOT EXISTS `timeslots` (
  `time` time NOT NULL,
  `screen` int(11) NOT NULL,
  `timeslotId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`timeslotId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`time`, `screen`, `timeslotId`) VALUES
('09:00:00', 1, 1),
('12:00:00', 1, 2),
('15:00:00', 1, 3),
('19:00:00', 1, 4),
('21:00:00', 1, 5),
('09:00:00', 2, 6),
('12:00:00', 2, 7),
('15:00:00', 2, 8),
('19:00:00', 2, 9),
('21:00:00', 2, 10),
('09:00:00', 3, 11),
('12:00:00', 3, 12),
('15:00:00', 3, 13),
('19:00:00', 3, 14),
('21:00:00', 3, 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
