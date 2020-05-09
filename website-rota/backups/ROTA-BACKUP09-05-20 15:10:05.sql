-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: rota
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.6-MariaDB
-- Date: Sat, 09 May 2020 15:10:05 -0300

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
-- Table structure for table `clientes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha_decript` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` longblob NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `clientes` VALUES (1,'administrador','rotasecurity@gmail.com','000.000.000-00','dd4b21e9ef71e1291183a46b913ae6f2','00000000','','-','-'),(2,'tecnico','tecnico@gmail.com','111.111.111-11','1bbd886460827015e5d605ed44252251','11111111','','-','-'),(19,'JOSE','JOSE@GMAIL.COM','222.222.222-22','bae5e3208a3c700e3db642b6631e95b9','22222222',0x3332353266373930373765653430326561333163616232373765646364646561,'dsdd','07/05/2020'),(20,'ANA','ANA@GMAIL.COM','444.444.444-44','b857eed5c9405c1f2b98048aae506792','44444444',0x3164356661333036643835646634373637323635613238336131366331303638,'aaa','07/05/2020'),(21,'SD','DS@GMAIL.COM','777.777.777-77','30e535568de1f9231e7d9df0f4a5a44d','77777777',0x3C696D673E,'descriÃ§Ã£o indisponÃ­vel!','07/05/2020'),(22,'KEVIN','KEVIN@HOTMAIL.COM','888.888.888-88','8ddcff3a80f4189ca1c9d4d902c3c909','88888888',0x4172717569766F20696E646973706F6EC3AD76656C21,'descriÃ§Ã£o indisponÃ­vel!','09/05/2020'),(23,'RINALDO','RINALDO@GMAIL.COM','121.212.121-21','d9eff2de5a0e0e46efad7ba4ef2e8706','21212121',0x4172717569766F20696E646973706F6EC3AD76656C21,'descriÃ§Ã£o indisponÃ­vel!','09/05/2020');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `clientes` with 7 row(s)
--

--
-- Table structure for table `imagens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagens` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` longblob NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `imagens` VALUES (8,0x6C696E65732D6E6574776F726B2E6A706567);
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `imagens` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sat, 09 May 2020 15:10:05 -0300
