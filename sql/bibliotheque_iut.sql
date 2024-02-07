-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 fév. 2024 à 17:54
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_iut`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkLecteur` int(11) NOT NULL,
  `fkLivre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lecteur`
--

DROP TABLE IF EXISTS `lecteur`;
CREATE TABLE IF NOT EXISTS `lecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lecteur`
--

INSERT INTO `lecteur` (`id`, `pseudo`, `email`, `password`) VALUES
(4, 'Test', 'thomas@gmail.com', '$2y$10$p98Nx4tZmyKv.9qUOzq9p.Ic77NbrnXBRJN54cSlo79r1OAdtc/52');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `dateSortie` date NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `nom`, `auteur`, `dateSortie`, `disponible`) VALUES
(1, 'La Peste', 'Albert Camus', '1947-06-10', 0),
(2, 'Le Comte de Monte-Cristo', 'Alexandre Dumas', '1844-08-01', 0),
(3, 'Pride and Prejudice', 'Jane Austen', '1813-01-28', 0),
(4, 'To Kill a Mockingbird', 'Harper Lee', '1960-07-11', 0),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-10', 0),
(6, 'Crime and Punishment', 'Fyodor Dostoevsky', '1866-01-01', 0),
(7, 'Moby-Dick', 'Herman Melville', '1851-10-18', 0),
(8, 'The Lord of the Rings', 'J.R.R. Tolkien', '1954-07-29', 0),
(9, 'Harry Potter and the Philosopher’s Stone', 'J.K. Rowling', '1997-06-26', 0),
(10, 'The Catcher in the Rye', 'J.D. Salinger', '1951-07-16', 0),
(11, 'Brave New World', 'Aldous Huxley', '1932-01-01', 0),
(12, 'Frankenstein', 'Mary Shelley', '1818-01-01', 0),
(13, 'Jane Eyre', 'Charlotte Brontë', '1847-10-16', 0),
(14, 'Wuthering Heights', 'Emily Brontë', '1847-12-01', 0),
(15, 'The Hobbit', 'J.R.R. Tolkien', '1937-09-21', 0),
(16, 'Anna Karenina', 'Leo Tolstoy', '1877-01-01', 0),
(17, 'The Adventures of Huckleberry Finn', 'Mark Twain', '1884-12-10', 0),
(18, 'The Picture of Dorian Gray', 'Oscar Wilde', '1890-06-20', 0),
(19, 'Les Misérables', 'Victor Hugo', '1862-01-01', 0),
(20, 'Le Petit Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 0),
(21, '1984', 'George Orwell', '1949-06-08', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
