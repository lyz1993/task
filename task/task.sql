/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-08-31 15:09:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `event`
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `link_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of event
-- ----------------------------
INSERT INTO `event` VALUES ('1', '工作安排', '0');
INSERT INTO `event` VALUES ('2', '用户报障', '0');
INSERT INTO `event` VALUES ('3', '系统厂家', '0');
INSERT INTO `event` VALUES ('4', '巡检', '0');
INSERT INTO `event` VALUES ('7', '事故1', '6');
INSERT INTO `event` VALUES ('8', '代购费', '1');
INSERT INTO `event` VALUES ('9', '的深v发', '1');

-- ----------------------------
-- Table structure for `following`
-- ----------------------------
DROP TABLE IF EXISTS `following`;
CREATE TABLE `following` (
  `following_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `Fdescribe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`following_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of following
-- ----------------------------
INSERT INTO `following` VALUES ('3', '38', '0', '1');
INSERT INTO `following` VALUES ('4', '38', '0', '2');
INSERT INTO `following` VALUES ('5', '38', '0', '2016-08-8 123');
INSERT INTO `following` VALUES ('6', '38', '1', '2016-08-8  ');
INSERT INTO `following` VALUES ('7', '20', '0', '5');
INSERT INTO `following` VALUES ('8', '20', '0', '6');
INSERT INTO `following` VALUES ('9', '41', '0', '2016-08-23  有问题');
INSERT INTO `following` VALUES ('10', '46', '0', '2016-08-29  调试中');
INSERT INTO `following` VALUES ('11', '42', '0', '2016-08-29  调试');

-- ----------------------------
-- Table structure for `inspection`
-- ----------------------------
DROP TABLE IF EXISTS `inspection`;
CREATE TABLE `inspection` (
  `inspection_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `UPS` varchar(255) DEFAULT '',
  `Battery` varchar(255) DEFAULT '',
  `Blower` varchar(255) DEFAULT '',
  `Electric` varchar(255) DEFAULT '',
  `airConditioner_UPS` varchar(255) DEFAULT '',
  `Cylinder` varchar(255) DEFAULT '',
  `PressureReliefValve` varchar(255) DEFAULT '',
  `FireEngine` varchar(255) DEFAULT '',
  `networkEquipment` varchar(255) DEFAULT '',
  `safety` varchar(255) DEFAULT '',
  `airConditioner_Access` varchar(255) DEFAULT '',
  `Access` varchar(255) DEFAULT '',
  `Surveillance` varchar(255) DEFAULT '',
  `airConditioner_Host` varchar(255) DEFAULT '',
  `PAU` varchar(255) DEFAULT '',
  `ATS` varchar(255) DEFAULT '',
  `PrecisionColumnHeadCabinet` varchar(255) DEFAULT '',
  `Server` varchar(255) DEFAULT '',
  `storager` varchar(255) DEFAULT '',
  `Vmware` varchar(255) DEFAULT '',
  `Switch` varchar(255) DEFAULT '',
  `zabbix` varchar(255) DEFAULT '',
  `NetworkManagement` varchar(255) DEFAULT '',
  `LoopControl` varchar(255) DEFAULT '',
  `network` varchar(255) DEFAULT '',
  `Remarks` varchar(255) DEFAULT '',
  PRIMARY KEY (`inspection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inspection
-- ----------------------------
INSERT INTO `inspection` VALUES ('1', '4', '2016-08-18', '', '故障', '', '', '', '', '', '', '', '', '', '', '', '', '故障', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `inspection` VALUES ('2', '4', '2016-08-19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `inspection` VALUES ('3', '1', '2016-08-20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `inspection` VALUES ('6', '4', '2016-08-21', '', '', '', '', '', '', '', '', '', '123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `inspection` VALUES ('7', '4', '2016-08-23', '', 'ok', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `kb`
-- ----------------------------
DROP TABLE IF EXISTS `kb`;
CREATE TABLE `kb` (
  `KB_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `KBtype_id` int(11) DEFAULT NULL,
  `task_describe` varchar(4000) DEFAULT NULL,
  `process` varchar(4000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`KB_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kb
-- ----------------------------
INSERT INTO `kb` VALUES ('21', '45', '6', '问题', '//主键\nalter table tabelname add new_field_id int(5) unsigned default 0 not null auto_increment ,add primary key (new_field_id);\n//增加一个新列\nalter table t2 add d timestamp;\nalter table infos add ex tinyint not null default ‘0′;\n//删除列\nalter table t2 drop column', '4');
INSERT INTO `kb` VALUES ('23', '38', '3', '打款给看看那地方南京', '松岛枫', '3');
INSERT INTO `kb` VALUES ('25', '41', '3', '123', '修理服务器', '4');
INSERT INTO `kb` VALUES ('26', null, '4', '温柔', '分二', null);
INSERT INTO `kb` VALUES ('27', null, '4', '的人', '如果谈体会', null);
INSERT INTO `kb` VALUES ('28', null, '5', '但是', '就飞', null);

-- ----------------------------
-- Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('281', '2016-08-01', '6');
INSERT INTO `schedule` VALUES ('282', '2016-08-02', '8');
INSERT INTO `schedule` VALUES ('283', '2016-08-03', '-1');
INSERT INTO `schedule` VALUES ('284', '2016-08-04', '8');
INSERT INTO `schedule` VALUES ('285', '2016-08-05', '2');
INSERT INTO `schedule` VALUES ('286', '2016-08-06', '-1');
INSERT INTO `schedule` VALUES ('287', '2016-08-07', '-1');
INSERT INTO `schedule` VALUES ('288', '2016-08-08', '-1');
INSERT INTO `schedule` VALUES ('289', '2016-08-09', '8');
INSERT INTO `schedule` VALUES ('290', '2016-08-10', '-1');
INSERT INTO `schedule` VALUES ('291', '2016-08-11', '5');
INSERT INTO `schedule` VALUES ('292', '2016-08-12', '-1');
INSERT INTO `schedule` VALUES ('293', '2016-08-13', '2');
INSERT INTO `schedule` VALUES ('294', '2016-08-14', '-1');
INSERT INTO `schedule` VALUES ('295', '2016-08-15', '8');
INSERT INTO `schedule` VALUES ('296', '2016-08-16', '3');
INSERT INTO `schedule` VALUES ('297', '2016-08-17', '4');
INSERT INTO `schedule` VALUES ('298', '2016-08-18', '-1');
INSERT INTO `schedule` VALUES ('299', '2016-08-19', '-1');
INSERT INTO `schedule` VALUES ('300', '2016-08-20', '-1');
INSERT INTO `schedule` VALUES ('301', '2016-08-21', '-1');
INSERT INTO `schedule` VALUES ('302', '2016-08-22', '-1');
INSERT INTO `schedule` VALUES ('303', '2016-08-23', '4');
INSERT INTO `schedule` VALUES ('304', '2016-08-24', '8');
INSERT INTO `schedule` VALUES ('305', '2016-08-25', '-1');
INSERT INTO `schedule` VALUES ('306', '2016-08-26', '-1');
INSERT INTO `schedule` VALUES ('307', '2016-08-27', '-1');
INSERT INTO `schedule` VALUES ('308', '2016-08-28', '-1');
INSERT INTO `schedule` VALUES ('309', '2016-08-29', '8');
INSERT INTO `schedule` VALUES ('310', '2016-08-30', '-1');
INSERT INTO `schedule` VALUES ('311', '2016-08-31', '4');
INSERT INTO `schedule` VALUES ('312', '2016-09-01', '3');
INSERT INTO `schedule` VALUES ('313', '2016-09-02', '4');
INSERT INTO `schedule` VALUES ('314', '2016-09-03', '1');
INSERT INTO `schedule` VALUES ('315', '2016-09-04', '4');
INSERT INTO `schedule` VALUES ('316', '2016-09-05', '4');
INSERT INTO `schedule` VALUES ('317', '2016-09-06', '0');
INSERT INTO `schedule` VALUES ('318', '2016-09-07', '0');
INSERT INTO `schedule` VALUES ('319', '2016-09-08', '0');
INSERT INTO `schedule` VALUES ('320', '2016-09-09', '0');
INSERT INTO `schedule` VALUES ('321', '2016-09-10', '0');
INSERT INTO `schedule` VALUES ('322', '2016-09-11', '0');
INSERT INTO `schedule` VALUES ('323', '2016-09-12', '0');
INSERT INTO `schedule` VALUES ('324', '2016-09-13', '0');
INSERT INTO `schedule` VALUES ('325', '2016-09-14', '0');
INSERT INTO `schedule` VALUES ('326', '2016-09-15', '0');
INSERT INTO `schedule` VALUES ('327', '2016-09-16', '0');
INSERT INTO `schedule` VALUES ('328', '2016-09-17', '0');
INSERT INTO `schedule` VALUES ('329', '2016-09-18', '0');
INSERT INTO `schedule` VALUES ('330', '2016-09-19', '0');
INSERT INTO `schedule` VALUES ('331', '2016-09-20', '0');
INSERT INTO `schedule` VALUES ('332', '2016-09-21', '0');
INSERT INTO `schedule` VALUES ('333', '2016-09-22', '0');
INSERT INTO `schedule` VALUES ('334', '2016-09-23', '0');
INSERT INTO `schedule` VALUES ('335', '2016-09-24', '0');
INSERT INTO `schedule` VALUES ('336', '2016-09-25', '0');
INSERT INTO `schedule` VALUES ('337', '2016-09-26', '0');
INSERT INTO `schedule` VALUES ('338', '2016-09-27', '0');
INSERT INTO `schedule` VALUES ('339', '2016-09-28', '0');
INSERT INTO `schedule` VALUES ('340', '2016-09-29', '0');
INSERT INTO `schedule` VALUES ('341', '2016-09-30', '0');
INSERT INTO `schedule` VALUES ('342', '0000-00-00', '0');
INSERT INTO `schedule` VALUES ('343', '2016-06-01', '-1');
INSERT INTO `schedule` VALUES ('344', '2016-06-02', '-1');
INSERT INTO `schedule` VALUES ('345', '2016-06-03', '8');
INSERT INTO `schedule` VALUES ('346', '2016-06-04', '-1');
INSERT INTO `schedule` VALUES ('347', '2016-06-05', '-1');
INSERT INTO `schedule` VALUES ('348', '2016-06-06', '-1');
INSERT INTO `schedule` VALUES ('349', '2016-06-07', '-1');
INSERT INTO `schedule` VALUES ('350', '2016-06-08', '1');
INSERT INTO `schedule` VALUES ('351', '2016-06-09', '-1');
INSERT INTO `schedule` VALUES ('352', '2016-06-10', '-1');
INSERT INTO `schedule` VALUES ('353', '2016-06-11', '8');
INSERT INTO `schedule` VALUES ('354', '2016-06-12', '-1');
INSERT INTO `schedule` VALUES ('355', '2016-06-13', '-1');
INSERT INTO `schedule` VALUES ('356', '2016-06-14', '-1');
INSERT INTO `schedule` VALUES ('357', '2016-06-15', '-1');
INSERT INTO `schedule` VALUES ('358', '2016-06-16', '-1');
INSERT INTO `schedule` VALUES ('359', '2016-06-17', '3');
INSERT INTO `schedule` VALUES ('360', '2016-06-18', '-1');
INSERT INTO `schedule` VALUES ('361', '2016-06-19', '-1');
INSERT INTO `schedule` VALUES ('362', '2016-06-20', '-1');
INSERT INTO `schedule` VALUES ('363', '2016-06-21', '-1');
INSERT INTO `schedule` VALUES ('364', '2016-06-22', '-1');
INSERT INTO `schedule` VALUES ('365', '2016-06-23', '-1');
INSERT INTO `schedule` VALUES ('366', '2016-06-24', '-1');
INSERT INTO `schedule` VALUES ('367', '2016-06-25', '-1');
INSERT INTO `schedule` VALUES ('368', '2016-06-26', '-1');
INSERT INTO `schedule` VALUES ('369', '2016-06-27', '-1');
INSERT INTO `schedule` VALUES ('370', '2016-06-28', '-1');
INSERT INTO `schedule` VALUES ('371', '2016-06-29', '-1');
INSERT INTO `schedule` VALUES ('372', '2016-06-30', '-1');

-- ----------------------------
-- Table structure for `task`
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `Auser` int(11) NOT NULL,
  `Huser` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `finish_time` datetime DEFAULT NULL,
  `submit` int(11) NOT NULL DEFAULT '0',
  `task_describe` varchar(255) DEFAULT NULL,
  `process` varchar(255) DEFAULT NULL,
  `submitKB` int(11) DEFAULT '0',
  `KB_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `follow_up` varchar(255) DEFAULT NULL,
  `partner` varchar(255) DEFAULT NULL,
  `party_a` varchar(255) DEFAULT NULL,
  `access` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES ('38', '2', '4', '3', '2016-08-08 09:57:49', '2016-08-08 10:53:33', '2', '123', '123', '1', '23', '3', '2016-08-08', '123', '123', '无', null, '1');
INSERT INTO `task` VALUES ('41', '3', '1', '4', '2016-08-15 09:09:37', '2016-08-23 15:09:23', '2', '123', '修理服务器', '1', '25', '3', '2016-08-23', '', '', '无', null, '1');
INSERT INTO `task` VALUES ('42', '3', '1', '4', '2016-08-15 09:11:16', null, '0', '123', null, '0', '0', '3', null, null, null, null, null, '1');
INSERT INTO `task` VALUES ('45', '1', '7', '4', '2016-08-21 10:38:36', '2016-08-23 10:19:03', '2', '问题', '//主键\nalter table tabelname add new_field_id int(5) unsigned default 0 not null auto_increment ,add primary key (new_field_id);\n//增加一个新列\nalter table t2 add d timestamp;\nalter table infos add ex tinyint not null default ‘0′;\n//删除列\nalter table t2 drop column', '1', '21', '6', '2016-08-23', '', '', '无', null, '1');
INSERT INTO `task` VALUES ('46', '2', '1', '4', '2016-08-23 15:10:53', null, '0', '空调故障', null, '0', null, '8', null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `message1` varchar(255) DEFAULT NULL,
  `message2` varchar(255) DEFAULT NULL,
  `message3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '123', '123', '3');
INSERT INTO `test` VALUES ('2', '123', null, '3');
INSERT INTO `test` VALUES ('4', '123', '123', '3');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  `link_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '服务器', '0');
INSERT INTO `type` VALUES ('2', '交换机', '0');
INSERT INTO `type` VALUES ('3', '虚拟机', '0');
INSERT INTO `type` VALUES ('4', '安全设备', '0');
INSERT INTO `type` VALUES ('5', '环境控制', '0');
INSERT INTO `type` VALUES ('6', '电力设备', '0');
INSERT INTO `type` VALUES ('7', '消防系统', '0');
INSERT INTO `type` VALUES ('8', '空调', '0');
INSERT INTO `type` VALUES ('9', '门禁系统', '3');
INSERT INTO `type` VALUES ('10', '类型', '0');
INSERT INTO `type` VALUES ('11', '类型1', '0');
INSERT INTO `type` VALUES ('12', '类型1', '0');
INSERT INTO `type` VALUES ('13', '类型2', '0');
INSERT INTO `type` VALUES ('14', '类型3', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `effective` int(11) NOT NULL DEFAULT '0',
  `power` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'SST', '202cb962ac59075b964b07152d234b70', '商圣涛', '', '', '0', '5');
INSERT INTO `user` VALUES ('2', 'YLL', '202cb962ac59075b964b07152d234b70', '杨连磊', null, null, '0', '1');
INSERT INTO `user` VALUES ('3', 'ZQ', 'a2f7c39ae8f263cce8517372894dcda1', '张琦', '', '', '0', '1');
INSERT INTO `user` VALUES ('4', 'LYZ', '202cb962ac59075b964b07152d234b70', '李杨子', '18660780067', '18660780067@163.com', '0', '1');
INSERT INTO `user` VALUES ('5', 'MJB', '202cb962ac59075b964b07152d234b70', '毛建波', null, null, '0', '1');
INSERT INTO `user` VALUES ('6', 'XL', '202cb962ac59075b964b07152d234b70', '徐磊', null, null, '0', '1');
INSERT INTO `user` VALUES ('7', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '0', '9');
INSERT INTO `user` VALUES ('8', 'jkc', '', '12', '12', '123', '0', '5');
INSERT INTO `user` VALUES ('9', 'zz', '', '纸纸', '', '', '1', '1');
INSERT INTO `user` VALUES ('10', 'asd', '', '胖', '', '', '0', '1');
