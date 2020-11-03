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
-- Table structure for table `screening`
--

CREATE TABLE IF NOT EXISTS `screening` (
  `date` date NOT NULL,
  `timeslotId` int(11) NOT NULL,
  `seatsTaken` varchar(150) NOT NULL,
  `movieId` int(11) NOT NULL,
  `screeningId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`screeningId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`date`, `timeslotId`, `seatsTaken`, `movieId`, `screeningId`) VALUES
('2020-11-09', 1, 'C3,C4,E1,E2,E7,E8,D7,D8', 1, 1),
('2020-11-09', 2, 'E3,E4,E5,E6', 2, 2),
('2020-11-09', 3, 'E5,E6,E8,E9', 1, 3),
('2020-11-09', 4, '', 2, 4),
('2020-11-09', 5, '', 1, 5),
('2020-11-09', 6, 'E1,E2', 3, 6),
('2020-11-09', 7, 'E4,E5', 4, 7),
('2020-11-09', 8, '', 3, 8),
('2020-11-09', 9, '', 4, 9),
('2020-11-09', 10, '', 5, 10),
('2020-11-09', 11, '', 6, 11),
('2020-11-09', 12, '', 5, 12),
('2020-11-09', 13, '', 6, 13),
('2020-11-09', 14, '', 7, 14),
('2020-11-09', 15, '', 8, 15),
('2020-11-10', 1, '', 8, 16),
('2020-11-10', 2, '', 7, 17),
('2020-11-10', 3, '', 8, 18),
('2020-11-10', 5, '', 2, 20),
('2020-11-10', 6, '', 1, 21),
('2020-11-10', 7, '', 2, 22),
('2020-11-10', 8, '', 3, 23),
('2020-11-10', 9, '', 4, 24),
('2020-11-10', 10, '', 3, 25),
('2020-11-10', 11, '', 4, 26),
('2020-11-10', 12, '', 5, 27),
('2020-11-10', 13, '', 6, 28),
('2020-11-10', 14, '', 5, 29),
('2020-11-10', 15, '', 6, 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
