-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2014 at 02:09 AM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(100) DEFAULT NULL,
  `com_email` varchar(100) DEFAULT NULL,
  `com_date` date DEFAULT NULL,
  `com_dis` text,
  `post_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `post_id_fk` (`post_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_name`, `com_email`, `com_date`, `com_dis`, `post_id_fk`) VALUES
(1, 'Aryya Dwisatya Widigdha', 'aryya@arc.itb.ac.id', '0000-00-00', 'Ini pesan pertama', 1),
(2, 'Ganesus', 'ganesus@gemastik.itb.ac.id', '0000-00-00', 'Dari ganesus', 1),
(3, 'Aryya Dwisatya Widigdha', 'a.dwisaty4@yahoo.com', '0000-00-00', 'Ini dari aryya tapi kedua', 1),
(4, 'NggihNdoro', 'a.dwisaty4@yahoo.com', '2014-10-04', 'Inggih ndoro', 1),
(17, '123', '321321', '2014-10-05', 'dsadsadsa', 1),
(18, '21321', '3213', '2014-10-05', 'dsadsadsa', 1),
(19, '321321321', '32132', '2014-10-05', '132131312321', 1),
(20, 'dsadsa', 'sadsadsa', '2014-10-10', 'sadsa', 1),
(21, 'dsadasdsa', 'asdasas', '2014-10-10', 'dsadsa', 1),
(22, 'dsadsads', 'sdsadasdsadsad', '2014-10-10', 'sadsa', 1),
(23, '', '', '2014-10-10', '', 1),
(24, '', '', '2014-10-10', '', 1),
(25, 'Aryya Dwisatya Widigdha', 'a.dwisaty4@yahoo.com', '2014-10-10', 'Aryya', 1),
(26, 'Aryya Dwisatya Widigdha', 'a.dwisaty4@yahoo.com', '2014-10-10', 'Komentar hasil validasi', 1),
(27, 'AJAX', 'dasdsadas@dsadsadas.com', '2014-10-11', 'Komentar', 1),
(28, 'dsdsadsa', 'dsadsadsa@sdsadsa.com', '2014-10-11', 'dsadsa', 15);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`no`, `judul`, `tanggal`, `konten`) VALUES
(1, 'Posting Pertama (hasil update)', '2014-10-04', 'Ini hasil update lho'),
(2, 'Posting pertama di TVST', '0000-00-00', 'Ini postingan pertama di TVST'),
(13, 'dsds', '2014-10-09', 'dsadsa'),
(14, 'Hasil validasi', '2014-10-10', 'Sudah bisa validasi tanggal'),
(15, 'dsfd', '2014-10-09', 'fdsfdsf'),
(16, 'Testing 3', '2014-10-08', ''),
(19, 'dsadsad', '2014-10-10', 'dsadsa'),
(20, 'dasdas', '2014-10-09', ''),
(23, 'fdsfdsf', '2014-10-03', 'sdfsdfdsfsd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id_fk`) REFERENCES `post` (`no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
