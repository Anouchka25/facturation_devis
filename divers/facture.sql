-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 25 juil. 2019 à 16:33
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `devis_facture`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numfacture` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numtva` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefacture` datetime NOT NULL,
  `vosinfos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infosclient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conditions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite1` int(11) NOT NULL,
  `prixht1` decimal(10,0) NOT NULL,
  `taxe1` decimal(10,0) NOT NULL,
  `designation2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite2` int(11) DEFAULT NULL,
  `prixht2` decimal(10,0) DEFAULT NULL,
  `taxe2` decimal(10,0) DEFAULT NULL,
  `designation3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite3` int(11) DEFAULT NULL,
  `prixht3` decimal(10,0) DEFAULT NULL,
  `taxe3` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `user_id`, `numfacture`, `numtva`, `datefacture`, `vosinfos`, `infosclient`, `conditions`, `consignes`, `designation1`, `quantite1`, `prixht1`, `taxe1`, `designation2`, `quantite2`, `prixht2`, `taxe2`, `designation3`, `quantite3`, `prixht3`, `taxe3`) VALUES
(1, 1, 'MOA1005010', 'Exonérée', '2019-07-21 00:00:00', 'Micro-Entreprise Anouchka MINKOUE OBAME\r\nRue Rétimare, Imm. Adolph. Adam, N°42, 76190 Yvetot, France\r\nImmatriculation au RCS : 794 069 997 00029 R.C.S Rouen\r\nCode APE : 6311Z', 'SAS VIA FORMATION,\r\nreprésentée par Sophie AZAIS, Directrice, située Résidence du Stade à\r\nMAMERS(72600), dont le numéro de SIRET est : 398 397 927 00052,\r\nCode APE 8559 A', 'A verser au compte de :\r\nMlle MINKOUE OBAME Anouchka\r\nRIB : 30004 01495 00000754427 56\r\nBanque : BNP PARIBAS\r\nIBAN : FR76 3000 4014 9500 0007 5442 756\r\nBIC : BNPAFRPPROU', '', 'Formation de développeur intégrateur et codeur web\r\nPour le compte de l’entreprise VIA FORMATION\r\nPour le mois de novembre 2016', 12, '320', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'MOA1005011', 'Exonérée', '2019-07-22 00:00:00', 'Micro-Entreprise Anouchka MINKOUE OBAME\r\nRue Rétimare, Imm. Adolph. Adam, N°42, 76190 Yvetot, France\r\nImmatriculation au RCS : 794 069 997 00029 R.C.S Rouen\r\nCode APE : 6311Z', 'La SARL NTIC CENTER CORPORATION, 1 Square Chalgrin – 92600 Asnières sur Seine Inscrite au registre du commerce et des sociétés de Nanterre sous le n° 793 225 665 Représentée par Monsieur Paul ZOKOU agissant en qualité de gérant', 'A verser au compte de :\r\nMlle MINKOUE OBAME Anouchka\r\nRIB : 30004 01495 00000754427 56\r\nBanque : BNP PARIBAS\r\nIBAN : FR76 3000 4014 9500 0007 5442 756\r\nBIC : BNPAFRPPROU', '', 'Animation de la formation sur le langage XML Pour le compte de l’entreprise NTIC CENTER CORPORATION Pour les 3 journées du 27, 28 et 30 mars 2017', 3, '250', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, 'MOA25821', 'FR39831670831', '2019-07-16 00:00:00', 'TOUTPAIE SARL\r\nRue Rétimare, Imm. Adolph. Adam, N°42,\r\n76190 Yvetot, France\r\nN° siret: 831 670 831\r\n00013 \r\nGérante: Anouchka MINKOUE\r\nOBAME\r\nMail : minkoueobamea@gmail.com\r\nMobile : 06 58 89 85 31', 'Christelle RACINE\r\nResponsable Produits « Informatique » CEPPIC\r\n7 rue du Maréchal Juin 76130 Mont Saint Aignan\r\nTél. : 02 35 59 44 11 / Fax : 02 35 59 44 01', 'A verser au compte de TOUTPAIE\r\nRIB : 30004 00125 00010111146 36\r\nBanque : BNP PARIBAS\r\nIBAN : FR7630004001250001011114636\r\nBIC : BNPAFRPPXXX', '', 'Prestations de formations Html5/Css3, Html5/Css3 (5/7) Responsive web design, Projet individuel aux dates suivantes: 5, 6, 7, 8, 12, 13, 14, 15 février 2019 (8 jours)', 8, '300', '20', 'Frais de déplacement au réel', 8, '26', '20', NULL, NULL, NULL, NULL),
(6, 3, 'MOA25821', 'FR39831670831', '2019-07-16 00:00:00', 'TOUTPAIE SARL\r\nRue Rétimare, Imm. Adolph. Adam, N°42,\r\n76190 Yvetot, France\r\nN° siret: 831 670 831\r\n00013 \r\nGérante: Anouchka MINKOUE\r\nOBAME\r\nMail : minkoueobamea@gmail.com\r\nMobile : 06 58 89 85 31', 'Christelle RACINE\r\nResponsable Produits « Informatique » CEPPIC\r\n7 rue du Maréchal Juin 76130 Mont Saint Aignan\r\nTél. : 02 35 59 44 11 / Fax : 02 35 59 44 01', 'A verser au compte de TOUTPAIE\r\nRIB : 30004 00125 00010111146 36\r\nBanque : BNP PARIBAS\r\nIBAN : FR7630004001250001011114636\r\nBIC : BNPAFRPPXXX', '', 'Prestations de formations Html5/Css3, Html5/Css3 (5/7) Responsive web design, Projet individuel aux dates suivantes: 5, 6, 7, 8, 12, 13, 14, 15 février 2019 (8 jours)', 8, '300', '20', 'Frais de déplacement au réel', 8, '26', '20', NULL, NULL, NULL, NULL);

INSERT INTO `devis` (`id`, `user_id`, `numdevis`, `numtva`, `datedevis`, `vosinfos`, `infosclient`, `conditions`, `consignes`, `designation1`, `quantite1`, `prixht1`, `taxe1`, `designation2`, `quantite2`, `prixht2`, `taxe2`, `designation3`, `quantite3`, `prixht3`, `taxe3`) VALUES
(1, 1, 'MOA1005010', 'Exonérée', '2019-07-21 00:00:00', 'Micro-Entreprise Anouchka MINKOUE OBAME\r\nRue Rétimare, Imm. Adolph. Adam, N°42, 76190 Yvetot, France\r\nImmatriculation au RCS : 794 069 997 00029 R.C.S Rouen\r\nCode APE : 6311Z', 'SAS VIA FORMATION,\r\nreprésentée par Sophie AZAIS, Directrice, située Résidence du Stade à\r\nMAMERS(72600), dont le numéro de SIRET est : 398 397 927 00052,\r\nCode APE 8559 A', 'A verser au compte de :\r\nMlle MINKOUE OBAME Anouchka\r\nRIB : 30004 01495 00000754427 56\r\nBanque : BNP PARIBAS\r\nIBAN : FR76 3000 4014 9500 0007 5442 756\r\nBIC : BNPAFRPPROU', '', 'Formation de développeur intégrateur et codeur web\r\nPour le compte de l’entreprise VIA FORMATION\r\nPour le mois de novembre 2016', 12, '320', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'MOA1005011', 'Exonérée', '2019-07-22 00:00:00', 'Micro-Entreprise Anouchka MINKOUE OBAME\r\nRue Rétimare, Imm. Adolph. Adam, N°42, 76190 Yvetot, France\r\nImmatriculation au RCS : 794 069 997 00029 R.C.S Rouen\r\nCode APE : 6311Z', 'La SARL NTIC CENTER CORPORATION, 1 Square Chalgrin – 92600 Asnières sur Seine Inscrite au registre du commerce et des sociétés de Nanterre sous le n° 793 225 665 Représentée par Monsieur Paul ZOKOU agissant en qualité de gérant', 'A verser au compte de :\r\nMlle MINKOUE OBAME Anouchka\r\nRIB : 30004 01495 00000754427 56\r\nBanque : BNP PARIBAS\r\nIBAN : FR76 3000 4014 9500 0007 5442 756\r\nBIC : BNPAFRPPROU', '', 'Animation de la formation sur le langage XML Pour le compte de l’entreprise NTIC CENTER CORPORATION Pour les 3 journées du 27, 28 et 30 mars 2017', 3, '250', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, 'MOA25821', 'FR39831670831', '2019-07-16 00:00:00', 'TOUTPAIE SARL\r\nRue Rétimare, Imm. Adolph. Adam, N°42,\r\n76190 Yvetot, France\r\nN° siret: 831 670 831\r\n00013 \r\nGérante: Anouchka MINKOUE\r\nOBAME\r\nMail : minkoueobamea@gmail.com\r\nMobile : 06 58 89 85 31', 'Christelle RACINE\r\nResponsable Produits « Informatique » CEPPIC\r\n7 rue du Maréchal Juin 76130 Mont Saint Aignan\r\nTél. : 02 35 59 44 11 / Fax : 02 35 59 44 01', 'A verser au compte de TOUTPAIE\r\nRIB : 30004 00125 00010111146 36\r\nBanque : BNP PARIBAS\r\nIBAN : FR7630004001250001011114636\r\nBIC : BNPAFRPPXXX', '', 'Prestations de formations Html5/Css3, Html5/Css3 (5/7) Responsive web design, Projet individuel aux dates suivantes: 5, 6, 7, 8, 12, 13, 14, 15 février 2019 (8 jours)', 8, '300', '20', 'Frais de déplacement au réel', 8, '26', '20', NULL, NULL, NULL, NULL),
(6, 3, 'MOA25821', 'FR39831670831', '2019-07-16 00:00:00', 'TOUTPAIE SARL\r\nRue Rétimare, Imm. Adolph. Adam, N°42,\r\n76190 Yvetot, France\r\nN° siret: 831 670 831\r\n00013 \r\nGérante: Anouchka MINKOUE\r\nOBAME\r\nMail : minkoueobamea@gmail.com\r\nMobile : 06 58 89 85 31', 'Christelle RACINE\r\nResponsable Produits « Informatique » CEPPIC\r\n7 rue du Maréchal Juin 76130 Mont Saint Aignan\r\nTél. : 02 35 59 44 11 / Fax : 02 35 59 44 01', 'A verser au compte de TOUTPAIE\r\nRIB : 30004 00125 00010111146 36\r\nBanque : BNP PARIBAS\r\nIBAN : FR7630004001250001011114636\r\nBIC : BNPAFRPPXXX', '', 'Prestations de formations Html5/Css3, Html5/Css3 (5/7) Responsive web design, Projet individuel aux dates suivantes: 5, 6, 7, 8, 12, 13, 14, 15 février 2019 (8 jours)', 8, '300', '20', 'Frais de déplacement au réel', 8, '26', '20', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FE866410A76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_FE866410A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
