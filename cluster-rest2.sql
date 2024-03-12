-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cluster
CREATE DATABASE IF NOT EXISTS `cluster` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cluster`;

-- Volcando estructura para tabla cluster.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellidos` varchar(70) DEFAULT NULL,
  `carrera` varchar(200) DEFAULT NULL,
  `num_telefono` varchar(20) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `num_imss` varchar(50) DEFAULT NULL,
  `f_nacimiento` varchar(40) DEFAULT NULL,
  `curp` varchar(300) DEFAULT NULL,
  `disponibilidad` varchar(300) DEFAULT NULL,
  `calificacion` varchar(300) DEFAULT NULL,
  `universidad` varchar(300) DEFAULT NULL,
  `plan_estudios` varchar(300) DEFAULT NULL,
  `periodo_estadia` varchar(60) DEFAULT NULL,
  `area_interes` varchar(100) DEFAULT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `correo` (`correo`),
  KEY `estatus` (`estatus`),
  CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.alumnos: ~2 rows (aproximadamente)
INSERT INTO `alumnos` (`id`, `matricula`, `correo`, `nombre`, `apellidos`, `carrera`, `num_telefono`, `imagen`, `num_imss`, `f_nacimiento`, `curp`, `disponibilidad`, `calificacion`, `universidad`, `plan_estudios`, `periodo_estadia`, `area_interes`, `cv`, `estatus`) VALUES
	(3, '092010653', 'jhonguzmanhernandez659@gmail.com', 'Juan', 'Guzmán Hernández', 'Gestión de Negocios y Proyectos', '9191375758', '/alumnoimages/09201065365e3cc65e0c03_usuario.png', '83874298292', '2024-03-12', 'GUHJ011006HCSAAAAA', '', '9', 'UNAM', '/alumnoplan/09201065365e3cc65e1d07_CCF_000785.pdf', '24-1 (ene-abr)', 'Desarrollo', './alumnocv/09201065365e3cc65e1460_CV JUAN ANTONIO GUZMÁN HERNÁNDEZ.pdf', 1),
	(16, '998877', 'ore@gmail.com', 'Juan Pablo', 'Tomoy', 'Desarrollo de Software Multiplataforma', '3323999999', './alumnoimages/9988r65e6578f83699_banner1.jpg', '12345678301', '2000-03-12', 'ORBT200312KKKKDK48', '', '85', 'Universidad Tecnológica de la Selva', './alumnoplan/9988r65e6578f84f9d_Scanned_20240216-0012.pdf', '24-1 (ene-abr)', 'Reparación de impresoras', './alumnocv/9988r65e6578f8442b_labels.pdf', 1);

-- Volcando estructura para tabla cluster.area_interes
CREATE TABLE IF NOT EXISTS `area_interes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_area` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.area_interes: ~5 rows (aproximadamente)
INSERT INTO `area_interes` (`id`, `nombre_area`) VALUES
	(1, 'Desarrollo'),
	(2, 'Mantenimiento Correctivo y Preventivo'),
	(4, 'Reparación de impresoras'),
	(6, 'Instalación de cámaras '),
	(7, 'Desarrollo web');

-- Volcando estructura para tabla cluster.carreras
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.carreras: ~4 rows (aproximadamente)
INSERT INTO `carreras` (`id`, `nombre_carrera`) VALUES
	(1, 'Desarrollo de Software Multiplataforma'),
	(2, 'Gestión de Negocios y Proyectos'),
	(4, 'Reparación de impresoras'),
	(6, 'Industrial');

-- Volcando estructura para tabla cluster.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercial` varchar(300) NOT NULL,
  `razon_social` varchar(400) NOT NULL,
  `rfc` varchar(15) NOT NULL,
  `csf` varchar(400) DEFAULT NULL,
  `estado` varchar(300) DEFAULT NULL,
  `ciudad` varchar(300) DEFAULT NULL,
  `colonia` varchar(300) DEFAULT NULL,
  `calle` varchar(300) DEFAULT NULL,
  `num_exterior` varchar(100) DEFAULT NULL,
  `num_interior` varchar(100) DEFAULT NULL,
  `cp` varchar(100) DEFAULT NULL,
  `nombre_director` varchar(300) DEFAULT NULL,
  `apellidos_direc` varchar(300) DEFAULT NULL,
  `telefono_direc` varchar(20) DEFAULT NULL,
  `email_direc` varchar(300) DEFAULT NULL,
  `nombre_admin` varchar(300) DEFAULT NULL,
  `apellidos_admin` varchar(300) DEFAULT NULL,
  `telefono_admin` varchar(20) DEFAULT NULL,
  `email_admin` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.empresas: ~4 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `nombre_comercial`, `razon_social`, `rfc`, `csf`, `estado`, `ciudad`, `colonia`, `calle`, `num_exterior`, `num_interior`, `cp`, `nombre_director`, `apellidos_direc`, `telefono_direc`, `email_direc`, `nombre_admin`, `apellidos_admin`, `telefono_admin`, `email_admin`) VALUES
	(3, 'cetic', '', 'GUHJ011006JH', NULL, 'CHIAPAS ', 'OCOSINGO ', 'CENTRO', 'SAN PEDRO ', '1', '', '29950', 'Juan ', 'Guzmán Hernánde z', '4191375758', 'jhonguzmanhernandez659@gmail.com', 'Juan ', 'Guzmán Hernánde z', '4191375758', 'jhonguzmanhernandez659@gmail.com'),
	(4, 'hp', '', 'GUHJ091006MH7', NULL, 'CHIAPAS ', 'OCOSINGO ', 'CENTRO ', 'SAN PEDRO  ', '1 ', '', '29950', 'Juan ', 'Guzmán Hernández', '4191375758', 'jhonguzmanhernandez659@gmail.com', 'Juan ', 'Guzmán Hernández', '4191375758', 'jhonguzmanhernandez659@gmail.com'),
	(6, 'papeleria abc', 'centro papelero sa de cv', 'PAAD980708UA7', NULL, 'JALISCO', 'GOMEZ PALACIO', 'ARCOQ', 'ARCOS', '99', '', '87848', 'ricardo', 'perez lopez', '888', 'abc@gmail.com', 'ricardo', 'perez lopez', '888', 'abc@gmail.com'),
	(7, 'CHIAPAS DESCONOCIDO', 'Grupo Turismo Desconocido SA de CV', 'MHA991001JU7', NULL, 'CHIAPAS', 'SAN CRISTOBAL', 'MEXICANOS', 'NIÑOS HEROES', '1', '', '982', 'Juan ', ' hernandez', '4191375750', 'jhonguzmanhernanez659@gmail.com', 'Juan ', ' hernandez', '4191375750', 'jhonguzmanhernanez659@gmail.com'),
	(10, 'weapons', 'armas guzman sa de cv', 'JHJG981006JH6', './empresa-csf/JHJG981006JH665ea50c8874d6_CCF_000785.pdf', 'CHIAPAS', 'OCOSINGO', 'NIÑOS HEROES ', 'SAN PEDRO  ', '1', '', '29950', 'Juan', 'Guzmán Hernández', '4191375758', 'jhonguzmanhernandez659@gmail.com', 'Juan', 'Guzmán Hernández', '4191375758', 'jhonguzmanhernandez659@gmail.com');

-- Volcando estructura para tabla cluster.estatus
CREATE TABLE IF NOT EXISTS `estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.estatus: ~4 rows (aproximadamente)
INSERT INTO `estatus` (`id`, `nombre`) VALUES
	(1, 'en proceso'),
	(2, 'aceptado'),
	(3, 'activo'),
	(4, 'rechazado');

-- Volcando estructura para tabla cluster.periodos_estadia
CREATE TABLE IF NOT EXISTS `periodos_estadia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.periodos_estadia: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cluster.responsable_estadias
CREATE TABLE IF NOT EXISTS `responsable_estadias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  `apellidos` varchar(300) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `responsable_estadias_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.responsable_estadias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla cluster.universidades
CREATE TABLE IF NOT EXISTS `universidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_uni` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cluster.universidades: ~7 rows (aproximadamente)
INSERT INTO `universidades` (`id`, `nombre_uni`) VALUES
	(1, 'Universidad Tecnológica de la Selva'),
	(2, 'Universidad Tecnológica del Sureste de Veracruz'),
	(21, 'Tecnológico de Monterrey'),
	(36, 'UNAM'),
	(38, 'Tecnológica de'),
	(41, 'unamdos'),
	(42, 'Universidad Tecnologica de Tecamac');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
