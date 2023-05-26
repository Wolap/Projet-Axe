-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mai 2023 à 10:19
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
  `tweet_contenuTweet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tweet_tag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tweet_userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`tweet_id`, `tweet_contenuTweet`, `tweet_date`, `tweet_tag`, `tweet_file`, `tweet_userid`) VALUES
(107, 'zjzjejzjzjzjzjz', '2023-05-22 11:18:54', 'Code', '', 1),
(109, 'kklfeeflkvlkef,lkd test 2 eme personne ', '2023-05-22 15:20:40', 'Trash', '', 1),
(110, 'aled le test de l\'img canard', '2023-05-22 16:53:20', 'Code', '', 1),
(112, 'le CANARD ! ', '2023-05-22 16:56:27', 'Trash', 'duck_cdi.jpg', 1),
(113, 'le test ultime du canard', '2023-05-22 17:01:20', 'musique', 'duck_cdi.jpg', 1),
(124, 'rrterter', '2023-05-23 09:48:21', 'musique', '', 1),
(125, 'ggjygj', '2023-05-23 10:37:53', 'musique', '', 1),
(126, 'gggggg', '2023-05-23 10:43:59', 'Code', 'duck_cdi.jpg', 1),
(129, 'hfhtfh', '2023-05-23 10:48:53', 'musique', 'duck_cdi.jpg', 1),
(130, 'la fameuse pp canard', '2023-05-23 11:20:51', 'Trash', 'tweet_images/pp_canard.png', 1),
(134, 'quack', '2023-05-23 12:47:04', 'Code', 'tweet_images/duck_cdi.jpg', 1),
(136, 'aleeedd', '2023-05-23 13:08:54', 'musique', 'tweet_images/', 6),
(137, 'kjfhejfdskfkdsjkfds', '2023-05-24 12:05:01', 'JeuxVideos', 'tweet_images/', 1),
(138, 'pas cool ce qui se passe en ce moment ', '2023-05-26 09:59:21', 'Guerre', 'tweet_images/our_code.png', 1),
(139, 'apprendre c\'est nécessaire', '2023-05-26 10:29:33', 'Apprentissage', 'tweet_images/', 6),
(140, 'qkjcziuhfoez temps', '2023-05-26 10:29:45', 'Temps', 'tweet_images/', 6),
(141, 'c\'est beau', '2023-05-26 10:29:53', 'Art', 'tweet_images/', 6),
(142, 'la nouveauté de ce site', '2023-05-26 10:30:16', 'News', 'tweet_images/', 6),
(143, 'dernier jour', '2023-05-26 10:30:33', 'Mood', 'tweet_images/', 6),
(144, 'test', '2023-05-26 11:35:00', 'JeuxVideos', 'tweet_images/', 1),
(146, 'Hola', '2023-05-26 11:48:53', 'Code', 'tweet_images/our_code.png', 1),
(147, 'Re', '2023-05-26 11:49:03', 'Code', 'tweet_images/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_mail` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_pseudo`, `user_password`) VALUES
(1, 'moi@gmail.com', 'wolap', 'moiwolap'),
(6, 'toi@gmail.com', 'toinobody', 'toinobody'),
(7, 'il@gmail.com', 'ilEstToi', '$2y$10$ErFg5rruK3OHpu19hZKc2e1w8YTHkR46VmZcIKUIAgb06fbukJ8pa');

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
  MODIFY `tweet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
