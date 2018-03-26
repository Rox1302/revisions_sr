-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Mars 2018 à 10:29
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `revision_sr`
--

-- --------------------------------------------------------

--
-- Structure de la table `definition`
--

CREATE TABLE `definition` (
  `ID_definition` int(15) NOT NULL,
  `question` varchar(255) NOT NULL,
  `traduction` varchar(255) DEFAULT NULL,
  `reponse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `definition`
--

INSERT INTO `definition` (`ID_definition`, `question`, `traduction`, `reponse`) VALUES
(1, 'DNS', 'Domain Name System', 'Sert à faire correspondre un nom de domaine à son adresse IP.'),
(2, 'Réseau', NULL, 'Un réseau est un ensemble d\'ordinateurs ou de matériel reliés les uns aux autres. Il permet aux utilisateurs d\'échanger des informations et de partager des ressources matérielles ou logicielles.'),
(3, 'Routeur', NULL, 'Un routeur est une machine équipée de deux ou plusieurs cartes réseaux permettant d’interconnecter des réseaux d\'adressage différents.'),
(4, 'NAS', 'Network Access Storage', NULL),
(5, 'LAN', 'Local Area Network', 'Réseau Local d’une même enceinte. Permet d’interconnecter de 2 à 254 périphériques maximum, réseau d’entreprise)'),
(6, 'MAN', 'Metropolitan Area Network', NULL),
(7, 'WAN', 'Wide Area Network', 'Internet.'),
(8, 'WiFi', 'Wireless Fidelity', NULL),
(9, 'CPL', 'Courant Porteur en Ligne', NULL),
(10, 'OSI', 'Open System Interconnexion', 'Il définit de quelle manière les ordinateurs et les périphériques doivent procéder pour communiquer. Les règles de communication qu\'il contient sont des protocoles normalisés. Il est normalisé par l\'ISO.'),
(11, 'ADSL', 'Asymmetric Digital Suscriber Line', NULL),
(12, 'TCP', 'Transmission Control Protocol', 'Control l’entête du paquet et les données qu’il contient. En cas d’erreur, le paquet est réémis. '),
(13, 'IP', 'Internet Protocol', 'Permet la remise des paquets pour tous les autres protocoles, il ne contrôle que l’entête du paquet.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(15) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `semestre` varchar(255) DEFAULT NULL,
  `random` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID_user`, `nom`, `prenom`, `mail`, `mdp`, `pseudo`, `semestre`, `random`, `date_inscription`) VALUES
(11, 'MARQUEZ', 'Elodie', 'marquez@intechinfo.fr', '1234', 'Rox1302', 'semestre_3_sr', '2pkbz$lacp3t', '2017-10-14'),
(12, 'Morais', 'David', 'lopesvascomora@intechinfo.fr', '1234', 'Maxviriato', NULL, 'd53sdf$wsef', '2018-03-26');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `definition`
--
ALTER TABLE `definition`
  ADD PRIMARY KEY (`ID_definition`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `definition`
--
ALTER TABLE `definition`
  MODIFY `ID_definition` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
