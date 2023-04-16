-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 16 avr. 2023 à 12:11
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `axe_cdi`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `tweet_id` int NOT NULL,
  `tweet_pseudo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_contenuTweet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tweet_tag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`tweet_id`, `tweet_pseudo`, `tweet_contenuTweet`, `tweet_date`, `tweet_tag`, `tweet_file`) VALUES
(79, '', 'tweet tag code', '2023-04-13 13:57:30', 'Code', ''),
(80, '', 'encore un tweet avec tag code', '2023-04-13 14:36:55', 'Code', ''),
(81, '', 'tag musique (eve)', '2023-04-13 14:48:49', 'musique', ''),
(84, '', 'aled', '2023-04-14 10:08:45', 'musique', ''),
(86, '', 'test de musique ', '2023-04-14 16:20:24', 'musique', ''),
(90, '', 'ggg', '2023-04-14 16:29:04', 'musique', ''),
(91, '', 'jgjhbjubhhh', '2023-04-14 16:35:22', 'Trash', ''),
(92, '', 'aled', '2023-04-14 17:49:39', 'Code', ''),
(93, '', 'aled img', '2023-04-14 18:04:43', 'Trash', ''),
(98, '', 'test du js ', '2023-04-16 11:03:43', 'Code', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_mail` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_pseudo`, `user_password`) VALUES
(1, 'moi@gmail.com', 'wolap', 'moiwolap');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`tweet_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `tweet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
