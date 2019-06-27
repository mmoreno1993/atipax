-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2019 a las 14:13:44
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atipax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogos`
--

CREATE TABLE `catalogos` (
  `catalogo_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen_url` text COLLATE utf8_spanish_ci,
  `catalogo_url` text COLLATE utf8_spanish_ci,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_catalogos`
--

CREATE TABLE `categorias_catalogos` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_flyers`
--

CREATE TABLE `categorias_flyers` (
  `categoria_flyer_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT 'ADMIN',
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT 'ADMIN',
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias_flyers`
--

INSERT INTO `categorias_flyers` (`categoria_flyer_id`, `nombre`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`) VALUES
(1, 'FLYERS1', 1, 'ADMIN', 'ADMIN', '2019-06-02 12:41:44', '2019-06-02 12:41:44'),
(2, 'FLYERS2', 1, 'ADMIN', 'ADMIN', '2019-06-02 12:42:57', '2019-06-02 12:42:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_manuales`
--

CREATE TABLE `categorias_manuales` (
  `categoria_manual_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias_manuales`
--

INSERT INTO `categorias_manuales` (`categoria_manual_id`, `nombre`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`) VALUES
(1, 'Manual1', 1, NULL, NULL, '2019-06-09 11:50:49', '2019-06-09 11:50:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flyers`
--

CREATE TABLE `flyers` (
  `flyer_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen_url` text COLLATE utf8_spanish_ci,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `flyers`
--

INSERT INTO `flyers` (`flyer_id`, `titulo`, `imagen_url`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`, `categoria_id`) VALUES
(1, 'flyer1', 'https://venngage-wordpress.s3.amazonaws.com/uploads/2018/06/Business-Resturant-Flyer-Template.jpg', 1, NULL, NULL, '2019-06-02 13:28:57', '2019-06-02 13:28:57', 1),
(2, 'flyer1', 'https://venngage-wordpress.s3.amazonaws.com/uploads/2018/06/Business-Resturant-Flyer-Template.jpg', 1, NULL, NULL, '2019-06-02 13:29:22', '2019-06-02 13:29:22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manuales`
--

CREATE TABLE `manuales` (
  `manual_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen_url` text COLLATE utf8_spanish_ci,
  `manual_url` text COLLATE utf8_spanish_ci,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `manuales`
--

INSERT INTO `manuales` (`manual_id`, `titulo`, `imagen_url`, `manual_url`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`, `categoria_id`) VALUES
(1, 'Manual 1', 'https://venngage-wordpress.s3.amazonaws.com/uploads/2018/06/Business-Resturant-Flyer-Template.jpg', 'https://venngage-wordpress.s3.amazonaws.com/uploads/2018/06/Business-Resturant-Flyer-Template.jpg', 1, NULL, NULL, '2019-06-09 11:51:12', '2019-06-09 11:51:12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `slider` int(11) NOT NULL,
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menu_id`, `titulo`, `url`, `estado`, `slider`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`) VALUES
(1, 'PERÚ Y CIRCUITOS', NULL, 1, 0, NULL, NULL, '2019-06-10 22:28:52', '2019-06-10 22:28:52'),
(2, 'AMÉRICA Y CARIBE', NULL, 1, 1, NULL, NULL, '2019-06-10 22:28:52', '2019-06-10 22:28:52'),
(3, 'EUROPA Y ORIENTE', NULL, 1, 2, NULL, NULL, '2019-06-10 22:28:52', '2019-06-10 22:28:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `titulo`, `url`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`) VALUES
(1, 1, 'COSTA', NULL, 1, NULL, NULL, '2019-06-10 22:29:22', '2019-06-10 22:29:22'),
(2, 1, 'SIERRA', NULL, 1, NULL, NULL, '2019-06-10 22:29:22', '2019-06-10 22:29:22'),
(3, 1, 'SELVA', NULL, 1, NULL, NULL, '2019-06-10 22:29:43', '2019-06-10 22:29:43'),
(4, 2, 'CARIBE', NULL, 1, NULL, NULL, '2019-06-10 22:29:43', '2019-06-10 22:29:43'),
(5, 2, 'CENTRO AMÉRICA', NULL, 1, NULL, NULL, '2019-06-10 22:30:15', '2019-06-10 22:30:15'),
(6, 2, 'SUDAMÉRICA', NULL, 1, NULL, NULL, '2019-06-10 22:30:15', '2019-06-10 22:30:15'),
(7, 3, 'EUROPA', NULL, 1, NULL, NULL, '2019-06-10 22:30:34', '2019-06-10 22:30:34'),
(8, 3, 'MEDIO ORIENTE', NULL, 1, NULL, NULL, '2019-06-10 22:30:34', '2019-06-10 22:30:34'),
(9, 3, 'ORIENTE', NULL, 1, NULL, NULL, '2019-06-10 22:30:55', '2019-06-10 22:30:55'),
(10, 3, 'OCEANÍA Y ÁFRICA', NULL, 1, NULL, NULL, '2019-06-10 22:30:55', '2019-06-10 22:30:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsubmenu`
--

CREATE TABLE `subsubmenu` (
  `subsubmenu_id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `submenu_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creado_en` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_en` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subsubmenu`
--

INSERT INTO `subsubmenu` (`subsubmenu_id`, `titulo`, `submenu_id`, `url`, `estado`, `creado_por`, `modificado_por`, `creado_en`, `modificado_en`) VALUES
(1, 'Chiclayo', 1, NULL, 1, NULL, NULL, '2019-06-10 22:31:49', '2019-06-10 22:31:49'),
(2, 'Arequipa', 2, NULL, 1, NULL, NULL, '2019-06-10 22:31:49', '2019-06-10 22:31:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT '0',
  `creado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modificado_por` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `telefono`, `usuario`, `password`, `rol`, `creado_por`, `modificado_por`, `estado`) VALUES
(1, 'Arturo', 'Herrera', 'caghp94@gmail.com', '948955703', 'admin', '123', 10, 'SISTEMA', 'SISTEMA', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  ADD PRIMARY KEY (`catalogo_id`);

--
-- Indices de la tabla `categorias_catalogos`
--
ALTER TABLE `categorias_catalogos`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `categorias_flyers`
--
ALTER TABLE `categorias_flyers`
  ADD PRIMARY KEY (`categoria_flyer_id`);

--
-- Indices de la tabla `categorias_manuales`
--
ALTER TABLE `categorias_manuales`
  ADD PRIMARY KEY (`categoria_manual_id`);

--
-- Indices de la tabla `flyers`
--
ALTER TABLE `flyers`
  ADD PRIMARY KEY (`flyer_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `manuales`
--
ALTER TABLE `manuales`
  ADD PRIMARY KEY (`manual_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indices de la tabla `subsubmenu`
--
ALTER TABLE `subsubmenu`
  ADD PRIMARY KEY (`subsubmenu_id`),
  ADD KEY `submenu_id` (`submenu_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  MODIFY `catalogo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_catalogos`
--
ALTER TABLE `categorias_catalogos`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_flyers`
--
ALTER TABLE `categorias_flyers`
  MODIFY `categoria_flyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias_manuales`
--
ALTER TABLE `categorias_manuales`
  MODIFY `categoria_manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `flyers`
--
ALTER TABLE `flyers`
  MODIFY `flyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `manuales`
--
ALTER TABLE `manuales`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `subsubmenu`
--
ALTER TABLE `subsubmenu`
  MODIFY `subsubmenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flyers`
--
ALTER TABLE `flyers`
  ADD CONSTRAINT `flyers_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_flyers` (`categoria_flyer_id`);

--
-- Filtros para la tabla `manuales`
--
ALTER TABLE `manuales`
  ADD CONSTRAINT `manuales_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_manuales` (`categoria_manual_id`);

--
-- Filtros para la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Filtros para la tabla `subsubmenu`
--
ALTER TABLE `subsubmenu`
  ADD CONSTRAINT `subsubmenu_ibfk_1` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
