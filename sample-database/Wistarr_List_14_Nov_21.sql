-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: eu-cdbr-west-01.cleardb.com
-- Tiempo de generación: 14-11-2021 a las 22:24:53
-- Versión del servidor: 5.6.50-log
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heroku_fbf0aaa5d3f4b01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `store` varchar(100) DEFAULT NULL,
  `console` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `user_id`, `name`, `store`, `console`) VALUES
(1, 3, 'Tales of Symphonia', 'Steam', 'PC'),
(2, 9, 'The Witcher 2: Assassin of Kings', 'Stean', 'PC'),
(3, 3, 'Bayonetta', NULL, 'PC'),
(4, 11, 'Animal Crossing: Wild World', 'Amazon', 'Nintendo DS'),
(5, 11, 'XCOM: Enemy Unknown', 'Steam', 'PC'),
(6, 11, 'NIER Replicant', 'PSN', 'PS4'),
(15, 11, 'Valkyria Chronicles 2', 'PSN', 'PS Vita'),
(25, 15, 'Pokken Tournament DX', 'eShop', 'Nintendo Switch');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'jdoe', 'jdoe@gmail.com', '$2y$10$dW1Hxst2IdZgh78rsBzYhuZKMbYsi6GFhY5qOp3OGz7AD0zj/H3Lu', '2020-01-30 21:10:50'),
(9, 'lucas', 'lucas@gmail.com', '$2y$10$OGDQ9.lTlx5WCpKS2Cb2yOJMSMmpO6KLPMQtbXodMov30QmVMo3Ay', '2020-01-30 21:28:31'),
(11, 'eduardorpg64', 'eduardo@gmail.com', '$2y$10$oe4/sicvVS4fLoC0/p6L9.Bjh6sdy.B/zJ3eIodpwoNVuZXQ6ACNG', '2020-02-02 19:53:43'),
(15, 'eduardo1', 'eduardo1@gmail.com', '$2y$10$o6uVusXQV4VECoaWmsb5ZefkIWrAxRtjbNFT5XRlEszz1iOIySiM6', '2021-11-14 21:03:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
