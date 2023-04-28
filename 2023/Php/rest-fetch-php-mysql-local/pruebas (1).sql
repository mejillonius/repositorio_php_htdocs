-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2023 a las 15:02:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12
CREATE DATABASE pruebas
DEFAULT CHARACTER SET = 'utf8mb4';

USE pruebas;

CREATE TABLE `usuarios` (
  `id` smallint(6) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idUpdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pwd`, `email`, `idUpdate`) VALUES
(1, 'tewqrewq', 'tewqtewq', ',tewqtewq', '2023-04-25 17:41:39'),
(2, 'tewqrewq', 'tewqtewq', ',tewqtewq', '2023-04-25 17:42:11'),
(3, 'tewqrewq', 'tewqtewq', ',tewqtewq', '2023-04-25 17:42:47'),
(4, 'utrffff', 'ffffAAAA', ',fffff', '2023-04-25 17:43:57'),
(5, '8888', 'AAAAAAA', ',8888', '2023-04-25 17:51:27'),
(6, 'utreutred', 'utredture', ',utreut', '2023-04-25 19:49:28');


-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--


ALTER TABLE `usuarios`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
