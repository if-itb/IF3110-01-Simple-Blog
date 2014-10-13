-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 10:22 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `if3110_simple_blog_db`
--
CREATE DATABASE IF NOT EXISTS `if3110_simple_blog_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `if3110_simple_blog_db`;

-- --------------------------------------------------------

--
-- Table structure for table `sb_comments`
--

CREATE TABLE IF NOT EXISTS `sb_comments` (
  `id_komentar` int(4) NOT NULL AUTO_INCREMENT COMMENT 'id komentar',
  `nama` varchar(40) NOT NULL COMMENT 'nama pemberi komentar',
  `email` varchar(40) NOT NULL COMMENT 'email pemberi komentar',
  `komentar` text NOT NULL COMMENT 'konten dari komentar',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'waktu submit komentar',
  `id_post` int(4) NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `sb_comments`
--

INSERT INTO `sb_comments` (`id_komentar`, `nama`, `email`, `komentar`, `timestamp`, `id_post`) VALUES
(25, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'Tradisi yang baik, harus dipertahankan. bravo pak SBY! sukses pak Jokowi!', '2014-10-13 13:40:38', 64),
(26, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'semoga gak sekedar basa-basi', '2014-10-13 13:41:01', 63),
(27, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'akhirnya kelar juga, hehe', '2014-10-13 19:24:38', 65),
(28, 'Bagaskara', 'bagas@bagas.com', 'lebe lu ling', '2014-10-13 19:25:05', 64),
(29, 'Ahmad', 'Ahmad@steroid.com', 'ada udang di balik batu nih', '2014-10-13 19:25:35', 63),
(30, 'Kanya', 'kanya@tilil.com', 'Ahmad sayang, main yuk', '2014-10-13 19:25:56', 63),
(31, 'Ahmad', 'ahmad@steroid.com', 'di chat aja, jangan di komen sini', '2014-10-13 19:26:10', 63),
(32, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'pada ngapain dah -_-', '2014-10-13 19:26:20', 63),
(33, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'sip-sip. . moga betah deh', '2014-10-13 19:26:44', 62),
(34, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'semoga KPK tetap bertaring, gak takut sama para koruptor senayan.\nPak SBY semoga tetap bisa mendukung pemberantasan korupsi walau udah ga jadi presiden', '2014-10-13 19:27:26', 61),
(35, 'Ardi', 'ardi@jomblo.com', 'Amin amin', '2014-10-13 19:27:53', 61),
(36, 'Lutfi Fadlan', 'Lutfi@skip.com', 'jangan dikantongin doang pak namanya. . dimunculin dong wkwk', '2014-10-13 19:28:24', 61),
(37, 'Jeffrey Lingga', 'jeffhorus19@gmail.com', 'sejauh ini gak ada yang eror, baguslah hehe', '2014-10-13 19:45:16', 66);

-- --------------------------------------------------------

--
-- Table structure for table `sb_posts`
--

CREATE TABLE IF NOT EXISTS `sb_posts` (
  `id_post` int(4) NOT NULL AUTO_INCREMENT COMMENT 'primary key id post',
  `judul` varchar(100) NOT NULL COMMENT 'judul post',
  `tanggal` date NOT NULL COMMENT 'tanggal publikasi post',
  `konten` text NOT NULL COMMENT 'isi post',
  `featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `sb_posts`
--

INSERT INTO `sb_posts` (`id_post`, `judul`, `tanggal`, `konten`, `featured`) VALUES
(61, 'Pekan Ini SBY Pastikan Terima Pansel KPK', '2014-10-13', 'Jakarta - Panitia Seleksi calon pimpinan KPK sudah mengantongi dua nama yang akan diserahkan ke Presiden Susilo Bambang Yudhoyono (SBY). Presiden dipastikan akan menerima pansel pekan ini.\r\n\r\n"Kita tunggu saja. Sebelum akhir minggu," ujar Menkum HAM yang juga Ketua Pansel, Amir Syamsuddin di Istana Negara Jakarta, Senin (13/10/2014).\r\n\r\nAmir masih mengunci rapat-rapat dua nama pilihan Pansel yang bakal diserahkan ke SBY. Nama itu baru diumumkan setelah diterima oleh SBY.\r\n\r\n"Biarlah nanti setelah kami menyerahkan kepada presiden, tentunya baru diumumkan," lanjut Amir.\r\n\r\nPolitisi Partai Demokrat ini memastikan, dua nama yang dipilih sudah melalui tahapan seleksi panjang. Dia yakin dua nama ini adalah pilihan terbaik.\r\n\r\n"Bayangkan saja, dari semula 94, enam yang ditracking, dihasilkan dua yang terbaik," tutupnya.', 1),
(62, 'Kross Lebih Mudah Beradaptasi di Madrid', '2014-10-13', 'Madrid - Toni Kroos menjadi salah satu pembelian Real Madrid di bursa musim panas tahun ini. Gelandang internasional Jerman itu menyebut kepindahan itu merupakan keputusan yang tepat karena dia lebih mudah beradaptasi. \r\n\r\nEl Real tak pernah menyebutkan secara rinci nominal pembelian Kroos dari Bayern pada pertengahan Juli tahun ini. Tapi diyakini pemain yang moncer di Piala Dunia 2014 Brasil itu didatangkan dengan biaya transfer senilai 20 juta poundsterling. \r\n\r\nSejatinya, Bayern juga masih menginginkan Kroos tinggal lebih lama. Namun, Kroos menolak tawaran perpanjangan kontrak tim yang sudah tujuh musim dibelanya itu. Bersama Madrid, pesepakbola 24 tahun itu menemukan apa yang dicari.\r\n\r\n"Aku beruntung bergabung dengan klub yang mempunyai standart tinggi. Di Munich kami berpedoman untuk tak sekadar meraih kemenangan di atas lapangan--tapi kamu harus memulai musim kompetisi untuk meraih titel. So, aku tak bisa beradaptasi dengan baik," kata Kroos seperti dikutip Daily Star. \r\n\r\n"Aku menikmati bermain di Madrid. Biar orang tak mempercayaiku, ini adalah sebuah klub dengan kekeluargaan yang tinggi. Aku merasa kalau orang-orang mempercayaiku. \r\n\r\n"Aku senang berkesempatan untuk mencoba sesuatu yang baru. Meskipun baru sebentar di sini, aku rasa ini sebuah keputusan yang tepat. \r\n\r\n"Madrid adalah klub istimewa dan tantangan yang aku cari setelah karier yang panjang di Bayern. Madrid, Bayern, Barcelona, dan Chelsea adalah empat tim terbesar saat ini, so aku hanya mau bertukar di antara klub-klub itu," beber dia. \r\n\r\nSejauh ini, Kroos menjadi starter dalam tujuh laga dan berkontribusi dengan membuat tiga assist.', 0),
(63, 'Pimpinan MPR Temui Jokowi-JK', '2014-10-13', 'Ketua MPR Zulkifli Hasan menemui Jokowi-JK. Zulkifli datang dengan didampingi tiga wakilnya, yaitu Oesman Sapta Odang, Mahyuddin, dan EE Mangindaan. Sementara Wakil Ketua DPR Hidayat Nur Wahid tidak bisa hadir karena sedang menghadiri pertemuan Inter-Parliamentary Union (IPU) di Jenewa, Swiss. ', 1),
(64, 'Istana Siapkan Serah Terima Jabatan Presiden', '2014-10-14', 'Jakarta - Seskab Dipo Alam mengatakan, istana telah menyiapkan prosesi serah terima jabatan antara Presiden Susilo Bambang Yudhoyono (SBY) dan Presiden terpilih Joko Widodo pada 20 Oktober nanti. Seperti apa mekanismenya?\r\n\r\n"Dulu memang ada rencana presiden menyambut (Jokowi-JK-red) di sini. Saya masih belum tahu skenario pastinya bagaimana," kata Dipo kepada wartawan di Istana Negara Jakarta, Senin (13/10/2014).\r\n\r\nDijelaskan Dipo, SBY akan datang ke pelantikan Jokowi-JK di Gedung DPR/MPR, Jakarta, 20 Oktober 2014 nanti. Setelah itu, SBY akan ke Istana untuk serah terima jabatan dengan Jokowi.\r\n\r\n"Kan beliau balik bukan sebagai presiden lagi, tapi sebagai yang pernah tinggal di sini (Istana Negara), beliau menghormati presiden yang baru," katanya.\r\n\r\nDipo berkata, dirinya belum bisa memastikan apakah Ani Yudhoyono dan para Menteri Kabinet Indonesia Bersatu II mendampingi SBY saat menyambut Jokowi. Namun menurutnya akan ada 7-10 tamu negara yang akan datang.\r\n\r\n"Ada 7 sampai 10 kepala negara datang untuk hormati Jokowi," imbuh Dipo tanpa merinci siapa-siapa saja yang akan datang dalam serah terima jabatan itu.\r\n\r\nDitambahkan Dipo, serah terima jabatan yang disiapkan Istana ini merupakan tradisi yang bagus. Dirinya berharap proses transisi SBY dan Jokowi nantinya akan berlangsung lancar.\r\n\r\n"Ini uluran yang sangat bagus, bahwa dalam sejarahnya presiden yang pertama kali dipilih langsung oleh rakyat bisa tuntas 10 tahun. Kedua, harus dibuat tradisi transisi, nggak perlu ramai-ramai, jadi niat presiden itu baik. Mbok yang berikan komentar-komentar, berikan apresiasi yang positif baik untuk SBY dan Jokowi," tuturnya.', 1),
(65, 'Identitas Pembuat', '2014-10-20', 'Nama : Jeffrey Lingga Binangkit.\r\nNIM : 13512059.', 1),
(66, 'Pos Hari Terakhir', '2014-10-14', 'semoga gak ada yang error. amin', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sb_comments`
--
ALTER TABLE `sb_comments`
  ADD CONSTRAINT `sb_comments_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `sb_posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
