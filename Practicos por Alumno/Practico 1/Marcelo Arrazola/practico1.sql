-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2018 a las 01:02:19
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practico1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpelicula`
--

CREATE TABLE `tblpelicula` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `anho` date NOT NULL,
  `sinopsis` varchar(400) NOT NULL,
  `director` varchar(200) NOT NULL,
  `imageURL` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpelicula`
--

INSERT INTO `tblpelicula` (`id`, `nombre`, `anho`, `sinopsis`, `director`, `imageURL`) VALUES
(2, 'thor', '2008-11-11', 'thor es un semi dios', 'ese bigoton', 'css/img/thor_ragnarok-115636540-large.jpg'),
(3, 'Avengers: Infinity War', '2005-02-16', 'muy jodida peli', 'un tipo', 'css/img/MV5BMTM4OGJmNWMtOTM4Ni00NTE3LTg3MDItZmQxYjc4N2JhNmUxXkEyXkFqcGdeQXVyNTgzMDMzMTg@._V1_UX182_CR0,0,182,268_AL_.jpg'),
(4, 'Avengers: Assemble', '2010-11-11', 'se armo la gorda', 'npi', 'css/img/thor_ragnarok-115636540-large.jpg'),
(5, 'Avengers: Age of Ultron', '0000-00-00', 'un robot acomplejado', '2018-05-10', 'css/img/thor_ragnarok-115636540-large.jpg'),
(6, 'thor', '2018-05-09', 'thor es un semi dios', 'ese tipo', 'css/img/thor_ragnarok-115636540-large.jpg'),
(8, 'hol', '0000-00-00', 'ase', '2018-05-01', 'WhatsApp Image 2018-03-16 at 12.26.52 AM.jpeg'),
(9, 'titanic', '2017-02-01', 'se hundio un barcote', 'james cameron', 'css/img/a2480752-3c23-4e2c-9cb9-517908cb6363.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblpelicula`
--
ALTER TABLE `tblpelicula`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblpelicula`
--
ALTER TABLE `tblpelicula`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
