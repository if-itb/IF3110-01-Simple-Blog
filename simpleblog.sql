-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2014 pada 16.09
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `simpleblog`
--

CREATE DATABASE IF NOT EXISTS `simpleblog`;
USE `simpleblog`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `tanggal`, `konten`) VALUES
(1, 'RANGGA IS HERE', '2014-09-12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?'),
(2, 'RANGGA IS HERE2', '2014-09-24', 'Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_blog` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_blog`, `nama`, `email`, `komentar`, `timestamp`) VALUES
(1, 1, 'Jems', 'jems@jems.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! …', '2014-10-07 07:05:58'),
(2, 1, 'Abdul', 'Abdul@Abdul.com', 'AbdulAbdulAbdulAbdulAbdulAbdul', '2014-10-11 07:05:58'),
(3, 1, 'Budi', 'Budi@budi.com', 'BudiBudiBudiBudiBudiBudiBudiBudiBudiBudiBudiBudiBudiBudiBudi', '2014-10-11 07:05:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
