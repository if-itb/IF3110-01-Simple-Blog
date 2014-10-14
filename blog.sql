-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2014 pada 08.09
-- Versi Server: 5.6.16
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `isi`, `tanggal`) VALUES
(30, 'Cerita masa lalu', 'Today stories..', '12/12/2014'),
(31, 'Senin 13 Oktober 2014', 'Hari Senin tanggal 13 Oktober 2013', '14/10/2014'),
(33, 'Validasi tanggal', 'Validasi tanggal', '14/10/2014'),
(34, 'Validasi tanggal', '13', '13/10/2104'),
(35, 'Validasi tanggal', '12', '14/10/2014'),
(37, 'Tambah isi', 'Pada strategi ini, peti yang paling banyak mengeluarkan koin yang dipilih duluan dengan harapan dapat memaksimalkan skor.\r\nHimpunan Kandidat: Himpunan peti pada peta\r\nHimpunan Solusi: Himpunan peti yang memenuhi target skor\r\nFungsi seleksi: Pilih peti yang paling banyak isi koinnya\r\nFungsi kelayakan: Apakah waktu yang dibutuhkan untuk perjalanan + membuka peti tidak melebihi batas waktu? Dan apakah koin yang dimiliki cukup untuk membeli peralatan yang dibutuhkan untuk membuka peti?\r\nFungsi objektif: Pendapatan koin dari peti maksimal\r\nStrategi Greedy by Tools\r\nPada strategi ini, peti yang memerlukan peralatan yang paling murah yang dipilih duluan dengan harapan dapat meminimalkan modal yang dikeluarkan untuk pada akhirnya memperbesar skor.\r\nHimpunan Kandidat: Himpunan peti pada peta\r\nHimpunan Solusi: Himpunan peti yang memenuhi target skor\r\nFunsgi seleksi: Pilih peti yang memerlukan peralatan paling murah\r\nFungsi kelayakan: Apakah waktu yang dibutuhkan untuk perjalanan + membuka peti tidak melebihi batas waktu? Dan apakah koin yang dimiliki cukup untuk membeli peralatan yang dibutuhkan untuk membuka peti?\r\nFungsi objektif: Pengeluaran koin untuk membeli alat minimal\r\n', '14/10/2014'),
(38, 'Hi there', 'Woww..', '13/10/2014'),
(39, 'My First Blog', 'First commit', '13/10/2014'),
(40, 'Hello World', 'testing judul kosong', '15/10/2014');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_post` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `id_post_2` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_post`, `nama`, `tanggal`, `email`, `komentar`) VALUES
(1, 30, 'Irsyad Hanif', '2014-10-13 13:35:53', 'iisakh@yahoo.com', 'Hello everyone!'),
(2, 30, 'Rafi', '2014-10-13 13:46:27', '13512075@std.stei.itb.ac.id', 'gkjdakdgaskgd\nv jagdckfgsajd\ncagfoaud\ncahcisahcdiohp8yedwpq'),
(3, 30, 'Rafi', '2014-10-13 13:46:36', '13512075@std.stei.itb.ac.id', 'ochoashf\ncsajcsaj\ncsahdoiah\ncas');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
