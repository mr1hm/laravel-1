# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.29)
# Database: mfour
# Generation Time: 2020-02-27 00:19:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2019_08_19_000000_create_failed_jobs_table',1),
	(2,'2020_02_25_015222_create_myusers_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at`)
VALUES
	(1,'Kevin','Ihm','kevinihm2@gmail.com','2020-02-25 11:32:44','2020-02-26 19:47:15'),
	(2,'John','Smith','jsmith@example.com','2020-02-25 12:09:43',NULL),
	(3,'Jane1','Doe','jdoe@example.com','2020-02-25 12:09:59','2020-02-27 00:02:13'),
	(4,'Peter','Blade','pblade@users.com','2020-02-25 12:10:23',NULL),
	(5,'Jack','Frost','jackfrost@christmas.com','2020-02-25 12:10:47',NULL),
	(6,'Buzz','Lightyear','andbeyond@ts.com','2020-02-25 12:11:59',NULL),
	(7,'Harold','Klein','hklein1234@cool.com','2020-02-25 12:12:55',NULL),
	(8,'Liam','Clarke','clarkey@heroku.com','2020-02-25 23:32:54','2020-02-25 23:32:54'),
	(9,'Colm','Clarke','cclarkey@herok123.com','2020-02-25 23:37:39','2020-02-25 23:37:39'),
	(10,'Dane','Pastel','dmp@ca.com','2020-02-25 23:38:21','2020-02-25 23:38:21'),
	(13,'Friedrich','Nietzsche','fnietzsche@philosophy.com','2020-02-26 07:06:28','2020-02-26 07:06:28'),
	(16,'Taylor','Otwell','totwell@laravel.com','2020-02-26 07:16:07','2020-02-26 07:16:07'),
	(21,'Spider','Man','spidey@spider.com','2020-02-26 20:00:33','2020-02-26 20:00:33'),
	(22,'Spider2','Man','spidey2@spider.com','2020-02-26 20:01:20','2020-02-26 20:01:20'),
	(24,'Spider3','Man','spidey3@spider.com','2020-02-26 20:02:21','2020-02-26 20:02:21'),
	(26,'Spider4','Man','spidey4@spider.com','2020-02-26 20:02:51','2020-02-26 20:02:51'),
	(28,'Uzair','Ashraf','uzair.ashraf@aol.com','2020-02-26 22:55:31','2020-02-26 22:55:31'),
	(29,'apiTest','random','random1@one.com','2020-02-26 23:11:27','2020-02-26 23:11:27'),
	(31,'apiTest2','random2','random2@one.com','2020-02-26 23:14:31','2020-02-26 23:14:31'),
	(32,'hello','goodbye','test2@let.com','2020-02-26 23:17:55','2020-02-26 23:17:55'),
	(36,'hello','goodbye','test3@let.com','2020-02-26 23:19:38','2020-02-26 23:19:38'),
	(37,'hello','goodbye','test4@let.com','2020-02-26 23:22:16','2020-02-26 23:22:16');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
