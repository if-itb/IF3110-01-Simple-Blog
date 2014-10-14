-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 03:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogwindy`
--
CREATE DATABASE IF NOT EXISTS `blogwindy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogwindy`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_post` int(11) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Komentar` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  KEY `id_post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_post`, `Nama`, `Tanggal`, `Komentar`, `Email`) VALUES
(74, 'windy', '2014-10-14', 'wah sayang sekali ya', 'windyameliaa@gmail.com'),
(74, 'Paulus Berliz', '2014-10-14', 'Sangat menyentuh hati', 'paulusberliz@paulus.com'),
(75, 'vidia', '2014-10-14', 'hmmmmm', 'vidianindhita@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `Judul` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Konten` text NOT NULL,
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Judul`, `Tanggal`, `Konten`, `id_post`) VALUES
('Chris Brown Dihujat karena Komentar Soal Penyakit Ebola', '2014-10-14', 'Mulai saat ini nampaknya Chris Brown harus berhati-hati dengan perkataannya. Setelah berkicau mengenai penyakit Ebola, pelantun hits ''New Flame'' tersebut dihujat oleh publik.\r\n\r\nPada Senin (13/10/2014) Chris memutuskan untuk berbagi pikiran lewat Twitter mengenai virus yang telah menewaskan hampir 4000 manusia di Afrika Barat tersebut. Namun sayangnya, tweet-nya itu malah memicu kemarahan dari mereka yang peduli dengan penyakit ini.\r\n\r\n"Aku tak tahu, tapi menurutku wabah Ebola ini adalah bentuk dari pengendalian populasi. Hal ini semakin gila," kicaunya.\r\n\r\nTak lama setelahnya, Chris pun menerima komentar negatif dari berbagai pihak. Kebanyakan mengkritik teori konspirasi yang tersirat dari ucapan Chris, yang dianggap aneh oleh publik. \r\n\r\n"Tolong diingat bahwa Chris Brown adalah seorang idiot. Sehingga teorinya tentang Ebola setingkat dengan kata-kata kasar orang idiot di pedesaan," ujar salah satu pengguna Twitter bernama Kevin. Tweet sang penyanyi R&B tersebut juga menarik perhatian komedian Warren Holstein.', 74),
('Ikuti Cara Mudah Sembuhkan Flu dengan Teh Bawang', '2014-10-14', 'Teh bawang sudah digunakan sebagai obat tradisional untuk pilek, flu dan batuk. Bawang mengandung nutrisi untuk membantu melawan pilek, dan teh herbal dapat membuat merelaksasi saat proses pemulihan. Selain itu, bawang juga mengandung zat yang dapat meningkatkan sistem kekebalan.\r\nMenurut Pelayanan Kesehatan Universitas Princeton, saat terserang flu sebaiknya hindari kafein karena dapat meningkatkan hidung tersumbat dan dehidrasi. Beberapa orang biasanya lebih memilih meminum teh hangat saat flu, tapi teh yang mengandung kafein justru akan membuat flu semakin parah. Jenis teh herbal seperti teh bawang tidak mengandung kafein dan dapat membantu penyembuhan. Vitamin C dan antioksidan yang terkandung dalam bawang dapat menambah proteksi terhadap flu.\r\nCara membuat teh bawang sangat mudah, yaitu dengan memotong dan merebusnya dengan air teh herbal, dan teh bawang pun siap untuk menyembuhkan flu.\r\nUntuk menciptakan rasa lebih enak, dapat pula ditambahkan rempah lain seperti jahe. Campurkan lima iris jahe, dua buah bawang, sedikit garam dan dua sendok teh teh hijau ke dalam teko. Tambahkan air panas dan biarkan teh selama tiga sampai empat menit.', 75),
('Beban si Penderita Osteoporosis Tak Hanya Fisik', '2014-10-14', 'Seringkali orang menganggap remeh kesehatan pada tulang. Faktanya memang masih banyak masyarakat yang belum mengenali bahaya dari penyakit osteoporosis.\r\n"Penderita Osteoporosis sangat berisko tinggi mengalami fraktur atau patah tulang, yang dapat membebani si orang tersebut secara fisik, dan juga emosional," Ujar Dokter Spesialis Bedah Tulang RS Santosa dr. Daniel Pratikno, SpOT kepada Tribun pra mengisi Talk Show acara Seminar Eksklusif Osteoporosis ''Lawan Osteoporosis dengan 3T, Talk, Test, Threat''. di RS Sentosa Bandung, Jumat, (10/10/2014).\r\nDaniel mengatakan, faktanya di Asia termasuk juga Indonesia deteksi dan diagnosa pasien Osteoporosis masih sangat rendah sehingga banyak pasien yang tidak menjalankan terapi yang dibutuhkan,  ia menambahkan terapi pengobatan yang tepat pada pasien Osteopororsis yang berisiko tinggi mengalami patah tulang, dapat mengurangi beban osteoporosis jangka panjang.\r\nLebih lanjut Daniel mengatakan penderita Osteoporosis sejauh ini dikatakannya banyak memakan korban pada wanita pada usia senja, ia menambahkan bahwa sejatinya usia yang sangat rentan terserang osteoporosis berada pada range usia 45-50 Tahun ke atas.', 76),
('Bangun Pagi Bisa Membuat Anda Lebih Bahagia', '2014-10-14', 'Orang yang suka tidur terlalu malam sering bangun pagi dengan raut wajah kusut saat pergi ke sekolah atau ke kantor dan perlu didoping dengan kopi. Sementara orang yang suka bangun pagi datang 15 menit lebih awal dengan suasana hati cerah. Orang yang suka bangun pagi tidak hanya ceria pada pagi hari; mereka lebih bahagia dan lebih puas dengan hidup secara keseluruhan, menurut sebuah studi.\r\n\r\nKebiasaan remaja yang suka beraktivitas pada malam hari mulai berkurang seiring bertambahnya usia, dan studi itu menemukan peralihan menjadi orang yang suka bangun pagi ini bisa jadi alasan mengapa orang yang lebih dewasa lebih bahagia daripada orang yang lebih muda.\r\n\r\nâ€œRiset sebelumnya mengindikasikan bahwa orang yang suka bangun pagi melaporkan mereka merasa lebih bahagia daripada orang yang suka bangun siang, dan riset ini baru dilakukan terhadap orang dewasa muda,â€ kata penulis studi Renee Biss, lulusan University of Toronto, kepada LiveScience. \r\n\r\nOrang yang suka bangun pagi\r\nStudi baru ini mengamati usia harapan hidup untuk melihat apakah kebiasaan bangun pagi orang yang lebih tua berpengaruh terhadap kualitas kehidupan mereka secara keseluruhan.\r\n\r\nPara peneliti mempelajari dua populasi: satu kelompok yang terdiri dari 435 orang dewasa berusia 17 sampai 38 tahun, dan satu kelompok yang terdiri dari 297 orang yang lebih tua berusia 59 sampai 79 tahun. Kedua kelompok mengisi angket mengenai kondisi emosional mereka, kondisi kesehatan menurut mereka sendiri dan waktu favorit mereka dalam satu hari.\r\n\r\nSetelah memasuki usia 60, kebanyakan orang jadi suka bangun pagi, menurut peneliti. Hanya sekitar tujuh persen orang dewasa muda yang suka bangun pagi, namun seiring semakin bertambah usia mereka, gaya hidupnya berubah. Setelah usia mereka lebih tua hanya sekitar tujuh persen yang masih suka beraktivitas hingga malam hari. \r\n\r\nâ€œKami menemukan bahwa orang dewasa yang lebih tua melaporkan emosi yang jauh lebih positif daripada orang dewasa yang lebih muda,â€ kata Biss. â€œâ€™Kegiatan pagiâ€™ diasosiasikan dengan emosi kebahagiaan yang jauh lebih besar pada kedua kelompok usia.â€\r\n\r\nKekagetan sosial\r\nOrang yang suka bangun pagi juga cenderung merasa lebih sehat daripada orang yang biasa beraktivitas pada malam hari. Para peneliti mengatakan itu kemungkinan terjadi akibat mereka tidur cukup nyenyak karena mereka secara alami suka bangun pagi. Hal itu tidak hanya bisa membuat mereka merasa lebih siaga, tetapi benar-benar berdampak pada sistem kekebalan tubuh mereka.\r\n\r\nâ€œKami tidak tahu mengapa bisa begini, namun ada beberapa penjelasan yang masuk akal. Orang yang suka bangun siang bisa jadi lebih rentan terhadap kekagetan sosial; artinya jam biologis mereka tidak sinkron dengan jam sosial,â€ kata Bliss. â€œEkspektasi masyarakat sebagian besar terbentuk dari jadwal orang yang suka bangun pagi.â€\r\n\r\nContohnya, kebanyakan orang bangun lebih pagi untuk pergi ke kantor atau sekolah, bahkan jika mereka tidak menyukainya. â€œOrang yang suka bangun siang bisa merasa tidak bahagia sepanjang pekan karena mereka harus bangun lebih awal dari yang mereka mau,â€ kata Biss.\r\n\r\nSalah satu pemicu kebahagiaan yang mudah? Ganti jadwal tidur Anda untuk mengubah diri Anda menjadi orang yang suka bangun pagi. â€œSalah satu cara untuk melakukannya adalah perbanyak terkena sinar matahari pagi, dan bangun lebih pagi serta tidur lebih awal,â€ kata Biss. â€œAkan lebih mudah jika Anda punya jadwal yang konsisten, untuk menjamin Anda bangun di waktu yang sama setiap hari.â€', 77);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
