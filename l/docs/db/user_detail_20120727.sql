ALTER TABLE `resource_management`.`user_detail` CHANGE COLUMN `position` `position_id` INTEGER UNSIGNED DEFAULT NULL,
 ADD CONSTRAINT `FK_position_id` FOREIGN KEY `FK_position_id` (`position_id`)
    REFERENCES `position` (`position_id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;