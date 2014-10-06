-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2014 at 06:12 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `info_comment`
--

CREATE TABLE IF NOT EXISTS `info_comment` (
  `ID` int(11) NOT NULL,
  `comment` text NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_post`
--

CREATE TABLE IF NOT EXISTS `info_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `info_post`
--

INSERT INTO `info_post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(49, 'Kompilasi "Dear Captcha" Ask.fm', '2014-07-24', 'Seenggaknya biar ada post yang nggak terlalu hina. Biar ada post yang unyu unyu unch gitu. Kalau ada yang nemuin lagi, tambahin ya :)<br><br> <br><br>1. Kevin Maulana<br><br>Dear Captcha, kamu berkesan banget sumpah, kayaknya cuman di angkatan ini aja yang menerima gw dengan tangan terbuka walopun gw sendiri rada tertutup orangnya hehehe :)) Maaf banget yah klo gw gak terlalu banyak berkontribusi untuk angkatan tercinta ini. Tetep semangat yah CAPTCHA, may our friendship remains. *hugs*<br><br>Sincerely, 13512044.<br><br> <br><br>2. Teofebano Kristo<br><br>terima kasih ya udah nemenin gue selama setaun ini.. jujur, mungkin tanpa kalian kehidupan gw di kampus ya cuman gitu-gitu doang.. kerjanya cuman belajar, pulang kosan, tidur, besoknya kampus lagi.. gw banyak belajar dari kalian, dan rasa-rasanya gw belom pernah memberikan sesuatu yang berarti bagi angkatan keren ini.. tapi ketahuilah, keluargaku sayangku cintaku (maap kalo kebalik) captcha 2012, kalian keluarga terindah dan terkece yang pernah gw miliki di kampus Ganesha.. :D<br>3. Bagaskara Pramudita<br>Makasih buat bantuannya menyelesaikan 2 semester ini dengan indahnya ~<br>4.  Aryya Dwisatya Widigdha<br>Keluargaku, sayangku, cintaku, pamit dulu ya....mau bertapa di Lumajang untuk beberapa saat.<br>5. Kanya Paramita<br>Makasih udah mau menerima aing se apa ada nya itu :"" maafin kalo suka galak dan marah2 ala cewe hahaha. Tetep jadi captcha yang kaya gini ya haha. Btw kita harus sering2 ngadain acara rame2aaaan nih! Minimal makan2 bareng gitu kek. Pokonya jangan lupa sama sesama kalo udah gede dan sukses nanti! Kalian angkatan the best banget lah luvyu all banget pokonya muah <3<br> 6. Khairina Putri Iskandar<br>Kalian tuh walaupun bermacam-macam tp tetep satu hehe. Walaupun ada beberapa yang lebih suka diem, tp keseluruhan oke banget! Angkatannya bener2 bisa ngebuat nyaman, ketawa2, banyak deh. Captcha dihati pokoknya haha.<br>13512013<br>Jobel'),
(84, 'Nasehat dari Prof. Reinaldo', '2014-10-06', 'Ingin sukses dan kaya seperti prof reinaldo mh? Berikut ini adalah tujuh buah nasihat kunci untuk sukses dari Prof. Reinaldo yang tim captcha2012 rangkum khusus untuk anda.\r<br>\r<br>Berhentilah menuntut ilmu, karena ilmu tidak bersalah.\r<br>Jangan membalas budi karena belum tentu Budi yang melakukannya.\r<br>Jangan mengarungi lautan, karena karung lebih cocok untuk beras.\r<br>Berhenti juga menimba ilmu, karena ilmu tidak ada di dalam sumur\r<br>Yang paling penting, jangan lupa daratan, karena kalau lupa daratan akan tinggal dimanaâ€¦???\r<br>Jangan ngurusin orang karena belum tentu orang itu pengen kurus.\r<br>Dan janganlah bangga menjadi atasan. Karena di Pasar Baru atasan 10 rb dapat 3\r<br>\r<br> \r<br>\r<br>Demikian dan terimakasih'),
(85, 'Mr. Muscle', '2014-10-06', 'Komposs â€“ Bandung. Seseorang yang bernama Kevin Huang akhir â€“ akhir ini menjadi begitu terkenal. Mengapa? Jika anda melakukan search pada google dengan keyword â€œKevin Huangâ€, maka anda akan menemukan bahwa pria inilah yang akan muncul. Di samping menjadi seorang bodybuilder, pria yang akrab disapa dengan Kevin ini ternyata adalah seorang mahasiswa jurusan Teknik Informatika. Menurutnya, anak Informatika itu tidak selalu hanya jago programming saja. Untuk informasi lebih lanjut, Kevin bersedia untuk diwawancara secara langsung.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_comment`
--
ALTER TABLE `info_comment`
  ADD CONSTRAINT `info_comment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `info_post` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
