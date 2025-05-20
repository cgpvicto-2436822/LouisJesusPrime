
-- Base de données : `lanparty_hincelouis` (adaptée pour PostgreSQL)
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE contacts (
    nom VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    sujet VARCHAR(255) NOT NULL
);

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO contacts (nom, message, email, sujet) VALUES
('louis hince', 'le jesus', 'hincelouis@gmail.com', 'Jesus'),
('Jesus Prime', 'ye genti', 'Lejesus@gmail.com', 'mon papa'),
('Jesus Prime', 'il est genti', 'Lejesus@gmail.com', 'mon papa');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE equipes (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL,
    slogan VARCHAR(100),
    commentaire TEXT,
    dateajout DATE NOT NULL,
    jeu VARCHAR(255)
);

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO equipes (nom, slogan, commentaire, dateajout, jeu) VALUES
('JesusTeam', 'Notre but c est le paradis', NULL, '2025-02-27', NULL),
('Les dudgbags', 'argh', NULL, '2025-02-27', NULL),
('Les trilobites', 'Vive la mer', NULL, '2025-03-11', NULL),
('les patates pilées', 'ca goute bon', NULL, '2025-03-11', NULL),
('Les constipés', 'ca goute bon aussi', NULL, '2025-03-11', NULL),
('Les brisés', 'On est cassé', 'on est tres fragile puisqu on est cassé...', '2025-04-17', 'minecraft'),
('les pissanlits', 'aaaaaaaaaaaaaa', 'miam miam, on a copié les autres', '2025-04-17', 'ballons'),
('Les destructeurs', 'Nous allons mettre cette planete à feu', 'Nous n échourons en aucun cas', '2025-04-22', 'Dernier');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE joueurs (
    id SERIAL PRIMARY KEY,
    nomfamille VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    courriel VARCHAR(100) UNIQUE NOT NULL,
    dateinscription TIMESTAMP,
    actif BOOLEAN
);


INSERT INTO joueurs (nomfamille, prenom, pseudo, courriel, dateinscription, actif) VALUES
('Pinsons', 'Gill', 'Pti Gill', 'Leptitgill@gmail.com', '2020-03-19 10:17:31', TRUE),
('plumes', 'moineau', 'levoleux', 'Ivol@gmail.com', '2022-03-19 10:17:31', TRUE),
('Hince', 'Louis', 'LouisJesusPrime', 'LouisJesusPrime@gmail.com', '2025-03-11 11:17:40', NULL),
('Cream', 'Babouche', 'Le singe', 'monkey@gmail.com', '2025-03-11 11:17:40', TRUE),
('Hince', 'Sam', 'Bucky le trucker', 'TheTruckerKiller@gmail.com', '2025-03-11 11:19:17', TRUE),
('Porraws', 'Jock', 'Le priate', 'Jackmoineau@gmail.com', '2025-03-16 11:20:47', TRUE),
('Dunkman', 'Mylo', 'Best shooter', 'Dunkman@gmail.com', '2025-03-07 11:21:34', TRUE),
('Christ', 'Jesus', 'King', 'LeVraiJesus@gmail.com', '2015-03-21 11:22:13', TRUE),
('Morning Star', 'Lucifer', 'Le diable', 'LuciferMorningStar@gmail.com', '2015-03-03 11:23:09', NULL),
('Potvin', 'Patouf', 'L osti de bs', 'Patouflatouf@gmail.com', '2025-03-02 11:23:50', NULL),
('Grason', 'Mark', 'Invincible', 'invincible@gmail.com', '2025-04-17 00:00:00', NULL),
('Antiqua', 'Book', 'lebook', 'lebouk@gmail.com', '2025-04-22 00:00:00', NULL);


--
-- Structure de la table `equipes_joueurs`
--

CREATE TABLE equipes_joueurs (
    id SERIAL PRIMARY KEY,
    joueur_id INTEGER NOT NULL,
    equipe_id INTEGER NOT NULL,
    FOREIGN KEY (joueur_id) REFERENCES joueurs(id),
    FOREIGN KEY (equipe_id) REFERENCES equipes(id)
);

--
-- Déchargement des données de la table `equipes_joueurs`
--

INSERT INTO equipes_joueurs (joueur_id, equipe_id) VALUES
(1, 1),
(2, 2),
(3, 1),
(8, 4),
(4, 2),
(5, 3),
(6, 4),
(7, 5),
(9, 3),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE jeux (
    nom VARCHAR(255) NOT NULL,
    id SERIAL PRIMARY KEY
);

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO jeux (nom, id) VALUES
('Dernier en vie', 1),
('ballons chasseurs', 2),
('minecraft', 3);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `joueurs`
--
-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE pages (
    id SERIAL PRIMARY KEY,
    url VARCHAR(255) UNIQUE NOT NULL,
    titre VARCHAR(60) NOT NULL,
    description VARCHAR(150) NOT NULL,
    h1 VARCHAR(100) NOT NULL,
    accroche VARCHAR(255) NOT NULL,
    public BOOLEAN NOT NULL,
    texte TEXT NOT NULL,
    modification TIMESTAMP NOT NULL
);

--
-- Déchargement des données de la table `pages`
--

INSERT INTO pages (url, titre, description, h1, accroche, public, texte, modification) VALUES
('index.php', 'menu du lanparty', 'la page d accueil du lanparty qui contient les cartes d équipes', 'Tableau de bord', 'Le Lanparty que ve ne voulez pas manquer!', TRUE, '', '2025-03-18 17:33:45'),
('détails-équipes.php', 'les détails d équipe du lanparty', 'tous les détails sur l équipe choisit', 'Les détails sur l équipe', 'Les meilleurs équipes!', TRUE, '', '2025-03-18 17:33:45'),
('a-venir.php', 'Cette page du lanparty est à venir', 'cette page ne possède pas de contenue pour l instant', 'Page à venir', 'Revenez bientot!', TRUE, '', '2025-03-18 17:42:57'),
('a-propos.php', 'À propos du lanparty', 'des informations sur le lanparty', 'À Propos', 'Vous ne voulez pas le manquer!', TRUE, 'Le jesus est le boss, le dude y creve pas enfeite. Moi je suis louis jesus Prime et je vais faire mon possible pour que LE jesus soit fier!', '2025-03-18 17:42:57'),
('resultats.php', 'Les résultats lanparty', 'Les résulats de chaques équipes du lanparty', 'Résultats', '', TRUE, '', '2025-03-20 19:26:38'),
('formulaire-contact.php', 'Nous contacter', 'Envoyez nous un message!', 'Formulaire', '', TRUE, 'Remplissez le formulaire ci-dessous', '2025-04-01 17:47:55'),
('traiter-contact.php', 'Traitement du formulaire', 'Le formulaire a été traiter', 'Traitement Accepté', '', TRUE, 'Merci de donner votre avis.', '2025-04-10 19:17:38'),
('joueurs.php', 'Les joueurs', 'les joueurs du lanparty', 'Liste des joueurs', 'tous les joueurs au meme endroit!', TRUE, '', '2025-04-15 17:26:35'),
('formulaire-joueur.php', 'Ajouter un joueur', 'vous allez ajouter un joueur dans le lanparty!', 'Ajouter un joueur', 'veillez remplir le formulaire', TRUE, '', '2025-04-15 17:54:13'),
('traiter-joueur.php', 'Traitement du formulaire de joueur', 'traite l ajout d un joueur', 'Traitement', 'en cours..', TRUE, '', '2025-04-17 19:00:52'),
('formulaire-equipe.php', 'Ajouter une equipe!', 'ajouter une nouvelle equipe au lanparty', 'Remplissez le formulaire ci-dessous', '', TRUE, '', '2025-04-17 19:52:44'),
('formulaire-resultat.php', 'Ajouter un resultat', 'remplissez le formulaire ci-dessous pour ajouter un resultat', 'Formulaire d ajout d un resultat', '', TRUE, '', '2025-04-22 17:19:03'),
('ajouter-resultat.php', 'ajoute le resultat', 'effectue l envoi et l ajout du resultat', 'ajouter le resultat', '', TRUE, '', '2025-04-22 18:03:46');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE resultats (
    id SERIAL PRIMARY KEY,
    equipe_id INTEGER NOT NULL,
    rang INTEGER NOT NULL,
    score_final INTEGER NOT NULL,
    date_partie TIMESTAMP NOT NULL,
    FOREIGN KEY (equipe_id) REFERENCES equipes(id)
);

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO resultats (equipe_id, rang, score_final, date_partie) VALUES
(1, 1, 7, '2015-07-20 19:18:15'),
(2, 2, 6, '2011-03-20 19:18:15'),
(3, 3, 6, '2017-03-20 19:18:15'),
(4, 4, 5, '2025-03-20 19:18:15'),
(5, 5, 2, '2001-03-20 19:18:15'),
(7, 1, 100, '2025-05-10 00:00:00'),
(8, 1, 100, '2025-04-29 00:00:00'),
(1, 2, 50, '2025-04-11 00:00:00'),
(3, 10, 1, '2025-04-29 00:00:00');