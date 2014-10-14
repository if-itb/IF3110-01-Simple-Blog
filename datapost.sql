-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 04:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datapost`
--
CREATE DATABASE IF NOT EXISTS `datapost` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `datapost`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpost` int(11) NOT NULL,
  `Nama` text NOT NULL,
  `Email` text NOT NULL,
  `Komentar` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `idpost`, `Nama`, `Email`, `Komentar`, `date`) VALUES
(5, 14, 'husain', 'emha.husain104@gmail.com', 'test', '2014-10-11 12:12:12'),
(6, 14, 'Testusers', 'emha.husain04@gmail.com', 'hanya iseng belaka ya', '2014-10-12 11:25:27'),
(9, 15, 'geje', 'geje@j.ah', 'ini geje, abaikan', '2014-10-12 09:36:45'),
(10, 15, 'geje', 'geje@j.ah', 'ini geje, abaikan', '2014-10-12 09:54:09'),
(11, 16, 'husain', 'emha.husain104@gmail.com', 'pertamax gan!!!!', '2014-10-12 11:34:38'),
(12, 16, 'husain', 'emha.husain104@gmail.com', 'keduax gan :''(', '2014-10-12 11:40:38'),
(13, 18, 'test', 'emha.husain104@gmail.com', 'sajdfhkjdfjdsfbhjdsfbsdhbfjskfkj', '2014-10-13 10:39:17'),
(14, 18, 'test2', 'emha.husain104@gmail.com', 'sajdfhkjdfjdsfbhjdsfbsdhbfjskfkjdfvdsgfds', '2014-10-13 10:39:41'),
(15, 18, 'test3', 'emha.husain104@gmail.com', 'sajdfhkjdfjdsfbhjdsfbsdhbfjskfkjdfvdsgfds4543534', '2014-10-13 10:39:52'),
(16, 17, 'husain', 'emha.husain104@gmail.com', 'oke', '2014-10-14 10:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE IF NOT EXISTS `postingan` (
  `IDpost` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` text NOT NULL,
  `Tanggal` text NOT NULL,
  `Konten` text NOT NULL,
  PRIMARY KEY (`IDpost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`IDpost`, `Judul`, `Tanggal`, `Konten`) VALUES
(15, 'Sebuah Post', '2014-10-12', 'ini adalah sebuah post yang tidak heran jika kita semua terlibat di dalamnya, siapa tahu anda juga, jika saya geje, maka jangan abaikan, karena geje itu berarti anda terlalu sedih untuk bekerja di taman sari'),
(18, 'post ke tiga', '2014-10-13', 'tiga, hihihihihihihi\r\nkdjsbfjdsf\r\n''sdfjdskfdsf\r\ndsfdsfbdsf\r\nsdfsbfsd\r\nfdsfbdsfds\r\nfdsbfds\r\nfsd'),
(19, 'Post Ke 4', '2014-10-14', 'Isi dari post 4 ini menandakan bahwa, saya telah berhasil mengedit GUI dari posting ini');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
