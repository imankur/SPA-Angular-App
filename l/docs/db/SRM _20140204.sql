
USE `resource_management`;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_name`) values (1,'Super Admin'),(2,'Admin'),(3,'HR'),(4,'Manager'),(5,'TL'),(6,'Employee'),(7,'CEO');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilage` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `resource` varchar(250) DEFAULT NULL,
  `display_name` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

insert  into `permissions`(`permission_id`,`privilage`,`description`,`resource`,`display_name`,`priority`,`parent_id`) values (1,'viewemployeedetail','Link on admin dashboard to view users details','admin',NULL,NULL,NULL),(2,'index','Dashboard of admin','admin','Home',1,NULL),(3,'viewnotification','Link to view user activity on admin dashboard','admin',NULL,NULL,NULL),(4,'viewstats','Link to view status of user','admin','View Stats',6,NULL),(5,'manageusers','Link to manage user page on admin panel','admin','Manage Users',7,NULL),(6,'employeeactivity','Link to view user activity in detail and manage','admin',NULL,NULL,5),(7,'myprofile','Dashboard of user','admin','My Profile',2,6),(8,'viewdetails','Details of user','user','View Details',3,NULL),(9,'employeestats','Draw pie chart to view status of user in the organization','admin',NULL,NULL,NULL),(10,'updateprofile','Link to edit user profile','user','Edit Profile',4,NULL),(11,'updateskill','Link to edit user skills','user','Edit Skill',5,NULL),(12,'managerolepermission','View list of permission for roles','admin','Permissions',8,NULL),(13,'editrolepermission','Edit Permission of roles','admin',NULL,NULL,12),(15,'approveuseractivities','Approve user skills or changes','admin',NULL,NULL,12),(16,'manageuserrole','View List of User roles','admin',NULL,NULL,12),(17,'edituserrole','Edit roles of a user','admin',NULL,NULL,12),(18,'manageemployee','Manage Users in bulk','admin',NULL,NULL,5),(19,'addrole','Add New Role','admin',NULL,NULL,12),(20,'allreport','Timesheet Report','admin','Reports',9,NULL),(21,'report','User Timesheet Report','user','MyReport',10,NULL),(22,'reportdetail','Detailed Timesheet Report','user',NULL,NULL,21),(23,'viewbyuser','Timesheet Report for Particular User','admin',NULL,NULL,20),(24,'viewbydate','Timesheet Report for Particular Date','admin',NULL,NULL,20),(25,'getcsvfile','Timesheet Report in CSV File','admin',NULL,NULL,20),(26,'manageteam','Manage Team ','admin','Manage Team ',NULL,NULL),(27,'addteamlead','Add New Team Lead','admin',NULL,NULL,26),(28,'editteamusers','Add New User in Team','admin',NULL,NULL,26),(29,'deleteteamlead','Delete Team Leader','admin',NULL,NULL,26),(30,'viewtechstatus','Link to view Tech status of user','admin',NULL,NULL,NULL),(31,'employeetechstatus','Draw pie chart to view status of user in the organization based on Main Technology','admin',NULL,NULL,NULL),(32,'skilldetail','skill detail of user','admin',NULL,NULL,NULL),(33,'createpdf','create pdf','admin',NULL,NULL,NULL);

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `role_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT 'Foreign key to the roles table',
  `permission_id` int(11) DEFAULT NULL COMMENT 'Foreign key to the permissions table',
  `allow` enum('Y','N') NOT NULL,
  PRIMARY KEY (`role_permission_id`),
  KEY `FK_roles` (`role_id`),
  KEY `FK_permissions` (`permission_id`),
  CONSTRAINT `FK_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`),
  CONSTRAINT `FK_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1196 DEFAULT CHARSET=latin1;

/*Data for the table `role_permissions` */

insert  into `role_permissions`(`role_id`,`permission_id`,`allow`) values (4,7,'Y'),(4,21,'Y'),(4,22,'Y'),(3,20,'Y'),(3,23,'Y'),(3,24,'Y'),(3,25,'Y'),(3,21,'Y'),(3,22,'Y'),(7,21,'Y'),(7,22,'Y'),(6,8,'Y'),(6,10,'Y'),(6,11,'Y'),(6,21,'Y'),(6,22,'Y'),(1,1,'Y'),(1,2,'Y'),(1,3,'Y'),(1,4,'Y'),(1,5,'Y'),(1,6,'Y'),(1,7,'Y'),(1,9,'Y'),(1,12,'Y'),(1,13,'Y'),(1,15,'Y'),(1,16,'Y'),(1,17,'Y'),(1,18,'Y'),(1,19,'Y'),(1,20,'Y'),(1,23,'Y'),(1,24,'Y'),(1,25,'Y'),(1,26,'Y'),(1,27,'Y'),(1,28,'Y'),(1,29,'Y'),(1,8,'Y'),(1,10,'Y'),(1,11,'Y'),(1,21,'Y'),(1,22,'Y'),(5,5,'Y'),(5,6,'Y'),(5,7,'Y'),(5,18,'Y'),(5,20,'Y'),(5,23,'Y'),(5,24,'Y'),(5,25,'Y'),(5,8,'Y'),(5,10,'Y'),(5,11,'Y'),(5,21,'Y'),(5,22,'Y'),(6,7,'Y'),(1,30,'Y'),(1,31,'Y'),(1,32,'Y'),(1,33,'Y');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT 'Foreign key to the roles table',
  `user_id` int(11) NOT NULL COMMENT 'Foreign key to the user table',
  PRIMARY KEY (`user_role_id`),
  UNIQUE KEY `role_id` (`role_id`,`user_id`),
  CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`role_id`,`user_id`) values (1,16),(5,15),(6,15),(6,16),(6,17),(6,18),(6,19),(6,20),(6,21),(6,22),(6,23),(6,24),(6,25),(6,26),(6,27),(6,28),(6,29),(6,30),(6,31),(6,32),(6,33),(6,34),(6,35),(6,36),(6,37),(6,38),(6,39),(6,40),(6,41),(6,42),(6,43),(6,44),(6,45),(6,46),(6,47),(6,48),(6,49),(6,50),(6,51),(6,52),(6,53),(6,54),(6,55),(6,56),(6,57),(6,58),(6,59),(6,60),(6,61),(6,62),(6,63),(6,64),(6,65),(6,66),(6,67),(6,68),(6,69),(6,70),(6,71),(6,72),(6,73),(6,74),(6,75),(6,76),(6,77),(6,78),(6,79),(6,80),(6,81),(6,82),(6,83),(6,84),(6,85),(6,86),(6,87),(6,88),(6,89),(6,90),(6,91),(6,92),(6,93),(6,94),(6,95),(6,96),(6,97),(6,98),(6,99),(6,100),(6,101),(6,102),(6,103),(6,104),(6,105),(6,106),(6,107),(6,108),(6,109),(6,110),(6,111),(6,112);

/*Table structure for table `technology` */

DROP TABLE IF EXISTS `technology`;

CREATE TABLE `technology` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Technology` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `technology` */

insert  into `technology`(`id`,`Technology`) values (1,'Java'),(2,'.NET'),(3,'PHP');

/*Table structure for table `teamlead_users` */

DROP TABLE IF EXISTS `teamlead_users`;

CREATE TABLE `teamlead_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teamlead_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_teamlead_users` (`teamlead_id`),
  KEY `FK_users_teamlead` (`user_id`),
  CONSTRAINT `FK_teamlead_users` FOREIGN KEY (`teamlead_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_users_teamlead` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Update Query for table `user_detail` */

ALTER TABLE `user_detail`
    ADD COLUMN  `career_started` DATE DEFAULT NULL,
    ADD COLUMN  `career_synergy` DATE DEFAULT NULL,
    ADD COLUMN  `main_technology_id` INT(10) DEFAULT NULL,
    ADD CONSTRAINT `FK_main_technology` FOREIGN KEY (`main_technology_id`) 
REFERENCES `technology`(`id`); 