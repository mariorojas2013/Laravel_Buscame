-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para buscame
DROP DATABASE IF EXISTS `buscame`;
CREATE DATABASE IF NOT EXISTS `buscame` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `buscame`;

-- Volcando estructura para tabla buscame.datos_desaparecidos
DROP TABLE IF EXISTS `datos_desaparecidos`;
CREATE TABLE IF NOT EXISTS `datos_desaparecidos` (
  `id_desaparecido` int(11) NOT NULL AUTO_INCREMENT,
  `foto1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto3` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `color_ojos` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `color_cabello` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `color_piel` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `peso_promedio` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `genero` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatura` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `enfermedades` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ultima_ubicacion` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0,0',
  `estado` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Registro',
  `id_usuario_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_desaparecido`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='colocar direccion, ciudad ';

-- Volcando datos para la tabla buscame.datos_desaparecidos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `datos_desaparecidos` DISABLE KEYS */;
INSERT IGNORE INTO `datos_desaparecidos` (`id_desaparecido`, `foto1`, `foto2`, `foto3`, `tipo_documento`, `fecha_nacimiento`, `numero_documento`, `nombres`, `apellidos`, `color_ojos`, `color_cabello`, `color_piel`, `peso_promedio`, `genero`, `estatura`, `enfermedades`, `ultima_ubicacion`, `estado`, `id_usuario_admin`) VALUES
	(26, 'mostrar3.png', 'mostrar3.png', 'mostrar3.png', 'CC', '2019-01-01', '45645', 'Antonio', 'Perez', 'grises', 'castaño', 'oscura', '54kl', 'Masculino', '1.90', 'ninguna', '3.3950619,-76.5957046', 'Registro', NULL),
	(27, 'mostrar2.png', 'mostrar2.png', 'mostrar2.png', 'CC', '2019-01-01', '45645', 'Cristian', 'Castro', 'marrones', 'rubio', 'clara', '54kl', 'Masculino', '1.90', 'ninguna', '3.3950619,-76.5957046', 'Publicado', NULL),
	(29, 'mostrar1.png', 'mostrar1.png', 'mostrar1.png', 'CC', '2019-01-01', '45645', 'Carolina', 'Mendez', 'verdes', 'negro', 'clara', '54kl', 'Femenino', '1.90', 'ninguna', '3.3994744124955,-76.592142626428', 'Publicado', NULL);
/*!40000 ALTER TABLE `datos_desaparecidos` ENABLE KEYS */;

-- Volcando estructura para tabla buscame.mensajes_desaparecidos
DROP TABLE IF EXISTS `mensajes_desaparecidos`;
CREATE TABLE IF NOT EXISTS `mensajes_desaparecidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` longtext,
  `id_desaparecido` int(11) DEFAULT NULL,
  `id_usuario_envia` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla buscame.mensajes_desaparecidos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes_desaparecidos` DISABLE KEYS */;
INSERT IGNORE INTO `mensajes_desaparecidos` (`id`, `mensaje`, `id_desaparecido`, `id_usuario_envia`) VALUES
	(25, '', 0, 0),
	(26, 'Estaba caminando cerca del centro de la ciudad', 29, 1),
	(27, '', 0, 0),
	(28, 'hola', 29, 1),
	(29, '', 0, 0),
	(30, 'holis', 26, 1),
	(31, '', 0, 0),
	(32, 'hi', 27, 1);
/*!40000 ALTER TABLE `mensajes_desaparecidos` ENABLE KEYS */;

-- Volcando estructura para tabla buscame.usuario_desaparecidos
DROP TABLE IF EXISTS `usuario_desaparecidos`;
CREATE TABLE IF NOT EXISTS `usuario_desaparecidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `numero_documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `ciudad_residencia` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `filtros` int(1) DEFAULT NULL COMMENT '1: Por nombres , 2: Por ubicacion',
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla buscame.usuario_desaparecidos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_desaparecidos` DISABLE KEYS */;
INSERT IGNORE INTO `usuario_desaparecidos` (`id`, `tipo_documento`, `numero_documento`, `nombres`, `apellidos`, `ciudad_residencia`, `telefono_fijo`, `celular`, `email`, `direccion`, `filtros`, `usuario`, `clave`) VALUES
	(1, NULL, NULL, 'Mario ', NULL, 'sfdgfgfsd', NULL, '324325', NULL, NULL, 1, 'ma', 'ma'),
	(2, NULL, NULL, 'Pepito', NULL, 'fsdasdfs', NULL, '3243423', NULL, NULL, NULL, 'pe', 'pe');
/*!40000 ALTER TABLE `usuario_desaparecidos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
