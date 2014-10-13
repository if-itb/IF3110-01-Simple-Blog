-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 10:18 PM
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
-- Table structure for table `commentlist`
--

CREATE TABLE IF NOT EXISTS `commentlist` (
  `Idx` int(11) NOT NULL AUTO_INCREMENT,
  `Idx_post` int(11) NOT NULL,
  `Nama` text NOT NULL,
  `Email` text NOT NULL,
  `Waktu` datetime NOT NULL,
  `Komentar` longtext NOT NULL,
  PRIMARY KEY (`Idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `commentlist`
--

INSERT INTO `commentlist` (`Idx`, `Idx_post`, `Nama`, `Email`, `Waktu`, `Komentar`) VALUES
(1, 1, 'Jems', 'jems@jems.com', '2014-10-13 12:18:25', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt!'),
(2, 1, 'Kave', 'kave@kave.com', '2014-10-13 11:40:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt!'),
(4, 1, 'SAP', 'asd@yahoo.com', '2014-10-13 21:51:08', 'DAFUQ'),
(5, 1, 'ASDASDSAD', 'asd@yahoo.com', '2014-10-13 22:11:28', 'DAFUQ');

-- --------------------------------------------------------

--
-- Table structure for table `listpost`
--

CREATE TABLE IF NOT EXISTS `listpost` (
  `Idx` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Konten` longtext NOT NULL,
  PRIMARY KEY (`Idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `listpost`
--

INSERT INTO `listpost` (`Idx`, `Judul`, `Tanggal`, `Konten`) VALUES
(1, 'Apa itu simple blog?', '2014-07-15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.\r<br>\r<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?'),
(2, 'Siapa dibalik simple blog?', '2014-07-11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.\r<br>\r<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
