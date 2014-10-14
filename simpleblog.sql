-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 09:40 PM
-- Server version: 5.5.32
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
-- Table structure for table `blogitem`
--

CREATE TABLE IF NOT EXISTS `blogitem` (
  `pid` int(4) NOT NULL AUTO_INCREMENT,
  `posttitle` text NOT NULL,
  `postdate` date NOT NULL,
  `postcontent` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `blogitem`
--

INSERT INTO `blogitem` (`pid`, `posttitle`, `postdate`, `postcontent`) VALUES
(10, 'pamungkas', '2014-10-15', 'kasih error message lah untuk menangani field kosong'),
(11, 'check', '2014-10-15', 'tes field kosong');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `kid` int(4) NOT NULL AUTO_INCREMENT,
  `pid` int(4) NOT NULL,
  `c_name` text NOT NULL,
  `c_email` text NOT NULL,
  `comment` text NOT NULL,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kid`, `pid`, `c_name`, `c_email`, `comment`, `c_date`) VALUES
(15, 10, 'hay', 'hayyu94@yahoo.com', 'udah yaaa', '2014-10-15 02:31:58'),
(16, 11, 'Luthfi', 'luthfi2007@yahoo.com', 'dummy', '2014-10-15 02:35:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
