-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 mars 2021 à 15:49
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`title`, `id`) VALUES
('une deuxieme catégorie', 9);

-- --------------------------------------------------------

--
-- Structure de la table `messagechat`
--

DROP TABLE IF EXISTS `messagechat`;
CREATE TABLE IF NOT EXISTS `messagechat` (
  `messageId` int NOT NULL AUTO_INCREMENT,
  `messageUser` text NOT NULL,
  `messageContent` text NOT NULL,
  `subid` int NOT NULL,
  KEY `messageId` (`messageId`),
  KEY `subid` (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messagechat`
--

INSERT INTO `messagechat` (`messageId`, `messageUser`, `messageContent`, `subid`) VALUES
(26, 'Dalil', 'wsh il sert à quoi ce sujet?\r\n', 19),
(27, 'Raph', 'A ce que je te mette une bonne note', 19),
(28, 'Dalil', 'ah bah tant mieux alors j\'ai tout géré!!', 19);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectId` int NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(256) NOT NULL,
  `subjectContent` text NOT NULL,
  `catid` int NOT NULL,
  PRIMARY KEY (`subjectId`),
  KEY `categoryId` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`subjectId`, `subjectName`, `subjectContent`, `catid`) VALUES
(19, 'Sujet number one', 'voici un premier sujet consultable et j\'attends vos réponses', 9);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messagechat`
--
ALTER TABLE `messagechat`
  ADD CONSTRAINT `messagechat_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
