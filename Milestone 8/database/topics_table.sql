CREATE TABLE `topics_table` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 `slug` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL UNIQUE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;