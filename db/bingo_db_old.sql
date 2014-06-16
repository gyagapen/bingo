-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Mai 2014 à 16:21
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bingo_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `creation_date` date NOT NULL,
  `start_date` date NOT NULL,
  `bingo_date` date NOT NULL,
  `ligne_date` date NOT NULL,
  `prize_desc` varchar(255) NOT NULL,
  `prize_logo` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game`
--

INSERT INTO `game` (`id`, `creation_date`, `start_date`, `bingo_date`, `ligne_date`, `prize_desc`, `prize_logo`, `is_active`) VALUES
(2, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'TEST', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `number`
--

CREATE TABLE IF NOT EXISTS `number` (
  `value` int(11) NOT NULL,
  `retrieve_at` date NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `number`
--

INSERT INTO `number` (`value`, `retrieve_at`, `game_id`) VALUES
(2, '2014-05-26', 2),
(1, '2014-05-26', 2),
(2, '2014-05-26', 2),
(2, '2014-05-26', 2),
(3, '2014-05-26', 2),
(4, '2014-05-26', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
