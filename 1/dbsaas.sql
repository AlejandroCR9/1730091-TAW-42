-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-04-2020 a las 04:09:24
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsaas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

DROP TABLE IF EXISTS `accesorios`;
CREATE TABLE IF NOT EXISTS `accesorios` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `idConsola` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `unidades` int(11) NOT NULL,
  `preciorenta` float NOT NULL,
  PRIMARY KEY (`idAccesorio`),
  KEY `idConsola` (`idConsola`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`idAccesorio`, `idConsola`, `descripcion`, `unidades`, `preciorenta`) VALUES
(1, 1, 'Mando', 2, 15),
(2, 2, 'Mando', 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolas`
--

DROP TABLE IF EXISTS `consolas`;
CREATE TABLE IF NOT EXISTS `consolas` (
  `idConsola` int(11) NOT NULL,
  `idPlataforma` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `serial` varchar(40) DEFAULT NULL,
  `preciohra` float NOT NULL,
  PRIMARY KEY (`idConsola`),
  UNIQUE KEY `numero` (`numero`),
  KEY `idPlataforma` (`idPlataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consolas`
--

INSERT INTO `consolas` (`idConsola`, `idPlataforma`, `numero`, `serial`, `preciohra`) VALUES
(1, 1, 2, '234567543', 32),
(2, 3, 1, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dulceria`
--

DROP TABLE IF EXISTS `dulceria`;
CREATE TABLE IF NOT EXISTS `dulceria` (
  `idDulce` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idDulce`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dulceria`
--

INSERT INTO `dulceria` (`idDulce`, `nombre`, `precio`) VALUES
(1, 'Doritos', 20),
(2, 'Coca de Vidrio', 15),
(3, 'Tostitos', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

DROP TABLE IF EXISTS `estatus`;
CREATE TABLE IF NOT EXISTS `estatus` (
  `idEstatus` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idEstatus`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'En curso'),
(3, 'Finalizado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas`
--

DROP TABLE IF EXISTS `formas`;
CREATE TABLE IF NOT EXISTS `formas` (
  `idForma` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idForma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formas`
--

INSERT INTO `formas` (`idForma`, `nombre`) VALUES
(1, 'Presencial'),
(2, 'En línea'),
(3, 'Ambas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `idGenero` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idGenero`, `nombre`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(251) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `descripcion`, `fecha`, `hora`, `idUsuario`) VALUES
(1, 'Inicio de sesion', '2020-04-14', '05:23:13', 3),
(2, 'Iniciaste Sesión', '2020-04-14', '04:52:00', 3),
(3, 'Iniciaste Sesión', '2020-04-13', '11:54:00', 3),
(4, 'Iniciaste Sesión', '2020-04-13', '11:56:00', 3),
(5, 'Cerraste Sesión', '2020-04-13', '11:56:00', 3),
(6, '', '2020-04-13', '11:58:00', 3),
(7, '', '2020-04-13', '11:59:00', 3),
(8, '', '2020-04-14', '12:00:00', 3),
(9, 'Rentaste .5 de tiempo en la 1 con un total de: 7.5 ganando 15 de monedas', '2020-04-14', '12:00:00', 3),
(10, 'Rentaste .5 de tiempo en la 1 con un total de: 7.5 ganando 15 de monedas', '2020-04-14', '12:01:00', 3),
(11, 'Cerraste Sesión', '2020-04-14', '12:09:00', 1),
(12, 'Compraste un total de: 200.00 en productos de dulceria ganando en monedas 0', '2020-04-14', '12:29:00', 3),
(13, 'Compraste un total de: 300.00 en productos de dulceria ganando en monedas 0', '2020-04-14', '12:30:00', 3),
(14, 'Cerraste Sesión', '2020-04-14', '12:30:00', 1),
(15, 'Iniciaste Sesión', '2020-04-14', '12:31:00', 3),
(16, 'Cerraste Sesión', '2020-04-14', '12:31:00', 3),
(17, 'Compraste un total de: 80.00 en productos de dulceria ganando en monedas 24', '2020-04-14', '12:32:00', 3),
(18, 'Cerraste Sesión', '2020-04-14', '02:33:00', 1),
(19, 'Compraste un total de: 40.00 en productos de dulceria ganando en monedas 12', '2020-04-14', '10:47:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `idJuego` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `idPlataforma` int(11) NOT NULL,
  `rutaImagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`idJuego`, `titulo`, `idPlataforma`, `rutaImagen`) VALUES
(1, 'Fortnite', 1, '../../files/juegos/Xbox-Fortnite/fortnite.png'),
(2, 'Animal Crossing', 2, '../../files/juegos/Nintendo Switch-Animal Crossing/animalCrossing.png'),
(3, 'FIFA 20', 3, '../../files/juegos/Play Station-FIFA 20/fifa20.jpg'),
(4, 'Forza 3', 1, '../../files/juegos/Xbox-Forza 3/forza.jpeg'),
(5, 'Gears 5', 1, '../../files/juegos/Xbox-Gears 5/gears.jpeg'),
(6, 'GTA V', 3, '../../files/juegos/Play Station-GTA V/gtaV.png'),
(7, 'Mario Kart 8', 2, '../../files/juegos/Nintendo Switch-Mario Kart 8/marioKart.jpg'),
(8, 'Super Smash Bros Ultimate', 2, '../../files/juegos/Nintendo Switch-Super Smash Bros Ultimate/smashBros.jpg'),
(9, 'Spider-Man', 3, '../../files/juegos/Play Station-Spider-Man/spiderMan.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

DROP TABLE IF EXISTS `modalidades`;
CREATE TABLE IF NOT EXISTS `modalidades` (
  `idModalidad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idModalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`idModalidad`, `nombre`) VALUES
(1, 'Singles'),
(2, 'Duos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

DROP TABLE IF EXISTS `plataformas`;
CREATE TABLE IF NOT EXISTS `plataformas` (
  `idPlataforma` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `preciohra` float NOT NULL,
  `costomonedas` int(11) NOT NULL DEFAULT '0',
  `monedasganadas` int(11) NOT NULL DEFAULT '0',
  `rutaImagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idPlataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`idPlataforma`, `nombre`, `preciohra`, `costomonedas`, `monedasganadas`, `rutaImagen`) VALUES
(1, 'Xbox', 15, 7878, 50, '../../files/plataformas/Xbox One/1.png'),
(2, 'Nintendo Switch', 12, 1155, 30, '../../files/plataformas/Nintendo Switch/2.png'),
(3, 'Play Station', 16, 5000, 45, '../../files/plataformas/Play Station/3.jpg'),
(4, 'PC', 20, 6000, 100, '../../files/plataformas/PC/4.jpg'),
(5, 'Wii U', 25, 1000, 30, '../../files/plataformas/Wii U/5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta`
--

DROP TABLE IF EXISTS `renta`;
CREATE TABLE IF NOT EXISTS `renta` (
  `idRenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idGamer` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `idConsola` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`idRenta`),
  KEY `idConsola` (`idConsola`),
  KEY `fk_gamer` (`idGamer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `renta`
--

INSERT INTO `renta` (`idRenta`, `fecha`, `hora`, `idGamer`, `tiempo`, `idConsola`, `total`) VALUES
(1, '2020-04-14', '01:07:00', 3, 3, 2, 48),
(2, '2020-04-14', '01:07:00', 5, 1, 2, 16),
(3, '2020-04-14', '01:07:00', 4, 2, 2, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

DROP TABLE IF EXISTS `tipousuarios`;
CREATE TABLE IF NOT EXISTS `tipousuarios` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`idTipo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Gamer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

DROP TABLE IF EXISTS `torneos`;
CREATE TABLE IF NOT EXISTS `torneos` (
  `idTorneo` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idModalidad` int(11) NOT NULL,
  `idForma` int(11) NOT NULL,
  `costoInscripcion` float NOT NULL DEFAULT '0',
  `maxJugadores` int(11) NOT NULL,
  `jugadoresActuales` int(11) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `idEstatus` int(11) NOT NULL,
  `rutaImagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idTorneo`),
  KEY `idModalidad` (`idModalidad`),
  KEY `idJuego` (`idJuego`),
  KEY `idForma` (`idForma`),
  KEY `idEstatus` (`idEstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`idTorneo`, `titulo`, `idJuego`, `fecha`, `hora`, `idModalidad`, `idForma`, `costoInscripcion`, `maxJugadores`, `jugadoresActuales`, `descripcion`, `idEstatus`, `rutaImagen`) VALUES
(1, 'SuperSmash Meeting', 8, '2020-04-30', '17:00:00', 1, 1, 0, 10, 1, 'Torneo de Super Smash Bros Ultimate\r\n1er lugar: 5 horas gratis\r\n2do lugar: 2 horas gratis\r\nCosto de inscripción: 50 pesos', 1, '../../files/torneos/SuperSmash Meeting/torneoSmash.jpg'),
(2, 'Forza Event', 4, '2020-05-05', '18:00:00', 1, 1, 0, 5, 0, 'Torneo local de Forza 3\r\n1er lugar: 2 horas de juego\r\n2do lugar: Unos ruffles y una Coca Cola\r\nCosto de inscripción: 20 pesos', 1, '../../files/torneos/Forza Event/torneoForza.jpg'),
(3, 'FIFA 20 TOURNAMENT', 3, '2020-05-20', '16:00:00', 1, 2, 0, 12, 1, 'Torneo de FIFA 20\r\n1er lugar: 10 horas de juego\r\nCosto de inscripción: 100 pesos', 1, '../../files/torneos/FIFA 20 TOURNAMENT/torneoFifa.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneosusuarios`
--

DROP TABLE IF EXISTS `torneosusuarios`;
CREATE TABLE IF NOT EXISTS `torneosusuarios` (
  `id` int(11) NOT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `torneosusuarios`
--

INSERT INTO `torneosusuarios` (`id`, `idTorneo`, `idUsuario`) VALUES
(1, 1, 5),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `idGenero` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `gamerTag` varchar(30) NOT NULL,
  `rutaFoto` varchar(100) NOT NULL,
  `redesSociales` text NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `idTipo` int(11) NOT NULL DEFAULT '2',
  `monedas` int(11) DEFAULT '0',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `gamerTag` (`gamerTag`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `correo` (`correo`),
  KEY `idTipo` (`idTipo`),
  KEY `idGenero` (`idGenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidos`, `fechaNacimiento`, `idGenero`, `telefono`, `correo`, `gamerTag`, `rutaFoto`, `redesSociales`, `contrasena`, `idTipo`, `monedas`) VALUES
(1, 'Paola', 'Quiroz', '1998-12-15', 1, '2147483647', 'paolahq98@gmail.com', 'paolaq', '', 'Facebook', 'hola', 1, 0),
(3, 'Marisol', 'Izaguirre', '1997-03-31', 1, '5324621578', 'marisolizg@hotmail.com', 'seaysun', '', 'Twitter', 'arms1234', 2, 210),
(4, 'Ramiro', 'Cedillo', '1999-11-30', 2, '8342206230', 'hola@hola.com', 'vardoger', '../../files/usuarios/Ramiro Cedillo/bd813c6a-c8a0-4429-b99e-5b96ee519235.jpg', 'YouTube', 'hola', 2, 20),
(5, 'Juan', 'Perez', '1998-10-28', 2, '8341523698', 'juan@gmail.com', 'minecrafter', '../../files/usuarios/Juan Perez/bbdd2230-4b42-48d8-94a7-d15ddc799d8e.jpg', 'Twitter', 'adios', 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasdulces`
--

DROP TABLE IF EXISTS `ventasdulces`;
CREATE TABLE IF NOT EXISTS `ventasdulces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `monedas` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventasdulces`
--

INSERT INTO `ventasdulces` (`id`, `fecha`, `user`, `monedas`, `total`) VALUES
(1, '2020-04-14', 'minecrafter', 12, 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
