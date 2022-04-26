-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 04 fév. 2022 à 02:04
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Raminagrobis`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity_sector`
--

CREATE TABLE `activity_sector` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity_sector`
--

INSERT INTO `activity_sector` (`id`, `name`) VALUES
(1, 'Agroalimentaire'),
(2, 'Banque / Assurance'),
(3, 'Bois / Papier / Imprimerie'),
(4, 'BTP / Matériaux de construction'),
(5, 'Chimie / Parachimie'),
(6, 'Commerce / Négoce / Distribution'),
(7, 'Édition / Communication / Multimédia'),
(8, 'Électronique / Électricité'),
(9, 'Études & Conseils'),
(10, 'Industrie Pharmaceutique'),
(11, 'Machines et équipements / Automobile'),
(12, 'Métalurgie / Travail du Métal'),
(13, 'Plastique / Caoutchouc'),
(14, 'Services aux entreprises'),
(15, 'Textile / Habillement / Chaussure'),
(16, 'Transports / Logistique'),
(17, 'Informatique / Télécoms');

-- --------------------------------------------------------

--
-- Structure de la table `activity_sector_by_event`
--

CREATE TABLE `activity_sector_by_event` (
  `id_event` int(11) NOT NULL,
  `id_activity_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity_sector_by_event`
--

INSERT INTO `activity_sector_by_event` (`id_event`, `id_activity_sector`) VALUES
(41, 8),
(41, 9),
(41, 10),
(42, 1),
(42, 2),
(42, 3),
(42, 15),
(42, 16),
(44, 3),
(44, 4),
(44, 9),
(46, 8),
(46, 17),
(45, 3),
(53, 1),
(53, 7),
(53, 14),
(53, 17);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `form_title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `form_title`, `img`, `color`) VALUES
(41, 'L’événement PEUGEOT', 'Lancement de la toute première fusée Ariane en collaboration avec Peugeot ! #ArianePeugeot', 'Vous inscrire à l\'évenement du siècle ! #Peug\'', 'peugeot.jpg', '#ddff00'),
(42, 'RENAULT MIEUX QUE PEUGEOT ?', 'UN EVENT DE FOLIE !\r\nOn vous explique pourquoi Renault c\'est mieux!', 'VENEZ!!!!', 'renault.jpg', '#18ff14'),
(44, 'Bucherons en folie', 'Des bucherons partout c\'est relou', 'Venez c\'est chouette', 'bucheron.jpg', '#422c00'),
(45, 'Ubisoft drink', 'A l\'occasion de l\'E3 ubisoft fait découvrir ses projets pour l\'année prochaine en avant première ! #FarCry24', 'Ubisoft', 'ubisoft.jpg', '#00ff04'),
(46, 'Concert exclusif des Daft Punk !', 'Leur séparation était un prank !', 'Vous inscrire au concert des Daft Punk', 'daft-punk.jpg', '#4145f6'),
(53, 'Cat Mania Expo 2022', 'Cat Mania vous propose une nouvelle édition qui se déroulera du 4 au 12 février 2022', 'CHAT', 'c_cat_6.jpeg', '#e7a3f6');

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_adress` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `is_professional` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `activity_sector` varchar(255) DEFAULT NULL,
  `consent_data` varchar(255) DEFAULT NULL,
  `newsletter` varchar(255) DEFAULT NULL,
  `fix_num` varchar(10) DEFAULT NULL,
  `mobile_num` varchar(10) DEFAULT NULL,
  `group_nb` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `scoring` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscription`
--

INSERT INTO `subscription` (`id`, `first_name`, `last_name`, `email_adress`, `sex`, `is_professional`, `company_name`, `job`, `activity_sector`, `consent_data`, `newsletter`, `fix_num`, `mobile_num`, `group_nb`, `event_id`, `scoring`) VALUES
(22, 'Henry', 'Hender', 'henry.hender@wanadoo.fr', 'M', 'on', 'Jeux en bois', 'Trompetiste', 'Bois / Papier / Imprimerie', 'on', 'on', '0247672918', '0987672918', '2', 45, 0),
(23, 'Josiane', 'DANEMARK', 'Josiane.DANEMARK@aol.com', 'F', 'on', 'Papier bulle', 'Bully', 'Bois / Papier / Imprimerie', 'on', 'on', '0247672918', '0987672918', '9', 45, 0),
(24, 'Daniel', 'Ferb', 'daniel.ferb', 'M', 'on', 'Youpi', 'Manager', 'Édition / Communication / Multimédia', 'on', 'on', '0247672918', '0987672918', '0', 53, 2),
(25, 'Ginette', 'Thetis', 'ginette.thetis', 'M', NULL, '', '', '', 'on', 'on', '0247672918', '0987672918', '0', 53, 0),
(26, 'jean', 'jean', 'jean.jean', 'M', NULL, '', '', '', 'on', NULL, '0247672918', '0987672918', '0', 45, 0),
(27, 'hervé', 'jean', 'herve.jean', 'M', NULL, '', '', '', 'on', NULL, '', '', '', 45, 0),
(38, 'Gilbert', 'Montanier', 'gilbert.montanier', 'M', 'on', 'Papyrus Corporate', 'Pianiste', 'Bois / Papier / Imprimerie', 'on', 'on', '0247672918', '0987672918', '1200', 45, 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity_sector`
--
ALTER TABLE `activity_sector`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `activity_sector_by_event`
--
ALTER TABLE `activity_sector_by_event`
  ADD KEY `fk_acbe_activity_sector_id` (`id_activity_sector`),
  ADD KEY `fk_acbe_event_id` (`id_event`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subscription_event_id` (`event_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity_sector`
--
ALTER TABLE `activity_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_sector_by_event`
--
ALTER TABLE `activity_sector_by_event`
  ADD CONSTRAINT `fk_acbe_activity_sector_id` FOREIGN KEY (`id_activity_sector`) REFERENCES `activity_sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_acbe_event_id` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `fk_subscription_event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
