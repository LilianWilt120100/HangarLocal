-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `hangarlocal`;
CREATE DATABASE `hangarlocal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hangarlocal`;

DROP TABLE IF EXISTS `categorieproduit`;
CREATE TABLE `categorieproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categorieproduit` (`id`, `nom`, `description`) VALUES
(1,	'legumes',	'legumes'),
(2,	'Fruit',	'Toujours de saison');

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `mail_client` varchar(50) NOT NULL,
  `tel_client` varchar(12) NOT NULL,
  `montant` float NOT NULL,
  `etat` varchar(25) NOT NULL,
  `lieu_retrait` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commande` (`id`, `nom_client`, `mail_client`, `tel_client`, `montant`, `etat`, `lieu_retrait`) VALUES
(1,	'beugheu',	'beubeu@me.com',	'0123456789',	34.5,	'en cours',	'Magasin Leuhclair\r\n'),
(2,	'nom',	'maail@mail',	'123456',	22,	'en cours',	'ieu_retrait');

DROP TABLE IF EXISTS `producteur`;
CREATE TABLE `producteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `urlImage` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `producteur` (`id`, `nom`, `localisation`, `mail`, `urlImage`) VALUES
(1,	'Jean Michel deut',	'22 rue de la Gare',	'jm2@mail.fr',	'../assets/img/michel.png'),
(2,	'abc',	'test',	'i@o.com',	'../assets/img/michel.png');

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `urlImage` varchar(250) DEFAULT NULL,
  `taille_lot` varchar(100) NOT NULL,
  `tarif_unitaire` double NOT NULL,
  `id_producteur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_producteur` (`id_producteur`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_producteur`) REFERENCES `producteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorieproduit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produit` (`id`, `nom`, `description`, `urlImage`, `taille_lot`, `tarif_unitaire`, `id_producteur`, `id_categorie`) VALUES
(1,	'carotte',	'grosse',	'http://localhost/phpmyadmin/themes/pmahomme/img/logo_left.png',	'1 kg',	2.5,	1,	1),
(2,	"Poivron à l\'unités",	'très frais',	'../assets/img/poivron.png',	'1',	4,	1,	1);

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

INSERT INTO `quantite` (`id_commande`, `id_produit`, `quantite`) VALUES
(1,	1,	17);

-- 2021-11-05 15:14:26