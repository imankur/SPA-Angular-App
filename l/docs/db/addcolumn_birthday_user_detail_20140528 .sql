-- @ add column birthday in `resource_management`.`user_detail` 

ALTER TABLE `resource_management`.`user_detail` ADD COLUMN `birthday` DATE NULL AFTER `permanent_pincode`;