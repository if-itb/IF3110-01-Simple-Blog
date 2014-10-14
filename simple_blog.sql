-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2014 pada 07.51
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `simple_blog`
--
CREATE DATABASE IF NOT EXISTS `simple_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simple_blog`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `komentar` text NOT NULL,
  `id_post` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `tanggal`, `komentar`, `id_post`) VALUES
(1, 'anan', 'kurniawan.ananda@gmail.com', '2014-10-14 07:39:08', 'teees', 2),
(2, 'Firza', 'firxaginting@gmail.com', '2014-10-14 07:48:49', 'Setuju dan sangat bagus artikelnya', 4),
(3, 'Eki', 'eki@yahoo.com', '2014-10-14 07:49:34', 'Lanjutkan!!', 4),
(4, 'Sabda', 'sabda@gmail.com', '2014-10-14 07:50:08', 'Ayo MAJU INDONESIA', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal`, `konten`) VALUES
(3, 'Pemilu 2014 ', '2014-10-14', 'Dua tokoh yang istimewa, lewat caranya,\r\nDua tokoh yang terbaik, dengan caranya,\r\nDua tokoh petarung yang siap legawa menerima mandat rakyat\r\n\r\nJika memang tak menerima mandat rakyat untuk memimpin bangsa\r\nBerarti rakyat memberikan mandat untuk kembali, memberikan yang terbaik dengan cara seperti sebelumnya\r\n\r\nKini Komisi Pemilihan telah mengumumkan hasil\r\nJoko Widodo adalah Pemenang Pemilihan Umum\r\nKapal Pinisi di Sunda Kelapa, sebagai saksi sejarah\r\nJoko Widodo berbahagia\r\nMenyisakan Probowo Subianto, berada dalam putusan kalah\r\nPrabowo Subianto bukannya tak legawa menerima putusan kalah\r\nHanya menuntut kejelasan, atas hal yang menurutnya janggal\r\nSaat semua sudah jelas\r\nYakin... Prabowo Subianto akan melakukan mandat rakyat, untuk kembali memberikan yang terbaik dengan cara seperti sebelumnya.\r\nIni hanya masalah waktu atas keputusan Mahkamah tertinggi negeri ini\r\n\r\nDi momen yang baik, 17 Agustus 2014\r\nKembali harus disadari\r\nApapun kita, sejatinya kita tetap satu jua\r\nApapun kita, mari memberi untuk ibu pertiwi\r\n\r\nOleh : ankalucio'),
(4, 'Pemilu Indonesia Penuh Teka-Teki', '2014-10-15', 'Saat ini, bangsa ini sedang berpesta demokrasi\r\nGembira dalam pesta, harapan semua\r\nLarut dalam perbedaan, menuju persatuan\r\nTak ada usaha saling menjatuhkan,\r\nTak ada sogok-menyogok,\r\nTak ada manipulasi suara,\r\nSegala sikap harus kesatria,\r\nSemoga semua bukan hanya fatamorgana semata\r\n\r\nPemilu 2014 ini memang berlangsung damai,\r\nMinim kerusuhan antar pendukung,\r\nMinim konflik antar pendukung,\r\nTapi...\r\nSepertinya keindahan damai di luar,\r\nTak mencerminkan sehatnya apa yang ada di dalam\r\n\r\nIndonesiaku, Indonesiamu, Indonesia Kita\r\nBukankah apapun pilihanku dan pilihanmu,\r\nSejatinya kita tetap satu jua\r\n\r\nPerlu diingat bahwa segala apa yang kita usahakan,\r\nSemata-mata untuk Indonesia Jaya,\r\nDua calon presiden yang berlaga,\r\nSama-sama hebat dengan caranya\r\nButuh legawa, untuk dapat mengikhlaskan\r\nYang ini menang, yang itu kalah\r\n\r\nBerharap... semoga segala apa yang terjadi\r\nAkan tercatat dalam kisah\r\nSemata-mata untuk pembelajaran di masa depan\r\n\r\nBerharap... semoga Indonesia yang Kaya, semakin Jaya\r\nDi tangan pemimpin besar, dan terbaik bangsa Indonesia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
