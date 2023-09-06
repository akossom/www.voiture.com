-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 20 Septembre 2021 à 06:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `loccar`
--

-- --------------------------------------------------------

--
-- Structure de la table `automobile`
--

CREATE TABLE `automobile` (
  `IMM` varchar(20) NOT NULL,
  `MARQUE` varchar(50) NOT NULL,
  `CHAUFFEUR` varchar(5) NOT NULL,
  `PRIX_LOC` double NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  `DISPONIBILITE` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `automobile`
--

INSERT INTO `automobile` (`IMM`, `MARQUE`, `CHAUFFEUR`, `PRIX_LOC`, `PHOTO`, `DISPONIBILITE`) VALUES
('111B26', 'FIAT 500', 'Oui', 300, 'images/FIAT500.jpg', 'disponible'),
('222A23', 'TIGUAN', 'Oui', 700, 'images/Tiguan.jpg', 'Pas disponible'),
('452BSE', 'Berline', 'Oui', 4562, 'images/Image1.jpg', 'disponible'),
('123vf', 'honda', 'Non', 4521, 'images/Image1.jpg', 'disponible'),
('4875GB', 'BMW', 'Non', 300, 'images/Image1.jpg', 'disponible'),
('4520BT', 'BMW', 'Non', 300, 'images/Image1.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Login` varchar(200) NOT NULL,
  `motPass` varchar(200) NOT NULL,
  `my_photo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Login`, `motPass`, `my_photo`) VALUES
('chahid', '222222', 'images/chahid.jpg'),
('jojo', '333333', 'images/jojo.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`IMM`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
