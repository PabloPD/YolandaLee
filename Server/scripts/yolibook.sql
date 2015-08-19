-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2015 a las 23:22:50
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `yolibook`
--
CREATE DATABASE IF NOT EXISTS `yolibook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yolibook`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `au_id` int(11) NOT NULL,
  `au_name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`au_id`, `au_name`) VALUES
(1, 'autor1'),
(10, 'autor10'),
(11, 'autor11'),
(12, 'autor12'),
(13, 'autor13'),
(14, 'autor14'),
(15, 'autor15'),
(16, 'autor16'),
(17, 'autor17'),
(18, 'autor18'),
(19, 'autor19'),
(2, 'autor2'),
(20, 'autor20'),
(3, 'autor3'),
(4, 'autor4'),
(5, 'autor5'),
(6, 'autor6'),
(7, 'autor7'),
(8, 'autor8'),
(9, 'autor9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `b_id` int(11) NOT NULL,
  `b_valoracion` varchar(2) NOT NULL,
  `b_comentario` text NOT NULL,
  `b_picture` varchar(100) NOT NULL,
  `b_ti_fk` int(11) NOT NULL,
  `b_te_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`b_id`, `b_valoracion`, `b_comentario`, `b_picture`, `b_ti_fk`, `b_te_fk`) VALUES
(1, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 1, 1),
(2, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 2, 1),
(3, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 3, 2),
(4, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 4, 3),
(5, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 5, 4),
(6, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 6, 5),
(7, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 7, 6),
(8, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 8, 7),
(9, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 9, 6),
(10, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 10, 5),
(11, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 11, 4),
(12, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 12, 3),
(13, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 13, 1),
(14, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 14, 2),
(15, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 15, 5),
(16, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 16, 1),
(17, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 17, 1),
(18, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 18, 5),
(19, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 19, 4),
(20, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 20, 3),
(21, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 21, 1),
(22, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 22, 2),
(23, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 23, 5),
(24, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 24, 1),
(25, 'a', 'Esto es un ejemplo de opinion sobre un libro, totalmente subjetiva y sin basarse en otras referencias más\nque las propias experiencias vividas', 'imgprueba', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

DROP TABLE IF EXISTS `tema`;
CREATE TABLE IF NOT EXISTS `tema` (
  `te_id` int(11) NOT NULL,
  `te_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`te_id`, `te_name`) VALUES
(1, 'tema1'),
(10, 'tema10'),
(11, 'tema11'),
(2, 'tema2'),
(3, 'tema3'),
(4, 'tema4'),
(5, 'tema5'),
(6, 'tema6'),
(7, 'tema7'),
(8, 'tema8'),
(9, 'tema9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

DROP TABLE IF EXISTS `titulo`;
CREATE TABLE IF NOT EXISTS `titulo` (
  `ti_id` int(11) NOT NULL,
  `ti_name` varchar(250) NOT NULL,
  `ti_au_fk_autor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`ti_id`, `ti_name`, `ti_au_fk_autor`) VALUES
(1, 'titulo 1', 1),
(2, 'titulo 2', 1),
(3, 'titulo 3', 2),
(4, 'titulo 4', 2),
(5, 'titulo 5', 3),
(6, 'titulo 6', 3),
(7, 'titulo 7', 4),
(8, 'titulo 8', 4),
(9, 'titulo 9', 5),
(10, 'titulo 10', 5),
(11, 'titulo 11', 6),
(12, 'titulo 12', 6),
(13, 'titulo 13', 7),
(14, 'titulo 14', 7),
(15, 'titulo 15', 8),
(16, 'titulo 16', 8),
(17, 'titulo 17', 9),
(18, 'titulo 18', 9),
(19, 'titulo 19', 10),
(20, 'titulo 20', 10),
(21, 'titulo 21', 11),
(22, 'titulo 22', 11),
(23, 'titulo 23', 12),
(24, 'titulo 24', 12),
(25, 'titulo 25', 13),
(26, 'titulo 26', 13),
(27, 'titulo 27', 14),
(28, 'titulo 28', 14),
(29, 'titulo 29', 15),
(30, 'titulo 30', 15),
(31, 'titulo 31', 16),
(32, 'titulo 32', 16),
(33, 'titulo 33', 17),
(34, 'titulo 34', 17),
(35, 'titulo 35', 18),
(36, 'titulo 36', 18),
(37, 'titulo 37', 19),
(38, 'titulo 38', 19),
(39, 'titulo 39', 20),
(40, 'titulo 40', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`au_id`), ADD UNIQUE KEY `au_name` (`au_name`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`), ADD UNIQUE KEY `b_ti_fk` (`b_ti_fk`), ADD KEY `b_te_fk` (`b_te_fk`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`te_id`), ADD UNIQUE KEY `te_name` (`te_name`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`ti_id`), ADD UNIQUE KEY `ti_name` (`ti_name`), ADD KEY `ti_au_fk_autor` (`ti_au_fk_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `te_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`b_ti_fk`) REFERENCES `titulo` (`ti_id`),
ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`b_te_fk`) REFERENCES `tema` (`te_id`);

--
-- Filtros para la tabla `titulo`
--
ALTER TABLE `titulo`
ADD CONSTRAINT `titulo_ibfk_1` FOREIGN KEY (`ti_au_fk_autor`) REFERENCES `autor` (`au_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
