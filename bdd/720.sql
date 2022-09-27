-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 03:06 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `720`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(256) NOT NULL,
  `prix$` double NOT NULL,
  `comment` text NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `libelle`, `prix$`, `comment`, `produit_id`) VALUES
(1, 'site vitrine', 300, 'wordpress', 1),
(2, 'site e-commerce', 750, 'prestashop', 1),
(3, 'application web', 500, 'symfony', 1),
(4, 'prix confidentialité du projet', 100, '', 2),
(5, 'prix d''achat des noms de domaine', 150, '', 2),
(6, 'prix de dépôt de nom à l''INPI', 300, '', 2),
(7, 'prix confidentialité du projet', 100, '', 3),
(8, 'prix de dépôt de slogan à l''INPI', 250, '', 3),
(9, 'prix confidentialité du projet', 200, '', 4),
(10, 'prix de déclinaison charte graphique du logo', 100, '', 4),
(11, 'prix de dépôt du logo à l''INPI', 125, '', 4),
(12, 'prix de design carte de visite recto/verso', 300, '', 4),
(13, 'prix d''impression 500 cartes de visites', 250, '', 4),
(14, 'prix de design carton de correspondance', 150, '', 4),
(15, 'prix d''impression 500 cartes de correspondances', 175, '', 4),
(16, 'prix du design de papier à entete', 400, '', 4),
(17, 'prix du masque de présentation power point', 300, '', 4),
(18, 'prix de recherche d''antériorité ', 200, '', 4),
(19, 'prix confidentialité du projet', 250, '', 5),
(20, 'prix de design de déclinaison de la mascotte', 350, '', 5),
(21, 'prix de dépôt de nom à l''INPI', 350, '', 5),
(22, 'prix confidentialité du projet', 200, '', 6),
(23, 'prix d''impression de 500 cartes', 200, '', 6),
(24, 'prix confidentialité du projet', 150, '', 7),
(25, 'prix d''adaptation en haute définition 4*3m', 150, '', 7),
(26, 'prix confidentialité du projet', 250, '', 8),
(27, 'prix design page supplementaire', 150, '', 8),
(28, 'prix d''impression 500 brochures 4pages A4', 500, '', 8),
(29, 'prix d''impression 500 leaflet format A5', 350, '', 8),
(30, 'prix de conception d''une chemise à rabats', 150, '', 8),
(31, 'prix d''impression 500 chemises à rabats A4', 500, '', 8),
(32, 'prix confidentialité du projet', 100, '', 9),
(33, 'prix de déclinaison d''une page supplémentaire', 50, '', 9),
(34, 'prix d''intégration HTML (Page d''accueil + 3 pages)', 250, '', 9),
(35, 'prix d''intégration page HTML supplémentaire', 100, '', 9),
(36, 'prix confidentialité du projet', 100, '', 10),
(37, 'prix pour intégration HTML', 50, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(256) NOT NULL,
  PRIMARY KEY (`produit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`produit_id`, `designation`) VALUES
(1, 'site web'),
(2, 'Concours de création de noms'),
(3, 'Concours de création de slogan'),
(4, 'Concours de logo'),
(5, 'Concours de mascottes'),
(6, 'Concours de carte de voeux'),
(7, 'Concours affiche'),
(8, 'Concours design de brochure'),
(9, 'Concours de web design'),
(10, 'concours design de newsletter'),
(11, 'concours d''idée');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
