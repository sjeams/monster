/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : monster

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-01-17 18:25:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for x2_admin_init
-- ----------------------------
DROP TABLE IF EXISTS `x2_admin_init`;
CREATE TABLE `x2_admin_init` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '1' COMMENT '副id',
  `name` varchar(25) DEFAULT NULL COMMENT '分类名称',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `remark` varchar(255) DEFAULT NULL COMMENT '图片',
  `url` varchar(255) DEFAULT '' COMMENT '接口/页面',
  `createTime` varchar(255) DEFAULT NULL,
  `update` varchar(255) NOT NULL DEFAULT ' <input type="button" value="编辑节点" onclick="onEditNode()"/>' COMMENT '修改',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台菜单', null, null, null, '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '常规管理', '测试s', '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', '', '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', '', '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '后台管理', '', '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('6', '5', '', '菜单分类', '', '/admin/admin/admin-meanu', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('7', '5', '', '主页二', '速度', '/admin/admin/admin-meanu', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '菜单管理', '', '/layuimini/page/menu.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '系统设置', '', '/layuimini/page/setting.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '表格示例', '反倒是', '/layuimini/page/table.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('11', '2', '', '表单示例', null, '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('12', '11', '', '普通表单', '', '/layuimini/page/form.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('13', '11', '', '分步表单', '', '/layuimini/page/form-step.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', '', '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', '', '/layuimini/page/login-1.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', null, '/layuimini/page/login-2.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', null, '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', '', '/layuimini/page/404.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', null, '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', null, '/layuimini/page/button.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', null, '/layuimini/page/layer.html\"', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', null, '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', null, '/layuimini/page/icon.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', null, '/layuimini/page/icon-picker.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', null, '/layuimini/page/color-select.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', null, '/layuimini/page/table-select.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', '', '/layuimini/page/upload.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', '', '/layuimini/page/editor.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', null, '', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', null, '/layuimini/page/button.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('31', '30', '', '按钮2', null, '/layuimini/page/button.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('32', '31', '', '按钮3', null, '/layuimini/page/button.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
INSERT INTO `x2_admin_init` VALUES ('33', '32', '', '表单4', null, '/layuimini/page/form.html', '1579232046', '            <input type=\"button\" value=\"编辑节点\" onclick=\"onEditNode()\"/>\r\n    <input type=\"button\" value=\"删除节点\" onclick=\"onRemoveNode()\"/>\r\n');
