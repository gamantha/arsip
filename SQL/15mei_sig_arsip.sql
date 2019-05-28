/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50626
Source Host           : 127.0.0.1:3306
Source Database       : sig_arsip

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-05-15 16:43:47
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
  `jenis` enum('masuk','keluar') NOT NULL,
  `dikirim_ke` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `receipt` enum('required - received','required - sent','not required') DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arsip
-- ----------------------------
INSERT INTO `arsip` VALUES ('42', '001/MSU-PROD/SPK/DIR/I/2016', '2016-01-08', '1', '1', 'SPK PAVING 6 CM & KANSTIN ASIR ROW 12 DAN 14 & PEREMPATAN LAVENDER-ASIR BOULEVARD', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('43', '002/MSU-PROD/SPL/SM/I/2016', '2016-01-11', '1', '1', 'SPL PASANG PAVING 6 CM & KANSTIN ASIR ROW 12 DAN 14 & PEREMPATAN LAVENDER - ASIR BOULEVARD', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('44', '003/MSU-PROD/SPK/DIR/I/2016', '2016-01-08', '1', '1', 'SPK BONGKAR PASANG KANSTIN (390X190X90) DAN PAVING ASIR ROW 12', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('45', '004/MSU-PROD/SPL/SM/I/2016', '2016-01-11', '1', '1', 'SPL BONGKAR PASANG KANSTIN (390X190X90) DAN PAVING ASIR ROW 12', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('46', '005/MSU-PROD/SPK/DIR/I/2016', '2016-01-08', '1', '1', 'SPK BONGKAR PASANG KANSTIN (390X190X90) DAN PAVING ASIR ROW 12', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('47', '006/MSU-PROD/SPL/SM/I/2016', '2016-01-11', '1', '1', 'SPL BONGKAR PASANG KANSTIN (390X190X90) DAN PAVING ASIR ROW 12', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('48', '007/MSU-PROD/SPK/DIR/I/2016', '2016-01-08', '1', '1', 'SPK PENGADAAN TANAMAN', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('49', '008/MSU-PROD/SPL/SM/I/2016', '2016-01-11', '1', '1', 'SPL PENGADAAN TANAMAN', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('50', '009/MSU-PROD/SPK/DIR/I/2016', '2016-01-08', '1', '1', 'SPK PENGADAAN TANAMAN CLUSTER CEMPAKA DAN TERATAI', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('51', '010/MSU-PROD/SPL/SM/I/2016', '2016-01-11', '1', '1', 'SPL PENGADAAN TANAMAN CLUSTER CEMPAKA DAN TERATAI', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('52', '001/MSU-KU/DIR/I/2016', '2016-01-13', '1', '2', 'SURAT TAGIHAN PIUTANG KPR', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('53', '002/MSU-PROD/PPKP/SM/I/2016', '2016-01-14', '1', '1', 'PINJAM MEMAKAI KANTOR PROYEK', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('54', '003/MSU-PROD/LPA/SM/I/2016', '2016-01-14', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('55', '004/MSU-PROD/LPA/SM/I/2016', '2016-01-14', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('56', '005/MSU-KU/DIR/I/2016', '2016-01-15', '1', '2', 'TAGIHAN SERTIFIKAT/JAMINAN', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('57', '006/MSU-KU/DIR/I/2016', '2016-01-15', '1', '2', 'TAGIHAN SERTIFIKAT/JAMINAN', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('58', '007/MSU-KU/DIR/I/2016', '2016-01-15', '1', '2', 'TAGIHAN IMB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('59', '008/MSU-KU/DIR/I/2016', '2016-01-15', '1', '2', 'TAGIHAN IMB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('60', '002/MSU-PROD/PPKP/SM/I/2016', '2016-01-08', '1', '1', 'PERMOHONAN PINJAM PAKAI KANTOR', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('61', '011/MSU-PROD/SPK/DIR/I/2016', '2016-01-19', '1', '1', 'SPK PEMASANGAN JALAN PAVING ASIR ROW 14 (LURUSAN JLN KEMUNING-KENARI)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('62', '012/MSU-PROD/SPL/SM/I/2016', '2016-01-19', '1', '1', 'SPL PEMASANGAN JALAN PAVING ASIR ROW 14 (LURUSAN JLN KEMUNING-KENARI)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('63', '013/MSU-PROD/SPK/DIR/I/2016', '2016-01-19', '1', '1', 'SPK PEMASANGAN JALAN PAVING 6 CM ASIR ROW 14 (FASOS FASUM - JALAN TANJUNGWANGI)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('64', '014/MSU-PROD/SPL/SM/I/2016', '2016-01-19', '1', '1', 'SPL PEMASANGAN JALAN PAVING 6 CM ASIR ROW 14 (FASOS FASUM - JALAN TANJUNGWANGI)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('65', '016/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('66', '017/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('67', '018/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('68', '019/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('69', '020/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('70', '021/MSU-MKTD/KONS/MGR/I/2016', '2016-01-20', '1', '7', 'SURAT PEMBATALAN KAVLING', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('71', '001/SKI-PERS/DIR/I/16', '2016-01-07', '3', '6', 'VAKLARING PRIYADI', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('72', '002/SKI-LG/BPN/DIR/I/2016', '2016-01-21', '3', '3', 'SURAT KUASA PENGECEKAN', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('73', '001/SIG-PROD/IMIGRASI/DIR/I/2016', '2016-01-19', '6', '1', 'PERPANJANGAN PASPORT NUR ADJANI FAJAR AL MOECHADIS', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('74', '001/SIL-ACC/DIR/I/2016', '2016-01-08', '2', '2', 'PEMBERITAHUAN PINDAH ALAMAT KANTOR', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('75', '002/SIL-PERS/MGR/I/2016', '2016-01-11', '2', '6', 'PEMBERHENTIAN KERJASAMA', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('76', '003/SIL-PROD/LPA/SPV/I/2016', '2016-01-26', '2', '1', 'LPA', '4', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('77', '004/SIL-LG/BPN/DIR/I/2016', '2016-01-26', '2', '3', 'SURAT KUASA PENGECEKAN', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('78', '003/SKI-KU/BTN/DIR/I/2016', '2016-01-29', '3', '2', 'STANDING INSTRUCTION', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('79', '023/MSU-KU/BTN/DIR/I/2016', '2016-01-29', '1', '2', 'STANDING INSTRUCTION', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('80', '024/MSU-KU/BTN/DIR/I/2016', '2016-01-29', '1', '2', 'STANDING INSTRUCTION', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('81', '006/SIL-KU/BTN/DIR/I/2016', '2016-01-29', '2', '2', 'STANDING INSTRUCTION', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('82', '005/SIL-KU/BTN/DIR/I/2016', '2016-01-29', '2', '2', 'STANDING INSTRUCTION', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('83', '025/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - RENRA', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('84', '026/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - FAJAR', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('85', '027/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - MULYONO', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('86', '028/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - CAESARYADI', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('87', '029/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - SENO', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('88', '030/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ARIE', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('89', '031/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - USMAN', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('90', '032/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ELIS', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('91', '033/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ALVIN', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('92', '034/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - IFEN', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('93', '035/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - YUSRINA', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('94', '036/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ANISHA', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('95', '037/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - SADI', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('96', '038/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ANIS', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('97', '039/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - ASEP', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('98', '040/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - GIRI', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('99', '041/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'PERJANJIAN KONTRAK KERJA - WATI', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('100', '007/SIL-MKTD/BTN/MGR/I/2016', '2016-01-29', '2', '7', 'PERMOHONAN AKAD KREDIT', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('101', '21/BDG.UT/CSMU/I/2016', '2016-02-12', '2', '2', 'PERMINTAAN LAPORAN KEUANGAN DAN PENILAIAN AGUNAN', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('102', '31/BDG.UT/CSMU/I/2016', '2016-02-12', '1', '2', 'PERMINTAAN LAPORAN KEUANGAN DAN PENILAIAN AGUNAN', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('103', '047/MSU-PROD/SPK/DIR/I/2016', '2016-01-23', '1', '1', 'SPK PEMASANGAN JALAN PAVING 6 CM DAN PEMANSANGAN KANSTEIN DI PARKIRAN KANTOR PRODUKSI', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('104', '048/MSU-PROD/SPL/SM/I/2016', '2016-01-25', '1', '1', 'SPL PEMASANGAN JALAN PAVING 6 CM DAN PEMANSANGAN KANSTEIN DI PARKIRAN KANTOR PRODUKSI', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('105', '043/MSU-PERSN/PKK/DIR/I/2016', '2016-01-28', '1', '8', 'SURAT KONTRAK IYAN D', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('106', '044/MSU-PROD/LPA/SM/II/2016', '2016-02-09', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('107', '045/MSU-LG', '2016-02-10', '1', '3', 'SURAT TUGAS-POLRES CIMAHI', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('108', '046/MSU-LG', '2016-02-10', '1', '3', 'SURAT TUGAS - POLSEK CILILIN', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('109', '004/SKI-PROD/SM/II/2016', '2016-02-04', '3', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('110', '005/SKI-KU/BTN/MGR/II/2016', '2016-02-15', '3', '2', 'SI ATAS NAMA ANDRI WIDIAWAN', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('111', '010/SIL-MKTD/BTN/MGR/II/2016', '2016-02-11', '2', '7', 'SURAT PENAWARAN KPR', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('112', '011/SIL-MKTD/BTN/MGR/II/2016', '2016-02-11', '2', '7', 'SURAT PENAWARAN KPR', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('113', '012/SIL-MKTD/BTN/MGR/II/2016', '2016-02-11', '2', '7', 'SURAT PENAWARAN KPR', '2', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('114', '014/SKR-SKH/MGR/II/2016', '2016-02-17', '2', '6', '\'-', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('115', '049/MSU-MKTD/BTN/MGR/II/2016', '2016-02-11', '1', '7', 'SURAT PERNYATAAN TAMBAHAN RETENSI', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('116', '050/MSU-MKTD/BTN/MGR/II/2016', '2016-02-11', '1', '7', 'SURAT PERNYATAAN TAMBAHAN RETENSI', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('117', '051/MSU-PROD/LPA/SM/II/2016', '2016-02-19', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('118', '013/SIG-PRC/MGR/II/2016', '2016-02-15', '6', '5', 'PELPORAN KERUSAKAN GRILL', '2', '9', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('119', '0125/TJ-SP/II/2016', '2016-02-01', '6', '6', 'PARTISIPASI HUT TRIBUN JABAR', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('120', '052/MSU-KU/BTN/DIR/II/2016', '2016-02-23', '1', '2', 'TAGIHAN IMB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('121', '053/MSU-KU/BTN/DIR/II/2016', '2016-02-23', '1', '2', 'TAGIHAN SERTIFIKAT/JAMINAN', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('122', '054/MSU-KU/BTN/DIR/II/2016', '2016-02-23', '1', '2', 'TAGIHAN IMB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('123', '055/MSU-KU/BTN/DIR/II/2016', '2016-02-23', '1', '2', 'TAGIHAN SERTIFIKAT/JAMINAN', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('124', '056R/MSU-PROD/SPK/DIR/I/2016', '2016-02-29', '1', '1', 'SPK PEMBANGUNAN RST TIPE 31/62 M2', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('125', '057R/MSU-PROD/SPL/SM/II/2016', '2016-02-02', '1', '1', 'SPL PEMBANGUNAN RST TIPE 31/62 M2', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('126', '058R/MSU-PROD/SPK/DIR/I/2016', '2016-01-29', '1', '1', 'SPK PEMBANGUNAN RST DI TERATAI 4 (23 UNIT)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('127', '059R/MSU-PROD/SPL/SM/II/2016', '2016-02-01', '1', '1', 'SPL PEMBANGUNAN RST DI TERATAI 4 (23 UNIT)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('128', '060/MSU-KU/BTN/DIR/II/2016', '2016-02-25', '1', '2', 'SURAT KUASA LEGAL MEETING', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('129', '061/MSU-KU/BTN/DIR/II/2016', '2016-02-25', '1', '2', 'SURAT PERNYATAAN MENANGGUNG BIAYA BTN', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('130', '062/MSU-KU/BTN/DIR/II/2016', '2016-02-25', '1', '2', 'STANDING INSTRUCTION', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('131', '063/MSU-KU/BTN/DIR/III/2016', '2016-03-03', '1', '2', 'TAGIHAN LISTRIK', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('132', '064/MSU-KU/BTN/DIR/III/2016', '2016-03-03', '1', '2', 'TAGIHAN LISTRIK', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('133', '065/MSU-KU/BTN/DIR/III/2016', '2016-03-03', '1', '2', 'TAGIHAN PIUTANG BESTEK', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('134', '066/MSU-KU/BTN/DIR/III/2016', '2016-03-03', '1', '2', 'TAGIHAN PIUTANG BESTEK', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('135', '006/SKI-PRBN/MGR/II/2016', '2016-02-26', '3', '8', 'SURAT PERINGATAN UNTUK YOSEP DARMAWAN', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('136', '007/SKI-KU/Pajak/DIR/II/2016', '2016-02-26', '3', '2', '\'-', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('137', '008/SKI-PERS/DIR/III/2016', '2016-03-14', '3', '8', 'BPJS KESEHATAN', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('138', '671/556-LPE/D. ESDM', '2016-03-05', '6', '1', 'Kewajiban Sertifikasi Laik Operasi', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('139', '009/SKI-KU/BTN/DIR/III/2016', '2016-03-16', '3', '2', 'PERUBAHAN ALAMAT', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('140', '010/SKI-PERSN/DIR/III/2016', '2016-03-24', '3', '8', 'PEMBUATAN PASPOR', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('141', '011/SKI-MKTD/BTN/MGR/III/2016', '2016-03-28', '3', '7', 'SURAT PENAWARAN RUMAH', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('142', '012R/SKI-PROD/SPK/DIR/IV/2016', '2016-04-01', '3', '1', 'RUMAH MALABAR TIMUR 3 NO 2', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('143', '013R/SKI-PROD/SPL/SM/IV/2016', '2016-04-01', '3', '1', 'RUNAH MALABAR TIMUR 3 NO 2', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('144', '014/SKI-PRSN/DIR/IV/2016', '2016-04-04', '3', '8', 'SURAT IZIN TIDAK MASUK KULIAH (TRIZHA)', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('145', '015/SIL-LG/BTN/DIR/II/2016', '2016-02-26', '3', '3', 'SURAT KUASA PENGECEKAN', '1', '9', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('146', '016/SIL-LG/BTN/DIR/II/2016', '2016-02-26', '2', '3', 'SURAT KUASA SPLIT', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('147', '017/SKR-PRSN/MGR/III/2016', '2016-03-03', '2', '8', 'VAKLARING', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('148', '018/SKR-PROD/SPK/DIR/II/2016', '2016-02-26', '2', '1', 'PELAKSANAAN PEKERJAAN PASANG PAVING, GRASS BLOCK, KANSTEIN', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('149', '019/SKR-UM/MGR/III/2016', '2016-03-10', '2', '6', 'PENGAMBILAN BPKB', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('150', '020/SKR-KU/DIR/III/2016', '2016-03-10', '2', '2', 'PAJAK', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('151', '021/SIL-LG/BPN/DIR/III/2016', '2016-03-15', '2', '3', 'SURAT KUASA PENGECEKAN', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('152', '022/SIL-LG/BPN/DIR/III/2016', '2016-03-15', '2', '3', 'SURAT KUASA PENGECEKAN', '1', '3', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('153', '023/SIL-LG/BPN/DIR/III/2016', '2016-03-15', '2', '3', 'SURAT KUASA PENGECEKAN', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('154', '024/SKR-KU/BTN/DIR/III/2016', '2016-03-16', '2', '2', 'PERUBAHAN ALAMAT', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('155', '025/SKR-KU/BTN/DIR/III/2016', '2016-03-16', '2', '2', 'PENCAIRAN DEPOSITO', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('156', '026/SKR-KU/BTN/DIR/III/2016', '2016-03-16', '2', '2', 'SURAT KUASA', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('157', '027/SKR-MKTD/BTN/MGR/III/2016', '2016-03-17', '2', '7', 'SURAT PENAWARAN KPR KE BTN CIMAHI', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('158', '028/SKR-KU/BTN/DIR/III/2016', '2016-03-23', '2', '2', 'TAGIHAN PIUTANG JAMINAN SERIFIKAT SIL', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('159', '029/SKR-PROD/SPK/DIR/IV/2016', '2016-04-07', '2', '1', 'PAGAR ', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('160', '030/SKR-PROD/SPK/DIR/IV/2016', '2016-04-07', '2', '1', 'RAILING', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('161', '031/SKR-KU/KPP/DIR/IV/2016', '2016-04-19', '2', '2', 'JAWABAN SURAT TEGURAN', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('162', '067/MSU-PROD/SPK/DIR/II/2016', '2016-02-17', '1', '1', 'PEKERJAAN GELAR BATU CROP S/D PAVING & KANSTIN DI AREA  FASOS FASUM', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('163', '068/MSU-PROD/SPL/SM/II/2016', '2016-02-18', '1', '1', 'PEKERJAAN GELAR BATU CROP S/D PAVING & KANSTIN DI AREA  FASOS FASUM', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('164', '069R/MSU-PROD/SPK/DIR/III/2016', '2016-03-01', '1', '1', 'SPK PEMBANGUNAN RST TIPE 31/72 M2 DI ALAM TERATAI RAYA (GENAP, 7 UNIT)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('165', '070R/MSU-PROD/SPL/DIR/III/2016', '2016-03-02', '1', '1', 'SPL PEMBANGUNAN RST TIPE 31/72 M2 DI ALAM TERATAI RAYA (GENAP, 7 UNIT)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('166', '071R/MSU-PROD/SPK/DIR/III/2016', '2016-03-01', '1', '1', 'SPK PEMBANGUNAN RST TIPE 31/72 M2 DI ALAM TERATAI RAYA (GANJIL 7 UNIT)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('167', '072R/MSU-PROD/SPL/DIR/III/2016', '2016-03-02', '1', '1', 'SPL PEMBANGUNAN RST TIPE 31/72 M2 DI ALAM TERATAI RAYA (GANJIL 7 UNIT)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('168', '073/MSU-KU/DIR/II/2016', '2016-03-02', '1', '2', 'PAJAK', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('169', '074/MSU-LG/BPN/DIR/III/2016', '2016-03-15', '1', '3', 'SPLITZING SERTIFIKAT', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('170', '075/MSU-LG/BPN/DIR/III/2016', '2016-03-15', '1', '3', 'SPLITZING SERTIFIKAT', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('171', '076/MSU-KU/BTN/DIR/III/2016', '2016-03-16', '1', '2', 'PERUBAHAN ALAMAT/SURAT KETERANGAN GANTI ALAMAT', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('172', '077/MSU-KU/BTN/DIR/III/2016', '2016-03-16', '1', '2', 'PERUBAHAN ALAMAT/SURAT KETERANGAN GANTI ALAMAT', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('173', '078/MSU-PROD/SPK/DIR/III/2016', '2016-03-16', '1', '1', 'SPK PEKERJAAN GALIAN TANAH UNTUK SALURAN DI TERATAI, CEMPAKA & AZALEA', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('174', '079/MSU-PROD/SPL/DIR/III/2016', '2016-03-16', '1', '1', 'SPL PEKERJAAN GALIAN TANAH UNTUK SALURAN DI TERATAI, CEMPAKA & AZALEA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('175', '080/MSU-MKTD/BTN/MGR/III/2016', '2016-03-23', '1', '7', 'PENGAJUAN AKAD KREDIT 29 MARET 2016', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('176', '081/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('177', '082/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('178', '083/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('179', '084/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('180', '085/MSU-KU/DIR/III/2016', '2016-04-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('181', '086/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('182', '087/MSU-KU/DIR/III/2016', '2016-03-24', '1', '2', 'PEMBUATAN PASPOR', '1', '10', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('183', '088/MSU-PROD/PSU/DIR/III/2016', '2016-03-28', '1', '1', 'USULAN PSU 2016', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('184', '089/MSU-PROD/LPA/SM/II/2016', '2016-02-22', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('185', '090/MSU-MKTD/BTN/MGR/III/2016', '2016-03-28', '1', '7', 'SURAT PENAWARAN RUMAH', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('186', '091/MSU-PROD/LPA/SM/IV/2016', '2016-04-07', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('187', '092/MSU-PROD/SPK/DIR/IV/2016', '2016-04-09', '1', '1', 'SPK PEKERJAAN PASANG PAVING 6 CM DI ASIR ROW 14 (FASOS)', '1', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('188', '093/MSU-PROD/SPL/SM/IV/2016', '2016-04-09', '1', '1', 'SPL PEKERJAAN PASANG PAVING 6 CM DI ASIR ROW 14 (FASOS)', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('189', '094/MSU-MKTD/BTN/MGR/IV/2016', '2016-04-21', '1', '7', 'SURAT PENGAJUAN AKAD KREDIT', '2', '8', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('190', '095/MSU-PROD/LPA/SM/IV/2016', '2016-04-21', '1', '1', 'LPA', '3', '2', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('191', '096/MSU-PRSN/DIR/IV/2016', '2016-04-22', '1', '8', 'VAKLARING PAK WIRA', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('192', '097/MSU-PRSN/DIR/IV/2016', '2016-04-22', '1', '8', 'VAKLARING PAK WIRA', '1', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('193', '098/MSU-LG/DISPENDA/DIR/IV/2016', '2016-04-22', '1', '3', 'SURAT KUASA MUTASI PBB', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('194', '099/MSU-LG/DISPENDA/DIR/IV/2016', '2016-04-22', '1', '3', 'SURAT KUASA MUTASI PBB', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('195', '100/MSU-LG/DISPENDA/DIR/IV/2016', '2016-04-22', '1', '3', 'SURAT KUASA MUTASI PBB', '1', '6', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('196', '890/MJEE/MNT-AO/IV/16/ALD', '2016-04-07', '6', '1', 'PENAWARAN KONTRAK PEMELIHARAAN LIFT', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('197', '034/SIL-KU/BTN/DIR/IV/2016', '2016-04-26', '2', '2', 'PERMOHONAN PENCAIRAN PIUTANG PPJB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('198', '035/SKR-KU/DIR/V/2016', '2016-05-03', '2', '2', 'KREDIT PRK KE BANK ARTHA GRAHA', '1', '7', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('199', '101/MSU-KU/BTN/DIR/V/2016', '2016-05-10', '1', '2', 'TAGIHAN LISTRIK - BTN JAWA', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('200', '102/MSU-KU/BTN/DIR/V/2016', '2016-05-10', '1', '2', 'TAGIHAN LISTRIK - BTN CIMAHI', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('201', '016/SKI-PRSN/MGR/V/2016', '2016-05-03', '3', '8', 'PEMBERITAHUAN NON AKTIF PAK WIRA KE BPJS KESEHATAN', '2', '5', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('202', '021/EXT/RW-12/IV/2016', '2016-04-28', '2', '1', 'PERMOHONAN BANTUAN UNTUK ATRIBUT ANGGOTA KEAMANAN, PJU & MESIN RUMPUT', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('203', '017/KU/BTN/DIR/V/2016', '2016-05-11', '3', '2', 'TAGIHAN PIUTANG PPJB', '1', '4', 'keluar', null, null, null, null);
INSERT INTO `arsip` VALUES ('204', '655', '2016-05-19', '4', '2', 'test', '1', '3', 'masuk', null, null, null, null);
INSERT INTO `arsip` VALUES ('205', '45', '2016-05-07', '5', '2', 'rwrewerw', '2', '3', 'masuk', '43', null, null, null);
INSERT INTO `arsip` VALUES ('206', '78', '2016-05-13', '1', '3', 'makan', '1', '3', 'masuk', 'pln', '2016-05-15 15:55:09', null, null);

-- ----------------------------
-- Table structure for `divisi`
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES ('1', 'PROD');
INSERT INTO `divisi` VALUES ('2', 'KU');
INSERT INTO `divisi` VALUES ('3', 'LG');
INSERT INTO `divisi` VALUES ('4', 'MRK');
INSERT INTO `divisi` VALUES ('5', 'PRC');
INSERT INTO `divisi` VALUES ('6', 'UM');
INSERT INTO `divisi` VALUES ('7', 'MKTD');
INSERT INTO `divisi` VALUES ('8', 'PERSN');

-- ----------------------------
-- Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `jabatan_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('1', 'DIR');
INSERT INTO `jabatan` VALUES ('2', 'MGR');
INSERT INTO `jabatan` VALUES ('3', 'SM');
INSERT INTO `jabatan` VALUES ('4', 'SPV');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyimpanan
-- ----------------------------
INSERT INTO `penyimpanan` VALUES ('2', 'FILE PRODUKSI');
INSERT INTO `penyimpanan` VALUES ('3', 'MEJA ANIS');
INSERT INTO `penyimpanan` VALUES ('4', 'FILE KEUANGAN (PAK ALVIN)');
INSERT INTO `penyimpanan` VALUES ('5', 'FILE UMUM & PERSONALIA');
INSERT INTO `penyimpanan` VALUES ('6', 'FILE PERIZINAN');
INSERT INTO `penyimpanan` VALUES ('7', 'FILE KEUANGAN (BU FANCY)');
INSERT INTO `penyimpanan` VALUES ('8', 'FILE MKTD');
INSERT INTO `penyimpanan` VALUES ('9', 'FILE PERENCANAAN');
INSERT INTO `penyimpanan` VALUES ('10', 'FILE KEUANGAN (INDRI)');

-- ----------------------------
-- Table structure for `perusahaan`
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES ('1', 'MSU');
INSERT INTO `perusahaan` VALUES ('2', 'SKR');
INSERT INTO `perusahaan` VALUES ('3', 'SKI');
INSERT INTO `perusahaan` VALUES ('4', 'TSL');
INSERT INTO `perusahaan` VALUES ('5', 'PLATINUM');
INSERT INTO `perusahaan` VALUES ('6', 'SIG');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES ('1', 'uploads/surat', '2015-12-21 15:31:09', '10', '10-1-gambar-kartun-10-580x434.jpg');

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
