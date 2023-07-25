-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 17:00:59
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trellot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `secno` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `COLOR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`secno`, `idProyecto`, `NOMBRE`, `COLOR`) VALUES
(1, 1, 'EN ESPERA', '7e7e7e'),
(2, 1, 'EN PROCESO', '3f64ff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
`secno` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columnas`
--

CREATE TABLE IF NOT EXISTS `columnas` (
`idColumna` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `orden` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `columnas`
--

INSERT INTO `columnas` (`idColumna`, `idProyecto`, `name`, `orden`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Pendientes', 1, 1, '2023-07-22 10:36:55', '2023-07-22 10:36:55'),
(2, 1, 'En Proceso', 2, 1, '2023-07-22 10:36:55', '2023-07-22 10:36:55'),
(3, 1, 'Pruebas', 3, 1, '2023-07-22 10:38:01', '2023-07-22 10:38:01'),
(4, 1, 'Terminado', 4, 1, '2023-07-22 10:38:01', '2023-07-22 10:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `secno` int(11) NOT NULL,
  `contenido` varchar(10) NOT NULL,
  `etiquetaini` varchar(10) NOT NULL,
  `etiquetafin` varchar(10) NOT NULL,
  `fontSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`secno`, `contenido`, `etiquetaini`, `etiquetafin`, `fontSize`) VALUES
(1, '/h1', '<h1>', '</h1>', 0),
(2, '/h2', '<h2>', '</h2>', 0),
(3, '/h3', '<h3>', '</h3>', 0),
(4, '/h4', '<h4>', '</h4>', 0),
(5, '/h5', '<h5>', '</h5>', 0),
(6, '/h6', '<h6>', '</h6>', 0),
(7, '/p', '<p>', '</p>', 0),
(8, '/br', '<br>', '', 0),
(9, '/lu', '<ul>', '</ul>', 0),
(10, '/li', '<li>', '</li>', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyuectos`
--

CREATE TABLE IF NOT EXISTS `proyuectos` (
`idProyecto` int(11) NOT NULL,
  `idPropietario` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proyuectos`
--

INSERT INTO `proyuectos` (`idProyecto`, `idPropietario`, `name`, `status`, `createAt`, `updatedAt`) VALUES
(1, 1, 'proyeco gestion', 1, '2023-07-21 23:05:07', '2023-07-21 23:05:07'),
(2, 1, 'Proyecto 2', 1, '2023-07-22 13:03:00', '2023-07-22 13:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
`idTarea` int(11) NOT NULL,
  `idColum` int(11) NOT NULL,
  `idCreador` int(11) NOT NULL,
  `idAsignado` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `fechaLimite` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `body` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `idColum`, `idCreador`, `idAsignado`, `orden`, `nombre`, `fechaLimite`, `status`, `body`, `createdAt`, `updatedAt`) VALUES
(1, 1, 1, 1, 1, 'mostrar las columnas', '0000-00-00 00:00:00', 1, '/h1 Crear lista /n /p esto es un nuevo parrafo /n /lu /n /li elemento 1 /n /li elemento 2 /n /li elemento 3 /n /luu /n /ck true Esto es un check /n /br /ck false Desactivado /n', '2023-07-22 10:39:05', '2023-07-22 10:39:05'),
(2, 1, 1, 1, 2, 'Mostrar las tareas', '0000-00-00 00:00:00', 2, 'Mostrar las tareas de cada columnas', '2023-07-22 10:39:05', '2023-07-22 10:39:05'),
(3, 2, 1, 3, 1, 'Esta en proceso', '0000-00-00 00:00:00', 1, 'procesando', '2023-07-22 12:38:58', '2023-07-22 12:38:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`idUser` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `name`, `correo`, `password`, `status`) VALUES
(1, 'Manuel', 'manuel.alvarez@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`secno`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
 ADD PRIMARY KEY (`secno`);

--
-- Indices de la tabla `columnas`
--
ALTER TABLE `columnas`
 ADD PRIMARY KEY (`idColumna`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
 ADD PRIMARY KEY (`secno`);

--
-- Indices de la tabla `proyuectos`
--
ALTER TABLE `proyuectos`
 ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
 ADD PRIMARY KEY (`idTarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
MODIFY `secno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `columnas`
--
ALTER TABLE `columnas`
MODIFY `idColumna` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proyuectos`
--
ALTER TABLE `proyuectos`
MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
