-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 29 Mai 2014 à 17:55
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bingo_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `creation_date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `bingo_date` datetime NOT NULL,
  `ligne_date` datetime NOT NULL,
  `prize_desc` varchar(255) NOT NULL,
  `prize_logo` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `prize_ligne_desc` varchar(255) NOT NULL,
  `partie_no` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `game`
--

INSERT INTO `game` (`id`, `creation_date`, `start_date`, `bingo_date`, `ligne_date`, `prize_desc`, `prize_logo`, `is_active`, `prize_ligne_desc`, `partie_no`) VALUES
(8, '2014-05-29 14:42:15', '0000-00-00 00:00:00', '2014-05-29 14:44:49', '2014-05-29 14:43:43', 'test1', '', 0, 'test2', 0),
(9, '2014-05-29 14:50:57', '0000-00-00 00:00:00', '2014-05-29 16:30:13', '2014-05-29 15:01:03', 'test', '', 0, 'test', 0),
(10, '2014-05-29 16:30:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-05-29 16:31:55', '1 dîner à l hôtel - 1 Voucher 500Rs - 1 Casquette - 1 cheque 1000Rs', '', 0, '4 doritos', 2),
(11, '2014-05-29 17:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', '', 0, 'test', 1),
(12, '2014-05-29 17:49:10', '0000-00-00 00:00:00', '2014-05-29 17:52:15', '2014-05-29 17:50:22', 'Test', '', 0, 'Test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `number`
--

DROP TABLE IF EXISTS `number`;
CREATE TABLE IF NOT EXISTS `number` (
  `value` int(11) NOT NULL,
  `retrieve_at` datetime NOT NULL,
  `game_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `check_state` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `number`
--

INSERT INTO `number` (`value`, `retrieve_at`, `game_id`, `is_active`, `check_state`) VALUES
(54, '2014-05-29 14:42:45', 8, 0, 2),
(99, '2014-05-29 14:43:00', 8, 0, 1),
(3, '2014-05-29 14:43:58', 8, 0, 0),
(10, '2014-05-29 14:44:04', 8, 0, 0),
(8, '2014-05-29 14:52:01', 9, 0, 1),
(90, '2014-05-29 14:54:50', 9, 0, 0),
(89, '2014-05-29 14:54:58', 9, 0, 0),
(76, '2014-05-29 15:04:07', 9, 0, 2),
(60, '2014-05-29 15:04:28', 9, 0, 0),
(78, '2014-05-29 15:07:04', 9, 0, 0),
(7, '2014-05-29 16:30:58', 10, 0, 1),
(1, '2014-05-29 16:31:07', 10, 1, 0),
(10, '2014-05-29 16:31:10', 10, 0, 1),
(11, '2014-05-29 16:32:09', 10, 0, 0),
(89, '2014-05-29 16:33:48', 10, 0, 0),
(90, '2014-05-29 16:33:54', 10, 0, 0),
(12, '2014-05-29 17:49:19', 12, 0, 1),
(4, '2014-05-29 17:49:22', 12, 0, 2),
(8, '2014-05-29 17:49:30', 12, 0, 2),
(14, '2014-05-29 17:49:34', 12, 0, 0),
(26, '2014-05-29 17:50:34', 12, 0, 2),
(75, '2014-05-29 17:50:39', 12, 0, 2),
(13, '2014-05-29 17:50:45', 12, 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
