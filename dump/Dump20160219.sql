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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `fk_idTurma` int(11) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `fk_idUsuario` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idAluno`),
  KEY `fk_Aluno_Turma1_idx` (`fk_idTurma`),
  KEY `fk_Aluno_Usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_Aluno_Turma1` FOREIGN KEY (`fk_idTurma`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Aluno_Usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,'Eduardo',1,NULL,1,1),(2,'Gilberto',1,NULL,1,1),(3,'Evandro',1,NULL,1,1),(4,'Bruno',1,NULL,1,1),(5,'Rafael',1,NULL,1,1),(6,'José',4,NULL,1,1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diadeaula`
--

DROP TABLE IF EXISTS `diadeaula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diadeaula` (
  `idDiaDeAula` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idUsuario` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ativo` int(11) DEFAULT '1',
  `fk_idTurmaDisciplina` int(11) NOT NULL,
  PRIMARY KEY (`idDiaDeAula`),
  KEY `fk_idUsuario_idx` (`fk_idUsuario`),
  KEY `fk_DiaDeAula_Turma_disciplina1_idx` (`fk_idTurmaDisciplina`),
  CONSTRAINT `fk_DiaDeAula_Turma_disciplina1` FOREIGN KEY (`fk_idTurmaDisciplina`) REFERENCES `turma_disciplina` (`idTurmaDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_idUsuario_diadeaula` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diadeaula`
--

LOCK TABLES `diadeaula` WRITE;
/*!40000 ALTER TABLE `diadeaula` DISABLE KEYS */;
INSERT INTO `diadeaula` VALUES (1,1,4,'0000-00-00',1,3),(2,1,4,'2015-07-03',1,3),(3,1,4,'2015-07-03',1,3),(4,1,4,'2015-07-14',1,3);
/*!40000 ALTER TABLE `diadeaula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `fk_idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDisciplina`),
  KEY `fk_idUser_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_idUser` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,'ProgramaÃ§Ã£o',1,1),(2,'Banco de Dados',1,1),(3,'Design',1,1),(4,'Mat',1,1),(5,'Matematica',1,1);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escola`
--

DROP TABLE IF EXISTS `escola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escola` (
  `idEscola` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idEscola`),
  KEY `fk_Escola_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Escola_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escola`
--

LOCK TABLES `escola` WRITE;
/*!40000 ALTER TABLE `escola` DISABLE KEYS */;
INSERT INTO `escola` VALUES (1,'Cesupa',NULL,'BelÃ©m',NULL,1,1),(2,'John Knox',NULL,'Belem',NULL,1,0),(3,'John Knox Nome Teste',NULL,'Belem',NULL,1,1);
/*!40000 ALTER TABLE `escola` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `parecer`
--

DROP TABLE IF EXISTS `parecer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parecer` (
  `idParecer` int(11) NOT NULL AUTO_INCREMENT,
  `parecer` varchar(450) NOT NULL,
  `tipoParecer` varchar(55) NOT NULL,
  `fk_idAluno` int(11) NOT NULL,
  `fk_idUsuario` int(11) NOT NULL,
  `ativo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idParecer`),
  KEY `fk_Parecer_aluno1_idx` (`fk_idAluno`),
  KEY `fk_Parecer_usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_Parecer_aluno1` FOREIGN KEY (`fk_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Parecer_usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parecer`
--

LOCK TABLES `parecer` WRITE;
/*!40000 ALTER TABLE `parecer` DISABLE KEYS */;
INSERT INTO `parecer` VALUES (1,'não come','inserindo',4,1,1),(2,'novo','tipo2',4,1,0);
/*!40000 ALTER TABLE `parecer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `numero_de_alunos` int(11) DEFAULT NULL,
  `fk_idEscola` int(11) NOT NULL,
  `fk_idUsuario` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `tipo_frequencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTurma`),
  KEY `fk_Turma_Escola_idx` (`fk_idEscola`),
  KEY `fk_Turma_Usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_Turma_Escola` FOREIGN KEY (`fk_idEscola`) REFERENCES `escola` (`idEscola`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Turma_Usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'CC1MA','Matutino',NULL,1,1,1,1),(2,'CC2TA','Matutino',NULL,1,1,1,1),(3,'8° Serie','Vespertino',NULL,2,1,0,1),(4,'8° Serie','Vespertino',NULL,3,1,1,1);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_disciplina`
--

DROP TABLE IF EXISTS `turma_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_disciplina` (
  `fk_idTurma` int(11) NOT NULL,
  `fk_idDisciplina` int(11) NOT NULL,
  `idTurmaDisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idUsuario` int(11) NOT NULL,
  `ativo` int(11) DEFAULT '1',
  PRIMARY KEY (`idTurmaDisciplina`),
  KEY `fk_turma_disciplina_Turma1_idx` (`fk_idTurma`),
  KEY `fk_turma_disciplina_Disciplina1_idx` (`fk_idDisciplina`),
  KEY `fk_Turma_disciplina_Usuario1_idx` (`fk_idUsuario`),
  CONSTRAINT `fk_turma_disciplina_Disciplina1` FOREIGN KEY (`fk_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_turma_disciplina_Turma1` FOREIGN KEY (`fk_idTurma`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Turma_disciplina_Usuario1` FOREIGN KEY (`fk_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_disciplina`
--

LOCK TABLES `turma_disciplina` WRITE;
/*!40000 ALTER TABLE `turma_disciplina` DISABLE KEYS */;
INSERT INTO `turma_disciplina` VALUES (1,2,1,1,1),(1,3,2,1,1),(1,1,3,1,1),(2,2,4,1,1),(2,3,5,1,1),(3,5,6,1,1),(4,5,7,1,1);
/*!40000 ALTER TABLE `turma_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo_conta` varchar(15) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Paulo','pleonrosa@gmail.com','pulinho','free',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-19 16:54:09
