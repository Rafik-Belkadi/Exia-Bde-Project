-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 jan. 2019 à 11:17
-- Version du serveur :  5.7.23
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_bde`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tot` int(11) DEFAULT NULL,
  `id_products` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_basket_id_products` (`id_products`),
  KEY `FK_basket_id_users` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`id`, `tot`, `id_products`, `id_users`) VALUES
(1, 1, 1, 7),
(2, 1, 13, 11);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commentaires` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_commentaires`),
  KEY `FK_comment_id_commentaires` (`id_commentaires`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `likes` int(11) DEFAULT NULL,
  `comments` text,
  `undesirable` tinyint(1) DEFAULT NULL,
  `images` varchar(1000) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_commentaires_id_users` (`id_users`),
  KEY `FK_commentaires_id_evenement` (`id_evenement`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `likes`, `comments`, `undesirable`, `images`, `id_users`, `id_evenement`) VALUES
(1, NULL, 'wow i love this event ! This iis a foto of me last year :D', NULL, 'https://obstacle.fr/wp-content/uploads/2017/02/2017-Color-Obstacle-Rush.jpg', 3, 2),
(5, NULL, 'lol', NULL, 'https://wallpapersite.com/images/wallpapers/moon-4096x2304-planets-clouds-4k-9215.jpg', 3, 1),
(6, NULL, 'Wow nice <3', NULL, '', 1, 2),
(8, NULL, 'zeb', 1, 'images/zeb.jpg', 5, 1),
(9, NULL, 'Nique soi', 1, 'images/zeb.jpg', 5, 4),
(10, NULL, 'Nique soi', NULL, 'images/zeb.jpg', 5, 4),
(11, NULL, 'Nique soi', NULL, 'images/zeb.jpg', 5, 4),
(12, NULL, 'Nique soi', NULL, 'images/zeb.jpg', 5, 4),
(13, NULL, 'k', 1, '', 5, 1),
(14, NULL, 'ebola frr', 1, '', 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `nbr_vote` int(11) DEFAULT NULL,
  `metting` date DEFAULT NULL,
  `recurrent` tinyint(1) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `undesirable` tinyint(1) NOT NULL,
  `evenement` tinyint(1) NOT NULL,
  `nbr_sign` int(11) DEFAULT NULL,
  `past` tinyint(1) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `month_event` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `name`, `description`, `price`, `nbr_vote`, `metting`, `recurrent`, `picture`, `undesirable`, `evenement`, `nbr_sign`, `past`, `mark`, `id_users`, `month_event`) VALUES
(1, 'ACDC Concert', 'Petit concert trankilou de ACDC, ça va être de la balle. Places à moitié prix pour tous les exars !! Let\'s go onto the higway to heellll', '20.00', 220, '2018-06-05', 1, 'images/acdc.jpg', 0, 1, 45, 1, NULL, 3, 1),
(2, 'Color Obstacle rush', 'Un course colorée avec plein de couleur et de trucs et d\'obstacles et c\'est trop génial et on kiff tous le bon son et ya le subway a côté et toussatoussa', '37.00', 34, '2018-04-19', 1, 'images/color.jpg', 0, 1, 34, 0, NULL, 5, 0),
(4, 'Soirée parrainage', 'Vous voulez un parrain ? Vous n\'avez pas de parrain ? Vous avez pas eu de soirée l\'année dernière ? Cette soirée est faite pour vous ! venez avoir un parrain qui vous parlera surement plus de l\'année !!', '10.00', 56, '2018-04-28', 1, 'images/parrain.jpg', 0, 1, 45, 0, NULL, 2, 0),
(5, 'Bal de promo à l\'avance', 'on va danser', '50.00', 4, '2019-03-15', NULL, 'https://images.pexels.com/photos/1820147/pexels-photo-1820147.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 0, 1, NULL, 0, NULL, 5, 0),
(7, 'Nikou dalil v2', 'On va lbézé c ratos', '10.00', 0, '2019-03-16', NULL, 'https://i.ytimg.com/vi/rTFqo81Ci_0/maxresdefault.jpg', 1, 0, NULL, 0, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_event` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `id_event`, `image`) VALUES
(1, 1, 'images/dw1.jpeg'),
(2, 1, 'images/dw1.jpeg'),
(3, 1, 'images/image2.jpg'),
(4, 1, 'images/c384efb7a8dff8e06b08864a68cafe9b.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_commentaires` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  KEY `FK_likes_id_commentaires` (`id_commentaires`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_commentaires`, `id_user`) VALUES
(5, 7),
(5, 11);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `comment_id` int(255) NOT NULL,
  `contenu` text NOT NULL,
  `raison` text NOT NULL,
  `deprecated` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `comment_id`, `contenu`, `raison`, `deprecated`) VALUES
(4, 9, 'Nique soi', 'psk pd', 0),
(5, 8, 'zeb', 'psk pd', 0),
(6, 13, 'k', 'kk', 0),
(8, 14, 'ebola frr', 'psk pd', 0);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text,
  `price` decimal(15,2) DEFAULT NULL,
  `categorie` varchar(25) DEFAULT NULL,
  `nbr_command` int(11) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `categorie`, `nbr_command`, `picture`) VALUES
(1, 'Mars', 'Une barre Mars.', '1.00', 'Nourriture', 2, 'images/mars.png'),
(2, 'Twix', 'Une barre twix.', '1.00', 'Nourriture', 2, 'images/twix.png'),
(3, 'Cle Usb', 'Une barre usb encodable.', '5.00', 'Hardware', 2, 'images/cle.jpg'),
(4, 'Noodle', 'Une barre noodle.', '1.50', 'Nouriture', 2, 'images/noodle.jpg'),
(9, 'Pull', 'Un pull', '31.00', 'Vetement', 2, 'images/swweater White.png'),
(13, 'macbook', 'Un Ordinateur', '1000.00', 'Hardware', NULL, 'https://www.shareicon.net/data/256x256/2015/05/21/41813_laptop_512x512.png');

-- --------------------------------------------------------

--
-- Structure de la table `signin`
--

DROP TABLE IF EXISTS `signin`;
CREATE TABLE IF NOT EXISTS `signin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_signin_id_users` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `signin`
--

INSERT INTO `signin` (`id`, `id_users`, `id_evenement`) VALUES
(2, 3, 1),
(3, 3, 1),
(4, 3, 1),
(5, 1, 2),
(6, 1, 2),
(8, 1, 1),
(9, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `hash` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `bde` tinyint(1) NOT NULL DEFAULT '0',
  `pro` tinyint(1) NOT NULL DEFAULT '0',
  `connected` tinyint(1) NOT NULL,
  `session_id` varchar(25) DEFAULT NULL,
  `id_basket` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `profile_pic` varchar(1000) DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png',
  `localisation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_id_basket` (`id_basket`),
  KEY `FK_users_id_products` (`id_products`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `hash`, `mail`, `bde`, `pro`, `connected`, `session_id`, `id_basket`, `id_products`, `profile_pic`, `localisation`) VALUES
(1, 'we vite fait', 'mdr', 'lol', 'niquesoi', 1, 0, 1, '70632964', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(2, 'lesinge', 'motoi', 'zz', 'blop@gmail.com', 0, 0, 1, '34256047', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(3, 'wa3', 'oklm', 'vv', 'sisimgl', 0, 0, 1, '95013433', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(4, 'rafik', 'Ordana123', 'rafikkileur2', 'Ordana1234@gmail.com', 1, 0, 1, '', NULL, NULL, 'images/p1.jpeg', ''),
(5, 'rafik', 'root', 'djvaiko000', 'brafik009@hotmail.Com', 0, 1, 1, '16449058', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(6, 'test', 'test', 'test', 'test@gmail.com', 0, 1, 1, '', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(7, 'Tarkikote', 'Tarkikote', '1234', 'Tarkikote@gmail.Com', 0, 0, 1, '', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', ''),
(11, 'newuser', 'newuser', 'Rafik1234', 'newuser@gmail.com', 0, 0, 1, '', NULL, NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png', 'Alger');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_users`),
  KEY `FK_vote_id_users` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id`, `id_users`, `id_evenement`) VALUES
(1, 5, 5),
(3, 11, 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `FK_basket_id_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_basket_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_comment_id_commentaires` FOREIGN KEY (`id_commentaires`) REFERENCES `commentaires` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_commentaires_id_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `FK_commentaires_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
