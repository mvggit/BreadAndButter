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
  CONSTRAINT `FK_fromstoragetocarts` FOREIGN KEY (`idstorageincarts`) REFERENCES `storage` (`idstorage`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (3,1,'kaUk0v',3,3,1,5.4,1,'2013-12-22'),(6,1,'kaUk0v',1,1,1,5.5,1,'2013-12-22'),(7,1,'kaUk0v',4,4,1,5,1,'2013-12-22'),(9,1,'QaXglk',3,3,1,5.4,1,'2013-12-22'),(10,1,'QaXglk',7,7,3,9.7,1,'2013-12-22'),(29,1,'7CewKQ',5,9,1,3.89,1,'2013-12-22'),(31,1,'iAoQW3',3,3,1,5.4,1,'2013-12-22'),(32,1,'7CewKQ',6,10,1,1.2,1,'2013-12-22'),(33,1,'iAoQW3',5,5,1,3.89,1,'2013-12-22'),(34,1,'iAoQW3',2,2,1,5.7,1,'2013-12-22'),(35,1,'iAoQW3',7,7,1,9.7,1,'2013-12-22'),(36,1,'iAoQW3',4,4,1,5,1,'2013-12-22'),(37,1,'iAoQW3',1,1,1,5.5,1,'2013-12-22'),(39,1,'hPgL1B',4,4,1,5,1,'2013-12-22'),(40,1,'hPgL1B',3,3,1,5.4,1,'2013-12-22'),(41,1,'hPgL1B',1,1,1,5.5,1,'2013-12-22'),(42,1,'hPgL1B',6,6,1,1.2,1,'2013-12-22'),(43,1,'hPgL1B',7,7,1,9.7,1,'2013-12-22'),(44,1,'hPgL1B',2,2,1,5.7,1,'2013-12-22'),(45,1,'hPgL1B',5,5,1,3.89,1,'2013-12-22'),(46,1,'vhFNoI',NULL,NULL,NULL,NULL,NULL,NULL),(60,1,'7CewKQ',4,8,4,5,0,'2015-01-17'),(61,1,'7CewKQ',3,3,2,5.4,0,'2015-01-17');
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

-- Dump completed on 2015-01-19 17:37:00
