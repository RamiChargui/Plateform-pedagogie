-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 jan. 2023 à 20:21
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_pedagogie`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cours_id` int(11) NOT NULL,
  `fichier` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `titre`, `cours_id`, `fichier`) VALUES
(12, 'introduction', 21, 'Android1-introduction.pdf'),
(13, 'les Activités', 21, 'Android2-activite.pdf'),
(14, 'introduction', 27, 'SupportCours_NoSQL.pdf'),
(15, 'ch1', 27, 'chap1-intro-yass-V2.pdf'),
(18, 'introduction', 30, 'Série-dexercices (1).pdf'),
(19, 'introductiteste@test.tnon', 30, 'css.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) NOT NULL,
  `proprietaire` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `clef` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `description`, `proprietaire`, `image`, `clef`) VALUES
(21, 'Java', 'cours java pour les débutants ', 1, 'cart.png', '123456'),
(22, 'html', 'cours html détaillé', 20, 'html.jpg', '123456'),
(27, 'css', 'cours css complet', 1, 'css.jpg', '123456'),
(30, 'teste@test.tn', 'teste@test.tn', NULL, 'pencil.png', 'teste@test.tn'),
(31, 'teste@test.tn', 'teste@test.tn', NULL, 'css.jpg', 'teste@test.tn');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_cours`
--

CREATE TABLE `etudiant_cours` (
  `id_user` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant_cours`
--

INSERT INTO `etudiant_cours` (`id_user`, `id_cours`) VALUES
(2, 27),
(27, 21),
(27, 22),
(40, 31);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `num` int(11) DEFAULT NULL,
  `cours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'salah', 'salah', 'admin@gmail.com', '123456', 'ROLE_ENSEGIENANT'),
(2, 'user', 'user', 'user2@gmail.com', '123456', 'ROLE_ENSEGIENANT'),
(20, 'ahmed', 'ben ahmed', 'amin@gg', '123456', 'ROLE_ENSEGIENANT'),
(23, 'student', 'student', 'student@gmail.com', '123456', 'ROLE_ETUDIANT'),
(27, 'ali', 'benali', 'ali@gmail.com', '123456', 'ROLE_ETUDIANT'),
(28, 'mohamed', 'Ben Mohamed', 'mohamed@gmail.com', '123456', 'ROLE_ETUDIANT'),
(37, 'test', 'test', 'test@test.tn', 'test123*', 'ROLE_ENSEGIENANT'),
(38, 'teste@test.tn', 'teste@test.tn', 'teste@test.tn', 'teste@test.tn', 'ROLE_ENSEGIENANT'),
(40, 'teste@test.tns', 'teste@test.tns', 'teste@test.tns', 'teste@test.tns', 'ROLE_ETUDIANT');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapitre_ibfk_1` (`cours_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietaire` (`proprietaire`);

--
-- Index pour la table `etudiant_cours`
--
ALTER TABLE `etudiant_cours`
  ADD PRIMARY KEY (`id_user`,`id_cours`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_id` (`cours_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `chapitre_ibfk_1` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`proprietaire`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `etudiant_cours`
--
ALTER TABLE `etudiant_cours`
  ADD CONSTRAINT `etudiant_cours_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `etudiant_cours_ibfk_2` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
