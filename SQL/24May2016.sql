/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : yii2advanced

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 05/24/2016 13:35:22 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `arsip`
-- ----------------------------
DROP TABLE IF EXISTS `arsip`;
CREATE TABLE `arsip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `penyimpanan_id` int(11) NOT NULL,
  `jenis` enum('masuk','keluar') NOT NULL,
  `dikirim_ke` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `receipt` enum('required - received','required - sent','not required') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perusahaan_id` (`perusahaan_id`),
  KEY `divisi_id` (`divisi_id`),
  KEY `jabatan_id` (`jabatan_id`),
  KEY `penyimpanan_id` (`penyimpanan_id`),
  KEY `tema_id` (`tema_id`) USING BTREE,
  CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`penyimpanan_id`) REFERENCES `penyimpanan` (`penyimpanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_4` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_5` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arsip_ibfk_6` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`tema_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `arsip`
-- ----------------------------
BEGIN;
INSERT INTO `arsip` VALUES ('207', '111', '2016-05-03', '1', '3', '1', '2', '4', 'keluar', 'Pak Reno', '2016-05-24 13:09:10', null, 'required - received'), ('208', '333', '2016-05-03', '1', '2', '1', '2', '7', 'keluar', 'Pak Reno', '2016-05-24 13:17:41', null, 'required - received');
COMMIT;

-- ----------------------------
--  Table structure for `divisi`
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `divisi`
-- ----------------------------
BEGIN;
INSERT INTO `divisi` VALUES ('1', 'PROD'), ('2', 'KU'), ('3', 'LG'), ('4', 'MRK'), ('5', 'PRC'), ('6', 'UM'), ('7', 'MKTD'), ('8', 'PERSN');
COMMIT;

-- ----------------------------
--  Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `jabatan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `jabatan`
-- ----------------------------
BEGIN;
INSERT INTO `jabatan` VALUES ('1', 'DIR'), ('2', 'MGR'), ('3', 'SM'), ('4', 'SPV');
COMMIT;

-- ----------------------------
--  Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penyimpanan`
-- ----------------------------
DROP TABLE IF EXISTS `penyimpanan`;
CREATE TABLE `penyimpanan` (
  `penyimpanan_id` int(10) NOT NULL AUTO_INCREMENT,
  `tempat_penyimpanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`penyimpanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `penyimpanan`
-- ----------------------------
BEGIN;
INSERT INTO `penyimpanan` VALUES ('2', 'FILE PRODUKSI'), ('3', 'MEJA ANIS'), ('4', 'FILE KEUANGAN (PAK ALVIN)'), ('5', 'FILE UMUM & PERSONALIA'), ('6', 'FILE PERIZINAN'), ('7', 'FILE KEUANGAN (BU FANCY)'), ('8', 'FILE MKTD'), ('9', 'FILE PERENCANAAN'), ('10', 'FILE KEUANGAN (INDRI)');
COMMIT;

-- ----------------------------
--  Table structure for `perusahaan`
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `perusahaan`
-- ----------------------------
BEGIN;
INSERT INTO `perusahaan` VALUES ('1', 'MSU'), ('2', 'SKR'), ('3', 'SKI'), ('4', 'TSL'), ('5', 'PLATINUM'), ('6', 'SIG');
COMMIT;

-- ----------------------------
--  Table structure for `reference`
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
--  Table structure for `tema`
-- ----------------------------
DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `tema`
-- ----------------------------
BEGIN;
INSERT INTO `tema` VALUES ('1', 'Rapat kornas');
COMMIT;

-- ----------------------------
--  Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text,
  `last_update` timestamp NULL DEFAULT NULL,
  `arsip_id` int(11) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `upload`
-- ----------------------------
BEGIN;
INSERT INTO `upload` VALUES ('1', 'uploads/surat', '2015-12-21 15:31:09', '10', '10-1-gambar-kartun-10-580x434.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `user`
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
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'reno', 'renowijoyo@gmail.com', '4XFGCO7IRlrb9wZuPcSrvWo8bt9H6Yra', '$2y$13$LFS3EIwRyS9vyc3CY7QLnOEBmc5YVmcwCeaDC3GTds63xTIrt0TzG', null, '1', '1442506740', '1442506740', '10'), ('2', 'rizki', 'rizki@gmail.com', '7RYZIpXilZwhK8bqFgp5K0yYfHypzWND', '$2y$13$kztNvx0vD0UIclTSMR5/1ONZZChb2V2nwVmkHY.uHdB5HXOn.ZEU.', null, '1', '1444883061', '1444883061', '10'), ('3', 'anis', 'anis@gmaill.com', 'WHogQVYFvrjtZ0UzEZ_2NYQ1R5VmMAL8', '$2y$13$jWRPiDGm76uk79hnYAy0QOKZTSulHATgjg27xHuWcpbrB2Ay/auNC', null, null, '1450062566', '1450062566', '10');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
