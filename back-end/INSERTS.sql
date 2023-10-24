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
(1, 'Motxilles'),
(2, 'Carpetes'),
(3, 'Llibres'),
(4, 'Llapis'),
(5, 'Quaderns'),
(6, 'Calculadores');

--
-- Volcado de datos para la tabla `comandes`
--

INSERT INTO `comandes` (`id`, `estat`, `total`) VALUES
(1, 'rebut', 25.00);

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `descripcio`, `preu`, `imatge`, `categoria_id`) VALUES
(1, 'Llapis h1', 'Llapis de grafit de duresa H1', 5, NULL, 4),
(2, 'Llapis h5', 'Llapis de grafit de duresa H5', 7, NULL, 4),
(3, 'Motxilla vermella', 'Motxilla escolar de color vermell', 25, NULL, 1),
(4, 'Motxilla blava', 'Motxilla escolar de color blau', 15, NULL, 1),
(5, 'Carpeta lila', 'Carpeta de color lila per a arxivar documents', 10, NULL, 2),
(6, 'Carpeta verda', 'Carpeta de color verda per a arxivar documents', 10, NULL, 2),
(7, 'Quadern de dibuix', 'Quadern de dibuix en blanc', 4, NULL, 5),
(8, 'Llapis de colors', 'Joc de llapis de colors', 8, NULL, 4),
(9, 'Regla 30 cm', 'Regla de 30 cm per a ús escolar', 2, NULL, 4),
(10, 'Calculadora científica', 'Calculadora científica avançada', 20, NULL, 6),
(11, 'Llapis HB', 'Llapis de grafit de duresa HB', 3, NULL, 4),
(12, "Goma d'esborrar", "Goma d'esborrar per a esborrar línies", 1, NULL, 4),
(13, 'Llibre de matemàtiques', 'Llibre de matemàtiques avançades', 12, NULL, 3),
(14, 'Motxilla groga', 'Motxilla escolar de color groc', 20, NULL, 1),
(15, 'Carpeta rosa', 'Carpeta de color rosa per a arxivar documents', 8, NULL, 2),
(16, 'Llibre de ciències', 'Llibre de ciències naturals', 15, NULL, 3),
(17, 'Esquadra', 'Esquadra per a fer dibuixos', 2, NULL, 4),
(18, 'Compàs', 'Compàs per a fer cercles', 4, NULL, 4),
(19, 'Motxilla rosa', 'Motxilla escolar de color rosa', 18, NULL, 1),
(20, 'Carpeta blanca', 'Carpeta de color blanca per a arxivar documents', 8, NULL, 2),
(21, "Llibre d'història", "Llibre d'història mundial", 10, NULL, 3),
(22, 'Llapis 2B', 'Llapis de grafit de duresa 2B', 4, NULL, 4),
(23, 'Llapis de tinta', 'Llapis de tinta per a escriptura', 6, NULL, 4),
(24, 'Motxilla negra', 'Motxilla escolar de color negre', 22, NULL, 1),
(25, 'Carpeta groga', 'Carpeta de color groc per a arxivar documents', 8, NULL, 2),
(26, 'Calculadora bàsica', 'Calculadora bàsica per a càlculs senzills', 10, NULL, 6),
(27, 'Quadern de notes', 'Quadern de notes per a prendre apunts', 3, NULL, 5),
(28, 'Llibre de geografia', 'Llibre de geografia mundial', 11, NULL, 3),
(29, 'Goma de borrar blanca', "Goma d'esborrar de color blanc", 1, NULL, 4),
(30, 'Motxilla amb estampat', 'Motxilla escolar amb estampat decoratiu', 28, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
