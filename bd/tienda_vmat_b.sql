-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 06:27:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_vmat_b`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`, `estado`) VALUES
(1, 'Bolsas con cierre', 'assets/images/categorias/20221128012357.jpg', 1),
(2, 'Bolsas de basura', 'assets/images/categorias/20221128012405.jpg', 1),
(3, 'Bolsas para el mercado', 'assets/images/categorias/20221127183033.jpg', 1),
(4, 'Bandejas', 'assets/images/categorias/20221128012415.jpg', 1),
(5, 'Toldos', 'assets/images/categorias/20221127183351.jpg', 1),
(6, 'Ecovallas', 'assets/images/categorias/20221128012426.jpg', 1),
(7, 'Alfombras de caucho', 'assets/images/categorias/20221128012451.jpg', 1),
(8, 'Plancha de goma lisa', 'assets/images/categorias/20221128012506.jpg', 1),
(9, 'Pavimentos de caucho rayado', 'assets/images/categorias/20221128012516.jpg', 1),
(10, 'Copas cónicas graduadas', 'assets/images/categorias/20221128012525.jpg', 1),
(11, 'Embudos', 'assets/images/categorias/20221128012540.jpg', 1),
(12, 'Jarras graduadas', 'assets/images/categorias/20221128012554.jpg', 1),
(13, 'Vasos de precipitado', 'assets/images/categorias/20221128012603.jpg', 1),
(14, 'Vertedores', 'assets/images/categorias/20221128211202.jpg', 1),
(15, 'Probetas graduadas', 'assets/images/categorias/20221128012618.jpg', 1),
(16, 'Contenedores', 'assets/images/categorias/20221128012627.jpg', 1),
(17, 'Losetas', 'assets/images/categorias/20221128012636.jpg', 1),
(18, 'Tubos por metro', 'assets/images/categorias/20221128012643.jpg', 1),
(19, 'Abrazadera de nylon dentadas', 'assets/images/categorias/20221127203409.jpg', 1),
(20, 'Bobinas', 'assets/images/categorias/20221128012656.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT 'default.png',
  `token` varchar(100) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `clave`, `perfil`, `token`, `verify`) VALUES
(1, 'Gonzalo Fernandez', 'gonzalofierra@gmail.com', '$2y$10$ZvxfJubxBKfMycnncMQqO.458kVYUI6Em9xmD/gzNxhXnods9Kqiy', 'default.png', '', 1),
(2, 'Pablo Paredes', 'paredesmauricio777@gmail.com', '$2y$10$V7imy/tmVxoZfgKFD3dyE.Cw8m6yYwj2O72QD/7UH6l6Zsvn0vlcK', 'default.png', '84c649f720117d937ed101edcda5149a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `producto`, `precio`, `cantidad`, `id_pedido`, `id_producto`) VALUES
(1, 'BOLSAS CON CIERRE 15 x 22 cm pack 100 u', '11.10', 1, 1, 4),
(2, 'BOLSAS CON CIERRE 12 x 18 cm pack 100 u', '6.65', 1, 1, 3),
(3, 'BOLSA BASURA COLORES NEGRA 60x90 G200 pack 25 u', '30.60', 3, 1, 29),
(4, 'LOSETA ANTIDESLIZANTE 50x50 cm AZUL', '12.10', 1, 1, 237),
(6, 'ALFOMBRA TRANSITO NEGRO GRUESO 10mm. ANCHO 1.20 m. CON BASE', '63.50', 1, 1, 122),
(7, 'CONTENEDOR 120 l. con PEDAL T/AZUL TAYG', '72.95', 1, 2, 184),
(8, 'BRIDAS PLASTICO verdes 4.8x300 mm. PACK 100 u.', '38.25', 5, 2, 339),
(9, 'BURBUJA PEQUEÑA ROLLO 25m. x 1.60m (ancho)', '38.60', 1, 2, 389);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `mensaje` longtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `direccion`, `mensaje`, `estado`) VALUES
(1, 'Emilio Lopez', 'emillopez101@gmail.com', 'Av. las Americas, Zona Villa Fatima', 'Quisiera que vengan a mi negocio, para hacer pedidos por mayor de bobinas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(80) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `proceso` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_transaccion`, `monto`, `estado`, `fecha`, `email`, `nombre`, `apellido`, `direccion`, `ciudad`, `email_user`, `proceso`) VALUES
(1, '6MA120B3Y0228692K', '123.95', 'COMPLETED', '2022-11-27 22:21:18', 'sb-t6rhw15274664@personal.example.com', 'Gonzalo', 'Ferreira Herrera', 'Av. Busch', 'La Paz', 'gonzalofierra@gmail.com', '3'),
(2, '80AFJ0B3YSS028J729', '149.80', 'COMPLETED', '2022-11-28 00:26:28', 'sb-t6rhw15274664@personal.example.com', 'Gonzalo', 'Ferreira Herrera', 'Av. Busch', 'La Paz', 'gonzalofierra@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `estado`, `id_categoria`) VALUES
(1, 'BOLSAS CON CIERRE 10 x 15 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '4.65', 33, 'assets/images/productos/20221128185822.jpg', 1, 1),
(2, 'BOLSAS CON CIERRE 11 x 11 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '4.65', 22, 'assets/images/productos/20221128185822.jpg', 1, 1),
(3, 'BOLSAS CON CIERRE 12 x 18 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '6.65', 37, 'assets/images/productos/20221128185822.jpg', 1, 1),
(4, 'BOLSAS CON CIERRE 15 x 22 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '11.10', 38, 'assets/images/productos/20221128190229.jpg', 1, 1),
(5, 'BOLSAS CON CIERRE 20 x 30 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '17.60', 8, 'assets/images/productos/20221128190229.jpg', 1, 1),
(6, 'BOLSAS CON CIERRE 25 x 33 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '22.50', 40, 'assets/images/productos/20221128190229.jpg', 1, 1),
(7, 'BOLSAS CON CIERRE 30 x 40 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '34.20', 43, 'assets/images/productos/20221128190240.jpg', 1, 1),
(8, 'BOLSAS CON CIERRE 40 x 50 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '34.50', 31, 'assets/images/productos/20221128190240.jpg', 1, 1),
(9, 'BOLSAS CON CIERRE 6 x 8 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '2.30', 25, 'assets/images/productos/20221128185822.jpg', 1, 1),
(10, 'BOLSAS CON CIERRE 7 x 10 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '3.40', 33, 'assets/images/productos/20221128185822.jpg', 1, 1),
(11, 'BOLSAS CON CIERRE 8 x 12 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '4.10', 41, 'assets/images/productos/20221128185822.jpg', 1, 1),
(12, 'BOLSAS CON CIERRE 8 x 16 cm pack 100 u', 'Bolsas aptas para todo tipo de muestras sólidas. Estan echas en polietileno transparente de baja densidad. Altamente resistentes. Se pueden usar para almacenar y preservar muestras. Como tubos, escobillones, tornillos, pequeños componenetes electronicos, piezas de recambio, botones, pequeñas piezas, etc', '4.75', 16, 'assets/images/productos/20221128185822.jpg', 1, 1),
(13, 'BOLSA BASURA COLORES AMARILLO 85x105 G180 pack 10 u', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '5.90', 22, 'assets/images/productos/20221128190955.jpg', 1, 2),
(14, 'BOLSA BASURA COLORES AZUL 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.60', 22, 'assets/images/productos/20221128191435.jpg', 1, 2),
(15, 'BOLSA BASURA COLORES BLANCA 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.00', 12, 'assets/images/productos/20221128191445.jpg', 1, 2),
(16, 'BOLSA BASURA COLORES GRIS 85x105 cm. G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.60', 46, 'assets/images/productos/20221128191457.jpg', 1, 2),
(17, 'BOLSA BASURA COLORES LILA 85x105 G180 pack 10 u', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.60', 25, 'assets/images/productos/20221128191507.jpg', 1, 2),
(18, 'BOLSA BASURA COLORES MARRÓN OSCURO 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.50', 22, 'assets/images/productos/20221128191517.jpg', 1, 2),
(19, 'BOLSA BASURA COLORES NARANJA 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.50', 39, 'assets/images/productos/20221128191527.jpg', 1, 2),
(20, 'BOLSA BASURA COLORES ROJO 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.30', 2, 'assets/images/productos/20221128191537.jpg', 1, 2),
(21, 'BOLSA BASURA COLORES ROSA 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.30', 41, 'assets/images/productos/20221128191548.jpg', 1, 2),
(22, 'BOLSA BASURA COLORES VERDE 85x105 G180 pack 10 u ', 'BOLSAS DE BASURA DE COLORES PAK de 10 unidades (perfectas para carnavales)', '4.60', 14, 'assets/images/productos/20221128191602.jpg', 1, 2),
(23, 'BOLSA BASURA COLORES AMARILLO 60x90 cm. G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 31, 'assets/images/productos/20221128191618.jpg', 1, 2),
(24, 'BOLSA BASURA COLORES AZUL 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 18, 'assets/images/productos/20221128191630.jpg', 1, 2),
(25, 'BOLSA BASURA COLORES BLANCA 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 38, 'assets/images/productos/20221128191642.jpg', 1, 2),
(26, 'BOLSA BASURA COLORES LILA 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 30, 'assets/images/productos/20221128191657.jpg', 1, 2),
(27, 'BOLSA BASURA COLORES MARRÓN 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 6, 'assets/images/productos/20221128191706.jpg', 1, 2),
(28, 'BOLSA BASURA COLORES NARANJA 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 30, 'assets/images/productos/20221128191718.jpg', 1, 2),
(29, 'BOLSA BASURA COLORES NEGRA 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 2, 'assets/images/productos/20221128191731.jpg', 1, 2),
(30, 'BOLSA BASURA COLORES ROJO 60x90 cm. G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 50, 'assets/images/productos/20221128191743.jpg', 1, 2),
(31, 'BOLSA BASURA COLORES ROSA 60x90 cm. G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 25, 'assets/images/productos/20221128191753.jpg', 1, 2),
(32, 'BOLSA BASURA COLORES VERDE 60x90 G200 pack 25  u ', 'BOLSAS DE BASURA DE COLORES PAK de 25 unidades (perfectas para carnavales)', '10.20', 1, 'assets/images/productos/20221128191804.jpg', 1, 2),
(33, 'BOLSAS 10 x 20 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x50', '4.60', 12, 'assets/images/productos/20221128192318.jpg', 1, 3),
(34, 'BOLSAS 15 x 20 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x51', '5.30', 38, 'assets/images/productos/20221128192318.jpg', 1, 3),
(35, 'BOLSAS 15 x 30 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x52', '9.00', 18, 'assets/images/productos/20221128192318.jpg', 1, 3),
(36, 'BOLSAS 18 x 22 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x53', '7.85', 6, 'assets/images/productos/20221128192353.jpg', 1, 3),
(37, 'BOLSAS 20 x 30 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x54', '11.40', 27, 'assets/images/productos/20221128192353.jpg', 1, 3),
(38, 'BOLSAS 21 x 27 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x55', '7.10', 42, 'assets/images/productos/20221128192353.jpg', 1, 3),
(39, 'BOLSAS 25 x 30 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x56', '11.85', 4, 'assets/images/productos/20221128192353.jpg', 1, 3),
(40, 'BOLSAS 25 x 35 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x57', '13.00', 13, 'assets/images/productos/20221128192428.jpg', 1, 3),
(41, 'BOLSAS 27 x 32 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x58', '14.50', 41, 'assets/images/productos/20221128192428.jpg', 1, 3),
(42, 'BOLSAS 30 x 40 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x59', '19.75', 1, 'assets/images/productos/20221128192428.jpg', 1, 3),
(43, 'BOLSAS 30 x 50 cm 500u TRANSPARENTE TIPO MERCADO', 'Disponibles en 10x20, 15x20, 15x30, 18x22, 20x30, 21x27, 20x30, 25x35, 30x40, 30x50, 40x60', '17.10', 34, 'assets/images/productos/20221128192428.jpg', 1, 3),
(44, 'BANDEJA 15x25 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '8.85', 25, 'assets/images/productos/20221128192953.jpg', 1, 4),
(45, 'BANDEJA 17x27 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '9.85', 23, 'assets/images/productos/20221128192953.jpg', 1, 4),
(46, 'BANDEJA 17x37 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '13.95', 35, 'assets/images/productos/20221128192953.jpg', 1, 4),
(47, 'BANDEJA 20x30 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '13.05', 32, 'assets/images/productos/20221128192953.jpg', 1, 4),
(48, 'BANDEJA 27x37 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '16.70', 13, 'assets/images/productos/20221128192953.jpg', 1, 4),
(49, 'BANDEJA 30x40 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '17.65', 25, 'assets/images/productos/20221128192953.jpg', 1, 4),
(50, 'BANDEJA 32x42 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '20.60', 5, 'assets/images/productos/20221128192953.jpg', 1, 4),
(51, 'BANDEJA 35x45 cm METACRILATO BLANCA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '22.10', 43, 'assets/images/productos/20221128192953.jpg', 1, 4),
(52, 'BANDEJA 38.5x58.5 cm METACRILATO NEGRA  ', 'Perfectas para la exposición de alimentos en carnicerias, tocinerias, supermercados, etc.', '68.70', 25, 'assets/images/productos/20221128193113.jpg', 1, 4),
(53, 'BANDEJA PLANA ESPOSITORA 28x19x1 cm NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '4.20', 2, 'assets/images/productos/20221128193125.jpg', 1, 4),
(54, 'BANDEJA PLANA EXPOSITORA 20x15x1 NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '2.40', 39, 'assets/images/productos/20221128193125.jpg', 1, 4),
(55, 'BANDEJA PLANA EXPOSITORA 35x24x1 cm NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '6.15', 46, 'assets/images/productos/20221128193125.jpg', 1, 4),
(56, 'BANDEJA PLANA EXPOSITORA 42x30x1 cm NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '9.10', 46, 'assets/images/productos/20221128193125.jpg', 1, 4),
(57, 'BANDEJA PLANA EXPOSITORA 50x36x1 cm NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '12.95', 19, 'assets/images/productos/20221128193125.jpg', 1, 4),
(58, 'BANDEJA PLANA EXPOSITORA 58.5x41.5x3 NEGRA', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '20.15', 3, 'assets/images/productos/20221128193125.jpg', 1, 4),
(59, 'BANDEJA 12.5x32.5 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '14.40', 48, 'assets/images/productos/20221128193113.jpg', 1, 4),
(60, 'BANDEJA 17x27 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '11.75', 12, 'assets/images/productos/20221128193113.jpg', 1, 4),
(61, 'BANDEJA 17x31 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '30.00', 15, 'assets/images/productos/20221128193113.jpg', 1, 4),
(62, 'BANDEJA 20x30 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '15.65', 9, 'assets/images/productos/20221128193113.jpg', 1, 4),
(63, 'BANDEJA 22x32 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '15.90', 43, 'assets/images/productos/20221128193113.jpg', 1, 4),
(64, 'BANDEJA 25x35 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '18.05', 44, 'assets/images/productos/20221128193113.jpg', 1, 4),
(65, 'BANDEJA 30x40 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '21.60', 39, 'assets/images/productos/20221128193113.jpg', 1, 4),
(66, 'BANDEJA 35x45 cm METACRILATO NEGRA ', ' Bandeja plana. Hechas con materiales de alta calidad. Muy brillantes y de gran presencia. Una gama pensada para exponer cualquier tipología de alimentos y que se adapta a distintos tipos de alimentos dada la gran variedad de medidas y de acabados', '26.55', 29, 'assets/images/productos/20221128193113.jpg', 1, 4),
(67, 'TOLDO EXTRA 150 gr/m  2 4x5 m. VERDE con OJALES REFORZADOS', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '37.65', 24, 'assets/images/productos/20221128194156.jpg', 1, 5),
(68, 'TOLDO EXTRA 150 gr/m  2 4x6 m. VERDE con OJALES REFORZADOS -BIKAIN-', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '46.50', 45, 'assets/images/productos/20221128194156.jpg', 1, 5),
(69, 'TOLDO EXTRA 150 gr/m  2 5x6 m. VERDE con OJALES REFORZADOS', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '54.60', 13, 'assets/images/productos/20221128194156.jpg', 1, 5),
(70, 'TOLDO EXTRA 150 gr/m  2 5x8 m. VERDE con OJALES REFORZADOS -BIKAIN-', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '78.00', 48, 'assets/images/productos/20221128194156.jpg', 1, 5),
(71, 'TOLDO EXTRA 150 gr/m  2 6x10 m. VERDE con OJALES REFORZADOS -BIKAIN-', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '106.00', 16, 'assets/images/productos/20221128194156.jpg', 1, 5),
(72, 'TOLDO RAFIA 2x3 m. AZUL con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '28.25', 33, 'assets/images/productos/20221128194845.jpg', 1, 5),
(73, 'TOLDO RAFIA 2x3 m. BLANCO con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '27.50', 19, 'assets/images/productos/20221128195107.jpg', 1, 5),
(74, 'TOLDO RAFIA 2x3 m. BLANCO con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '40.20', 10, 'assets/images/productos/20221128195107.jpg', 1, 5),
(75, 'TOLDO RAFIA 2x3 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '27.70', 40, 'assets/images/productos/20221128194156.jpg', 1, 5),
(76, 'TOLDO RAFIA 2x3 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '26.95', 36, 'assets/images/productos/20221128194156.jpg', 1, 5),
(77, 'TOLDO RAFIA 2x3 m. VERDE con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '10.00', 43, 'assets/images/productos/20221128194156.jpg', 1, 5),
(78, 'TOLDO RAFIA 3x4 m. AZUL con OJALES 90 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '13.70', 23, 'assets/images/productos/20221128194845.jpg', 1, 5),
(79, 'TOLDO RAFIA 3x4 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '13.60', 19, 'assets/images/productos/20221128194156.jpg', 1, 5),
(80, 'TOLDO RAFIA 3x5 m. AZUL con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '20.00', 46, 'assets/images/productos/20221128194845.jpg', 1, 5),
(81, 'TOLDO RAFIA 3x5 m. BLANCO con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '19.05', 33, 'assets/images/productos/20221128195107.jpg', 1, 5),
(82, 'TOLDO RAFIA 3X5 m. BLANCO con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '24.90', 8, 'assets/images/productos/20221128195107.jpg', 1, 5),
(83, 'TOLDO RAFIA 3X5 m. BLANCO con OJALES 80 gr/m  2 -NORTENE-', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '13.90', 34, 'assets/images/productos/20221128195107.jpg', 1, 5),
(84, 'TOLDO RAFIA 3X5 m. VERDE con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '24.90', 29, 'assets/images/productos/20221128194156.jpg', 1, 5),
(85, 'TOLDO RAFIA 4x5 m. AZUL con OJALES 90 gr/m   ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '22.50', 36, 'assets/images/productos/20221128194845.jpg', 1, 5),
(86, 'TOLDO RAFIA 4x5 m. VERDE con OJALES 120 gr/m    ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '22.60', 47, 'assets/images/productos/20221128194156.jpg', 1, 5),
(87, 'TOLDO RAFIA 4x6 m. AZUL con OJALES 120 gr/m    ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '32.80', 38, 'assets/images/productos/20221128194845.jpg', 1, 5),
(88, 'TOLDO RAFIA 4x6 m. BLANCO con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '22.70', 13, 'assets/images/productos/20221128195107.jpg', 1, 5),
(89, 'TOLDO RAFIA 4x6 m. BLANCO con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '38.90', 19, 'assets/images/productos/20221128195107.jpg', 1, 5),
(90, 'TOLDO RAFIA 4x6 m. VERDE con OJALES 80 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '22.75', 17, 'assets/images/productos/20221128194156.jpg', 1, 5),
(91, 'TOLDO RAFIA 5x6 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '29.80', 40, 'assets/images/productos/20221128194156.jpg', 1, 5),
(92, 'TOLDO RAFIA 5x7 m. AZUL con OJALES 90 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '33.40', 35, 'assets/images/productos/20221128194845.jpg', 1, 5),
(93, 'TOLDO RAFIA 5x8 m. AZUL con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '57.90', 32, 'assets/images/productos/20221128194845.jpg', 1, 5),
(94, 'TOLDO RAFIA 5x8 m. BLANCO con OJALES 120 gr/m  2 INTERMAS', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '48.00', 1, 'assets/images/productos/20221128195107.jpg', 1, 5),
(95, 'TOLDO RAFIA 5x8 m. BLANCO con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '63.50', 12, 'assets/images/productos/20221128195107.jpg', 1, 5),
(96, 'TOLDO RAFIA 5x8 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '45.00', 48, 'assets/images/productos/20221128194156.jpg', 1, 5),
(97, 'TOLDO RAFIA 6x10 m. AZUL con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '81.50', 43, 'assets/images/productos/20221128194845.jpg', 1, 5),
(98, 'TOLDO RAFIA 6x10 m. BLANCO con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '81.50', 11, 'assets/images/productos/20221128195107.jpg', 1, 5),
(99, 'TOLDO RAFIA 6x10 m. BLANCO con OJALES 180 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '92.50', 39, 'assets/images/productos/20221128195107.jpg', 1, 5),
(100, 'TOLDO RAFIA 6x10 m. BLANCO con OJALES 80 gr/m  2 -NORTENE-', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '55.00', 24, 'assets/images/productos/20221128195107.jpg', 1, 5),
(101, 'TOLDO RAFIA 6x10 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '46.90', 34, 'assets/images/productos/20221128194156.jpg', 1, 5),
(102, 'TOLDO RAFIA 6x8 m. AZUL con OJALES 90 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '50.90', 42, 'assets/images/productos/20221128194845.jpg', 1, 5),
(103, 'TOLDO RAFIA 8x10 m. AZUL con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '94.90', 33, 'assets/images/productos/20221128194845.jpg', 1, 5),
(104, 'TOLDO RAFIA 8x12 m. VERDE con OJALES 120 gr/m  ', 'Perfecto para cubrir carpas, coches, camping, utilizar para sombrear, cubrir leña, proteger del polvo, usos industriales, etc', '75.00', 34, 'assets/images/productos/20221128194156.jpg', 1, 5),
(105, 'ECOVALLA 1200 1260 X 1021 mm AMARILLO', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '92.90', 41, 'assets/images/productos/20221128200331.jpg', 1, 6),
(106, 'ECOVALLA 1200 1260 X 1021 mm AZUL', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '92.90', 18, 'assets/images/productos/20221128201048.jpg', 1, 6),
(107, 'ECOVALLA 1200 1260 X 1021 mm BLANCO', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '92.90', 35, 'assets/images/productos/20221128201142.jpg', 1, 6),
(108, 'ECOVALLA 1200 1260 X 1021 mm NARANJA', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '92.90', 38, 'assets/images/productos/20221128201226.jpg', 1, 6),
(109, 'ECOVALLA 1200 1260 X 1021 mm VERDE', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '92.90', 47, 'assets/images/productos/20221128201305.jpg', 1, 6),
(110, 'ECOVALLA 2000 1980 x 1021 mm AMARILLO', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 3, 'assets/images/productos/20221128200331.jpg', 1, 6),
(111, 'ECOVALLA 2000 1980 x 1021 mm AZUL', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 3, 'assets/images/productos/20221128201048.jpg', 1, 6),
(112, 'ECOVALLA 2000 1980 x 1021 mm BLANCO', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 39, 'assets/images/productos/20221128201142.jpg', 1, 6),
(113, 'ECOVALLA 2000 1980 x 1021 mm NARANJA', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 26, 'assets/images/productos/20221128201226.jpg', 1, 6),
(114, 'ECOVALLA 2000 1980 x 1021 mm ROJO', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 12, 'assets/images/productos/20221128201343.jpg', 1, 6),
(115, 'ECOVALLA 2000 1980 x 1021 mm VERDE', 'No se deforman, no se oxida, reciclable 100%, higiéncia, amplia gama de colores, flexible, silenciosa, no raya el suelo, posibilidad de insertar un logo publicitario, resistente a los rayos UV.', '108.75', 10, 'assets/images/productos/20221128201305.jpg', 1, 6),
(116, 'ALFOMBRA CAUCHO de PICOS 1 m (ANCHO) 15mm (grosor)', 'Super resistente y de altíssima calidad, Empotrable a fosos', '89.10', 38, 'assets/images/productos/20221128201652.jpg', 1, 7),
(117, 'ALFOMBRA CAUCHO de PICOS 1.20 m (ANCHO) 15mm (grosor)', 'Super resistente y de altíssima calidad, Empotrable a fosos', '132.45', 27, 'assets/images/productos/20221128201652.jpg', 1, 7),
(118, 'ALFOMBRA CAUCHO de PICOS 1.60 m (ANCHO) 15mm (grosor)', 'Super resistente y de altíssima calidad, Empotrable a fosos', '208.60', 2, 'assets/images/productos/20221128201652.jpg', 1, 7),
(119, 'ALFOMBRA TRANSITO MARRÓN 14mm. 1.20mt (anchura)', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '74.00', 35, 'assets/images/productos/20221128202004.jpg', 1, 7),
(120, 'ALFOMBRA TRANSITO NEGRA 14mm. 1.20mt (anchura)', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '92.00', 19, 'assets/images/productos/20221128202106.jpg', 1, 7),
(121, 'ALFOMBRA TRANSITO NEGRA GRUESO 14mm. ANCHO 1.20m. -VILEDA-', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '192.00', 6, 'assets/images/productos/20221128202106.jpg', 1, 7),
(122, 'ALFOMBRA TRANSITO NEGRO GRUESO 10mm. ANCHO 1.20 m. CON BASE', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '63.50', 4, 'assets/images/productos/20221128202106.jpg', 1, 7),
(123, 'ALFOMBRA TRANSITO PLUS GRUESO 11 mm. ANCHO 1.20 m. 2 GRISES -VILEDA-', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '121.50', 2, 'assets/images/productos/20221128202106.jpg', 1, 7),
(124, 'ALFOMBRA TRANSITO STANDARD GRIS GRUESO 12 mm. ANCHO 1.20 m. -VILEDA-', 'Felpudo limpiabarros, muy resistente a la humedad, al exterior, al transito de personas, etc. Antihongos, se limpia facilmente', '108.00', 39, 'assets/images/productos/20221128202106.jpg', 1, 7),
(125, 'PLANCHA DE GOMA LISA SBR NEGRA 4 mm. 1.40 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '26.00', 44, 'assets/images/productos/20221128202613.jpg', 1, 8),
(126, 'PLANCHA DE GOMA LISA NEGRA 2 mm. 1.40 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '14.70', 41, 'assets/images/productos/20221128202613.jpg', 1, 8),
(127, 'PLANCHA DE GOMA LISA NEGRA 3 mm. 1 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '17.50', 34, 'assets/images/productos/20221128202613.jpg', 1, 8),
(128, 'PLANCHA DE GOMA LISA NEGRA 3 mm. 1.20 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '20.00', 2, 'assets/images/productos/20221128202613.jpg', 1, 8),
(129, 'PLANCHA DE GOMA LISA NEGRA 3 mm. 1.40 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '23.20', 33, 'assets/images/productos/20221128202613.jpg', 1, 8),
(130, 'PLANCHA DE GOMA LISA NEGRA 4 mm. 1 m ANCHO', 'Plancha o pavimento de goma liso de color negro , Super resistente de alta duración y resistencia', '25.00', 39, 'assets/images/productos/20221128202613.jpg', 1, 8),
(131, 'PAVIMENTO RAYADO de CAUCHO 1 mt (anchura) 3mm AMERICANA', 'Interior reforzado con arpillera, Super resistente de alta duración y resistencia', '17.80', 42, 'assets/images/productos/20221128202421.jpg', 1, 9),
(132, 'PAVIMENTO RAYADO de CAUCHO 1.20 mt (anchura) 3mm AMERICANA', 'Interior reforzado con arpillera, Super resistente de alta duración y resistencia', '21.35', 16, 'assets/images/productos/20221128202421.jpg', 1, 9),
(133, 'PAVIMENTO RAYADO de CAUCHO 1.20 mt (anchura) 3mm AMERICANA SIN ARP.', 'Interior reforzado con arpillera, Super resistente de alta duración y resistencia', '18.50', 25, 'assets/images/productos/20221128202421.jpg', 1, 9),
(134, 'PAVIMENTO RAYADO de CAUCHO 1.40 mt (anchura) 3mm AMERICANA', 'Interior reforzado con arpillera, Super resistente de alta duración y resistencia', '23.60', 13, 'assets/images/productos/20221128202421.jpg', 1, 9),
(135, 'PAVIMENTO RAYADO de CAUCHO 1.50 mt (anchura) 3mm AMERICANA', 'Interior reforzado con arpillera, Super resistente de alta duración y resistencia', '33.75', 36, 'assets/images/productos/20221128202421.jpg', 1, 9),
(136, 'COPA CONICA GRADUADA 250 cc. DELTA', 'Echas en polietileno autoclavable a 121 Celsius', '8.80', 27, 'assets/images/productos/20221128203031.jpg', 1, 10),
(137, 'COPA CONICA GRADUADA 500 cc. DELTA', 'Echas en polietileno autoclavable a 121 Celsius', '11.80', 48, 'assets/images/productos/20221128203031.jpg', 1, 10),
(138, 'COPA CONICA GRADUADA 1000 cc. DELTA', 'Echas en polietileno autoclavable a 121 Celsius', '22.20', 3, 'assets/images/productos/20221128203031.jpg', 1, 10),
(139, 'EMBUDO CON FILTRO de 30 cm BLANCO -SSS-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '10.60', 32, 'assets/images/productos/20221128203358.jpg', 1, 11),
(140, 'EMBUDO CON FILTRO de 35 cm FERVIK BLANCO', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '20.00', 36, 'assets/images/productos/20221128203358.jpg', 1, 11),
(141, 'EMBUDO de 24 cm ALIMENTARIO -SSS-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '3.30', 41, 'assets/images/productos/20221128204009.jpg', 1, 11),
(142, 'EMBUDO de 26 cm ALIMENTARIO -SSS-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '3.85', 26, 'assets/images/productos/20221128204009.jpg', 1, 11),
(143, 'EMBUDO de 35 cm BLANCO -SSS-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '7.55', 19, 'assets/images/productos/20221128204009.jpg', 1, 11),
(144, 'EMBUDO 16 cm. CON ASA Y FILTRO -PRESSOL-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '7.00', 32, 'assets/images/productos/20221128203358.jpg', 1, 11),
(145, 'EMBUDO 16 cm. CON FILTRO Y CANULA EPF', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '9.20', 3, 'assets/images/productos/20221128203358.jpg', 1, 11),
(146, 'EMBUDO 25 cm. CON FILTRO -PRESSOL-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '11.05', 36, 'assets/images/productos/20221128203358.jpg', 1, 11),
(147, 'EMBUDO PLASTICO RECTANGULAR con filtro 28x19 cm. 4 l. -PRESSOL-', 'Incorporan filtro interior, Muy resistentes, de alta calidad', '24.45', 27, 'assets/images/productos/20221128204129.jpg', 1, 11),
(148, 'EMBUDO de 11 cm FERVIK BLANCO ALIMENTARIO', 'Embudos de alta calidad FERVIK aptos para manipulacón alimetaria', '1.65', 35, 'assets/images/productos/20221128204151.jpg', 1, 11),
(149, 'EMBUDO de 13 cm FERVIK BLANCO ALIMENTARIO', 'Embudos de alta calidad FERVIK aptos para manipulacón alimetaria', '1.85', 28, 'assets/images/productos/20221128204151.jpg', 1, 11),
(150, 'EMBUDO de 17 cm FERVIK BLANCO ALIMENTARIO', 'Embudos de alta calidad FERVIK aptos para manipulacón alimetaria', '2.55', 28, 'assets/images/productos/20221128204151.jpg', 1, 11),
(151, 'EMBUDO de 19 cm FERVIK BLANCO ALIMENTARIO', 'Embudos de alta calidad FERVIK aptos para manipulacón alimetaria', '3.15', 3, 'assets/images/productos/20221128204151.jpg', 1, 11),
(152, 'EMBUDO de 9 cm FERVIK BLANCO ALIMENTARIO', 'Embudos de alta calidad FERVIK aptos para manipulacón alimetaria', '0.90', 26, 'assets/images/productos/20221128204151.jpg', 1, 11),
(153, 'JARRA GRADUADA con ASA de 3 litros CON TAPA PRESSOL', 'Material: HDPE (Pollietileno de alta densidad), Material de la tapa: Polipropileno, Temperaturas adecuadas (Celsius): -10/+110', '19.40', 15, 'assets/images/productos/20221128205811.jpg', 1, 12),
(154, 'JARRA GRADUADA con ASA de 0.5 litro CON TAPA PRESSOL', 'Material: HDPE (Pollietileno de alta densidad), Material de la tapa: Polipropileno, Temperaturas adecuadas (Celsius): -10/+111', '11.50', 6, 'assets/images/productos/20221128205811.jpg', 1, 12),
(155, 'JARRA GRADUADA con ASA de 1 litro CON TAPA PRESSOL', 'Material: HDPE (Pollietileno de alta densidad), Material de la tapa: Polipropileno, Temperaturas adecuadas (Celsius): -10/+112', '13.00', 38, 'assets/images/productos/20221128205811.jpg', 1, 12),
(156, 'JARRA GRADUADA con ASA de 2 litros CON TAPA PRESSOL', 'Material: HDPE (Pollietileno de alta densidad), Material de la tapa: Polipropileno, Temperaturas adecuadas (Celsius): -10/+113', '15.00', 37, 'assets/images/productos/20221128205811.jpg', 1, 12),
(157, 'JARRA GRADUADA con ASA de 5 litros CON TAPA PRESSOL', 'Material: HDPE (Pollietileno de alta densidad), Material de la tapa: Polipropileno, Temperaturas adecuadas (Celsius): -10/+114', '27.95', 30, 'assets/images/productos/20221128205811.jpg', 1, 12),
(158, 'JARRA GRADUADA PRO Alimentaria ASA de 5 litros DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '15.90', 10, 'assets/images/productos/20221128210714.jpg', 1, 12),
(159, 'JARRA GRADUADA ASA de 0.5 litros DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '5.40', 29, 'assets/images/productos/20221128210714.jpg', 1, 12),
(160, 'JARRA GRADUADA ASA de 0.5 litros TRANSP. -SSS-', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '2.90', 44, 'assets/images/productos/20221128210714.jpg', 1, 12),
(161, 'JARRA GRADUADA ASA de 1 litro DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '6.30', 48, 'assets/images/productos/20221128210714.jpg', 1, 12),
(162, 'JARRA GRADUADA ASA de 1 litros TRANSP. -SSS-', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '3.90', 39, 'assets/images/productos/20221128210714.jpg', 1, 12),
(163, 'JARRA GRADUADA ASA de 2 litros DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '9.40', 31, 'assets/images/productos/20221128210714.jpg', 1, 12),
(164, 'JARRA GRADUADA ASA de 2 litros TRANSP. -SSS-', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '4.70', 21, 'assets/images/productos/20221128210714.jpg', 1, 12),
(165, 'JARRA GRADUADA ASA de 3 litros DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '14.00', 2, 'assets/images/productos/20221128210714.jpg', 1, 12),
(166, 'JARRA GRADUADA ASA de 3 litros TRANSP. -SSS-', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '4.90', 37, 'assets/images/productos/20221128210714.jpg', 1, 12),
(167, 'JARRA GRADUADA ASA de 5 litros DELTA', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '20.90', 26, 'assets/images/productos/20221128210714.jpg', 1, 12),
(168, 'JARRA GRADUADA ASA de 5 litros TRANSP. -SSS-', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '7.50', 41, 'assets/images/productos/20221128210714.jpg', 1, 12),
(169, 'VASO DE PRECIPITADO GRADUADO EN COLOR AZUL 100 ml.', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '3.25', 32, 'assets/images/productos/20221128212035.jpg', 1, 13),
(170, 'VASO DE PRECIPITADO GRADUADO PP 100 ml.', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '3.00', 37, 'assets/images/productos/20221128212043.jpg', 1, 13),
(171, 'VASO DE PRECIPITADO GRADUADO PP 50 ml.', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '2.35', 27, 'assets/images/productos/20221128212043.jpg', 1, 13),
(172, 'VASO DE PRECIPITADO vidrio GRADUADO DE 600 ml.', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '5.90', 8, 'assets/images/productos/20221128212052.jpg', 1, 13),
(173, 'VERTEDOR FLEXIBLE 160 mm. PARA JARRA DE 0.5L y 2L PRESSOL', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '3.05', 26, 'assets/images/productos/20221128212153.jpg', 1, 14),
(174, 'VERTEDOR FLEXIBLE 330 mm. PARA JARRA DE 3L 5L PRESSOL', 'Perfectos para inústria, sanidad, hospitales, indústria química, alimentación, etc', '2.65', 30, 'assets/images/productos/20221128212153.jpg', 1, 14),
(175, 'PROBETA 100 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '6.50', 45, 'assets/images/productos/20221128212700.jpg', 1, 15),
(176, 'PROBETA 1000 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '18.10', 22, 'assets/images/productos/20221128212700.jpg', 1, 15),
(177, 'PROBETA 2000 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '40.40', 4, 'assets/images/productos/20221128212700.jpg', 1, 15),
(178, 'PROBETA 25 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '5.30', 32, 'assets/images/productos/20221128212700.jpg', 1, 15),
(179, 'PROBETA 250 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '8.40', 2, 'assets/images/productos/20221128212700.jpg', 1, 15),
(180, 'PROBETA 50 ml. GRADUADA HEXAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '3.90', 36, 'assets/images/productos/20221128212641.jpg', 1, 15),
(181, 'PROBETA 50 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '5.70', 13, 'assets/images/productos/20221128212700.jpg', 1, 15),
(182, 'PROBETA 500 ml. GRADUADA PENTAGONAL DELTA', 'Material: polipropileno. Autoclavable a 121 Celsius, Conforme a la norma ISO 6706 y BS 5404, Disponible en 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml., De plástico, perfectas para laboratorios, talleres, mesuras de líquidos y semiliquidos.', '11.40', 32, 'assets/images/productos/20221128212700.jpg', 1, 15),
(183, 'CONTENEDOR 120 l. con PEDAL T/AMARILLA TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '72.95', 32, 'assets/images/productos/20221128213718.jpg', 1, 16),
(184, 'CONTENEDOR 120 l. con PEDAL T/AZUL TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '72.95', 7, 'assets/images/productos/20221128213718.jpg', 1, 16),
(185, 'CONTENEDOR 120 l. con PEDAL T/GRIS TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '72.95', 37, 'assets/images/productos/20221128213718.jpg', 1, 16),
(186, 'CONTENEDOR 120 l. con PEDAL T/ROJA TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '72.95', 25, 'assets/images/productos/20221128213718.jpg', 1, 16),
(187, 'CONTENEDOR 120 l. con PEDAL T/VERDE TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '72.95', 36, 'assets/images/productos/20221128213718.jpg', 1, 16),
(188, 'CONTENEDOR JARDIN 120 l. con PEDAL NEGRO T/NEGRA TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '65.95', 30, 'assets/images/productos/20221128213718.jpg', 1, 16),
(189, 'CONTENEDOR RESIDUOS 120 l. sin PEDAL T/amarillo TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '67.95', 45, 'assets/images/productos/20221128213733.jpg', 1, 16),
(190, 'CONTENEDOR RESIDUOS 120 l. sin PEDAL T/azul TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '67.95', 38, 'assets/images/productos/20221128213733.jpg', 1, 16),
(191, 'CONTENEDOR RESIDUOS 120 l. sin PEDAL T/gris TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '67.95', 37, 'assets/images/productos/20221128213733.jpg', 1, 16),
(192, 'CONTENEDOR RESIDUOS 120 l. sin PEDAL T/negra TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '61.40', 46, 'assets/images/productos/20221128213733.jpg', 1, 16),
(193, 'CONTENEDOR RESIDUOS 120 l. sin PEDAL T/verde TAYG', 'Perfecto para hogar, lugaras con manipulación de alimentos, controles de sanidad, hosteleria, industria alimentaria, etc', '67.95', 19, 'assets/images/productos/20221128213733.jpg', 1, 16),
(194, 'CONTENEDOR 50 litros PEDAL y TAPA AMARILLO RECICLAJE -ARAVEN-', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '50.95', 3, 'assets/images/productos/20221128213718.jpg', 1, 16),
(195, 'CONTENEDOR 50 litros PEDAL y TAPA AZUL RECICLAJE -ARAVEN-', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '50.95', 45, 'assets/images/productos/20221128213718.jpg', 1, 16),
(196, 'CONTENEDOR 50 litros PEDAL y TAPA VERDE RECICLAJE -ARAVEN-', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '50.95', 5, 'assets/images/productos/20221128213718.jpg', 1, 16);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `estado`, `id_categoria`) VALUES
(197, 'CONTENEDOR 60 litros PEDAL y TAPA AMARILLO RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '61.25', 23, 'assets/images/productos/20221128213718.jpg', 1, 16),
(198, 'CONTENEDOR 60 litros PEDAL y TAPA AZUL RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '55.50', 11, 'assets/images/productos/20221128213718.jpg', 1, 16),
(199, 'CONTENEDOR 60 litros PEDAL y TAPA MARRON RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '55.50', 16, 'assets/images/productos/20221128213718.jpg', 1, 16),
(200, 'CONTENEDOR 60 litros PEDAL y TAPA NEGRA RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '61.20', 0, 'assets/images/productos/20221128213718.jpg', 1, 16),
(201, 'CONTENEDOR 60 litros PEDAL y TAPA ROJA RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '61.20', 41, 'assets/images/productos/20221128213718.jpg', 1, 16),
(202, 'CONTENEDOR 60 litros PEDAL y TAPA VERDE RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '55.50', 37, 'assets/images/productos/20221128213718.jpg', 1, 16),
(203, 'CONTENEDOR 80 l. PEDAL. RUEDAS Y TAPA AMARILLO RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '69.50', 17, 'assets/images/productos/20221128213718.jpg', 1, 16),
(204, 'CONTENEDOR 80 l. PEDAL. RUEDAS Y TAPA AZUL RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '69.50', 35, 'assets/images/productos/20221128213718.jpg', 1, 16),
(205, 'CONTENEDOR 80 l. PEDAL. RUEDAS Y TAPA marron RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '69.50', 36, 'assets/images/productos/20221128213718.jpg', 1, 16),
(206, 'CONTENEDOR 80 l. PEDAL. RUEDAS Y TAPA ROJA RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '69.50', 40, 'assets/images/productos/20221128213718.jpg', 1, 16),
(207, 'CONTENEDOR 80 l. PEDAL. RUEDAS Y TAPA VERDE RECICLAJE SELECTIVO DENOX', 'De alta resitencia, perfecto para restaurantes, bares, discotecas y indústrias alimentarias.', '69.50', 29, 'assets/images/productos/20221128213718.jpg', 1, 16),
(208, 'BASURERO TAPA Y RUEDAS 120 l. AMARILLO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 47, 'assets/images/productos/20221128214722.jpg', 1, 16),
(209, 'BASURERO TAPA Y RUEDAS 120 l. AZUL', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 37, 'assets/images/productos/20221128214722.jpg', 1, 16),
(210, 'BASURERO TAPA Y RUEDAS 120 l. BLANCO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 19, 'assets/images/productos/20221128214722.jpg', 1, 16),
(211, 'BASURERO TAPA Y RUEDAS 120 l. GRIS', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 1, 'assets/images/productos/20221128214722.jpg', 1, 16),
(212, 'BASURERO TAPA Y RUEDAS 120 l. MARRÓN', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 36, 'assets/images/productos/20221128214722.jpg', 1, 16),
(213, 'BASURERO TAPA Y RUEDAS 120 l. ROJO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 17, 'assets/images/productos/20221128214722.jpg', 1, 16),
(214, 'BASURERO TAPA Y RUEDAS 120 l. VERDE', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '86.90', 9, 'assets/images/productos/20221128214722.jpg', 1, 16),
(215, 'BASURERO TAPA Y RUEDAS 120 l. VERDE con TAPA ESP. VIDRIO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm', '114.00', 38, 'assets/images/productos/20221128214722.jpg', 1, 16),
(216, 'BASURERO TAPA Y RUEDAS 240 l. AMARILLO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 13, 'assets/images/productos/20221128214722.jpg', 1, 16),
(217, 'BASURERO TAPA Y RUEDAS 240 l. AZUL', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 47, 'assets/images/productos/20221128214722.jpg', 1, 16),
(218, 'BASURERO TAPA Y RUEDAS 240 l. GRIS', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 15, 'assets/images/productos/20221128214722.jpg', 1, 16),
(219, 'BASURERO TAPA Y RUEDAS 240 l. MARRÓN', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 8, 'assets/images/productos/20221128214722.jpg', 1, 16),
(220, 'BASURERO TAPA Y RUEDAS 240 l. ROJO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 25, 'assets/images/productos/20221128214722.jpg', 1, 16),
(221, 'BASURERO TAPA Y RUEDAS 240 l. VERDE', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '124.30', 21, 'assets/images/productos/20221128214722.jpg', 1, 16),
(222, 'BASURERO TAPA Y RUEDAS 360 l. AMARILLO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '186.90', 42, 'assets/images/productos/20221128214722.jpg', 1, 16),
(223, 'BASURERO TAPA Y RUEDAS 360 l. GRIS', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '186.90', 30, 'assets/images/productos/20221128214722.jpg', 1, 16),
(224, 'BASURERO TAPA Y RUEDAS 360 l. MARRÓN', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '186.90', 46, 'assets/images/productos/20221128214722.jpg', 1, 16),
(225, 'BASURERO TAPA Y RUEDAS 360 l. ROJO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '186.90', 7, 'assets/images/productos/20221128214722.jpg', 1, 16),
(226, 'BASURERO TAPA Y RUEDAS 360 l. VERDE', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 920 mm ,Ideal para ayuntamientos, particulares y empresas', '186.90', 14, 'assets/images/productos/20221128214722.jpg', 1, 16),
(227, 'BASURERO TAPA Y RUEDAS 60 l GRIS', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 670 mm, Referencia KA 60', '86.10', 31, 'assets/images/productos/20221128214722.jpg', 1, 16),
(228, 'BASURERO TAPA Y RUEDAS 60 l. BLANCO', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 670 mm, Referencia KA 61', '86.10', 42, 'assets/images/productos/20221128214722.jpg', 1, 16),
(229, 'BASURERO TAPA Y RUEDAS 60 l. MARRÓN', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 670 mm, Referencia KA 62', '86.10', 7, 'assets/images/productos/20221128214722.jpg', 1, 16),
(230, 'BASURERO TAPA Y RUEDAS 60 l. VERDE', 'Dimensiones exteriores Largo 545 mm Ancho 475 mm Alto 670 mm, Referencia KA 63', '86.10', 13, 'assets/images/productos/20221128214722.jpg', 1, 16),
(231, 'BASURERO TAPA Y RUEDAS 80 l. AMARILLO', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 80', '86.50', 40, 'assets/images/productos/20221128214722.jpg', 1, 16),
(232, 'BASURERO TAPA Y RUEDAS 80 l. AZUL', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 81', '86.50', 19, 'assets/images/productos/20221128214722.jpg', 1, 16),
(233, 'BASURERO TAPA Y RUEDAS 80 l. GRIS', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 82', '86.50', 24, 'assets/images/productos/20221128214722.jpg', 1, 16),
(234, 'BASURERO TAPA Y RUEDAS 80 l. MARRÓN', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 83', '86.50', 47, 'assets/images/productos/20221128214722.jpg', 1, 16),
(235, 'BASURERO TAPA Y RUEDAS 80 l. ROJO', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 84', '86.50', 5, 'assets/images/productos/20221128214722.jpg', 1, 16),
(236, 'BASURERO TAPA Y RUEDAS 80 l. VERDE', 'Dimensiones exteriores Largo 515 mm Ancho 450 mm Alto 935 mm, Referencia KA 85', '86.50', 22, 'assets/images/productos/20221128214722.jpg', 1, 16),
(237, 'LOSETA ANTIDESLIZANTE 50x50 cm AZUL', 'Evita la creación de hongos y bacterias, no transmite enfermedades, es esterilizable, no coge olores ni sabores,se lava fácilemnte y evita la humedad.', '12.10', 7, 'assets/images/productos/20221128220013.jpg', 1, 17),
(238, 'LOSETA ANTIDESLIZANTE 50x50 cm BLANCA', 'Evita la creación de hongos y bacterias, no transmite enfermedades, es esterilizable, no coge olores ni sabores,se lava fácilemnte y evita la humedad.', '12.10', 2, 'assets/images/productos/20221128220023.jpg', 1, 17),
(239, 'LOSETA ANTIDESLIZANTE 50x50 cm GRIS', 'Evita la creación de hongos y bacterias, no transmite enfermedades, es esterilizable, no coge olores ni sabores,se lava fácilemnte y evita la humedad.', '12.10', 14, 'assets/images/productos/20221128220031.jpg', 1, 17),
(240, 'LOSETA ANTIDESLIZANTE 50x50 cm MARRÓN', 'Evita la creación de hongos y bacterias, no transmite enfermedades, es esterilizable, no coge olores ni sabores,se lava fácilemnte y evita la humedad.', '12.10', 45, 'assets/images/productos/20221128220039.jpg', 1, 17),
(241, 'LOSETA ANTIDESLIZANTE 50x50 cm VERDE', 'Evita la creación de hongos y bacterias, no transmite enfermedades, es esterilizable, no coge olores ni sabores,se lava fácilemnte y evita la humedad.', '12.10', 50, 'assets/images/productos/20221128220047.jpg', 1, 17),
(242, 'LOSETA ANTIDESLIZANTE 50x50x5cm BLANCA', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '18.50', 18, 'assets/images/productos/20221128220023.jpg', 1, 17),
(243, 'LOSETA ANTIDESLIZANTE 50x50x5cm GRIS', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '18.50', 11, 'assets/images/productos/20221128220031.jpg', 1, 17),
(244, 'LOSETA ANTIDESLIZANTE 50x50x5cm MARRÓN', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '18.50', 28, 'assets/images/productos/20221128220039.jpg', 1, 17),
(245, 'LOSETA ANTIDESLIZANTE 100X50X5cm BLANCA', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '38.30', 16, 'assets/images/productos/20221128220023.jpg', 1, 17),
(246, 'LOSETA ANTIDESLIZANTE 100X50X5cm GRIS', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '38.30', 32, 'assets/images/productos/20221128220031.jpg', 1, 17),
(247, 'LOSETA ANTIDESLIZANTE 100X50X5cm MARRÓN', 'Perfecta para las industrias alimentarias, químicas, recintos deportivos, vestuarios, laboratorios, camaras frigorificas, etc', '38.30', 48, 'assets/images/productos/20221128220039.jpg', 1, 17),
(248, 'LOSETA 40 x 40 cm PLASTIPOL ANTRACITA', 'Con superficie grabada para evitar deslizamientos. Modulacion adaptable a cualquier medida. Disponibles también rampas de acero inoxidable (ref. RSP-800, y RSP-1200)', '6.30', 31, 'assets/images/productos/20221128220202.jpg', 1, 17),
(249, 'LOSETA 40 x 40 cm PLASTIPOL AZUL', 'Con superficie grabada para evitar deslizamientos. Modulacion adaptable a cualquier medida. Disponibles también rampas de acero inoxidable (ref. RSP-800, y RSP-1200)', '5.70', 49, 'assets/images/productos/20221128220013.jpg', 1, 17),
(250, 'LOSETA 40 x 40 cm PLASTIPOL MARRON', 'Con superficie grabada para evitar deslizamientos. Modulacion adaptable a cualquier medida. Disponibles también rampas de acero inoxidable (ref. RSP-800, y RSP-1200)', '5.70', 30, 'assets/images/productos/20221128220039.jpg', 1, 17),
(251, 'LOSETA 40 x 40 cm PLASTIPOL VERDE', 'Con superficie grabada para evitar deslizamientos. Modulacion adaptable a cualquier medida. Disponibles también rampas de acero inoxidable (ref. RSP-800, y RSP-1200)', '5.10', 42, 'assets/images/productos/20221128220047.jpg', 1, 17),
(252, 'TUBO SILICONA 1 x 1.5 mm.', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '1.10', 34, 'assets/images/productos/20221128221109.jpg', 1, 18),
(253, 'TUBO SILICONA 2 x 4 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '1.25', 23, 'assets/images/productos/20221128221109.jpg', 1, 18),
(254, 'TUBO SILICONA 3 x 5 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '1.60', 23, 'assets/images/productos/20221128221109.jpg', 1, 18),
(255, 'TUBO SILICONA 4 x 6 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '1.95', 15, 'assets/images/productos/20221128221109.jpg', 1, 18),
(256, 'TUBO SILICONA 4 x 8 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '3.30', 17, 'assets/images/productos/20221128221109.jpg', 1, 18),
(257, 'TUBO SILICONA 5 x 9 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '4.90', 30, 'assets/images/productos/20221128221109.jpg', 1, 18),
(258, 'TUBO SILICONA 6 x 10 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '5.65', 31, 'assets/images/productos/20221128221109.jpg', 1, 18),
(259, 'TUBO SILICONA 6 x 12 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '10.00', 21, 'assets/images/productos/20221128221109.jpg', 1, 18),
(260, 'TUBO SILICONA 6 x 9 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '3.80', 5, 'assets/images/productos/20221128221109.jpg', 1, 18),
(261, 'TUBO SILICONA 7 x 10 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '4.70', 5, 'assets/images/productos/20221128221109.jpg', 1, 18),
(262, 'TUBO SILICONA 8 x 10 mm', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '3.35', 40, 'assets/images/productos/20221128221109.jpg', 1, 18),
(263, 'TUBO SILICONA 8 x 12', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '8.00', 40, 'assets/images/productos/20221128221109.jpg', 1, 18),
(264, 'TUBO SILICONA 9 X 12', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '5.90', 41, 'assets/images/productos/20221128221109.jpg', 1, 18),
(265, 'TUBO SILICONA 10 x 14 mm.', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '9.60', 40, 'assets/images/productos/20221128221109.jpg', 1, 18),
(266, 'TUBO SILICONA 14 x 20', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '18.80', 18, 'assets/images/productos/20221128221109.jpg', 1, 18),
(267, 'TUBO SILICONA 16 x 22', 'ESCUBIDU SCOOKBY DOO o Macarrón 1 mm DE COLORES ROLLOS DE 300 MT', '20.00', 43, 'assets/images/productos/20221128221109.jpg', 1, 18),
(268, 'TUBO ESCUBIDU / MACARRON color AMARILLO de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 50, 'assets/images/productos/20221128221733.jpg', 1, 18),
(269, 'TUBO ESCUBIDU / MACARRON color AZUL de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 48, 'assets/images/productos/20221128221742.jpg', 1, 18),
(270, 'TUBO ESCUBIDU / MACARRON color BLANCO de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 16, 'assets/images/productos/20221128221753.jpg', 1, 18),
(271, 'TUBO ESCUBIDU / MACARRON color LILA de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 45, 'assets/images/productos/20221128221804.jpg', 1, 18),
(272, 'TUBO ESCUBIDU / MACARRON color NEGRO de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 22, 'assets/images/productos/20221128221826.jpg', 1, 18),
(273, 'TUBO ESCUBIDU / MACARRON color VERDE de 1 mm Rollo 300 metros', 'Silicona de grado médico. Para numerosas apilcaciones en laboratorios, medicina, farmacia  e industria.', '28.95', 47, 'assets/images/productos/20221128221913.jpg', 1, 18),
(274, 'TUBO GARDENFLEX de  35 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '7.40', 2, 'assets/images/productos/20221128222004.jpg', 1, 18),
(275, 'TUBO LIQUIFLEX de  100 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '24.40', 13, 'assets/images/productos/20221128222019.jpg', 1, 18),
(276, 'TUBO LIQUIFLEX de  15 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '3.10', 1, 'assets/images/productos/20221128222019.jpg', 1, 18),
(277, 'TUBO LIQUIFLEX de  19-20 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '2.70', 17, 'assets/images/productos/20221128222019.jpg', 1, 18),
(278, 'TUBO LIQUIFLEX de  25 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '6.00', 48, 'assets/images/productos/20221128222019.jpg', 1, 18),
(279, 'TUBO LIQUIFLEX de  30 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '6.40', 49, 'assets/images/productos/20221128222019.jpg', 1, 18),
(280, 'TUBO LIQUIFLEX de  32 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '5.70', 45, 'assets/images/productos/20221128222019.jpg', 1, 18),
(281, 'TUBO LIQUIFLEX de  35 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '8.00', 33, 'assets/images/productos/20221128222019.jpg', 1, 18),
(282, 'TUBO LIQUIFLEX de  40 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '6.30', 11, 'assets/images/productos/20221128222019.jpg', 1, 18),
(283, 'TUBO LIQUIFLEX de  45 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '6.10', 39, 'assets/images/productos/20221128222019.jpg', 1, 18),
(284, 'TUBO LIQUIFLEX de  50 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '8.85', 25, 'assets/images/productos/20221128222019.jpg', 1, 18),
(285, 'TUBO LIQUIFLEX de  60 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '8.95', 5, 'assets/images/productos/20221128222019.jpg', 1, 18),
(286, 'TUBO LIQUIFLEX de  70 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '10.90', 13, 'assets/images/productos/20221128222019.jpg', 1, 18),
(287, 'TUBO LIQUIFLEX de  75 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '31.90', 3, 'assets/images/productos/20221128222019.jpg', 1, 18),
(288, 'TUBO LIQUIFLEX de  80 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '21.25', 9, 'assets/images/productos/20221128222019.jpg', 1, 18),
(289, 'TUBO LIQUIFLEX de  90 mm por METROS', 'Tubería fabricada en PVC flexible con aspiral rígido indeformable', '27.50', 38, 'assets/images/productos/20221128222019.jpg', 1, 18),
(290, 'TUBO PVC flex. TRANSPARENTE 10x13 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.40', 37, 'assets/images/productos/20221128222036.jpg', 1, 18),
(291, 'TUBO PVC flex. TRANSPARENTE 10x14 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.95', 45, 'assets/images/productos/20221128222036.jpg', 1, 18),
(292, 'TUBO PVC flex. TRANSPARENTE 12x16 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.20', 11, 'assets/images/productos/20221128222036.jpg', 1, 18),
(293, 'TUBO PVC flex. TRANSPARENTE 14x18 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.10', 28, 'assets/images/productos/20221128222036.jpg', 1, 18),
(294, 'TUBO PVC flex. TRANSPARENTE 15x20 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.00', 34, 'assets/images/productos/20221128222036.jpg', 1, 18),
(295, 'TUBO PVC flex. TRANSPARENTE 16x20 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.80', 36, 'assets/images/productos/20221128222036.jpg', 1, 18),
(296, 'TUBO PVC flex. TRANSPARENTE 18x23 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '3.10', 48, 'assets/images/productos/20221128222036.jpg', 1, 18),
(297, 'TUBO PVC flex. TRANSPARENTE 20x25 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '4.20', 3, 'assets/images/productos/20221128222036.jpg', 1, 18),
(298, 'TUBO PVC flex. TRANSPARENTE 22x28 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.95', 21, 'assets/images/productos/20221128222036.jpg', 1, 18),
(299, 'TUBO PVC flex. TRANSPARENTE 25x31 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '4.20', 12, 'assets/images/productos/20221128222036.jpg', 1, 18),
(300, 'TUBO PVC flex. TRANSPARENTE 2x4 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.40', 35, 'assets/images/productos/20221128222036.jpg', 1, 18),
(301, 'TUBO PVC flex. TRANSPARENTE 3x5 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.30', 41, 'assets/images/productos/20221128222036.jpg', 1, 18),
(302, 'TUBO PVC flex. TRANSPARENTE 4x6 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.50', 28, 'assets/images/productos/20221128222036.jpg', 1, 18),
(303, 'TUBO PVC flex. TRANSPARENTE 4x7 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.45', 50, 'assets/images/productos/20221128222036.jpg', 1, 18),
(304, 'TUBO PVC flex. TRANSPARENTE 5x8 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.55', 39, 'assets/images/productos/20221128222036.jpg', 1, 18),
(305, 'TUBO PVC flex. TRANSPARENTE 5x9 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.75', 35, 'assets/images/productos/20221128222036.jpg', 1, 18),
(306, 'TUBO PVC flex. TRANSPARENTE 6x10 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.85', 9, 'assets/images/productos/20221128222036.jpg', 1, 18),
(307, 'TUBO PVC flex. TRANSPARENTE 6x9 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.85', 13, 'assets/images/productos/20221128222036.jpg', 1, 18),
(308, 'TUBO PVC flex. TRANSPARENTE 7x10 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.95', 41, 'assets/images/productos/20221128222036.jpg', 1, 18),
(309, 'TUBO PVC flex. TRANSPARENTE 7x11 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.05', 11, 'assets/images/productos/20221128222036.jpg', 1, 18),
(310, 'TUBO PVC flex. TRANSPARENTE 7x12 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.30', 9, 'assets/images/productos/20221128222036.jpg', 1, 18),
(311, 'TUBO PVC flex. TRANSPARENTE 8x10 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '0.80', 7, 'assets/images/productos/20221128222036.jpg', 1, 18),
(312, 'TUBO PVC flex. TRANSPARENTE 8x11 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.20', 2, 'assets/images/productos/20221128222036.jpg', 1, 18),
(313, 'TUBO PVC flex. TRANSPARENTE 8x12 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.60', 4, 'assets/images/productos/20221128222036.jpg', 1, 18),
(314, 'TUBO PVC flex. TRANSPARENTE 9x13 mm. ESPIROCRISTAL', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '1.15', 2, 'assets/images/productos/20221128222036.jpg', 1, 18),
(315, 'TUBO PVC flex. TRANSPARENTE 9x15 mm. TUBCLAIR', 'Tuberia con buena resistencia química, asociada a las propiedades habituales del PVC, Especialmente indicada para trasiego de líquidos alimentarios como vino, mostos, cervezas, vinagres y líquidos alcohólicos hasta 20º. Industria general y como nivel en el sector de la construcción y también en instalaciones sanitarias', '2.70', 32, 'assets/images/productos/20221128222036.jpg', 1, 18),
(316, 'BRIDAS PLASTICO 2.4x080 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '0.95', 31, 'assets/images/productos/20221128223604.jpg', 1, 19),
(317, 'BRIDAS PLASTICO 2.5x100 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.45', 48, 'assets/images/productos/20221128223604.jpg', 1, 19),
(318, 'BRIDAS PLASTICO 2.5x140 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.85', 44, 'assets/images/productos/20221128223604.jpg', 1, 19),
(319, 'BRIDAS PLASTICO 2.5x160 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 25, 'assets/images/productos/20221128223604.jpg', 1, 19),
(320, 'BRIDAS PLASTICO 2.8X300 mm PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '6.05', 15, 'assets/images/productos/20221128223604.jpg', 1, 19),
(321, 'BRIDAS PLASTICO 3.6x140 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.45', 11, 'assets/images/productos/20221128223604.jpg', 1, 19),
(322, 'BRIDAS PLASTICO 3.6x180 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 18, 'assets/images/productos/20221128223604.jpg', 1, 19),
(323, 'BRIDAS PLASTICO 3.6x200 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 26, 'assets/images/productos/20221128223604.jpg', 1, 19),
(324, 'BRIDAS PLASTICO 3.6x250 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '5.20', 18, 'assets/images/productos/20221128223604.jpg', 1, 19),
(325, 'BRIDAS PLASTICO 3.6x300 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '5.30', 13, 'assets/images/productos/20221128223604.jpg', 1, 19),
(326, 'BRIDAS PLASTICO 3.6x370 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.65', 18, 'assets/images/productos/20221128223604.jpg', 1, 19),
(327, 'BRIDAS PLASTICO 4.8x160 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.90', 5, 'assets/images/productos/20221128223604.jpg', 1, 19),
(328, 'BRIDAS PLASTICO 4.8x190 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '4.20', 15, 'assets/images/productos/20221128223604.jpg', 1, 19),
(329, 'BRIDAS PLASTICO 4.8x200 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '4.50', 35, 'assets/images/productos/20221128223604.jpg', 1, 19),
(330, 'BRIDAS PLASTICO 4.8x250 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.00', 3, 'assets/images/productos/20221128223604.jpg', 1, 19),
(331, 'BRIDAS PLASTICO 4.8x280 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 25, 'assets/images/productos/20221128223604.jpg', 1, 19),
(332, 'BRIDAS PLASTICO 4.8x300 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 47, 'assets/images/productos/20221128223604.jpg', 1, 19),
(333, 'BRIDAS PLASTICO 4.8x370 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '9.10', 36, 'assets/images/productos/20221128223604.jpg', 1, 19),
(334, 'BRIDAS PLASTICO 4.8x430 mm. PACK 100 u. BLANCAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '13.95', 11, 'assets/images/productos/20221128223604.jpg', 1, 19),
(335, 'BRIDAS PLASTICO amarillas 4.8x300 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 6, 'assets/images/productos/20221128223617.jpg', 1, 19),
(336, 'BRIDAS PLASTICO azules 4.8x300 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 16, 'assets/images/productos/20221128223630.jpg', 1, 19),
(337, 'BRIDAS PLASTICO marrones 4.8x300 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 39, 'assets/images/productos/20221128223642.jpg', 1, 19),
(338, 'BRIDAS PLASTICO rojas 4.8x300 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 22, 'assets/images/productos/20221128223653.jpg', 1, 19),
(339, 'BRIDAS PLASTICO verdes 4.8x300 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.65', 19, 'assets/images/productos/20221128223707.jpg', 1, 19),
(340, 'BRIDAS PLASTICO 2.4x80 mm. NEGRAS PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '0.95', 3, 'assets/images/productos/20221128224111.jpg', 1, 19),
(341, 'BRIDAS PLASTICO 2.5x100 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.00', 38, 'assets/images/productos/20221128224111.jpg', 1, 19),
(342, 'BRIDAS PLASTICO 2.5x140 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.85', 9, 'assets/images/productos/20221128224111.jpg', 1, 19),
(343, 'BRIDAS PLASTICO 2.5x160 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 15, 'assets/images/productos/20221128224111.jpg', 1, 19),
(344, 'BRIDAS PLASTICO 2.5x200 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.70', 47, 'assets/images/productos/20221128224111.jpg', 1, 19),
(345, 'BRIDAS PLASTICO 2.8x300 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '6.00', 3, 'assets/images/productos/20221128224111.jpg', 1, 19),
(346, 'BRIDAS PLASTICO 3.6x140 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.45', 0, 'assets/images/productos/20221128224111.jpg', 1, 19),
(347, 'BRIDAS PLASTICO 3.6x180 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 37, 'assets/images/productos/20221128224111.jpg', 1, 19),
(348, 'BRIDAS PLASTICO 3.6x200 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 4, 'assets/images/productos/20221128224111.jpg', 1, 19),
(349, 'BRIDAS PLASTICO 3.6x250 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '5.25', 26, 'assets/images/productos/20221128224111.jpg', 1, 19),
(350, 'BRIDAS PLASTICO 3.6x300 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '5.30', 2, 'assets/images/productos/20221128224111.jpg', 1, 19),
(351, 'BRIDAS PLASTICO 3.6x370 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.60', 15, 'assets/images/productos/20221128224111.jpg', 1, 19),
(352, 'BRIDAS PLASTICO 4.8x160 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.90', 38, 'assets/images/productos/20221128224111.jpg', 1, 19),
(353, 'BRIDAS PLASTICO 4.8x280 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.10', 46, 'assets/images/productos/20221128224111.jpg', 1, 19),
(354, 'BRIDAS PLASTICO 4.8x300 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.20', 28, 'assets/images/productos/20221128224111.jpg', 1, 19),
(355, 'BRIDAS PLASTICO 4.8x370 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.90', 38, 'assets/images/productos/20221128224111.jpg', 1, 19),
(356, 'BRIDAS PLASTICO 4.8x430 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '13.50', 50, 'assets/images/productos/20221128224111.jpg', 1, 19),
(357, 'BRIDAS PLASTICO 4.8x530 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '24.95', 3, 'assets/images/productos/20221128224111.jpg', 1, 19),
(358, 'BRIDAS PLASTICO 7.6x540 mm. PACK 100 u. NEGRAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '33.00', 34, 'assets/images/productos/20221128224111.jpg', 1, 19),
(359, 'BRIDAS PLASTICO verdes 2.5x100 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.00', 5, 'assets/images/productos/20221128223707.jpg', 1, 19),
(360, 'BRIDAS PLASTICO verdes 2.5x160 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 9, 'assets/images/productos/20221128223707.jpg', 1, 19),
(361, 'BRIDAS PLASTICO amarillas 2.5x100 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.00', 40, 'assets/images/productos/20221128223617.jpg', 1, 19),
(362, 'BRIDAS PLASTICO amarillas 2.5x160 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 23, 'assets/images/productos/20221128223617.jpg', 1, 19),
(363, 'BRIDAS PLASTICO amarillas 3.6x200 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 15, 'assets/images/productos/20221128223617.jpg', 1, 19),
(364, 'BRIDAS PLASTICO amarillas 3.6x370 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.60', 32, 'assets/images/productos/20221128223617.jpg', 1, 19),
(365, 'BRIDAS PLASTICO amarillas 4.8x250 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '6.95', 14, 'assets/images/productos/20221128223617.jpg', 1, 19),
(366, 'BRIDAS PLASTICO azules 2.5x100 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.00', 15, 'assets/images/productos/20221128223630.jpg', 1, 19),
(367, 'BRIDAS PLASTICO azules 2.5x160 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 44, 'assets/images/productos/20221128223630.jpg', 1, 19),
(368, 'BRIDAS PLASTICO azules 3.6x140 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.45', 6, 'assets/images/productos/20221128223630.jpg', 1, 19),
(369, 'BRIDAS PLASTICO azules 3.6x200 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 7, 'assets/images/productos/20221128223630.jpg', 1, 19),
(370, 'BRIDAS PLASTICO azules 3.6x370 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.80', 9, 'assets/images/productos/20221128223630.jpg', 1, 19),
(371, 'BRIDAS PLASTICO azules 4.8x250 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.25', 3, 'assets/images/productos/20221128223630.jpg', 1, 19),
(372, 'BRIDAS PLASTICO marron 2.5x100 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.05', 40, 'assets/images/productos/20221128223642.jpg', 1, 19),
(373, 'BRIDAS PLASTICO marron 2.5x160 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.25', 7, 'assets/images/productos/20221128223642.jpg', 1, 19),
(374, 'BRIDAS PLASTICO marron 3.6x200 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 6, 'assets/images/productos/20221128223642.jpg', 1, 19),
(375, 'BRIDAS PLASTICO marron 3.6x370 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.10', 3, 'assets/images/productos/20221128223642.jpg', 1, 19),
(376, 'BRIDAS PLASTICO marron 4.8x250 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '6.95', 6, 'assets/images/productos/20221128223642.jpg', 1, 19),
(377, 'BRIDAS PLASTICO rojas 2.5x100 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '1.00', 16, 'assets/images/productos/20221128223653.jpg', 1, 19),
(378, 'BRIDAS PLASTICO rojas 2.5x160 mm. PACK 100 u. ROJAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.35', 35, 'assets/images/productos/20221128223653.jpg', 1, 19),
(379, 'BRIDAS PLASTICO rojas 3.6x140 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.45', 49, 'assets/images/productos/20221128223653.jpg', 1, 19),
(380, 'BRIDAS PLASTICO rojas 3.6x200 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 6, 'assets/images/productos/20221128223653.jpg', 1, 19),
(381, 'BRIDAS PLASTICO rojas 3.6x370 mm. PACK 100 u. ROJAS', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '8.50', 18, 'assets/images/productos/20221128223653.jpg', 1, 19),
(382, 'BRIDAS PLASTICO rojas 4.8x250 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '6.95', 1, 'assets/images/productos/20221128223653.jpg', 1, 19),
(383, 'BRIDAS PLASTICO verdes 3.6x140 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '2.45', 13, 'assets/images/productos/20221128223707.jpg', 1, 19),
(384, 'BRIDAS PLASTICO verdes 3.6x200 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '3.70', 17, 'assets/images/productos/20221128223707.jpg', 1, 19),
(385, 'BRIDAS PLASTICO verdes 3.6x370 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '9.00', 1, 'assets/images/productos/20221128223707.jpg', 1, 19),
(386, 'BRIDAS PLASTICO verdes 4.8x250 mm. PACK 100 u.', 'El diseño de la cabeza garantiza una alta tensión de apriete y permite una aplicación rápida', '7.25', 20, 'assets/images/productos/20221128223707.jpg', 1, 19),
(387, 'BURBUJA PEQUEÑA ROLLO 10 m. x 1.60m (ancho)', 'Perfectas para el transporte y almacenamiento de productos frágiles', '15.50', 44, 'assets/images/productos/20221128232853.jpg', 1, 20),
(388, 'BURBUJA PEQUEÑA ROLLO 200m. x 1.60m (ancho) RC51', 'Perfectas para el transporte y almacenamiento de productos frágiles', '95.00', 33, 'assets/images/productos/20221128232853.jpg', 1, 20),
(389, 'BURBUJA PEQUEÑA ROLLO 25m. x 1.60m (ancho)', 'Perfectas para el transporte y almacenamiento de productos frágiles', '38.60', 9, 'assets/images/productos/20221128232853.jpg', 1, 20),
(390, 'BURBUJA PEQUEÑA ROLLO 5m. x 1.60m (ancho)', 'Perfectas para el transporte y almacenamiento de productos frágiles', '7.65', 33, 'assets/images/productos/20221128232853.jpg', 1, 20),
(391, 'BOBINA COLOR VERDE OSCURO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 44, 'assets/images/productos/20221128235729.jpg', 1, 20),
(392, 'BOBINA COLOR CYAN (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 33, 'assets/images/productos/20221128235737.jpg', 1, 20),
(393, 'BOBINA COLOR NARANJA (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 28, 'assets/images/productos/20221128235745.jpg', 1, 20),
(394, 'BOBINA COLOR NEGRO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 30, 'assets/images/productos/20221128235752.jpg', 1, 20),
(395, 'BOBINA COLOR GUINDO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 15, 'assets/images/productos/20221128235759.jpg', 1, 20),
(396, 'BOBINA COLOR LILA (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 18, 'assets/images/productos/20221128235808.jpg', 1, 20),
(397, 'BOBINA COLOR PLOMO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 12, 'assets/images/productos/20221128235819.jpg', 1, 20),
(398, 'BOBINA COLOR CELESTE (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 42, 'assets/images/productos/20221128235828.jpg', 1, 20),
(399, 'BOBINA COLOR VERDE LIMON (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 35, 'assets/images/productos/20221128235849.jpg', 1, 20),
(400, 'BOBINA COLOR BEIGE (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 31, 'assets/images/productos/20221128235900.jpg', 1, 20),
(401, 'BOBINA COLOR ROJO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 20, 'assets/images/productos/20221128235910.jpg', 1, 20),
(402, 'BOBINA COLOR ROSA (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 11, 'assets/images/productos/20221128235918.jpg', 1, 20),
(403, 'BOBINA COLOR GRIS CLARO (Ancho de 1.60m y largo de 200m) ', 'Perfectas para el uso tanto como material escolar, como de escritorio', '590.60', 12, 'assets/images/productos/20221128235927.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `clave`, `perfil`, `estado`) VALUES
(1, 'Freddy', 'Ferreira Saca', 'freddyferreirasaca@gmail.com', '$2y$10$wrHEmxsreZ2PnqNiTS/58O6ZiTteEsF0Kp4hN2uAhdOhJfnPoEM/q', NULL, 1);

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
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
