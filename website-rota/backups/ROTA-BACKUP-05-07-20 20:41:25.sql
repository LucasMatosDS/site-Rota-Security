-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: rota
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.6-MariaDB
-- Date: Sun, 05 Jul 2020 20:41:25 -0300

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
  `arquivo` blob NOT NULL,
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
INSERT INTO `clientes` VALUES (1,'administrador','rotasecurity@gmail.com','000.000.000-00','dd4b21e9ef71e1291183a46b913ae6f2','00000000',0x2D,'-','-'),(2,'tecnico','tecnico@gmail.com','111.111.111-11','1bbd886460827015e5d605ed44252251','11111111',0x2D,'-','-'),(3,'JOSE','JOSE@GMAIL.COM','222.222.222-22','659139961dfa52223b3590a213f62c67','22222222',0x646F63642E646F63,'fdfd','22/05/2020'),(5,'ANA','ANA@HOTMAIL.COM','444.444.444-44','b857eed5c9405c1f2b98048aae506792','44444444',0x63757272C3AD63756C6F2E706466,'gffgg','22/05/2020'),(7,'LUCAS','LUCAS@GMAIL.COM','666.666.666-66','7c497868c9e6d3e4cf2e87396372cd3b','66666666',0x6C756361732E706466,'thghgh','24/05/2020'),(8,'JOANA','JOANA@HOTMAIL.COM','777.777.777-77','30e535568de1f9231e7d9df0f4a5a44d','77777777',0x6475722E646F6378,'kjkjkjk','24/05/2020');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `clientes` with 6 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagens`
--

LOCK TABLES `postagens` WRITE;
/*!40000 ALTER TABLE `postagens` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `postagens` VALUES (4,'fdfdfd','rgrrgrgrgrg'),(5,'kjkjk','jkjkhkhjkj'),(6,'Apple','Apple Inc. (NASDAQ: AAPL; NYSE: AAPL; anteriormente Apple Computer, Inc.) Ã© uma empresa multinacional norte-americana que tem o objetivo de projetar e comercializar produtos eletrÃ´nicos de consumo, software de computador e computadores pessoais. Os produtos de hardware mais conhecidos da empresa incluem a linha de computadores Macintosh, iPod, iPhone, iPad, Apple TV e o Apple Watch. Os softwares incluem o sistema operacional macOS, o navegador de mÃ­dia iTunes, suÃ­te de software multimÃ­dia e criatividade iLife, suÃ­te de software de produtividade iWork, Aperture, um pacote de fotografia profissional, Final Cut Studio, uma suÃ­te de vÃ­deo profissional, produtos de software, LÃ³gica Studio, um conjunto de ferramentas de produÃ§Ã£o musical, navegador Safari e o iOS, um sistema operacional mÃ³vel. ');
/*!40000 ALTER TABLE `postagens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `postagens` with 3 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 05 Jul 2020 20:41:25 -0300
