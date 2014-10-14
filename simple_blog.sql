-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 01:28 PM
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
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_post` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_post`, `id_komentar`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(7, 20, 'Mahmud', 'mahmud@gmail.com', 'wah hebat euy', '2014-10-13 01:29:04'),
(5, 21, 'Mahmud', 'sotoy@gmail.com', 'hebat lah', '2014-10-13 13:31:38'),
(5, 22, 'komar', 'komar@mail.com', 'ah, masa', '2014-10-13 13:46:30'),
(7, 23, 'sutoyo', 'sotoy@gmail.com', 'wah anyar yeuh', '2014-10-13 13:55:02'),
(4, 24, 'sutoyo', 'sotoy@gmail.com', 'tes juga', '2014-10-13 14:00:01'),
(4, 25, 'koharudin', 'kohar@gmail@.com', 'saya juga', '2014-10-13 15:25:06'),
(9, 30, 'komar', 'kmr.sss@gmail.com', 'oh gitu', '2014-10-14 12:06:54'),
(4, 48, 'budiman', 'budi.man@gmail.com', 'saya juga mas', '2014-10-14 17:50:06'),
(6, 52, 'dadang', 'da_dang@yahoo.co.su', 'heueuh eta judul', '2014-10-14 17:58:54'),
(10, 53, 'acep', 'a_cep@yahoo.co.su', 'ah teuing ah lieur', '2014-10-14 18:01:41'),
(6, 54, 'acep', 'a_cep@yahoo.co.su', 'lain, eta mah eusi postinganna', '2014-10-14 18:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(4, 'saya tidak jadi yakin', '2014-11-20', 'saya jadi tidak yakin nama saya budiman'),
(5, 'Kabar gembira', '2014-10-17', 'Kabar gembira untuk kita semua'),
(6, 'Ini Judul?', '2014-10-22', 'ini\r\njudul\r\nbukan\r\nsih\r\nsaya\r\ntidak\r\nyakin'),
(7, 'post baru coy', '2014-10-17', 'post anyar yeuh'),
(9, 'saya jadi yakin', '2014-11-19', 'saya jadi yakin nama saya budi'),
(10, 'Tubes AI', '2014-10-16', 'PENGGUNAAN CLIPS UNTUK MENYELESAIKAN PERMASALAHAN SUDOKU\r\nJika terdapat perbedaan spesifikasi antara penjelasan saat presentasi dengan dokumen tugas besar ini, maka yang digunakan sebagai acuan resmi adalah dokumen ini.\r\nI. Deskripsi Masalah\r\nPak Ganesh adalah seorang ilmuwan yang sangat pintar. Dia sedang mengembangkan sebuah Sistem Berbasis Pengetahuan untuk menjawab persoalan sehari-hari. Karena sistem tersebut belum siap untuk dirilis secara komersial, maka Pak Ganesh memberi nama sistem tersebut dengan code name MAGDA.\r\nSuatu hari, di hari ulang tahunnya, Pak Ganesh menerima hadiah berupa sebuah buku asah otak edisi super istimewa. Edisi tersebut terdiri dari beberapa soal sudoku. Namun, karena edisi tersebut merupakan edisi super istimewa, maka soal sudoku yang diberikan bukan soal sudoku biasa yang pada umumnya berukuran 9x9. Soal sudoku yang diberikan berukuran 6x6 dengan penanda khusus pada kedua diagonalnya. Sudoku dengan jenis tersebut biasa disebut dengan nama â€œSudoku-X Miniâ€.\r\nAturan umum yang berlaku di dalam Sudoku-X Mini adalah sebagai berikut:\r\n1. Setiap kotak hanya boleh diisi dengan sebuah angka, antara 1 sampai 6.\r\n2. Di setiap baris, tidak ada angka yang ditulis lebih dari satu kali (tidak ada angka yang berulang).\r\n3. Di setiap kolom, tidak ada angka yang berulang.\r\n4. Sudoku-X Mini terdiri dari beberapa bagian kecil berukuran (horizontal x vertikal) 3x2, yang disebut dengan â€œareaâ€. Di setiap area, tidak ada angka yang berulang.\r\n5. Sudoku-X Mini mempunyai dua buah diagonal, tiap diagonal dibentuk dari 6 buah kotak. Untuk setiap diagonal, tidak ada angka yang berulang.\r\nPak Ganesh kemudian mendapat ide untuk menambah fungsionalitas MAGDA. Pak Ganesh berniat agar MAGDA dapat menggunakan basis pengetahuan yang dimiliki untuk menyelesaikan soal-soal Sudoku-X Mini. Sebagai mahasiswa IF3170 Inteligensi Buatan, kalian diminta untuk membantu Pak Ganesh dalam pengembangan MAGDA, agar MAGDA dapat menyelesaikan soal-soal sudoku tersebut.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
