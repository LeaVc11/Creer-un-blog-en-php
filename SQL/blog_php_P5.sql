-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 sep. 2022 à 11:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `image_link` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `chapo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `image_link`, `content`, `title`, `slug`, `created_at`, `author`, `updated_at`, `chapo`) VALUES
(54, '631da20de42ca.jpeg', 'Je vous présente mon cv qui est ligne , que j\'ai construit en html, css, et media queries. Pour voir mon cv , aller sur l\'onglet Mon site', 'Mon cv', 'cv en ligne', '2022-09-15 00:00:00', 'Carine', '2022-09-15 00:00:00', 'CV Carine VINAGRE'),
(55, '631da2d15d9fe.jpeg', 'Mon projet WordPress.\r\nVous venez de vous lancer en tant que développeur freelance et vous avez décroché votre premier contrat.\r\n\r\nVotre client ? L’agence immobilière “Chalets et caviar” de Courchevel. ', 'Intégrez un thème Wordpress pour un client', 'Projet WordPress', '2022-09-11 00:00:00', 'Carine', '2022-09-11 00:00:00', 'Projet 2'),
(58, '631dabb4d757c.jpeg', ' Ça y est, vous avez sauté le pas ! Le monde du développement web avec PHP est à portée de main et vous avez besoin de visibilité pour pouvoir convaincre vos futurs employeurs/clients en un seul regard. Vous êtes développeur PHP, il est donc temps de montrer vos talents au travers d’un blog à vos couleurs.', 'Créez votre premier blog en PHP', 'Créer mon blog', '2022-09-11 00:00:00', 'Carine', '2022-09-11 00:00:00', 'Créez votre premier blog en PHP');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `article_id` int(11) NOT NULL,
  `status` enum('PENDING','APPROVED','REJECTED') CHARACTER SET utf8 NOT NULL DEFAULT 'PENDING',
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `title`, `created_at`, `article_id`, `status`, `created_by`) VALUES
(120, '\'-\'(-\'  eazeza ', '-(\'--', '2022-09-16 14:25:02', 54, 'APPROVED', 59),
(121, 'zaezaeazea ', 'zaezaeza', '2022-09-16 14:44:45', 54, 'APPROVED', 64),
(122, 'essai test7 ', 'essai test7', '2022-09-16 14:48:50', 54, 'APPROVED', 65);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `username`, `message`) VALUES
(28, 'test2@test.fr', 'test2', 'test2'),
(33, 'test6@test.fr', 'admin', 'test6');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role`, `username`) VALUES
(59, '$2y$10$dRa9zaUOInP7Yo5MYlOmw.XZeGvqZ8u4V2Llgb4nIY6dZHJD9jxGK', 'vinagre.carine@gmail.com', 'admin', 'Carine'),
(64, '$2y$10$MXI7OoGzOcMhWg87MPWMS.rvyteDAvHhXGDFsDVNq/AliAo.Uxxay', 'john.doe@gmail.com', 'user', 'john'),
(65, '$2y$10$NsrCoVZSnMmsYhX/mtiLoeZzVb/k8fRFlgl8IuFN0q0Rr0V1yYVYe', 'test7@test.fr', 'user', 'test7');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`article_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
