/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : wph_ipksulsel

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 15/01/2020 14:49:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (3, 'kopi hitam ipk', 8000);
INSERT INTO `menu` VALUES (4, 'kopi susu ipk', 10000);
INSERT INTO `menu` VALUES (5, 'espresso', 7000);
INSERT INTO `menu` VALUES (6, 'cokelat caramel', 7000);
INSERT INTO `menu` VALUES (7, 'cokelat drink', 7000);
INSERT INTO `menu` VALUES (8, 'cokelat', 7000);
INSERT INTO `menu` VALUES (9, 'taro', 7000);
INSERT INTO `menu` VALUES (10, 'red velvet', 7000);
INSERT INTO `menu` VALUES (11, 'vanilla', 7000);
INSERT INTO `menu` VALUES (12, 'oreo', 7000);
INSERT INTO `menu` VALUES (13, 'tiramissu coffe', 7000);
INSERT INTO `menu` VALUES (14, 'vanilla latte', 7000);
INSERT INTO `menu` VALUES (15, 'green tea', 5000);
INSERT INTO `menu` VALUES (16, 'thai tea', 5000);
INSERT INTO `menu` VALUES (21, 'extrajoss', 5000);
INSERT INTO `menu` VALUES (22, 'extrajoss susu', 6000);
INSERT INTO `menu` VALUES (23, 'milo', 5000);
INSERT INTO `menu` VALUES (24, 'pop ice taro', 5000);
INSERT INTO `menu` VALUES (25, 'pop ice cokelat', 5000);
INSERT INTO `menu` VALUES (26, 'pop ice vanilla', 5000);
INSERT INTO `menu` VALUES (27, 'pop ice alvocado', 5000);
INSERT INTO `menu` VALUES (28, 'pop ice strawberry', 5000);
INSERT INTO `menu` VALUES (29, 'pop ice mangga', 5000);
INSERT INTO `menu` VALUES (30, 'pop ice blueberry', 5000);
INSERT INTO `menu` VALUES (31, '1 mie', 3000);
INSERT INTO `menu` VALUES (32, '1 mie + Masak', 5000);
INSERT INTO `menu` VALUES (33, '2 mie + dimasak', 8000);
INSERT INTO `menu` VALUES (34, '1 mie + 1 telur + dimasak', 8000);
INSERT INTO `menu` VALUES (35, '2 mie + 1 telur + dimasak', 10000);

-- ----------------------------
-- Table structure for pemasukan_
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_`;
CREATE TABLE `pemasukan_`  (
  `id` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_admin` int(5) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemasukan_
-- ----------------------------
INSERT INTO `pemasukan_` VALUES ('KAS00000003', 76000, '01/11/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000004', 68000, '02/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000005', 0, '01/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000006', 7000, '01/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000007', 33666, '01/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000008', 33666, '01/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000009', 76000, '01/12/20', 12);
INSERT INTO `pemasukan_` VALUES ('KAS00000010', 67780, '01/14/20', 1);
INSERT INTO `pemasukan_` VALUES ('KAS00000011', 44000, '01/14/20', 1);
INSERT INTO `pemasukan_` VALUES ('KAS00000012', 41000, '01/14/20', 1);
INSERT INTO `pemasukan_` VALUES ('KAS00000013', 144860, '01/14/20', 1);
INSERT INTO `pemasukan_` VALUES ('KAS00000014', 62000, '01/14/20', 1);

-- ----------------------------
-- Table structure for pemasukan_cart
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_cart`;
CREATE TABLE `pemasukan_cart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasukan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pemasukan_detail
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_detail`;
CREATE TABLE `pemasukan_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasukan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemasukan_detail
-- ----------------------------
INSERT INTO `pemasukan_detail` VALUES (9, 'KAS00000003', 7000, 3, 6, '3s', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (10, 'KAS00000003', 10000, 2, 4, 'reas', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (11, 'KAS00000003', 7000, 5, 8, 'fafa', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (12, 'KAS00000003', 7000, 3, 6, '3s', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (13, 'KAS00000003', 10000, 2, 4, 'reas', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (14, 'KAS00000003', 7000, 5, 8, 'fafa', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (15, 'KAS00000004', 7000, 3, 5, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (16, 'KAS00000005', 7000, 4, 13, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (17, 'KAS00000004', 7000, 2, 13, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (18, 'KAS00000004', 5000, 1, 16, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (19, 'KAS00000006', 7000, 1, 6, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (20, 'KAS00000007', 7000, 5, 5, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (21, 'KAS00000009', 7000, 3, 9, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (22, 'KAS00000009', 10000, 2, 35, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (23, 'KAS00000011', 10000, 2, 4, 'lunas', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (24, 'KAS00000011', 8000, 3, 3, 'ffffff', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (25, 'KAS00000012', 10000, 2, 4, '', 'KAS');
INSERT INTO `pemasukan_detail` VALUES (26, 'KAS00000012', 7000, 3, 13, '', 'KAS');

-- ----------------------------
-- Table structure for pemasukan_ekscart
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_ekscart`;
CREATE TABLE `pemasukan_ekscart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasukan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(22) NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pemasukan_eksdetail
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_eksdetail`;
CREATE TABLE `pemasukan_eksdetail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasukan` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(22) NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemasukan_eksdetail
-- ----------------------------
INSERT INTO `pemasukan_eksdetail` VALUES (5, 'KAS00000008', 1, 333, 'we', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (6, 'KAS00000008', 1, 33333, 'rr', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (7, 'KAS00000010', 1, 3, '5655', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (8, 'KAS00000010', 1, 67777, 'modal usaha', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (9, 'KAS00000013', 0, 22430, 'saldo', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (10, 'KAS00000013', 0, 100000, 'modal', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (11, 'KAS00000014', 1, 11000, 'mk', 'KASEKS');
INSERT INTO `pemasukan_eksdetail` VALUES (12, 'KAS00000014', 1, 40000, 'ok', 'KASEKS');

-- ----------------------------
-- Table structure for pengeluaran_
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_`;
CREATE TABLE `pengeluaran_`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `tanggal` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengeluaran_
-- ----------------------------
INSERT INTO `pengeluaran_` VALUES (2, 12, '01/13/20', 'bayar listrik', 2, 34000);
INSERT INTO `pengeluaran_` VALUES (4, 1, '01/13/20', 'rr', 1, 3250);
INSERT INTO `pengeluaran_` VALUES (5, 1, '01/13/20', 'uu', 9, 2000);
INSERT INTO `pengeluaran_` VALUES (6, 1, '01/13/20', '', 3, 3500);
INSERT INTO `pengeluaran_` VALUES (7, 1, '01/14/20', 'dompet', 2, 35000);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Muhammad hamdan MS', 'hamdanjhee21@gmail.com', 'default.jpg', '$2y$10$Tq7xbBEp11tO59WOy4xdY..FNrY1gxGf6wRLFgD/Y9zOMH6J8jhd6', 1, 1, 1578889964);
INSERT INTO `user` VALUES (13, 'admin', 'admin@ipksulsel.com', 'default.jpg', '$2y$10$zMqnlWzSKyeYsLTwLSxDGeWpK2yn.tjOzRoNH40hADRJdHdnWV58W', 2, 1, 1578885255);
INSERT INTO `user` VALUES (15, 'Pegawai', 'pegawai@gmail.com', 'default.jpg', '$2y$10$gw1rkQ7KOMzkbNweDMBP3.IJ/AA0FBVroH5lKbVU5I/gQvYPRKoB.', 3, 1, 1578890898);

-- ----------------------------
-- Table structure for user_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE `user_access_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_access_menu
-- ----------------------------
INSERT INTO `user_access_menu` VALUES (1, 1, 1);
INSERT INTO `user_access_menu` VALUES (3, 2, 2);
INSERT INTO `user_access_menu` VALUES (7, 1, 3);
INSERT INTO `user_access_menu` VALUES (10, 1, 5);
INSERT INTO `user_access_menu` VALUES (11, 2, 5);
INSERT INTO `user_access_menu` VALUES (14, 1, 6);
INSERT INTO `user_access_menu` VALUES (15, 1, 2);
INSERT INTO `user_access_menu` VALUES (16, 3, 2);
INSERT INTO `user_access_menu` VALUES (17, 3, 5);
INSERT INTO `user_access_menu` VALUES (18, 2, 6);
INSERT INTO `user_access_menu` VALUES (19, 1, 8);
INSERT INTO `user_access_menu` VALUES (20, 2, 8);
INSERT INTO `user_access_menu` VALUES (21, 3, 8);

-- ----------------------------
-- Table structure for user_log
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `time` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_log
-- ----------------------------
INSERT INTO `user_log` VALUES (3, '12', 'Sunday, 12 Jan 2020 12:49:42 Europe/Berlin');
INSERT INTO `user_log` VALUES (4, '12', 'selasa, 12 Jan 2020 14:24:13 Europe/Berlin');
INSERT INTO `user_log` VALUES (5, '12', 'Monday, 13 Jan 2020 02:05:33 Europe/Berlin');
INSERT INTO `user_log` VALUES (6, '12', 'Monday, 13 Jan 2020 04:15:41 Europe/Berlin');
INSERT INTO `user_log` VALUES (7, '12', 'Monday, 13 Jan 2020 04:22:32 Europe/Berlin');
INSERT INTO `user_log` VALUES (8, '13', 'Monday, 13 Jan 2020 05:32:08 Europe/Berlin');
INSERT INTO `user_log` VALUES (9, '13', 'Monday, 13 Jan 2020 05:32:51 Europe/Berlin');
INSERT INTO `user_log` VALUES (10, '1', 'Monday, 13 Jan 2020 05:38:16 Europe/Berlin');
INSERT INTO `user_log` VALUES (11, '1', 'Monday, 13 Jan 2020 05:48:20 Europe/Berlin');
INSERT INTO `user_log` VALUES (12, '15', 'Monday, 13 Jan 2020 05:48:51 Europe/Berlin');
INSERT INTO `user_log` VALUES (13, '15', 'Monday, 13 Jan 2020 05:49:54 Europe/Berlin');
INSERT INTO `user_log` VALUES (14, '1', 'Monday, 13 Jan 2020 05:50:23 Europe/Berlin');
INSERT INTO `user_log` VALUES (15, '1', 'Monday, 13 Jan 2020 12:42:38 Europe/Berlin');
INSERT INTO `user_log` VALUES (16, '1', 'Tuesday, 14 Jan 2020 05:18:13 Europe/Berlin');
INSERT INTO `user_log` VALUES (17, '13', 'Tuesday, 14 Jan 2020 05:23:58 Europe/Berlin');
INSERT INTO `user_log` VALUES (18, '1', 'Tuesday, 14 Jan 2020 05:25:06 Europe/Berlin');
INSERT INTO `user_log` VALUES (19, '1', 'Tuesday, 14 Jan 2020 13:01:20 Europe/Berlin');
INSERT INTO `user_log` VALUES (20, '1', 'Tuesday, 14 Jan 2020 14:00:54 Europe/Berlin');
INSERT INTO `user_log` VALUES (21, '13', 'Tuesday, 14 Jan 2020 14:01:36 Europe/Berlin');
INSERT INTO `user_log` VALUES (22, '1', 'Tuesday, 14 Jan 2020 14:02:03 Europe/Berlin');
INSERT INTO `user_log` VALUES (23, '13', 'Tuesday, 14 Jan 2020 14:03:18 Europe/Berlin');
INSERT INTO `user_log` VALUES (24, '1', 'Tuesday, 14 Jan 2020 14:07:26 Europe/Berlin');
INSERT INTO `user_log` VALUES (25, '1', 'Wednesday, 15 Jan 2020 06:12:59 Europe/Berlin');

-- ----------------------------
-- Table structure for user_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_menu
-- ----------------------------
INSERT INTO `user_menu` VALUES (1, 'Admin');
INSERT INTO `user_menu` VALUES (2, 'User');
INSERT INTO `user_menu` VALUES (3, 'Menu');
INSERT INTO `user_menu` VALUES (6, 'Daftar Menu');
INSERT INTO `user_menu` VALUES (8, 'Keuangan');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Administrator');
INSERT INTO `user_role` VALUES (2, 'Admin');
INSERT INTO `user_role` VALUES (3, 'Pegawai');

-- ----------------------------
-- Table structure for user_sub_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_sub_menu
-- ----------------------------
INSERT INTO `user_sub_menu` VALUES (1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1);
INSERT INTO `user_sub_menu` VALUES (2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1);
INSERT INTO `user_sub_menu` VALUES (3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1);
INSERT INTO `user_sub_menu` VALUES (4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1);
INSERT INTO `user_sub_menu` VALUES (5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1);
INSERT INTO `user_sub_menu` VALUES (7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1);
INSERT INTO `user_sub_menu` VALUES (8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1);
INSERT INTO `user_sub_menu` VALUES (9, 8, 'Penjualan', 'keuangan', 'fas fa-fw fa-cart-plus', 1);
INSERT INTO `user_sub_menu` VALUES (10, 8, 'Pengeluaran', 'keuangan/pengeluaran', 'fas fa-fw fa-minus', 1);
INSERT INTO `user_sub_menu` VALUES (11, 6, 'Makanan/Minuman', 'menus', 'fas fa-fw fa-cookie-bite', 1);
INSERT INTO `user_sub_menu` VALUES (12, 8, 'Pemasukan Luar Usaha', 'keuangan/pemasukanluarusaha', 'fas fa-fw fa-plus', 1);
INSERT INTO `user_sub_menu` VALUES (13, 1, 'User Management', 'admin/usermanagement', 'fas fa-fw fa-user', 1);
INSERT INTO `user_sub_menu` VALUES (16, 8, 'Kas', 'keuangan/kas', 'fas fa-money-bill-alt', 1);

-- ----------------------------
-- Table structure for user_token
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
