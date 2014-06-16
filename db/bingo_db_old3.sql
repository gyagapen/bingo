-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Mai 2014 à 15:39
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
CREATE DATABASE IF NOT EXISTS `bingo_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bingo_db`;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
