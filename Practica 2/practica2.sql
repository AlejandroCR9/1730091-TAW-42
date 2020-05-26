-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2020 a las 02:41:33
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL,
  `nombreCarrera` varchar(50) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `uniFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `nombreCarrera`, `capacidad`, `uniFK`) VALUES
(1, 'ITI', 150, 1),
(2, 'Pymes', 250, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `cedula` varchar(25) DEFAULT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `promedio` varchar(15) DEFAULT NULL,
  `edad` varchar(25) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Fk_Carrera` int(11) DEFAULT NULL,
  `Fk_Universidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `cedula`, `nombre`, `apellidos`, `promedio`, `edad`, `fecha`, `Fk_Carrera`, `Fk_Universidad`) VALUES
(1, '123456', 'Alberto', 'Lumbreras Ruiz', '10', '21', '2020-05-13', 1, 1),
(3, '12312', 'Beto', 'Lur', '8', '22', '2020-05-06', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `idUni` int(11) NOT NULL,
  `nombreUni` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`idUni`, `nombreUni`, `ubicacion`) VALUES
(1, 'UPV', 'Victoria'),
(2, 'UAT', 'Quien sabe'),
(3, 'TEC', 'Victoria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idCarrera`),
  ADD KEY `uniFK` (`uniFK`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Carrera` (`Fk_Carrera`),
  ADD KEY `Fk_Universidad` (`Fk_Universidad`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`idUni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `idUni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`uniFK`) REFERENCES `universidad` (`idUni`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`Fk_Carrera`) REFERENCES `carrera` (`idCarrera`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`Fk_Universidad`) REFERENCES `universidad` (`idUni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
