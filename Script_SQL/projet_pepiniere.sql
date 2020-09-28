-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3304
-- Généré le :  sam. 22 août 2020 à 00:06
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_pepiniere`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `utilisateur` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `courriel` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`utilisateur`, `mdp`, `prenom`, `nom`, `courriel`, `adresse`) VALUES
('VASIA', 'pup', 'Vasia', 'Pupkin', 'vasia.pup@abc.com', '123, Fake str.'),
('KLAVA', 'mmm', 'Klava', 'Pupkina', 'klava@pup.com', '555, Evergreen av.'),
('USER1', '111', 'Michel', 'Demers', 'mdemers@mail.org', '1324, boul. Cremazie'),
('USER2', 'asd', 'Natalie', 'Labelle', 'natalie@mail.qc.ca', '100, boul. des Prairies'),
('USER3', 'mmm', 'Guy', 'Laliberte', 'laliberte@mail.net', '5679, av. Charlemagne'),
('USER4', 'mmm', 'Pascale', 'Bouchard', 'pbouchard@mail.ca', '2233, rue Masson'),
('USER5', 'aaa', 'User', 'Cinq', 'user5@mail.ca', '1111, Fake street'),
('PAOLO', 'ppp', 'Paolo', 'Gennari', 'paolo@mail.ca', '5578, boul. St-Joseph'),
('PAULO', 'qqq', 'Paulo', 'Coehlo', 'paulo@mail.ca', '5555, boul. St-Michel'),
('PAUL', 'sab', 'Paul', 'Sabourin', 'paul.sab@mail.net', '9072, rue Vendome, Montreal'),
('PAVLO', 'ppp', 'Pavlo', 'Spas', 'pspas@mail.md', '1394, boul. Levesque, Laval'),
('KOLIA', 'zzz', 'Kolia', 'Petrov', 'kolia@mail.ca', '777, 7e avenue, Montreal'),
('USER6', 'zzz', 'User', 'Six', 'user.six@mail.ca', '340, rue Galt, Verdun'),
('USER7', '777', 'User', 'Seven', 'user7@mail.ca', '5480, 7e avenue, Laval'),
('USER8', '888', 'User', 'Eight', 'user8@mail.ca', '800, 8e avenue, Montreal'),
('USER9', '999', 'User', 'Nine', 'user9@mail.com', '111, 1re avenue');

-- --------------------------------------------------------

--
-- Structure de la table `livredor`
--

DROP TABLE IF EXISTS `livredor`;
CREATE TABLE IF NOT EXISTS `livredor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `auteur` varchar(25) NOT NULL,
  `commentaire` text NOT NULL,
  `classement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livredor`
--

INSERT INTO `livredor` (`id`, `date`, `auteur`, `commentaire`, `classement`) VALUES
(1, '2020-08-20', 'VASIA', 'Vraiment un bon rapport qualité:prix!', 3),
(2, '2020-08-21', 'USER1', 'Bon choix de produits, bravo!', 1),
(3, '2020-08-20', 'PAUL', 'Des produits de bonne qualité et livraison rapide!\r\nJe recommande vraiment.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `courriel` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `courriel`, `message`) VALUES
(1, 'Vasia', 'vasia@pup.kin', 'hi there!'),
(2, 'Natalie', 'natalie@mail.qc.ca', 'bonjour, c\"est un tres beau site.'),
(5, 'Hank', 'hank@mail.ca', 'Bonjour, c\'est juste un autre message d\'essaye.'),
(4, 'Vasia2', 'vasia2@mail.org', 'Bonjour, est-ce que vous avez des poiriers? Merci.'),
(13, '<em>Pascal</em>', 'pascal@mail.org', 'Message test.'),
(14, '<em>Pascal</em>', 'pascal@mail.org', 'Message test.'),
(15, 'Fatou', 'fatou@mail.ca', 'Bonjour, ce projet nous a vraiment épuisé.'),
(12, 'Michel', 'michel@mail.com', 'Bonjour, un <strong>message</strong> test.');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `categorie`, `prix`, `quantite`, `photo`) VALUES
(1, 'Pommier', 'Elles sont belles à croquer, pas vrai! Nos pommiers vous aideront à concocter d’excellentes tartes et de pots confiture dont vous et vos convives allez vous régalez!', 1, '20', 15, 'pommier.jpg'),
(2, 'Abricotier', 'Textures charnues et chaires succulentes, nos abricotiers feront tourner des têtes et vous ferez des jaloux en l’ayant en votre possession!', 1, '22', 10, 'abricotier.png'),
(3, 'Amandiers', 'Psst, vous allez en raffolez en goûtant à nos amandiers! C’est un péché mignon!', 2, '30', 12, 'amandier.jpg'),
(4, 'Poirier', 'Que dire de nos poiriers…. miam! Vous allez vous en délectez les doigts! Elles n’attendent plus que vous!', 1, '18', 20, 'poire.jpg'),
(5, 'Châtaignier', 'Dès que vous aurez mis la main sur nos châtaigniers! Vous ne pourrez plus vous en passez! C’est indéniable!', 2, '25', 20, 'chataigniers.jpg'),
(6, 'Noyer', 'De toute beauté! Nos noyers auront fiers allures dans votre havre de paix!', 2, '24', 30, 'noyer.jpg'),
(7, 'Baies de goji', 'Titillez vos papilles gustatives en essayant nos baies de goji! Excellentes boost de vitamines, de minéraux et d’antioxydants! Dites, bonjour à un élixir de jouvence!', 3, '25', 18, 'baiesgoji.png'),
(8, 'Sureau', 'Osez sortir des chantiers battus et essayez nos magnifiques baies de sureau! Vous ne serez totalement pas déçus!', 3, '19', 29, 'sureau.jpg'),
(9, 'Argousier', 'Savez-vous que l’argousier est considéré comme étant le fruit de la passion du Québec? Faites le plein d’énergie en vitamine C et laissez ses vertus antioxydantes vous impressionner!', 3, '17', 26, 'argousier.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
