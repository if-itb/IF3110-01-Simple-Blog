-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 06:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `kom_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kom_nama` varchar(100) DEFAULT NULL,
  `kom_email` varchar(100) DEFAULT NULL,
  `kom_waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kom_isi` text,
  `post_id_fk` int(10) unsigned NOT NULL,
  PRIMARY KEY (`kom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kom_id`, `kom_nama`, `kom_email`, `kom_waktu`, `kom_isi`, `post_id_fk`) VALUES
(1, 'icha', 'icha@something.com', '2014-10-14 11:53:08', 'ini nih tugasnya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Judul` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Konten` text,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `Judul`, `Tanggal`, `Konten`) VALUES
(1, 'Functional Requirement', '2014-10-14', '1.	Application Area\r\nCollaboration and Coordination System for Managing Activity of a Committee\r\n2.	Main Stakeholders\r\na)	Ketua/koordinator tim (frequent dan expert user)\r\nPengguna ini mempunyai otorisasi khusus terhadap pengguna lain, yaitu anggota tim.\r\nb)	Anggota tim (frequent user)\r\n3.	Data Gathering for Requirements\r\nMengamati produk yang serupa, yaitu trello.\r\n4.	Functional Requirements\r\n1)	Sistem menyediakan fasilitas untuk pengguna agar dapat menyusun daftar tugas yang harus dilakukan.\r\nDeskripsi singkat: Pengguna dapat membuat daftar tugas yang harus dikerjakan, beserta deskripsi singkat, tanggal mulai, dan tanggal akhir dari tugas tersebut. Pengguna juga dapat memberikan prioritas pada tugas yang dikehendakinya.\r\nUsability goal: efficient to use\r\nUser experience goal: helpful\r\n2)	Sistem membolehkan pengguna untuk menempatkan pengguna-pengguna lain pada tugas yang dibuatnya.\r\nDeskripsi singkat: Kebutuhan ini dibutuhkan oleh ketua atau koordinator tim, sehingga mereka dapat membagi pekerjaan-pekerjaan yang ada untuk anggota timnya. Pekerjaan tersinkronisasi antara ketua dan anggota tim, sehingga ketua dapat mengawasi keberjalanan dari tugas tersebut. Ketua atau koordinator dan anggota timnya dapat berdiskusi pada pekerjaan yang bersangkutan, melalui sistem komentar.\r\nUsability goal: have good utility\r\nUser experience goal: enhancing sociability\r\n3)	Sistem menyediakan fasilitas untuk membuat jadwal pertemuan sebuah tim.\r\nDeskripsi singkat: Pada fasilitas ini, pengguna dapat menuliskan judul pertemuan, tempat pertemuan, dan waktu pertemuan. Pengguna juga dapat menambahkan pengguna lain yang harus menghadiri pertemuan tersebut.\r\nUsability goal: efficient to use \r\nUser experience goal: helpful\r\n4)	Sistem menyediakan sistem peringatan atau notifikasi untuk pengguna.\r\nDeskripsi singkat: Pengguna mendapat peringatan ketika waktu telah mendekati tanggal akhir tugas. Ketua atau koordinator tim juga dapat memberi peringatan kepada anggota timnya, sesuai dengan pekerjaan. Ketua mendapat notifikasi ketika anggota timnya telah menyelesaikan suatu pekerjaan.\r\nUsability goal: safe to use\r\nUser experience goal: motivating\r\n5)	Sistem menyediakan kalender pekerjaan.\r\nDeskripsi singkat: Pengguna dapat melihat keseluruhan pekerjaannya dalam sebuah kalender. Misalkan pada tanggal A, pengguna harus mengerjakan pekerjaan X, Y, dan Z. Kalender juga menampilkan jadwal pertemuan yang harus dihadiri.\r\nUsability goal: easy to learn\r\nUser experience goal: emotionally fulfilling\r\n6)	Sistem menyediakan fasilitas untuk pengguna agar dapat menandai atau melabeli tugas.\r\nDeskripsi singkat: Pengguna dapat menandai dengan status keberjalanan pada setiap pekerjaan. Status tersebut dapat berupa selesai atau sedang dikerjakan. Pengguna juga dapat melabeli tugasnya dengan topik yang sesuai.\r\nUsability goal: easy to remember how to use\r\nUser experience goal: satisfying\r\n   \r\n'),
(2, '3 Kriteria Security', '2014-10-16', '1.	Confidentiality\r\nSistem yang aman harus memenuhi confidentiality. Hal ini berarti bahwa pemakai/pengguna hanya boleh melihat data-data tertentu yang boleh dilihat. Isu-isu yang sering terjadi saat ini adalah penyalahgunaan data nasabah kartu kredit bank. Ceritanya, data-data yang harusnya bersifat confidential itu malah diperjualbelikan ke pihak lain untuk kepentingan tertentu. Salah satu contoh adalah web www.jualdatabase.org. Website ini memberikan layanan bagi customer yang ingin mendapatkan database-database tertentu. Biasanya, database-database ini digunakan untuk pemasaran bisnis.\r\n2.	Availability\r\nSalah satu contoh layanan yang low availability adalah aplikasi directory lookup di directory website. Aplikasi ini membantu user untuk mencari infromasi atau kontak siapapun di kampus, misalnya untuk website universitas. Mungkin hal ini boleh dibilang mengganggu, karena ketidakbisaan akses informasi ini buka merupakan masalah yang penting bagi universitas secara keseluruhan.\r\n1.	Integrity\r\nSalah satu contoh layanan yang low integrity adalah polling online dengan user yang anonim. Website-website seperti CNN dan ESPN biasanya menawarkan polling-polling tersebut kepada semua user dan  mereka tidak memakai safeguard.  Meskipun data polling tersebut mungkin akurat, tapi tidak ada yang menjamin bahwa satu user hanya melakukan voting satu kali. Bisa bisa saja satu user melakukan voting lebih dari satu kali dengan cara tertentu. Oleh karena itu, data polling ini kurang terjamin integritasnya.\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
