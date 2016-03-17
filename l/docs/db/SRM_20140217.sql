SET @privilege_name = "searchbydates";
SET @privilege_desc = "search users reports for a particular time period";
SET @Resource_name="admin";
SET @display_name="Search By Dates";
INSERT INTO `permissions` (`privilage`,`description`,`resource`, `display_name`) VALUES (@privilege_name, @privilege_desc, @Resource_name, @display_name);
SET @permission_id = LAST_INSERT_ID();
INSERT INTO `role_permissions` (`role_id`,`permission_id`, `allow`) VALUES ('1', @permission_id, 'Y');  


SET @privilege_name = "reportsearch";
SET @privilege_desc = "search  reports for a particular time period and user";
SET @Resource_name="admin";
SET @display_name="Search By Dates and users ";
INSERT INTO `permissions` (`privilage`,`description`,`resource`, `display_name`) VALUES (@privilege_name, @privilege_desc, @Resource_name, @display_name);
SET @permission_id = LAST_INSERT_ID();
INSERT INTO `role_permissions` (`role_id`,`permission_id`, `allow`) VALUES ('1', @permission_id, 'Y');  