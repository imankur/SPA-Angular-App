USE `resource_management`;

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` varchar(5) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `state` */

insert  into `state`(`id`,`country_id`,`state`) values (1,'IN','Andaman and Nicobar'),(2,'IN','Andhra Pradesh'),(3,'IN','Arunachal Pradesh'),(4,'IN','Assam'),(5,'IN','Bihar'),(6,'IN','Chandigarh'),(7,'IN','Chhattisgarh'),(8,'IN','Dadra and Nagar Haveli'),(9,'IN','Daman and Diu'),(10,'IN','Delhi'),(11,'IN','Goa'),(12,'IN','Gujarat'),(13,'IN','Haryana'),(14,'IN','Himachal Pradesh'),(15,'IN','Jammu and Kashmir'),(16,'IN','Jharkhand'),(17,'IN','Karnataka'),(18,'IN','Kerala'),(19,'IN','Lakshadweep'),(20,'IN','Madhya Pradesh'),(21,'IN','Maharashtra'),(22,'IN','Manipur'),(23,'IN','Meghalaya'),(24,'IN','Mizoram'),(25,'IN','Nagaland'),(26,'IN','Orissa'),(27,'IN','Pondicherry'),(28,'IN','Punjab'),(29,'IN','Rajasthan'),(30,'IN','Sikkim'),(31,'IN','Tamil Nadu'),(32,'IN','Tripura'),(33,'IN','Uttar Pradesh'),(34,'IN','Uttaranchal'),(35,'IN','West Bengal');

/*Update Query for table `user_detail` */

ALTER TABLE `user_detail`
    ADD COLUMN  `present_address` varchar(50) DEFAULT NULL,
    ADD COLUMN  `present_city` varchar(20) DEFAULT NULL,
    ADD COLUMN  `present_state_id` int(10) DEFAULT NULL,
    ADD COLUMN  `present_pincode` varchar(10) DEFAULT NULL,
    ADD COLUMN  `permanent_address` varchar(50) DEFAULT NULL,
    ADD COLUMN  `permanent_city` varchar(20) DEFAULT NULL,
    ADD COLUMN  `permanent_state_id` int(10) DEFAULT NULL,
    ADD COLUMN `permanent_pincode` varchar(10) DEFAULT NULL,
    ADD CONSTRAINT  `FK_present_state` FOREIGN KEY (`present_state_id`) REFERENCES `state` (`id`) ON DELETE SET NULL,
    ADD CONSTRAINT  `FK_permanent_state` FOREIGN KEY (`permanent_state_id`) REFERENCES `state` (`id`) ON DELETE SET NULL; 