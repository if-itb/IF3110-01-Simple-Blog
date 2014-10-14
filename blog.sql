-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 09:38 PM
-- Server version: 5.5.40
-- PHP Version: 5.6.0

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
-- Table structure for table `comment_table`
--

CREATE TABLE IF NOT EXISTS `comment_table` (
`id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `time` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `id_post`, `name`, `email`, `time`, `content`) VALUES
(1, 1, 'JEMS', 'rivahero@gmail.com', '2014-10-13 16:40:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! …'),
(2, 1, 'KAVE', 'rivahero@gmail.com', '2014-10-13 15:38:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! …');

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE IF NOT EXISTS `post_table` (
`id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`id`, `title`, `date`, `content`) VALUES
(1, 'APA ITU SIMPLE BLOG?', '2014-07-15', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! …'),
(2, 'SIAPA DIBALIK SIMPLE BLOG?', '2014-07-11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! …');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
 ADD PRIMARY KEY (`id`), ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
ADD CONSTRAINT `comment_table_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
