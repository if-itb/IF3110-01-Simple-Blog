-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 10:34 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--
CREATE DATABASE IF NOT EXISTS `simpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simpleblog`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(10) unsigned NOT NULL,
  `postID` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `comment` text,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`commentID`),
  KEY `postID` (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `postID`, `name`, `email`, `comment`, `date`, `time`) VALUES
(5, 7, 'wira', 'ganteng@gmail.com', 'hahaha', '2014-10-11', '08:37:59'),
(6, 7, 'koji', 'kojitest@gmail.com', 'koji', '2014-10-12', '06:55:51'),
(7, 9, 'cinta', 'cinta@gmail.com', 'hahaha', '2014-10-13', '10:32:07'),
(8, 8, 'test', 'test@gmail.com', 'te3st', '2014-10-13', '10:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `datePost` date DEFAULT NULL,
  `timePost` time DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `datePost`, `timePost`, `content`) VALUES
(7, 'Ganteng', '2014-11-11', '06:55:36', 'A definite article indicates that its noun is a particular one (or ones) identifiable to the listener. It may be something that the speaker has already mentioned, or it may be something uniquely specified. The definite article in English, for both singular and plural nouns, is the.\r\n\r\nThe children know the fastest way home.\r\nThe sentence above refers to specific children and a specific way home; it contrasts with the much more general observation that:\r\n\r\nChildren know the fastest way home.\r\nThe latter sentence refers to children in general and their specific ways home. Likewise,\r\n\r\nGive me the book.\r\nrefers to a specific book whose identity is known or obvious to the listener; as such it has a markedly different meaning from\r\n\r\nGive me a book.\r\nwhich does not specify what book is to be given.\r\n\r\nThe definite article can also be used in English to indicate a specific class among other classes:\r\n\r\nThe cabbage white butterfly lays its eggs on members of the Brassica genus.\r\nHowever, recent developments show that definite articles are morphological elements linked to certain noun types due to lexicalization. Under this point of view, definiteness does not play a role in the selection of a definite article more than the lexical entry attached to the article. [3] [4]'),
(8, 'Wira', '2014-10-12', '07:31:09', 'hahahahaha xxx'),
(9, 'xixi', '2014-10-12', '07:31:06', 'hoho');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `post` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
