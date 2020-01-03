/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : monster

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-01-03 17:54:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for x2_admin_init
-- ----------------------------
DROP TABLE IF EXISTS `x2_admin_init`;
CREATE TABLE `x2_admin_init` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '副id',
  `name` varchar(25) DEFAULT NULL COMMENT '分类名称',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `icon` varchar(255) DEFAULT NULL COMMENT '标签',
  `image` varchar(255) DEFAULT NULL COMMENT '图片',
  `href` varchar(255) DEFAULT '' COMMENT '接口/页面',
  `target` varchar(25) DEFAULT NULL COMMENT '跳转类型_self _blank',
  `createTime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of x2_admin_init
-- ----------------------------
INSERT INTO `x2_admin_init` VALUES ('1', '0', 'menuInfo', '后台菜单', null, null, null, '', null);
INSERT INTO `x2_admin_init` VALUES ('2', '1', 'currency', '常规管理', 'fa fa-address-book', null, '', '', null);
INSERT INTO `x2_admin_init` VALUES ('3', '1', 'component', '组件管理', 'fa fa-lemon-o', '', '', '', null);
INSERT INTO `x2_admin_init` VALUES ('4', '1', 'other', '其它管理', 'fa fa-slideshare', null, '', '', null);
INSERT INTO `x2_admin_init` VALUES ('5', '2', '', '后台管理', 'fa fa-home', '', '', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('6', '5', '', '菜单分类', 'fa fa-tachometer', '', '/admin/admin/admin-meanu', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('7', '5', '', '主页二', 'fa fa-tachometer', '', '/layuimini/page/welcome-2.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('8', '2', '', '菜单管理', 'fa fa-window-maximize', '', '/layuimini/page/menu.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('9', '2', '', '系统设置', 'fa fa-gears', '', '/layuimini/page/setting.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('10', '2', '', '表格示例', 'fa fa-file-text', null, '/layuimini/page/table.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('11', '2', '', '表单示例', 'fa fa-calendar', null, '', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('12', '11', '', '普通表单', 'fa fa-list-alt', '', '/layuimini/page/form.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('13', '11', '', '分步表单', 'fa fa-navicon', '', '/layuimini/page/form-step.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('14', '2', '', '登录模板', 'fa fa-flag-o', null, '', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('15', '14', '', '登录-1', 'fa fa-stumbleupon-circle', null, '/layuimini/page/login-1.html', '_blank', null);
INSERT INTO `x2_admin_init` VALUES ('16', '14', '', '登录-2', 'fa fa-viacoin', null, '/layuimini/page/login-2.html', '_blank', null);
INSERT INTO `x2_admin_init` VALUES ('17', '2', '', '异常页面', 'fa fa-home', null, '', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('18', '2', '', '404页面', 'fa fa-hourglass-end', '', '/layuimini/page/404.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('19', '2', '', '其它界面', 'fa fa-snowflake-o', null, '', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('20', '19', '', '按钮示例', 'fa fa-navicon', null, '/layuimini/page/button.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('21', '19', '', '弹出层', 'fa fa-shield', null, '/layuimini/page/layer.html\"', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('22', '3', '', '组件管理', 'fa fa-lemon-o', null, '', '', null);
INSERT INTO `x2_admin_init` VALUES ('23', '22', '', '图标列表', 'fa fa-dot-circle-o', null, '/layuimini/page/icon.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('24', '22', '', '图标选择', 'fa fa-adn', null, '/layuimini/page/icon-picker.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('25', '22', '', '颜色选择', 'fa fa-dashboard', null, '/layuimini/page/color-select.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('26', '22', '', '下拉选择', 'fa fa-angle-double-down', null, '/layuimini/page/table-select.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('27', '22', '', '文件上传', 'fa fa-arrow-up', null, '/layuimini/page/upload.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('28', '22', '', '富文本编辑器', 'fa fa-edi', null, '/layuimini/page/editor.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('29', '4', '', '多级菜单', 'fa fa-meetup', null, '', '', null);
INSERT INTO `x2_admin_init` VALUES ('30', '29', '', '按钮1', 'fa fa-calendar', null, '/layuimini/page/button.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('31', '30', '', '按钮2', 'fa fa-snowflake-o', null, '/layuimini/page/button.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('32', '31', '', '按钮3', 'fa fa-snowflake-o', null, '/layuimini/page/button.html', '_self', null);
INSERT INTO `x2_admin_init` VALUES ('33', '32', '', '表单4', 'fa fa-calendar', null, '/layuimini/page/form.html', '_self', null);
