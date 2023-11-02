-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 20:47:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id_especie` int(11) NOT NULL,
  `especie` varchar(25) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id_especie`, `especie`, `descripcion`) VALUES
(1, 'Canino', 'Mamífero doméstico de la familia de los cánidos, de tamaño, forma y pelaje muy diversos, según las razas, que tiene olfato muy fino y es inteligente y muy leal a su dueño. La inteligencia canina se refiere a la habilidad de un perro de procesar la información que recibe a través de sus sentidos para aprender, adaptarse y resolver problemas.\r\n'),
(2, 'Felino', 'Posee un pelaje suave y lanoso con una apariencia brillante, mantenida con una constante limpieza con la lengua. Su cuerpo es flexible, ligero, musculoso y compacto. Las patas delanteras tienen cinco dígitos y las traseras cuatro. Las garras son retráctiles, largas, afiladas, muy curvadas y comprimidas lateralmente.'),
(3, 'Roedor', 'La mayoría de los roedores tienen patas cortas, son cuadrúpedos (se mueven a cuatro patas) y son relativamente pequeños. Su característica común principal son los dos incisivos, de gran tamaño y crecimiento continuo, situados en el maxilar inferior y superior, y que solo están cubiertos de esmalte en la parte frontal.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individuos`
--

CREATE TABLE `individuos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `raza` varchar(25) NOT NULL,
  `edad` float NOT NULL,
  `color` varchar(25) NOT NULL,
  `personalidad` text NOT NULL,
  `fk_id_especie` int(11) NOT NULL,
  `imagen` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `individuos`
--

INSERT INTO `individuos` (`id`, `nombre`, `raza`, `edad`, `color`, `personalidad`, `fk_id_especie`, `imagen`) VALUES
(1, 'Chicho', 'Bobtail', 8, 'Blanco y Gris', 'Los bobtails, tan alegres y extrovertidos, son un compañero muy popular para las familias. Suelen ser de naturaleza adorable, aunque pueden ponerse nerviosos cuando juegan, por lo que deberás tener cuidado cuando haya niños pequeños cerca. Se unirán a cualquier actividad con mucho entusiasmo.', 1, ''),
(2, 'Flopi', 'Akita', 5, 'Marron', 'Flopi es dócil, activa e independiente. Su cualidad más admirable es la lealtad, se siente muy apegada a su dueño y es desconfiada con los extraños, actitud que le hace ser muy buena guardiana.', 1, ''),
(3, 'Taiga', 'Bengali', 2, 'Marron y Negro', 'Taiga muestra seguridad y confianza en sí misma y, además, es cariñosa. Es muy juguetona por naturaleza y rebosa energía. Es lista y parece que mira todo lo que la rodea, incluido al perro de la familia.', 2, ''),
(4, 'Tanque', 'Maine coon', 5, 'Gris', 'Tanque es muy amigable y sociable. En caso de ser el único gato de la casa, ve a requerir mucha atención humana. Además, es  muy charlatan, es decir, sus arrullos y maullidos te acompañarán durante todo el día. Es muy afable y tolerante con otros animales y con los niños.', 2, ''),
(5, 'Pelusa', 'Cobaya peruana', 1, 'Crema', 'Pelusa se caracteriza por su personalidad cariñosa y dócil. Tiene un marcado instinto de exploración, ya que es muy curioso y atento.', 3, ''),
(6, 'Chanchi', 'Cobaya skinny', 1, 'Marron', 'El comportamiento de Chanchi es dócil y noble en general, cuando se sienten muy a gusto y felices te lo hará saber, pero cuando no también, esto es debido a que tiene un sistema de comunicación bastante amplio, lo que nos permite saber su estado de ánimo.', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'test', '$2y$10$RzRrWpGSKJcEh/0y.lUCHOtlCPXv6e7jpeL5DqU5LTgZGLEOkmX3u'),
(2, 'webadmin', '$2y$10$Ph6By5dNH7rcCwhXPjqm/.Hcz4WaCFgb35ya7bYw6w.o.oR3X5MCm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id_especie`);

--
-- Indices de la tabla `individuos`
--
ALTER TABLE `individuos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_especie` (`fk_id_especie`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `individuos`
--
ALTER TABLE `individuos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `individuos`
--
ALTER TABLE `individuos`
  ADD CONSTRAINT `fk_id_especie` FOREIGN KEY (`fk_id_especie`) REFERENCES `especies` (`id_especie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
