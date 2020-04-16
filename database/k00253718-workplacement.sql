CREATE DATABASE  IF NOT EXISTS `k00253718-workplacement` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `k00253718-workplacement`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: k00253718-workplacement
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.8-MariaDB

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
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `applicant_firstname` varchar(45) DEFAULT NULL,
  `applicant_lastname` varchar(45) DEFAULT NULL,
  `applicant_address` varchar(45) DEFAULT NULL,
  `applicant_city` varchar(45) DEFAULT NULL,
  `applicant_email` varchar(45) DEFAULT NULL,
  `applicant_phone` varchar(45) DEFAULT NULL,
  `applicant_country` varchar(45) DEFAULT NULL,
  `available_to_travel` varchar(45) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `notice_period` varchar(45) DEFAULT NULL,
  `eu_citizenship` varchar(45) DEFAULT NULL,
  `cv` tinyblob DEFAULT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(15) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `job_location` varchar(15) DEFAULT NULL,
  `job_description` varchar(1000) DEFAULT NULL,
  `job_overview` varchar(1000) DEFAULT NULL,
  `job_salary` varchar(15) DEFAULT NULL,
  `preferred_skills` varchar(100) DEFAULT NULL,
  `job_duration` varchar(15) DEFAULT NULL,
  `duties_and_responsibilities` varchar(1000) DEFAULT NULL,
  `job_qualifications` varchar(500) DEFAULT NULL,
  `job_benefits` varchar(500) DEFAULT NULL,
  `job_types` varchar(500) DEFAULT NULL,
  `work_experience` varchar(1000) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(45) DEFAULT NULL,
  `user_lastname` varchar(45) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_gender` text DEFAULT NULL,
  `user_dob` datetime DEFAULT NULL,
  `user_profile` varchar(255) DEFAULT NULL,
  `user_country` text DEFAULT NULL,
  `user_phone` varchar(45) DEFAULT NULL,
  `forgotten_answer` varchar(100) DEFAULT NULL,
  `log_in` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'Jeff','Bezos','Jeff12345','k00123456@lit.ie','male','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_chat`
--

DROP TABLE IF EXISTS `users_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_firstname` varchar(45) DEFAULT NULL,
  `sender_lastname` varchar(45) DEFAULT NULL,
  `receiver_firstname` varchar(45) DEFAULT NULL,
  `receiver_lastname` varchar(45) DEFAULT NULL,
  `msg_content` varchar(225) DEFAULT NULL,
  `msg_status` text DEFAULT NULL,
  `msg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_chat`
--

LOCK TABLES `users_chat` WRITE;
/*!40000 ALTER TABLE `users_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_chat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-16 22:50:11
