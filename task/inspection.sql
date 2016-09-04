/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-08-19 15:24:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `inspection`
-- ----------------------------
DROP TABLE IF EXISTS `inspection`;
CREATE TABLE `inspection` (
  `inspection_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `UPS` varchar(255) DEFAULT NULL,
  `Battery` varchar(255) DEFAULT NULL,
  `Blower` varchar(255) DEFAULT NULL,
  `Electric` varchar(255) DEFAULT NULL,
  `airConditioner_UPS` varchar(255) DEFAULT NULL,
  `Cylinder` varchar(255) DEFAULT NULL,
  `PressureReliefValve` varchar(255) DEFAULT NULL,
  `FireEngine` varchar(255) DEFAULT NULL,
  `networkEquipment` varchar(255) DEFAULT NULL,
  `safety` varchar(255) DEFAULT NULL,
  `airConditioner_Access` varchar(255) DEFAULT NULL,
  `Access` varchar(255) DEFAULT NULL,
  `Surveillance` varchar(255) DEFAULT NULL,
  `airConditioner_Host` varchar(255) DEFAULT NULL,
  `PAU` varchar(255) DEFAULT NULL,
  `ATS` varchar(255) DEFAULT NULL,
  `PrecisionColumnHeadCabinet` varchar(255) DEFAULT NULL,
  `Server` varchar(255) DEFAULT NULL,
  `storager` varchar(255) DEFAULT NULL,
  `Vmware` varchar(255) DEFAULT NULL,
  `Switch` varchar(255) DEFAULT NULL,
  `zabbix` varchar(255) DEFAULT NULL,
  `NetworkManagement` varchar(255) DEFAULT NULL,
  `LoopControl` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`inspection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inspection
-- ----------------------------
INSERT INTO `inspection` VALUES ('1', '4', '2016-08-18', '', '故障', '', '', '', '', '', '', '', '', '', '', '', '', '故障', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `inspection` VALUES ('2', '4', '2016-08-19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
