-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2020 a las 05:41:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce_dh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'Samsung'),
(2, 'LG'),
(3, 'Motorola'),
(4, 'Xiaomi'),
(5, 'Google'),
(6, 'Applecito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `procesador` varchar(60) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `sist_operativo` varchar(60) DEFAULT NULL,
  `pantalla` float DEFAULT NULL,
  `camara` float DEFAULT NULL,
  `memoria_ram` float DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `memoria_int` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `procesador`, `precio`, `imagen`, `sist_operativo`, `pantalla`, `camara`, `memoria_ram`, `id_marca`, `memoria_int`) VALUES
(1, 'Samsung Galaxy A8 2018', 'Exynos 7885', 20999, 'qGVC2K5yZ1dc2PdtZjMbydkefajTwxI8aYKQZ4qP.png', '9.0', 5.6, 16, 4, 1, 32),
(2, 'Redmi Note 3', 'Snapdragon 650', 18999, '3husWqrgy20OYUOkKeXWCVQLT3OQRix23y25GSbu.png', '6.0.1', 5.5, 16, 3, 4, 32),
(3, 'Google Pixel 2', 'Snapdragon 835', 25999, 'w9oDfp5vT0jMmVJt3CkyeQjDOTvhu3GFg0CGP9mO.png', '10.0', 5, 12.2, 4, 5, 32),
(4, 'Moto E6 Plus', 'Helio P22', 15999, 'SOIehbYyHhQ07OKYZOSaU04HcCmNbS8lLgcUsU8C.webp', '9.0', 6.1, 13, 4, 3, 32),
(5, 'Galaxy S9+', 'Exynos 9810', 37500, 'dCOI4jr3zskaGpS7wNybgK8qU2qMHAVWophp7YxC.jpeg', '10.0', 6.2, 12, 6, 1, 32),
(6, 'Redmi Note 8 PRO', 'Helio G90T', 21500, 'WontCYvym8ZTI7oRK5InWGysTTTRmZydWFZVDFFB.jpeg', '9.0', 6.53, 64, 8, 4, 32),
(7, 'LG V30', 'Snapdragon 835', 29500, 'FeYqxr3TQtSsnjBvuwhiURpMjOeJ4g6cmRrxbMQA.jpeg', '9.0', 6, 16, 4, 2, 32),
(8, 'Iphone 11 PRO Max', 'A13 Bionic', 1000000000, 'v7QRO3JXCllcCludC82FGnmpENQ7fnMLdZoKrW7s.jpeg', 'IOS 13.3', 6.5, 12, 4, 6, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `permisos` tinyint(4) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `nombre` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `apellido` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `direccion` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `ciudad` varchar(60) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_idx` (`id_producto`),
  ADD KEY `fk_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcas_idx` (`id_marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
