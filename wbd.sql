-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 03:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbd`
--
CREATE DATABASE IF NOT EXISTS `wbd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wbd`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `KomentarID` int(11) NOT NULL AUTO_INCREMENT,
  `PostID` int(11) NOT NULL,
  `Konten` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`KomentarID`,`PostID`),
  KEY `post-id` (`PostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`KomentarID`, `PostID`, `Konten`, `Tanggal`, `Nama`, `Email`) VALUES
(1, 1, 'Woi kuliah woi', '2014-10-14', 'Gilang', 'gilangjulians@gmail.com'),
(2, 1, 'asd', '0000-00-00', 'asd', 'asd'),
(3, 1, '', '0000-00-00', 'Riady', 'riady@gmail.com'),
(4, 1, '', '0000-00-00', 'eldin', ''),
(5, 1, 'Teofebano kok jelek sih bingung gw', '0000-00-00', 'Teofebano Kristo', 'teofebano@gmail.com'),
(6, 1, 'IYA', '0000-00-00', 'Joshua', 'joshua.bezaleel@gmail.com'),
(7, 1, 'bagas jomblo', '2014-10-14', 'Bagas', 'bagaskara@gmail.com'),
(8, 2, 'Setuju setuju', '2014-10-14', 'Bagas', 'bagaskara@gmail.com'),
(9, 2, 'Setuju setuju', '2014-10-14', 'Bagas', 'bagaskara@gmail.com'),
(10, 1, 'aldjqlwej', '2014-10-14', 'a', 'asd@gmail.com'),
(11, 1, 'aldjqlwej', '2014-10-14', 'a', 'asd@gmail.com'),
(12, 2, 'joshua', '2014-10-14', 'joshua', 'joshua@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PostID` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(100) NOT NULL,
  `Konten` text NOT NULL,
  `Tanggal` date NOT NULL,
  PRIMARY KEY (`PostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `Judul`, `Konten`, `Tanggal`) VALUES
(1, 'Lagi kuliah Psikosos', 'Jep ajep ajep ajep ajep', '2014-10-14'),
(2, 'Joshua ganteng', 'joshua ganteng banget ya', '2014-10-06'),
(3, '', '', '0000-00-00'),
(4, '', '', '0000-00-00'),
(5, 'Halooo', 'hhahahaah', '2014-10-15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
