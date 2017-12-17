-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for symfony3
CREATE DATABASE IF NOT EXISTS `symfony3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `symfony3`;

-- Dumping structure for table symfony3.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4A1B2A925E237E06` (`name`),
  KEY `IDX_4A1B2A924296D31F` (`genre_id`),
  CONSTRAINT `FK_4A1B2A924296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table symfony3.books: ~2 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `genre_id`, `name`, `description`, `author`, `price`, `quantity`, `image`, `year`) VALUES
	(1, 3, 'Political Order and Political Decay - From the Industrial Revolution to the Globalization of Democracy', 'Volume two is finally here, completing the most important work of political thought in at least a generation. Taking up the essential question of how societies develop strong, impersonal, and accountable political institutions, Fukuyama follows the story from the French Revolution to the so-called Arab Spring and the deep dysfunctions of contemporary American politics. He examines the effects of corruption on governance, and why some societies have been successful at rooting it out. He explores the different legacies of colonialism in Latin America, Africa, and Asia, and offers a clear-eyed account of why some regions have thrived and developed more quickly than others. And he boldly reckons with the future of democracy in the face of a rising global middle class and entrenched political paralysis in the West.', 'Francis Fukuyama', 17.50, 5, 'political_order.jpg', 2015),
	(2, 11, 'Gordon Ramsay\'s Home Cooking: Everything You Need to Know to Make Fabulous Food', 'Based on a new cooking show, this book will give experienced as well as novice cooks the desire, confidence and inspiration to get cooking. Ramsay will offer simple, accessible recipes with a "wow" factor. Gordon has travelled the world from India and the Far East to LA and Europe, and the recipes in this book will draw all these culinary influences together to show us simple, vibrant and delicious recipes that reflect the way we eat today. For example: Miso braised salmon fillet with Asian vegetables, Pork and Bacon slider with home made bbq sauce, Curried Sweetcorn Soup, Wild Mushroom Risotto Arrancini, and Baked Lemon Cheesecake with Raspberries', 'Gordon Ramsay', 27.99, 3, 'gordon_ramsay_home_cooking.jpg', 2013);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table symfony3.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A8EBE5165E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table symfony3.genres: ~12 rows (approximately)
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` (`id`, `name`) VALUES
	(1, 'Art'),
	(4, 'Children\'s'),
	(12, 'Comics'),
	(11, 'Cookbooks'),
	(2, 'Drama'),
	(8, 'Encyclopedias'),
	(6, 'Fantasy'),
	(5, 'History'),
	(7, 'Mystery'),
	(3, 'Politics'),
	(10, 'Romance'),
	(9, 'Science Fiction');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;

-- Dumping structure for table symfony3.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B63E2EC75E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table symfony3.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(2, 'ROLE_ADMIN'),
	(3, 'ROLE_EDITOR'),
	(1, 'ROLE_USER');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table symfony3.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `initial_cash` int(11) NOT NULL,
  `spent_money` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table symfony3.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `initial_cash`, `spent_money`, `is_enabled`) VALUES
	(21, 'lazar_admin', 'lazar@stanev.com', '$2y$13$IiRB4.kNSmwiFf3WFuVYSOV0YWbdLMVIFUcPvoHSZXiDYT45a4NOC', 120, 0, 1),
	(22, 'jane90', 'jane90@mail.com', '$2y$13$GECxBWkZIdKzw4H82kOvhOnWgrqgIUd.XmHDMwC8RxJTD6ZWCHcbC', 100, 0, 1),
	(23, 'Barry', 'barry@white.com', '$2y$13$3cveOR2jydKnH4RVtx1wg.q4BAA5bbtYcnfL6/YolKGjaSOHBmdxC', 0, 0, 0),
	(24, 'Marry', 'maria@abv.bg', '$2y$13$0i.PM9m2xv1P14/mggrVouu6CexClW4uvM3BDpC7n/PXKTmkk.kje', 230, 120, 1),
	(25, 'Larry', 'larry@page.com', '$2y$13$nIiKtZa8qjX99omJCddGNOriYOc0nw1mQQS8t3NeJZv3.ADDGeR2K', 500, 0, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table symfony3.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_54FCD59FA76ED395` (`user_id`),
  KEY `IDX_54FCD59FD60322AC` (`role_id`),
  CONSTRAINT `FK_54FCD59FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  CONSTRAINT `FK_54FCD59FD60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table symfony3.user_roles: ~5 rows (approximately)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
	(21, 2),
	(22, 1),
	(22, 2),
	(23, 1),
	(24, 1),
	(25, 1);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
