ALTER TABLE `wp_users` ADD (
   `last_name` varchar(100) NOT NULL default '',
   `first_name` varchar(100) NOT NULL default '',
   `in_access_token` VARCHAR(200) NOT NULL default '',
   `in_token_expire` VARCHAR(100) NOT NULL default ''
)
