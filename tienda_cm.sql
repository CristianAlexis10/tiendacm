-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2017 a las 16:48:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_cm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `acc_token` varchar(250) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `acc_contra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`acc_token`, `usu_id`, `acc_contra`) VALUES
('01adb163751f819cb56e323785670957', 6, '$2y$10$Hl9HVC4KYCBQsgCSUPN0quaobvP0I/6T3l.OK1tXU.z13ToF0qX2S'),
('37efb56558a63116e3e7e6f2ab3c9dce', 10, '$2y$10$ZEAUZyYxN.z6sdnpRNgxS.Lck9jP02luMOM79Qs3xaBbXf/vxKW2O'),
('d5cf38ba4f7816b2e7a6515ecbdf9732', 9, '$2y$10$NsaGCqsAXw.5cRjOQMIvFe6xzYxL3u2KJ5w2s/sLTB9S/YbHvODX.'),
('f4b3cf3fc6dfec17fbdd2ac6977e7436', 3, '$2y$10$clVWgrdPMZulTJCoXlc1hu9EkB.QmuHe3Vuzmz0xTP2joDLysdzu.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cat_codigo` int(11) NOT NULL,
  `cat_categ` varchar(15) NOT NULL,
  `cat_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_categ`, `cat_estado`) VALUES
(0, 'categoria 1', 1),
(1, 'sghnjgfx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `col_codigo` int(11) NOT NULL,
  `col_color` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`col_codigo`, `col_color`) VALUES
(1, 'rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_producto`
--

CREATE TABLE `color_producto` (
  `col_codigo` int(11) NOT NULL,
  `por_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `dep_codigo` int(11) NOT NULL,
  `dep_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`dep_codigo`, `dep_nombre`) VALUES
(1, 'antiquia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_noticia`
--

CREATE TABLE `img_noticia` (
  `not_codigo` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `mun_codigo` int(11) NOT NULL,
  `mun_nombre` varchar(20) NOT NULL,
  `dep_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`mun_codigo`, `mun_nombre`, `dep_codigo`) VALUES
(1, 'medellin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `not_codigo` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `not_titulo` varchar(100) NOT NULL,
  `not_sub_title` varchar(50) NOT NULL,
  `not_contenido` longtext NOT NULL,
  `art_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_contacto`
--

CREATE TABLE `numeros_contacto` (
  `tel_codigo` int(11) NOT NULL,
  `tel_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `numeros_contacto`
--

INSERT INTO `numeros_contacto` (`tel_codigo`, `tel_telefono`) VALUES
(1, '1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_codigo` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `ped_direccion` varchar(100) NOT NULL,
  `ped_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `pro_codigo` int(11) NOT NULL,
  `pro_nombre` varchar(30) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_cant` int(11) NOT NULL,
  `pro_des` longtext NOT NULL,
  `cat_codigo` int(11) NOT NULL,
  `pro_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_precio`, `pro_cant`, `pro_des`, `cat_codigo`, `pro_img`) VALUES
(1, 'dsf', 234, 3, 'sddsfgdfsg', 1, 'img5.jpeg'),
(2, 'sad', 3, 342, 'cx', 1, 'img5.jpeg'),
(3, 'sad', 3, 342, 'cx', 1, 'img5.jpeg'),
(4, '1234', 1000, 1, 'su pinche madre', 1, '590f265b7cace74ba82b6eb6ff3a13a8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_pedido`
--

CREATE TABLE `producto_pedido` (
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `talla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_codigo` int(11) NOT NULL,
  `rol_rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_codigo`, `rol_rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `tal_codigo` int(11) NOT NULL,
  `tal_talla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`tal_codigo`, `tal_talla`) VALUES
(1, 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_producto`
--

CREATE TABLE `talla_producto` (
  `pro_codigo` int(11) NOT NULL,
  `tal_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tid_codigo` int(11) NOT NULL,
  `tid_tipo_doc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`tid_codigo`, `tid_tipo_doc`) VALUES
(1, 'cedula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_nombre1` varchar(30) NOT NULL,
  `usu_apellido1` varchar(25) NOT NULL,
  `usu_apellido2` varchar(25) DEFAULT NULL,
  `usu_direccion` varchar(40) NOT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `rol_codigo` int(11) NOT NULL,
  `tid_codigo` int(11) NOT NULL,
  `usu_num_doc` int(15) NOT NULL,
  `mun_codigo` int(11) NOT NULL,
  `usu_telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre1`, `usu_apellido1`, `usu_apellido2`, `usu_direccion`, `usu_correo`, `rol_codigo`, `tid_codigo`, `usu_num_doc`, `mun_codigo`, `usu_telefono`) VALUES
(3, 'julio', 'arias', NULL, '', 'algo@algo.com', 1, 1, 0, 1, 0),
(6, 'julio', 'arias', NULL, '', 'nose@gds.com', 2, 1, 0, 1, 0),
(9, 'jufdsgfs', 'gdsags', NULL, '', 'gsag@gsag', 2, 1, 0, 1, 0),
(10, 'fdsgadsg', 'fdsghd', NULL, '', 'fdsagsdf@sgfasd', 2, 1, 0, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`acc_token`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_codigo`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`col_codigo`);

--
-- Indices de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD KEY `col_codigo` (`col_codigo`),
  ADD KEY `por_codigo` (`por_codigo`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_codigo`);

--
-- Indices de la tabla `img_noticia`
--
ALTER TABLE `img_noticia`
  ADD KEY `id_noticia` (`not_codigo`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`mun_codigo`),
  ADD KEY `dep_codigo` (`dep_codigo`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`not_codigo`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `numeros_contacto`
--
ALTER TABLE `numeros_contacto`
  ADD PRIMARY KEY (`tel_codigo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_codigo`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pro_codigo`),
  ADD KEY `cat_codigo` (`cat_codigo`);

--
-- Indices de la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_codigo`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`tal_codigo`);

--
-- Indices de la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `tal_codigo` (`tal_codigo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tid_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `usu_correo` (`usu_correo`),
  ADD KEY `tid_codigo` (`tid_codigo`),
  ADD KEY `mun_codigo` (`mun_codigo`),
  ADD KEY `rol_codigo` (`rol_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `not_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD CONSTRAINT `color_producto_ibfk_1` FOREIGN KEY (`col_codigo`) REFERENCES `color` (`col_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `color_producto_ibfk_2` FOREIGN KEY (`por_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `img_noticia`
--
ALTER TABLE `img_noticia`
  ADD CONSTRAINT `img_noticia_ibfk_1` FOREIGN KEY (`not_codigo`) REFERENCES `noticia` (`not_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`dep_codigo`) REFERENCES `departamento` (`dep_codigo`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`);

--
-- Filtros para la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD CONSTRAINT `producto_pedido_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedidos` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_pedido_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD CONSTRAINT `talla_producto_ibfk_2` FOREIGN KEY (`tal_codigo`) REFERENCES `talla` (`tal_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_producto_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tid_codigo`) REFERENCES `tipo_documento` (`tid_codigo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`mun_codigo`) REFERENCES `municipio` (`mun_codigo`),
  ADD CONSTRAINT `usuario_ibfk_6` FOREIGN KEY (`rol_codigo`) REFERENCES `rol` (`rol_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
