ALTER TABLE `wp_users` ADD (
   `last_name` varchar(100) NOT NULL default '',
   `first_name` varchar(100) NOT NULL default '',
   `in_access_token` VARCHAR(200) NOT NULL default '',
   `in_token_expire` VARCHAR(100) NOT NULL default ''
)

CREATE TABLE IF NOT EXISTS `wp_user_cookie` (
  `user_cookie_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_token` varchar(100),
  `user_ip` varchar(100),
  `user_mac` varchar(100),
  `user_agent` varchar(100),
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`user_cookie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

