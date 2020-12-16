CREATE TABLE `posts_table` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `user_id` int(11) DEFAULT NULL,
 `title` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 `slug` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL UNIQUE,
 `views` int(11) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '0',
 `image` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 `body` text COLLATE utf8_general_mysql500_ci NOT NULL,
 `published` tinyint(1) COLLATE utf8_general_mysql500_ci NOT NULL,
 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;