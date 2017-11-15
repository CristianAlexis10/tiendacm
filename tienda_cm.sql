-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2017 a las 04:21:08
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

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
  `acc_codigo` int(11) NOT NULL,
  `acc_correo` varchar(30) NOT NULL,
  `acc_contra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`acc_codigo`, `acc_correo`, `acc_contra`) VALUES
(1, 'admin', '$2y$10$E6aCJNo1XdgieHiWBqGQL.FO6SJHSsXsFWUFkszaUx2YQSzyvmLyO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `art_codigo` int(11) NOT NULL,
  `art_fecha` date NOT NULL,
  `art_titulo` varchar(20) DEFAULT NULL,
  `art_subtitulo` varchar(40) DEFAULT NULL,
  `art_articulo` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`art_codigo`, `art_fecha`, `art_titulo`, `art_subtitulo`, `art_articulo`) VALUES
(1, '0000-00-00', 'puto', '', 'no se que poner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cat_codigo` int(11) NOT NULL,
  `cat_categ` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_categ`) VALUES
(1, 'ropa');

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
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `def_codigo` int(11) NOT NULL,
  `def_preciot` int(11) NOT NULL,
  `def_preciou` int(11) NOT NULL,
  `def_cantpro` int(11) NOT NULL,
  `fac_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `fac_codigo` int(11) NOT NULL,
  `fac_fecha` date NOT NULL,
  `fac_estado` tinyint(4) NOT NULL,
  `fac_hora` time NOT NULL,
  `usu_codigo` int(11) NOT NULL
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `pro_codigo` int(11) NOT NULL,
  `pro_nompro` varchar(30) NOT NULL,
  `pro_img` varchar(100) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_cant` int(11) NOT NULL,
  `pro_des` longtext NOT NULL,
  `tal_codigo` int(11) NOT NULL,
  `col_codigo` int(11) NOT NULL,
  `cat_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nompro`, `pro_img`, `pro_precio`, `pro_cant`, `pro_des`, `tal_codigo`, `col_codigo`, `cat_codigo`) VALUES
(1, 'item', 'img5.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1),
(2, 'item x2', 'img3.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1),
(3, 'item x3', 'img4.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1),
(4, 'item x4', 'img4.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1),
(5, 'item x5', 'img5.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1),
(6, 'item x6', 'img3.jpeg', 1000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lobortis bibendum enim ac finibus.', 1, 1, 1);

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
  `usu_nombres` varchar(30) NOT NULL,
  `usu_apellido1` varchar(25) NOT NULL,
  `usu_apellido2` varchar(25) DEFAULT NULL,
  `usu_direccion` varchar(40) NOT NULL,
  `rol_codigo` int(11) NOT NULL,
  `art_codigo` int(11) NOT NULL,
  `tid_codigo` int(11) NOT NULL,
  `mun_codigo` int(11) NOT NULL,
  `tel_codigo` int(11) NOT NULL,
  `acc_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombres`, `usu_apellido1`, `usu_apellido2`, `usu_direccion`, `rol_codigo`, `art_codigo`, `tid_codigo`, `mun_codigo`, `tel_codigo`, `acc_codigo`) VALUES
(1, 'alguien', 'algo', 'algo2', '12 - 34 # 56', 1, 1, 1, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`acc_codigo`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`art_codigo`);

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
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_codigo`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`def_codigo`),
  ADD KEY `fac_codigo` (`fac_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`fac_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`mun_codigo`),
  ADD KEY `dep_codigo` (`dep_codigo`);

--
-- Indices de la tabla `numeros_contacto`
--
ALTER TABLE `numeros_contacto`
  ADD PRIMARY KEY (`tel_codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pro_codigo`),
  ADD KEY `tal_codigo` (`tal_codigo`),
  ADD KEY `col_codigo` (`col_codigo`),
  ADD KEY `cat_codigo` (`cat_codigo`);

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
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tid_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `art_codigo` (`art_codigo`),
  ADD KEY `tid_codigo` (`tid_codigo`),
  ADD KEY `mun_codigo` (`mun_codigo`),
  ADD KEY `tel_codigo` (`tel_codigo`),
  ADD KEY `acc_codigo` (`acc_codigo`),
  ADD KEY `rol_codigo` (`rol_codigo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`fac_codigo`) REFERENCES `factura` (`fac_codigo`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`dep_codigo`) REFERENCES `departamento` (`dep_codigo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tal_codigo`) REFERENCES `talla` (`tal_codigo`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`col_codigo`) REFERENCES `color` (`col_codigo`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`art_codigo`) REFERENCES `articulo` (`art_codigo`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tid_codigo`) REFERENCES `tipo_documento` (`tid_codigo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`mun_codigo`) REFERENCES `municipio` (`mun_codigo`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`tel_codigo`) REFERENCES `numeros_contacto` (`tel_codigo`),
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`acc_codigo`) REFERENCES `acceso` (`acc_codigo`),
  ADD CONSTRAINT `usuario_ibfk_6` FOREIGN KEY (`rol_codigo`) REFERENCES `rol` (`rol_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
