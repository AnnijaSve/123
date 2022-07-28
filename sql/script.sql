USE test;
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'a@a.lv', '$2y$10$CS0QhFMWqWPo4OPZRZxWPeN6Cc/34lmOipXIA1TK.ZOY3baStyPGO')
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

