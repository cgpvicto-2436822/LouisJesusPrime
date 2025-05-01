-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 29 avr. 2025 à 17:47
-- Version du serveur : 8.0.39
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lanparty_hincelouis`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`nom`, `message`, `email`, `sujet`) VALUES
('louis hince', 'le jesus', 'hincelouis@gmail.com', 'Jesus'),
('Jesus Prime', 'ye genti', 'Lejesus@gmail.com', 'mon papa'),
('Jesus Prime', 'il est genti', 'Lejesus@gmail.com', 'mon papa');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `dateajout` date NOT NULL,
  `jeu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `slogan`, `commentaire`, `dateajout`, `jeu`) VALUES
(1, 'JesusTeam', 'Notre but c\'est le paradis', NULL, '2025-02-27', NULL),
(2, 'Les dudgbags', 'argh', NULL, '2025-02-27', NULL),
(3, 'Les trilobites', 'Vive la mer', NULL, '2025-03-11', NULL),
(4, 'les patates pilées', 'ca goute bon', NULL, '2025-03-11', NULL),
(5, 'Les constipés', 'ca goute bon aussi', NULL, '2025-03-11', NULL),
(12, 'Les brisés', 'On est cassé', 'on est tres fragile puisqu&#039;on est cassé...', '2025-04-17', 'minecraft'),
(13, 'les pissanlits', 'aaaaaaaaaaaaaa', 'miam miam, on a copié les autres', '2025-04-17', 'ballons'),
(14, 'Les destructeurs', 'Nous allons mettre cette planete à feu', 'Nous n&#039;échourons en aucun cas', '2025-04-22', 'Dernier');

-- --------------------------------------------------------

--
-- Structure de la table `equipes_joueurs`
--

CREATE TABLE `equipes_joueurs` (
  `id` int NOT NULL,
  `joueur_id` int NOT NULL,
  `equipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes_joueurs`
--

INSERT INTO `equipes_joueurs` (`id`, `joueur_id`, `equipe_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 8, 4),
(5, 4, 2),
(6, 5, 3),
(7, 6, 4),
(8, 7, 5),
(9, 9, 3),
(10, 10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`nom`, `id`) VALUES
('Dernier en vie', 1),
('ballons chasseurs', 2),
('minecraft', 3);

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int NOT NULL,
  `nomfamille` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courriel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateinscription` datetime DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nomfamille`, `prenom`, `pseudo`, `courriel`, `dateinscription`, `actif`) VALUES
(1, 'Pinsons', 'Gill', 'Pti Gill', 'Leptitgill@gmail.com', '2020-03-19 10:17:31', 1),
(2, 'plumes', 'moineau', 'levoleux', 'Ivol@gmail.com', '2022-03-19 10:17:31', 1),
(3, 'Hince', 'Louis', 'LouisJesusPrime', 'LouisJesusPrime@gmail.com', '2025-03-11 11:17:40', NULL),
(4, 'Cream', 'Babouche', 'Le singe', 'monkey@gmail.com', '2025-03-11 11:17:40', 1),
(5, 'Hince', 'Sam', 'Bucky le trucker', 'TheTruckerKiller@gmail.com', '2025-03-11 11:19:17', 1),
(6, 'Porraws', 'Jock', 'Le priate', 'Jackmoineau@gmail.com', '2025-03-16 11:20:47', 1),
(7, 'Dunkman', 'Mylo', 'Best shooter', 'Dunkman@gmail.com', '2025-03-07 11:21:34', 1),
(8, 'Christ', 'Jesus', 'King', 'LeVraiJesus@gmail.com', '2015-03-21 11:22:13', 1),
(9, 'Morning Star', 'Lucifer', 'Le diable', 'LuciferMorningStar@gmail.com', '2015-03-03 11:23:09', NULL),
(10, 'Potvin', 'Patouf', 'L\'osti de bs', 'Patouflatouf@gmail.com', '2025-03-02 11:23:50', NULL),
(11, 'Grason', 'Mark', 'Invincible', 'invincible@gmail.com', '2025-04-17 00:00:00', NULL),
(12, 'Antiqua', 'Book', 'lebook', 'lebouk@gmail.com', '2025-04-22 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `h1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `accroche` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `texte` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `url`, `titre`, `description`, `h1`, `accroche`, `public`, `texte`, `modification`) VALUES
(1, 'index.php', 'menu du lanparty', 'la page d\'acceuil du lanparty qui contient les cartes d\'équipes', 'Tableau de bord', 'Le Lanparty que ve ne voulez pas manquer!', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem ut dolor malesuada aliquam. Fusce at blandit nulla, at luctus nunc. Etiam suscipit laoreet felis, at mattis metus tincidunt a. Aenean ac rutrum justo. Cras lacinia, nisi id gravida blandit, nunc ipsum congue risus, et euismod tellus urna ac metus.\r\n', '2025-03-18 17:33:45'),
(2, 'détails-équipes.php', 'les détails d\'équipe du lanparty', 'tous les détails sur l\'équipe choisit', 'Les détails sur l\'équipe', 'Les meilleurs équipes!', 1, '', '2025-03-18 17:33:45'),
(3, 'a-venir.php', 'Cette page du lanparty est à venir', 'cette page ne possède pas de contenue pour l\'instant', 'Page à venir', 'Revenez bientot!', 1, '', '2025-03-18 17:42:57'),
(4, 'a-propos.php', 'À propos du lanparty', 'des informations sur le lanparty', 'À Propos', 'Vous ne voulez pas le manquer!', 1, 'Le jesus est le boss, le dude y creve pas enfeite. Moi je suis louis jesus Prime et je vais faire mon possible pour que LE jesus soit fier!', '2025-03-18 17:42:57'),
(5, 'resultats.php', 'Les résultats lanparty', 'Les résulats de chaques équipes du lanparty', 'Résultats', '', 1, '', '2025-03-20 19:26:38'),
(6, 'formulaire-contact.php', 'Nous contacter', 'Envoyez nous un message!', 'Formulaire', '', 1, 'Remplissez le formulaire ci-dessous', '2025-04-01 17:47:55'),
(7, 'traiter-contact.php', 'Traitement du formulaire', 'Le formulaire a été traiter', 'Traitement Accepté', '', 1, 'Merci de donner votre avis.', '2025-04-10 19:17:38'),
(8, 'joueurs.php', 'Les joueurs', 'les joueurs du lanparty', 'Liste des joueurs', 'tous les joueurs au meme endroit!', 1, '', '2025-04-15 17:26:35'),
(9, 'formulaire-joueur.php', 'Ajouter un joueur', 'vous allez ajouter un joueur dans le lanparty!', 'Ajouter un joueur', 'veillez remplir le formulaire', 1, '', '2025-04-15 17:54:13'),
(10, 'traiter-joueur.php', 'Traitement du formulaire de joueur', 'traite l\'ajout d\'un joueur', 'Traitement', 'en cours..', 1, '', '2025-04-17 19:00:52'),
(11, 'formulaire-equipe.php', 'Ajouter une equipe!', 'ajouter une nouvelle equipe au lanparty', 'Remplissez le formulaire ci-dessous', '', 1, '', '2025-04-17 19:52:44'),
(12, 'formulaire-resultat.php', 'Ajouter un resultat', 'remplissez le formulaire ci-dessous pour ajouter un resultat', 'Formulaire d\'ajout d\'un resultat', '', 1, '', '2025-04-22 17:19:03'),
(13, 'ajouter-resultat.php', 'ajoute le resultat', 'effectue l\'envoi et l\'ajout du resultat', 'ajouter le resultat', '', 1, '', '2025-04-22 18:03:46');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE `resultats` (
  `id` int NOT NULL,
  `equipe_id` int NOT NULL,
  `rang` int NOT NULL,
  `score_final` int NOT NULL,
  `date_partie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`id`, `equipe_id`, `rang`, `score_final`, `date_partie`) VALUES
(1, 1, 1, 7, '2015-07-20 19:18:15'),
(2, 2, 2, 6, '2011-03-20 19:18:15'),
(3, 3, 3, 6, '2017-03-20 19:18:15'),
(4, 4, 4, 5, '2025-03-20 19:18:15'),
(5, 5, 5, 2, '2001-03-20 19:18:15'),
(6, 14, 1, 100, '2025-05-10 00:00:00'),
(7, 14, 1, 100, '2025-04-29 00:00:00'),
(8, 1, 2, 50, '2025-04-11 00:00:00'),
(9, 3, 10, 1, '2025-04-29 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `equipe_id` (`equipe_id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Index pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipe_resultat` (`equipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `resultats`
--
ALTER TABLE `resultats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipes_joueurs`
--
ALTER TABLE `equipes_joueurs`
  ADD CONSTRAINT `equipes_joueurs_ibfk_1` FOREIGN KEY (`joueur_id`) REFERENCES `joueurs` (`id`),
  ADD CONSTRAINT `equipes_joueurs_ibfk_2` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);

--
-- Contraintes pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD CONSTRAINT `fk_equipe_resultat` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
