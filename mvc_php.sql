-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 fév. 2024 à 16:50
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'Mon premier article de blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nAlias provident deserunt aut, tempora fuga repellendus fugit unde ad, \r\nlabore sint sit odio minima dolorum obcaecati nisi, expedita quis rem facilis?', 'https://cdn.pixabay.com/photo/2017/04/09/09/56/avenue-2215317_960_720.jpg', '2024-02-20 11:25:05'),
(2, 'Mon deuxième article de blog ohoh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nAlias provident deserunt aut, tempora fuga repellendus fugit unde ad, \r\nlabore sint sit odio minima dolorum obcaecati nisi, expedita quis rem facilis?', 'https://cdn.pixabay.com/photo/2017/01/19/23/46/church-1993645_960_720.jpg', '2024-02-20 11:27:12'),
(3, 'Mon troisième article de blog eheh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nAlias provident deserunt aut, tempora fuga repellendus fugit unde ad, \r\nlabore sint sit odio minima dolorum obcaecati nisi, expedita quis rem facilis?', 'https://cdn.pixabay.com/photo/2014/07/28/20/39/sunset-404072_960_720.jpg', '2024-02-20 11:27:12'),
(4, 'Mon quatrième article de blog uhuh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nAlias provident deserunt aut, tempora fuga repellendus fugit unde ad, \r\nlabore sint sit odio minima dolorum obcaecati nisi, expedita quis rem facilis?', 'https://cdn.pixabay.com/photo/2013/03/04/20/59/valley-90388_960_720.jpg', '2024-02-20 11:28:39'),
(5, 'Mon cinquième article de blog ihih', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nAlias provident deserunt aut, tempora fuga repellendus fugit unde ad, \r\nlabore sint sit odio minima dolorum obcaecati nisi, expedita quis rem facilis?', 'https://cdn.pixabay.com/photo/2016/11/25/15/14/landscape-1858602_960_720.jpg', '2024-02-20 11:28:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
