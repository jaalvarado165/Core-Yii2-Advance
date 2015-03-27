-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2015 a las 14:27:24
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `health_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '13', 1424368347),
('clinic', '16', 1424369164),
('customersupport', '20', 1424369714),
('doctor', '17', 1424369563),
('doctor', '22', 1424450498),
('patient', '18', 1424369623),
('patient', '21', 1424449791),
('patient', '23', 1424538762),
('secretary', '19', 1424369672);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, NULL, NULL, NULL, 1424367409, 1424367409),
('clinic', 1, NULL, NULL, NULL, 1424367410, 1424367410),
('customersupport', 1, NULL, NULL, NULL, 1424367410, 1424367410),
('doctor', 1, NULL, NULL, NULL, 1424367410, 1424367410),
('manage users', 2, 'Manage Users', NULL, NULL, 1424367409, 1424367409),
('patient', 1, NULL, NULL, NULL, 1424367410, 1424367410),
('secretary', 1, NULL, NULL, NULL, 1424367410, 1424367410);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('administrator', 'manage users');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1424281302),
('m130524_201442_init', 1424281304),
('m140506_102106_rbac_init', 1424281390);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`, `first_name`, `last_name`) VALUES
(13, 'admin', 'JxJjJQbkMnMRAsolzmqm-AS9uYWchzat', '$2y$13$aJAqdocBEm.ApEAyyC7vPeu02.2gvVqTZomNoMiYStLR6i8asou3S', NULL, 'jnalvarado.28@hotmail.com', 1, 1424368347, 1424368347, '1', 'Admin', 'A.'),
(16, 'clinic', '7ACX9FMWmRLozc_VXJDJNjIudc-i_GQ-', '$2y$13$711vaYzcuwzeZ1ywxKmd4uhTTtwbFCUqqGVxUyQ4e5kKYRA9uAAeK', NULL, 'jnalvarado.28+1@gmail.com', 1, 1424369164, 1424369164, '3', 'Clinica', 'C.'),
(17, 'doctor', '9e1KEWHNRru9VpxO_snb2KE97xH9iTSM', '$2y$13$bwCEu/4unswaZw6S5lbEAeM3zK9mSMZp4UQr29KoylxaP8fjYm5QW', NULL, 'jnalvarado.28+2@hotmail.com', 1, 1424369562, 1424369562, '2', 'Doctor', 'D.'),
(18, 'patient', 'G5cvpq2kLs2E70wDYQ6EreHwyX3gNaJ4', '$2y$13$Ptg6xgyWfj1RhxhnEL7iwett6P6fY.1jR544cy.LX.BClr1Yl/7CC', NULL, 'jnalvarado.28+3@hotmail.com', 1, 1424369623, 1424369623, '4', 'Paciente 1', 'P.'),
(19, 'secretary', 'BapAtolDOX34Ov6H9BN4GNHWNS31nllb', '$2y$13$CFvyXD3nmAFAYVB33XdQQuEvwRj3mYiXL8EhB5dB6CV62yTEdlRiG', NULL, 'jnalvarado.28+4@hotmail.com', 1, 1424369672, 1424369672, '5', 'Secretaria', 'S.'),
(20, 'csupport', 'pbP2t9MOQsnPOXd10nOFBSZcfyevzmR0', '$2y$13$DwrUE1l9L3OwcoOnNmPbhePrTdnviiG1W7zaCPp5BUifQAMhJ2MQy', NULL, 'jnalvarado.28+5@hotmail.com', 1, 1424369714, 1424369714, '6', 'Customer', 'S.'),
(21, 'paciente', 'Fz7srtdY7PfB0P1AwWxAGmD2XpHTHs38', '$2y$13$9J073v7eJK5NZuf.6IUPGeCP5CLzZMjncINw75wl/pcNBggQG9D.W', NULL, 'jnalvarado.28+7@gmail.com', 1, 1424449791, 1424449791, '4', 'Julian', 'Paciente'),
(22, 'doctorf', 'iLSEUF-VqvJLNgl8OfNSVIhp873gIQq9', '$2y$13$CuI7uuLniJgoqU0CLxw8beI5jsEfjMe1fIXNZBg/MGT9fENw4VjIC', NULL, 'jnalvarado.28+8@gmail.com', 1, 1424450498, 1424450498, '2', 'Julian', 'Doctor'),
(23, 'patient3', 'hKOGbO2D69_dRjVVKnsvl9OabldbTYFU', '$2y$13$FLtwfSw6B429VMhRhcnjquzQF/PhNKWiaqLPM5yQeoxTJmsokd0t.', NULL, 'jnalvarado.28+9@gmail.com', 1, 1424538761, 1424538761, '4', 'Julian', 'Paciente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
