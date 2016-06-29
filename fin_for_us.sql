/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : fin_for_us

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2016-06-29 09:45:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('a2', 'a2', 'a23', 'a2', 'a2', null, null, null);
INSERT INTO `admin_user` VALUES ('a3', 'a4', 'a4', 'a4', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a4', 'a4', 'a4', 'a5', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a5', 'a5', 'a5', 'a5', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a6a', 'a6', 'a6', 'a6', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a7', 'a7', 'a7', 'a7', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a8', 'a8', 'a8', 'a8', null, null, null, null);
INSERT INTO `admin_user` VALUES ('a9', 'a9', 'a9', 'a9', null, null, null, null);
INSERT INTO `admin_user` VALUES ('q1', 'q2', 'q1', 'q1', null, null, null, null);
INSERT INTO `admin_user` VALUES ('q2', 'q2', 'q2', 'q2', null, null, null, null);
INSERT INTO `admin_user` VALUES ('q3', 'q3', 'q3', 'q3', null, null, null, null);
INSERT INTO `admin_user` VALUES ('q5', 'q5', 'q5', 'q5', null, null, null, null);
INSERT INTO `admin_user` VALUES ('sereepap01', '12345', '123', '321', '123', null, null, null);
INSERT INTO `admin_user` VALUES ('sereepap02', '12345', '123321', '123321', '12321', null, null, null);
INSERT INTO `admin_user` VALUES ('sereepap2029', '12345', 'Atom', 'Atom', 'Atom', null, null, '1467113657');
INSERT INTO `admin_user` VALUES ('sereepap2029@gmail.c', 'Sereepap', 'Khamsee', '114499112', '1234', null, null, null);
INSERT INTO `admin_user` VALUES ('w1', 'w1', 'w1', 'w1', null, null, null, null);
INSERT INTO `admin_user` VALUES ('w2', 'w2', 'w2', 'w2', null, null, null, null);
INSERT INTO `admin_user` VALUES ('w3', 'w3', 'w3', 'w3', null, null, null, null);
INSERT INTO `admin_user` VALUES ('w4', 'w4', 'w4', 'w4', null, null, null, null);
INSERT INTO `admin_user` VALUES ('w7', 'w7', 'w7', 'w7', null, null, null, null);

-- ----------------------------
-- Table structure for `pro_user`
-- ----------------------------
DROP TABLE IF EXISTS `pro_user`;
CREATE TABLE `pro_user` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_count` bigint(11) NOT NULL DEFAULT '0',
  `solve_count` bigint(11) NOT NULL DEFAULT '0',
  `comment_count` bigint(11) NOT NULL DEFAULT '0',
  `like_count` bigint(11) NOT NULL DEFAULT '0',
  `validate_email_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validate_email` enum('n','y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `validate_user` enum('n','y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `level` bigint(11) DEFAULT NULL,
  `exp` bigint(11) DEFAULT NULL,
  `register_date` bigint(11) NOT NULL DEFAULT '0',
  `last_access` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pro_user
-- ----------------------------

-- ----------------------------
-- Table structure for `topic_room`
-- ----------------------------
DROP TABLE IF EXISTS `topic_room`;
CREATE TABLE `topic_room` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `room_description` text COLLATE utf8_unicode_ci,
  `post_count` bigint(11) DEFAULT NULL,
  `post_solve` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of topic_room
-- ----------------------------
INSERT INTO `topic_room` VALUES ('22202de8f7', 'Atom', 'Atom', null, null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_count` bigint(11) NOT NULL DEFAULT '0',
  `solve_count` bigint(11) NOT NULL DEFAULT '0',
  `comment_count` bigint(11) NOT NULL DEFAULT '0',
  `like_count` bigint(11) NOT NULL DEFAULT '0',
  `validate_email_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validate_email` enum('n','y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `validate_user` enum('n','y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `level` bigint(11) DEFAULT NULL,
  `exp` bigint(11) DEFAULT NULL,
  `register_date` bigint(11) NOT NULL DEFAULT '0',
  `last_access` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
