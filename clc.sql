/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : clc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-11 14:27:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `active`
-- ----------------------------
DROP TABLE IF EXISTS `active`;
CREATE TABLE `active` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(64) DEFAULT '' COMMENT '活动名称',
  `content` varchar(255) DEFAULT '' COMMENT '活动描述',
  `rule` varchar(255) NOT NULL,
  `status` int(10) unsigned DEFAULT '1' COMMENT '活动状态',
  `addtime` varchar(64) DEFAULT '' COMMENT '开始时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active
-- ----------------------------

-- ----------------------------
-- Table structure for `active_goods`
-- ----------------------------
DROP TABLE IF EXISTS `active_goods`;
CREATE TABLE `active_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active_id` int(11) DEFAULT NULL COMMENT '活动id',
  `good_id` int(11) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of active_goods
-- ----------------------------
INSERT INTO `active_goods` VALUES ('2', '1', '1');
INSERT INTO `active_goods` VALUES ('3', '1', '2');

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `phone` varchar(64) NOT NULL COMMENT '电话',
  `address` text NOT NULL COMMENT '地址',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '地址是否默认',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '3', '12312312312', '回龙观文华西路育荣教育园区1', '1', '0', '马云');
INSERT INTO `address` VALUES ('2', '3', '12312312312', '回龙观文华西路育荣教育园区2', '0', '0', '马化腾');
INSERT INTO `address` VALUES ('3', '3', '12312312312', '回龙观文华西路育荣教育园区3', '0', '0', '马杀鸡');
INSERT INTO `address` VALUES ('4', '3', '12312312312', '回龙观文华西路育荣教育园区4', '0', '0', '马谡');

-- ----------------------------
-- Table structure for `admin_users`
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(64) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `phone` varchar(32) NOT NULL COMMENT '手机号',
  `role` tinyint(4) DEFAULT '1' COMMENT '角色',
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$WYRtEE5fbmaqDvFj1apB3.fE19HGs6RDMa4ukjwmpDh35oDldhZym', '15738628658', '1', '2017-07-10 11:41:48', '2017-07-10 11:41:48');
INSERT INTO `admin_users` VALUES ('2', 'cuicui', '$2y$10$W1E/FyO9knBvgUQNOrhsdOUmkMMDmKZEJew8QoKylCNWe4i2kImKy', '13338628658', '1', '2017-07-10 11:41:50', '2017-07-10 11:41:50');
INSERT INTO `admin_users` VALUES ('3', 'liuzheyu', '$2y$10$DWOy18HYrUYs4W5b0T6Ln.KoQJ.adX39GMHfdnWVmheWUzyGYlUR6', '15738628658', '1', '2017-07-10 11:41:52', '2017-07-10 11:41:52');

-- ----------------------------
-- Table structure for `admin_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_role`;
CREATE TABLE `admin_user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(11) unsigned NOT NULL COMMENT '后台用户id',
  `role_id` int(11) unsigned NOT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user_role
-- ----------------------------
INSERT INTO `admin_user_role` VALUES ('23', '2', '9');
INSERT INTO `admin_user_role` VALUES ('28', '1', '6');
INSERT INTO `admin_user_role` VALUES ('29', '3', '9');

-- ----------------------------
-- Table structure for `auth`
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `name` varchar(64) NOT NULL COMMENT '权限名称',
  `url` varchar(64) NOT NULL COMMENT '路径',
  `method` varchar(10) NOT NULL COMMENT '请求方式',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES ('5', '浏览角色', 'App\\Http\\Controllers\\Admin\\RoleController@index', 'get');
INSERT INTO `auth` VALUES ('6', '浏览会员', 'App\\Http\\Controllers\\Admin\\UsersController@index', 'get');
INSERT INTO `auth` VALUES ('7', '浏览用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@index', 'get');
INSERT INTO `auth` VALUES ('8', '浏览节点', 'App\\Http\\Controllers\\Admin\\AuthController@index', 'get');
INSERT INTO `auth` VALUES ('9', '添加角色', 'App\\Http\\Controllers\\Admin\\RoleController@create', 'post');
INSERT INTO `auth` VALUES ('10', '添加节点', 'App\\Http\\Controllers\\Admin\\AuthController@create', 'post');
INSERT INTO `auth` VALUES ('11', '添加用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@create', 'post');
INSERT INTO `auth` VALUES ('12', '编辑会员', 'App\\Http\\Controllers\\Admin\\UsersController@edit', 'get');
INSERT INTO `auth` VALUES ('13', '编辑用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@edit', 'get');
INSERT INTO `auth` VALUES ('14', '删除用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@destroy', 'delete');
INSERT INTO `auth` VALUES ('15', '编辑角色', 'App\\Http\\Controllers\\Admin\\RoleController@edit', 'get');
INSERT INTO `auth` VALUES ('16', '删除角色', 'App\\Http\\Controllers\\Admin\\RoleController@destroy', 'delete');
INSERT INTO `auth` VALUES ('17', '编辑节点', 'App\\Http\\Controllers\\Admin\\AuthController@edit', 'get');
INSERT INTO `auth` VALUES ('18', '删除节点', 'App\\Http\\Controllers\\Admin\\AuthController@destroy', 'delete');
INSERT INTO `auth` VALUES ('19', '登录后台', 'App\\Http\\Controllers\\Admin\\IndexController@index', 'get');
INSERT INTO `auth` VALUES ('20', '执行添加用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@store', 'post');
INSERT INTO `auth` VALUES ('21', '执行修改用户', 'App\\Http\\Controllers\\Admin\\AdminUserController@update', 'post');
INSERT INTO `auth` VALUES ('22', '分配角色', 'App\\Http\\Controllers\\Admin\\AdminUserController@loadRole', 'get');
INSERT INTO `auth` VALUES ('23', '执行分配角色', 'App\\Http\\Controllers\\Admin\\AdminUserController@saveRole', 'post');
INSERT INTO `auth` VALUES ('24', '执行添加节点', 'App\\Http\\Controllers\\Admin\\AuthController@store', 'post');
INSERT INTO `auth` VALUES ('25', '执行分配节点', 'App\\Http\\Controllers\\Admin\\RoleController@saveAuth', 'post');
INSERT INTO `auth` VALUES ('26', '分配节点', 'App\\Http\\Controllers\\Admin\\RoleController@loadAuth', 'get');
INSERT INTO `auth` VALUES ('28', '执行修改会员', 'App\\Http\\Controllers\\Admin\\UsersController@update', 'post');
INSERT INTO `auth` VALUES ('29', '执行修改角色', 'App\\Http\\Controllers\\Admin\\RoleController@update', 'post');
INSERT INTO `auth` VALUES ('30', '执行修改节点', 'App\\Http\\Controllers\\Admin\\AuthController@update', 'post');
INSERT INTO `auth` VALUES ('31', ' 执行添加角色', 'App\\Http\\Controllers\\Admin\\RoleController@store', 'post');

-- ----------------------------
-- Table structure for `auth_role`
-- ----------------------------
DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE `auth_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_role
-- ----------------------------
INSERT INTO `auth_role` VALUES ('217', '5', '7');
INSERT INTO `auth_role` VALUES ('218', '6', '7');
INSERT INTO `auth_role` VALUES ('219', '7', '7');
INSERT INTO `auth_role` VALUES ('220', '8', '7');
INSERT INTO `auth_role` VALUES ('221', '9', '7');
INSERT INTO `auth_role` VALUES ('222', '10', '7');
INSERT INTO `auth_role` VALUES ('223', '11', '7');
INSERT INTO `auth_role` VALUES ('224', '12', '7');
INSERT INTO `auth_role` VALUES ('225', '13', '7');
INSERT INTO `auth_role` VALUES ('226', '15', '7');
INSERT INTO `auth_role` VALUES ('227', '17', '7');
INSERT INTO `auth_role` VALUES ('228', '19', '7');
INSERT INTO `auth_role` VALUES ('229', '20', '7');
INSERT INTO `auth_role` VALUES ('230', '21', '7');
INSERT INTO `auth_role` VALUES ('231', '24', '7');
INSERT INTO `auth_role` VALUES ('232', '28', '7');
INSERT INTO `auth_role` VALUES ('233', '29', '7');
INSERT INTO `auth_role` VALUES ('234', '30', '7');
INSERT INTO `auth_role` VALUES ('235', '31', '7');
INSERT INTO `auth_role` VALUES ('236', '5', '8');
INSERT INTO `auth_role` VALUES ('237', '6', '8');
INSERT INTO `auth_role` VALUES ('238', '7', '8');
INSERT INTO `auth_role` VALUES ('239', '8', '8');
INSERT INTO `auth_role` VALUES ('240', '9', '8');
INSERT INTO `auth_role` VALUES ('241', '10', '8');
INSERT INTO `auth_role` VALUES ('242', '11', '8');
INSERT INTO `auth_role` VALUES ('243', '19', '8');
INSERT INTO `auth_role` VALUES ('244', '20', '8');
INSERT INTO `auth_role` VALUES ('245', '24', '8');
INSERT INTO `auth_role` VALUES ('246', '31', '8');
INSERT INTO `auth_role` VALUES ('247', '5', '9');
INSERT INTO `auth_role` VALUES ('248', '6', '9');
INSERT INTO `auth_role` VALUES ('249', '7', '9');
INSERT INTO `auth_role` VALUES ('250', '8', '9');
INSERT INTO `auth_role` VALUES ('251', '19', '9');
INSERT INTO `auth_role` VALUES ('272', '5', '6');
INSERT INTO `auth_role` VALUES ('273', '6', '6');
INSERT INTO `auth_role` VALUES ('274', '7', '6');
INSERT INTO `auth_role` VALUES ('275', '8', '6');
INSERT INTO `auth_role` VALUES ('276', '9', '6');
INSERT INTO `auth_role` VALUES ('277', '11', '6');
INSERT INTO `auth_role` VALUES ('278', '12', '6');
INSERT INTO `auth_role` VALUES ('279', '13', '6');
INSERT INTO `auth_role` VALUES ('280', '14', '6');
INSERT INTO `auth_role` VALUES ('281', '15', '6');
INSERT INTO `auth_role` VALUES ('282', '16', '6');
INSERT INTO `auth_role` VALUES ('283', '19', '6');
INSERT INTO `auth_role` VALUES ('284', '20', '6');
INSERT INTO `auth_role` VALUES ('285', '21', '6');
INSERT INTO `auth_role` VALUES ('286', '22', '6');
INSERT INTO `auth_role` VALUES ('287', '23', '6');
INSERT INTO `auth_role` VALUES ('288', '28', '6');
INSERT INTO `auth_role` VALUES ('289', '29', '6');
INSERT INTO `auth_role` VALUES ('290', '31', '6');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(64) NOT NULL COMMENT '轮播图名',
  `picname` varchar(64) NOT NULL COMMENT '图片名',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `addtime` varchar(64) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('4', '美女情怀路线hahha', 'uploads/201707051137587387.jpg', '1', '2017-07-05 09:54:10');
INSERT INTO `banner` VALUES ('8', '大自然的魅力gg', 'uploads/201707051137273861.jpg', '1', '2017-07-05 11:37:28');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL COMMENT '父id',
  `path` varchar(32) NOT NULL COMMENT '路径',
  `name` varchar(64) NOT NULL DEFAULT '''''' COMMENT '名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', '0,', '电脑');
INSERT INTO `category` VALUES ('2', '1', '0,1,', '笔记本');
INSERT INTO `category` VALUES ('3', '1', '0,1,', '台式机');
INSERT INTO `category` VALUES ('4', '1', '0,1,', '一体机');

-- ----------------------------
-- Table structure for `goodcommit`
-- ----------------------------
DROP TABLE IF EXISTS `goodcommit`;
CREATE TABLE `goodcommit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品评论id',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '商品id',
  `title` varchar(64) DEFAULT NULL COMMENT '货品名',
  `name` varchar(64) DEFAULT NULL COMMENT '用户名',
  `content` text COMMENT '评论内容',
  `grage` tinyint(4) DEFAULT NULL COMMENT '评论等级',
  `addtime` varchar(64) DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodcommit
-- ----------------------------

-- ----------------------------
-- Table structure for `gooddetail`
-- ----------------------------
DROP TABLE IF EXISTS `gooddetail`;
CREATE TABLE `gooddetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) unsigned NOT NULL COMMENT '商品id',
  `picname` varchar(64) NOT NULL DEFAULT '''''' COMMENT '图片名',
  `cpu` varchar(32) NOT NULL DEFAULT '''''' COMMENT '处理器',
  `size` varchar(64) NOT NULL DEFAULT '''''' COMMENT '屏幕大小',
  `ram` varchar(32) NOT NULL DEFAULT '''''' COMMENT '运存',
  `card` varchar(32) NOT NULL DEFAULT '''''' COMMENT '内存',
  `price` int(11) DEFAULT NULL COMMENT '价格',
  `status` tinyint(4) DEFAULT '0',
  `join` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '活动',
  `addtime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gooddetail
-- ----------------------------
INSERT INTO `gooddetail` VALUES ('1', '1', 'uploads/201707102152007446.jpg', 'i5-5200', '15.6', '8', '1T', '4555', '0', '1', '2017-07-10 21:51:51');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL COMMENT '类别id',
  `title` varchar(64) NOT NULL DEFAULT '''''' COMMENT '商品名',
  `picname` varchar(64) NOT NULL DEFAULT '0' COMMENT '图片名',
  `price` int(11) DEFAULT '0' COMMENT '价格',
  `status` tinyint(4) DEFAULT '0',
  `addtime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '1', '小米笔记本', 'uploads/201707102143003901.jpg', '4333', '0', '2017-07-10 21:42:50');
INSERT INTO `goods` VALUES ('2', '2', '苹果', 'uploads/201707102225303383.jpg', '9999', '0', '2017-07-10 22:25:21');

-- ----------------------------
-- Table structure for `good_return`
-- ----------------------------
DROP TABLE IF EXISTS `good_return`;
CREATE TABLE `good_return` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '退货id',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '货品id',
  `order_detail_id` int(11) DEFAULT NULL COMMENT '订单详情表id',
  `number` int(64) unsigned DEFAULT NULL COMMENT '退货数量',
  `status` tinyint(32) NOT NULL DEFAULT '1' COMMENT '状态审核',
  `money` int(32) NOT NULL COMMENT '退款金额',
  `reason` text COMMENT '原因',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good_return
-- ----------------------------
INSERT INTO `good_return` VALUES ('1', '1', '2', '2', '1', '3', '23423', '样式不好看', null);
INSERT INTO `good_return` VALUES ('2', '2', '2', '1', '2', '1', '235333', '质量有问题', null);
INSERT INTO `good_return` VALUES ('3', '2', '3', '3', '1', '2', '2323', '心情不美丽', null);
INSERT INTO `good_return` VALUES ('4', '3', '4', '4', '2', '4', '38746', '等的花都谢了', null);

-- ----------------------------
-- Table structure for `integral`
-- ----------------------------
DROP TABLE IF EXISTS `integral`;
CREATE TABLE `integral` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `name` varchar(64) NOT NULL DEFAULT '''''' COMMENT '名字',
  `number` int(10) unsigned DEFAULT '0' COMMENT '积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of integral
-- ----------------------------

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(64) DEFAULT NULL COMMENT '名称',
  `url` varchar(64) DEFAULT NULL COMMENT '链接地址',
  `addtime` varchar(64) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('2', '百度', 'http://www.baidu.com/niubi', '2017-07-05 22:19:54');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '订单编号',
  `address` varchar(100) DEFAULT NULL COMMENT '收货地址',
  `pay_transaction` varchar(64) DEFAULT NULL COMMENT '支付交易号',
  `pay_type` varchar(64) DEFAULT '1' COMMENT '支付方式',
  `pay_status` tinyint(3) unsigned DEFAULT '1' COMMENT '支付状态',
  `total_amout` varchar(64) DEFAULT NULL COMMENT '商品总金额',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1', '2', '小河边', '21534165', '1', '1', '23422', null);
INSERT INTO `orders` VALUES ('2', '1', '3', '精神科电话', '12321122', '1', '2', '12312', null);
INSERT INTO `orders` VALUES ('3', '2', '3', '尼克神父', '35232121', '1', '1', '23423', null);

-- ----------------------------
-- Table structure for `order_details`
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `guid` varchar(32) DEFAULT NULL COMMENT '订单编号',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '商品id',
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '订单状态',
  `name` varchar(64) DEFAULT NULL,
  `number` int(32) unsigned DEFAULT NULL COMMENT '商品数量',
  `price` int(32) DEFAULT NULL COMMENT '单价',
  `return_status` int(11) DEFAULT '1' COMMENT '退货状态',
  `c_status` tinyint(2) unsigned DEFAULT '1' COMMENT '评论状态',
  `addtime` varchar(64) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('1', '1', '1', '1', '3', 'hgfhg', '2', '1132', '1', '1', null);
INSERT INTO `order_details` VALUES ('2', '2', '2', '2', '3', 'sdfw', '1', '34223', '1', '1', null);
INSERT INTO `order_details` VALUES ('3', '1', '2', '3', '3', 'fdge', '2', '324', '1', '1', null);
INSERT INTO `order_details` VALUES ('4', '3', '3', '4', '4', 'tyu', '2', '27836', '1', '1', null);
INSERT INTO `order_details` VALUES ('5', '2', '2', '2', '5', 'dgdfg', '1', '877', '1', '1', null);
INSERT INTO `order_details` VALUES ('6', '5', '5', '5', '2', 'dfg', '1', '4334', '1', '1', null);
INSERT INTO `order_details` VALUES ('7', '3', '3', '3', '4', 'dfgd', '1', '5345', '1', '2', null);
INSERT INTO `order_details` VALUES ('8', '2', '2', '2', '3', 'sdfsdf', '1', '32523', '1', '1', null);

-- ----------------------------
-- Table structure for `registered`
-- ----------------------------
DROP TABLE IF EXISTS `registered`;
CREATE TABLE `registered` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(32) DEFAULT NULL COMMENT '手机号',
  `email` varchar(32) DEFAULT '''''' COMMENT '邮箱',
  `password` varchar(100) NOT NULL DEFAULT '''''' COMMENT '密码',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `token` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of registered
-- ----------------------------
INSERT INTO `registered` VALUES ('4', null, '646666@qq.com', '$2y$10$c1BboSzqs28vvdiNFtuVru/HaA5vAz1xJAcWNe6hEW0EkBXP8rqra', '2017-07-04 09:56:31', '');
INSERT INTO `registered` VALUES ('16', null, '1243719130@qq.com', '$2y$10$VWEGpIRQGyMvl8bM5LY7suJZsjStEt.L3S.sicz9ybj5OMp5375qO', '2017-07-10 23:05:12', '$2y$10$ZtISkcn6rbYwB/z6IffmOeIb2VZXFJSKX2o3dOvmc/B5azaHUo8nG');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `name` varchar(64) NOT NULL COMMENT '角色名',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('6', '钻石管理员', '2017-06-30 10:17:17', '2017-07-06 21:14:15');
INSERT INTO `role` VALUES ('7', '金冠管理员', '2017-06-30 10:17:25', '2017-07-06 21:01:08');
INSERT INTO `role` VALUES ('8', '银冠管理员', '2017-06-30 10:17:39', '2017-07-06 21:00:40');
INSERT INTO `role` VALUES ('9', '铜冠管理员', '2017-06-30 10:17:46', '2017-07-06 21:00:57');

-- ----------------------------
-- Table structure for `shopcat`
-- ----------------------------
DROP TABLE IF EXISTS `shopcat`;
CREATE TABLE `shopcat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '货品id',
  `name` varchar(64) NOT NULL,
  `number` int(10) unsigned NOT NULL COMMENT '数量',
  `price` int(11) NOT NULL,
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopcat
-- ----------------------------
INSERT INTO `shopcat` VALUES ('1', '1', '3', '华为v8', '2', '2565', null);
INSERT INTO `shopcat` VALUES ('2', '1', '1', '灵动', '1', '5464', null);
INSERT INTO `shopcat` VALUES ('3', '2', '1', '联想小新', '1', '6899', null);
INSERT INTO `shopcat` VALUES ('4', '3', '1', 'dell', '3', '7566', null);
INSERT INTO `shopcat` VALUES ('5', '2', '4', '联想tk', '1', '4567', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(64) DEFAULT NULL COMMENT '昵称',
  `name` varchar(64) DEFAULT '' COMMENT '姓名',
  `password` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `phone` varchar(32) DEFAULT NULL COMMENT '手机',
  `picname` varchar(32) DEFAULT 'style/images/getAvatar.do.jpg' COMMENT '图片名',
  `sex` varchar(10) DEFAULT '2' COMMENT '性别',
  `age` tinyint(3) unsigned DEFAULT NULL COMMENT '年龄',
  `email` varchar(64) DEFAULT '' COMMENT '邮箱',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员状态',
  `token` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '小云云', '马云', '$2y$10$c1BboSzqs28vvdiNFtuVru/HaA5vAz1xJAcWNe6hEW0EkBXP8rqra', '13838383838', 'uploads/201707071939283553.jpg', '1', '33', '646666@qq.com', '2017-07-04 09:56:31', '0', '');
INSERT INTO `users` VALUES ('7', null, '', '$2y$10$VWEGpIRQGyMvl8bM5LY7suJZsjStEt.L3S.sicz9ybj5OMp5375qO', null, 'style/images/getAvatar.do.jpg', '2', null, '1243719130@qq.com', '2017-07-10 23:05:12', '1', '$2y$10$ZtISkcn6rbYwB/z6IffmOeIb2VZXFJSKX2o3dOvmc/B5azaHUo8nG');

-- ----------------------------
-- Table structure for `web_config`
-- ----------------------------
DROP TABLE IF EXISTS `web_config`;
CREATE TABLE `web_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置id',
  `name` varchar(64) NOT NULL COMMENT '网站名称',
  `describe` text COMMENT '网站描述',
  `phone` varchar(32) DEFAULT NULL COMMENT '电话',
  `logo` varchar(32) DEFAULT NULL COMMENT '网站logo',
  `recode_number` varchar(64) NOT NULL COMMENT '备案号',
  `address` varchar(64) NOT NULL COMMENT '地址',
  `copyright` varchar(64) NOT NULL COMMENT '版权',
  `addtime` varchar(64) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_config
-- ----------------------------
INSERT INTO `web_config` VALUES ('2', 'CLC宠物电子商城', null, '2141214213123', 'uploads/201707052130357281.jpg', '京网备案827631876号', '北京市昌平区回龙观趴龙路7号', '版权归clc小组解释', '2017-07-05 21:18:53');
