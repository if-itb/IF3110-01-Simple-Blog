-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 02:43 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `ComID` int(255) NOT NULL AUTO_INCREMENT,
  `PostID` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`ComID`),
  KEY `PostID` (`PostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ComID`, `PostID`, `Date`, `Name`, `Email`, `Content`) VALUES
(82, 32, '2014-10-14 19:20:48', 'Random kind guy', 'youcoolicool@chillin.out', 'Have fun blogging buddy :)'),
(83, 32, '2014-10-14 19:22:04', 'flat dude', 'noonecares@nope.com', 'meh'),
(87, 32, '2014-10-14 19:29:05', 'random spammer', 'randomwords@anythingthatfree.com', 'get free iphone here!!!! ------> http://scammeplease.com'),
(88, 32, '2014-10-14 19:30:48', 'mad dude', 'whatchalookinat@fblablablayou.com', 'what an attention seeker. You just a random guy in internet dude. Get a life'),
(89, 33, '2014-10-14 19:33:11', 'overly kind guy', 'emailme@smiley.com', 'a phenomenal advice!!!!! thankyou!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PostID` int(255) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`PostID`),
  UNIQUE KEY `PostID` (`PostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `Title`, `Date`, `Content`) VALUES
(32, 'Hello World!', '2004-06-08', 'Welcome to this simple blog!'),
(33, 'Life Advice #1', '2009-09-10', 'Finish what you start'),
(34, 'Life Advice #2', '2012-02-17', 'Motivation makes you start, commitment keeps you on track');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
