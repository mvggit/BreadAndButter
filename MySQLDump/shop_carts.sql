CREATE DATABASE  IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shop`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `idcarts` int(11) NOT NULL AUTO_INCREMENT,
  `idauth` int(11) DEFAULT NULL,
  `identifiercarts` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `idproductincarts` int(11) DEFAULT NULL,
  `idstorageincarts` int(11) DEFAULT NULL,
  `countincarts` int(11) DEFAULT NULL,
  `priceincarts` float DEFAULT NULL,
  `storedcarts` tinyint(1) DEFAULT NULL,
  `savedate` date DEFAULT NULL,
  PRIMARY KEY (`idcarts`),
  KEY `FK_fromstoragetocarts` (`idstorageincarts`),
  KEY `FK_uincarts` (`idauth`),
  CONSTRAINT `FK_fromstoragetocarts` FOREIGN KEY (`idstorageincarts`) REFERENCES `storage` (`idstorage`),
  CONSTRAINT `FK_uincarts` FOREIGN KEY (`idauth`) REFERENCES `auth` (`idauth`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,'7CewKQ',5,9,2,3.89,1,'2013-12-22'),(2,1,'7CewKQ',6,10,2,1.2,1,'2013-12-22'),(3,1,'7CewKQ',4,8,2,5.1,0,'2015-01-17'),(4,1,'7CewKQ',3,3,3,5.4,0,'2015-01-17'),(15,1,'7CewKQ',1,1,2,5.5,0,'2015-02-06'),(18,12,'EusMz7',19,19,4,7,0,'2015-02-06'),(19,12,'EusMz7',18,18,1,10,0,'2015-02-06'),(20,12,'EusMz7',7,11,1,9.7,0,'2015-02-06'),(21,7,'KlhzP4',NULL,NULL,NULL,NULL,0,'2015-02-06'),(22,7,'KlhzP4',19,19,15,7,0,'2015-02-06'),(23,7,'KlhzP4',18,18,10,10,0,'2015-02-06'),(24,7,'KlhzP4',4,8,7,5,0,'2015-02-06'),(25,7,'KlhzP4',6,10,3,1.2,0,'2015-02-06'),(26,7,'KlhzP4',5,9,5,3.89,0,'2015-02-06'),(30,1,'7CewKQ',19,19,2,7,0,'2015-02-06'),(31,1,'7CewKQ',18,18,3,10,0,'2015-02-06'),(32,1,'7CewKQ',2,2,1,5.7,0,'2015-02-06'),(33,7,'KlhzP4',1,1,1,5.5,0,'2015-02-06'),(34,7,'KlhzP4',3,3,1,5.4,0,'2015-02-06'),(35,7,'KlhzP4',2,2,1,5.7,0,'2015-02-06'),(39,1,'7CewKQ',7,11,3,9.7,0,'2015-02-06'),(40,13,'PkDoKe',NULL,NULL,NULL,NULL,0,'2015-02-06'),(41,13,'PkDoKe',19,19,1,7,0,'2015-02-06'),(42,13,'PkDoKe',18,18,1,10,0,'2015-02-06'),(43,1,'7CewKQ',15,20,2,3.89,0,'2015-02-06');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-08 22:30:03
