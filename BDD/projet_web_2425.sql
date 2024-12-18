-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 déc. 2024 à 19:40
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
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `species`, `age`, `enclosure_id`, `image`) VALUES
(1, 'Raoul', 'Ara perroquet', 1, 9, 'images/animaux/jpg/AraPerroquet.jpg'),
(2, 'Chaussette', 'Panthère', 3, 7, 'images/animaux/jpg/Panthere.jpg'),
(3, 'Granola', 'Grand hocco', 1, 8, 'images/animaux/jpg/GrandHocco.jpg'),
(4, 'Jeannot', 'Panda roux', 1, 1, 'images/animaux/jpg/PandaRoux.jpg'),
(5, 'Pois', 'Lémurien', 1, 2, 'images/animaux/jpg/Lemurien.jpg'),
(6, 'Becamerde', 'Chèvre naine', 2, 3, 'images/animaux/jpg/ChevreNaine.jpg'),
(7, 'Poilu', 'Mouflon', 3, 4, 'images/animaux/jpg/Mouflon.jpg'),
(8, 'Carapute', 'Tortue', 10, 6, 'images/animaux/jpg/Tortue.jpg'),
(9, 'Michel', 'Cerf', 5, 11, 'images/animaux/jpg/Cerf.jpg'),
(10, 'Mouloud', 'Macaque crabier', 3, 10, 'images/animaux/jpg/MacaqueCrabier.jpg'),
(11, 'Zarbi', 'Vautour', 2, 12, 'images/animaux/jpg/Vautour.jpg'),
(12, 'Jeannine', 'Antilope', 4, 13, 'images/animaux/jpg/Antilope.jpg'),
(13, 'Maria', 'Daim', 3, 13, 'images/animaux/jpg/Daim.jpg'),
(14, 'Becatrou', 'Nilgaut', 2, 13, 'images/animaux/jpg/Nilgaut.jpg'),
(15, 'Oeil percé', 'Loup d\'\'Europe', 3, 14, 'images/animaux/jpg/LoupdEurope.jpg'),
(16, 'Griffe sanglante', 'Loup d\'\'Europe', 4, 14, 'images/animaux/jpg/LoupdEurope.jpg'),
(17, 'Pauline', 'Cigogne', 1, 15, 'images/animaux/jpg/Cigogne.jpg'),
(18, 'Mohamed', 'Marabout', 3, 15, 'images/animaux/jpg/Marabout.jpg'),
(19, 'Patatartiné', 'Oryx algazelle', 2, 16, 'images/animaux/jpg/OryxAlgazelle.jpg'),
(20, 'Gérard', 'Watusi', 4, 16, 'images/animaux/jpg/Watusi.jpg'),
(21, 'Moquette', 'Âne de Somalie', 4, 16, 'images/animaux/jpg/AneDeSomalie.jpg'),
(22, 'Aubergine', 'Yack', 2, 17, 'images/animaux/jpg/Yack.jpg'),
(23, 'Bouldepoil', 'Mouton noir', 3, 17, 'images/animaux/jpg/MoutonNoir.jpg'),
(24, 'Sapik', 'Porc-épic', 4, 18, 'images/animaux/jpg/PorcEpic.jpg'),
(25, 'Meumeu', 'Emeu', 5, 19, 'images/animaux/jpg/Emeu.jpg'),
(26, 'Joharno', 'Wallaby', 3, 19, 'images/animaux/jpg/Wallaby.jpg'),
(27, 'Budget', 'Ibis', 2, 20, 'images/animaux/jpg/Ibis.jpg'),
(28, 'Carabosse', 'Tortue', 4, 20, 'images/animaux/jpg/Tortue.jpg'),
(29, 'Mario', 'Pécari', 3, 21, 'images/animaux/jpg/Pecari.jpg'),
(30, 'Luigi', 'Lynx', 2, 22, 'images/animaux/jpg/Lynx.jpg'),
(31, 'Gris', 'Serval', 3, 23, 'images/animaux/jpg/Serval.jpg'),
(32, 'Ouaf', 'Chien des buissons', 4, 24, 'images/animaux/jpg/ChienDesBuissons.jpg'),
(33, 'Tigrou', 'Tigre', 4, 25, 'images/animaux/jpg/Tigre.jpg'),
(34, 'Isabelle', 'Flamant rose', 1, 26, 'images/animaux/jpg/FlamantRose.jpg'),
(35, 'Lemanoir', 'Tamanoir', 4, 26, 'images/animaux/jpg/Tamanoir.jpg'),
(36, 'Théo', 'Nandou', 3, 26, 'images/animaux/jpg/Nandou.jpg'),
(37, 'Buffalo', 'Bison', 7, 27, 'images/animaux/jpg/Bison.jpg'),
(38, 'Chameau', 'Dromadaire', 4, 28, 'images/animaux/jpg/Dromadaire.jpg'),
(39, 'Triton', 'Âne de provence', 5, 28, 'images/animaux/jpg/AneDeProvence.jpg'),
(40, 'Cinquante', 'Zèbre', 3, 29, 'images/animaux/jpg/Zebre.jpg'),
(41, 'Ed', 'Hyène', 2, 30, 'images/animaux/jpg/Hyene.jpg'),
(42, 'Diabétik', 'Hippopotame', 4, 31, 'images/animaux/jpg/Hippopotame.jpg'),
(43, 'Waluigi', 'Loup à crinière', 3, 32, 'images/animaux/jpg/LoupACriniere.jpg'),
(44, 'Dumbo', 'Eléphant', 11, 33, 'images/animaux/jpg/Elephant.jpg'),
(45, 'Parchemin', 'Varan de Komodo', 3, 34, 'images/animaux/jpg/VaranDeKomodo.jpg'),
(46, 'Longitude', 'Girafe', 4, 35, 'images/animaux/jpg/Girafe.jpg'),
(47, 'Gru', 'Grivet cercopithèque', 4, 35, 'images/animaux/jpg/GrivetCercopitheque.jpg'),
(48, 'Gege', 'Tamarin', 1, 36, 'images/animaux/jpg/Tamarin.jpg'),
(49, 'Ouioui', 'Ouistiti', 4, 37, 'images/animaux/jpg/Ouistiti.jpg'),
(50, 'Théophile', 'Gibbon', 3, 38, 'images/animaux/jpg/Gibbon.jpg'),
(51, 'Capucine', 'Capucin', 3, 39, 'images/animaux/jpg/Capucin.jpg'),
(52, 'Simba', 'Lion', 4, 40, 'images/animaux/jpg/Lion.jpg'),
(54, 'Caesar', 'Casoar', 2, 42, 'images/animaux/jpg/Casoar.jpg'),
(55, 'Sacourvite', 'Guépard', 4, 43, 'images/animaux/jpg/Guepard.jpg'),
(56, 'Crocro', 'Crocodile nain', 3, 44, 'images/animaux/jpg/CrocodileNain.jpg'),
(57, 'Biscotte', 'Gazelle', 11, 45, 'images/animaux/jpg/Gazelle.jpg'),
(58, 'Gépeur', 'Autruche', 3, 45, 'images/animaux/jpg/Autruche.jpg'),
(60, 'Onyx', 'Oryx beisa', 4, 46, 'images/animaux/jpg/OryxBeisa.jpg'),
(61, 'Suricate', 'Rhinocéros', 3, 46, 'images/animaux/jpg/Rhinoceros.jpg'),
(62, 'Sable', 'Fennec', 4, 48, 'images/animaux/jpg/Fennec.jpg'),
(63, 'Manteau', 'Coati', 3, 49, 'images/animaux/jpg/Coati.jpg'),
(64, 'Tapidesouris', 'Tapir', 3, 41, 'images/animaux/jpg/Tapir.jpg'),
(65, 'Caesaro', 'Casoar', 2, 42, 'images/animaux/jpg/Casoar.jpg'),
(70, 'Rotule', 'Gnou', 4, 46, 'images/animaux/jpg/Gnou.jpg'),
(75, 'Samaritin', 'Saïmiri', 1, 49, 'images/animaux/jpg/Saimiri.jpg'),
(76, 'Jigot', 'Iguane', 1, 50, 'images/animaux/jpg/Iguane.jpg'),
(78, 'Carapace', 'Tortue', 10, 50, 'images/animaux/jpg/Tortue.jpg'),
(79, 'Jertrude', 'Lémurien', 2, 2, 'images/animaux/jpg/Lemurien.jpg'),
(80, 'Bicyclette', 'Panda roux', 1, 1, 'images/animaux/jpg/PandaRoux.jpg'),
(83, 'C++', 'Python', 3, 50, 'images/animaux/jpg/Python.jpg'),
(84, 'Debousurpatte', 'Suricate', 3, 47, 'images/animaux/jpg/Suricate.jpg'),
(81, 'Johnny', 'Loutre', 2, 5, 'images/animaux/jpg/Loutre.jpg'),
(82, 'Casspatou', 'Binturong', 3, 5, 'images/animaux/jpg/Binturong.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(23, 'Enclos des servals', NULL, 'open', 3),
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
(50, 'Enclos des pythons, tortues et iguanes', NULL, 'open', 6),
(51, 'Future plaine africaine', NULL, 'closed', 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(5, 'admin', '$2y$10$EmeAhNCYRE6tzz/d/BWEWuRTUAbiaq/.Oa8DfkUjH592rfP.0IDiy', 'mathys.rageade@isen.yncrea.fr', 'admin', '2024-11-29 17:00:38'),
(3, 'mathys', '$2y$10$1SOF2dhokke5VwvBBY/WiOkSoHXeHKDIoZYqhreUjSbMD4aUFdjIC', 'bloup@superkk.prout', 'user', '2024-11-19 14:09:17'),
(6, 'thomas', '$2y$10$CG2WDVgNmVzK7EFzEvmi2edQL0WVLbxRzbuDwxsj1yw41zqciYW/q', 'thomas@caca.fr', 'user', '2024-12-11 21:07:19'),
(7, 'test', '$2y$10$/5WC5B9h7Hh8LbP49/CmjOyRgBPQ9Y8QN251xQTY0GNe32ztvQ8kK', 'test@tutu.toto', 'user', '2024-12-17 14:55:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
