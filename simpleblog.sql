-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 06:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `listcomment`
--

CREATE TABLE IF NOT EXISTS `listcomment` (
`IDcomment` int(11) NOT NULL,
  `Nama` text NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Komentar` text NOT NULL,
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `listcomment`
--

INSERT INTO `listcomment` (`IDcomment`, `Nama`, `Tanggal`, `Komentar`, `ID`, `Email`) VALUES
(68, 'Adhika Sigit Ramanto', '2014-10-14 15:08:28', 'asdfasdf', 12, 'adhikasigit@gmail.com'),
(69, 'Adhika Sigit Ramanto', '2014-10-14 15:08:34', 'lagi dong', 12, 'adhikasigit@gmail.com'),
(70, 'Adhika Sigit Ramanto', '2014-10-14 15:09:45', 'lagi dong', 12, 'adhikasigit@gmail.com'),
(71, 'Adhika Sigit Ramanto', '2014-10-14 15:10:08', 'lagi dongasdfasdf', 12, 'adhikasigit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `listpost`
--

CREATE TABLE IF NOT EXISTS `listpost` (
  `Judul` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Konten` text NOT NULL,
`ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `listpost`
--

INSERT INTO `listpost` (`Judul`, `Tanggal`, `Konten`, `ID`) VALUES
('Paulus', '2014-10-14', 'Berliz jelek banget', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listcomment`
--
ALTER TABLE `listcomment`
 ADD PRIMARY KEY (`IDcomment`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `listpost`
--
ALTER TABLE `listpost`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listcomment`
--
ALTER TABLE `listcomment`
MODIFY `IDcomment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `listpost`
--
ALTER TABLE `listpost`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `listcomment`
--
ALTER TABLE `listcomment`
ADD CONSTRAINT `listcomment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `listpost` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
