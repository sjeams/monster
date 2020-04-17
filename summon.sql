/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : summon

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-04-17 18:50:27
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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台管理', '', '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '生物系统', '测试s', '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', '', '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', '', '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '生物模板', '', '/admin/biology/index', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('6', '2', '', '生物创造', '', '/admin/biology-create/index', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('40', '0', 'app', 'APP管理', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('41', '0', 'user', '用户管理', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '生物管理', '', '/admin/user-biology/index', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '世界管理', '', '/layuimini/page/setting.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '技能管理', '反倒是', '/layuimini/page/table.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('48', '1', '', '物品管理', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('49', '48', '', '武器管理', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('50', '2', '', '性格管理 ', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', '', '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', '', '/layuimini/page/login-1.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', null, '/layuimini/page/login-2.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', null, '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', '', '/layuimini/page/404.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', null, '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', null, '/layuimini/page/button.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', null, '/layuimini/page/layer.html\"', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', null, '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', null, '/layuimini/page/icon.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', null, '/layuimini/page/icon-picker.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', null, '/layuimini/page/color-select.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', null, '/layuimini/page/table-select.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', '', '/layuimini/page/upload.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', '', '/layuimini/page/editor.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', null, '', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', null, '/layuimini/page/button.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('31', '29', '', '按钮2', null, '/layuimini/page/button.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('32', '29', '', '按钮3', null, '/layuimini/page/button.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('33', '29', '', '表单4', null, '/layuimini/page/form.html', '1586831917', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('45', '0', 'order', '商城', '', '', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');
INSERT INTO `x2_admin_init` VALUES ('43', '41', 'cc', 'cc', '', 'cc', '1586831917', '<input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/> <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology
-- ----------------------------
INSERT INTO `x2_biology` VALUES ('1', '王隐林', '1', '1', '1', '608', '60', '87', '30', '88', '31', '114', '6', '0', '0', '1', '3', '1', '0', '23', '1097', '94', '8', '6', '0', '0', '4', '侠家拳王隐林，广东南拳之大侠李胡子从四川云游到广东在肇庆鼎湖山庆云寺挂单，把侠家拳传给僧人王隐林（又名王飞龙），王隐林到广州后还俗，在黄沙兼善街开设武馆授徒。', '16', '0', '1', '1', null, '0', '1', '191', '98', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '30', '26', '28', '12', '5', '6', '1');
INSERT INTO `x2_biology` VALUES ('2', '黄澄可', '1', '1', '1', '546', '58', '84', '29', '83', '29', '113', '6', '0', '0', '1', '3', '1', '0', '23', '971', '69', '17', '', '0', '0', '1', '九龙拳黄澄可，生性善良，宅心仁厚，天资聪敏，乐於助人。本为乡村赤脚小子，万事不强求，後离开家园往省城，面对人生种种考验与经历之馀，先後得一代宗师陆阿采、黄麒英、铁挢三等人指点武学，经历大大小小生死切磋搏斗，融会贯通各家之大成，终自创出一套刚柔并重，变化无穷的“九龙拳”。国难当前，不惜联同众虎，洒热血，抛头颅，发扬武学之“侠义精神”，成为一代英雄。', '20', '0', '1', '1', null, '0', '1', '141', '73', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '26', '22', '21', '18', '14', '12', '1');
INSERT INTO `x2_biology` VALUES ('3', '苏黑虎', '1', '1', '1', '634', '62', '83', '29', '89', '30', '113', '6', '0', '0', '1', '3', '1', '0', '21', '1217', '123', '11', '6,5,10', '0', '0', '1', '铁沙掌苏黑虎，少林黑虎门源出嵩山少林寺，距今约二百年前道光年间,有一少林僧人法号兆德，每隔数年便到广东化缘一次.因而遇上顺德北岗乡之苏黑虎，苏黑虎年幼已习武术，但目睹兆德和尚的少林绝技后，即决心跟随兆德和尚上嵩山少林学艺。', '20', '0', '1', '1', null, '0', '1', '249', '127', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '31', '24', '38', '8', '3', '19', '1');
INSERT INTO `x2_biology` VALUES ('4', '黄麒英', '1', '1', '1', '536', '59', '90', '32', '89', '31', '115', '5', '0', '0', '1', '3', '1', '0', '25', '1182', '112', '15', '7,11,4,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '227', '116', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '24', '25', '33', '10', '14', '8', '1');
INSERT INTO `x2_biology` VALUES ('5', '周泰', '1', '1', '1', '686', '59', '108', '38', '103', '37', '118', '7', '0', '0', '1', '3', '1', '0', '30', '1186', '91', '13', '', '0', '0', '1', '软棉掌周泰，周泰是广东湛江人,侠骨丹心，唯心高气傲，自尊心过强。醉心武学，为“十虎”中的“武痴”。', '10', '0', '1', '1', null, '0', '1', '185', '95', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '38', '32', '21', '14', '10', '2', '1');
INSERT INTO `x2_biology` VALUES ('6', '黎仁超', '1', '1', '1', '430', '60', '65', '21', '69', '22', '111', '5', '0', '0', '1', '3', '1', '0', '15', '848', '77', '13', '7', '0', '0', '1', '七星拳黎仁超，为人聪明能干，头脑灵活多变，每每洞悉先机，城府甚深。为“十虎”中之智将。', '21', '0', '1', '1', null, '0', '1', '157', '81', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '12', '23', '32', '4', '9', '17', '1');
INSERT INTO `x2_biology` VALUES ('7', '谭济筠', '1', '1', '1', '596', '61', '101', '36', '106', '37', '115', '7', '0', '0', '1', '3', '1', '0', '29', '1288', '126', '15', '8,4,2,5', '0', '0', '1', '鹤阳拳谭济筠，本名谭石窝,成名后将名字改为谭济筠. 性格率直冲动，後随咏春宗师梁赞学武，不单武艺有进，人亦变得成熟稳重，因缘际遇结识到革命党人，更不惜舍身匡扶，多番身陷险境亦义无反顾。', '17', '0', '1', '1', null, '0', '1', '255', '130', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '28', '24', '34', '7', '5', '8', '1');
INSERT INTO `x2_biology` VALUES ('8', '陈铁志', '1', '1', '1', '488', '58', '88', '31', '87', '31', '114', '6', '0', '0', '1', '3', '1', '0', '25', '1128', '104', '13', '2,6,4,10', '0', '0', '1', '鹰爪王陈铁志，陈铁志又名陈长泰, 一身武功刚猛雄劲,出手疾如闪电，指劲雄浑，坚如铁石，故人称“铁指陈”。', '17', '0', '1', '1', null, '0', '1', '211', '108', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '20', '23', '21', '10', '20', '15', '1');
INSERT INTO `x2_biology` VALUES ('9', '苏灿', '1', '1', '1', '540', '62', '91', '32', '100', '34', '114', '7', '0', '0', '1', '3', '1', '0', '25', '1055', '96', '7', '11', '0', '0', '1', '醉拳苏灿，苏灿本过着富裕逍遥的日子，但是，在遭遇到斧头黑帮的纠缠、洋人买办史密斯的阴谋以及因自己的过错使父母惨死，恋人洪绮莲的离去等等挫折后，从此遁世江湖，沦为乞丐，与酒为伍，狂歌当哭，竟把酒意融入武学招式中，开创出别具一格的“醉拳”，为“广东十虎”中最出世化外之一虎。', '23', '0', '1', '1', null, '0', '1', '195', '100', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '21', '23', '42', '3', '5', '11', '1');
INSERT INTO `x2_biology` VALUES ('10', '梁坤', '1', '1', '1', '448', '57', '59', '18', '50', '16', '114', '4', '0', '0', '1', '3', '1', '0', '10', '876', '88', '6', '8,6', '0', '0', '1', '铁桥三梁坤，正名梁坤，有洪拳大师之称，广东十虎之首。', '27', '0', '1', '1', null, '0', '1', '179', '92', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '14', '37', '17', '2', '19', '3', '1');
INSERT INTO `x2_biology` VALUES ('11', '董海川', '1', '1', '1', '534', '59', '86', '31', '94', '33', '111', '5', '0', '0', '1', '3', '1', '0', '26', '1079', '87', '9', '5,11', '0', '0', '1', '[1797——1882]少任侠，为人仗义，嫉恶如仇，好打抱不平，人称紫面大侠，八卦掌创始', '7', '0', '1', '1', null, '0', '1', '177', '91', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '25', '13', '29', '13', '3', '16', '1');
INSERT INTO `x2_biology` VALUES ('12', '郭云深', '1', '1', '1', '634', '60', '103', '36', '99', '35', '118', '6', '0', '0', '1', '3', '1', '0', '28', '1269', '119', '9', '5,7,6', '0', '0', '1', '[1820——1901]刚直正义，好打抱不平，人称郭大侠，形意拳一代宗师。', '6', '0', '1', '1', null, '0', '1', '241', '123', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '32', '33', '24', '11', '13', '10', '1');
INSERT INTO `x2_biology` VALUES ('13', '王正谊', '1', '1', '1', '502', '58', '52', '16', '53', '16', '109', '4', '0', '0', '1', '3', '1', '0', '10', '820', '67', '8', '', '0', '0', '1', '[1844——1900]德义高尚，行侠仗义，人称京师大侠，大刀王五，晚清著名武林高手。', '28', '0', '1', '1', null, '0', '1', '137', '71', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '21', '22', '24', '6', '12', '17', '1');
INSERT INTO `x2_biology` VALUES ('14', '李存义', '1', '1', '1', '544', '57', '50', '14', '42', '13', '111', '2', '0', '0', '1', '3', '1', '0', '7', '940', '92', '12', '2,11', '0', '0', '1', '[1847——1921]为人刚直正义，人称单刀李，单刀侠，为形意拳一代宗师。', '13', '0', '1', '1', null, '0', '1', '187', '96', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '25', '32', '15', '4', '17', '3', '1');
INSERT INTO `x2_biology` VALUES ('15', '黄飞鸿', '1', '1', '1', '594', '56', '57', '18', '51', '17', '110', '3', '0', '0', '1', '3', '1', '0', '12', '1068', '95', '8', '11,4,7', '0', '0', '1', '[1847——1925]为人正义，济世为怀，救死扶伤，人称一代大侠，为岭南一代宗师。', '15', '0', '1', '1', null, '0', '1', '193', '99', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '33', '22', '10', '21', '8', '7', '1');
INSERT INTO `x2_biology` VALUES ('16', '霍元甲', '1', '1', '1', '614', '62', '43', '13', '53', '15', '107', '3', '0', '0', '1', '3', '1', '0', '6', '1016', '107', '18', '7,4', '0', '0', '1', '[1868——1910]执仗正义，人称霍大力士，黄面虎，津门大侠。为迷踪拳一代宗师。', '27', '0', '1', '1', null, '0', '1', '217', '111', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '30', '18', '39', '6', '5', '19', '1');
INSERT INTO `x2_biology` VALUES ('17', '杜心武', '1', '1', '1', '480', '59', '54', '17', '58', '18', '109', '4', '0', '0', '1', '3', '1', '0', '11', '810', '68', '13', '', '0', '0', '1', '[1869——1953]行侠仗义，人称侠骨，神腿，南北大侠，为自然门一代宗师。被誉为中华第一保镖。', '27', '0', '1', '1', null, '0', '1', '139', '72', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '18', '20', '32', '8', '9', '25', '1');
INSERT INTO `x2_biology` VALUES ('18', '刘百川', '1', '1', '1', '502', '63', '43', '13', '58', '16', '106', '4', '0', '0', '1', '3', '1', '0', '7', '912', '99', '16', '4,11', '0', '0', '1', '[1870——1964]为人义气，正直任侠，人称北侠，江南第一腿。', '30', '0', '1', '1', null, '0', '1', '201', '103', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '18', '14', '47', '9', '8', '13', '1');
INSERT INTO `x2_biology` VALUES ('19', '李尧臣', '1', '1', '1', '636', '58', '70', '22', '59', '20', '114', '4', '0', '0', '1', '3', '1', '0', '14', '1047', '92', '12', '2', '0', '0', '1', '[1876——1973]以侠义、智慧、勇武、传奇著称，人称李大侠，神镖李，无极刀王，29军大刀队总教头，被誉为最后的镖王。', '16', '0', '1', '1', null, '0', '1', '187', '96', '0', '0', '#fff', '0', 'B', '0', '1', '1', '0', '34', '35', '13', '8', '16', '7', '1');
INSERT INTO `x2_biology` VALUES ('20', '韩慕侠', '1', '1', '1', '598', '60', '67', '22', '68', '22', '112', '5', '0', '0', '1', '3', '1', '0', '14', '968', '87', '9', '', '0', '0', '1', '[1877——1947]好任侠，打抱不平，人称韩大侠，玉面虎，为形意八卦一代宗师。', '28', '0', '1', '1', null, '0', '1', '177', '91', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '28', '29', '30', '5', '10', '18', '1');
INSERT INTO `x2_biology` VALUES ('21', '王子平', '1', '1', '1', '564', '62', '96', '34', '103', '36', '115', '7', '0', '0', '1', '3', '1', '0', '27', '1194', '116', '8', '2,10,11', '0', '0', '1', '[1881——1973]一身正义，好打抱不平，人称千斤神力，为清末民初著名武术家。', '17', '0', '1', '1', null, '0', '1', '235', '120', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '24', '23', '39', '11', '5', '25', '1');
INSERT INTO `x2_biology` VALUES ('22', '吕紫剑', '1', '1', '1', '600', '61', '53', '16', '54', '16', '111', '4', '0', '0', '1', '3', '1', '0', '8', '1073', '118', '18', '6,5,11', '0', '0', '1', '[1993——2012]行侠仗义，人称长江大侠，为八卦掌一代宗师', '27', '0', '1', '1', null, '0', '1', '239', '122', '0', '0', '#fff', '0', 'A', '0', '1', '1', '0', '28', '29', '31', '9', '13', '22', '1');
INSERT INTO `x2_biology` VALUES ('23', '李三', '1', '1', '1', '1059', '31', '26', '21', '29', '24', '110', '3', '0', '0', '1', '3', '1', '0', '5', '1322', '109', '6', '4,6,7,8,5', '0', '0', '1', '[1898——1953]劫富济贫，人称侠盗，燕子李三，为民初著名飞贼。', '10', '0', '1', '1', '', '0', '1', '221', '113', '9', '10', '#fff', '0', 'B', '0', '1', '1', '0', '35', '22', '30', '24', '11', '13', '1');
INSERT INTO `x2_biology` VALUES ('24', '未知生物', '1', '1', '1', '610', '53', '65', '29', '60', '28', '109', '2', '0', '0', '1', '3', '1', '0', '10', '1166', '109', '16', '4,2,6,10', '0', '0', '4', null, '29', '0', '1', '1', null, '0', '1', '221', '113', '0', '0', '#fff', '0', 'D', '0', '1', '1', '0', '34', '20', '15', '21', '15', '3', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_biology
-- ----------------------------
INSERT INTO `x2_biology_biology` VALUES ('1', '人', '最适合修行的形态，领悟极高，每级次战斗有概率突破或者提升境界。', '10', '幸运+10', '幸运，体质，属性较高，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('2', '妖', '狡猾而狡诈，大部分技能是辅助控制buff技能，非常适合于后排。', '6', '触发+6%', '控制，概率，buff加成，适合资深玩家。');
INSERT INTO `x2_biology_biology` VALUES ('3', '鬼', '拥有无尽的魂力，最纯粹的力量，强大的魂力使他们不易死亡。', '100', '法力值+100', '套路，脆弱，搭配较高，适合资深玩家。');
INSERT INTO `x2_biology_biology` VALUES ('4', '神', '拥有极高的法术伤害，是大多数高输出的克星。', '8', '特攻+8%', '法术，控制，输出较高，适合普通玩家。');
INSERT INTO `x2_biology_biology` VALUES ('5', '魔', '偏重物理防守，输出一般，属于肉盾类型，适合用于前排。', '12', '生命+12%', '血厚，坚硬，生存力强，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('6', '兽', '血腥狂暴，拥有极高的爆发。偏物理类型，适合前排或者输出。', '5', '暴击+5%', '物理，暴力，爆发较高，适合新人。');
INSERT INTO `x2_biology_biology` VALUES ('7', '灵', '天地万物皆有灵，有较高的灵气成长值。有回血，反伤，减伤等技能。', '20', '灵气+20%', '辅助，肉盾，全能选手，适合普通玩家。');
INSERT INTO `x2_biology_biology` VALUES ('8', '异', '超脱三界，不在五行的未知生物。拥有极高的抗性，免疫的物理和法术伤害。', '6', '抗性+6%', '双抗，减伤，防御较高，适合普通玩家。');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_biology_create
-- ----------------------------
INSERT INTO `x2_biology_create` VALUES ('48', '黄麒英', '1', '2', '1', '456', '53', '86', '57', '89', '58', '112', '0', '0', '0', '1', '3', '1', '4', '25', '19', '15', '18', '1086', '82', '7', '7,11,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '167', '86', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '10', '14', '8', '1');

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
  `wordId` int(11) DEFAULT NULL COMMENT '世界id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_biology
-- ----------------------------
INSERT INTO `x2_user_biology` VALUES ('33', '黄麒英', '1', '1', '1', '456', '53', '86', '57', '89', '58', '112', '0', '0', '0', '1', '3', '1', '4', '25', '19', '15', '18', '1086', '82', '7', '7,11,10', '0', '0', '1', '无影脚黄麒英，黄麒英功夫源自於金钩李胡子和洪熙官的传人陆阿采。', '7', '0', '1', '1', null, '0', '1', '167', '86', '0', '0', '#fff', '0', 'C', '0', '1', '1', '0', '10', '14', '8', '1', '48', '0');

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
-- Table structure for x2_user_handbook
-- ----------------------------
DROP TABLE IF EXISTS `x2_user_handbook`;
CREATE TABLE `x2_user_handbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biologyid` int(11) DEFAULT NULL COMMENT '图鉴id',
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_user_handbook
-- ----------------------------
INSERT INTO `x2_user_handbook` VALUES ('1', '1', '1');

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
