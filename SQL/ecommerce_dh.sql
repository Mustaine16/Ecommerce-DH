-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-02-2020 a las 19:23:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

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
CREATE DATABASE  IF NOT EXISTS `ecommerce_dh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecommerce_dh`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_21_173848_create_carritos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Redmi Note 3', 'Snapdragon 650', 18999, 'SEbDipTyB9Bkbauca7VIRGo7S0uzzlfBTvZiiyTG.png', 'Android 6.0.1', 5.5, 16, 32, 4, 32),
(3, 'Google Pixel 2', 'Snapdragon 835', 25999, 'yJfGf1xObsAwUIg1EYVqAqPmgnSld1Znsqw2qUQE.png', 'Android 10.0', 5, 12.2, 4, 5, 32),
(4, 'Moto E6 Plus', 'Helio P22', 15999, 'ZU0NtEKNRfiHcjbOr5sMJwKIx77stMFLll0GmI1i.webp', 'Android 9.0', 6.1, 13, 4, 3, 32),
(5, 'Galaxy S9+', 'Exynos 9810', 37500, '6nrHs2U0ZLo0Dto63DBfq0z9lvIg8ZIV309110n3.png', 'Android 10.0', 6.2, 12, 6, 1, 32),
(7, 'LG V30', 'Snapdragon 835', 29500, 'EAi08cvm8v9dVm367fG2euj4hDDHvj2Zccuf6grP.png', 'Android 9.0', 6, 16, 4, 2, 32),
(8, 'Iphone 11 PRO Max', 'A13 Bionic', 1000000000, 'uqBaMQMNmTmnDglkm9pgqvddKDhdtGjjgoYKVQTq.png', 'iOS 13.3', 6.5, 12, 4, 6, 32),
(13, 'Redmi Note 8 PRO', 'Snapdragon 650', 218999, 'RMKMmVlQzlOfj6beSpVHhsz7rqLCOvjjsJCu4lwH.png', 'Android 9', 6.8, 16, 32, 4, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carritos_id_producto_foreign` (`id_producto`),
  ADD KEY `carritos_id_usuario_foreign` (`id_usuario`);

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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcas_idx` (`id_marca`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `carritos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

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
