-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 juin 2023 à 03:52
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
-- Base de données : `pwa_projet1_gp`
--
CREATE DATABASE IF NOT EXISTS `pwa_projet1_gp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pwa_projet1_gp`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Entrées'),
(2, 'Plats'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `infolettre`
--

CREATE TABLE `infolettre` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `courriel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `infolettre`
--

INSERT INTO `infolettre` (`id`, `nom`, `courriel`) VALUES
(1, 'qwerty', 'qwerty@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `description`, `prix`, `image`, `categorie_id`) VALUES
(4, 'Salade du jour', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', '10.99', NULL, 1),
(6, 'Brownie', 'Vestibulum vel ex dolor. Maecenas et turpis nibh. Aliquam in imperdiet tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. ', '7.99', NULL, 3),
(7, 'Potage du moment', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', '8.99', NULL, 1),
(8, 'Ailes de lapin', 'Ut interdum viverra lacinia. Pellentesque ac nunc a nulla rutrum dictum ac ac diam. Cras vel justo ligula.  Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper.', '16.49', NULL, 1),
(9, 'Calamar', 'Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '16.99', NULL, 1),
(10, 'Nachos', 'Nunc et ipsum ut nisl ultricies fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', '18.99', NULL, 1),
(11, 'Poutine', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', '14.99', NULL, 1),
(12, 'Burger double classique avec frites', 'Deux galettes de bœuf, cheddar, bacon, tomate, laitue romaine, ognon rouge, sauce maison, servi avec frites', '15.99', NULL, 2),
(13, 'Filets de poulet avec frites', 'Filets de poulet pané avec un mélange d’épices maison, servis avec frites', '13.99', NULL, 2),
(14, 'Burger au poulet', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi.', '15.99', NULL, 2),
(15, 'Salade grecque', 'Donec at nisi tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. In vitae rutrum arcu. ', '18.99', NULL, 2),
(16, 'Salade végétarienne', 'Donec et neque quis purus cursus mattis eu pulvinar velit. Praesent commodo rutrum nisl, at ultrices sem iaculis tincidunt. Nunc molestie accumsan porta. ', '14.99', NULL, 2),
(17, 'Tartare de bœuf', 'Proin faucibus quam lorem, non condimentum turpis blandit non. ', '24.99', NULL, 2),
(18, 'Tartare de légume', 'Etiam ut tincidunt lectus. Curabitur gravida est in finibus ultricies. Vestibulum volutpat erat vel libero ultrices placerat. ', '22.99', NULL, 2),
(19, 'Côtes levées (Ribs)', 'Etiam dictum purus justo, at mattis justo bibendum in. In aliquam elementum enim, quis pretium purus efficitur ac. Curabitur in pretium leo.', '19.99', NULL, 2),
(20, 'Un bon p’tit steak', 'Praesent aliquam a dolor eu rutrum. Sed at efficitur enim. Morbi quis placerat risus. Aenean ipsum massa, hendrerit eu molestie sit amet, mollis quis ante.  ', '14.99', NULL, 2),
(22, 'Cupcake style ferrero', 'Suspendisse id fringilla turpis. Aenean eleifend vulputate lacus, a pharetra metus. Sed eget pharetra sem. Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.', '8.99', NULL, 3),
(23, 'Gâteau au fromage et caramel', 'Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.  ', '10.99', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `courriel`, `mot_de_passe`) VALUES
(5, 'Gaston', 'gastonleclient@pubg4.com', '$2y$10$hS486JGY0MRicnhuYsqb5OkB2Rsy/fBuZsKBjtYo04wDItByvK/w.'),
(6, 'dan', 'dan@gmail.com', '$2y$10$ZD45XCd8eSZHodcjqQn8t.jTd2HubSY2fqgQoiHqh9c.q6idOeTm.'),
(7, 'geoff', 'geoff@gmail.com', '$2y$10$eZ03eZSZplU0g0/LB.G2N./lHarYPqF0176m7iiiXJHL/ffwEw4.e');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infolettre`
--
ALTER TABLE `infolettre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `infolettre`
--
ALTER TABLE `infolettre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
