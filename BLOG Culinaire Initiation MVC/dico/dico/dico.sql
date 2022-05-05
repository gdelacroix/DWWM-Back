-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 25 mars 2022 à 12:09
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dico`
--
CREATE DATABASE IF NOT EXISTS `dico` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dico`;

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `idauteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `siecle` varchar(5) NOT NULL,
  PRIMARY KEY (`idauteur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`idauteur`, `nom`, `prenom`, `siecle`) VALUES
(1, 'Coluche', 'Michel', 'XX'),
(2, 'Balzac', 'Honoré', 'XIX'),
(3, 'Hugo', 'Victor', 'XIX'),
(4, 'Malraux', 'André', 'XX');

-- --------------------------------------------------------

--
-- Structure de la table `citation`
--

DROP TABLE IF EXISTS `citation`;
CREATE TABLE IF NOT EXISTS `citation` (
  `idcit` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(255) NOT NULL,
  `auteurid` int(11) NOT NULL,
  PRIMARY KEY (`idcit`),
  KEY `FK_auteur` (`auteurid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `citation`
--

INSERT INTO `citation` (`idcit`, `texte`, `auteurid`) VALUES
(1, 'Les politiciens, il y en a, pour briller en société, ils mangeraient du cirage.', 1),
(2, 'Quand vous voyez un flic dans la rue, c’est qu’y a pas de danger. S’il y avait du danger, le flic serait pas là.', 1),
(3, 'On n’est point l’ami d’une femme lorsqu’on peut être son amant.', 2),
(4, 'La résignation est un suicide quotidien.', 2),
(5, 'Il vient une heure où protester ne suffit plus : après la philosophie, il faut l’action.', 3),
(6, 'Si l\'on y réfléchit bien, le Christ est le seul anarchiste qui ait vraiment réussi.', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `citation`
--
ALTER TABLE `citation`
  ADD CONSTRAINT `FK_auteur` FOREIGN KEY (`auteurid`) REFERENCES `auteurs` (`idauteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
