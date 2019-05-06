-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 mars 2019 à 13:23
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebook`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` int(2) NOT NULL AUTO_INCREMENT,
  `Login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Login`, `Mdp`) VALUES
(1, 'Trupin', 'abruti'),
(2, 'Titos', 'girafe');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `NUM_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
  `LIB_CATEGORIE` varchar(100) NOT NULL,
  PRIMARY KEY (`NUM_CATEGORIE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`NUM_CATEGORIE`, `LIB_CATEGORIE`) VALUES
(1, 'Roche'),
(2, 'Fleur'),
(3, 'Plante'),
(4, 'Secret'),
(5, 'Graine'),
(6, 'Nourriture');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `NUM_CLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `PRE_CLIENT` varchar(30) NOT NULL,
  `NOM_CLIENT` varchar(100) NOT NULL,
  `ADR_CLIENT` varchar(255) NOT NULL,
  `CP_CLIENT` varchar(6) NOT NULL,
  `VIL_CLIENT` varchar(255) NOT NULL,
  `NAI_CLIENT` date NOT NULL,
  `TEL_CLIENT` varchar(10) NOT NULL,
  `EMAIL_CLIENT` varchar(100) NOT NULL,
  `LOG_CLIENT` varchar(100) NOT NULL,
  `MDP_CLIENT` varchar(100) NOT NULL,
  PRIMARY KEY (`NUM_CLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`NUM_CLIENT`, `PRE_CLIENT`, `NOM_CLIENT`, `ADR_CLIENT`, `CP_CLIENT`, `VIL_CLIENT`, `NAI_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`, `LOG_CLIENT`, `MDP_CLIENT`) VALUES
(2, 'Diego', 'Bertho', '44 boulevard du bidon', '55000', 'Quenelle', '2001-02-06', '0679442063', 'immortaldark53@gmail.com', 'kirita', 'asuna'),
(4, 'Sarah', 'Pelle', '55 rue de l\'orteil', '89522', 'Poitiers', '1995-05-18', '0885956894', 'sarah.pelle@laposte.net', 'SarahP', 'test'),
(5, 'Alain', 'Terrieur', '35 rue du bidon', '86200', 'Rennes', '1986-02-21', '0895459862', 'alinterieur@laposte.net', 'AlainT', 'test'),
(10, 'Alex', 'Terieur', '55 rue du bedou', '15890', 'Brest', '0875-12-13', '0696653894', 'alexterieur@laposte.net', 'AlexT', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `NUM_COM` int(4) NOT NULL AUTO_INCREMENT,
  `NUM_CLIENT` int(4) NOT NULL,
  `DATE_COM` date NOT NULL,
  `ADR_LIVRAISON` varchar(255) NOT NULL,
  `ETAT_COM` varchar(100) NOT NULL,
  PRIMARY KEY (`NUM_COM`),
  KEY `NUM_CLIENT` (`NUM_CLIENT`),
  KEY `NUM_COM` (`NUM_COM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detailcommandes`
--

DROP TABLE IF EXISTS `detailcommandes`;
CREATE TABLE IF NOT EXISTS `detailcommandes` (
  `IdProd` int(11) NOT NULL,
  `IdCommande` int(11) NOT NULL,
  `QteCommande` int(25) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IdProd`,`IdCommande`),
  KEY `iddetailcommandecommande` (`IdCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `NUM_CLI` int(11) NOT NULL,
  `NIVEAU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `POURC_REDUC` int(2) NOT NULL,
  PRIMARY KEY (`NUM_CLI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`NUM_CLI`, `NIVEAU`, `POURC_REDUC`) VALUES
(2, 'client +', 20),
(4, 'Secret', 35);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `IdProd` int(2) NOT NULL AUTO_INCREMENT,
  `NumCat` int(11) NOT NULL,
  `LibProd` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `PrixProd` double NOT NULL,
  `DescProd` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdProd`),
  KEY `prodforeign` (`NumCat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`IdProd`, `NumCat`, `LibProd`, `PrixProd`, `DescProd`) VALUES
(1, 1, 'Caillou', 2.5399999618530273, 'Extraction respectueuse de la nature'),
(2, 4, 'Uranium', 350, 'Necessite un partenariat'),
(3, 6, 'Steak de soja', 12, 'Pour stimulez vos papilles tout en respectant la nature  !');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`NUM_CLIENT`) REFERENCES `clients` (`NUM_CLIENT`);

--
-- Contraintes pour la table `detailcommandes`
--
ALTER TABLE `detailcommandes`
  ADD CONSTRAINT `iddetailcommandecommande` FOREIGN KEY (`IdCommande`) REFERENCES `commandes` (`NUM_COM`),
  ADD CONSTRAINT `idprodcommande` FOREIGN KEY (`IdProd`) REFERENCES `produits` (`IdProd`);

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `clipart` FOREIGN KEY (`NUM_CLI`) REFERENCES `clients` (`NUM_CLIENT`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `prodforeign` FOREIGN KEY (`NumCat`) REFERENCES `categories` (`NUM_CATEGORIE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
