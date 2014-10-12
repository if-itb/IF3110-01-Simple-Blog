-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 12, 2014 at 08:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `sb_comments`
--

CREATE TABLE IF NOT EXISTS `sb_comments` (
  `post_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `post_comment` text NOT NULL,
  `comment_last_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `comment_last_date` (`comment_last_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_post`
--

CREATE TABLE IF NOT EXISTS `sb_post` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_date` date NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `post_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `post_id_2` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `sb_post`
--

INSERT INTO `sb_post` (`post_id`, `post_date`, `post_title`, `post_content`, `is_featured`, `post_last_date`) VALUES
(65, '2014-10-13', 'Testing 4', 'lalalala', 1, '2014-10-12 18:32:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
