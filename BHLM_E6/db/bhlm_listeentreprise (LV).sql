-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 28 avr. 2025 à 09:03
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
('DoctrineMigrations\\Version20250318073918', NULL, NULL),
('DoctrineMigrations\\Version20250318075002', NULL, NULL),
('DoctrineMigrations\\Version20250318075320', NULL, NULL),
('DoctrineMigrations\\Version20250318081444', NULL, NULL),
('DoctrineMigrations\\Version20250320080235', NULL, NULL),
('DoctrineMigrations\\Version20250320084929', NULL, NULL),
('DoctrineMigrations\\Version20250327084607', '2025-03-27 08:48:15', 339),
('DoctrineMigrations\\Version20250403072159', NULL, NULL),
('DoctrineMigrations\\Version20250403072934', '2025-04-03 07:29:42', 231),
('DoctrineMigrations\\Version20250403075740', '2025-04-03 07:57:46', 66),
('DoctrineMigrations\\Version20250424104014', '2025-04-24 10:40:26', 505);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_entreprise_id` int NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F804D3B91A867E8F` (`id_entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, 16, 'Leonard', '', NULL, NULL, '06 37 41 20 53'),
(22, 17, 'De Palma', NULL, 'Gérant', 'contact@axedia.eu', '02 27 19 93 30'),
(23, 18, 'DECAMP', 'Renan', NULL, 'renan@bearstudio.fr', '07 60 39 17 76'),
(24, 19, 'ANDRES', 'Aurélien', NULL, 'aurelien.andres@benteler.com', '06 33 56 27 80'),
(25, 20, 'LEPILLER', 'Antoine', 'Responsable service de développement', 'alepiller@bimandco.com', '07 63 91 62 10'),
(26, 21, 'GUERARD', 'Simon', NULL, 'simon.guerard@budget-box.com', '07 88 33 56 11'),
(27, 23, 'AMOURET', 'Anne', 'Dpt informatique, Administration, Maintenance, Installation et Sécurité', 'anne.amouret@assurance-maladie.fr', '02 35 03 63 78'),
(28, 23, 'BOULARD', 'Christophe', NULL, 'christophe.boulard@assurance-maladie.fr', '02 35 03 64 97'),
(29, 24, 'HOLINGUE', 'Xavier', NULL, 'xavier.holingue@carrier.utc.com', '02 35 79 46 84'),
(30, 30, 'SAVIO', 'Mikaël', 'Directeur', NULL, NULL),
(31, 30, 'ALVES', 'David', 'Responsable adjoint informatique régionale', 'david.alves@carsat-normandie.fr', '02 35 03 60 59'),
(32, 31, 'BERNIGAUD', 'Valérie', 'Chef de projet SI', 'valerie.bernigaud@normandie.cci.fr', NULL),
(33, 25, 'DEMARLY', 'Antoine', 'Développeur', 'ademarly@cciproductions.fr', '02 32 09 42 18'),
(34, 26, 'LE DENMAT', 'Jean-Marc', 'Directeur SI', 'jean-marc.le-denmat@chb-unicancer.fr', '02 32 08 22 09');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 'ANKAPI', 'Seine Innopolis', '76140', 'Le Petit-Quevilly', 2),
(11, 'APAVE', '2 rue des Mouettes, CS 90098', '76130', 'Mont-Saint-Aignan', 6),
(12, 'Appeplay Studio', '3 rue Jean Ribault', '', 'Dieppe', 2),
(13, 'ARD Informatique', '11 rue Jean Dubornay, BP 54', '76260', 'Eu', 2),
(14, 'ASSYSTEM', '72 Rue de la République, SeineInnopolis', '76140', 'LePetitQuevilly', 2),
(15, 'ATTINEOS', '20 Bd Ferdinand de Lesseps', '76000', 'Rouen', 2),
(16, 'ATTINEOS Cybersécurité', '20 Bd Ferdinand de Lesseps', '76000', 'Rouen', 1),
(17, 'AXEDIA', '6 rue Gambetta', '27300', 'Bernay', 2),
(18, 'Bearstudio', 'Seine Innopolis', '76140', 'Petit-Quevilly', 2),
(19, 'Benteler Aluminium System', 'Voie de l\'ouvrage, parc Industriel d\'Incarville', '27400', 'Louviers', 4),
(20, 'BIM&CO', 'Parc Eco Normandie', '76430', 'Saint Romain de Colbosc', 1),
(21, 'BUDGETBOX', '50 rue Ettore Bugatti', '76800', 'Saint Etienne-Du-Rouvray', 7),
(22, 'CAF', '4 rue des forgettes', '76017', 'Rouen Cedex', 8),
(23, 'CPAM 76', '50 avenue de Bretagne', '76039', 'Rouen Cedex', 8),
(24, 'Carrier Transicold industrie', '810 Route de Paris', '76520', 'Franqueville Saint-Pierre', 8),
(25, 'CCI Productions', 'ZA des Patis', '27400', 'Acquiny', 8),
(26, 'Centre Henri-Becquerel', 'Rue d\'Amiens - CS 11516', '76038', 'Rouen Cedex 1', 9),
(30, 'CARSAT Normandie', '5 Avenue du Grand Cours - CS 36028', '76028', 'Rouen Cedex 1', 8),
(31, 'CCI Normandie', '10 quai de la Bourse', '76042', 'Rouen', 8);

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
  `specialite_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_717E22E32195E0F0` (`specialite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `annee`, `bts`, `specialite_id`) VALUES
(1, 'PONS', 'Tristan', 2023, 'BTS SIO', 1),
(2, 'PUNTILLO', 'Anthony', 2023, 'BTS SIO', 2),
(3, 'BOUKHORISSA', 'Bilal', 2023, 'BTS SIO', 1),
(4, 'COEURDOUX', 'Carl', 2023, 'BTS SIO', NULL);

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
(2, 16),
(3, 25);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_activite`
--

DROP TABLE IF EXISTS `secteur_activite`;
CREATE TABLE IF NOT EXISTS `secteur_activite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteur_activite`
--

INSERT INTO `secteur_activite` (`id`, `nom`) VALUES
(1, 'Prestataire Informatique'),
(2, 'Studio de Développement'),
(3, 'Modélisation 3D'),
(4, 'Industrie'),
(5, 'Télécommunication'),
(6, 'Batîment'),
(7, 'Relations publiques'),
(8, 'Services publics'),
(9, 'Médecine');

-- --------------------------------------------------------

--
-- Structure de la table `session_exam`
--

DROP TABLE IF EXISTS `session_exam`;
CREATE TABLE IF NOT EXISTS `session_exam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `specialite` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mois` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_exam`
--

INSERT INTO `session_exam` (`id`, `specialite`, `mois`, `annee`) VALUES
(1, 'SLAM', 'juin', 2023),
(2, NULL, 'juin', 2023),
(3, 'SISR', NULL, 2022);

-- --------------------------------------------------------

--
-- Structure de la table `session_exam_employe`
--

DROP TABLE IF EXISTS `session_exam_employe`;
CREATE TABLE IF NOT EXISTS `session_exam_employe` (
  `session_exam_id` int NOT NULL,
  `employe_id` int NOT NULL,
  PRIMARY KEY (`session_exam_id`,`employe_id`),
  KEY `IDX_3B3F37504555DCCB` (`session_exam_id`),
  KEY `IDX_3B3F37501B65292` (`employe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_exam_employe`
--

INSERT INTO `session_exam_employe` (`session_exam_id`, `employe_id`) VALUES
(1, 2),
(2, 18),
(2, 20),
(2, 33),
(3, 34);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`) VALUES
(1, 'SLAM'),
(2, 'SISR');

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
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `administrateur`, `personnel`, `nom`, `prenom`) VALUES
(1, 'admin1', '$2y$10$8TSBWpdgwjvcB8dhOD8AOenM5ZL9Aa5lZKT4hJ.r.j3XhUhUzFMqe', 1, 0, 'Paris', 'Squirt'),
(2, 'spvlvt', '$2y$13$2Zl3hXmt.hpM2YFmuFWATuD44K1YjMt0YV/ssZ26pdds/DIaH2l22', 0, 1, 'Velvet', 'Splat'),
(3, 'Scratch1705', '$2y$13$dqzsvnoRanXrAh4.uyeeE.K1PflXYmN/fMsBf2jHMfQn5OrkOgzr2', 0, 1, 'Wine', 'Scratch'),
(5, 'focba', '$2y$13$vPTQtgpuE9dRT49DIv.61uYrV9K3Yu2lxUuQFkkGxL4X4w6sCz3hK', 0, 1, 'Baranger', 'Catherine'),
(6, 'bocba', '$2y$13$FXD2zxC2A28k2/UIIieAL.l.osMoL6rUULfe467lZ.JS7thOK9DjC', 1, 0, 'Baranger', 'Catherine'),
(8, 'soso20', '$2y$13$11cj5.W6UUa2DRwJt1StBOe.tLk4vjLysQJu8ri0YPTnnQLOLjUvu', 0, 1, 'Langlois', 'Solène'),
(9, 'adminSoso', '$2y$13$m8ez4LesiX0qDtleylumJur3zt8xvXxNlIW8FVzUqss8wnU4ckvpS', 1, 0, 'Langlois', 'Solène');

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
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E32195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`);

--
-- Contraintes pour la table `etudiant_entreprise`
--
ALTER TABLE `etudiant_entreprise`
  ADD CONSTRAINT `FK_C3B6951AA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C3B6951ADDEAB1A3` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `session_exam_employe`
--
ALTER TABLE `session_exam_employe`
  ADD CONSTRAINT `FK_3B3F37501B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3B3F37504555DCCB` FOREIGN KEY (`session_exam_id`) REFERENCES `session_exam` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
