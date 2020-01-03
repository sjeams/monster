/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : monster

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-01-03 17:54:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for x2_admin_category
-- ----------------------------
DROP TABLE IF EXISTS `x2_admin_category`;
CREATE TABLE `x2_admin_category` (
  `authorityId` int(11) NOT NULL AUTO_INCREMENT,
  `authorityName` varchar(25) DEFAULT NULL COMMENT '标题名',
  `orderNumber` int(10) unsigned DEFAULT NULL COMMENT '排序',
  `menuUrl` varchar(255) DEFAULT NULL,
  `menuIcon` varchar(255) DEFAULT NULL COMMENT '图标',
  `createTime` varchar(255) DEFAULT NULL,
  `authority` varchar(255) DEFAULT NULL COMMENT '权限标识',
  `checked` varchar(255) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `isMenu` int(11) DEFAULT '0' COMMENT '0列表 1 内容',
  `parentId` int(11) DEFAULT NULL COMMENT 'pid副id',
  PRIMARY KEY (`authorityId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_category
-- ----------------------------
