/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : phptask

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-05-28 18:25:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `good_id` int(11) NOT NULL AUTO_INCREMENT,
  `good_name` varchar(20) NOT NULL,
  `good_prize` double(20,0) NOT NULL,
  `good_status_id` int(11) NOT NULL,
  PRIMARY KEY (`good_id`),
  KEY `good_status_id` (`good_status_id`),
  CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`good_status_id`) REFERENCES `good_status` (`good_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '连衣裙', '99', '1');
INSERT INTO `goods` VALUES ('4', '休闲裤', '50', '1');
INSERT INTO `goods` VALUES ('5', '韩式帽子', '27', '1');

-- ----------------------------
-- Table structure for good_status
-- ----------------------------
DROP TABLE IF EXISTS `good_status`;
CREATE TABLE `good_status` (
  `good_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `good_status_name` varchar(20) NOT NULL,
  PRIMARY KEY (`good_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good_status
-- ----------------------------
INSERT INTO `good_status` VALUES ('1', '正常');
INSERT INTO `good_status` VALUES ('2', '下架');
INSERT INTO `good_status` VALUES ('3', '违规');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1');
INSERT INTO `orders` VALUES ('2', '1');
INSERT INTO `orders` VALUES ('3', '2');

-- ----------------------------
-- Table structure for order_goods
-- ----------------------------
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods` (
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `amount` int(4) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `good_id` (`good_id`),
  CONSTRAINT `order_goods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  CONSTRAINT `order_goods_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `goods` (`good_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_goods
-- ----------------------------
INSERT INTO `order_goods` VALUES ('1', '1', '2');
INSERT INTO `order_goods` VALUES ('2', '4', '1');
INSERT INTO `order_goods` VALUES ('1', '4', '1');
INSERT INTO `order_goods` VALUES ('3', '1', '1');
INSERT INTO `order_goods` VALUES ('3', '5', '2');

-- ----------------------------
-- Table structure for shop_cars
-- ----------------------------
DROP TABLE IF EXISTS `shop_cars`;
CREATE TABLE `shop_cars` (
  `user_id` int(11) DEFAULT NULL,
  `good_id` int(11) DEFAULT NULL,
  `amount` int(4) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `good_id` (`good_id`),
  CONSTRAINT `shop_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `shop_cars_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `goods` (`good_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_cars
-- ----------------------------
INSERT INTO `shop_cars` VALUES ('1', '4', '2');
INSERT INTO `shop_cars` VALUES ('1', '1', '1');
INSERT INTO `shop_cars` VALUES ('2', '5', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(20) NOT NULL,
  `user_number` char(11) NOT NULL,
  `user_passwd` char(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '龙军之', '13124929171', '123456');
INSERT INTO `users` VALUES ('2', '旋律', '15876372932', '123456');
