-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 07:14 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idpost` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar` text,
  PRIMARY KEY (`idcomment`),
  KEY `idpost` (`idpost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idpost`, `idcomment`, `nama`, `email`, `tanggal`, `komentar`) VALUES
(26, 5, 'Riady', '', '2014-10-07 15:35:14', 'wwwwwwwwwwwwwww'),
(26, 6, 'asdsadsadsad', 'asdasd', '2014-10-08 23:03:56', 'asdasdsad'),
(26, 7, 'sadsda', 'sadas', '2014-10-08 23:04:12', 'saddsadsa'),
(26, 8, 'gimana?', 'sadsad', '2014-10-10 19:35:26', 'asdaskdaskjdj'),
(26, 9, 'rgfgf', 'riady.sastrakusuma@gmail.com', '2014-10-12 07:22:16', 'rrr'),
(26, 10, 'rerer', 'riady.sastrakusuma@gmail.com', '2014-10-12 12:53:46', 'asdasdasddsaads'),
(26, 11, 'rerer', 'riady.sastrakusuma@gmail.com', '2014-10-13 15:12:04', 'sadadsds');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `konten` text,
  PRIMARY KEY (`idpost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `judul`, `tanggal`, `konten`) VALUES
(26, '2iksadkj', '2014-03-23', 'lkanshdlkjaklsdjnlanjsdknas'),
(27, 'aksdnjkadlkjsakldj', '2014-03-23', 'lkajshdlkhalksjdlkajsldkinsa'),
(28, 'kskdmjasd', '2014-03-20', 'slkdjkasd\r\n\r\naskdjkasdjas\r\n\r\nasjkdaksdj'),
(29, 'kskdmjasd', '2014-03-20', 'asdsda'),
(46, 'Wah apa tuh?', '2014-10-13', 'LALALALALALALALALALA LALALALALALALALALALA LALALALALALALALALLALALALALALALALALALA LALALALALALALALALALA\r\nLALALALALALALALALALA\r\n\r\nLALALALALALALALALALA\r\nLALALALALALALALALALA\r\nLALALALALALALALALALA\r\nLALALALALALALALALALA\r\nLALALALALALALALALALALALALALALALALALALALA\r\nLALALALALALALALALALALA'),
(47, 'r', '2014-11-20', '<p> sadljasdk </p> asjdhjdsha'),
(49, 'assad', '2014-11-12', 'asdasd\r\nasdasd\r\nasdasd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
