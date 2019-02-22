

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ged`
--

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `ID_DOC` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(50) NOT NULL,
  `AUTEUR` varchar(50) NOT NULL,
  `FICHIER` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_DOC`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`ID_DOC`, `TITRE`, `AUTEUR`, `FICHIER`) VALUES
(1, 'DOCUMENT-1', 'Auteur-1', 'fichier-1.pdf'),
(2, 'DOCUMENT-2', 'Auteur-2', 'fichier-2.pdf'),
(3, 'DOCUMENT-3', 'Auteur-3', 'fichier-3.pdf'),
(4, 'DOCUMENT-4', 'Auteur-4', 'fichier-4.pdf'),
(5, 'DOCUMENT-5', 'Auteur-5', 'fichier-5.pdf'),
(6, 'DOCUMENT-6', 'Auteur-6', 'fichier-6.pdf'),
(7, 'DOCUMENT-7', 'Auteur-7', 'fichier-7.pdf'),
(8, 'DOCUMENT-8', 'Auteur-8', 'fichier-8.pdf'),
(10, 'DOCUMENT-10', 'Auteur-10', 'fichier-10.pdf'),
(11, 'DOCUMENT-11', 'Auteur-11', 'fichier-11.pdf'),
(12, 'DOCUMENT-12', 'Auteur-12', 'fichier-12.pdf'),
(13, 'DOCUMENT-13', 'Auteur-13', 'fichier-13.pdf'),
(14, 'DOCUMENT-14', 'Auteur-14', 'fichier-14.pdf'),
(15, 'DOCUMENT-15', 'Auteur-15', 'fichier-15.pdf'),
(16, 'DOCUMENT-16', 'Auteur-16', 'fichier-16.pdf'),
(17, 'DOCUMENT-17', 'Auteur-17', 'fichier-17.pdf'),
(18, 'DOCUMENT-18', 'Auteur-18', 'fichier-18.pdf'),
(20, 'DOCUMENT-20', 'Auteur-20', 'fichier-20.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `ID_THEME` int(11) NOT NULL AUTO_INCREMENT,
  `THEME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_THEME`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`ID_THEME`, `THEME`) VALUES
(1, 'THEME1'),
(2, 'THEME2'),
(3, 'THEME3'),
(4, 'THEME4'),
(5, 'THEME5');

-- --------------------------------------------------------

--
-- Structure de la table `themes_documents`
--

DROP TABLE IF EXISTS `themes_documents`;
CREATE TABLE IF NOT EXISTS `themes_documents` (
  `ID_THEME` int(11) NOT NULL,
  `ID_DOC` int(11) NOT NULL,
  PRIMARY KEY (`ID_THEME`,`ID_DOC`),
  KEY `FK_THEMES_DOCUMENTS_2` (`ID_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `themes_documents`
--

INSERT INTO `themes_documents` (`ID_THEME`, `ID_DOC`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 17),
(4, 18),
(4, 20),
(5, 10),
(5, 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
