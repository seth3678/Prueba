-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2015 a las 19:14:37
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `codetagdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `authassignment`:
--   `itemname`
--       `authitem` -> `name`
--

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

DROP TABLE IF EXISTS `authitem`;
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, 'admin role', 'adminrole', 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.*', 1, NULL, NULL, 'N;'),
('Terceros.Tercero.Admin', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.Create', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.Delete', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.Index', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.Update', 0, NULL, NULL, 'N;'),
('Terceros.Tercero.View', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.CreateAjax', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `authitemchild`:
--   `parent`
--       `authitem` -> `name`
--   `child`
--       `authitem` -> `name`
--

--
-- Volcado de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'Site.*'),
('Authenticated', 'Site.Contact'),
('Authenticated', 'Site.Error'),
('Authenticated', 'Site.Index'),
('Authenticated', 'Site.Login'),
('Authenticated', 'Site.Logout'),
('Authenticated', 'Terceros.Tercero.*'),
('Authenticated', 'Terceros.Tercero.Admin'),
('Authenticated', 'Terceros.Tercero.Create'),
('Authenticated', 'Terceros.Tercero.Delete'),
('Authenticated', 'Terceros.Tercero.Index'),
('Authenticated', 'Terceros.Tercero.Update'),
('Authenticated', 'Terceros.Tercero.View'),
('Authenticated', 'User.Activation.*'),
('Authenticated', 'User.Activation.Activation'),
('Authenticated', 'User.Admin.*'),
('Authenticated', 'User.Admin.Admin'),
('Authenticated', 'User.Admin.Create'),
('Authenticated', 'User.Admin.CreateAjax'),
('Authenticated', 'User.Admin.Delete'),
('Authenticated', 'User.Admin.Update'),
('Authenticated', 'User.Admin.View'),
('Authenticated', 'User.Default.*'),
('Authenticated', 'User.Default.Index'),
('Authenticated', 'User.Login.*'),
('Authenticated', 'User.Login.Login'),
('Authenticated', 'User.Logout.*'),
('Authenticated', 'User.Logout.Logout'),
('Authenticated', 'User.Profile.*'),
('Authenticated', 'User.Profile.Changepassword'),
('Authenticated', 'User.Profile.Edit'),
('Authenticated', 'User.Profile.Profile'),
('Authenticated', 'User.ProfileField.*'),
('Authenticated', 'User.ProfileField.Admin'),
('Authenticated', 'User.ProfileField.Create'),
('Authenticated', 'User.ProfileField.Update'),
('Authenticated', 'User.ProfileField.View'),
('Authenticated', 'User.Recovery.*'),
('Authenticated', 'User.Recovery.Recovery'),
('Authenticated', 'User.Registration.*'),
('Authenticated', 'User.Registration.Registration'),
('Authenticated', 'User.User.*'),
('Authenticated', 'User.User.Index'),
('Authenticated', 'User.User.View');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `rights`:
--   `itemname`
--       `authitem` -> `name`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versions_data` text NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '1',
  `description` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gallery_photo`
--

DROP TABLE IF EXISTS `tbl_gallery_photo`;
CREATE TABLE IF NOT EXISTS `tbl_gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) NOT NULL DEFAULT '',
  `description` text,
  `file_name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_gallery_photo_gallery1` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `tbl_gallery_photo`:
--   `gallery_id`
--       `tbl_gallery` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_multimedia`
--

DROP TABLE IF EXISTS `tbl_multimedia`;
CREATE TABLE IF NOT EXISTS `tbl_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inmueble_id` int(11) NOT NULL,
  `origen_ruta` varchar(250) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inmueble_id` (`inmueble_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `tbl_multimedia`:
--   `inmueble_id`
--       `tbl_inmueble` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_m_multimedia`
--

DROP TABLE IF EXISTS `tbl_m_multimedia`;
CREATE TABLE IF NOT EXISTS `tbl_m_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_m_multimedia`
--

INSERT INTO `tbl_m_multimedia` (`id`, `titulo`) VALUES
(1, 'Fotos'),
(2, 'Videos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles`
--

DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profiles_fields`
--

DROP TABLE IF EXISTS `tbl_profiles_fields`;
CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tercero`
--

DROP TABLE IF EXISTS `tbl_tercero`;
CREATE TABLE IF NOT EXISTS `tbl_tercero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `fecha_cumple_annos` datetime NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo_electronico` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `tercero_id` int(11) NOT NULL,
  `sucursal_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`),
  KEY `tercero_id` (`tercero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`, `tercero_id`, `sucursal_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'xneydder_hb@hotmail.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-08-08 18:46:24', '2015-03-24 23:41:20', 1, 1, 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_gallery_photo`
--
ALTER TABLE `tbl_gallery_photo`
  ADD CONSTRAINT `tbl_gallery_photo_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `tbl_gallery` (`id`);

--
-- Filtros para la tabla `tbl_multimedia`
--
ALTER TABLE `tbl_multimedia`
  ADD CONSTRAINT `tbl_multimedia_ibfk_1` FOREIGN KEY (`inmueble_id`) REFERENCES `tbl_inmueble` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
