-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2016 at 03:32 PM
-- Server version: 10.1.11-MariaDB-1~trusty-log
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kpi_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` char(36) NOT NULL,
  `path` text NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `mime` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mime` (`mime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `highlight_image_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `highlight_image_files_id` (`highlight_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(128) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `remember_token` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `highlight_image_files_id` FOREIGN KEY (`highlight_image_id`) REFERENCES `files` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
