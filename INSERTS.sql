-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2023 a las 13:01:08
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
-- Base de datos: `materialescolar`
--

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'motxilles'),
(2, 'carpetes'),
(3, 'llibres'),
(4, 'llapis');

--
-- Volcado de datos para la tabla `comandes`
--

INSERT INTO `comandes` (`id`, `estat`, `total`) VALUES
(1, 'rebut', 25.00);

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `preu`, `imatge`, `categoria_id`) VALUES
(1, 'llapis h1', 5, NULL, 4),
(2, 'llapis h5', 7, NULL, 4),
(3, 'motxilla vermella', 25, NULL, 1),
(4, 'motxilla blava', 15, NULL, 1),
(5, 'carpeta lila', 10, NULL, 2),
(6, 'varpeta verda', 10, NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
