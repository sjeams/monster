/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-04-30 18:46:49
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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台管理', '', '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '生物系统', '测试s', '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', '', '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', '', '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '生物模板', '', '/admin/biology/index', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('6', '2', '', '生物创造', '', '/admin/biology-create/index', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('40', '0', 'app', 'APP管理', '', '', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('41', '0', 'user', '用户管理', '', '', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '生物管理', '', '/admin/user-biology/index', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '世界管理', '', '/layuimini/page/setting.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '技能管理', '反倒是', '/layuimini/page/table.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('48', '1', '', '物品管理', '', '', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('49', '48', '', '物品分类', '', '/admin/goods/index', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('50', '2', '', '性格管理 ', '', '', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('51', '48', 'danyao', '物品类型', '', '/admin/goods-store/index', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', '', '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', '', '/layuimini/page/login-1.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', null, '/layuimini/page/login-2.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', null, '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', '', '/layuimini/page/404.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', null, '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', null, '/layuimini/page/button.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', null, '/layuimini/page/layer.html\"', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', null, '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', null, '/layuimini/page/icon.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', null, '/layuimini/page/icon-picker.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', null, '/layuimini/page/color-select.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', null, '/layuimini/page/table-select.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', '', '/layuimini/page/upload.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', '', '/layuimini/page/editor.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', null, '', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', null, '/layuimini/page/button.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('31', '29', '', '按钮2', null, '/layuimini/page/button.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('32', '29', '', '按钮3', null, '/layuimini/page/button.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('33', '29', '', '表单4', null, '/layuimini/page/form.html', '1587980518', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('45', '0', 'order', '商城', '', '', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('43', '41', 'cc', 'cc', '', 'cc', '1587980518', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');

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
  `special` int(11) DEFAULT '1' COMMENT '评分 战力 (与属性有关*30.0的基础评分) 悟性 和基础属性',
  `score` int(11) DEFAULT '1' COMMENT '评分',
  `wuXing` int(11) DEFAULT '3' COMMENT '悟性-成长率 1-10  自由属性 ',
  `skill` varchar(255) DEFAULT '1' COMMENT '技能编号',
  `yuanShen` int(11) DEFAULT '0' COMMENT '元神',
  `fate` int(11) DEFAULT '0' COMMENT '缘分(武器缘分) 本命法宝（只有一个）武器库随机-命中注定',
  `type` int(3) NOT NULL DEFAULT '4' COMMENT '1普通 2特殊 3NPC 4不可用',
  `descript` varchar(255) DEFAULT NULL COMMENT '描述',
  `lucky` int(3) DEFAULT '1' COMMENT ' 幸运值-成长值-潜能-技能进阶-境界突破',
  `maxNature` int(11) DEFAULT '0' COMMENT '自由属性点',
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
  `power` int(11) DEFAULT '1' COMMENT '力量',
  `agile` int(11) DEFAULT '1' COMMENT '敏捷',
  `intelligence` int(11) DEFAULT '1' COMMENT '智力',
  `minPower` int(11) DEFAULT '10' COMMENT '最小力量',
  `minAgile` int(11) DEFAULT '10',
  `minIntelligence` int(11) DEFAULT '10' COMMENT '最小力量',
  `userid` int(11) DEFAULT '1' COMMENT '模型创建所属人 1 管理员',
  `shenFen` int(3) DEFAULT '1' COMMENT '身份 1普通  2精英   3头目  4气运之子    5天地主角',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('1', '王隐林', '1', '1', '1', '608', '60', '87', '30', '88', '31', '114', '6', '0', '0', '1', '3', '1', '0', '23', '1097', '94', '8', '6', '0', '0', '4', '侠家拳王隐林，广东南拳之大侠李胡子从四川云游到广东在肇庆鼎湖山庆云寺挂单，把侠家拳传给僧人王隐林（又名王飞龙），王隐林到广州后还俗，在黄沙兼善街开设武馆授徒。', '16', '0', '1', '1', null, '0', '1', '191', '98', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '30', '26', '28', '12', '5', '6', '1', '1');
INSERT INTO `x2_biology` VALUES ('2', '黄澄可', '1', '1', '1', '546', '58', '84', '29', '83', '29', '113', '6', '0', '0', '1', '3', '1', '0', '23', '971', '69', '17', '', '0', '0', '1', '九龙拳黄澄可，生性善良，宅心仁厚，天资聪敏，乐於助人。本为乡村赤脚小子，万事不强求，後离开家园往省城，面对人生种种考验与经历之馀，先後得一代宗师陆阿采、黄麒英、铁挢三等人指点武学，经历大大小小生死切磋搏斗，融会贯通各家之大成，终自创出一套刚柔并重，变化无穷的“九龙拳”。国难当前，不惜联同众虎，洒热血，抛头颅，发扬武学之“侠义精神”，成为一代英雄。', '20', '0', '1', '1', null, '0', '1', '141', '73', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '26', '22', '21', '18', '14', '12', '1', '1');
INSERT INTO `x2_biology` VALUES ('3', '苏黑虎', '1', '1', '1', '634', '62', '83', '29', '89', '30', '113', '6', '0', '0', '1', '3', '1', '0', '21', '1217', '123', '11', '6,5,10', '0', '0', '1', '铁沙掌苏黑虎，少林黑虎门源出嵩山少林寺，距今约二百年前道光年间,有一少林僧人法号兆德，每隔数年便到广东化缘一次.因而遇上顺德北岗乡之苏黑虎，苏黑虎年幼已习武术，但目睹兆德和尚的少林绝技后，即决心跟随兆德和尚上嵩山少林学艺。', '20', '0', '1', '1', null, '0', '1', '249', '127', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '31', '24', '38', '8', '3', '19', '1', '1');
INSERT INTO `x2_biology` VALUES ('4', '黄麒英', '1', '1', '1', '536', '59', '90', '32', '89', '31', '115', '5', '0', '0', '1', '3', '1', '0', '25', '1182', '112', '15', '7,11,4,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '227', '116', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '24', '25', '33', '10', '14', '8', '1', '1');
INSERT INTO `x2_biology` VALUES ('5', '周泰', '1', '1', '1', '686', '59', '108', '38', '103', '37', '118', '7', '0', '0', '1', '3', '1', '0', '30', '1186', '91', '13', '', '0', '0', '1', '软棉掌周泰，周泰是广东湛江人,侠骨丹心，唯心高气傲，自尊心过强。醉心武学，为“十虎”中的“武痴”。', '10', '0', '1', '1', null, '0', '1', '185', '95', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '38', '32', '21', '14', '10', '2', '1', '1');
INSERT INTO `x2_biology` VALUES ('6', '黎仁超', '1', '1', '1', '430', '60', '65', '21', '69', '22', '111', '5', '0', '0', '1', '3', '1', '0', '15', '848', '77', '13', '7', '0', '0', '1', '七星拳黎仁超，为人聪明能干，头脑灵活多变，每每洞悉先机，城府甚深。为“十虎”中之智将。', '21', '0', '1', '1', null, '0', '1', '157', '81', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '12', '23', '32', '4', '9', '17', '1', '1');
INSERT INTO `x2_biology` VALUES ('7', '谭济筠', '1', '1', '1', '596', '61', '101', '36', '106', '37', '115', '7', '0', '0', '1', '3', '1', '0', '29', '1288', '126', '15', '8,4,2,5', '0', '0', '1', '鹤阳拳谭济筠，本名谭石窝,成名后将名字改为谭济筠. 性格率直冲动，後随咏春宗师梁赞学武，不单武艺有进，人亦变得成熟稳重，因缘际遇结识到革命党人，更不惜舍身匡扶，多番身陷险境亦义无反顾。', '17', '0', '1', '1', null, '0', '1', '255', '130', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '28', '24', '34', '7', '5', '8', '1', '1');
INSERT INTO `x2_biology` VALUES ('8', '陈铁志', '1', '1', '1', '488', '58', '88', '31', '87', '31', '114', '6', '0', '0', '1', '3', '1', '0', '25', '1128', '104', '13', '2,6,4,10', '0', '0', '1', '鹰爪王陈铁志，陈铁志又名陈长泰, 一身武功刚猛雄劲,出手疾如闪电，指劲雄浑，坚如铁石，故人称“铁指陈”。', '17', '0', '1', '1', null, '0', '1', '211', '108', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '20', '23', '21', '10', '20', '15', '1', '1');
INSERT INTO `x2_biology` VALUES ('9', '苏灿', '1', '1', '1', '540', '62', '91', '32', '100', '34', '114', '7', '0', '0', '1', '3', '1', '0', '25', '1055', '96', '7', '11', '0', '0', '1', '醉拳苏灿，苏灿本过着富裕逍遥的日子，但是，在遭遇到斧头黑帮的纠缠、洋人买办史密斯的阴谋以及因自己的过错使父母惨死，恋人洪绮莲的离去等等挫折后，从此遁世江湖，沦为乞丐，与酒为伍，狂歌当哭，竟把酒意融入武学招式中，开创出别具一格的“醉拳”，为“广东十虎”中最出世化外之一虎。', '23', '0', '1', '1', null, '0', '1', '195', '100', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '21', '23', '42', '3', '5', '11', '1', '1');
INSERT INTO `x2_biology` VALUES ('10', '梁坤', '1', '1', '1', '448', '57', '59', '18', '50', '16', '114', '4', '0', '0', '1', '3', '1', '0', '10', '876', '88', '6', '8,6', '0', '0', '1', '铁桥三梁坤，正名梁坤，有洪拳大师之称，广东十虎之首。', '27', '0', '1', '1', null, '0', '1', '179', '92', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '14', '37', '17', '2', '19', '3', '1', '1');
INSERT INTO `x2_biology` VALUES ('11', '董海川', '1', '1', '1', '534', '59', '86', '31', '94', '33', '111', '5', '0', '0', '1', '3', '1', '0', '26', '1079', '87', '9', '5,11', '0', '0', '1', '[1797——1882]少任侠，为人仗义，嫉恶如仇，好打抱不平，人称紫面大侠，八卦掌创始', '7', '0', '1', '1', null, '0', '1', '177', '91', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '25', '13', '29', '13', '3', '16', '1', '1');
INSERT INTO `x2_biology` VALUES ('12', '郭云深', '1', '1', '1', '634', '60', '103', '36', '99', '35', '118', '6', '0', '0', '1', '3', '1', '0', '28', '1269', '119', '9', '5,7,6', '0', '0', '1', '[1820——1901]刚直正义，好打抱不平，人称郭大侠，形意拳一代宗师。', '6', '0', '1', '1', null, '0', '1', '241', '123', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '32', '33', '24', '11', '13', '10', '1', '1');
INSERT INTO `x2_biology` VALUES ('13', '王正谊', '1', '1', '1', '502', '58', '52', '16', '53', '16', '109', '4', '0', '0', '1', '3', '1', '0', '10', '820', '67', '8', '', '0', '0', '1', '[1844——1900]德义高尚，行侠仗义，人称京师大侠，大刀王五，晚清著名武林高手。', '28', '0', '1', '1', null, '0', '1', '137', '71', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '21', '22', '24', '6', '12', '17', '1', '1');
INSERT INTO `x2_biology` VALUES ('14', '李存义', '1', '1', '1', '544', '57', '50', '14', '42', '13', '111', '2', '0', '0', '1', '3', '1', '0', '7', '940', '92', '12', '2,11', '0', '0', '1', '[1847——1921]为人刚直正义，人称单刀李，单刀侠，为形意拳一代宗师。', '13', '0', '1', '1', null, '0', '1', '187', '96', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '25', '32', '15', '4', '17', '3', '1', '1');
INSERT INTO `x2_biology` VALUES ('15', '黄飞鸿', '1', '1', '1', '594', '56', '57', '18', '51', '17', '110', '3', '0', '0', '1', '3', '1', '0', '12', '1068', '95', '8', '11,4,7', '0', '0', '1', '[1847——1925]为人正义，济世为怀，救死扶伤，人称一代大侠，为岭南一代宗师。', '15', '0', '1', '1', null, '0', '1', '193', '99', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '33', '22', '10', '21', '8', '7', '1', '1');
INSERT INTO `x2_biology` VALUES ('16', '霍元甲', '1', '1', '1', '614', '62', '43', '13', '53', '15', '107', '3', '0', '0', '1', '3', '1', '0', '6', '1016', '107', '18', '7,4', '0', '0', '1', '[1868——1910]执仗正义，人称霍大力士，黄面虎，津门大侠。为迷踪拳一代宗师。', '27', '0', '1', '1', null, '0', '1', '217', '111', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '30', '18', '39', '6', '5', '19', '1', '1');
INSERT INTO `x2_biology` VALUES ('17', '杜心武', '1', '1', '1', '480', '59', '54', '17', '58', '18', '109', '4', '0', '0', '1', '3', '1', '0', '11', '810', '68', '13', '', '0', '0', '1', '[1869——1953]行侠仗义，人称侠骨，神腿，南北大侠，为自然门一代宗师。被誉为中华第一保镖。', '27', '0', '1', '1', null, '0', '1', '139', '72', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '18', '20', '32', '8', '9', '25', '1', '1');
INSERT INTO `x2_biology` VALUES ('18', '刘百川', '1', '1', '1', '502', '63', '43', '13', '58', '16', '106', '4', '0', '0', '1', '3', '1', '0', '7', '912', '99', '16', '4,11', '0', '0', '1', '[1870——1964]为人义气，正直任侠，人称北侠，江南第一腿。', '30', '0', '1', '1', null, '0', '1', '201', '103', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '18', '14', '47', '9', '8', '13', '1', '1');
INSERT INTO `x2_biology` VALUES ('19', '李尧臣', '1', '1', '1', '636', '58', '70', '22', '59', '20', '114', '4', '0', '0', '1', '3', '1', '0', '14', '1047', '92', '12', '2', '0', '0', '1', '[1876——1973]以侠义、智慧、勇武、传奇著称，人称李大侠，神镖李，无极刀王，29军大刀队总教头，被誉为最后的镖王。', '16', '0', '1', '1', null, '0', '1', '187', '96', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '34', '35', '13', '8', '16', '7', '1', '1');
INSERT INTO `x2_biology` VALUES ('20', '韩慕侠', '1', '1', '1', '598', '60', '67', '22', '68', '22', '112', '5', '0', '0', '1', '3', '1', '0', '14', '968', '87', '9', '', '0', '0', '1', '[1877——1947]好任侠，打抱不平，人称韩大侠，玉面虎，为形意八卦一代宗师。', '28', '0', '1', '1', null, '0', '1', '177', '91', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '28', '29', '30', '5', '10', '18', '1', '1');
INSERT INTO `x2_biology` VALUES ('21', '王子平', '1', '1', '1', '564', '62', '96', '34', '103', '36', '115', '7', '0', '0', '1', '3', '1', '0', '27', '1194', '116', '8', '2,10,11', '0', '0', '1', '[1881——1973]一身正义，好打抱不平，人称千斤神力，为清末民初著名武术家。', '17', '0', '1', '1', null, '0', '1', '235', '120', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '24', '23', '39', '11', '5', '25', '1', '1');
INSERT INTO `x2_biology` VALUES ('22', '吕紫剑', '1', '1', '1', '600', '61', '53', '16', '54', '16', '111', '4', '0', '0', '1', '3', '1', '0', '8', '1073', '118', '18', '6,5,11', '0', '0', '1', '[1993——2012]行侠仗义，人称长江大侠，为八卦掌一代宗师', '27', '0', '1', '1', null, '0', '1', '239', '122', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '28', '29', '31', '9', '13', '22', '1', '1');
INSERT INTO `x2_biology` VALUES ('23', '李三', '1', '1', '1', '1059', '31', '26', '21', '29', '24', '110', '3', '0', '0', '1', '3', '1', '0', '5', '1322', '109', '6', '4,6,7,8,5', '0', '0', '1', '[1898——1953]劫富济贫，人称侠盗，燕子李三，为民初著名飞贼。', '10', '0', '1', '1', '', '0', '1', '221', '113', '9', '10', '#fff', '0', 'B', '0', '1', '1', '0', '35', '22', '30', '24', '11', '13', '1', '1');
INSERT INTO `x2_biology` VALUES ('24', '未知生物', '1', '1', '1', '610', '53', '65', '29', '60', '28', '109', '2', '0', '0', '1', '3', '1', '0', '10', '1166', '109', '16', '4,2,6,10', '0', '0', '4', null, '29', '0', '1', '1', null, '0', '1', '221', '113', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '34', '20', '15', '21', '15', '3', '1', '1');
INSERT INTO `x2_biology` VALUES ('25', '未知生物', '1', '1', '1', '572', '54', '76', '41', '80', '42', '110', '1', '0', '0', '1', '3', '1', '0', '16', '1092', '90', '12', '8,2', '0', '0', '4', null, '19', '0', '1', '1', null, '0', '1', '192', '97', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '29', '18', '23', '11', '3', '6', '1', '1');
INSERT INTO `x2_biology` VALUES ('26', '未知生物', '1', '1', '1', '1176', '34', '47', '39', '39', '32', '127', '7', '0', '0', '1', '3', '1', '0', '16', '1646', '127', '13', '4,7', '0', '0', '4', '', '22', '0', '1', '1', '/files/attach/images/20200426/1587882218673017.png', '0', '2', '257', '131', '85', '60', '#fff', '0', 'A', '0', '1', '1', '0', '16', '40', '25', '6', '14', '8', '1', '2');

-- ----------------------------
-- Table structure for x2_biology_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_biology`;
CREATE TABLE `x2_biology_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL COMMENT '简介标签',
  `value` int(11) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL COMMENT '天赋描述',
  `characteristic` varchar(255) DEFAULT NULL COMMENT '特点',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_biology
-- ----------------------------
INSERT INTO `x2_biology_biology` VALUES ('1', '人', '最适合修行的形态，领悟极高，每级次战斗有概率突破或者提升境界。', '10', '幸运+10', '幸运，体质，属性较高，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('2', '妖', '狡猾而狡诈，大部分技能是辅助控制buff技能，非常适合于后排。', '6', '触发+6%', '控制，概率，buff加成，适合资深玩家。');
INSERT INTO `x2_biology_biology` VALUES ('3', '鬼', '拥有无尽的魂力，最纯粹的力量，强大的魂力使他们不易死亡。', '100', '法力值+100', '套路，脆弱，搭配较高，适合资深玩家。');
INSERT INTO `x2_biology_biology` VALUES ('4', '仙', '拥有极高的法术伤害，是大多数高输出的克星。', '8', '特攻+8%', '法术，控制，输出较高，适合普通玩家。');
INSERT INTO `x2_biology_biology` VALUES ('5', '魔', '偏重物理防守，输出一般，属于肉盾类型，适合用于前排。', '12', '生命+12%', '血厚，坚硬，生存力强，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('6', '灵', '天地万物皆有灵，有较高的灵气成长值。有回血，反伤，减伤等技能。', '5', '暴击+5%', '物理，暴力，爆发较高，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('7', '异', '超脱三界，不在五行的未知生物。拥有极高的抗性，免疫的物理和法术伤害。', '6', '抗性+6%', '双抗，减伤，防御较高，适合普通玩家。');
INSERT INTO `x2_biology_biology` VALUES ('8', '兽', '血腥狂暴，拥有极高的爆发。偏物理类型，适合前排或者输出。', '20', '灵气+20%', '辅助，肉盾，全能选手，适合普通玩家。');

-- ----------------------------
-- Table structure for x2_biology_character
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_character`;
CREATE TABLE `x2_biology_character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '性格',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `value` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_character
-- ----------------------------
INSERT INTO `x2_biology_character` VALUES ('1', '极端', '暴击+10%防御-10%', '10');
INSERT INTO `x2_biology_character` VALUES ('2', '稳重', '生命+10%', '10');

-- ----------------------------
-- Table structure for x2_biology_create
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_create`;
CREATE TABLE `x2_biology_create` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '生物创造表',
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
  `maxNature` int(11) DEFAULT '0' COMMENT '自由属性点',
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
  `minPower` int(11) DEFAULT '10' COMMENT '最小力量',
  `minAgile` int(11) DEFAULT '10',
  `minIntelligence` int(11) DEFAULT '10' COMMENT '最小力量',
  `userid` int(11) DEFAULT '1' COMMENT '模型创建所属人 1 管理员',
  `xiXue` int(11) DEFAULT '0' COMMENT '吸血',
  `shenFen` int(3) DEFAULT '1' COMMENT '身份 1普通  2精英   3头目  4气运之子    5天地主角',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_create
-- ----------------------------
INSERT INTO `x2_biology_create` VALUES ('48', '黄麒英', '1', '2', '1', '456', '53', '86', '57', '89', '58', '112', '0', '0', '0', '1', '3', '1', '4', '25', '19', '15', '18', '1086', '82', '7', '7,11,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '167', '86', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '10', '14', '8', '1', '0', '1');

-- ----------------------------
-- Table structure for x2_biology_godhood
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_godhood`;
CREATE TABLE `x2_biology_godhood` (
  `id` int(11) NOT NULL COMMENT '缘分（神格）',
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '羁绊',
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '叠加属性表（绑定武器等加成属性）',
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `wuqiValue` int(11) DEFAULT '0' COMMENT '武器叠加最大属性',
  `danyaoValue` int(11) DEFAULT '0' COMMENT '武器叠加最大属性   值*百分比*等级/境界 1级约0.05 进一取整',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_nature
-- ----------------------------
INSERT INTO `x2_biology_nature` VALUES ('1', '幸运', null, 'lucky', '', '20', '2');
INSERT INTO `x2_biology_nature` VALUES ('2', '境界', null, 'state', '', '2', '2');
INSERT INTO `x2_biology_nature` VALUES ('3', '力量', null, 'power', '', '100', '10');
INSERT INTO `x2_biology_nature` VALUES ('4', '敏捷', null, 'agile', '', '100', '10');
INSERT INTO `x2_biology_nature` VALUES ('5', '智力', null, 'intelligence', '', '100', '10');
INSERT INTO `x2_biology_nature` VALUES ('6', '等级', null, 'grade', '', '10', '2');
INSERT INTO `x2_biology_nature` VALUES ('7', '灵气', null, 'reiki', null, '600', '20');
INSERT INTO `x2_biology_nature` VALUES ('8', '悟性', null, 'wuXing', null, '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('9', '技能', null, 'skill', null, '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('10', '触发', null, 'chuFa', null, '20', '0');
INSERT INTO `x2_biology_nature` VALUES ('11', '生命', null, 'shengMing', null, '100000', '2000');
INSERT INTO `x2_biology_nature` VALUES ('12', '魔法', null, 'moFa', null, '400', '10');
INSERT INTO `x2_biology_nature` VALUES ('13', '攻击', null, 'gongJi', null, '20000', '200');
INSERT INTO `x2_biology_nature` VALUES ('14', '护甲', null, 'huJia', null, '10000', '100');
INSERT INTO `x2_biology_nature` VALUES ('15', '特攻', null, 'faGong', null, '20000', '200');
INSERT INTO `x2_biology_nature` VALUES ('16', '法抗', null, 'fakang', null, '10000', '100');
INSERT INTO `x2_biology_nature` VALUES ('17', '减伤', null, 'jianShang', null, '2000', '0');
INSERT INTO `x2_biology_nature` VALUES ('18', '真伤', null, 'zhenShang', null, '2000', '0');
INSERT INTO `x2_biology_nature` VALUES ('19', '闪避', null, 'shanbi', null, '20', '0');
INSERT INTO `x2_biology_nature` VALUES ('20', '速度', null, 'suDu', null, '2000', '10');
INSERT INTO `x2_biology_nature` VALUES ('21', '暴击', null, 'baoji', null, '100', '10');
INSERT INTO `x2_biology_nature` VALUES ('22', '暴率', null, 'baojilv', null, '30', '0');
INSERT INTO `x2_biology_nature` VALUES ('23', '丹毒', null, 'danDu', null, '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('24', '属性', null, 'extend', '全属性增加+1000', '10000', '10');
INSERT INTO `x2_biology_nature` VALUES ('25', '召唤', null, 'zhaoHuan', '特殊召唤单位', '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('26', '治疗', null, 'zhiLiao', '特殊治疗', '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('27', '增长', null, 'zengZhang', '回合增加属性+100', '0', '0');
INSERT INTO `x2_biology_nature` VALUES ('28', '吸血', null, 'xiXue', '攻击回血', '30', '0');
INSERT INTO `x2_biology_nature` VALUES ('29', '经验', null, 'experience', null, '0', '3000');

-- ----------------------------
-- Table structure for x2_biology_skill
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_skill`;
CREATE TABLE `x2_biology_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '1' COMMENT '天地玄黄 宇宙洪荒 掉落只有4级，剩下靠缘分悟性',
  `name` varchar(255) DEFAULT NULL COMMENT '技能名称',
  `belong` int(11) DEFAULT NULL COMMENT '技能类型(主动，被击触发，攻击触发，初始化，附加效果）',
  `value` int(11) DEFAULT '0' COMMENT '成长值1234倍',
  `keeptime` int(11) DEFAULT '0' COMMENT '持续时长1回合(0为单次触发)',
  `probability` int(255) DEFAULT '100' COMMENT '触发概率',
  `image` varchar(255) DEFAULT NULL COMMENT '图片',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `words` varchar(50) DEFAULT NULL COMMENT '世界名称',
  `wordId` int(11) DEFAULT NULL COMMENT '世界id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_skill
-- ----------------------------
INSERT INTO `x2_biology_skill` VALUES ('1', '1', '蝶舞', '2', '3', '0', '3', null, '闪避3%', '蝶舞天涯', '2');
INSERT INTO `x2_biology_skill` VALUES ('2', '1', '九天雷术', '1', null, '0', '160', null, '造成法伤160%', '蝶舞天涯', '1');
INSERT INTO `x2_biology_skill` VALUES ('3', '1', '灵魂锁链', '2', null, '0', '5', null, '收到伤害是，生命分摊', '蝶舞天涯', '2');
INSERT INTO `x2_biology_skill` VALUES ('4', '1', '七大圣', '1', '0', '0', '2', null, '七大圣中随机召唤不在场的二圣', '蝶舞天涯', '1');
INSERT INTO `x2_biology_skill` VALUES ('5', '1', '天涯', '1', '0', '0', '3', null, '吕布神圣一击，3%暴击率', '蝶舞天涯', '1');
INSERT INTO `x2_biology_skill` VALUES ('6', '1', '咫尺天涯', '1', '0', '0', '3', null, '3%的几率无视伤害，并且免疫伤害当前回合', '蝶舞天涯', '1');
INSERT INTO `x2_biology_skill` VALUES ('7', '1', '赤兔', '1', '0', '0', '1', null, '召唤赤兔', '蝶舞天涯', '1');
INSERT INTO `x2_biology_skill` VALUES ('8', '1', '铁布衫', '1', '0', '0', '3', null, '3%的伤害减免', '天龙八部', '1');
INSERT INTO `x2_biology_skill` VALUES ('9', '1', '金钟罩', '2', '0', '0', '3', null, '3%的伤害减免', '天龙八部', '2');
INSERT INTO `x2_biology_skill` VALUES ('10', '1', '降龙十八掌', '1', '0', '0', '10', null, '增加10%的物理伤害', '天龙八部', '1');
INSERT INTO `x2_biology_skill` VALUES ('11', '1', '碧海潮生', '1', '0', '0', '10', null, '增加10%的法术伤害', '神雕侠侣', '1');
INSERT INTO `x2_biology_skill` VALUES ('12', '1', '乾坤大挪移', '5', '3', '0', '3', null, '倚天屠龙记中明教教主功法，闪避3%，减伤属性*3%', '倚天屠龙记', '5');
INSERT INTO `x2_biology_skill` VALUES ('14', '1', '自爆元神', '1', '1', '0', '100', null, '造成自身生命 *功法等级*1的伤害。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('15', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('16', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('17', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('18', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('19', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('20', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('21', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('22', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('23', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('24', '1', null, null, '0', '0', '100', null, null, null, null);
INSERT INTO `x2_biology_skill` VALUES ('25', '1', '哼', null, '0', '0', '100', null, '渡厄真人传郑伦之术。鼻窍中二气，吸人魂魄。响如钟声，窍中两道白光喷将出来，收人魂魄。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('26', '1', '哈', null, '0', '0', '100', null, '青龙关陈奇之术。养成腹内一道黄气，喷出口来，凡是精血成胎的，必定有三魂七魄，见此黄气，则魂魄自散。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('27', '1', '八九玄功', null, '0', '0', '100', null, '七十二变。玉鼎真人传杨戬。袁洪也会七十二变。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('28', '1', '五行遁术', null, '0', '0', '100', null, '阐教擅长土遁。截教擅长水遁。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('29', '1', '三昧真火', null, '0', '0', '100', null, '常见高阶道术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('30', '1', '呼风唤雨', null, '0', '0', '100', null, '常见低阶道术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('31', '1', '定身术', null, '0', '0', '100', null, '常见中阶道术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('32', '1', '飞头术', null, '0', '0', '100', null, '申公豹擅长。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('33', '1', '腾云术', null, '0', '0', '100', null, '速度+1000，常见法术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('34', '1', '八卦演算', null, '0', '0', '100', null, '卜术。伏羲先天八卦。文王囚里城，创后天八卦。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('35', '1', '风林之术', null, '0', '0', '100', null, '口吐黑烟喷，就化为一网边，现一粒红珠；有碗口大小，中者即伤。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('36', '1', '纵地金光法', null, '0', '0', '100', null, '元始天尊传下。可日行数千里。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('37', '1', '五雷诀', null, '0', '0', '100', null, '似乎只对低级精怪起作用', null, null);
INSERT INTO `x2_biology_skill` VALUES ('38', '1', '三头六臂', null, '0', '0', '100', null, '九龙岛吕岳之术。心手摇动叁百六十骨节，霎时现出叁头六臂，一只手执形天印，一只手擎住瘟疫钟，一只手持定形瘟，一只手执住指瘟剑。罗宣亦会。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('39', '1', '脑后神手', null, '0', '0', '100', null, '一气仙马元之术', null, null);
INSERT INTO `x2_biology_skill` VALUES ('40', '1', '黑云犬', null, '0', '0', '100', null, '实名不详。顶上现一块黑云，云中现出一只犬来。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('41', '1', '丈六金身', null, '0', '0', '100', null, '现十八臂，二十四面，持璎珞，丝绦，降魔杵，金铃，金弓伞盖，宝锉，银戟，银旗等宝物。准提道人以之伏孔宣。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('42', '1', '替身法', null, '0', '0', '100', null, '佳梦关胡雷擅长', null, null);
INSERT INTO `x2_biology_skill` VALUES ('43', '1', '火龙兵', null, '0', '0', '100', null, '背后帖红纸葫芦，脚下画风火符印。火灵圣母之术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('44', '1', '邱引之术', null, '0', '0', '100', null, '顶上长一道白光，光中分开，面现出碗大一颗红珠，在空中滴溜溜只是转。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('45', '1', '一气化三清', null, '0', '0', '100', null, '老子一气化三清：上清（九云冠，大红白鹤绛绡衣，宝剑）、玉清（如意冠，淡黄八卦衣，天马，灵芝如意）、太清（九霄冠，八宝万寿紫霞衣，龙须扇，三宝玉如意，地师）', null, null);
INSERT INTO `x2_biology_skill` VALUES ('46', '1', '六魂幡', null, '0', '0', '100', null, '通天教主之术。草人，有六尾，上书人名。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('47', '1', '劈面雷', null, '0', '0', '100', null, '界牌关王豹之术。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('48', '1', '神烟术', null, '0', '0', '100', null, '穿云关马忠之术。口吐黑烟，遮掩四方。效用不明。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('49', '1', '痘疹', null, '0', '0', '100', null, '潼关余德之术。有青黄赤白黑五个手帕，可化五方云。五个小斗，内装毒痘。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('50', '1', '催魂捉魄', null, '0', '0', '100', null, '（实名不详）。姚宾之术。落魂阵内，一土台；设一香案，台上扎一草人，草人身上写姜尚的名字；草人头上点叁盏灯，足下点七盏灯，上叁盏名为催魂灯，下点七盏名为捉魂灯，姚天君披发仗剑，步罡念咒，於台前发符用印，於空中一日拜叁次。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('51', '1', '钉头七箭书', null, '0', '0', '100', null, '陆压邪术。设法坛，扎草人书名，头脚各一盏灯，踏罡步斗，每日三拜，于二十一日，以桑枝弓、桃枝箭射草人双目心口。人遂绝命。', null, null);
INSERT INTO `x2_biology_skill` VALUES ('52', '1', '指地成钢', null, '0', '0', '100', null, '惧留孙。专破地行术', null, null);

-- ----------------------------
-- Table structure for x2_biology_skill_use
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_skill_use`;
CREATE TABLE `x2_biology_skill_use` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL COMMENT '物品类型',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `value` int(11) DEFAULT NULL COMMENT '难度数值越大获得几率越小',
  `type` varchar(25) DEFAULT '1' COMMENT '技能类型 1进场 2 行动前3攻击4被攻击5频死 6回合结束 7攻击追加',
  `typeid` int(11) DEFAULT NULL,
  `chufa` varchar(25) DEFAULT '被动' COMMENT '分解类型  被动 主动',
  `chufaid` int(11) DEFAULT '1' COMMENT '1 主动 2 被动',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_skill_use
-- ----------------------------
INSERT INTO `x2_biology_skill_use` VALUES ('1', '属性叠加自身', '持续回合，增加自身', '1', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('2', '触发叠加自身', '持续回合，增加自身', '2', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('3', '生命叠加自身', '持续回合，增加自身', '3', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('4', '魔法叠加自身', '持续回合，增加自身', '4', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('5', '攻击叠加自身', '持续回合，增加自身', '5', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('6', '护甲叠加自身', '持续回合，增加自身', '6', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('7', '特攻叠加自身', '持续回合，增加自身', '7', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('8', '法抗叠加自身', '持续回合，增加自身', '8', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('9', '减伤叠加自身', '持续回合，增加自身', '9', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('10', '真伤叠加自身', '持续回合，增加自身', '10', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('11', '闪避叠加自身', '持续回合，增加自身', '11', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('12', '速度叠加自身', '持续回合，增加自身', '12', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('13', '暴击叠加自身', '持续回合，增加自身', '13', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('14', '属性叠加敌方', '持续回合，减少敌方', '14', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('15', '触发叠加敌方', '持续回合，减少敌方', '15', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('16', '生命叠加敌方', '持续回合，减少敌方', '16', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('17', '魔法叠加敌方', '持续回合，减少敌方', '17', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('18', '攻击叠加敌方', '持续回合，减少敌方', '18', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('19', '护甲叠加敌方', '持续回合，减少敌方', '19', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('20', '特攻叠加敌方', '持续回合，减少敌方', '20', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('21', '法抗叠加敌方', '持续回合，减少敌方', '21', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('22', '减伤叠加敌方', '持续回合，减少敌方', '22', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('23', '真伤叠加敌方', '持续回合，减少敌方', '23', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('24', '闪避叠加敌方', '持续回合，减少敌方', '24', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('25', '速度叠加敌方', '持续回合，减少敌方', '25', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('26', '暴击叠加敌方', '持续回合，减少敌方', '26', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('27', '特殊召唤', '特殊召唤单位，死亡不可复活,分身，坐骑，缘分', '27', '进场', '1', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('28', '属性叠加自身', '持续回合，增加自身', '1', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('29', '触发叠加自身', '持续回合，增加自身', '2', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('30', '生命叠加自身', '持续回合，增加自身', '3', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('31', '魔法叠加自身', '持续回合，增加自身', '4', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('32', '攻击叠加自身', '持续回合，增加自身', '5', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('33', '护甲叠加自身', '持续回合，增加自身', '6', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('34', '特攻叠加自身', '持续回合，增加自身', '7', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('35', '法抗叠加自身', '持续回合，增加自身', '8', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('36', '减伤叠加自身', '持续回合，增加自身', '9', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('37', '真伤叠加自身', '持续回合，增加自身', '10', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('38', '闪避叠加自身', '持续回合，增加自身', '11', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('39', '速度叠加自身', '持续回合，增加自身', '12', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('40', '暴击叠加自身', '持续回合，增加自身', '13', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('41', '清晰术', '移除效果', '28', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('42', '治疗生命', '恢复生命', '29', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('43', '治疗魔法', '恢复魔法', '30', '行动前', '2', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('44', '属性叠加自身', '持续回合，增加自身', '1', '攻击', '3', '主动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('45', '触发叠加自身', '持续回合，增加自身', '2', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('46', '生命叠加自身', '持续回合，增加自身', '3', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('47', '魔法叠加自身', '持续回合，增加自身', '4', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('48', '攻击叠加自身', '持续回合，增加自身', '5', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('49', '护甲叠加自身', '持续回合，增加自身', '6', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('50', '特攻叠加自身', '持续回合，增加自身', '7', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('51', '法抗叠加自身', '持续回合，增加自身', '8', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('52', '减伤叠加自身', '持续回合，增加自身', '9', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('53', '真伤叠加自身', '持续回合，增加自身', '10', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('54', '闪避叠加自身', '持续回合，增加自身', '11', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('55', '速度叠加自身', '持续回合，增加自身', '12', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('56', '暴击叠加自身', '持续回合，增加自身', '13', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('57', '属性叠加敌方', '持续回合，减少敌方', '14', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('58', '触发叠加敌方', '持续回合，减少敌方', '15', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('59', '生命叠加敌方', '持续回合，减少敌方', '16', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('60', '魔法叠加敌方', '持续回合，减少敌方', '17', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('61', '攻击叠加敌方', '持续回合，减少敌方', '18', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('62', '护甲叠加敌方', '持续回合，减少敌方', '19', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('63', '特攻叠加敌方', '持续回合，减少敌方', '20', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('64', '法抗叠加敌方', '持续回合，减少敌方', '21', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('65', '减伤叠加敌方', '持续回合，减少敌方', '22', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('66', '真伤叠加敌方', '持续回合，减少敌方', '23', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('67', '闪避叠加敌方', '持续回合，减少敌方', '24', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('68', '速度叠加敌方', '持续回合，减少敌方', '25', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('69', '暴击叠加敌方', '持续回合，减少敌方', '26', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('70', '清晰术', '移除效果', '28', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('71', '治疗生命', '治疗单位', '29', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('72', '治疗魔法', '治疗单位', '30', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('73', '控制', '持续回合，眩晕，禁锢，恐吓，冰冻，缠绕，跳过回合', '31', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('74', '复活友方', '复活友方', '32', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('75', '召唤单位', '召唤单位', '33', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('76', '中毒单位', '持续回合,持续伤害', '34', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('77', '法术伤害', '造成伤害', '35', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('78', '物理伤害', '造成伤害', '36', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('79', '真实伤害', '真实伤害，无视防御', '37', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('80', '无敌', '无视伤害， 金身自身不可行动', '40', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('81', '神圣', '无视闪避类，追魂，钉头七书等', '41', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('82', '复制', '复制，分身等', '42', '攻击', '3', '主动', '2');
INSERT INTO `x2_biology_skill_use` VALUES ('83', '属性叠加自身', '持续回合，增加自身', '1', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('84', '触发叠加自身', '持续回合，增加自身', '2', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('85', '生命叠加自身', '持续回合，增加自身', '3', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('86', '魔法叠加自身', '持续回合，增加自身', '4', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('87', '攻击叠加自身', '持续回合，增加自身', '5', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('88', '护甲叠加自身', '持续回合，增加自身', '6', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('89', '特攻叠加自身', '持续回合，增加自身', '7', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('90', '法抗叠加自身', '持续回合，增加自身', '8', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('91', '减伤叠加自身', '持续回合，增加自身', '9', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('92', '真伤叠加自身', '持续回合，增加自身', '10', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('93', '闪避叠加自身', '持续回合，增加自身', '11', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('94', '速度叠加自身', '持续回合，增加自身', '12', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('95', '暴击叠加自身', '持续回合，增加自身', '13', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('96', '属性叠加敌方', '持续回合，减少敌方', '14', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('97', '触发叠加敌方', '持续回合，减少敌方', '15', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('98', '生命叠加敌方', '持续回合，减少敌方', '16', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('99', '魔法叠加敌方', '持续回合，减少敌方', '17', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('100', '攻击叠加敌方', '持续回合，减少敌方', '18', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('101', '护甲叠加敌方', '持续回合，减少敌方', '19', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('102', '特攻叠加敌方', '持续回合，减少敌方', '20', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('103', '法抗叠加敌方', '持续回合，减少敌方', '21', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('104', '减伤叠加敌方', '持续回合，减少敌方', '22', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('105', '真伤叠加敌方', '持续回合，减少敌方', '23', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('106', '闪避叠加敌方', '持续回合，减少敌方', '24', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('107', '速度叠加敌方', '持续回合，减少敌方', '25', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('108', '暴击叠加敌方', '持续回合，减少敌方', '26', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('109', '治疗生命', '恢复生命', '29', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('110', '治疗魔法', '恢复魔法', '30', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('111', '控制单位', '持续回合，眩晕，禁锢，恐吓，冰冻，缠绕，跳过回合', '31', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('112', '复制', '复制，分身', '32', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('113', '召唤单位', '召唤单位', '33', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('114', '中毒单位', '持续回合,持续伤害', '34', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('115', '法术伤害', '造成伤害', '35', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('116', '物理伤害', '造成伤害', '36', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('117', '无敌', '无视伤害。', '40', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('118', '真实伤害', '真实伤害，无视防御', '37', '被攻击', '4', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('119', '属性叠加自身', '持续回合，增加自身', '1', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('120', '触发叠加自身', '持续回合，增加自身', '2', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('121', '生命叠加自身', '持续回合，增加自身', '3', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('122', '魔法叠加自身', '持续回合，增加自身', '4', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('123', '攻击叠加自身', '持续回合，增加自身', '5', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('124', '护甲叠加自身', '持续回合，增加自身', '6', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('125', '特攻叠加自身', '持续回合，增加自身', '7', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('126', '法抗叠加自身', '持续回合，增加自身', '8', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('127', '减伤叠加自身', '持续回合，增加自身', '9', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('128', '真伤叠加自身', '持续回合，增加自身', '10', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('129', '闪避叠加自身', '持续回合，增加自身', '11', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('130', '速度叠加自身', '持续回合，增加自身', '12', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('131', '暴击叠加自身', '持续回合，增加自身', '13', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('132', '属性叠加敌方', '持续回合，减少敌方', '14', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('133', '触发叠加敌方', '持续回合，减少敌方', '15', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('134', '生命叠加敌方', '持续回合，减少敌方', '16', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('135', '魔法叠加敌方', '持续回合，减少敌方', '17', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('136', '攻击叠加敌方', '持续回合，减少敌方', '18', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('137', '护甲叠加敌方', '持续回合，减少敌方', '19', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('138', '特攻叠加敌方', '持续回合，减少敌方', '20', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('139', '法抗叠加敌方', '持续回合，减少敌方', '21', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('140', '减伤叠加敌方', '持续回合，减少敌方', '22', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('141', '暴击叠加敌方', '持续回合，减少敌方', '23', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('142', '攻击叠加敌方', '持续回合，减少敌方', '24', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('143', '护甲叠加敌方', '持续回合，减少敌方', '25', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('144', '特攻叠加敌方', '持续回合，减少敌方', '26', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('145', '治疗生命', '恢复生命', '29', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('146', '治疗魔法', '恢复魔法', '30', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('147', '控制单位', '持续回合，眩晕，禁锢，恐吓，冰冻，缠绕，跳过回合', '31', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('148', '复活友方', '复活友方', '32', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('149', '召唤单位', '召唤单位', '33', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('150', '中毒单位', '持续回合,持续伤害', '34', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('151', '法术伤害', '造成伤害', '35', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('152', '物理伤害', '造成伤害', '36', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('153', '真实伤害', '真实伤害，无视防御', '37', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('154', '永恒', '永恒不死，满血和1血', '38', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('155', '复活自身', '复活自身', '39', '频死', '5', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('156', '清晰术', '移除效果', '28', '回合结束', '6', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('157', '治疗生命', '恢复生命', '29', '回合结束', '6', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('158', '治疗魔法', '恢复魔法', '30', '回合结束', '6', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('159', '召唤单位', '召唤单位，造成伤害，击杀', '33', '攻击追加', '7', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('160', '中毒单位', '持续回合', '34', '攻击追加', '7', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('161', '法术伤害', '造成伤害', '35', '攻击追加', '7', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('162', '物理伤害', '造成伤害', '36', '攻击追加', '7', '被动', '1');
INSERT INTO `x2_biology_skill_use` VALUES ('163', '真实伤害', '真实伤害，无视防御', '37', '攻击追加', '7', '被动', '1');

-- ----------------------------
-- Table structure for x2_biology_state
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_state`;
CREATE TABLE `x2_biology_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT '0' COMMENT '总共14000属性 200级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_state
-- ----------------------------
INSERT INTO `x2_biology_state` VALUES ('1', '凡人', null, '0');
INSERT INTO `x2_biology_state` VALUES ('2', '武师', null, '20');
INSERT INTO `x2_biology_state` VALUES ('3', '宗师', null, '40');
INSERT INTO `x2_biology_state` VALUES ('4', '先天', null, '60');
INSERT INTO `x2_biology_state` VALUES ('5', '金丹', null, '80');
INSERT INTO `x2_biology_state` VALUES ('6', '元婴', null, '100');
INSERT INTO `x2_biology_state` VALUES ('7', '化神', null, '120');
INSERT INTO `x2_biology_state` VALUES ('8', '渡劫', null, '140');
INSERT INTO `x2_biology_state` VALUES ('9', '大乘', null, '160');
INSERT INTO `x2_biology_state` VALUES ('10', '地仙', null, '180');
INSERT INTO `x2_biology_state` VALUES ('11', '天仙', null, '200');
INSERT INTO `x2_biology_state` VALUES ('12', '金仙', null, '220');
INSERT INTO `x2_biology_state` VALUES ('13', '玄仙', null, '240');
INSERT INTO `x2_biology_state` VALUES ('14', '仙君', null, '260');
INSERT INTO `x2_biology_state` VALUES ('15', '仙尊', null, '280');
INSERT INTO `x2_biology_state` VALUES ('16', '仙帝', null, '300');
INSERT INTO `x2_biology_state` VALUES ('17', '准圣', null, '320');
INSERT INTO `x2_biology_state` VALUES ('18', '圣人', null, '340');
INSERT INTO `x2_biology_state` VALUES ('19', '天道', null, '360');
INSERT INTO `x2_biology_state` VALUES ('20', '混元', null, '380');

-- ----------------------------
-- Table structure for x2_biology_use
-- ----------------------------
DROP TABLE IF EXISTS `x2_biology_use`;
CREATE TABLE `x2_biology_use` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '消耗物品',
  `name` varchar(11) DEFAULT NULL COMMENT '物品类型',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `value` int(11) DEFAULT NULL COMMENT '难度数值越大获得几率越小',
  `type` varchar(25) DEFAULT '1' COMMENT '技能类型 1进场 2 行动前3攻击4被攻击5频死 6回合结束 7攻击追加',
  `typeid` int(11) DEFAULT NULL,
  `chufa` varchar(25) DEFAULT '被动' COMMENT '分解类型  被动 主动',
  `chufaid` int(11) DEFAULT '1' COMMENT '1 主动 2 被动',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_use
-- ----------------------------
INSERT INTO `x2_biology_use` VALUES ('1', '属性叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('2', '触发叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('3', '生命叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('4', '魔法叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('5', '攻击叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('6', '护甲叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('7', '特攻叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('8', '法抗叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('9', '减伤叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('10', '真伤叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('11', '闪避叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('12', '速度叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('13', '暴击叠加自身', '持续回合，增加自身', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('14', '属性叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('15', '触发叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('16', '生命叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('17', '魔法叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('18', '攻击叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('19', '护甲叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('20', '特攻叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('21', '法抗叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('22', '减伤叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('23', '真伤叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('24', '闪避叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('25', '速度叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('26', '暴击叠加敌方', '持续回合，减少敌方', null, '属性', '1', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('27', '特殊召唤', '特殊召唤单位，死亡不可复活,分身，坐骑，缘分', null, '单位', '3', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('28', '清晰术', '移除效果', null, '效果', '6', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('29', '治疗生命', '恢复生命', null, '效果', '6', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('30', '治疗魔法', '恢复魔法', null, '效果', '6', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('31', '控制单位', '持续回合，眩晕，禁锢，恐吓，冰冻，缠绕，跳过回合', null, '状态', '5', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('32', '复活友方', '复活友方', null, '复活', '2', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('33', '召唤单位', '召唤单位，造成伤害，击杀', null, '单位', '3', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('34', '中毒单位', '持续回合,持续伤害', null, '状态', '5', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('35', '法术伤害', '造成伤害', null, '伤害', '4', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('36', '物理伤害', '造成伤害', null, '伤害', '4', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('37', '真实伤害', '真实伤害，无视防御', null, '伤害', '4', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('38', '永恒', '永恒不死，满血和1血', null, '复活', '2', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('39', '复活自身', '复活自身', null, '复活', '2', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('40', '无敌', '免疫任何伤害', null, '效果', '6', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('41', '神圣', '无视闪避类', null, '效果', '6', '被动', '1');
INSERT INTO `x2_biology_use` VALUES ('42', '复制', '复制，分身', null, '单位', '3', '被动', '1');

-- ----------------------------
-- Table structure for x2_goods_danyao
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_danyao`;
CREATE TABLE `x2_goods_danyao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '丹药表 嗑药最多100',
  `type` int(11) DEFAULT NULL COMMENT '参考属性加成表1幸运2境界',
  `name` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT '0' COMMENT '基础白值属性',
  `percent` int(11) DEFAULT '10' COMMENT '百分比10-100 人(白 绿 蓝 紫 金 红 橙) 鬼仙神（彩）',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `dandu` int(11) DEFAULT '10' COMMENT '丹毒数 =等级    每个品质=丹毒*百分比',
  `tilian` int(11) DEFAULT '0' COMMENT '提炼',
  `jinBi` int(11) DEFAULT '100' COMMENT '金币',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_danyao
-- ----------------------------
INSERT INTO `x2_goods_danyao` VALUES ('1', '1', '天运丹', null, '10', '10', '截命运之力炼制而成，服之可增加幸运值。', '50', '100', null);
INSERT INTO `x2_goods_danyao` VALUES ('2', '1', '蜕凡丹', '', '100', '10', '一种可以增强体质的丹药。', '10', '100', null);
INSERT INTO `x2_goods_danyao` VALUES ('3', '11', '生生丹', null, '1000', '10', '传说可以增加寿命100年的丹药。', '10', '100', null);
INSERT INTO `x2_goods_danyao` VALUES ('4', '11', '人生果', null, '10000', '10', '三千一开花，三千年一结果，服之可增寿5000年', '100', '100', null);

-- ----------------------------
-- Table structure for x2_goods_nature
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_nature`;
CREATE TABLE `x2_goods_nature` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物品属性表',
  `goodsid` int(11) DEFAULT NULL COMMENT '物品id',
  `name` varchar(255) DEFAULT NULL COMMENT '物品名称',
  `natureName` varchar(255) DEFAULT NULL COMMENT '属性名称',
  `natureid` int(11) DEFAULT NULL COMMENT '属性id',
  `value` int(11) DEFAULT '0' COMMENT '用户属性在百分比区间',
  `type` int(11) DEFAULT '1' COMMENT '物品类型  1主属性  2附加属性  3特殊属性',
  `userid` int(11) DEFAULT '0' COMMENT '用户id',
  `percent` int(11) DEFAULT '10' COMMENT '百分比区间最大值为物品表品质区间 1-10  残破 劣质 普通 良好 优质  极品 稀有 完美 传说 神话',
  `status` int(3) DEFAULT '0' COMMENT '属性 状态是否激活0未使用 1使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_nature
-- ----------------------------
INSERT INTO `x2_goods_nature` VALUES ('1', '1', '戮仙剑', '攻击', '13', '10000', '1', '0', '10', '0');
INSERT INTO `x2_goods_nature` VALUES ('2', '1', '戮仙剑', '护甲', '14', '10000', '1', '0', '10', '0');
INSERT INTO `x2_goods_nature` VALUES ('3', '1', '戮仙剑', '幸运', '1', '10', '2', '0', '10', '0');
INSERT INTO `x2_goods_nature` VALUES ('4', '1', '天运丹', '幸运', '1', '10', '2', '0', '10', '0');

-- ----------------------------
-- Table structure for x2_goods_store
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_store`;
CREATE TABLE `x2_goods_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '消耗物品 单位为1',
  `name` varchar(11) DEFAULT NULL COMMENT '物品类型',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `value` int(11) DEFAULT NULL COMMENT '难度数值越大获得几率越小',
  `price` int(11) DEFAULT '0' COMMENT '估价',
  `type` int(11) DEFAULT '1' COMMENT '购买类型 1金币 2 灵石 3特殊',
  `sellout` int(11) DEFAULT '0' COMMENT '卖出价格',
  `gooduse` int(11) DEFAULT NULL COMMENT '物品类型id',
  `usetype` int(11) DEFAULT '1' COMMENT '使用类型1材料 2使用 3合成',
  `percent` varchar(255) DEFAULT '普通' COMMENT ' 残破 劣质 普通 良好 优质 稀有 极品 完美 传说 神话',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_store
-- ----------------------------
INSERT INTO `x2_goods_store` VALUES ('1', '木箱', '开出1-6境界武器、技能或者丹药。', '1000', '50', '2', '5000', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('2', '铁箱', '开出2-8境界武器、技能或者丹药。', '500', '80', '2', '8000', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('3', '银箱', '开出6-12境界武器、技能或者丹药。', '100', '200', '2', '20000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('4', '金箱', '开出8-16境界武器、技能或者丹药。', '50', '800', '2', '80000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('5', '玉盒', '开出12-18境界武器、技能或者丹药。', '20', '2400', '2', '240000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('6', '仙盒', '开出16-20境界武器、技能或者丹药。', '2', '5000', '2', '500000', '8', '2', '神话');
INSERT INTO `x2_goods_store` VALUES ('7', '人仙令', '召唤令，人族生物', '500', '10000', '1', '5000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('11', '魔仙令', '召唤令，魔族生物', '500', '16000', '1', '8000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('8', '妖仙令', '召唤令，妖族生物', '500', '16000', '1', '8000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('9', '鬼仙令', '召唤令，鬼族生物', '500', '16000', '1', '8000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('10', '仙神令', '召唤令，仙族生物', '500', '16000', '1', '8000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('12', '兽仙令', '召唤令，兽族生物', '500', '16000', '1', '8000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('13', '灵仙令', '召唤令，灵族生物', '500', '24000', '1', '12000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('14', '异仙令', '召唤令，异族生物', '500', '30000', '1', '15000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('15', '万仙令', '随机召唤令，人妖鬼神魔兽灵异。', '200', '20000', '1', '10000', '11', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('16', '神魔令', '特殊召唤随机世界生物', '10', '998', '1', '99800', '11', '2', '神话');
INSERT INTO `x2_goods_store` VALUES ('17', '精魄', '生物精魄，消耗100精魄可随机合成万仙令，生物分解可获得相应评分的精魄。1000金币=1精魄', '2000', '0', '1', '100', '8', '3', '普通');
INSERT INTO `x2_goods_store` VALUES ('18', '灵药', '草木精华，可用于炼丹强化。丹药分解可获得相应评分的灵药。3000金币=1灵药', '2000', '0', '1', '300', '8', '3', '普通');
INSERT INTO `x2_goods_store` VALUES ('19', '铁精', '锻冶之精华，可用于炼器强化。武器分解可获得相应评分的铁精。2000金币=1铁精', '2000', '0', '1', '200', '8', '3', '普通');
INSERT INTO `x2_goods_store` VALUES ('20', '元神', '随机生物元神，附带生物技能。', '100', '126', '2', '12600', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('21', '朱果', '刷新生物属性，凤凰血而生，服用后有脱胎换骨的功效。', '1000', '10', '2', '1000', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('22', '星辰石', '武器洗炼', '1000', '10', '2', '1000', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('23', '生生不熄', '体力值+20', '1000', '10000', '1', '1000', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('24', '传送石', '随机秘境，对应世界，生物难度。9个标记，可能物品，可能战斗，可能空，可组队，全部死亡退出场景。', '100', '488', '2', '48800', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('25', '本源之力', '本源之力，用于主角突破自身境界。', '100', '30000', '1', '15000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('26', '三生石', '生物缘分刷新', '200', '20000', '1', '10000', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('27', '功法玉简', '获得随机技能书一本', '200', '98', '2', '9800', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('28', '忘情水', '修改角色名称。', '200', '288', '2', '28800', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('29', '破界符', '强制掠夺，胜利可以获得对方10%金币。', '100', '100', '2', '10000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('30', '符石', '使用可获随机获得符石。', '300', '126', '2', '3600', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('31', '彩虹泪', '可改变异形颜色', '100', '168', '1', '16800', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('32', '神石', '20神石可合成神魔令，特殊召唤随机世界生物', '100', '50', '2', '5000', '8', '3', '传说');
INSERT INTO `x2_goods_store` VALUES ('33', '鸿蒙紫气', '服用鸿蒙紫气，方挑战圣境。', '1', '9999', '2', '999900', '8', '2', '神话');
INSERT INTO `x2_goods_store` VALUES ('34', '盘古石', '服用后，可学习任意种族技能一次。', '5', '4820', '2', '482000', '8', '2', '神话');
INSERT INTO `x2_goods_store` VALUES ('35', '孟婆汤', '生物转生，重塑肉身，不保留境界。', '1000', '30000', '1', '3000', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('36', '潜能', '随机学习生物天生技能', '60', '360', '2', '36000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('37', '技能绑定石', '绑定技能。', '100', '200000', '1', '20000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('38', '阵法石', '使用后获得随机阵法', '50', '780000', '1', '78000', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('39', '道果', '生物使用后，三围增加50', '300', '666', '2', '66600', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('40', '仙魔石', '可以使人性情大变，刷新生物性格', '500', '20', '2', '2000', '8', '2', '完美');
INSERT INTO `x2_goods_store` VALUES ('41', '藏宝图', '九宫格，每次挖掘消耗藏宝图+1', '1000', '4000', '1', '800', '8', '2', '稀有');
INSERT INTO `x2_goods_store` VALUES ('42', '契约仙果', '使用后无法融合，无法交易，成长+1，异形+2', '80', '999999', '1', '999999', '8', '2', '传说');
INSERT INTO `x2_goods_store` VALUES ('43', '仙炼石', '可以仙炼武器', '10', '0', '1', '0', null, '1', '神话');
INSERT INTO `x2_goods_store` VALUES ('44', '妖炼石', '可以妖炼武器', '10', '0', '1', '0', null, '1', '神话');
INSERT INTO `x2_goods_store` VALUES ('45', '神炼石', '可以神炼武器', '10', '0', '1', '0', null, '1', '神话');
INSERT INTO `x2_goods_store` VALUES ('46', '何首乌', '普通药材', '2000', '0', '1', '600', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('51', '千年人参', '千年人参，有极大的药效。', '1000', '0', '1', '2000', null, '1', '稀有');
INSERT INTO `x2_goods_store` VALUES ('47', '金币', '金币堆，可以卖钱。', '2000', '0', '1', '100', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('48', '灵石', '灵石堆，可以卖钱。', '2000', '0', '1', '500', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('49', '金矿', '发现金矿，可以卖钱。', '1000', '0', '1', '1000', null, '1', '稀有');
INSERT INTO `x2_goods_store` VALUES ('50', '灵脉', '发现灵脉，可以卖钱。', '1000', '0', '1', '3000', null, '1', '稀有');
INSERT INTO `x2_goods_store` VALUES ('52', '百年人参', '百年人参，药效较低。', '2000', '0', '1', '800', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('53', '雕像', '一个残破的雕像。', '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('54', '玉镯', '一块古玉。', '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('55', '地契', null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('56', '夜明珠', null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('57', '琉璃盏', null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('58', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('59', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('60', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('61', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('62', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('63', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('64', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('65', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('66', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('67', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('68', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('69', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('70', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('71', null, null, '2000', '0', '1', '0', null, '1', '普通');
INSERT INTO `x2_goods_store` VALUES ('72', null, null, '2000', '0', '1', '0', null, '1', '普通');

-- ----------------------------
-- Table structure for x2_goods_use
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_use`;
CREATE TABLE `x2_goods_use` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '消耗物品',
  `name` varchar(11) DEFAULT NULL COMMENT '物品类型',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `value` int(11) DEFAULT NULL COMMENT '难度数值越大获得几率越小',
  `type` int(11) DEFAULT '1' COMMENT '购买类型 1武器 2 丹药 3道具  4生物',
  `fenjie` varchar(25) DEFAULT '普通' COMMENT '分解类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_use
-- ----------------------------
INSERT INTO `x2_goods_use` VALUES ('9', '性格', '获得性格。', '100', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('10', '秘境', '对应世界，生物难度。9个标记，可能物品，可能战斗，可能空，全部死亡退出场景。', '60', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('11', '阵法', '使用后布置阵法。', '30', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('8', '消耗物品', '使用的消耗物品。', '600', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('7', '元神', '生物元神，附带生物技能，生物献祭5%概率获得元神。可以融合，最多保留2个技能', '100', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('6', '符石', '用于神器刻画符文。', '100', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('2', '丹药', '丹药类型，对生物使用获得特殊效果。', '1000', '2', '灵药');
INSERT INTO `x2_goods_use` VALUES ('3', '缘分', '缘分类型。', '300', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('4', '普通材料', '普通的使用材料，可以卖钱。', '5000', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('5', '灵石材料', '普通的使用材料，可以卖灵石。', '20', '3', '普通');
INSERT INTO `x2_goods_use` VALUES ('12', '技能书', '使用后生物获得的技能。', '400', '4', '普通');
INSERT INTO `x2_goods_use` VALUES ('1', '武器', '\n\n\n\n获得武器。 普通 良好 优质 稀有 极品 完美 传说 神话', '2000', '1', '铁精');
INSERT INTO `x2_goods_use` VALUES ('13', '生物', '获得生物。', '200', '5', '精魄');
INSERT INTO `x2_goods_use` VALUES ('14', '神物', '获得神物，放在背包内有特殊加成。', '10', '3', '普通');

-- ----------------------------
-- Table structure for x2_goods_wuqi
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_wuqi`;
CREATE TABLE `x2_goods_wuqi` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '武器表',
  `name` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT '1' COMMENT 'type 1可用 2不可用',
  `point` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT '0' COMMENT '基础白值属性',
  `percent` int(11) DEFAULT '10' COMMENT '百分比10-100 人(白 绿 蓝 紫 金 红 橙) 鬼仙神（彩） 1-10 分5品不可洗练',
  `describe` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT '0' COMMENT '属性条数 最多9条',
  `belong` int(11) DEFAULT '0' COMMENT '有id标识 说明 可以合成',
  `tilian` int(11) DEFAULT '0' COMMENT '提炼--铁之精华  根据品质提炼',
  `grade` int(11) DEFAULT '1' COMMENT '境界  境界随着主角修为增加 1-20',
  `wordId` int(11) DEFAULT '0' COMMENT '世界id  0不属于任何世界的特殊物品',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_wuqi
-- ----------------------------
INSERT INTO `x2_goods_wuqi` VALUES ('1', '戮仙剑', '2', null, '10', '70', '诛仙套装之一戮仙剑', '5', '5', '100', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('2', '诛仙剑', '2', null, '10', '70', '诛仙套装之一诛仙剑', '5', '5', '100', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('3', '陷仙剑', '2', null, '10', '70', '诛仙套装之一陷仙剑', '5', '5', '100', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('4', '绝仙剑', '2', null, '10', '70', '诛仙套装之一绝仙剑', '5', '5', '100', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('5', '诛仙剑阵', '2', '', '1', '80', '诛仙剑阵，由戮仙剑，诛仙剑，绝仙剑，陷仙剑组，诛仙阵图成。', '6', '5', '100', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('6', '盘古斧', '2', '', '1', '80', '盘古开天神器，盘古牙齿所化。', '6', '0', '500', '1', '0');
INSERT INTO `x2_goods_wuqi` VALUES ('7', '匕首', '1', null, '2000', '10', '一把普通的匕首，没什么大用处。', '0', '0', '1', '1', '1');
INSERT INTO `x2_goods_wuqi` VALUES ('8', '承影', '1', '', '2000', '20', '上古十大名剑之一。', '1', '0', '20', '1', '1');
INSERT INTO `x2_goods_wuqi` VALUES ('9', '铁剑', '1', '', '2000', '20', '普通铁剑，没什么大用处。', '1', '0', '40', '1', '1');
INSERT INTO `x2_goods_wuqi` VALUES ('10', '钢刀', '1', '', '2000', '20', '普通铁剑，没什么大用处。', '1', '0', '60', '1', '1');
INSERT INTO `x2_goods_wuqi` VALUES ('11', '玄铁重剑', '1', null, '2000', '10', '玄铁重剑，重达4万万斤，由千年玄铁打造而成。', '0', '0', '0', '1', '0');

-- ----------------------------
-- Table structure for x2_goods_zhenfa
-- ----------------------------
DROP TABLE IF EXISTS `x2_goods_zhenfa`;
CREATE TABLE `x2_goods_zhenfa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_goods_zhenfa
-- ----------------------------
INSERT INTO `x2_goods_zhenfa` VALUES ('1', '万仙阵', null, '通天门下弟子，由通天教主和他座下四大弟子主持。');
INSERT INTO `x2_goods_zhenfa` VALUES ('2', '诛仙阵', '', '以诛仙四仙剑布阵，有诛仙阵图，和四仙剑，通天教主传多宝道人。');
INSERT INTO `x2_goods_zhenfa` VALUES ('3', '四象阵', null, '金光仙（金毛吼');
INSERT INTO `x2_goods_zhenfa` VALUES ('4', '三才阵', null, '天地人三才组成。');
INSERT INTO `x2_goods_zhenfa` VALUES ('5', '太极阵', '', '乌云仙（长须黑面，皂服丝绦，混元锤，金须鳌鱼），青首仙（青毛狮子）');
INSERT INTO `x2_goods_zhenfa` VALUES ('6', '八卦阵', null, '太极生两仪，两仪生四相，四相生八卦，八卦而变六十四爻，从此周而复始变化无穷。');
INSERT INTO `x2_goods_zhenfa` VALUES ('7', '十二都天门阵', null, '十二祖巫组成。');
INSERT INTO `x2_goods_zhenfa` VALUES ('8', '北斗七星阵', null, '道教一元、两仪、三才、四相、五行、六合、七星、八卦、九宫的流变规律');
INSERT INTO `x2_goods_zhenfa` VALUES ('9', '周天星斗大阵', null, '巫妖大战时，\r\n三百六十五位大妖所布置。');
INSERT INTO `x2_goods_zhenfa` VALUES ('10', '九曲黄河阵', null, '云霄。内按叁才，包藏天地之妙，中有惑仙丹闭仙诀，能失仙之神，消仙之魄，陷仙之形，损仙之气，丧神仙之原本，捐神仙之肢体。神仙入此成凡人，凡人入此即绝命。九曲曲中无直，曲尽造化之奇，抉尽神仙之基，任他叁教圣人，遭此亦难逃脱。');
INSERT INTO `x2_goods_zhenfa` VALUES ('11', '混元河洛大阵', null, '阵眼为河图，洛书。');
INSERT INTO `x2_goods_zhenfa` VALUES ('12', '罗汉阵', null, '佛门阵法。');
INSERT INTO `x2_goods_zhenfa` VALUES ('13', '十绝阵', null, '由十天君主持的十个小阵组成。');
INSERT INTO `x2_goods_zhenfa` VALUES ('14', '秦天君天绝阵', null, '演先天之数，得先天清气；内藏混沌之机，中有三首幡，按天地人三才，共合为一气。若人入此阵内，有雷鸣之处，化作灰尘；仙道若逢此处，肢体震为粉碎，故曰“天绝阵”。');
INSERT INTO `x2_goods_zhenfa` VALUES ('15', '赵天君地烈阵', null, '烈成分浊厚，上雷下火太无情；就是五行乾健体，难逃骨化与形倾。');
INSERT INTO `x2_goods_zhenfa` VALUES ('16', '董天君风吼阵', null, '按地水火风之数，内有风火，此风火乃先天之气，叁昧真火，百万兵刃，从中而出。若神仙进此阵，风火交作，万刃齐攒，四肢立成齑粉；怕他有倒海移山之异术，难免身体化成脓血。（八角鹿，太阿双剑）');
INSERT INTO `x2_goods_zhenfa` VALUES ('17', '袁天君寒冰阵', null, '名为寒水，实为刀山；内藏玄妙，中有风雷，上有冰山如狼牙，下有冰块如刀剑。若神仙入此阵，风雷动处，上下一磕，四肢立成齑粉，纵有异术，离免此难。');
INSERT INTO `x2_goods_zhenfa` VALUES ('18', '金光圣母金光阵', null, '夺日月之精，藏天地之气，中有二十一面宝镜，用二十一根杆，每一面应在杆顶上，一镜上有一套。若人仙入阵，将此套拽起，雷声震动镜子，只一二转，金光射出，照住其身，立刻化为浓血，纵会飞腾，难越此阵。');
INSERT INTO `x2_goods_zhenfa` VALUES ('19', '孙天君化血阵', null, '用先天灵气，中有风雷，内藏数斗黑沙。但神仙入阵，雷响处风卷黑沙，些须着处，立化血水，纵是神仙难逃利害。');
INSERT INTO `x2_goods_zhenfa` VALUES ('20', '白天君烈阵', null, '妙用无穷，非同凡品：内藏叁火，有叁昧火，空中火，石中火，叁火并为一气；中有叁首红，若神仙进此阵内，叁展动，叁火齐飞，须火成为灰烬，纵有避火真言，难躲叁昧真火。');
INSERT INTO `x2_goods_zhenfa` VALUES ('21', '姚天君落魂阵', null, '闭生门，开死户，中藏天地厉气，结聚而成；内有白纸一首，上画符印，若神仙入阵内，白旌展动，魂魄消散，倾刻而灭，不论神仙，随入随灭。');
INSERT INTO `x2_goods_zhenfa` VALUES ('23', '王天君红水阵', null, '夺壬癸之精，藏太乙之妙，变幻莫测；中有一八卦台，上有一二个葫芦，任随人仙入阵，将葫芦往下一掷，倾出红水，汪洋无际。若是水溅出一点，黏在身上，顷刻化为血水，纵是神仙，无术可逃。');
INSERT INTO `x2_goods_zhenfa` VALUES ('22', '张天君红沙阵', null, '内按天地人叁寸，中分叁气，内藏红砂叁斗，看似红砂，着身利刃，上不知天，下不知地，中不知人；若人仙冲入此阵，风雷运处，飞砂伤人，立刻骸鼻俱成齑粉，纵有神仙佛祖遭此，再不能逃。');
INSERT INTO `x2_goods_zhenfa` VALUES ('24', '两仪阵', null, '灵牙仙（白象）');
INSERT INTO `x2_goods_zhenfa` VALUES ('25', '瘟癀阵', null, '九龙岛吕岳、陈庚。二十一把瘟癀伞，按九宫八卦排列，中有土台。');
INSERT INTO `x2_goods_zhenfa` VALUES ('26', '血河大阵', null, '冥河老祖以十万八千辆血河车所布置。');
INSERT INTO `x2_goods_zhenfa` VALUES ('27', '两仪微尘大阵', null, '老子以混元一气太清神符布置。');
INSERT INTO `x2_goods_zhenfa` VALUES ('28', '先天五方大阵', null, '由素色云界旗，青莲宝色旗，玄元控水旗，离地焰光旗，玉虚杏黄旗布置');
INSERT INTO `x2_goods_zhenfa` VALUES ('29', '大须弥正反九宫仙阵', null, '由九把九宫剑布置而成，在蜀山里仅次于两仪微尘大阵');

-- ----------------------------
-- Table structure for x2_user
-- ----------------------------
DROP TABLE IF EXISTS `x2_user`;
CREATE TABLE `x2_user` (
  `userid` int(11) NOT NULL COMMENT '用户userid',
  `occupation` int(2) DEFAULT '1' COMMENT '职业 1炼器2 寻道 3炼魂 4炼丹 5炼体',
  `vip` int(2) DEFAULT '0' COMMENT 'vip等级',
  `grade` int(11) DEFAULT '1' COMMENT '等级',
  `state` int(11) DEFAULT '1' COMMENT '境界 1-20',
  `biologyknow` int(11) DEFAULT '0' COMMENT '生物图鉴数',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user
-- ----------------------------
INSERT INTO `x2_user` VALUES ('1', '3', '10', '1', '3', '100');

-- ----------------------------
-- Table structure for x2_user_biology
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology`;
CREATE TABLE `x2_user_biology` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户生物强化表',
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
  `maxNature` int(11) DEFAULT '0' COMMENT '自由属性点',
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
  `minPower` int(11) DEFAULT '10' COMMENT '最小力量',
  `minAgile` int(11) DEFAULT '10',
  `minIntelligence` int(11) DEFAULT '10' COMMENT '最小力量',
  `userid` int(11) DEFAULT '1' COMMENT '模型创建所属人 1 管理员',
  `createid` int(11) DEFAULT '0' COMMENT '生物创造id',
  `percent` float(11,0) DEFAULT '0' COMMENT '经验条(单独增加）',
  `xiXue` int(11) DEFAULT '0' COMMENT '吸血',
  `shenFen` int(3) DEFAULT '1' COMMENT '身份 1普通  2精英   3头目  4主角   5命运',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology
-- ----------------------------
INSERT INTO `x2_user_biology` VALUES ('33', '黄麒英', '1', '1', '1', '456', '53', '86', '57', '89', '58', '112', '0', '0', '0', '1', '3', '1', '4', '25', '19', '15', '18', '1086', '82', '7', '7,11,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '167', '86', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '10', '14', '8', '1', '48', '0', '0', '1');

-- ----------------------------
-- Table structure for x2_user_biology_attribute
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_biology_attribute`;
CREATE TABLE `x2_user_biology_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '战斗属性表',
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
-- Table structure for x2_user_goods_nature
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_goods_nature`;
CREATE TABLE `x2_user_goods_nature` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物品属性表 附加属性',
  `goodsid` int(11) DEFAULT NULL COMMENT '物品id',
  `name` varchar(255) DEFAULT NULL,
  `natureName` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT '0' COMMENT '用户属性在百分比区间',
  `natureid` int(11) DEFAULT NULL COMMENT '属性id',
  `type` int(11) DEFAULT '1' COMMENT '物品类型  1 白值  2附加属性',
  `userid` int(11) DEFAULT '0' COMMENT '用户id',
  `percent` int(11) DEFAULT '1' COMMENT '百分比区间最大值为物品表品质区间 1-10',
  `status` int(3) DEFAULT '0' COMMENT '属性 状态是否激活0未使用 1使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_goods_nature
-- ----------------------------
INSERT INTO `x2_user_goods_nature` VALUES ('1', '1', '戮仙剑', '攻击', '10000', '13', '1', '1', '1', '0');
INSERT INTO `x2_user_goods_nature` VALUES ('2', '1', '戮仙剑', '护甲', '10000', '14', '1', '1', '1', '0');
INSERT INTO `x2_user_goods_nature` VALUES ('3', '1', '天运丹', '幸运', '10', '1', '2', '1', '1', '0');

-- ----------------------------
-- Table structure for x2_user_handbook
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_handbook`;
CREATE TABLE `x2_user_handbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图鉴表',
  `biologyid` int(11) DEFAULT NULL COMMENT '图鉴id',
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_handbook
-- ----------------------------
INSERT INTO `x2_user_handbook` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for x2_user_packet
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_packet`;
CREATE TABLE `x2_user_packet` (
  `id` int(11) DEFAULT NULL COMMENT '用户背包',
  `type` int(11) DEFAULT '1' COMMENT '1武器 2丹药 3技能 4消耗品 5材料'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_packet
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_words
-- ----------------------------
INSERT INTO `x2_user_words` VALUES ('1', '100', '1', '1', '1');
INSERT INTO `x2_user_words` VALUES ('2', '100', '2', '1', '1');
INSERT INTO `x2_user_words` VALUES ('3', '100', '3', '1', '1');

-- ----------------------------
-- Table structure for x2_words
-- ----------------------------
DROP TABLE IF EXISTS `x2_words`;
CREATE TABLE `x2_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '世界表',
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `type` int(11) DEFAULT '1' COMMENT '世界等级',
  `music` varchar(255) DEFAULT NULL COMMENT '背景音乐',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `difficult` int(255) DEFAULT '1' COMMENT '相对当前世界难度',
  `typeName` varchar(255) DEFAULT NULL COMMENT '世界等级名称',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `down` varchar(255) DEFAULT NULL COMMENT '掉落',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_words
-- ----------------------------
INSERT INTO `x2_words` VALUES ('1', '武林', '1', null, null, '1', '低武世界', '历史近代人物。', null);
INSERT INTO `x2_words` VALUES ('2', '大汉天下', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('3', '隋唐英雄传', '1', null, null, '2', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('4', '群魔乱舞', '1', null, null, '2', '低武世界', '来源于小说，水浒传为世界背景，以天师教道统为主，人物实力较高。', null);
INSERT INTO `x2_words` VALUES ('5', '蝶舞天涯', '1', null, null, '3', '低武世界', '来源于电视剧，吕布与貂蝉为主线人物，原定名《三国传说》。', null);
INSERT INTO `x2_words` VALUES ('6', '寻情记', '1', null, null, '4', '低武世界', '《三官经》：《太上三元赐福赦罪解厄消灾延生保命妙经》也作《三官经》或《三官感应妙经》。三官，指天、地、水三官大帝。转诵此经至满千遍，大作踊跃；悔过愆尤，断恶修善,即能除无妄之灾，解有仇之愆；赐千祥之福，脱九厄之难，离三途之苦。', '《三官经》');
INSERT INTO `x2_words` VALUES ('7', '鹿鼎记', '1', null, null, '5', '低武世界', null, null);
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
INSERT INTO `x2_words` VALUES ('37', ' 连城诀', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('38', '功夫', '1', null, null, '1', '低武世界', null, null);
INSERT INTO `x2_words` VALUES ('39', '太极张三丰', '1', null, null, '1', '低武世界', null, null);
