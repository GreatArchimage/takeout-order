/*
 Navicat Premium Data Transfer

 Source Server         : php
 Source Server Type    : MySQL
 Source Server Version : 50726 (5.7.26)
 Source Host           : localhost:3306
 Source Schema         : takeout

 Target Server Type    : MySQL
 Target Server Version : 50726 (5.7.26)
 File Encoding         : 65001

 Date: 09/10/2023 16:45:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `access` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`, `username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');
INSERT INTO `admin` VALUES (2, 'Jiehong', 'maNmFYuJcG', '0');
INSERT INTO `admin` VALUES (3, 'Frank', '827ccb0eea8a706c4c34a16891f84e7b', '0');
INSERT INTO `admin` VALUES (4, 'Zhiyuan', '1x1krn7yZj', '0');
INSERT INTO `admin` VALUES (6, 'dawawd', 'facf9f743b083008a894eee7baa16469', '0');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (1, 'Jiang Yunxi', 'xWYbI1', '男', '18242858307', '中国深圳罗湖区田贝一路776号39楼');
INSERT INTO `customer` VALUES (2, 'Cheung Chun Yu', 'awdJPM', '男', '13601918199', '中国东莞珊瑚路257号22号楼');
INSERT INTO `customer` VALUES (3, 'Liao Lai Yan', 'yTejkd', '女', '14483695745', '中国深圳罗湖区蔡屋围深南东路971号华润大厦8室');
INSERT INTO `customer` VALUES (4, 'Lo Ka Keung', 'yblqnv', '男', '7608809644', '中国中山京华商圈华夏街931号17栋');
INSERT INTO `customer` VALUES (5, 'Deng Jiehong', '5e60UT', '男', '2062217833', '中国广州市白云区机场路棠苑街五巷937号17号楼');
INSERT INTO `customer` VALUES (6, 'Leung Sau Man', 'IJL2Zh', '女', '16436619173', '中国上海市浦东新区橄榄路516号华润大厦37室');
INSERT INTO `customer` VALUES (7, 'Jiang Shihan', 'DrrSZp', '女', '1023310957', '中国北京市西城区复兴门内大街639号华润大厦21室');
INSERT INTO `customer` VALUES (8, 'Sun Zhiyuan', 'avzr2r', '男', '17799995585', '中国广州市白云区机场路棠苑街五巷329号41室');
INSERT INTO `customer` VALUES (9, 'Kam Ting Fung', 'rzpMWD', '男', '19758396873', '中国广州市越秀区中山二路484号32楼');
INSERT INTO `customer` VALUES (10, 'Wan Ka Fai', 'OKb15p', '男', '19665268416', '中国北京市延庆区028县道394号23栋');
INSERT INTO `customer` VALUES (11, 'Shing Sai Wing', 'b7bH9s', '男', '14690132046', '中国北京市东城区东单王府井东街571号24楼');
INSERT INTO `customer` VALUES (12, 'Wei Shihan', 'ohhCps', '女', '1003370138', '中国北京市西城区复兴门内大街833号华润大厦2室');
INSERT INTO `customer` VALUES (13, 'Ku On Na', 'ifIknQ', '女', '16089567705', '中国深圳罗湖区蔡屋围深南东路49号35楼');
INSERT INTO `customer` VALUES (14, 'KooKa', '9ea0377f15aa5542b525259e4ce550ae', '男', '18122438044', '中国中山天河区大信商圈大信南路643号15号楼');
INSERT INTO `customer` VALUES (16, 'waaa', 'f13c4005edcc16c119845caf617a6674', '女', '18111111111', '广州软件学院');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (37, '灌汤包', 1.87, '原料：新鲜猪皮500克，冬瓜600克，鱼糁150克，火腿30克，黄瓜皮30克，鸡蛋皮1张，生姜25克，大葱50克，精盐、胡椒粉、料酒、味精、鸡精、干湿淀粉、香油、鲜汤各适量，葱叶、红樱桃各少许。', 'http://127.0.0.1:8000/storage/cover/20221219\\4cf93f76d65bb1618182b0fde226a68e.jpg', '美味早餐');
INSERT INTO `goods` VALUES (38, '皮蛋瘦肉粥', 10.99, '皮蛋瘦肉粥没什么好说的，就好像菜界的鱼香肉丝，肉界的糖醋排骨，无人不知无人不晓', 'http://127.0.0.1:8000/storage/cover/20221219\\4024aec8de12e75f6b6ce34a0d57e368.jpg', '美味早餐');
INSERT INTO `goods` VALUES (39, '糯米烧卖', 6.88, '糯米烧卖是以猪肉、糯米、面粉等食材制成的一道美食。', 'http://127.0.0.1:8000/storage/cover/20221219\\80cb3643104306e28e1ecb14de177e3c.jpg', '美味早餐');
INSERT INTO `goods` VALUES (40, '鸡蛋蔬菜饼', 7.00, '早餐不知道吃什么，那一定要试试这个', 'http://127.0.0.1:8000/storage/cover/20221219\\9f8581823ad96d47a1d5b550edbffa0f.jpg', '美味早餐');
INSERT INTO `goods` VALUES (41, '珍珠奶茶', 8.00, '口感细腻，清爽可口', 'http://127.0.0.1:8000/storage/cover/20221219\\9e5c1e6ccf9ab04b4dd9c21a2d3c9165.jpg', '奶茶果汁');
INSERT INTO `goods` VALUES (42, '仙草冻奶茶', 10.00, '看起来黑乎乎其貌不扬的仙草，但却具有天然草本植物的功效，炎热的天气里来一碗冰凉凉的仙草冻，顿时就有种将体内五脏六腑的闷热血气清除掉的感觉', 'http://127.0.0.1:8000/storage/cover/20221219\\a621f4c3c7ea98ac06f4e1756af55bb5.jpg', '奶茶果汁');
INSERT INTO `goods` VALUES (43, '焦糖奶茶', 9.00, '如果不知道喝什么，那一定要试试这个', 'http://127.0.0.1:8000/storage/cover/20221219\\1c6cde6538aea8198b65c14758e340ae.jpg', '奶茶果汁');
INSERT INTO `goods` VALUES (44, '汉堡', 11.00, '食用方便、风味可口、营养全面', 'http://127.0.0.1:8000/storage/cover/20221219\\07c00a80b1291fc91aa5a443bdd7c718.jpg', '汉堡披萨');
INSERT INTO `goods` VALUES (45, '披萨', 12.21, '食用方便、风味可口、营养全面', 'http://127.0.0.1:8000/storage/cover/20221219\\9f8423679a6c20582be527eacf949da7.jpg', '汉堡披萨');
INSERT INTO `goods` VALUES (46, '煲仔饭', 14.88, '煲仔饭是广东地区特色传统名点，做法既简单又便捷，对于炎热的夏季不爱做饭的来说无疑是最简单又美味佳肴了。', 'http://127.0.0.1:8000/storage/cover/20221219\\030225c4c90b773728bd0195a07cfd77.jpg', '简餐便当');
INSERT INTO `goods` VALUES (47, '黄焖鸡米饭', 15.22, '实惠美味，干净放心', 'http://127.0.0.1:8000/storage/cover/20221219\\f3bc7911c03b83e1e70bca373010aee4.jpg', '简餐便当');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total_cost` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (7, '2022-07-21 18:51:30', '待付款', 6, 6, 0, 65.15);
INSERT INTO `orders` VALUES (6, '2022-11-13 10:52:50', '已完成', 8, 7, 9, 22.76);
INSERT INTO `orders` VALUES (5, '2022-01-28 16:21:19', '已完成', 9, 2, 4, 88.16);
INSERT INTO `orders` VALUES (4, '2022-10-14 12:16:58', '待送达', 7, 1, 9, 12.11);
INSERT INTO `orders` VALUES (3, '2022-10-14 02:02:52', '已完成', 10, 8, 7, 18.05);
INSERT INTO `orders` VALUES (2, '2022-05-12 21:23:49', '已完成', 7, 8, 1, 32.03);
INSERT INTO `orders` VALUES (1, '2022-01-19 19:45:27', '待付款', 7, 2, 7, 96.17);
INSERT INTO `orders` VALUES (18, '2022-12-20 14:16:35', '待送达', 16, 37, 3, 5.61);
INSERT INTO `orders` VALUES (17, '2022-12-20 13:03:16', '待付款', 16, 45, 2, 24.42);
INSERT INTO `orders` VALUES (16, '2022-12-20 13:03:16', '待付款', 16, 38, 2, 21.98);
INSERT INTO `orders` VALUES (15, '2022-12-19 23:30:33', '待送达', 16, 47, 1, 15.22);
INSERT INTO `orders` VALUES (8, '2022-09-08 08:52:01', '待付款', 5, 9, 6, 61.38);
INSERT INTO `orders` VALUES (9, '2022-08-15 02:26:23', '待付款', 3, 2, 3, 10.26);
INSERT INTO `orders` VALUES (10, '2022-08-13 01:14:51', '待送达', 7, 5, 4, 74.04);

SET FOREIGN_KEY_CHECKS = 1;
