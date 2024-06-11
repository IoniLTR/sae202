-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 06 juin 2024 à 19:21
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 8.3.3-1+0~20240216.17+debian10~1.gbp87e37b

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202Base`
--

-- --------------------------------------------------------

--
-- Structure de la table `JARDIN`
--

CREATE TABLE `JARDIN` (
  `idJardin` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `CP` int(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `taille` int(25) NOT NULL,
  `max` int(10) NOT NULL,
  `img` varchar(100) DEFAULT 'default.png',
  `ownerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `JARDIN`
--

INSERT INTO `JARDIN` (`idJardin`, `name`, `ville`, `CP`, `adresse`, `taille`, `max`, `img`, `ownerId`) VALUES
(1, 'LePetitJard', 'Troyes', 10000, '5 Rue Brulard', 45, 7, 'jardin1.jpg', 3),
(2, 'LaGrandeMaison', 'Troyes', 10000, '10 Rue de la Paix', 78, 6, 'jardin2.jpg', 9),
(3, 'LaBelleVue', 'Troyes', 10000, '15 Avenue Victor Hugo', 53, 5, 'jardin3.jpg', 2),
(4, 'LaPetiteFerme', 'Troyes', 10000, '20 Rue des Champs', 62, 9, 'jardin4.jpg', 7),
(5, 'LeCoinTranquille', 'Troyes', 10000, '25 Rue des Lilas', 24, 3, 'jardin5.jpg', 11),
(6, 'LaMaisonBlanche', 'Troyes', 10000, '30 Rue du Commerce', 90, 10, 'jardin6.jpg', 4),
(7, 'LeJardinSecret', 'Troyes', 10000, '35 Rue des Roses', 34, 8, 'jardin7.jpg', 6),
(8, 'LaPetiteCabane', 'Troyes', 10000, '40 Rue des Violettes', 76, 2, 'jardin8.jpg', 5),
(9, 'LeCoindeParadis', 'Troyes', 10000, '45 Rue du Paradis', 50, 4, 'jardin9.jpg', 10),
(10, 'LaGrangeRustique', 'Troyes', 10000, '50 Rue de la Grange', 89, 10, 'jardin10.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `PARCELLE`
--

CREATE TABLE `PARCELLE` (
  `idParcelle` int(11) NOT NULL,
  `superficie` int(25) DEFAULT NULL,
  `jardinId` int(11) DEFAULT NULL,
  `occupantId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `PARCELLE`
--

INSERT INTO `PARCELLE` (`idParcelle`, `superficie`, `jardinId`, `occupantId`) VALUES
(1, 20, 1, 1),
(3, 20, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `PLANTE`
--

CREATE TABLE `PLANTE` (
  `idPlante` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `typePlanteId` int(11) DEFAULT NULL,
  `jardinId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RECETTE`
--

CREATE TABLE `RECETTE` (
  `idRecette` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `creatorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `RECETTE_PLANTE`
--

CREATE TABLE `RECETTE_PLANTE` (
  `idRecette` int(11) DEFAULT NULL,
  `idPlante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_PLANTE`
--

CREATE TABLE `TYPE_PLANTE` (
  `idTypePlante` int(11) NOT NULL,
  `typeName` varchar(100) DEFAULT NULL,
  `origineName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `forname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`idUser`, `name`, `forname`, `email`, `password`) VALUES
(1, 'ROBLABLA', 'Pauline', 'roblablapauline@contact.fr', '123'),
(2, 'Dylan', 'Bob', 'bobdylan@contact.fr', '123'),
(3, 'Lataupe', 'René', 'renelataupe@contact.fr', '123'),
(4, 'Ochon', 'Paul', 'paulochon@contact.fr', '123'),
(5, 'Suffy', 'Sam', 'samsuffy@contact.fr', '123'),
(6, 'Point', 'Théo', 'theopoint@contact.fr', '123'),
(7, 'Tag', 'Bill', 'billtag@contact.fr', '123'),
(8, 'Blink', 'Zack', 'zackblink@contact.fr', '123'),
(9, 'Bulga', 'Zoe', 'zoebulga@contact.fr', '123'),
(10, 'Patos', 'Sandy', 'sandypatos@contact.fr', '123'),
(11, 'Dupond', 'Polux', 'poluxdupond@contact.fr', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  ADD PRIMARY KEY (`idJardin`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Index pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD PRIMARY KEY (`idParcelle`),
  ADD KEY `jardinId` (`jardinId`),
  ADD KEY `occupantId` (`occupantId`);

--
-- Index pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD PRIMARY KEY (`idPlante`),
  ADD KEY `typePlanteId` (`typePlanteId`),
  ADD KEY `jardinId` (`jardinId`);

--
-- Index pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `creatorId` (`creatorId`);

--
-- Index pour la table `RECETTE_PLANTE`
--
ALTER TABLE `RECETTE_PLANTE`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idPlante` (`idPlante`);

--
-- Index pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  ADD PRIMARY KEY (`idTypePlante`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  MODIFY `idJardin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  MODIFY `idParcelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  MODIFY `idPlante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  MODIFY `idTypePlante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  ADD CONSTRAINT `JARDIN_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD CONSTRAINT `PARCELLE_ibfk_1` FOREIGN KEY (`jardinId`) REFERENCES `JARDIN` (`idJardin`),
  ADD CONSTRAINT `PARCELLE_ibfk_2` FOREIGN KEY (`occupantId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD CONSTRAINT `PLANTE_ibfk_1` FOREIGN KEY (`typePlanteId`) REFERENCES `TYPE_PLANTE` (`idTypePlante`),
  ADD CONSTRAINT `PLANTE_ibfk_2` FOREIGN KEY (`jardinId`) REFERENCES `JARDIN` (`idJardin`);

--
-- Contraintes pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD CONSTRAINT `RECETTE_ibfk_1` FOREIGN KEY (`creatorId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `RECETTE_PLANTE`
--
ALTER TABLE `RECETTE_PLANTE`
  ADD CONSTRAINT `RECETTE_PLANTE_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `RECETTE` (`idRecette`),
  ADD CONSTRAINT `RECETTE_PLANTE_ibfk_2` FOREIGN KEY (`idPlante`) REFERENCES `PLANTE` (`idPlante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
