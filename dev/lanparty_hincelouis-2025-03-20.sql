-- MySQL dump 10.13  Distrib 8.0.39, for Win64 (x86_64)
--
-- Host: localhost    Database: lanparty_hincelouis
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `dateajout` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES (1,'JesusTeam','Notre but c\'est le paradis',NULL,'2025-02-27'),(2,'Les dudgbags','argh',NULL,'2025-02-27'),(3,'Les trilobites','Vive la mer',NULL,'2025-03-11'),(4,'les patates pilées','ca goute bon',NULL,'2025-03-11'),(5,'Les constipés','ca goute bon aussi',NULL,'2025-03-11');
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes_joueurs`
--

DROP TABLE IF EXISTS `equipes_joueurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipes_joueurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `joueur_id` int NOT NULL,
  `equipe_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `joueur_id` (`joueur_id`),
  KEY `equipe_id` (`equipe_id`),
  CONSTRAINT `equipes_joueurs_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueurs` (`id`),
  CONSTRAINT `equipes_joueurs_ibfk_2` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes_joueurs`
--

LOCK TABLES `equipes_joueurs` WRITE;
/*!40000 ALTER TABLE `equipes_joueurs` DISABLE KEYS */;
INSERT INTO `equipes_joueurs` VALUES (1,1,1),(2,2,2),(3,3,1),(4,8,4),(5,4,2),(6,5,3),(7,6,4),(8,7,5),(9,9,3),(10,10,5);
/*!40000 ALTER TABLE `equipes_joueurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `joueurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomfamille` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courriel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateinscription` datetime DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `courriel` (`courriel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joueurs`
--

LOCK TABLES `joueurs` WRITE;
/*!40000 ALTER TABLE `joueurs` DISABLE KEYS */;
INSERT INTO `joueurs` VALUES (1,'Pinsons','Gill','Pti Gill','Leptitgill@gmail.com','2020-03-19 10:17:31',1),(2,'plumes','moineau','levoleux','Ivol@gmail.com','2022-03-19 10:17:31',1),(3,'Hince','Louis','LouisJesusPrime','LouisJesusPrime@gmail.com','2025-03-11 11:17:40',NULL),(4,'Cream','Babouche','Le singe','monkey@gmail.com','2025-03-11 11:17:40',1),(5,'Hince','Sam','Bucky le trucker','TheTruckerKiller@gmail.com','2025-03-11 11:19:17',1),(6,'Porraws','Jock','Le priate','Jackmoineau@gmail.com','2025-03-16 11:20:47',1),(7,'Dunkman','Mylo','Best shooter','Dunkman@gmail.com','2025-03-07 11:21:34',1),(8,'Christ','Jesus','King','LeVraiJesus@gmail.com','2015-03-21 11:22:13',1),(9,'Morning Star','Lucifer','Le diable','LuciferMorningStar@gmail.com','2015-03-03 11:23:09',NULL),(10,'Potvin','Patouf','L\'osti de bs','Patouflatouf@gmail.com','2025-03-02 11:23:50',NULL);
/*!40000 ALTER TABLE `joueurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `h1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `accroche` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `texte` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `modification` datetime NOT NULL,
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (4,'a-propos.php','À propos du lanparty','des informations sur le lanparty','À Propos','',1,'Le jesus est le boss, le dude y creve pas enfeite. Moi je suis louis jesus Prime et je vais faire mon possible pour que LE jesus soit fier!','2025-03-18 17:42:57'),(3,'a-venir.php','Cette page du lanparty est à venir','cette page ne possède pas de contenue pour l\'instant','Page à venir','',1,'','2025-03-18 17:42:57'),(2,'détails-équipes.php','les détails d\'équipe du lanparty','tous les détails sur l\'équipe choisit','Les détails sur l\'équipe','',1,'','2025-03-18 17:33:45'),(1,'index.php','menu du lanparty','la page d\'acceuil du lanparty qui contient les cartes d\'équipes','Tableau de bord','',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem ut dolor malesuada aliquam. Fusce at blandit nulla, at luctus nunc. Etiam suscipit laoreet felis, at mattis metus tincidunt a. Aenean ac rutrum justo. Cras lacinia, nisi id gravida blandit, nunc ipsum congue risus, et euismod tellus urna ac metus.\r\n','2025-03-18 17:33:45'),(5,'resultats.php','Les résultats lanparty','Les résulats de chaques équipes du lanparty','Résultats','',1,'','2025-03-20 19:26:38');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultats`
--

DROP TABLE IF EXISTS `resultats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `equipe_id` int NOT NULL,
  `rang` int NOT NULL,
  `score_final` int NOT NULL,
  `date_partie` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_equipe_resultat` (`equipe_id`),
  CONSTRAINT `fk_equipe_resultat` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultats`
--

LOCK TABLES `resultats` WRITE;
/*!40000 ALTER TABLE `resultats` DISABLE KEYS */;
INSERT INTO `resultats` VALUES (1,1,1,7,'2015-07-20 19:18:15'),(2,2,2,6,'2011-03-20 19:18:15'),(3,3,3,6,'2017-03-20 19:18:15'),(4,4,4,5,'2025-03-20 19:18:15'),(5,5,5,2,'2001-03-20 19:18:15');
/*!40000 ALTER TABLE `resultats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lanparty_hincelouis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-20 16:46:16
