-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 août 2022 à 21:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projets`
--

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

DROP TABLE IF EXISTS `localite`;
CREATE TABLE IF NOT EXISTS `localite` (
  `codLocalite` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomLocalite` varchar(255) NOT NULL,
  PRIMARY KEY (`codLocalite`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localite`
--

INSERT INTO `localite` (`codLocalite`, `nomLocalite`) VALUES
(1, 'Hêvié'),
(2, 'Cotonou'),
(3, 'Godomey'),
(4, 'Abomey-Calavi'),
(5, 'Ouidah'),
(6, 'Pahou'),
(7, 'Lokossa'),
(8, 'Porto-Novo'),
(9, 'Abomey'),
(10, 'Zinvié');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `idProjet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codeProjet` varchar(255) NOT NULL,
  `nomProjet` varchar(255) NOT NULL,
  `dateLancement` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `nomLocalite` varchar(255) NOT NULL,
  PRIMARY KEY (`idProjet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idProjet`, `codeProjet`, `nomProjet`, `dateLancement`, `duree`, `nomLocalite`) VALUES
(1, 'N26001', 'Technologie', '20/08/2022', '15 mois', '2'),
(2, 'N26002', 'Agronomie', '21/08/2022', '16 mois', 'Hêvié'),
(3, 'N26006', 'SIL', '22/08/2022', '17 mois', 'Porto-Novo'),
(4, 'N26005', 'Télécommunication', '23/08/2022', '18 mois', 'Hêvié');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

DROP TABLE IF EXISTS `suivi`;
CREATE TABLE IF NOT EXISTS `suivi` (
  `numSuivi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateSuivi` varchar(255) NOT NULL,
  `pourcentage` varchar(255) NOT NULL,
  `idProjet` int(11) NOT NULL,
  PRIMARY KEY (`numSuivi`),
  KEY `idProjet` (`idProjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
