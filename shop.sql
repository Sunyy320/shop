/*
SQLyog v10.2 
MySQL - 5.6.17 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop`;

/*Table structure for table `deals` */

DROP TABLE IF EXISTS `deals`;

CREATE TABLE `deals` (
  `de_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `de_goodsid` int(11) NOT NULL,
  `de_salewxh` varchar(50) NOT NULL,
  `de_buywxh` varchar(50) NOT NULL,
  `de_time` varchar(50) NOT NULL,
  `de_flag` varchar(50) NOT NULL,
  PRIMARY KEY (`de_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `deals` */

insert  into `deals`(`de_id`,`de_goodsid`,`de_salewxh`,`de_buywxh`,`de_time`,`de_flag`) values (1,9,'1405010134','1405010131','1479729967','正在交易');

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `gd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gd_perwxh` varchar(50) NOT NULL,
  `gd_name` varchar(50) NOT NULL,
  `gd_des` text NOT NULL,
  `gd_img` varchar(100) NOT NULL,
  `gd_price` varchar(50) NOT NULL DEFAULT '0',
  `gd_categery` varchar(50) NOT NULL,
  `gd_time` varchar(50) NOT NULL,
  `gd_issale` tinyint(4) NOT NULL,
  `gd_support` int(11) NOT NULL DEFAULT '0',
  `gd_browse` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `goods` */

insert  into `goods`(`gd_id`,`gd_perwxh`,`gd_name`,`gd_des`,`gd_img`,`gd_price`,`gd_categery`,`gd_time`,`gd_issale`,`gd_support`,`gd_browse`) values (1,'1405010134','小太阳','本人已经大四，即将毕业，现有小太阳一个，使用只有一年，半新。可以在宿舍使用，如有意愿者请速联系我。','/shop/Public/img/5832cb9d816ab.jpg','20','电器办公','1479723933',1,20,0),(9,'1405010134','联想电脑','联想电脑，已经使用1年，现快毕业，低价甩卖，系统已经装好，欢迎骚扰','/shop/Public/img/5832df4b3026d.jpg','500','电器办公','1479728971',1,20,0),(8,'1405010134','插线板','插线板，已经使用2个月，线长2米，多个插孔，使用各个环境','/shop/Public/img/5832df0adc97f.jpg','10','电器办公','1479728906',1,20,0),(10,'1405010134','苹果手机2','苹果手机5s,因为手头拮据，卖出手机周转，手机性能良好，高像素','/shop/Public/img/5832dfaf52c0c.jpg','400','电器办公','1479729071',1,0,0),(11,'1405010134','红色小帽','红色小帽，女式，适合旅游出门，生活必备品，还未佩戴','/shop/Public/img/5832e0b57fac9.jpg','10','服装饰品','1479729333',1,0,0),(12,'1405010134','保暖毛衣','妈妈牌温暖毛衣，适合各种身材，超级温暖，欢迎联系，可以试穿','/shop/Public/img/5832e0f34e3e7.jpg','50','服装饰品','1479729395',1,0,0),(13,'1405010134','休闲黑包','男士休闲包，棕色，显瘦，耐脏，适合170cm-175cm的男生，欢迎试穿','/shop/Public/img/33c256a8-7bff-4c6b-8686-f209bbad1301.jpg','15.5','服装饰品','1479729477',1,20,0),(14,'1405010134','酷炫红包','酷炫红包，充满积极向上的气息，搭配牛仔裤非常好，快来选购吧','/shop/Public/img/e71099af-8a08-45f5-af16-4e8edf2f1bff.jpg','78','服装饰品','1479729553',1,20,0),(15,'1405010134','拉箱包','你是否还在为衣服太多而伤心，这个拉箱包为你制作，能装很多','/shop/Public/img/c2abb958-aca8-42f2-be52-ee1c072caec0.jpg','21','服装饰品','1479729617',1,20,0),(16,'1405010134','java课程设计','学习java的必选书籍，带你轻松入门，成为大神','/shop/Public/img/5832e23d68d38.jpg','20','书籍','1479729725',1,20,0),(17,'1405010134','php编程','超低的价格，但是书的质量确实超级高的，php快速入门，成为后端高手','/shop/Public/img/5832e293807d5.jpg','10','书籍','1479729811',1,20,0),(18,'1405010134','兰亭集序','喜欢写字的同学，一定要看看兰亭集序，看看王羲之的书法','/shop/Public/img/5832e2df8fb63.jpg','20','书籍','1479729887',1,20,0),(19,'1405010134','林语堂语录','一代大师林语堂，带你走进书的海洋。散文优美，真心推荐','/shop/Public/img/5832e32f91513.jpg','20','书籍','1479729967',1,0,0),(20,'1405010134','酷炫自行车','酷炫自行车，你值得拥有，再也不怕挤不上校车啦','/shop/Public/img/5832e38940c84.jpg','120','其他','1479730057',1,0,0),(21,'1405010134','索尼相机','一个外形好看的相机是一个淑女必需品，不要犹豫不要彷徨，下单吧','/shop/Public/img/1.jpg','100','其他','1479730131',1,20,0),(22,'1405010134','酷炫手表','挥泪甩卖，男生手表，给你冬天的温暖，最正确的时间','/shop/Public/img/2.jpg','15.5','其他','1479730240',1,21,0),(23,'1405010134','果汁机一台','女生最爱啊，果汁机，还可以喝豆浆，简单好看，还在犹豫什么','/shop/Public/img/3.jpg','45','其他','1479730322',1,22,0),(27,'1405010134','钱包','钱包还是新的','/shop/Public/img/1480757967.jpg','5','服装饰品','1480757967',1,0,0),(26,'1405010134','大猫','大猫很听话','/shop/Public/img/1480757806.jpg','25','其他','1480757806',1,0,0),(28,'1405010115','手机','非常好','/shop/Public/img/1480760909.jpg','1000','其他','1480760909',1,0,0);

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `mg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mg_from` varchar(50) NOT NULL,
  `mg_to` varchar(50) NOT NULL,
  `mg_parent` int(11) NOT NULL DEFAULT '0',
  `mg_gdid` int(11) NOT NULL,
  `mg_time` varchar(50) NOT NULL,
  `mg_cont` text NOT NULL,
  `mg_isread` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `messages` */

insert  into `messages`(`mg_id`,`mg_from`,`mg_to`,`mg_parent`,`mg_gdid`,`mg_time`,`mg_cont`,`mg_isread`) values (2,'1405010131','1405010134',0,13,'1479792196','电脑可以装到包里面吗？',1),(3,'1405010134','1405010131',2,13,'1479792196','可以的',0),(16,'1405010134','1405010131',14,13,'1479820872','已经最便宜了',0),(14,'1405010131','1405010134',0,13,'1479800313','可以再便宜一点吗',1),(20,'1405010131','1405010134',0,14,'1480571701','红包很好看',1),(21,'1405010134','1405010131',20,14,'1480572382','是的，快点购买吧',0),(22,'1405010131','1405010134',0,15,'1480590920','黑箱有多大',1),(27,'1405010131','1405010134',0,9,'1480591690','电脑好用吗',0),(26,'1405010134','1405010131',22,15,'1480591422','很大很大',0),(28,'1405010115','1405010134',0,13,'1480594588','你好',1),(29,'1405010115','1405010134',0,14,'1480594616','好好',0),(30,'1405010115','1405010134',0,13,'1480594627','嗯嗯',1),(31,'1405010115','1405010134',0,13,'1480594657','嗯嗯',0),(32,'1405010134','1405010115',28,13,'1480595161','好好',0),(33,'1405010134','1405010115',30,13,'1480595296','好好',0),(34,'1405010115','1405010134',0,8,'1480760778','在干嘛呀',0);

/*Table structure for table `person` */

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `per_name` varchar(50) NOT NULL,
  `per_studentid` varchar(50) NOT NULL,
  `per_img` varchar(50) NOT NULL,
  `per_marjor` varchar(50) NOT NULL,
  `per_class` varchar(100) NOT NULL,
  PRIMARY KEY (`per_studentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `person` */

insert  into `person`(`per_name`,`per_studentid`,`per_img`,`per_marjor`,`per_class`) values ('syy','1405010135','/shop/Public/img/head.jpg','计算机',''),('笨蛋','1405010133','/shop/Public/img/head.jpg','计算机',''),('孙袁袁','1405010134','http://zj.hkdxzs.top/1405010134.JPG','计算机科学与工程学院','14计算机1班'),('张钰','1405010131','http://zj.hkdxzs.top/1405010131.JPG','计算机科学与工程学院','14计算机1班'),('刘威','1405010115','http://zj.hkdxzs.top/1405010115.JPG','计算机科学与工程学院','14计算机1班'),('陈天赋','1405020315','http://zj.hkdxzs.top/1405020315.JPG','计算机科学与工程学院','14网络3班'),('李帅婷','1405010129','http://zj.hkdxzs.top/1405010129.JPG','计算机科学与工程学院','14计算机1班'),('韦芳','1405020326','http://zj.hkdxzs.top/1405020326.JPG','计算机科学与工程学院','14网络3班'),('符权','1505060122','http://shp.qpic.cn/bizmp/ibD5V6azEznWic2iclicjMnjP','计算机科学与工程学院','15软件工程1班'),('张雨','1505060115','http://shp.qpic.cn/bizmp/ibD5V6azEznVlL5u18KSq8ibY','计算机科学与工程学院','15软件工程1班');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
