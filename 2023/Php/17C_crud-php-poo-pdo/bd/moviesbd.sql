-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-03-2023 a las 18:48:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moviesbd`
--
CREATE DATABASE IF NOT EXISTS `moviesbd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moviesbd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `ranking` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `name`, `ranking`, `active`) VALUES
(1, 'Comedia', 1, 1),
(2, 'Terror', 2, 1),
(3, 'Drama', 3, 1),
(4, 'Accion', 4, 1),
(5, 'Ciencia Ficcion', 5, 1),
(6, 'Suspenso', 6, 1),
(7, 'Animacion', 7, 1),
(8, 'Aventuras', 8, 1),
(9, 'Documental', 9, 1),
(10, 'Infantiles', 10, 1),
(11, 'Fantasia', 11, 1),
(12, 'Musical', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) NOT NULL,
  `rating` decimal(3,1) UNSIGNED NOT NULL,
  `awards` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `release_date` datetime NOT NULL,
  `length` int(10) UNSIGNED DEFAULT NULL,
  `genre_id` int(10) UNSIGNED DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `rating`, `awards`, `release_date`, `length`, `genre_id`, `img`) VALUES
(1, 'Avatar', '7.9', 3, '2010-10-04 00:00:00', 122, 5, NULL),
(2, 'Titanic', '7.7', 11, '1997-09-04 00:00:00', 320, 3, NULL),
(3, 'La Guerra de las galaxias: Episodio VI', '9.1', 7, '2004-07-04 00:00:00', NULL, 5, NULL),
(4, 'La Guerra de las galaxias: Episodio VII', '9.0', 6, '2003-11-04 00:00:00', 180, 5, NULL),
(5, 'Parque Jurasico', '8.3', 5, '1999-01-04 00:00:00', 270, 5, NULL),
(6, 'Harry Potter y las Reliquias de la Muerte - Parte 2', '9.0', 2, '2008-07-04 00:00:00', 190, 6, NULL),
(7, 'Transformers: el lado oscuro de la luna', '0.9', 1, '2005-07-04 00:00:00', NULL, 5, NULL),
(8, 'Harry Potter y la piedra filosofal', '10.0', 1, '2008-04-04 00:00:00', 120, 8, NULL),
(9, 'Harry Potter y la cámara de los secretos', '3.5', 2, '2009-08-04 00:00:00', 200, 8, NULL),
(10, 'El rey león', '9.1', 3, '2000-02-04 00:00:00', NULL, 10, NULL),
(11, 'Alicia en el país de las maravillas', '5.7', 2, '2008-07-04 00:00:00', 120, NULL, NULL),
(12, 'Buscando a Nemo', '8.3', 2, '2000-07-04 00:00:00', 110, 7, NULL),
(13, 'Toy Story', '6.1', 0, '2008-03-04 00:00:00', 150, 7, NULL),
(14, 'Toy Story 2', '3.2', 2, '2003-04-04 00:00:00', 120, 7, NULL),
(15, 'La vida es bella', '8.3', 5, '1994-10-04 00:00:00', NULL, 3, NULL),
(16, 'Mi pobre angelito', '3.2', 1, '1989-01-04 00:00:00', 120, 1, NULL),
(17, 'Intensamente', '9.0', 2, '2008-07-04 00:00:00', 120, 7, NULL),
(18, 'Carrozas de fuego', '9.9', 7, '1980-07-04 00:00:00', 180, NULL, NULL),
(19, 'Big', '7.3', 2, '1988-02-04 00:00:00', 130, 8, NULL),
(20, 'I am Sam', '9.0', 4, '1999-03-04 00:00:00', 130, 3, NULL),
(21, 'Hotel Transylvania', '7.1', 1, '2012-05-04 00:00:00', 90, 10, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_ranking_unique` (`ranking`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_genre_id_foreign` (`genre_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
