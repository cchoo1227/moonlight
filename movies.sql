-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2020 at 02:47 PM
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
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `name` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `movieId` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`movieId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`name`, `desc`, `rating`, `movieId`, `image`) VALUES
('Black Panther', 'After the death of his father, T''Challa returns home to the African nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T''Challa''s mettle as king -- and as Black Panther -- gets tested when he''s drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.', 'PG13', 1, 'images/blackpanther-poster.jpg'),
('Mulan', 'To save her ailing father from serving in the Imperial Army, a fearless young woman disguises herself as a man to battle northern invaders in China.', 'PG13', 2, 'images/mulan-poster.jpg'),
('Parasite', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', 'R', 3, 'images/parasite-poster.jpg'),
('Tenet', 'The future has declared war on the present because it''s upset about climate change. To do so, it uses a technology called “inversion,” by which objects and people can travel backward in the flow of time by reversing their entropy. A secret agent embarks on a dangerous, time-bending mission to prevent the start of World War III.', 'PG13', 4, 'images/tenet-poster.jpg'),
('Beauty and the Beast', 'An arrogant young prince (Robby Benson) and his castle''s servants fall under the spell of a wicked enchantress, who turns him into the hideous Beast until he learns to love and be loved in return. The spirited, headstrong village girl Belle (Paige O''Hara) enters the Beast''s castle after he imprisons her father Maurice (Rex Everhart). With the help of his enchanted servants, including the matronly Mrs. Potts (Angela Lansbury), Belle begins to draw the cold-hearted Beast out of his isolation.', 'PG13', 5, 'images/beauty-poster.jpg'),
('Avengers: Endgame', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.', 'PG13', 6, 'images/avengers-poster.jpg'),
('Aladdin', 'Aladdin is a lovable street urchin who meets Princess Jasmine, the beautiful daughter of the sultan of Agrabah. While visiting her exotic palace, Aladdin stumbles upon a magic oil lamp that unleashes a powerful, wisecracking, larger-than-life genie. As Aladdin and the genie start to become friends, they must soon embark on a dangerous mission to stop the evil sorcerer, Jafar, from overthrowing young Jasmine''s kingdom.', 'PG13', 7, 'images/aladdin-poster.jpg'),
('Blade Runner 2049', 'Officer K (Ryan Gosling), a new blade runner for the Los Angeles Police Department, unearths a long-buried secret that has the potential to plunge what''s left of society into chaos. His discovery leads him on a quest to find Rick Deckard (Harrison Ford), a former blade runner who''s been missing for 30 years.', 'R', 8, 'images/bladerunner-poster.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
