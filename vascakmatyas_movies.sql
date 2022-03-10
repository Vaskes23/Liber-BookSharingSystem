-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 05:49 PM
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
-- Database: `vascakmatyas_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `text` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `text`, `image`, `description`) VALUES
(31, 'Dan Gilroy', 'He worked in the industry for decades', 'dan.jpeg', 'He worked in the industry for decades was amassing credits before scoring his first major hit with the thriller \"Nightcrawler\" (2014),'),
(42, 'Steven Spielberg', 'The most influential person in the cinema', 'stevenSpielberg.jpg', 'One of the most influential personalities in the history of cinema, Steven Spielberg is Hollywoods best known director and one of the wealthiest filmmakers in the world.'),
(43, 'Todd Phillips', 'He is a producer and director', 'toddPhillips.jpg', 'Todd Phillips was born on December 20, 1970 in Brooklyn, New York City, New York, USA as Todd Bunzl.'),
(44, 'Christopher Nolan', 'Best known for his cerebral storytelling', 'christopherNolan.jpg', 'Best known for his cerebral, often nonlinear, storytelling, acclaimed writer-director Christopher Nolan was born on July 30, 1970, in London, England.'),
(45, 'Quentin Tarantino', 'Quentin Tarantino was born in Tennessee', 'quentinTarrantino.jpg', 'In January of 1992, first-time writer-director Tarantino Reservoir Dogs (1992) appeared at the Sundance Film Festival. '),
(46, 'BOB', 'The greatest director in human history', 'bob.jpg', 'One of the most talented human being in all of history');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `text` varchar(50) DEFAULT NULL,
  `category` int(2) DEFAULT NULL,
  `wishList` int(1) NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `director` varchar(45) DEFAULT NULL,
  `criticScore` int(101) NOT NULL DEFAULT '10',
  `audienceScore` int(101) NOT NULL DEFAULT '10',
  `criticScoreN` int(255) NOT NULL DEFAULT '0',
  `audienceScoreN` int(255) NOT NULL DEFAULT '0',
  `genre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `text`, `category`, `wishList`, `image`, `link`, `description`, `director`, `criticScore`, `audienceScore`, `criticScoreN`, `audienceScoreN`, `genre`) VALUES
(52, 'JOKER', 'Great Movie Featuring Quaqin Phoenix.', 0, 0, 'Joker.jpg', 'https://www.youtube.com/watch?v=zAGVQLHvwOY&t=4s&ab_channel=WarnerBros.Pictures', 'Failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks one he paints for a job, and the guise he projects in an attempt to be part of the world.', 'Todd Phillips', 48, 62, 8, 8, 'drama'),
(53, 'Parasite', 'Incredible picture, that will give you goosebumps.', 0, 0, 'parasite.jpg', 'https://www.youtube.com/watch?v=5xH0HfJHsaY&t=4s&ab_channel=IGN', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', 'Bong Joon-ho', 84, 38, 5, 4, 'drama'),
(54, 'TRANSLATION', 'Effectively balancing humor and subtle pathos', 0, 0, 'lostInTranslation.jpeg', 'https://www.youtube.com/watch?v=W6iVPCRflQM&ab_channel=MovieclipsClassicTrailers', '. Strangers in a foreign land, the two find escape, distraction and understanding amidst the bright Tokyo lights', 'Sofia Coppola', 57, 78, 9, 11, 'drama'),
(71, 'GODZILLA VS KONG', 'This long-awaited blockbuster matchup', 0, 0, 'KongGodzilla.jpeg', 'https://www.youtube.com/watch?v=odM92ap8_c0&t=1s&ab_channel=WarnerBros.Pictures', 'Legends collide in \"Godzilla vs. Kong\" as these mythic adversaries meet in a spectacular battle for the ages, with the fate of the world hanging in the balance.', 'Adam Wingard', 10, 75, 0, 2, 'action'),
(72, '76 Days', 'A raw recounting of hospital life in Wuhan', 0, 0, '76_Days_poster.jpeg', 'https://www.youtube.com/watch?v=KpYhePFx1qo&ab_channel=ParamountMovies', 'A raw, fly-on-the-wall recounting of hospital life in Wuhan in the early days of the COVID-19 pandemic, 76 Days is an engrossing and potent documentary - and a surprisingly comforting portrait of humanity.', 'Hao Wu', 73, 10, 7, 0, 'drama'),
(73, 'GUNDA', 'Gunda takes an look at farm life', 0, 0, 'Gunda.png', 'https://www.youtube.com/watch?v=05Gc2lANyTQ&ab_channel=ElevationPictures', 'Experiential cinema in its purest form, GUNDA chronicles the unfiltered lives of a mother pig, a flock of chickens, and a herd of cows with masterful intimacy.', 'Victor Kossakowsky', 77, 10, 3, 0, 'horror'),
(74, 'I CARE A LOT', 'A searing swipe at late-stage capitalism', 0, 0, 'iCareALot.jpeg', 'https://www.youtube.com/watch?v=D40uHmTSPew&ab_channel=Netflix', 'Poised with sharklike self-assurance a professional, court-appointed guardian for dozens of elderly wards whose assets she seizes and cunningly bilks through dubious but legal means.', 'J Blakeson', 10, 10, 0, 0, 'drama'),
(75, 'good place', 'Follows Eleanor,woman who enters the afterlife', 1, 0, 'goodPlace.jpeg', 'https://www.youtube.com/watch?v=RfBgT5djaQw&ab_channel=WeGotThisCovered', 'Follows Eleanor an ordinary woman who enters the afterlife, and thanks to some kind of error, is sent to the Good Place instead of the Bad Place ', 'Michael Schur', 10, 10, 0, 0, 'comedy'),
(76, 'Narcos', 'This series chronicles the stories of a drug king', 1, 0, 'narcos.jpeg', 'https://www.youtube.com/watch?v=xl8zdCY-abw&ab_channel=NetflixAsia', 'This raw, gritty series chronicles the gripping real-life stories of the late 1980s and the corroborative efforts to meet them head on in brutal, bloody conflict.', 'Chris Brancato', 10, 10, 0, 0, 'drama'),
(77, 'mad men', 'A look at the high-powered world of advertising', 1, 0, 'madmen.jpg', 'https://www.youtube.com/watch?v=m7NChV93LBw&ab_channel=MadMenTheMusic', 'A look at the high-powered world of advertising in 1960s New York City, from the boardroom to the bedroom.', 'Matthew Weiner', 10, 10, 0, 0, 'drama'),
(80, 'nighcrawler', 'Louis survives by scavenging and petty theft.', 0, 0, 'nightcrawler.jpeg', 'https://www.youtube.com/watch?v=u1uP_8VJkDQ', 'Lois stumbles into a career as a cameraman  armed with a camcorder and police scanner begins nocturnal forays across the city in search of shocking and grisly crimes', 'Dan Gilroy', 80, 10, 3, 0, 'horror'),
(94, 'Gravity Falls', 'Animated comedy about twins Dipper and Mabel', 1, 0, 'gravityFalls.jpg', 'immaplatypusimmaplatypus', 'Animated comedy about twins Dipper and Mabel Pines, who live with their eccentric uncle for a summer in Gravity Falls, Oregon, where he operates the worlds most bizarre museum.', 'Alex Hirsch', 10, 10, 0, 0, 'comedy'),
(95, 'DUNKIRK', 'Dunkirk serves up spectacle spe', 0, 0, 'dunkirk.jpg', 'https://www.youtube.com/watch?v=mZm8qKbp0Hg', 'Dunkirk serves up emotionally satisfying spectacle, delivered by a writer-director in full command of his craft and brought to life by a gifted ensemble cast that honors the fact-based story. ', 'CHRISTOPHER NOLAN', 85, 10, 4, 0, 'drama'),
(96, 'INTERSTELLAR', 'Brand must send pilot Cooper to the wormhole', 0, 0, 'interstellar.jpg', 'https://www.youtube.com/watch?v=zSWdZVtXT7E&ab_channel=WarnerBros.UK%26IrelandWarnerBros.UK%26Ireland', 'Interstellar represents more of the thrilling, thought-provoking, and visually resplendent filmmaking moviegoers have come to expect from writer-director Christopher Nolan', 'CHRISTOPHER NOLAN', 83, 10, 6, 0, 'drama'),
(97, 'TENET', 'A  agent embarks on a time-bending mission', 0, 0, 'tenet.jpg', 'https://www.youtube.com/watch?v=AZGcmvrTX9M&t=87s&ab_channel=WarnerBros.UK%26IrelandWarnerBros.UK%26Ireland', 'A secret agent embarks on a dangerous, time-bending mission to prevent the start of World War III.', 'CHRISTOPHER NOLAN', 10, 10, 0, 0, 'action'),
(98, 'INCEPTION', 'Smart, innovative, and thrilling', 0, 0, 'inception.jpg', 'https://www.youtube.com/watch?v=YoHD9XEInc0&ab_channel=WarnerBros.PicturesWarnerBros.PicturesVerified', 'Dom Cobb (Leonardo DiCaprio) is a thief with the rare ability to enter peoples dreams and steal their secrets from their subconscious', 'CHRISTOPHER NOLAN', 10, 10, 0, 0, 'drama'),
(101, 'jaws', 'When a young woman is killed by a shark', 0, 0, 'jaws.jpg', 'https://www.youtube.com/watch?v=U1fu_sA7XhE', 'When a young woman is killed by a shark while skinny-dipping near the New England tourist town of Amity Island, police chief Martin Brody wants to close the beaches', 'Steven Spielberg', 10, 10, 0, 0, 'horror'),
(102, 'lupin', 'Inspired by the adventures of ArsÃ¨ne Lupin', 1, 0, 'lupin.jpeg', 'https://www.youtube.com/watch?v=ga0iTWXCGa0&ab_channel=NetflixNetflixVerified', 'Inspired by the adventures of ArsÃ¨ne Lupin, gentleman thief Assane Diop sets out to avenge his father for an injustice inflicted by a wealthy family.', 'George Kay', 10, 10, 0, 0, 'action'),
(103, 'Witcher', 'The witcher Geralt, a mutated monster hunter', 1, 0, 'witcher.jpg', 'https://www.youtube.com/watch?v=ndl1W4ltcmg&ab_channel=NetflixNetflixVerified', 'The witcher Geralt, a mutated monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.', 'Lauren Schmidt', 10, 10, 0, 0, 'action'),
(104, 'dark', 'Dark is set in a German town in present day', 1, 0, 'dark.jpeg', 'https://www.youtube.com/watch?v=rrwycJ08PSA&ab_channel=ONEMediaONEMediaVerified', 'Dark is set in a German town in present day where the disappearance of two young children exposes the double lives and fractured relationships among four families.', 'Jantje Friese', 10, 10, 0, 0, 'horror'),
(105, 'DJANGO', 'Bold, bloody, and stylistically daring,', 0, 0, 'django.jpeg', 'https://www.youtube.com/watch?v=0fUCuvNlOCg&ab_channel=MovieclipsTrailersMovieclipsTrailersVerified', 'Two years before the Civil War, Django a slave, finds himself accompanying an unorthodox German bounty hunter named Dr. King Schultz on a mission to capture the vicious Brittle brothers', 'Quentin Tarantino', 10, 10, 0, 0, 'action'),
(106, 'PULP FICTION', 'One of the most influential films of the 90s', 0, 0, 'pulpfiction.jpeg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY&ab_channel=MovieclipsMovieclipsVerified', 'Vincent Vega (John Travolta) and Jules Winnfield (Samuel L. Jackson) are hitmen with a penchant for philosophical discussions.', 'Quentin Tarantino', 10, 10, 0, 0, 'action'),
(107, '21 Jumpstreet', 'A smart, affectionate satire of 80s nostalg', 0, 0, 'jumpStreet.jpeg', 'https://www.youtube.com/watch?v=RLoKtb4c4W0&ab_channel=SonyPicturesEntertainmentSonyPicturesEntertainmentVerified', 'When cops Schmidt and Jenko join the secret Jump Street unit, they use their youthful appearances to go under cover as high-school students.', 'Chris Miller', 90, 87, 3, 3, 'comedy'),
(108, 'THE DARK KNIGHT', 'Dark, complex, and unforgettable joker', 0, 0, 'darkKnight.jpeg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY&ab_channel=MovieclipsClassicTrailersMovieclipsClassicTrailersVerified', 'With the help of allies Lt. Jim Gordon and DA Harvey Dent , Batman has been able to keep a tight lid on crime in Gotham City.', 'CHRISTOPHER NOLAN', 10, 67, 0, 3, 'action'),
(113, 'anytjtyjuyj', 'fdgfhtyhtyj', 0, 0, 'django.jpeg', 'https://www.youtube.com/watch?v=IF6aBpeSJnU&ab_channel=BontonfilmCZ', 'tyjtyjtyuj', 'tyjyujyutj', 10, 10, 0, 0, 'action');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
