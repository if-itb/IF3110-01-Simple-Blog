/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : tugasweb

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-10-14 09:19:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `post_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '', 'farizanramadhan@gmail.com', 'Komentar pertama', null, '2014-10-13 14:10:43', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('2', '', 'farizanramadhan@gmail.com', 'Komentar pertama', null, '2014-10-13 14:11:45', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('3', 'Aris', 'farizanramadhan@gmail.com', 'komentar kedua', null, '2014-10-13 14:12:37', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('4', 'Farizan ', 'farizanramadhan@gmail.com', 'hahahaha', null, '2014-10-13 14:14:23', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('5', 'hahaha', 'kemana@kesini.dong', 'adsfankf', '0', '2014-10-13 14:16:49', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('6', 'siapa', 'siapa@dimana.dis', 'tst lagi dong', '0', '2014-10-13 14:17:44', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('7', 'Farizan', 'farizanramadhan@gmail.com', 'komentar baru nih..', '12', '2014-10-14 08:08:11', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('8', 'Aris lagi', 'farizanramadhan@live.com', 'komentar test untuk ajax', '5', '2014-10-14 08:32:23', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('9', 'ARIS ajax', 'aris@ajax.com', 'pakai ajax?', '5', '2014-10-14 08:34:16', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('10', 'test lagi', 'test@lagi.lal', 'LOOL', '5', '2014-10-14 08:41:15', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('5', 'Test Post #9', 'Hari ini adalah hari kamis, post ini pendek dimaksudkan untuk melihat layout yang tergambar.', '2014-10-09 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `post` VALUES ('7', 'Test Post #11', 'Test post ke 10, semoga layout tetap rapi', '2014-10-06 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `post` VALUES ('12', 'Halo hari kamis', 'Hari kamis mengerjakan tugas wbd sebisa mungkin harus selesai lebih dari 75%', '2014-10-09 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `post` VALUES ('13', 'WBD hari senin', 'diupdate dari halaman edit', '2014-10-13 00:00:00', '0000-00-00 00:00:00');
