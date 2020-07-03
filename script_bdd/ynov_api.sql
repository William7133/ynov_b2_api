-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juil. 2020 à 15:13
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ynov_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `donator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`id`, `project_id`, `donator_name`, `amount`, `comment`, `payment_date`) VALUES
(13, 73, 'William', 200, 'Payment numéro : 1', '2020-07-02 19:56:31'),
(14, 74, 'William', 300, 'Payment numéro : 2', '2020-07-02 19:56:31'),
(15, 73, 'William', 400, 'Payment numéro : 3', '2020-07-02 19:56:31'),
(16, 71, 'William', 500, 'Payment numéro : 4', '2020-07-02 19:56:31');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `name`, `start_date`, `end_date`, `picture`, `description`, `goal`, `created`) VALUES
(71, 'Project 1', '2022-07-02 19:56:31', '2022-07-02 19:56:31', 'https://picsum.photos/200/300', 'c\'est le projet numéro : 1', 1000, '2022-07-02 19:56:31'),
(72, 'Project 2', '2022-07-02 19:56:31', '2022-07-02 19:56:31', 'https://picsum.photos/200/300', 'c\'est le projet numéro : 2', 2000, '2022-07-02 19:56:31'),
(73, 'Project 3', '2022-07-02 19:56:31', '2022-07-02 19:56:31', 'https://picsum.photos/200/300', 'c\'est le projet numéro : 3', 3000, '2022-07-02 19:56:31'),
(74, 'Project 4', '2022-07-02 19:56:31', '2022-07-02 19:56:31', 'https://picsum.photos/200/300', 'c\'est le projet numéro : 4', 4000, '2022-07-02 19:56:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6D28840D166D1F9C` (`project_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_6D28840D166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
