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
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth` (
  `idauth` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `hash` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idauth`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

LOCK TABLES `auth` WRITE;
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES (1,'maximvg@gmail.com','123456789','d4ec5e186703161809b51ca323eaca10',0),(7,'Максим','пароль','0e222c526fedad822eabe53405c1b009',0),(8,'йй','йй','77f5482a130a8a4845701b1d6cf1b4a5',0),(9,'qqq','qqq','343b1c4a3ea721b2d640fc8700db0f36',0),(10,'qq','qq','3bad6af0fa4b8b330d162e19938ee981',0),(11,'ggg','ggg','9cafeef08db2dd477098a0293e71f90a',0),(12,'ooo','ooo','9982b2a7fceaaee2c8444b5086aee008',0),(13,'йййй','йййййй','917c6e6d3b40b7b2eba7d36ea47d148e',0),(14,'123','123456','1e191d851b3b49a248f4ea62f6b06410',0),(15,'bbb','bbb','875f26fdb1cecf20ceb4ca028263dec6',0),(16,'Ц','ЦЦЦ','766fbd1aa7daa95318d3a76c9d768082',0),(17,'Ццц','Ц','11011b4aef827754fac0e04cfe7466c9',0),(18,'рррр','ррр','d1790ab7949641f47a9f7e20f0275ca4',0),(19,'ф','ф','5a59be0c99d9cff6783f31e9f6d5ebac',0),(20,'ллл','ллл','aec103f5d3b80fa2ce7ab22968702d19',0),(21,'ccc','cc','67c762276bced09ee4df0ed537d164ea',0),(22,'xxx','xxx','dad3a37aa9d50688b5157698acfd7aee',0),(23,'ттт','ттт','0620d7312068165d2b36213df74165fb',0),(24,'UseName','Password','102b260212c931fa86e998a5155b210c',0);
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,'7CewKQ',5,9,2,3.89,1,'2013-12-22'),(2,1,'7CewKQ',6,10,1,1.2,1,'2013-12-22'),(3,1,'7CewKQ',4,8,1,5.1,0,'2015-01-17'),(4,1,'7CewKQ',3,3,1,5.4,0,'2015-01-17'),(15,1,'7CewKQ',1,1,1,5.5,0,'2015-02-06'),(18,12,'EusMz7',19,19,1,7,0,'2015-02-06'),(19,12,'EusMz7',18,18,1,10,0,'2015-02-06'),(20,12,'EusMz7',7,11,1,9.7,0,'2015-02-06'),(21,7,'KlhzP4',NULL,NULL,1,NULL,0,'2015-02-06'),(22,7,'KlhzP4',19,19,1,7,0,'2015-02-06'),(23,7,'KlhzP4',18,18,1,10,0,'2015-02-06'),(24,7,'KlhzP4',4,8,1,5,0,'2015-02-06'),(25,7,'KlhzP4',6,10,1,1.2,0,'2015-02-06'),(26,7,'KlhzP4',5,9,1,3.89,0,'2015-02-06'),(30,1,'7CewKQ',19,19,1,7,0,'2015-02-06'),(31,1,'7CewKQ',18,18,1,10,0,'2015-02-06'),(32,1,'7CewKQ',2,2,1,5.7,0,'2015-02-06'),(33,7,'KlhzP4',1,1,1,5.5,0,'2015-02-06'),(34,7,'KlhzP4',3,3,1,5.4,0,'2015-02-06'),(35,7,'KlhzP4',2,2,1,5.7,0,'2015-02-06'),(39,1,'7CewKQ',7,11,1,9.7,0,'2015-02-06'),(40,13,'PkDoKe',NULL,NULL,NULL,NULL,0,'2015-02-06'),(41,13,'PkDoKe',19,19,1,7,0,'2015-02-06'),(42,13,'PkDoKe',18,18,1,10,0,'2015-02-06'),(43,1,'7CewKQ',15,20,1,3.89,0,'2015-02-06'),(44,1,'7CewKQ',61,125,1,2.45,0,'2015-02-13'),(45,1,'7CewKQ',48,112,1,3.7,0,'2015-02-13'),(46,1,'7CewKQ',11,11,1,5.5,0,'2015-02-13'),(47,1,'7CewKQ',21,21,1,6,0,'2015-02-13');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `iddelivery` int(11) NOT NULL AUTO_INCREMENT,
  `iduin` int(11) DEFAULT NULL,
  `postalzip` int(11) DEFAULT NULL,
  `city` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `street` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `house` int(11) DEFAULT NULL,
  `houseblock` int(11) DEFAULT NULL,
  `houseroom` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddelivery`),
  KEY `FK_delivery` (`iduin`),
  CONSTRAINT `FK_delivery` FOREIGN KEY (`iduin`) REFERENCES `uin` (`iduin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,1,51935,'Днепродзержинск','Глагольева',1,0,1),(2,7,1,'2','3',4,0,6),(3,10,51935,'Днепропетровск','Глаголева',20,0,80),(4,8,51935,'Днепропетровск','Глаголева',20,0,80),(5,12,51000,'qwerty','qwerty',1,0,0),(6,13,49000,'йцукен','зщшгнекуцй',9,0,0);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `groupproduct` VALUES (1,'Хлеб Пшеничный',' \n<p><b>Хлеб пшеничный</b> выпекается из муки первого сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;27842&mdash;88. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.\n</p>'),(2,'Хлеб Ржаной',' \n<p><b>Хлеб ржаной</b> выпекается из ржаной обойной, обдирной, сеяной муки. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба ржаного основывается на ГОСТ&nbsp;2077&mdash;84. Выпекается на высокотех - нологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука ржаная хлебопекарная, вода питьевая, дрожжи, соль пищевая.\n</p>'),(3,'Батоны','<p><b>Батон</b> выпекается из пшеничной муки высшего сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> батонов основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.\n</p>'),(4,'Булочки','<p><b>Булки</b> выпекаются из пшеничной муки высшего сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> булок основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, молоко, соль пищевая.\n</p>'),(5,'Булочки здобные','<p><b>Булки сдобные</b> выпекаются из пшеничной муки высшего и первого сорта. Выпечка производится до готовности из дрожжевого теста.\n</p>\n<p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;24557&mdash;89. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.\n</p>\n<p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная ввысшего и первого сортов, вода питьевая, дрожжи, молоко, растительные жиры, соль пищевая, сахар.\n</p>');
/*!40000 ALTER TABLE `groupproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `nameproduct` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `priceproduct` float DEFAULT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Хлеб Пшеничный',5.5),(2,'Хлеб Красносельский',5.7),(3,'Хлеб Европейский',5.4),(4,'Хлеб Запорожский',5),(5,'Семейный Хлеб',3.89),(6,'Пшеничный Белый',1.2),(7,'Паляныця Украинская',9.7),(8,'Паляныця Клементская',5.5),(9,'Киевский',5.7),(10,'Белый Хлеб',5.4),(11,'Белый Европейский',5.5),(12,'Бородинский',5.7),(13,'Дарницкий формовой',5.4),(14,'Дарницкий',5),(15,'Пашкаревский',3.89),(16,'Поленце с отрубями',1.2),(17,'Ржаной диабетический',9.7),(18,'Ржаной кирпичик',10),(19,'Ржаной обычный',7),(20,'Рижский',4),(21,'Столичный',6),(22,'Багет специальный',5.87),(23,'Восточный',2.23),(24,'Длинный путь',4.98),(25,'Докторский',3),(26,'Подмосковный',56),(27,'Северский',3),(28,'Слобожанский',4),(29,'Специальный',2.76),(30,'Фантазия',23.77),(31,'Чугуевский',2.88),(32,'Батон городской Харьковский',2),(33,'Булка солнечная',3),(34,'Воздушная булочка',4),(35,'Кукурузная булочка',5),(36,'Пампушки Харьковская',6),(37,'Рогалик',5),(38,'Рогалики закарпатские',3),(39,'Абрикосовая булочка',5.23),(40,'Багет с изюмом',3.53),(41,'Багет с маком',4.65),(42,'Булочки здобные',3.6),(43,'Витушка с кремом',7.3),(44,'Вишневый пирог',3.5),(45,'Детская с джемом',3.5),(46,'Детская с изюмом',1.5),(47,'Детская с кремом',4.2),(48,'Детская с молочным кремом',3.7),(49,'Детская с шоколадным кремом',3.5),(50,'Донецкая',2.5),(51,'Калач',3.6),(52,'Каравай праздничный',5.5),(53,'Каравай свадебный',7.7),(54,'Корола',3.5),(55,'Парижский круасан',3.5),(56,'Севастопольская',9.2),(57,'Сетевая с карамелью',7.87),(58,'Славянская',3),(59,'Славянская с джемом',4.44),(60,'Студель с абрикосом',4.56),(61,'Студель с вишней',2.45),(62,'студель с яблоком',5.87),(63,'Фигурная выпечка',1.11);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage` (
  `idstorage` int(11) NOT NULL AUTO_INCREMENT,
  `idproduct` int(11) DEFAULT NULL,
  `idgroupproduct` int(11) DEFAULT NULL,
  `countproduct` int(11) DEFAULT NULL,
  PRIMARY KEY (`idstorage`),
  KEY `FK_productinstorage` (`idproduct`),
  KEY `FK_storagegroupproduct` (`idgroupproduct`),
  CONSTRAINT `FK_productinstorage` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`),
  CONSTRAINT `FK_storagegroupproduct` FOREIGN KEY (`idgroupproduct`) REFERENCES `groupproduct` (`idgroupproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (1,1,1,10),(2,2,1,10),(3,3,1,10),(4,4,1,10),(5,5,1,9),(6,6,1,10),(7,7,1,10),(8,8,1,10),(9,9,1,10),(10,10,1,10),(11,11,1,9),(12,12,2,15),(13,13,2,15),(14,14,2,15),(15,15,2,15),(16,16,2,15),(17,17,2,15),(18,18,2,15),(19,19,2,15),(20,20,2,15),(21,21,2,14),(62,22,3,10),(63,23,3,10),(64,24,3,10),(65,25,3,10),(66,26,3,10),(67,27,3,10),(68,28,3,10),(69,29,3,10),(70,30,3,10),(71,31,3,10),(72,32,4,10),(73,33,4,10),(74,34,4,10),(75,35,4,10),(76,36,4,10),(77,37,4,10),(78,38,4,10),(79,39,5,10),(104,40,5,10),(105,41,5,10),(106,42,5,10),(107,43,5,10),(108,44,5,10),(109,45,5,10),(110,46,5,10),(111,47,5,10),(112,48,5,9),(113,49,5,10),(114,50,5,10),(115,51,5,10),(116,52,5,10),(117,53,5,10),(118,54,5,10),(119,55,5,10),(120,56,5,10),(121,57,5,10),(122,58,5,10),(123,59,5,10),(124,60,5,10),(125,61,5,9),(126,62,5,10),(127,63,5,10);
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uin`
--

DROP TABLE IF EXISTS `uin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uin` (
  `iduin` int(11) NOT NULL AUTO_INCREMENT,
  `nicname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `fname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `sname` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`iduin`),
  CONSTRAINT `FK_uinauth` FOREIGN KEY (`iduin`) REFERENCES `auth` (`idauth`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uin`
--

LOCK TABLES `uin` WRITE;
/*!40000 ALTER TABLE `uin` DISABLE KEYS */;
INSERT INTO `uin` VALUES (1,'Maxim','Максим','Витальевич','Гаврилов'),(7,'Максим','Максим','Витальевич','Гаврилов'),(8,'ййй','йй','йй','йй'),(10,'q','q','q','Q'),(11,'gg','gg','gg','gg'),(12,'ooo','ooo','ooo','ooo'),(13,'й','й','й','й'),(14,'11','11','11','11'),(15,'abc','b','b','b'),(21,'c','c','c','c'),(22,'x','x','x','x'),(23,'ттт','ттт','ттт','ттт'),(24,'Nicname','Name','Last Name','Family');
/*!40000 ALTER TABLE `uin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'shop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-13 21:04:31
