-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 12:34:31
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
-- Base de datos: `conexion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `id` int(11) NOT NULL,
  `título` varchar(45) NOT NULL,
  `descripción` varchar(255) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `ruta_img` varchar(45) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `título`, `descripción`, `autor`, `ruta_img`, `registro`) VALUES
(1, 'Escapada alemania', '../assets/img/alemania/descripcion.txt', 'david', '../assets/img/alemania/1.png', '2024-11-16 16:14:31'),
(2, 'Escapada grecia', '../assets/img/grecia/descripcion.txt', 'miquel', '../assets/img/grecia/1.png', '2024-11-16 16:14:31'),
(3, 'Ruta senderismo', '../assets/img/senderismo/descripcion.txt', 'Pep', '../assets/img/senderismo/1.png', '2024-11-17 11:10:51'),
(4, 'Ruta por los alpes', '../assets/img/alpes/descripcion.txt', 'Mariano', '../assets/img/alpes/1.png', '2024-11-17 11:10:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `token` varchar(45) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contraseña`, `nombre_usuario`, `token`, `registro`, `rol`) VALUES
(26, 'david', 'valverde', 'davidvalverderuiz209@gmail.com', '$2y$10$OlkrLeqty.YBisBza2QerupB.EakrfpQgfGG6AIgA.3N3quLf3jVS', 'david.valverde', 'XqkXj3nWi9aNqsNPAbGYWXcdgqPY2ezmoRRdfjM5', '2024-12-03 14:43:33', 0),
(27, 'pol', 'camarena', 'polcmrn@gmail.com', '$2y$10$s0gQk/9RZKgDRc25PTgCg.9QVLR1QB..0QDwYBvlvxfThKJ8wvfLq', 'pol.camarena', 'sg5ZTKRFLn2o48n4zVmg6vSfFLln4Du4P9EbhzE6', '2024-12-03 14:49:56', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guias`
--
ALTER TABLE `guias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
