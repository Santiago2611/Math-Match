-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-06-2021 a las 21:43:59
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `math_match`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `id_clase` int(25) NOT NULL,
  `nombre_clase` varchar(40) NOT NULL,
  `fecha_creacion_clase` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vigente_hasta` date NOT NULL,
  `descripcion_clase` varchar(100) DEFAULT NULL,
  `doc_id_docente` int(25) NOT NULL,
  PRIMARY KEY (`id_clase`),
  KEY `doc_id_docente` (`doc_id_docente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `doc_id_docente` int(25) NOT NULL,
  `nombre_docente` varchar(30) NOT NULL,
  `apellidos_docente` varchar(30) NOT NULL,
  `especialidades` varchar(40) DEFAULT NULL,
  `rut_institucion` varchar(20) DEFAULT NULL,
  `fecha_reg_docente` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sexo_docente` varchar(15) DEFAULT NULL,
  `telefono_docente` int(15) NOT NULL,
  PRIMARY KEY (`doc_id_docente`),
  KEY `rut_institucion` (`rut_institucion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_mochila`
--

DROP TABLE IF EXISTS `documentos_mochila`;
CREATE TABLE IF NOT EXISTS `documentos_mochila` (
  `id_documento` varchar(30) NOT NULL,
  `id_mochila` int(15) NOT NULL,
  `fecha_subida_doc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_documento`),
  KEY `id_mochila` (`id_mochila`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `doc_id_estudiante` int(25) NOT NULL,
  `id_mochila` int(25) NOT NULL,
  `rut_institucion` varchar(20) DEFAULT NULL,
  `nombre_estudiante` varchar(30) NOT NULL,
  `apellidos_estudiante` varchar(30) NOT NULL,
  `fecha_nac_estudiante` date NOT NULL,
  `grado_estudiante` int(2) NOT NULL,
  `email_estudiante` varchar(40) NOT NULL,
  `clave_estudiante` varchar(35) NOT NULL,
  `fecha_reg_estudiante` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sexo_estudiante` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`doc_id_estudiante`),
  KEY `id_mochila` (`id_mochila`),
  KEY `rut_institucion` (`rut_institucion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_clase`
--

DROP TABLE IF EXISTS `estudiante_clase`;
CREATE TABLE IF NOT EXISTS `estudiante_clase` (
  `id_clase` int(25) NOT NULL,
  `doc_id_estudiante` int(25) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id_clase` (`id_clase`),
  KEY `doc_id_estudiante` (`doc_id_estudiante`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_juego`
--

DROP TABLE IF EXISTS `estudiante_juego`;
CREATE TABLE IF NOT EXISTS `estudiante_juego` (
  `id_juego` int(15) NOT NULL,
  `doc_id_estudiante` int(25) NOT NULL,
  `nivel_actual` int(3) NOT NULL,
  KEY `id_juego` (`id_juego`),
  KEY `doc_id_estudiante` (`doc_id_estudiante`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones_educativas`
--

DROP TABLE IF EXISTS `instituciones_educativas`;
CREATE TABLE IF NOT EXISTS `instituciones_educativas` (
  `rut_institucion` varchar(20) NOT NULL,
  `nombre_institucion` varchar(50) NOT NULL,
  `email_institucion` varchar(40) NOT NULL,
  `clave_institucion` varchar(35) NOT NULL,
  `tipo_institucion` varchar(15) NOT NULL,
  `fecha_reg_institucion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `direccion_institucion` varchar(35) NOT NULL,
  PRIMARY KEY (`rut_institucion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id_juego` int(15) NOT NULL,
  `nombre_juego` varchar(20) NOT NULL,
  `descripcion_juego` varchar(30) DEFAULT NULL,
  `instrucciones` varchar(80) DEFAULT NULL,
  `tema_juego` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mochilas`
--

DROP TABLE IF EXISTS `mochilas`;
CREATE TABLE IF NOT EXISTS `mochilas` (
  `id_mochila` int(15) NOT NULL,
  `doc_id_estudiante` int(25) NOT NULL,
  PRIMARY KEY (`id_mochila`),
  KEY `doc_id_estudiante` (`doc_id_estudiante`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(20) NOT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `descripcion_video` varchar(100) DEFAULT NULL,
  `miniatura` blob DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_clase` int(25) NOT NULL,
  PRIMARY KEY (`id_video`),
  KEY `id_clase` (`id_clase`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
