SET @privilege_name = "viewbydaterange";
SET @privilege_desc = "View reports for given date range";
SET @Resource_name="admin";
SET @display_name="View By Date Range";
INSERT INTO `permissions` (`privilage`,`description`,`resource`, `display_name`) VALUES (@privilege_name, @privilege_desc, @Resource_name, @display_name);
SET @permission_id = LAST_INSERT_ID();
INSERT INTO `role_permissions` (`role_id`,`permission_id`, `allow`) VALUES ('1', @permission_id, 'Y');


USE `resource_management`;

/*Table structure for table `holiday` */

DROP TABLE IF EXISTS `holiday`;

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_date` date NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `holiday` */

insert  into `holiday`(`id`,`holiday_date`,`description`) values (1,'2014-01-01','New Year'),(2,'2014-01-26','Republic Day'),(3,'2014-03-17','Holi'),(4,'2014-05-01','Maharashtra Day'),(5,'2014-08-15','Independance Day'),(6,'2014-08-29','Ganesh Chaturthi'),(7,'2014-10-02','Mahatma Gandhi Jayanti'),(8,'2014-10-03','Dusshera'),(9,'2014-10-05','Id-Ul-Zuha (Bakri id)'),(10,'2014-10-23','Diwali'),(11,'2014-10-24','Diwali (Padwa/Pratipada)'),(12,'2014-10-25','Bhai Duj'),(13,'2014-12-25','Christmas'),(14,'2013-01-01','New Year'),(15,'2013-01-26','Republic Day'),(16,'2013-03-27','Holi'),(17,'2013-04-11','Gudi padwa'),(18,'2013-05-01','Maharashtra Day'),(19,'2013-08-15','Independence Day'),(20,'2013-09-09','Ganesh Chaturthi'),(21,'2013-10-02','Mahatma Gandhi Jayanthi'),(22,'2013-10-16','Bakri Id'),(23,'2013-11-03','Diwali(Lakshmi Pujan)'),(24,'2013-11-04','Diwali (Padwa/Pratipada)'),(25,'2013-12-25','Christmas');
