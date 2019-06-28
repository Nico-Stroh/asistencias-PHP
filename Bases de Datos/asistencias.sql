-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2019 a las 00:30:15
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idAlumnos` int(11) NOT NULL,
  `idClase` int(11) NOT NULL,
  `presente` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `idProfesores` int(11) NOT NULL,
  `key` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edadMin` int(11) NOT NULL,
  `edadMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `idProfesores`, `key`, `edadMin`, `edadMax`) VALUES
(1, 'Clase 1 (Hasta 2)', 0, '1234', 0, 2),
(2, 'Clase 2 (3 y 4)', 0, '1234', 3, 4),
(3, 'Clase 3 (5 y 6)', 0, '1234', 5, 6),
(4, 'Clase 4 (7 y 8)', 0, '1234', 7, 8),
(5, 'Clase 5 (9 y 10)', 0, '1234', 9, 10),
(6, 'Clase 6 (11 a 13)', 0, '1234', 11, 13),
(7, 'Clase 7 (14 a 18)', 0, '1234', 14, 18),
(8, 'Clase 8 (Discipulado)', 0, '1234', 20, 100),
(9, 'Clase 9 (Adultos)', 0, '1234', 20, 100),
(10, 'Administracion', 0, '123456', 0, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombreP` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `telefono` int(20) NOT NULL,
  `direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesoresenclase`
--

CREATE TABLE `profesoresenclase` (
  `idPC` int(11) NOT NULL,
  `anio` date NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumnos`,`idClase`),
  ADD KEY `idClase` (`idClase`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesores` (`idProfesores`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesoresenclase`
--
ALTER TABLE `profesoresenclase`
  ADD PRIMARY KEY (`idPC`),
  ADD KEY `idProfesor` (`idProfesor`,`idClase`),
  ADD KEY `idClase` (`idClase`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesoresenclase`
--
ALTER TABLE `profesoresenclase`
  MODIFY `idPC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`idClase`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `profesoresenclase`
--
ALTER TABLE `profesoresenclase`
  ADD CONSTRAINT `profesoresenclase_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`id`),
  ADD CONSTRAINT `profesoresenclase_ibfk_2` FOREIGN KEY (`idClase`) REFERENCES `clases` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
