-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `COURSE`
--

DROP TABLE IF EXISTS `COURSE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `COURSE` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `AUTHOR_ID` int NOT NULL,
  `NIVEAU` int DEFAULT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `AUTHOR_ID` (`AUTHOR_ID`),
  CONSTRAINT `COURSE_ibfk_1` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `USER` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COURSE`
--

LOCK TABLES `COURSE` WRITE;
/*!40000 ALTER TABLE `COURSE` DISABLE KEYS */;
INSERT INTO `COURSE` VALUES (1,'php',1,NULL,'dsfsdfsdf','2023-04-03 09:34:50'),(2,'phpInit',1,NULL,'dsfsdfsdf','2023-04-03 09:35:05'),(3,'phpInit',1,NULL,'dsfsdfsdf','2023-04-03 09:43:20'),(4,'phpInit',1,NULL,'dsfsdfsdf','2023-04-03 09:44:02'),(5,'phpInit',1,NULL,'dsfsdfsdf','2023-04-03 09:45:20'),(6,'phpInit',4,NULL,'dsfsdfsdf','2023-04-03 09:47:06'),(7,'phpInit',4,NULL,'dsfsdfsdf','2023-04-04 10:36:39'),(8,'HTML',4,NULL,'kjfhkefhlzfcbkfjevclzjhlck','2023-04-04 14:04:36'),(9,'HTML',4,NULL,'kjfhkefhlzfcbkfjevclzjhlck','2023-04-04 14:05:36'),(10,'HTML',4,NULL,'kjfhkefhlzfcbkfjevclzjhlck','2023-04-11 15:05:18'),(11,'Course 1',1,NULL,'This is course 1','2023-05-03 09:35:53'),(12,'Course 2',2,NULL,'This is course 2','2023-05-03 09:35:53'),(13,'Course 3',1,NULL,'This is course 3','2023-05-03 09:35:53'),(14,'Course 1',1,NULL,'This is course 1','2023-05-03 09:36:30'),(15,'Course 2',2,NULL,'This is course 2','2023-05-03 09:36:30'),(16,'Course 3',1,NULL,'This is course 3','2023-05-03 09:36:30'),(17,'Course 1',1,NULL,'This is the description for Course 1','2023-05-03 09:37:55'),(18,'Course 2',2,NULL,'This is the description for Course 2','2023-05-03 09:37:55'),(19,'Course 3',1,NULL,'This is the description for Course 3','2023-05-03 09:37:55');
/*!40000 ALTER TABLE `COURSE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOLLOWED_COURSE`
--

DROP TABLE IF EXISTS `FOLLOWED_COURSE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FOLLOWED_COURSE` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USER_ID` int NOT NULL,
  `COURSE_ID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  CONSTRAINT `FOLLOWED_COURSE_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `FOLLOWED_COURSE_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `COURSE` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOLLOWED_COURSE`
--

LOCK TABLES `FOLLOWED_COURSE` WRITE;
/*!40000 ALTER TABLE `FOLLOWED_COURSE` DISABLE KEYS */;
INSERT INTO `FOLLOWED_COURSE` VALUES (1,1,1),(2,2,2),(3,3,3),(4,1,1),(5,2,2),(6,3,3),(7,1,1),(8,1,2),(9,2,3);
/*!40000 ALTER TABLE `FOLLOWED_COURSE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FORUM_DISCUSSION`
--

DROP TABLE IF EXISTS `FORUM_DISCUSSION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FORUM_DISCUSSION` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USER_ID` int NOT NULL,
  `COURSE_ID` int NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  CONSTRAINT `FORUM_DISCUSSION_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `FORUM_DISCUSSION_ibfk_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `COURSE` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FORUM_DISCUSSION`
--

LOCK TABLES `FORUM_DISCUSSION` WRITE;
/*!40000 ALTER TABLE `FORUM_DISCUSSION` DISABLE KEYS */;
INSERT INTO `FORUM_DISCUSSION` VALUES (1,1,1,'Discussion 4','2023-05-03 09:34:56'),(2,2,2,'Discussion 5','2023-05-03 09:34:56'),(3,3,3,'Discussion 6','2023-05-03 09:34:56'),(4,1,1,'Discussion 1','2023-05-03 09:35:53'),(5,2,2,'Discussion 2','2023-05-03 09:35:53'),(6,3,3,'Discussion 3','2023-05-03 09:35:53'),(7,1,1,'Discussion 1','2023-05-03 09:36:30'),(8,2,2,'Discussion 2','2023-05-03 09:36:30'),(9,3,3,'Discussion 3','2023-05-03 09:36:30'),(10,1,1,'Discussion 1','2023-05-03 09:37:55'),(11,2,2,'Discussion 2','2023-05-03 09:37:55'),(12,2,3,'Discussion 3','2023-05-03 09:37:55');
/*!40000 ALTER TABLE `FORUM_DISCUSSION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FORUM_MESSAGE`
--

DROP TABLE IF EXISTS `FORUM_MESSAGE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FORUM_MESSAGE` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USER_ID` int NOT NULL,
  `DISCUSSION_ID` int NOT NULL,
  `CONTENT` varchar(256) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `DISCUSSION_ID` (`DISCUSSION_ID`),
  CONSTRAINT `FORUM_MESSAGE_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `FORUM_MESSAGE_ibfk_2` FOREIGN KEY (`DISCUSSION_ID`) REFERENCES `FORUM_DISCUSSION` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FORUM_MESSAGE`
--

LOCK TABLES `FORUM_MESSAGE` WRITE;
/*!40000 ALTER TABLE `FORUM_MESSAGE` DISABLE KEYS */;
INSERT INTO `FORUM_MESSAGE` VALUES (1,1,1,'Message 4','2023-05-03 09:34:56'),(2,2,2,'Message 5','2023-05-03 09:34:56'),(3,3,3,'Message 6','2023-05-03 09:34:56'),(4,1,1,'Message 1','2023-05-03 09:35:53'),(5,2,2,'Message 2','2023-05-03 09:35:53'),(6,3,3,'Message 3','2023-05-03 09:35:53'),(7,1,1,'Message 1','2023-05-03 09:36:30'),(8,2,2,'Message 2','2023-05-03 09:36:30'),(9,3,3,'Message 3','2023-05-03 09:36:30'),(10,1,1,'This is a message in Discussion 1','2023-05-03 09:37:55'),(11,2,1,'This is another message in Discussion 1','2023-05-03 09:37:55'),(12,1,2,'This is a message in Discussion 2','2023-05-03 09:37:55'),(13,2,3,'This is a message in Discussion 3','2023-05-03 09:37:55');
/*!40000 ALTER TABLE `FORUM_MESSAGE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TEST`
--

DROP TABLE IF EXISTS `TEST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TEST` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `COURSE_ID` int NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `COURSE_ID` (`COURSE_ID`),
  CONSTRAINT `TEST_ibfk_1` FOREIGN KEY (`COURSE_ID`) REFERENCES `COURSE` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TEST`
--

LOCK TABLES `TEST` WRITE;
/*!40000 ALTER TABLE `TEST` DISABLE KEYS */;
INSERT INTO `TEST` VALUES (1,'Test 1',1,'2023-05-03 09:35:53'),(2,'Test 2',2,'2023-05-03 09:35:53'),(3,'Test 3',3,'2023-05-03 09:35:53'),(4,'Test 1',1,'2023-05-03 09:36:30'),(5,'Test 2',2,'2023-05-03 09:36:30'),(6,'Test 3',3,'2023-05-03 09:36:30'),(7,'Test 1',1,'2023-05-03 09:37:55'),(8,'Test 2',2,'2023-05-03 09:37:55'),(9,'Test 3',3,'2023-05-03 09:37:55');
/*!40000 ALTER TABLE `TEST` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TEST_USER`
--

DROP TABLE IF EXISTS `TEST_USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TEST_USER` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TEST_ID` int NOT NULL,
  `USER_ID` int NOT NULL,
  `SCORE` decimal(5,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TEST_USER`
--

LOCK TABLES `TEST_USER` WRITE;
/*!40000 ALTER TABLE `TEST_USER` DISABLE KEYS */;
INSERT INTO `TEST_USER` VALUES (1,1,1,90.50),(2,2,2,85.00),(3,3,3,92.30),(4,1,1,85.50),(5,1,2,90.25),(6,2,1,78.00),(7,2,2,92.75),(8,3,1,89.00),(9,3,2,87.50);
/*!40000 ALTER TABLE `TEST_USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `USER` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `NIVEAU` int DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (1,'charles','charles',NULL,NULL,'charles','ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a','student','2023-05-03 09:30:51'),(2,'charles','charles',NULL,NULL,'charle','ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a','student','2023-05-03 09:30:51'),(3,'ciccio','ciccio',NULL,NULL,'ciccio','ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a','3','2023-05-03 09:30:51'),(4,'charles','charles',NULL,NULL,'CharleT','ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a','teacher','2023-05-03 09:30:51'),(5,'John','Doe','john.doe@example.com',1,'johndoe','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e','student','2023-05-03 09:35:53'),(6,'Jane','Smith','jane.smith@example.com',2,'janesmith','6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4','student','2023-05-03 09:35:53'),(7,'Admin','User','admin@example.com',10,'admin','5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764','teacher','2023-05-03 09:35:53'),(8,'John','Doe','john.doe@example.com',1,'johndoe','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e','student','2023-05-03 09:36:30'),(9,'Jane','Smith','jane.smith@example.com',2,'janesmith','6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4','student','2023-05-03 09:36:30'),(10,'Admin','User','admin@example.com',10,'admin','5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764','teacher','2023-05-03 09:36:30');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `INSERT_ADMIN_DENY` BEFORE INSERT ON `USER` FOR EACH ROW IF NEW.ROLE='3' THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Insert not possible';
    END IF */;;
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`%`*/ /*!50003 TRIGGER `CRIPT_PASSWORD` BEFORE INSERT ON `USER` FOR EACH ROW SET NEW.PASSWORD=SHA2(NEW.PASSWORD,256) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-04 16:28:53
