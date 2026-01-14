-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2026 a las 09:50:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `cantidad_stock`) VALUES
(1, 'Teléfono móvil', 'Electrónica', 499.99, 50),
(2, 'Televisor LED', 'Electrónica', 799.99, 30),
(3, 'Laptop', 'Electrónica', 1099.99, 20),
(4, 'Tablet', 'Electrónica', 299.99, 40),
(5, 'Camiseta', 'Ropa', 19.99, 100),
(6, 'Pantalón vaquero', 'Ropa', 39.99, 80),
(7, 'Zapatos deportivos', 'Ropa', 59.99, 60),
(8, 'Vestido de fiesta', 'Ropa', 129.99, 40),
(9, 'Sofá', 'Hogar', 799.99, 10),
(10, 'Mesa de comedor', 'Hogar', 399.99, 20),
(11, 'Lámpara de pie', 'Hogar', 69.99, 30),
(12, 'Cocina eléctrica', 'Hogar', 299.99, 15),
(13, 'Aire acondicionado', 'Electrónica', 899.99, 8),
(14, 'Chaqueta de cuero', 'Ropa', 149.99, 25),
(15, 'Pijama de algodón', 'Ropa', 29.99, 50),
(16, 'Alfombra', 'Hogar', 49.99, 40),
(17, 'Cortinas', 'Hogar', 29.99, 60),
(18, 'Toallas de baño', 'Hogar', 9.99, 100),
(19, 'Cámara digital', 'Electrónica', 399.99, 25),
(20, 'Altavoces Bluetooth', 'Electrónica', 79.99, 50),
(21, 'hola como estas espero que muy bien ', NULL, 100000.00, NULL),
(22, '1', NULL, 1.00, NULL),
(23, '1', NULL, 1.00, NULL),
(24, '1', NULL, 1.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`) VALUES
(1, 'usuario1', 'contrasena1'),
(2, 'usuario2', 'constrasena2'),
(3, 'a', ''),
(4, 'b', ''),
(5, 'c', 'c'),
(6, 'd', '$2y$10$fy/hb.SD35hWtHb/zjG.Tuh'),
(7, 'e', '$2y$10$/gkIA9JSSKTvrBWd0/d3yuB');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
