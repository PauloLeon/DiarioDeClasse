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
-- Table structure for table `matricula_disciplina`
--

DROP TABLE IF EXISTS `matricula_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula_disciplina` (
  `fk_idAluno` int(11) NOT NULL,
  `fk_idDisciplina` int(11) NOT NULL,
  `ativo` int(11) DEFAULT '1',
  `idMatriculaDisciplina` int(11) NOT NULL,
  `FK_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idMatriculaDisciplina`),
  KEY `fk_matricula_disciplina_Disciplina1_idx` (`fk_idDisciplina`),
  KEY `fk_Matricula_disciplina_Usuario1_idx` (`FK_idUsuario`),
  KEY `fk_matricula_disciplina_Aluno1` (`fk_idAluno`),
  CONSTRAINT `fk_matricula_disciplina_Aluno1` FOREIGN KEY (`fk_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_disciplina_Disciplina1` FOREIGN KEY (`fk_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Matricula_disciplina_Usuario1` FOREIGN KEY (`FK_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula_disciplina`
--

LOCK TABLES `matricula_disciplina` WRITE;
/*!40000 ALTER TABLE `matricula_disciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula_disciplina` ENABLE KEYS */;
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
