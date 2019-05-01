-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-01-2019 a las 10:46:10
-- Versión del servidor: 10.1.37-MariaDB-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serviceo_DONBOSCO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crgdcnt`
--

CREATE TABLE `crgdcnt` (
  `CDCODIGO` int(11) UNSIGNED NOT NULL,
  `INDOCODIGO` int(11) UNSIGNED NOT NULL,
  `CARCODIGO` int(11) NOT NULL,
  `CDFECHAI` date DEFAULT NULL,
  `CDFECHAS` date DEFAULT NULL,
  `CDESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crgdcnt`
--
ALTER TABLE `crgdcnt`
  ADD PRIMARY KEY (`CDCODIGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crgdcnt`
--
ALTER TABLE `crgdcnt`
  MODIFY `CDCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
