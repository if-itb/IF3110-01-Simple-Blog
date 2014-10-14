-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2014 pada 12.32
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `tugaswbd1`
--
CREATE DATABASE IF NOT EXISTS `tugaswbd1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tugaswbd1`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `komentar_idpost` int(11) NOT NULL,
  `komentar_idKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `komentar_nama` varchar(100) NOT NULL,
  `komentar_email` varchar(100) NOT NULL,
  `komentar_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_konten` text NOT NULL,
  PRIMARY KEY (`komentar_idKomentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentar_idpost`, `komentar_idKomentar`, `komentar_nama`, `komentar_email`, `komentar_tanggal`, `komentar_konten`) VALUES
(1, 1, 'Kanya', 'kanyaap@a.com', '2014-10-14 08:27:44', 'ahahahah'),
(1, 2, 'Ahmad', 'ashahab28@gmail.com', '2014-10-14 08:27:58', 'asa'),
(1, 3, 'Mememe', 'ashahab28@gmail.com', '2014-10-14 10:30:31', 'ahaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_judul` varchar(200) NOT NULL,
  `post_tanggal` date NOT NULL,
  `post_konten` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`post_id`, `post_judul`, `post_tanggal`, `post_konten`) VALUES
(1, 'Post Pertama', '2014-10-16', 'Konten pertama gue nih hihihi.\r\n\r\nJadi penasaran isinya seperti apa  '),
(2, 'Ahmad', '2014-12-30', 'Ahay '),
(3, 'Bobo', '2014-10-31', 'mamamama ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
