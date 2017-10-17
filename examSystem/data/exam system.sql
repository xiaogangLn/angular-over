/*
Navicat MySQL Data Transfer

Source Server         : link
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : exam system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-11 17:57:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `menu` varchar(15) NOT NULL,
  `url` varchar(20) NOT NULL,
  `identity` int(1) NOT NULL,
  `withId` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Html5 & CSS3', '', '1', '0');
INSERT INTO `menu` VALUES ('2', 'JavaScript', '', '1', '0');
INSERT INTO `menu` VALUES ('3', 'PHP & SQL', '', '1', '0');
INSERT INTO `menu` VALUES ('4', 'Html5', '#/insert', '0', '1');
INSERT INTO `menu` VALUES ('5', 'CSS3', '#/insert', '0', '1');
INSERT INTO `menu` VALUES ('6', 'Bootstrp', '#/insert', '0', '1');
INSERT INTO `menu` VALUES ('7', 'JavaScript', '#/insert', '0', '2');
INSERT INTO `menu` VALUES ('8', 'jQuery', '#/insert', '0', '2');
INSERT INTO `menu` VALUES ('9', 'Angularjs', '#/insert', '0', '2');
INSERT INTO `menu` VALUES ('10', 'React', '#/insert', '0', '2');
INSERT INTO `menu` VALUES ('11', 'PHP', '#/insert', '0', '3');
INSERT INTO `menu` VALUES ('12', 'SQL', '#/insert', '0', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `psw` varchar(32) NOT NULL,
  `class` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `identity` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123123', '321321', '前端8', '吴若愚', '1');
INSERT INTO `user` VALUES ('2', '456456', '654654', '前端8', '杨昌兴', '1');
