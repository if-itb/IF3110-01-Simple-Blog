-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2014 at 01:19 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_posts`
--
CREATE DATABASE `blog_posts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog_posts`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_post_id` int(11) NOT NULL,
  `comment_name` varchar(80) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_content` varchar(600) NOT NULL,
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_email` varchar(40) NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_post_id` (`comment_post_id`),
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_content` text NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_content`, `post_date`, `post_title`, `post_id`) VALUES
(' Wooooow  holllll', '14,10,16,14,14,14', 'Haloo', 29);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
