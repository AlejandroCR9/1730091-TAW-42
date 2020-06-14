-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-06-2020 a las 03:10:56
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
-- Base de datos: `inventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) NOT NULL,
  `description_category` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `description_category`, `date_added`) VALUES
(1, 'LÃ¡cteos', 'Productos lÃ¡cteos', '2020-06-07 23:38:23'),
(2, 'Lavanderia', 'Productos para el hogar', '2020-06-10 01:00:16'),
(3, 'Mascotas', 'Productos para tus mascotas', '2020-06-10 01:00:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `address` varchar(200) NOT NULL,
  `client_email` varchar(80) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`idClient`, `firstname`, `lastname`, `address`, `client_email`, `date_added`) VALUES
(1, 'JosÃ©', 'Perez', '24 juarez #121', 'jose@hotmail.com', '2020-06-14 02:00:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `date`, `note`, `reference`, `quantity`) VALUES
(1, 8, 2, '2020-06-08 00:45:39', 'admin agrego/compro', 'dfs', 2),
(2, 1, 2, '2020-06-10 00:44:20', 'adminagrego/compro', 'Faltaron', 9),
(3, 1, 2, '2020-06-11 00:47:54', 'adminagrego/compro', 'Nuevos', 3),
(4, 1, 2, '2020-06-11 00:51:55', 'adminagrego/compro', 'Error conteo', 4),
(5, 3, 2, '2020-06-12 08:32:18', 'admin agrego/compro', 'Cambio de nombre', 2),
(6, 4, 2, '2020-06-12 08:32:47', 'admin agrego/compro', 'Cambio de nombre', 12),
(7, 5, 2, '2020-06-12 08:33:26', 'admin agrego/compro', 'Cambio de nombre', 23),
(8, 7, 2, '2020-06-12 08:33:50', 'admin agrego/compro', 'Cambio de nombre', 3),
(9, 8, 2, '2020-06-12 08:34:20', 'admin agrego/compro', 'Cambio de nombre', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` varchar(20) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_product` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `code_product`, `name_product`, `date_added`, `price_product`, `stock`, `id_category`) VALUES
(1, '3425678', 'Leche', '2020-06-08 00:21:50', 15, 10, 1),
(3, '1231', 'Flan lala', '2020-06-08 00:32:07', 12, 2, 1),
(4, '34', 'Comida para gatos', '2020-06-08 00:36:31', 124, 12, 3),
(5, '23', 'JabÃ³n Ariel', '2020-06-08 00:37:35', 23, 23, 2),
(7, '43', 'Comida para perros', '2020-06-08 00:45:09', 23, 3, 3),
(8, '24', 'Chocolate lala', '2020-06-08 00:45:39', 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `typeu` int(11) NOT NULL DEFAULT '2',
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `typeu`, `user_name`, `user_password`, `user_email`, `date_added`) VALUES
(2, 'Ramiro', 'Cedillo', 1, 'admin', '$2y$10$M.Z236mMp4jhIZoYL0PQxeAx2qhbSuQyt43w4mQRTDV6vYqkLDRlC', '1730091@upv.edu.mx', '2020-06-01 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
