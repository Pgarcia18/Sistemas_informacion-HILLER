-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2019 a las 20:39:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hiller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `iddetalle` int(11) NOT NULL,
  `idepedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`iddetalle`, `idepedido`, `idproducto`, `cantidad`, `subtotal`) VALUES
(1, 6, 1, 10, 100.00),
(2, 7, 1, 15, 150.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblalmacen`
--

CREATE TABLE `tblalmacen` (
  `idalmacen` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL,
  `idjefe_almacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcargo`
--

CREATE TABLE `tblcargo` (
  `idCargo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `tblcargo`
--

INSERT INTO `tblcargo` (`idCargo`, `Nombre`, `Descripcion`) VALUES
(1, 'Proveedor', ''),
(2, 'Mecanico', ''),
(3, 'Jefe de Almacen', ''),
(4, 'Almacenero', ''),
(5, 'Encargado de importaciones', 'Actividades referentes a proceso de importacion'),
(6, 'Empresa', 'Empresa Usuaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado`
--

CREATE TABLE `tblestado` (
  `idestado` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `describcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinventario_falladas`
--

CREATE TABLE `tblinventario_falladas` (
  `idinventario` int(11) NOT NULL,
  `idmaquina` int(11) NOT NULL,
  `codigo_maquina` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaquina`
--

CREATE TABLE `tblmaquina` (
  `idmaquina` int(11) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblorden_entrega`
--

CREATE TABLE `tblorden_entrega` (
  `idorden_entrega` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblorden_pedido`
--

CREATE TABLE `tblorden_pedido` (
  `idorden` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_requerida` date NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `monto` float NOT NULL,
  `observaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `tblorden_pedido`
--

INSERT INTO `tblorden_pedido` (`idorden`, `fecha_emision`, `fecha_requerida`, `idproveedor`, `monto`, `observaciones`) VALUES
(1, '0000-00-00', '2008-12-20', 0, 100, ''),
(2, '0000-00-00', '2008-12-20', 1, 100, 'caso especial'),
(3, '2019-02-04', '2019-02-20', 1, 100, 'caso excepcional'),
(4, '2019-02-04', '2019-02-20', 1, 100, 'caso excepcional'),
(5, '2019-02-04', '2019-02-20', 1, 100, 'lo que sea'),
(6, '2019-02-04', '2019-02-20', 1, 100, 'lo que sea'),
(7, '2019-02-04', '2019-02-20', 1, 150, 'asdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpersona`
--

CREATE TABLE `tblpersona` (
  `IdPersona` int(10) NOT NULL,
  `Nonbre` varchar(30) NOT NULL,
  `ApellidoPaterno` varchar(30) NOT NULL,
  `ApellidoMaterno` varchar(30) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `tblpersona`
--

INSERT INTO `tblpersona` (`IdPersona`, `Nonbre`, `ApellidoPaterno`, `ApellidoMaterno`, `Telefono`, `Direccion`, `FechaNacimiento`) VALUES
(1, 'Pamela', 'Garcia', 'Claros', 76985246, 'Av. Paragua # 2', '2000-01-23'),
(4, 'javier', 'hoyos', 'montero', 56789997, 'av san aurelio y cuarto anillo # 500', '1981-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE `tblproducto` (
  `idproducto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `medida` varchar(10) NOT NULL,
  `precio` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`idproducto`, `Nombre`, `Descripcion`, `medida`, `precio`) VALUES
(1, 'Aceite Lubricante', 'Aceite lubricante para todo tipo de maquinarias', 'Litro', 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreparacion`
--

CREATE TABLE `tblreparacion` (
  `idreparacion` int(11) NOT NULL,
  `numero_serie` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `idmecanico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltraslado`
--

CREATE TABLE `tbltraslado` (
  `idtraslado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idalmacendestino` int(11) NOT NULL,
  `id_persona_que_alisto` int(11) NOT NULL,
  `idtransportador` int(11) NOT NULL,
  `idrecepcionador` int(11) NOT NULL,
  `idjefe_almacen_origen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `Nombre` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`Nombre`, `Password`, `idPersona`, `idCargo`) VALUES
('pgarcia', '3da09e32f351a7ef679fab9af4de30678aacec26', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`iddetalle`);

--
-- Indices de la tabla `tblalmacen`
--
ALTER TABLE `tblalmacen`
  ADD PRIMARY KEY (`idalmacen`),
  ADD KEY `idjefe_almacen` (`idjefe_almacen`);

--
-- Indices de la tabla `tblcargo`
--
ALTER TABLE `tblcargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `tblinventario_falladas`
--
ALTER TABLE `tblinventario_falladas`
  ADD PRIMARY KEY (`idinventario`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `tblmaquina`
--
ALTER TABLE `tblmaquina`
  ADD PRIMARY KEY (`idmaquina`),
  ADD KEY `idestado` (`idestado`);

--
-- Indices de la tabla `tblorden_entrega`
--
ALTER TABLE `tblorden_entrega`
  ADD PRIMARY KEY (`idorden_entrega`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `tblorden_pedido`
--
ALTER TABLE `tblorden_pedido`
  ADD PRIMARY KEY (`idorden`);

--
-- Indices de la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  ADD PRIMARY KEY (`IdPersona`);

--
-- Indices de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `tblreparacion`
--
ALTER TABLE `tblreparacion`
  ADD PRIMARY KEY (`idreparacion`),
  ADD KEY `idmecanico` (`idmecanico`);

--
-- Indices de la tabla `tbltraslado`
--
ALTER TABLE `tbltraslado`
  ADD PRIMARY KEY (`idtraslado`),
  ADD KEY `id_persona_que_alisto` (`id_persona_que_alisto`),
  ADD KEY `idtransportador` (`idtransportador`),
  ADD KEY `idrecepcionador` (`idrecepcionador`),
  ADD KEY `idjefe_almacen_origen` (`idjefe_almacen_origen`),
  ADD KEY `idalmacendestino` (`idalmacendestino`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblalmacen`
--
ALTER TABLE `tblalmacen`
  MODIFY `idalmacen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcargo`
--
ALTER TABLE `tblcargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinventario_falladas`
--
ALTER TABLE `tblinventario_falladas`
  MODIFY `idinventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblmaquina`
--
ALTER TABLE `tblmaquina`
  MODIFY `idmaquina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblorden_entrega`
--
ALTER TABLE `tblorden_entrega`
  MODIFY `idorden_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblorden_pedido`
--
ALTER TABLE `tblorden_pedido`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  MODIFY `IdPersona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblreparacion`
--
ALTER TABLE `tblreparacion`
  MODIFY `idreparacion` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
