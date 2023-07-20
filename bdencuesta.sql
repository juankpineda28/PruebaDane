-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2023 a las 08:11:22
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdencuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_datos_usuario`
--

CREATE TABLE `bde_datos_usuario` (
  `id_usuario_fk` int(11) NOT NULL,
  `pais_resi` varchar(250) COLLATE utf8_bin NOT NULL,
  `nacionalidad` varchar(250) COLLATE utf8_bin NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `edad` int(11) NOT NULL,
  `id_viaja_fk` int(11) NOT NULL,
  `otro_viaja` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `no_personas_viaje` int(11) NOT NULL,
  `id_motivo_fk` int(10) NOT NULL,
  `otro_motivo` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_datos_usuario`
--

INSERT INTO `bde_datos_usuario` (`id_usuario_fk`, `pais_resi`, `nacionalidad`, `sexo`, `edad`, `id_viaja_fk`, `otro_viaja`, `no_personas_viaje`, `id_motivo_fk`, `otro_motivo`) VALUES
(4, 'Colombia', 'colombia', 'M', 22, 2, '', 0, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_gastos`
--

CREATE TABLE `bde_gastos` (
  `id_gasto` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_gastos`
--

INSERT INTO `bde_gastos` (`id_gasto`, `nombre`) VALUES
(1, 'a. Paquete turístico'),
(2, 'b. Transporte Internacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_gasto_usuario`
--

CREATE TABLE `bde_gasto_usuario` (
  `id_usuario_fk` bigint(20) NOT NULL,
  `id_gasto_fk` int(11) NOT NULL,
  `hubo_gasto` char(1) COLLATE utf8_bin NOT NULL,
  `valor_pag_usted` int(11) NOT NULL,
  `tipo_mone_uste` varchar(100) COLLATE utf8_bin NOT NULL,
  `valor_terc_nogrup` int(11) NOT NULL,
  `tipo_mone_nogrup` varchar(100) COLLATE utf8_bin NOT NULL,
  `valor_terc_sigrup` int(11) NOT NULL,
  `tipo_mone_sigrup` varchar(100) COLLATE utf8_bin NOT NULL,
  `no_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_gasto_usuario`
--

INSERT INTO `bde_gasto_usuario` (`id_usuario_fk`, `id_gasto_fk`, `hubo_gasto`, `valor_pag_usted`, `tipo_mone_uste`, `valor_terc_nogrup`, `tipo_mone_nogrup`, `valor_terc_sigrup`, `tipo_mone_sigrup`, `no_personas`) VALUES
(4, 1, 's', 1000, 'dolar ', 1000, ' dolar', 1000, 'dolar', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_motivos`
--

CREATE TABLE `bde_motivos` (
  `id_motivo` int(11) NOT NULL,
  `nombre_motivo` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_pais_visita`
--

CREATE TABLE `bde_pais_visita` (
  `id_usuario_fk` bigint(20) NOT NULL,
  `pais_visita` text COLLATE utf8_bin NOT NULL,
  `noch_vi_prop` int(11) NOT NULL,
  `noch_hotaphot` int(11) NOT NULL,
  `noch_vi_famiami` int(11) NOT NULL,
  `noch_vi_alqui` int(11) NOT NULL,
  `noch_ot_tipvi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_pais_visita`
--

INSERT INTO `bde_pais_visita` (`id_usuario_fk`, `pais_visita`, `noch_vi_prop`, `noch_hotaphot`, `noch_vi_famiami`, `noch_vi_alqui`, `noch_ot_tipvi`) VALUES
(4, 'argentina', 3, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_paquetes`
--

CREATE TABLE `bde_paquetes` (
  `id` int(11) NOT NULL,
  `valor_opcion` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_paquetes`
--

INSERT INTO `bde_paquetes` (`id`, `valor_opcion`) VALUES
(1, '1. Paquete turístico organizado por una agencia de viajes en Colombia	'),
(2, '2. Paquete turístico organizado por una agencia de viajes en el país de visita'),
(3, '3. Paquete turístico organizado por terceros que no sean agencias de viajes'),
(4, '4. Viaje organizado por cuenta propia'),
(5, '5. Otro     ¿Cuál?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_servicio`
--

CREATE TABLE `bde_servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_servicio`
--

INSERT INTO `bde_servicio` (`id_servicio`, `nombre`) VALUES
(1, '1. Alojamiento'),
(2, '2. Transporte internacional '),
(4, '4. Servicios culturales y de entretenimiento.'),
(5, '5. Servicios deportivos y recreacionales.'),
(6, '6. Tours en destino (con servicio de guía).'),
(7, '7. Transporte aéreo interno en el destino'),
(8, '8. Otro transporte interno'),
(9, '9. Otro servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_usuario_organiza`
--

CREATE TABLE `bde_usuario_organiza` (
  `id_usuario_fk` int(11) NOT NULL,
  `id_organiza_fk` bigint(20) NOT NULL,
  `otro_organiza` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_usuario_organiza`
--

INSERT INTO `bde_usuario_organiza` (`id_usuario_fk`, `id_organiza_fk`, `otro_organiza`) VALUES
(4, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_usuario_servicio`
--

CREATE TABLE `bde_usuario_servicio` (
  `id_usuario_fk` bigint(20) NOT NULL,
  `id_servicio_fk` int(11) NOT NULL,
  `otro_transporte_interno` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `otro_servicio_transporte` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bde_usuario_servicio`
--

INSERT INTO `bde_usuario_servicio` (`id_usuario_fk`, `id_servicio_fk`, `otro_transporte_interno`, `otro_servicio_transporte`) VALUES
(4, 9, NULL, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bde_viaje`
--

CREATE TABLE `bde_viaje` (
  `id_viaje` int(11) NOT NULL,
  `viaje` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '51ca9146e765623457a342cebcb78755'),
(4, 'test', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'pepito', 'df6bc5e3cd6c3c61bdd423938c634bfd'),
(6, 'pepitos', '40969504daaa1c950ec1bde67087b613'),
(8, 'test2', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bde_datos_usuario`
--
ALTER TABLE `bde_datos_usuario`
  ADD PRIMARY KEY (`id_usuario_fk`);

--
-- Indices de la tabla `bde_gastos`
--
ALTER TABLE `bde_gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `bde_gasto_usuario`
--
ALTER TABLE `bde_gasto_usuario`
  ADD PRIMARY KEY (`id_usuario_fk`,`id_gasto_fk`);

--
-- Indices de la tabla `bde_motivos`
--
ALTER TABLE `bde_motivos`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Indices de la tabla `bde_pais_visita`
--
ALTER TABLE `bde_pais_visita`
  ADD PRIMARY KEY (`id_usuario_fk`);

--
-- Indices de la tabla `bde_paquetes`
--
ALTER TABLE `bde_paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bde_servicio`
--
ALTER TABLE `bde_servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `bde_usuario_organiza`
--
ALTER TABLE `bde_usuario_organiza`
  ADD PRIMARY KEY (`id_usuario_fk`,`id_organiza_fk`);

--
-- Indices de la tabla `bde_usuario_servicio`
--
ALTER TABLE `bde_usuario_servicio`
  ADD PRIMARY KEY (`id_usuario_fk`,`id_servicio_fk`);

--
-- Indices de la tabla `bde_viaje`
--
ALTER TABLE `bde_viaje`
  ADD PRIMARY KEY (`id_viaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
