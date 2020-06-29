-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: rota
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.6-MariaDB
-- Date: Wed, 17 Jun 2020 14:29:44 -0300

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
  `arquivo` varchar(50) NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `clientes` VALUES (1,'administrador','rotasecurity@gmail.com','000.000.000-00','dd4b21e9ef71e1291183a46b913ae6f2','00000000','-','-','-'),(2,'tecnico','tecnico@gmail.com','111.111.111-11','1bbd886460827015e5d605ed44252251','11111111','-','-','-'),(3,'JOSE','JOSE@GMAIL.COM','222.222.222-22','1a635f368990eac3599ff377ceb48c1c','22222222','boleto-enem.pdf','conta de aguÃ¡ caio','22/05/2020'),(4,'MARCOS','MARCOS@GMAIL.COM','333.333.333-33','d27d320c27c3033b7883347d8beca317','33333333','currÃ­culo.pdf','curriculo do marco','22/05/2020'),(5,'ANA','ANA@HOTMAIL.COM','444.444.444-44','b857eed5c9405c1f2b98048aae506792','44444444','currÃ­culo.pdf','ana','22/05/2020'),(6,'CAIO','CAIO@HOTMAIL.COM','555.555.555-55','f638f4354ff089323d1a5f78fd8f63ca','55555555','boleto-enem.pdf','conta de aguÃ¡ caio','22/05/2020'),(7,'LUCAS','LUCAS@GMAIL.COM','666.666.666-66','7c497868c9e6d3e4cf2e87396372cd3b','66666666','currÃ­culo.pdf','ana','24/05/2020'),(8,'JOANA','JOANA@HOTMAIL.COM','777.777.777-77','30e535568de1f9231e7d9df0f4a5a44d','77777777','currÃ­culo.pdf','ana','24/05/2020');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `clientes` with 8 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagens`
--

LOCK TABLES `imagens` WRITE;
/*!40000 ALTER TABLE `imagens` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `imagens` VALUES (1,0x63696E6E616D6F6E2D77616C6C70617065722E706E67),(3,0x6435666336363266663431636466666231323334393364663334313066656638);
/*!40000 ALTER TABLE `imagens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `imagens` with 2 row(s)
--

--
-- Table structure for table `postagens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagens` (
  `id_postagem` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo_postagem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_postagem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagens`
--

LOCK TABLES `postagens` WRITE;
/*!40000 ALTER TABLE `postagens` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `postagens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `postagens` with 0 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Wed, 17 Jun 2020 14:29:44 -0300
