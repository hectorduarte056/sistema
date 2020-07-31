-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 07:51:24
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Nails Art', '2020-06-26 02:33:41'),
(2, 'Salon de belleza', '2020-06-26 02:33:47'),
(3, 'Tienda movil', '2020-06-26 03:48:28'),
(4, 'Consumo', '2020-06-27 11:38:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `rnc` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `rnc`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(1, 'JUAN PEREZ', '214-7483647-1', '(809) 519-5804', 'SFM', '1990-05-05', 0, '2020-06-29 03:03:56'),
(2, 'Santos Y Joaquin', '2147483647', '(809) 588-4660', 'SFM', '0000-00-00', 0, '2020-06-28 03:28:27'),
(3, 'Varli Comercial', '2147483647', '(809) 588-0000', 'SFM', '0000-00-00', 0, '2020-06-28 03:28:49'),
(4, 'Santos Y Joaquin', '2147483647', '(809) 588-7550', 'sfm', '0000-00-00', 0, '2020-06-28 03:30:46'),
(5, 'Eddie Santiago', '05601630162', '(809) 588-7565', 'sfm', '1990-08-05', 0, '2020-06-28 03:34:07'),
(6, 'Vanesa Lopez', '05601630162', '(809) 519-5804', 'sfm', '1990-08-05', 0, '2020-06-28 13:10:24'),
(7, 'Consumidor Final', '056-0163016-2', '(809) 519-5804', 'sfm', '1990-08-05', 0, '2020-06-28 13:17:42'),
(8, 'fiscal', '056-0163016-2', '(809) 588-7550', 'SFM', '1990-08-05', 0, '2020-06-28 13:19:44'),
(9, 'JUAN PABLO DUARTE', '056-0163016-2', '(809) 519-5804', 'sfm', '1990-01-01', 0, '2020-06-28 13:20:56'),
(10, 'Henry Lizardo', '056-0163016-8', '(809) 558-8887', 'sfm', '1987-01-01', 0, '2020-06-28 14:14:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `itbis` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `itbis`, `ventas`, `fecha`) VALUES
(7, 4, '401', 'JUGO GATORADE 24 x 600 ML.', 'vistas/img/productos/401/992.jpg', 120, 40, 50, 18, 0, '2020-06-27 11:36:45'),
(8, 4, '402', 'CERVEZA PRESIDENTE 24 x 12 OZ.', 'vistas/img/productos/402/910.jpg', 240, 65, 75, 18, 0, '2020-06-27 11:36:33'),
(9, 4, '403', 'CALDO DOÑA GALLINA 6x24x12', 'vistas/img/productos/403/800.jpg', 1440, 45, 60, 18, 0, '2020-06-27 11:36:24'),
(10, 4, '404', 'ACEITE CRISOL 2 x 250 OZ.', 'vistas/img/productos/404/815.jpg', 80, 630, 690, 16, 0, '2020-06-27 11:40:20'),
(11, 4, '405', 'CLOROX ORIGINAL 128 OZ.', 'vistas/img/productos/405/429.jpg', 9, 115, 130, 18, 0, '2020-06-27 19:06:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `rnc` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `rnc`, `telefono`, `direccion`, `ventas`, `fecha`) VALUES
(2, 'Colmado Joniel C x A', '056-0163016-9', '(809) 588-7550', 'sfm', 0, '2020-06-29 03:06:30'),
(4, 'Santos & Joaquin S.A.', '05501630162', '(809) 588-7505', 'SFM', 0, '2020-06-28 03:36:26'),
(5, 'Varli Comercial SA', '056-0163016-2', '(809) 519-5804', 'SFM', 0, '2020-06-28 14:01:54'),
(6, 'Alofoke Music', '056-0163016-3', '(809) 519-5805', 'Santiago', 0, '2020-06-29 05:48:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `turno` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`, `fecha`) VALUES
(1, 'Vanesa Marrero ', '2020-06-28 03:20:37'),
(12, 'Juana Mendez', '2020-06-29 05:49:37'),
(13, 'Lucy Marte', '2020-06-29 05:49:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Hector Joel Duarte', 'hector056', '$2a$07$asxx54ahjppf45sd87a5auFVuaKCJaK2nfJ2paUWDPBvK8iBgdn2S', 'Administrador', 'vistas/img/usuarios/hector056/131.png', 1, '2020-06-28 09:47:22', '2020-06-28 13:47:22'),
(2, 'Lucy Marte', 'lucy0825', '$2a$07$asxx54ahjppf45sd87a5aue8Z8x613dtqvh0X2t9tFC5U0z9CJtFu', 'Especial', 'vistas/img/usuarios/lucy0825/681.jpg', 1, '2020-06-14 20:03:48', '2020-06-24 03:50:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
