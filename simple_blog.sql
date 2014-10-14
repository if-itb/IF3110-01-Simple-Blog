-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 06:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_blog`
--
CREATE DATABASE IF NOT EXISTS `simple_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simple_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE IF NOT EXISTS `tb_comments` (
  `cmt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `post_comment` text NOT NULL,
  `comment_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`cmt_id`, `post_id`, `name`, `email`, `post_comment`, `comment_last_date`) VALUES
(1, 27, 'nama', 'komentar', 'email', '2014-10-14 13:37:09'),
(2, 27, 'nama2', 'komentar2', 'email2', '2014-10-14 13:37:22'),
(3, 27, 'a', 'a', 'a', '2014-10-14 14:01:42'),
(4, 27, 'aa', 'aaa', 'aaaa', '2014-10-14 14:03:32'),
(5, 0, '', '', '', '2014-10-14 14:03:45'),
(6, 0, '', '', '', '2014-10-14 14:03:49'),
(7, 28, 'asdasd', 'sadasdasd', 'asdasdasd', '2014-10-14 14:10:50'),
(8, 28, 'asd', 'asd@asd.com', 'asd', '2014-10-14 14:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE IF NOT EXISTS `tb_post` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_date` date NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `is_featured` tinyint(20) NOT NULL,
  `post_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`post_id`, `post_date`, `post_title`, `post_content`, `is_featured`, `post_last_date`) VALUES
(26, '1111-11-11', 'Satu', 'POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. POST ke SATU. ', 0, '2014-10-14 11:37:47'),
(29, '3114-12-31', 'asdasdasdasd', 'aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan aku mau makan ', 0, '2014-10-14 14:15:26'),
(30, '0012-12-12', 'asdasd', 'asdasdasd', 0, '2014-10-14 15:56:24'),
(31, '1111-11-11', 'weq', 'asdasd', 0, '2014-10-14 16:12:35'),
(34, '0000-00-00', '', '', 0, '2014-10-14 16:26:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
