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

-- Volcando datos para la tabla prep_pep.citas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` (`expedienteclinica`, `fechacita`, `hora`, `estado`, `organizacion`, `subreceptor`) VALUES
	('123456', '2021-06-17', '08:30:00', '', 'INCAP', '');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `codigo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.departamentos: 22 rows
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`codigo`, `departamento`) VALUES
	('01', 'GUATEMALA'),
	('02', 'EL PROGRESO'),
	('03', 'SACATEPEQUEZ'),
	('04', 'CHIMALTENANGO'),
	('05', 'ESCUINTLA'),
	('06', 'SANTA ROSA'),
	('07', 'SOLOLA'),
	('08', 'TOTONICAPAN'),
	('09', 'QUETZALTENANGO'),
	('10', 'SUCHITEPEQUEZ'),
	('11', 'RETALHULEU'),
	('12', 'SAN MARCOS'),
	('13', 'HUEHUETENANGO'),
	('14', 'QUICHE'),
	('15', 'BAJA VERAPAZ'),
	('16', 'ALTA VERAPAZ'),
	('17', 'PETEN'),
	('18', 'IZABAL'),
	('19', 'ZACAPA'),
	('20', 'CHIQUIMULA'),
	('21', 'JALAPA'),
	('22', 'JUTIAPA');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.diagitslab
CREATE TABLE IF NOT EXISTS `diagitslab` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostico` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.diagitslab: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `diagitslab` DISABLE KEYS */;
INSERT INTO `diagitslab` (`correlativo`, `diagnostico`) VALUES
	(18, 'Síndrome de úlcera genital/anal'),
	(19, 'Síndrome de secreción uretral'),
	(20, 'Proctitis'),
	(21, 'Verruga genital/anal'),
	(22, 'Bubón inguinal'),
	(23, 'Micosis genital'),
	(24, 'Chancro'),
	(25, 'Molusco contagioso'),
	(26, 'Clamidia'),
	(27, 'Gonorrea'),
	(28, 'Herpes genital/anal');
/*!40000 ALTER TABLE `diagitslab` ENABLE KEYS */;

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

-- Volcando datos para la tabla prep_pep.diagnosticos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `diagnosticos` DISABLE KEYS */;
INSERT INTO `diagnosticos` (`correlativo`, `expedienteclinica`, `fecha`, `frascos`, `rcreatinina`, `rvih`, `rsifilis`, `rhbb`, `rhbc`, `rits`, `filtradoGlom`, `rprsifilis`, `observaciones`, `organizacion`) VALUES
	(1, '123456', '2021-06-17', 5, 2.50000, 'POSITIVO', 'REACTIVO', 'REACTIVO', 'REACTIVO', 'Bubón inguinal, Chancro, Clamidia, Gonorrea, Herpes genital/anal, Micosis genital, Molusco contagioso, Proctitis, Síndrome de secreción uretral, Síndrome de úlcera genital/anal', '2', '1', 'Observaciones de prueba', 'INCAP');
/*!40000 ALTER TABLE `diagnosticos` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.escolaridad
CREATE TABLE IF NOT EXISTS `escolaridad` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `escolaridad` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.escolaridad: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `escolaridad` DISABLE KEYS */;
INSERT INTO `escolaridad` (`correlativo`, `escolaridad`) VALUES
	(1, 'ANALFABETO'),
	(2, 'ALFABETO'),
	(3, 'PRIMARIA INCOMPLETA'),
	(4, 'PRIMARIA COMPLETA'),
	(5, 'BASICOS INCOMPLETOS'),
	(6, 'BASICOS COMPLETOS'),
	(7, 'DIVERSIFICADO INCOMPLETO'),
	(8, 'DIVERSIFICADO COMPLETO'),
	(9, 'UNIVERSIDAD INCOMPLETA'),
	(10, 'UNIVERSIDAD COMPLETA');
/*!40000 ALTER TABLE `escolaridad` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.etnia
CREATE TABLE IF NOT EXISTS `etnia` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `etnia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.etnia: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `etnia` DISABLE KEYS */;
INSERT INTO `etnia` (`correlativo`, `etnia`) VALUES
	(1, 'LADINO / MESTIZO'),
	(2, 'MAYA'),
	(3, 'GARIFUNA'),
	(4, 'OTRO');
/*!40000 ALTER TABLE `etnia` ENABLE KEYS */;

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
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.generales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `generales` DISABLE KEYS */;
INSERT INTO `generales` (`correlativo`, `clinica`, `tipousuario`, `expedienteclinica`, `expedientevicit`, `tipodocumento`, `documento`, `cuiconstruido`, `nombres`, `apellidos`, `fechanacimiento`, `edad`, `nacimientopais`, `nacimientodepto`, `nacimientomuni`, `residenciapais`, `residenciadepto`, `residenciamuni`, `residenciadireccion`, `escolaridad`, `etnia`, `contactotelefono`, `contactocorreo`, `contactootro`, `sexonacimiento`, `poblacionclave`, `orientacionsexual`, `genero`, `estado`, `fecharegistro`, `subreceptor`) VALUES
	(1, 'PREP', 'NUEVO', '123456', '12345', 'DPI', '1234 56789 1234', 'F02060200000NoAp', 'Nombre del paciente', 'Apellido del paciente', '2002-06-02', 19, 'GUATEMALA', 'SACATEPEQUEZ', 'SANTA MARIA DE JESUS', 'GUATEMALA', 'SANTA ROSA', 'SANTA MARIA IXHUATAN', 'SIN DIRECCION', 'UNIVERSIDAD COMPLETA', 'MAYA', '12345678', 'usuario@incap.int', 'NINGUNO', 'FEMENINO', 'MUJER TRANS', 'BISEXUAL', 'HOMBRE', 'ACTIVO', '2021-06-17', '');
/*!40000 ALTER TABLE `generales` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.identidadgenero
CREATE TABLE IF NOT EXISTS `identidadgenero` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.identidadgenero: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `identidadgenero` DISABLE KEYS */;
INSERT INTO `identidadgenero` (`correlativo`, `genero`) VALUES
	(1, 'HOMBRE'),
	(2, 'MUJER'),
	(3, 'NO BINARIO');
/*!40000 ALTER TABLE `identidadgenero` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labcreatinina
CREATE TABLE IF NOT EXISTS `labcreatinina` (
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` decimal(10,5) DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labcreatinina: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labcreatinina` DISABLE KEYS */;
/*!40000 ALTER TABLE `labcreatinina` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labhepatitisb
CREATE TABLE IF NOT EXISTS `labhepatitisb` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labhepatitisb: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labhepatitisb` DISABLE KEYS */;
/*!40000 ALTER TABLE `labhepatitisb` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labhepatitisc
CREATE TABLE IF NOT EXISTS `labhepatitisc` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labhepatitisc: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labhepatitisc` DISABLE KEYS */;
/*!40000 ALTER TABLE `labhepatitisc` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labits
CREATE TABLE IF NOT EXISTS `labits` (
  `expedienteclinica` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labits: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labits` DISABLE KEYS */;
/*!40000 ALTER TABLE `labits` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labsifilis
CREATE TABLE IF NOT EXISTS `labsifilis` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labsifilis: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labsifilis` DISABLE KEYS */;
/*!40000 ALTER TABLE `labsifilis` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.labvih
CREATE TABLE IF NOT EXISTS `labvih` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `resultado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.labvih: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `labvih` DISABLE KEYS */;
/*!40000 ALTER TABLE `labvih` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.medicamentos
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `expedienteclinica` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `medicamento` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `frascos` int(10) DEFAULT NULL,
  `organizacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.medicamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.meses
CREATE TABLE IF NOT EXISTS `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.meses: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `meses` DISABLE KEYS */;
INSERT INTO `meses` (`id_mes`, `anio`, `mes`, `descripcion`) VALUES
	(1, 2019, 1, 'Enero'),
	(2, 2019, 2, 'Febrero'),
	(3, 2019, 3, 'Marzo'),
	(4, 2019, 4, 'Abril'),
	(5, 2019, 5, 'Mayo'),
	(6, 2019, 6, 'Junio'),
	(7, 2019, 7, 'Julio'),
	(8, 2019, 8, 'Agosto'),
	(9, 2019, 9, 'Septiembre'),
	(10, 2019, 10, 'Octubre'),
	(11, 2019, 11, 'Noviembre'),
	(12, 2019, 12, 'Diciembre'),
	(13, 2020, 1, 'Enero'),
	(14, 2020, 2, 'Febrero'),
	(15, 2020, 3, 'Marzo'),
	(16, 2020, 4, 'Abril'),
	(17, 2020, 5, 'Mayo'),
	(18, 2020, 6, 'Junio'),
	(19, 2020, 7, 'Julio'),
	(20, 2020, 8, 'Agosto'),
	(21, 2020, 9, 'Septiembre'),
	(22, 2020, 10, 'Octubre'),
	(23, 2020, 11, 'Noviembre'),
	(24, 2020, 12, 'Diciembre');
/*!40000 ALTER TABLE `meses` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.municipios
CREATE TABLE IF NOT EXISTS `municipios` (
  `codigo` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.municipios: 338 rows
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` (`codigo`, `municipio`) VALUES
	('0101', 'GUATEMALA'),
	('0102', 'SANTA CATARINA PINULA'),
	('0103', 'SAN JOSE PINULA'),
	('0104', 'SAN JOSE DEL GOLFO'),
	('0105', 'PALENCIA'),
	('0106', 'CHINAUTLA'),
	('0107', 'SAN PEDRO AYAMPUC'),
	('0108', 'MIXCO'),
	('0109', 'SAN PEDRO SACATEPEQUEZ'),
	('0110', 'SAN JUAN SACATEPEQUEZ'),
	('0111', 'SAN RAYMUNDO'),
	('0112', 'CHUARRANCHO'),
	('0113', 'FRAIJANES'),
	('0114', 'AMATITLAN'),
	('0115', 'VILLA NUEVA'),
	('0116', 'VILLA CANALES'),
	('0117', 'PETAPA'),
	('0201', 'GUASTATOYA'),
	('0202', 'MORAZAN'),
	('0203', 'SAN AGUSTIN ACASAGUASTLAN'),
	('0204', 'SAN CRISTOBAL ACASAGUASTLAN'),
	('0205', 'EL JICARO'),
	('0206', 'SANSARE'),
	('0207', 'SANARATE'),
	('0208', 'SAN ANTONIO LA PAZ'),
	('0301', 'ANTIGUA GUATEMALA'),
	('0302', 'JOCOTENANGO'),
	('0303', 'PASTORES'),
	('0304', 'SUMPANGO'),
	('0305', 'SANTO DOMINGO XENACOJ'),
	('0306', 'SANTIAGO SACATEPEQUEZ'),
	('0307', 'SAN BARTOLOME MILPAS ALTAS'),
	('0308', 'SAN LUCAS SACATEPEQUEZ'),
	('0309', 'SANTA LUCIA MILPAS ALTAS'),
	('0310', 'MAGDALENA MILPAS ALTAS'),
	('0311', 'SANTA MARIA DE JESUS'),
	('0312', 'CIUDAD VIEJA'),
	('0313', 'SAN MIGUEL DUEÑAS'),
	('0314', 'ALOTENANGO'),
	('0315', 'SAN ANTONIO AGUAS CALIENTES'),
	('0316', 'SANTA CATARINA BARAHONA'),
	('0401', 'CHIMALTENANGO'),
	('0402', 'SAN JOSE POAQUIL'),
	('0403', 'SAN MARTIN JILOTEPEQUE'),
	('0404', 'COMALAPA'),
	('0405', 'SANTA APOLONIA'),
	('0406', 'TECPAN GUATEMALA'),
	('0407', 'PATZUN'),
	('0408', 'POCHUTA'),
	('0409', 'PATZICIA'),
	('0410', 'SANTA CRUZ BALANYA'),
	('0411', 'ACATENANGO'),
	('0412', 'YEPOCAPA'),
	('0413', 'SAN ANDRES ITZAPA'),
	('0414', 'PARRAMOS'),
	('0415', 'ZARAGOZA'),
	('0416', 'EL TEJAR'),
	('0501', 'ESCUINTLA'),
	('0502', 'SANTA LUCIA COTZUMALGUAPA'),
	('0503', 'LA DEMOCRACIA'),
	('0504', 'SIQUINALA'),
	('0505', 'MASAGUA'),
	('0506', 'TIQUISATE'),
	('0507', 'LA GOMERA'),
	('0508', 'GUANAGAZAPA'),
	('0509', 'SAN JOSE'),
	('0510', 'IZTAPA'),
	('0511', 'PALIN'),
	('0512', 'SAN VICENTE PACAYA'),
	('0513', 'NUEVA CONCEPCION'),
	('0601', 'CUILAPA'),
	('0602', 'BARBERENA'),
	('0603', 'SANTA ROSA DE LIMA'),
	('0604', 'CASILLAS'),
	('0605', 'SAN RAFAEL LAS FLORES'),
	('0606', 'ORATORIO'),
	('0607', 'SAN JUAN TECUACO'),
	('0608', 'CHIQUIMULILLA'),
	('0609', 'TAXISCO'),
	('0610', 'SANTA MARIA IXHUATAN'),
	('0611', 'GUAZACAPAN'),
	('0612', 'SANTA CRUZ NARANJO'),
	('0613', 'PUEBLO NUEVO VIÑAS'),
	('0614', 'NUEVA SANTA ROSA'),
	('0701', 'SOLOLA'),
	('0702', 'SAN JOSE CHACAYA'),
	('0703', 'SANTA MARIA VISITACION'),
	('0704', 'SANTA LUCIA UTATLAN'),
	('0705', 'NAHUALA'),
	('0706', 'SANTA CATARINA IXTAHUACAN'),
	('0707', 'SANTA CLARA LA LAGUNA'),
	('0708', 'CONCEPCION'),
	('0709', 'SAN ANDRES SEMETABAJ'),
	('0710', 'PANAJACHEL'),
	('0711', 'SANTA CATARINA PALOPO'),
	('0712', 'SAN ANTONIO PALOPO'),
	('0713', 'SAN LUCAS TOLIMAN'),
	('0714', 'SANTA CRUZ LA LAGUNA'),
	('0715', 'SAN PABLO LA LAGUNA'),
	('0716', 'SAN MARCOS LA LAGUNA'),
	('0717', 'SAN JUAN LA LAGUNA'),
	('0718', 'SAN PEDRO LA LAGUNA'),
	('0719', 'SANTIAGO ATITLAN'),
	('0801', 'TOTONICAPAN'),
	('0802', 'SAN CRISTOBAL TOTONICAPAN'),
	('0803', 'SAN FRANCISCO EL ALTO'),
	('0804', 'SAN ANDRES XECUL'),
	('0805', 'MOMOSTENANGO'),
	('0806', 'SANTA MARIA CHIQUIMULA'),
	('0807', 'SANTA LUCIA LA REFORMA'),
	('0808', 'SAN BARTOLO'),
	('0901', 'QUETZALTENANGO'),
	('0902', 'SALCAJA'),
	('0903', 'OLINTEPEQUE'),
	('0904', 'SAN CARLOS SIJA'),
	('0905', 'SIBILIA'),
	('0906', 'CABRICAN'),
	('0907', 'CAJOLA'),
	('0908', 'SAN MIGUEL SIGUILA'),
	('0909', 'OSTUNCALCO'),
	('0910', 'SAN MATEO'),
	('0911', 'CONCEPCION CHIQUIRICHAPA'),
	('0912', 'SAN MARTIN SACATEPEQUEZ'),
	('0913', 'ALMOLONGA'),
	('0914', 'CANTEL'),
	('0915', 'HUITAN'),
	('0916', 'ZUNIL'),
	('0917', 'COLOMBA'),
	('0918', 'SAN FRANCISCO LA UNION'),
	('0919', 'EL PALMAR'),
	('0920', 'COATEPEQUE'),
	('0921', 'GENOVA'),
	('0922', 'FLORES COSTA CUCA'),
	('0923', 'LA ESPERANZA'),
	('0924', 'PALESTINA DE LOS ALTOS'),
	('1001', 'MAZATENANGO'),
	('1002', 'CUYOTENANGO'),
	('1003', 'SAN FRANCISCO ZAPOTITLAN'),
	('1004', 'SAN BERNARDINO'),
	('1005', 'SAN JOSE EL IDOLO'),
	('1006', 'SANTO DOMINGO SUCHITEPEQUEZ'),
	('1007', 'SAN LORENZO'),
	('1008', 'SAMAYAC'),
	('1009', 'SAN PABLO JOCOPILAS'),
	('1010', 'SAN ANTONIO SUCHITEPEQUEZ'),
	('1011', 'SAN MIGUEL PANAN'),
	('1012', 'SAN GABRIEL'),
	('1013', 'CHICACAO'),
	('1014', 'PATULUL'),
	('1015', 'SANTA BARBARA'),
	('1016', 'SAN JUAN BAUTISTA'),
	('1017', 'SANTO TOMAS LA UNION'),
	('1018', 'ZUNILITO'),
	('1019', 'PUEBLO NUEVO'),
	('1020', 'RIO BRAVO'),
	('1021', 'SAN JOSE LA MAQUINA'),
	('1101', 'RETALHULEU'),
	('1102', 'SAN SEBASTIAN'),
	('1103', 'SANTA CRUZ MULUA'),
	('1104', 'SAN MARTIN ZAPOTITLAN'),
	('1105', 'SAN FELIPE'),
	('1106', 'SAN ANDRES VILLA SECA'),
	('1107', 'CHAMPERICO'),
	('1108', 'NUEVO SAN CARLOS'),
	('1109', 'EL ASINTAL'),
	('1201', 'SAN MARCOS'),
	('1202', 'SAN PEDRO SACATEPEQUEZ'),
	('1203', 'SAN ANTONIO SACATEPEQUEZ'),
	('1204', 'COMITANCILLO'),
	('1205', 'SAN MIGUEL IXTAHUACAN'),
	('1206', 'CONCEPCION TUTUAPA'),
	('1207', 'TACANA'),
	('1208', 'SIBINAL'),
	('1209', 'TAJUMULCO'),
	('1210', 'TEJUTLA'),
	('1211', 'SAN RAFAEL PIE DE LA CUESTA'),
	('1212', 'NUEVO PROGRESO'),
	('1213', 'EL TUMBADOR'),
	('1214', 'EL RODEO'),
	('1215', 'MALACATAN'),
	('1216', 'CATARINA'),
	('1217', 'AYUTLA'),
	('1218', 'OCOS'),
	('1219', 'SAN PABLO'),
	('1220', 'EL QUETZAL'),
	('1221', 'LA REFORMA'),
	('1222', 'PAJAPITA'),
	('1223', 'IXCHIGUAN'),
	('1224', 'SAN JOSE OJETENAN'),
	('1225', 'SAN CRISTOBAL CUCHO'),
	('1226', 'SIPACAPA'),
	('1227', 'ESQUIPULAS PALO GORDO'),
	('1228', 'RIO BLANCO'),
	('1229', 'SAN LORENZO'),
	('1230', 'LA BLANCA'),
	('1301', 'HUEHUETENANGO'),
	('1302', 'CHIANTLA'),
	('1303', 'MALACATANCITO'),
	('1304', 'CUILCO'),
	('1305', 'NENTON'),
	('1306', 'SAN PEDRO NECTA'),
	('1307', 'JACALTENANGO'),
	('1308', 'SOLOMA'),
	('1309', 'IXTAHUACAN'),
	('1310', 'SANTA BARBARA'),
	('1311', 'LA LIBERTAD'),
	('1312', 'LA DEMOCRACIA'),
	('1313', 'SAN MIGUEL ACATAN'),
	('1314', 'SAN RAFAEL LA INDEPENDENCIA'),
	('1315', 'TODOS SANTOS CUCHUMATAN'),
	('1316', 'SAN JUAN ATITAN'),
	('1317', 'SANTA EULALIA'),
	('1318', 'SAN MATEO IXTATAN'),
	('1319', 'COLOTENANGO'),
	('1320', 'SAN SEBASTIAN HUEHUETENANGO'),
	('1321', 'TECTITAN'),
	('1322', 'CONCEPCION HUISTA'),
	('1323', 'SAN JUAN IXCOY'),
	('1324', 'SAN ANTONIO HUISTA'),
	('1325', 'SAN SEBASTIAN COATAN'),
	('1326', 'BARILLAS'),
	('1327', 'AGUACATAN'),
	('1328', 'SAN RAFAEL PETZAL'),
	('1329', 'SAN GASPAR IXCHIL'),
	('1330', 'SANTIAGO CHIMALTENANGO'),
	('1331', 'SANTA ANA HUISTA'),
	('1332', 'UNION CANTINIL'),
	('1401', 'SANTA CRUZ DEL QUICHE'),
	('1402', 'CHICHE'),
	('1403', 'CHINIQUE'),
	('1404', 'ZACUALPA'),
	('1405', 'CHAJUL'),
	('1406', 'CHICHICASTENANGO'),
	('1407', 'PATZITE'),
	('1408', 'SAN ANTONIO ILOTENANGO'),
	('1409', 'SAN PEDRO JOCOPILAS'),
	('1410', 'CUNEN'),
	('1411', 'SAN JUAN COTZAL'),
	('1412', 'JOYABAJ'),
	('1413', 'NEBAJ'),
	('1414', 'SAN ANDRES SAJCABAJA'),
	('1415', 'USPANTAN'),
	('1416', 'SACAPULAS'),
	('1417', 'SAN BARTOLOME JOCOTENANGO'),
	('1418', 'CANILLA'),
	('1419', 'CHICAMAN'),
	('1420', 'IXCAN'),
	('1421', 'PACHALUM'),
	('1501', 'SALAMA'),
	('1502', 'SAN MIGUEL CHICAJ'),
	('1503', 'RABINAL'),
	('1504', 'CUBULCO'),
	('1505', 'GRANADOS'),
	('1506', 'EL CHOL'),
	('1507', 'SAN JERONIMO'),
	('1508', 'PURULHA'),
	('1601', 'COBAN'),
	('1602', 'SANTA CRUZ VERAPAZ'),
	('1603', 'SAN CRISTOBAL VERAPAZ'),
	('1604', 'TACTIC'),
	('1605', 'TAMAHU'),
	('1606', 'TUCURU'),
	('1607', 'PANZOS'),
	('1608', 'SENAHU'),
	('1609', 'SAN PEDRO CARCHA'),
	('1610', 'SAN JUAN CHAMELCO'),
	('1611', 'LANQUIN'),
	('1612', 'CAHABON'),
	('1613', 'CHISEC'),
	('1614', 'CHAHAL'),
	('1615', 'FRAY BARTOLOME DE LAS CASAS'),
	('1616', 'SANTA CATALINA LA TINTA'),
	('1617', 'RAXRUHA'),
	('1701', 'FLORES'),
	('1702', 'SAN JOSE'),
	('1703', 'SAN BENITO'),
	('1704', 'SAN ANDRES'),
	('1705', 'LA LIBERTAD'),
	('1706', 'SAN FRANCISCO'),
	('1707', 'SANTA ANA'),
	('1708', 'DOLORES'),
	('1709', 'SAN LUIS'),
	('1710', 'SAYAXCHE'),
	('1711', 'MELCHOR DE MENCOS'),
	('1712', 'POPTUN'),
	('1713', 'LAS CRUCES'),
	('1714', 'EL CHAL'),
	('1801', 'PUERTO BARRIOS'),
	('1802', 'LIVINGSTON'),
	('1803', 'EL ESTOR'),
	('1804', 'MORALES'),
	('1805', 'LOS AMATES'),
	('1901', 'ZACAPA'),
	('1902', 'ESTANZUELA'),
	('1903', 'RIO HONDO'),
	('1904', 'GUALAN'),
	('1905', 'TECULUTAN'),
	('1906', 'USUMATLAN'),
	('1907', 'CABAÑAS'),
	('1908', 'SAN DIEGO'),
	('1909', 'LA UNION'),
	('1910', 'HUITE'),
	('1911', 'SAN JORGE'),
	('2001', 'CHIQUIMULA'),
	('2002', 'SAN JOSE LA ARADA'),
	('2003', 'SAN JUAN ERMITA'),
	('2004', 'JOCOTAN'),
	('2005', 'CAMOTAN'),
	('2006', 'OLOPA'),
	('2007', 'ESQUIPULAS'),
	('2008', 'CONCEPCION LAS MINAS'),
	('2009', 'QUETZALTEPEQUE'),
	('2010', 'SAN JACINTO'),
	('2011', 'IPALA'),
	('2101', 'JALAPA'),
	('2102', 'SAN PEDRO PINULA'),
	('2103', 'SAN LUIS JILOTEPEQUE'),
	('2104', 'SAN MANUEL CHAPARRON'),
	('2105', 'SAN CARLOS ALZATATE'),
	('2106', 'MONJAS'),
	('2107', 'MATAQUESCUINTLA'),
	('2201', 'JUTIAPA'),
	('2202', 'EL PROGRESO'),
	('2203', 'SANTA CATARINA MITA'),
	('2204', 'AGUA BLANCA'),
	('2205', 'ASUNCION MITA'),
	('2206', 'YUPILTEPEQUE'),
	('2207', 'ATESCATEMPA'),
	('2208', 'JEREZ'),
	('2209', 'EL ADELANTO'),
	('2210', 'ZAPOTITLAN'),
	('2211', 'COMAPA'),
	('2212', 'JALPATAGUA'),
	('2213', 'CONGUACO'),
	('2214', 'MOYUTA'),
	('2215', 'PASACO'),
	('2216', 'SAN JOSE ACATEMPA'),
	('2217', 'QUESADA');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.orientacionsexual
CREATE TABLE IF NOT EXISTS `orientacionsexual` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `orientacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.orientacionsexual: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `orientacionsexual` DISABLE KEYS */;
INSERT INTO `orientacionsexual` (`correlativo`, `orientacion`) VALUES
	(1, 'HOMOSEXUAL'),
	(2, 'HETEROSEXUAL'),
	(3, 'BISEXUAL'),
	(4, 'JUJER TRANS'),
	(5, 'TRANSEXUAL');
/*!40000 ALTER TABLE `orientacionsexual` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `codigo` int(11) NOT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.paises: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` (`codigo`, `pais`) VALUES
	(1, 'GUATEMALA'),
	(2, 'EL SALVADOR'),
	(3, 'HONDURAS'),
	(4, 'NICARAGUA'),
	(5, 'COSTA RICA'),
	(6, 'PANAMA'),
	(7, 'MEXICO'),
	(9, 'OTRO');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.subreceptor
CREATE TABLE IF NOT EXISTS `subreceptor` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(200) NOT NULL,
  `subreceptor` varchar(2000) NOT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla prep_pep.subreceptor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `subreceptor` DISABLE KEYS */;
INSERT INTO `subreceptor` (`correlativo`, `codigo`, `subreceptor`) VALUES
	(1, 'C0001', 'INCAP'),
	(2, 'HSH1-CAS', 'Colectivo Amigos Contra el SIDA');
/*!40000 ALTER TABLE `subreceptor` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.tipodocumento
CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.tipodocumento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` (`correlativo`, `documento`) VALUES
	(1, 'DPI'),
	(2, 'OTRO DOCUMENTO');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;

-- Volcando estructura para tabla prep_pep.tipopoblacion
CREATE TABLE IF NOT EXISTS `tipopoblacion` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `poblacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correlativo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla prep_pep.tipopoblacion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipopoblacion` DISABLE KEYS */;
INSERT INTO `tipopoblacion` (`correlativo`, `poblacion`) VALUES
	(1, 'HSH'),
	(2, 'MUJER TRANS'),
	(3, 'MTS');
/*!40000 ALTER TABLE `tipopoblacion` ENABLE KEYS */;

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

-- Volcando datos para la tabla prep_pep.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `organizacion`, `nombreusuario`, `nombre`, `password`, `cargo`, `registros`, `citas`, `laboratorios`, `reportes`, `configuracion`, `editarusuario`, `estado`, `subreceptor`) VALUES
	(1, 'Colectivo Amigos Contra el SIDA', 'cbonilla', 'Czar Bonilla', '$2y$10$VPvdbPrb9vtVydC.SfpPbOQKIUFY5MO4Q9wAUZVLr7bhTTHQrBVEO', 'ADMINISTRADOR', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI', 'ALTA', ''),
	(76, 'INCAP', 'ecortes', 'Edy Cortes', '$2y$10$8A.P09UvAm9.kCdAB7rfM.3i.UbF6V.N3KOpnreN8orIwehU1UnS.', 'ADMINISTRADOR', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI', 'ALTA', ''),
	(77, 'INCAP', 'flopez', 'Faustino Lopez Ramos', '$2y$10$dnNm2KUJcEqZMAIYDdeD4eJguv0jn3OlIk5v4n5OKqYAQQslT4/TG', 'USUARIO', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI', 'ALTA', ''),
	(78, 'ABCEDE', 'PRUEBA', 'prueba', '$2y$10$vYnlWpMzKc/XdtEDk9yxKu3eWemYS6y5xH.j2o.Tj8z69d8aQwYXq', 'USUARIO', 'SI', 'SI', 'NO', 'SI', 'NO', 'NO', 'ALTA', ''),
	(79, 'Colectivo Amigos Contra el SIDA', 'osberto_cas', 'prueba', '$2y$10$Kv80sbs5G2DbPviOlAv3qO4IPlI2wF/CV653p8NOQDlgmFMWIVbAW', 'MEDICO', 'SI', 'SI', 'SI', 'NO', 'NO', 'SI', 'ALTA', '');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
