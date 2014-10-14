-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 06:21 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbdsimpleblog`
--
CREATE DATABASE IF NOT EXISTS `wbdsimpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wbdsimpleblog`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `tglkomen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `komen` text NOT NULL,
  PRIMARY KEY (`comid`),
  KEY `pid` (`pid`),
  KEY `pid_2` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comid`, `pid`, `tglkomen`, `nama`, `email`, `komen`) VALUES
(1, 4, '2014-10-13 11:04:42', 'Ardi', 'ardi@lalala.com', 'yeyeyeyeyeye lalala yeyeye'),
(2, 4, '2014-10-13 11:04:50', 'Ardi', 'ardi@lalala.com', 'ini yang kedua yeyeyeyeyeye lalala yeyeye'),
(3, 12, '2014-10-13 11:05:44', 'Breki', 'breki@gmail.com', 'ini breki ngekomen post dengan id 12'),
(4, 14, '2014-10-14 02:09:41', 'Joshua', 'josh@josh.com', 'lalala yeyeyeye'),
(5, 22, '2014-10-14 02:12:59', 'Ardi', 'jejeje@host.com', 'lalalayeyeye'),
(6, 4, '2014-10-14 02:17:10', 'Joni', 'joni@jono.org', 'komen lagi dong'),
(7, 22, '2014-10-14 05:24:21', 'Joni', 'budi@lalala.org', 'semoga ini komen masuk'),
(10, 22, '2014-10-14 05:36:10', 'jonijonigogo', 'email@isp.com', 'eaeaeaea'),
(12, 22, '2014-10-14 05:48:00', 'maheeeeeee', 'lalalalaala@lalala.org.id', 'ea'),
(13, 24, '2014-10-14 14:35:13', 'mahe', 'ardi@gmail.com', 'ulalalalalalalala'),
(15, 24, '2014-10-14 14:45:54', 'Ardi', 'budi@lalala.org', 'ini jadi valid'),
(16, 24, '2014-10-14 14:48:14', 'Joni', 'ardi@gmail.com', 'lorem ipsum'),
(17, 14, '2014-10-14 14:54:29', 'maheeeeeee', 'mahe@budiani.org.id', 'ini post tau2 muncul ea'),
(24, 14, '2014-10-14 15:23:06', 'jono', 'email@isp.com', 'komentar'),
(26, 14, '2014-10-14 15:27:21', 'komen', 'komen@baru.museum', 'ini ada komen yang baru'),
(27, 12, '2014-10-14 15:29:17', 'Breki', 'email@isp.com', 'breki komen lagi'),
(28, 12, '2014-10-14 15:32:58', 'hambele', 'ham@bele.museum', 'ini komentar lagi');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `judul`, `tanggal`, `konten`) VALUES
(4, 'asik keempat kali ini udah diedit', '2014-10-14', 'dolor sit amet ini adalah post keempat yang udah diedit dan divalidasi'),
(12, 'udah post kelima nih padahal ngetik', '2014-10-15', 'lorem ipsum edited post keenam'),
(14, 'semoga jadi post keenam', '2015-11-28', 'lorem ipsum edited post keenam'),
(22, 'tes tes posting', '2014-10-18', 'posting tes ini buat dikomen'),
(24, 'Post dari masa depan', '2035-11-30', 'ini adalah post dari masa depan, sekarang bumi sedang dalam bahaya\r\nadsasdasdasfafss');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
