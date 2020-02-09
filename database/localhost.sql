-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 09 Février 2020 à 16:15
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Structure de la table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_name` varchar(20) NOT NULL,
  `asset_type` varchar(20) NOT NULL,
  `ip_adress` varchar(20) NOT NULL,
  `operating_system` varchar(40) NOT NULL,
  `asset_value` int(11) NOT NULL,
  `latest_scan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_name`, `asset_type`, `ip_adress`, `operating_system`, `asset_value`, `latest_scan`) VALUES
(1, 'Web Server 1', 'Apache 2 Web Server', '192.168.1.11', 'CentOS 7', 4, '2018-12-29 18:58:36'),
(2, 'Web Server 1', 'Apache 2 Web Server', '192.168.1.11', 'CentOS 7', 4, '2018-12-29 18:58:36'),
(3, 'Web Server 1', 'Apache 2 Web Server', '192.168.1.11', 'CentOS 7', 4, '2018-12-29 18:58:36'),
(4, 'Web Server 1', 'Apache 2 Web Server', '192.168.1.11', 'CentOS 7', 4, '2018-12-29 18:58:36'),
(5, 'Web Server 1', 'Apache 2 Web Server', '192.168.1.11', 'CentOS 7', 4, '2018-12-29 18:58:36');

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `scan_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asset_type` varchar(20) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `report_source` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `report`
--

INSERT INTO `report` (`report_id`, `scan_date`, `asset_type`, `asset_name`, `report_source`, `description`) VALUES
(1, '2018-12-05 03:07:02', 'Operating System', 'Mail Server', 'OpenSCAP', 'This scan is..'),
(2, '2018-12-29 16:59:14', 'Operating System', 'Mail Server', 'Lynis', 'Hello man.');

-- --------------------------------------------------------

--
-- Structure de la table `scan`
--

CREATE TABLE IF NOT EXISTS `scan` (
  `scan_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scan_tool` varchar(20) NOT NULL,
  `scan_type` varchar(20) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `runner` varchar(20) NOT NULL,
  PRIMARY KEY (`scan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=290 ;

--
-- Contenu de la table `scan`
--

INSERT INTO `scan` (`scan_id`, `date`, `scan_tool`, `scan_type`, `asset_name`, `runner`) VALUES
(98, '2018-12-29 17:16:26', 'OpenSCAP', 'Full scan', 'Web Server 1', 'User2'),
(288, '2018-12-29 17:16:26', 'Lynis', 'Full scan', 'Web Server 1', 'User1'),
(289, '2018-10-29 17:16:26', 'Lynis', 'Quick scan', 'Web Server 2', 'User2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `role`, `enabled`, `description`) VALUES
(1, 'admin', 'admin', 'Omar', 'ELOUASTANI', 'o.elouastani@hardening.pfe', 'Admin', 1, 'This acount..'),
(2, 'user0', 'user0', 'User0', '', 'User.0@hardening.pfe', 'Visitor', 1, 'This user was..'),
(3, 'user1', 'user1', 'User1', '', 'User.1@hardening.pfe', 'Auditor', 0, 'This user was for..'),
(4, 'user2', 'user2', 'User2', '', 'User.2@hardening.pfe', 'Auditor', 1, 'This user was for..'),
(5, 'medo', '123456', 'Mohamed', 'ELOUASTANI', 'moh@gmail.com', 'Visitor', 1, '');
--
-- Base de données: `exemple_db`
--
CREATE DATABASE IF NOT EXISTS `exemple_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exemple_db`;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT 'Unknown Phone',
  `Age` int(11) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`Name`, `Phone`, `Age`) VALUES
('kjfkdf', '98219120', 0);

-- --------------------------------------------------------

--
-- Structure de la table `has`
--

CREATE TABLE IF NOT EXISTS `has` (
  `wqe` int(11) NOT NULL,
  `wq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE IF NOT EXISTS `poste` (
  `nPoste` varchar(7) NOT NULL,
  `nomPoste` varchar(20) NOT NULL,
  `indIP` varchar(11) DEFAULT NULL,
  `ad` varchar(3) DEFAULT NULL,
  `typePoste` varchar(9) DEFAULT NULL,
  `nSalle` varchar(7) DEFAULT NULL,
  `nbLog` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`nPoste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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

INSERT INTO `category` (`ID`, `label`, `creator`) VALUES
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

INSERT INTO `collection` (`ID`, `label`, `class`, `creator`) VALUES
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

INSERT INTO `course` (`ID`, `label`, `level`, `collection_ID`, `creator`) VALUES
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

INSERT INTO `expression` (`ID`, `label`, `word_group`, `translation`) VALUES
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

INSERT INTO `grammar` (`ID`, `tawalt_ID`, `past`, `present`, `future`) VALUES
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

INSERT INTO `question` (`ID`, `label`, `type`, `tawalt_ID`, `course_ID`, `creator`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `tawalt`
--

INSERT INTO `tawalt` (`ID`, `tifinagh`, `label`, `type`, `category`, `picture`, `creator`) VALUES
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

INSERT INTO `type` (`ID`, `label`, `creator`) VALUES
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

INSERT INTO `user` (`ID`, `first_name`, `last_name`, `email`, `username`, `password`, `role`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `word`
--

INSERT INTO `word` (`ID`, `tawalt_ID`, `label`) VALUES
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
--
-- Base de données: `php-mvc`
--
CREATE DATABASE IF NOT EXISTS `php-mvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php-mvc`;

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` text COLLATE utf8_unicode_ci NOT NULL,
  `track` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Contenu de la table `song`
--

INSERT INTO `song` (`id`, `artist`, `track`, `link`) VALUES
(1, 'Dena', 'Cash, Diamond Ring, Swimming Pools', 'http://www.youtube.com/watch?v=r4CDc9yCAqE'),
(2, 'Jessy Lanza', 'Kathy Lee', 'http://vimeo.com/73455369'),
(3, 'The Orwells', 'In my Bed (live)', 'http://www.youtube.com/watch?v=8tA_2qCGnmE'),
(4, 'L''Orange & Stik Figa', 'Smoke Rings', 'https://www.youtube.com/watch?v=Q5teohMyGEY'),
(5, 'Labyrinth Ear', 'Navy Light', 'http://www.youtube.com/watch?v=a9qKkG7NDu0'),
(6, 'Bon Hiver', 'Wolves (Kill them with Colour Remix)', 'http://www.youtube.com/watch?v=5GXAL5mzmyw'),
(7, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 'Dillon & Dirk von Loetzow', 'Tip Tapping (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=hbrOLsgu000'),
(9, 'Dillon', 'Contact Us (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=E6WqTL2Up3Y'),
(10, 'Tricky', 'Hey Love (Promo Edit)', 'http://www.youtube.com/watch?v=OIsCGdW49OQ'),
(11, 'Compuphonic', 'Sunset feat. Marques Toliver (DJ T. Remix)', 'http://www.youtube.com/watch?v=Ue5ZWSK9r00'),
(12, 'Ludovico Einaudi', 'Divenire (live @ Royal Albert Hall London)', 'http://www.youtube.com/watch?v=X1DRDcGlSsE'),
(13, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 'Beirut', 'Nantes (Fredo & Thang Remix)', 'https://www.youtube.com/watch?v=ojV3oMAgGgU'),
(15, 'Buku', 'All Deez', 'http://www.youtube.com/watch?v=R0bN9JRIqig'),
(16, 'Pilocka Krach', 'Wild Pete', 'http://www.youtube.com/watch?v=4wChP_BEJ4s'),
(17, 'Mount Kimbie', 'Here to stray (live at Pitchfork Music Festival Paris)', 'http://www.youtube.com/watch?v=jecgI-zEgIg'),
(18, 'Kool Savas', 'King of Rap (2012) / Ein Wunder', 'http://www.youtube.com/watch?v=mTqc6UTG1eY&hd=1'),
(19, 'Chaim feat. Meital De Razon', 'Love Rehab (Original Mix)', 'http://www.youtube.com/watch?v=MJT1BbNFiGs'),
(20, 'Emika', 'Searching', 'http://www.youtube.com/watch?v=oscuSiHfbwo'),
(21, 'Emika', 'Sing to me', 'http://www.youtube.com/watch?v=k9sDBZm8pgk'),
(22, 'George Fitzgerald', 'Thinking of You', 'http://www.youtube.com/watch?v=-14B8l49iKA'),
(23, 'Disclosure', 'You & Me (Flume Edit)', 'http://www.youtube.com/watch?v=OUkkaqSNduU'),
(24, 'Crystal Castles', 'Doe Deer', 'http://www.youtube.com/watch?v=zop0sWrKJnQ'),
(25, 'Tok Tok vs. Soffy O.', 'Missy Queens Gonna Die', 'http://www.youtube.com/watch?v=EN0Tnw5zy6w'),
(26, 'Fink', 'Maker (Synapson Remix)', 'http://www.youtube.com/watch?v=Dyd-cUkj4Nk'),
(27, 'Flight Facilities (ft. Christine Hoberg)', 'Clair De Lune', 'http://www.youtube.com/watch?v=Jcu1AHaTchM'),
(28, 'Karmon', 'Turning Point (Original Mix)', 'https://www.youtube.com/watch?v=-tB-zyLSPEo'),
(29, 'Shuttle Life', 'The Birds', 'http://www.youtube.com/watch?v=-I3m3cWDEtM'),
(30, 'SantÃ©', 'Homegirl (Rampa Mix)', 'http://www.youtube.com/watch?v=fnhMNOWxLYw');
--
-- Base de données: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de données: `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- Structure de la table `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authority`
--

INSERT INTO `authority` (`id`, `name`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `authority_seq`
--

CREATE TABLE IF NOT EXISTS `authority_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authority_seq`
--

INSERT INTO `authority_seq` (`next_val`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enabled` bit(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastpasswordresetdate` datetime NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_sb8bbouer5wak8vyiiy4pf2bx` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `enabled`, `firstname`, `lastpasswordresetdate`, `lastname`, `password`, `username`) VALUES
(1, 'admin@admin.com', b'1', 'admin', '2018-09-19 00:00:00', 'admin', '$2a$08$lDnHPz7eUkSi6ao14Twuau08mzhWrL4kyZGGU5xfiGALO/Vxd5DOi', 'admin'),
(2, 'enabled@user.com', b'1', 'user', '2018-09-19 00:00:00', 'user', '$2a$08$UkVvwpULis18S19S5pZFn.YHPZt3oaqHZnDwqbCW9pft6uFtkXKDC', 'user'),
(3, 'disabled@user.com', b'0', 'user', '2018-09-19 00:00:00', 'user', '$2a$08$UkVvwpULis18S19S5pZFn.YHPZt3oaqHZnDwqbCW9pft6uFtkXKDC', 'disabled');

-- --------------------------------------------------------

--
-- Structure de la table `user_authority`
--

CREATE TABLE IF NOT EXISTS `user_authority` (
  `user_id` bigint(20) NOT NULL,
  `authority_id` bigint(20) NOT NULL,
  KEY `FKgvxjs381k6f48d5d2yi11uh89` (`authority_id`),
  KEY `FKpqlsjpkybgos9w2svcri7j8xy` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_authority`
--

INSERT INTO `user_authority` (`user_id`, `authority_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_seq`
--

CREATE TABLE IF NOT EXISTS `user_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_seq`
--

INSERT INTO `user_seq` (`next_val`) VALUES
(1);
--
-- Base de données: `tmdb`
--
CREATE DATABASE IF NOT EXISTS `tmdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tmdb`;

-- --------------------------------------------------------

--
-- Structure de la table `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authority`
--

INSERT INTO `authority` (`id`, `name`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `authority_seq`
--

CREATE TABLE IF NOT EXISTS `authority_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authority_seq`
--

INSERT INTO `authority_seq` (`next_val`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `execution`
--

CREATE TABLE IF NOT EXISTS `execution` (
  `id_execution` int(11) NOT NULL,
  `date_execution` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `executor_id` int(11) DEFAULT NULL,
  `test_case_id_test_case` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_execution`),
  KEY `FKsxj934bma70rv4nxhl9jks1tg` (`executor_id`),
  KEY `FKf8g5ojsx8qxvistyvnw83w5uf` (`test_case_id_test_case`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `execution`
--

INSERT INTO `execution` (`id_execution`, `date_execution`, `duration`, `notes`, `result`, `executor_id`, `test_case_id_test_case`) VALUES
(1, '2018-09-05 00:00:00', 10, 'passed perfectly..', 'passed', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hibernate_sequence`
--

CREATE TABLE IF NOT EXISTS `hibernate_sequence` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hibernate_sequence`
--

INSERT INTO `hibernate_sequence` (`next_val`) VALUES
(11),
(11),
(11),
(11),
(11);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prefix` int(11) DEFAULT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `FKoc22ltfbv8myeewvtm5j7q0dg` (`creator_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id_project`, `date_creation`, `description`, `name`, `prefix`, `creator_id`) VALUES
(1, '2018-09-04 10:00:00', 'A Java Project for safe communication..', 'AwalAPP Project', 87, 2),
(2, '2018-09-17 10:00:00', 'A Java Disktop Application for security of spaces..', 'Assiwan Camera Viewer', 3032, 2),
(3, '2018-09-17 10:00:00', 'Shopping Web Site Made in Java/JEE Spring MVC', 'Azlaf.com', 4909, 2);

-- --------------------------------------------------------

--
-- Structure de la table `project_scenarios`
--

CREATE TABLE IF NOT EXISTS `project_scenarios` (
  `project_id_project` int(11) NOT NULL,
  `scenarios_id_scenario` int(11) NOT NULL,
  UNIQUE KEY `UK_8nvibunmpk0035e2nm3ms27ei` (`scenarios_id_scenario`),
  KEY `FKh42o8iy0j0qfrgbq8cxseerxq` (`project_id_project`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `scenario`
--

CREATE TABLE IF NOT EXISTS `scenario` (
  `id_scenario` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `project_id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_scenario`),
  KEY `FKhhqbifm6750awxorbj23q7bru` (`creator_id`),
  KEY `FKc0un3wnvnxkbqsqjn3w0ueqo` (`project_id_project`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `scenario`
--

INSERT INTO `scenario` (`id_scenario`, `date_creation`, `description`, `title`, `creator_id`, `project_id_project`) VALUES
(1, '2018-09-17 00:00:00', 'This Scenario is for how to sign up in the app..', 'Register to the application', 2, 1),
(2, '2018-09-17 00:00:00', 'This Scenario is for how to sign up in the app..', 'Bla Bla bla', 2, 1),
(3, '2018-09-17 00:00:00', 'This Scenario is for how to sign up in the app..', 'hhhhhhhhhhhhhhhhhh', 2, 1),
(4, '2018-09-17 00:00:00', 'Nothing is bifdsalh ;sakflasjfkjsakd;o koajsf lojsapofjsa iojsapof jsaoij foiajs foisaj isaj ijsai fjasoif jsaoi joisajo ijoi saj f..', 'Login into the App', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test_case`
--

CREATE TABLE IF NOT EXISTS `test_case` (
  `id_test_case` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `scenario_id_scenario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_test_case`),
  KEY `FKrnm21u039ib8t1wbyttjcylal` (`creator_id`),
  KEY `FK1swebqr3kis0b17w56vjql2i3` (`scenario_id_scenario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `test_case`
--

INSERT INTO `test_case` (`id_test_case`, `date_creation`, `description`, `duration`, `status`, `title`, `creator_id`, `scenario_id_scenario`) VALUES
(100, '2018-09-02 00:00:00', '- username & password empty! - login', 1, 'in progress', 'username & password empty!', 2, 1),
(3, '2018-09-20 16:01:05', 'kjkj', 5, 'to do', 'lj', NULL, NULL),
(200, '2018-09-02 00:00:00', '- entrer un username deja utilise - click login..', 10, 'done', 'username deja utilise', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test_case_executions`
--

CREATE TABLE IF NOT EXISTS `test_case_executions` (
  `test_case_id_test_case` int(11) NOT NULL,
  `executions_id_execution` int(11) NOT NULL,
  UNIQUE KEY `UK_kl8c1ujdbuqj69fht0ubefwnu` (`executions_id_execution`),
  KEY `FKjxbklxg5m1jm4p848e6sm376q` (`test_case_id_test_case`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `enabled` bit(1) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `last_password_reset_date` datetime NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `enabled`, `gender`, `last_password_reset_date`, `mobile`, `name`, `password`, `username`) VALUES
(2, 'inatsauolee@gmail.com', b'1', 'Male', '2018-09-13 19:05:51', '032409432', 'INATSAUOLEE', '$2a$08$lDnHPz7eUkSi6ao14Twuau08mzhWrL4kyZGGU5xfiGALO/Vxd5DOi', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `user_authority`
--

CREATE TABLE IF NOT EXISTS `user_authority` (
  `user_id` bigint(20) NOT NULL,
  `authority_id` bigint(20) NOT NULL,
  KEY `FKgvxjs381k6f48d5d2yi11uh89` (`authority_id`),
  KEY `FKpqlsjpkybgos9w2svcri7j8xy` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_authority`
--

INSERT INTO `user_authority` (`user_id`, `authority_id`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_seq`
--

CREATE TABLE IF NOT EXISTS `user_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_seq`
--

INSERT INTO `user_seq` (`next_val`) VALUES
(21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
