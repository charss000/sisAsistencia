-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-10-2022 a las 13:51:32
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `Descripcion`) VALUES
(1, 'APA'),
(2, 'TAP'),
(3, 'SAS'),
(4, 'CP'),
(5, 'PS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_registros`
--

CREATE TABLE `detalle_registros` (
  `id` int(11) NOT NULL,
  `descripcion_registros` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_registros`
--

INSERT INTO `detalle_registros` (`id`, `descripcion_registros`) VALUES
(1, 'A tiempo'),
(2, 'Tarde '),
(3, 'Justificado'),
(4, 'no Asistió');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `DETALLE` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `HoraIn` time NOT NULL,
  `plazo_int_ini` time NOT NULL,
  `plazo_int_fin` time NOT NULL,
  `HoraOunt` time NOT NULL,
  `plazo_out_ini` time NOT NULL,
  `plazo_out_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `DETALLE`, `HoraIn`, `plazo_int_ini`, `plazo_int_fin`, `HoraOunt`, `plazo_out_ini`, `plazo_out_fin`) VALUES
(1, 'Regular', '08:30:00', '07:30:00', '09:30:00', '18:00:00', '17:00:00', '24:00:00'),
(2, 'seguridad-mañna', '06:00:00', '05:45:00', '06:15:00', '14:00:00', '14:00:00', '15:00:00'),
(3, 'seguridad-tarde', '14:00:00', '13:45:00', '14:15:00', '18:00:00', '18:00:00', '23:00:00'),
(4, 'seguridad-noche', '22:00:00', '21:45:00', '22:15:00', '06:00:00', '06:00:00', '06:15:00');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `DNI` int(11) NOT NULL,
  `Nombres` varchar(85) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellidos` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NunCargo` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sede_idsede` int(11) NOT NULL,
  `nivel_idNivel` int(11) NOT NULL,
  `cargo_idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembros`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_has_turno`
--

CREATE TABLE `miembros_has_turno` (
  `miembros_DNI` int(11) NOT NULL,
  `turno_idTurno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembros_has_turno`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `Descripcion`) VALUES
(1, 'PRIMARIA'),
(2, 'SECUNDARIA'),
(3, 'RA'),
(4, 'PERSONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `idRegistros` int(11) NOT NULL,
  `FechaRegistro` date NOT NULL,
  `HoraIngreso` time NOT NULL,
  `HoraSalida` time DEFAULT NULL,
  `Year` year(4) NOT NULL,
  `detalle_ingreso` int(11) NOT NULL DEFAULT '4',
  `detalle_salida` int(11) DEFAULT NULL,
  `ESTADO` int(11) NOT NULL DEFAULT '0',
  `Fecha_Modif` datetime DEFAULT NULL,
  `miembros_DNI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idsede` int(11) NOT NULL,
  `DescripcionSede` char(60) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idsede`, `DescripcionSede`) VALUES
(1, 'Tarma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `idTurno` int(11) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `horario_idHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `descripcion`, `horario_idHorario`) VALUES
(1, 'Regular', 1),
(2, 'Mañna', 2),
(3, 'Tarde', 3),
(4, 'noche', 4),
(5, 'prueba1', 5),
(6, 'prueba2', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `detalle_registros`
--
ALTER TABLE `detalle_registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `fk_miembros_sede_idx` (`sede_idsede`),
  ADD KEY `fk_miembros_nivel1_idx` (`nivel_idNivel`),
  ADD KEY `fk_miembros_cargo1_idx` (`cargo_idCargo`);

--
-- Indices de la tabla `miembros_has_turno`
--
ALTER TABLE `miembros_has_turno`
  ADD PRIMARY KEY (`miembros_DNI`,`turno_idTurno`),
  ADD KEY `fk_miembros_has_turno_turno1_idx` (`turno_idTurno`),
  ADD KEY `fk_miembros_has_turno_miembros1_idx` (`miembros_DNI`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idRegistros`,`FechaRegistro`,`miembros_DNI`),
  ADD KEY `fk_registros_miembros1_idx` (`miembros_DNI`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idsede`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idTurno`),
  ADD KEY `fk_turno_horario1_idx` (`horario_idHorario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `idRegistros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD CONSTRAINT `fk_miembros_cargo1` FOREIGN KEY (`cargo_idCargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `fk_miembros_nivel1` FOREIGN KEY (`nivel_idNivel`) REFERENCES `nivel` (`idNivel`),
  ADD CONSTRAINT `fk_miembros_sede` FOREIGN KEY (`sede_idsede`) REFERENCES `sede` (`idsede`);

--
-- Filtros para la tabla `miembros_has_turno`
--
ALTER TABLE `miembros_has_turno`
  ADD CONSTRAINT `fk_miembros_has_turno_miembros1` FOREIGN KEY (`miembros_DNI`) REFERENCES `miembros` (`DNI`),
  ADD CONSTRAINT `fk_miembros_has_turno_turno1` FOREIGN KEY (`turno_idTurno`) REFERENCES `turno` (`idTurno`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registros_miembros1` FOREIGN KEY (`miembros_DNI`) REFERENCES `miembros` (`DNI`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `fk_turno_horario1` FOREIGN KEY (`horario_idHorario`) REFERENCES `horario` (`idHorario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;