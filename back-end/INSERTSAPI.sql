-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2023 a las 23:01:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
(1, 'Rebut', 32.00),
(2, 'Rebut', 27.00),
(3, 'Rebut', 23.00),
(4, 'Rebut', 63.00);

--
-- Volcado de datos para la tabla `liniacomandes`
--

INSERT INTO `liniacomandes` (`id`, `id_comanda`, `id_producte`, `nom_producte`, `desc_producte`, `quantitat`, `preu`, `imatge_producte`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Motxilla vermella', 'Motxilla escolar de color vermell', 1, 25, 0x696d672f696d672d6d6f7478696c6c617665726d656c6c612e706e67, '2023-10-29 20:57:52', '2023-10-29 20:57:52'),
(2, 1, 5, 'Llapis h5', 'Llapis de grafit de duresa H5', 1, 7, 0x696d672f696d672d6c6c6170697368352e706e67, '2023-10-29 20:57:52', '2023-10-29 20:57:52'),
(3, 2, 16, 'Llibre de matemàtiques', 'Llibre de matemàtiques avançades', 1, 12, 0x696d672f696d672d6c6c6962726564656d6174656d617469717565732e706e67, '2023-10-29 20:58:40', '2023-10-29 20:58:40'),
(4, 2, 19, 'Llibre de ciències', 'Llibre de ciències naturals', 1, 15, 0x696d672f696d672d6c6c6962726564656369656e636965732e706e67, '2023-10-29 20:58:40', '2023-10-29 20:58:40'),
(5, 3, 32, 'Goma de borrar blanca', "Goma d'esborrar de color blanc", 1, 1, 0x696d672f696d672d676f6d616465626f72726172626c616e63612e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(6, 3, 30, 'Quadern de notes', 'Quadern de notes per a prendre apunts', 1, 3, 0x696d672f696d672d7175616465726e64656e6f7465732e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(7, 3, 14, 'Llapis HB', 'Llapis de grafit de duresa HB', 1, 3, 0x696d672f696d672d6c6c6170697368622e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(8, 3, 25, 'Llapis 2B', 'Llapis de grafit de duresa 2B', 1, 4, 0x696d672f696d672d6c6c6170697332622e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(9, 3, 5, 'Llapis h5', 'Llapis de grafit de duresa H5', 1, 7, 0x696d672f696d672d6c6c6170697368352e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(10, 3, 4, 'Llapis h1', 'Llapis de grafit de duresa H1', 1, 5, 0x696d672f696d672d6c6c6170697368312e706e67, '2023-10-29 20:59:10', '2023-10-29 20:59:10'),
(11, 4, 13, 'Calculadora científica', 'Calculadora científica avanzada', 1, 20, 0x696d672f696d672d63616c63756c61646f72616369656e7469666963612e706e67, '2023-10-29 20:59:49', '2023-10-29 20:59:49'),
(12, 4, 20, 'Esquadra', 'Esquadra per a fer dibuixos', 1, 2, 0x696d672f696d672d65737175616472612e706e67, '2023-10-29 20:59:49', '2023-10-29 20:59:49'),
(13, 4, 32, 'Goma de borrar blanca', "Goma d'esborrar de color blanc", 1, 1, 0x696d672f696d672d676f6d616465626f72726172626c616e63612e706e67, '2023-10-29 20:59:49', '2023-10-29 20:59:49'),
(14, 4, 23, 'Carpeta blanca', 'Carpeta de color blanca per a arxivar documentos', 1, 8, 0x696d672f696d672d63617270657461626c616e63612e706e67, '2023-10-29 20:59:49', '2023-10-29 20:59:49'),
(15, 4, 21, 'Compàs', 'Compàs per a fer cercles', 1, 4, 0x696d672f696d672d636f6d7061732e706e67, '2023-10-29 20:59:49', '2023-10-29 20:59:49'),
(16, 4, 33, 'Motxilla amb estampat', 'Motxilla escolar amb estampat decoratiu', 1, 28, 0x696d672f696d672d6d6f7478696c6c61616d62657374616d7061742, '2023-10-29 20:59:49', '2023-10-29 20:59:49');

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `descripcio`, `preu`, `imatge`, `categoria_id`) VALUES
(4, 'Llapis h1', 'Llapis de grafit de duresa H1', 5, 0x696d672f696d672d6c6c6170697368312e706e67, 4),
(5, 'Llapis h5', 'Llapis de grafit de duresa H5', 7, 0x696d672f696d672d6c6c6170697368352e706e67, 4),
(6, 'Motxilla vermella', 'Motxilla escolar de color vermell', 25, 0x696d672f696d672d6d6f7478696c6c617665726d656c6c612e706e67, 1),
(7, 'Motxilla blava', 'Motxilla escolar de color blau', 15, 0x696d672f696d672d6d6f7478696c6c61626c6176612e706e67, 1),
(8, 'Carpeta lila', 'Carpeta de color lila per a arxivar documents', 10, 0x696d672f696d672d636172706574616c696c612e706e67, 2),
(9, 'Carpeta verda', 'Carpeta de color verda per a arxivar documents', 10, 0x696d672f696d672d6361727065746176657264612e706e67, 2),
(10, 'Quadern de dibuix', 'Quadern de dibuix en blanc', 4, 0x696d672f696d672d7175616465726e64656469627569782e706e67, 5),
(11, 'Llapis de colors', 'Joc de llapis de colors', 8, 0x696d672f696d672d6c6c617069736465636f6c6f72732e706e67, 4),
(12, 'Regla 30 cm', 'Regla de 30 cm per a ús escolar', 2, 0x696d672f696d672d7265676c613330636d2e706e67, 4),
(13, 'Calculadora científica', 'Calculadora científica avançada', 20, 0x696d672f696d672d63616c63756c61646f72616369656e7469666963612e706e67, 6),
(14, 'Llapis HB', 'Llapis de grafit de duresa HB', 3, 0x696d672f696d672d6c6c6170697368622e706e67, 4),
(15, "Goma d'esborrar", "Goma d'esborrar per a esborrar línies", 1, 0x696d672f696d672d676f6d61646573626f727261722e706e67, 4),
(16, 'Llibre de matemàtiques', 'Llibre de matemàtiques avançades', 12, 0x696d672f696d672d6c6c6962726564656d6174656d617469717565732e706e67, 3),
(17, 'Motxilla groga', 'Motxilla escolar de color groc', 20, 0x696d672f696d672d6d6f7478696c6c6167726f67612e706e67, 1),
(18, 'Carpeta rosa', 'Carpeta de color rosa per a arxivar documents', 8, 0x696d672f696d672d63617270657461726f73612e706e67, 2),
(19, 'Llibre de ciències', 'Llibre de ciències naturals', 15, 0x696d672f696d672d6c6c6962726564656369656e636965732e706e67, 3),
(20, 'Esquadra', 'Esquadra per a fer dibuixos', 2, 0x696d672f696d672d65737175616472612e706e67, 4),
(21, 'Compàs', 'Compàs per a fer cercles', 4, 0x696d672f696d672d636f6d7061732e706e67, 4),
(22, 'Motxilla rosa', 'Motxilla escolar de color rosa', 18, 0x696d672f696d672d6d6f7478696c6c61726f73612e706e67, 1),
(23, 'Carpeta blanca', 'Carpeta de color blanca per a arxivar documents', 8, 0x696d672f696d672d63617270657461626c616e63612e706e67, 2),
(24, "Llibre d'història", "Llibre d'història mundial", 10, 0x696d672f696d672d6c6c6962726564686973746f7269612e706e67, 3),
(25, 'Llapis 2B', 'Llapis de grafit de duresa 2B', 4, 0x696d672f696d672d6c6c6170697332622e706e67, 4),
(26, 'Llapis de tinta', 'Llapis de tinta per a escriptura', 6, 0x696d672f696d672d6c6c61706973646574696e74612e706e67, 4),
(27, 'Motxilla negra', 'Motxilla escolar de color negre', 22, 0x696d672f696d672d6d6f7478696c6c616e656772612e706e67, 1),
(28, 'Carpeta groga', 'Carpeta de color groc per a arxivar documents', 8, 0x696d672f696d672d6361727065746167726f67612e706e67, 2),
(29, 'Calculadora bàsica', 'Calculadora bàsica per a càlculs senzills', 10, 0x696d672f696d672d63616c63756c61646f72616261736963612e706e67, 6),
(30, 'Quadern de notes', 'Quadern de notes per a prendre apunts', 3, 0x696d672f696d672d7175616465726e64656e6f7465732e706e67, 5),
(31, 'Llibre de geografia', 'Llibre de geografia mundial', 11, 0x696d672f696d672d6c6c69627265646567656f6772616669612e706e67, 3),
(32, 'Goma de borrar blanca', "Goma d'esborrar de color blanc", 1, 0x696d672f696d672d676f6d616465626f72726172626c616e63612e706e67, 4),
(33, 'Motxilla amb estampat', 'Motxilla escolar amb estampat decoratiu', 28, 0x696d672f696d672d6d6f7478696c6c61616d62657374616d7061742e706e67, 1);

--
-- Volcado de datos para la tabla `tipususuari`
--

INSERT INTO `tipususuari` (`id`, `created_at`, `updated_at`, `tipus`) VALUES
(1, '2023-10-29 19:59:49', '2023-10-29 19:59:49', 'administrador'),
(2, '2023-10-29 20:00:13', '2023-10-29 20:00:13', 'treballador'),
(3, '2023-10-29 20:00:21', '2023-10-29 20:00:21', 'client');

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`id`, `created_at`, `updated_at`, `nom`, `cognoms`, `email`, `contrasenya`, `tipus`) VALUES
(1, '2023-10-29 20:03:38', '2023-10-29 20:03:38', 'Juan', 'Garcia Perez', 'juangarcia@gmail.com', 'eyJpdiI6IlhLNVFkWVdCcHdodU90UXoxTlBaV0E9PSIsInZhbHVlIjoiNUpPWW9OWUJIOXYzUkU0QmtkUlllTWczMllVMTE5b3lMeVFtUU5aNExTdz0iLCJtYWMiOiJkY2M1NzgwNmJiNzE3MzhlNzZkMWNkMjI5Yzg0NTc1NTVkZDhkMWY5ZTQzNjkzZGIzNzg4YTdlNDVhOWYzMmU3IiwidGFnIjoiIn0=', 3),
(2, '2023-10-29 20:05:15', '2023-10-29 20:05:15', 'Alberto', 'Rodriguez Nunes', 'albertorodriguez@gmail.com', 'eyJpdiI6IjhKTFUxTWxHblZELzVWVW1XWXpOZmc9PSIsInZhbHVlIjoidUlvanZMdFFuREozdHZiTXBUUWxnRmlmalNUWU0vQ0xIZ0svVWdYZ1QrRT0iLCJtYWMiOiI2ZTZlMjJiNmE0M2JhNTdkNTBkNTQ2ZjI4NGE5NmRjMmQwNDVmOWQwMWQ0Y2Q0ZDdiNTNiMzdiOGFhZGVhNjNkIiwidGFnIjoiIn0=', 1),
(3, '2023-10-29 20:06:52', '2023-10-29 20:06:52', 'Lola', 'Ramirez Lopez', 'lolaramirez@gmail.com', 'eyJpdiI6IndNWVRuMTBHazVJcWJyV2dtVERpN0E9PSIsInZhbHVlIjoiaE1FTzdoQ0NFZm5HNjdLaEh5REZScFBhcW52LzYwZTBNZEl4R1REblMxQT0iLCJtYWMiOiI3ODRiZDQ3MzJmOTFmODA0Yjc1NTA3MzJiZGYyZmNlZjM3OTFlMDVkYmMyYmExOWZjYzRjMzhmN2MwMzE2YzNjIiwidGFnIjoiIn0=', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
