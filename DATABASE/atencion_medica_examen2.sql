-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 04:38:21
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
-- Base de datos: `atencion_medica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `ID_Diagnostico` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `CondicionMedica` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `ID_Medicamento` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `NombreMedicamento` varchar(255) DEFAULT NULL,
  `Dosis` varchar(50) DEFAULT NULL,
  `InstruccionesAdministracion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID_Paciente` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestratamiento`
--

CREATE TABLE `planestratamiento` (
  `ID_PlanTratamiento` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Diagnostico` int(11) DEFAULT NULL,
  `TratamientoRecomendado` text DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadoslaboratorio`
--

CREATE TABLE `resultadoslaboratorio` (
  `ID_Resultado` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Prueba` varchar(255) DEFAULT NULL,
  `Valor` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`ID_Diagnostico`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`ID_Medicamento`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID_Paciente`);

--
-- Indices de la tabla `planestratamiento`
--
ALTER TABLE `planestratamiento`
  ADD PRIMARY KEY (`ID_PlanTratamiento`),
  ADD KEY `ID_Paciente` (`ID_Paciente`),
  ADD KEY `ID_Diagnostico` (`ID_Diagnostico`);

--
-- Indices de la tabla `resultadoslaboratorio`
--
ALTER TABLE `resultadoslaboratorio`
  ADD PRIMARY KEY (`ID_Resultado`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `ID_Diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `ID_Medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planestratamiento`
--
ALTER TABLE `planestratamiento`
  MODIFY `ID_PlanTratamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultadoslaboratorio`
--
ALTER TABLE `resultadoslaboratorio`
  MODIFY `ID_Resultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);

--
-- Filtros para la tabla `planestratamiento`
--
ALTER TABLE `planestratamiento`
  ADD CONSTRAINT `planestratamiento_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`),
  ADD CONSTRAINT `planestratamiento_ibfk_2` FOREIGN KEY (`ID_Diagnostico`) REFERENCES `diagnosticos` (`ID_Diagnostico`);

--
-- Filtros para la tabla `resultadoslaboratorio`
--
ALTER TABLE `resultadoslaboratorio`
  ADD CONSTRAINT `resultadoslaboratorio_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
