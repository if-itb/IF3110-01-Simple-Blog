-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2014 at 06:13 PM
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
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `comment` text NOT NULL,
  UNIQUE KEY `tanggal` (`tanggal`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_comment`
--

INSERT INTO `info_comment` (`ID`, `nama`, `email`, `tanggal`, `comment`) VALUES
(96, 'Sayaka Miki', 'miki@mahoushoujo.com', '2014-10-08 23:07:54', 'Wah, bagus ini post nya'),
(85, 'Ade Ray', 'ade@gmail.com', '2014-10-08 23:08:58', 'Badannya bagus mas. Mau coba fitness bareng saya?');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `info_post`
--

INSERT INTO `info_post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(49, 'Kompilasi ', '2014-07-24', 'Seenggaknya biar ada post yang nggak terlalu hina. Biar ada post yang unyu unyu unch gitu. Kalau ada yang nemuin lagi, tambahin ya :)\r<br>\r<br> \r<br>\r<br>1. Kevin Maulana\r<br>\r<br>Dear Captcha, kamu berkesan banget sumpah, kayaknya cuman di angkatan ini aja yang menerima gw dengan tangan terbuka walopun gw sendiri rada tertutup orangnya hehehe :)) Maaf banget yah klo gw gak terlalu banyak berkontribusi untuk angkatan tercinta ini. Tetep semangat yah CAPTCHA, may our friendship remains. *hugs*\r<br>\r<br>Sincerely, 13512044.\r<br>\r<br> \r<br>\r<br>2. Teofebano Kristo\r<br>\r<br>terima kasih ya udah nemenin gue selama setaun ini.. jujur, mungkin tanpa kalian kehidupan gw di kampus ya cuman gitu-gitu doang.. kerjanya cuman belajar, pulang kosan, tidur, besoknya kampus lagi.. gw banyak belajar dari kalian, dan rasa-rasanya gw belom pernah memberikan sesuatu yang berarti bagi angkatan keren ini.. tapi ketahuilah, keluargaku sayangku cintaku (maap kalo kebalik) captcha 2012, kalian keluarga terindah dan terkece yang pernah gw miliki di kampus Ganesha.. :D\r<br>3. Bagaskara Pramudita\r<br>Makasih buat bantuannya menyelesaikan 2 semester ini dengan indahnya ~\r<br>4.  Aryya Dwisatya Widigdha\r<br>Keluargaku, sayangku, cintaku, pamit dulu ya....mau bertapa di Lumajang untuk beberapa saat.\r<br>5. Kanya Paramita\r<br>Makasih udah mau menerima aing se apa ada nya itu :"" maafin kalo suka galak dan marah2 ala cewe hahaha. Tetep jadi captcha yang kaya gini ya haha. Btw kita harus sering2 ngadain acara rame2aaaan nih! Minimal makan2 bareng gitu kek. Pokonya jangan lupa sama sesama kalo udah gede dan sukses nanti! Kalian angkatan the best banget lah luvyu all banget pokonya muah <3\r<br> 6. Khairina Putri Iskandar\r<br>Kalian tuh walaupun bermacam-macam tp tetep satu hehe. Walaupun ada beberapa yang lebih suka diem, tp keseluruhan oke banget! Angkatannya bener2 bisa ngebuat nyaman, ketawa2, banyak deh. Captcha dihati pokoknya haha.\r<br>13512013\r<br>Jobel'),
(84, 'Nasehat dari Prof. Reinaldo', '2014-10-01', 'Ingin sukses dan kaya seperti prof reinaldo mh? Berikut ini adalah tujuh buah nasihat kunci untuk sukses dari Prof. Reinaldo yang tim captcha2012 rangkum khusus untuk anda.\r<br>\r<br>Berhentilah menuntut ilmu, karena ilmu tidak bersalah.\r<br>Jangan membalas budi karena belum tentu Budi yang melakukannya.\r<br>Jangan mengarungi lautan, karena karung lebih cocok untuk beras.\r<br>Berhenti juga menimba ilmu, karena ilmu tidak ada di dalam sumur\r<br>Yang paling penting, jangan lupa daratan, karena kalau lupa daratan akan tinggal dimanaâ€¦???\r<br>Jangan ngurusin orang karena belum tentu orang itu pengen kurus.\r<br>Dan janganlah bangga menjadi atasan. Karena di Pasar Baru atasan 10 rb dapat 3\r<br>\r<br> \r<br>\r<br>Demikian dan terimakasih'),
(85, 'Mr. Muscle', '2014-10-07', 'Komposs â€“ Bandung. Seseorang yang bernama Kevin Huang akhir â€“ akhir ini menjadi begitu terkenal. Mengapa? Jika anda melakukan search pada google dengan keyword â€œKevin Huangâ€, maka anda akan menemukan bahwa pria inilah yang akan muncul. Di samping menjadi seorang bodybuilder, pria yang akrab disapa dengan Kevin ini ternyata adalah seorang mahasiswa jurusan Teknik Informatika. Menurutnya, anak Informatika itu tidak selalu hanya jago programming saja. Untuk informasi lebih lanjut, Kevin bersedia untuk diwawancara secara langsung.'),
(88, 'The 300 LBS Sportan', '2014-10-03', 'Setelah kesuksesan yang didapat dari Konda Soldier kemarin, Konda Production pun segera merilis sebuah film baru lagi. Film ini juga dibintangi oleh aktor yang masih baru memulai karirnya, yaitu Alvin Leonidas. Setelah latihan keras dan diet ketat yang dijalani oleh Alvin, akhirnya dia pun terpilih untuk menjadi pemeran utama dalam film yang satu ini. Seiring dengan kesuksesan Alvin, ia pun semakin giat berlatih dan tidak lupa untuk makan-makan di Hana*asa untuk merayakannya. Bagaimana kelanjutan kisah ini?'),
(96, 'Teori Geng Motor', '2014-10-08', 'Seperti kita tau beberapa daerah di Bandung sangat rawan geng motor terutama di malam hari.\r<br>Sering kali orang yang melewati daerah rawan tersebut menjadi korban geng motor..\r<br>\r<br>Melihat permasalahan ini Profesor muda CAPTCHA pun mengajukan Teorinya ke Pemerintah Kota (Pemkot) Bandung.\r<br>Solusi itu kemudian dikenal dengan TEORI GENG MOTOR.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_comment`
--
ALTER TABLE `info_comment`
  ADD CONSTRAINT `info_comment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `info_post` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
