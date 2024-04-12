-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2024 a las 20:13:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mirefaccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'Luis', 'orta@outlook.com', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombreC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombreC`) VALUES
(1, 'Amortiguador'),
(2, 'Llanta'),
(3, 'Faros'),
(4, 'Tornilleria'),
(5, 'Balatas'),
(6, 'Rin'),
(7, 'Retrovisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `duda` varchar(300) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellido`, `duda`, `telefono`, `correo`) VALUES
(1, 'Andres', 'Hernandez', 'asdadasdasdasd', '556450644', 'asdadadsasd'),
(2, 'Miguel', 'Perez', 'asdadasdasd', '2147483647', 'mike@gmail.com'),
(3, 'Miguel', 'Perez', 'No se como sirve', '5515529067', 'miguel@outlook.com'),
(4, 'Brenda', 'Jimenez', 'Hola, como realizo mi pago', '5515529067', 'brenda@outlook.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombreM` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombreM`) VALUES
(1, 'Quejas'),
(2, 'Devoluciones'),
(3, 'Reclamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `id_opinion` int(11) NOT NULL,
  `opinion` varchar(300) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `id_comprador`, `id_vendedor`) VALUES
(1, 'Si cumple con lo que dice', 1, 20),
(2, 'Es cumplidor, cumple con lo que oferta', 2, 20),
(3, 'Cumple con lo que  ofrece', 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `cantidad` double(10,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `fecha_inicio`, `fecha_termino`, `cantidad`) VALUES
('176945107017', '0000-00-00', '0000-00-00', 0.9999999999),
('207688746783', '2023-07-04', '2023-08-03', 0.9999999999),
('234426120238', '2023-07-10', '2023-08-09', 0.9999999999),
('356543400771', '2023-07-10', '2023-08-09', 0.9999999999),
('589207601830', '2023-07-10', '2023-08-09', 0.9999999999),
('613355280166', '2023-07-10', '2023-08-09', 0.9999999999),
('69279633224', '2023-07-03', '2023-08-02', 0.9999999999),
('947353774145', '2023-07-10', '2023-08-09', 0.9999999999),
('962181688694', '2023-07-10', '2023-08-09', 0.9999999999),
('aaaaaaaaaaaaaaaaa', '2023-06-07', '2023-06-08', 0.9999999999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas`
--

CREATE TABLE `quejas` (
  `id_queja` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `queja` text NOT NULL,
  `estado` varchar(50) NOT NULL,
  `asignar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quejas`
--

INSERT INTO `quejas` (`id_queja`, `nombre_cliente`, `email_cliente`, `queja`, `estado`, `asignar`) VALUES
(1, 'Jose', 'holaa@hotmail.com', 'comida fea', 'Asignada', 20),
(2, 'Juan', 'holaa@hotmail.com', 'comida mas fea', 'Asignada', 38),
(3, 'Juan', 'holaa@hotmail.com', 'comida super fea', 'Asignada', 20),
(4, 'Juan', 'holaa@hotmail.com', 'eqwdqw', 'Pendiente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones`
--

CREATE TABLE `refacciones` (
  `id_refaccion` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `modelo` varchar(5) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `refacciones`
--

INSERT INTO `refacciones` (`id_refaccion`, `id_marca`, `modelo`, `precio`, `descripcion`, `imagen`, `estatus`, `cantidad`, `id_categoria`, `id_vendedor`) VALUES
(1, 2, '2019', 123.00, 'aaaa', 'amortiguador-de-coche.jpg', 'Nueva', 4, 1, 20),
(2, 1, '2018', 1500.00, 'Llantas nuevas para Audi(no incluye el rin)', 'dos.jpg', 'Nueva', 15, 2, 20),
(3, 3, '2020', 2500.00, 'Faros para Chevrolet 2010 seminuevos', 'siete.jpg', 'Seminueva', 1, 3, 29),
(6, 1, '2', 1.00, '1211', 'banner.jpg', 'Nueva', 1, 1, 30),
(7, 1, '12', 33.00, 'sawdqwd', '661.png', 'Nueva', 2, 1, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_comprador` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_comprador`, `nombre`, `telefono`, `correo`, `contrasena`) VALUES
(1, 'antonio', '11111111', 'annotio@outlook.com', '123456789123'),
(2, 'Jesus', '2147483647', 'jecamps24@gmail.com', 'Emma12nov192'),
(3, 'andres', '5515529067', 'Andres@hotmail.com', '123'),
(4, 'MasterTeam', '556450644a', 'jecamps24@gmail.com', '111'),
(5, 'Fer', '5575985485', 'hola@hotmail.com', 'Juancarlos_123'),
(6, 'Orta', '5896897984', 'Luis@hotmail.com', 'Juancarlos_1234'),
(7, 'Julio', '5578830302', 'hola@hotmail.com', '1234567891514'),
(8, 'Julio', '1234567896', 'hola@hotmail.com', '123'),
(9, 'Lopez', '5578830302', 'hola@hotmail.com', '123456789101213'),
(11, 'Luis', '5578830302', 'hola@hotmail.com', 'Juancarlos_123'),
(12, 'Andre Sebastian', '5596857485', 'Andre@hotmail.com', 'abc12345678941'),
(13, 'Juandass', '8985747444', 'jorge@hotmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id_vendedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_pago` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id_vendedor`, `nombre`, `telefono`, `correo`, `contraseña`, `imagen`, `id_pago`) VALUES
(20, 'TeamBinarioII', '5564506443', 'jecamps24@gmail.com', '123456789123', 'VACIO 3.jfif', 'aaaaaaaaaaaaaaaaa'),
(29, 'jose', '5564506442', 'jose@outlook.com', 'asdasdasasdad', 'jose.png', '69279633224'),
(30, 'juan', '21312312', 'luis@gmail.com', '1234567891011', 'png-transparent-super-mario-run-super-mario-bros-new-super-mario-bros-super-mario-super-mario-bros-hand-nintendo.png', '207688746783'),
(31, 'juan', '21312312', 'luis@gmail.com', '123312312313213', '661.png', '589207601830'),
(38, 'juan', '21312312', 'Prueba1@gmail.com', '1234567898765', '661.png', '234426120238');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `id_comprador` (`id_comprador`,`id_vendedor`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD PRIMARY KEY (`id_queja`),
  ADD KEY `asignar` (`asignar`);

--
-- Indices de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD PRIMARY KEY (`id_refaccion`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_comprador`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `pagos_ibfk_1` (`id_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `quejas`
--
ALTER TABLE `quejas`
  MODIFY `id_queja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  MODIFY `id_refaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_comprador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`id_comprador`) REFERENCES `usuarios` (`id_comprador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `opiniones_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD CONSTRAINT `quejas_ibfk_1` FOREIGN KEY (`asignar`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD CONSTRAINT `refacciones_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `refacciones_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `refacciones_ibfk_3` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_pago`) REFERENCES `pagos` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
