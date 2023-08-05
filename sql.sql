/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 5.7.40 : Database - carpooling
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `carpooling`;

/*Table structure for table `carbrand` */

CREATE TABLE `carbrand` (
  `cb_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cb_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `carbrand` */

insert  into `carbrand`(`cb_id`,`cb_name`) values 
(1,'Toyota'),
(2,'Daihatsu');

/*Table structure for table `carmodel` */

CREATE TABLE `carmodel` (
  `cm_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cm_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `carmodel` */

insert  into `carmodel`(`cm_id`,`cm_name`) values 
(1,'Fortuner'),
(2,'Avanza'),
(3,'Veloz'),
(4,'Agya');

/*Table structure for table `cars` */

CREATE TABLE `cars` (
  `c_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `car_id` varchar(20) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ready_status` enum('yes','no') DEFAULT 'yes',
  `last_startdate` datetime DEFAULT NULL,
  `last_enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `cars` */

insert  into `cars`(`c_id`,`car_id`,`brand`,`model`,`price`,`ready_status`,`last_startdate`,`last_enddate`) values 
(1,'DP1019UF','1','1',100000,'yes','2023-08-05 16:00:00','2023-08-10 00:00:00'),
(2,'B0001','2','2',300000,'yes','2023-08-05 17:00:00','2023-08-06 00:00:00'),
(3,'B0002','1','3',50000,'yes','2023-08-05 18:00:00','2023-08-07 02:00:00'),
(4,'B9000','2','4',100000,'yes',NULL,NULL);

/*Table structure for table `failed_jobs` */

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `request` */

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `status` enum('1','2','3','4','5','6','7') DEFAULT NULL,
  `car_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `request` */

insert  into `request`(`id`,`start_date`,`end_date`,`user_id`,`status`,`car_id`) values 
(4,'2023-08-05 17:00:00','2023-08-06 17:00:00',6,'1',2),
(5,'2023-08-04 18:00:00','2023-08-07 02:00:00',6,'2',3);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactno` smallint(5) unsigned DEFAULT NULL,
  `licence` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `user_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_change` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `username` varchar(151) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(151) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`password`,`remember_token`,`created_at`,`updated_at`,`role`,`contactno`,`licence`,`address`,`user_status`,`is_change`,`username`,`email`) values 
(1,'User1','$2y$10$3W7Uhddim.cznMqlInxLnOhM38igYsBEXEaIgZoZP7h28w97rfF7S',NULL,NULL,NULL,'user',NULL,'1',NULL,'1','0',NULL,NULL),
(2,'Approval','$2y$10$XEwAn3DeclfwA6piXBpuyOy2GUHbi1SXOc.zdW3KBLNeQ0HiosV7C',NULL,NULL,NULL,'manager',NULL,'1',NULL,'1','0',NULL,NULL),
(3,'ga','$2y$10$XEwAn3DeclfwA6piXBpuyOy2GUHbi1SXOc.zdW3KBLNeQ0HiosV7C',NULL,NULL,NULL,'ga',NULL,'1',NULL,'1','0',NULL,NULL),
(6,'bacok tarraj','$2y$10$I/ecXFYTTj9BNQk7v5z1E.kew5HVtcCWt/3R4hnjStE2hVGxxtJ5C',NULL,NULL,NULL,'user',65535,'019900000','batusintaduk','1','0','bacok',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
