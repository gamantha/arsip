/*
Navicat MySQL Data Transfer

Source Server         : LOCAL2
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : sig_arsip

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-12-16 09:23:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `arsip`
-- ----------------------------
DROP TABLE IF EXISTS `arsip`;
CREATE TABLE `arsip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `penyimpanan_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perusahaan_id` (`perusahaan_id`),
  KEY `divisi_id` (`divisi_id`),
  KEY `tema_id` (`tema`),
  KEY `jabatan_id` (`jabatan_id`),
  KEY `penyimpanan_id` (`penyimpanan_id`),
  CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`penyimpanan_id`) REFERENCES `penyimpanan` (`penyimpanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_4` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_5` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arsip
-- ----------------------------
INSERT INTO `arsip` VALUES ('10', '1', '2015-12-12', '1', '1', 'pengen rapat aja', '1', '1', '');
INSERT INTO `arsip` VALUES ('12', '2', '2015-12-12', '2', '1', 'das', '1', '1', '');
INSERT INTO `arsip` VALUES ('13', '10', '2015-12-12', '1', '1', 'pengen rapat aja', '1', '1', '');
INSERT INTO `arsip` VALUES ('14', 'a21', '2015-12-09', '1', '1', 'surat cinta', '1', '1', '');
INSERT INTO `arsip` VALUES ('15', 'KU2', '2015-12-16', '1', '1', 'rapat', '1', '1', 'masuk');

-- ----------------------------
-- Table structure for `divisi`
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES ('1', 'perencanaan');

-- ----------------------------
-- Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `jabatan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('1', 'manager');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------

-- ----------------------------
-- Table structure for `penyimpanan`
-- ----------------------------
DROP TABLE IF EXISTS `penyimpanan`;
CREATE TABLE `penyimpanan` (
  `penyimpanan_id` int(10) NOT NULL AUTO_INCREMENT,
  `tempat_penyimpanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`penyimpanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyimpanan
-- ----------------------------
INSERT INTO `penyimpanan` VALUES ('1', 'laci1');

-- ----------------------------
-- Table structure for `perusahaan`
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES ('1', 'MSU');
INSERT INTO `perusahaan` VALUES ('2', 'SIG');
INSERT INTO `perusahaan` VALUES ('3', 'Gamantha');

-- ----------------------------
-- Table structure for `reference`
-- ----------------------------
DROP TABLE IF EXISTS `reference`;
CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reference
-- ----------------------------

-- ----------------------------
-- Table structure for `tema`
-- ----------------------------
DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tema
-- ----------------------------
INSERT INTO `tema` VALUES ('1', 'Rapat kornas');

-- ----------------------------
-- Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text,
  `last_update` timestamp NULL DEFAULT NULL,
  `arsip_id` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_upload_arsip_1` (`arsip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of upload
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
  KEY `fk_user_role_1` (`role_id`),
  CONSTRAINT `fk_user_role_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'reno', 'renowijoyo@gmail.com', '4XFGCO7IRlrb9wZuPcSrvWo8bt9H6Yra', '$2y$13$LFS3EIwRyS9vyc3CY7QLnOEBmc5YVmcwCeaDC3GTds63xTIrt0TzG', null, '1', '1442506740', '1442506740', '10');
INSERT INTO `user` VALUES ('2', 'rizki', 'rizki@gmail.com', '7RYZIpXilZwhK8bqFgp5K0yYfHypzWND', '$2y$13$kztNvx0vD0UIclTSMR5/1ONZZChb2V2nwVmkHY.uHdB5HXOn.ZEU.', null, '1', '1444883061', '1444883061', '10');
INSERT INTO `user` VALUES ('3', 'anis', 'anis@gmaill.com', 'WHogQVYFvrjtZ0UzEZ_2NYQ1R5VmMAL8', '$2y$13$jWRPiDGm76uk79hnYAy0QOKZTSulHATgjg27xHuWcpbrB2Ay/auNC', null, null, '1450062566', '1450062566', '10');
