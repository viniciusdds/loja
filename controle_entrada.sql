-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: controle
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `codigo` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `unidade` int(11) NOT NULL,
  `descricao` varchar(45) CHARACTER SET latin1 NOT NULL,
  `custo` varchar(45) CHARACTER SET latin1 NOT NULL,
  `venda` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES (2,3,2,'bota','50.00','30.00','2017-04-10 23:34:45'),(5,100,1,'cueca','15.00','8.50','2017-04-10 23:44:24'),(9,1,2,'tenis','20.00','40.00','2017-04-10 23:32:09'),(10,1,1,'regata','8.00','20.00','2017-04-10 23:35:06'),(11,8,1,'vazo','4.50','3.50','2017-04-10 23:36:18'),(30,30,2,'sandalha','10.00','15.00','2017-04-14 19:25:05'),(45,10,1,'macacao','24.00','50.00','2017-04-14 19:23:20'),(1212,10,1,'blusa','20.00','','2017-04-10 23:07:32'),(2222,1,1,'calca','10.00','','2017-04-01 21:40:29'),(2245,1,1,'faca','45.00','','2017-04-01 21:39:12'),(4576,7,2,'camisa','12.00','','2017-04-09 19:25:29'),(5789,1,1,'bolsa','20.00','','2017-04-01 21:44:13'),(50980,3,1,'sapato','20.19','','2017-04-02 23:36:19');
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-13 23:42:27
