CREATE DATABASE  IF NOT EXISTS `tcc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `tcc`;
-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: tcc
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ciencia`
--

DROP TABLE IF EXISTS `ciencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome2` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada2` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome3` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada3` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome4` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada4` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turma` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientador` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciencia`
--

LOCK TABLES `ciencia` WRITE;
/*!40000 ALTER TABLE `ciencia` DISABLE KEYS */;
INSERT INTO `ciencia` VALUES (3,'marcelo','8','Billy','2','Oswaldo','7','Amanda','1','3Â°Informatica','o sol tÃ¡ quente','Douglas'),(4,'Karol','13','SÃ¡vio','28','Jubileu','35','Irineu','44','2Â°AdministraÃ§Ã£o','agua molhada','Leandro'),(5,'marcelo','18','Billy','22','Oswaldo','30','Paula','1','1Â°InformÃ¡tica','qualquer coisa','Leandro'),(6,'jubideisclebson','1','Billy','2','Oswaldo','7','Paula Tejando','4','2Â°adiministracao','wikihow/como agir feito um vampiro','Leandro'),(7,'jubideisclebson','1','Billy','2','Oswaldo','7','Irineu','4','2Â°Enfermagem','agua molhada','JÃ©ssica'),(8,'jubideisclebson','1','Billy','2','Oswaldo','7','vallery','4','2Â°Enfermagem','qualquer coisa','Marcos'),(9,'jubideisclebson','1','Billy','2','Oswaldo','7','vallery','4','2Â°Enfermagem','qualquer coisa','Marcos'),(10,'jubideisclebson','1','Billy','2','Oswaldo','7','vallery','4','2Â°Enfermagem','qualquer coisa','Marcos'),(11,'jubideisclebson','1','Billy','2','Oswaldo','7','vallery','4','2Â°Enfermagem','qualquer coisa','Marcos'),(12,'jubideisclebson','1','Billy','2','Oswaldo','7','Irineu','4','1Â°Informatica','qualquer coisa','JÃ©ssica');
/*!40000 ALTER TABLE `ciencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copinha`
--

DROP TABLE IF EXISTS `copinha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copinha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome2` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada2` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome3` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada3` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome4` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada4` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome5` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamada5` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipe` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copinha`
--

LOCK TABLES `copinha` WRITE;
/*!40000 ALTER TABLE `copinha` DISABLE KEYS */;
INSERT INTO `copinha` VALUES (7,'marcelo','10','crisley','20','sergio','30','kayo','40','David','50','HD pifado','masculino'),(6,'jubideisclebson','1','Billy','2','Oswaldo','7','guilherme','4','Cleyson','6','8-Bits','masculino'),(9,'vanda','2','vanderson','22','vanessa','222','vallery','2222','vanielly','22222','tanto faz','feminino'),(11,'a','9','b','8','c','7','d','6','e','5','a1','masculino'),(15,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(14,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(16,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(17,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(18,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(19,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(20,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(21,'marcelo','1','crisley','2','Oswaldo','7','Irineu','4','Cleyson','6','tanto faz','masculino'),(22,'jubideisclebson','1','Billy','2','Oswaldo','7','d','4','Crirney','6','a1','masculino');
/*!40000 ALTER TABLE `copinha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logar`
--

DROP TABLE IF EXISTS `logar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logar`
--

LOCK TABLES `logar` WRITE;
/*!40000 ALTER TABLE `logar` DISABLE KEYS */;
INSERT INTO `logar` VALUES (1,'administrador@gmail.com','aguamolhada');
/*!40000 ALTER TABLE `logar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `natal`
--

DROP TABLE IF EXISTS `natal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `natal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feijao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arroz` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `macarrao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oleo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `natal`
--

LOCK TABLES `natal` WRITE;
/*!40000 ALTER TABLE `natal` DISABLE KEYS */;
INSERT INTO `natal` VALUES (1,'1 Informatica','5','8','4','6'),(2,'1 Enfermagem','0','0','0','0'),(3,'1 Administracao','21','12','32','23'),(4,'2 Informatica','5','0','0','0'),(5,'2 Enfermagem','9','9','90','7'),(6,'2 Administracao','14','2','68','3'),(7,'3 Informatica','65','56','47','74'),(8,'3 Enfermagem','0','0','0','0'),(9,'3 Administracao','14','2','68','3');
/*!40000 ALTER TABLE `natal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-28 14:46:16
