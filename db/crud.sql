-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2014 at 07:44 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE IF NOT EXISTS `blogpost` (
  `IDBlogPost` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Konten` text NOT NULL,
  PRIMARY KEY (`IDBlogPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`IDBlogPost`, `Judul`, `Tanggal`, `Konten`) VALUES
(1, 'Post Pertama', '2014-10-06', 'Ini adalah Post blog pertama saya'),
(2, 'Post Kedua', '2014-10-06', 'ini adalah post kedua. basically, ini adalah post yang menguji apabila ada 2 post atau lebih, apakah panel akan muncul di 2 post atau tetap hanya pada 1 post. jadi, post kedua harus lebih panjang dari yang sebelumnya. ah, aku lupa, blog ini harusnya first in last out, post paling lama harusnya ada di bawah, sial -_-. '),
(3, 'Post ketiga', '2014-10-06', 'another random post, anggap saja iklan'),
(4, 'post keempat', '2014-10-06', 'percobaan membuat post dari create.php');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `IDKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `IDBlogPost` int(11) NOT NULL,
  `Nama` text NOT NULL,
  `Email` text NOT NULL,
  `Isi` text NOT NULL,
  `Tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDKomentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`IDKomentar`, `IDBlogPost`, `Nama`, `Email`, `Isi`, `Tanggal`) VALUES
(33, 4, 'kiwaw', 'kiky.widya95@gmail.', 'testemail', '2014-10-06 23:01:55'),
(34, 4, 'kiwaw', 'kiky.widya95@gmail.', 'testemail2', '2014-10-06 23:03:25'),
(35, 4, 'kiwaw', 'kiky.widya95@gmail.com', 'ret', '2014-10-06 23:06:03'),
(36, 4, 'kiwaw', 'kiky.widya95@gmail.com', 'sa', '2014-10-06 23:21:32'),
(37, 4, 'kiwaw', 'k', 'adad', '2014-10-06 23:21:40'),
(38, 4, 'kiwaw', 'kiky.widya95@gmail.com', 'dasda', '2014-10-06 23:38:21'),
(39, 3, 'kiwaw', 'kiky.widya95@gmail.com', 'testkomenpost3', '2014-10-06 23:38:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
