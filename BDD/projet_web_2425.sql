-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 déc. 2024 à 22:50
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
  `description` text,
  PRIMARY KEY (`animal_id`),
  KEY `enclosure_id` (`enclosure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `species`, `age`, `enclosure_id`, `image`, `description`) VALUES
(1, 'Raoul', 'Ara perroquet', 1, 9, 'images/animaux/jpg/AraPerroquet.jpg', 'L\'ara perroquet, avec son plumage éclatant et coloré, est un oiseau intelligent et sociable. Doté d’un bec puissant et d’une longue queue élégante, il évolue avec grâce dans les forêts tropicales, où ses cris résonnent vivement.'),
(2, 'Chaussette', 'Panthère', 3, 7, 'images/animaux/jpg/Panthere.jpg', 'La panthère noire, avec son pelage noir profond et mystérieux, est un félin agile et puissant. Solitaire et discret, elle excelle dans les forêts denses grâce à sa vision perçante et ses mouvements silencieux, incarnant la grâce et la force.'),
(3, 'Granola', 'Grand hocco', 1, 8, 'images/animaux/jpg/GrandHocco.jpg', 'Le grand hocco, avec son plumage noir brillant et sa crête bouclée, est un oiseau élégant des forêts tropicales. Discret et terrestre, il se nourrit de fruits et graines, évoluant avec grâce sous les arbres.'),
(4, 'Jeannot', 'Panda roux', 1, 1, 'images/animaux/jpg/PandaRoux.jpg', 'Le panda roux, avec son pelage roux éclatant et sa queue annelée, est un animal agile et discret. Il évolue dans les forêts tempérées, passant son temps à grimper, se nourrir de bambou et se reposer dans les arbres.'),
(5, 'Pois', 'Lémurien', 1, 2, 'images/animaux/jpg/Lemurien.jpg', 'Le lémurien, avec ses grands yeux brillants et sa queue annelée, est un primate agile et curieux. Habitant les forêts de Madagascar, il se déplace avec grâce, se nourrissant de fruits et de feuilles.'),
(6, 'Becamerde', 'Chèvre naine', 2, 3, 'images/animaux/jpg/ChevreNaine.jpg', 'La chèvre naine, avec sa petite taille et son allure vive, est un animal robuste et joueur. Facile à apprivoiser, elle se nourrit d’herbes et grimpe avec agilité, apportant une touche de malice à son environnement.'),
(7, 'Poilu', 'Mouflon', 3, 4, 'images/animaux/jpg/Mouflon.jpg', 'Le mouflon, avec ses cornes majestueusement recourbées et son pelage brun, est un animal montagnard robuste. Agile et sûr de lui, il évolue avec aisance sur les terrains escarpés.'),
(8, 'Carapute', 'Tortue', 10, 6, 'images/animaux/jpg/Tortue.jpg', 'La tortue, avec sa carapace solide et son allure lente, est un reptile calme et résistant. Elle se déplace paisiblement sur terre ou dans l\'eau, se nourrissant de plantes et de petits animaux.'),
(9, 'Michel', 'Cerf', 5, 11, 'images/animaux/jpg/Cerf.jpg', 'Le cerf, avec ses bois impressionnants et son pelage brun, est un animal élégant et gracieux. Habitant les forêts et les prairies, il se déplace avec agilité, toujours vigilant face aux prédateurs.'),
(10, 'Mouloud', 'Macaque crabier', 3, 10, 'images/animaux/jpg/MacaqueCrabier.jpg', 'Le macaque crabier, au pelage gris et à la face caractéristique, est un primate vif et curieux. Il vit principalement près des côtes, se nourrissant de crabes et d’autres petits animaux, agile dans les arbres comme sur le sol.'),
(11, 'Zarbi', 'Vautour', 2, 12, 'images/animaux/jpg/Vautour.jpg', 'Le vautour, avec son plumage sombre et sa tête dénudée, est un oiseau majestueux et imposant. Charognard, il plane en silence dans le ciel, scrutant les terres pour repérer sa nourriture.'),
(12, 'Jeannine', 'Antilope', 4, 13, 'images/animaux/jpg/Antilope.jpg', 'L\'antilope, avec son corps élancé et ses jambes agiles, est un animal gracieux et rapide. Vivant dans les savanes et les prairies, elle fuit habilement ses prédateurs grâce à sa grande vitesse.'),
(13, 'Maria', 'Daim', 3, 13, 'images/animaux/jpg/Daim.jpg', 'Le daim, avec son pelage tacheté et ses bois ramifiés, est un cerf élégant et discret. Il évolue en forêt, se déplaçant avec grâce et harmonie, souvent en troupeau.'),
(14, 'Becatrou', 'Nilgaut', 2, 13, 'images/animaux/jpg/Nilgaut.jpg', 'Le nilgaut, avec son pelage bleu-gris et ses grandes oreilles, est une antilope robuste et imposante. Habitant les plaines d\'Asie, il se déplace en groupe, broutant tranquillement l\'herbe.'),
(15, 'Oeil percé', 'Loup d\'\'Europe', 3, 14, 'images/animaux/jpg/LoupdEurope.jpg', 'Le loup d\'Europe, avec son pelage épais et sa silhouette imposante, est un prédateur puissant et social. Vivant en meute, il chasse avec une grande coordination dans les forêts et montagnes.'),
(16, 'Griffe sanglante', 'Loup d\'\'Europe', 4, 14, 'images/animaux/jpg/LoupdEurope.jpg', NULL),
(17, 'Pauline', 'Cigogne', 1, 15, 'images/animaux/jpg/Cigogne.jpg', 'La cigogne, avec son long cou et ses grandes ailes blanches, est un oiseau élégant et majestueux. Elle migre sur de longues distances, se nourrissant de petits animaux et de poissons, souvent vue perchée sur des toits ou des poteaux.'),
(18, 'Mohamed', 'Marabout', 3, 15, 'images/animaux/jpg/Marabout.jpg', 'Le marabout, avec son plumage blanc et noir et son long bec incurvé, est un grand oiseau au port majestueux. Souvent vu près des plans d\'eau, il se nourrit principalement de poissons et de charognes.'),
(19, 'Patatartiné', 'Oryx algazelle', 2, 16, 'images/animaux/jpg/OryxAlgazelle.jpg', 'L\'oryx algazelle, avec ses longues cornes droites et son pelage beige clair, est une antilope robuste et élégante. Habitant les déserts et les savanes, il se déplace avec agilité, résistant à des conditions arides.'),
(20, 'Gérard', 'Watusi', 4, 16, 'images/animaux/jpg/Watusi.jpg', 'Le Watusi, avec ses grandes cornes courbées et son pelage court, est une vache robuste et imposante. Originaire d\'Afrique, il est adapté aux climats chauds et est souvent élevé pour sa viande et son lait.'),
(21, 'Moquette', 'Âne de Somalie', 4, 16, 'images/animaux/jpg/AneDeSomalie.jpg', 'L\'âne de Somalie, avec son pelage gris clair et ses oreilles longues, est un animal robuste et endurant. Adapté aux environnements arides, il est souvent utilisé comme bête de somme dans les régions sèches d\'Afrique de l\'Est.'),
(22, 'Aubergine', 'Yack', 2, 17, 'images/animaux/jpg/Yack.jpg', 'Le yack, avec son pelage épais et sa silhouette robuste, est un bovin adapté aux hautes altitudes. Originaire de l\'Himalaya, il est résistant au froid et utilisé pour le transport, la laine et le lait.'),
(23, 'Bouldepoil', 'Mouton noir', 3, 17, 'images/animaux/jpg/MoutonNoir.jpg', 'Le mouton noir, avec son pelage sombre et dense, est une variation rare et distinctive du mouton. Souvent élevé pour sa laine, il se distingue par sa couleur unique et son tempérament calme.'),
(24, 'Sapik', 'Porc-épic', 4, 18, 'images/animaux/jpg/PorcEpic.jpg', 'Le porc-épic, avec ses piquants rigides et son visage expressif, est un rongeur nocturne et solitaire. Lorsqu\'il se sent menacé, il hérisse ses piquants pour se défendre, se nourrissant principalement de plantes et d\'écorces.'),
(25, 'Meumeu', 'Emeu', 5, 19, 'images/animaux/jpg/Emeu.jpg', 'L\'émeu, avec son plumage brun et sa taille imposante, est un grand oiseau non volant originaire d\'Australie. Agile et rapide, il se déplace facilement dans les savanes, se nourrissant de plantes, fruits et insectes.'),
(26, 'Joharno', 'Wallaby', 3, 19, 'images/animaux/jpg/Wallaby.jpg', 'Le wallaby, avec son pelage doux et sa taille plus petite que celle du kangourou, est un marsupial agile et curieux. Vivant principalement en Australie, il se déplace en sautillant et se nourrit de plantes et d\'herbes.'),
(27, 'Budget', 'Ibis', 2, 20, 'images/animaux/jpg/Ibis.jpg', 'L’ibis, avec son plumage souvent blanc ou noir et son long bec recourbé, est un oiseau élégant et gracieux. Il vit près des plans d’eau, où il se nourrit de petits poissons, insectes et crustacés.'),
(28, 'Carabosse', 'Tortue', 4, 20, 'images/animaux/jpg/Tortue.jpg', NULL),
(29, 'Mario', 'Pécari', 3, 21, 'images/animaux/jpg/Pecari.jpg', 'Le pécari, avec son pelage gris-brun et sa taille compacte, est un mammifère ressemblant à un petit cochon. Vivant en groupes dans les forêts et savanes, il se nourrit principalement de plantes, racines et petits animaux.'),
(30, 'Luigi', 'Lynx', 2, 22, 'images/animaux/jpg/Lynx.jpg', 'Le lynx, avec son pelage tacheté et ses oreilles pointues surmontées de touffes de poils, est un prédateur discret et agile. Solitaire, il chasse principalement la nuit dans les forêts, se nourrissant de petits mammifères et d\'oiseaux.'),
(31, 'Gris', 'Serval', 3, 23, 'images/animaux/jpg/Serval.jpg', 'Le serval, avec son pelage doré tacheté et ses longues pattes, est un félin agile et rapide. Il chasse principalement la nuit, utilisant sa grande agilité pour attraper des proies comme des oiseaux et des petits mammifères dans les savanes africaines.'),
(32, 'Ouaf', 'Chien des buissons', 4, 24, 'images/animaux/jpg/ChienDesBuissons.jpg', 'Le chien des buissons, avec son pelage tacheté et ses grandes oreilles, est un prédateur social et agile. Vivant en meute, il chasse principalement de nuit dans les savanes et forêts d\'Afrique, se nourrissant de petits mammifères et d\'oiseaux.'),
(33, 'Tigrou', 'Tigre', 4, 25, 'images/animaux/jpg/Tigre.jpg', 'Le tigre, avec son pelage rayé orange et noir, est un prédateur puissant et majestueux. Solitaire, il évolue dans les forêts et jungles d\'Asie, où il chasse principalement de grands mammifères comme les cerfs et les sangliers.'),
(34, 'Isabelle', 'Flamant rose', 1, 26, 'images/animaux/jpg/FlamantRose.jpg', 'Le flamant rose, avec son plumage rose vif et son long cou gracieux, est un oiseau élégant et social. Il se nourrit de petites crevettes et algues, filtrant l\'eau avec son bec unique, et vit en grands groupes près des lagunes et marais.'),
(35, 'Lemanoir', 'Tamanoir', 4, 26, 'images/animaux/jpg/Tamanoir.jpg', 'Le tamanoir, avec son long museau et sa langue extensible, est un mammifère nocturne et solitaire. Il se nourrit principalement de fourmis et de termites, qu\'il déloge grâce à ses puissantes griffes, vivant dans les forêts d\'Amérique du Sud.'),
(36, 'Théo', 'Nandou', 3, 26, 'images/animaux/jpg/Nandou.jpg', 'Le nandou, avec son plumage gris-brun et sa taille imposante, est un grand oiseau non volant originaire d\'Amérique du Sud. Agile et rapide, il vit dans les savanes et les prairies, se nourrissant de plantes, graines et fruits.'),
(37, 'Buffalo', 'Bison', 7, 27, 'images/animaux/jpg/Bison.jpg', 'Le bison, avec son épais pelage et sa grande stature, est un mammifère imposant et robuste. Vivant principalement dans les prairies d\'Amérique du Nord, il se nourrit d\'herbe et de végétation, évoluant en troupeaux.'),
(38, 'Chameau', 'Dromadaire', 4, 28, 'images/animaux/jpg/Dromadaire.jpg', 'Le dromadaire, avec son pelage court et une seule bosse, est un chameau adapté aux environnements désertiques. Résistant à la chaleur et à la sécheresse, il transporte des charges et se nourrit de végétation aride dans les régions chaudes.'),
(39, 'Triton', 'Âne de provence', 5, 28, 'images/animaux/jpg/AneDeProvence.jpg', 'L\'âne de Provence, avec son pelage gris clair et ses grandes oreilles, est un animal robuste et tranquille. Originaire du sud de la France, il est utilisé pour le travail agricole et se distingue par sa gentillesse et sa résistance.'),
(40, 'Cinquante', 'Zèbre', 3, 29, 'images/animaux/jpg/Zebre.jpg', 'Le zèbre, avec son pelage rayé noir et blanc unique, est un herbivore social vivant en groupes. Originaire d\'Afrique, il se déplace avec agilité dans les savanes, se nourrissant principalement d\'herbe.'),
(41, 'Ed', 'Hyène', 2, 30, 'images/animaux/jpg/Hyene.jpg', 'La hyène, avec son corps robuste et son pelage tacheté, est un prédateur et charognard social. Vivant en meute, elle est connue pour ses rires caractéristiques et chasse principalement de nuit dans les savanes africaines.'),
(42, 'Diabétik', 'Hippopotame', 4, 31, 'images/animaux/jpg/Hippopotame.jpg', 'L\'hippopotame, avec son corps massif et sa peau épaisse, est un mammifère semi-aquatique. Vivant dans les rivières et lacs d\'Afrique, il passe une grande partie de son temps dans l\'eau et se nourrit principalement d\'herbes.'),
(43, 'Waluigi', 'Loup à crinière', 3, 32, 'images/animaux/jpg/LoupACriniere.jpg', 'Le loup à crinière, avec sa crinière distinctive et son pelage dense, est un prédateur rare et social. Vivant en Afrique de l\'Est, il chasse en meute, se nourrissant principalement de petits mammifères et d\'animaux sauvages.'),
(44, 'Dumbo', 'Eléphant', 11, 33, 'images/animaux/jpg/Elephant.jpg', 'L\'éléphant, avec sa taille imposante, ses grandes oreilles et sa trompe caractéristique, est un mammifère majestueux et intelligent. Vivant en Afrique et en Asie, il se nourrit principalement de végétation et évolue en groupes familiaux.'),
(45, 'Parchemin', 'Varan de Komodo', 3, 34, 'images/animaux/jpg/VaranDeKomodo.jpg', 'Le varan de Komodo, avec son corps massif et son pelage rugueux, est un grand reptile carnivore. Vivant sur les îles de Komodo en Indonésie, il chasse des proies variées grâce à sa grande force et sa morsure venimeuse.'),
(46, 'Longitude', 'Girafe', 4, 35, 'images/animaux/jpg/Girafe.jpg', 'La girafe, avec son long cou et ses pattes élancées, est le plus grand mammifère terrestre. Vivant dans les savanes africaines, elle se nourrit principalement de feuilles d\'arbres, atteignant les branches les plus hautes grâce à sa taille impressionnante.'),
(47, 'Gru', 'Grivet cercopithèque', 4, 35, 'images/animaux/jpg/GrivetCercopitheque.jpg', 'Le grivet, ou cercopithèque, avec son pelage gris et ses traits faciaux expressifs, est un petit singe vif et social. Vivant principalement en Afrique de l\'Est, il évolue en groupe et se nourrit de fruits, feuilles et insectes.'),
(48, 'Gege', 'Tamarin', 1, 36, 'images/animaux/jpg/Tamarin.jpg', 'Le tamarin, avec son petit corps agile et sa fourrure souvent dorée ou noire, est un singe vif et curieux. Vivant principalement en Amérique du Sud, il se nourrit de fruits, insectes et nectar, se déplaçant facilement dans les arbres.'),
(49, 'Ouioui', 'Ouistiti', 4, 37, 'images/animaux/jpg/Ouistiti.jpg', 'Le ouistiti, avec son petit corps, son visage expressif et sa queue longue, est un singe agile et social. Vivant principalement en Amérique du Sud, il se nourrit de fruits, d\'insectes et de sève, évoluant en groupes dans les arbres.'),
(50, 'Théophile', 'Gibbon', 3, 38, 'images/animaux/jpg/Gibbon.jpg', 'Le gibbon, avec son corps élancé et ses longs bras, est un singe agile et acrobatique. Vivant principalement en Asie du Sud-Est, il se déplace en se balançant d\'arbre en arbre et se nourrit de fruits, feuilles et insectes.'),
(51, 'Capucine', 'Capucin', 3, 39, 'images/animaux/jpg/Capucin.jpg', 'Le capucin, avec son pelage brun et ses traits expressifs, est un singe intelligent et curieux. Vivant en Amérique centrale et du Sud, il se nourrit de fruits, graines et insectes, et est connu pour sa capacité à utiliser des outils.'),
(52, 'Simba', 'Lion', 4, 40, 'images/animaux/jpg/Lion.jpg', 'Le lion, avec sa crinière imposante et son regard perçant, est un prédateur puissant et social. Vivant en Afrique, il évolue en groupe appelé \"troupeau\", chassant principalement de grands mammifères dans les savanes et les prairies.'),
(54, 'Caesar', 'Casoar', 2, 42, 'images/animaux/jpg/Casoar.jpg', 'Le casoar, avec son plumage sombre et sa crête colorée, est un oiseau imposant et puissant. Non volant, il vit dans les forêts tropicales d\'Asie et d\'Océanie, se déplaçant rapidement au sol et se nourrissant de fruits, graines et insectes.'),
(55, 'Sacourvite', 'Guépard', 4, 43, 'images/animaux/jpg/Guepard.jpg', 'Le guépard, avec son corps élancé et ses taches caractéristiques, est le mammifère terrestre le plus rapide. Vivant dans les savanes africaines, il chasse principalement des gazelles, utilisant sa vitesse incroyable pour les rattraper en un sprint fulgurant.'),
(56, 'Crocro', 'Crocodile nain', 3, 44, 'images/animaux/jpg/CrocodileNain.jpg', 'Le crocodile nain, de petite taille et au corps trapu, est un prédateur discret vivant dans les rivières et marécages d\'Afrique. Il se nourrit principalement de poissons, d\'amphibiens et de petits animaux, restant souvent caché dans l\'eau.'),
(57, 'Biscotte', 'Gazelle', 11, 45, 'images/animaux/jpg/Gazelle.jpg', 'La gazelle, avec son corps élancé et ses cornes fines, est un animal rapide et agile. Vivant dans les savanes et les prairies, elle se déplace en troupeaux et se nourrit principalement d\'herbe, toujours prête à fuir ses prédateurs.'),
(58, 'Gépeur', 'Autruche', 3, 45, 'images/animaux/jpg/Autruche.jpg', 'L\'autruche, avec son grand corps et ses longues pattes puissantes, est le plus grand oiseau du monde. Incapable de voler, elle court à grande vitesse dans les savanes et déserts, se nourrissant de plantes, graines et petits insectes.'),
(60, 'Onyx', 'Oryx beisa', 4, 46, 'images/animaux/jpg/OryxBeisa.jpg', 'L’oryx beisa, avec ses longues cornes droites et son pelage beige marqué de noir, est une antilope élégante et robuste. Habitant les régions arides d’Afrique de l’Est, il se nourrit de végétation sèche et est adapté aux climats extrêmes.'),
(61, 'Suricate', 'Rhinocéros', 3, 46, 'images/animaux/jpg/Rhinoceros.jpg', 'Le rhinocéros, avec son corps massif et sa ou ses cornes imposantes, est un mammifère puissant et robuste. Vivant en Afrique et en Asie, il se nourrit principalement d’herbes, de feuilles et de branches, évoluant souvent près des points d’eau.'),
(62, 'Sable', 'Fennec', 4, 48, 'images/animaux/jpg/Fennec.jpg', 'Le fennec, avec ses grandes oreilles et son pelage clair, est un petit renard adapté au désert. Vivant principalement en Afrique du Nord, il se nourrit d’insectes, de rongeurs et de fruits, et est actif surtout la nuit pour éviter la chaleur.'),
(63, 'Manteau', 'Coati', 3, 49, 'images/animaux/jpg/Coati.jpg', 'Le coati, avec son museau allongé et sa queue annelée, est un petit mammifère curieux et agile. Vivant en Amérique centrale et du Sud, il se nourrit de fruits, insectes et petits animaux, évoluant aussi bien au sol que dans les arbres.'),
(64, 'Tapidesouris', 'Tapir', 3, 41, 'images/animaux/jpg/Tapir.jpg', 'Le tapir, avec son corps robuste et son museau allongé, est un mammifère herbivore et discret. Vivant dans les forêts tropicales d\'Amérique du Sud et d\'Asie, il se nourrit de feuilles, fruits et végétation aquatique.'),
(65, 'Caesaro', 'Casoar', 2, 42, 'images/animaux/jpg/Casoar.jpg', 'Le casoar, avec son plumage noir dense et sa crête colorée distinctive, est un grand oiseau non volant. Originaire des forêts tropicales d\'Australie et de Nouvelle-Guinée, il se nourrit de fruits et végétation, se déplaçant avec force et agilité.'),
(70, 'Rotule', 'Gnou', 4, 46, 'images/animaux/jpg/Gnou.jpg', 'Le gnou, avec son corps massif et sa crinière sombre, est un herbivore emblématique des savanes africaines. Vivant en troupeaux, il migre sur de longues distances à la recherche d\'eau et de pâturages, souvent suivi par des prédateurs.'),
(75, 'Samaritin', 'Saïmiri', 1, 49, 'images/animaux/jpg/Saimiri.jpg', 'Le saïmiri, avec son pelage doré et son visage expressif, est un petit singe agile et sociable. Vivant en groupes dans les forêts d\'Amérique centrale et du Sud, il se nourrit de fruits, insectes et petits animaux.'),
(76, 'Jigot', 'Iguane', 1, 50, 'images/animaux/jpg/Iguane.jpg', 'L\'iguane, avec son corps écailleux et sa longue queue, est un reptile arboricole et herbivore. Vivant dans les forêts tropicales d\'Amérique centrale et du Sud, il se nourrit principalement de feuilles, fleurs et fruits.'),
(78, 'Carapace', 'Tortue', 10, 50, 'images/animaux/jpg/Tortue.jpg', NULL),
(79, 'Jertrude', 'Lémurien', 2, 2, 'images/animaux/jpg/Lemurien.jpg', NULL),
(80, 'Bicyclette', 'Panda roux', 1, 1, 'images/animaux/jpg/PandaRoux.jpg', NULL),
(83, 'C++', 'Python', 3, 50, 'images/animaux/jpg/Python.jpg', 'Le python, avec son corps massif et ses écailles lisses, est un serpent constricteur puissant. Vivant dans les forêts et savanes d\'Afrique et d\'Asie, il se nourrit de petits mammifères, oiseaux et reptiles, capturant ses proies par asphyxie.'),
(84, 'Debousurpatte', 'Suricate', 3, 47, 'images/animaux/jpg/Suricate.jpg', 'Le suricate, avec son petit corps agile et sa posture droite, est un mammifère social vivant en groupe. Originaire des régions désertiques d\'Afrique, il se nourrit d\'insectes, de petits reptiles et de fruits, toujours en alerte face aux prédateurs.'),
(81, 'Johnny', 'Loutre', 2, 5, 'images/animaux/jpg/Loutre.jpg', 'La loutre, avec son pelage dense et son corps élancé, est un animal aquatique et joueur. Vivant près des rivières et des lacs, elle se nourrit de poissons, crustacés et mollusques, et est connue pour sa capacité à utiliser des outils pour se nourrir.'),
(82, 'Casspatou', 'Binturong', 3, 5, 'images/animaux/jpg/Binturong.jpg', 'Le binturong, avec son pelage noir épais et sa queue préhensile, est un mammifère nocturne et arboricole. Vivant dans les forêts d\'Asie du Sud-Est, il se nourrit de fruits, de petits animaux et de plantes, et dégage une odeur caractéristique de pop-corn.');

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

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `enclosure_id`, `rating`, `comment`, `created_at`) VALUES
(34, 9, 17, 3, 'Oe pas mal, pas mal', '2024-12-19 21:17:50'),
(35, 8, 31, 5, 'Avec son corps de sac de sable j&#039;ai trop envie de le goumer.', '2024-12-19 21:19:18'),
(33, 3, 3, 5, 'Sah j&#039;adore les chèvres.', '2024-12-19 13:38:25'),
(32, NULL, 18, 1, 'Ce chien m&#039;a crevé l’œil !!', '2024-12-19 13:34:44'),
(31, NULL, 1, 5, 'Ils sont trop mignons :3', '2024-12-19 13:33:56');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(5, 'admin', '$2y$10$EmeAhNCYRE6tzz/d/BWEWuRTUAbiaq/.Oa8DfkUjH592rfP.0IDiy', 'mathys.rageade@isen.yncrea.fr', 'admin', '2024-11-29 17:00:38'),
(3, 'mathys', '$2y$10$1SOF2dhokke5VwvBBY/WiOkSoHXeHKDIoZYqhreUjSbMD4aUFdjIC', 'bloup@superkk.prout', 'user', '2024-11-19 14:09:17'),
(6, 'thomas', '$2y$10$CG2WDVgNmVzK7EFzEvmi2edQL0WVLbxRzbuDwxsj1yw41zqciYW/q', 'thomas@caca.fr', 'user', '2024-12-11 21:07:19'),
(7, 'test', '$2y$10$/5WC5B9h7Hh8LbP49/CmjOyRgBPQ9Y8QN251xQTY0GNe32ztvQ8kK', 'test@tutu.toto', 'user', '2024-12-17 14:55:50'),
(8, 'florent', '$2y$10$n6HfcfdGy7PMkMUvESQ2iu67zMvdrZkj8SEijOGJoc9XXpg9LavAa', 'flo@flo.flo', 'user', '2024-12-19 21:16:34'),
(9, 'erwan', '$2y$10$DAefDxzVt6xeLwIn.SeuROcYlxmcjNKO7AiIk7atygXS5TkQ7VdWi', 'er@er.er', 'user', '2024-12-19 21:16:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
