-- Active: 1675263800707@@127.0.0.1@3306@moviesbd

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `usuarios_roles`

--

/* CREATE DATABASE usuarios_roles DEFAULT CHARACTER SET = 'utf8mb4'; */

-- --------------------------------------------------------

USE moviesbd;

-- --------------------------------------------------------

--

-- Table structure for table `roles`

--

CREATE TABLE
    `roles` (
        `id` smallint(1) NOT NULL,
        `rol` enum(
            'Admin',
            'Trabajador',
            'Externo'
        ) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `roles`

--

INSERT INTO
    `roles` (`id`, `rol`)
VALUES (1, 'Admin'), (2, 'Trabajador'), (3, 'Externo');

-- --------------------------------------------------------

--

-- Table structure for table `usuarios`

--

CREATE TABLE
    `usuarios` (
        `id` smallint(2) NOT NULL,
        `username` varchar(15) NOT NULL,
        `password` varchar(128) NOT NULL,
        `rol_id` smallint(1) NOT NULL,
        `email` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `usuarios`

--

INSERT INTO
    `usuarios` (
        `id`,
        `username`,
        `password`,
        `rol_id`,
        `email`
    )
VALUES (
        1,
        'super',
        'super',
        1,
        'super@super.super'
    ), (
        2,
        'externo',
        '$2y$10$KZ5PWHqHeBJ8GOEiY8mGquxEdOvT40bqpjlelKJLKa6Az1UACUQxC',
        3,
        'externo@externo.externo'
    ), (
        3,
        'test',
        '$2y$10$5N9BjDguftUK0.zu/2dQZOWnoDR4KmUOhqHzJ3L3ngDLrYyzD59I2',
        2,
        'test@test.test'
    ), (
        4,
        'admin',
        '$2y$10$HJJFgaYYkX/TlDKGPkiqE.kPdNSDcd1Mo1NmBE5wmrnlVc2ht9kZW',
        1,
        'admin@admin.com'
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `roles`

--

ALTER TABLE `roles` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `usuarios`

--

ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `username` (`username`, `email`),
ADD KEY `forana` (`rol_id`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `roles`

--

ALTER TABLE
    `roles` MODIFY `id` smallint(1) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

--

-- AUTO_INCREMENT for table `usuarios`

--

ALTER TABLE
    `usuarios` MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `usuarios`

--

ALTER TABLE `usuarios`
ADD
    CONSTRAINT `forana` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;