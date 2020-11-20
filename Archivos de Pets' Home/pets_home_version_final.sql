-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2020 a las 03:44:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pets home`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptados`
--

CREATE TABLE `adoptados` (
  `ID_Adopcion` int(11) NOT NULL,
  `Cedula` varchar(30) NOT NULL,
  `ID_Mascotas` int(11) NOT NULL,
  `Aprobado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_mascota`
--

CREATE TABLE `categoria_mascota` (
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_mascota`
--

INSERT INTO `categoria_mascota` (`ID_Categoria`, `Nombre`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Conejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `ID_Color` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`ID_Color`, `Nombre`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(3, 'Cafe'),
(4, 'Gris'),
(5, 'Dorado'),
(6, 'Blanco con manchas'),
(7, 'Castaño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_Estado` int(11) NOT NULL,
  `Estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_Estado`, `Estado`) VALUES
(1, 'Adopcion'),
(2, 'Adoptado'),
(3, 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `ID_Mascota` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Nombre_Mascota` varchar(30) NOT NULL,
  `ID_Raza` int(11) NOT NULL,
  `Edad` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Foto` text NOT NULL,
  `ID_Color` int(11) NOT NULL,
  `ID_Tamano` int(11) NOT NULL,
  `Frase` text NOT NULL,
  `Peso` varchar(30) NOT NULL,
  `ID_Sexo` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`ID_Mascota`, `ID_Categoria`, `Nombre_Mascota`, `ID_Raza`, `Edad`, `Descripcion`, `Foto`, `ID_Color`, `ID_Tamano`, `Frase`, `Peso`, `ID_Sexo`, `ID_Estado`, `Fecha`) VALUES
(12, 1, 'Perla', 1, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Pitbull-1.jpg', 3, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(13, 1, 'Milu', 1, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Pitbull-2.jpg', 3, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-30 18:33:30'),
(14, 1, 'Sakura', 1, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Pitbull-3.jpg', 2, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(15, 1, 'Milú', 1, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Pitbull-4.jpg', 5, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 21:33:30'),
(16, 1, 'Haidan', 1, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Pitbull-5.jpg', 5, 2, 'Atento y jugueton, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 18:33:30'),
(17, 1, 'Maximus', 1, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Pitbull-6.jpg', 1, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 18:33:30'),
(18, 1, 'Rex', 1, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Pitbull-7.jpg', 2, 2, 'Soy muy sociable', '22 Kilos', 1, 1, '2020-01-30 18:33:30'),
(19, 1, 'Koby', 1, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Pitbull-8.jpg', 2, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 18:33:30'),
(20, 1, 'Anubis', 2, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Bóxer-1.jpg', 5, 3, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(21, 1, 'Lorna', 2, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Bóxer-2.jpg', 5, 3, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(22, 1, 'Vicky', 2, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Bóxer-3.jpg', 5, 3, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(23, 1, 'Magdalena', 2, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Bóxer-4.jpg', 5, 3, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(24, 1, 'Marroquí', 2, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Bóxer-5.jpg', 5, 3, 'Atento y jugueton, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(25, 1, 'Bruno', 2, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Bóxer-6.jpg', 5, 3, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(26, 1, 'Mars', 2, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Bóxer-7.jpg', 5, 3, 'Soy muy sociable', '22 Kilos', 1, 1, '2020-01-30 19:33:30'),
(27, 1, 'Tony', 2, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Bóxer-8.jpg', 5, 3, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(28, 1, 'Nucita', 3, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Bulldog-1.jpg', 6, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(29, 1, 'Dulcinea', 3, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Bulldog-2.jpg', 6, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(30, 1, 'Madonna', 3, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Bulldog-3.jpg', 6, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(31, 1, 'Kiara', 3, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Bulldog-4.jpg', 6, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(32, 1, 'Gollum', 3, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Bulldog-5.jpg', 6, 2, 'Atento y jugueton, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(33, 1, 'Tomy', 3, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Bulldog-6.jpg', 6, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(34, 1, 'Gladiador', 3, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Bulldog-7.jpg', 6, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(35, 1, 'Mateo', 3, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Bulldog-8.jpg', 6, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(36, 1, 'Nucita', 4, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Chow Chow-1.jpg', 5, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(37, 1, 'Dulcinea', 4, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Chow Chow-2.jpg', 5, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(38, 1, 'Madonna', 4, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Chow Chow-3.jpg', 5, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(39, 1, 'Kiara', 4, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Chow Chow-4.jpg', 5, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(40, 1, 'Gollum', 4, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Chow Chow-5.jpg', 5, 2, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(41, 1, 'Tomy', 4, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Chow Chow-6.jpg', 5, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(42, 1, 'Gladiador', 4, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Chow Chow-7.jpg', 5, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(43, 1, 'Mateo', 4, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Chow Chow-8.jpg', 5, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(44, 1, 'Layla', 5, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Bull Terrier-1.jpg', 1, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(45, 1, 'Ursula', 5, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Bull Terrier-2.jpg', 1, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(46, 1, 'Dinastia', 5, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Bull Terrier-3.jpg', 1, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(47, 1, 'Laika', 5, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Bull Terrier-4.jpg', 1, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(48, 1, 'Nano', 5, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Bull Terrier-5.jpg', 1, 2, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(49, 1, 'Jordy', 5, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Bull Terrier-6.jpg', 1, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(50, 1, 'Pecas', 5, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Bull Terrier-7.jpg', 1, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(51, 1, 'Oxy', 5, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Bull Terrier-8.jpg', 1, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(52, 1, 'Pecas', 6, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Cocker Spaniel-1.png', 5, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(53, 1, 'Norma', 6, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Cocker Spaniel-2.jpg', 5, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(54, 1, 'Arpa', 6, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Cocker Spaniel-3.jpg', 5, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(55, 1, 'Chinita', 6, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Cocker Spaniel-4.jpeg', 5, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(56, 1, 'Mervin', 6, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Cocker Spaniel-5.jpg', 5, 2, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(57, 1, 'Nano', 6, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Cocker Spaniel-6.jpg', 5, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(58, 1, 'Mono', 6, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Cocker Spaniel-7.jpg', 5, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(59, 1, 'Rogers', 6, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Cocker Spaniel-8.jpg', 2, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(60, 1, 'Layla', 7, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Dóbermann-1.jpg', 2, 3, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(61, 1, 'Xoam', 7, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Dóbermann-2.jpg', 2, 3, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(62, 1, 'Niña', 7, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Dóbermann-3.jpg', 2, 3, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(63, 1, 'Bonnie', 7, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Dóbermann-4.jpg', 2, 3, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(64, 1, 'Jordy', 7, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Dóbermann-5.jpg', 2, 3, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(65, 1, 'Niño', 7, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Dóbermann-6.jpg', 2, 3, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(66, 1, 'Tomás', 7, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Dóbermann-7.jpg', 2, 3, 'Soy muy sociable', '22 Kilos', 1, 1, '2020-01-30 19:33:30'),
(67, 1, 'Cay', 7, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Dóbermann-8.jpg', 2, 3, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(68, 1, 'Layla', 8, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Golden Retriever-1.jpg', 5, 3, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(69, 1, 'Xoam', 8, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Golden Retriever-2.jpg', 5, 3, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(70, 1, 'Niña', 8, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Golden Retriever-3.jpg', 5, 3, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(71, 1, 'Bonnie', 8, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Golden Retriever-4.jpg', 5, 3, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(72, 1, 'Jordy', 8, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Golden Retriever-5.jpg', 5, 3, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(73, 1, 'Niño', 8, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Golden Retriever-6.jpg', 5, 3, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(74, 1, 'Tomás', 8, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Golden Retriever-7.jpg', 5, 3, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(75, 1, 'Cay', 8, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Golden Retriever-8.jpg', 5, 3, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(76, 1, 'Nieves', 9, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Pastor Alemán-1.jpg', 5, 3, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(77, 1, 'Morita', 9, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Pastor Alemán-2.jpg', 5, 3, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(78, 1, 'Sucy', 9, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Pastor Alemán-3.jpg', 5, 3, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(79, 1, 'Estrella', 9, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Pastor Alemán-4.jpg', 5, 3, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(80, 1, 'Simon', 9, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Pastor Alemán-5.jpg', 5, 3, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(81, 1, 'Felix', 9, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Pastor Alemán-6.jpg', 5, 3, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(82, 1, 'Canelo', 9, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Pastor Alemán-7.jpg', 5, 3, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(83, 1, 'Leo', 9, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Pastor Alemán-8.jpg', 5, 3, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(84, 1, 'Isabela.', 10, '3 años', 'Soy una perrita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Perro Salchicha-1.jpg', 3, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(85, 1, 'Kiara', 10, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Perro Salchicha-2.jpg', 3, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(86, 1, 'Many', 10, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Perro Salchicha-3.jpeg', 3, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(87, 1, 'Dulcinea', 10, '2 años', 'Soy una perrita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Perro Salchicha-4.jpg', 3, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(88, 1, 'Douglas', 10, '1 año', 'Soy un perrito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Perro Salchicha-5.jpg', 3, 2, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(89, 1, 'Tiyi', 10, '2 años', 'Soy un perrito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Perro Salchicha-6.jpg', 2, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(90, 1, 'Caspian', 10, '4 años', 'Soy un perrito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Perro Salchicha-7.jpg', 3, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(91, 1, 'Arcadio', 10, '1 año', 'Soy un perro tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Perro Salchicha-8.jpg', 3, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(92, 2, 'Isabela', 11, '3 años', 'Soy una gatita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Abisinio-1.jpg', 5, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(93, 2, 'Kiara', 11, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Abisinio-2.jpg', 3, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(94, 2, 'Many', 11, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Abisinio-3.jpg', 5, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(95, 2, 'Dulcinea', 11, '2 años', 'Soy una gatita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Abisinio-4.jpg', 5, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(96, 2, 'Bigotes', 11, '1 año', 'Soy un gatito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Abisinio-5.jpg', 5, 2, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(97, 2, 'Tiyi', 11, '2 años', 'Soy un gatito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Abisinio-6.jpg', 5, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(98, 2, 'Caspian', 11, '4 años', 'Soy un gatito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Abisinio-7.jpg', 5, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(99, 2, 'Arcadio', 11, '1 año', 'Soy un gato tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Abisinio-8.jpg', 5, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(100, 2, 'Nieves', 12, '3 años', 'Soy una gatita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Birmano-1.jpg', 1, 1, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(101, 2, 'Morita', 12, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Birmano-2.jpg', 1, 1, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(102, 2, 'Sucy', 12, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Birmano-3.jpg', 1, 1, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(103, 2, 'Estrella', 12, '2 años', 'Soy una gatita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Birmano-4.jpg', 1, 1, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(104, 2, 'Simon', 12, '1 año', 'Soy un gatito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Birmano-5.jpg', 1, 1, 'Atento y juguetón, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(105, 2, 'Felix', 12, '2 años', 'Soy un gatito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Birmano-6.jpg', 1, 1, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(106, 2, 'Canelo', 12, '4 años', 'Soy un gatito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Birmano-7.jpg', 1, 2, 'Soy muy sociable', '22 Kilos', 1, 2, '2020-01-30 19:33:30'),
(107, 2, 'Leo', 12, '1 año', 'Soy un gato tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Birmano-8.jpg', 1, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30'),
(108, 3, 'Perla', 13, '3 años', 'Soy una conejita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Rex-1.jpg', 3, 2, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(109, 3, 'Milu', 13, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Rex-2.jpg', 3, 2, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-30 18:33:30'),
(110, 3, 'Sakura', 13, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Rex-3.jpg', 3, 2, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(111, 3, 'Milú', 13, '2 años', 'Soy una conejita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Rex-4.jpeg', 3, 2, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 21:33:30'),
(112, 3, 'Haidan', 13, '1 año', 'Soy un conejito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Rex-5.jpg', 3, 2, 'Atento y jugueton, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 18:33:30'),
(113, 3, 'Maximus', 13, '2 años', 'Soy un conejito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Rex-6.jpg', 3, 2, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 18:33:30'),
(114, 3, 'Rexy', 13, '4 años', 'Soy un conejito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Rex-7.png', 3, 2, 'Soy muy sociable', '22 Kilos', 1, 1, '2020-01-30 18:33:30'),
(115, 3, 'Koby', 13, '1 año', 'Soy un conejo tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Rex-8.jpg', 3, 2, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 18:33:30'),
(116, 3, 'Anubis', 14, '3 años', 'Soy una conejita muy activa, cariñosa y consentida, cuando te ganas mi confianza. Busco una familia activa, que tenga experiencia en manejo de razas fuertes y mucha paciencia ya que tengo una limitación auditiva, en el parque soy sociable.', 'img/Imagenes_Mascotas/Cabeza de león-1.jpg', 5, 3, 'Cariñosa y activa', '18 Kilos', 2, 1, '2020-01-30 18:33:30'),
(117, 3, 'Lorna', 14, '1 año', 'Soy un poco tímida y nerviosa al primer contacto pero muy amorosa y juguetona cuando te ganas mi confianza. Busco una familia que haya tenido experiencia con animales nerviosos ya que necesito que me tengan paciencia y me brinden mucho amor para ganarse mi confianza.', 'img/Imagenes_Mascotas/Cabeza de león-2.jpg', 5, 3, 'Tímida pero confiable', '10 Kilos', 2, 1, '2020-01-22 18:33:30'),
(118, 3, 'Vicky', 14, '3 años', 'Mi nombre es Sakura, tengo 3 años y un peso aproximado de 20 kilos. Soy un perrito cariñoso y consentido, estoy listo para llegar a un hermoso hogar, seguro vamos a ser muy amigos, pues soy muy amoroso.', 'img/Imagenes_Mascotas/Cabeza de león-3.jpg', 5, 3, 'Me encanta jugar contigo', '20 Kilos', 2, 1, '2020-02-26 20:33:30'),
(119, 3, 'Magdalena', 14, '2 años', 'Soy una conejita cariñosa y consentida, aunque un poco tímida al primer contacto. Busco una familia activa que me saque a pasear y si tienen niños, prefiero que sean mayores de 8 años de edad.', 'img/Imagenes_Mascotas/Cabeza de león-4.jpg', 5, 3, 'Timida pero muy consentida', '18 Kilos', 2, 1, '2020-03-29 22:33:30'),
(120, 3, 'Marroquí', 14, '1 año', 'Soy un conejito cariñoso y consentido, al principio puedo ser un poco tímido mientras te ganas mi confianza. Busco una familia activa, con conocimiento en mi raza, paciente', 'img/Imagenes_Mascotas/Cabeza de león-5.jpg', 5, 3, 'Atento y jugueton, la mejor opcion', '15 Kilos', 1, 1, '2020-01-17 16:33:30'),
(121, 3, 'Bruno', 14, '2 años', 'Soy un conejito muy tranquilo y cariñoso, juguetón y sociable con otros perros en el parque. Busco una familia activa, que me saque a pasear al parque', 'img/Imagenes_Mascotas/Cabeza de león-6.jpg', 5, 3, 'Cariñoso y activo', '18 Kilos', 1, 1, '2020-01-15 08:33:30'),
(122, 3, 'Mars', 14, '4 años', 'Soy un conejito activo, consentido y cariñoso cuando te ganas mi confianza. Busco una familia tranquila', 'img/Imagenes_Mascotas/Cabeza de león-7.jpg', 5, 2, 'Soy muy sociable', '22 Kilos', 1, 1, '2020-01-30 19:33:30'),
(123, 3, 'Tony', 14, '1 año', 'Soy un conejito tranquilo, consentido y cariñoso, soy sociable con otros perros en el parque. Busco una familia activa, que me saque a jugar al parque todos los días.', 'img/Imagenes_Mascotas/Cabeza de león-8.jpg', 5, 3, 'Super activo', '20 Kilos', 1, 1, '2020-01-15 16:33:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `ID_Raza` int(11) NOT NULL,
  `Raza` varchar(80) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`ID_Raza`, `Raza`, `ID_Categoria`) VALUES
(1, 'Pitbull', 1),
(2, 'Bóxer', 1),
(3, 'Bulldog', 1),
(4, 'Chow Chow', 1),
(5, 'Bull Terrier', 1),
(6, 'Cocker Spaniel', 1),
(7, 'Dóbermann', 1),
(8, 'Golden Retriever', 1),
(9, 'Pastor Alemán', 1),
(10, 'Perro Salchicha', 1),
(11, 'Abisinio', 2),
(12, 'Birmano', 2),
(13, 'Rex', 3),
(14, 'Cabeza de león', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_Rol` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_Rol`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `ID_Sexo` int(11) NOT NULL,
  `Sexo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`ID_Sexo`, `Sexo`) VALUES
(1, 'Macho'),
(2, 'Hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamano`
--

CREATE TABLE `tamano` (
  `ID_Tamano` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tamano`
--

INSERT INTO `tamano` (`ID_Tamano`, `Nombre`) VALUES
(1, 'Pequeño'),
(2, 'Mediano'),
(3, 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cedula` varchar(30) NOT NULL,
  `Primer_Nombre` varchar(30) NOT NULL,
  `Segundo_Nombre` varchar(30) NOT NULL,
  `Primer_Apellido` varchar(30) NOT NULL,
  `Segundo_Apellido` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(300) DEFAULT NULL,
  `Imagen` varchar(60) NOT NULL,
  `ID_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cedula`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Email`, `Telefono`, `Direccion`, `Usuario`, `Contrasena`, `Imagen`, `ID_Rol`) VALUES
('1', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin@gmail.com', '123456789', 'Cll 40', 'Admin', '11ae6c88deaa71ab22a6dff24a5c027a', 'img/Imagenes_Perfil/Perfil_A.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adoptados`
--
ALTER TABLE `adoptados`
  ADD PRIMARY KEY (`ID_Adopcion`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `ID_Mascotas` (`ID_Mascotas`);

--
-- Indices de la tabla `categoria_mascota`
--
ALTER TABLE `categoria_mascota`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ID_Color`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`ID_Mascota`),
  ADD KEY `ID_Categoria` (`ID_Categoria`),
  ADD KEY `ID_Color` (`ID_Color`),
  ADD KEY `ID_Tamano` (`ID_Tamano`),
  ADD KEY `ID_Estado` (`ID_Estado`),
  ADD KEY `ID_Sexo` (`ID_Sexo`),
  ADD KEY `ID_Raza` (`ID_Raza`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`ID_Raza`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`ID_Sexo`);

--
-- Indices de la tabla `tamano`
--
ALTER TABLE `tamano`
  ADD PRIMARY KEY (`ID_Tamano`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adoptados`
--
ALTER TABLE `adoptados`
  MODIFY `ID_Adopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categoria_mascota`
--
ALTER TABLE `categoria_mascota`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `ID_Color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `ID_Mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `ID_Raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `ID_Sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tamano`
--
ALTER TABLE `tamano`
  MODIFY `ID_Tamano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adoptados`
--
ALTER TABLE `adoptados`
  ADD CONSTRAINT `adoptados_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `usuario` (`Cedula`),
  ADD CONSTRAINT `adoptados_ibfk_2` FOREIGN KEY (`ID_Mascotas`) REFERENCES `mascotas` (`ID_Mascota`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria_mascota` (`ID_Categoria`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`ID_Tamano`) REFERENCES `tamano` (`ID_Tamano`),
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`ID_Color`) REFERENCES `color` (`ID_Color`),
  ADD CONSTRAINT `mascotas_ibfk_4` FOREIGN KEY (`ID_Estado`) REFERENCES `estado` (`ID_Estado`),
  ADD CONSTRAINT `mascotas_ibfk_5` FOREIGN KEY (`ID_Sexo`) REFERENCES `sexo` (`ID_Sexo`),
  ADD CONSTRAINT `mascotas_ibfk_6` FOREIGN KEY (`ID_Raza`) REFERENCES `raza` (`ID_Raza`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria_mascota` (`ID_Categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `rol` (`ID_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
