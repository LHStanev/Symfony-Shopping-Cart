-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.1.26-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for symfony3
CREATE DATABASE IF NOT EXISTS `symfony3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `symfony3`;

-- Дъмп структура за таблица symfony3.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4A1B2A925E237E06` (`name`),
  KEY `IDX_4A1B2A924296D31F` (`genre_id`),
  CONSTRAINT `FK_4A1B2A924296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.books: ~16 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `genre_id`, `name`, `description`, `author`, `price`, `quantity`, `image`, `year`) VALUES
	(1, 3, 'Political Order and Political Decay - From the Industrial Revolution to the Globalization of Democracy', 'Volume two is finally here, completing the most important work of political thought in at least a generation. Taking up the essential question of how societies develop strong, impersonal, and accountable political institutions, Fukuyama follows the story from the French Revolution to the so-called Arab Spring and the deep dysfunctions of contemporary American politics. He examines the effects of corruption on governance, and why some societies have been successful at rooting it out. He explores the different legacies of colonialism in Latin America, Africa, and Asia, and offers a clear-eyed account of why some regions have thrived and developed more quickly than others. And he boldly reckons with the future of democracy in the face of a rising global middle class and entrenched political paralysis in the West.', 'Francis Fukuyama', 18.50, 7, '1.jpg', 2015),
	(2, 11, 'Gordon Ramsay\'s Home Cooking: Everything You Need to Know to Make Fabulous Food', 'Based on a new cooking show, this book will give experienced as well as novice cooks the desire, confidence and inspiration to get cooking. Ramsay will offer simple, accessible recipes with a "wow" factor. Gordon has travelled the world from India and the Far East to LA and Europe, and the recipes in this book will draw all these culinary influences together to show us simple, vibrant and delicious recipes that reflect the way we eat today. For example: Miso braised salmon fillet with Asian vegetables, Pork and Bacon slider with home made bbq sauce, Curried Sweetcorn Soup, Wild Mushroom Risotto Arrancini, and Baked Lemon Cheesecake with Raspberries', 'Gordon Ramsay', 29.99, 4, '2.jpg', 2013),
	(3, 7, 'The Green Mile', 'The Green Mile is a 1996 serial novel written by Stephen King. It tells the story of death row supervisor Paul Edgecombe\'s encounter with John Coffey, an unusual inmate who displays inexplicable healing and empathetic abilities. The serial novel was originally released in six volumes before being republished as a single volume work. The book is an example of magical realism.', 'Stephen King', 20.00, 15, '3.jpg', 1996),
	(4, 2, 'To Kill a Mockinbird', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.', 'Harper Lee', 11.50, 12, '4.jpg', 1961),
	(5, 6, 'The Lord of the Rings I', 'A fantastic starter set for new Tolkien fans or readers interested in rediscovering the magic of Middle-earth, this three-volume box set features paperback editions of the complete trilogy -- The Fellowship of the Ring, The Two Towers, and The Return of the King -- each with art from the New Line Productions feature film on the cover.', ' J.R.R. Tolkien', 22.00, 13, '5.jpg', 2005),
	(6, 6, 'Harry Potter and the Deathly Hallows', 'It\'s no longer safe for Harry at Hogwarts, so he and his best friends, Ron and Hermione, are on the run. Professor Dumbledore has given them clues about what they need to do to defeat the dark wizard, Lord Voldemort, once and for all, but it\'s up to them to figure out what these hints and suggestions really mean.', 'J.K. Rowling,', 10.50, 5, '6.jpg', 2005),
	(7, 7, 'The Alienist', 'When The Alienist was first published in 1994, it was a major phenomenon, spending six months on the New York Times bestseller list, receiving critical acclaim, and selling millions of copies. This modern classic continues to be a touchstone of historical suspense fiction for readers everywhere.', 'Caleb Carr', 8.20, 11, '7.jpg', 1896),
	(8, 7, 'The Name of the Rose', 'It is the year 1327. Franciscans in an Italian abbey are suspected of heresy, but Brother William of Baskerville’s investigation is suddenly overshadowed by seven bizarre deaths. Translated by William Weaver. A Helen and Kurt Wolff Book', 'Umberto Eco', 17.00, 12, '8.jpg', 1996),
	(9, 4, 'The Invention of Hugo Carbet', 'Orphan, clock keeper, and thief, Hugo lives in the walls of a busy Paris train station, where his survival depends on secrets and anonymity. But when his world suddenly interlocks with an eccentric, bookish girl and a bitter old man who runs a toy booth in the station, Hugo\'s undercover life, and his most precious secret, are put in jeopardy. A cryptic drawing, a treasured notebook, a stolen key, a mechanical man, and a hidden message from Hugo\'s dead father form the backbone of this intricate, tender, and spellbinding mystery.', 'Brian Selznick', 6.00, 20, '9.jpg', 2007),
	(10, 4, 'The Stone Keeper', 'Graphic novel star Kazu Kibuishi creates a world of terrible, man-eating demons, a mechanical rabbit, a giant robot---and two ordinary children on a life-or-death mission.', 'Kazu Kibuishi ', 6.50, 14, '10.jpg', 2008),
	(11, 12, 'The complete Maus', 'Combined for the first time here are Maus I: A Survivor\'s Tale and Maus II - the complete story of Vladek Spiegelman and his wife, living and surviving in Hitler\'s Europe. By addressing the horror of the Holocaust through cartoons, the author captures the everyday reality of fear and is able to explore the guilt, relief and extraordinary sensation of survival - and how the children of survivors are in their own way affected by the trials of their parents. A contemporary classic of immeasurable significance.', 'Art Spiegelman', 7.00, 14, '11.jpg', 2003),
	(12, 12, 'Watchmen', 'This Hugo Award-winning graphic novel chronicles the fall from grace of a group of super-heroes plagued by all-too-human failings. Along the way, the concept of the super-hero is dissected as the heroes are stalked by an unknown assassin. One of the most influential graphic novels of all time and a perennial best-seller, Watchmen has been studied on college campuses across the nation and is considered a gateway title, leading readers to other graphic novels such as V for Vendetta, Batman: The Dark Knight Returns and The Sandman series.', 'Alan Moore', 12.00, 0, '12.jpg', 2005),
	(13, 5, 'The Rise and Fall of the Third Reich: A History of Nazi Germany', 'Hitler boasted that The Third Reich would last a thousand years. It lasted only 12. But those 12 years contained some of the most catastrophic events Western civilization has ever known.\r\nNo other powerful empire ever bequeathed such mountains of evidence about its birth and destruction as the Third Reich. When the bitter war was over, and before the Nazis could destroy their files, the Allied demand for unconditional surrender produced an almost hour-by-hour record of the nightmare empire built by Adolph Hitler. This record included the testimony of Nazi leaders and of concentration camp inmates, the diaries of officials, transcripts of secret conferences, army orders, private letters—all the vast paperwork behind Hitler\'s drive to conquer the world.\r\n\r\nThe famed foreign correspondent and historian William L. Shirer, who had watched and reported on the Nazis since 1925, spent five and a half years sifting through this massive documentation. The result is a monumental study that has been widely acclaimed as the definitive record of one of the most frightening chapters in the history of mankind.\r\n\r\nThis worldwide bestseller has been acclaimed as the definitive book on Nazi Germany; it is a classic work.\r\n\r\nThe accounts of how the United States got involved and how Hitler used Mussolini and Japan are astonishing, and the coverage of the war-from Germany\'s early successes to her eventual defeat-is must reading', 'William L. Shirer', 30.00, 4, '13.jpg', 1990),
	(14, 5, 'Team of Rivals: The Political Genius of Abraham Lincoln', 'The life and times of Abraham Lincoln have been analyzed and dissected in countless books. Do we need another Lincoln biography? In Team of Rivals, esteemed historian Doris Kearns Goodwin proves that we do. Though she can\'t help but cover some familiar territory, her perspective is focused enough to offer fresh insights into Lincoln\'s leadership style and his deep understanding of human behavior and motivation. Goodwin makes the case for Lincoln\'s political genius by examining his relationships with three men he selected for his cabinet, all of whom were opponents for the Republican nomination in 1860: William H. Seward, Salmon P. Chase, and Edward Bates. These men, all accomplished, nationally known, and presidential, originally disdained Lincoln for his backwoods upbringing and lack of experience, and were shocked and humiliated at losing to this relatively obscure Illinois lawyer. Yet Lincoln not only convinced them to join his administration--Seward as secretary of state, Chase as secretary of the treasury, and Bates as attorney general--he ultimately gained their admiration and respect as well. How he soothed egos, turned rivals into allies, and dealt with many challenges to his leadership, all for the sake of the greater good, is largely what Goodwin\'s fine book is about. Had he not possessed the wisdom and confidence to select and work with the best people, she argues, he could not have led the nation through one of its darkest periods. \r\n\r\nTen years in the making, this engaging work reveals why "Lincoln\'s road to success was longer, more tortuous, and far less likely" than the other men, and why, when opportunity beckoned, Lincoln was "the best prepared to answer the call." This multiple biography further provides valuable background and insights into the contributions and talents of Seward, Chase, and Bates. Lincoln may have been "the indispensable ingredient of the Civil War," but these three men were invaluable to Lincoln and they played key roles in keeping the nation intact. --Shawn Carkonen', 'Doris Kearns Goodwin', 18.00, 18, '14.jpg', 2006),
	(15, 6, 'A Game of Thrones', 'As Warden of the north, Lord Eddard Stark counts it a curse when King Robert bestows on him the office of the Hand. His honour weighs him down at court where a true man does what he will, not what he must … and a dead enemy is a thing of beauty.\r\n\r\nThe old gods have no power in the south, Stark’s family is split and there is treachery at court. Worse, the vengeance-mad heir of the deposed Dragon King has grown to maturity in exile in the Free Cities. He claims the Iron Throne.', 'George R.R. Martin', 23.00, 8, '15.jpg', 2005),
	(16, 6, 'Eragon', 'Eragon and the fledgling dragon must navigate the dangerous terrain and dark enemies of an empire ruled by a king whose evil knows no bounds. Can Eragon take up the mantle of the legendary Dragon Riders?\r\n\r\nWhen Eragon finds a polished blue stone in the forest, he thinks it is the lucky discovery of a poor farm boy; perhaps it will buy his family meat for the winter. But when the stone brings a dragon hatchling, Eragon realizes he has stumbled upon a legacy nearly as old as the Empire itself. Overnight his simple life is shattered, and he is thrust into a perilous new world of destiny, magic, and power. With only an ancient sword and the advice of an old storyteller for guidance, Eragon and the fledgling dragon must navigate the dangerous terrain and dark enemies of an Empire ruled by a king whose evil knows no bounds. Can Eragon take up the mantle of the legendary Dragon Riders? The fate of the Empire may rest in his hands. . . .', 'Christopher Paolini', 9.99, 24, '16.jpg', 2005);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A8EBE5165E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.genres: ~13 rows (approximately)
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

-- Дъмп структура за таблица symfony3.promotions
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EA1B30344296D31F` (`genre_id`),
  KEY `IDX_EA1B303453C674EE` (`offer_id`),
  CONSTRAINT `FK_EA1B30344296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `FK_EA1B303453C674EE` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.promotions: ~1 rows (approximately)
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` (`id`, `genre_id`, `offer_id`, `discount`, `startDate`, `endDate`) VALUES
	(1, 12, NULL, 10, '2017-12-19 22:13:45', '2017-12-20 22:13:53');
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6970EB0F16A2B381` (`book_id`),
  KEY `IDX_6970EB0FA76ED395` (`user_id`),
  CONSTRAINT `FK_6970EB0F16A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_6970EB0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.reviews: ~4 rows (approximately)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `book_id`, `user_id`, `body`, `createdOn`) VALUES
	(1, 11, 23, 'Very Interesting book. I liked in very much.', '2017-12-19 16:15:03'),
	(2, 11, 25, 'Very Interesting book. I liked in very much.', '2017-12-19 16:15:59'),
	(4, 16, 24, 'Amazing book! I read it for two days. Very interesting.', '2017-12-19 16:41:03'),
	(5, 10, 21, 'THis is an awesome book. I liked it very much.', '2017-12-19 17:02:21'),
	(6, 15, 25, 'Amazing book!', '2017-12-20 16:06:04'),
	(7, 15, 27, 'I liked it very much.', '2017-12-21 18:01:14');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B63E2EC75E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(2, 'ROLE_ADMIN'),
	(3, 'ROLE_EDITOR'),
	(1, 'ROLE_USER');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.users
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `initial_cash`, `spent_money`, `is_enabled`) VALUES
	(21, 'lazar_admin', 'lazar@stanev.com', '$2y$13$IiRB4.kNSmwiFf3WFuVYSOV0YWbdLMVIFUcPvoHSZXiDYT45a4NOC', 120, 0, 1),
	(23, 'Barry', 'barry@white.com', '$2y$13$3cveOR2jydKnH4RVtx1wg.q4BAA5bbtYcnfL6/YolKGjaSOHBmdxC', 0, 0, 1),
	(24, 'Marry', 'maria88@abv.bg', '$2y$13$0i.PM9m2xv1P14/mggrVouu6CexClW4uvM3BDpC7n/PXKTmkk.kje', 230, 120, 1),
	(25, 'Larry', 'larry@page.com', '$2y$13$nIiKtZa8qjX99omJCddGNOriYOc0nw1mQQS8t3NeJZv3.ADDGeR2K', 500, 181, 1),
	(26, 'anonymous', 'anonymous@anonymous.com', 'no_password', 0, 0, 1),
	(27, 'Garry', 'garry@lineker.com', '$2y$13$7Ts1P8jlqr/5UpmbtrUBQe3q82F6MlvmcFbS1.SHSc1mcbeTyXCd6', 600, 89, 1),
	(28, 'Sally', 'sally@specter.com', '$2y$13$.bQ7fLu0qoQ7Nn7S/6m.zekpR0Pi3JNu4iuwnsbd5ZuZqW5wQKORW', 100, 0, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.user_orders
CREATE TABLE IF NOT EXISTS `user_orders` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`book_id`),
  KEY `IDX_807DE6D3A76ED395` (`user_id`),
  KEY `IDX_807DE6D316A2B381` (`book_id`),
  CONSTRAINT `FK_807DE6D316A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_807DE6D3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.user_orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_orders` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.user_purchases
CREATE TABLE IF NOT EXISTS `user_purchases` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`book_id`),
  KEY `IDX_AA84BC1AA76ED395` (`user_id`),
  KEY `IDX_AA84BC1A16A2B381` (`book_id`),
  CONSTRAINT `FK_AA84BC1A16A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_AA84BC1AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.user_purchases: ~8 rows (approximately)
/*!40000 ALTER TABLE `user_purchases` DISABLE KEYS */;
INSERT INTO `user_purchases` (`user_id`, `book_id`) VALUES
	(25, 5),
	(25, 11),
	(25, 12),
	(25, 16),
	(27, 13),
	(27, 14),
	(27, 15),
	(27, 16);
/*!40000 ALTER TABLE `user_purchases` ENABLE KEYS */;

-- Дъмп структура за таблица symfony3.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_54FCD59FA76ED395` (`user_id`),
  KEY `IDX_54FCD59FD60322AC` (`role_id`),
  CONSTRAINT `FK_54FCD59FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_54FCD59FD60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дъмп данни за таблица symfony3.user_roles: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
	(21, 2),
	(23, 1),
	(24, 3),
	(25, 1),
	(27, 2),
	(28, 1);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
