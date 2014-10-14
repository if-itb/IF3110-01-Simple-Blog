-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2014 at 09:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_simpleblog`
--
CREATE DATABASE IF NOT EXISTS `db_simpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_simpleblog`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `post_id`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(1, 1, 'Joko', 'joko@ahoo.com', 'Ajax and php powered mySQL table editor to easily perform all CRUD operations. Create Read Update Delete from database table using AJAX. Show data, edit ...', '2014-10-16 00:00:00'),
(2, 1, 'Micky', 'mc@asd.com', 'Ajax and php powered mySQL table editor to easily asfasf asf gdsa gsgsdg asr ara ar at3th sndgmfnhwe hds ara a asfasdg.', '2014-10-23 00:00:00'),
(3, 1, 'a', '13512095@std.stei.itb.ac.id', 'asd', '2014-10-09 00:00:00'),
(4, 1, 'PigFuck', 'asd@asd.com', 'gasdad', '2014-10-09 00:00:00'),
(5, 1, 'KON', 'asd@asdf.com', 'sdgs', '2014-10-09 00:00:00'),
(6, 1, 'asd', 'gasg@asgsa.com', 'asdasfa', '2014-10-09 00:00:00'),
(7, 1, 'Sok', 'afs@vas.cbsa', 'loadComment(postId);a', '2014-10-09 00:00:00'),
(8, 1, 'Jok', 'asd@g.com', 'afaf', '2014-10-09 02:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(1, 'Apa itu simple blogs?', '2014-11-09', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimuse?</p>'),
(2, 'SIAPA DIBALIK SIMPLE BLOG?', '2014-10-23', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?</p>'),
(9, 'Apakah ini blog?', '2014-10-15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! \r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
