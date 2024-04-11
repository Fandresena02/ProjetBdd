-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 avr. 2024 à 07:21
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_efrei`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `idAdresse` int NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `cp` int DEFAULT NULL,
  PRIMARY KEY (`idAdresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`idAdresse`, `libelle`, `ville`, `cp`) VALUES
(1, '30-32 Avenue de la République', 'Villejuif', 94800),
(2, '21 Av Paul Vaillant Couturier ', 'Villejuif', 94800),
(3, '137 Rue Jean Jaures', 'Villejuif', 94800),
(4, '32 Place Auguste Rodin', 'Villejuif', 94800),
(5, '56 Avenue de Paris', 'Villejuif', 94800),
(6, '1 bis Rue de Chaillot', 'Paris', 75016),
(7, '102 Rue Boileau', 'Paris', 75016),
(8, '109 Boulevard Murat ', 'Paris', 75016),
(9, '116 Rue Michel Ange', 'Paris', 75016),
(10, '123 Avenue Victor Hugo', 'Paris', 75016),
(11, '136 Avenue de Versailles', 'Paris', 75016),
(12, '1 Boulevard de la Madeleine', 'Paris', 75001),
(13, '101 Porte Berger', 'Paris', 75001),
(14, '13 Rue des Capucines', 'Paris', 75001),
(15, '23 Avenue de l’Opéra', 'Paris', 75001),
(16, '38 Rue Mauconseil', 'Paris', 75001),
(17, '50 Rue du Louvre', 'Paris', 75001),
(18, '1 Rue de Paris', 'Créteil', 94000),
(19, '92 A Général de Gaulle', 'Créteil', 94000),
(20, '2 Allée Parmentier', 'Créteil', 94000),
(21, '50 Rue linas', 'Issy les moulineau', 92130),
(22, '26 Avenue Cresson', 'Issy les moulineau', 92130),
(23, '23 Esplanade Belvedre', 'Issy les moulineau', 92130),
(24, '100 Avenue de la République', 'Argenteuil', 95100),
(25, '57 Avenue de Stalingrad', 'Argenteuil', 95100),
(26, '23 Rue Léo Lagrange', 'Argenteuil', 95100),
(27, '1 bis Marcel Hugo', 'Argenteuil', 95100),
(28, '40 Boulevard de Paul', 'Argenteuil', 95100),
(29, '3 Rue Camille Desmoulins', 'Cachan', 94230),
(30, '9 Avenue de la division Leclerc', 'Cachan', 94230),
(31, '10 boulevard Mitterand', 'Cachan', 94230),
(32, '26 Rue du Kremlin', 'Cachan', 94230),
(33, '44 Boulevard Rouget de Lisle', 'Montreuil', 93100),
(34, '6 Rue Ariste Hemard', 'Montreuil', 93100),
(35, '5 Rue Franklin', 'Montreuil', 93100),
(36, '14 Avenue du roi', 'Montreuil', 93100),
(37, '1 Rue Haxo', 'Paris', 75020),
(38, '1 Villa Stendhal', 'Paris', 75020),
(39, '11 Rue du Cher', 'Paris', 75020),
(40, '1 Maxime Gorki', 'Paris', 75010),
(41, '34 Avenue Louis', 'Paris', 75010);

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `idAgence` int NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `idAdresse` int DEFAULT NULL,
  PRIMARY KEY (`idAgence`),
  KEY `idAdresse` (`idAdresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idAgence`, `nom`, `idAdresse`) VALUES
(1, 'Logeons-nous', 4);

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `idGarage` int NOT NULL,
  `nbPlaces` int DEFAULT NULL,
  `idLogement` int DEFAULT NULL,
  PRIMARY KEY (`idGarage`),
  KEY `idLogement` (`idLogement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `garage`
--

INSERT INTO `garage` (`idGarage`, `nbPlaces`, `idLogement`) VALUES
(1, 35, 1),
(2, 25, 2),
(3, 2, 3),
(4, 1, 4),
(5, 11, 5),
(6, 20, 6),
(7, 17, 7),
(8, 2, 8),
(9, 44, 9),
(10, 23, 10),
(11, 1, 11),
(12, 27, 12),
(13, 1, 13),
(14, 10, 14),
(15, 30, 15),
(16, 12, 16),
(17, 11, 17),
(18, 20, 18),
(19, 9, 19),
(20, 21, 20),
(21, 34, 21),
(22, 2, 22),
(23, 1, 23);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `idLocataire` int NOT NULL,
  `idPersonne` int DEFAULT NULL,
  PRIMARY KEY (`idLocataire`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`idLocataire`, `idPersonne`) VALUES
(1, 21),
(2, 22),
(3, 23),
(4, 24),
(5, 25),
(6, 26),
(7, 27),
(8, 28),
(9, 29),
(10, 30),
(11, 31),
(12, 32),
(13, 33),
(14, 34),
(15, 35);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `idLogement` int NOT NULL AUTO_INCREMENT,
  `idProprietaire` int NOT NULL,
  `type` varchar(15) NOT NULL,
  `nbPieces` int NOT NULL,
  `surface` int NOT NULL,
  `etatHabitation` varchar(20) NOT NULL,
  `objectifGestion` varchar(20) DEFAULT NULL,
  `prixVenteLocation` int DEFAULT NULL,
  `dateDispo` date DEFAULT NULL,
  `commission` int NOT NULL,
  `idAdresse` int DEFAULT NULL,
  `idAgence` int DEFAULT NULL,
  PRIMARY KEY (`idLogement`),
  KEY `idAdresse` (`idAdresse`),
  KEY `idProprietaire` (`idProprietaire`),
  KEY `idAgence` (`idAgence`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`idLogement`, `idProprietaire`, `type`, `nbPieces`, `surface`, `etatHabitation`, `objectifGestion`, `prixVenteLocation`, `dateDispo`, `commission`, `idAdresse`, `idAgence`) VALUES
(1, 1, 'appartement', 3, 70, 'bon état', 'location', 950, NULL, 1300, 1, 1),
(2, 2, 'appartement', 1, 15, 'bon état', 'location', 405, '2023-03-22', 1105, 2, 1),
(3, 2, 'maison', 4, 103, 'à rénover', 'vente', 380000, '2023-11-04', 5000, 3, 1),
(4, 1, 'maison', 2, 34, 'neuf', 'vente', 127000, '2024-04-27', 2570, 5, 1),
(5, 3, 'appartement', 1, 15, 'très bon état', 'location', 540, '2023-02-19', 1030, 6, 1),
(6, 4, 'appartement', 1, 17, 'très bon état', 'location', 640, '2023-01-04', 1065, 7, 1),
(7, 5, 'appartement', 3, 98, 'bon état', 'vente', 278000, '2023-09-11', 3567, 8, 1),
(8, 6, 'maison', 3, 77, 'à rénover', 'vente', 233000, '2023-05-26', 2999, 9, 1),
(9, 7, 'appartement', 2, 32, 'neuf', 'vente', 259500, '2023-02-01', 3678, 10, 1),
(10, 8, 'appartement', 5, 170, 'bon état', 'location', 4500, '2023-04-28', 3952, 11, 1),
(11, 6, 'maison', 5, 164, 'très bon état', 'vente', 1479000, '2023-12-03', 10580, 12, 1),
(12, 9, 'appartement', 2, 54, 'très bon état', 'location', 2930, '2023-07-27', 2950, 13, 1),
(13, 10, 'maison', 2, 88, 'à rénover', 'vente', 946800, '2024-01-09', 6950, 14, 1),
(14, 11, 'appartement', 6, 150, 'à rénover', 'location', 5970, '2023-05-30', 4050, 15, 1),
(15, 12, 'appartement', 3, 64, 'bon état', 'location', 4570, '2023-03-20', 3830, 16, 1),
(16, 10, 'appartement', 3, 41, 'très bon état', 'location', 2970, '2023-01-24', 3590, 17, 1),
(17, 13, 'appartement', 1, 20, 'bon état', 'location', 1670, '2023-06-17', 2053, 18, 1),
(18, 14, 'appartement', 4, 63, 'bon état', 'location', 1043, '2023-03-20', 1990, 19, 1),
(19, 15, 'appartement', 2, 29, 'à rénover', 'vente', 234000, '2023-10-05', 3500, 20, 1),
(20, 15, 'appartement', 1, 21, 'à rénover', 'vente', 204000, '2023-12-21', 3750, 21, 1),
(21, 15, 'appartement', 4, 83, 'bon état', 'location', 4683, NULL, 3205, 22, 1),
(22, 5, 'maison', 4, 153, 'à rénover', 'vente', 403500, '2023-08-28', 4268, 23, 1),
(23, 16, 'maison', 2, 73, 'bon état', 'vente', 365200, '2023-03-31', 3672, 24, 1),
(24, 17, 'maison', 3, 90, 'très bon état', 'vente', 405280, '2023-05-27', 4192, 25, 1),
(25, 18, 'appartement', 2, 46, 'neuf', 'vente', 371000, '2023-06-12', 2075, 26, 1),
(26, 19, 'appartement', 2, 39, 'neuf', 'vente', 263900, '2023-10-29', 2370, 27, 1),
(27, 20, 'maison', 4, 136, 'à rénover', 'vente', 462900, '2023-04-13', 4952, 28, 1),
(28, 2, 'appartement', 2, 62, 'neuf', 'location', 973, '2023-02-14', 1200, 29, 1),
(29, 12, 'appartement', 1, 28, 'neuf', 'location', 650, '2023-02-25', 1000, 30, 1),
(30, 20, 'appartement', 3, 81, 'bon état', 'location', 990, '2023-04-01', 2005, 31, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `autorise` tinyint(1) DEFAULT NULL,
  `idAdresse` int DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `idAdresse` (`idAdresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `autorise`, `idAdresse`) VALUES
(1, 'Guibert', 'Martin', 1, 1),
(2, 'Gilles', 'Aurore', 1, 2),
(3, 'Marques', 'Thibaut', 0, 3),
(4, 'Wagner', 'Christelle', 1, 5),
(5, 'Schmitt', 'Joséphine', 1, 6),
(6, 'Monnier', 'Michel', 1, 7),
(7, 'Delahaye', 'Hugues', 1, 8),
(8, 'Maillet', 'Maryse', 1, 9),
(9, 'Roger', 'Aurore', 1, 10),
(10, 'Dias', 'Sébastien', 1, 11),
(11, 'Le Arnaud', 'Luce', 1, 12),
(12, 'Guillon', 'Laetitia', 0, 13),
(13, 'Caron', 'Noémie', 1, 14),
(14, 'Da Costa', 'Colette', 1, 15),
(15, 'Lebreton', 'Alexandre', 1, 16),
(16, 'Alexandre de Riou', 'Véronique', 1, 17),
(17, 'Le Maillot', 'Danielle', 0, 18),
(18, 'Bazin', 'Franck', 1, 19),
(19, 'Poirier', 'Sébastien', 1, 20),
(20, 'Le Leconte', 'Alexandre', 1, 21),
(21, 'Alves', 'Jules', 1, 22),
(22, 'Gilles', 'Isaac', 1, 23),
(23, 'Legrand', 'Capucine', 1, 24),
(24, 'Guillaume', 'Vincent', 1, 25),
(25, 'Pons', 'Philippine', 1, 26),
(26, 'Valette', 'Édouard', 0, 32),
(27, 'Guilbert', 'Danielle', 0, 33),
(28, 'Lecomte-Seguin', 'Étienne', 0, 34),
(29, 'Pottier', 'Denis', 0, 35),
(30, 'Le Ramos', 'Suzanne', 0, 36),
(31, 'Laine', 'Amélie', 0, 37),
(32, 'Rocher', 'Aurore', 0, 38),
(33, 'Pereira', 'Georges', 0, 39),
(34, 'Legrand', 'Camille', 0, 40),
(35, 'Dupre', 'Françoise', 0, 41);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `idProp` int NOT NULL,
  `idPersonne` int DEFAULT NULL,
  PRIMARY KEY (`idProp`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`idProp`, `idPersonne`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(75) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `access_level` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `access_level`) VALUES
(1, 'admin@login.com', 'root', 1);

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `idLogement` int NOT NULL,
  `idPersonne` int NOT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`idLogement`,`idPersonne`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`idLogement`, `idPersonne`, `date`, `heure`) VALUES
(10, 23, '2023-05-03', '13:15:00'),
(30, 17, '2023-04-29', '14:30:00'),
(17, 9, '2023-06-30', '16:00:00'),
(15, 20, '2023-03-25', '17:45:00'),
(28, 8, '2023-02-27', '12:10:00'),
(12, 18, '2023-07-27', '15:35:00'),
(16, 1, '2023-02-01', '18:15:00'),
(25, 21, '2023-06-27', '11:20:00'),
(21, 25, '2023-04-13', '16:50:00'),
(19, 27, '2023-12-25', '16:35:00'),
(4, 26, '2024-06-03', '13:15:00'),
(6, 11, '2023-01-26', '19:35:00'),
(18, 28, '2023-04-03', '19:20:00'),
(5, 3, '0000-00-00', '15:15:00'),
(13, 2, '2024-01-09', '17:20:00'),
(23, 24, '2023-03-31', '19:55:00'),
(29, 16, '2023-02-25', '17:00:00'),
(20, 7, '2023-12-21', '13:15:00'),
(9, 6, '2023-02-01', '17:20:00'),
(8, 4, '2023-06-30', '12:45:00'),
(22, 14, '2023-09-12', '14:50:00'),
(24, 22, '2023-05-30', '13:15:00'),
(2, 15, '2023-03-29', '15:35:00'),
(3, 12, '2023-11-30', '16:55:00'),
(14, 5, '2023-06-15', '15:40:00'),
(26, 10, '2023-11-03', '18:25:00'),
(27, 13, '2023-04-25', '17:40:00'),
(1, 30, '2023-06-12', '10:30:00'),
(7, 29, '2023-09-11', '10:45:00'),
(11, 19, '2023-12-25', '14:55:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
