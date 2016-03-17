SET @privilege_name = "getusersprofilestatus";
SET @privilege_desc = "Get profile status of all users";
SET @Resource_name="admin";
SET @display_name="Users Profile Status";
INSERT INTO `permissions` (`privilage`,`description`,`resource`, `display_name`) VALUES (@privilege_name, @privilege_desc, @Resource_name, @display_name);
SET @permission_id = LAST_INSERT_ID();
INSERT INTO `role_permissions` (`role_id`,`permission_id`, `allow`) VALUES ('1', @permission_id, 'Y');  