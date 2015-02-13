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
-- Table structure for table `groupproduct`
--

DROP TABLE IF EXISTS `groupproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupproduct` (
  `idgroupproduct` int(11) NOT NULL AUTO_INCREMENT,
  `namegroupproduct` varchar(18) CHARACTER SET utf8 DEFAULT NULL,
  `descgroupproduct` longtext CHARACTER SET utf8,
  PRIMARY KEY (`idgroupproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupproduct`
--

LOCK TABLES `groupproduct` WRITE;
/*!40000 ALTER TABLE `groupproduct` DISABLE KEYS */;
INSERT INTO `groupproduct` VALUES (1,'Хлеб Пшеничный',' \n<p><b>Хлеб пшеничный</b> выпекается из муки первого сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;27842&mdash;88. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.\n</p>'),
                                  (2,'Хлеб Ржаной',' \n<p><b>Хлеб ржаной</b> выпекается из ржаной обойной, обдирной, сеяной муки. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба ржаного основывается на ГОСТ&nbsp;2077&mdash;84. Выпекается на высокотех - нологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука ржаная хлебопекарная, вода питьевая, дрожжи, соль пищевая.\n</p>'),
                                  (3,'Батоны','<p><b>Батон</b> выпекается из пшеничной муки высшего сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> батонов основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.\n</p>'),
                                  (4,'Булочки','<p><b>Булки</b> выпекаются из пшеничной муки высшего сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> булок основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, молоко, соль пищевая.\n</p>'),
                                  (5,'Булочки здобные','<p><b>Булки сдобные</b> выпекаются из пшеничной муки высшего и первого сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;24557&mdash;89. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная ввысшего и первого сортов, вода питьевая, дрожжи, молоко, растительные жиры, соль пищевая, сахар.\n</p>');
/*!40000 ALTER TABLE `groupproduct` ENABLE KEYS */;
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
