CREATE DATABASE `netflix` /*!40100 DEFAULT CHARACTER SET utf8 */;

use netflix;

CREATE TABLE `tblcategorias` (
  `codigo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

CREATE TABLE `tblpeliculacategoria` (
  `pelicula_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  KEY `pelicula_id` (`pelicula_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `tblpeliculacategoria_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `tblpeliculas` (`codigo_id`),
  CONSTRAINT `tblpeliculacategoria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `tblcategorias` (`codigo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tblpeliculas` (
  `codigo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `duracion` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`codigo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

