/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-03-06 18:37:09
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
  `fate` int(11) DEFAULT '1' COMMENT '缘分(武器缘分) 本命法宝（只有一个）武器库随机-命中注定',
  `type` int(3) DEFAULT '1' COMMENT '1普通 2特殊 3NPC',
  `descript` varchar(255) DEFAULT NULL COMMENT '描述',
  `lucky` int(3) DEFAULT '1' COMMENT ' 幸运值-成长值-潜能-技能进阶-境界突破',
  `maxNature` int(11) DEFAULT '10' COMMENT '自由属性点',
  `qianNeng` int(3) DEFAULT '1' COMMENT '潜能--1-10次，战斗中有几率进化-增加1-10 悟性（越低级潜能越大）',
  `character` int(3) DEFAULT '1' COMMENT '性格',
  `headerPicture` varchar(255) DEFAULT NULL COMMENT '头像',
  `picture` varchar(255) DEFAULT NULL COMMENT '生物图片 形象',
  `yiXing` tinyint(1) DEFAULT '0' COMMENT '异性 0 否1是',
  `sex` int(255) DEFAULT '1' COMMENT '性别',
  `jingBi` int(11) DEFAULT '1' COMMENT '金币',
  `jingYan` int(11) DEFAULT '1' COMMENT '经验',
  `jianShang` int(255) DEFAULT '0' COMMENT '减伤',
  `zhenShang` int(255) DEFAULT '0' COMMENT '增伤（真实伤害）',
  `color` varchar(25) DEFAULT '#fff' COMMENT '颜色（普通默认为白色）',
  `danDu` int(11) DEFAULT '0' COMMENT '丹毒',
  `scoreGrade` varchar(11) DEFAULT 'D' COMMENT '评分等级 D C A B S SS SSS 传说',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('1', '盘古c', '3', '2', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '100', '100', '100', '1', '1', '3', '1,2,3', '0', '1', '1', '盘古开天辟地，第二元神', '1', '10', '1', '1', null, '/files/attach/images/20200306/1583464205134745.png', '0', '1', '1', '1', '0', '0', '#444', '0', 'D');
INSERT INTO `x2_biology` VALUES ('2', '未知生物', '5', '4', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '3', '4', '1', '1', '1', '1', '2,3', '0', '1', '3', null, '1', '10', '1', '1', null, null, '0', '2', null, '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('3', '女娲', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', null, '1', '10', '1', '1', null, null, '0', '2', null, '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('8', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', null, '1', '10', '1', '1', null, null, '0', '3', null, '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('9', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('10', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('11', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('12', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('13', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('14', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('15', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('16', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('17', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('18', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('19', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('20', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('21', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('22', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('23', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('24', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('25', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('26', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('27', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('28', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('29', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);
INSERT INTO `x2_biology` VALUES ('30', '未知生物', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '1', '3', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '', '1', '10', '1', '1', null, null, '0', '3', '1', '1', '0', '0', '#fff', '0', null);

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
