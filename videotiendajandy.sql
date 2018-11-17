/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.7.21-log : Database - videotiendajandy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`videotiendajandy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `videotiendajandy`;

/*Table structure for table `vj_alquiler` */

DROP TABLE IF EXISTS `vj_alquiler`;

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

/*Data for the table `vj_alquiler` */

/*Table structure for table `vj_cargos` */

DROP TABLE IF EXISTS `vj_cargos`;

CREATE TABLE `vj_cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `vj_cargos` */

insert  into `vj_cargos`(`id_cargo`,`nombre_cargo`) values (1,'Jefe'),(2,'Empleado'),(3,'Auxiliar'),(4,'Cliente');

/*Table structure for table `vj_categorias` */

DROP TABLE IF EXISTS `vj_categorias`;

CREATE TABLE `vj_categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `vj_categorias` */

insert  into `vj_categorias`(`id_categoria`,`nombre_categoria`,`fecha_creacion`,`creado_por`) values (1,'Accion ','2018-06-25',1),(2,'Drama ','2018-06-25',1),(3,'Comedia','2018-06-25',1),(4,'Terror','2018-05-25',1);

/*Table structure for table `vj_clientes` */

DROP TABLE IF EXISTS `vj_clientes`;

CREATE TABLE `vj_clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=92566778 DEFAULT CHARSET=utf8;

/*Data for the table `vj_clientes` */

insert  into `vj_clientes`(`id_cliente`,`nombres`,`apellidos`,`direccion`,`correo`,`telefono`) values (777,'Blanca','Nieves','Calle fake','banca@gmail.com',2341212),(55544,'Prueba','Prueba','calle fake','orueba@gmail.com',432423),(5555555,'Maria','Magdalena','calle 34 # 3-42','Mariamag@gmail.com',2765467),(64854136,'Carmen','Payares','Cra 50','carmen@outlook.com',2741415),(85649939,'alberto','solar','calle 20','alberto@gmail.com',78744),(92543211,'Jorge','Gonzales','calle 23 # 42-32','jorge@hotmail.com',3114553211),(92566777,'Karl','Marquez','cra 54','karl@gmail.com',2786544);

/*Table structure for table `vj_empleado` */

DROP TABLE IF EXISTS `vj_empleado`;

CREATE TABLE `vj_empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `vj_cargos_id_cargo` int(6) DEFAULT NULL,
  `vj_roles_id_rol` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_mv_empleado_mv_cargos1_idx` (`vj_cargos_id_cargo`),
  KEY `fk_mv_empleado_mv_roles1_idx` (`vj_roles_id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vj_empleado` */

insert  into `vj_empleado`(`id_empleado`,`nombres`,`apellidos`,`direccion`,`telefono`,`vj_cargos_id_cargo`,`vj_roles_id_rol`) values (33333,'Tinorv','Hererra','calle quinta',300987654,2,3),(64555444,'Maria ','Antonieta','Calle 67 # 45-90 Barrio Puerta Roja',2765544,2,3),(1102789456,'Administrador','Sistema','Calle 20',3013131233,1,1);

/*Table structure for table `vj_empleado_fecha_ingreso` */

DROP TABLE IF EXISTS `vj_empleado_fecha_ingreso`;

CREATE TABLE `vj_empleado_fecha_ingreso` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `vj_empleado_id_empleado` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `fk_empleado_ingreso_idx` (`vj_empleado_id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vj_empleado_fecha_ingreso` */

/*Table structure for table `vj_historial_alquiladas` */

DROP TABLE IF EXISTS `vj_historial_alquiladas`;

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

/*Data for the table `vj_historial_alquiladas` */

/*Table structure for table `vj_login_cliente` */

DROP TABLE IF EXISTS `vj_login_cliente`;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `vj_login_cliente` */

insert  into `vj_login_cliente`(`id_login`,`user_cliente`,`pass_cliente`,`vj_clientes_id_cliente`,`vj_roles_id_rol`) values (1,'85649939','admin',85649939,4),(2,'5555555','1',5555555,4),(3,'92543211','1',92543211,4),(4,'','',777,4),(5,'55544','1',55544,4),(6,'92566777','1',92566777,4);

/*Table structure for table `vj_login_empleado` */

DROP TABLE IF EXISTS `vj_login_empleado`;

CREATE TABLE `vj_login_empleado` (
  `id_login_empleado` int(11) NOT NULL,
  `user_emp` varchar(45) DEFAULT NULL,
  `pass_emp` varchar(45) DEFAULT NULL,
  `vj_roles_id_rol` int(11) NOT NULL,
  `vj_empleado_id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_login_empleado`),
  KEY `fk_mv_login_empleado_mv_roles1_idx` (`vj_roles_id_rol`),
  KEY `fk_mv_login_empleado_mv_empleado1_idx` (`vj_empleado_id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vj_login_empleado` */

insert  into `vj_login_empleado`(`id_login_empleado`,`user_emp`,`pass_emp`,`vj_roles_id_rol`,`vj_empleado_id_empleado`) values (0,'92456700','1234',92456700,4),(1102789456,'admin','4321',1,1102789456);

/*Table structure for table `vj_peliculas` */

DROP TABLE IF EXISTS `vj_peliculas`;

CREATE TABLE `vj_peliculas` (
  `id_peliculas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pelicula` varchar(45) DEFAULT NULL,
  `fecha_estreno` date DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `sinopsis` text,
  `imagen` text,
  `estado_alquiler` int(11) DEFAULT NULL,
  `estado_reserva` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `vj_categorias_id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_peliculas`),
  KEY `fk_mv_peliculas_mv_categorias1_idx` (`vj_categorias_id_categoria`),
  CONSTRAINT `fk_vj_peliculas_vj_categorias` FOREIGN KEY (`vj_categorias_id_categoria`) REFERENCES `vj_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `vj_peliculas` */

insert  into `vj_peliculas`(`id_peliculas`,`nombre_pelicula`,`fecha_estreno`,`duracion`,`sinopsis`,`imagen`,`estado_alquiler`,`estado_reserva`,`fecha_registro`,`creado_por`,`vj_categorias_id_categoria`) values (1,'Al filo del Mañana 1','2015-05-02','140','...','alfilo.jpg',0,0,'2015-06-25',1,1),(2,'Avengers: Infinity War','2018-05-02','160','...','avenger.jpg',0,0,'2015-06-25',1,2),(3,'El Conjuro ','2017-04-10','160','...','elconjuro.jpg',0,0,'2015-06-25',1,4),(5,'12 Años de Esclavitud','2016-06-14','120','...','12anos-2.jpg',0,0,'2015-06-25',1,1),(6,'Armagedon','2000-04-05','160','...','armagedon.jpg',1,1,'2015-06-26',1,1),(7,'Los Increibles 3','2018-07-04','110','...','losincreibles.jpg',0,0,'2018-07-05',1,1),(9,'La era de hielo 2','1990-12-01','120','...','losincreibles.jpg',1,1,'2018-11-07',1,3);

/*Table structure for table `vj_reservas` */

DROP TABLE IF EXISTS `vj_reservas`;

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

/*Data for the table `vj_reservas` */

insert  into `vj_reservas`(`id_reservas`,`fecha_reserva`,`medio_reserva`,`vj_clientes_id_cliente`,`vj_peliculas_id_peliculas`) values (1,'2018-06-26 00:00:00','Web',64854136,6);

/*Table structure for table `vj_roles` */

DROP TABLE IF EXISTS `vj_roles`;

CREATE TABLE `vj_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `vj_roles` */

insert  into `vj_roles`(`id_rol`,`nombre_rol`) values (1,'Administrador'),(2,'Empleado'),(3,'Auxiliar'),(4,'Cliente');

/*Table structure for table `vj_tarifas` */

DROP TABLE IF EXISTS `vj_tarifas`;

CREATE TABLE `vj_tarifas` (
  `id_tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `valor_tarifa` int(11) DEFAULT NULL,
  `tiempo_alquiler` int(11) DEFAULT NULL,
  `vj_categorias_id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tarifa`),
  KEY `vj_peliculas_id_peliculas_idx` (`vj_categorias_id_categoria`),
  CONSTRAINT `vj_peliculas_id_peliculas` FOREIGN KEY (`vj_categorias_id_categoria`) REFERENCES `vj_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `vj_tarifas` */

insert  into `vj_tarifas`(`id_tarifa`,`valor_tarifa`,`tiempo_alquiler`,`vj_categorias_id_categoria`) values (1,15000,3,1),(2,10000,2,2),(3,8000,2,3),(4,8000,2,4);

/* Trigger structure for table `vj_alquiler` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `vj_alquiler_AFTER_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `vj_alquiler_AFTER_INSERT` AFTER INSERT ON `vj_alquiler` FOR EACH ROW BEGIN
	UPDATE vj_peliculas SET estado_alquiler = 1 WHERE id_peliculas = NEW.vj_peliculas_id_peliculas;
END */$$


DELIMITER ;

/* Trigger structure for table `vj_alquiler` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `vj_alquiler_AFTER_UPDATE` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `vj_alquiler_AFTER_UPDATE` AFTER UPDATE ON `vj_alquiler` FOR EACH ROW BEGIN
	INSERT INTO vj_historial_alquiladas (id_historial, vj_peliculas_id_peliculas, vj_clientes_id_cliente) VALUES ('0', NEW.vj_peliculas_id_peliculas, NEW.vj_clientes_id_cliente, now());
END */$$


DELIMITER ;

/* Trigger structure for table `vj_reservas` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `vj_reservas_AFTER_INSERT` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `vj_reservas_AFTER_INSERT` AFTER INSERT ON `vj_reservas` FOR EACH ROW BEGIN
	UPDATE vj_peliculas SET estado_reserva = 1 WHERE id_peliculas = NEW.vj_peliculas_id_peliculas;
END */$$


DELIMITER ;

/* Function  structure for function  `buscaPeliculaPorID` */

/*!50003 DROP FUNCTION IF EXISTS `buscaPeliculaPorID` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`movies`@`%` FUNCTION `buscaPeliculaPorID`(`id` INT(11)) RETURNS char(255) CHARSET latin1
BEGIN
	DECLARE nombre char(255);    
	SELECT nombre_pelicula INTO nombre FROM vj_peliculas WHERE id_peliculas = id;
	RETURN nombre;
END */$$
DELIMITER ;

/* Function  structure for function  `datosEmpleado` */

/*!50003 DROP FUNCTION IF EXISTS `datosEmpleado` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`movies`@`%` FUNCTION `datosEmpleado`(`cname` CHAR(100), `clname` CHAR(100)) RETURNS char(100) CHARSET latin1
BEGIN
	DECLARE NombresCompleto CHAR(200);
    SET NombresCompleto = CONCAT(cname, ' ', clname);
    RETURN NombresCompleto;
END */$$
DELIMITER ;

/* Function  structure for function  `valorMaximo` */

/*!50003 DROP FUNCTION IF EXISTS `valorMaximo` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`movies`@`%` FUNCTION `valorMaximo`(`field` INT(100)) RETURNS int(11)
BEGIN
	DECLARE maximo INT(11);
	SELECT max(field) INTO maximo FROM vj_tarifas LIMIT 1;
	RETURN maximo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resumenClientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `resumenClientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `resumenClientes`()
BEGIN
	SELECT id_cliente as cedula, nombres, apellidos, direccion, correo, telefono FROM vj_clientes;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resumenEmpleados` */

/*!50003 DROP PROCEDURE IF EXISTS  `resumenEmpleados` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `resumenEmpleados`()
BEGIN
	SELECT 
		ve.id_empleado as cedula_empleado, ve.nombres, ve.apellidos, vc.nombre_cargo 
	FROM 
		vj_empleado ve 
        INNER JOIN vj_cargos vc ON ve.vj_cargos_id_cargo = vc.id_cargo;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resumenEstadoPeliculasAlquiladas` */

/*!50003 DROP PROCEDURE IF EXISTS  `resumenEstadoPeliculasAlquiladas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `resumenEstadoPeliculasAlquiladas`()
BEGIN
	SELECT nombre_pelicula, (case estado_alquiler when 1 then 'Alquilada' else 'Disponible' end) as estado FROM vj_peliculas;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resumenPeliculas` */

/*!50003 DROP PROCEDURE IF EXISTS  `resumenPeliculas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `resumenPeliculas`()
BEGIN
	SELECT 
		vp.nombre_pelicula, 
		vp.fecha_estreno, 
		vp.duracion, 
		vp.sinopsis, 
		vp.imagen, 
		vp.estado_alquiler, 
		vp.estado_reserva, vc.nombre_categoria
	FROM 
		vj_peliculas vp JOIN vj_categorias vc ON vp.vj_categorias_id_categoria = vc.id_categoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `resumenVentas` */

/*!50003 DROP PROCEDURE IF EXISTS  `resumenVentas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`movies`@`%` PROCEDURE `resumenVentas`()
BEGIN
	SELECT sum(valor_a_pagar) as TotalVentas FROM vj_alquiler;
END */$$
DELIMITER ;

/* Procedure structure for procedure `verReservas` */

/*!50003 DROP PROCEDURE IF EXISTS  `verReservas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verReservas`()
BEGIN
	SELECT 
		vc.nombres, vc.apellidos, vp.nombre_pelicula, vr.medio_reserva, vr.fecha_reserva 
	FROM 
		vj_reservas vr 
        INNER JOIN vj_clientes vc ON vr.vj_clientes_id_cliente = vc.id_cliente 
        INNER JOIN vj_peliculas vp ON vr.vj_peliculas_id_peliculas = vp.id_peliculas;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
