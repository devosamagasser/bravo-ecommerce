-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: store
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Temporary table structure for view `allproducts`
--

DROP TABLE IF EXISTS `allproducts`;
/*!50001 DROP VIEW IF EXISTS `allproducts`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `allproducts` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `sale` tinyint NOT NULL,
  `descrip` tinyint NOT NULL,
  `categorie_id` tinyint NOT NULL,
  `categorie` tinyint NOT NULL,
  `section_id` tinyint NOT NULL,
  `section` tinyint NOT NULL,
  `brand_id` tinyint NOT NULL,
  `brand` tinyint NOT NULL,
  `rate` tinyint NOT NULL,
  `count` tinyint NOT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (14,1150,'2023-10-04 16:46:02',0,10);
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `categorie` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`),
  KEY `section` (`section`),
  CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `brands_ibfk_2` FOREIGN KEY (`section`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'samsung',1,1),(2,'xiaomi',1,1),(4,'apple',1,2),(5,'huwawi',1,3),(15,'samsung',7,18),(16,'sony',7,18),(17,'apple',7,18),(18,'huwawi',7,18),(19,'oppo',7,18),(20,'realme',7,18),(21,'xiaomi',7,18),(22,'samsung',7,19),(23,'apple',7,19),(24,'huwawi',7,19),(25,'xiaomi',7,19),(26,'oppo',7,19),(27,'sony',7,19);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `color` int(11) DEFAULT NULL,
  `quan` int(11) NOT NULL DEFAULT 1,
  `pr_price` int(11) NOT NULL,
  `all_quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `color` (`color`),
  KEY `customer` (`customer`),
  KEY `product` (`product`),
  CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`color`) REFERENCES `color` (`color_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_ibfk_5` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (24,10,65,2,1,350,4),(29,10,62,3,1,800,4);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bill_add_product` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
IF EXISTS 
	(
    	SELECT bill.customer
    	FROM bill 
    	WHERE bill.customer = (NEW.customer)
	) 
THEN
   UPDATE 
        bill 
    SET 
        bill.total = (bill.total + (NEW.quan * NEW.pr_price)) 
    WHERE 
        bill.customer = NEW.customer
    AND
        bill.is_paid = 0;
ELSE 
   INSERT INTO 
        bill 
    SET 
        bill.total = (bill.total + (NEW.quan * NEW.pr_price)),
        bill.customer = NEW.customer ,
        bill.is_paid = 0;
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bill_increase_quan` AFTER UPDATE ON `cart` FOR EACH ROW UPDATE 
	bill 
SET 
    bill.total = bill.total - ((OLD.quan - NEW.quan)*NEW.pr_price)
WHERE 
	bill.customer = NEW.customer */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bill_delete_product` AFTER DELETE ON `cart` FOR EACH ROW IF ((SELECT bill.total FROM bill WHERE bill.customer = OLD.customer) = (OLD.pr_price * OLD.quan))
THEN
	DELETE FROM bill WHERE bill.customer = OLD.customer;
ELSE
	UPDATE bill SET bill.total = (bill.total - (OLD.pr_price * OLD.quan)) WHERE 		bill.customer = OLD.customer; 
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'mobiles'),(5,'labtops'),(6,'computers accessories'),(7,'mobiles accessories'),(9,'tv');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'cairo',1),(2,'mansoura',1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(100) DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (2,'white',' #FFFFFF'),(3,'red','#FF0000'),(4,'blue','#0000FF'),(5,'green','#00FF00'),(6,'pink','#FFC0CB'),(7,'gray','#D3D3D3'),(8,'purble','#800080'),(9,'gold','#FFD700'),(10,'black','#000000'),(13,'bluish-gray','#36314e');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'egypt');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `customerinfo`
--

DROP TABLE IF EXISTS `customerinfo`;
/*!50001 DROP VIEW IF EXISTS `customerinfo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `customerinfo` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `country` tinyint NOT NULL,
  `city` tinyint NOT NULL,
  `street` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `street` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`),
  KEY `city` (`city`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (10,'osama','wewooow123@yahoo.com','01099634597','$2y$10$k0SQXCFDcCYFPS4Eiw5zv.CXUaBT71wuEyfnhHaNno/qDR3M9u15m',1,1,'asdf'),(11,'osama','wewooow1234@yahoo.com','01099634598','$2y$10$k0SQXCFDcCYFPS4Eiw5zv.CXUaBT71wuEyfnhHaNno/qDR3M9u15m',1,1,'asdf');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favourite` (
  `customer` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  PRIMARY KEY (`customer`,`product`),
  KEY `product` (`product`),
  CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favourite`
--

LOCK TABLES `favourite` WRITE;
/*!40000 ALTER TABLE `favourite` DISABLE KEYS */;
INSERT INTO `favourite` VALUES (10,68);
/*!40000 ALTER TABLE `favourite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  CONSTRAINT `features_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (112,65,'Ram : 4 GB'),(113,65,'Rom : 64 GB'),(114,65,'Battery : 3000 M.A'),(118,62,'Ram : 4 GB'),(119,62,'Rom : 64 GB'),(120,62,'Battery : 2100 M.A'),(121,66,'Ram : 8 GB'),(122,66,'Rom : 128 GB'),(123,66,'Battery : 4500 M.A'),(124,67,'Ram : 8 GB'),(125,67,'Rom : 128 GB'),(126,67,'Battery : 2500 M.A');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`),
  CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (59,65,'b658e2adc87cd3c94c7227d4560b1126.webp'),(60,65,'190a01f78da3ff6a285872cf30ea1eae.webp'),(64,62,'ff08178479008ceafc229b9b631c50ba.webp'),(65,62,'9cb55c17a1b5f02ea6ccb861d0231a4c.webp'),(66,62,'4521ed862547bf61561db5f1a02f7b96.webp'),(67,66,'64d37db3060b069b049f9a76bc9a77ee.webp'),(68,66,'2f403d93becafb6923a58dc20ec11074.webp'),(69,66,'48d5e3b364d5edc922fbd5751d5f9b12.webp'),(70,67,'18e75abbf9450ae55569fd564c1d651f.webp'),(71,67,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(72,67,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(73,67,'601236df51f2f2d408d5753412996c80.webp'),(108,69,'18e75abbf9450ae55569fd564c1d651f.webp'),(109,69,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(110,69,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(111,69,'601236df51f2f2d408d5753412996c80.webp'),(112,71,'18e75abbf9450ae55569fd564c1d651f.webp'),(113,71,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(114,71,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(115,71,'601236df51f2f2d408d5753412996c80.webp'),(116,72,'18e75abbf9450ae55569fd564c1d651f.webp'),(117,72,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(118,72,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(119,72,'601236df51f2f2d408d5753412996c80.webp'),(120,73,'18e75abbf9450ae55569fd564c1d651f.webp'),(121,73,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(122,73,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(123,73,'601236df51f2f2d408d5753412996c80.webp'),(124,74,'18e75abbf9450ae55569fd564c1d651f.webp'),(125,74,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(126,74,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(127,74,'601236df51f2f2d408d5753412996c80.webp'),(128,75,'18e75abbf9450ae55569fd564c1d651f.webp'),(129,75,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(130,75,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(131,75,'601236df51f2f2d408d5753412996c80.webp'),(132,68,'18e75abbf9450ae55569fd564c1d651f.webp'),(133,68,'4bc21508fa3223c99a4803dfdc8fc28c.webp'),(134,68,'5e8e94a36538d59b89d9b1cb3024ec7f.webp'),(135,68,'601236df51f2f2d408d5753412996c80.webp'),(136,76,'64d37db3060b069b049f9a76bc9a77ee.webp'),(137,76,'2f403d93becafb6923a58dc20ec11074.webp'),(138,76,'48d5e3b364d5edc922fbd5751d5f9b12.webp'),(139,77,'64d37db3060b069b049f9a76bc9a77ee.webp'),(140,77,'2f403d93becafb6923a58dc20ec11074.webp'),(141,77,'48d5e3b364d5edc922fbd5751d5f9b12.webp');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'owner'),(2,'admin'),(3,'super visor');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `sale` int(11) NOT NULL DEFAULT 0,
  `categorie` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `descrip` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`),
  KEY `brand` (`brand`),
  KEY `section` (`section`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`section`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (62,'iphone XR',800,0,1,2,4,'Apple phone for rich people not for you son of ****',35),(65,'samsung galaxy A51',400,50,1,1,1,'samsung phone for any one',20),(66,'Samsung Galaxy s21',800,0,1,1,1,'mobile phone from samsung                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',13),(67,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(68,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(69,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(71,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(72,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(73,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(74,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(75,'I Phone 14',1200,150,1,2,4,'mobile phone from Apple                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',14),(76,'Samsung Galaxy s21',800,0,1,1,1,'mobile phone from samsung                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',13),(77,'Samsung Galaxy s21',800,0,1,1,1,'mobile phone from samsung                                         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, qui quidem corporis in eligendi possimus doloribus eveniet voluptatibus sunt nisi, placeat recusandae autem, sint vel dolor animi exercitationem mollitia nesciunt?',13);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `color` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `size` (`size`),
  KEY `color` (`color`),
  KEY `product` (`product`),
  CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`size`) REFERENCES `size` (`size_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `quantity_ibfk_2` FOREIGN KEY (`color`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quantity_ibfk_3` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantity`
--

LOCK TABLES `quantity` WRITE;
/*!40000 ALTER TABLE `quantity` DISABLE KEYS */;
INSERT INTO `quantity` VALUES (297,65,NULL,2,4),(298,65,NULL,3,5),(299,65,NULL,6,4),(300,65,NULL,8,7),(304,62,NULL,2,4),(305,62,NULL,3,4),(306,62,NULL,4,4),(307,66,NULL,2,5),(308,66,NULL,10,5),(309,66,NULL,6,3),(310,67,NULL,2,3),(311,67,NULL,3,3),(312,67,NULL,10,3),(313,67,NULL,9,5),(317,62,NULL,5,23);
/*!40000 ALTER TABLE `quantity` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `quan` AFTER INSERT ON `quantity` FOR EACH ROW UPDATE 
	product 
SET 
	quantity = (SELECT sum(quantity.quantity) 
FROM 
     quantity 
WHERE 
     quantity.product = (NEW.product))
WHERE 
	 product.id = NEW.product */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delequan` AFTER DELETE ON `quantity` FOR EACH ROW UPDATE 
	product 
SET 
	quantity = (SELECT sum(quantity.quantity) 
FROM 
     quantity 
WHERE 
     quantity.product = (OLD.product))
WHERE 
	 product.id = OLD.product */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `customer` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT 1,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`customer`,`product`),
  KEY `product` (`product`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (10,62,4,'','2023-09-24 17:44:41'),(10,65,5,'','2023-10-09 13:42:48'),(10,66,2,'','2023-10-09 13:57:26'),(10,67,3,'','2023-10-09 13:57:28'),(10,68,5,'','2023-10-09 09:31:04'),(10,69,3,'','2023-10-09 13:29:44'),(10,71,3,'','2023-10-09 13:42:57'),(10,72,5,'','2023-10-09 13:51:36'),(10,73,1,'','2023-10-09 13:57:53'),(10,74,1,'','2023-10-09 13:57:04');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `reviews_details`
--

DROP TABLE IF EXISTS `reviews_details`;
/*!50001 DROP VIEW IF EXISTS `reviews_details`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `reviews_details` (
  `id` tinyint NOT NULL,
  `product` tinyint NOT NULL,
  `customer` tinyint NOT NULL,
  `customer_email` tinyint NOT NULL,
  `rate` tinyint NOT NULL,
  `comment` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`),
  CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'android',1),(2,'ios',1),(3,'hos',1),(12,'Hp',5),(13,'Apple',5),(14,'Dell',5),(15,'Lenovo',5),(16,'Huwawi',5),(17,'toshiba',5),(18,'headphones',7),(19,'smart watches',7),(20,'covers',7),(21,'mobile charger',7),(22,'cameras',6),(23,'speakers',6),(24,'mouses',6),(25,'keyboards',6),(26,'screens',6),(27,'microfones',6),(28,'Samsung',9),(29,'LG',9),(30,'Sony',9),(31,'Hitachi',9);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (2,'XL'),(3,'XXL'),(4,'3XL'),(5,'4XL'),(6,'S');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!50001 DROP VIEW IF EXISTS `userinfo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `userinfo` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `phone` tinyint NOT NULL,
  `country` tinyint NOT NULL,
  `city` tinyint NOT NULL,
  `street` tinyint NOT NULL,
  `gender` tinyint NOT NULL,
  `date_of_start` tinyint NOT NULL,
  `salary` tinyint NOT NULL,
  `position` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `street` text NOT NULL,
  `position` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `date_of_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `salary` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city` (`city`),
  KEY `country` (`country`),
  KEY `position` (`position`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`position`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'osama','wewooow123@yahoo.com','$2y$10$O0x4SpwDA4h1Eb2GxOwcDeIsb5sbnhc8ZYjsyscwYHByNFAKpV93e','01099634597',1,1,'asdf',2,0,'2023-09-13 01:51:58',120);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `allproducts`
--

/*!50001 DROP TABLE IF EXISTS `allproducts`*/;
/*!50001 DROP VIEW IF EXISTS `allproducts`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `allproducts` AS select `product`.`id` AS `id`,`product`.`name` AS `name`,`product`.`price` AS `price`,`product`.`sale` AS `sale`,`product`.`descrip` AS `descrip`,`categories`.`id` AS `categorie_id`,`categories`.`name` AS `categorie`,`sections`.`id` AS `section_id`,`sections`.`name` AS `section`,`brands`.`id` AS `brand_id`,`brands`.`name` AS `brand`,avg(`reviews`.`rate`) AS `rate`,count(`reviews`.`rate`) AS `count`,`product`.`quantity` AS `quantity` from ((((`product` left join `categories` on(`product`.`categorie` = `categories`.`id`)) left join `sections` on(`product`.`section` = `sections`.`id`)) left join `brands` on(`product`.`brand` = `brands`.`id`)) left join `reviews` on(`product`.`id` = `reviews`.`product`)) group by `product`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `customerinfo`
--

/*!50001 DROP TABLE IF EXISTS `customerinfo`*/;
/*!50001 DROP VIEW IF EXISTS `customerinfo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `customerinfo` AS select `customers`.`id` AS `id`,`customers`.`name` AS `name`,`customers`.`email` AS `email`,`country`.`name` AS `country`,`city`.`name` AS `city`,`customers`.`street` AS `street` from ((`customers` join `country` on(`customers`.`country` = `country`.`id`)) join `city` on(`customers`.`city` = `city`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reviews_details`
--

/*!50001 DROP TABLE IF EXISTS `reviews_details`*/;
/*!50001 DROP VIEW IF EXISTS `reviews_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reviews_details` AS select `product`.`id` AS `id`,`product`.`name` AS `product`,`customers`.`name` AS `customer`,`customers`.`email` AS `customer_email`,`reviews`.`rate` AS `rate`,`reviews`.`comment` AS `comment` from ((`reviews` join `customers` on(`customers`.`id` = `reviews`.`customer`)) join `product` on(`product`.`id` = `reviews`.`product`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `userinfo`
--

/*!50001 DROP TABLE IF EXISTS `userinfo`*/;
/*!50001 DROP VIEW IF EXISTS `userinfo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `userinfo` AS select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`phone` AS `phone`,`country`.`name` AS `country`,`city`.`name` AS `city`,`users`.`street` AS `street`,`users`.`gender` AS `gender`,`users`.`date_of_start` AS `date_of_start`,`users`.`salary` AS `salary`,`position`.`name` AS `position` from (((`users` join `country` on(`users`.`country` = `country`.`id`)) join `city` on(`users`.`city` = `city`.`id`)) join `position` on(`users`.`position` = `position`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-31 17:36:04
