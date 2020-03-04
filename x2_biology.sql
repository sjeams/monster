/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-03-04 19:04:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for x2_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology`;
CREATE TABLE `x2_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '生物属性(人鬼妖神魔异) 0未知',
  `state` int(3) DEFAULT '1' COMMENT '生物境界',
  `grade` int(11) DEFAULT '1' COMMENT '等级',
  `shengMing` int(11) DEFAULT '1' COMMENT '生命',
  `moFa` int(11) DEFAULT '1' COMMENT '魔法',
  `gongJi` int(11) DEFAULT '1' COMMENT '攻击',
  `huJia` int(11) DEFAULT '1' COMMENT '护甲',
  `faGong` int(11) DEFAULT '1' COMMENT '特攻',
  `fakang` int(11) DEFAULT '1' COMMENT '法抗',
  `suDu` int(11) DEFAULT '1' COMMENT '速度',
  `shanbi` int(11) DEFAULT '0' COMMENT '闪避',
  `baoji` int(11) DEFAULT '0' COMMENT '暴击',
  `baojilv` int(11) DEFAULT '0' COMMENT '暴击率',
  `shuaXin` int(11) DEFAULT '1' COMMENT '刷新次数',
  `xunLian` int(11) DEFAULT '3' COMMENT '训练次数',
  `jinJie` int(11) DEFAULT '1' COMMENT '生物id',
  `biologyid` int(11) DEFAULT '0' COMMENT '生物id',
  `reiki` int(11) DEFAULT '1' COMMENT '灵气',
  `power` int(11) DEFAULT '1' COMMENT '力量',
  `agile` int(11) DEFAULT '1' COMMENT '敏捷',
  `intelligence` int(11) DEFAULT '1' COMMENT '智力',
  `special` int(11) DEFAULT '1' COMMENT '评分 战力 (与属性有关*30.0的基础评分) 悟性 和基础属性',
  `score` int(11) DEFAULT '1' COMMENT '评分',
  `wuXing` int(11) DEFAULT '3' COMMENT '悟性-成长率 1-10  自由属性 ',
  `skill` int(11) DEFAULT '1' COMMENT '技能编号',
  `yuanShen` int(11) DEFAULT '0' COMMENT '元神',
  `Fate` int(11) DEFAULT '1' COMMENT '缘分(武器缘分) 本命法宝（只有一个）武器库随机-命中注定',
  `type` int(3) DEFAULT '1' COMMENT '1普通 2商店 3NPC',
  `descript` int(255) DEFAULT NULL COMMENT '描述',
  `lucky` int(3) DEFAULT '1' COMMENT ' 幸运值-成长值-潜能-技能进阶-境界突破',
  `maxNature` int(11) DEFAULT '10' COMMENT '自由属性点',
  `qianNeng` int(3) DEFAULT '1' COMMENT '潜能--1-10次，战斗中有几率进化-增加1-10 悟性（越低级潜能越大）',
  `character` int(3) DEFAULT '1' COMMENT '性格',
  `headerPicture` varchar(255) DEFAULT NULL COMMENT '头像',
  `Picture` varchar(255) DEFAULT NULL COMMENT '生物图片',
  `yiXing` tinyint(1) DEFAULT '0' COMMENT '异性 0 否1是',
  `sex` int(255) DEFAULT '1' COMMENT '性别',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('1', '盘古c', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '2', '3', '1', '1', '1', '3', '1', '0', '1', '1', null, '1', '10', '1', '1', null, null, '0', '1');
INSERT INTO `x2_biology` VALUES ('2', '未知生物', '5', null, '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '3', '4', null, '1', '1', null, null, '0', '1', '3', null, '1', '10', '1', '1', null, null, '0', '2');
INSERT INTO `x2_biology` VALUES ('3', '女娲', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', null, '1', '10', '1', '1', null, null, '0', '3');
