-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 11:26 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_cm`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE `acceso` (
  `acc_token` varchar(250) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `acc_contra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceso`
--

INSERT INTO `acceso` (`acc_token`, `usu_id`, `acc_contra`) VALUES
('sdsadasdsad', 1, '$2y$10$Y7aSqHcipH88Vp/Q6PQGmObMy0YqVXvXiPJ/sSvESLX847r618IHa');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `cat_codigo` int(11) NOT NULL,
  `cat_categ` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_categ`) VALUES
(1, 'ropa');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `col_codigo` int(11) NOT NULL,
  `col_color` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`col_codigo`, `col_color`) VALUES
(1, 'rojo');

-- --------------------------------------------------------

--
-- Table structure for table `color_producto`
--

CREATE TABLE `color_producto` (
  `col_codigo` int(11) NOT NULL,
  `por_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `dep_codigo` int(11) NOT NULL,
  `dep_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`dep_codigo`, `dep_nombre`) VALUES
(1, 'antiquia');

-- --------------------------------------------------------

--
-- Table structure for table `img_noticia`
--

CREATE TABLE `img_noticia` (
  `not_codigo` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `mun_codigo` int(11) NOT NULL,
  `mun_nombre` varchar(20) NOT NULL,
  `dep_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`mun_codigo`, `mun_nombre`, `dep_codigo`) VALUES
(1, 'medellin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
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
-- Table structure for table `numeros_contacto`
--

CREATE TABLE `numeros_contacto` (
  `tel_codigo` int(11) NOT NULL,
  `tel_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numeros_contacto`
--

INSERT INTO `numeros_contacto` (`tel_codigo`, `tel_telefono`) VALUES
(1, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_codigo` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `ped_direccion` varchar(100) NOT NULL,
  `ped_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `pro_codigo` int(11) NOT NULL,
  `pro_nombre` varchar(30) NOT NULL,
  `pro_img` varchar(100) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_cant` int(11) NOT NULL,
  `pro_des` longtext NOT NULL,
  `cat_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_img`, `pro_precio`, `pro_cant`, `pro_des`, `cat_codigo`) VALUES
(1, 'dsf', 'img5.jpeg', 234, 3, 'sddsfgdfsg', 1),
(2, 'sad', 'img5.jpeg', 3, 342, 'cx', 1),
(3, 'sad', 'img5.jpeg', 3, 342, 'cx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto_pedido`
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
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `rol_codigo` int(11) NOT NULL,
  `rol_rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`rol_codigo`, `rol_rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `talla`
--

CREATE TABLE `talla` (
  `tal_codigo` int(11) NOT NULL,
  `tal_talla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talla`
--

INSERT INTO `talla` (`tal_codigo`, `tal_talla`) VALUES
(1, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `talla_producto`
--

CREATE TABLE `talla_producto` (
  `pro_codigo` int(11) NOT NULL,
  `tal_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tid_codigo` int(11) NOT NULL,
  `tid_tipo_doc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`tid_codigo`, `tid_tipo_doc`) VALUES
(1, 'cedula');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
  `tel_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre1`, `usu_apellido1`, `usu_apellido2`, `usu_direccion`, `usu_correo`, `rol_codigo`, `tid_codigo`, `usu_num_doc`, `mun_codigo`, `tel_codigo`) VALUES
(1, 'sdf', 'dsf', 'sdf', 'sdsdf', 'admin', 1, 1, 545454, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`acc_token`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_codigo`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`col_codigo`);

--
-- Indexes for table `color_producto`
--
ALTER TABLE `color_producto`
  ADD KEY `col_codigo` (`col_codigo`),
  ADD KEY `por_codigo` (`por_codigo`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_codigo`);

--
-- Indexes for table `img_noticia`
--
ALTER TABLE `img_noticia`
  ADD KEY `id_noticia` (`not_codigo`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`mun_codigo`),
  ADD KEY `dep_codigo` (`dep_codigo`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`not_codigo`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indexes for table `numeros_contacto`
--
ALTER TABLE `numeros_contacto`
  ADD PRIMARY KEY (`tel_codigo`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_codigo`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`pro_codigo`),
  ADD KEY `cat_codigo` (`cat_codigo`);

--
-- Indexes for table `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD KEY `ped_codigo` (`ped_codigo`),
  ADD KEY `pro_codigo` (`pro_codigo`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_codigo`);

--
-- Indexes for table `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`tal_codigo`);

--
-- Indexes for table `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD KEY `pro_codigo` (`pro_codigo`),
  ADD KEY `tal_codigo` (`tal_codigo`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tid_codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `usu_correo` (`usu_correo`),
  ADD KEY `tid_codigo` (`tid_codigo`),
  ADD KEY `mun_codigo` (`mun_codigo`),
  ADD KEY `tel_codigo` (`tel_codigo`),
  ADD KEY `rol_codigo` (`rol_codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `not_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color_producto`
--
ALTER TABLE `color_producto`
  ADD CONSTRAINT `color_producto_ibfk_1` FOREIGN KEY (`col_codigo`) REFERENCES `color` (`col_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `color_producto_ibfk_2` FOREIGN KEY (`por_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `img_noticia`
--
ALTER TABLE `img_noticia`
  ADD CONSTRAINT `img_noticia_ibfk_1` FOREIGN KEY (`not_codigo`) REFERENCES `noticia` (`not_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`dep_codigo`) REFERENCES `departamento` (`dep_codigo`);

--
-- Constraints for table `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`);

--
-- Constraints for table `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD CONSTRAINT `producto_pedido_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedidos` (`ped_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_pedido_ibfk_2` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD CONSTRAINT `talla_producto_ibfk_2` FOREIGN KEY (`tal_codigo`) REFERENCES `talla` (`tal_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_producto_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tid_codigo`) REFERENCES `tipo_documento` (`tid_codigo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`mun_codigo`) REFERENCES `municipio` (`mun_codigo`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`tel_codigo`) REFERENCES `numeros_contacto` (`tel_codigo`),
  ADD CONSTRAINT `usuario_ibfk_6` FOREIGN KEY (`rol_codigo`) REFERENCES `rol` (`rol_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
