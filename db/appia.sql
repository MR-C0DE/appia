-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 19 fév. 2022 à 05:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appia`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix_usage` float NOT NULL,
  `prix_numerique` float NOT NULL,
  `prix_neuf` float NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `nom`, `description`, `prix_usage`, `prix_numerique`, `prix_neuf`, `date_publication`) VALUES
(1, 'La sainte Bible', 'Par louis segond 1910', 2.55, 0.2, 85.99, '2022-02-02'),
(2, 'Le nouveau testament', 'La vie de Jésus ', 5.99, 0.35, 45.99, '2022-02-02'),
(3, 'La Bible Nouvelle edition', 'Genève 1979', 6.12, 0.12, 27.99, '2022-02-02'),
(4, 'Evangile selon Saint Matthieu', 'Traduction Francaise 1855', 1.53, 0.53, 99.99, '2022-02-02'),
(5, 'Bible Catholique Crampon', 'Traduction Augustin Crampon', 2.32, 1.3, 35.99, '2022-02-02'),
(6, 'La Bible Darby', 'FRDBY (Traduction francaise)', 4.55, 0.45, 78.99, '2022-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `article_vendu`
--

CREATE TABLE `article_vendu` (
  `vendu_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `quantite_article` int(11) NOT NULL,
  `prix_unitaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article_vendu`
--

INSERT INTO `article_vendu` (`vendu_id`, `commande_id`, `article_id`, `categorie_id`, `quantite_article`, `prix_unitaire`) VALUES
(1, 1, 3, 3, 4, 27.99),
(2, 1, 6, 1, 3, 4.55),
(3, 2, 1, 3, 1, 85.99),
(4, 2, 2, 1, 5, 5.99),
(5, 2, 4, 1, 5, 1.53),
(6, 2, 4, 2, 3, 0.53),
(7, 2, 4, 3, 5, 99.99),
(8, 2, 3, 1, 4, 6.12),
(9, 2, 3, 3, 17, 27.99),
(10, 3, 1, 2, 1, 0.2),
(11, 3, 2, 3, 3, 45.99),
(12, 3, 2, 1, 7, 5.99),
(13, 4, 3, 1, 1, 6.12),
(14, 4, 3, 2, 1, 0.12),
(15, 5, 3, 1, 17, 6.12),
(16, 6, 6, 1, 27, 4.55),
(17, 7, 3, 1, 1, 6.12),
(18, 7, 4, 2, 1, 0.53),
(19, 10, 3, 2, 4, 0.12),
(20, 10, 3, 1, 5, 6.12),
(21, 10, 3, 3, 3, 27.99),
(22, 10, 4, 1, 3, 1.53),
(23, 10, 4, 2, 2, 0.53),
(24, 11, 3, 1, 5, 6.12),
(25, 11, 4, 1, 55, 1.53),
(26, 12, 4, 1, 4, 1.53),
(27, 12, 3, 3, 3, 27.99);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `categorie_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `type`) VALUES
(1, 'Usagé'),
(2, 'Numérique'),
(3, 'Neuf');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `commande_id`, `prenom`, `nom`, `telephone`, `email`) VALUES
(1, 1, 'Ruth', 'Mukendi', '8199307936', 'mulajaandre@gmail.com'),
(2, 2, 'Mulaja', 'André', '8199307936', 'mulajaandre@gmail.com'),
(3, 3, 'Alexis', 'Pululu', '81785588484', 'alexispululu@gmail.com'),
(4, 4, 'Mulaja', 'André', '8199307936', 'mulajaandre@gmail.com'),
(5, 5, 'Mulaja', 'André', '8199307936', 'mulajaandre@gmail.com'),
(6, 6, 'Lavoix', 'Marco', '8199307936', 'marcolavoix@gmail.com'),
(7, 7, 'Mu', 'André', '8199307936', 'mulajaandre@gmail.com'),
(8, 8, 'Mu', 'André', '8199307936', 'mulajaandre@gmail.com'),
(9, 9, 'Mulaja', 'André', '8199307936', 'mulajaandre@gmail.com'),
(10, 10, 'Bois', 'Paul', '8451263978', 'bois@gmail.com'),
(11, 11, 'Bois', 'Paul', '8451263978', 'bois@gmail.com'),
(12, 12, 'marcel', 'luc', '899678965', 'lucm@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commande_id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `commande_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`commande_id`, `membre_id`, `commande_date`) VALUES
(1, 1, '2022-02-10'),
(2, 1, '2022-02-10'),
(3, 3, '2022-02-10'),
(4, 1, '2022-02-12'),
(5, 1, '2022-02-12'),
(6, 2, '2022-02-18'),
(7, 1, '2022-02-18'),
(8, 1, '2022-02-18'),
(9, 1, '2022-02-18'),
(10, 4, '2022-02-18'),
(11, 4, '2022-02-18'),
(12, 5, '2022-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`destination_id`, `client_id`, `adresse`, `ville`, `code_postal`) VALUES
(1, 1, '67 blvd de l\'Amérique-Française', 'K1V 2N2', 'Ottawa'),
(2, 2, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(3, 3, '47 hull ', 'J9J 7C5', 'Gatineau'),
(4, 4, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(5, 5, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(6, 6, '410 cooks mill crescent', 'K1V 2N2', 'Ottawa'),
(7, 7, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(8, 8, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(9, 9, '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau'),
(10, 10, '15 rue de la france', 'K4P 3T3', 'Londre'),
(11, 11, '15 rue de la france', 'K4P 3T3', 'Londre'),
(12, 12, 'oooooooooooo', 'LLLLLL', 'xxxxxxxxx');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `membre_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(15) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_enregistrement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`membre_id`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `telephone`, `date_naissance`, `email`, `mot_de_passe`, `date_enregistrement`) VALUES
(1, 'André', 'Mulaja', '67 blvd de l\'amérique-française', 'J9J 4B6', 'Gatineau', '8199307936', '1985-01-25', 'mulajaandre@gmail.com', 'kx/Upcmao6XkuozHr3bRKA==', '2022-02-02'),
(2, 'Marco', 'Lavoix', '410 cooks mill crescent', 'K1V 2N2', 'Ottawa', '8199307936', '1955-01-01', 'marcolavoix@gmail.com', 'KiDNOCytOU4BEhgHKBzEYA==', '2022-02-05'),
(3, 'Pululu', 'Alexis', '47 hull ', 'J9J 7C5', 'Gatineau', '81785588484', '1994-01-23', 'alexispululu@gmail.com', 'MdQlrGG6R026okGNBtUC+Q==', '2022-02-10'),
(4, 'Paul', 'Bois', '15 rue de la france', 'K4P 3T3', 'Londre', '8451263978', '1980-01-24', 'bois@gmail.com', 'cVGzuRLbt/Z87QP+hQxs5g==', '2022-02-18'),
(5, 'luc', 'marcel', 'oooooooooooo', 'LLLLLL', 'xxxxxxxxx', '899678965', '1999-01-22', 'lucm@gmail.com', 'Ds58WLaBXVjLF/Uz/CObDQ==', '2022-02-18');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `courriel` varchar(50) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `taille` float DEFAULT NULL,
  `actif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `courriel`, `date_de_naissance`, `ville`, `taille`, `actif`) VALUES
(1, 'Beaupré', 'Charle', 'charles_beaupre@lacite.on.ca', '2001-02-05', 'Otawa', 1.8, 1),
(2, 'Elliot', 'Marie', 'marielliot@gmail.com', '2000-11-23', 'Gatineau', 1.8, 1),
(3, 'Marchand', 'Guy', 'guy.marchand@yahoo.com', '2002-10-10', 'Otawa', 1.77, 1),
(4, 'Use', 'Gabriel', 'lise.gabriel@lacite.on.ca', '2003-05-06', 'Otawa', 1.82, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `article_vendu`
--
ALTER TABLE `article_vendu`
  ADD PRIMARY KEY (`vendu_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`);

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membre_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `article_vendu`
--
ALTER TABLE `article_vendu`
  MODIFY `vendu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
