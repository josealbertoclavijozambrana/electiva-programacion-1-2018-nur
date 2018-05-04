-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2018 a las 01:04:47
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectovj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_peliculas`
--

CREATE TABLE `tbl_peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_peliculas`
--

INSERT INTO `tbl_peliculas` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(32, 'Capitan America', 125, 'Se trata de un capitan'),
(33, 'Avengers', 120, 'Pelicula de Marvel'),
(34, 'Avengers infinity war', 120, 'es una pelicula de marvel con thanos'),
(35, 'Thor', 120, 'Pelicula de Marvel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_peliculas`
--
ALTER TABLE `tbl_peliculas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_peliculas`
--
ALTER TABLE `tbl_peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
