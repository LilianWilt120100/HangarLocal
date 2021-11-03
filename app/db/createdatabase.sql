-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `hangarlocal`;
CREATE DATABASE `hangarlocal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `hangarlocal`;

DROP TABLE IF EXISTS `categorieproduit`;
CREATE TABLE `categorieproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `mail_client` varchar(50) NOT NULL,
  `tel_client` varchar(12) NOT NULL,
  `montant` float NOT NULL,
  `etat` varchar(25) NOT NULL,
  `lieu_retrait` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `producteur`;
CREATE TABLE `producteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `producteur` (`id`, `nom`, `localisation`, `mail`) VALUES
(1,	'Jean Michel deut',	'22 rue de la Gare',	'jm2@mail.fr');

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `tarif_unitaire` float NOT NULL,
  `id_producteur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_producteur` (`id_producteur`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_producteur`) REFERENCES `producteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorieproduit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `quantite`;
CREATE TABLE `quantite` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_produit`),
  KEY `id_produit` (`id_produit`),
  CONSTRAINT `quantite_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  CONSTRAINT `quantite_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

