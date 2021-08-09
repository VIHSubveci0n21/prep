-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para prep_pep
CREATE DATABASE IF NOT EXISTS `prep_pep` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prep_pep`;

-- Volcando estructura para tabla prep_pep.citas
CREATE TABLE IF NOT EXISTS `citas` (
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacita` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subreceptor` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `codigo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.diagitslab
CREATE TABLE IF NOT EXISTS `diagitslab` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostico` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.diagnosticos
CREATE TABLE IF NOT EXISTS `diagnosticos` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `frascos` int(11) DEFAULT NULL,
  `rcreatinina` decimal(20,5) DEFAULT NULL,
  `rvih` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rsifilis` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rhbb` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rhbc` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rits` text COLLATE utf8_spanish_ci,
  `filtradoGlom` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rprsifilis` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` longtext COLLATE utf8_spanish_ci,
  `organizacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.escolaridad
CREATE TABLE IF NOT EXISTS `escolaridad` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `escolaridad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.etnia
CREATE TABLE IF NOT EXISTS `etnia` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `etnia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.generales
CREATE TABLE IF NOT EXISTS `generales` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `clinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipousuario` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `expedientevicit` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipodocumento` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuiconstruido` varchar(16) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nacimientopais` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacimientodepto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacimientomuni` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `residenciapais` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `residenciadepto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `residenciamuni` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `residenciadireccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `escolaridad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `etnia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contactotelefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contactocorreo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contactootro` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexonacimiento` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `poblacionclave` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orientacionsexual` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `subreceptor` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `oferta` tinyint(4) DEFAULT NULL,
  `acepta` tinyint(4) DEFAULT NULL,
  `autoriza` tinyint(4) DEFAULT NULL,
  `esquema` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.identidadgenero
CREATE TABLE IF NOT EXISTS `identidadgenero` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labcreatinina
CREATE TABLE IF NOT EXISTS `labcreatinina` (
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` decimal(10,5) DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labhepatitisb
CREATE TABLE IF NOT EXISTS `labhepatitisb` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labhepatitisc
CREATE TABLE IF NOT EXISTS `labhepatitisc` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labits
CREATE TABLE IF NOT EXISTS `labits` (
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labsifilis
CREATE TABLE IF NOT EXISTS `labsifilis` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.labvih
CREATE TABLE IF NOT EXISTS `labvih` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `medicamento` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `frascos` int(10) DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.meses
CREATE TABLE IF NOT EXISTS `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `codigo` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.orientacionsexual
CREATE TABLE IF NOT EXISTS `orientacionsexual` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `orientacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `codigo` int(11) NOT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.subreceptor
CREATE TABLE IF NOT EXISTS `subreceptor` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(200) NOT NULL,
  `subreceptor` varchar(2000) NOT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.tipodocumento
CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.tipopoblacion
CREATE TABLE IF NOT EXISTS `tipopoblacion` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `poblacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prep_pep.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombreusuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` longtext COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `registros` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `citas` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `laboratorios` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `reportes` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `configuracion` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `editarusuario` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `subreceptor` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`nombreusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
