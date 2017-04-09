-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Avril 2017 à 12:30
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lolprostats`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `idPlayer` int(11) NOT NULL,
  `gold` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `experience` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `idPlayer`, `gold`, `level`, `experience`) VALUES
(1, 1, 1000, 1, 2500);

-- --------------------------------------------------------

--
-- Structure de la table `apikey`
--

CREATE TABLE `apikey` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `timestamp10s` int(20) NOT NULL DEFAULT '0',
  `number10s` int(11) NOT NULL DEFAULT '0',
  `timestamp10m` int(11) NOT NULL DEFAULT '0',
  `number10m` int(11) NOT NULL DEFAULT '0',
  `actif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `apikey`
--

INSERT INTO `apikey` (`id`, `name`, `value`, `timestamp10s`, `number10s`, `timestamp10m`, `number10m`, `actif`) VALUES
(1, 'Pipiro', '720315b6-0816-4222-b740-291bc1ae4af9', 1491740833, 5, 1491740833, 203, 1),
(2, 'Pipirox', 'afd770fb-cab4-42cc-b917-4a92a8d90c53', 1491739303, 5, 1491739303, 35, 1),
(3, 'Kaaakaaapipi', '30887bc8-0c93-4867-be51-435e72dbec16', 1491739034, 1, 1491739034, 1, 1),
(5, 'Kaakaapipi', '76496b37-61f0-4d1a-93a5-5ed8371003a7', 1461951034, 10, 1461951034, 10, 1),
(6, 'Xanion', '8fc9f52a-1340-4d22-9268-c5da61403230', 1461951034, 4, 1461951034, 4, 1),
(7, 'Stax', '9cd23d6a-5cf2-411d-9142-8f983997c8fa', 1461747786, 1, 1461747786, 7, 1),
(8, 'smurf stax', 'c69a5e56-386d-4de3-a9aa-c4db274efd8a', 1461747786, 1, 1461747786, 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cacheplayers`
--

CREATE TABLE `cacheplayers` (
  `id` int(11) NOT NULL,
  `idPlayer` int(11) NOT NULL,
  `isRanked` int(11) NOT NULL,
  `updateDate` bigint(20) NOT NULL,
  `idPlayerLol` int(11) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `leagueName` varchar(255) DEFAULT NULL,
  `leaguePoint` varchar(255) DEFAULT NULL,
  `leagueTier` varchar(255) DEFAULT NULL,
  `leagueDivision` varchar(255) DEFAULT NULL,
  `miniSerieProgress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cacheplayers`
--

INSERT INTO `cacheplayers` (`id`, `idPlayer`, `isRanked`, `updateDate`, `idPlayerLol`, `nickname`, `leagueName`, `leaguePoint`, `leagueTier`, `leagueDivision`, `miniSerieProgress`) VALUES
(369, 1, 1, 1491740722, 19441329, 'Pipiroo', 'Hecarim\'s Brutes', '29', 'GOLD', 'III', ''),
(370, 2, 1, 1491740722, 125302, 'Xanion', 'Nunu\'s Patriots', '0', 'SILVER', 'I', ''),
(372, 4, 0, 1491673786, 23656419, 'IG Dodo', 'Hecarim\'s Brutes', '47', 'GOLD', 'IV', ''),
(373, 5, 1, 1491673786, 31757024, 'ImmaFruitDealer', 'Wukong\'s Swashbucklers', '19', 'DIAMOND', 'IV', ''),
(378, 13, 1, 1491739307, 82746988, 'TEAM24SEVEN', 'Soraka\'s Vindicators', '59', 'DIAMOND', 'II', ''),
(379, 14, 1, 1491739307, 19474104, 'OG Satorius', 'Trundle\'s Dragons', '100', 'DIAMOND', 'I', 'NNNNN'),
(380, 15, 1, 1491739307, 21999355, 'Exileh', 'Zyra\'s Infiltrators', '478', 'CHALLENGER', 'I', ''),
(381, 16, 1, 1491739307, 71347673, '', '', '', '', '', ''),
(382, 17, 1, 1491739307, 76406887, 'Gilius 1v9', 'Lulu\'s Lords', '75', 'PLATINUM', 'V', ''),
(383, 3, 0, 1491740722, 27622126, 'Staxboy Q', 'Nunu\'s Patriots', '0', 'SILVER', 'III', ''),
(384, 6, 0, 1491732102, 52543274, '', '', '', '', '', ''),
(385, 7, 0, 1491732102, 28960383, '', '', '', '', '', ''),
(386, 8, 0, 1491732102, 38640997, 'OTP Master Yi', 'Xerath\'s Executioners', '78', 'BRONZE', 'I', ''),
(387, 9, 1, 1491732103, 19547616, 'FragritÃ´', 'Nocturne\'s Legion', '23', 'SILVER', 'IV', ''),
(388, 19, 1, 1491740722, 22362216, 'Cyrbil', 'Ahri\'s Vindicators', '0', 'SILVER', 'III', ''),
(389, 20, 1, 1491740722, 27459857, 'Takenow', 'Maokai\'s Fists', '100', 'PLATINUM', 'II', 'NNN');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `idAccount` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `isNew` int(11) NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `idAccount`, `type`, `content`, `isNew`, `date`) VALUES
(1, 1, 'INFO', 'Bonjour', 0, 1452950620),
(2, 1, 'INFO', 'Hey !', 0, 1452948620),
(3, 2, 'INFO', 'SWEG', 0, 1452940620),
(4, 1, 'INFO', 'Cool hein ?', 0, 1452432220);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `idLol` bigint(20) NOT NULL,
  `actif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`id`, `name`, `role`, `idLol`, `actif`) VALUES
(1, 'Pipiroo', 4, 19441329, 1),
(2, 'Xanion', 5, 125302, 1),
(3, 'Staxboy Q', 2, 27622126, 1),
(4, 'IG Dodo', 1, 23656419, 1),
(5, 'ImmaFruitDealer', 2, 31757024, 1),
(6, 'Armageddon42', 1, 52543274, 1),
(7, 'Crypto Xanion', 3, 28960383, 1),
(8, 'Le Bronz&eacute', 4, 38640997, 1),
(9, 'FragritÃ´', 5, 19547616, 1),
(13, 'TEAM24SEVEN', 0, 82746988, 1),
(14, 'iSatorius', 0, 19474104, 1),
(15, 'Exileh', NULL, 21999355, 1),
(16, 'NoXlAK', NULL, 71347673, 1),
(17, 'Gilius 1v9', NULL, 76406887, 1),
(18, 'Carryzer', NULL, 71031429, 0),
(19, 'Cyrbil', 1, 22362216, 1),
(20, 'Takenow', 3, 27459857, 1);

-- --------------------------------------------------------

--
-- Structure de la table `playerstoteam`
--

CREATE TABLE `playerstoteam` (
  `id` int(11) NOT NULL,
  `idPlayer` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `playerstoteam`
--

INSERT INTO `playerstoteam` (`id`, `idPlayer`, `idTeam`) VALUES
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 3),
(19, 1, 1),
(20, 2, 1),
(21, 3, 1),
(22, 19, 1),
(23, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'Incredibles Geeks'),
(3, 'Pros');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apikey`
--
ALTER TABLE `apikey`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cacheplayers`
--
ALTER TABLE `cacheplayers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPlayer` (`idPlayer`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playerstoteam`
--
ALTER TABLE `playerstoteam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTeamIndex` (`idTeam`),
  ADD KEY `idPlayerIndex` (`idPlayer`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `cacheplayers`
--
ALTER TABLE `cacheplayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `playerstoteam`
--
ALTER TABLE `playerstoteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cacheplayers`
--
ALTER TABLE `cacheplayers`
  ADD CONSTRAINT `constraintIdPlayer` FOREIGN KEY (`idPlayer`) REFERENCES `players` (`id`);

--
-- Contraintes pour la table `playerstoteam`
--
ALTER TABLE `playerstoteam`
  ADD CONSTRAINT `idPlayerConstraint` FOREIGN KEY (`idPlayer`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `idTeamConstraint` FOREIGN KEY (`idTeam`) REFERENCES `teams` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
