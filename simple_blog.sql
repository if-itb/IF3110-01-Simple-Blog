-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 05:22 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `komentar` varchar(10000) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `nama`, `email`, `komentar`, `post_id`, `tanggal`) VALUES
(1, 'Jonathan Sudibya', 'sudib@yahoo.com', 'Inseng sih in nyobain', 6, '13/9/2014'),
(2, 'Jonathan Sudibya', 'sudib@yahoo.com', 'Inseng sih in nyobain', 6, '13/9/2014'),
(3, 'Hello world', 'jonthans121@gmail.com', 'iseng nih', 6, '13/9/2014'),
(4, 'aku siapa?', 'gissonyal@gmail.com', 'Jelek ni postingannya', 6, '13/9/2014'),
(5, 'Ganteng', 'Orang@ganteng.co.id', 'hilangku jelek postingannya', 6, '13/9/2014'),
(6, 'Jonathan Sudibya', 'sudib.ya@hotmail.com', 'Ini udah bisa harusnya', 6, '13/9/2014'),
(7, 'geblek lu', 'a@a.com', 'wkqkwmqekqmp', 6, '13/10/2014'),
(8, 'Sonya', 'gissonyal@gmail.com', 'Wah sudib blognya sangat keren nih :). Kapan bisa diimplementasikan?', 7, '13/10/2014'),
(9, 'Sudibya', 'sudib@yahoo.com', 'hwfiwf', 7, '14/10/2014'),
(10, 'Hello world', 'hello@yahoo.com', 'iseng deh', 7, '14/10/2014');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(32) NOT NULL,
  `tanggal` varchar(32) NOT NULL,
  `konten` mediumtext NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `judul`, `tanggal`, `konten`) VALUES
(6, 'Disuruh Sudibya untuk Mencoba', '13/10/2014', 'Hai everybody!\r\n:3\r\nSaya diminta Sudib untuk mencoba\r\n\r\nmimin edit : halo juga'),
(7, 'Ini adalah postku yang pertama', '13/10/2014', 'Hari ini adalah hari yang sangat menyenangkan, ketika aku mencoba untuk melakukan post di dalam simple blog ini. Aku juga mecoba bahwa blog ini memiliki fasilitas yang unik seperti edit post, tambah komen dan lain-lain.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
