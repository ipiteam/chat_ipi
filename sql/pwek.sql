-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Décembre 2016 à 13:28
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pwek`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date_mess` date DEFAULT NULL,
  `heure_mess` time DEFAULT NULL,
  `id_profil` int(11) NOT NULL,
  `texte` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(200) NOT NULL,
  `passwrd` varchar(255) NOT NULL,
  `avatar` blob,
  `couleur` varchar(7) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `description` text,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`id`, `email`, `pseudo`, `passwrd`, `avatar`, `couleur`, `nom`, `prenom`, `description`, `date_inscription`) VALUES
(1, 'sdgsdv@qsgdvqsg.com', 'Le ieuv', 'toto', NULL, NULL, 'sylvain', NULL, NULL, '2016-12-13');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profils` (`id`);

--
-- Événements
--
/* CREATE DEFINER=`root`@`localhost` EVENT `e_refresh_status` ON SCHEDULE EVERY 30 SECOND STARTS '2016-12-20 11:29:06' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE profils SET status=0 WHERE (NOW()-date_refresh)>30$$ */
CREATE EVENT e_refresh_status ON SCHEDULE EVERY 30 SECOND DO UPDATE profils SET status=0 WHERE (NOW()-date_refresh)>30;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
