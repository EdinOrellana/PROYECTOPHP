-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2022 a las 03:25:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vehiculos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `color`) VALUES
(1, 'Azul'),
(2, 'Rojo'),
(3, 'Verde'),
(4, 'Café'),
(5, 'Plateado'),
(6, 'Negro'),
(7, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `combustible` varchar(40) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combustible`
--

INSERT INTO `combustible` (`id_combustible`, `combustible`, `descripcion`) VALUES
(1, 'Gasolina', NULL),
(2, 'Diesel', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_autos`
--

CREATE TABLE `fotos_autos` (
  `correlativo` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `ubicacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotos_autos`
--

INSERT INTO `fotos_autos` (`correlativo`, `id_vehiculo`, `ubicacion`) VALUES
(12123151, 96, 'img/vehiculos/1.jpg'),
(12123152, 96, 'img/vehiculos/2.jpg'),
(12123153, 96, 'img/vehiculos/3.jpg'),
(12123154, 96, 'img/vehiculos/4.jpg'),
(12123155, 96, 'img/vehiculos/5.jpg'),
(12123156, 96, 'img/vehiculos/6.jpg'),
(12123157, 96, 'img/vehiculos/7.jpg'),
(12123158, 96, 'img/vehiculos/8.jpg'),
(12123159, 97, 'img/vehiculos/1.jpg'),
(12123160, 97, 'img/vehiculos/2.jpg'),
(12123161, 97, 'img/vehiculos/3.jpg'),
(12123162, 97, 'img/vehiculos/4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marcar` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marcar`, `marca`, `descripcion`) VALUES
(1, 'Toyota', NULL),
(2, 'Nissan', NULL),
(3, 'Mitsubishi', NULL),
(4, 'Honda', NULL),
(5, 'Suzuki', NULL),
(6, 'Hyundai', NULL),
(7, 'Mazda', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id_tipo`, `tipo`, `descripcion`) VALUES
(1, 'Sedán', NULL),
(2, 'Hatchback', NULL),
(3, 'Camioneta', NULL),
(4, 'Pick-up', NULL),
(5, 'Panel', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traccion`
--

CREATE TABLE `traccion` (
  `id_traccion` int(11) NOT NULL,
  `traccion` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `traccion`
--

INSERT INTO `traccion` (`id_traccion`, `traccion`, `descripcion`) VALUES
(1, '4x4', NULL),
(2, '4x2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transmision`
--

CREATE TABLE `transmision` (
  `id_transmicion` int(11) NOT NULL,
  `transmision` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transmision`
--

INSERT INTO `transmision` (`id_transmicion`, `transmision`, `descripcion`) VALUES
(1, 'Mecanica', NULL),
(2, 'Automatica', NULL),
(3, 'Triptonic', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `Nombre`, `usuario`, `pass`) VALUES
(16, 'Edin', 'jEdin', '$2y$10$PUC226ubN2uEd563GjlJvOBkmyY6H1rbxqwGlTxSWqFgkPuTqgM6q'),
(17, 'edin', 'edin', '$2y$10$eftujFnEtHhRdJ.k11nJuu2F0Le3jmCkRX4R/c4tWtsS2T3Dyoslq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `correlativo` int(250) NOT NULL,
  `marca` int(250) NOT NULL,
  `linea` varchar(250) NOT NULL,
  `tipo` int(250) NOT NULL,
  `transmision` int(250) NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `km` int(250) NOT NULL,
  `traccion` int(250) NOT NULL,
  `combustible` int(250) NOT NULL,
  `color` int(250) NOT NULL,
  `precio` int(250) NOT NULL,
  `aniosMinimoCredito` int(250) NOT NULL,
  `mensualidadAprox` int(250) NOT NULL,
  `cantidad_puertas` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`correlativo`, `marca`, `linea`, `tipo`, `transmision`, `modelo`, `km`, `traccion`, `combustible`, `color`, `precio`, `aniosMinimoCredito`, `mensualidadAprox`, `cantidad_puertas`) VALUES
(96, 1, 'x-20', 3, 2, '2022', 20, 1, 2, 7, 20000, 3, 689, 4),
(97, 1, 'x-21', 2, 2, '2021', 100, 2, 2, 7, 1000000, 5, 23333, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id_combustible`);

--
-- Indices de la tabla `fotos_autos`
--
ALTER TABLE `fotos_autos`
  ADD PRIMARY KEY (`correlativo`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marcar`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `traccion`
--
ALTER TABLE `traccion`
  ADD PRIMARY KEY (`id_traccion`);

--
-- Indices de la tabla `transmision`
--
ALTER TABLE `transmision`
  ADD PRIMARY KEY (`id_transmicion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`correlativo`) USING BTREE,
  ADD KEY `marca` (`marca`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `transmision` (`transmision`),
  ADD KEY `traccion` (`traccion`),
  ADD KEY `combustible` (`combustible`),
  ADD KEY `color` (`color`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fotos_autos`
--
ALTER TABLE `fotos_autos`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12123163;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `traccion`
--
ALTER TABLE `traccion`
  MODIFY `id_traccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transmision`
--
ALTER TABLE `transmision`
  MODIFY `id_transmicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `correlativo` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos_autos`
--
ALTER TABLE `fotos_autos`
  ADD CONSTRAINT `fotos_autos_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`correlativo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id_marcar`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipo_vehiculo` (`id_tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`transmision`) REFERENCES `transmision` (`id_transmicion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_4` FOREIGN KEY (`traccion`) REFERENCES `traccion` (`id_traccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_5` FOREIGN KEY (`combustible`) REFERENCES `combustible` (`id_combustible`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculos_ibfk_6` FOREIGN KEY (`color`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
