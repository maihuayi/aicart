CREATE TABLE IF NOT EXISTS `#__seecoupon_logs`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) unsigned NOT NULL,
	`coupon_id` int(11) unsigned NOT NULL,
	`coupon_code` varchar(255) NOT NULL DEFAULT '',
	`created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;