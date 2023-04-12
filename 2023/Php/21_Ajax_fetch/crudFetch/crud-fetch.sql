-- Active: 1675263800707@@127.0.0.1@3306@ej20

DROP DATABASE IF EXISTS crudfetch;
CREATE DATABASE crudfetch
    DEFAULT CHARACTER SET = 'utf8mb4';

USE crudfetch;

-- --------------------------------------------------------

--
-- Estructura de la taula `productos`
--


CREATE TABLE `productos` (
  `id` int NOT NULL,
  `codigo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `producto`, `precio`, `cantidad`) VALUES
(1, '012', 'camisetas', 40.00, 200),
(2, '012B', 'relojes', 34.00, 200),
(4, '042B', 'tornillos', 1.20, 25),
(5, 'ccv', 'Alcayatas', 2.00, 200),
(6, 'bbg', 'Alicates', 20.50, 21),
(7, 'b19', 'llaveros', 23.00, 9),
(10, 'qr12', 'altabajos y mas', 10.50, 30),
(20, 'cd12', 'aspiradora', 99.99, 20),
(22, 'cd21', 'albornoz', 99.99, 300),
(23, 'db', 'Pepinos', 1.00, 10),
(26, 'cd43', 'alcachofas', 99.99, 1),
(28, 'h1343', 'ATX', 99.99, 99);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

