-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 11:14 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id` int(5) NOT NULL,
  `post_id` int(5) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `post_id`, `nama`, `email`, `isi`, `tanggal`) VALUES
(1, 2, 'Stanley', 'stanleysanto20@gmail.com', '1234512345', '2014-10-14 15:30:57'),
(2, 2, 'Stanley', 'stanleysanto20@gmail.com', '1234512345', '2014-10-14 15:31:02'),
(3, 2, 'Nama Orang 1', '13512086@std.stei.itb.ac.id', 'Tes komentar', '2014-10-14 15:32:21'),
(4, 2, 'D', 'arlandorandal@gmail.com', 'aaaaaa', '2014-10-14 15:33:22'),
(5, 2, 'Stanley', 'stanleysanto20@gmail.com', 'teeeessssssss', '2014-10-14 15:39:53'),
(6, 2, 'Badut Ancol', 'badutancol@gmail.com', 'saya badut ancol', '2014-10-14 15:42:02'),
(7, 2, 'Coba Lagi', 'cobalagi@hotmail.com', 'coba lagi', '2014-10-14 15:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `konten` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(1, 'First Post', '2014-10-15', 'Test test test'),
(2, 'Second Post', '2014-10-14', 'The PHP development team announces the immediate availability of PHP 5.6.1. Several bugs were fixed in this release. All PHP 5.6 users are encouraged to upgrade to this version.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
