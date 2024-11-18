-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 15:27:14
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
  `registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `título`, `descripción`, `autor`, `registro`) VALUES
(1, 'Escapada alemania', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'david', '2024-11-16 16:14:31'),
(2, 'Escapada grecia', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'miquel', '2024-11-16 16:14:31'),
(3, 'Ruta senderismo', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'Pep', '2024-11-17 11:10:51'),
(4, 'Ruta por los alpes', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'Mariano', '2024-11-17 11:10:51');

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
  `registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contraseña`, `nombre_usuario`, `registro`, `rol`) VALUES
(1, 'david', 'valverde', 'david@gmail.com', 'password', 'david v', '2024-10-16 14:17:30', 1),
(2, 'Pepe', 'Viyuela', 'pevi@gmail.com', 'password', 'pevi', '2024-10-16 15:00:25', 0),
(3, 'Miquel', 'Burguera', 'mburgueratt@gmail.com', 'password', 'BRUGUIR', '2024-10-16 15:08:01', 0),
(11, 'Jose', 'Manuel', 'josema88@gmail.com', 'password', 'josema', '2024-10-17 20:01:45', 0),
(13, 'pep', 'guardiola', 'pegu@gmail.com', '$2y$10$ppBpp1YIweF7xc6z0pbNjeOTExoV71MxjCUXkxEHfQRdArhibaiq.', 'pep_guardiola', '2024-11-02 15:24:20', 0),
(14, 'david2', 'valverde', 'david2@gmail.com', '$2y$10$ESxrgeefRXiGAlIJyUxASOa1mwjKjZXZQFzNX2PF8WfcfEbRso8BG', 'dava', '2024-11-02 23:30:55', 0),
(15, 'pruebas', 'pruebas', 'prueba@gmail.com', '$2y$10$5tGnASqmp31/fr6iFz203OcKvySgui6jsZn8ajY1X6M8yM4ZZnHiC', 'prueba', '2024-11-16 11:34:00', 0),
(16, 'pruebas', 'pruebas', 'pruebas2@gmail.com', '$2y$10$2FSbp8KZ3m2qT/XPcnCGJOr3/os98iV3hZWyQ6X4mmRW7AXi5lqm2', 'pruebas2', '2024-11-16 11:35:04', 0),
(17, 'pruebas', 'pruebas', 'pruebas3@gmail.com', '$2y$10$XxaNNcSe7ZwspNIOUyRyJuHaxwossXoGEJCJC5Wwh0NOZsKQunVKu', 'pruebas3', '2024-11-16 11:47:19', 0);

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
