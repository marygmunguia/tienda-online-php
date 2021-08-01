-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2021 a las 20:12:31
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `allonlinehn`
--
CREATE DATABASE IF NOT EXISTS `allonlinehn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `allonlinehn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`) VALUES
(1, 'Vestidos de Gala'),
(2, 'Tecnología'),
(3, 'Papelería'),
(4, 'Electrodomésticos'),
(6, 'Perfumería'),
(7, 'Bolsos de Mano'),
(8, 'Teléfono Celular'),
(10, 'Tablets'),
(11, 'Maquillaje'),
(12, 'Cuidado de la piel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesventas`
--

DROP TABLE IF EXISTS `detallesventas`;
CREATE TABLE IF NOT EXISTS `detallesventas` (
  `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idDetalleVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detallesventas`
--

INSERT INTO `detallesventas` (`idDetalleVenta`, `idventa`, `idproducto`, `cantidad`, `precio`, `total`) VALUES
(1, 1, 7, '2.00', '310.00', '620.00'),
(2, 2, 10, '1.00', '550.00', '550.00'),
(3, 4, 8, '1.00', '440.00', '440.00'),
(4, 5, 9, '1.00', '650.00', '650.00'),
(5, 5, 10, '1.00', '550.00', '550.00'),
(6, 5, 7, '1.00', '310.00', '310.00'),
(7, 6, 7, '3.00', '310.00', '930.00'),
(8, 7, 8, '1.00', '440.00', '440.00'),
(9, 8, 8, '1.00', '440.00', '440.00'),
(10, 8, 10, '1.00', '550.00', '550.00'),
(11, 8, 7, '2.00', '310.00', '620.00'),
(12, 9, 8, '1.00', '440.00', '440.00'),
(13, 9, 9, '1.00', '650.00', '650.00'),
(14, 10, 10, '1.00', '550.00', '550.00'),
(15, 10, 9, '1.00', '650.00', '650.00'),
(16, 10, 7, '2.00', '310.00', '620.00'),
(17, 11, 7, '1.00', '310.00', '310.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE IF NOT EXISTS `direccion` (
  `iddireccion` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `direccion1` text COLLATE utf8mb4_spanish2_ci,
  `direccion2` text COLLATE utf8mb4_spanish2_ci,
  `ciudad` text COLLATE utf8mb4_spanish2_ci,
  `departemento` text COLLATE utf8mb4_spanish2_ci,
  `pais` text COLLATE utf8mb4_spanish2_ci,
  `telefono` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `celular` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `principal` char(1) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`iddireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci,
  `idcategoria` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `isv` char(2) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigo_barras` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `idproveedor` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_categoria_producto` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `descripcion`, `idcategoria`, `precio`, `costo`, `isv`, `stock`, `estado`, `imagen`, `codigo_barras`, `idproveedor`) VALUES
(7, 'Magic Contouring', 'Contorno de Rostro', 11, '310.00', '170.00', 'S', 139, 'N', 'vistas/img/productos/74539.jpg', NULL, 6),
(8, 'Eyes Hershey’s Kisses', '', 11, '440.00', '256.00', 'S', 166, 'N', 'vistas/img/productos/22002.jpg', '', 6),
(9, 'Serum Facial Jumiso', 'All Day Vitamin Brightening & Balancing Facial Serum– 30 ml', 12, '650.00', '450.00', 'S', 228, 'N', 'vistas/img/productos/397.jpg', '', 6),
(10, 'Parches para los ojos Heimish', 'Bulgarian Rose Water Hydrogel Eye Patch 60ea', 12, '550.00', '340.00', 'S', 655, 'N', 'vistas/img/productos/574.jpg', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `RTN` text COLLATE utf8mb4_spanish2_ci,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` text COLLATE utf8mb4_spanish2_ci,
  `telefono` varchar(25) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `sitioWeb` text COLLATE utf8mb4_spanish2_ci,
  `nomContacto` text COLLATE utf8mb4_spanish2_ci,
  `emailContacto` text COLLATE utf8mb4_spanish2_ci,
  `celularContacto` varchar(25) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `RTN`, `nombre`, `email`, `telefono`, `sitioWeb`, `nomContacto`, `emailContacto`, `celularContacto`) VALUES
(1, '03011234567434', 'Samsung', 'info@samsung.com', '2446-5676', 'samsung.com', 'Joel Vega', 'joelvega@samsung.com', '8767-5445'),
(2, '12336892569243', 'Joyería Marcela', 'info@joyeriamarcela.com', '2446-7523', 'joyeriamarcela.com', 'Marcela Duran', 'lajefa@joyeriamarcela.com', '8965-3213'),
(3, '23456543123456', 'Portege', 'info@portege.com', '2446-5624', 'www.portege.com', 'Lucia Marcela Munguía', 'luciamunguia@portege.com', '9845-6512'),
(5, '12348765456789', 'Apple', 'info@apple.com', '2446-7635', 'www.apple.com', 'Eliany Tania López', 'elianylopez@apple.com', '9803-4212'),
(6, '', 'AliceBeauty Honduras', 'info@alicebeautyhonduras.com', '2446-7412', 'https://alicebeautyhonduras.com', 'Alice', 'alice@alicebeautyhonduras.com', '8840-0912');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` char(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `email`, `clave`, `estado`, `tipo`, `imagen`) VALUES
(2, 'Maria Jhose Garcia', 'mariajhosegarcia@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auC3pb4ToxZjdNYgW63UxMggr4pYKb.QK', 'A', 'A', 'vistas/img/usuarios/5526.jpg'),
(5, 'Sandra Lopéz', 'sandra@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aujZnRzsUbDDpDBXq/mJKOYvQhnlX.mVG', 'A', 'C', 'vistas/img/usuarios/4996.jpg'),
(10, 'Maritza Munguia', 'maritza@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auNMqO.cTC6d/djTasXuwdC7ixvR067OO', 'A', 'E', 'vistas/img/usuarios/2679.jpg'),
(11, 'Ana Lucia Carvajal', 'analuciacarvajal@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aujJ5EKlOS0AEIhdMOcQEXjDL.sHoP0iG', 'A', 'C', 'vistas/img/usuarios/9091.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `ClaveTransaccion` text COLLATE utf8mb4_spanish2_ci,
  `paypalDatos` text COLLATE utf8mb4_spanish2_ci,
  `idusuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `isv` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_entraga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `ClaveTransaccion`, `paypalDatos`, `idusuario`, `fecha`, `subtotal`, `isv`, `total`, `estado`, `direccion_entraga`) VALUES
(1, 'btepc67s9ve1go0g19o2vudrce', '90M64631C96410607', 11, '2021-08-01', '527.00', '93.00', '620.00', 'PROCESADA', NULL),
(2, 'btepc67s9ve1go0g19o2vudrce', '5X7826279F323883V', 11, '2021-08-01', '1572.50', '277.50', '1850.00', 'PROCESADA', NULL),
(3, 'btepc67s9ve1go0g19o2vudrce', '70648592752667814', 11, '2021-08-01', '6077.50', '1072.50', '7150.00', 'PROCESADA', NULL),
(4, 'btepc67s9ve1go0g19o2vudrce', '6H175749P3916984T', 11, '2021-08-01', '374.00', '66.00', '440.00', 'PROCESADA', NULL),
(5, 'btepc67s9ve1go0g19o2vudrce', '48L19178JY580240M', 11, '2021-08-01', '1283.50', '226.50', '1510.00', 'PROCESADA', NULL),
(6, 'btepc67s9ve1go0g19o2vudrce', '4KR13334M0280463K', 11, '2021-08-01', '792.50', '627.00', '933.00', 'PROCESADA', NULL),
(7, 'btepc67s9ve1go0g19o2vudrce', '8XF73957YD546962D', 11, '2021-08-01', '375.00', '261.00', '441.00', 'PROCESADA', NULL),
(8, 'btepc67s9ve1go0g19o2vudrce', '98H68802JS244794B', 11, '2021-08-01', '1368.50', '241.50', '1610.00', 'PROCESADA', NULL),
(9, 'btepc67s9ve1go0g19o2vudrce', '8FE51048J83372826', 11, '2021-08-01', '1861.50', '328.50', '2190.00', 'PROCESADA', NULL),
(10, 'btepc67s9ve1go0g19o2vudrce', '88Y098319E3103515', 11, '2021-08-01', '1547.00', '273.00', '1820.00', 'PROCESADA', NULL),
(11, 'qeheoue1bbf850r2l1shurgb72', '76738859WU144084W', 2, '2021-06-08', '263.50', '46.50', '310.00', 'PROCESADA', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ventas_realizadas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `ventas_realizadas`;
CREATE TABLE IF NOT EXISTS `ventas_realizadas` (
`idventa` int(11)
,`nombre` varchar(80)
,`email` varchar(100)
,`fecha` date
,`subtotal` decimal(10,2)
,`isv` decimal(10,2)
,`total` decimal(10,2)
,`estado` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ventas_realizadas`
--
DROP TABLE IF EXISTS `ventas_realizadas`;

DROP VIEW IF EXISTS `ventas_realizadas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`majo`@`localhost` SQL SECURITY DEFINER VIEW `ventas_realizadas`  AS SELECT `ventas`.`idventa` AS `idventa`, `usuarios`.`nombre` AS `nombre`, `usuarios`.`email` AS `email`, `ventas`.`fecha` AS `fecha`, `ventas`.`subtotal` AS `subtotal`, `ventas`.`isv` AS `isv`, `ventas`.`total` AS `total`, `ventas`.`estado` AS `estado` FROM (`ventas` join `usuarios`) WHERE (`ventas`.`idusuario` = `usuarios`.`idusuario`) ORDER BY `ventas`.`fecha` DESC ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria_producto` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
