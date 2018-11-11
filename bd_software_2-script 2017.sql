-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 08-12-2017 a las 11:11:45
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_software_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_poblado`
--

CREATE TABLE `centro_poblado` (
  `idcentro_poblado` int(11) NOT NULL,
  `iddistrito` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `importe` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centro_poblado`
--

INSERT INTO `centro_poblado` (`idcentro_poblado`, `iddistrito`, `nombre`, `importe`) VALUES
(1, 1, 'Nueva San Martin', 100),
(2, 1, 'C.P Nuevo Bambamarca', 14),
(3, 1, 'Polvora', 30),
(4, 1, 'Shunte', 26),
(5, 1, 'CP. Villa Palma', 16),
(6, 1, 'Nuevo Horizonte', 16),
(7, 1, 'Ramal de Cachiyacu', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`) VALUES
(1, 'ENVIANDO'),
(12, 'Huanuco'),
(13, 'Lima'),
(14, 'Arequipa'),
(15, 'Tumbes'),
(16, 'Tocache'),
(17, 'Amazonas'),
(18, 'Ancash'),
(19, 'Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_entrega`
--

CREATE TABLE `departamento_entrega` (
  `iddepartamento_entrega` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento_entrega`
--

INSERT INTO `departamento_entrega` (`iddepartamento_entrega`, `origen`, `destino`) VALUES
(12, 12, 13),
(13, 13, 14),
(15, 16, 14),
(17, 12, 17),
(18, 12, 18),
(19, 16, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_envio_encomienda`
--

CREATE TABLE `detalle_envio_encomienda` (
  `iddetalle` int(11) NOT NULL,
  `idenvio_encomienda` int(11) NOT NULL,
  `idsub_tipo_correspondencia` int(11) NOT NULL,
  `consignado` varchar(45) NOT NULL,
  `idzona` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_envio_encomienda`
--

INSERT INTO `detalle_envio_encomienda` (`iddetalle`, `idenvio_encomienda`, `idsub_tipo_correspondencia`, `consignado`, `idzona`, `cantidad`, `descripcion`) VALUES
(1, 1, 14, 'LOREM', 17, 2, 'LOREM'),
(2, 2, 15, 'Juan Ricardo Luis', 20, 2, 'Los datos'),
(4, 840299995, 11, 'LOREM', 20, 2, 'LORME'),
(5, 840299997, 11, 'LOREM', 20, 2, 'LOREM'),
(6, 840299998, 11, 'Renzo Paquiero Silva', 20, 3, 'Direccion Jr: Atahualpa 353'),
(7, 840299999, 11, 'Renzo Paquiero Silva', 20, 2, '98989988'),
(8, 840300000, 11, 'Renzo Paquiero Silva', 20, 2, '988838383'),
(9, 840300000, 11, 'Renzo Paquiero Silva', 20, 2, 'Jr:Pucallpa 384'),
(12, 840300003, 11, 'j├▒ajs', 20, 2, '├▒f├▒dsj'),
(14, 840300005, 11, 'lorem', 20, 2, 'lorem'),
(15, 840300006, 11, 'lorem', 20, 2, 'lorem'),
(16, 840300007, 13, 'Manuel Miranda Pedro', 20, 2, 'Jr:Callao 939'),
(17, 840300008, 15, 'lorem', 20, 12, 'lorem'),
(18, 840300008, 15, 'lorem', 20, 3, 'lorem'),
(19, 840300009, 14, 'lorem', 20, 2, 'lorem'),
(20, 840300010, 11, 'Reny Zegarra', 20, 2, 'jr: olivos'),
(21, 840300011, 11, 'Juan Perez Garcia', 19, 1, 'sobre de documentos'),
(22, 840300011, 11, 'Juan Perez Garcia', 28, 2, 'documentos'),
(23, 840300012, 13, 'Juan Perez Cueva', 19, 2, 'documentos'),
(24, 840300012, 18, 'Juan Perez Cueva', 29, 2, 'documentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_liquidacion`
--

CREATE TABLE `detalle_liquidacion` (
  `iddetalle_liquidacion` int(11) NOT NULL,
  `idliquidacion_movilidad` int(11) NOT NULL,
  `idcentro_poblado` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_liquidacion`
--

INSERT INTO `detalle_liquidacion` (`iddetalle_liquidacion`, `idliquidacion_movilidad`, `idcentro_poblado`, `cantidad`, `fecha`) VALUES
(21, 29, 3, 2, '2017-01-31'),
(22, 29, 6, 2, '2017-01-31'),
(38, 31, 1, 2, '2017-02-05'),
(39, 31, 2, 2, '2017-02-05'),
(40, 31, 4, 10, '2017-02-05'),
(41, 31, 2, 2, '2017-02-05'),
(42, 32, 6, 2, '2017-02-14'),
(43, 32, 7, 2, '2017-02-14'),
(44, 32, 1, 2, '2017-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_valija`
--

CREATE TABLE `detalle_valija` (
  `iddetalle_valija` int(11) UNSIGNED ZEROFILL NOT NULL,
  `idvalija` int(11) NOT NULL,
  `idenvio_encomienda` int(11) NOT NULL,
  `iddepartamento_entrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_valija`
--

INSERT INTO `detalle_valija` (`iddetalle_valija`, `idvalija`, `idenvio_encomienda`, `iddepartamento_entrega`) VALUES
(00000000001, 25, 840299995, 15),
(00000000002, 26, 1, 15),
(00000000003, 27, 1, 15),
(00000000004, 28, 840299997, 15),
(00000000005, 29, 840299995, 15),
(00000000006, 29, 840300000, 15),
(00000000007, 30, 840300010, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `iddistrito` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`iddistrito`, `idprovincia`, `nombre`) VALUES
(1, 1, 'Tocache');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_encomienda`
--

CREATE TABLE `envio_encomienda` (
  `idenvio_encomienda` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `tipo_comprobante` varchar(1) NOT NULL,
  `fecha` date NOT NULL,
  `serie` int(4) DEFAULT NULL,
  `correlativo` int(7) DEFAULT NULL,
  `numero_boleta` int(7) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `igv` decimal(4,2) DEFAULT NULL,
  `estado` int(4) NOT NULL,
  `codigo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envio_encomienda`
--

INSERT INTO `envio_encomienda` (`idenvio_encomienda`, `idpersona`, `tipo_comprobante`, `fecha`, `serie`, `correlativo`, `numero_boleta`, `total`, `igv`, `estado`, `codigo`) VALUES
(1, 9, 'F', '2017-02-23', 1, 1, NULL, '10.00', '18.00', 16, '99898998982'),
(2, 9, 'B', '2017-02-09', NULL, NULL, 1, '30.00', NULL, 16, '08098894389'),
(840299995, 12, 'F', '2017-02-11', 1, 2, NULL, '35.40', '18.00', 14, '31567920874'),
(840299997, 12, 'F', '2017-02-11', 1, 3, NULL, '35.40', '18.00', 14, '00140741535'),
(840299998, 12, 'F', '2017-02-13', 1, 4, NULL, '53.10', '18.00', 16, '45545259842'),
(840299999, 12, 'F', '2017-02-13', 1, 5, NULL, '35.40', '18.00', 16, '72941483915'),
(840300000, 12, 'F', '2017-02-13', 1, 6, NULL, '70.80', '18.00', 14, '74027695073'),
(840300003, 12, 'F', '2017-02-13', 1, 7, NULL, '35.40', '18.00', 16, '93574607610'),
(840300005, 12, 'F', '2017-02-13', 1, 8, NULL, '35.40', '18.00', 16, '90896824668'),
(840300006, 7, 'F', '2017-02-13', 1, 9, NULL, '35.40', '18.00', 16, '52661948873'),
(840300007, 12, 'B', '2017-02-13', 0, NULL, 2, '30.00', NULL, 16, '34495596219'),
(840300008, 12, 'B', '2017-02-13', 0, NULL, 3, '225.00', NULL, 14, '07554993416'),
(840300009, 13, 'F', '2017-02-14', 1, 10, NULL, '35.40', '18.00', 16, '34151943937'),
(840300010, 15, 'F', '2017-02-14', 1, 11, NULL, '35.40', '18.00', 12, '67170010399'),
(840300011, 12, 'F', '2017-02-15', 1, 12, NULL, '19.47', '18.00', 16, '33773193545'),
(840300012, 13, 'B', '2017-02-15', 0, NULL, 4, '29.00', NULL, 14, '18437632473');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_movilidad`
--

CREATE TABLE `liquidacion_movilidad` (
  `idliquidacion_movilidad` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `total` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `liquidacion_movilidad`
--

INSERT INTO `liquidacion_movilidad` (`idliquidacion_movilidad`, `idpersona`, `estado`, `total`, `fecha`) VALUES
(29, 8, '1', 46, '2017-01-31'),
(31, 8, '1', 154, '2017-02-05'),
(32, 8, '1', 146, '2017-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apell_paterno` varchar(20) NOT NULL,
  `apell_materno` varchar(20) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `numero_documento` varchar(15) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `inicio_contrato` date DEFAULT NULL,
  `fin_contrato` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo`, `nombre`, `apell_paterno`, `apell_materno`, `tipo_documento`, `numero_documento`, `direccion`, `telefono`, `inicio_contrato`, `fin_contrato`) VALUES
(7, 'Cliente', 'Juan Martin', 'Alvarez', 'Juares', 'DNI', '38942398', 'Jr: Los Pinos', '988865432', '2017-01-04', '2017-01-09'),
(8, 'Trabajador', 'Miguel Angel', 'Puente', 'Rivera', 'DNI', '89548954', 'Jr: Los Pinos', '987783487', '2016-12-01', '2017-03-31'),
(9, 'Trabajador', 'Renny ', 'Zegarra', 'Barzola', 'DNI', '48785487', 'Jr: Puente Nueva Vista', '923322332', '2016-02-03', '2017-01-12'),
(10, 'Cliente', 'Behman', 'Heras', 'Herrera', 'DNI', '78783287', 'Jr: Santa Cruz 646', '988783287', NULL, NULL),
(11, 'Cliente', 'Juan ', 'Nu├▒ez', 'Romario', 'DNI', '89898893', 'Jr: Ucayali 563', '998989982', NULL, NULL),
(12, 'Cliente', 'Abel Saul', 'Miraval', 'Gomez', 'DNI', '89893298', 'Jr: Amazonas', '0394803', NULL, NULL),
(13, 'Cliente', 'Raul', 'Villareal', 'Porras', 'DNI', '98893289', 'Jr: Rosales 454', '988989893', NULL, NULL),
(14, 'Cliente', 'Raul', 'Garcia', 'Juares', 'DNI', '72387046', 'Jr:Cahuide 172', '954184365', NULL, NULL),
(15, 'Cliente', 'jose', 'pe├▒a', 'retiz', 'DNI', '8928392', 'jr: cajarmarca 456', '94394934', NULL, NULL),
(18, 'Inactivo', 'Luis', 'Hilario', 'Huaman', 'DNI', '80328302', 'Jr: pINO', '238023902', '2017-11-08', '2017-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `idpeso` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `minimo` varchar(7) NOT NULL,
  `maximo` varchar(7) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peso`
--

INSERT INTO `peso` (`idpeso`, `nombre`, `minimo`, `maximo`, `fecha`, `estado`) VALUES
(7, 'Peso 1', '1 grs', '20 grs', '2017-01-29 10:49:42', '1'),
(8, 'Peso 2', '21 grs', '1 kg', '2017-02-02 11:24:25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idprovincia` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idprovincia`, `iddepartamento`, `nombre`) VALUES
(1, 12, 'tocache');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_tipo_correspondencia`
--

CREATE TABLE `sub_tipo_correspondencia` (
  `idsub_tipo_correspondencia` int(11) NOT NULL,
  `idtipo_correspondencia` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sub_tipo_correspondencia`
--

INSERT INTO `sub_tipo_correspondencia` (`idsub_tipo_correspondencia`, `idtipo_correspondencia`, `nombre`, `descripcion`) VALUES
(11, 3, 'Domiciliario', 'Las domiciliarias'),
(12, 3, 'Apartado', 'Las apartados'),
(13, 3, 'Estafeto', 'Las estafetos'),
(14, 4, 'SEN', 'Las correpondencias'),
(15, 3, 'Certificado', 'Las certificado'),
(16, 4, 'Certificado', 'certificado'),
(17, 4, 'JJI-TPP', 'son correspondencias certificadas'),
(18, 4, 'Over', 'lorem'),
(19, 4, 'Otros', 'otros paquetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_correspondencia`
--

CREATE TABLE `tipo_correspondencia` (
  `idtipo_correspondencia` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_correspondencia`
--

INSERT INTO `tipo_correspondencia` (`idtipo_correspondencia`, `nombre`, `descripcion`) VALUES
(3, 'Ordinarias', 'Las correspondencias ordinarias'),
(4, 'Certificadas', 'Las correspondencias certificadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Trabajador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `tipo_usuario`) VALUES
(1, 'Abel Saul Miraval Gomez', 'abel.miraval@unas.edu.pe', '$2y$10$90/TymEC5ypIwaqpgPpGduN9vz4bEBelg602l92HhoZN5qJnxjqYG', 'jFvS4pc1AcqRg91RMNuPcqnJjlKrLQklYZgSaTEJ3m0a1BqdP2IGUaX5w5jD', '2017-02-02 20:06:13', '2017-02-16 01:22:31', 1),
(2, 'Renny ', 'renny@unas.edu.pe', '$2y$10$5kPkn7LFUelm/EaujS03t.0iNh71MXSZP79WxQwgzbdtNGGn9UDXS', 'Qrt3fsULvVYy0NyPA7RiOCNs2vKCzo7SInHm3fa8hiVbv8M2KBsnpo3SBK70', '2017-02-02 20:28:03', '2017-02-16 01:20:17', 2),
(3, 'Chino', 'chino@samuray.com', '$2y$10$HTFy2m2ComytlY1GKFhv6ueev6gQhBahmCPHx/tcqsBoLBrz2OyIG', NULL, '2017-02-03 21:17:45', '2017-02-03 21:17:45', 0),
(4, 'renny', 'renny@gmail.com', '$2y$10$OqAdbY.B/bxSzD/ymZoWK.JyNnnpbkvAcIm4KzZlzbxCrp.DKL7s2', NULL, '2017-02-04 22:57:21', '2017-02-04 22:57:21', 0),
(5, 'julio mendoza', 'saul@gmail.com', '$2y$10$LnPo0CWCqxFQhypqVBF9c.D4t7.lBeCmAOMZJfOPoXGYBxt3hn94G', NULL, '2017-02-13 03:27:17', '2017-02-13 03:27:17', 0),
(6, 'abel@unas.edu.pe', 'saul@unas.edu.pe', '$2y$10$I3FoqG/b0Zl602vNLCQ6quiUIz703g7YgVWZS6LtXx9N.tk4n4TXG', 'OIv5cE6nVXZc0szHqKwvyp8N26Kjpr7FkZrp6H5YKHxBb9wLCwzWUvHEVb53', '2017-02-14 17:39:41', '2017-02-16 01:21:05', 0),
(7, 'Luis  Hilario Huaman', 'hilario@unas.edu.pe', '$2y$10$nG3obfRl7QoZOZOuatTN8eOYGSVkYDxvL6cZ2RIFM2sw584mcW5GS', NULL, '2017-02-14 18:33:05', '2017-02-14 18:33:05', 2),
(8, 'ljds', 'alfkjsl@unas.edu.pe', '$2y$10$kezULq6SoPhmKtJ2pvdjUudYZ9YNsXxBQbf1ExwOs05U9BNVr7WPq', '4v8Qro6PQ7vKwuySBbeSCbRuCUhuGr3wVGuZ760TV6fbbkfQ4pv5iiyKpZuk', '2017-02-14 21:08:15', '2017-02-14 21:24:45', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valija`
--

CREATE TABLE `valija` (
  `idvalija` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valija`
--

INSERT INTO `valija` (`idvalija`, `descripcion`, `fecha`, `estado`) VALUES
(8, 'lorem', '2017-02-06', 'A'),
(9, 'lorem', '2017-02-06', 'E'),
(10, 'lorem', '2017-02-06', '1'),
(11, 'lorem', '2017-02-06', '1'),
(12, 'lorem final', '2017-02-06', '1'),
(14, 'lorem final del final', '2017-02-06', '1'),
(21, 'lorem', '2017-02-06', '1'),
(22, 'lorem saul', '2017-02-06', '1'),
(23, 'lk', '2017-02-09', '1'),
(24, '├▒kfg├▒kvc', '2017-02-09', '1'),
(25, 'lorem', '2017-02-11', '1'),
(26, 'lorem', '2017-02-11', '1'),
(27, 'lorem', '2017-02-11', '1'),
(28, 'sldf', '2017-02-11', '1'),
(29, 'valija de una cajita', '2017-02-13', '1'),
(30, 'cajita negra', '2017-02-14', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idzona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `iddepartamento_entrega` int(11) NOT NULL,
  `idpeso` int(11) NOT NULL,
  `tarifa` double NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idzona`, `nombre`, `descripcion`, `iddepartamento_entrega`, `idpeso`, `tarifa`, `fecha`, `estado`) VALUES
(14, 'Zona 1', 'lorem', 12, 7, 20, '2017-01-29 10:49:58', '0'),
(16, 'Zona 1', 'jsdfl', 13, 7, 40, '2017-02-01 18:46:41', '0'),
(17, 'Zona 1', 'Zonas cercanas a la ciudad', 17, 7, 3, '2017-02-02 11:27:04', '0'),
(18, 'Zona 2', 'Zonas un poco alejadas de la ciudad', 17, 7, 4, '2017-02-02 11:27:57', '1'),
(19, 'Zona 1', 'Zonas cercanas', 15, 7, 2.5, '2017-02-06 09:34:59', '1'),
(20, 'Zona 2', 'Zonas un poco alejadas de la ciudad', 19, 8, 10, '2017-02-09 10:59:56', '1'),
(21, 'Zona 2', 'zonas un poco alejadas de la ciudad', 13, 7, 5, '2017-02-15 12:33:31', '0'),
(22, 'Zona 3', 'zona alejada', 19, 7, 7, '2017-02-15 12:36:15', '1'),
(23, 'Zona 1', 'zona cercanas a la ciudad', 19, 7, 2.5, '2017-02-15 12:38:32', '1'),
(24, 'Zona 2', 'zona un poco alejadas de la ciudad', 15, 7, 6, '2017-02-15 12:40:36', '1'),
(25, 'Zona 3', 'zona alejadas de la ciudad', 15, 7, 10, '2017-02-15 12:41:26', '1'),
(26, 'Zona 1', 'zona cercanas a la ciudad', 19, 8, 7, '2017-02-15 12:44:51', '1'),
(27, 'Zona 3', 'zona alejadas de la ciudad', 19, 8, 13, '2017-02-15 12:45:08', '1'),
(28, 'Zona 1', 'zona cercanas a la ciudad', 15, 8, 7, '2017-02-15 12:45:35', '1'),
(29, 'Zona 2', 'zona un poco alejadas de la ciudad', 15, 8, 12, '2017-02-15 12:46:02', '1'),
(30, 'Zona 3', 'zona alejada de la ciudad', 15, 8, 16, '2017-02-15 12:46:36', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centro_poblado`
--
ALTER TABLE `centro_poblado`
  ADD PRIMARY KEY (`idcentro_poblado`),
  ADD KEY `fk_ciudad_distrito1_idx` (`iddistrito`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `departamento_entrega`
--
ALTER TABLE `departamento_entrega`
  ADD PRIMARY KEY (`iddepartamento_entrega`),
  ADD KEY `fk_departamento_entrega_departamento1_idx` (`origen`),
  ADD KEY `fk_departamento_entrega_departamento2_idx` (`destino`);

--
-- Indices de la tabla `detalle_envio_encomienda`
--
ALTER TABLE `detalle_envio_encomienda`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `fk_detalle_envio_encomienda_envio_encomienda1_idx` (`idenvio_encomienda`),
  ADD KEY `fk_detalle_envio_encomienda_zona1_idx` (`idzona`),
  ADD KEY `fk_detalle_envio_encomienda_sub_tipo_correspondencia1_idx` (`idsub_tipo_correspondencia`);

--
-- Indices de la tabla `detalle_liquidacion`
--
ALTER TABLE `detalle_liquidacion`
  ADD PRIMARY KEY (`iddetalle_liquidacion`),
  ADD KEY `fk_detalle_liquidacion_liquidacion_movilidad1_idx` (`idliquidacion_movilidad`),
  ADD KEY `fk_detalle_liquidacion_ciudad1_idx` (`idcentro_poblado`);

--
-- Indices de la tabla `detalle_valija`
--
ALTER TABLE `detalle_valija`
  ADD PRIMARY KEY (`iddetalle_valija`),
  ADD KEY `fk_documento_valija_valija1_idx` (`idvalija`),
  ADD KEY `fk_documento_valija_ciudad_entrega1_idx` (`iddepartamento_entrega`),
  ADD KEY `fk_detalle_valija_envio_encomienda1_idx` (`idenvio_encomienda`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`iddistrito`),
  ADD KEY `fk_distrito_provincia1_idx` (`idprovincia`);

--
-- Indices de la tabla `envio_encomienda`
--
ALTER TABLE `envio_encomienda`
  ADD PRIMARY KEY (`idenvio_encomienda`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `fk_factura_cliente1_idx` (`idpersona`);

--
-- Indices de la tabla `liquidacion_movilidad`
--
ALTER TABLE `liquidacion_movilidad`
  ADD PRIMARY KEY (`idliquidacion_movilidad`),
  ADD KEY `fk_liquidacion_movilidad_persona1_idx` (`idpersona`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD UNIQUE KEY `apell_paterno_UNIQUE` (`apell_paterno`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`idpeso`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idprovincia`),
  ADD KEY `fk_provincia_departamento1_idx` (`iddepartamento`);

--
-- Indices de la tabla `sub_tipo_correspondencia`
--
ALTER TABLE `sub_tipo_correspondencia`
  ADD PRIMARY KEY (`idsub_tipo_correspondencia`),
  ADD KEY `fk_tipo_correspondecia2_idx` (`idtipo_correspondencia`);

--
-- Indices de la tabla `tipo_correspondencia`
--
ALTER TABLE `tipo_correspondencia`
  ADD PRIMARY KEY (`idtipo_correspondencia`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `valija`
--
ALTER TABLE `valija`
  ADD PRIMARY KEY (`idvalija`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idzona`),
  ADD KEY `fk_capacidad_idx` (`idpeso`),
  ADD KEY `fk_capacidad_ciudad_zona_ciudad_entrega1_idx` (`iddepartamento_entrega`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centro_poblado`
--
ALTER TABLE `centro_poblado`
  MODIFY `idcentro_poblado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `departamento_entrega`
--
ALTER TABLE `departamento_entrega`
  MODIFY `iddepartamento_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `detalle_envio_encomienda`
--
ALTER TABLE `detalle_envio_encomienda`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `detalle_liquidacion`
--
ALTER TABLE `detalle_liquidacion`
  MODIFY `iddetalle_liquidacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `detalle_valija`
--
ALTER TABLE `detalle_valija`
  MODIFY `iddetalle_valija` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `iddistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `envio_encomienda`
--
ALTER TABLE `envio_encomienda`
  MODIFY `idenvio_encomienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840300013;
--
-- AUTO_INCREMENT de la tabla `liquidacion_movilidad`
--
ALTER TABLE `liquidacion_movilidad`
  MODIFY `idliquidacion_movilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `idpeso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idprovincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sub_tipo_correspondencia`
--
ALTER TABLE `sub_tipo_correspondencia`
  MODIFY `idsub_tipo_correspondencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tipo_correspondencia`
--
ALTER TABLE `tipo_correspondencia`
  MODIFY `idtipo_correspondencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `valija`
--
ALTER TABLE `valija`
  MODIFY `idvalija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `idzona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `centro_poblado`
--
ALTER TABLE `centro_poblado`
  ADD CONSTRAINT `fk_ciudad_distrito1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento_entrega`
--
ALTER TABLE `departamento_entrega`
  ADD CONSTRAINT `fk_departamento_entrega_departamento1` FOREIGN KEY (`origen`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departamento_entrega_departamento2` FOREIGN KEY (`destino`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_envio_encomienda`
--
ALTER TABLE `detalle_envio_encomienda`
  ADD CONSTRAINT `fk_detalle_envio_encomienda_envio_encomienda1` FOREIGN KEY (`idenvio_encomienda`) REFERENCES `envio_encomienda` (`idenvio_encomienda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_envio_encomienda_sub_tipo_correspondencia1` FOREIGN KEY (`idsub_tipo_correspondencia`) REFERENCES `sub_tipo_correspondencia` (`idsub_tipo_correspondencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_envio_encomienda_zona1` FOREIGN KEY (`idzona`) REFERENCES `zona` (`idzona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_liquidacion`
--
ALTER TABLE `detalle_liquidacion`
  ADD CONSTRAINT `fk_detalle_liquidacion_ciudad1` FOREIGN KEY (`idcentro_poblado`) REFERENCES `centro_poblado` (`idcentro_poblado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_liquidacion_liquidacion_movilidad1` FOREIGN KEY (`idliquidacion_movilidad`) REFERENCES `liquidacion_movilidad` (`idliquidacion_movilidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_valija`
--
ALTER TABLE `detalle_valija`
  ADD CONSTRAINT `fk_detalle_valija_envio_encomienda1` FOREIGN KEY (`idenvio_encomienda`) REFERENCES `envio_encomienda` (`idenvio_encomienda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documento_valija_ciudad_entrega1` FOREIGN KEY (`iddepartamento_entrega`) REFERENCES `departamento_entrega` (`iddepartamento_entrega`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documento_valija_valija1` FOREIGN KEY (`idvalija`) REFERENCES `valija` (`idvalija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `fk_distrito_provincia1` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envio_encomienda`
--
ALTER TABLE `envio_encomienda`
  ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `liquidacion_movilidad`
--
ALTER TABLE `liquidacion_movilidad`
  ADD CONSTRAINT `fk_liquidacion_movilidad_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_departamento1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sub_tipo_correspondencia`
--
ALTER TABLE `sub_tipo_correspondencia`
  ADD CONSTRAINT `fk_tipo_correspondecia2` FOREIGN KEY (`idtipo_correspondencia`) REFERENCES `tipo_correspondencia` (`idtipo_correspondencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_capacidad` FOREIGN KEY (`idpeso`) REFERENCES `peso` (`idpeso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_capacidad_ciudad_zona_ciudad_entrega1` FOREIGN KEY (`iddepartamento_entrega`) REFERENCES `departamento_entrega` (`iddepartamento_entrega`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
