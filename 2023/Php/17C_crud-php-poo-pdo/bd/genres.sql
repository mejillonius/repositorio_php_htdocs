DROP DATABASE IF EXISTS moviesbd;
CREATE DATABASE  moviesbd
    DEFAULT CHARACTER SET = 'utf8mb4';
USE moviesbd;


/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `actor_movie`
--


DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ranking` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `genres_ranking_unique` (`ranking`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'2016-07-04 03:00:00',NULL,'Comedia',1,1),(2,'2014-07-04 03:00:00',NULL,'Terror',2,1),(3,'2013-07-04 03:00:00',NULL,'Drama',3,1),(4,'2011-07-04 03:00:00',NULL,'Accion',4,1),(5,'2010-07-04 03:00:00',NULL,'Ciencia Ficcion',5,1),(6,'2013-07-04 03:00:00',NULL,'Suspenso',6,1),(7,'2005-07-04 03:00:00',NULL,'Animacion',7,1),(8,'2003-07-04 03:00:00',NULL,'Aventuras',8,1),(9,'2008-07-04 03:00:00',NULL,'Documental',9,1),(10,'2013-07-04 03:00:00',NULL,'Infantiles',10,1),(11,'2011-07-04 03:00:00',NULL,'Fantasia',11,1),(12,'2013-07-04 03:00:00',NULL,'Musical',12,1);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;

