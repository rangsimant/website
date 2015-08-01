-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: postcenter
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client_page`
--

DROP TABLE IF EXISTS `client_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_page` (
  `cp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `facebook_id` int(10) unsigned DEFAULT NULL,
  `cp_access_token` varchar(300) DEFAULT NULL,
  `cp_status` enum('on','off') NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cp_id`),
  UNIQUE KEY `user_id_facebook_id_UNIQUE` (`user_id`,`facebook_id`),
  KEY `cp_status_IDX` (`cp_status`),
  KEY `cp_facebook_id_FK_idx` (`facebook_id`),
  CONSTRAINT `cp_facebook_id_FK` FOREIGN KEY (`facebook_id`) REFERENCES `facebook_page` (`facebook_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cp_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_page`
--

LOCK TABLES `client_page` WRITE;
/*!40000 ALTER TABLE `client_page` DISABLE KEYS */;
INSERT INTO `client_page` VALUES (1,1,5,'CAAPDcLHVDgsBAOpeayqqerWNeWWIgxZAReFmcEqtO78RtlsFl0ulXQzC8gsl0kgybfL3CgOuAqW5qZC7A3bWxbymQwSZBiL4QlHv0kQ0l8ZCNTl4pTmWLesxsAQq8yTGAMM2pgprNy1ctBfJKDQdrNWstod2wqTSZBwVAEjvOkHmJkmHUnEdnganE8f3XGEsaZCJGh6hZA3ZAwZDZD','off','2015-07-21 18:29:15','2015-08-01 16:43:32'),(2,1,2,'CAAPDcLHVDgsBAMJ35HBD3dH6IZApjLhb3rEOQaRIfhZBGd0889UFcO3JgZAZA1OzHqElowlCIcRJSZB2ozXGEZBlZBZCDyMo3oAEiYRlibFD4yTuvhhUawFfk8sqFlgOlotNs20sFZBeiZCUr8sZBdkiaPlMOIPHtFL75aIQPAAPaebS2oIhIYpEz5oj94l7cepZCF4p2JwA3SZBsiAZDZD','off','2015-07-21 18:29:15','2015-08-01 16:43:33'),(3,1,1,'CAAPDcLHVDgsBALEvU2VFSU8uRflhXtfZB29KarECXcqFeS2m6nYu3N1vvXuznKD0EtOZAE672QJEWGqSkeHv2sfNPdTZBbpaQjVp3JqZCRil9X7CE2RZA99fxJWfMXXkB0D4MoiJk2FwpPnalkwXuVMG2QMVW9B0TnjXDMHVfs4JIZApcXg1MYkxFYPnqd2EjFMPZBfnxARbQZDZD','on','2015-07-21 18:29:15','2015-08-01 16:43:27'),(4,1,3,'CAAPDcLHVDgsBAHRtk4CZBIfpE23a4MoVi7icL2ZBRZCZCqAGqbQSOnjZCQoOu0jYEbZAB3kR4976pqqwtZBeZClnMRrjplYybDZCBs1ZAXE1sxiQezAZBqtHWGHeq4LwwFZAX2b4vsyzBGKNLfZAZBW2maq3w6AQVLedt4b0hChT53AGGoF031HY0oIwodSlcM0tQkTnUD2SILMvPGEgZDZD','on','2015-07-21 18:29:15','2015-08-01 16:43:27'),(5,1,4,'CAAPDcLHVDgsBANckmIoZC75Y5dPZAlVH02wLk87eubDOuF5JFzZAIM02uuJIHEQIZCFZBM0QD9ZAArDiLn1OVtx17uNjr1BuIOhj9cQZAnB65NvgqFlqsH0efV3xgjfAja5C4PfaB7H2ZAKTW9jJ0WS5DIkXvL3nKb4RSMpm34q7B3My55p8hrdvRrdPlbfOsbKDpNWIB14vXgZDZD','on','2015-07-21 18:29:15','2015-08-01 16:43:27');
/*!40000 ALTER TABLE `client_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebook_page`
--

DROP TABLE IF EXISTS `facebook_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebook_page` (
  `facebook_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook_page_id` varchar(20) NOT NULL,
  `facebook_page_name` varchar(150) DEFAULT NULL,
  `facebook_page_url_image` text,
  `facebook_page_likes` int(7) NOT NULL DEFAULT '0',
  `facebook_page_category` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `timestamp` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`facebook_id`,`updated_at`),
  KEY `facebook_page_category_IDX` (`facebook_page_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebook_page`
--

LOCK TABLES `facebook_page` WRITE;
/*!40000 ALTER TABLE `facebook_page` DISABLE KEYS */;
INSERT INTO `facebook_page` VALUES (1,'798513066932534','POSTcenter','https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/10405420_798560976927743_3296343678049304352_n.png?oh=fa90cc240d7d681afe40fd8713547657&oe=5611D8A2&__gda__=1448748051_f91324abcbe76cec0d1bbcb9342dbd07',1,'Company','2015-06-05 06:26:03','2015-07-29 12:49:10','2015-06-13 22:17:44'),(2,'126671027409292','GamingArtisticalTeam','https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfa1/v/t1.0-9/398529_252636851479375_1259088956_n.jpg?oh=b948da90a8dc2e0529d72179e79626d5&oe=56440686&__gda__=1443826703_9e9f9f3a136550bf8a3869d81e4b8cec',592,'Studio','2015-06-05 06:26:03','2015-07-29 12:49:10','2015-06-13 22:17:44'),(3,'1424541431112910','Upgrade Team E-Sport','https://scontent.xx.fbcdn.net/hphotos-xpf1/t31.0-8/1956977_1443745285859191_614717137_o.png',1,'Community','2015-06-05 06:26:03','2015-07-29 12:49:10','2015-06-13 22:17:44'),(4,'614891491917192','HON TOP 10 Thailand','https://scontent.xx.fbcdn.net/hphotos-xfp1/l/t31.0-8/1556441_614891938583814_2108984707_o.png',0,'Community','2015-06-05 06:26:03','2015-07-29 12:49:10','2015-06-20 17:21:17'),(5,'1414073948833175','WRTest','https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xft1/t31.0-8/10457463_1506880519552517_6017447698224021335_o.jpg',5,'Community','2015-06-05 06:26:03','2015-07-29 12:49:10','2015-06-20 17:21:18'),(6,'1023876954307862','BEING A PAPA','https://scontent.xx.fbcdn.net/hphotos-xat1/v/t1.0-9/10888379_1023877370974487_1306216812924326782_n.jpg?oh=d7fcc6531985d4dbe7d5d2ba64f28a05&oe=562EF9A4',9,'Community','2015-06-05 10:33:48','2015-06-09 16:31:12','2015-06-20 17:21:19');
/*!40000 ALTER TABLE `facebook_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned DEFAULT NULL,
  `post_social_id` varchar(20) DEFAULT NULL,
  `post_type` enum('post','comment','reply') NOT NULL,
  `post_channel` enum('facebook','instagram','twitter','line') NOT NULL,
  `post_created_at` timestamp NULL DEFAULT NULL,
  `post_body` text,
  `post_link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_social_id_UNIQUE` (`post_social_id`,`post_channel`),
  KEY `post_social_id_IDX` (`post_social_id`),
  KEY `post_type_IDX` (`post_type`),
  KEY `post_channel_IDX` (`post_channel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@postcenter.com','$2y$10$adfldjND5Rs3B4HMp6Kp2.eXuy9g9b1fEyeNcdN0PIu9SWTXc9E26','kXfeHuufVOWOGdkGsNlnL4sp8jlp45E1lLAaepZJNpYXDrjYKSXbHc3m0zJ0','2015-06-03 08:45:51','2015-07-20 19:31:21'),(2,'sunnysun','sunnysun@postcenter.com','$2y$10$XOxwTfkQr8mL7Kcra.cNveznRXzyxaPBYF6/IbFkzGBgLCNt1QZay','2am2WJN2L0TQHnNVSuyXsDXy3yXBnGR4Auu5h8awIxnOkevmvUW4KtIRelYG','2015-06-03 08:45:51','2015-06-05 04:52:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-02  1:28:49
