CREATE TABLE IF NOT EXISTS `#__aicart_categories`(
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`parent_id` int(11) unsigned NOT NULL,
	`title` int(11) unsigned NOT NULL,
	`alias` varchar(255) NOT NULL DEFAULT '',
	`description` mediumtext NOT NULL,
	`ordering` int(11) NOT NULL DEFAULT '0',
	`images` text NOT NULL,
	`metakey` text NOT NULL,
	`metadesc` text NOT NULL,
	`access` int(10) unsigned NOT NULL DEFAULT '0',
	`metadata` text NOT NULL,
	`language` char(7) NOT NULL,
	`published` tinyint(3) NOT NULL DEFAULT '0',
	`created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` int(10) unsigned NOT NULL DEFAULT '0',
	`created_by_alias` varchar(255) NOT NULL,
	`modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` int(10) unsigned NOT NULL DEFAULT '0',
	`checked_out` int(10) unsigned NOT NULL DEFAULT '0',
	`checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS `#__aicart_products` (

) DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS `#__aicart_product_categories` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`product_id` int(11) unsigned NOT NULL,
	`category_id` int(11) unsigned NOT NULL,
	`ordering` int(11) unsigned NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;

