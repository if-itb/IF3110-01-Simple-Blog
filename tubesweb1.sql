-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 12:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tubesweb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarkomentar`
--

CREATE TABLE IF NOT EXISTS `daftarkomentar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(20) NOT NULL,
  `TanggalKomentar` text NOT NULL,
  `Email` text NOT NULL,
  `IsiKomentar` text NOT NULL,
  `ID_post_terkait` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `daftarkomentar`
--

INSERT INTO `daftarkomentar` (`ID`, `Nama`, `TanggalKomentar`, `Email`, `IsiKomentar`, `ID_post_terkait`) VALUES
(1, 'Steve', '24-02-2016', 'steveharnadi@gmail.com', 'ffdsfsdafsddsfds', 99),
(2, 'BEGOK', '24-02-2016', 'begok@gmail.com', 'BEGOK', 99),
(3, 'sutil', '24-02-2016', 'sutil@gmail.com', 'sutil', 98),
(4, 'Cakep', '24-02-2016', '13512035@gmail.com', 'Cakep', 100);

-- --------------------------------------------------------

--
-- Table structure for table `daftarpost`
--

CREATE TABLE IF NOT EXISTS `daftarpost` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` text NOT NULL,
  `Tanggal` text NOT NULL,
  `IsiPostHTML` text NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `daftarpost`
--

INSERT INTO `daftarpost` (`ID`, `Judul`, `Tanggal`, `IsiPostHTML`, `Image`) VALUES
(98, 'Saya Suka Kue', '12-12-2018', 'Ffdsfsdfsdfsdfsdfsdfsdfsdfsd', 'images/jawaban sister.jpg'),
(99, 'Aku Seorang Kapiten', '12-12-2018', '												fdsfsdfsdfsda										', 'images/memenonsense.jpg'),
(100, 'Harimau', '11-12-2016', 'Melaya', 'images/picture000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `SessionID` varchar(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Email`, `SessionID`) VALUES
('Aduhai', 'f84cf1c5a4e5436b88c50f7ae39ebae74b8ba9b8283ca5971fb1d74b667cc944', 'aduhai@gmail.com', ''),
('Ilham', '2b819732be468ef2eda1445d00116e0e39665a0cb4e481baaf8d1e2b01a5068c', 'ilham@yahoo.co.id', ''),
('indra', '26e5eb2de0551497ccc2ab78dfc9d11a3713272f54a342c745bed722014c6bd8', 'indira@yahoo.com', ''),
('Persebaya', 'e45e4d2d01e6b63ecd76e3eab6b891177414bdbd95c239d0ff62065d2378fa6f', 'surabaya@gmail.com', ''),
('Persija', '5f5117f5cd795c6d1dcb842773a8662efc993ed74250563eea7fe013149efed7', 'persija@gmail.com', ''),
('Steve', 'cdd0e18ca529669c1a98a8895acf16f38a0620d63e39897da53ccc84705a4090', 'steve.harnadi@gmail.', ''),
('Ulin', '08b71ca4829075a84bbb9afd55f72abe8bcb30d88d6de51c2f8689aaca577610', 'ulin@gmail.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
