-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2014 at 05:47 AM
-- Server version: 5.5.40
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `post_id` int(3) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `num_comment` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date`, `num_comment`) VALUES
(2, 'sdfghjk', 'dfghjkl', '2014-10-14 17:00:00', NULL),
(3, 'sdfghjk', 'dhkdfgkdfgkdgdfkgf', '2014-10-14 17:00:00', NULL),
(4, 'sdfghjk', 'sdfghjvbnghju', '2014-10-14 17:00:00', NULL),
(5, 'sdfghjk', 'sdfghjvbnghju', '2014-10-14 17:00:00', NULL),
(6, 'sdfghjk', 'sdfghjvbnghju', '2014-10-14 17:00:00', NULL),
(7, 'rrr', 'vbnmfffkfkf', '2013-07-04 12:00:00', NULL),
(8, 'rrr', 'vbnmfffkfkf', '2013-07-04 12:00:00', NULL),
(9, 'gfggdf', 'wfghjhgfdsddhgtr', '2014-10-14 17:00:00', NULL),
(10, 'vvv', 'fgkdfg.dgd', '2013-07-04 12:00:00', NULL),
(11, 'fgdfg', 'kfjlfjlsdf', '2014-10-14 17:00:00', NULL),
(12, 'fgdfg', 'kfjlfjlsdf', '2014-10-14 17:00:00', NULL),
(13, 'fgdfg', 'kfjlfjlsdf', '2014-10-14 17:00:00', NULL),
(15, 'dfkfkfkgkf', 'sfjdjfjdfjd', '2016-04-03 11:34:36', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
