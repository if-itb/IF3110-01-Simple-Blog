-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 04:10 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `sb_comments`
--

INSERT INTO `sb_comments` (`id_komentar`, `nama`, `email`, `komentar`, `timestamp`, `id_post`) VALUES
(5, 'Ardi', 'ardi@ardi.com', 'kocak bro\nhaha', '2014-10-09 04:11:15', 42),
(6, 'Riky', 'riky@riky.com', 'wah bisa lebih dari 30 kata kepotong', '2014-10-09 04:11:47', 27),
(8, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'keren kan rik. . wkwk', '2014-10-11 20:01:08', 27),
(9, 'Jelink', 'jeffhorus19@gmail.com', 'coba lagi', '2014-10-12 11:41:33', 27),
(10, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'coba lagi ngecek jam', '2014-10-12 12:13:42', 27),
(11, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'ngecek jam', '2014-10-12 12:20:46', 27),
(12, 'Tegar', 'tegar@tegar.com', 'woi gimana caranya woi', '2014-10-12 12:21:48', 27),
(14, 'Tutut', 'tutut@balap.hot', 'format komennya gimana?', '2014-10-13 01:52:53', 50),
(15, 'Lingga', 'jeffhorus19@gmail.com', 'kayak gini nih', '2014-10-13 01:59:51', 50),
(16, 'Tutut', 'tutut@balap.hot', 'oh gituuu', '2014-10-13 02:00:38', 50),
(17, 'Lingga', 'jeffhorus19@gmail.com', 'keren keren wkwk', '2014-10-13 02:01:09', 50),
(18, 'Lingga', 'jeffhorus19@gmail.com', 'masih ada yang ngebug', '2014-10-13 02:01:23', 50),
(19, 'Lingga', 'jeffhorus19@gmail.com', 'jangan ngebuug', '2014-10-13 02:02:10', 50),
(20, 'Lingga', 'jeffhorus19@gmail.com', 'test debug', '2014-10-13 02:02:46', 50),
(21, 'Tutut', 'tutut@balap.hot', 'udah ga ngebug', '2014-10-13 02:03:19', 50),
(22, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'mantap', '2014-10-13 02:03:27', 50),
(23, 'Bagaskara', 'bagas@uchiha.com', 'ngapain nih rame amaaat???', '2014-10-13 02:04:06', 50),
(24, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'iyalah keren gituh wkwk', '2014-10-13 02:04:21', 50);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `sb_posts`
--

INSERT INTO `sb_posts` (`id_post`, `judul`, `tanggal`, `konten`) VALUES
(27, 'Pos Kedua', '2014-10-12', 'Ini pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.\r\nIni pos kedua dengan panjang file melebihi 30 kata.'),
(42, 'Main Kata', '2014-10-05', 'Mari bermain kata, tapi jangan kebanyakan, soalnya kalau kebanyakan nanti ilang. ilang?? ilang gimana?? nih ku kasih contoh. Kalau kata dalam pos lebih dari 30 bisa gak muncul lho isinya. Kok bisa?? kalo ga percaya coba nih gw ulang lagi isi paragrafnya. Mari bermain kata, tapi jangan kebanyakan, soalnya kalau kebanyakan nanti ilang. ilang?? ilang gimana?? nih ku kasih contoh. Kalau kata dalam pos lebih dari 30 bisa gak muncul lho isinya. Kok bisa?? kalo ga percaya coba nih gw ulang lagi isi paragrafnya. '),
(50, 'Pos Hari Ini', '2014-10-13', 'Harusnya hari ini');

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
