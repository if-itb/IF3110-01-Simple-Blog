-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 02:41 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `if3110-01-simple-blog`
--
CREATE DATABASE IF NOT EXISTS `if3110-01-simple-blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `if3110-01-simple-blog`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `waktu` datetime NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `nama`, `email`, `waktu`, `komentar`) VALUES
(15, 13, 'Ahmad Zaky', '13512076@std.stei.itb.ac.id', '2014-10-13 19:15:33', 'Wah, selamat ya! Semoga blog ini bermanfaat');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(99) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(13, 'Hello World!', '2014-10-13', '<p>Akhirnya setelah perjuangan keras selama berhari-hari, blog ini pun dapat diselesaikan. Terima kasih kepada Tuhan Yang Maha Esa dan segala pihak yang membantu dan mendukung pengerjaan blog ini. Terima kasih tidak lupa kami sampaikan kepada <a href="http://www.google.com">Google</a>, <a href="http://www.w3schools.com">W3Schools</a>, dan <a href="http://www.stackoverflow.com">Stackoverflow</a>.</p>\r\n\r\n<ul>\r\n<li style="list-style:none">Ahmad Zaky</li>\r\n<li style="list-style:none"><href="mailto:13512076@std.stei.itb.ac.id">13512076</a></li>\r\n<li style="list-style:none"><a href="http://github.com/azaky">Github</a></li>\r\n</ul>');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
