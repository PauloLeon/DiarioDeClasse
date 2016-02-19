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
-- Table structure for table `falta`
--

DROP TABLE IF EXISTS `falta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `falta` (
  `idFalta` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idAluno` int(11) DEFAULT NULL,
  `fk_idTurma_Disciplina` int(11) DEFAULT NULL,
  `fk_idDiaDeAula` int(11) NOT NULL,
  `fk_idUsuario` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `justificativa` varchar(300) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT '1',
  PRIMARY KEY (`idFalta`),
  KEY `fk_idAluno_idx` (`fk_idAluno`),
  KEY `fk_idTurma_Disciplina_idx` (`fk_idTurma_Disciplina`),
  KEY `fk_Falta_DiaDeAula1_idx` (`fk_idDiaDeAula`),
  KEY `fk_Falta_Usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_Falta_DiaDeAula1` FOREIGN KEY (`fk_idDiaDeAula`) REFERENCES `diadeaula` (`idDiaDeAula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Falta_Usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idAluno` FOREIGN KEY (`fk_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_idTurma_Disciplina` FOREIGN KEY (`fk_idTurma_Disciplina`) REFERENCES `turma_disciplina` (`fk_idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `falta`
--

LOCK TABLES `falta` WRITE;
/*!40000 ALTER TABLE `falta` DISABLE KEYS */;
INSERT INTO `falta` VALUES (1,1,2,2,1,'1991-06-28','texto justificando',2,1);
/*!40000 ALTER TABLE `falta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-19 16:40:30
