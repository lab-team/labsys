
DROP TABLE IF EXISTS `bc`;
CREATE TABLE `bc` (
  `id` int(255) NOT NULL,
  `auser` varchar(255) NOT NULL,
  `apwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `bc` WRITE;
INSERT INTO `bc` VALUES (1,'123','123');
UNLOCK TABLES;

DROP TABLE IF EXISTS `leavewords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leavewords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `face` varchar(50) DEFAULT NULL,
  `leave_title` varchar(50) DEFAULT NULL,
  `leave_contents` text,
  `leave_time` datetime DEFAULT NULL,
  `is_audit` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `leavewords` WRITE;
/*!40000 ALTER TABLE `leavewords` DISABLE KEYS */;
INSERT INTO `leavewords` VALUES (2,'yuanling','1','实习','1、本阶段主要是在实习，实习的主要内容主要看是基站与用户端的通信程序；\r\n2、在这一周内，慢慢适应了实习的生活，也收获不少东西；比如对C语言也加深了了解；接触最多的是函数数组，以及把函数当做参数使用，也接触到了枚举的知识方面；以及指针的使用；\r\n3、在实习的剩余时间之外主要是在学习c++的编程，虽然学的挺慢，但是还是有一定进步的；\r\n4、在接下来的日子里，主要还是想在实习中慢慢学到一定的东西，这一周就想弄懂实习代码里面的状态机，以及学习一定的数字图像处理方面的东西。','2017-04-24 20:29:55',0),(3,'chenpan','1','学习总结','    在上周，经过一番努力终于把所做的网站部署到了服务器上，过程虽不至于艰辛，也遇到一些问题，在解决问题的过程中也学到了不少东西。由于在写网站时大家经验都不是很多，考虑没有很周到，在部署的过程中我们又能够对整个网站开发有了一些更多的理解。也对团队合作有了更深的理解。\r\n    以后在进行团队合作的时候，必须做好统筹做好分工，哪里的内容该是统一的都必须考虑清楚，在开发前，必须做好详细的计划。要不然就需要在调试测验期花费更多的精力。\r\n    从上上周开始，和师兄们开始去华阳那边实习，做软件测试。在经过了几天的学习之后，也初步掌握了软件单元测试的流程。虽然刚开始做这个，并不是很熟练，会遇到一些不懂得问题，经过了师兄师姐的知道也慢慢熟练了起来。','2017-04-24 20:33:32',0),(4,'qcp','1','学习总结','本阶段主要在学习C++，由于想要快速的对C++语言有一个了解，参考了Visual C++ 实用教程，学习基本的C++语言，以及C++面向对象程序设计。学习过程中，一边学习知识，一边结合书中的实例进行练习，加深对知识的理解，初步了解了类与对象，以及它们的应用，但是在学习类与对象的过程中，遇到很多较难理解的知识，并且很多理解的知识，在之后会很生疏，这是学习中经常遇到的问题，针对较难理解的知识，很多会在反复查阅之后得到解决，如果还不能解决，就询问他人，针对生疏的问题，就是反复查看，这样就会慢慢熟练。对于下阶段的学习，首先，继续学习C++，通过反复的练习以及查阅，提高对知识的熟悉度，以及加深理解；其次继续学习一些基础的图像处理知识。','2017-04-27 15:29:25',0),(5,'yuanling','1','4月实习最后一周','1、在这一周实习生活中是迷茫的，感觉天天看代码而不编程的话进步是有限的；\r\n2、但是值得高兴的是对c++的学习在进行着，算是还是有一定的收获的；\r\n3、希望在五月里，能在实习中有所突破。','2017-05-02 20:39:47',0),(6,'王思雅','1','2017.5.5周报','1.实习工作：\r\n由于之前对于相关通讯模块的内容一知半解，所以只进行到了代码走读。但是当给大家介绍的时候，由于过于细致，导致不合格，目前工作是根据运行出来的结果再次阅读代码，将流程理解清楚。并且进行概要设计与详细设计的编写。\r\n2.Java编程的学习：\r\n之前在阅读《疯狂Java讲义》，但是感觉讲解的过于细致，第一遍仔细读的话效率不高，所以在慕课网上进行学习，目前已经学习完了面向对象部分，之后准备去以Java语言为基础再次复习数据结构的知识。并且在牛客网上进行刷题。\r\n3.阅读论文：\r\n在网上查找了目标跟踪的内容。有相对传统的方法，也有新的方法。目前正在对新的方法进行详细了解。目前新的，并且效果好的有两个方向：相关滤波和深度学习。\r\n4.研分会活动：\r\n在5月6号进行‘川作之合’的校级活动。这一个月来都在积极准备，尤其近两周来基本都在进行相关工作的准备，所以在其他的学习和工作方面的时间并不是那么充足。\r\n5.助教：\r\n因为五一放假，没有上课，导致助教的事情有些搁置，将时间分配给了其余的事情。准备在周天（5月7号）判作业和看实验报告；完成路由器的桥接工作。\r\n6.身体锻炼：\r\n现在基本没有进行锻炼，导致有时精神心理状态和身体状态并不好。目前正在积极的重新安排时间准备重新去进行身体锻炼，减脂减重。现在控制饮食已经进行了一周，感觉良好。相信这是一个良好的开端。目前的事情有点多，要更合理的安排时间。','2017-05-05 21:29:13',0);
/*!40000 ALTER TABLE `leavewords` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(48) NOT NULL,
  `time` datetime NOT NULL DEFAULT '2016-05-13 19:24:00',
  `content` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (1,'xieyijiang','2016-11-19 15:08:21','fdsfsd',1,0,'202.115.42.65'),(2,'xieyijiang','2016-11-19 15:10:14','fsdfdsfsd',2,0,'202.115.42.65'),(3,'xieyijiang','2016-11-19 15:11:09','dqwdqwdq',3,0,'202.115.42.65'),(4,'fengziliang','2016-11-19 15:11:33','this is a test',4,0,'202.115.42.65'),(5,'fengziliang','2016-11-19 15:11:49','this is a test',5,0,'202.115.42.65'),(6,'fengziliang','2016-11-19 15:14:45','this is a test',6,0,'202.115.42.65'),(7,'xieyijiang','2016-11-19 15:23:36','gdfgdfgdf',7,0,'202.115.42.65'),(8,'xieyijiang','2016-11-19 15:25:22','hfghfghfg',8,0,'202.115.42.65'),(9,'2016223045183','2016-11-19 15:28:47','chenpantest',9,0,'202.115.42.65'),(10,'fengziliang','2016-11-26 12:51:43','test',10,0,'202.115.42.65'),(11,'xieyijiang','2016-11-27 14:06:25','ffffff',11,0,'202.115.42.65'),(12,'2016223040085','2016-11-27 14:52:13','test',12,0,'202.115.42.65'),(13,'fengziliang','2016-12-28 11:24:23','111',13,0,'202.115.42.65'),(14,'fengziliang','2016-12-28 11:26:13','111',14,0,'202.115.42.65');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stureg`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `title` varchar(225) DEFAULT NULL COMMENT '标题',
  `keywords` varchar(225) DEFAULT NULL COMMENT '关键字',
  `smalltext` varchar(225) DEFAULT NULL COMMENT 'smalltext',
  `url` varchar(80) DEFAULT NULL COMMENT '网站地址',
  `page` int(11) DEFAULT '5',
  `is_audit` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES ('周报系统','夏日CMS,夏日系统,夏日源码,夏日PHP留言本','夏日留言板最新版发布了','',5,0);
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;






DROP TABLE IF EXISTS `stusign`;
CREATE TABLE `stusign` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT '签到id',
  `stuno` varchar(20) NOT NULL DEFAULT '' COMMENT '学号',
  `regtime` varchar(20) NOT NULL DEFAULT '0000-00-00' COMMENT '签到时间',
  `mac` varchar(50) NOT NULL DEFAULT '' COMMENT '签到mac地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '任务id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `stime` varchar(20) NOT NULL DEFAULT '0000-00-00' COMMENT '开始时间',
  `endtime` varchar(20) NOT NULL DEFAULT '0000-00-00' COMMENT '截止时间',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '内容',
  `process` varchar(100) NOT NULL DEFAULT '' COMMENT '进度',
  `sponsor` varchar(100) NOT NULL DEFAULT '' COMMENT '任务完成人',
  `desc` varchar(500) DEFAULT '暂无任何描述！' COMMENT '描述',
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '状态-用于软删除 0未删除，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `weekly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weekly` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '周报id',
  `title` varchar(100) NOT NULL DEFAULT '无标题' COMMENT '周报标题',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '周报内容',
  `sponsor` varchar(100) NOT NULL DEFAULT '' COMMENT '周报填写人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `userpwd` varchar(100) NOT NULL DEFAULT '' COMMENT '用户密码' ,
  `chinaname` varchar(20) NOT NULL DEFAULT '' COMMENT '汉语名字',
  `stuno` varchar(20) NOT NULL DEFAULT '' COMMENT '学号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `grade` varchar(20) NOT NULL DEFAULT '研一' COMMENT '年级 1:研一2:研二3:研三',
  `regtime` varchar(20) NOT NULL DEFAULT '0000-00-00' COMMENT '注册时间',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT  '手机号码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '状态-用于软删除 0未删除，1删除',
  `mac` varchar(50) NOT NULL DEFAULT '' COMMENT '签到mac地址',
  `image` varchar(100) NOT NULL DEFAULT '' COMMENT '头像'
);
LOCK TABLES `userinfo` WRITE;
INSERT INTO `userinfo` VALUES (1,'chenpan','25d55ad283aa400af464c76d713c07ad','陈攀','2016223045183','saygr@qq.com','研一','2017-01-01','13500000000',0,'','image_head/head7.jpg'),(2,'yuanling','25d55ad283aa400af464c76d713c07ad','袁玲','2016223040019','2641946537@qq.com','研一','2017-01-01','13500000000',0,'','image_head/head3.jpg'),(3,'wss','25d687e2c7e715b2f1c9bc30a47b0863','王莎莎','2016223040085','565107769@qq.com','研一','2017-01-01','13500000000',0,'','image_head/head1.jpg'),(4,'qcp','792b271fe3e6cee7b1618786e6b96781','邱晨鹏','2016223045164','237203435@qq.com','研一','2017-01-01','13500000000',0,'','image_head/head7.jpg'),(5,'qilingyun','faccdfbd7a234251fcb70ef80a5a5d9a','齐凌云','2015223040074','1223865610@qq.com','研二','2017-01-01','13500000000',0,'','image_head/head7.jpg'),(6,'404619844','e928b7b6b35af1635176a6473c24f045','李政志','2014223040115','aaronlzz@qq.com','研三','2017-01-01','13500000000',0,'','image_head/head7.jpg'),(7,'chen','8aa7f8937f7f7036c5e230deaaae19e3','陈新义','2015223045183','907303458@qq.com','研二','2017-01-01','13500000000',0,'','image_head/head7.jpg'),(8,'王思雅','54b61741237e8c968fbc203509a00c9c','王思雅','2015223040080','2451305642@qq.com','研二','2017-01-01','13500000000',0,'','image_head/head7.jpg');
UNLOCK TABLES;

DROP TABLE IF EXISTS `preuserinfo`;
CREATE TABLE `preuserinfo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `chinaname` varchar(20) NOT NULL DEFAULT '' COMMENT '汉语名字',
  `stuno` varchar(20) NOT NULL DEFAULT '' COMMENT '学号',
  `grade` varchar(10) NOT NULL DEFAULT '' COMMENT '年级',
  `status` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '状态-用于软删除 0未删除，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `preuserinfo` WRITE;
INSERT INTO `preuserinfo` VALUES (1,'陈攀','2016223045183','研一'),(3,'邱晨鹏','2016223045164','研一'),(4,'袁玲','2016223040019','研一'),(5,'王莎莎','2016223040085','研一'),(6,'吴振中','','研三'),(7,'陈新义','2015223045183','研二'),(8,'黄潇逸','','本科'),(9,'侯明正','','研三'),(10,'李海波','','研三'),(11,'李政志','2014223040115','研三'),(12,'林颖','','本科'),(13,'刘森','','本科'),(14,'王思雅','','研二'),(15,'王雅婷','','研三'),(16,'闫秋芳','','本科'),(17,'于奥运','','研二'),(18,'张博弈','','研三'),(19,'赵朝华','','研三'),(20,'周璟','','本科'),(21,'周真真','','研三'),(22,'齐凌云','2015223040074','研二'),(23,'谢宜江','','研一'),(24,'赵洋','','本科');
UNLOCK TABLES;

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT 'head1',
  `src` varchar(255) NOT NULL DEFAULT 'resource/image_head/head1.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


LOCK TABLES `image` WRITE;
INSERT INTO `image` VALUES (1,'head1','resource/image_head/head1.jpg'),(2,'head2','resource/image_head/head2.jpg'),(3,'head3','resource/image_head/head3.jpg'),(4,'head4','resource/image_head/head4.jpg'),(5,'head5','resource/image_head/head5.jpg'),(6,'head6','resource/image_head/head6.jpg'),(7,'head7','resource/image_head/head7.jpg');
UNLOCK TABLES;



