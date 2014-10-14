-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 07:56 AM
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
-- Table structure for table `data_komen`
--

CREATE TABLE IF NOT EXISTS `data_komen` (
  `Nama` varchar(30) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Komentar` text NOT NULL,
  `ID_Post` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `Id_Post` (`ID_Post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `data_komen`
--

INSERT INTO `data_komen` (`Nama`, `Tanggal`, `Email`, `Komentar`, `ID_Post`, `id`) VALUES
('Kevin', '2014-10-13 15:28:26', 'kevin9huang1994@gmail.com', 'GREAT', 64, 15),
('asdf', '2014-10-13 15:30:21', 'kevin9huang1994@gmail.com', 'asdf', 64, 16),
('asdf', '2014-10-13 15:31:39', 'kevin_huang1994@gmail.com', 'asdfasdf', 64, 17),
('asdf', '2014-10-13 15:31:43', 'kevin_huang1994@gmail.com', 'asdfasdf', 64, 18);

-- --------------------------------------------------------

--
-- Table structure for table `data_post`
--

CREATE TABLE IF NOT EXISTS `data_post` (
  `ID_Post` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Konten` text NOT NULL,
  PRIMARY KEY (`ID_Post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `data_post`
--

INSERT INTO `data_post` (`ID_Post`, `Judul`, `Tanggal`, `Konten`) VALUES
(64, 'This is the first', '2014-10-13', 'Berisi post pertama'),
(65, 'This is the second post', '2014-10-14', 'Berisi informasi ketiga'),
(66, 'The Gold', '2014-10-20', 'Gold is gold');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_komen`
--
ALTER TABLE `data_komen`
  ADD CONSTRAINT `data_komen_ibfk_1` FOREIGN KEY (`ID_Post`) REFERENCES `data_post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
