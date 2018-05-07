-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2018 a las 17:54:02
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiar_imagen` (IN `img` VARCHAR(150), IN `pro` INT)  NO SQL
BEGIN 
UPDATE producto SET producto.pro_imagen = img WHERE producto.pro_codigo = pro;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearImg` (IN `orde` INT, IN `codigo` VARCHAR(20), IN `con` VARCHAR(100), IN `tipo` VARCHAR(15))  NO SQL
BEGIN 
INSERT INTO estructura_noticia(tipo,orden,not_codigo,img) VALUES (tipo,orde,codigo,con);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearParrafo` (IN `con` LONGTEXT, IN `orde` INT, IN `codigo` VARCHAR(20), IN `tipo` VARCHAR(15))  NO SQL
BEGIN 
INSERT INTO estructura_noticia(tipo,orden,not_codigo,parrafo1) VALUES (tipo,orde,codigo,con);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearParrafo2` (IN `tipo` VARCHAR(15), IN `p1` LONGTEXT, IN `p2` LONGTEXT, IN `orde` INT, IN `codigo` VARCHAR(20))  NO SQL
BEGIN 
INSERT INTO estructura_noticia(tipo,orden,not_codigo,parrafo1,parrafo2) VALUES (tipo,orde,codigo,p1,p2);
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearTitulo` (IN `title` VARCHAR(100), IN `orde` INT, IN `codigo` VARCHAR(20), IN `tipo` VARCHAR(15))  NO SQL
BEGIN 
INSERT INTO estructura_noticia(tipo,orden,not_codigo,title) VALUES (tipo,orde,codigo,title);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `pri_nom` VARCHAR(30), IN `pri_ape` VARCHAR(25), IN `correo` VARCHAR(100), IN `rol` INT(11), IN `tip_doc` INT(11), IN `ciudad` INT(11))  NO SQL
BEGIN
INSERT INTO usuario (usu_nombre1,usu_apellido1,usu_correo,rol_codigo,tid_codigo,mun_codigo)
VALUES
(pri_nom,pri_ape,correo,rol,tip_doc,ciudad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarNoticia` (IN `codigo` VARCHAR(20), IN `ti` VARCHAR(100), IN `des` LONGTEXT, IN `fe` DATE)  NO SQL
BEGIN 
UPDATE noticia SET  noticia.not_titulo = ti ,noticia.not_preview= des, noticia.art_fecha = fe WHERE noticia.not_codigo=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarNoticiaImg` (IN `codigo` VARCHAR(20), IN `ti` VARCHAR(100), IN `des` LONGTEXT, IN `im` VARCHAR(100), IN `fe` DATE)  NO SQL
BEGIN 
UPDATE noticia SET  noticia.not_titulo = ti ,noticia.not_preview= des,noticia.not_poster=im , noticia.art_fecha = fe WHERE noticia.not_codigo=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCategoria` (IN `cod` INT(11))  NO SQL
BEGIN
DELETE FROM categoria WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPedido` (IN `id` INT)  NO SQL
BEGIN 
DELETE FROM producto_pedido WHERE producto_pedido.ped_codigo = id;
DELETE FROM pedidos WHERE pedidos.ped_codigo=id;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarDatosContacto` (IN `dir` VARCHAR(50), IN `ciu` INT, IN `cel` BIGINT, IN `usu` INT)  NO SQL
BEGIN 
UPDATE usuario SET usuario.usu_dir = dir , usuario.mun_codigo = ciu , usuario.usu_telefono = cel WHERE  usu_codigo = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarDatosUsuario` (IN `nombre` VARCHAR(50), IN `ape` VARCHAR(25), IN `ape2` VARCHAR(25), IN `correo` VARCHAR(100), IN `dir` VARCHAR(50), IN `ciudad` INT, IN `cel` BIGINT, IN `usu` INT)  NO SQL
BEGIN 
UPDATE usuario u SET u.usu_nombre1 = nombre ,u.usu_apellido1 = ape ,u.usu_apellido2 = ape2, u.usu_correo = correo, u.usu_dir = dir , u.mun_codigo = ciudad, u.usu_telefono = cel WHERE u.usu_codigo = usu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarImagenCategoria` (IN `cod` INT(11), IN `img` VARCHAR(150))  NO SQL
BEGIN
UPDATE categoria SET cat_img = img WHERE cat_codigo = cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarPedido` (IN `id` INT, IN `est` VARCHAR(20))  NO SQL
BEGIN 
UPDATE pedidos SET pedidos.ped_estado = est WHERE pedidos.ped_codigo = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarVideo` (IN `id` INT, IN `nombre` VARCHAR(50))  NO SQL
BEGIN 
UPDATE video SET video.nombre = nombre WHERE video.id_video = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paginasTodosProductos` (IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN
SELECT * FROM producto WHERE producto.pro_estado = "activo" LIMIT ini , fin ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paginasVideos` (IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN
SELECT * FROM video LIMIT ini , fin ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productosBycategoria` (IN `cat` VARCHAR(50), IN `ini` INT, IN `fin` INT)  NO SQL
BEGIN
SELECT * FROM categoria INNER JOIN producto ON categoria.cat_codigo=producto.cat_codigo  WHERE categoria.cat_nombre =  cat  AND producto.pro_estado = "activo" LIMIT ini , fin;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDetallesPedido` (IN `token` VARCHAR(20))  NO SQL
BEGIN 
SELECT * FROM pedidos  INNER JOIN usuario  ON pedidos.usu_id = usuario.usu_codigo  INNER JOIN producto_pedido ON producto_pedido.ped_codigo = pedidos.ped_codigo INNER JOIN producto ON producto.pro_codigo = producto_pedido.pro_codigo  INNER JOIN municipio ON municipio.mun_codigo = pedidos.mun_codigo INNER JOIN color ON color.col_codigo = producto_pedido.col_codigo INNER JOIN talla ON talla.tal_codigo = producto_pedido.tal_codigo   WHERE pedidos.token = token ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verPedido` (IN `usu` INT)  NO SQL
BEGIN 
SELECT ped.ped_codigo,ped.token,ped.ped_fecha_entrega,ped.ped_direccion,ped.ped_estado  FROM pedidos ped INNER JOIN usuario usu ON usu.usu_codigo = ped.usu_id  WHERE ped.usu_id = usu;
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
('01adb163751f819cb56e323785670957', 6, '$2y$10$Hl9HVC4KYCBQsgCSUPN0quaobvP0I/6T3l.OK1tXU.z13ToF0qX2S'),
('2b2e20abb22842e39c39e7c82fd23750', 22, '$2y$10$8FjyoCjFx.NNY8VZm9iseOEuTq8pYUA.p/05UcYxwKzEq5pTuyKRm'),
('4fc94a9051176d0133b76d74f6df6293', 17, '$2y$10$QcGaoFDm/giJV6hsCkQ5I.V/y6UFbNx3y49tejy6cOY2kHl0XOSqu'),
('54da05c46b595b86b23f02667e06b706', 23, '$2y$10$wU9ICr4Hv4HhWD7rjXoh4e6JGzS.xkbETfYvh6pZ/mMdrzauPFDGe'),
('6697a149eefdae6fdec244a5215fad3c', 19, '$2y$10$Rbxw6t9dNiPrSEme3OEKGOZFHl8HQ7tQK0NRNndHhRNkl/ydClWfy'),
('98196083e10dd13ff159d30678f1a8c2', 20, '$2y$10$pPQOCCr9BoSrkLyG7hmxgO1HVU8cAHSnsnvZPKKoisvfLleN.JDey'),
('d5cf38ba4f7816b2e7a6515ecbdf9732', 9, '$2y$10$NsaGCqsAXw.5cRjOQMIvFe6xzYxL3u2KJ5w2s/sLTB9S/YbHvODX.'),
('d8febc48be9f3cc059c507d64e5464f6', 18, '$2y$10$Q5OhGpByLgwFilngRNE6uumxQjR.VSV7wxDF1AFZ27lSBKaB9KtAC'),
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
(12, 'Nada1', 1, '00c907a4b190b8b6f37003f823d5be16.png'),
(13, 'Nada2', 1, '868da88063a663794044c9f2c58770eb.png'),
(14, 'Nada3', 1, '4d3a94a0bd7fea363d7d4565cc9e29d9.png'),
(16, 'Nada4', 1, 'de86fb1f418cd9e8c13a9491eb09febf.png'),
(17, 'tanga narizonaa', 1, 'fe0c433969c9f0b18cc7096bf7fd5e77.png');

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
(2, 'Azul'),
(8, 'Gris'),
(4, 'naranja'),
(5, 'negro'),
(1, 'Rojo'),
(3, 'sadsad');

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
(1, 25),
(2, 25),
(1, 26),
(2, 26),
(1, 27),
(2, 27),
(1, 28),
(2, 28),
(1, 29),
(2, 29),
(1, 24),
(1, 30),
(2, 30),
(1, 31),
(1, 32);

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
-- Estructura de tabla para la tabla `estructura_noticia`
--

CREATE TABLE `estructura_noticia` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `orden` int(11) NOT NULL,
  `not_codigo` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `parrafo1` longtext NOT NULL,
  `parrafo2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estructura_noticia`
--

INSERT INTO `estructura_noticia` (`id`, `tipo`, `orden`, `not_codigo`, `title`, `img`, `parrafo1`, `parrafo2`) VALUES
(13, 'titulo', 1, 'ifUXeeJZzznn0DibMes3', 'hola', '', '', ''),
(14, 'parrafo', 2, 'ifUXeeJZzznn0DibMes3', '', '', 'Ã±oiuygh', ''),
(15, 'parrafo2', 3, 'ifUXeeJZzznn0DibMes3', '', '', 'ppÃ±oiuygfghjklÃ±ouigj', 'rfghjklÃ±{'),
(16, 'img', 4, 'ifUXeeJZzznn0DibMes3', '', '09902fb876a52d9bf4460bb83cd18098.jpg', '', ''),
(17, 'titulo', 1, 'YiyQCi61JkQh8mnjbRMn', 'hola', '', '', '');

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
  `not_codigo` varchar(20) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `not_titulo` varchar(100) NOT NULL,
  `not_preview` longtext NOT NULL,
  `not_poster` varchar(150) NOT NULL,
  `art_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`not_codigo`, `usu_id`, `not_titulo`, `not_preview`, `not_poster`, `art_fecha`) VALUES
('ifUXeeJZzznn0DibMes3', 17, 'uno', 'esta', '558d8c3036c1091f4ac31c8fa8e08fa0.png', '2018-05-05'),
('YiyQCi61JkQh8mnjbRMn', 17, 'kjh', 'liou', '163f065f67ab5aa1d687874906fc02a2.png', '2018-05-05');

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
  `ped_fecha_entrega` date NOT NULL,
  `token` varchar(20) NOT NULL,
  `ped_estado` varchar(20) NOT NULL,
  `ped_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ped_codigo`, `usu_id`, `mun_codigo`, `ped_direccion`, `ped_fecha_realizacion`, `ped_fecha_entrega`, `token`, `ped_estado`, `ped_total`) VALUES
(66, 18, 1, 'calle 95 b', '2018-05-07', '2018-05-24', 'bFBvkb9-8lRnLHN', 'En Proceso', 1909),
(67, 18, 1, 'calle 95 b', '2018-05-07', '2018-05-24', 'q2jOzN5-FXTgANa', 'Bodega', 18796);

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
(24, 'ffa32a14ca2e3810e06c5563634d8ce5.png'),
(24, 'b36f0f90a3a69580acc66667cb5646d3.png'),
(24, '09a536418220e2af6587cfc063ba5cd0.png'),
(30, '03a92389ac59971b89b705f7b3007922.png'),
(30, '30a612ba054c18a65ddb81a5b0e79cd1.png'),
(30, '65d52063769223bf43c08ada878492f9.png'),
(30, 'acdd2ea9715f0131d015fe304414b2a6.png'),
(28, 'd67fdba84f3d363ec3248093c2ad1ab7.png'),
(28, '38021298cbeea5a73b1474a134b01a02.png'),
(28, '628e4807ff0867733a13876833b0c10f.png'),
(28, '7165b73fdde729eaa47d2074dbb35118.png'),
(28, '426bf70d4e92eb4c98f1c0aa53fe1d8f.png'),
(28, '3095480386e31e2483ecbf63befe7961.png'),
(32, '99cf43ba41f57d632e772c959ee433ab.png');

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
(24, 'camisa', 10001, 8, 'des', 14, '89f8d60ec85a9798f19c1eff02d950fb.png', 'inactivo'),
(25, 'nada', 324, 34, '324', 13, '', 'activo'),
(26, 'fgfd', 435, 435, '43543', 14, '64b52215dadbd283e6c17f7d31af9f28.png', 'activo'),
(27, 'asd', 324, 2344, '342', 13, '424373a96e0df49cfac85ff2644b246c.png', 'activo'),
(28, 'sad', 324, 34, '324', 14, '3dd90c125c50926e1cf3b51ec39712d1.png', 'activo'),
(29, 'kl', 8797, 897897, '89789', 12, '1e2177f6c87211da60aa42e011fd47a7.png', 'activo'),
(30, 'yes', 2134312, 214324, '13241234', 17, '39eacb2c4b4e978c8513f08c10b133ed.png', 'activo'),
(31, 'kjhk', 433, 0, '324', 13, 'ffd4380f0d34ad1dd39519b55f5c4789.png', 'activo'),
(32, 'dsaf', 21321, 0, 'saad', 13, 'e8226ab3b3017047942c5f372674b264.png', 'activo');

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

--
-- Volcado de datos para la tabla `producto_pedido`
--

INSERT INTO `producto_pedido` (`ped_codigo`, `pro_codigo`, `cantidad`, `col_codigo`, `tal_codigo`) VALUES
(66, 30, 1, 1, 1),
(66, 28, 1, 1, 1),
(67, 29, 1, 1, 1),
(67, 29, 20, 1, 2);

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
(2, 'M'),
(1, 'X'),
(3, 'XXL');

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
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(24, 1),
(30, 1),
(30, 2),
(31, 1),
(32, 2);

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
  `usu_correo` varchar(100) NOT NULL,
  `rol_codigo` int(11) NOT NULL,
  `tid_codigo` int(11) NOT NULL,
  `usu_dir` varchar(50) NOT NULL,
  `mun_codigo` int(11) NOT NULL,
  `usu_telefono` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre1`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `rol_codigo`, `tid_codigo`, `usu_dir`, `mun_codigo`, `usu_telefono`) VALUES
(3, 'julio', 'arias', NULL, 'algo@algo.com', 1, 1, '0rewsrdtf', 1, 0),
(6, 'julio', 'arias', NULL, 'nose@gds.com', 2, 1, '0', 1, 0),
(9, 'jufdsgfs', 'gdsags', NULL, 'gsag@gsag', 2, 1, '0', 1, 0),
(17, 'cristian', 'lopera', NULL, 'alexis__1020@hotmail.com', 1, 1, '0324', 1, 0),
(18, 'Andress', 'nada', 'ew', 'cliente@cliente.com', 2, 1, 'calle 95 b', 1, 89765),
(19, 'nada', 'nada', NULL, 'nada@nada.com', 2, 1, '0', 1, 0),
(20, 'Dompi', 'Lopera', NULL, 'dompi@gmail.com', 2, 1, 'calle 95 b', 1, 3233557660),
(22, 'nada', 'todo', NULL, 'aaa@aa.a', 2, 1, 'sadsa', 1, 32333),
(23, 'julio', 'wasasa', NULL, 'darckbladex2@gmail.com', 2, 1, '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_video`, `nombre`, `url`, `usu_codigo`) VALUES
(4, 'lkj', 'fca20a3b61d26489e4c58a9668b265bd.mp4', 17);

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
  ADD PRIMARY KEY (`col_codigo`),
  ADD UNIQUE KEY `col_color` (`col_color`);

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
-- Indices de la tabla `estructura_noticia`
--
ALTER TABLE `estructura_noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `not_codigo` (`not_codigo`);

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
  ADD PRIMARY KEY (`tal_codigo`),
  ADD UNIQUE KEY `tal_talla` (`tal_talla`);

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
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `col_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estructura_noticia`
--
ALTER TABLE `estructura_noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `tal_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Filtros para la tabla `estructura_noticia`
--
ALTER TABLE `estructura_noticia`
  ADD CONSTRAINT `estructura_noticia_ibfk_1` FOREIGN KEY (`not_codigo`) REFERENCES `noticia` (`not_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
