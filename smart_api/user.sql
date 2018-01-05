DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `num` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'toefl', '10');
INSERT INTO `user` VALUES ('2', 'ielts', '20');
INSERT INTO `user` VALUES ('3', 'sat', '30');
INSERT INTO `user` VALUES ('4', 'gre', '40');
INSERT INTO `user` VALUES ('5', 'gmat', '50');
