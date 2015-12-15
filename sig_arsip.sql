-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 03:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sig_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE IF NOT EXISTS `arsip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `penyimpanan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perusahaan_id` (`perusahaan_id`),
  KEY `divisi_id` (`divisi_id`),
  KEY `tema_id` (`tema`),
  KEY `jabatan_id` (`jabatan_id`),
  KEY `penyimpanan_id` (`penyimpanan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `no_surat`, `tanggal_simpan`, `perusahaan_id`, `divisi_id`, `tema`, `jabatan_id`, `penyimpanan_id`) VALUES
(10, '1', '2015-12-12', 1, 1, 'pengen rapat aja', 1, 1),
(12, '2', '2015-12-12', 2, 1, 'das', 1, 1),
(13, '10', '2015-12-12', 1, 1, 'pengen rapat aja', 1, 1),
(14, 'a21', '2015-12-09', 1, 1, 'surat cinta', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`divisi_id`, `nama_divisi`) VALUES
(1, 'perencanaan');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `jabatan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `nama_jabatan`) VALUES
(1, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penyimpanan`
--

CREATE TABLE IF NOT EXISTS `penyimpanan` (
  `penyimpanan_id` int(10) NOT NULL AUTO_INCREMENT,
  `tempat_penyimpanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`penyimpanan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `penyimpanan`
--

INSERT INTO `penyimpanan` (`penyimpanan_id`, `tempat_penyimpanan`) VALUES
(1, 'laci1');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`perusahaan_id`, `nama_perusahaan`) VALUES
(1, 'MSU'),
(2, 'SIG'),
(3, 'Gamantha');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `tema_id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tema_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`tema_id`, `tema`) VALUES
(1, 'Rapat kornas');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text,
  `last_update` timestamp NULL DEFAULT NULL,
  `arsip_id` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_upload_arsip_1` (`arsip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_1` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'reno', 'renowijoyo@gmail.com', '4XFGCO7IRlrb9wZuPcSrvWo8bt9H6Yra', '$2y$13$LFS3EIwRyS9vyc3CY7QLnOEBmc5YVmcwCeaDC3GTds63xTIrt0TzG', NULL, 1, 1442506740, 1442506740, '10'),
(2, 'rizki', 'rizki@gmail.com', '7RYZIpXilZwhK8bqFgp5K0yYfHypzWND', '$2y$13$kztNvx0vD0UIclTSMR5/1ONZZChb2V2nwVmkHY.uHdB5HXOn.ZEU.', NULL, 1, 1444883061, 1444883061, '10'),
(3, 'anis', 'anis@gmaill.com', 'WHogQVYFvrjtZ0UzEZ_2NYQ1R5VmMAL8', '$2y$13$jWRPiDGm76uk79hnYAy0QOKZTSulHATgjg27xHuWcpbrB2Ay/auNC', NULL, NULL, 1450062566, 1450062566, '10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip`
--
ALTER TABLE `arsip`
  ADD CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`penyimpanan_id`) REFERENCES `penyimpanan` (`penyimpanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_ibfk_4` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_ibfk_5` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
