/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : chanshiguan

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-07 21:45:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `event`
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL COMMENT '事件名称',
  `event_begin_date` date DEFAULT NULL COMMENT '事件开始时间',
  `remark` text COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '状态。0-默认，1-正常，2-完结，-1-删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='事件';

-- ----------------------------
-- Records of event
-- ----------------------------
INSERT INTO `event` VALUES ('1', '长春长生疫苗事件', '2018-07-15', '2018年7月15日，国家药品监督管理局发布通告指出，长春长生生物科技有限公司冻干人用狂犬病疫苗生产存在记录造假等行为。', '2018-08-04 17:07:08', '2018-08-04 17:07:08', '1');
INSERT INTO `event` VALUES ('2', '红黄蓝幼儿园虐童事件', '2017-11-22', '红黄蓝幼儿园虐童事件指：2017年11月22日晚开始，有十余名幼儿家长反映朝阳区管庄红黄蓝幼儿园(新天地分园)国际小二班的幼儿遭遇老师扎针、喂不明白色药片，并提供孩子身上多个针眼的照片。		&lt;br /&gt;\r\n2017年11月26日晚，北京警方就该幼儿园幼儿疑似遭针扎、被喂药一事进行了通报，涉嫌虐童的幼儿园教师刘某某被刑拘。11月29日，红黄蓝教育机构针对红黄蓝新天地幼儿园事件发布道歉信。		&lt;br /&gt;\r\n2018年5月，北京红黄蓝幼儿园虐童一案，检察机关已向法院提起公诉。', '2018-08-03 21:38:24', '2018-08-03 21:38:24', '1');

-- ----------------------------
-- Table structure for `event_time_line`
-- ----------------------------
DROP TABLE IF EXISTS `event_time_line`;
CREATE TABLE `event_time_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联event.id',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `time_line_date` date DEFAULT NULL COMMENT '时间线发生日期',
  `remark` text COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='事件时间线';

-- ----------------------------
-- Records of event_time_line
-- ----------------------------
INSERT INTO `event_time_line` VALUES ('1', '2', '1', '2017-11-22', '有十余名幼儿家长反映朝阳区管庄红黄蓝幼儿园(新天地分园)国际小二班的幼儿遭遇老师扎针、喂不明白色药片，并提供孩子身上多个针眼的照片。', '2018-08-04 12:15:35');
INSERT INTO `event_time_line` VALUES ('2', '2', '2', '2017-11-26', '北京警方就该幼儿园幼儿疑似遭针扎、被喂药一事进行了通报，涉嫌虐童的幼儿园教师刘某某被刑拘。', '2018-08-04 12:28:40');
INSERT INTO `event_time_line` VALUES ('3', '2', '2', '2017-11-25', '赴美上市不足2月的红黄蓝（股票代码“RYB”）股价大跌。当地时间25日收盘，红黄蓝（NYSE:RYB）暴跌38.41%，报16.45美元，跌破发行价18.5美元，市值缩水约2.9亿美元，折合人民币接近19.4亿元。', '2018-08-04 12:32:29');
INSERT INTO `event_time_line` VALUES ('4', '2', '1', '2018-07-30', '红黄蓝股价“平静”半年后直线回升！2018年6月起，股价迎来直线回升，并连续2月平均股价超过20美元。被授予国际文化奖项“中意文化交流使者”。', '2018-08-04 12:44:49');
INSERT INTO `event_time_line` VALUES ('5', '1', '1', '2018-07-19', '长生生物公告称，收到《吉林省食品药品监督管理局行政处罚决定书》，决定：1、没收库存的“吸附无细胞百白破联合疫苗”（批号：201605014－01）186 支； 2、没收违法所得85.9万元。 3、处违法生产药品货值金额三倍罚款2584047.60元。罚没款总计3442887.60 元。', '2018-08-04 17:04:08');
INSERT INTO `event_time_line` VALUES ('6', '1', '1', '2018-07-20', '吉林省食药监局的发布行政处罚公示，长春长生生产的“吸附无细胞白百破联合疫苗”（批号：201605014-01）经中国食品药品检定研究院检验，检验结果【效价测定】项不符合规定，按劣药论处。这条处罚信息，针对的是2017年11月的一起违法事件。', '2018-08-04 17:04:33');
INSERT INTO `event_time_line` VALUES ('7', '1', '1', '2018-07-22', '李克强总理就疫苗事件作出批示：此次疫苗事件突破人的道德底线，必须给全国人民一个明明白白的交代。', '2018-08-04 17:05:46');
INSERT INTO `event_time_line` VALUES ('8', '1', '1', '2018-07-24', '长春长生生物科技有限责任公司董事长高某芳等15名涉案人员因涉嫌刑事犯罪，被长春新区公安分局依法采取刑事拘留强制措施。', '2018-08-04 17:06:23');
INSERT INTO `event_time_line` VALUES ('9', '1', '1', '2018-07-29', '长春新区公安分局以涉嫌生产、销售劣药罪，对长春长生生物科技有限责任公司董事长高某芳等18名犯罪嫌疑人向检察机关提请批准逮捕。', '2018-08-04 17:07:08');
