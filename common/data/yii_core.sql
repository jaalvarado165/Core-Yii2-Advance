-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2015 a las 17:16:45
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `yii_core`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
`id` int(11) NOT NULL,
  `archivo` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_experiencia` int(11) DEFAULT NULL,
  `id_academic` int(11) DEFAULT NULL,
  `id_cv` int(11) DEFAULT NULL,
  `id_freelance` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id`, `archivo`, `nombre`, `user_id`, `fecha_creacion`, `id_experiencia`, `id_academic`, `id_cv`, `id_freelance`, `id_proyecto`) VALUES
(8, '563a66300b0bcd243a4be6004adcb9d5.pdf', '4InternetNegocio_cas.pdf', 28, '2014-09-14 00:00:00', 1, 0, 0, NULL, NULL),
(10, 'e8c9b37a8eadd8dcef60b46ca09241ac.pdf', 'Jornada-Nocturna.pdf', 28, '2014-09-14 00:00:00', 2, 0, 0, NULL, NULL),
(11, 'bf569ed70342279aef4fae12f81f6a58.pdf', '4InternetNegocio_cas.pdf', 28, '2014-09-14 00:00:00', 2, 0, 0, NULL, NULL),
(16, 'ead2b772f2511c2985d8cc1886011e0a.jpg', 'cv.jpg', 28, '2014-09-23 00:00:00', NULL, NULL, 1, NULL, NULL),
(20, '56de3972d4a0be7d968a43c268e69e32.docx', 'CV-JORGE-RUIZ.docx', 28, '2014-09-24 00:00:00', NULL, 1, NULL, NULL, NULL),
(22, 'bea3566e770ec245d4a6e771f267b012.docx', 'CV-JORGE-RUIZ.docx', 28, '2014-09-24 00:00:00', NULL, NULL, NULL, NULL, 3),
(23, '0349a9707afb68b85642ad649bbf3fa9.pdf', 'CV-JULIAN-A-ALVARADO.pdf', 28, '2014-10-18 00:00:00', 1, NULL, NULL, NULL, NULL),
(25, '3adbb15823966b6f25ad0e12bd493141.pptx', 'Presentación-Sentinel2014.pptx', 28, '2014-10-18 00:00:00', 1, NULL, NULL, NULL, NULL),
(26, '131a7b697d988812dcfe7500bd44e6cd.docx', 'CV-JORGE-RUIZ.docx', 28, '2014-10-18 00:00:00', 1, NULL, NULL, NULL, NULL),
(27, '007d723464ae214277af23220ffc1b67.png', 'print-adjuntar-archivos.png', 28, '2014-10-18 00:00:00', 1, NULL, NULL, NULL, NULL),
(28, '58233f4ba44b20e4e48ef15b5268854f.pdf', 'CV-JULIAN-A-ALVARADO.pdf', 28, '2014-10-18 00:00:00', NULL, 1, NULL, NULL, NULL),
(31, '464dc0009de5d404398b1759204d1363.jpg', 'thugfucker-post-footer3.jpg', 28, '2014-10-18 00:00:00', NULL, NULL, NULL, NULL, 6),
(33, '71c62836b479ba55ae99ebb9b1a60c7c.pdf', 'CV-JULIAN-A-ALVARADO.pdf', 28, '2014-10-18 00:00:00', NULL, NULL, NULL, NULL, 7),
(34, 'c237693c717da29e0e85186c72d7bdc4.png', 'print-adjuntar-archivos.png', 28, '2014-10-19 00:00:00', NULL, NULL, NULL, 1, NULL),
(35, 'f842c49dab59cb8ade428a5ad68a37c8.pdf', 'CV-JULIAN-A-ALVARADO.pdf', 28, '2014-10-19 00:00:00', NULL, NULL, NULL, 1, NULL),
(36, '18d783382ca8149c0ab328e12b968d8c.pdf', 'CV-JULIAN-A-ALVARADO.pdf', 28, '2014-10-19 00:00:00', NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 'admin', NULL, 'N;'),
('admin', 'hmontoya@ccdcommunications.com', NULL, 'N;'),
('consultor', 'abogado2', NULL, 'N;'),
('estudiante', 'alejandro@gmail.com', NULL, 'N;'),
('estudiante', 'jaaaaaa@gmail.com', NULL, 'N;'),
('estudiante', 'jaae@gmail.com', NULL, 'N;'),
('estudiante', 'je@gmail.com', NULL, 'N;'),
('estudiante', 'jnalvarado.28+12@gmail.com', NULL, 'N;'),
('estudiante', 'jnalvarado.28+13@gmail.com', NULL, 'N;'),
('estudiante', 'jnalvarado.28+14@gmail.com', NULL, 'N;'),
('estudiante', 'julian240@gmail.com', NULL, 'N;'),
('estudiante', 'julian241@gmail.com', NULL, 'N;'),
('estudiante', 'santi@gmail.com', NULL, 'N;'),
('estudiante', 'santiago@gmail.com', NULL, 'N;'),
('estudiante', 'santiagoo@gmail.com', NULL, 'N;'),
('superadmin', 'superroot', NULL, 'N;'),
('usuario', 'hmontoya@prueba.com', NULL, 'N;'),
('visitante', 'jaa2e@gmail.com', NULL, 'N;'),
('visitante', 'jaalvarado164@misena.edu.co', NULL, 'N;'),
('visitante', 'jnalvarado.28+3@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+4@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+5@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+6@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+7@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+8@gmail.com', NULL, 'N;'),
('visitante', 'jnalvarado.28+9@gmail.com', NULL, 'N;'),
('visitante', 'js@gmail.com', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'Puede administrar todo el aplicativo.', NULL, 'N;'),
('consultor', 3, 'Solo puede hacer algunas cosas.', NULL, 'N;'),
('operario', 5, 'Solo puede realizar algunas ', NULL, 'N;'),
('superadmin', 1, 'Puede mirar todo.', NULL, 'N;'),
('superoperario', 4, 'Solo puede realizar determinadas acciones.', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`id` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3688690 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `id_pais`, `id_estado`, `nombre`) VALUES
(3435910, 1, '7', 'Buenos Aires'),
(3674954, 5, '2', 'Medellin'),
(3687925, 5, '29', 'Cali'),
(3688689, 5, '34', 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
`id` int(11) NOT NULL,
  `id_estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7303689 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `id_estado`, `id_pais`, `nombre`) VALUES
(3390290, '22', 3, 'Rio Grande do Norte'),
(3392213, '20', 3, 'Piaui'),
(3392268, '30', 3, 'Pernambuco'),
(3393098, '17', 3, 'Paraiba'),
(3393129, '16', 3, 'Para'),
(3395443, '13', 3, 'Maranhao'),
(3402362, '6', 3, 'Ceara'),
(3407762, '3', 3, 'Amapa'),
(3408096, '2', 3, 'Alagoas'),
(3430657, '14', 1, 'Misiones'),
(3433896, '9', 1, 'Formosa'),
(3433955, '7', 1, 'Buenos Aires F.D.'),
(3434137, '8', 1, 'Entre Rios'),
(3435214, '6', 1, 'Corrientes'),
(3435907, '1', 1, 'Buenos Aires'),
(3437027, '17', 11, 'San Pedro'),
(3437443, '16', 11, 'Presidente Hayes'),
(3437599, '15', 11, 'Paraguari'),
(3437677, '13', 11, 'Neembucu'),
(3437727, '12', 11, 'Misiones'),
(3437923, '11', 11, 'Itapua'),
(3438049, '10', 11, 'Guaira'),
(3438827, '8', 11, 'Cordillera'),
(3438833, '7', 11, 'Concepcion'),
(3439137, '6', 11, 'Central'),
(3439216, '19', 11, 'Canindeyu'),
(3439296, '5', 11, 'Caazapa'),
(3439312, '4', 11, 'Caaguazu'),
(3439433, '2', 11, 'Amambay'),
(3439440, '1', 11, 'Alto Parana'),
(3439441, '23', 11, 'Alto Paraguay'),
(3439780, '19', 13, 'Treinta y Tres'),
(3440033, '18', 13, 'Tacuarembo'),
(3440054, '17', 13, 'Soriano'),
(3440645, '16', 13, 'San Jose'),
(3440711, '15', 13, 'Salto'),
(3440771, '14', 13, 'Rocha'),
(3440780, '13', 13, 'Rivera'),
(3440789, '12', 13, 'Rio Negro'),
(3441242, '11', 13, 'Paysandu'),
(3441572, '10', 13, 'Montevideo'),
(3441890, '9', 13, 'Maldonado'),
(3442007, '8', 13, 'Lavalleja'),
(3442584, '7', 13, 'Florida'),
(3442587, '6', 13, 'Flores'),
(3442720, '5', 13, 'Durazno'),
(3443025, '4', 13, 'Colonia'),
(3443173, '3', 13, 'Cerro Largo'),
(3443411, '2', 13, 'Canelones'),
(3443756, '1', 13, 'Artigas'),
(3447799, '28', 3, 'Sergipe'),
(3448433, '27', 3, 'Sao Paulo'),
(3450387, '26', 3, 'Santa Catarina'),
(3451133, '23', 3, 'Rio Grande do Sul'),
(3451189, '21', 3, 'Rio de Janeiro'),
(3455077, '18', 3, 'Parana'),
(3457153, '15', 3, 'Minas Gerais'),
(3457415, '11', 3, 'Estado de Mato Grosso do Sul'),
(3457419, '14', 3, 'Mato Grosso'),
(3462372, '29', 3, 'Goias'),
(3463504, '7', 3, 'Federal District'),
(3463930, '8', 3, 'Espirito Santo'),
(3471168, '5', 3, 'Estado de Bahia'),
(3474570, '22', 11, 'Asuncion'),
(3474575, '31', 3, 'Tocantins'),
(3514211, '31', 9, 'Yucatan'),
(3514780, '30', 9, 'Veracruz-Llave'),
(3515359, '29', 9, 'Tlaxcala'),
(3516391, '28', 9, 'Tamaulipas'),
(3516458, '27', 9, 'Tabasco'),
(3520887, '23', 9, 'Quintana Roo'),
(3520914, '22', 9, 'Queretaro'),
(3521082, '21', 9, 'Puebla'),
(3522509, '20', 9, 'Oaxaca'),
(3522542, '19', 9, 'Nuevo Leon'),
(3522961, '17', 9, 'Morelos'),
(3523272, '15', 9, 'Mexico'),
(3527115, '13', 9, 'Hidalgo'),
(3527213, '12', 9, 'Guerrero'),
(3527646, '9', 9, 'The Federal District'),
(3531011, '5', 9, 'Chiapas'),
(3531730, '4', 9, 'Campeche'),
(3621837, '8', 6, 'San Jose'),
(3622226, '7', 6, 'Puntarenas'),
(3623064, '6', 6, 'Limon'),
(3623484, '4', 6, 'Heredia'),
(3623582, '3', 6, 'Guanacaste'),
(3624368, '2', 6, 'Cartago'),
(3624953, '1', 6, 'Alajuela'),
(3625035, '23', 14, 'Zulia'),
(3625210, '22', 14, 'Yaracuy'),
(3625974, '21', 14, 'Trujillo'),
(3626553, '20', 14, 'Tachira'),
(3626655, '19', 14, 'Sucre'),
(3629941, '18', 14, 'Portuguesa'),
(3631462, '17', 14, 'Nueva Esparta'),
(3632100, '16', 14, 'Monagas'),
(3632191, '15', 14, 'Miranda'),
(3632306, '14', 14, 'Merida'),
(3636539, '13', 14, 'Lara'),
(3640017, '12', 14, 'Guarico'),
(3640846, '24', 14, 'Dependencias Federales'),
(3640847, '25', 14, 'Distrito Federal'),
(3640873, '11', 14, 'Falcon'),
(3644541, '9', 14, 'Delta Amacuro'),
(3645386, '8', 14, 'Cojedes'),
(3646751, '7', 14, 'Carabobo'),
(3648106, '6', 14, 'Bolivar'),
(3648544, '5', 14, 'Barinas'),
(3649110, '4', 14, 'Aragua'),
(3649151, '3', 14, 'Apure'),
(3649198, '2', 14, 'Anzoategui'),
(3649302, '1', 14, 'Amazonas'),
(3649953, '20', 7, 'Zamora-Chinchipe'),
(3650445, '19', 7, 'Tungurahua'),
(3653224, '18', 7, 'Pichincha'),
(3653392, '17', 7, 'Pastaza'),
(3653890, '23', 7, 'Napo'),
(3654005, '15', 7, 'Morona-Santiago'),
(3654451, '14', 7, 'Manabi'),
(3654592, '13', 7, 'Los Rios'),
(3654665, '12', 7, 'Loja'),
(3655635, '11', 7, 'Imbabura'),
(3657505, '10', 7, 'Guayas'),
(3657879, '1', 7, 'Galapagos'),
(3657986, '9', 7, 'Esmeraldas'),
(3658195, '8', 7, 'El Oro'),
(3658766, '7', 7, 'Cotopaxi'),
(3659237, '6', 7, 'Chimborazo'),
(3659718, '5', 7, 'Carchi'),
(3659849, '4', 7, 'Canar'),
(3660130, '3', 7, 'Bolivar'),
(3660431, '2', 7, 'Azuay'),
(3662560, '25', 3, 'Roraima'),
(3665361, '4', 3, 'Amazonas'),
(3665474, '1', 3, 'Acre'),
(3666082, '31', 5, 'Vichada'),
(3666254, '30', 5, 'Vaupes'),
(3666313, '29', 5, 'Valle del Cauca'),
(3666951, '28', 5, 'Tolima'),
(3667725, '27', 5, 'Sucre'),
(3668578, '26', 5, 'Santander'),
(3670205, '25', 5, 'Archipielago de San Andres, Providencia y San'),
(3670698, '24', 5, 'Risaralda'),
(3671087, '23', 5, 'Quindio'),
(3671178, '22', 5, 'Putumayo'),
(3673798, '21', 5, 'Norte de Santander'),
(3674021, '20', 5, 'Narino'),
(3674810, '19', 5, 'Meta'),
(3675686, '38', 5, 'Magdalena'),
(3678847, '17', 5, 'La Guajira'),
(3680692, '16', 5, 'Huila'),
(3681344, '14', 5, 'Guaviare'),
(3681652, '15', 5, 'Guainia'),
(3685413, '33', 5, 'Cundinamarca'),
(3685889, '12', 5, 'Cordoba'),
(3686431, '11', 5, 'Choco'),
(3686880, '10', 5, 'Cesar'),
(3687029, '9', 5, 'Cauca'),
(3687173, '32', 5, 'Casanare'),
(3687479, '8', 5, 'Caqueta'),
(3687951, '37', 5, 'Caldas'),
(3688536, '36', 5, 'Boyaca'),
(3688650, '35', 5, 'Bolivar'),
(3688685, '34', 5, 'Bogota D.C.'),
(3689436, '4', 5, 'Atlantico'),
(3689717, '3', 5, 'Arauca'),
(3689815, '2', 5, 'Antioquia'),
(3689982, '1', 5, 'Amazonas'),
(3691099, '25', 12, 'Ucayali Region'),
(3691146, '24', 12, 'Tumbes'),
(3692385, '22', 12, 'San Martin'),
(3693525, '20', 12, 'Piura Region'),
(3695238, '16', 12, 'Loreto Region'),
(3695753, '14', 12, 'Lambayeque Region'),
(3695781, '13', 12, 'La Libertad Region'),
(3696416, '10', 12, 'Huanuco'),
(3699087, '6', 12, 'Cajamarca'),
(3699674, '2', 12, 'Ancash Region'),
(3699699, '1', 12, 'Amazonas Region'),
(3700159, '10', 10, 'Veraguas'),
(3701537, '9', 10, 'Kuna Yala'),
(3703433, '8', 10, 'Panama'),
(3704961, '7', 10, 'Los Santos'),
(3708710, '6', 10, 'Herrera'),
(3711671, '5', 10, 'Darien'),
(3712073, '4', 10, 'Colon'),
(3712162, '3', 10, 'Cocle'),
(3712410, '2', 10, 'Chiriqui'),
(3713954, '1', 10, 'Bocas del Toro'),
(3830305, '22', 7, 'Sucumbios'),
(3830306, '24', 7, 'Orellana'),
(3830309, '26', 14, 'Vargas'),
(3833578, '24', 1, 'Tucuman'),
(3834450, '23', 1, 'Tierra del Fuego'),
(3835868, '22', 1, 'Santiago del Estero'),
(3836276, '21', 1, 'Santa Fe'),
(3836350, '20', 1, 'Santa Cruz'),
(3837029, '19', 1, 'San Luis'),
(3837152, '18', 1, 'San Juan'),
(3838231, '17', 1, 'Salta'),
(3838830, '16', 1, 'Rio Negro'),
(3843122, '15', 1, 'Neuquen'),
(3844419, '13', 1, 'Mendoza'),
(3848949, '12', 1, 'La Rioja'),
(3849574, '11', 1, 'La Pampa'),
(3853404, '10', 1, 'Jujuy'),
(3860255, '5', 1, 'Cordoba'),
(3861244, '4', 1, 'Chubut'),
(3861887, '3', 1, 'Chaco'),
(3862286, '2', 1, 'Catamarca'),
(3867442, '24', 11, 'Boqueron'),
(3868621, '1', 4, 'Valparaiso'),
(3870116, '15', 4, 'Tarapaca Region'),
(3873544, '12', 4, 'Santiago'),
(3880306, '11', 4, 'Maule'),
(3881974, '14', 4, 'Los Lagos'),
(3883281, '8', 4, 'OHiggins'),
(3893623, '7', 4, 'Coquimbo'),
(3898380, '6', 4, 'Biobio'),
(3899191, '5', 4, 'Atacama'),
(3899463, '4', 4, 'Araucania'),
(3899537, '3', 4, 'Antofagasta'),
(3900333, '2', 4, 'Aisen'),
(3903319, '9', 2, 'Tarija'),
(3904907, '8', 2, 'Santa Cruz'),
(3907580, '7', 2, 'Potosi'),
(3908600, '6', 2, 'Pando'),
(3909233, '5', 2, 'Oruro'),
(3911924, '4', 2, 'La Paz'),
(3919966, '2', 2, 'Cochabamba'),
(3920177, '1', 2, 'Chuquisaca'),
(3923172, '3', 2, 'El Beni'),
(3924825, '24', 3, 'Rondonia'),
(3928127, '23', 12, 'Tacna Region'),
(3931275, '21', 12, 'Puno Region'),
(3932834, '19', 12, 'Pasco'),
(3934607, '18', 12, 'Moquegua'),
(3935619, '17', 12, 'Madre de Dios'),
(3936451, 'LMA', 12, 'Provincia de Lima'),
(3936452, '15', 12, 'Lima Region'),
(3937485, '12', 12, 'Junin'),
(3938526, '11', 12, 'Ica Region'),
(3939467, '9', 12, 'Huancavelica Region'),
(3941583, '8', 12, 'Cusco'),
(3946080, '7', 12, 'Callao'),
(3947018, '5', 12, 'Ayacucho Region'),
(3947319, '4', 12, 'Arequipa Region'),
(3947421, '3', 12, 'Apurimac'),
(3979840, '32', 9, 'Zacatecas'),
(3982846, '26', 9, 'Sonora'),
(3983035, '25', 9, 'Sinaloa'),
(3985605, '24', 9, 'San Luis Potosi'),
(3995012, '18', 9, 'Nayarit'),
(3995955, '16', 9, 'Michoacan'),
(4004156, '14', 9, 'Jalisco'),
(4005267, '11', 9, 'Guanajuato'),
(4011741, '10', 9, 'Durango'),
(4013513, '8', 9, 'Colima'),
(4013674, '7', 9, 'Coahuila'),
(4014336, '6', 9, 'Chihuahua'),
(4017698, '3', 9, 'Baja California Sur'),
(4017700, '2', 9, 'Baja California'),
(4019231, '1', 9, 'Aguascalientes'),
(4036650, '10', 4, 'Magallanes'),
(4099753, 'AR', 8, 'Arkansas'),
(4138106, 'DC', 8, 'Washington, D.C.'),
(4142224, 'DE', 8, 'Delaware'),
(4155751, 'FL', 8, 'Florida'),
(4197000, 'GA', 8, 'Georgia'),
(4273857, 'KS', 8, 'Kansas'),
(4331987, 'LA', 8, 'Louisiana'),
(4361885, 'MD', 8, 'Maryland'),
(4398678, 'MO', 8, 'Missouri'),
(4436296, 'MS', 8, 'Mississippi'),
(4482348, 'NC', 8, 'North Carolina'),
(4544379, 'OK', 8, 'Oklahoma'),
(4597040, 'SC', 8, 'South Carolina'),
(4662168, 'TN', 8, 'Tennessee'),
(4736286, 'TX', 8, 'Texas'),
(4826850, 'WV', 8, 'West Virginia'),
(4829764, 'AL', 8, 'Alabama'),
(4831725, 'CT', 8, 'Connecticut'),
(4862182, 'IA', 8, 'Iowa'),
(4896861, 'IL', 8, 'Illinois'),
(4921868, 'IN', 8, 'Indiana'),
(4971068, 'ME', 8, 'Maine'),
(5001836, 'MI', 8, 'Michigan'),
(5037779, 'MN', 8, 'Minnesota'),
(5073708, 'NE', 8, 'Nebraska'),
(5090174, 'NH', 8, 'New Hampshire'),
(5101760, 'NJ', 8, 'New Jersey'),
(5128638, 'NY', 8, 'New York'),
(5165418, 'OH', 8, 'Ohio'),
(5224323, 'RI', 8, 'Rhode Island'),
(5242283, 'VT', 8, 'Vermont'),
(5279468, 'WI', 8, 'Wisconsin'),
(5332921, 'CA', 8, 'California'),
(5417618, 'CO', 8, 'Colorado'),
(5481136, 'NM', 8, 'New Mexico'),
(5509151, 'NV', 8, 'Nevada'),
(5549030, 'UT', 8, 'Utah'),
(5551752, 'AZ', 8, 'Arizona'),
(5596512, 'ID', 8, 'Idaho'),
(5667009, 'MT', 8, 'Montana'),
(5690763, 'ND', 8, 'North Dakota'),
(5744337, 'OR', 8, 'Oregon'),
(5769223, 'SD', 8, 'South Dakota'),
(5815135, 'WA', 8, 'Washington'),
(5843591, 'WY', 8, 'Wyoming'),
(5855797, 'HI', 8, 'Hawaii'),
(5879092, 'AK', 8, 'Alaska'),
(6254925, 'KY', 8, 'Kentucky'),
(6254926, 'MA', 8, 'Massachusetts'),
(6254927, 'PA', 8, 'Pennsylvania'),
(6254928, 'VA', 8, 'Virginia'),
(6693562, '16', 4, 'Arica y Parinacota'),
(6693563, '17', 4, 'Los Rios'),
(7062136, '26', 7, 'Santo Domingo de los Tsachilas'),
(7062138, '25', 7, 'Santa Elena'),
(7303686, '11', 10, 'Embera'),
(7303688, '12', 10, 'Ngoebe-Bugle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `abrev` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `code`, `abrev`) VALUES
(1, 'Argentina', 'ar', 'ARS'),
(2, 'Bolivia', 'bo', 'BOB'),
(3, 'Brasil', 'br', 'BRL'),
(4, 'Chile', 'cl', 'CLP'),
(5, 'Colombia', 'co', 'COP'),
(6, 'Costa Rica', 'cr', 'CRC'),
(7, 'Ecuador', 'ec', 'USD'),
(8, 'Estados Unidos', 'us', 'USD'),
(9, 'México', 'mx', 'MXN'),
(10, 'Panamá', 'pa', 'PAB'),
(11, 'Paraguay', 'py', 'PYG'),
(12, 'Perú', 'pe', 'PEN'),
(13, 'Uruguay', 'uy', 'UYU'),
(14, 'Venezuela', 've', 'VEF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE IF NOT EXISTS `soporte` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `problema` text NOT NULL,
  `solucion` text NOT NULL,
  `estado` int(11) NOT NULL COMMENT '1:Abierto | 2:Pendiente | 3:Cerrado'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id`, `user_id`, `problema`, `solucion`, `estado`) VALUES
(2, 49, 'Problema 2', 'Solución al problema 23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temperatura`
--

CREATE TABLE IF NOT EXISTS `temperatura` (
`id` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `mes` varchar(3) NOT NULL,
  `grados` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temperatura`
--

INSERT INTO `temperatura` (`id`, `id_ciudad`, `mes`, `grados`) VALUES
(1, 1114, 'Jan', '10.0'),
(2, 1114, 'Feb', '6.9'),
(3, 1114, 'Mar', '9.5'),
(4, 1114, 'Apr', '14.5'),
(5, 1114, 'May', '18.2'),
(6, 1114, 'Jun', '21.5'),
(7, 1114, 'Jul', '25.2'),
(8, 1114, 'Aug', '26.5'),
(9, 1114, 'Sep', '23.3'),
(10, 1114, 'Oct', '18.3'),
(11, 1114, 'Nov', '13.9'),
(12, 1114, 'Dec', '9.6'),
(13, 1115, 'Jan', '-0.2'),
(14, 1115, 'Feb', '0.8'),
(15, 1115, 'Mar', '5.7'),
(16, 1115, 'Apr', '11.3'),
(17, 1115, 'May', '17.0'),
(18, 1115, 'Jun', '22.0'),
(19, 1115, 'Jul', '24.8'),
(20, 1115, 'Aug', '24.1'),
(21, 1115, 'Sep', '20.1'),
(22, 1115, 'Oct', '14.1'),
(23, 1115, 'Nov', '8.6'),
(24, 1115, 'Dec', '2.5'),
(25, 1116, 'Jan', '-0.9'),
(26, 1116, 'Feb', '0.6'),
(27, 1116, 'Mar', '3.5'),
(28, 1116, 'Apr', '8.5'),
(29, 1116, 'May', '12.2'),
(30, 1116, 'Jun', '22.5'),
(31, 1116, 'Jul', '23.2'),
(32, 1116, 'Aug', '28.5'),
(33, 1116, 'Sep', '20.3'),
(34, 1116, 'Oct', '15.3'),
(35, 1116, 'Nov', '12.9'),
(36, 1116, 'Dec', '4.6'),
(37, 1117, 'Jan', '-1.2'),
(38, 1117, 'Feb', '1.8'),
(39, 1117, 'Mar', '4.7'),
(40, 1117, 'Apr', '8.3'),
(41, 1117, 'May', '13.0'),
(42, 1117, 'Jun', '24.0'),
(43, 1117, 'Jul', '27.8'),
(44, 1117, 'Aug', '28.1'),
(45, 1117, 'Sep', '21.1'),
(46, 1117, 'Oct', '10.1'),
(47, 1117, 'Nov', '7.6'),
(48, 1117, 'Dec', '4.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
`id` int(10) unsigned NOT NULL,
  `fecha_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  `sesion` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '1: Administrador | 2: Usuario',
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Activo , 2: Inactivo',
  `telefonos` varchar(100) DEFAULT NULL,
  `direcciones` varchar(100) DEFAULT NULL,
  `empresa_pertenece` varchar(150) NOT NULL,
  `semestre` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_estado` varchar(5) NOT NULL,
  `codigo_universitario` varchar(20) NOT NULL,
  `estudios_adicionales` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='Tabla para los usuarios del sistema';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `email`, `password`, `nombres`, `apellidos`, `id_ciudad`, `fecha_creacion`, `estado`, `telefonos`, `direcciones`, `empresa_pertenece`, `semestre`, `fecha_nacimiento`, `id_pais`, `id_estado`, `codigo_universitario`, `estudios_adicionales`) VALUES
(48, 1, 'hmontoya@ccdcommunications.com', 'a83aafaf863d67e6f0ceb899498baeed04887cc4', 'Henry', 'Montoya', 0, '2015-01-24 00:00:00', 1, NULL, NULL, '', 0, '0000-00-00', 0, '', '', ''),
(49, 2, 'hmontoya@prueba.com', '', 'Henry Alexander', 'User', 0, '2015-01-24 00:00:00', 1, NULL, NULL, '', 0, '0000-00-00', 0, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `authassignment`
--
ALTER TABLE `authassignment`
 ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indices de la tabla `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temperatura`
--
ALTER TABLE `temperatura`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
 ADD PRIMARY KEY (`id`), ADD KEY `T_user` (`user_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_usuario_1` (`id_ciudad`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adjuntos`
--
ALTER TABLE `adjuntos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3688690;
--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7303689;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `temperatura`
--
ALTER TABLE `temperatura`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `userlog`
--
ALTER TABLE `userlog`
ADD CONSTRAINT `T_user` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
