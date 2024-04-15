-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 avr. 2024 à 13:54
-- Version du serveur : 8.0.36
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpdatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_m` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id_m`, `email`, `message`, `date`) VALUES
(1, 'mohamedahmim@icloud.com', 'Bonjour tout le Monde je viens de decouvrir', '2024-03-28 22:49:05'),
(2, 'taissir@outlook.fr', 'Desole je suis riche', '2024-03-28 23:36:43'),
(3, 'taissir@outlook.fr', 'Hello Il Ya Quelqun ?', '2024-03-29 23:51:04'),
(4, 'mohamedahmim@icloud.com', 'oUI JE suis la je peux t\'aider ?', '2024-03-29 23:51:35'),
(5, 'taissir@outlook.fr', 'OUI STP sur le projet de sr j\'ai absenté', '2024-03-29 23:51:59'),
(6, 'taissir@outlook.fr', 'okay okay', '2024-03-29 23:52:19'),
(7, 'mohamedahmim@icloud.com', 'ok tu tes arrete ou ?', '2024-03-30 00:01:27'),
(8, 'youcef@ah.fr', 'Salut tout le monde', '2024-03-30 16:07:42'),
(9, 'alexis@etu.ubourgogne.fr', 'Bonjour je suis nouveau', '2024-03-31 01:00:18'),
(10, 'teinturier@outlook.fr', 'ok', '2024-04-03 21:34:30');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `titre`, `description`, `chemin`, `url`) VALUES
(10, 'Porgrammation', 'Vue ,React JS', '../../uploads/cours-introduction-v01.pdf', 'entbourgogne'),
(14, 'Reseaux', 'introduction au reseaux', '../../uploads/CMs-Reseaux.pdf', 'reseaux.fr'),
(16, 'Intelligence Artificielle', 'Python', '../../uploads/cours_ia.pdf', 'python.org'),
(17, 'BlockChain', 'Une Courte Introduction A La BlockChain ', '../../uploads/blockchain.pdf', 'blockchain.fr');

-- --------------------------------------------------------

--
-- Structure de la table `cours_prof`
--

DROP TABLE IF EXISTS `cours_prof`;
CREATE TABLE IF NOT EXISTS `cours_prof` (
  `id_cours` int NOT NULL,
  `id_prof` int NOT NULL,
  KEY `id_cours` (`id_cours`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours_prof`
--

INSERT INTO `cours_prof` (`id_cours`, `id_prof`) VALUES
(10, 2),
(14, 13),
(16, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_prof`
--

DROP TABLE IF EXISTS `etudiant_prof`;
CREATE TABLE IF NOT EXISTS `etudiant_prof` (
  `id_etudiant` int NOT NULL,
  `id_prof` int NOT NULL,
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_prof` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant_prof`
--

INSERT INTO `etudiant_prof` (`id_etudiant`, `id_prof`) VALUES
(11, 13),
(16, 13),
(19, 2),
(12, 2),
(12, 13),
(20, 2),
(20, 13),
(9, 13),
(21, 2),
(21, 13),
(22, 2);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelleQ` varchar(255) NOT NULL,
  `niveau` int NOT NULL,
  `id_cours` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_module` (`id_cours`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `libelleQ`, `niveau`, `id_cours`) VALUES
(1, 'Qu\'est ce Qu\'une Variable Locale', 0, 10),
(2, 'Que Veut Dire la POO ?', 0, 10),
(3, 'Qu\'est Ce Que TensorFlow ?', 0, 16);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int NOT NULL AUTO_INCREMENT,
  `id_question` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `verite` int NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `id_question`, `libelle`, `verite`) VALUES
(1, 1, 'Une variable qui est disponible uniquement dans le contexte d\'une fonction. ', 1),
(2, 1, 'Une Variable disponible dans tout le programme ', 0),
(3, 2, 'Programmation Orientée Objet', 1),
(4, 2, 'Print On Orientation', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(2, 'yahya.farehan@gmail.com', 'Yahya21', 'admin'),
(9, 'mohamedahmim@icloud.com', '78130', 'etudiant'),
(11, 'taissir@outlook.fr', '161103', 'etudiant'),
(12, 'youcef@ah.fr', '2208', 'etudiant'),
(13, 'ericlercq@etu.ubourgogne.fr', 'reseaux', 'admin'),
(16, 'jules.qaeze@u-bourgogne.fr', 'Jules', 'etudiant'),
(19, 'teinturier@outlook.fr', 'tt', 'etudiant'),
(20, 'alexis@etu.ubourgogne.fr', 'Alexis', 'etudiant'),
(21, 'kylian@kotlin.fr', 'kylian', 'etudiant'),
(22, 'taissir@ahmim.com', 'TaissirDu78', 'etudiant');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours_prof`
--
ALTER TABLE `cours_prof`
  ADD CONSTRAINT `cours_prof_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cours_prof_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `etudiant_prof`
--
ALTER TABLE `etudiant_prof`
  ADD CONSTRAINT `etudiant_prof_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `etudiant_prof_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
