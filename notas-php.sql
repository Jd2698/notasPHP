-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2023 a las 17:27:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `prioridad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `texto`, `fecha`, `usuario_id`, `prioridad`) VALUES
(26, 'salir con valen', '2023-12-14 06:07:23', 2, 2),
(76, 'fsafsaf', '2023-12-17 14:44:03', 1, 2),
(77, 'fasfsfd', '2023-12-17 14:45:46', 1, 1),
(78, 'fsdfasf', '2023-12-17 14:45:49', 1, 2),
(79, 'fsfsaffas', '2023-12-17 14:45:53', 1, 2),
(80, 'fsafafdfsaf', '2023-12-17 14:45:57', 1, 1),
(81, 'fasdfasff', '2023-12-17 14:46:01', 1, 2),
(83, 'fsafsfasfdaf', '2023-12-17 14:46:09', 1, 2),
(84, 'fasdfsafdasfd', '2023-12-17 14:46:13', 1, 2),
(85, 'fasfsafasfsaf', '2023-12-17 14:46:16', 1, 1),
(86, 'fasfsadfaf', '2023-12-17 14:46:20', 1, 1),
(87, 'fsadfsadff', '2023-12-17 14:46:23', 1, 1),
(88, 'fsfasfsf', '2023-12-17 14:46:27', 1, 2),
(89, 'safsfasdf', '2023-12-17 14:46:31', 1, 1),
(90, 'fasdfsdfsadf', '2023-12-17 14:46:36', 1, 1),
(91, 'fasdfsff', '2023-12-17 14:46:40', 1, 2),
(92, 'fasfd', '2023-12-17 15:12:27', 1, 1),
(95, 'sofiaaa', '2023-12-17 15:45:18', 2, 1),
(96, 'fasfsfaf', '2023-12-17 15:57:02', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `name`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 1),
(2, 'sofia', 'sofia', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contraint_notas_users` (`usuario_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_contraint_notas_users` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`Id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_contraint_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
