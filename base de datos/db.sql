-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para cmm
CREATE DATABASE IF NOT EXISTS `cmm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cmm`;

-- Volcando estructura para tabla cmm.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`id`, `nombre`, `correo`, `contraseña`) VALUES
	(1, 'erivan', 'erivan@gmail.com', '1234'),
	(2, 'admin', 'kairos_morelos@outlook.com', 'admin200');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tutor` varchar(100) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.alumnos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id`, `nombre`, `tutor`, `telefono`, `edad`, `sexo`, `status`, `grupo`) VALUES
	(1, 'Juanito Gonzalez', 'Julio', 989898, 3, 'Niño', '', '1B'),
	(2, 'Maria Guadalupe', 'Damian', 4049499, 4, 'Niña', '', '1B');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.anuncios
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `expira` date DEFAULT NULL,
  `destinatario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.anuncios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` (`id`, `mensaje`, `fecha`, `expira`, `destinatario`) VALUES
	(1, 'Hola a todos bienvenidos', '2020-11-06', '2020-11-13', 'todos');
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `accion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.banner: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`id`, `url`, `accion`) VALUES
	(1, 'http://localhost/cmm/img/itcup.png', 'null'),
	(2, 'http://localhost/cmm/img/itc.png', 'null'),
	(3, 'http://localhost/cmm/img/red.jpg', 'null');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.calificaciones
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` int(11) DEFAULT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  `bloque` int(11) DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.calificaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` (`id`, `calificacion`, `grupo`, `bloque`, `materia`, `id_alumno`) VALUES
	(1, 10, '1B', 1, 'Español', 1);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.grupo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`id`, `nombre`, `id_maestro`, `id_materia`) VALUES
	(1, '1B', 1, 1),
	(2, '1B', 1, 2),
	(3, '1B', 1, 3),
	(4, '1B', 1, 4);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.maestros
CREATE TABLE IF NOT EXISTS `maestros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.maestros: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` (`id`, `nombre`, `carrera`, `telefono`, `correo`, `contraseña`) VALUES
	(1, 'Damian Sanchez', 'Sistemas', 98948444, 'damian@gmail.com', 'damian200'),
	(2, 'Salma Palacios', 'Docencia', 873878373, 'salma@gmail.com', 'sal1234');
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `bloques` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.materias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`id`, `nombre`, `url`, `bloques`) VALUES
	(1, 'Español', 'https://images.pexels.com/photos/256520/pexels-photo-256520.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 5),
	(2, 'Ingles ', 'https://images.pexels.com/photos/301926/pexels-photo-301926.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 5),
	(3, 'Matematicas', 'https://images.pexels.com/photos/374918/pexels-photo-374918.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 5),
	(4, 'Especial 2', 'https://images.pexels.com/photos/998591/pexels-photo-998591.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 5);
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.pagos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` (`id`, `cantidad`, `inicio`, `fin`, `id_alumno`) VALUES
	(1, 200, '2020-11-02', '2020-11-06', 1),
	(2, 90, '2020-11-16', '2020-11-20', 1),
	(3, 46, '2020-11-29', '2020-11-30', 1);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

-- Volcando estructura para tabla cmm.personal
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cmm.personal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` (`id`, `nombre`, `cargo`, `correo`, `contraseña`, `telefono`) VALUES
	(1, 'Maria ', 'economico', 'maria@gmail.com', 'maria200', 67676767);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
