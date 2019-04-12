-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: shivam
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contains`
--

DROP TABLE IF EXISTS `contains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contains` (
  `no_plate` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  KEY `no_plate` (`no_plate`),
  KEY `location` (`location`),
  CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`no_plate`) REFERENCES `taxi` (`no_plate`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`location`) REFERENCES `taxistand` (`location`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contains`
--

LOCK TABLES `contains` WRITE;
/*!40000 ALTER TABLE `contains` DISABLE KEYS */;
INSERT INTO `contains` VALUES ('MH12TY6541','Hadapsar'),('MH12DF3427','HADAPSAR'),('MH12MB2562','Hadapsar'),('MH12AL7689','Swargate'),('MH12AB9122','ShivajiNagar'),('MH12AB8764','VimanNagar'),('MH12EC1298','Swargate'),('MH12AB6111','ShivajiNagar'),('MH12AD7702','Aundh'),('MH12AB2347','Kothrud'),('MH12QP7701','Aundh'),('MH42AB7701','Camp'),('MH12CB2562','ShivajiNagar');
/*!40000 ALTER TABLE `contains` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `t2` BEFORE INSERT ON `contains` FOR EACH ROW begin
set @temp1=(select pickup_ts from ride order by rideid desc limit 1);
set @cntq1=(select count(*) from contains where location= @temp1);
if(@cntq1 = 0) then 
set new.location= @temp1;
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `t1` BEFORE INSERT ON `contains` FOR EACH ROW begin
set @temp=(select drop_ts from ride order by rideid desc limit 1);
set @cntq=(select count(*) from contains where location= @temp);
if(@cntq > 4) then
if(@temp='AUNDH') THEN set new.location='Shivajinagar';
elseif(@temp='VIMANNAGAR') THEN set new.location='Hadapsar';
elseif(@temp='SWARGATE') THEN set new.location='Shivajinagar';
elseif(@temp='SHIVAJINAGAR')THEN set new.location='Swargate';
elseif(@temp='KOTHRUD')THEN set new.location='Swargate';
elseif(@temp='KATRAJ')THEN set new.location='Swargate';
elseif(@temp='HADAPSAR')THEN set new.location='Swargate';
elseif(@temp='CAMP')THEN set new.location='Shivajinagar';
end if;
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ride`
--

DROP TABLE IF EXISTS `ride`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ride` (
  `rideid` int(10) NOT NULL AUTO_INCREMENT,
  `pickup` varchar(100) DEFAULT NULL,
  `dropdown` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `no_plate` varchar(20) DEFAULT NULL,
  `driverid` int(11) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `pickup_ts` varchar(40) DEFAULT NULL,
  `drop_ts` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`rideid`),
  KEY `userid` (`userid`),
  KEY `no_plate` (`no_plate`),
  KEY `driverid` (`driverid`),
  CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`no_plate`) REFERENCES `taxi` (`no_plate`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ride_ibfk_3` FOREIGN KEY (`driverid`) REFERENCES `taxidriver` (`driverid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ride`
--

LOCK TABLES `ride` WRITE;
/*!40000 ALTER TABLE `ride` DISABLE KEYS */;
INSERT INTO `ride` VALUES (229,'Sarhad School, Katraj, Pune, Maharashtra, India','Kothrud, Pune, Maharashtra, India',24,'MH12AB8764',193,'OCT 7','23:48:17',3,148,'Katraj','Kothrud'),(230,'SGS Mall, Camp, Pune, Maharashtra, India','MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India',24,'MH12AB2347',190,'OCT 7','23:50:41',5,118,'Camp','Kothrud'),(231,'Saras Baug, Pune, Maharashtra, India','Sarhad School, Katraj, Pune, Maharashtra, India',24,'MH42AB7701',188,'OCT 7','23:57:12',5,77,'Swargate','Katraj'),(232,'Boutique Apartment, Sadhu Vasvani Nagar, Aundh, Pune, Maharashtra, India','Sarhad School, Katraj, Pune, Maharashtra, India',24,'MH12AB9122',202,'OCT 7','23:58:16',5,168,'Aundh','Katraj'),(233,'Boutique Apartment, Sadhu Vasvani Nagar, Aundh, Pune, Maharashtra, India','Amanora Park Town, Hadapsar, Pune, Maharashtra, India',24,'MH12DF3427',191,'OCT 8','0:0:5',5,214,'Aundh','Hadapsar'),(235,'Sarhad School, Katraj, Pune, Maharashtra, India','Viman Nagar, Pune, Maharashtra, India',24,'MH12AD7702',198,'OCT 8','0:7:10',5,217,'Katraj','VimanNagar'),(236,'Saras Baug, Pune, Maharashtra, India','SGS Mall, Camp, Pune, Maharashtra, India',24,'MH12MB2562',201,'OCT 8','0:8:3',5,62,'Swargate','Camp'),(237,'MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India','Boutique Apartment, Sadhu Vasvani Nagar, Aundh, Pune, Maharashtra, India',24,'MH12AB8764',193,'OCT 8','0:8:26',5,102,'Kothrud','Aundh'),(238,'Pune International Airport Area, Lohgaon, Pune, Maharashtra, India','Fergusson College (Autonomous University), FC Road, Shivajinagar, Pune, Maharashtra, India',25,'MH12AD7702',198,'OCT 8','0:9:59',5,211,'VimanNagar','ShivajiNagar'),(239,'SGS Mall, Camp, Pune, Maharashtra, India','Pune International Airport Area, Lohgaon, Pune, Maharashtra, India',25,'MH12MB2562',201,'OCT 8','0:12:6',5,158,'Camp','VimanNagar'),(240,'Phoenix Market City Pune, Clover Park, Viman Nagar, Pune, Maharashtra, India','MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India',25,'MH12MB2562',201,'OCT 8','0:22:21',4,197,'VimanNagar','Kothrud'),(241,'Boutique Apartment, Sadhu Vasvani Nagar, Aundh, Pune, Maharashtra, India','MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India',25,'MH12AB8764',193,'OCT 8','0:24:15',4,106,'Aundh','Kothrud'),(242,'Phoenix Market City Pune, Clover Park, Viman Nagar, Pune, Maharashtra, India','MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India',25,'MH12MB2562',201,'OCT 8','0:28:43',4,197,'VimanNagar','Kothrud'),(243,'Dehu Road, Maharashtra, India','Aundh, Pune, Maharashtra, India',27,'MH12AB8764',193,'OCT 11','15:59:13',4,275,'Aundh','Aundh'),(244,'Kondhwa Budruk, Pune, Maharashtra, India','Kothrud, Pune, Maharashtra, India',27,'MH12QP7701',199,'OCT 11','16:0:33',2,160,'Katraj','Kothrud'),(245,'Amanora Park Town, Hadapsar, Pune, Maharashtra, India','Vadgaon Budruk, Pune, Maharashtra, India',27,'MH12CB2562',196,'OCT 11','16:1:35',4,215,'Hadapsar','Katraj'),(246,'Pashan Lake, Pashan, Pune, Maharashtra','Carnival Cinemas, Marigold complex, Kalyani Nagar, Pune, Maharashtra, India',27,'MH12AB8764',193,'OCT 11','16:3:17',3,196,'Aundh','VimanNagar'),(247,'Apollo Theatre, New Raviwar Peth, Somwar Peth, Pune, Maharashtra, India','ISKCON NVCC Temple, Iskcon Nvcc Road, Tilekar Nagar, Kondhwa Budruk, Pune, Maharashtra, India',27,'MH12AL7689',203,'OCT 11','16:5:21',3,118,'Swargate','Katraj'),(248,'JW Marriott Hotel Pune, Laxmi Society, Model Colony, Lakshmi Society, Pune, Maharashtra, India','Ghorpadi, Pune, Maharashtra, India',27,'MH12AD7702',198,'OCT 11','16:9:10',4,134,'ShivajiNagar','Camp'),(249,'Katraj Lake, Katraj Vasahat, Katraj, Pune, Maharashtra, India','SRPF, Wanowrie, Pune, Maharashtra, India',27,'MH12QP7701',199,'OCT 11','16:9:55',1,119,'Katraj','Camp'),(250,'Sarhad School, Katraj, Pune, Maharashtra, India','Gunjan Theatre Chowk, Blue Hill Society, Yerawada, Pune, Maharashtra',27,'MH12AB6111',192,'OCT 11','16:10:33',4,168,'Katraj','VimanNagar'),(251,'Symbiosis College Of Arts ','Bharati Vidyapeeth Campus, Dhankawadi, Pune, Maharashtra, India',27,'MH12AD7702',198,'OCT 11','16:11:6',4,124,'ShivajiNagar','Katraj'),(252,'R.T.O ., Sangamvadi, Pune, Maharashtra, India','Bombay Sappers Colony, Aga Nagar, Vadgaon Sheri, Pune, Maharashtra, India',27,'MH12AD7702',198,'OCT 11','16:11:50',1,127,'ShivajiNagar','VimanNagar'),(253,'MIT, Paud Road, Rambaug Colony, Kothrud, Pune, Maharashtra, India','Vadgaon Sheri, Pune, Maharashtra, India',27,'MH12AB2347',190,'OCT 11','16:12:34',5,202,'Kothrud','VimanNagar'),(254,'Deccan Gymkhana, Pune, Maharashtra, India','University Road, Model Colony, Shivajinagar, Pune, Maharashtra, India',27,'MH12AD7702',198,'OCT 11','16:13:13',3,28,'ShivajiNagar','ShivajiNagar'),(255,'Pune Okayama Friendship Garden, Dattawadi, Pune, Maharashtra, India','Shaniwar Wada Garden, Shaniwar Peth, Pune, Maharashtra, India',28,'MH12AB9122',202,'OCT 11','16:23:37',2,67,'Swargate','ShivajiNagar'),(256,'Nal Stop, Pandurang Colony, Erandwane, Pune, Maharashtra, India','Gopalpatti, Maharashtra, India',28,'MH12AB2347',190,'OCT 11','16:25:0',4,204,'Kothrud','Hadapsar'),(257,'Nilanjali Society, Kalyani Nagar, Pune, Maharashtra, India','Range Hills, Pune, Maharashtra, India',28,'MH12AB6111',192,'OCT 11','16:29:24',5,104,'VimanNagar','ShivajiNagar'),(258,'Khadki Bazar, Khadki, Pune, Maharashtra, India','NDA Pashan Road, Ward No. 8, NCL Colony, Pashan, Pune, Maharashtra, India',28,'MH12AD7702',198,'OCT 11','16:30:0',3,86,'ShivajiNagar','Aundh'),(259,'Smrutivan, Gandhi Bhavan Road, Chaitanya Nagar, Kothrud, Pune, Maharashtra, India','Wakadewadi, Shivajinagar, Pune, Maharashtra, India',28,'MH12AB2347',190,'OCT 11','17:9:14',4,131,'Kothrud','ShivajiNagar'),(260,'Rajiv Gandhi Zoological Park, Katraj, Pune, Maharashtra, India','NCC Canteen, Shivajinagar, Pune, Maharashtra, India',28,'MH12CB2562',196,'OCT 11','17:13:44',5,132,'Katraj','ShivajiNagar'),(261,'Kharadi, Pune, Maharashtra, India','INOX, Bund Garden Road, Agarkar Nagar, Pune, Maharashtra, India',28,'MH12AB8764',193,'OCT 11','17:14:19',3,108,'VimanNagar','Camp'),(262,'Katraj Bus Depot, Santosh Nagar, Katraj, Pune, Maharashtra, India','Mitra Mandal Colony, Parvati Paytha, Pune, Maharashtra, India',28,'MH12CB2562',196,'OCT 11','17:14:37',3,84,'Katraj','Swargate'),(263,'East Street, Camp, Pune, Maharashtra, India','Katakirrr Misal, Bhonde Colony, Erandwane, Pune, Maharashtra, India',28,'MH12QP7701',199,'OCT 11','17:16:6',3,88,'Camp','ShivajiNagar'),(264,'SGS Mall, 231, Moledina Rd, Camp, Pune, Maharashtra, India','Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pune, Maharashtra, India',28,'MH12QP7701',199,'OCT 11','17:16:46',4,304,'Camp','Aundh'),(265,'MG Road Pune Camp, Camp, Pune, Maharashtra','MIT College of Engineering, Rambaug Colony, Kothrud, Pune, Maharashtra, India',28,'MH42AB7701',188,'OCT 11','17:17:48',5,118,'Camp','Kothrud'),(266,'Symbiosis Law School, Mhada Colony, Viman Nagar, Pune, Maharashtra, India','Bund Garden, Sangamvadi, Pune, Maharashtra, India',28,'MH12AB8764',193,'OCT 11','17:22:11',4,76,'VimanNagar','Camp'),(267,'Laxmi Road, Ganesh Peth, Pune, Maharashtra, India','Bombay Engineering Group, Ranjeet Nagar, Sangamvadi, Pune, Maharashtra, India',29,'MH42AB7701',188,'OCT 11','17:25:51',1,108,'Camp','ShivajiNagar'),(268,'Darshan Restaurant, Deccan Gymkhana, Pune, Maharashtra, India','Model Colony, Shivajinagar, Pune, Maharashtra, India',29,'MH12AB9122',202,'OCT 11','17:48:14',1,32,'ShivajiNagar','ShivajiNagar');
/*!40000 ALTER TABLE `ride` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxi`
--

DROP TABLE IF EXISTS `taxi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `taxi` (
  `no_plate` varchar(20) NOT NULL,
  PRIMARY KEY (`no_plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxi`
--

LOCK TABLES `taxi` WRITE;
/*!40000 ALTER TABLE `taxi` DISABLE KEYS */;
INSERT INTO `taxi` VALUES ('MH12AB2347'),('MH12AB6111'),('MH12AB8764'),('MH12AB9122'),('MH12AD7702'),('MH12AL7689'),('MH12CB2562'),('MH12DF3427'),('MH12EC1298'),('MH12MB2562'),('MH12QP7701'),('MH12TY6541'),('MH42AB7701');
/*!40000 ALTER TABLE `taxi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxidriver`
--

DROP TABLE IF EXISTS `taxidriver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `taxidriver` (
  `driverid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone_no` bigint(20) DEFAULT NULL,
  `no_plate` varchar(20) DEFAULT NULL,
  `driverage` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`driverid`),
  KEY `no_plate` (`no_plate`),
  CONSTRAINT `taxidriver_ibfk_1` FOREIGN KEY (`no_plate`) REFERENCES `taxi` (`no_plate`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxidriver`
--

LOCK TABLES `taxidriver` WRITE;
/*!40000 ALTER TABLE `taxidriver` DISABLE KEYS */;
INSERT INTO `taxidriver` VALUES (188,'gaurav ingale','1989-01-11',7758849973,'MH42AB7701',NULL,'gaurav@gmail.com','qwerty',0),(190,'aayush virkar','1989-01-13',8765432187,'MH12AB2347',NULL,'aayush@gmail.com','qwerty',0),(191,'mihir sase','1989-01-14',7689045673,'MH12DF3427',NULL,'mihir@gmail.com','qwerty',4.5),(192,'aditya sarwate','1989-01-15',8411863858,'MH12AB6111',NULL,'aditya@gmail.com','qwerty',0),(193,'sahil waykole','1989-01-17',8793339625,'MH12AB8764',NULL,'waykole@gmail.com','qwerty',0),(196,'nikhil pitty','1989-01-19',8765432139,'MH12CB2562',NULL,'nikhil@gmail.com','qwerty',0),(197,'adarsh shinde','1989-01-01',9875467321,'MH12TY6541',NULL,'adarsh@gmail.com','qwerty',0),(198,'anurag wani','1989-02-21',7689045123,'MH12AD7702',NULL,'anurag@gmail.com','qwerty',0),(199,'sanket patil','1988-01-11',7755549973,'MH12QP7701',NULL,'sanket@gmail.com','qwerty',0),(200,'amit singh','1989-01-04',9881627345,'MH12EC1298',NULL,'amit@gmail.com','qwerty',0),(201,'mehul shah','1989-01-09',8411863111,'MH12MB2562',NULL,'mehul@gmail.com','qwerty',0),(202,'shivam shishangia','1989-01-25',8793336625,'MH12AB9122',NULL,'shivam@gmail.com','qwerty',0),(203,'sahil shegal','1989-01-11',8488863858,'MH12AL7689',NULL,'sehgal@gmail.com','qwerty',0);
/*!40000 ALTER TABLE `taxidriver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxistand`
--

DROP TABLE IF EXISTS `taxistand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `taxistand` (
  `location` varchar(20) NOT NULL,
  PRIMARY KEY (`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxistand`
--

LOCK TABLES `taxistand` WRITE;
/*!40000 ALTER TABLE `taxistand` DISABLE KEYS */;
INSERT INTO `taxistand` VALUES ('Aundh'),('Camp'),('Hadapsar'),('Katraj'),('Kothrud'),('ShivajiNagar'),('Swargate'),('VimanNagar');
/*!40000 ALTER TABLE `taxistand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `phone_no` bigint(20) DEFAULT NULL,
  `no_of_rides` int(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (24,'prajakta pardesi',9875567322,8,'pp@gmail.com','qwerty'),(25,'onkar ingale',9665229972,5,'onkar@gmail.com','qwerty'),(26,'girish shirke',7775978824,1,'girish@gmail.com','qwerty'),(27,'Manisha Thakkar',9876543678,12,'manisha@gmail.com','qwerty'),(28,'vasundhra ghate',7623986578,12,'vasu@gmail.com','qwerty'),(29,'vithall gutte',8759023847,2,'vithal@gmail.com','qwerty');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-11 19:08:01
