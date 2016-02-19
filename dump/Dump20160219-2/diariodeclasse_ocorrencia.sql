CREATE DATABASE  IF NOT EXISTS `diariodeclasse` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `diariodeclasse`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: diariodeclasse
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
-- Table structure for table `ocorrencia`
--

DROP TABLE IF EXISTS `ocorrencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocorrencia` (
  `idOcorrencia` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idUsuario` int(11) NOT NULL,
  `fk_idAluno` int(11) NOT NULL,
  `fk_idTurma` int(11) NOT NULL,
  `Data` date NOT NULL,
  `ocorrencia` varchar(450) NOT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOcorrencia`,`fk_idUsuario`),
  KEY `fk_Ocorrencia_Aluno1_idx` (`fk_idAluno`),
  KEY `fk_Ocorrencia_Turma1_idx` (`fk_idTurma`),
  KEY `fk_Ocorrencia_Usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_Ocorrencia_Aluno1` FOREIGN KEY (`fk_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Ocorrencia_Turma1` FOREIGN KEY (`fk_idTurma`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Ocorrencia_Usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocorrencia`
--

LOCK TABLES `ocorrencia` WRITE;
/*!40000 ALTER TABLE `ocorrencia` DISABLE KEYS */;
INSERT INTO `ocorrencia` VALUES (1,1,1,1,'2016-01-26','nunca v',1),(2,1,1,1,'2016-01-23','Eita que sumiu tudo edit',1),(3,1,1,1,'2016-01-23','Colocando para Ontem 1',1),(4,1,1,1,'0000-00-00','nunca vai quando eu falo que vai',1),(5,1,1,1,'2016-02-02','do lado allan',0),(6,1,1,1,'2016-01-25','bug 2',0),(7,1,1,1,'2016-01-24','concerto',0);
/*!40000 ALTER TABLE `ocorrencia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-19 16:40:31
