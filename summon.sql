/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-03-20 18:33:53
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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台管理', '', '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '生物系统', '测试s', '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', '', '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', '', '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '生物模板', '', '/admin/biology/index', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('6', '2', '', '生物创造', '', '/admin/biology-create/index', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('40', '0', 'app', 'APP管理', '', '', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('41', '0', 'user', '用户管理', '', '', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '世界管理', '', '/layuimini/page/menu.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '技能管理', '', '/layuimini/page/setting.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '性格管理', '反倒是', '/layuimini/page/table.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('48', '1', '', '物品管理', '', '', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('49', '48', '', '武器管理', '', '', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', '', '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', '', '/layuimini/page/login-1.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', null, '/layuimini/page/login-2.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', null, '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', '', '/layuimini/page/404.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', null, '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', null, '/layuimini/page/button.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', null, '/layuimini/page/layer.html\"', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', null, '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', null, '/layuimini/page/icon.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', null, '/layuimini/page/icon-picker.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', null, '/layuimini/page/color-select.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', null, '/layuimini/page/table-select.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', '', '/layuimini/page/upload.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', '', '/layuimini/page/editor.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', null, '', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', null, '/layuimini/page/button.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('31', '29', '', '按钮2', null, '/layuimini/page/button.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('32', '29', '', '按钮3', null, '/layuimini/page/button.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('33', '29', '', '表单4', null, '/layuimini/page/form.html', '1584329715', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('45', '0', 'order', '商城', '', '', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('43', '41', 'cc', 'cc', '', 'cc', '1584329715', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');

-- ----------------------------
-- Table structure for x2_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology`;
CREATE TABLE `x2_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '种族(人鬼妖神魔异) 0未知',
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
  `jinJie` int(11) DEFAULT '1' COMMENT '进阶',
  `biologyid` int(11) DEFAULT '0' COMMENT '生物id',
  `reiki` int(11) DEFAULT '1' COMMENT '灵气',
  `power` int(11) DEFAULT '1' COMMENT '力量',
  `agile` int(11) DEFAULT '1' COMMENT '敏捷',
  `intelligence` int(11) DEFAULT '1' COMMENT '智力',
  `special` int(11) DEFAULT '1' COMMENT '评分 战力 (与属性有关*30.0的基础评分) 悟性 和基础属性',
  `score` int(11) DEFAULT '1' COMMENT '评分',
  `wuXing` int(11) DEFAULT '3' COMMENT '悟性-成长率 1-10  自由属性 ',
  `skill` varchar(255) DEFAULT '1' COMMENT '技能编号',
  `yuanShen` int(11) DEFAULT '0' COMMENT '元神',
  `fate` int(11) DEFAULT '0' COMMENT '缘分(武器缘分) 本命法宝（只有一个）武器库随机-命中注定',
  `type` int(3) NOT NULL DEFAULT '4' COMMENT '1普通 2特殊 3NPC 4不可用',
  `descript` varchar(255) DEFAULT NULL COMMENT '描述',
  `lucky` int(3) DEFAULT '1' COMMENT ' 幸运值-成长值-潜能-技能进阶-境界突破',
  `maxNature` int(11) DEFAULT '10' COMMENT '自由属性点',
  `qianNeng` int(3) DEFAULT '1' COMMENT '潜能--1-10次，战斗中有几率进化-增加1-10 悟性（越低级潜能越大）',
  `character` int(3) DEFAULT '1' COMMENT '性格',
  `picture` varchar(255) DEFAULT NULL COMMENT '生物图片 形象',
  `yiXing` tinyint(1) DEFAULT '0' COMMENT '异性 0 否1是',
  `sex` int(255) DEFAULT '1' COMMENT '性别',
  `jingBi` int(11) DEFAULT '1' COMMENT '金币',
  `jingYan` int(11) DEFAULT '1' COMMENT '经验',
  `jianShang` int(255) DEFAULT '0' COMMENT '减伤',
  `zhenShang` int(255) DEFAULT '0' COMMENT '增伤（真实伤害）',
  `color` varchar(25) DEFAULT '#fff' COMMENT '颜色（普通默认为白色）',
  `danDu` int(11) DEFAULT '0' COMMENT '丹毒100  大30每回合对自身造成生命值%的伤害',
  `scoreGrade` varchar(11) DEFAULT 'D' COMMENT '评分等级 D C A B S SS SSS 传说',
  `chuFa` int(3) DEFAULT '0' COMMENT '触发--最多叠加到100',
  `wordId` int(11) DEFAULT NULL COMMENT '世界编号',
  `jiBan` int(3) NOT NULL DEFAULT '1' COMMENT '羁绊',
  `experience` int(11) DEFAULT '0' COMMENT '升级经验 每级 等级*500的经验',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('2', '吕布', '1', '2', '1', '6880', '84', '206', '172', '190', '158', '207', '1', '0', '0', '1', '3', '1', '0', '100', '78', '42', '16', '8019', '228', '16', '10,9', '0', '1', '1', '', '1', '6', '1', '1', '', '0', '1', '461', '235', '56', '65', '#00f', '0', 'SSS', '0', '7', '1', '0');
INSERT INTO `x2_biology` VALUES ('3', '貂蝉', '1', '2', '1', '5944', '111', '196', '163', '220', '183', '199', '2', '0', '0', '1', '3', '1', '0', '100', '30', '30', '68', '7303', '210', '16', '1,2,3,4,5', '0', '1', '1', '', '5', '10', '1', '1', '', '0', '3', '427', '221', '160', '125', '#dd1d13', '0', 'SS', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('1', '马元义', '1', '1', '1', '228', '21', '2', '0', '2', '0', '100', '0', '0', '0', '1', '3', '1', '0', '1', '36', '20', '56', '353', '17', '6', '1', '0', '1', '1', '东汉末年，天下大乱，黄巾起义。天公张角的首徒马元义攻入广宗城，卢值、刘关张等人前支增援。 张角将死，元义及墨家钜子心赶到，心告诉角天数已尽，并要抢走《太平要术》，角虽战退心却也知大限已到。是夜，角吹奏悲曲，少年吕布寻埙声而至。角告知布貂蝉是他的宿命所在，并将埙赠与布。次日，广宗失陷，张角归天，元义得到藏有《太平要术》秘密的天公布袍。心知道元义即将出生的女儿是角是转世传人，跟着布找到难产而死的马夫人，布接生下貂蝉。', '1', '10', '1', '1', '', '0', '1', '38', '23', '0', '0', '#fff', '0', '', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('4', '墨家巨子·心', '1', '1', '1', '225', '21', '2', '0', '2', '0', '100', '0', '0', '0', '1', '3', '1', '0', '1', '40', '20', '60', '350', '11', '12', '1', '0', '1', '1', '', '1', '10', '1', '1', '', '0', '3', '26', '17', '0', '0', '#fff', '0', '', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('5', '张宝', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '26', '66', '10', '1', '1', '8', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('6', '张角', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '30', '51', '66', '1', '1', '10', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('7', '张梁', '1', '1', '1', '3150', '84', '403', '105', '403', '105', '152', '3', '0', '0', '1', '3', '1', '0', '1', '56', '32', '27', '4410', '330', '12', '1,2,3,4,5,6,7,8', '0', '1', '1', '', '12', '10', '1', '1', '', '0', '3', '664', '336', '3', '2', '#fff', '0', '神话', '0', '5', '1', '0');
INSERT INTO `x2_biology` VALUES ('8', '树妖', '2', '1', '1', '951', '34', '28', '23', '33', '28', '111', '0', '0', '0', '1', '3', '1', '0', '1', '38', '39', '59', '1208', '148', '1', '', '0', '1', '1', '', '1', '10', '1', '1', '/files/attach/images/20200311/1583918704313142.png', '0', '3', '299', '152', '0', '0', '#fff', '0', 'B', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('10', '水电费', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '63', '64', '68', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '4', '1', '0');
INSERT INTO `x2_biology` VALUES ('11', '啊', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '23', '35', '7', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('12', '擦', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '21', '41', '47', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('13', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '45', '22', '21', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '3', '1', '0');
INSERT INTO `x2_biology` VALUES ('14', '发', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '6', '53', '64', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('15', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '6', '38', '11', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('16', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '25', '4', '15', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '4', '1', '0');
INSERT INTO `x2_biology` VALUES ('17', '周星星', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '12', '23', '55', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0');
INSERT INTO `x2_biology` VALUES ('18', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '7', '42', '40', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '2', '1', '0');
INSERT INTO `x2_biology` VALUES ('19', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '52', '45', '10', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '3', '1', '0');
INSERT INTO `x2_biology` VALUES ('20', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '57', '41', '21', '1', '1', '1', '', '0', '1', '1', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', '6', '1', '0');
INSERT INTO `x2_biology` VALUES ('21', 'vv', '1', '1', '1', '1281', '36', '30', '25', '40', '33', '108', '0', '0', '0', '1', '3', '1', '0', '1', '68', '30', '68', '1553', '178', '1', '', '0', '1', '4', '', '1', '10', '2', '1', '', '0', '3', '359', '182', '0', '0', '#fff', '0', 'S', '0', '7', '1', '0');
INSERT INTO `x2_biology` VALUES ('32', 'vvv', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '47', '55', '52', '1', '1', '1', '', '0', '0', '4', '', '1', '10', '1', '1', null, '0', '3', '1', '1', '0', '0', '#fff', '0', 'D', '0', null, '1', '0');

-- ----------------------------
-- Table structure for x2_biology_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_biology`;
CREATE TABLE `x2_biology_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_biology
-- ----------------------------
INSERT INTO `x2_biology_biology` VALUES ('1', '人', null, null);
INSERT INTO `x2_biology_biology` VALUES ('2', '妖', null, null);
INSERT INTO `x2_biology_biology` VALUES ('3', '鬼', null, null);
INSERT INTO `x2_biology_biology` VALUES ('4', '神', null, null);
INSERT INTO `x2_biology_biology` VALUES ('5', '魔', null, null);
INSERT INTO `x2_biology_biology` VALUES ('6', '兽', null, null);
INSERT INTO `x2_biology_biology` VALUES ('7', '灵', null, null);
INSERT INTO `x2_biology_biology` VALUES ('8', '异', null, null);

-- ----------------------------
-- Table structure for x2_biology_character
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_character`;
CREATE TABLE `x2_biology_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '性格',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_character
-- ----------------------------
INSERT INTO `x2_biology_character` VALUES ('1', '极端', '暴击+10%防御+10%');
INSERT INTO `x2_biology_character` VALUES ('2', '稳重', '生命+10%');

-- ----------------------------
-- Table structure for x2_biology_create
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_create`;
CREATE TABLE `x2_biology_create` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '种族(人鬼妖神魔异) 0未知',
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
  `jinJie` int(11) DEFAULT '1' COMMENT '进阶',
  `biologyid` int(11) DEFAULT '0' COMMENT '生物模板id（生物属性刷新上限）',
  `reiki` int(11) DEFAULT '1' COMMENT '灵气',
  `power` int(11) DEFAULT '1' COMMENT '力量',
  `agile` int(11) DEFAULT '1' COMMENT '敏捷',
  `intelligence` int(11) DEFAULT '1' COMMENT '智力',
  `special` int(11) DEFAULT '1' COMMENT '评分 战力 (与属性有关*30.0的基础评分) 悟性 和基础属性',
  `score` int(11) DEFAULT '1' COMMENT '评分',
  `wuXing` int(11) DEFAULT '3' COMMENT '悟性-成长率 1-10  自由属性 ',
  `skill` varchar(255) DEFAULT '1' COMMENT '技能编号',
  `yuanShen` int(11) DEFAULT '0' COMMENT '元神',
  `fate` int(11) DEFAULT '0' COMMENT '缘分(武器缘分) 本命法宝（只有一个）武器库随机-命中注定',
  `type` int(3) NOT NULL DEFAULT '4' COMMENT '1普通 2特殊 3NPC 4不可用',
  `descript` varchar(255) DEFAULT NULL COMMENT '描述',
  `lucky` int(3) DEFAULT '1' COMMENT ' 幸运值-成长值-潜能-技能进阶-境界突破',
  `maxNature` int(11) DEFAULT '10' COMMENT '自由属性点',
  `qianNeng` int(3) DEFAULT '1' COMMENT '潜能--1-10次，战斗中有几率进化-增加1-10 悟性（越低级潜能越大）',
  `character` int(3) DEFAULT '1' COMMENT '性格',
  `picture` varchar(255) DEFAULT NULL COMMENT '生物图片 形象',
  `yiXing` tinyint(1) DEFAULT '0' COMMENT '异性 0 否1是',
  `sex` int(255) DEFAULT '1' COMMENT '性别',
  `jingBi` int(11) DEFAULT '1' COMMENT '金币',
  `jingYan` int(11) DEFAULT '1' COMMENT '经验',
  `jianShang` int(255) DEFAULT '0' COMMENT '减伤',
  `zhenShang` int(255) DEFAULT '0' COMMENT '增伤（真实伤害）',
  `color` varchar(25) DEFAULT '#fff' COMMENT '颜色（普通默认为白色）',
  `danDu` int(11) DEFAULT '0' COMMENT '丹毒100  大30每回合对自身造成生命值%的伤害',
  `scoreGrade` varchar(11) DEFAULT 'D' COMMENT '评分等级 D C A B S SS SSS 传说',
  `chuFa` int(3) DEFAULT '0' COMMENT '触发--最多叠加到100',
  `wordId` int(11) DEFAULT NULL COMMENT '世界编号',
  `jiBan` int(3) NOT NULL DEFAULT '1' COMMENT '羁绊',
  `experience` int(11) DEFAULT '0' COMMENT '升级经验 每级 等级*500的经验',
  `userid` int(11) DEFAULT '0' COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_create
-- ----------------------------
INSERT INTO `x2_biology_create` VALUES ('1', '林冲', '1', '1', '1', '768', '21', '8', '7', '7', '6', '101', '0', '0', '0', '1', '3', '1', '0', '1', '49', '4', '2', '918', '77', '1', '4,5', '0', '0', '4', '', '1', '10', '1', '1', '', '0', '3', '157', '81', '0', '0', '#fff', '0', 'D', '0', '4', '1', '0', '0');
INSERT INTO `x2_biology_create` VALUES ('2', '鲁智深', '1', '1', '1', '708', '26', '25', '21', '18', '15', '113', '0', '0', '0', '1', '3', '1', '0', '1', '24', '48', '23', '926', '107', '1', '', '0', '0', '4', '', '1', '10', '1', '1', '', '0', '3', '217', '111', '0', '0', '#fff', '0', 'C', '0', '4', '1', '0', '0');

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
-- Table structure for x2_biology_jiban
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_jiban`;
CREATE TABLE `x2_biology_jiban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL COMMENT '羁绊值',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `biologyid` varchar(255) DEFAULT NULL COMMENT '生物id',
  `jiBan` varchar(255) DEFAULT NULL COMMENT '羁绊id',
  `num` int(11) DEFAULT NULL COMMENT '组合人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_jiban
-- ----------------------------
INSERT INTO `x2_biology_jiban` VALUES ('1', '无', null, '2', '特殊召唤召唤2个《西游记》中的七大圣，牛魔王、蛟魔王、鹏魔王、狮驼王、猕猴王、禺狨王、美猴王。', null, '1', '5');
INSERT INTO `x2_biology_jiban` VALUES ('2', '虾兵蟹将', '', '2', '', '', '25', '5');
INSERT INTO `x2_biology_jiban` VALUES ('3', '七大圣', '', '2', '特殊召唤召唤2个《西游记》中的七大圣，牛魔王、蛟魔王、鹏魔王、狮驼王、猕猴王、禺狨王、美猴王。', '', '25', '5');
INSERT INTO `x2_biology_jiban` VALUES ('4', '桃源结义', '', '10', '刘关张三人,每回合开始治疗全体单位10%的生命值', '', '26', '3');
INSERT INTO `x2_biology_jiban` VALUES ('5', '星宿', '', null, '二十八星宿', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('6', '三清', '', null, '', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('7', '巫妖之祸', '', null, '', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('8', '三皇五帝', '', null, '', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('9', '四御五老', '', null, '', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('10', '四大天王', '', null, '', '', '', null);
INSERT INTO `x2_biology_jiban` VALUES ('11', '', null, null, null, null, null, null);
INSERT INTO `x2_biology_jiban` VALUES ('12', '', null, null, null, null, null, null);
INSERT INTO `x2_biology_jiban` VALUES ('13', '', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for x2_biology_nature
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_nature`;
CREATE TABLE `x2_biology_nature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_nature
-- ----------------------------
INSERT INTO `x2_biology_nature` VALUES ('1', '幸运', null, 'lucky', '');
INSERT INTO `x2_biology_nature` VALUES ('2', '境界', null, 'state', '');
INSERT INTO `x2_biology_nature` VALUES ('3', '力量', null, 'power', '');
INSERT INTO `x2_biology_nature` VALUES ('4', '敏捷', null, 'agile', '');
INSERT INTO `x2_biology_nature` VALUES ('5', '智力', null, 'intelligence', '');
INSERT INTO `x2_biology_nature` VALUES ('6', '等级', null, 'grade', '');
INSERT INTO `x2_biology_nature` VALUES ('7', '灵气', null, 'reiki', null);
INSERT INTO `x2_biology_nature` VALUES ('8', '悟性', null, 'wuXing', null);
INSERT INTO `x2_biology_nature` VALUES ('9', '技能', null, 'skill', null);
INSERT INTO `x2_biology_nature` VALUES ('10', '触发', null, 'chuFa', null);
INSERT INTO `x2_biology_nature` VALUES ('11', '生命', null, 'shengMing', null);
INSERT INTO `x2_biology_nature` VALUES ('12', '魔法', null, 'moFa', null);
INSERT INTO `x2_biology_nature` VALUES ('13', '攻击', null, 'gongJi', null);
INSERT INTO `x2_biology_nature` VALUES ('14', '护甲', null, 'huJia', null);
INSERT INTO `x2_biology_nature` VALUES ('15', '特攻', null, 'faGong', null);
INSERT INTO `x2_biology_nature` VALUES ('16', '法抗', null, 'fakang', null);
INSERT INTO `x2_biology_nature` VALUES ('17', '减伤', null, 'jianShang', null);
INSERT INTO `x2_biology_nature` VALUES ('18', '真伤', null, 'zhenShang', null);
INSERT INTO `x2_biology_nature` VALUES ('19', '闪避', null, 'shanbi', null);
INSERT INTO `x2_biology_nature` VALUES ('20', '速度', null, 'suDu', null);
INSERT INTO `x2_biology_nature` VALUES ('21', '暴击', null, 'baoji', null);
INSERT INTO `x2_biology_nature` VALUES ('22', '暴率', null, 'baojilv', null);
INSERT INTO `x2_biology_nature` VALUES ('23', '丹毒', null, 'danDu', null);
INSERT INTO `x2_biology_nature` VALUES ('24', '属性', null, 'extend', '全属性增加+1000');
INSERT INTO `x2_biology_nature` VALUES ('25', '召唤', null, 'zhaoHuan', '特殊召唤单位');
INSERT INTO `x2_biology_nature` VALUES ('26', '治疗', null, 'zhiLiao', '特殊治疗');
INSERT INTO `x2_biology_nature` VALUES ('27', '增长', null, 'zengZhang', '回合增加属性+100');

-- ----------------------------
-- Table structure for x2_biology_skill
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_skill`;
CREATE TABLE `x2_biology_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '1' COMMENT '天地玄黄 宇宙洪荒 掉落只有4级，剩下靠缘分悟性',
  `name` varchar(255) DEFAULT NULL COMMENT '技能名称',
  `belong` int(11) DEFAULT NULL COMMENT '技能类型(主动，被击触发，攻击触发，初始化，附加效果）',
  `value` int(11) DEFAULT '0' COMMENT '成长值',
  `keeptime` int(11) DEFAULT '0' COMMENT '持续时长1回合(0为单次触发)',
  `probability` int(255) DEFAULT '100' COMMENT '触发概率',
  `image` varchar(255) DEFAULT NULL COMMENT '图片',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `words` varchar(50) DEFAULT NULL COMMENT '世界名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_skill
-- ----------------------------
INSERT INTO `x2_biology_skill` VALUES ('1', '1', '蝶舞', '2', '3', '0', '3', null, '闪避3%', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('2', '1', '九天雷术', '1', null, '0', '160', null, '造成法伤160%', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('3', '1', '灵魂锁链', '2', null, '0', '5', null, '收到伤害是，生命分摊', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('4', '1', '七大圣', null, '0', '0', '2', null, '七大圣中随机召唤不在场的二圣', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('5', '1', '天涯', null, '0', '0', '3', null, '吕布神圣一击，3%暴击率', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('6', '1', '咫尺天涯', null, '0', '0', '3', null, '3%的几率无视伤害，并且免疫伤害当前回合', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('7', '1', '赤兔', null, '0', '0', '1', null, '召唤赤兔', '蝶舞天涯');
INSERT INTO `x2_biology_skill` VALUES ('8', '1', '铁布衫', null, '0', '0', '3', null, '3%的伤害减免', '天龙八部');
INSERT INTO `x2_biology_skill` VALUES ('9', '1', '金钟罩', null, '0', '0', '3', null, '3%的伤害减免', '天龙八部');
INSERT INTO `x2_biology_skill` VALUES ('10', '1', '降龙十八掌', null, '0', '0', '10', null, '增加10%的物理伤害', '天龙八部');
INSERT INTO `x2_biology_skill` VALUES ('11', '1', '碧海潮生', null, '0', '0', '10', null, '增加10%的法术伤害', '神雕侠侣');
INSERT INTO `x2_biology_skill` VALUES ('12', '1', '乾坤大挪移', '5', '3', '0', '3', null, '倚天屠龙记中明教教主功法，闪避3%，减伤属性*3%', '倚天屠龙记');

-- ----------------------------
-- Table structure for x2_biology_state
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_state`;
CREATE TABLE `x2_biology_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_state
-- ----------------------------
INSERT INTO `x2_biology_state` VALUES ('1', '普通', null, null);
INSERT INTO `x2_biology_state` VALUES ('2', '先天', null, null);
INSERT INTO `x2_biology_state` VALUES ('3', '金丹', null, null);
INSERT INTO `x2_biology_state` VALUES ('4', '筑基', null, null);
INSERT INTO `x2_biology_state` VALUES ('5', '金丹', null, null);
INSERT INTO `x2_biology_state` VALUES ('6', '元婴', null, null);
INSERT INTO `x2_biology_state` VALUES ('7', '渡劫', null, null);
INSERT INTO `x2_biology_state` VALUES ('8', '地仙', null, null);
INSERT INTO `x2_biology_state` VALUES ('9', '天仙', null, null);
INSERT INTO `x2_biology_state` VALUES ('10', '金仙', null, null);
INSERT INTO `x2_biology_state` VALUES ('11', '大罗', null, null);
INSERT INTO `x2_biology_state` VALUES ('12', '玄仙', null, null);
INSERT INTO `x2_biology_state` VALUES ('13', '圣人', null, null);

-- ----------------------------
-- Table structure for x2_user
-- ----------------------------
DROP TABLE IF EXISTS `x2_user`;
CREATE TABLE `x2_user` (
  `userid` int(11) NOT NULL COMMENT '用户userid',
  `occupation` int(2) DEFAULT '1' COMMENT '职业 1炼器2 寻道 3炼魂 4炼丹 5炼体',
  `vip` int(2) DEFAULT '0' COMMENT 'vip等级',
  `grade` int(11) DEFAULT '1',
  `state` int(11) DEFAULT '1' COMMENT '境界',
  `biologyknow` int(11) DEFAULT '1' COMMENT '生物图鉴数',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user
-- ----------------------------

-- ----------------------------
-- Table structure for x2_user_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology`;
CREATE TABLE `x2_user_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '生物属性(神魔人鬼妖五行混沌) 0未知',
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
  `state` int(3) DEFAULT '1' COMMENT '生物境界',
  `jinJie` int(11) DEFAULT '1' COMMENT '生物id',
  `biologyid` int(11) NOT NULL DEFAULT '0' COMMENT '生物id',
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology
-- ----------------------------

-- ----------------------------
-- Table structure for x2_user_biology_attribute
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology_attribute`;
CREATE TABLE `x2_user_biology_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '生物名称',
  `biology` tinyint(3) DEFAULT '1' COMMENT '生物属性(神魔人鬼妖五行混沌) 0未知',
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
  `state` int(3) DEFAULT '1' COMMENT '生物境界',
  `jinJie` int(11) DEFAULT '1' COMMENT '生物id',
  `biologyid` int(11) NOT NULL DEFAULT '0' COMMENT '生物id',
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

-- ----------------------------
-- Table structure for x2_user_words
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_words`;
CREATE TABLE `x2_user_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户标记世界',
  `past` int(3) DEFAULT '0' COMMENT '通过率--正常10关',
  `wordId` int(11) DEFAULT '0' COMMENT '世界id',
  `userid` int(11) DEFAULT NULL,
  `complete` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_words
-- ----------------------------
INSERT INTO `x2_user_words` VALUES ('1', '100', '1', '1', '1');
INSERT INTO `x2_user_words` VALUES ('2', '100', '2', '1', '1');

-- ----------------------------
-- Table structure for x2_words
-- ----------------------------
DROP TABLE IF EXISTS `x2_words`;
CREATE TABLE `x2_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `type` int(11) DEFAULT '1' COMMENT '世界等级',
  `music` varchar(255) DEFAULT NULL COMMENT '背景音乐',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `difficult` int(255) DEFAULT '1' COMMENT '相对当前世界难度',
  `typeName` varchar(255) DEFAULT NULL COMMENT '世界等级名称',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `down` varchar(255) DEFAULT NULL COMMENT '掉落',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_words
-- ----------------------------
INSERT INTO `x2_words` VALUES ('1', '太极张三丰', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('2', '黄飞鸿', '1', null, null, '2', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('3', '叶问', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('4', '水浒', '1', null, null, '2', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('5', '蝶舞天涯', '1', null, null, '3', '低武世界', '《吕布与貂蝉》（全名《三国群英会之吕布与貂蝉》，原定名《三国传说》。', null);
INSERT INTO `x2_words` VALUES ('6', '寻情记', '1', null, null, '5', '低武世界', '《三官经》：《太上三元赐福赦罪解厄消灾延生保命妙经》也作《三官经》或《三官感应妙经》。三官，指天、地、水三官大帝。转诵此经至满千遍，大作踊跃；悔过愆尤，断恶修善,即能除无妄之灾，解有仇之愆；赐千祥之福，脱九厄之难，离三途之苦。', '《三官经》');
INSERT INTO `x2_words` VALUES ('7', '鹿鼎记', '1', null, null, '4', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('8', '倚天屠龙记', '2', null, null, '1', '古武世界', null, '《九阳真经》《九阴真经》');
INSERT INTO `x2_words` VALUES ('9', '笑傲江湖', '2', null, null, '2', '古武世界', null, '《道藏》');
INSERT INTO `x2_words` VALUES ('10', '神雕侠侣', '2', null, null, '2', '古武世界', null, '《周易参同契》');
INSERT INTO `x2_words` VALUES ('11', '天龙八部', '2', null, null, '3', '古武世界', '《南华经》：《南华真经》即《庄子》，战国时庄周撰。唐玄宗于天宝元年诏封庄子为“南华真人”，尊其书为《南华真经》。到宋徽宗时,又追封庄周为“微妙无通真君”', '《不老长春功》 《南华经》 《易筋经》 ');
INSERT INTO `x2_words` VALUES ('12', '天下第一', '2', null, null, '2', '古武世界', '《抱朴子》：《抱朴子》是对战国以来、直至汉代的神仙思想和炼丹养生方术所作的系统的总结，为魏晋神仙道教奠定理论基础的道教经典。作者是晋代葛洪祖师。', '《抱朴子》');
INSERT INTO `x2_words` VALUES ('13', '侠客行', '2', null, null, '4', '古武世界', '《太玄经》，汉扬雄撰，也称《扬子太玄经》，其书模仿《周易》，以天地人三才为本，著重阐发宇宙生成、天地运行及人事变化之哲理，具有辩证法因素。该书对东汉以来天文象数学发展影响甚大，但其文辞艰深晦涩，故历代学者为之注释训诂者颇多。', '《太玄经》');
INSERT INTO `x2_words` VALUES ('14', '秦时明月', '2', null, null, '4', '古武世界', '《道德经》：《道德经》又称《老子》、《五千言》，是中国古代先秦诸子分家前的一部著作，是中国历史上首部完整的哲学著作，是道家哲学思想的重要来源,春秋时期的老子李耳所撰写', '《道德经》');
INSERT INTO `x2_words` VALUES ('15', '仙剑奇侠传', '3', null, null, '4', '仙侠世界', '《北斗经》：《北斗经》，全称《太上玄灵北斗本命延生真经》。经中称，北斗七星君乃造化之枢机，人神之主宰，有回生注死之功，消灾度厄之力。凡人性命五体，悉属本命星官主掌。', '《北斗经》');
INSERT INTO `x2_words` VALUES ('16', '蜀山传奇', '3', null, null, '5', '仙侠世界', '《通玄经》：《通玄真经》即《文子》，战国时文子所著。唐玄宗崇道，于天宝元年（742）封文子为「通玄真人」，尊称其书为《通玄真经》。', '《通玄真经》');
INSERT INTO `x2_words` VALUES ('17', '诛仙', '3', null, null, '4', '仙侠世界', null, '《天书》');
INSERT INTO `x2_words` VALUES ('18', '大唐双龙传', '2', null, null, '5', '古武世界', '《冲虚经》：《冲虚经》即《列子》，旧题周列御寇撰。唐玄宗崇道，于天宝元年（742）封 列子为冲虚真人，尊称其书《冲虚真经》。至宋真宗景德（1004－1007）中加封列子为「冲虚至德真人」，故又名《冲虚至德真经》', '《长生诀》《冲虚经》');
INSERT INTO `x2_words` VALUES ('19', '西游记', '4', null, null, '3', '神话世界', null, null);
INSERT INTO `x2_words` VALUES ('20', '盘龙', '4', null, null, '3', '神话世界', '《阴符经》：《阴符经》，全称《黄帝阴符经》或《轩辕黄帝阴符经》，也称《黄帝天机经》，总共只有300多字。《阴符经》是唐朝著名道士李筌发现于嵩山，在骊山经骊山老母点化，此后才传抄流行于世。', '《阴符经》');
INSERT INTO `x2_words` VALUES ('21', '斗破苍穹', '4', null, null, '2', '神话世界', '《常清静经》：《常清静经》是《太上老君说常清静经》的简称，大约成书于唐代，收录于《正统道藏》洞神部。它是多数道教学人必须背诵的经典，被视为道教在心性修练上的法宝。', '《常清静经》');
INSERT INTO `x2_words` VALUES ('22', '遮天', '4', null, null, '4', '神话世界', '《度人经》：全称《太上洞玄灵宝无量度人上品妙经》，或称《元始无量度人上品妙经》。由《元始洞玄灵宝本章》、《元洞玉历章》和《前序》、《中序》、《后序》及《元始灵书》上、中、下篇组成。', '《度人经》');
INSERT INTO `x2_words` VALUES ('23', '永生', '4', null, null, '5', '神话世界', '《心印经》：气功内丹术著作。全称《高上玉皇心印妙经》。一卷，唐代著作。此经为四言韵文，共五十句。主要讲述内丹术的基本理论，阐发精、气、神的含义及它们之间的关系，对后世有较大影响。', '《心印经');
INSERT INTO `x2_words` VALUES ('24', '诸神黄昏', '4', null, null, '2', '神话世界', '', '《圣经》');
INSERT INTO `x2_words` VALUES ('25', '凡人修仙传', '4', null, null, '4', '神话世界', '《玉皇经》：全称《高上玉皇本行集经》，有3卷。道士斋醮祈禳及道门功课的必诵经文。经文由《清微天宫神通品》、《太上大光明圆满大神咒品》、《诵持功德品》、《天真护持品》及《报应神验品》组成。', '《玉皇经》');
INSERT INTO `x2_words` VALUES ('26', '玄黄', '5', null, null, '2', '起源世界', '玄黄，天地玄黄宇宙洪荒混沌', null);
INSERT INTO `x2_words` VALUES ('27', '鸿蒙', '5', null, null, '1', '起源世界', '天地，天地玄黄宇宙洪荒混沌', null);
INSERT INTO `x2_words` VALUES ('28', '洪荒', '5', null, null, '4', '起源世界', '洪荒，天地玄黄宇宙洪荒混沌', null);
INSERT INTO `x2_words` VALUES ('29', '混沌', '5', null, null, '5', '起源世界', '混沌，天地玄黄宇宙洪荒混沌', null);
INSERT INTO `x2_words` VALUES ('30', '我和僵尸有个约会', '3', null, null, '5', '仙侠世界', null, '《地书》《人书》');
INSERT INTO `x2_words` VALUES ('31', '僵尸道长', '1', null, null, '5', '低武世界', '《上清经》被视为道家“三奇第一之奇”，历代流传不绝，宣称如果得到《上清 经》，根本不需要再炼丹修道，只需读上一万遍，便可以成仙。《上清经》的全称是 《上清大洞真经三十九章》，又称《大洞真经》、《三天龙书》、《九天太真道经》、 《三十九章经》，为上清派首经。', '《六甲天书 》《上清经》 ');
INSERT INTO `x2_words` VALUES ('32', '神话', '2', null, null, '1', '古武世界', '《太平经》：《太平经》又名《太平清领书》。据《后汉书·襄楷传》称：汉顺帝时，琅玡人宫崇诣阙，献其师于吉所得神书，号曰《太平清领书》。此神书即《太平经》，系东汉原始道教重要经典。', '《太平经》');
INSERT INTO `x2_words` VALUES ('33', '漫威', '4', null, null, '1', '神话世界', null, null);
INSERT INTO `x2_words` VALUES ('34', '封神榜', '4', null, null, '4', '神话世界', null, null);
INSERT INTO `x2_words` VALUES ('35', '宇宙', '5', null, null, '3', '起源世界', '宇宙，天地玄黄宇宙洪荒混沌', null);
INSERT INTO `x2_words` VALUES ('36', '风云', '1', null, null, '3', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('37', '古惑仔', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('38', '功夫', '1', null, null, '1', '低武世界', null, null);
