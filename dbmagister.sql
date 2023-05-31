-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 02:01:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmagister`
--
CREATE DATABASE IF NOT EXISTS `dbmagister` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbmagister`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `url_img` varchar(150) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `url_img`, `nombre`, `apellido`, `telefono`, `correo`, `edad`, `sexo`) VALUES
(1, 'assets/img/team-2.jpg', 'Will', 'Smith', '986782057', 'wilsmith@gmail.com', 15, 'M'),
(2, 'assets/img/team-3.jpg', 'jose luis', 'cuyita', '08346767', 'cuyita@gmail.com', 18, 'F'),
(3, 'assets/img/team-4.jpg', 'Martin', 'Lutherking', '375474333', 'lutherrey@gmail.com', 14, 'M'),
(4, 'assets/img/team-5.jpg', 'Nombre4', 'Quispe', '73596457', 'correoquispe@gmail.com', 17, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `nom_servicio` varchar(100) NOT NULL,
  `des_servicio` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_uni` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id`, `nom_servicio`, `des_servicio`, `cantidad`, `precio_uni`) VALUES
(1, 'Service 1', 'Description', 1, 123.00),
(2, 'Service 2', 'Description', 2, 123.00),
(5, 'Service 3', 'Description', 2, 123.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `codigo_factura` int(11) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `ruc_cliente` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direc_cliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `codigo_factura`, `cliente`, `ruc_cliente`, `fecha`, `telefono`, `direc_cliente`) VALUES
(1, 12345, 'INDUSTRIAS ARCOIRIS', 10152698, '10/05/2023', 312123456, 'Calle Madero 123, Cto Colima\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `url_img` varchar(150) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `url_img`, `nombre`, `apellido`, `rol`, `correo`, `usuario`, `clave`) VALUES
(1, 'assets/img/team-1.jpg', 'Daniel', 'Pretell', 'Profesor', 'elw.danielpretell@gmail.com', 'admin', 'admin'),
(2, 'assets/img/team-2.jpg', 'Profe2', 'profesor', 'Profesor', 'profe@gmail.com', 'profe', '123'),
(3, 'assets/img/team-3.jpg', 'Profe3', 'profesor', 'Profesor', 'profe3@gmail.com', 'profe3', '123'),
(4, 'assets/img/team-5.jpg', 'Nombre5', 'Castillo', 'Profesor', 'castillo@gmail.com', 'profe5', '123'),
(5, 'assets/img/tesla.png', 'Nikson', 'Benel', 'Profesor', 'nikson@gmail.com', 'nikson', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
