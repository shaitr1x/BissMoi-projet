-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 22 juin 2025 à 23:01
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bissmoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int NOT NULL AUTO_INCREMENT,
  `id_produit` int DEFAULT NULL,
  `id_client` int DEFAULT NULL,
  `note` int DEFAULT NULL,
  `commentaire` text,
  `date_avis` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_avis`),
  KEY `id_produit` (`id_produit`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `id_client` int DEFAULT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('en attente','expédiée','livrée','annulée') DEFAULT 'en attente',
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

DROP TABLE IF EXISTS `details_commande`;
CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_commande` int DEFAULT NULL,
  `id_produit` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

DROP TABLE IF EXISTS `formules`;
CREATE TABLE IF NOT EXISTS `formules` (
  `id_formule` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `description` text,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_formule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int DEFAULT NULL,
  `action` text NOT NULL,
  `date_action` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `id_paiement` int NOT NULL AUTO_INCREMENT,
  `id_commande` int DEFAULT NULL,
  `montant` decimal(10,2) NOT NULL,
  `mode_paiement` enum('carte','PayPal','virement bancaire') NOT NULL,
  `date_paiement` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('en attente','réussi','échec') DEFAULT 'en attente',
  PRIMARY KEY (`id_paiement`),
  KEY `id_commande` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int NOT NULL AUTO_INCREMENT,
  `id_client` int DEFAULT NULL,
  `id_produit` int DEFAULT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `id_client` (`id_client`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `id_commercant` int DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `prix` decimal(10,2) NOT NULL,
  `quantite_stock` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produit`),
  KEY `id_commercant` (`id_commercant`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `id_commercant`, `nom`, `description`, `prix`, `quantite_stock`, `image`, `categorie`, `date_ajout`) VALUES
(30, 4, 'Nike SB', 'Style, confort et performance réunis.\r\n\r\nLa Nike SB (Skateboarding) est bien plus qu’une simple chaussure de skate — c’est une icône urbaine qui allie design moderne, adhérence optimale et durabilité renforcée. Conçue pour les skateurs mais adoptée par tous, elle offre une semelle extérieure en caoutchouc pour une accroche parfaite, une tige en daim ou en toile robuste et un amorti Zoom Air pour un confort exceptionnel.\r\n\r\nQue ce soit pour rider, marcher ou simplement styliser ta tenue, la Nike SB s’adapte à tous les terrains.', '300.00', 12, '[\"uploads\\/img_6855adcf76dc26.99016165.jpg\",\"uploads\\/img_6855adcf772179.92751632.png\",\"uploads\\/img_6855adcf776b99.41389168.png\"]', 'Mode', '2025-06-20 11:52:43'),
(35, 3, 'jordan 4', 'jordan 4', '399.00', 15, '[\"uploads\\/img_685602a53c1b20.41315412.webp\"]', 'Mode', '2025-06-20 19:58:25'),
(36, 4, 'ps6', 'playstation 6', '5000.00', 38, '[\"uploads\\/img_6855b812988d35.97427757.webp\"]', 'Électronique', '2025-06-20 20:35:03'),
(37, 11, 'Bouge', 'C\'est la même qualité c\'est juste le prix qui baisse', '0.01', 1, '[\"uploads\\/img_6855fa56b2c042.92729171.jpg\"]', 'Électronique', '2025-06-21 01:17:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'client',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `created_at`) VALUES
(1, 'doko alan', 'dokoalanfranck@gmail.com', '$2y$10$O/VdMYqj.3.C20R4rIKB3uyVyoICD79z5sDLzFQ59a2rCmWmH3oNa', NULL, 'admin', 'active', '2025-06-14 15:37:47'),
(2, 'djoulde franck', 'dokoalan9@gmail.com', '$2y$10$rsOaE0hBFUdz8GPkP4cF0eOxdI6th/nI2GTzpLgGSP21biq.rYJxO', NULL, 'client', 'active', '2025-06-14 15:39:46'),
(3, 'wilfried MK', 'wil9@gmail.com', '$2y$10$Nd5FuIODWNR/ro1llKQNrexUWfbJ7LuiBlyufN6R6BaR7S.5Tmzii', NULL, 'merchant', 'active', '2025-06-14 15:42:49'),
(4, 'Biss Moi', 'Bissmoi@gmail.com', '$2y$10$WK5A3JqhUPMbQHBymj7CHuqZ1030AIxi.io5z3XBnVU2QmcxwR8IC', NULL, 'merchant', 'active', '2025-06-15 20:20:17'),
(7, 'test ', 'test@gmail.com', '$2y$10$T.OHUe73i0GnaX4fQ725DO31g4wE4T9Yz6DlzWsXvkcNUlt6QNF.a', NULL, 'client', 'active', '2025-06-15 20:49:14'),
(10, 'test2', 'test2@gmail.com', '$2y$10$jjd8FMaPc8aLt4OPthHGiukUgSR46cG1oS9gqlUjC3fdPD5g9v7Qi', NULL, 'client', 'active', '2025-06-20 10:38:40'),
(11, 'Brousse avec ça', 'wilfriedatangana73@gmail.com', '$2y$10$XGnTKC1OQTP6rPzeINGMdO9gdvn9kc2WfdXiW7JPc7mashAc7v.iy', NULL, 'merchant', 'active', '2025-06-21 01:14:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
