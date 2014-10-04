-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2014 at 01:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `if3110_simple_blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sb_comments`
--

CREATE TABLE IF NOT EXISTS `sb_comments` (
  `id_komentar` int(4) NOT NULL AUTO_INCREMENT COMMENT 'id komentar',
  `nama` varchar(40) NOT NULL COMMENT 'nama pemberi komentar',
  `email` varchar(40) NOT NULL COMMENT 'email pemberi komentar',
  `komentar` text NOT NULL COMMENT 'konten dari komentar',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'waktu submit komentar',
  `id_post` int(4) NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `sb_comments`
--

INSERT INTO `sb_comments` (`id_komentar`, `nama`, `email`, `komentar`, `timestamp`, `id_post`) VALUES
(31, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'masih bakal error gak ya?', '2014-10-04 10:25:06', 26),
(32, 'Jeffrey Lingga Binangkit', 'jeffhorus19@gmail.com', 'masih bakal error gak ya?', '2014-10-04 10:25:44', 26);

-- --------------------------------------------------------

--
-- Table structure for table `sb_posts`
--

CREATE TABLE IF NOT EXISTS `sb_posts` (
  `id_post` int(4) NOT NULL AUTO_INCREMENT COMMENT 'primary key id post',
  `judul` varchar(40) NOT NULL COMMENT 'judul post',
  `tanggal` date NOT NULL COMMENT 'tanggal publikasi post',
  `konten` text NOT NULL COMMENT 'isi post',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sb_posts`
--

INSERT INTO `sb_posts` (`id_post`, `judul`, `tanggal`, `konten`) VALUES
(26, 'Ini Post Pertama ke Sekian', '2014-10-04', 'jangan error ya'),
(27, 'Pos Kedua', '2014-10-04', 'Ini pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sb_comments`
--
ALTER TABLE `sb_comments`
  ADD CONSTRAINT `sb_comments_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `sb_posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
