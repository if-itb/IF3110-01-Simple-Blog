-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2014 pada 12.03
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_simpleblog`
--
CREATE DATABASE IF NOT EXISTS `db_simpleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_simpleblog`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_comment`
--

CREATE TABLE IF NOT EXISTS `post_comment` (
  `post_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komen` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `post_comment`
--

INSERT INTO `post_comment` (`post_id`, `comment_id`, `nama`, `email`, `komen`, `tanggal`) VALUES
(4, 12, 'stella', 'email@yahoo.com', 'komentar lalalalala', '2014-10-13'),
(1, 13, 'test', 'lalala@lala.co.id', 'asasdaksdh', '2014-10-13'),
(5, 14, 'siapa aja boleh ', 'siapaaja_@yahoo.com', 'kenapa apa dimana', '2014-10-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_content`
--

CREATE TABLE IF NOT EXISTS `post_content` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `post_content`
--

INSERT INTO `post_content` (`id`, `title`, `date`, `content`) VALUES
(1, 'SIAPA DI BALIK SIMPLE BLOG??', '2014-10-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis aliquam minus consequuntur amet nulla eius, neque beatae, nostrum possimus, officiis eaque consectetur. Sequi sunt maiores dolore, illum quidem eos explicabo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam consequuntur consequatur molestiae saepe sed, incidunt sunt inventore minima voluptatum adipisci hic, est ipsa iste. Nobis, aperiam provident quae. Reprehenderit, iste. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?'),
(2, 'POST KE DUA', '2014-12-11', 'ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama ini post kedua. bukan post pertama '),
(4, 'POST KE TIGA', '2014-12-04', 'ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada ini masih ada '),
(5, 'POST BARU LAGI', '2014-10-14', 'post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget post nya baru banget ');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
