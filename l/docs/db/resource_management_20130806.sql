/*
SQLyog Ultimate v9.01 
MySQL - 5.0.24a-community-nt : Database - resource_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`resource_management` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `resource_management`;

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL auto_increment,
  `resource_name` varchar(250) default NULL,
  `description` varchar(1000) default NULL,
  PRIMARY KEY  (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

insert  into `permissions`(`permission_id`,`resource_name`,`description`) values (1,'viewemployeedetail','Link on admin dashboard to view users details'),(2,'index','Dashboard of admin'),(3,'viewnotification','Link to view user activity on admin dashboard'),(4,'viewstats','Link to view stats of user'),(5,'manageusers','Link to manage user page on admin panel'),(6,'employeeactivity','Link to view user activity in detail');

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `role_permission_id` int(11) NOT NULL auto_increment,
  `role_id` int(11) default NULL COMMENT 'Foreign key to the roles table',
  `permission_id` int(11) default NULL COMMENT 'Foreign key to the permissions table',
  PRIMARY KEY  (`role_permission_id`),
  KEY `FK_roles` (`role_id`),
  KEY `FK_permissions` (`permission_id`),
  CONSTRAINT `FK_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`),
  CONSTRAINT `FK_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(250) default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_name`) values (1,'Super Admin'),(2,'Admin'),(3,'HR'),(4,'TL/Manager'),(5,'Employee');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_role_id` int(10) NOT NULL auto_increment,
  `role_id` int(11) default NULL COMMENT 'Foreign key to the roles table',
  `user_id` int(11) default NULL COMMENT 'Foreign key to the user table',
  PRIMARY KEY  (`user_role_id`),
  KEY `FK_role` (`role_id`),
  CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
