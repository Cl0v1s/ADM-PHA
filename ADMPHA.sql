-- MySQL dump 10.16  Distrib 10.1.23-MariaDB, for debian-linux-gnueabihf (armv7l)
--
-- Host: localhost    Database: ADMPHA
-- ------------------------------------------------------
-- Server version	10.1.23-MariaDB-9+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `content` varchar(400) NOT NULL,
  `Tool_id` int(11) DEFAULT NULL,
  `Resident_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
INSERT INTO `Comment` VALUES (2,1,' CACA !',1,1),(3,1,' Test',1,1),(4,1,' djkqsdjksqjdklsdkljsfhd',1,1);
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compensation`
--

DROP TABLE IF EXISTS `Compensation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compensation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compensation`
--

LOCK TABLES `Compensation` WRITE;
/*!40000 ALTER TABLE `Compensation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compensation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Establishment`
--

DROP TABLE IF EXISTS `Establishment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Establishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Establishment`
--

LOCK TABLES `Establishment` WRITE;
/*!40000 ALTER TABLE `Establishment` DISABLE KEYS */;
INSERT INTO `Establishment` VALUES (1,'Maison test');
/*!40000 ALTER TABLE `Establishment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Handicap`
--

DROP TABLE IF EXISTS `Handicap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Handicap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Handicap`
--

LOCK TABLES `Handicap` WRITE;
/*!40000 ALTER TABLE `Handicap` DISABLE KEYS */;
INSERT INTO `Handicap` VALUES (1,'Test');
/*!40000 ALTER TABLE `Handicap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resident`
--

DROP TABLE IF EXISTS `Resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Resident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `picture` varchar(400) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `pathologies` text NOT NULL,
  `autonomy` text NOT NULL,
  `Establishment_id` int(11) NOT NULL,
  `healplan` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Establishment_id` (`Establishment_id`),
  CONSTRAINT `Resident_ibfk_1` FOREIGN KEY (`Establishment_id`) REFERENCES `Establishment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Table correspondant au resident';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resident`
--

LOCK TABLES `Resident` WRITE;
/*!40000 ALTER TABLE `Resident` DISABLE KEYS */;
INSERT INTO `Resident` VALUES (1,'Rigouste','Jade','https://pbs.twimg.com/profile_images/937001892319825920/-WX9G3I1_400x400.jpg',20,'HP','Totale',1,'Calins');
/*!40000 ALTER TABLE `Resident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tool`
--

DROP TABLE IF EXISTS `Tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(400) DEFAULT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `autonomy` text NOT NULL,
  `guide` text NOT NULL,
  `invasive` varchar(255) NOT NULL,
  `provider` text NOT NULL,
  `advantages` text NOT NULL,
  `price` int(11) NOT NULL,
  `refund` text NOT NULL,
  `type` int(11) NOT NULL,
  `humans` int(11) DEFAULT NULL,
  `constructor` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tool`
--

LOCK TABLES `Tool` WRITE;
/*!40000 ALTER TABLE `Tool` DISABLE KEYS */;
INSERT INTO `Tool` VALUES (1,'https://scontent-mrs1-1.xx.fbcdn.net/v/t1.0-9/22406072_1486422178115228_5451454461781288984_n.jpg?oh=a4e41026269435d1c38d4265069c13a5&oe=5AD66E9F','Un DM de test','DM de test','RAS','RAS','RAS','RAS','RAS',1000,'0.3%',0,0,NULL),(2,'https://scontent-mrs1-1.xx.fbcdn.net/v/t1.0-9/20664729_1432323330191780_4861973793615149655_n.jpg?oh=df60848c09d16e3b8b2d408062dae1b3&oe=5A9AB246','Un AT de test','AT de test','RAS','RAS','RAS','RAS','RAS',1000,'0.3%',1,3,NULL);
/*!40000 ALTER TABLE `Tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tool_Compensation`
--

DROP TABLE IF EXISTS `Tool_Compensation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tool_Compensation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tool_id` int(11) NOT NULL,
  `Compensation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Compensation_id` (`Compensation_id`),
  KEY `Tool_id` (`Tool_id`),
  CONSTRAINT `Tool_Compensation_ibfk_1` FOREIGN KEY (`Compensation_id`) REFERENCES `Compensation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Tool_Compensation_ibfk_2` FOREIGN KEY (`Tool_id`) REFERENCES `Tool` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tool_Compensation`
--

LOCK TABLES `Tool_Compensation` WRITE;
/*!40000 ALTER TABLE `Tool_Compensation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tool_Compensation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tool_Handicap`
--

DROP TABLE IF EXISTS `Tool_Handicap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tool_Handicap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tool_id` int(11) NOT NULL,
  `Handicap_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Tool_id` (`Tool_id`),
  KEY `Handicap_id` (`Handicap_id`),
  CONSTRAINT `Tool_Handicap_ibfk_1` FOREIGN KEY (`Handicap_id`) REFERENCES `Handicap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Tool_Handicap_ibfk_2` FOREIGN KEY (`Tool_id`) REFERENCES `Tool` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tool_Handicap`
--

LOCK TABLES `Tool_Handicap` WRITE;
/*!40000 ALTER TABLE `Tool_Handicap` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tool_Handicap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tool_Resident`
--

DROP TABLE IF EXISTS `Tool_Resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tool_Resident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tool_id` int(11) NOT NULL,
  `Resident_id` int(11) NOT NULL,
  `progress` text NOT NULL,
  `anxiety` text NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Tool_id` (`Tool_id`) USING BTREE,
  KEY `Resident_id` (`Resident_id`),
  CONSTRAINT `Tool_Resident_ibfk_1` FOREIGN KEY (`Tool_id`) REFERENCES `Tool` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Tool_Resident_ibfk_2` FOREIGN KEY (`Resident_id`) REFERENCES `Resident` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tool_Resident`
--

LOCK TABLES `Tool_Resident` WRITE;
/*!40000 ALTER TABLE `Tool_Resident` DISABLE KEYS */;
INSERT INTO `Tool_Resident` VALUES (1,1,1,'','','');
/*!40000 ALTER TABLE `Tool_Resident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tool_Usecase`
--

DROP TABLE IF EXISTS `Tool_Usecase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tool_Usecase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tool_id` int(11) NOT NULL,
  `Usecase_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Tool_id` (`Tool_id`) USING BTREE,
  KEY `Usecase_id` (`Usecase_id`),
  CONSTRAINT `Tool_Usecase_ibfk_1` FOREIGN KEY (`Usecase_id`) REFERENCES `Usecase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Tool_Usecase_ibfk_2` FOREIGN KEY (`Tool_id`) REFERENCES `Tool` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tool_Usecase`
--

LOCK TABLES `Tool_Usecase` WRITE;
/*!40000 ALTER TABLE `Tool_Usecase` DISABLE KEYS */;
INSERT INTO `Tool_Usecase` VALUES (1,1,1);
/*!40000 ALTER TABLE `Tool_Usecase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usecase`
--

DROP TABLE IF EXISTS `Usecase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usecase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usecase`
--

LOCK TABLES `Usecase` WRITE;
/*!40000 ALTER TABLE `Usecase` DISABLE KEYS */;
INSERT INTO `Usecase` VALUES (1,'Chambre');
/*!40000 ALTER TABLE `Usecase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `group` varchar(255) NOT NULL,
  `job` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Table correspondant à l''utilisateur';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Doe','John','j.d@jd.jd','0662240307','2','Testeur');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Establishment`
--

DROP TABLE IF EXISTS `User_Establishment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Establishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Etablishment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Etablishment_id` (`Etablishment_id`),
  KEY `User_id` (`User_id`) USING BTREE,
  CONSTRAINT `User_Establishment_ibfk_1` FOREIGN KEY (`Etablishment_id`) REFERENCES `Establishment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `User_Establishment_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table de lien entre l''utilisateur et l''établissement';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Establishment`
--

LOCK TABLES `User_Establishment` WRITE;
/*!40000 ALTER TABLE `User_Establishment` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_Establishment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_Resident`
--

DROP TABLE IF EXISTS `User_Resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Resident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Resident_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`User_id`) USING BTREE,
  KEY `Resident_id` (`Resident_id`),
  CONSTRAINT `User_Resident_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `User_Resident_ibfk_2` FOREIGN KEY (`Resident_id`) REFERENCES `Resident` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table de lien entre le résident et l''utilisateur';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Resident`
--

LOCK TABLES `User_Resident` WRITE;
/*!40000 ALTER TABLE `User_Resident` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_Resident` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-17 19:41:54
