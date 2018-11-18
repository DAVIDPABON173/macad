-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2018 a las 01:30:24
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `macad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `anio` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_fisica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documento_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `referencia`, `nombre`, `fecha`, `anio`, `descripcion`, `ubicacion_fisica`, `ruta`, `documento_id`, `created_at`, `updated_at`) VALUES
(10, '1090134510', 'SERGIO RAMOS', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1233', 'public/2018/45/documento/e3NkS4KasGRhUq22vRigNJ68emkEJ7uNZB7USaCW.pdf', 1, '2018-11-04 17:04:58', '2018-11-06 15:08:17'),
(13, '12345', 'RECLAMO CLIENTE CC 1112212', '2018-11-05', '2018', 'Reclamo por Ivan Duue', 'SEC 2 FILA 3 AZ #80', 'public/2018/45/documento/sAYaS0BmMNnyLwtfPWc73UaRvvg4aZ9BKJovaOPk.pdf', 11, '2018-11-06 03:18:29', '2018-11-06 03:18:29'),
(14, '20000-10', 'ACTA DE COMIÉ', '2018-10-28', '2018', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/45/documento/ngg1bd2LpPDkLn152ndiR91pnuLumKqMb0R7m0dq.pdf', 5, '2018-11-06 03:42:16', '2018-11-06 04:08:05'),
(15, 'RECLAMO 1234', 'JORGE MENDEZ', '2018-11-06', '2018', 'Reclamos por incumplimiento de contrato', 'SEC 1 AZ C-R #5', 'public/2018/45/documento/nMWpAMgbhiyycx13iLe1oEagVR1TZ1vtCQvTNYJY.pdf', 11, '2018-11-06 13:57:28', '2018-11-06 13:58:24'),
(16, '1234567', 'HTZ-1234', '2018-11-06', '2018', 'Inspección', 'SEC 4 12 AZ #3', 'public/2018/45/documento/2O0bBm6fMcVzqdN3OOKILhkZecF35pn0elM6SANy.pdf', 14, '2018-11-06 14:09:29', '2018-11-06 14:09:29'),
(17, '77707070', 'ARCHIVO', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1', 'public/2018/45/documento/5IqUyQMwuC38XNdlLsmAV9mkggLTFjpbriQNSWVH.pdf', 4, '2018-11-04 14:56:44', '2018-11-06 15:22:10'),
(18, '7770707077AA', 'ARCHIVO', '2016-11-29', '2015', 'Esta es la HV de un empleado Esta es la HV Esta es la HV de un emplEsta es la HV de un empleadoeadode un empleado Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1', 'public/2018/45/documento/5IqUyQMwuC38XNdlLsmAV9mkggLTFjpbriQNSWVH.pdf', 4, '2018-11-04 14:56:44', '2018-11-06 15:22:10'),
(19, '109013457', 'JUAN GUILLERMO MORA', '2013-11-30', '2000', 'CONTRATO', 'SECTION  2 FILA 3 AZ #1', 'public/2018/45/documento/PTCblma8BgI7IZUWC97xlGk1cpkkz8yEVN1T8xcI.pdf', 1, '2018-11-04 17:03:56', '2018-11-06 15:07:56'),
(20, '1090134511', 'MIGUEL ANGEL BORJA', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1233', 'public/2018/45/documento/e3NkS4KasGRhUq22vRigNJ68emkEJ7uNZB7USaCW.pdf', 1, '2018-11-04 17:04:58', '2018-11-06 15:08:17'),
(21, '12345DD', 'RECLAMO CLIENTE CC 1112212', '2018-11-05', '2018', 'Reclamo por Ivan Duue', 'SEC 2 FILA 3 AZ #80', 'public/2018/45/documento/sAYaS0BmMNnyLwtfPWc73UaRvvg4aZ9BKJovaOPk.pdf', 11, '2018-11-06 03:18:29', '2018-11-06 03:18:29'),
(22, 'AAAAADDDD', 'ACTA DE COMIÉ', '2018-10-28', '2018', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/45/documento/ngg1bd2LpPDkLn152ndiR91pnuLumKqMb0R7m0dq.pdf', 5, '2018-11-06 03:42:16', '2018-11-06 04:08:05'),
(23, 'RECLAMO 1234 ASAS', 'JORGE MENDEZ', '2018-11-06', '2018', 'Reclamos por incumplimiento de contrato', 'SEC 1 AZ C-R #5', 'public/2018/45/documento/nMWpAMgbhiyycx13iLe1oEagVR1TZ1vtCQvTNYJY.pdf', 11, '2018-11-06 13:57:28', '2018-11-06 13:58:24'),
(24, '1234567 SASAAS', 'HTZ-1234', '2018-11-06', '2018', 'Inspección', 'SEC 4 12 AZ #3', 'public/2018/45/documento/2O0bBm6fMcVzqdN3OOKILhkZecF35pn0elM6SANy.pdf', 14, '2018-11-06 14:09:29', '2018-11-06 14:09:29'),
(25, '77707070770ZZ', 'ARCHIVO', '2016-11-29', '2015', 'Esta es la HV de un empleado Esta es la HV Esta es la HV de un emplEsta es la HV de un empleadoeadode un empleado Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1', 'public/2018/45/documento/5IqUyQMwuC38XNdlLsmAV9mkggLTFjpbriQNSWVH.pdf', 4, '2018-11-04 14:56:44', '2018-11-06 15:22:10'),
(26, '1090134569', 'FRANCO CARMELO SUAREZ', '2013-11-30', '2000', 'CONTRATO', 'SECTION  2 FILA 3 AZ #1', 'public/2018/45/documento/PTCblma8BgI7IZUWC97xlGk1cpkkz8yEVN1T8xcI.pdf', 1, '2018-11-04 17:03:56', '2018-11-06 15:07:56'),
(27, '109013413', 'CARLITOS TEVEZ', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1233', 'public/2018/45/documento/e3NkS4KasGRhUq22vRigNJ68emkEJ7uNZB7USaCW.pdf', 1, '2018-11-04 17:04:58', '2018-11-06 15:08:17'),
(28, '1234CC5', 'RECLAMO CLIENTE CC 1112212', '2018-11-05', '2018', 'Reclamo por Ivan Duue', 'SEC 2 FILA 3 AZ #80', 'public/2018/45/documento/sAYaS0BmMNnyLwtfPWc73UaRvvg4aZ9BKJovaOPk.pdf', 11, '2018-11-06 03:18:29', '2018-11-06 03:18:29'),
(29, 'AAAAVVV', 'ACTA DE COMIÉ', '2018-10-28', '2018', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/45/documento/ngg1bd2LpPDkLn152ndiR91pnuLumKqMb0R7m0dq.pdf', 5, '2018-11-06 03:42:16', '2018-11-06 04:08:05'),
(30, 'RECLAMO 1234CC', 'JORGE MENDEZ', '2018-11-06', '2018', 'Reclamos por incumplimiento de contrato', 'SEC 1 AZ C-R #5', 'public/2018/45/documento/nMWpAMgbhiyycx13iLe1oEagVR1TZ1vtCQvTNYJY.pdf', 11, '2018-11-06 13:57:28', '2018-11-06 13:58:24'),
(31, '1234567CCC', 'HTZ-1234', '2018-11-06', '2018', 'Inspección', 'SEC 4 12 AZ #3', 'public/2018/45/documento/2O0bBm6fMcVzqdN3OOKILhkZecF35pn0elM6SANy.pdf', 14, '2018-11-06 14:09:29', '2018-11-06 14:09:29'),
(32, '77707070CCC', 'ARCHIVO', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1', 'public/2018/45/documento/5IqUyQMwuC38XNdlLsmAV9mkggLTFjpbriQNSWVH.pdf', 4, '2018-11-04 14:56:44', '2018-11-06 15:22:10'),
(33, '7770707077SDSDAA', 'ARCHIVO', '2016-11-29', '2015', 'Esta es la HV de un empleado Esta es la HV Esta es la HV de un emplEsta es la HV de un empleadoeadode un empleado Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1', 'public/2018/45/documento/5IqUyQMwuC38XNdlLsmAV9mkggLTFjpbriQNSWVH.pdf', 4, '2018-11-04 14:56:44', '2018-11-06 15:22:10'),
(34, '1090134568', 'PEDRO INFANTE SANDOVAL', '2013-11-30', '2000', 'CONTRATO', 'SECTION  2 FILA 3 AZ #1', 'public/2018/45/documento/PTCblma8BgI7IZUWC97xlGk1cpkkz8yEVN1T8xcI.pdf', 1, '2018-11-04 17:03:56', '2018-11-06 15:07:56'),
(35, '109013412', 'EL CUCHO CAMBIASSO', '2016-11-29', '2015', 'Esta es la HV de un empleado', 'SEC 2 FILA 3 AZ #1233', 'public/2018/45/documento/e3NkS4KasGRhUq22vRigNJ68emkEJ7uNZB7USaCW.pdf', 1, '2018-11-04 17:04:58', '2018-11-06 15:08:17'),
(36, '1234OO5DD', 'RECLAMO CLIENTE CC 1112212', '2018-11-05', '2018', 'Reclamo por Ivan Duue', 'SEC 2 FILA 3 AZ #80', 'public/2018/45/documento/sAYaS0BmMNnyLwtfPWc73UaRvvg4aZ9BKJovaOPk.pdf', 11, '2018-11-06 03:18:29', '2018-11-06 03:18:29'),
(37, 'AAAAAOODDDD', 'ACTA DE COMIÉ', '2018-10-28', '2018', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/45/documento/ngg1bd2LpPDkLn152ndiR91pnuLumKqMb0R7m0dq.pdf', 5, '2018-11-06 03:42:16', '2018-11-06 04:08:05'),
(38, 'RECLAMO 1234 AOOOSAS', 'JORGE MENDEZ', '2018-11-06', '2018', 'Reclamos por incumplimiento de contrato', 'SEC 1 AZ C-R #5', 'public/2018/45/documento/nMWpAMgbhiyycx13iLe1oEagVR1TZ1vtCQvTNYJY.pdf', 11, '2018-11-06 13:57:28', '2018-11-06 13:58:24'),
(39, '1234567 OOSASAAS', 'HTZ-1234', '2018-11-06', '2018', 'Inspección', 'SEC 4 12 AZ #3', 'public/2018/45/documento/2O0bBm6fMcVzqdN3OOKILhkZecF35pn0elM6SANy.pdf', 14, '2018-11-06 14:09:29', '2018-11-06 14:09:29'),
(40, '2122WQWS', 'COM CLIENTE CC 1AAAAA', '2018-11-08', '2018', 'AASSSSSSSSSSSSSSSSSSSSSSSSSSSSS', 'SEC 2 FILA 3 AZ #1233', 'public/2018/45/documento/eS0oy6rmryXjazxNNQ5IqhyeLRH4jUBzWNTgZgUx.pdf', 11, '2018-11-12 03:50:18', '2018-11-12 03:50:18'),
(41, 'ASDFG', 'ACTA DE COMIÉ', '2018-11-22', '2018', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/45/documento/CHuWQWBv3RcOgY50VstMf4dbO6vzlp4gTQyjlqrT.pdf', 5, '2018-11-12 03:52:17', '2018-11-12 03:52:17'),
(42, '1111111111111111', 'aaaaaaaaaaaa', '2017-11-30', '2018', 'sss', 'SEC 2 FILA 3 AZ #1', 'public/2018/46/documento/tWrfokj5TPfcrxLV0xjw8pLgBFiPQuezYsZqiSe4.pdf', 13, '2018-11-12 15:49:45', '2018-11-12 15:49:45'),
(43, '20000-12', 'ACTA DE COMIÉ', '2016-11-30', '2015', 'ESTA ES UNA DESCRIPCION SOBRE ESTE ARCHIVO DE COMITÉ', 'SEC 50 AZ 7', 'public/2018/46/documento/Bef0NIawT6PC0R9m9exTmOCNHOHiMNJwfinwZUGU.pdf', 5, '2018-11-12 17:23:26', '2018-11-12 17:23:26'),
(44, '1090491857', 'JESUS DAVID PABON ORTEGA', '2018-09-07', '2018', 'ESTUDIANTE DE ING. DE SISTEMAS', 'SEC 2 FILA 3 AZ #1', 'public/2018/46/documento/jLA9E3xwh3b173Qm1NUo1LYC9NGdUfdHY5W4oErf.pdf', 16, '2018-11-13 00:40:54', '2018-11-13 00:40:54'),
(45, '10392932932', 'JUAN MANUEL SANTOS', '2018-11-06', '2018', 'Descripcion', 'DIR2 FILA 3 AZ #1233', 'public/2018/46/documento/8QpB1eV4G109RGQZjjTu2dCgmEXguIXI1mThxbUx.pdf', 1, '2018-11-13 01:38:32', '2018-11-13 01:38:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'HOJA DE VIDA', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-01 05:00:00', '2018-11-12 23:21:41'),
(2, 'COMITÉ', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-03 05:00:00', '2018-11-07 02:16:06'),
(3, 'INSPECCIÓN VEHÍCULO', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-06 05:00:00', '2018-11-06 05:00:00'),
(4, 'COMUNICADOS', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-06 21:57:53', '2018-11-06 21:57:53'),
(5, 'CONTABILIDAD', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-07 03:31:20', '2018-11-12 23:19:08'),
(21, 'CONTRATOS', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-08 16:11:55', '2018-11-08 16:11:55'),
(22, 'FUEC', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-08 16:12:52', '2018-11-08 16:12:52'),
(46, 'DOCUMENTOS OPERATIVOS', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-09 16:48:58', '2018-11-09 16:48:58'),
(47, 'INSPECCION EQUIPOS DE OFICINA', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-12 23:48:26', '2018-11-12 23:48:26'),
(50, 'PORTAFOLIO DE SERVICIO', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-12 23:53:18', '2018-11-12 23:53:18'),
(51, 'VEHÍCULO AFILIADO', 'Un archivo digital, también denominado Fichero, es una unidad de datos o información almacenada en algún medio que puede ser utilizada por aplicaciones de la computadora.', '2018-11-12 23:53:52', '2018-11-12 23:53:52'),
(53, 'NUEVA CATEGORIA', 'Esta categoria corresponde al historico documental de los practicantes', '2018-11-13 00:11:53', '2018-11-13 00:11:53'),
(54, 'CATEGORIA NUEVA', 'descripcion', '2018-11-13 14:06:09', '2018-11-13 14:06:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `documento`, `prefijo`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'DOC HOJA DE VIDA', 'HV-', 1, '2018-11-01 05:00:00', '2018-11-12 23:22:31'),
(2, 'ANEXOS DE HV', 'AHV-', 1, '2018-11-02 05:00:00', '2018-11-02 05:00:00'),
(3, 'DOCUMENTOS LEGALES', 'HV-DL-', 1, '2018-11-02 05:00:00', '2018-11-02 05:00:00'),
(4, 'EXPERIENCIA LABORAL', 'HV-EXL-', 1, '2018-11-03 05:00:00', '2018-11-07 03:10:50'),
(5, 'COMITÉ A', 'CE-A-', 2, '2018-11-03 05:00:00', '2018-11-13 00:03:00'),
(11, 'RESPUESTAS', 'C-R-', 2, '2018-11-05 03:21:43', '2018-11-05 03:21:43'),
(12, 'INSP. VEHÍCULO', 'IV-', 3, '2018-11-06 05:00:00', '2018-11-06 05:00:00'),
(13, 'INSP. VEHÍCULO EPP', 'IV-EPP', 3, '2018-11-06 05:00:00', '2018-11-06 05:00:00'),
(14, 'INSP. VEHÍCULO EXTINTOR', 'IV-E-', 3, '2018-11-06 05:00:00', '2018-11-06 05:00:00'),
(15, 'INSPECCIÓN VEHÍCULO TT', 'IV-TT-', 3, '2018-11-06 15:03:29', '2018-11-06 15:03:29'),
(16, 'PLAN DE TRABAJO', 'NC-PT', 53, '2018-11-13 00:22:20', '2018-11-13 00:22:20'),
(17, 'TIPO DOC 1', 'CN-TD1-', 54, '2018-11-13 14:10:02', '2018-11-13 14:10:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_30_150700_create_categorias_table', 2),
(4, '2018_10_30_150745_create_documentos_table', 2),
(5, '2018_10_30_150814_create_archivos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('davidpabon173@gmail.com', '$2y$10$CjpucohoYlYdC2rmjAo7Peoj9Idey/3ZjBucTgwX8rEoFJ5zec3Oy', '2018-11-16 01:58:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jesus David Pabon Ortega', 'davidpabon173@gmail.com', NULL, '$2y$10$kfiV9XEkAhUs8Abn9UNTrOUPqhECoyBvHTepHq.DjHxZcgRkmy1Qq', '1R6mbzDWZQt4tJpCghWjJH6cx5hYpgvo8GSI20rBjC91Hze7ulJn8nHpyrqj', '2018-10-30 21:47:46', '2018-10-30 21:47:46'),
(2, 'Miguel De Servantes', 'm@gmail.com', NULL, '$2y$10$iej2wNOXuFFFMget.SaYB.TWYx3JHJGrGnL9/f4DuwducC3.d1u92', 'q5hNKJSGVlgFmdcvbGZyzRYofE80TflEWDvDrMbPPj5OaWULywuNAI5Y3Fqq', '2018-11-08 03:06:02', '2018-11-08 03:06:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`documento_id`,`referencia`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_categoria_unique` (`categoria`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documentos_documento_unique` (`documento`),
  ADD UNIQUE KEY `documentos_prefijo_unique` (`prefijo`),
  ADD KEY `documentos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
