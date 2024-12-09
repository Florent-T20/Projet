-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 déc. 2024 à 14:08
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
-- Base de données : `projet_web_2425`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `animal_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `enclosure_id` int DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `enclosure_id` (`enclosure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `species`, `age`, `enclosure_id`, `image`) VALUES
(1, 'Raoul', 'Ara perroquet', 1, 9, NULL),
(2, 'Chaussette', 'Panthère', 3, 7, NULL),
(3, 'Zgeg', 'Grand hocco', 1, 8, NULL),
(4, 'Jeannot', 'Panda roux', 1, 1, NULL),
(5, 'Dimitri', 'Lémurien', 1, 2, NULL),
(6, 'Becamerde', 'Chèvre naine', 2, 3, NULL),
(7, 'Poilu', 'Mouflon', 3, 4, NULL),
(8, 'Carapute', 'Tortue', 10, 6, NULL),
(9, 'Michel', 'Cerf', 5, 11, NULL),
(10, 'Mouloud', 'Macaque crabier', 3, 10, NULL),
(11, 'Zgeg', 'Vautour', 2, 12, NULL),
(12, 'Jeannine', 'Antilope', 4, 13, NULL),
(13, 'Maria', 'Daim', 3, 13, NULL),
(14, 'Becamerde', 'Nilgaut', 2, 13, NULL),
(15, 'Oeil percé', 'Loup d\'\'Europe', 3, 14, NULL),
(16, 'Griffe sanglante', 'Loup d\'\'Europe', 4, 14, NULL),
(17, 'Pauline', 'Cigogne', 1, 15, NULL),
(18, 'Mohamed', 'Marabout', 3, 15, NULL),
(19, 'Patatartiné', 'Oryx algazelle', 2, 16, NULL),
(20, 'Gérard', 'Watusi', 4, 16, NULL),
(21, 'Moquette', 'Âne de Somalie', 4, 16, NULL),
(22, 'Aubergine', 'Yack', 2, 17, NULL),
(23, 'Bouldepoil', 'Mouton noir', 3, 17, NULL),
(24, 'Sapik', 'Porc-épic', 4, 18, NULL),
(25, 'Meumeu', 'Emeu', 5, 19, NULL),
(26, 'Joharno', 'Wallaby', 3, 19, NULL),
(27, 'Budget', 'Ibis', 2, 20, NULL),
(28, 'Carabosse', 'Tortue', 4, 20, NULL),
(29, 'Mario', 'Pécari', 3, 21, NULL),
(30, 'Luigi', 'Lynx', 2, 22, NULL),
(31, 'Gris', 'Cerval', 3, 23, NULL),
(32, 'Ouaf', 'Chien des buissons', 4, 24, NULL),
(33, 'Tigrou', 'Tigre', 4, 25, NULL),
(34, 'Isabelle', 'Flamant rose', 1, 26, NULL),
(35, 'Lemanoir', 'Lamanoir', 4, 26, NULL),
(36, 'Théo', 'Nandou', 3, 26, NULL),
(37, 'Buffalo', 'Bison', 7, 27, NULL),
(38, 'Chameau', 'Dromadaire', 4, 28, NULL),
(39, 'Triton', 'Âne de provence', 5, 28, NULL),
(40, 'Cinquante', 'Zèbre', 3, 29, NULL),
(41, 'Ed', 'Hyène', 2, 30, NULL),
(42, 'Diabétik', 'Hippopotame', 4, 31, NULL),
(43, 'Waluigi', 'Loup à crinière', 3, 32, NULL),
(44, 'Dumbo', 'Eléphant', 11, 33, NULL),
(45, 'Parchemin', 'Varan de Komodo', 3, 34, NULL),
(46, 'Longitude', 'Girafe', 4, 35, NULL),
(47, 'Gru', 'Grivet cercopithèque', 4, 35, NULL),
(48, 'Gege', 'Tamarin', 1, 36, NULL),
(49, 'Ouioui', 'Ouistiti', 4, 37, NULL),
(50, 'Théophile', 'Gibbon', 3, 38, NULL),
(51, 'Capucine', 'Capucin', 3, 39, NULL),
(52, 'Simba', 'Lion', 4, 40, NULL),
(53, 'Tapis', 'Tapir', 3, 41, NULL),
(54, 'Caesar', 'Casoar', 2, 42, NULL),
(55, 'Sacourvite', 'Guépard', 4, 43, NULL),
(56, 'Crocro', 'Crocodile nain', 3, 44, NULL),
(57, 'Biscotte', 'Gazelle', 11, 45, NULL),
(58, 'Gépeur', 'Autruche', 3, 45, NULL),
(59, 'Genou', 'Gnou', 4, 46, NULL),
(60, 'Onyx', 'Oryx beisa', 4, 46, NULL),
(61, 'Suricate', 'Rhinocéros', 3, 47, NULL),
(62, 'Sable', 'Fennec', 4, 48, NULL),
(63, 'Manteau', 'Coati', 3, 49, NULL),
(64, 'Tapidesouris', 'Tapir', 3, 41, NULL),
(65, 'Caesaro', 'Casoar', 2, 42, NULL),
(66, 'Olalaa', 'Guépard', 4, 43, NULL),
(67, 'Croks', 'Crocodile nain', 3, 44, NULL),
(68, 'Cracotte', 'Gazelle', 11, 45, NULL),
(69, 'Gemini', 'Autruche', 3, 45, NULL),
(70, 'Rotule', 'Gnou', 4, 46, NULL),
(71, 'Xynno', 'Oryx beisa', 4, 46, NULL),
(72, 'Suripussy', 'Rhinocéros', 3, 47, NULL),
(73, 'Kayou', 'Fennec', 4, 48, NULL),
(74, 'Veste', 'Coati', 3, 49, NULL),
(75, 'Samaritin', 'Saïmiri', 1, 49, NULL),
(76, 'Jigot', 'Iguane', 1, 50, NULL),
(77, 'Viper', 'Python', 2, 50, NULL),
(78, 'Carabosse', 'Tortue', 10, 50, NULL),
(79, 'Jertrude', 'Lémurien', 2, 2, NULL),
(80, 'Bicyclette', 'Panda roux', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `biomes`
--

DROP TABLE IF EXISTS `biomes`;
CREATE TABLE IF NOT EXISTS `biomes` (
  `biome_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_code` varchar(7) NOT NULL,
  `section` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '"à remplir"',
  PRIMARY KEY (`biome_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `biomes`
--

INSERT INTO `biomes` (`biome_id`, `name`, `color_code`, `section`) VALUES
(1, 'Le Vallon des cascades', '#7ba3cf', '\"à remplir\"'),
(2, 'Le Bois des pins', '#abc888', '\"à remplir\"'),
(3, 'Les Clairières', '#b7e085', '\"à remplir\"'),
(4, 'Le Plateau', '#e09385', '\"à remplir\"'),
(5, 'Le Belvédère', '#e5aba0', '\"à remplir\"'),
(6, 'La Bergerie des reptiles', '#f4d4ce', '\"à remplir\"');

-- --------------------------------------------------------

--
-- Structure de la table `enclosures`
--

DROP TABLE IF EXISTS `enclosures`;
CREATE TABLE IF NOT EXISTS `enclosures` (
  `enclosure_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `biome_id` int DEFAULT NULL,
  PRIMARY KEY (`enclosure_id`),
  KEY `biome_id` (`biome_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enclosures`
--

INSERT INTO `enclosures` (`enclosure_id`, `name`, `description`, `status`, `biome_id`) VALUES
(1, 'Enclos des pandas roux', NULL, 'open', 1),
(2, 'Enclos des lémuriens', NULL, 'open', 1),
(3, 'Enclos des chèvres naines', NULL, 'open', 1),
(4, 'Enclos des mouflons', NULL, 'open', 1),
(5, 'Enclos des loutres et binturongs', NULL, 'open', 1),
(6, 'Enclos des tortues et chèvres naines', NULL, 'open', 1),
(7, 'Enclos des panthères', NULL, 'open', 1),
(8, 'Enclos des grand hoccos', NULL, 'open', 1),
(9, 'Enclos des ara perroquets', NULL, 'open', 1),
(10, 'Enclos des macaques crabier', NULL, 'open', 2),
(11, 'Enclos des cerfs', NULL, 'open', 2),
(12, 'Enclos des vautours', NULL, 'open', 2),
(13, 'Enclos des antilopes, daims et nilgauts', NULL, 'open', 2),
(14, 'Enclos des loups d\'Europe', NULL, 'open', 2),
(15, 'Enclos des cigognes et marabouts', NULL, 'open', 3),
(16, 'Enclos des oryx algazelle, watusis et ânes de Somalie', NULL, 'open', 3),
(17, 'Enclos des yacks et moutons noirs', NULL, 'open', 3),
(18, 'Enclos des porc-épic', NULL, 'open', 3),
(19, 'Enclos des émeus et wallaby', NULL, 'open', 3),
(20, 'Enclos des ibis et tortues', NULL, 'open', 3),
(21, 'Enclos des pécaris', NULL, 'open', 3),
(22, 'Enclos des lynxs', NULL, 'open', 3),
(23, 'Enclos des cervals', NULL, 'open', 3),
(24, 'Enclos des chiens des buissons', NULL, 'open', 3),
(25, 'Enclos des tigres', NULL, 'open', 3),
(26, 'Enclos des flamants roses, tamanoirs et nandou', NULL, 'open', 3),
(27, 'Enclos des bisons', NULL, 'open', 3),
(28, 'Enclos des dromadaires et ânes de Provence', NULL, 'open', 3),
(29, 'Enclos des zèbres', NULL, 'open', 4),
(30, 'Enclos des hyènes', NULL, 'open', 4),
(31, 'Enclos des hippopotame', NULL, 'open', 4),
(32, 'Enclos des loups à crinière', NULL, 'open', 4),
(33, 'Enclos des éléphants', NULL, 'open', 4),
(34, 'Enclos des varans de Komodo', NULL, 'open', 4),
(35, 'Enclos des girafes et grivets cercopithèques', NULL, 'open', 4),
(36, 'Enclos des tamarins', NULL, 'open', 4),
(37, 'Enclos des oustitis', NULL, 'open', 4),
(38, 'Enclos des gibbons', NULL, 'open', 4),
(39, 'Enclos des capucins', NULL, 'open', 4),
(40, 'Enclos des lions', NULL, 'open', 4),
(41, 'Enclos des tapirs', NULL, 'open', 5),
(42, 'Enclos des casoars', NULL, 'open', 5),
(43, 'Enclos des guépards', NULL, 'open', 5),
(44, 'Enclos des crocodiles nains', NULL, 'open', 5),
(45, 'Enclos des gazelles et autruches', NULL, 'open', 5),
(46, 'Enclos des gnous, oryx beisa et rhinocéros', NULL, 'open', 5),
(47, 'Enclos des suricates', NULL, 'open', 5),
(48, 'Enclos des fennecs', NULL, 'open', 5),
(49, 'Enclos des coatis et saïmiris', NULL, 'open', 5),
(50, 'Enclos des pythons, tortues et iguanes', NULL, 'open', 6);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `enclosure_id` int DEFAULT NULL,
  `rating` int NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  KEY `user_id` (`user_id`),
  KEY `enclosure_id` (`enclosure_id`)
) ;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `enclosure_id`, `rating`, `comment`, `created_at`) VALUES
(1, 3, 1, 1, 'Cet enclos accueille des animaux de fils de pute !! C\'est inadmissible dans un établissement renommé comme le vôtre !', '2024-11-26 15:51:12'),
(13, NULL, NULL, 3, 'énorme super cool j&#039;ai jamais vu un truc aussi cool', '2024-12-09 13:01:48'),
(12, NULL, NULL, 3, 'AH OE SUPER', '2024-12-09 12:51:30'),
(11, NULL, NULL, 2, 'test', '2024-12-09 12:48:42'),
(14, NULL, NULL, 1, 'éclaté au sol', '2024-12-09 13:02:12'),
(15, NULL, NULL, 5, 'test\r\n  test tt\r\n     test\r\n\r\nlolp', '2024-12-09 13:17:33'),
(16, 3, NULL, 5, 'SUPER GENIAL\r\nありがとう', '2024-12-09 13:27:18');

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `schedule_id` int NOT NULL AUTO_INCREMENT,
  `enclosure_id` int NOT NULL,
  `feeding_time` time NOT NULL,
  `description` text,
  PRIMARY KEY (`schedule_id`),
  KEY `fk_enclosure` (`enclosure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `enclosure_id`, `feeding_time`, `description`) VALUES
(1, 1, '12:00:00', NULL),
(2, 2, '12:30:00', NULL),
(3, 3, '16:25:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `purchase_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `validity_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(5, 'admin', '$2y$10$EmeAhNCYRE6tzz/d/BWEWuRTUAbiaq/.Oa8DfkUjH592rfP.0IDiy', 'mathys.rageade@isen.yncrea.fr', 'admin', '2024-11-29 17:00:38'),
(3, 'mathys', '$2y$10$1SOF2dhokke5VwvBBY/WiOkSoHXeHKDIoZYqhreUjSbMD4aUFdjIC', 'bloup@superkk.prout', 'user', '2024-11-19 14:09:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
