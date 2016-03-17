ALTER TABLE `resource_management`.`users` DROP COLUMN `uid`,
 DROP COLUMN `profileURL`,
 DROP COLUMN `photoURL`,
 ADD COLUMN `username` VARCHAR(100) AFTER `phone_number`;