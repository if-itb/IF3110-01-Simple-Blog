-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 11:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posting`
--

-- --------------------------------------------------------

--
-- Table structure for table `data-kom`
--

CREATE TABLE IF NOT EXISTS `data-kom` (
  `kom-id` int(11) NOT NULL AUTO_INCREMENT,
  `post-id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`kom-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `data-kom`
--

INSERT INTO `data-kom` (`kom-id`, `post-id`, `nama`, `waktu`, `email`, `komentar`) VALUES
(13, 3, 'dfert', '14:02 13 Oct 2014', 'wrtrete', 'tretret'),
(14, 5, 'olla', '14:24 13 Oct 2014', 'dfsgsgfsgf', 'dfdsvffgrth'),
(15, 5, 'ollasdgfgdfvs', '14:24 13 Oct 2014', 'dfsgsgfdfgdfgdsgf', 'dfdsvffewfeffgrth'),
(24, 49, 'asasasd', '23:30 13 Oct 2014', 'yollalalala@gmail.com', 'asdD'),
(27, 3, 'dsfsdfsd', '14 Oct 2014', 'yollalalala@gmail.com', 'dfdsf'),
(28, 3, 'ghshsas', '14 Oct 2014', 'yollalalala@gmail.com', 'asasasasas'),
(29, 6, 'yollalalala', '14 Oct 2014', 'yollalalala@gmail.com', 'jfkjskcjsdcsd'),
(30, 6, 'olla', '14 Oct 2014', 'yollala@rocketmail.com', 'fsdhfkdsfsdfsfdfdd'),
(31, 52, 'yolla', '14 Oct 2014', 'yollalalala@gmail.com', 'thx.. artikelny menarik!'),
(32, 53, 'olla', '14 Oct 2014', 'yollalalala@gmail.com', 'wah!!');

-- --------------------------------------------------------

--
-- Table structure for table `data-post`
--

CREATE TABLE IF NOT EXISTS `data-post` (
  `post-id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `tanggal` text NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`post-id`),
  UNIQUE KEY `post-id_2` (`post-id`),
  KEY `post-id` (`post-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `data-post`
--

INSERT INTO `data-post` (`post-id`, `judul`, `tanggal`, `konten`) VALUES
(3, 'APA ITU SIMPLE BLOG?', '12-12-2014', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?'),
(52, 'Sistem Transfer Uang Melalui Kicauan di Twitter', '14-10-2014', 'Ilustrasi Twitter yang mampu mentransfer uang melalui kicauan (foto: neowin)\r\nSistem Transfer Uang Melalui Kicauan di Twitter\r\nPRANCIS â€“ Saat ini, media jejaring sosial bukan lagi hanya bisa difungsikan untuk melontarkan tentang â€˜statusâ€™ maupun keberadaan seseorang disuatu tempat. Melebihi ekspetasinya, ternyata situs jejaring sosial ini bisa dimanfaatkan untuk pengiriman uang, seperti halnya Twitter.\r\n\r\nSalah satu Negara yang sedang mengembangkan kemampuan dari situs microblogging, Twitter, tersebut adalah Prancis. Melalui kerjasamanya dengan salah satu bank terbesar di Negara tesebut, Groupe BPCE, kabarnya pengguna Twitter di Negara Prancis bisa mengirim uang hanya dengan kicauan Twit keakun seseorang.\r\n\r\nDilansir neowin, Selasa (14/10/2014) Groupe BPCE dan Twitter dikabarkan sedang bersinergi untuk menjalankan sebuah program yang akan dikenalkan dengan nama S-money, yang dapat dimanfaatkan pengguna Twitter untuk melakukan transfer uang kepada pengguna lainnya.\r\n\r\nNamun sayangnya, belum ada informasi lebih lanjut mengenai rincian tentang system yang akan dipakai dalam S-money ini. Bahkan, mengenai pengirim dan penerima apakah hanya bisa digunakan oleh satu nasabah bank tersebut saja, atau bahkan kicauan tersebut disertakan dengan nomor rekening si penerima langsung. '),
(53, 'Pertemuan Jokowi dan Bos Facebook Menuai Kritik', '15-10-2014', 'JAKARTA â€“ Wakil Ketua DPR, Fahri Hamzah, menanggapi pertemuan presiden terpilih Joko Widodo (Jokowi) dengan bos Facebook, Mark Zuckerberg, yang berlangsung hari ini, Senin (13/10/2014). Ia mengatakan, sebenarnya Jokowi hidup di dunia nyata atau dunia maya? \r\n\r\n"Jokowi the darling of social media. Sampai orang di Amerika men-tweet soal Jokowi. Sehingga, kita ditantang, apakah ini nyata, karena dunia maya, sebagian hidup kita berada di dunia tak nyata," ujar Fahri di Gedung DPR, Senayan, Jakarta, Senin (13/10/2014). \r\n\r\nIa menegaskan, janganlah terlalu berbangga apabila populer di dunia maya. Pasalnya, hal yang mesti dipertanyakan, apakah saat ini hidup di dunia maya atau dunia nyata?  Jika di dunia nyata, itu banyak persoalan yang belum tuntas. \r\n\r\n"Kita bertanya-tanya, apakah kita ada di dunia maya atau dunia nyata? Yang nyata adalah listrik mati, jembatan putus. Di luar itu ini adalah dunia maya, jangan kita berbangga-bangga," tegas politikus Partai Keadilan Sejahtera (PKS) itu. \r\n\r\nRencana pertemuan Jokowi dengan Mark terkuak ketika bos jejaring sosial ternama ini bertandang ke Jawa Tengah. Di akun Facebook-nya, Mark berceloteh tengah menikmati Candi Borobudur, dan berencana melakukan pertemuan dengan pemimpin pemerintahan di Jakarta yang tak lain adalah Jokowi. ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
