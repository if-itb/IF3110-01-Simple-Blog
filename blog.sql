-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 03:27 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `id_post` int(11) NOT NULL,
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`nama`, `email`, `komentar`, `waktu`, `id_post`) VALUES
('Vidia', 'anindhitavidia@gmail.com', 'Yah jangan ke Amerika kalo gitu, ga bisa makan kangkung..', '2014-10-14', 90),
('Jeffrey Lingga', 'jelink@jelink.com', 'lemat apaan lemat?', '2014-10-14', 87),
('alay', 'vidia@gmail.com', 'wah seram sekali', '2014-10-14', 89);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `content` text,
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`judul`, `tanggal`, `content`, `id_post`) VALUES
('Nasi Putih yang Katanya Sehat Ternyata Menipu', '2014-10-14', 'Di beberapa negara Asia, khususnya Indonesia, nasi putih menjadi menu yang tak bisa dipisahkan dengan pola konsumsi masyarakatnya. Banyak yang mengira bahwa nasi adalah makanan sehat, tapi kenyataannya, nasi membuat tubuh menyimpan lemat ketika tak dibutuhkan. Selain karbohidrat, tak ada lagi kandungan gizi yang dipunyai nasi. \r\n\r\nBanyak orang sekarang beralih ke beras merah karena lebih banyak mengandung vitamin dan nutrisi. Dan lagi beras merah membuat orang tahan kenyang lebih lama.', 87),
('Petak Umpet', '2014-10-14', 'Ibu mengatakan kita akan memainkan sebuah game. Sebuah permainan petak umpet, dan Ayah akan ikut dalam permainan itu. Ibu mengatakan kepada aku untuk menemukan tempat yang benar-benar baik untuk bersembunyi dan jangan mengeluarkan suara sedikitpun. Dia mengatakan bahwa ketika Ayah menemukanku, maka aku harus kembali ketempat Ayah menghitung, dan lari secepat yang aku bisa. Aku benar-benar mahir dalam permainan petak ini, dia pasti tidak akan menemukanku.\r\n\r\nAyah mulai menghitung. Akupun segera bersembunyi ke dalam lemari pakaian orangtuaku. Tapi ada yang aneh dengan lemari ini. Isinya agak kosong, padahal biasanya selalu penuh. Kalau kupikir-pikir lagi, koper yang biasanya ada di bagian atas lemari ini juga tidak ada. Sepertinya tadi kulihat koper itu ada di dekat pintu depan. "Mereka pasti tadi sedang merapikan isi lemari ini" pikirku dalam hati. Lama kutunggu Ayah menemukanku, tapi dia tidak kunjung datang. Aku mulai merasa lapar dan sesak di dalam lemari itu. Akupun memutuskan untuk menyerah dan keluar dari lemari itu. Saat aku kembali ke tempat Ayah menghitung, dia tidak ada di sana. "Ayaaah..." aku berteriak memanggilnya. Tidak ada jawaban. Ayah dan Ibu pasti bersembunyi. Mereka memang suka iseng.', 89),
('Ternyata di Amerika Kangkung adalah Tanaman Ilegal, kok BISA ?', '2014-10-14', 'Tanaman kangkung, dalam istilah botani disebut Ipomoea aquatica, memiliki panggilan yang berbeda di beberapa negara. Beberapa nama yang digunakan untuk menyebutkan tanaman kangkung antara lain water spinach, water morning glory, water convolvulus, morning glory, ong-choy atau swamp cabbage. Secara mengejutkan ternyata tanaman yang banyak kita jumpai di Indonesia ini ternyata dinyatakan sebagai tanaman berbahaya oleh Federal Noxious Weed Act.\r\n\r\nFederal Noxious Weed Act sendiri merupakan sebuah badan di Amerika yang bertugas untuk mengawasi pertumbuhan dan penyebaran segala jenis tumbuhan di negeri tersebut. Dengan kewenangan yang diberikan oleh Sekretaris Kementrian Agrikultur Amerika, badan ini berhak untuk melakukan penetapan terhadap tanaman yang dianggap berbahaya dan melakukan tindakan yang diperlukan terhadap tanaman tersebut termasuk memusnahkannya.\r\n\r\nBerdasarkan sebuah daftar yang dikeluarkan oleh Federal Noxious Weed Act, tanaman kangkung termasuk dalam tanaman yang berbahaya. Melakukan impor atau penyebaran tanaman kangkung, termsasuk juga benihnya, antar negara bagian di Amerika dinyatakan sebagai sesuatu yang ilegal. Pada beberapa negara bagian, tanaman kangkung dinyatakan tetap boleh ditanam untuk konsumsi yang bersifat pribadi dan harus dengan seizin badan yang berwenang.\r\n\r\nLantas kenapa sebenarnya tanaman kangkung dilarang di Amerika? Berdasarkan sebuah penelitian, ditemukan bahwa benih, bunga dan daun tanaman kangkung mengandung suatu senyawa yang disebut alkaloid ergoline. Senyawa ini selama berabad-abad telah digunakan banyak kebudayaan penduduk Mexico sebagai sebuah entheogen (sebutan senyawa psychoactive yang digunakan dalam kegiatan keagamaan atau spiritual) dan diklasifikasikan sebagai hallucinogens.\r\n\r\nBenih dari morning glory kabarnya mampu menghasilkan efek yang sama kuatnya dengan LSD (lysergic acid diethylamide) ketika diambil dalam jumlah yang besar. LSD sendiri di banyak negara, termasuk Indonesia, dikategorikan sebagai zat psikotropika dan dilarang peredarannya. Tampaknya pemerintah Amerika yang menyadari bahaya penyalahgunaan tanaman kangkung tersebut memilih untuk melakukan tindakan pencegahan terlabih dahulu.', 90);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
