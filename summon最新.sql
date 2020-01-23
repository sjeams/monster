/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-01-23 18:05:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for x2_admin_init
-- ----------------------------
DROP TABLE IF EXISTS `x2_admin_init`;
CREATE TABLE `x2_admin_init` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '1' COMMENT '副id',
  `name` varchar(25) DEFAULT NULL COMMENT '分类名称',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `remark` varchar(255) DEFAULT NULL COMMENT '图片',
  `url` varchar(255) DEFAULT '' COMMENT '接口/页面',
  `createTime` varchar(255) DEFAULT NULL,
  `update` varchar(255) NOT NULL DEFAULT ' <input type="button" value="编辑节点" onclick="onEditNode()"/>' COMMENT '修改',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台管理', '', '', '1579765110', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '生物系统', '测试s', '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', '', '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', '', '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '生物管理', '', '/admin/biology/index', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('6', '2', '', '菜单分类', '', '/admin/admin/admin-meanu', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('40', '0', 'app', 'APP管理', '', '', '1579765111', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('41', '0', 'user', '用户管理', '', '', '1579765111', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '菜单管理', '', '/layuimini/page/menu.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '系统设置', '', '/layuimini/page/setting.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '表格示例', '反倒是', '/layuimini/page/table.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('11', '2', '', '表单示例', null, '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('12', '11', 'cccc', '普通表单', 'aaa', '/layuimini/page/form.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('13', '11', '', '分步表单', 'c ccc', '/layuimini/page/form-step.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', '', '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', '', '/layuimini/page/login-1.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', null, '/layuimini/page/login-2.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', null, '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', '', '/layuimini/page/404.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', null, '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', null, '/layuimini/page/button.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', null, '/layuimini/page/layer.html\"', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', null, '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', null, '/layuimini/page/icon.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', null, '/layuimini/page/icon-picker.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', null, '/layuimini/page/color-select.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', null, '/layuimini/page/table-select.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', '', '/layuimini/page/upload.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', '', '/layuimini/page/editor.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', null, '', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', null, '/layuimini/page/button.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('31', '29', '', '按钮2', null, '/layuimini/page/button.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('32', '29', '', '按钮3', null, '/layuimini/page/button.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('33', '29', '', '表单4', null, '/layuimini/page/form.html', '1579765111', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('45', '0', 'order', '商城', '', '', '1579765111', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('43', '41', 'cc', 'cc', '', 'cc', '1579765111', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');

-- ----------------------------
-- Table structure for x2_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology`;
CREATE TABLE `x2_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '生物属性(神魔人鬼妖五行混沌) 0未知',
  `grade` tinyint(11) DEFAULT '1' COMMENT '等级',
  `photo` varchar(255) DEFAULT NULL COMMENT '生物头像',
  `image` varchar(255) DEFAULT NULL COMMENT '生物造型',
  `special` tinyint(11) DEFAULT '1' COMMENT '评分 (与属性有关*30.0的基础评分) 悟性 和基础属性',
  `skill` varchar(11) DEFAULT NULL COMMENT '技能编号',
  `maxNature` int(11) DEFAULT NULL COMMENT '最大属性',
  `genGu` int(11) DEFAULT NULL COMMENT '根骨',
  `wuXing` int(11) DEFAULT NULL COMMENT '悟性（成长）',
  `character` int(11) DEFAULT NULL COMMENT '性格',
  `birthday` datetime DEFAULT NULL,
  `descript` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('1', '盘古', '1', '1', '/file/image/sc.jpg', '/file/image/sc.jpg', '1', '1,2,3', '80', '80', '80', '1', '2020-01-15 00:00:00', null);

-- ----------------------------
-- Table structure for x2_biology_character
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_character`;
CREATE TABLE `x2_biology_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character` varchar(25) DEFAULT NULL COMMENT '性格',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_character
-- ----------------------------
INSERT INTO `x2_biology_character` VALUES ('1', '极端', '暴击+10%防御+10%');

-- ----------------------------
-- Table structure for x2_biology_godhood
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_godhood`;
CREATE TABLE `x2_biology_godhood` (
  `id` int(11) NOT NULL,
  `godName` varchar(25) DEFAULT NULL COMMENT '神格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_godhood
-- ----------------------------
INSERT INTO `x2_biology_godhood` VALUES ('1', '盘古');

-- ----------------------------
-- Table structure for x2_biology_skill
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_skill`;
CREATE TABLE `x2_biology_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wuxingid` int(11) DEFAULT '6' COMMENT '技能五行属性 （金木水火土）五行通用 123456',
  `name` varchar(255) DEFAULT NULL COMMENT '技能名称',
  `belong` int(11) DEFAULT NULL COMMENT '技能类型(主动，被击触发，攻击触发，初始化，附加效果）',
  `fiveElements` varchar(255) DEFAULT NULL COMMENT '属性   五行（金木水火土）',
  `keeptime` int(11) DEFAULT '0' COMMENT '持续时长1回合(0为单次触发)',
  `probability` int(255) DEFAULT '100' COMMENT '触发概率',
  `image` varchar(255) DEFAULT NULL COMMENT '图片',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_skill
-- ----------------------------
INSERT INTO `x2_biology_skill` VALUES ('1', '6', '闪避', '2', null, '0', '15', null, null);
INSERT INTO `x2_biology_skill` VALUES ('2', '6', '雷击', '1', null, '0', '100', null, '法伤160%');
INSERT INTO `x2_biology_skill` VALUES ('3', '6', '灵魂锁链', '2', null, '0', '30', null, '生命分摊');

-- ----------------------------
-- Table structure for x2_user_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology`;
CREATE TABLE `x2_user_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Biology` varchar(25) DEFAULT NULL COMMENT '生物属性(神魔人鬼妖五行混沌)',
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `photo` varchar(255) DEFAULT NULL COMMENT '头像编号',
  `image` varchar(255) DEFAULT NULL COMMENT '生物造型',
  `special` int(11) DEFAULT '0' COMMENT '是否异形 0不是1是',
  `skill` varchar(11) DEFAULT NULL COMMENT '技能编号',
  `fiveElements` varchar(25) DEFAULT NULL COMMENT '五行（金木水火土）技能编号',
  `reiki` int(11) DEFAULT NULL COMMENT '灵气',
  `power` int(11) DEFAULT NULL COMMENT '力量',
  `agile` int(11) DEFAULT NULL COMMENT '敏捷',
  `intelligence` int(11) DEFAULT NULL COMMENT '智力',
  `score` int(11) DEFAULT NULL COMMENT '评分',
  `grade` varchar(25) DEFAULT NULL COMMENT '评分等级',
  `Fate` varchar(25) DEFAULT NULL COMMENT '缘分(武器缘分)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology
-- ----------------------------
INSERT INTO `x2_user_biology` VALUES ('1', '魔', '盘古', null, null, '0', '1,2,3', '1', '80', '60', '36', '20', '176', 'S', null);

-- ----------------------------
-- Table structure for x2_user_biology_attribute
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology_attribute`;
CREATE TABLE `x2_user_biology_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shengMing` int(11) DEFAULT NULL COMMENT '生命',
  `moFa` int(11) DEFAULT NULL COMMENT '魔法',
  `gongJi` int(11) DEFAULT NULL COMMENT '攻击',
  `huJia` int(11) DEFAULT NULL COMMENT '护甲',
  `faGong` int(11) DEFAULT NULL COMMENT '法攻',
  `fakang` int(11) DEFAULT NULL COMMENT '法抗',
  `suDu` int(11) DEFAULT NULL COMMENT '速度',
  `chengZhang` int(11) DEFAULT NULL COMMENT '成长率',
  `baoJi` int(11) DEFAULT NULL,
  `wuXing` int(11) DEFAULT NULL COMMENT '悟性',
  `shuaXin` int(11) DEFAULT NULL COMMENT '刷新次数',
  `xunLian` int(11) DEFAULT NULL COMMENT '训练次数',
  `quanNeng` int(11) DEFAULT NULL COMMENT '潜能',
  `jinJie` int(255) DEFAULT NULL COMMENT '进阶',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for x2_user_biology_skill
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology_skill`;
CREATE TABLE `x2_user_biology_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attributeid` int(255) DEFAULT NULL COMMENT '生物id',
  `skillid` int(11) DEFAULT NULL COMMENT '技能id',
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology_skill
-- ----------------------------
INSERT INTO `x2_user_biology_skill` VALUES ('1', '1', '1', '1');
