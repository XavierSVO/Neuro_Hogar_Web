-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 23:48:54
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: chuturubi
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla accion
--

CREATE TABLE accion (
  id_accion int(11) NOT NULL,
  id_usuario int(11) DEFAULT NULL,
  accion varchar(30) DEFAULT NULL,
  fecha datetime DEFAULT NULL,
  pagina varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla datos
--

CREATE TABLE datos (
  datos varchar(30) DEFAULT NULL,
  fecha date DEFAULT NULL,
  id_sensor_datos int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla dispositivo
--

CREATE TABLE dispositivo (
  id_dispositivo int(11) NOT NULL,
  nombre varchar(30) DEFAULT NULL,
  id_dispositivo_usuario int(11) DEFAULT NULL,
  estado tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla menu
--

CREATE TABLE menu (
  menu_id int(11) NOT NULL,
  nombre varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla paginas
--

CREATE TABLE paginas (
  id int(11) NOT NULL,
  nombre varchar(30) DEFAULT NULL,
  enlace text DEFAULT NULL,
  id_menu int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla roles
--

CREATE TABLE roles (
  id int(11) NOT NULL,
  nombre varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla roles_paginas
--

CREATE TABLE roles_paginas (
  id_rol int(11) DEFAULT NULL,
  id_pagina int(11) DEFAULT NULL,
  estado char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla sensor
--

CREATE TABLE sensor (
  id_sensor int(11) NOT NULL,
  nombre varchar(30) DEFAULT NULL,
  estado tinyint(1) DEFAULT NULL,
  id_sensor_dispositivo int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuario
--

CREATE TABLE usuario (
  id int(11) NOT NULL,
  usuario varchar(30) DEFAULT NULL,
  contra varchar(30) DEFAULT NULL,
  id_rol int(11) DEFAULT NULL,
  estado char(1) DEFAULT NULL,
  email varchar(30) NOT NULL,
  telefono varchar(20) NOT NULL,
  id_dispositivo int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla accion
--
ALTER TABLE accion
  ADD PRIMARY KEY (id_accion),
  ADD KEY id_usuario (id_usuario);

--
-- Indices de la tabla datos
--
ALTER TABLE datos
  ADD KEY id_sensor_datos (id_sensor_datos);

--
-- Indices de la tabla dispositivo
--
ALTER TABLE dispositivo
  ADD PRIMARY KEY (id_dispositivo),
  ADD KEY id_dispositivo_usuario (id_dispositivo_usuario);

--
-- Indices de la tabla menu
--
ALTER TABLE menu
  ADD PRIMARY KEY (menu_id);

--
-- Indices de la tabla paginas
--
ALTER TABLE paginas
  ADD PRIMARY KEY (id),
  ADD KEY id_menu (id_menu);

--
-- Indices de la tabla roles
--
ALTER TABLE roles
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla roles_paginas
--
ALTER TABLE roles_paginas
  ADD KEY id_rol (id_rol),
  ADD KEY id_pagina (id_pagina);

--
-- Indices de la tabla sensor
--
ALTER TABLE sensor
  ADD PRIMARY KEY (id_sensor),
  ADD KEY id_sensor_dispositivo (id_sensor_dispositivo);

--
-- Indices de la tabla usuario
--
ALTER TABLE usuario
  ADD PRIMARY KEY (id),
  ADD KEY id_rol (id_rol);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla accion
--
ALTER TABLE accion
  MODIFY id_accion int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla menu
--
ALTER TABLE menu
  MODIFY menu_id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla paginas
--
ALTER TABLE paginas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla roles
--
ALTER TABLE roles
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla usuario
--
ALTER TABLE usuario
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla accion
--
ALTER TABLE accion
  ADD CONSTRAINT accion_ibfk_1 FOREIGN KEY (id_usuario) REFERENCES usuario (id);

--
-- Filtros para la tabla datos
--
ALTER TABLE datos
  ADD CONSTRAINT datos_ibfk_1 FOREIGN KEY (id_sensor_datos) REFERENCES sensor (id_sensor);

--
-- Filtros para la tabla dispositivo
--
ALTER TABLE dispositivo
  ADD CONSTRAINT dispositivo_ibfk_1 FOREIGN KEY (id_dispositivo_usuario) REFERENCES usuario (id);

--
-- Filtros para la tabla paginas
--
ALTER TABLE paginas
  ADD CONSTRAINT paginas_ibfk_1 FOREIGN KEY (id_menu) REFERENCES menu (menu_id);

--
-- Filtros para la tabla roles_paginas
--
ALTER TABLE roles_paginas
  ADD CONSTRAINT roles_paginas_ibfk_1 FOREIGN KEY (id_rol) REFERENCES `roles` (id),
  ADD CONSTRAINT roles_paginas_ibfk_2 FOREIGN KEY (id_pagina) REFERENCES paginas (id);

--
-- Filtros para la tabla sensor
--
ALTER TABLE sensor
  ADD CONSTRAINT sensor_ibfk_1 FOREIGN KEY (id_sensor_dispositivo) REFERENCES dispositivo (id_dispositivo);

--
-- Filtros para la tabla usuario
--
ALTER TABLE usuario
  ADD CONSTRAINT usuario_ibfk_1 FOREIGN KEY (id_rol) REFERENCES `roles` (id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
