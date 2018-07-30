CREATE DATABASE  IF NOT EXISTS `videotiendajandy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `videotiendajandy`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: videotiendajandy
-- ------------------------------------------------------
-- Server version	5.7.22-log

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
-- Table structure for table `vj_alquiler`
--

DROP TABLE IF EXISTS `vj_alquiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_alquiler` (
  `id_alquiler` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_alquiler` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `valor_a_pagar` int(11) DEFAULT NULL,
  `cancelado_caja` int(11) DEFAULT NULL,
  `vj_peliculas_id_peliculas` int(11) NOT NULL,
  `vj_clientes_id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_alquiler`),
  KEY `fk_mv_alquiler_mv_peliculas1_idx` (`vj_peliculas_id_peliculas`),
  KEY `fk_mv_alquiler_mv_clientes1_idx` (`vj_clientes_id_cliente`),
  CONSTRAINT `fk_mv_alquiler_mv_clientes1` FOREIGN KEY (`vj_clientes_id_cliente`) REFERENCES `vj_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mv_alquiler_mv_peliculas1` FOREIGN KEY (`vj_peliculas_id_peliculas`) REFERENCES `vj_peliculas` (`id_peliculas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_alquiler`
--

LOCK TABLES `vj_alquiler` WRITE;
/*!40000 ALTER TABLE `vj_alquiler` DISABLE KEYS */;
INSERT INTO `vj_alquiler` VALUES (1,'2016-06-26','2016-06-28',15000,0,6,64854136);
/*!40000 ALTER TABLE `vj_alquiler` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `vj_alquiler_AFTER_INSERT` AFTER INSERT ON `vj_alquiler` FOR EACH ROW BEGIN
	UPDATE vj_peliculas SET estado_alquiler = 1 WHERE id_peliculas = NEW.vj_peliculas_id_peliculas;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `vj_alquiler_AFTER_UPDATE` AFTER UPDATE ON `vj_alquiler` FOR EACH ROW BEGIN
	INSERT INTO vj_historial_alquiladas (id_historial, vj_peliculas_id_peliculas, vj_clientes_id_cliente) VALUES ('0', NEW.vj_peliculas_id_peliculas, NEW.vj_clientes_id_cliente, now());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `vj_cargos`
--

DROP TABLE IF EXISTS `vj_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_cargos`
--

LOCK TABLES `vj_cargos` WRITE;
/*!40000 ALTER TABLE `vj_cargos` DISABLE KEYS */;
INSERT INTO `vj_cargos` VALUES (1,'Administrador'),(2,'Empleado'),(3,'Auxiliar'),(4,'Cliente');
/*!40000 ALTER TABLE `vj_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_categorias`
--

DROP TABLE IF EXISTS `vj_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_categorias`
--

LOCK TABLES `vj_categorias` WRITE;
/*!40000 ALTER TABLE `vj_categorias` DISABLE KEYS */;
INSERT INTO `vj_categorias` VALUES (1,'Accion','2018-06-25 00:00:00',1),(2,'Drama','2018-06-25 00:00:00',1),(3,'Comedia','2018-06-25 00:00:00',1),(4,'Terror','2018-05-25 00:00:00',1);
/*!40000 ALTER TABLE `vj_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_clientes`
--

DROP TABLE IF EXISTS `vj_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=92514788 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_clientes`
--

LOCK TABLES `vj_clientes` WRITE;
/*!40000 ALTER TABLE `vj_clientes` DISABLE KEYS */;
INSERT INTO `vj_clientes` VALUES (64854136,'Carmen','Payares','Cra 50','carmen@outlook.com',2741415),(92147986,'Carlos','Alvarez','Calle 20','carlos@hotmail.com',2814731),(92514787,'Juan','Perez','Calle 2','juan@gmail.com',2820141);
/*!40000 ALTER TABLE `vj_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_empleado`
--

DROP TABLE IF EXISTS `vj_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `vj_cargos_id_cargo` int(11) NOT NULL,
  `vj_roles_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_mv_empleado_mv_cargos1_idx` (`vj_cargos_id_cargo`),
  KEY `fk_mv_empleado_mv_roles1_idx` (`vj_roles_id_rol`),
  CONSTRAINT `fk_mv_empleado_mv_cargos1` FOREIGN KEY (`vj_cargos_id_cargo`) REFERENCES `vj_cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mv_empleado_mv_roles1` FOREIGN KEY (`vj_roles_id_rol`) REFERENCES `vj_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_empleado`
--

LOCK TABLES `vj_empleado` WRITE;
/*!40000 ALTER TABLE `vj_empleado` DISABLE KEYS */;
INSERT INTO `vj_empleado` VALUES (92147369,'Jorge','Davila','Cra 50',2824711,3,3),(92471142,'Dayro','Garay','Cra 10',2781474,2,2),(1102789456,'Ronaldo','Pestana','Calle 20',2824744,1,1);
/*!40000 ALTER TABLE `vj_empleado` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `vj_empleado_AFTER_INSERT` AFTER INSERT ON `vj_empleado` FOR EACH ROW BEGIN
	INSERT INTO vj_empleado_fecha_ingreso (id_ingreso, vj_empleado_id_empleado) VALUES ('0', NEW.id_empleado, now());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `vj_empleado_fecha_ingreso`
--

DROP TABLE IF EXISTS `vj_empleado_fecha_ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_empleado_fecha_ingreso` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `vj_empleado_id_empleado` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `fk_empleado_ingreso_idx` (`vj_empleado_id_empleado`),
  CONSTRAINT `fk_empleado_ingreso` FOREIGN KEY (`vj_empleado_id_empleado`) REFERENCES `vj_empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_empleado_fecha_ingreso`
--

LOCK TABLES `vj_empleado_fecha_ingreso` WRITE;
/*!40000 ALTER TABLE `vj_empleado_fecha_ingreso` DISABLE KEYS */;
/*!40000 ALTER TABLE `vj_empleado_fecha_ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_historial_alquiladas`
--

DROP TABLE IF EXISTS `vj_historial_alquiladas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_historial_alquiladas` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `vj_peliculas_id_peliculas` int(11) DEFAULT NULL,
  `vj_clientes_id_cliente` int(11) DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `fk_historial_peliculas_idx` (`vj_peliculas_id_peliculas`),
  KEY `fk_historia_peliculas_cliente_idx` (`vj_clientes_id_cliente`),
  CONSTRAINT `fk_historia_peliculas_cliente` FOREIGN KEY (`vj_clientes_id_cliente`) REFERENCES `vj_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_peliculas` FOREIGN KEY (`vj_peliculas_id_peliculas`) REFERENCES `vj_peliculas` (`id_peliculas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_historial_alquiladas`
--

LOCK TABLES `vj_historial_alquiladas` WRITE;
/*!40000 ALTER TABLE `vj_historial_alquiladas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vj_historial_alquiladas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_login_cliente`
--

DROP TABLE IF EXISTS `vj_login_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_login_cliente` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `user_cliente` varchar(45) DEFAULT NULL,
  `pass_cliente` varchar(45) DEFAULT NULL,
  `vj_clientes_id_cliente` int(11) NOT NULL,
  `vj_roles_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `fk_mv_login_mv_clientes1_idx` (`vj_clientes_id_cliente`),
  KEY `fk_mv_login_mv_roles1_idx` (`vj_roles_id_rol`),
  CONSTRAINT `fk_mv_login_mv_clientes1` FOREIGN KEY (`vj_clientes_id_cliente`) REFERENCES `vj_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mv_login_mv_roles1` FOREIGN KEY (`vj_roles_id_rol`) REFERENCES `vj_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_login_cliente`
--

LOCK TABLES `vj_login_cliente` WRITE;
/*!40000 ALTER TABLE `vj_login_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `vj_login_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_login_empleado`
--

DROP TABLE IF EXISTS `vj_login_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_login_empleado` (
  `id_login_empleado` int(11) NOT NULL,
  `user_emp` varchar(45) DEFAULT NULL,
  `pass_emp` varchar(45) DEFAULT NULL,
  `vj_roles_id_rol` int(11) NOT NULL,
  `vj_empleado_id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_login_empleado`),
  KEY `fk_mv_login_empleado_mv_roles1_idx` (`vj_roles_id_rol`),
  KEY `fk_mv_login_empleado_mv_empleado1_idx` (`vj_empleado_id_empleado`),
  CONSTRAINT `fk_mv_login_empleado_mv_empleado1` FOREIGN KEY (`vj_empleado_id_empleado`) REFERENCES `vj_empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mv_login_empleado_mv_roles1` FOREIGN KEY (`vj_roles_id_rol`) REFERENCES `vj_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_login_empleado`
--

LOCK TABLES `vj_login_empleado` WRITE;
/*!40000 ALTER TABLE `vj_login_empleado` DISABLE KEYS */;
INSERT INTO `vj_login_empleado` VALUES (1102789456,'admin','4321',1,1102789456);
/*!40000 ALTER TABLE `vj_login_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_peliculas`
--

DROP TABLE IF EXISTS `vj_peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_peliculas` (
  `id_peliculas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pelicula` varchar(45) DEFAULT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `sinopsis` text,
  `imagen` text,
  `estado_alquiler` int(11) DEFAULT NULL,
  `estado_reserva` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `vj_categorias_id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_peliculas`),
  KEY `fk_mv_peliculas_mv_categorias1_idx` (`vj_categorias_id_categoria`),
  CONSTRAINT `fk_vj_peliculas_vj_categorias` FOREIGN KEY (`vj_categorias_id_categoria`) REFERENCES `vj_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_peliculas`
--

LOCK TABLES `vj_peliculas` WRITE;
/*!40000 ALTER TABLE `vj_peliculas` DISABLE KEYS */;
INSERT INTO `vj_peliculas` VALUES (1,'Al filo del Mañana','2015-05-02','140','...','alfilo.jpg',0,0,'2015-06-25 00:00:00',1,1),(2,'Avengers: Infinity War','2018-05-02','130','...','avenger.jpg',0,0,'2015-06-25 00:00:00',1,1),(3,'El Conjuro','2017-04-10','120','...','elconjuro.jpg',0,0,'2015-06-25 00:00:00',1,4),(4,'Guerra de Papas 2','2018-04-20','120','...','guerrapapas.jpg',0,0,'2015-06-25 00:00:00',1,3),(5,'12 Años de Esclavitud','2016-06-14','120','...','12anos-2.jpg',0,0,'2015-06-25 00:00:00',1,2),(6,'Armagedon','2000-04-05','120','...','armagedon.jpg',1,1,'2015-06-26 00:00:00',1,1),(7,'Los Increibles 2','2018-07-04','110','...','losincreibles.jpg',0,0,'2018-07-05 00:00:00',1,1);
/*!40000 ALTER TABLE `vj_peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_reservas`
--

DROP TABLE IF EXISTS `vj_reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_reservas` (
  `id_reservas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reserva` datetime DEFAULT NULL,
  `medio_reserva` varchar(45) DEFAULT NULL,
  `vj_clientes_id_cliente` int(11) NOT NULL,
  `vj_peliculas_id_peliculas` int(11) NOT NULL,
  PRIMARY KEY (`id_reservas`),
  KEY `fk_mv_reservas_mv_clientes1_idx` (`vj_clientes_id_cliente`),
  KEY `fk_mv_reservas_mv_peliculas1_idx` (`vj_peliculas_id_peliculas`),
  CONSTRAINT `fk_mv_reservas_mv_clientes1` FOREIGN KEY (`vj_clientes_id_cliente`) REFERENCES `vj_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mv_reservas_mv_peliculas1` FOREIGN KEY (`vj_peliculas_id_peliculas`) REFERENCES `vj_peliculas` (`id_peliculas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_reservas`
--

LOCK TABLES `vj_reservas` WRITE;
/*!40000 ALTER TABLE `vj_reservas` DISABLE KEYS */;
INSERT INTO `vj_reservas` VALUES (1,'2018-06-26 00:00:00','Web',64854136,6);
/*!40000 ALTER TABLE `vj_reservas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `vj_reservas_AFTER_INSERT` AFTER INSERT ON `vj_reservas` FOR EACH ROW BEGIN
	UPDATE vj_peliculas SET estado_reserva = 1 WHERE id_peliculas = NEW.vj_peliculas_id_peliculas;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `vj_roles`
--

DROP TABLE IF EXISTS `vj_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_roles`
--

LOCK TABLES `vj_roles` WRITE;
/*!40000 ALTER TABLE `vj_roles` DISABLE KEYS */;
INSERT INTO `vj_roles` VALUES (1,'Administrador'),(2,'Empleado'),(3,'Auxiliar'),(4,'Cliente');
/*!40000 ALTER TABLE `vj_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vj_tarifas`
--

DROP TABLE IF EXISTS `vj_tarifas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vj_tarifas` (
  `id_tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `valor_tarifa` int(11) DEFAULT NULL,
  `tiempo_alquiler` int(11) DEFAULT NULL,
  `vj_categorias_id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tarifa`),
  KEY `vj_peliculas_id_peliculas_idx` (`vj_categorias_id_categoria`),
  CONSTRAINT `vj_peliculas_id_peliculas` FOREIGN KEY (`vj_categorias_id_categoria`) REFERENCES `vj_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vj_tarifas`
--

LOCK TABLES `vj_tarifas` WRITE;
/*!40000 ALTER TABLE `vj_tarifas` DISABLE KEYS */;
INSERT INTO `vj_tarifas` VALUES (1,15000,3,1),(2,10000,2,2),(3,8000,2,3),(4,8000,2,4);
/*!40000 ALTER TABLE `vj_tarifas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-30 16:57:07
