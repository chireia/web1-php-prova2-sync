-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2018 at 01:27 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chireia_soh`
--

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `classificationId` int(11) NOT NULL,
  `classificationSimbol` char(2) DEFAULT NULL,
  `classificationDesc` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `genres` (
  `genreId` int(11) NOT NULL,
  `genreName` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreId`, `genreName`) VALUES
(1, 'Sci-Fi'),
(2, 'Action'),
(3, 'Drama'),
(4, 'Comedy'),
(5, 'Romance'),
(6, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieId` int(11) NOT NULL,
  `movieName` varchar(300) NOT NULL,
  `movieDesc` varchar(600) NOT NULL,
  `movieDuration` int(4) UNSIGNED NOT NULL,
  `movieClassificationId` int(11) NOT NULL,
  `movieGenreId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `movieName`, `movieDesc`, `movieDuration`, `movieClassificationId`, `movieGenreId`) VALUES
(1, 'The Nun', 'When a young nun at a cloistered abbey in Romania takes her own life, a priest with a haunted past and a novitiate on the threshold of her final vows are sent by the Vatican to investigate. Together, they uncover the order\'s unholy secret. Risking not only their lives but their faith and their very souls, they confront a malevolent force in the form of a demonic nun.', 96, 6, 6),
(2, 'Interstellar', 'In Earth\'s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand (Michael Caine), a brilliant NASA physicist, is working on plans to save mankind by transporting Earth\'s population to a new home via a wormhole.', 169, 2, 1),
(3, 'The Equalizer', 'Robert McCall (Denzel Washington), a man of mysterious origin who believes he has put the past behind him, dedicates himself to creating a quiet new life. However, when he meets Teri (Chloï¿½ Grace Moretz), a teenager who has been manhandled by violent Russian mobsters, he simply cannot walk away.', 132, 5, 2),
(30, 'Teste5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum ultrices dolor, eget auctor sem elementum quis. Aliquam eu risus iaculis, congue arcu id, congue risus. Ut nec condimentum tortor, vitae porta neque. Mauris quam sem, pulvinar non dolor vel, semper suscipit metus. Morbi metus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum ultrices dolor, eget auctor sem elementum quis. Aliquam eu risus iaculis, congue arcu id, congue risus. Ut nec condimentum tortor, vitae porta neque. Mauris quam sem, pulvinar non dolor vel, semper suscipit metus. Morbi metus.', 94, 1, 4),
(31, 'Test2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum ultrices dolor, eget auctor sem elementum quis. Aliquam eu risus iaculis, congue arcu id, congue risus. Ut nec condimentum tortor, vitae porta neque. Mauris quam sem, pulvinar non dolor vel, semper suscipit metus. Morbi metus.', 68, 2, 3),
(32, 'Test3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum ultrices dolor, eget auctor sem elementum quis. Aliquam eu risus iaculis, congue arcu id, congue risus. Ut nec condimentum tortor, vitae porta neque. Mauris quam sem, pulvinar non dolor vel, semper suscipit metus. Morbi metus.', 78, 4, 5),
(33, 'Test4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed lectus sit amet ligula ultricies gravida. Praesent a leo eros. Praesent sagittis faucibus ornare. Nullam dignissim nunc sapien, id eleifend nulla suscipit id. Etiam vestibulum commodo hendrerit. In elementum ipsum aenean suscipit.', 88, 5, 2),
(34, '50 Tons de Cinza 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed lectus sit amet ligula ultricies gravida. Praesent a leo eros. Praesent sagittis faucibus ornare. Nullam dignissim nunc sapien, id eleifend nulla suscipit id. Etiam vestibulum commodo hendrerit. In elementum ipsum aenean suscipit.', 120, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(320) DEFAULT NULL,
  `userLogin` varchar(60) DEFAULT NULL,
  `userPw` char(32) DEFAULT NULL,
  `userType` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userLogin`, `userPw`, `userType`) VALUES
(1, 'Rodrigo', 'rodrigo.pinho', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(2, 'Rayane', 'rayane.alves', '81dc9bdb52d04dc20036dbd8313ed055', 'Normal'),
(3, 'Anderson', 'anderson.oliver', '81dc9bdb52d04dc20036dbd8313ed055', 'Normal'),
(4, 'Erik', 'erik.santos', '81dc9bdb52d04dc20036dbd8313ed055', 'Normal'),
(5, 'Jao', 'joao.victor', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreId`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`),
  ADD KEY `movieGenreId` (`movieGenreId`),
  ADD KEY `movieClassificationId` (`movieClassificationId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
