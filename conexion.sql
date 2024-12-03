-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 15:29:45
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
(13, 'pep', 'guardiola', 'pegu@gmail.com', '$2y$10$ppBpp1YIweF7xc6z0pbNjeOTExoV71MxjCUXkxEHfQRdArhibaiq.', 'pep_guardiola', '', '2024-11-02 15:24:20', 0),
(14, 'david2', 'valverde', 'david2@gmail.com', '$2y$10$ESxrgeefRXiGAlIJyUxASOa1mwjKjZXZQFzNX2PF8WfcfEbRso8BG', 'dava', '', '2024-11-02 23:30:55', 0),
(15, 'pruebas', 'pruebas', 'prueba@gmail.com', '$2y$10$5tGnASqmp31/fr6iFz203OcKvySgui6jsZn8ajY1X6M8yM4ZZnHiC', 'prueba', '', '2024-11-16 11:34:00', 0),
(16, 'pruebas', 'pruebas', 'pruebas2@gmail.com', '$2y$10$2FSbp8KZ3m2qT/XPcnCGJOr3/os98iV3hZWyQ6X4mmRW7AXi5lqm2', 'pruebas2', '', '2024-11-16 11:35:04', 0),
(17, 'pruebas', 'pruebas', 'pruebas3@gmail.com', '$2y$10$XxaNNcSe7ZwspNIOUyRyJuHaxwossXoGEJCJC5Wwh0NOZsKQunVKu', 'pruebas3', '', '2024-11-16 11:47:19', 0),
(18, 'mariona', 'pan', 'mariona@gmail.com', '$2y$10$3L4rETINUldUp7BQLW7MT.FiWUCL2weR/QpBhFJplHHfXnPBKgSxK', 'mariona', '', '2024-11-20 15:04:33', 0),
(24, 'david', 'valverde', 'davidvalverderuiz209@gmail.com', '$2y$10$95C3zxTKcHomF7hW6WRWJ.8qWE.aZLBidP4WKMULEZAemZkgKj1im', 'david.valverde', '', '2024-11-26 18:46:08', 0),
(25, 'pol', 'camarena', 'polcmrn@gmail.com', '$2y$10$eoZms4hsIyUO/Lc9bhxcre3CSjATTn2KUfOE/rDRnja2CLrE5cWSa', 'pol.camarena', '9gYdKYzig5U1aiLMQF5BcWhXk26Q9AR0m8cnPwNV', '2024-11-26 18:46:28', 0);

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
