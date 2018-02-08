-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2018 a las 22:45:49
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_cm`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `colores` (IN `cod` INT(11))  NO SQL
BEGIN 
SELECT * FROM color_producto INNER JOIN color ON color_producto.col_codigo=color.col_codigo WHERE color_producto.por_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `color_producto` (IN `color` INT(11), IN `producto` INT(11))  NO SQL
BEGIN 
INSERT INTO color_producto VALUES(color,producto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaCategoriaByCod` (IN `cod` INT(11))  NO SQL
BEGIN 
SELECT * FROM categoria WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaCategoriaByNombre` (IN `nombre` VARCHAR(50))  NO SQL
BEGIN 
SELECT * FROM categoria WHERE cat_nombre = nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaProductos` (IN `codigo` INT(11))  NO SQL
BEGIN
SELECT * FROM producto T1 INNER JOIN por_imagenes T2 ON  T1.pro_codigo = T2.pro_codigo WHERE T1.pro_codigo = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaUsuarioAcceso` (IN `correo` VARCHAR(100))  NO SQL
BEGIN 
SELECT * FROM usuario inner join acceso ON usuario.usu_codigo = acceso.usu_id WHERE usuario.usu_correo = correo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaUsuarioByCorreo` (IN `correo` VARCHAR(100))  NO SQL
BEGIN
SELECT * FROM usuario WHERE usu_correo = correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearAcceso` (IN `token` VARCHAR(250), IN `id` INT(11), IN `contra` VARCHAR(250))  NO SQL
BEGIN
INSERT INTO acceso VALUES
(token,id,contra);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearCategoria` (IN `nombre` VARCHAR(50), IN `estado` INT(11), IN `img` VARCHAR(150))  NO SQL
BEGIN 
insert into categoria (cat_nombre,cat_estado,cat_img)VALUES 
(nombre,estado,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearImagenProducto` (IN `producto` INT(11), IN `img` VARCHAR(150))  NO SQL
BEGIN 
INSERT INTO por_imagenes VALUES(producto,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearPedido` (IN `usuario` INT(11), IN `municipio` INT(11), IN `direccion` VARCHAR(100), IN `fecha_re` DATE, IN `fecha_ent` DATE)  NO SQL
BEGIN 
INSERT INTO pedidos(usu_id,mun_codigo,ped_direccion,ped_fecha_realizacion,ped_fecha_entrega)VALUES
(usuario,municipio,direccion,fecha_re,fecha_ent);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearProducto` (IN `nombre` VARCHAR(50), IN `precio` INT(11), IN `cantidad` INT(11), IN `des` LONGTEXT, IN `categoria` INT(11), IN `img` VARCHAR(150), IN `est` VARCHAR(20))  NO SQL
BEGIN 
INSERT INTO producto (pro_nombre,pro_precio,pro_cant,pro_des,cat_codigo,pro_imagen,pro_estado)
VALUES(nombre,precio,cantidad,des,categoria,img,est);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearProductoPedido` (IN `pedido` INT(11), IN `producto` INT(11), IN `cantidad` INT(11), IN `color` INT(11), IN `talla` INT(11))  NO SQL
BEGIN
INSERT INTO producto_pedido 
VALUES (pedido,producto,cantidad,color,talla);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `pri_nom` VARCHAR(30), IN `pri_ape` VARCHAR(25), IN `correo` VARCHAR(100), IN `rol` INT(11), IN `tip_doc` INT(11), IN `ciudad` INT(11))  NO SQL
BEGIN
INSERT INTO usuario (usu_nombre1,usu_apellido1,usu_correo,rol_codigo,tid_codigo,mun_codigo)
VALUES
(pri_nom,pri_ape,correo,rol,tip_doc,ciudad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCategoria` (IN `cod` INT(11))  NO SQL
BEGIN
DELETE FROM categoria WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarProducto` (IN `cod` INT(11))  NO SQL
BEGIN
DELETE FROM producto WHERE pro_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario` (IN `usuario` INT(11))  NO SQL
BEGIN
DELETE FROM usuario WHERE usu_codigo = usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarCategoria` (IN `cod` INT(11), IN `nombre` VARCHAR(50), IN `estado` INT(11))  NO SQL
BEGIN 
UPDATE categoria set cat_nombre = nombre  , cat_estado = estado WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarImagenCategoria` (IN `cod` INT(11), IN `img` VARCHAR(150))  NO SQL
BEGIN
UPDATE categoria SET cat_img = img WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paginasTodosProductos` (IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN
SELECT * FROM producto LIMIT ini , fin ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productosBycategoria` (IN `cat` VARCHAR(50), IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN
SELECT * FROM categoria INNER JOIN producto ON categoria.cat_codigo=producto.cat_codigo  WHERE categoria.cat_nombre =  cat LIMIT ini , fin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tallas` (IN `cod` INT(11))  NO SQL
BEGIN 
SELECT * FROM  talla_producto INNER JOIN talla ON talla_producto.tal_codigo = talla.tal_codigo WHERE talla_producto.pro_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `talla_producto` (IN `pro` INT(11), IN `tal` INT(11))  NO SQL
BEGIN 
INSERT INTO talla_producto VALUES(pro,tal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePro` (IN `nom` VARCHAR(30), IN `precio` INT(11), IN `cantidad` INT(11), IN `des` LONGTEXT, IN `cat` INT(11), IN `est` VARCHAR(20), IN `cod` INT(11))  NO SQL
BEGIN 
UPDATE producto set pro_nombre = nom , pro_precio = precio , pro_cant= cantidad , pro_des = des , cat_codigo = cat , pro_estado = est WHERE pro_codigo = cod;
END$$

DELIMITER ;

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
('014e4694d7376256832eff31ef3efb49', 15, '$2y$10$1o68uwEU5NFlCH3pSx7KU.z3gn567DGIJbDDiIpnf5LsMPORzVjcC'),
('01adb163751f819cb56e323785670957', 6, '$2y$10$Hl9HVC4KYCBQsgCSUPN0quaobvP0I/6T3l.OK1tXU.z13ToF0qX2S'),
('4fc94a9051176d0133b76d74f6df6293', 17, '$2y$10$QcGaoFDm/giJV6hsCkQ5I.V/y6UFbNx3y49tejy6cOY2kHl0XOSqu'),
('665a565a47e732f7bf96e40eb2cfc226', 16, '$2y$10$WxfTypIQ1zLUcv46zyCAte6MnA3Zgv9XMIDKaIU7gA0qfcTZfmacu'),
('d5cf38ba4f7816b2e7a6515ecbdf9732', 9, '$2y$10$NsaGCqsAXw.5cRjOQMIvFe6xzYxL3u2KJ5w2s/sLTB9S/YbHvODX.'),
('f4b3cf3fc6dfec17fbdd2ac6977e7436', 3, '$2y$10$clVWgrdPMZulTJCoXlc1hu9EkB.QmuHe3Vuzmz0xTP2joDLysdzu.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cat_codigo` int(11) NOT NULL,
  `cat_nombre` varchar(50) NOT NULL,
  `cat_estado` int(11) NOT NULL,
  `cat_img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_nombre`, `cat_estado`, `cat_img`) VALUES
(12, 'Nada1', 1, '5379a8df871d3472f72856baf15cc94a.png'),
(13, 'Nada2', 1, '3c5af9791f5f194319e3ae11180f6de8.png'),
(14, 'Nada3', 1, '541c5b20154f841069f0a3e94c9ca777.png'),
(15, 'Nada4', 1, '46bf352879e98007869cf46ace3d4c9c.png');

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
(1, 'Rojo'),
(2, 'Azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_producto`
--

CREATE TABLE `color_producto` (
  `col_codigo` int(11) NOT NULL,
  `por_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color_producto`
--

INSERT INTO `color_producto` (`col_codigo`, `por_codigo`) VALUES
(1, 24),
(1, 25),
(2, 25),
(1, 26),
(2, 26),
(1, 27),
(2, 27),
(1, 28),
(2, 28);

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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_codigo` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `mun_codigo` int(11) NOT NULL,
  `ped_direccion` varchar(100) NOT NULL,
  `ped_fecha_realizacion` date NOT NULL,
  `ped_fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `por_imagenes`
--

CREATE TABLE `por_imagenes` (
  `pro_codigo` int(11) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `por_imagenes`
--

INSERT INTO `por_imagenes` (`pro_codigo`, `img`) VALUES
(25, 'c924e4dd444867bad12ce1db57ef2286.png');

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
  `pro_imagen` varchar(150) NOT NULL,
  `pro_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_precio`, `pro_cant`, `pro_des`, `cat_codigo`, `pro_imagen`, `pro_estado`) VALUES
(24, 'camisa', 1000, 8, 'des', 14, '89f8d60ec85a9798f19c1eff02d950fb.png', 'inactivo'),
(25, 'nada', 324, 34, '324', 13, 'a98d70f681601cf12f891f6c9a3a1878.png', 'activo'),
(26, 'fgfd', 435, 435, '43543', 14, '64b52215dadbd283e6c17f7d31af9f28.png', 'activo'),
(27, 'asd', 324, 2344, '342', 13, '424373a96e0df49cfac85ff2644b246c.png', 'activo'),
(28, 'sad', 324, 34, '324', 14, '3dd90c125c50926e1cf3b51ec39712d1.png', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_pedido`
--

CREATE TABLE `producto_pedido` (
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `col_codigo` int(11) NOT NULL,
  `tal_codigo` int(11) NOT NULL
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
(1, 'X'),
(2, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_producto`
--

CREATE TABLE `talla_producto` (
  `pro_codigo` int(11) NOT NULL,
  `tal_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talla_producto`
--

INSERT INTO `talla_producto` (`pro_codigo`, `tal_codigo`) VALUES
(24, 1),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2);

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
(15, 'dsf', 'dsf', NULL, '', 's@s.com', 2, 1, 0, 1, 0),
(16, 'Alexis', 'lopera', NULL, '', 'yo@yo.com', 1, 1, 0, 1, 0),
(17, 'cristian', 'lopera', NULL, '', 'alexis__1020@hotmail.com', 1, 1, 0, 1, 0);

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_codigo`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `mun_codigo` (`mun_codigo`);

--
-- Indices de la tabla `por_imagenes`
--
ALTER TABLE `por_imagenes`
  ADD KEY `pro_codigo` (`pro_codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pro_codigo`),
  ADD UNIQUE KEY `pro_nombre` (`pro_nombre`),
  ADD KEY `cat_codigo` (`cat_codigo`);

--
-- Indices de la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `col_codigo` (`col_codigo`),
  ADD KEY `tal_codigo` (`tal_codigo`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `col_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `tal_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  ADD CONSTRAINT `color_producto_ibfk_3` FOREIGN KEY (`col_codigo`) REFERENCES `color` (`col_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `color_producto_ibfk_4` FOREIGN KEY (`por_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`mun_codigo`) REFERENCES `municipio` (`mun_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `por_imagenes`
--
ALTER TABLE `por_imagenes`
  ADD CONSTRAINT `por_imagenes_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD CONSTRAINT `producto_pedido_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedidos` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_pedido_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_pedido_ibfk_4` FOREIGN KEY (`col_codigo`) REFERENCES `color` (`col_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_pedido_ibfk_5` FOREIGN KEY (`tal_codigo`) REFERENCES `talla` (`tal_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD CONSTRAINT `talla_producto_ibfk_4` FOREIGN KEY (`tal_codigo`) REFERENCES `talla` (`tal_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_producto_ibfk_5` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
