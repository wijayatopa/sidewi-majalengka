/*
 Navicat Premium Data Transfer

 Source Server         : MySql
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : 127.0.0.1:3306
 Source Schema         : db_gispenginapan

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : 65001

 Date: 11/07/2019 13:02:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_foto
-- ----------------------------
DROP TABLE IF EXISTS `tbl_foto`;
CREATE TABLE `tbl_foto`  (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_penginapan` int(11) NULL DEFAULT NULL,
  `ket_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_penginapan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_foto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_foto
-- ----------------------------
INSERT INTO `tbl_foto` VALUES (25, 40, 'Kamar Tidur', 'Power_Rangers_v10_256x256.png');
INSERT INTO `tbl_foto` VALUES (26, 40, 'Kamar Mandi', 'Power_Rangers_logo2_256x256.png');
INSERT INTO `tbl_foto` VALUES (27, 40, 'Ruang Tamu', 'Power_Rangers_v5_logo2.png');

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES (8, 'Hotel', 'lodging-2.png');
INSERT INTO `tbl_kategori` VALUES (9, 'Villa', 'villa1.png');
INSERT INTO `tbl_kategori` VALUES (10, 'Kost', 'kost.png');

-- ----------------------------
-- Table structure for tbl_penginapan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penginapan`;
CREATE TABLE `tbl_penginapan`  (
  `id_penginapan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_penginapan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` int(11) NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telpon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `latitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(255) NULL DEFAULT NULL,
  `fasilitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar_penginapan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penginapan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_penginapan
-- ----------------------------
INSERT INTO `tbl_penginapan` VALUES (39, 'Hotel Syariah mandiri', 8, 'Jl. Agus Salim no.10', '082284848484', '-6.209209051779606', '106.83577794104008', 107, 'Wifi, AC, TV kabel, Telepon, Shower Panas & Dingin, Restoran', NULL, 'Power_Rangers_logo2_256x256.png');
INSERT INTO `tbl_penginapan` VALUES (40, 'Villa Bintang Kejora', 9, 'Jl. Imbon no 100', '082222222222', '-6.21138489013676', '106.8411852744141', 107, 'Wifi, Shower Panas & Dingin, Smooking Area, Restoran', NULL, 'Power_Rangers_v10_logo2.png');
INSERT INTO `tbl_penginapan` VALUES (41, 'asdasdasd', 10, 'Jl. Imbon', '082222222222', '-6.208953070205329', '106.83856743841557', 300000, 'Wifi, AC', 'oke oce', 'Power_Rangers_v3_logo2.png');

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `zoom` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES (1, 'Kota Jakarta', '-6.208953070205329', '106.83912533789066', 15);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Mardalius', 'admin', 'admin', '1');
INSERT INTO `tbl_user` VALUES (2, 'Lius', 'user', 'user', '2');

SET FOREIGN_KEY_CHECKS = 1;
