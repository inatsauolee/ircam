-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 07 Mars 2020 à 14:16
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ircam`
--
CREATE DATABASE IF NOT EXISTS `ircam` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ircam`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_bin NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=48 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (ID, label, creator) VALUES
(1, 'communication', 1),
(30, 'Animal', 1),
(31, 'Fruit', 1),
(32, 'Fruit', 1),
(33, 'dss', 1),
(34, 'dss', 1),
(35, 'Animal', 1),
(36, 'dew', 1),
(37, 'Fruit', 1),
(38, 'Animal', 1),
(39, 'Animal', 1),
(40, 'dsfdsf', 1),
(41, 'dsfdsf', 1),
(42, 'dsfdsf', 1),
(43, 'Animal', 1),
(44, 'jsdfkjds', 1),
(45, 'Animal', 1),
(46, 'Animal', 1),
(47, 'dsfdsf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `class` int(2) NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (ID, label, class, creator) VALUES
(1, 'Basic', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `collection_user`
--

CREATE TABLE IF NOT EXISTS `collection_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `collection_ID` int(11) NOT NULL,
  `level` int(2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_ID` (`user_ID`,`collection_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `level` int(2) NOT NULL,
  `collection_ID` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `creator` (`creator`),
  KEY `collection_ID` (`collection_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `course`
--

INSERT INTO `course` (ID, label, level, collection_ID, creator) VALUES
(1, 'Course 1', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `course_user`
--

CREATE TABLE IF NOT EXISTS `course_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `course_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `mark` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_ID` (`user_ID`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `expression`
--

CREATE TABLE IF NOT EXISTS `expression` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `word_group` text NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `expression`
--

INSERT INTO `expression` (ID, label, word_group, translation) VALUES
(1, 'masin issawal Tamazivt', '1,2', 'masin talks in Tamazight');

-- --------------------------------------------------------

--
-- Structure de la table `grammar`
--

CREATE TABLE IF NOT EXISTS `grammar` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tawalt_ID` int(10) NOT NULL,
  `past` varchar(100) NOT NULL,
  `present` varchar(100) NOT NULL,
  `future` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tawalt_ID` (`tawalt_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `grammar`
--

INSERT INTO `grammar` (ID, tawalt_ID, past, present, future) VALUES
(1, 1, 'ssiwlev, tessiwled, issiwel, tessiwel, nessiwel, tessiwlem, tessiwlent, ssiwlen, ssiwlent', 'ssawalev, tessawaled, issawal, tessawal, nessawal, tessawalem, tessawalent, ssawalen, ssawalent', 'ad ssiwlev, ad tessiwled, ad issiwel, ad tessiwel, ad nessiwel, ad tessiwlem, ad tessiwlent, ad ssiw');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(1000) NOT NULL,
  `type` int(2) NOT NULL,
  `tawalt_ID` int(11) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `course_ID` (`course_ID`,`creator`),
  KEY `tawalt_ID` (`tawalt_ID`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (ID, label, type, tawalt_ID, course_ID, creator) VALUES
(1, 'What is the meaning of:', 0, 1, 1, 1),
(2, 'What is the right picture for:', 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tawalt`
--

CREATE TABLE IF NOT EXISTS `tawalt` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tifinagh` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `type` (`type`),
  KEY `category` (`category`),
  KEY `creator` (`creator`),
  KEY `creator_2` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tawalt`
--

INSERT INTO `tawalt` (ID, tifinagh, label, type, category, picture, creator) VALUES
(1, 'issiwel', 'issiwel', 1, 1, NULL, 1),
(2, 'tamazivt', 'tamaziɣt', 0, 1, NULL, 1),
(3, 'apenjir', 'apenjir', 0, 1, NULL, 1),
(5, 'azul', 'azul', 0, 1, NULL, 1),
(6, 'amsawad', 'amsawad', 0, 1, NULL, 1),
(8, 'awal', 'awal', 0, 1, NULL, 1),
(9, 'tawalt', 'tawalt', 0, 1, NULL, 1),
(10, 'taleccint', 'taleccint', 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_bin NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (ID, label, creator) VALUES
(0, 'noun', 1),
(1, 'verb', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (ID, first_name, last_name, email, username, password, role) VALUES
(1, 'Ahmed', 'ELHAJOUTI', '', 'admin', '123', 0),
(2, 'Mohamed', 'ELOUASTANI', '', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 0);

-- --------------------------------------------------------

--
-- Structure de la table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tawalt_ID` int(10) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tawalt_ID` (`tawalt_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `word`
--

INSERT INTO `word` (ID, tawalt_ID, label) VALUES
(1, 1, 'talk'),
(2, 2, 'tamazight'),
(3, 5, 'Hello'),
(4, 6, 'communication'),
(6, 8, 'talking'),
(7, 9, 'word'),
(8, 10, 'orange');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`collection_ID`) REFERENCES `collection` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`creator`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `grammar`
--
ALTER TABLE `grammar`
  ADD CONSTRAINT `grammar_tawalt_ID` FOREIGN KEY (`tawalt_ID`) REFERENCES `tawalt` (`ID`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`tawalt_ID`) REFERENCES `tawalt` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`course_ID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`creator`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tawalt`
--
ALTER TABLE `tawalt`
  ADD CONSTRAINT `tawalt_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tawalt_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `tawalt_ibfk_3` FOREIGN KEY (`creator`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `word`
--
ALTER TABLE `word`
  ADD CONSTRAINT `word_tawalt_ID` FOREIGN KEY (`tawalt_ID`) REFERENCES `tawalt` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;