-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 juil. 2023 à 21:04
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mglsi_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateCreation` datetime DEFAULT current_timestamp(),
  `dateModification` datetime DEFAULT current_timestamp(),
  `categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `dateCreation`, `dateModification`, `categorie`) VALUES
(1, 'Première victoire du Sénégal ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-05-22 11:39:40', '2023-05-22 11:39:40', 1),
(2, 'Election en Mauritanie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-05-22 11:39:40', '2023-05-22 11:39:40', 4),
(3, 'Début de la CAN', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-05-22 11:39:40', '2023-05-22 11:39:40', 1),
(4, 'Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-05-22 11:39:40', '2023-05-22 11:39:40', 4),
(5, 'Inauguration d\'un ENO à l\'UVS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-05-22 11:39:40', '2023-05-22 11:39:40', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Sport'),
(2, 'Santé'),
(3, 'Education'),
(4, 'Politique');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libelle`, `dateAjout`, `etat`) VALUES
(1, 'Administrateur', '2023-06-20 23:52:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `prenom` text DEFAULT NULL,
  `nom` text DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `telephone` varchar(80) DEFAULT NULL,
  `idRole` int(11) DEFAULT NULL,
  `login` varchar(80) DEFAULT NULL,
  `motDePasse` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `prenom`, `nom`, `email`, `adresse`, `telephone`, `idRole`, `login`, `motDePasse`, `dateAjout`, `etat`) VALUES
(1, 'Serigne Saliou', 'Dione', 'serignesalioudione@esp.sn', 'yoff apecsy 1 n232', '07 74 98 02 54', 1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-09-07 00:59:43', 1),
(2, 'Moustapha', 'Mbaye', 'moustaphambaye03@esp.sn', 'Medina', '786435984', 1, 'mbaye', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-07-09 18:47:01', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `varticle`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `varticle` (
`id` int(11)
,`titre` varchar(255)
,`contenu` text
,`dateCreation` datetime
,`dateModification` datetime
,`categorie` int(11)
,`nomCategorie` varchar(20)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vutilisateur`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vutilisateur` (
`idUtilisateur` int(11)
,`prenom` text
,`nom` text
,`email` varchar(300)
,`adresse` text
,`telephone` varchar(80)
,`idRole` int(11)
,`login` varchar(80)
,`motDePasse` text
,`dateAjout` timestamp
,`etat` int(11)
,`role` text
);

-- --------------------------------------------------------

--
-- Structure de la vue `varticle`
--
DROP TABLE IF EXISTS `varticle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `varticle`  AS SELECT `a`.`id` AS `id`, `a`.`titre` AS `titre`, `a`.`contenu` AS `contenu`, `a`.`dateCreation` AS `dateCreation`, `a`.`dateModification` AS `dateModification`, `a`.`categorie` AS `categorie`, `c`.`libelle` AS `nomCategorie` FROM (`article` `a` join `categorie` `c`) WHERE `a`.`categorie` = `c`.`id``id`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vutilisateur`
--
DROP TABLE IF EXISTS `vutilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vutilisateur`  AS SELECT `u`.`idUtilisateur` AS `idUtilisateur`, `u`.`prenom` AS `prenom`, `u`.`nom` AS `nom`, `u`.`email` AS `email`, `u`.`adresse` AS `adresse`, `u`.`telephone` AS `telephone`, `u`.`idRole` AS `idRole`, `u`.`login` AS `login`, `u`.`motDePasse` AS `motDePasse`, `u`.`dateAjout` AS `dateAjout`, `u`.`etat` AS `etat`, `r`.`libelle` AS `role` FROM (`utilisateur` `u` join `role` `r`) WHERE `u`.`idRole` = `r`.`idRole``idRole`  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_article` (`categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_categorie_article` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
