-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.20


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema resource_management
--

CREATE DATABASE IF NOT EXISTS resource_management;
USE resource_management;

--
-- Definition of table `resource_management`.`level`
--

DROP TABLE IF EXISTS `resource_management`.`level`;
CREATE TABLE  `resource_management`.`level` (
  `level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(45) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`level`
--

/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `resource_management`.`level` (`level_id`,`level_name`) VALUES 
 (1,'Beginner'),
 (2,'Intermediate'),
 (3,'Expert');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;


--
-- Definition of table `resource_management`.`position`
--

DROP TABLE IF EXISTS `resource_management`.`position`;
CREATE TABLE  `resource_management`.`position` (
  `position_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`position`
--

/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `resource_management`.`position` (`position_id`,`position`) VALUES 
 (1,'Assistant Manager- Accounts'),
 (2,'Business Analyst'),
 (3,'Data entry operator'),
 (4,'Graphic Designer'),
 (5,'Marketing & Promotion Executive'),
 (6,'Jr. System Engineer'),
 (7,'Recruitment Specialist'),
 (8,'Software Engineer'),
 (9,'Sourcing Specialist'),
 (10,'Sr. Project Manager'),
 (11,'Sr. Software Developer'),
 (12,'Sr. Software Engineer'),
 (13,'Sr. System Administrator'),
 (14,'System Administrator'),
 (15,'Team Lead'),
 (16,'Tech Lead'),
 (17,'Test Engineer'),
 (18,'Web Designer'),
 (19,'Web Developer');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;


--
-- Definition of table `resource_management`.`skills`
--

DROP TABLE IF EXISTS `resource_management`.`skills`;
CREATE TABLE  `resource_management`.`skills` (
  `skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(45) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`skills`
--

/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (1,'.NET Framework 2.0'),
 (2,'3D Max'),
 (3,'ABAP'),
 (4,'Abinitio'),
 (5,'Active Directory'),
 (6,'ActiveX'),
 (7,'ADO.NET'),
 (8,'Adobe Illustrator'),
 (9,'Adobe Pagemaker'),
 (10,'Adobe Photoshop'),
 (11,'AIX'),
 (12,'AJAX'),
 (13,'ALE'),
 (14,'Ansys'),
 (15,'Apache'),
 (16,'Apache Tomcat'),
 (17,'AS 400'),
 (18,'ASIC'),
 (19,'ASP'),
 (20,'ASP.NET'),
 (21,'Assembly Language'),
 (22,'ATL'),
 (23,'Auto CAD'),
 (24,'Automation Testing'),
 (25,'BAAN'),
 (26,'BASIC'),
 (27,'Bluetooth'),
 (28,'BPEL'),
 (29,'Business Objects'),
 (30,'C'),
 (31,'C#'),
 (32,'C++'),
 (33,'CAD/CAM'),
 (34,'CATIA'),
 (35,'CCIE'),
 (36,'CDMA'),
 (37,'CICS'),
 (38,'CISCO'),
 (39,'Cobol'),
 (40,'Cognos'),
 (41,'ColdFusion'),
 (42,'COM/COM+/DCOM'),
 (43,'CORBA'),
 (44,'CoreJava'),
 (45,'Corel Draw'),
 (46,'Crystal Report'),
 (47,'CSS'),
 (48,'Data Structures'),
 (49,'Database'),
 (50,'Datastage'),
 (51,'Datawarehousing'),
 (52,'DB2'),
 (53,'DBASE'),
 (54,'DCA');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (55,'Delphi'),
 (56,'Developer 2000'),
 (57,'DHCP'),
 (58,'DNS'),
 (59,'Documentum'),
 (60,'Dreamweaver'),
 (61,'DSP'),
 (62,'DTP'),
 (63,'Eclipse'),
 (64,'EJB'),
 (65,'Embedded C'),
 (66,'ERP'),
 (67,'Ethernet'),
 (68,'Expeditor'),
 (69,'FileNet'),
 (70,'Finacle'),
 (71,'Firewall'),
 (72,'FireWorks'),
 (73,'Flash'),
 (74,'Flex'),
 (75,'Flexcube'),
 (76,'Focus'),
 (77,'ForTran'),
 (78,'FoxPro'),
 (79,'FPGA'),
 (80,'FreeBSD'),
 (81,'FTP'),
 (82,'GSM'),
 (83,'Hibernate'),
 (84,'HP UNIX'),
 (85,'HTML/DHTML'),
 (86,'Hyperion'),
 (87,'Ibatis'),
 (88,'Ideas'),
 (89,'IIS'),
 (90,'Impromptu'),
 (91,'IMS'),
 (92,'Informatica'),
 (93,'Installshield'),
 (94,'ISDN'),
 (95,'ITIL'),
 (96,'J2EE'),
 (97,'J2ME'),
 (98,'J2SE'),
 (99,'Java'),
 (100,'Java Swing'),
 (101,'JavaScript'),
 (102,'JBoss'),
 (103,'JCL'),
 (104,'JDBC'),
 (105,'JIRA'),
 (106,'JSF'),
 (107,'JSP'),
 (108,'LAN'),
 (109,'LINQ'),
 (110,'Linux'),
 (111,'LIS'),
 (112,'Loadrunner');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (113,'Lotus Notes'),
 (114,'Mac OS'),
 (115,'Mainframes'),
 (116,'Manual Testing'),
 (117,'MATLAB'),
 (118,'Maximo'),
 (119,'Maya'),
 (120,'MCP'),
 (121,'MCSA'),
 (122,'MCSE'),
 (123,'MFC'),
 (124,'Microsoft Access'),
 (125,'Microsoft Excel'),
 (126,'Microsoft Exchange'),
 (127,'Microsoft Office'),
 (128,'MicroStation'),
 (129,'MS Access'),
 (130,'MS Project'),
 (131,'MS Visio'),
 (132,'Ms-dos'),
 (133,'MSCIT'),
 (134,'Multimedia'),
 (135,'Multithreading'),
 (137,'MySQL'),
 (138,'Natural Adabas'),
 (139,'Netcool'),
 (140,'Networking'),
 (141,'Nortel'),
 (142,'Novell'),
 (143,'OOPS'),
 (144,'Operating Systems'),
 (145,'Oracle'),
 (146,'Oracle Apps'),
 (147,'Oracle WareHouse Builder'),
 (148,'ORCAD'),
 (149,'PASCAL'),
 (150,'Peoplesoft'),
 (151,'Perl'),
 (152,'PHP'),
 (153,'PL/1'),
 (154,'PL/SQL'),
 (155,'postgreSQL'),
 (156,'PowerBuilder'),
 (157,'PowerPlay'),
 (158,'Primavera'),
 (159,'Pro-C'),
 (160,'PRO-E'),
 (161,'Progress 4GL');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (162,'Python'),
 (163,'QTP'),
 (164,'RedHat/Linux'),
 (165,'Remedy'),
 (166,'Remoting'),
 (167,'REXX'),
 (168,'RMI'),
 (169,'Routing'),
 (170,'RTOS'),
 (171,'SAP'),
 (172,'SAP Basis'),
 (173,'SAP BW/BI'),
 (174,'SAP CRM'),
 (175,'SAP EP'),
 (176,'SAP HR'),
 (177,'SAP IS-Retail'),
 (178,'SAP MDM'),
 (179,'SAP MM'),
 (180,'SAP PM'),
 (181,'SAP PP'),
 (182,'SAP PS'),
 (183,'SAP QM'),
 (184,'SAP SCM'),
 (185,'SAP SD'),
 (186,'SAP Security'),
 (188,'SAP SEM'),
 (189,'SAP SRM'),
 (190,'SAP WMS'),
 (191,'SAP XI'),
 (192,'SAS'),
 (193,'SCADA'),
 (194,'Shell Script'),
 (195,'Siebel'),
 (196,'Silverlight'),
 (197,'SMARTY'),
 (198,'SMTP'),
 (199,'Solaris'),
 (200,'Spring'),
 (201,'SPSS'),
 (202,'SQL Server'),
 (203,'Struts'),
 (204,'Sybase'),
 (205,'Symbian'),
 (206,'T-SQL'),
 (207,'Tally'),
 (208,'TCL/TK'),
 (209,'TCP/IP'),
 (210,'TELNET'),
 (211,'Teradata'),
 (212,'Tibco'),
 (213,'TOAD'),
 (214,'UML'),
 (215,'UniGraphics'),
 (216,'Unix');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (217,'VB.NET'),
 (218,'Verilog'),
 (219,'Vignette'),
 (220,'Vision Plus'),
 (221,'Visual Basic'),
 (222,'Visual C++'),
 (223,'Visual Foxpro'),
 (224,'VLSI'),
 (225,'VOIP'),
 (226,'VPN'),
 (227,'VSAT'),
 (228,'VxWorks'),
 (229,'WAN'),
 (230,'WAP'),
 (231,'WCF'),
 (232,'WebLogic'),
 (233,'WebSphere'),
 (234,'Windows 2K/XP'),
 (235,'Winform'),
 (236,'Winrunner'),
 (237,'WML'),
 (238,'WPF'),
 (239,'XHTML'),
 (240,'XML'),
 (241,'ANDROID'),
 (242,'ASSEMBLER'),
 (243,'DJANGO'),
 (244,'DWDM'),
 (245,'EIGRP'),
 (246,'HDLC'),
 (247,'ITSM'),
 (248,'LDAP'),
 (249,'MPLS'),
 (250,'MVS'),
 (251,'PDH'),
 (252,'Radius'),
 (253,'RPG'),
 (254,'SDH'),
 (255,'VSAM'),
 (256,'jQuery'),
 (257,'DOJO'),
 (258,'Cloud computing'),
 (259,'Ruby on Rails'),
 (260,'Waterfall'),
 (261,'SOAP'),
 (262,'REST'),
 (263,'Silverlight'),
 (264,'VMWare'),
 (265,'Citrix'),
 (266,'Confirmit'),
 (267,'Nebu'),
 (268,'Quantum'),
 (269,'Dimensions'),
 (270,'CATI'),
 (271,'Joomla');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (272,'OS Commerce'),
 (273,'Magento'),
 (274,'Drupal'),
 (275,'Cake PHP'),
 (276,'Zend'),
 (277,'CodeIgniter'),
 (278,'Yii'),
 (279,'WordPress'),
 (280,'Symfony'),
 (281,'ROR'),
 (282,'Smarty'),
 (283,'SugarCRM'),
 (284,'Zen Cart'),
 (285,'VirtueMart'),
 (286,'RIFE'),
 (287,'Stripes'),
 (288,'Jasper'),
 (289,'Servlet'),
 (290,'Spring MVC'),
 (291,'Spring Roo'),
 (292,'Grails'),
 (293,'Birt'),
 (294,'Itext'),
 (295,'Seam'),
 (296,'GWT'),
 (297,'OpenXava'),
 (298,'Spring AOP'),
 (299,'Maven'),
 (300,'Tomcat'),
 (301,'GlassFish'),
 (302,'SqlLite'),
 (303,'DWR( Direct Web Remoting)'),
 (304,'JSON'),
 (305,'iPhone'),
 (306,'Windows Mobile'),
 (307,'Blackberry'),
 (308,'.NET Framework 3.0'),
 (309,'.NET Framework 3.5'),
 (310,'.NET Framework 4.0'),
 (311,'ASP.NET MVC 1'),
 (312,'ASP.NET MVC 2'),
 (313,'ASP.NET MVC 3'),
 (314,'ASP.NET MVC 4'),
 (315,'SharePoint'),
 (316,'NHibernate'),
 (317,'Web Service'),
 (318,'Windows Service'),
 (319,'Illustrator');
INSERT INTO `resource_management`.`skills` (`skill_id`,`skill_name`) VALUES 
 (320,'White Box Testing'),
 (321,'Black Box Testing'),
 (323,'Selenium 1.0'),
 (324,'Selenium 2.0'),
 (325,'JMeter'),
 (326,'ANT'),
 (327,'POI'),
 (328,'Wicket'),
 (329,'Tapestry'),
 (330,'Mobile App Testing'),
 (331,'System Administration');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;


--
-- Definition of table `resource_management`.`user_detail`
--

DROP TABLE IF EXISTS `resource_management`.`user_detail`;
CREATE TABLE  `resource_management`.`user_detail` (
  `user_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exp_years` int(10) unsigned DEFAULT NULL,
  `exp_months` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`user_detail_id`),
  KEY `FK_user_id` (`user_id`),
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`user_detail`
--

/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_detail` ENABLE KEYS */;


--
-- Definition of table `resource_management`.`user_skills_detail`
--

DROP TABLE IF EXISTS `resource_management`.`user_skills_detail`;
CREATE TABLE  `resource_management`.`user_skills_detail` (
  `user_skills_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `skill_id` int(10) unsigned DEFAULT NULL,
  `exp_months` int(10) unsigned DEFAULT NULL,
  `last_used_year` int(10) unsigned DEFAULT NULL,
  `last_used_month` int(10) unsigned DEFAULT NULL,
  `level_id` int(10) unsigned DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_varified` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_skills_detail_id`),
  KEY `FK_userId` (`user_id`),
  KEY `FK_skillId` (`skill_id`),
  KEY `FK_levelId` (`level_id`),
  CONSTRAINT `FK_userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_levelId` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  CONSTRAINT `FK_skillId` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`user_skills_detail`
--

/*!40000 ALTER TABLE `user_skills_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_skills_detail` ENABLE KEYS */;


--
-- Definition of table `resource_management`.`users`
--

DROP TABLE IF EXISTS `resource_management`.`users`;
CREATE TABLE  `resource_management`.`users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `emp_id` int(10) unsigned DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_admin` bigint(20) unsigned DEFAULT NULL,
  `is_active` bigint(20) unsigned DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_management`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
