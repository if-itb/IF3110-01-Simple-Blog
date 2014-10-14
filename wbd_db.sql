-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 03:12 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `post_id` varchar(100) NOT NULL,
  `comment_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `comment_id`, `email`, `nama`, `komentar`, `comment_date`) VALUES
('543832ecee72a', '543832ecee72aA', 'aa@aa.aa', 'aa', 'asdasdasdasd', '2014-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` varchar(100) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `post_date` date NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `tittle`, `post_date`, `konten`) VALUES
('543832ecee72a', 'Test', '2014-10-11', 'Pada hari minggu kuturut ayah ke kota, naik delman istimewa ku duduk di muka, ku duduk samping pak kusir yang sedang bekerja, mengendarai kuda supaya baik jalannya, hei, tukitak kituk kitak kituk kitak kituk tuk kitak kituk kitak suara sepatu kuda'),
('54383ba5894e1', '123123', '2014-10-11', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
