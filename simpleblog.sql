-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 11:39 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--
CREATE DATABASE IF NOT EXISTS `simpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simpleblog`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_name` varchar(50) NOT NULL,
  `comment_email` varchar(50) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_name`, `comment_email`, `comment_date`, `comment_content`) VALUES
(30, 21, 'baspram', 'hoho@gmail.com', '2014-10-11 10:32:32', 'Cobain bisa ga ya?'),
(34, 23, ' ceunah', 'cuenah@cuenah.com', '2014-10-13 09:25:47', 'hohohoho'),
(35, 26, ' bagaskara', 'baspram@check.in', '2014-10-13 09:52:39', 'ini apaan pak?\ntolong ajarin lagi dong kak set\nntar ujian bisa rata nih. . .'),
(36, 26, ' Darmanto', 'darmanto_cute@gmail.com', '2014-10-13 11:02:31', 'gue ngefans ama loo bagazz\n'),
(38, 27, ' coba', 'h@joaodja.oh.oh.oh', '2014-10-14 12:36:30', 'hihihi email apaan nih?'),
(39, 28, ' ardiwii', 'ardi@hhohoho.com', '2014-10-14 12:48:03', 'ceunah~'),
(40, 18, ' Ardi', 'bego@bego.bet', '2014-10-14 13:33:28', 'hahahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_content`) VALUES
(1, 'Post #1', '2014-10-05', 'Ini post pertama tanpa id'),
(2, 'Post #2', '2014-10-05', 'Coba pake query di localhost'),
(4, 'Post #4', '2014-10-05', 'Edited!'),
(5, 'Post #5', '2014-10-05', 'Habis delete Post #3 nih'),
(6, 'POST #6', '2014-10-06', 'Ceuna Ceuna Ceuna ~'),
(7, 'Ini judul panjang buat ngecek nabrak ga sih kalo d', '2014-10-06', 'Two childhood best friends embark on a road trip back to their hometown after one of them learns he has inherited a large sum of money from his recently deceased estranged father.\r\nBen Baker is a man-child who lives on his friend''s couch getting high. His friend, Steve Dallas, is a moderately successful weather reporter who is living a superficial life. When Ben receives word that his father has died, Steve drives him home and they re-connect with Ben''s successful and driven sister Terri and hippie step-mother Angela who is the same age as they are. The reading of the will drives Ben to come up with a new purpose in life, but those around him don''t prove to be very supportive, and then they all re-examine their own life.'),
(8, 'Ngecek Panjang Judul aja sih sebenernya', '2014-10-06', 'Two childhood best friends embark on a road trip back to their hometown after one of them learns he has inherited a large sum of money from his recently deceased estranged father.\r\n\r\nBen Baker is a man-child who lives on his friend''s couch getting high. His friend, Steve Dallas, is a moderately successful weather reporter who is living a superficial life. When Ben receives word that his father has died, Steve drives him home and they re-connect with Ben''s successful and driven sister Terri and hippie step-mother Angela who is the same age as they are. The reading of the will drives Ben to come up with a new purpose in life, but those around him don''t prove to be very supportive, and then they all re-examine their own life.'),
(9, 'MANA MUNGKIN SELIMUT TETANGGAAAAA', '2014-10-05', 'Coconut nut is a giant nut, if you eat too much you''ll get very fat'),
(10, 'KOK ilang ya?', '2014-10-08', 'Salah dimana nih editnya?\r\nCobain lagi apa?\r\n	\r\n            '),
(12, 'Semoga Berhasil', '0000-00-00', 'Coba non kabisaaaaat'),
(13, 'Semoga Ngga 0000-00-00', '0000-00-00', 'Bisa ga ya?'),
(14, 'Semoga Ngga 0000-00-00 Lagi', '0000-00-00', 'bisa ngga ya? Mangaaat!'),
(15, 'Semoga Ngga 0000-00-00 Lagi Lagi', '0000-00-00', 'Masi aja nyobain gas'),
(16, 'Ceuna ceuna ceuna ceuna', '0000-00-00', 'Lorem lorem lorem'),
(17, 'Gilang kenapa?', '2015-02-03', 'Ga jelas banget ini di sekre	\r\n            '),
(18, 'Cobain lagi lah, masa engga sempurna', '2014-09-11', 'A young couple works to survive on the streets after their car breaks down right as the annual purge commences.\r\n\r\nA couple are driving home when their car breaks down just as the Purge commences. Meanwhile, a police sergeant goes out into the streets to get revenge on the man who killed his son, and a mother and daughter run from their home after assailants destroy it. The five people meet up as they attempt to survive the night in Los Angeles.'),
(19, 'Cobain tanggal salah', '2014-09-11', 'A young couple works to survive on the streets after their car breaks down right as the annual purge commences.\r\n\r\nA couple are driving home when their car breaks down just as the Purge commences. Meanwhile, a police sergeant goes out into the streets to get revenge on the man who killed his son, and a mother and daughter run from their home after assailants destroy it. The five people meet up as they attempt to survive the night in Los Angeles.'),
(20, 'Kok salah ya', '2014-09-11', 'Bisa ga sih?'),
(21, 'Coba ga ya', '2014-09-11', 'bisa ga sih'),
(23, 'cobain lagi ah', '0000-00-00', 'hohoho'),
(25, 'Jaringan Komunikasi Ngapain aja?', '2014-10-13', 'Ahmad gabut parah idupnya\r\nngapain lu mat?\r\nmendingan bikin background biar kece'),
(26, 'Transport Service Primitives', '2014-09-13', 'A state diagram for simple connection management scheme. Transitions labelled in italics are caused by packet arrivals. The solid lines show client state changes/	\r\n            '),
(27, 'Mark Zukerberg Blusukan', '2014-10-14', 'Jadi begini ceritanya. . . aku kemarin kenapa?\r\nGila lu di\r\neh rame sekrenya\r\ngue belajar ngetik tanpa liat ini sebenernya\r\neh teteiba ada hendro\r\nhednro nfobrol sama ucup\r\nterus nisa curhat ama tutut'),
(28, 'Yeay dibeliin ardi AI3 tapi pengen panjang sebener', '2014-10-14', 'hohoho	\r\n            	\r\n            	\r\n            	\r\n            	\r\n            	\r\n            	\r\n            ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
