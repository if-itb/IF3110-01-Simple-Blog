-- phpMyAdmin SQL Dump
-- version 4.0.10.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 12:19 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `pid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` mediumtext NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`pid`, `id`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(12, 8, 'sfdkjlsdfjl', 'fskjldfjsklkjsld@Lfjdslkfs.fsdjflksdjfkls', 'fkldskljfskldfjslfsdfsdfsfsd', '2014-10-13 15:37:35'),
(12, 9, 'dfsklsdjfl', 'jkfldsjfsklJklfdjskl@Jklfdsjf.sdfjklsdfjl', 'fkljdsklfsdfsdfsdfsd', '2014-10-13 15:39:22'),
(11, 10, 'ksadlfsafaskafsdjlaskjl', 'jklfsdjklfs@jfklsdaf.dfsajklsf', 'lfkjsdlakfj', '2014-10-13 15:42:26'),
(11, 11, 'fdkjasfdsah', 'hdfskjhfskjd@hdfkjsahf.afsdhkjasfdh', 'fdshakjfashkjafsjdfsadsadf', '2014-10-13 15:42:36'),
(11, 12, 'fskjdljfsklfkldsjlkfjskl', 'fsdkjljfs@fdsjaklfjdsla.sadfjklasdjfl', 'fkjldsjfklasjlfksjal', '2014-10-13 15:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` varchar(10000) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `judul`, `tanggal`, `konten`) VALUES
(11, 'xckmlvcmsklvm adsfasdfasfas', '2014-10-13', 'cdskjcsnjncvskjvknsdv'),
(12, 'mjavdsklmvdskl', '2014-10-13', 'cndskjlnjsdcnskjdncjskcsdcssdcsdcsd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `pid_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `post` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
