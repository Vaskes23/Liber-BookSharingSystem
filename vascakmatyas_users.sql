-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 05:50 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vascakmatyas_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `role` int(3) NOT NULL DEFAULT '0',
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `createdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`, `email`, `vkey`, `verified`, `createdate`) VALUES
(10, 'saturnin', 0, '2a6ec10fd03689b8045364a00f2d3a4f', 'matyasvascak@gmail.com', '0a3859f798e4b4a2ac948971203c0ca8', 0, '2021-05-05 15:22:21.406601'),
(11, 'ahojda', 0, '5da39f38b5a9ec024878d18b097b2fa7', 'matyasvascak@gmail.com', 'e82821ecb5477a58dfcb5cdbaba61147', 1, '2021-05-05 15:22:49.072691'),
(12, 'admin', 2, '21232f297a57a5a743894a0e4a801fc3', 'matyasvascak@gmail.com', '6607e8e6936a148483ae63650c297b9e', 1, '2021-05-07 11:39:59.294080'),
(13, 'vaskes', 0, '5112d96bf01c7302499228624f1bff4b', 'matyasvascak@gmail.com', 'f72672f5cb71f64ca8c11de8b91fbb32', 0, '2021-05-07 19:49:27.512800'),
(14, 'basic', 0, 'f17aaabc20bfe045075927934fed52d2', 'matyasvascak@gmail.com', '3bfd3ed26b36fa06dadeac2cc2aa1901', 1, '2021-05-14 18:49:53.587735'),
(15, 'gusto', 1, '66281aa9c8d17fdf7c1a4aa42f806508', 'matyasvascak@gmail.com', 'de6a0710194ebdaf6ea13246b6713b8e', 1, '2021-05-17 17:50:31.618597'),
(25, 'janek', 0, '11603dcbcfdd6af7d3038770957533bd', 'matyasvascak@gmail.com', '1b947f28f35fb88ca85c7a4df5fb1302', 1, '2021-05-27 22:50:50.399166');

-- --------------------------------------------------------

--
-- Table structure for table `watched`
--

CREATE TABLE `watched` (
  `userID` int(11) NOT NULL,
  `movNum` int(11) DEFAULT '0',
  `movie0` int(11) DEFAULT NULL,
  `movie1` int(11) DEFAULT NULL,
  `movie2` int(11) DEFAULT NULL,
  `movie3` int(11) DEFAULT NULL,
  `movie4` int(11) DEFAULT NULL,
  `movie5` int(11) DEFAULT NULL,
  `movie6` int(11) DEFAULT NULL,
  `movie7` int(11) DEFAULT NULL,
  `movie8` int(11) DEFAULT NULL,
  `movie9` int(11) DEFAULT NULL,
  `movie10` int(11) DEFAULT NULL,
  `movie11` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watched`
--

INSERT INTO `watched` (`userID`, `movNum`, `movie0`, `movie1`, `movie2`, `movie3`, `movie4`, `movie5`, `movie6`, `movie7`, `movie8`, `movie9`, `movie10`, `movie11`) VALUES
(1, NULL, 96, 96, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 9, 52, 52, 53, 71, 73, 76, 80, 108, 113, NULL, NULL, NULL),
(14, 12, 96, 96, 95, 54, 97, 77, 107, 75, 102, 76, 94, 104),
(15, 6, 54, 54, 53, 73, 74, 77, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 5, 54, 53, 54, 71, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `userID` int(11) NOT NULL,
  `movNum` int(11) DEFAULT '0',
  `movie1` int(11) DEFAULT NULL,
  `movie2` int(11) DEFAULT NULL,
  `movie3` int(11) DEFAULT NULL,
  `movie4` int(11) DEFAULT NULL,
  `movie5` int(11) DEFAULT NULL,
  `movie6` int(11) DEFAULT NULL,
  `movie7` int(11) DEFAULT NULL,
  `movie8` int(11) DEFAULT NULL,
  `movie9` int(11) DEFAULT NULL,
  `movie10` int(11) DEFAULT NULL,
  `movie0` int(11) DEFAULT NULL,
  `movie11` int(11) DEFAULT NULL,
  `movie12` int(11) DEFAULT NULL,
  `movie13` int(11) DEFAULT NULL,
  `movie14` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`userID`, `movNum`, `movie1`, `movie2`, `movie3`, `movie4`, `movie5`, `movie6`, `movie7`, `movie8`, `movie9`, `movie10`, `movie0`, `movie11`, `movie12`, `movie13`, `movie14`) VALUES
(0, 5, NULL, 52, 106, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 11, 54, NULL, 75, NULL, 76, 78, NULL, 97, 106, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 15, 71, 53, NULL, NULL, NULL, 74, 73, 52, 72, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 3, 94, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 4, 52, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watched`
--
ALTER TABLE `watched`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
