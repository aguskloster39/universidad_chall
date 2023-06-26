-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 15:28:05
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
-- Base de datos: `universidad_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombres_alumno` varchar(45) DEFAULT NULL,
  `apellidos_alumno` varchar(45) DEFAULT NULL,
  `DNI_alumno` int(11) DEFAULT NULL,
  `celular_alumno` varchar(45) DEFAULT NULL,
  `mail_alumno` varchar(45) DEFAULT NULL,
  `nacimiento_alumno` date DEFAULT NULL,
  `codigoPostal_alumno` varchar(45) DEFAULT NULL,
  `domicilio_alumno` varchar(45) DEFAULT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombres_alumno`, `apellidos_alumno`, `DNI_alumno`, `celular_alumno`, `mail_alumno`, `nacimiento_alumno`, `codigoPostal_alumno`, `domicilio_alumno`, `id_carrera`) VALUES
(1, 'lionel andres', 'Messi', 44210358, '249576213', 'mailfalso@superfalso.com', '0000-00-00', '4389C', 'av siempreviva 462', 1),
(2, 'armando esteban', 'quito', 1234567, '12456', 'mal@email.com', '2016-01-20', 'nose', 'calle falsa 123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(45) DEFAULT NULL,
  `apertura_carrera` date DEFAULT current_timestamp(),
  `id_facultad` int(11) DEFAULT NULL,
  `duracion_carrera` int(11) DEFAULT NULL,
  `descripcion_carrera` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `apertura_carrera`, `id_facultad`, `duracion_carrera`, `descripcion_carrera`) VALUES
(1, 'Ingenieria Informatica', '2023-06-24', 3, 5, 'Se centra en las tematicas de hardware y software'),
(2, 'biologia marina', '2023-06-24', 7, 4, 'estudia animales marinos'),
(3, 'Licenciatura en Psicologia', '2023-06-25', 2, 4, 'Carrera habilitante para ejercer psicologia'),
(4, 'Abogacia', '2023-06-25', 3, 4, 'Especializacion en derecho Civil y Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursadas`
--

CREATE TABLE `cursadas` (
  `id_cursada` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `primer_parcial` int(11) DEFAULT NULL,
  `segundo_parcial` int(11) DEFAULT NULL,
  `tercer_parcial` int(11) DEFAULT NULL,
  `cuarto_parcial` int(11) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL,
  `estado` enum('recursa','final','promocion') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id_facultad` int(11) NOT NULL,
  `nombre_facultad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id_facultad`, `nombre_facultad`) VALUES
(1, 'Humanidades'),
(2, 'Psicologia'),
(3, 'Derecho'),
(4, 'Economicas'),
(5, 'Ingenieria'),
(6, 'Arquitectura'),
(7, 'biologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(45) DEFAULT NULL,
  `horas_materia` int(11) DEFAULT NULL,
  `aprobacion_materia` enum('final','promocion') DEFAULT NULL,
  `id_carrera` int(11) NOT NULL,
  `anio_materia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `horas_materia`, `aprobacion_materia`, `id_carrera`, `anio_materia`) VALUES
(1, 'Derecho Politico', 180, 'final', 4, '1'),
(2, 'Derecho Comercial', 140, 'promocion', 4, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `carrera borra alumnos` (`id_carrera`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `cursadas`
--
ALTER TABLE `cursadas`
  ADD PRIMARY KEY (`id_cursada`),
  ADD KEY `materia borra cursada` (`id_materia`),
  ADD KEY `alumno borra cursada` (`id_alumno`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `carrera borra materias` (`id_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursadas`
--
ALTER TABLE `cursadas`
  MODIFY `id_cursada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `carrera borra alumnos` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursadas`
--
ALTER TABLE `cursadas`
  ADD CONSTRAINT `alumno borra cursada` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `materia borra cursada` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `carrera borra materias` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
