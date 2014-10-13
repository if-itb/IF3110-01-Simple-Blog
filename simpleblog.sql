-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Okt 2014 pada 09.07
-- Versi Server: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL` text NOT NULL,
  `TANGGAL` date NOT NULL,
  `KONTEN` text NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data untuk tabel `entries`
--

INSERT INTO `entries` (`PID`, `JUDUL`, `TANGGAL`, `KONTEN`) VALUES
(23, 'bosen', '2014-10-10', 'Yo Deadline tugas ini 3 hari lagi brooooh'),
(33, 'Perang', '2014-10-11', 'Otak : Paniklah, AI tinggal 4 hari!!!! <br>\r\nAfik : â€¦â€¦â€¦. Kalo skip tubes sekali bakal gimana ya? .___.'),
(42, 'asdsa', '2013-09-12', 'sjdfnds'),
(47, 'bisaaaa', '2014-10-12', 'sdjksfnsdk'),
(48, 'coba lagi ', '2014-10-12', 'jsandaksdnmsad'),
(49, 'coba lagi ', '2014-10-12', 'jsandaksdnmsad'),
(51, 'nuhuh', '0008-08-08', '8'),
(53, 'jnjn', '0009-09-09', '9ijijsas'),
(54, 'jnjn', '0009-09-09', '9ijijsas'),
(59, 'asas', '2014-09-21', 'snfsdm'),
(60, 'alert this', '0001-09-21', 'ansanmd'),
(61, 'tanggalnya sama', '2014-10-13', 'jsandasdnaksdkajfbsjdbfjhabfsjnhsjf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `PID` int(11) NOT NULL,
  `KID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TANGGAL` date NOT NULL,
  `KOMENTAR` text NOT NULL,
  PRIMARY KEY (`KID`),
  KEY `FK_entries_PID` (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`PID`, `KID`, `NAMA`, `EMAIL`, `TANGGAL`, `KOMENTAR`) VALUES
(33, 1, 'Afik', 'afik@gmail.com', '2014-10-12', 'pusing'),
(33, 4, 'bezzelbulb', 'b.com', '2014-10-12', 'kapan ini kelaaaaaar?'),
(47, 32, 'mau nambah tanggal dong', 'ads@asda.sds', '2014-10-13', 'andjkanskdas');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FK_entries_PID` FOREIGN KEY (`PID`) REFERENCES `entries` (`PID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
