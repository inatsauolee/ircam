-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 03 Février 2020 à 19:49
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ircam`
--
CREATE DATABASE
IF NOT EXISTS `ircam` DEFAULT CHARACTER
SET utf8
COLLATE utf8_general_ci;
USE `ircam`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE
IF NOT EXISTS `category`
(
  `ID` int
(11) NOT NULL AUTO_INCREMENT,
  `label` varchar
(100) COLLATE utf8_bin NOT NULL,
  `creator` int
(11) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `creator`
(`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=48 ;

--
-- Contenu de la table `category`
--


-- --------------------------------------------------------

--
-- Structure de la table `expression`
--

CREATE TABLE
IF NOT EXISTS `expression`
(
  `ID` int
(10) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `word_group` text NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY
(`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `expression`
--

-- --------------------------------------------------------

--
-- Structure de la table `grammar`
--

CREATE TABLE
IF NOT EXISTS `grammar`
(
  `ID` int
(10) NOT NULL AUTO_INCREMENT,
  `tawalt_ID` int
(10) NOT NULL,
  `past` varchar
(100) NOT NULL,
  `present` varchar
(100) NOT NULL,
  `future` varchar
(100) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `tawalt_ID`
(`tawalt_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `grammar`
--

-- --------------------------------------------------------

--
-- Structure de la table `tawalt`
--

CREATE TABLE
IF NOT EXISTS `tawalt`
(
  `ID` int
(10) NOT NULL AUTO_INCREMENT,
  `tifinagh` varchar
(100) NOT NULL,
  `label` varchar
(100) NOT NULL,
  `type` int
(11) NOT NULL DEFAULT '0',
  `category` int
(11) NOT NULL,
  `creator` int
(11) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `type`
(`type`),
  KEY `category`
(`category`),
  KEY `creator`
(`creator`),
  KEY `creator_2`
(`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tawalt`
--

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE
IF NOT EXISTS `type`
(
  `ID` int
(11) NOT NULL AUTO_INCREMENT,
  `label` varchar
(100) COLLATE utf8_bin NOT NULL,
  `creator` int
(11) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `creator`
(`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `type`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE
IF NOT EXISTS `user` (
  `ID` int
(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar
(100) NOT NULL,
  `last_name` varchar
(100) NOT NULL,
  `email` varchar
(100) NOT NULL,
  `username` varchar
(50) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `role` int
(2) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `ID`
(`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--


-- --------------------------------------------------------

--
-- Structure de la table `word`
--

CREATE TABLE
IF NOT EXISTS `word`
(
  `ID` int
(10) NOT NULL AUTO_INCREMENT,
  `tawalt_ID` int
(10) NOT NULL,
  `label` varchar
(100) NOT NULL,
  PRIMARY KEY
(`ID`),
  KEY `tawalt_ID`
(`tawalt_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `word`
--



--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY
(`creator`) REFERENCES `user`
(`ID`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Contraintes pour la table `grammar`
--
ALTER TABLE `grammar`
ADD CONSTRAINT `grammar_tawalt_ID` FOREIGN KEY
(`tawalt_ID`) REFERENCES `tawalt`
(`ID`);

--
-- Contraintes pour la table `tawalt`
--
ALTER TABLE `tawalt`
ADD CONSTRAINT `tawalt_ibfk_2` FOREIGN KEY
(`category`) REFERENCES `category`
(`ID`),
ADD CONSTRAINT `tawalt_ibfk_1` FOREIGN KEY
(`type`) REFERENCES `type`
(`ID`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `tawalt_ibfk_3` FOREIGN KEY
(`creator`) REFERENCES `tawalt`
(`ID`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY
(`creator`) REFERENCES `user`
(`ID`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Contraintes pour la table `word`
--
ALTER TABLE `word`
ADD CONSTRAINT `word_tawalt_ID` FOREIGN KEY
(`tawalt_ID`) REFERENCES `tawalt`
(`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
