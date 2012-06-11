/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.1.33-community : Database - carnival
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`carnival` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `oders` */

DROP TABLE IF EXISTS `oders`;

CREATE TABLE `oders` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `modified_user_id` char(36) DEFAULT NULL,
  `created_by` char(36) DEFAULT NULL,
  `description` text,
  `deleted` tinyint(1) DEFAULT '0',
  `assigned_user_id` char(36) DEFAULT NULL,
  `quanity` int(10) DEFAULT NULL,
  `standard_of_hotel` varchar(255) DEFAULT NULL,
  `price_of_meal` decimal(26,6) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `tour_id` char(36) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `quocgia` varchar(255) DEFAULT NULL,
  `maso` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `sofacsmile` varchar(255) DEFAULT NULL,
  `ngaykhoihanh` date DEFAULT NULL,
  `songuoilon` int(11) DEFAULT '0',
  `thongtintreem` text,
  `songaydi` int(11) DEFAULT '0',
  `vungtau` tinyint(1) DEFAULT '0',
  `cantho` tinyint(1) DEFAULT '0',
  `chaudoc` tinyint(1) DEFAULT '0',
  `cuchi` tinyint(1) DEFAULT '0',
  `dalat` tinyint(1) DEFAULT '0',
  `hochiminh` tinyint(1) DEFAULT '0',
  `tayninh` tinyint(1) DEFAULT '0',
  `dbscl` tinyint(1) DEFAULT '0',
  `phuquoc` tinyint(1) DEFAULT '0',
  `danang` tinyint(1) DEFAULT '0',
  `hoian` tinyint(1) DEFAULT '0',
  `hue` tinyint(1) DEFAULT '0',
  `myson` tinyint(1) DEFAULT '0',
  `nhatrang` tinyint(1) DEFAULT '0',
  `ninhbinh` tinyint(1) DEFAULT '0',
  `muine` tinyint(1) DEFAULT '0',
  `quynhon` tinyint(1) DEFAULT '0',
  `buonmethuot` tinyint(1) DEFAULT '0',
  `catba` tinyint(1) DEFAULT '0',
  `dienbienphu` tinyint(1) DEFAULT '0',
  `fansipan` tinyint(1) DEFAULT '0',
  `haiphong` tinyint(1) DEFAULT '0',
  `halong` tinyint(1) DEFAULT '0',
  `hanoi` tinyint(1) DEFAULT '0',
  `langson` tinyint(1) DEFAULT '0',
  `sapa` tinyint(1) DEFAULT '0',
  `chontour` text,
  `angkor` tinyint(1) DEFAULT '0',
  `kampongthom` tinyint(1) DEFAULT '0',
  `kampot` tinyint(1) DEFAULT '0',
  `kep` tinyint(1) DEFAULT '0',
  `bienho` tinyint(1) DEFAULT '0',
  `kampong` tinyint(1) DEFAULT '0',
  `phnompenh` tinyint(1) DEFAULT '0',
  `noikhac_cam` text,
  `hongsa` tinyint(1) DEFAULT '0',
  `luangprabang` tinyint(1) DEFAULT '0',
  `oudomxai` tinyint(1) DEFAULT '0',
  `samnua` tinyint(1) DEFAULT '0',
  `vangvieng` tinyint(1) DEFAULT '0',
  `houayxai` tinyint(1) DEFAULT '0',
  `muongsinh` tinyint(1) DEFAULT '0',
  `pakse` tinyint(1) DEFAULT '0',
  `sananakhet` tinyint(1) DEFAULT '0',
  `vientiane` tinyint(1) DEFAULT '0',
  `khongisland` tinyint(1) DEFAULT '0',
  `namngundam` tinyint(1) DEFAULT '0',
  `phongsali` tinyint(1) DEFAULT '0',
  `xiengkhouang` tinyint(1) DEFAULT '0',
  `noikhac_lao` text,
  `maybay` tinyint(1) DEFAULT '0',
  `xehoiorbus` tinyint(1) DEFAULT '0',
  `tauhoa` tinyint(1) DEFAULT '0',
  `xemay` tinyint(1) DEFAULT '0',
  `bicycling` tinyint(1) DEFAULT '0',
  `hilltribe` tinyint(1) DEFAULT '0',
  `culture` tinyint(1) DEFAULT '0',
  `kayaking` tinyint(1) DEFAULT '0',
  `diving` tinyint(1) DEFAULT '0',
  `filming` tinyint(1) DEFAULT '0',
  `trekking` tinyint(1) DEFAULT '0',
  `tieuchuankhachsan` varchar(100) DEFAULT NULL,
  `loaiphong` varchar(100) DEFAULT NULL,
  `single_` varchar(255) DEFAULT NULL,
  `double_` varchar(255) DEFAULT NULL,
  `twin` varchar(255) DEFAULT NULL,
  `triple` varchar(255) DEFAULT NULL,
  `extrabed` varchar(255) DEFAULT NULL,
  `ansang` tinyint(1) DEFAULT '0',
  `antrua` tinyint(1) DEFAULT '0',
  `antoi` tinyint(1) DEFAULT '0',
  `thongtinchuyendi` text,
  `nguonthongtin` varchar(100) DEFAULT NULL,
  `nguonthongtin2` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sihanoukville` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `oders` */

insert  into `oders`(`id`,`name`,`date_entered`,`date_modified`,`modified_user_id`,`created_by`,`description`,`deleted`,`assigned_user_id`,`quanity`,`standard_of_hotel`,`price_of_meal`,`time`,`phone`,`tour_id`,`diachi`,`quocgia`,`maso`,`sodienthoai`,`sofacsmile`,`ngaykhoihanh`,`songuoilon`,`thongtintreem`,`songaydi`,`vungtau`,`cantho`,`chaudoc`,`cuchi`,`dalat`,`hochiminh`,`tayninh`,`dbscl`,`phuquoc`,`danang`,`hoian`,`hue`,`myson`,`nhatrang`,`ninhbinh`,`muine`,`quynhon`,`buonmethuot`,`catba`,`dienbienphu`,`fansipan`,`haiphong`,`halong`,`hanoi`,`langson`,`sapa`,`chontour`,`angkor`,`kampongthom`,`kampot`,`kep`,`bienho`,`kampong`,`phnompenh`,`noikhac_cam`,`hongsa`,`luangprabang`,`oudomxai`,`samnua`,`vangvieng`,`houayxai`,`muongsinh`,`pakse`,`sananakhet`,`vientiane`,`khongisland`,`namngundam`,`phongsali`,`xiengkhouang`,`noikhac_lao`,`maybay`,`xehoiorbus`,`tauhoa`,`xemay`,`bicycling`,`hilltribe`,`culture`,`kayaking`,`diving`,`filming`,`trekking`,`tieuchuankhachsan`,`loaiphong`,`single_`,`double_`,`twin`,`triple`,`extrabed`,`ansang`,`antrua`,`antoi`,`thongtinchuyendi`,`nguonthongtin`,`nguonthongtin2`,`email`,`sihanoukville`) values ('45aef469-85fe-7bc6-99cb-4e3bb7c8f062','Sugar CRM Viet Nam','2011-08-05 09:28:18','2011-08-16 04:41:51','1','1',NULL,1,'1',20,'3','50000.000000','3 ngay 2 dem','08732453434','f1e6a7ef-4a7a-d153-7e1e-4e3b510d1204',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),('47560e1f-339a-05ad-b53b-4e49e8190802','Lê Gia Thành','2011-08-16 03:47:10','2011-08-16 04:41:30','1','1',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'binhduong','VIETNAM','001','0977971775',NULL,'2011-08-18',2,'1',10,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,'Singapore',1,0,0,0,1,0,0,NULL,0,0,0,0,0,0,0,0,1,0,0,0,0,0,NULL,1,1,0,0,1,1,0,0,0,0,0,'standard','standard',NULL,'1',NULL,NULL,NULL,1,1,1,NULL,'baochi','google','legiathanh1990@gmail.com',0),('8083d778-988a-98e7-5472-4e49e8a92559','Lê Gia Thành','2011-08-16 03:48:21','2011-08-16 04:41:30','1','1',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'binhduong','VIETNAM','001','0977971775',NULL,'2011-08-17',2,NULL,10,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,0,1,0,1,0,0,1,'Singapore',1,0,0,0,1,0,0,NULL,1,0,0,0,0,0,0,0,1,0,0,0,0,0,NULL,1,1,0,0,1,1,0,0,0,0,0,'standard','standard',NULL,'1',NULL,NULL,NULL,1,1,1,NULL,'baochi','google','legiathanh1990@gmail.com',0),('c16c5c0e-e851-62c0-97d7-4e49e86c695a','Lê Gia Thành','2011-08-16 03:49:25','2011-08-16 04:41:30','1','1',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vietnam',NULL,NULL,NULL,NULL,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,0),('ae396e0d-8c4b-55dd-89cf-4e49f5e5080f','Lê Gia Thành','2011-08-16 04:44:07','2011-08-16 04:44:07','1','1',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'binhduong','VIETNAM','001','0977971775',NULL,'2011-08-17',2,NULL,10,1,0,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,1,0,1,0,1,0,0,1,NULL,1,0,0,0,0,0,1,NULL,1,1,0,0,0,0,1,0,0,0,0,0,0,1,NULL,1,1,0,0,1,1,0,0,1,0,0,'standard','standard',NULL,'1',NULL,NULL,NULL,1,1,1,NULL,'baochi','google','legiathanh1990@gmail.com',0),('677159dd-9c61-534b-d23c-4e70652acdf8','Công ty Sugarcrm Việt Nam','2011-09-14 08:28:48','2011-09-14 08:28:48','1','1',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'VIETNAM',NULL,'085345321344',NULL,'2011-09-14',4,NULL,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,'contact@sugarcrm.com.vn',0),('39816696-4129-8622-e4fd-4e798ea1da96','Test 3','2011-09-21 07:12:40','2011-09-21 07:12:40','1','1',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'VIETNAM',NULL,NULL,NULL,NULL,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,0);

/*Table structure for table `oders_audit` */

DROP TABLE IF EXISTS `oders_audit`;

CREATE TABLE `oders_audit` (
  `id` char(36) NOT NULL,
  `parent_id` char(36) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `field_name` varchar(100) DEFAULT NULL,
  `data_type` varchar(100) DEFAULT NULL,
  `before_value_string` varchar(255) DEFAULT NULL,
  `after_value_string` varchar(255) DEFAULT NULL,
  `before_value_text` text,
  `after_value_text` text,
  KEY `idx_oders_primary` (`id`),
  KEY `idx_oders_parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `oders_audit` */

/*Table structure for table `oders_cstm` */

DROP TABLE IF EXISTS `oders_cstm`;

CREATE TABLE `oders_cstm` (
  `id_c` char(36) NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `oders_cstm` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
