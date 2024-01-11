-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 jan. 2024 à 17:09
-- Version du serveur : 10.10.2-MariaDB-log
-- Version de PHP : 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `antre_des_saveurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `lastname`, `firstname`) VALUES
(1, 'alois.sauvonnet@live.fr', 'pass', 'Sauvonnet', 'Aloïs');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `quantity` int(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `arrival_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `native_country_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `spotlight` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `name`, `description`, `quantity`, `price`, `arrival_date`, `category_id`, `native_country_id`, `image`, `spotlight`, `isActive`) VALUES
(6, 'Pomme Reinette', 'Se récoltant fin octobre à début novembre suivant les régions, la pomme Reinette du Mans est une variété de très bonne conservation pouvant se consommer à partir de décembre. Le fruit d’abord vert devient jaune clair à maturité. Le fruit est rond, un peu large, mamelonné au sommet. La qualité gustative est très bonne, la chair est fine, ferme et croquante puis devient plus fondante en fin de conservation. Reinette du Mans peut être consommé au couteau ou cuit (compotes, tartes, jus…).', 30, '1.20', '2023-09-08', 1, 2, 'https://i.pinimg.com/736x/d0/3b/77/d03b77c277d4c641d983ffc4d55ae35c.jpg', 1, 1),
(7, 'Courgette - Ronde de Nice', 'La courgette Ronde de Nice à Fruit Rond est une variété non coureuse, hâtive, très productive, les fruits se récoltent à mi-développement. La chair de la courgette de Nice à fruits ronds est fine, tendre et fondante. Utilisations : Se consomme en ratatouille, farcies ou en gratins. ', 22, '1.80', '2023-09-04', 2, 2, 'https://www.fermedesaintemarthe.com/Image/27314/1200x1200/courgette-de-nice-a-fruit-rond-ab.jpg', 1, 1),
(8, 'Chips', 'eijrthbgziuerhjvbfzerjhvbzerijvh zbntfjhz dfkvjsbfdkvh sdfkvj nzbfkbvjhbsfgvkjsdbnfvksd fb nvkzehjfvb ksdfhv edfkv hjbdfkvjhbsqdk v fbklj ern fkv jbnefrvb ', 500, '2.00', '2023-07-05', 4, 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Kartoffelchips-1.jpg/640px-Kartoffelchips-1.jpg', 0, 1),
(9, 'Pomme de terre Sirtema - Nouvelle', 'La pomme de terre Sirtema - Nouvelle, est une variété de consommation précoce. Elle est très courante dans les jardins pour la production de pommes de terre nouvelles. Elle est productive et donne une proportion importante de tubercules de gros calibre. Souvent cuisinée en gratin ou rissolée, elle est pourtant polyvalente en cuisine.', 25, '25.00', '2023-09-08', 2, 1, 'https://ma-ferme-bio.com/3235-large_default/pomme-de-terre-primeur-bio.jpg', 1, 1),
(12, 'Fraise Charlotte', 'La fraise Charlotte est savoureuse nature. Cependant, vous pouvez la tester en salade ou en patisserie. Vous pouvez cuisiner beaucoup de plats avec ce fruit ! Il sera très bon en bavarois aux fraises Charlotte ou bien en charlotte aux fraises Charlotte. Ce fruit est parfait pour l’été et pour essayer les roulés aux fraises Charlotte ! Vous pouvez aussi vous laisser convaincre par le tiramisu aux fraises Charlotte pour l’incorporer dans votre recette !', 50, '10.00', '2023-09-08', 1, 1, 'https://schmitt-pere-fils.fr/cdn/shop/products/fraise_6d8c6c86-e814-4282-8ece-d97d25101c07.jpg?v=1651674690', 1, 1),
(13, 'Melon charentais', 'Le melon se prépare en un tour de main : il suffit de le couper en deux et de retirer ses pépins. En quartiers, en cubes ou en billes, à vous de choisir la découpe la plus adaptée à vos recettes. En salade avec des tomates cerise et de la feta, en brochettes piqué avec des morceaux de figue, en soupe fraîche avec quelques feuilles de menthe ou en carpaccio accompagné de fruits rouges, le melon se déguste de l’entrée au dessert.', 20, '2.50', '2023-09-08', 1, 2, 'https://www.ernest-turc.com/boutique/wp-content/uploads/2021/01/melon-charentais.jpg', 0, 1),
(14, 'Tomate - Coeur de boeuf', 'Les Cœur de Bœuf ne se conservent pas au réfrigérateur, cela risquerait de tuer tous les arômes du fruit. Vous pouvez les conserver dans une remise ou une cave et les consommer 3 à 4 jours après achat. Elles sont idéales pour des salades de tomates savoureuses (au naturel évidemment !) avec un filet d’huile d’olive et quelques feuilles de basilic.', 0, '0.90', '2023-09-08', 1, 1, 'https://img.passeportsante.net/1200x675/2022-11-29/shutterstock-2161804483.webp', 0, 1),
(16, 'Patate douce', 'La patate douce est une excellente source de pro-vitamine A ou bêta-carotène. Plus elle est colorée, plus elle contient de pro-vitamine A qui est indispensable à la santé des tissus, au système immunitaire, à la croissance et pour la vision nocturne. Elle peut se consommer sauté, frite, en purée, en gratin ,etc...', 24, '5.00', '2023-09-10', 2, 2, 'https://images.radio-canada.ca/v1/alimentation/ingredient/1x1/ingredient-patate-douce.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Fruit'),
(2, 'Légume'),
(3, 'Fromage'),
(4, 'Sec');

-- --------------------------------------------------------

--
-- Structure de la table `native_country`
--

CREATE TABLE `native_country` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `native_country`
--

INSERT INTO `native_country` (`ID`, `name`) VALUES
(1, 'France'),
(2, 'Espagne'),
(3, 'Portugal'),
(4, 'Italie');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_command` date NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `lastname`, `firstname`, `email`, `password`, `phone`, `createdAt`) VALUES
(19, 'aaaa', 'aaa', 'mail@mail.mail', '$2y$10$rdF.beUkc8/sgaWd63DaqOYM6sx4hJk5Nk5lTA37Q3M2bYvrWWQ1O', '', '2023-08-25 15:30:28'),
(20, 'SAUVONNET', 'Aloïs', 'alois.sauvonnet@live.fr', '$2y$10$lBcrzZgOhTFI6LDmXIIbme49RdcZ3E7mGFinv7g1kgQGBB9eLnl5u', '06.98.61.03.74', '2023-08-25 15:43:03'),
(21, 'SVNT', 'Baboune', 'baboune@mail.fr', '$2y$10$T6jXPPXijou6yJ7cZs8bZe/qXP4ezBOX5IGj4lDEJyJdu//2oOk56', '0698610371', '2023-09-02 12:22:41'),
(22, 'le Téméraire', 'Charles', 'charles.temeraire@mail.fr', '$2y$10$yTzuQJCAQ1eqsTu5PiA2pe4.Z6q7D9xP5HL5SzgLotLCke5cGrerq', '0601020304', '2023-09-14 14:28:24'),
(23, 'Tapie', 'Bernard', 'beber.tapie@mail.mail', '$2y$10$v4pC99n0wjnb3laajpGfhuvjJ7/R69LZ3nJcdp5QnVdQnBvYab4jC', '0102030405', '2023-09-20 18:48:06'),
(24, 'jbnrgjbrgb', 'hzerbfhuzebf', 'mail.mail@mail.mail', '$2y$10$gOk3sGey0FcvwF4RrBGXJ.eNqDj1pg.SipIvxsddOXLDVbLlDtYzK', '', '2023-09-21 09:11:24'),
(25, 'dutrou', 'robert', 'robert.d@mail.mail', '$2y$10$tCI3EpG9lGyfN4wUcFTcbOJ8f6ojFq6W5T29Ha08QEYXpVtlKMe.O', '', '2023-11-14 16:12:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `native_country_id` (`native_country_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `native_country`
--
ALTER TABLE `native_country`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `command_id` (`order_id`),
  ADD KEY `produit_id` (`article_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `native_country`
--
ALTER TABLE `native_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`native_country_id`) REFERENCES `native_country` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`article_id`) REFERENCES `article` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
