-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2018 at 05:45 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova2`
--

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

DROP TABLE IF EXISTS `classifications`;
CREATE TABLE IF NOT EXISTS `classifications` (
  `classificationId` int(11) NOT NULL AUTO_INCREMENT,
  `classificationSimbol` char(2) DEFAULT NULL,
  `classificationDesc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`classificationId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`classificationId`, `classificationSimbol`, `classificationDesc`) VALUES
(1, 'L', 'Livre'),
(2, '10', 'Não recomendado para menores de 10 anos'),
(3, '12', 'Não recomendado para menores de 12 anos'),
(4, '14', 'Não recomendado para menores de 14 anos'),
(5, '16', 'Não recomendado para menores de 16 anos'),
(6, '18', 'Não recomendado para menores de 18 anos');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `genreId` int(11) NOT NULL AUTO_INCREMENT,
  `genreName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`genreId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreId`, `genreName`) VALUES
(1, 'Sci-Fi'),
(2, 'Action'),
(3, 'Drama'),
(4, 'Comedies'),
(5, 'Romance'),
(6, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movieId` int(11) NOT NULL AUTO_INCREMENT,
  `movieName` varchar(300) DEFAULT NULL,
  `movieDesc` varchar(600) DEFAULT NULL,
  `movieDuration` time DEFAULT NULL,
  `movieClassificationId` int(11) NOT NULL,
  `movieGenreId` int(11) DEFAULT NULL,
  PRIMARY KEY (`movieId`),
  KEY `movieGenreId` (`movieGenreId`),
  KEY `movieClassificationId` (`movieClassificationId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `movieName`, `movieDesc`, `movieDuration`, `movieClassificationId`, `movieGenreId`) VALUES
(1, 'The Nun', 'When a young nun at a cloistered abbey in Romania takes her own life, a priest with a haunted past and a novitiate on the threshold of her final vows are sent by the Vatican to investigate. Together, they uncover the order\'s unholy secret. Risking not only their lives but their faith and their very souls, they confront a malevolent force in the form of a demonic nun.', '01:36:00', 4, 6),
(2, 'Interstellar', 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand (Michael Caine), a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home via a wormhole.', '02:49:00', 2, 1),
(3, 'The Equalizer', 'Robert McCall (Denzel Washington), a man of mysterious origin who believes he has put the past behind him, dedicates himself to creating a quiet new life. However, when he meets Teri (Chloë Grace Moretz), a teenager who has been manhandled by violent Russian mobsters, he simply cannot walk away.', '02:12:00', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(320) DEFAULT NULL,
  `userLogin` varchar(60) DEFAULT NULL,
  `userPw` char(32) DEFAULT NULL,
  `userType` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userLogin`, `userPw`, `userType`) VALUES
(1, 'Rodrigo Chireia', 'rodrigo.pinho', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(2, 'Rayane Alves', 'rayane.alves', '81dc9bdb52d04dc20036dbd8313ed055', 'Normal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
