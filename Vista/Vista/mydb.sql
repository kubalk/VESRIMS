CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.13.04.1

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
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `PublisherID` int(11) NOT NULL AUTO_INCREMENT,
  `PName` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`PublisherID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'New York: Harper Collin'),(2,'Pine Plains, NY : Live Oak Media'),(3,'London: Collins'),(4,'New York, NY: Philomel Books'),(5,'New York : Atheneum Books for Young Reader'),(6,'Cambridge, MA : Candlewick Press'),(7,'New York : Golden Book'),(8,'New York, N.Y. : Random House'),(9,'San Francisco, Calif. : Chronicle Books'),(14,'Berkley'),(15,'Golden Books'),(16,'Turtleback Books'),(18,'Candlewick Press (MA)'),(19,'Puffin');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `ULName` varchar(45) NOT NULL,
  `UFName` varchar(45) NOT NULL,
  `UType` tinyint(1) NOT NULL DEFAULT '0',
  `URoomNum` varchar(4) DEFAULT NULL,
  `UActive` tinyint(1) NOT NULL DEFAULT '1',
  `UPassword` char(64) DEFAULT NULL,
  `Username` varchar(45) NOT NULL DEFAULT '1234',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kubal','Kyle',1,NULL,1,'5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8','kylek'),(2,'Gardiner','Matt',1,'',1,'63cc2da9a1924b0e8f9683f74b26526e717c8409d8d02e5b41a5f25cf52066b2','mattg'),(4,'Sopheak','Kong',0,'',1,'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','asdfa'),(5,'Erwin','Steve',0,'',0,'89878b2f65573bbb63151a35add4ab9354210c0f52683bb875b96ce4059257ce','SteveE'),(7,'Barlow','Aaron',1,NULL,0,'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','AaronB'),(8,'Friedman','Brian',0,NULL,1,'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855','BrianF');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `AuthorID` int(11) NOT NULL AUTO_INCREMENT,
  `ALName` varchar(45) DEFAULT NULL,
  `AFName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`AuthorID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Sendak','Maurice'),(2,'Silverstein','Shel'),(3,'Brown','Margaret'),(4,'Seuss','Dr'),(5,'Carle','Eric'),(6,'Viorst','Judith'),(7,'McBratney','Anita'),(8,'Kunhardt','Dorothy'),(9,'Seuss','Ted'),(10,'Laden','Nina'),(18,'Clancy','Tom'),(19,'Books','Golden'),(20,'White','E.'),(22,'McBratney','Sam');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemuser`
--

DROP TABLE IF EXISTS `itemuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemuser` (
  `Users_UserID` int(11) NOT NULL,
  `Item_ItemID` int(11) NOT NULL,
  `IUDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Users_UserID`,`Item_ItemID`),
  KEY `fk_ItemUser_Item1_idx` (`Item_ItemID`),
  CONSTRAINT `fk_ItemUser_Item1` FOREIGN KEY (`Item_ItemID`) REFERENCES `item` (`ItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ItemUser_Users1` FOREIGN KEY (`Users_UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemuser`
--

LOCK TABLES `itemuser` WRITE;
/*!40000 ALTER TABLE `itemuser` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkin`
--

DROP TABLE IF EXISTS `checkin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkin` (
  `CheckInID` int(11) NOT NULL AUTO_INCREMENT,
  `CITime` datetime NOT NULL,
  `Item_ItemID` int(11) NOT NULL,
  `Users_UserID` int(11) NOT NULL,
  PRIMARY KEY (`CheckInID`,`Item_ItemID`),
  KEY `fk_CheckIn_Item1_idx` (`Item_ItemID`),
  KEY `fk_CheckIn_Users1_idx` (`Users_UserID`),
  CONSTRAINT `fk_CheckIn_Item1` FOREIGN KEY (`Item_ItemID`) REFERENCES `item` (`ItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CheckIn_Users1` FOREIGN KEY (`Users_UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkin`
--

LOCK TABLES `checkin` WRITE;
/*!40000 ALTER TABLE `checkin` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `IBookTitle` varchar(100) NOT NULL,
  `IISBN` varchar(18) NOT NULL,
  `IQty` int(11) NOT NULL,
  `IActive` bit(1) NOT NULL,
  `Publisher_PublisherID` int(11) NOT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `fk_Item_Publisher1_idx` (`Publisher_PublisherID`),
  CONSTRAINT `fk_Item_Publisher1` FOREIGN KEY (`Publisher_PublisherID`) REFERENCES `publisher` (`PublisherID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Where the wild things are','9780064431781',1,'',1),(2,'The Giving Tree','9780060586751',1,'',1),(3,'Goodnight moon','9781595192585',1,'',2),(4,'Green eggs and ham','9780007133178',3,'',3),(5,'The Very Hungry Caterpillar','9780399237720',7,'',4),(6,'Alexander and the terrible, horrible, no good, very bad day','9781416985952',1,'',5),(7,'Guess how much I love you','9780763606756',13,'',6),(8,'Pat the Bunny','9780307106506',0,'',7),(9,'The Lorax','9780679822738',3,'',8),(10,'Peek-a-who?','9780811826020',4,'',9),(15,'The Hunt for Red October','9780425120279',1,'',14),(16,'Pat the Bunny Choo-Choo Travels','9780307106506',5,'',15),(28,'Charlotte\'s Web','9780808537724',12,'',16);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authoritem`
--

DROP TABLE IF EXISTS `authoritem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authoritem` (
  `Author_AuthorID` int(11) NOT NULL,
  `Item_ItemID` int(11) NOT NULL,
  PRIMARY KEY (`Author_AuthorID`,`Item_ItemID`),
  KEY `fk_AuthorItem_Item1_idx` (`Item_ItemID`),
  CONSTRAINT `fk_AuthorItem_Author` FOREIGN KEY (`Author_AuthorID`) REFERENCES `author` (`AuthorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AuthorItem_Item1` FOREIGN KEY (`Item_ItemID`) REFERENCES `item` (`ItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authoritem`
--

LOCK TABLES `authoritem` WRITE;
/*!40000 ALTER TABLE `authoritem` DISABLE KEYS */;
INSERT INTO `authoritem` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(18,15),(20,28);
/*!40000 ALTER TABLE `authoritem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkout` (
  `CheckOutID` int(11) NOT NULL AUTO_INCREMENT,
  `COTime` datetime NOT NULL,
  `Item_ItemID` int(11) NOT NULL,
  `Users_UserID` int(11) NOT NULL,
  PRIMARY KEY (`CheckOutID`,`Users_UserID`),
  KEY `fk_CheckOut_Item1_idx` (`Item_ItemID`),
  KEY `fk_CheckOut_Users1_idx` (`Users_UserID`),
  CONSTRAINT `fk_CheckOut_Item1` FOREIGN KEY (`Item_ItemID`) REFERENCES `item` (`ItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CheckOut_Users1` FOREIGN KEY (`Users_UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-15  1:21:13
