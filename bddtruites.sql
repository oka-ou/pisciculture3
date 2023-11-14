-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Avril 2019 à 07:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddtruites`
--

-- --------------------------------------------------------

--
-- Structure de la table `bassin`
--

CREATE TABLE `bassin` (
  `idBassin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `refCapteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bassin`
--

INSERT INTO `bassin` (`idBassin`, `nom`, `description`, `photo`, `refCapteur`) VALUES
(1, 'Bassin du Hem', '20 hectares dans le centre d\'Armentières.', 'bassins1.jpg', 'E4FD'),
(2, 'Bassin du Héron', '15 hectares au centre de Villeneuve-d\'Ascq.', 'bassins2.jpg', '842A'),
(3, 'Bassin de l\'arc en ciel', '5 hectares au coeur des flandres. ', 'bassins3.jpg', '850E');

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

CREATE TABLE `temperature` (
  `idTemp` int(11) NOT NULL,
  `temp` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idBassin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `temperature`
--

INSERT INTO `temperature` (`idTemp`, `temp`, `date`, `idBassin`) VALUES
(1, 11.3, '2015-03-21 07:05:20', 1),
(2, 11.7, '2015-03-21 11:00:00', 1),
(3, 11.8, '2015-03-21 15:00:00', 1),
(4, 9.8, '2015-03-21 03:00:00', 2),
(5, 10.1, '2015-03-21 07:00:00', 2),
(6, 10.2, '2015-03-21 19:00:00', 1),
(7, 10.3, '2015-03-21 21:00:00', 1),
(8, 10.3, '2015-03-21 11:00:00', 2),
(9, 10.3, '2015-03-21 15:00:00', 2),
(10, 10, '2015-03-21 19:00:00', 2),
(11, 9.8, '2015-03-21 03:00:00', 3),
(12, 10.3, '2015-03-21 07:00:00', 3),
(13, 10.5, '2015-03-21 11:00:00', 3),
(14, 10.6, '2015-03-21 15:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `pseudo`) VALUES
(1, 'toto', 'totosecret', 'Mrtoto'),
(2, 'titi', 'titisecret', 'Mmetiti');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bassin`
--
ALTER TABLE `bassin`
  ADD PRIMARY KEY (`idBassin`);

--
-- Index pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`idTemp`),
  ADD KEY `idBassin` (`idBassin`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bassin`
--
ALTER TABLE `bassin`
  MODIFY `idBassin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `idTemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD CONSTRAINT `temperature_ibfk_1` FOREIGN KEY (`idBassin`) REFERENCES `bassin` (`idBassin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
