-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2014 pada 16.32
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `simple_blog_db`
--
CREATE DATABASE IF NOT EXISTS `simple_blog_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simple_blog_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_comment`
--

CREATE TABLE IF NOT EXISTS `tabel_comment` (
  `NoUrut` int(200) NOT NULL AUTO_INCREMENT,
  `NoArtikel` int(100) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Komentar` varchar(1000) NOT NULL,
  `Waktu` varchar(40) NOT NULL,
  PRIMARY KEY (`NoUrut`),
  KEY `tabel_comment_ibfk_1` (`NoArtikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tabel_comment`
--

INSERT INTO `tabel_comment` (`NoUrut`, `NoArtikel`, `Nama`, `Email`, `Komentar`, `Waktu`) VALUES
(2, 58, 'Daniar Heri', 'daniar.h.k@gmail.com', 'alhamdulillah ya tugasnya selesai', '2014 10 13 03 50 14 pm'),
(3, 63, 'kurniawan', 'ddhhkk2@gmail.com', 'cnjknscd ksnc kas sj acbaskc ', '2014 10 13 03 53 01 pm'),
(4, 58, 'Fandi Azam', 'ffaaww@gmail.com', 'selamat :)', '2014 10 13 03 57 22 pm'),
(5, 63, 'gtreg', 'daniar.h.k@gmail.com', 'dadcsdc', '2014 10 13 04 11 35 pm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_post`
--

CREATE TABLE IF NOT EXISTS `tabel_post` (
  `No` int(100) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(100) NOT NULL,
  `Konten` varchar(10000) NOT NULL,
  `Tanggal` varchar(21) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data untuk tabel `tabel_post`
--

INSERT INTO `tabel_post` (`No`, `Judul`, `Konten`, `Tanggal`) VALUES
(58, 'KEONG MBAK INI SAYA BINGUNG', 'Alkisah pada jaman dahulu kala hiduplah seorang pemuda bernama Galoran. Ia termasuk orang yang disegani karena kekayaan dan pangkat orangtuanya. Namun Galoran sangatlah malas dan boros. Sehari-hari kerjanya hanya menghambur-hamburkan harta orangtuanya, bahkan pada waktu orang tuanya meninggal dunia ia semakin sering berfoya-foya. Karena itu lama kelamaan habislah harta orangtuanya. Walaupun demikian tidak membuat Galoran sadar juga, bahkan waktu dihabiskannya dengan hanya bermalas-malasan dan berjalan-jalan. Iba warga kampung melihatnya. Namun setiap kali ada yang menawarkan pekerjaan kepadanya, Galoran hanya makan dan tidur saja tanpa mau melakukan pekerjaan tersebut. Namun akhirnya galoran dipungut oleh seorang janda berkecukupan untuk dijadikan teman hidupnya. Hal ini membuat Galoran sangat senang ; "Pucuk dicinta ulam pun tiba", demikian pikir Galoran.\r\n\r\nJanda tersebut mempunyai seorang anak perempuan yang sangat rajin dan pandai menenun, namanya Jambean. Begitu bagusnya tenunan Jambean sampai dikenal diseluruh dusun tersebut. Namun Galoran sangat membenci anak tirinya itu, karena seringkali Jambean menegurnya karena selalu bermalas-malasan.\r\nRasa benci Galoran sedemikian dalamnya, sampai tega merencanakan pembunuhan anak tirinya sendiri. Dengan tajam dia berkata pada istrinya : " Hai, Nyai, sungguh beraninya Jambean kepadaku. Beraninya ia menasehati orangtua! Patutkah itu ?" "Sabar, Kak. Jambean tidak bermaksud buruk terhadap kakak" bujuk istrinya itu. "Tahu aku mengapa ia berbuat kasar padaku, agar aku pergi meninggalkan rumah ini !" seru nya lagi sambil melototkan matanya. "Jangan begitu kak, Jambean hanya sekedar mengingatkan agar kakak mau bekerja" demikian usaha sang istri meredakan amarahnya. "Ah .. omong kosong. Pendeknya sekarang engkau harus memilih .. aku atau anakmu !" demikian Galoran mengancam.\r\n\r\nSedih hati ibu Jambean. Sang ibu menangis siang-malam karena bingung hatinya. Ratapnya : " Sampai hati bapakmu menyiksaku jambean. Jambean anakku, mari ', '15-10-2014'),
(63, 'Apa lagi ya? Saya bingung ', 'Selama di hutan ia mempunyai banyak teman yaitu hewan-hewan yang selalu baik kepadanya. Diantara hewan tersebut ada seekor kera berbulu hitam yang misterius. Tetapi kera tersebut yang paling perhatian kepada Purbasari. Lutung kasarung selalu menggembirakan Purbasari dengan mengambilkan bunga â€“bunga yang indah serta buah-buahan bersama teman-temannya.\r\n\r\nPada saat malam bulan purnama, Lutung Kasarung bersikap aneh. Ia berjalan ke tempat yang sepi lalu bersemedi. Ia sedang memohon sesuatu kepada Dewata. Ini membuktikan bahwa Lutung Kasarung bukan makhluk biasa. Tidak lama kemudian, tanah di dekat Lutung merekah dan terciptalah sebuah telaga kecil, airnya jernih sekali. Airnya mengandung obat yang sangat harum.\r\n\r\nKeesokan harinya Lutung Kasarung menemui Purbasari dan memintanya untuk mandi di telaga tersebut. â€œApa manfaatnya bagiku ?â€, pikir Purbasari. Tapi ia mau menurutinya. Tak lama setelah ia menceburkan dirinya. Sesuatu terjadi pada kulitnya. Kulitnya menjadi bersih seperti semula dan ia menjadi cantik kembali. Purbasari sangat terkejut dan gembira ketika ia bercermin ditelaga tersebut.\r\n\r\nDi istana, Purbararang memutuskan untuk melihat adiknya di hutan. Ia pergi bersama tunangannya dan para pengawal. Ketika sampai di hutan, ia akhirnya bertemu dengan adiknya dan saling berpandangan. Purbararang tak percaya melihat adiknya kembali seperti semula. Purbararang tidak mau kehilangan muka, ia mengajak Purbasari adu panjang rambut. â€œSiapa yang paling panjang rambutnya dialah yang menang !â€, kata Purbararang. Awalnya Purbasari tidak mau, tetapi karena terus didesak ia meladeni kakaknya. Ternyata rambut Purbasari lebih panjang.\r\n', '12-06-2014'),
(84, 'alhamdulillah', 'lmdsl ls snd lsldm sldm lskm las ', '13-10-2014'),
(86, 'rrr', 'rrrr ydrd6ue5u5', '13-10-2014');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_comment`
--
ALTER TABLE `tabel_comment`
  ADD CONSTRAINT `tabel_comment_ibfk_1` FOREIGN KEY (`NoArtikel`) REFERENCES `tabel_post` (`No`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
