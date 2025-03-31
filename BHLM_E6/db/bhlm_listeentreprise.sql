-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 mars 2025 à 07:17
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bhlm_listeentreprise`
--
CREATE DATABASE IF NOT EXISTS `bhlm_listeentreprise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bhlm_listeentreprise`;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250327084607', '2025-03-27 08:48:15', 339);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_entreprise_id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F804D3B91A867E8F` (`id_entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `id_entreprise_id`, `nom`, `prenom`, `fonction`, `mail`, `tel`) VALUES
(1, 1, 'JOURDAN', 'Sophie', 'DRH', 'sjourdan@3ddentalstore.fr', '02 30 32 24 03'),
(2, 1, 'MARCOTTE', 'Guillaume', 'Tuteur', 'gmarcotte3ds@3ddentalstore.fr', '02 30 32 24 03'),
(3, 2, 'CARBONNIER', 'Alexandre', NULL, 'alex@abcinformatique.fr', NULL),
(4, 3, 'Seité', 'Alexandre', 'Directeur de production', 'aseite@digiworks.fr', '02.78.77.02.60'),
(5, 4, 'SOUMILLON', 'Loïc', 'Administrateur Systèmes et Réseaux', 'l.soumillon@dreux-agglomeration.fr', NULL),
(6, 5, 'Barré', 'Stéphane', NULL, 's.barre@agisoft-e.fr', NULL),
(7, 5, 'Crochemore', 'Julien', 'Tuteur', NULL, '02 32 90 93 17'),
(8, 6, '', '', NULL, NULL, '02 35 58 20 82'),
(9, 7, 'DELMAS', 'Christophe', NULL, 'christophe.delmas@alta-soft.com', '09 72 30 70 20'),
(10, 8, 'LEPELLETIER', 'Régis', NULL, 'r.lepelletier@alternative-conseil.com', '02 35 07 87 66'),
(11, 9, 'Vernier', 'Sebastien', NULL, 'sebastien.vernier@altitudeinfra.fr', '06 36 45 67 37'),
(12, 10, 'AVIGNI', 'David', NULL, 'david.avigni@ankapi.com', NULL),
(13, 11, 'BRUNEAU', 'Jérémy', NULL, 'jeremy.bruneau@apave.com', '07 78 86 01 16'),
(14, 12, 'POULAIN', 'Timothée', 'Gérant et tuteur', 'timothee.poulain@appeplay-studio.fr', '07.60.64.84.98'),
(15, 13, 'CHEVALIER', 'François', 'Gérant', 'ard76260@gmail.com', '02 35 86 79 70'),
(16, 13, 'DUCROCQ', 'Nicolas', 'Chef de projet / Tuteur', 'n.ducrocq@xplanet.fr', '02 35 86 79 70'),
(17, 15, 'HENRY', 'Frédéric', 'Directeur de projets', 'f.henry-cs@attineos.com', '06 52 33 36 36'),
(18, 15, 'LUTHIN', 'Sébastien', 'Responsable du centre de service', 's.lhutin@attineos.com', '06 95 60 00 11'),
(19, 15, 'CHALOINE', 'Marion', 'Responsable RH', 'm.chaloine@attineos.com', NULL),
(20, 16, 'BAZIN', 'Nikhil', 'Directeur Technique', 'n.bazin@attineos-cyber.com', '02 35 64 10 16'),
(21, 16, 'Leonard', '', NULL, NULL, '06 37 41 20 53');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secteur_activite_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D19FA605233A7FC` (`secteur_activite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `cp`, `ville`, `secteur_activite_id`) VALUES
(1, '3D Dental Store', '75 route de Lyons la Forêt', '76000', 'Rouen', 3),
(2, 'ABC INFORMATIQUE', 'Zac Le Parc, Allée des marettes', '80130', 'Friville', 1),
(3, 'Agence Digiworks', '85 Chemin de Clères', '76130', 'Mont-Saint-Aignan', 2),
(4, 'Agglo du Pays de Dreux', '4 rue de Châteaudun', 'BP 20', 'Dreux Cedex', 1),
(5, 'AGISOFT Engineering', '79 rue Louis Blériot, Zone EuroChannel', '76370', 'Martin Eglise', 1),
(6, 'ALSTOM', '9 rue des Patis, CS 50154', '76144', 'Petit-Quevilly', 4),
(7, 'ALTASOFT', '6 rue Gustave Eiffel', '76230', 'Bois Guillaume', 1),
(8, 'Alternative-Conseil', '13 Avenue des Canadiens', '76800', 'St Etienne du Rouvray', 1),
(9, 'ALTITUDE INFRA', '2247 Voie de lOrée', '27100', 'Val-de-Reuil', 5),
(10, 'ANKAPI', 'Seine Innopolis', '', 'Le Petit-Quevilly', 2),
(11, 'APAVE', '2 rue des Mouettes, CS 90098', '76130', 'Mont-Saint-Aignan', 6),
(12, 'Appeplay Studio', '3 rue Jean Ribault', '', 'Dieppe', 2),
(13, 'ARD Informatique', '11 rue Jean Dubornay, BP 54', '76260', 'Eu', 2),
(14, 'ASSYSTEM', '72 Rue de la République, SeineInnopolis', '76140', 'LePetitQuevilly', 2),
(15, 'ATTINEOS', '20 Bd Ferdinand de Lesseps', '76000', 'Rouen', 2),
(16, 'ATTINEOS Cybersécurité', '20 Bd Ferdinand de Lesseps', '76000', 'Rouen', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int NOT NULL,
  `bts` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialite` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `annee`, `bts`, `specialite`) VALUES
(1, 'PONS', 'Tristan', 2023, 'BTS SIO', 'SLAM'),
(2, 'PUNTILLO', 'Anthony', 2023, 'BTS SIO', 'SISR');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_entreprise`
--

DROP TABLE IF EXISTS `etudiant_entreprise`;
CREATE TABLE IF NOT EXISTS `etudiant_entreprise` (
  `etudiant_id` int NOT NULL,
  `entreprise_id` int NOT NULL,
  PRIMARY KEY (`etudiant_id`,`entreprise_id`),
  KEY `IDX_C3B6951ADDEAB1A3` (`etudiant_id`),
  KEY `IDX_C3B6951AA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant_entreprise`
--

INSERT INTO `etudiant_entreprise` (`etudiant_id`, `entreprise_id`) VALUES
(1, 15),
(2, 16);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_activite`
--

DROP TABLE IF EXISTS `secteur_activite`;
CREATE TABLE IF NOT EXISTS `secteur_activite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteur_activite`
--

INSERT INTO `secteur_activite` (`id`, `nom`) VALUES
(1, 'Prestataire Informatique'),
(2, 'Studio de Développement'),
(3, 'Modélisation 3D'),
(4, 'Industrie'),
(5, 'Télécommunication'),
(6, 'Batîment');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrateur` int NOT NULL,
  `personnel` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `administrateur`, `personnel`) VALUES
(1, 'admin1', '$2y$10$8TSBWpdgwjvcB8dhOD8AOenM5ZL9Aa5lZKT4hJ.r.j3XhUhUzFMqe', 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_F804D3B91A867E8F` FOREIGN KEY (`id_entreprise_id`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_D19FA605233A7FC` FOREIGN KEY (`secteur_activite_id`) REFERENCES `secteur_activite` (`id`);

--
-- Contraintes pour la table `etudiant_entreprise`
--
ALTER TABLE `etudiant_entreprise`
  ADD CONSTRAINT `FK_C3B6951AA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C3B6951ADDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
