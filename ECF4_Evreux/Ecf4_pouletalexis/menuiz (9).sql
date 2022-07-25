-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 juil. 2022 à 07:57
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menuiz`
--
CREATE DATABASE IF NOT EXISTS `menuiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `menuiz`;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_address_adr`
--

DROP TABLE IF EXISTS `t_d_address_adr`;
CREATE TABLE `t_d_address_adr` (
  `ADR_ID` int(11) NOT NULL,
  `ADR_FIRSTNAME` varchar(1024) NOT NULL,
  `ADR_LASTNAME` varchar(1024) NOT NULL,
  `ADR_LINE1` varchar(1024) NOT NULL,
  `ADR_LINE2` varchar(1024) DEFAULT NULL,
  `ADR_LINE3` varchar(1024) DEFAULT NULL,
  `ADR_ZIPCODE` varchar(1024) NOT NULL,
  `ADR_CITY` varchar(1024) NOT NULL,
  `ADR_COUNTRY` varchar(1024) NOT NULL,
  `ADR_MAIL` varchar(1024) NOT NULL,
  `ADR_PHONE` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_address_adr`
--

INSERT INTO `t_d_address_adr` (`ADR_ID`, `ADR_FIRSTNAME`, `ADR_LASTNAME`, `ADR_LINE1`, `ADR_LINE2`, `ADR_LINE3`, `ADR_ZIPCODE`, `ADR_CITY`, `ADR_COUNTRY`, `ADR_MAIL`, `ADR_PHONE`) VALUES
(1, '', '', '3 route des coquelicots', NULL, NULL, '27400', 'Louviers', 'Haute-Normandie', 'adressemail@fictive.com', ''),
(2, 'Non renseigné', 'Non renseigné', 'Non renseigné', NULL, NULL, '00000', 'Non renseigné', 'Non renseigné', 'Non renseigné', ''),
(3, '', '', '43 rue des souches', NULL, NULL, '76540', 'ROUEN', 'Seine-maritime', 'vieilleadresse@msn.com', ''),
(4, '', '', '2bis rue de l\'eglise', NULL, NULL, '27110', 'Ecquetot', 'Haite-normandie', 'paysan27@hotmail.com', ''),
(5, '', '', '3 chemin de l\'escalier', NULL, NULL, '27100', 'Epegard', 'Haute-normandie', 'mailfictif@hotmail.com', ''),
(6, '', '', '1 rue du centre bourg', NULL, NULL, '27400', 'Louviers', 'Haute-normandie', 'mailinventer@hotmail.com', ''),
(7, '', '', '4 chemin de la maison', NULL, NULL, '13540', 'Marseille', ' Provence-Alpes-Côte d\'Azur', 'marseille13@hotmail.com', ''),
(15, 'Guillaume', 'Delacroix', '202 IMPASSE DU GEVAUDAN', '202 IMPASSE DU GEVAUDAN', '202 IMPASSE DU GEVAUDAN', '27190', 'LA BONNEVILLE SUR ITON', 'France', 'gdelacroix@hotmail.fr', '+33624543413'),
(16, 'toto', 'toto', 'toto', '24540', '', '24540', 'toto', 'fr', 'toto', '02'),
(17, 'tot', 'tot', 't', '', '', '24568', 'ger', 'fr', 'to', '02'),
(18, 'titi', 'titi', 'titi', '', '', 'titi', 'titi', 'titi', 'titi', 'titi'),
(19, 'Gwenael', 'Le Pierres', '2 rue des bistrots', '', '', '35450', 'landavran', 'France', 'gwenael56@hotmail.fr', '0666544656'),
(20, 'Olivier', 'Bednarek', '32 Le bois des Fortières', '', '', '27190', 'Glisolles', 'France', 'olivb3d@gmail.com', '0625233838'),
(21, 'Olivier', 'Bednarek', '32 Le bois des Fortières', '', '', '27190', 'Glisolles', 'France', 'olivb3d@gmail.com', '0625233838'),
(22, 'Olivier', 'Olivier', '32 Le bois des Fortières', '', '', '27190', 'Glisolles', 'France', 'olivier@olivier.fr', '0625233839'),
(23, 'Olivier', 'Oliviera', '34 Le bois des Fortières', '', '', '27190', 'Glisolles', 'France', 'olivier@oliviera.fr', '0625233840'),
(24, 'boby', 'dupont', '32 Le bois des Fortières', '', '', '27190', 'Glisolles', 'France', 'boby@dupont.fr', '0625233832'),
(25, 'Admin', 'Admin', '32 cite administrative', '', '', '27000', 'Evreux', 'France', 'admin@admin', '0232301530'),
(26, 'fv', 'dsfsdf', 'dsfvsdfsdfs', '', '', '25000', 'vdsvdxsv', 'vdsdsvdsv', 'dsfvsdfvsdf', '0202020202'),
(27, 'rgerf', 'gresvwresg', 'regsfgegre', '', '', '22500', 'sqqwsdc', 'sqwdcqsdws', 'vregreg', '0303030303');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_customerservicefolder_csf`
--

DROP TABLE IF EXISTS `t_d_customerservicefolder_csf`;
CREATE TABLE `t_d_customerservicefolder_csf` (
  `csf_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `PRD_ID` int(11) NOT NULL,
  `OSS_ID` int(11) NOT NULL,
  `OHR_ID` int(11) NOT NULL,
  `tsd_ID` int(11) NOT NULL,
  `csf_status` varchar(45) NOT NULL,
  `csf_description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_customerservicefolder_csf`
--

INSERT INTO `t_d_customerservicefolder_csf` (`csf_ID`, `USR_ID`, `PRD_ID`, `OSS_ID`, `OHR_ID`, `tsd_ID`, `csf_status`, `csf_description`) VALUES
(1, 1, 0, 0, 0, 0, 'TRUC', 'machin');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_diagsav_dsa`
--

DROP TABLE IF EXISTS `t_d_diagsav_dsa`;
CREATE TABLE `t_d_diagsav_dsa` (
  `dsa_ID` int(11) NOT NULL,
  `dsa_wording` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_diagsav_dsa`
--

INSERT INTO `t_d_diagsav_dsa` (`dsa_ID`, `dsa_wording`) VALUES
(1, 'N\'habite pas à l\'adresse indiquée'),
(2, 'Non présent à la livraison'),
(3, 'Erreur client lors de la commande'),
(4, 'Erreur de préparation'),
(5, 'Service après vente');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expeditiontype_ety`
--

DROP TABLE IF EXISTS `t_d_expeditiontype_ety`;
CREATE TABLE `t_d_expeditiontype_ety` (
  `ETY_ID` int(11) NOT NULL,
  `ETY_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expeditiontype_ety`
--

INSERT INTO `t_d_expeditiontype_ety` (`ETY_ID`, `ETY_WORDING`) VALUES
(1, 'COLISSIMO'),
(2, 'CHRONOPOST'),
(3, 'TRANSPORTEUR INTERNE');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_expedition_exp`
--

DROP TABLE IF EXISTS `t_d_expedition_exp`;
CREATE TABLE `t_d_expedition_exp` (
  `EXP_ID` int(11) NOT NULL,
  `EXP_WEIGTH` decimal(8,2) DEFAULT NULL,
  `EXP_TRACKINGNUMBER` varchar(1024) DEFAULT NULL,
  `EXP_SENTDATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_expedition_exp`
--

INSERT INTO `t_d_expedition_exp` (`EXP_ID`, `EXP_WEIGTH`, `EXP_TRACKINGNUMBER`, `EXP_SENTDATE`) VALUES
(1, '0.00', 'NaN', '2022-06-07 14:09:15'),
(2, '0.00', 'NaN', '2022-06-07 14:09:15'),
(3, '0.00', 'NaN', '2022-06-07 14:09:15'),
(4, '0.00', 'NaN', '2022-06-07 14:09:15'),
(5, '0.00', 'NaN', '2022-06-07 14:09:15'),
(6, '0.00', 'NaN', '2022-06-07 14:09:15'),
(8, '0.00', '', '2022-06-22 11:21:39'),
(9, '0.00', '', '2022-06-22 12:54:49'),
(10, '0.00', '', '2022-06-22 13:06:29'),
(11, '0.00', '', '2022-06-23 11:14:28'),
(12, '0.00', '', '2022-06-24 08:54:40'),
(13, '0.00', '', '2022-06-24 09:36:18'),
(14, '0.00', '', '2022-06-30 09:18:02'),
(15, '0.00', '', '2022-07-03 16:34:11'),
(16, '0.00', '', '2022-07-04 11:37:04'),
(17, '0.00', '', '2022-07-04 11:56:29');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_movestock_mvs`
--

DROP TABLE IF EXISTS `t_d_movestock_mvs`;
CREATE TABLE `t_d_movestock_mvs` (
  `mvs_ID` int(11) NOT NULL,
  `mvs_product` varchar(45) NOT NULL,
  `mvs_countbuy` decimal(8,2) NOT NULL,
  `mvs_countsell` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderdetails_odt`
--

DROP TABLE IF EXISTS `t_d_orderdetails_odt`;
CREATE TABLE `t_d_orderdetails_odt` (
  `OHR_ID` int(11) NOT NULL,
  `PRD_ID` int(11) NOT NULL,
  `EXP_ID` int(11) NOT NULL,
  `ODT_QUANTITY` int(11) NOT NULL,
  `ODT_ISCANCELED` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderdetails_odt`
--

INSERT INTO `t_d_orderdetails_odt` (`OHR_ID`, `PRD_ID`, `EXP_ID`, `ODT_QUANTITY`, `ODT_ISCANCELED`) VALUES
(1, 2, 1, 5, 0),
(1, 5, 1, 2, 0),
(2, 7, 2, 1, 0),
(2, 8, 2, 3, 0),
(3, 6, 3, 5, 0),
(3, 11, 3, 1, 0),
(4, 2, 4, 10, 0),
(4, 16, 4, 3, 0),
(5, 1, 5, 1, 0),
(5, 3, 5, 1, 0),
(5, 4, 5, 2, 0),
(5, 10, 5, 1, 0),
(6, 9, 6, 3, 0),
(6, 17, 6, 1, 0),
(10, 1, 8, 2, 0),
(11, 2, 9, 1, 0),
(11, 4, 9, 2, 0),
(12, 1, 10, 2, 0),
(13, 1, 11, 3, 0),
(14, 2, 12, 4, 0),
(15, 2, 13, 3, 0),
(15, 3, 13, 1, 0),
(16, 1, 14, 2, 0),
(17, 1, 15, 1, 0),
(17, 3, 15, 3, 0),
(17, 6, 15, 2, 0),
(18, 1, 16, 3, 0),
(19, 1, 17, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderheader_ohr`
--

DROP TABLE IF EXISTS `t_d_orderheader_ohr`;
CREATE TABLE `t_d_orderheader_ohr` (
  `OHR_ID` int(11) NOT NULL,
  `ADR_ID_LIV` int(11) NOT NULL,
  `ADR_ID_FAC` int(11) NOT NULL,
  `PMT_ID` int(11) NOT NULL,
  `OSS_ID` int(11) NOT NULL,
  `ETY_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `OHR_NUMBER` varchar(1024) NOT NULL,
  `OHR_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderheader_ohr`
--

INSERT INTO `t_d_orderheader_ohr` (`OHR_ID`, `ADR_ID_LIV`, `ADR_ID_FAC`, `PMT_ID`, `OSS_ID`, `ETY_ID`, `USR_ID`, `OHR_NUMBER`, `OHR_DATE`) VALUES
(1, 1, 1, 3, 2, 1, 1, '1', '2022-06-30 09:02:37'),
(2, 2, 1, 1, 3, 3, 2, '2', '2022-06-07 13:22:24'),
(3, 2, 2, 1, 3, 2, 3, '3', '2022-06-30 08:35:18'),
(4, 1, 1, 2, 1, 3, 1, '4', '2022-06-07 13:55:23'),
(5, 1, 1, 2, 2, 3, 2, '5', '2022-06-07 13:55:23'),
(6, 1, 1, 2, 4, 3, 3, '6', '2022-06-07 13:55:23'),
(10, 15, 15, 1, 1, 1, 4, 'ORDER10', '2022-06-22 11:21:39'),
(11, 17, 16, 1, 1, 1, 10, 'ORDER11', '2022-06-22 12:54:49'),
(12, 18, 18, 1, 1, 1, 11, 'ORDER12', '2022-06-22 13:06:29'),
(13, 19, 19, 1, 1, 1, 12, 'ORDER13', '2022-06-23 11:14:28'),
(14, 21, 21, 1, 1, 1, 14, 'ORDER14', '2022-06-24 08:54:40'),
(15, 23, 22, 1, 1, 2, 15, 'ORDER15', '2022-06-24 09:36:18'),
(16, 24, 24, 1, 1, 1, 21, 'ORDER16', '2022-06-30 09:18:02'),
(17, 25, 25, 2, 1, 3, 29, 'ORDER17', '2022-07-03 16:34:11'),
(18, 27, 26, 1, 1, 3, 33, 'ORDER18', '2022-07-04 11:37:04'),
(19, 26, 27, 2, 1, 2, 33, 'ORDER19', '2022-07-04 11:56:29');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_orderstatus_oss`
--

DROP TABLE IF EXISTS `t_d_orderstatus_oss`;
CREATE TABLE `t_d_orderstatus_oss` (
  `OSS_ID` int(11) NOT NULL,
  `OSS_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_orderstatus_oss`
--

INSERT INTO `t_d_orderstatus_oss` (`OSS_ID`, `OSS_WORDING`) VALUES
(1, 'En cours'),
(2, 'Annulé'),
(3, 'Livré totalement'),
(4, 'Livré partiellement');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_paymenttype_pmt`
--

DROP TABLE IF EXISTS `t_d_paymenttype_pmt`;
CREATE TABLE `t_d_paymenttype_pmt` (
  `PMT_ID` int(11) NOT NULL,
  `PMT_WORDING` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_paymenttype_pmt`
--

INSERT INTO `t_d_paymenttype_pmt` (`PMT_ID`, `PMT_WORDING`) VALUES
(1, 'CB'),
(2, 'ESPECE'),
(3, 'CHEQUE'),
(4, 'VIREMENT');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_productkit_kit`
--

DROP TABLE IF EXISTS `t_d_productkit_kit`;
CREATE TABLE `t_d_productkit_kit` (
  `PRD_ID_KIT` int(11) NOT NULL,
  `PRD_ID_COMPONENT` int(11) NOT NULL,
  `KIT_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_productkit_kit`
--

INSERT INTO `t_d_productkit_kit` (`PRD_ID_KIT`, `PRD_ID_COMPONENT`, `KIT_QUANTITY`) VALUES
(8, 1, 5),
(8, 2, 4),
(9, 1, 3),
(9, 3, 3),
(10, 4, 3),
(10, 5, 5),
(11, 6, 2),
(11, 7, 1),
(12, 4, 3),
(12, 7, 2),
(13, 2, 10),
(13, 6, 3),
(16, 1, 5),
(16, 5, 2),
(17, 1, 2),
(17, 3, 5),
(18, 2, 2),
(18, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_d_producttype_pty`
--

DROP TABLE IF EXISTS `t_d_producttype_pty`;
CREATE TABLE `t_d_producttype_pty` (
  `PTY_ID` int(11) NOT NULL,
  `PTY_DESCRIPTION` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_producttype_pty`
--

INSERT INTO `t_d_producttype_pty` (`PTY_ID`, `PTY_DESCRIPTION`) VALUES
(1, 'UNITAIRE'),
(2, 'KIT');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_product_prd`
--

DROP TABLE IF EXISTS `t_d_product_prd`;
CREATE TABLE `t_d_product_prd` (
  `PRD_ID` int(11) NOT NULL,
  `SPL_ID` int(11) NOT NULL,
  `PTY_ID` int(11) NOT NULL,
  `PRD_DESCRIPTION` varchar(1024) NOT NULL,
  `PRD_GUARANTEE` smallint(6) NOT NULL,
  `PRD_PICTURE` longtext DEFAULT NULL,
  `PRD_PRICE` decimal(8,2) DEFAULT NULL,
  `PRD_CODE` varchar(45) NOT NULL,
  `PRD_warrantly` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_product_prd`
--

INSERT INTO `t_d_product_prd` (`PRD_ID`, `SPL_ID`, `PTY_ID`, `PRD_DESCRIPTION`, `PRD_GUARANTEE`, `PRD_PICTURE`, `PRD_PRICE`, `PRD_CODE`, `PRD_warrantly`) VALUES
(1, 1, 1, 'PRODUIT_1', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '19.99', 'PRODUIT_1', 'Garantie 10 ans'),
(2, 2, 1, 'PRODUIT_2', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '14.99', 'PRODUIT_2', 'Garantie 10 ans'),
(3, 3, 1, 'PRODUIT_3', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '16.99', 'PRODUIT_3', 'Garantie 10 ans'),
(4, 1, 1, 'PRODUIT_4', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '29.99', 'PRODUIT_4', 'Garantie 10 ans'),
(5, 2, 1, 'PRODUIT_5', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '34.99', 'PRODUIT_5', 'Garantie 10 ans'),
(6, 4, 1, 'PRODUIT_6', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '99.99', 'PRODUIT_6', 'Garantie 10 ans'),
(7, 5, 1, 'PRODUIT_7', 24, 'https://www.mistermenuiserie.com/media/catalog/product/m/m/mms-orleans-coulissant_1.png?optimize=low&fit=bounds&height=648&width=648&canvas=648:648&format=jpeg', '9.99', 'PRODUIT_7', 'Garantie 10 ans'),
(8, 1, 2, 'KIT_1', 24, NULL, '149.99', 'KIT_1', 'Garantie 10 ans'),
(9, 1, 2, 'KIT_2', 24, NULL, '89.99', 'KIT_2', 'Garantie 10 ans'),
(10, 2, 2, 'KIT_3', 24, NULL, '289.99', 'KIT_3', 'Garantie 10 ans'),
(11, 2, 2, 'KIT_4', 24, NULL, '199.99', 'KIT_4', 'Garantie 10 ans'),
(12, 1, 2, 'KIT_5', 24, NULL, '99.99', 'KIT_5', 'Garantie 10 ans'),
(13, 3, 2, 'KIT_6', 24, NULL, '399.99', 'KIT_6', 'Garantie 10 ans'),
(16, 6, 2, 'KIT_7', 24, NULL, '259.99', 'KIT_7', 'Garantie 10 ans'),
(17, 6, 2, 'KIT_8', 24, NULL, '109.99', 'KIT_8', 'Garantie 10 ans'),
(18, 6, 2, 'KIT_9', 24, NULL, '219.99', 'KIT_9', 'Garantie 10 ans');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_supplier_spl`
--

DROP TABLE IF EXISTS `t_d_supplier_spl`;
CREATE TABLE `t_d_supplier_spl` (
  `SPL_ID` int(11) NOT NULL,
  `SPL_NAME` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_supplier_spl`
--

INSERT INTO `t_d_supplier_spl` (`SPL_ID`, `SPL_NAME`) VALUES
(1, 'FOURNISSEUR1'),
(2, 'FOURNISSEUR2'),
(3, 'FOURNISSEUR3'),
(4, 'FOURNISSEUR4'),
(5, 'FOURNISSEUR5'),
(6, 'Non renseigné');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_tickethistory_thi`
--

DROP TABLE IF EXISTS `t_d_tickethistory_thi`;
CREATE TABLE `t_d_tickethistory_thi` (
  `thi_ID` int(11) NOT NULL,
  `thi_interventionTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_ticketsavdetail_tsd`
--

DROP TABLE IF EXISTS `t_d_ticketsavdetail_tsd`;
CREATE TABLE `t_d_ticketsavdetail_tsd` (
  `tsd_ID` int(11) NOT NULL,
  `thi_ID` int(11) NOT NULL,
  `PRD_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `tsd_description` varchar(45) NOT NULL,
  `tsd_IP` varchar(15) NOT NULL,
  `dsa_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_d_usertype_uty`
--

DROP TABLE IF EXISTS `t_d_usertype_uty`;
CREATE TABLE `t_d_usertype_uty` (
  `UTY_ID` int(11) NOT NULL,
  `UTY_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_d_usertype_uty`
--

INSERT INTO `t_d_usertype_uty` (`UTY_ID`, `UTY_TYPE`) VALUES
(1, 'VISITOR'),
(2, 'ADMIN'),
(3, 'SAV'),
(4, 'HOTLINE');

-- --------------------------------------------------------

--
-- Structure de la table `t_d_user_usr`
--

DROP TABLE IF EXISTS `t_d_user_usr`;
CREATE TABLE `t_d_user_usr` (
  `USR_ID` int(11) NOT NULL,
  `ADR_ID` int(11) DEFAULT NULL,
  `USR_MAIL` varchar(1024) NOT NULL,
  `USR_PASSWORD` varchar(1024) NOT NULL,
  `USR_FIRSTNAME` varchar(1024) NOT NULL,
  `USR_LASTNAME` varchar(1024) NOT NULL,
  `UTY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_d_user_usr`
--

INSERT INTO `t_d_user_usr` (`USR_ID`, `ADR_ID`, `USR_MAIL`, `USR_PASSWORD`, `USR_FIRSTNAME`, `USR_LASTNAME`, `UTY_ID`) VALUES
(1, 1, 'efzefz@zfefze.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'Paul', 'Marchand', 4),
(2, 3, 'sefqBZN@sfq.com', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 'Bruno', 'Laporte', 1),
(3, 4, 'drgfagra@aerga.com', '1119cfd37ee247357e034a08d844eea25f6fd20f', 'Benoit', 'Gras', 1),
(4, NULL, 'gdelacroix@hotmail.fr', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'Delacroix', 'Guillaume', 2),
(5, NULL, 'test@hotmail.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test', 'Test', 1),
(6, NULL, 'rmenard@hotmail.fr', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'Menard', 'Robert', 1),
(7, NULL, 'pu@hotmail.fr', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'popo', 'pupu', 1),
(8, NULL, 'pu@gmail.com', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'pi', 'pa', 1),
(9, NULL, 'ft@hotmail.fr', 'b70f7d0e2acef2e0fa1c6f117e3c11e0d7082232', 'ft', 'ft', 1),
(10, NULL, 'toto@gmail.com', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'toto', 'toto', 1),
(11, NULL, 'titi@gmail.com', 'f7e79ca8eb0b31ee4d5d6c181416667ffee528ed', 'titi', 'titi', 1),
(12, NULL, 'gwenael56@hotmail.fr', '613b85c87eb0ebd8f645a65b0b5dba468d968233', 'le Pierres', 'Gwenael', 4),
(13, NULL, 'gwenael56@hotmail.fr', '613b85c87eb0ebd8f645a65b0b5dba468d968233', 'le pierres', 'Gwenael', 1),
(14, NULL, 'olivb3d@gmail.com', '5d59964923ee5b1b3700085446b7d84a85e1045e', 'Bednarek', 'Olivier', 2),
(15, NULL, 'olivier@olivier.fr', '91d7ef0f246558051457a5ec860dd6746bcb2fe0', 'Olivier', 'Olivier', 3),
(16, NULL, 'olivier@olivier.fr', '77cccf0d7a72ee0036f6f1a239d5c47ee8799014', 'Olivier', 'Olivier', 2),
(17, NULL, 'gege@olivier.fr', '76c1da08be458687d0066397d08e4f7ea9894377', 'gerard', 'olivier', 3),
(18, NULL, 'bed@olivier.fr', '0e831999c6d5d44f6b8926fe6575c1fd5d63dc6e', 'Olivier', 'Bed', 3),
(19, NULL, 'bedo@olivier.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Bedard', 'Bed', 3),
(20, NULL, 'olivb3d@gmail.com', '5d59964923ee5b1b3700085446b7d84a85e1045e', 'Bednarek', 'Olivier', 4),
(21, NULL, 'boby@dupont.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'dupont', 'boby', 1),
(22, NULL, 'hot@hotline.com', 'd1164167d55edfa14d29de79c2d75663806da35a', 'Hot', 'Hotline', 4),
(23, NULL, 'sav@sav.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'sav', 'sav', 3),
(24, NULL, 'savdeux@sav.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'savdeux', 'sav', 3),
(25, NULL, 'hotline@hot.fr', 'd1164167d55edfa14d29de79c2d75663806da35a', 'Hotline', 'Hot', 4),
(26, NULL, 'hotdeux@hotline.fr', 'd1164167d55edfa14d29de79c2d75663806da35a', 'Hotdeux', 'Hotline', 4),
(27, NULL, 'hotlinetrois@hotline.com', 'd1164167d55edfa14d29de79c2d75663806da35a', 'Hotline', 'Hotlinetrois', 4),
(28, NULL, 'olivb3d@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'olivia', 'benard', 1),
(29, NULL, 'admin@admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 2),
(31, NULL, 'dskffdssdffds@dfsfsddsff.net', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'truc', 'machin', 1),
(32, NULL, 'dzssqdczadzsdqzsdaqdszs@qsddsq.net', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'dszsqddza', 'zadqsadzaqs', 1),
(33, NULL, 'zedaezdzaedqzzadq', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'azeazqs', 'zaedzaedaz', 1),
(34, NULL, 'fdqsfdqsfqdsfqdsfdfsq564564564', 'd1164167d55edfa14d29de79c2d75663806da35a', 'fdsfdfd', 'dsfqfdsqqds', 4),
(35, NULL, 'dfsfdsdfsqqdsffds894fdsq864fd84qfds94fdsq984', 'e07e5146068d1e7f2307c7ebcbaa1286d256e6c9', 'qfdsdfqsdsfqfds', 'dqfsqfdsfqqfdsqfds', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  ADD PRIMARY KEY (`ADR_ID`);

--
-- Index pour la table `t_d_customerservicefolder_csf`
--
ALTER TABLE `t_d_customerservicefolder_csf`
  ADD PRIMARY KEY (`csf_ID`),
  ADD KEY `USR_ID` (`USR_ID`),
  ADD KEY `PRD_ID` (`PRD_ID`),
  ADD KEY `OSS_ID` (`OSS_ID`),
  ADD KEY `OHR_ID` (`OHR_ID`),
  ADD KEY `tsd_ID` (`tsd_ID`);

--
-- Index pour la table `t_d_diagsav_dsa`
--
ALTER TABLE `t_d_diagsav_dsa`
  ADD PRIMARY KEY (`dsa_ID`),
  ADD UNIQUE KEY `dsa_ID` (`dsa_ID`);

--
-- Index pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  ADD PRIMARY KEY (`ETY_ID`);

--
-- Index pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  ADD PRIMARY KEY (`EXP_ID`);

--
-- Index pour la table `t_d_movestock_mvs`
--
ALTER TABLE `t_d_movestock_mvs`
  ADD PRIMARY KEY (`mvs_ID`),
  ADD UNIQUE KEY `mvs_ID` (`mvs_ID`);

--
-- Index pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD PRIMARY KEY (`OHR_ID`,`PRD_ID`,`EXP_ID`),
  ADD KEY `FK_CONCERNE2` (`PRD_ID`),
  ADD KEY `FK_CONCERNE3` (`EXP_ID`);

--
-- Index pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD PRIMARY KEY (`OHR_ID`),
  ADD KEY `FK_A_POUR_PAIEMENT` (`PMT_ID`),
  ADD KEY `FK_A_POUR_STATUT` (`OSS_ID`),
  ADD KEY `FK_A_POUR_TYPE_EXPEDITION` (`ETY_ID`),
  ADD KEY `FK_COMMANDE` (`USR_ID`),
  ADD KEY `FK_EST_FACTURE` (`ADR_ID_FAC`),
  ADD KEY `FK_EST_LIVRE` (`ADR_ID_LIV`);

--
-- Index pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  ADD PRIMARY KEY (`OSS_ID`);

--
-- Index pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  ADD PRIMARY KEY (`PMT_ID`);

--
-- Index pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD PRIMARY KEY (`PRD_ID_KIT`,`PRD_ID_COMPONENT`),
  ADD KEY `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` (`PRD_ID_COMPONENT`);

--
-- Index pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  ADD PRIMARY KEY (`PTY_ID`);

--
-- Index pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD PRIMARY KEY (`PRD_ID`),
  ADD UNIQUE KEY `PRD_ID` (`PRD_ID`),
  ADD KEY `FK_EST_DE_TYPE` (`PTY_ID`),
  ADD KEY `FK_PROVIENT_DE` (`SPL_ID`);

--
-- Index pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  ADD PRIMARY KEY (`SPL_ID`),
  ADD UNIQUE KEY `SPL_ID` (`SPL_ID`);

--
-- Index pour la table `t_d_tickethistory_thi`
--
ALTER TABLE `t_d_tickethistory_thi`
  ADD PRIMARY KEY (`thi_ID`),
  ADD UNIQUE KEY `thi_ID` (`thi_ID`);

--
-- Index pour la table `t_d_ticketsavdetail_tsd`
--
ALTER TABLE `t_d_ticketsavdetail_tsd`
  ADD PRIMARY KEY (`tsd_ID`),
  ADD UNIQUE KEY `tsd_ID` (`tsd_ID`),
  ADD UNIQUE KEY `dsa_ID` (`dsa_ID`),
  ADD KEY `thi_ID` (`thi_ID`),
  ADD KEY `PRD_ID` (`PRD_ID`),
  ADD KEY `USR_ID` (`USR_ID`);

--
-- Index pour la table `t_d_usertype_uty`
--
ALTER TABLE `t_d_usertype_uty`
  ADD PRIMARY KEY (`UTY_ID`);

--
-- Index pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  ADD PRIMARY KEY (`USR_ID`),
  ADD UNIQUE KEY `USR_ID` (`USR_ID`),
  ADD KEY `FK_T_D_USER_A_COMME_I_T_D_ADDR3` (`ADR_ID`),
  ADD KEY `FK_UserType` (`UTY_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_d_address_adr`
--
ALTER TABLE `t_d_address_adr`
  MODIFY `ADR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `t_d_expeditiontype_ety`
--
ALTER TABLE `t_d_expeditiontype_ety`
  MODIFY `ETY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_d_expedition_exp`
--
ALTER TABLE `t_d_expedition_exp`
  MODIFY `EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  MODIFY `OHR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  MODIFY `OHR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `t_d_orderstatus_oss`
--
ALTER TABLE `t_d_orderstatus_oss`
  MODIFY `OSS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_paymenttype_pmt`
--
ALTER TABLE `t_d_paymenttype_pmt`
  MODIFY `PMT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  MODIFY `PRD_ID_KIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `t_d_producttype_pty`
--
ALTER TABLE `t_d_producttype_pty`
  MODIFY `PTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  MODIFY `PRD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `t_d_supplier_spl`
--
ALTER TABLE `t_d_supplier_spl`
  MODIFY `SPL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_d_usertype_uty`
--
ALTER TABLE `t_d_usertype_uty`
  MODIFY `UTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_d_user_usr`
--
ALTER TABLE `t_d_user_usr`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_d_movestock_mvs`
--
ALTER TABLE `t_d_movestock_mvs`
  ADD CONSTRAINT `td_product_prd` FOREIGN KEY (`mvs_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`);

--
-- Contraintes pour la table `t_d_orderdetails_odt`
--
ALTER TABLE `t_d_orderdetails_odt`
  ADD CONSTRAINT `FK_CONCERNE1` FOREIGN KEY (`OHR_ID`) REFERENCES `t_d_orderheader_ohr` (`OHR_ID`),
  ADD CONSTRAINT `FK_CONCERNE2` FOREIGN KEY (`PRD_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_CONCERNE3` FOREIGN KEY (`EXP_ID`) REFERENCES `t_d_expedition_exp` (`EXP_ID`);

--
-- Contraintes pour la table `t_d_orderheader_ohr`
--
ALTER TABLE `t_d_orderheader_ohr`
  ADD CONSTRAINT `FK_A_POUR_PAIEMENT` FOREIGN KEY (`PMT_ID`) REFERENCES `t_d_paymenttype_pmt` (`PMT_ID`),
  ADD CONSTRAINT `FK_A_POUR_STATUT` FOREIGN KEY (`OSS_ID`) REFERENCES `t_d_orderstatus_oss` (`OSS_ID`),
  ADD CONSTRAINT `FK_A_POUR_TYPE_EXPEDITION` FOREIGN KEY (`ETY_ID`) REFERENCES `t_d_expeditiontype_ety` (`ETY_ID`),
  ADD CONSTRAINT `FK_COMMANDE` FOREIGN KEY (`USR_ID`) REFERENCES `t_d_user_usr` (`USR_ID`),
  ADD CONSTRAINT `FK_EST_FACTURE` FOREIGN KEY (`ADR_ID_FAC`) REFERENCES `t_d_address_adr` (`ADR_ID`),
  ADD CONSTRAINT `FK_EST_LIVRE` FOREIGN KEY (`ADR_ID_LIV`) REFERENCES `t_d_address_adr` (`ADR_ID`);

--
-- Contraintes pour la table `t_d_productkit_kit`
--
ALTER TABLE `t_d_productkit_kit`
  ADD CONSTRAINT `FK_SE_COMPOSE` FOREIGN KEY (`PRD_ID_KIT`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `FK_T_D_PROD_SE_COMPOS_T_D_PROD2` FOREIGN KEY (`PRD_ID_COMPONENT`) REFERENCES `t_d_product_prd` (`PRD_ID`);

--
-- Contraintes pour la table `t_d_product_prd`
--
ALTER TABLE `t_d_product_prd`
  ADD CONSTRAINT `FK_EST_DE_TYPE` FOREIGN KEY (`PTY_ID`) REFERENCES `t_d_producttype_pty` (`PTY_ID`),
  ADD CONSTRAINT `FK_PROVIENT_DE` FOREIGN KEY (`SPL_ID`) REFERENCES `t_d_supplier_spl` (`SPL_ID`);

--
-- Contraintes pour la table `t_d_tickethistory_thi`
--
ALTER TABLE `t_d_tickethistory_thi`
  ADD CONSTRAINT `t_d_user_usr` FOREIGN KEY (`thi_ID`) REFERENCES `t_d_user_usr` (`USR_ID`);

--
-- Contraintes pour la table `t_d_ticketsavdetail_tsd`
--
ALTER TABLE `t_d_ticketsavdetail_tsd`
  ADD CONSTRAINT `t_d_diagsavdetail` FOREIGN KEY (`tsd_ID`) REFERENCES `t_d_diagsav_dsa` (`dsa_ID`),
  ADD CONSTRAINT `t_d_historydetail_thi` FOREIGN KEY (`tsd_ID`) REFERENCES `t_d_tickethistory_thi` (`thi_ID`),
  ADD CONSTRAINT `t_d_product_prd` FOREIGN KEY (`tsd_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `t_d_product_prd_p` FOREIGN KEY (`tsd_ID`) REFERENCES `t_d_product_prd` (`PRD_ID`),
  ADD CONSTRAINT `t_d_user_usr_sup` FOREIGN KEY (`tsd_ID`) REFERENCES `t_d_user_usr` (`USR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
