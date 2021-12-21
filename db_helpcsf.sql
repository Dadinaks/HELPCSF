-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 déc. 2021 à 14:27
-- Version du serveur :  10.6.0-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_helpcsf`
--

DELIMITER $$
--
-- Fonctions
--
DROP FUNCTION IF EXISTS `TOTAL_WEEKDAYS`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `TOTAL_WEEKDAYS` (`date1` DATE, `date2` DATE) RETURNS INT(11) NO SQL
RETURN ABS(DATEDIFF(date2, date1))
     - ABS(DATEDIFF(ADDDATE(date2, INTERVAL 1 - DAYOFWEEK(date2) DAY),
                    ADDDATE(date1, INTERVAL 1 - DAYOFWEEK(date1) DAY))) / 7 * 2
     - (DAYOFWEEK(IF(date1 < date2, date1, date2)) = 1)
     - (DAYOFWEEK(IF(date1 > date2, date1, date2)) = 7)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `idAgence` int(11) NOT NULL AUTO_INCREMENT,
  `codeAgence` int(5) NOT NULL,
  `agence` varchar(250) NOT NULL,
  PRIMARY KEY (`idAgence`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idAgence`, `codeAgence`, `agence`) VALUES
(1, 1, 'BNI ANALAKELY'),
(2, 2, 'BNI ANTSAHAVOLA'),
(3, 3, 'BNI ANDRAVOAHANGY'),
(4, 4, 'BNI ANTSAKAVIRO'),
(5, 5, 'BNI 67 HA'),
(6, 6, 'BNI GALAXY ANDRAHARO'),
(7, 7, 'BNI ZENITH ANKORONDRANO'),
(8, 8, 'BNI TANJOMBATO'),
(9, 9, 'BNI IMERINAFOVOANY'),
(10, 10, 'BNI BEHORIRIKA'),
(11, 11, 'BNI AMPASAMPITO'),
(12, 12, 'BNI ANALAMAHITSY'),
(13, 13, 'BNI AMBATONDRAZAKA'),
(14, 14, 'BNI ANTALAHA'),
(15, 15, 'BNI ANTSIRABE'),
(16, 16, 'BNI ANTSIRANANA'),
(17, 17, 'BNI TOLAGNARO'),
(18, 18, 'BNI MAHAJANGA'),
(19, 19, 'BNI NOSY BE'),
(20, 20, 'BNI TOAMASINA'),
(21, 21, 'BNI ANTSOHIHY'),
(22, 22, 'BNI AMBANJA'),
(23, 23, 'BNI AMBATOLAMPY'),
(24, 24, 'BNI FARAFANGANA'),
(25, 25, 'BNI FENERIVE EST'),
(26, 26, 'BNI SAMBAVA'),
(27, 27, 'BNI MANAKARA'),
(28, 28, 'BNI MANANJARY'),
(29, 29, 'BNI MORONDAVA'),
(30, 30, 'BNI IHOSY'),
(31, 31, 'BNI ANDAPA'),
(32, 32, 'BNI AMBILOBE'),
(33, 33, 'BNI VOHEMAR'),
(34, 34, 'BNI TANAMBE'),
(35, 35, 'BNI AMBOHIMENA'),
(36, 36, 'BNI AMPASAMBAZAHA'),
(37, 37, 'BNI STREAM LINER TOAMASINA'),
(38, 38, 'BNI MAINTIRANO'),
(39, 39, 'BNI TSIROANOMANDIDY'),
(40, 41, 'BNI TOLIARA'),
(41, 42, 'BNI PORT- BERGE'),
(42, 43, 'BNI MORAMANGA'),
(43, 44, 'BNI'),
(44, 45, 'BNI ILAKAKA'),
(45, 46, 'BNI AMBALAVAO'),
(46, 47, 'BNI MAROANTSETRA'),
(47, 48, 'BNI MIARINARIVO'),
(48, 49, 'BNI MAHITSY'),
(49, 50, 'BNI AMBOSITRA'),
(50, 52, 'BNI FIANARANTSOA'),
(51, 53, 'BNI AMPARAFARAVOLA'),
(52, 54, 'BNI ANKARANA DIEGO II'),
(53, 55, 'BNI TULEAR SANFILY'),
(54, 56, 'BNI MAHANORO'),
(55, 57, 'BNI MAMPIKONY'),
(56, 58, 'BNI BRICKAVILLE'),
(57, 59, 'BNI MAROVOAY'),
(58, 60, 'BNI VATOMANDRY'),
(59, 61, 'BNI SOANIERANA-IVONGO'),
(60, 62, 'BNI  ANTANIMASAJA MAJUNGA 3'),
(61, 63, 'BNI NOSY BE LE MALL'),
(62, 64, 'BNI MAEVATANANA'),
(63, 65, 'BNI AMBANIDIA'),
(64, 66, 'BNI ANOSIZATO'),
(65, 67, 'BNI TSARALALANA'),
(66, 68, 'BNI AMBONDRONA'),
(67, 69, 'BNI MAHAMASINA'),
(68, 70, 'BNI ITAOSY'),
(69, 71, 'BNI TSIMBAZAZA'),
(70, 72, 'BNI AMPITATAFIKA'),
(71, 73, 'BNI AMBOHIMIANDRA'),
(72, 74, 'BNI IVANDRY'),
(73, 75, 'BNI 67 HA NORD'),
(74, 76, 'BNI AMBOHIPO'),
(75, 77, 'BNI ANDOHARANOFOTSY'),
(76, 78, 'BNI MAJUNGA TSARAMANDROSO'),
(77, 79, 'BNI TOAMASINA BAZARY KELY'),
(78, 80, 'BNI AKOOR DIGUE'),
(79, 81, 'BNI AMPEFILOHA'),
(80, 82, 'BNI ANOSIMASINA'),
(81, 83, 'BNI AMBODIVONA'),
(82, 84, 'BNI SABOTSY NAMEHANA'),
(83, 85, 'BNI ANOSIBE'),
(84, 86, 'BNI ARCADE'),
(85, 87, 'BNI IVATO'),
(86, 88, 'BNI AMBATOBE'),
(87, 89, 'BNI ECOLE MAHAMASINA'),
(88, 90, 'BNI ANTANINARENINA'),
(89, 91, 'BNI MAHAZO'),
(90, 92, 'BNI ANDREFANA/RY'),
(91, 93, 'BNI ANTANIMENA'),
(92, 94, 'BNI AMBOHIMANARINA'),
(93, 95, 'BNI AMBOHIBAO'),
(94, 96, 'BNI ZENITH PREMIUM'),
(95, 97, 'BNI CAE TANA'),
(96, 98, 'BNI CAE TAMATAVE'),
(97, 99, 'BNI CARTE MVOLA'),
(98, 189, 'BNI'),
(99, 90000, 'BNI SIEGE'),
(100, 90001, 'BNI_DGE_ZENITH'),
(101, 90002, 'BNI_DMI_ZENITH'),
(102, 90003, 'BNI_DMC_SIEGE'),
(103, 90004, 'BNI_DAOI_ZENITH'),
(104, 90005, 'BNI_CAE_TOAMASINA'),
(105, 90340, 'BNI SIEGE SPOTY'),
(106, 91000, 'BNI_CAE_ZENITH'),
(107, 95000, 'BNI KRED'),
(108, 99999, 'SITE CENTRAL');

-- --------------------------------------------------------

--
-- Structure de la table `client_sensible`
--

DROP TABLE IF EXISTS `client_sensible`;
CREATE TABLE IF NOT EXISTS `client_sensible` (
  `idClient_Sensible` int(11) NOT NULL AUTO_INCREMENT,
  `agence` int(11) NOT NULL,
  `fc` varchar(4) NOT NULL COMMENT 'Code gestionaire',
  `responsable` varchar(200) NOT NULL COMMENT 'nom + code gestionnaire',
  `direction` varchar(150) NOT NULL COMMENT 'DMPP, DMEI, DRH',
  `cli` int(7) NOT NULL COMMENT 'Code client',
  `date_eer` date NOT NULL COMMENT 'date entrée en relation',
  `nom` varchar(150) NOT NULL COMMENT 'nom Client',
  `pre` varchar(150) DEFAULT NULL COMMENT 'prénoms client',
  `seg` int(3) DEFAULT NULL COMMENT 'Code segment',
  `segment` varchar(100) DEFAULT NULL COMMENT 'libelle segment',
  `categ` varchar(100) DEFAULT NULL COMMENT 'A, B, C, D, E, F, G',
  `categ_int` varchar(100) DEFAULT NULL COMMENT 'categ A : Particuliers, B : Professionnels, C : Entreprises, D: Institutionnels, E : Associations, F : Banques, G : Etats, Collectivites',
  `relation_client` varchar(100) DEFAULT NULL COMMENT 'R, S',
  `date_validite_rrc` date DEFAULT NULL,
  `mle_valideur_rrc` varchar(45) DEFAULT NULL,
  `mettre_a_jour` varchar(3) NOT NULL COMMENT 'Oui / Non',
  `sec` varchar(45) DEFAULT NULL COMMENT 'Code secteur d''activité',
  `sect_activite` varchar(250) DEFAULT NULL COMMENT 'libellé secteur d''activité',
  `code_profession` varchar(20) NOT NULL,
  `profession` varchar(250) NOT NULL,
  `code_pro_act_annexe` varchar(20) NOT NULL,
  `profession_activite_annexe` varchar(250) DEFAULT NULL,
  `ppe` varchar(3) NOT NULL COMMENT 'O / N',
  `code_nationalite` varchar(20) NOT NULL,
  `nationalite` varchar(250) NOT NULL,
  `code_pays_residence` varchar(20) NOT NULL,
  `pays_residence` varchar(250) NOT NULL,
  `etat_financier` varchar(3) NOT NULL COMMENT 'Oui / Non',
  `date_dernier_crd` date DEFAULT NULL,
  `sans_mvt_crd` varchar(3) DEFAULT NULL COMMENT 'Oui / Non',
  `critere` varchar(50) DEFAULT NULL COMMENT ' critère : S_amplitude,PEP,act_sensible,prof_sensible,nat_sensible,res_sensible,comb_sensible',
  `profession_activite_annexe_sensible` int(11) DEFAULT NULL,
  `surveillance_flux` varchar(3) NOT NULL COMMENT 'OUI/NON',
  `idRapport` int(11) NOT NULL,
  `idTrimestre` int(11) DEFAULT NULL,
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idClient_Sensible`),
  KEY `fk_sensible_rapport` (`idRapport`),
  KEY `fk_sensible_trimestre` (`idTrimestre`),
  KEY `fk_sensible_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `idDemande` int(11) NOT NULL AUTO_INCREMENT,
  `dateDemande` datetime NOT NULL,
  `objet` text NOT NULL,
  `contenu` text NOT NULL,
  `envoyeur` int(11) NOT NULL,
  `statutDemande` varchar(50) NOT NULL DEFAULT 'Envoyé',
  `fichier` text DEFAULT NULL,
  PRIMARY KEY (`idDemande`),
  KEY `fk_demande utilisateur` (`envoyeur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`idDemande`, `dateDemande`, `objet`, `contenu`, `envoyeur`, `statutDemande`, `fichier`) VALUES
(1, '2021-01-05 13:36:37', 'Test 1 ', '<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n', 2, 'Abandonné', 'vary.png'),
(2, '2021-01-05 14:08:57', 'Test 2', '<p>Bonjour,</p>\r\n\r\n<p>ceci est un test</p>\r\n', 2, 'Recu', 'erreur.jpg'),
(3, '2021-01-05 14:19:09', 'Test 3', '<p>Bonjour,</p>\r\n\r\n<p>aaaaaaaaaaaaaaa zeaz eazqsdssssssssssss qsdq</p>\r\n\r\n<p>dqsdqddq dq hlj:&nbsp; klm</p>\r\n\r\n<p>dsqdqsq dq dsqdq</p>\r\n\r\n<p>dqsdsqdqssdqd</p>\r\n', 2, 'Refuse', 'Capture_reafectation_fiche.PNG,Capture_fanasa_prorogation.PNG,Capture_prorogation.PNG'),
(4, '2021-01-11 14:37:29', 'Test fjk qjsdbqsdl', '<p>&nbsp;dsqdqusdlq dq dqsojdmq: nq f:qjofqf n</p>\r\n', 2, 'Recu', NULL),
(5, '2021-01-11 14:37:43', '^fnklnq dsqklndk:q ', '<p>&nbsp;dysqdbsqj,kd bdhiqhd ljld</p>\r\n', 2, 'Recu', NULL),
(6, '2021-01-11 15:09:48', 'sdqsqd', '<p>qsdsqdqsdqs</p>\r\n', 2, 'Recu', NULL),
(7, '2021-01-14 11:55:37', 'Test pour une échange', '<p>Bonjour,</p>\r\n\r\n<h1><a href=\"https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/dql-doctrine-query-language.html#doctrine-query-language\">Doctrine Query Language</a></h1>\r\n\r\n<p>DQL stands for Doctrine Query Language and is an Object Query Language derivative that is very similar to the Hibernate Query Language (HQL) or the Java Persistence Query Language (JPQL).</p>\r\n\r\n<p>In essence, DQL provides powerful querying capabilities over your object model. Imagine all your objects lying around in some storage (like an object database). When writing DQL queries, think about querying that storage to pick a certain subset of your objects.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<p>A common mistake for beginners is to mistake DQL for being just some form of SQL and therefore trying to use table names and column names or join arbitrary tables together in a query. You need to think about DQL as a query language for your object model, not for your relational schema.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>DQL is case in-sensitive, except for namespace, class and field names, which are case sensitive.</p>\r\n\r\n<h2><a href=\"https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/dql-doctrine-query-language.html#types-of-dql-queries\">Types of DQL queries</a></h2>\r\n\r\n<p>DQL as a query language has SELECT, UPDATE and DELETE constructs that map to their corresponding SQL statement types. INSERT statements are not allowed in DQL, because entities and their relations have to be introduced into the persistence context through&nbsp;<code>EntityManager#persist()</code>&nbsp;to ensure consistency of your object model.</p>\r\n\r\n<p>DQL SELECT statements are a very powerful way of retrieving parts of your domain model that are not accessible via associations. Additionally they allow you to retrieve entities and their associations in one single SQL select statement which can make a huge difference in performance compared to using several queries.</p>\r\n\r\n<p>DQL UPDATE and DELETE statements offer a way to execute bulk changes on the entities of your domain model. This is often necessary when you cannot load all the affected entities of a bulk update into memory.</p>\r\n', 2, 'Recu', 'liste_dossiers_CAP_ouverts_KRED_08-04-2020_Consolidé_VS_impayés_15-07-2020.xlsb'),
(8, '2021-11-05 20:43:44', 'z\"\'é', '', 2, 'Envoyé', 'c.sql'),
(9, '2021-12-06 17:44:36', 'buizagruoqzbhfn f', '<ul>\r\n	<li>bghydsqjdq&nbsp;<strong>dsqdsqdq<em>dsqdsqdqdqdsdqd</em></strong></li>\r\n</ul>\r\n\r\n<p><strong><em>​​​​​​​</em></strong></p>\r\n', 2, 'Recu', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doc`
--

DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `idDoc` int(11) NOT NULL AUTO_INCREMENT,
  `doc` longtext NOT NULL,
  `dateEnregistrement` date NOT NULL,
  `dateSuppr` date DEFAULT NULL,
  `statutDoc` varchar(100) NOT NULL,
  PRIMARY KEY (`idDoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `docubase`
--

DROP TABLE IF EXISTS `docubase`;
CREATE TABLE IF NOT EXISTS `docubase` (
  `idDocubase` int(11) NOT NULL AUTO_INCREMENT,
  `direction` varchar(250) NOT NULL,
  `numAffaire` varchar(100) NOT NULL,
  `nomClient` varchar(250) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `saisisseur` int(11) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `dateCréation` date NOT NULL,
  `dateDerModif` date NOT NULL,
  PRIMARY KEY (`idDocubase`),
  KEY `fk_docubase_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `idDocument` int(11) NOT NULL AUTO_INCREMENT,
  `num_demande` varchar(10) NOT NULL COMMENT '2020-01R',
  `lien_partage` text NOT NULL,
  `reference` text NOT NULL COMMENT 'Référence de la correspondance',
  `date_demande_Samifin` date NOT NULL COMMENT 'Date de la demande de SAMIFIN',
  `code_client` varchar(200) NOT NULL COMMENT 'liste code client',
  `nom_client` varchar(200) NOT NULL COMMENT 'liste nom client',
  `destinataire` int(11) DEFAULT NULL,
  `unite` varchar(200) DEFAULT NULL,
  `piece_demande` text NOT NULL COMMENT 'Liste des pièces demandées',
  `dete_information` date NOT NULL COMMENT 'Date d''information de la direction',
  `envoie_unite` varchar(100) DEFAULT NULL COMMENT 'Envoi de la demande à l''unité',
  `date_recep_piece` date NOT NULL,
  `date_envoie_Salifin` date NOT NULL,
  `a_faire` text DEFAULT NULL,
  `commentaire` mediumtext DEFAULT NULL,
  `delai_traitement` int(11) NOT NULL,
  `decompte_tbd` int(11) NOT NULL,
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idDocument`),
  KEY `fk_document_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dos`
--

DROP TABLE IF EXISTS `dos`;
CREATE TABLE IF NOT EXISTS `dos` (
  `idDos` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(10) NOT NULL COMMENT '2020-01S',
  `lien_partage` text NOT NULL,
  `origine` varchar(100) DEFAULT NULL,
  `date_info_avis_dg` date DEFAULT NULL,
  `date_envoi_samifin` date DEFAULT NULL,
  `saisisseur` int(11) NOT NULL,
  `code_client` int(7) NOT NULL,
  `nom_client` varchar(250) NOT NULL,
  `type_operation` text NOT NULL,
  `motif` text NOT NULL,
  `montant_en_jeu` double NOT NULL,
  `devise` varchar(10) NOT NULL,
  `date_decision` date DEFAULT NULL,
  `detail_decision` text DEFAULT NULL,
  `argument_decision` text DEFAULT NULL,
  `date_mail_decision` date DEFAULT NULL COMMENT 'Mail pour mise en oeuvre par les UO des décisions',
  `date_rupture_relation` date DEFAULT NULL,
  `date_suspension` int(11) DEFAULT NULL COMMENT 'Date de suspension de la rupture de la relation',
  `Motif_suspension` text DEFAULT NULL,
  `date_watchlist` date NOT NULL COMMENT 'Date insertion watchlist',
  `date_code_opp_17` date NOT NULL COMMENT 'Date insertion Code Opposition 17',
  `suivi` longtext NOT NULL COMMENT 'Suivi décisions et observations ',
  PRIMARY KEY (`idDos`),
  KEY `fk_dos_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

DROP TABLE IF EXISTS `echange`;
CREATE TABLE IF NOT EXISTS `echange` (
  `idEchange` int(11) NOT NULL AUTO_INCREMENT,
  `idTicket` int(11) NOT NULL,
  `objet_echange` text NOT NULL,
  `pj_echange` longtext DEFAULT NULL,
  `contenu_echange` longtext NOT NULL,
  `idUtilisateur_1` int(11) NOT NULL COMMENT 'Envoyeur',
  `idUtilisateur_2` int(11) NOT NULL COMMENT 'Récepteur',
  `dateEnvoie` datetime NOT NULL,
  `statutEchange` varchar(1) NOT NULL DEFAULT 'O' COMMENT 'Ouvert ''O'' / Fermé ''F''',
  PRIMARY KEY (`idEchange`),
  KEY `fk_echange_ticket` (`idTicket`),
  KEY `fk_echange_demandeur` (`idUtilisateur_1`),
  KEY `fk_echange_saisisseur` (`idUtilisateur_2`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `echange`
--

INSERT INTO `echange` (`idEchange`, `idTicket`, `objet_echange`, `pj_echange`, `contenu_echange`, `idUtilisateur_1`, `idUtilisateur_2`, `dateEnvoie`, `statutEchange`) VALUES
(1, 1, 'Ceci est un test', NULL, 'Fonctionnement de la formule :\r\n\r\nLa fonction annee examine la date de la cellule a2 et renvoie 2019. Il ajoute alors 3 ans à partir de la cellule B2, ce qui donne 2022.\r\n\r\nLes fonctions mois et jour renvoient uniquement les valeurs d’origine de la cellule a2, mais la fonction date en nécessite.\r\n\r\nEnfin, la fonction Date combine ces trois valeurs en une date qui se trouve 3 ans à l’avenir, 02/08/22.\r\n\r\nAjouter ou soustraire une combinaison de jours, de mois et d’années à une date\r\nDans cet exemple, nous ajoutons et soustrayons des années, des mois et des jours à partir d’une date de départ avec la formule suivante :\r\n\r\n= DATE (ANNEE (A2) + B2 ; MOIS (A2) + C2 ; JOUR (A2) + D2)\r\n\r\n\r\n\r\nFonctionnement de la formule :\r\n\r\nLa fonction annee examine la date de la cellule a2 et renvoie 2019. Il ajoute ensuite 1 année à partir de la cellule B2, ce qui donne 2020.\r\n\r\nLa fonction mois renvoie 6, puis ajoute 7 à celle de la cellule C2. Cela devient intéressant, car 6 + 7 = 13, soit 1 année et 1 mois. Dans ce cas, la formule reconnaît qu’une année supplémentaire est ajoutée au résultat, en l’entraînant de 2020 à 2021.\r\n\r\nLa fonction Day renvoie 8 et ajoute 15 à celle-ci. Cela fonctionnera de la même manière que pour la partie mois de la formule si vous dépassez le nombre de jours d’un mois donné.\r\n\r\nLa fonction Date combine ces trois valeurs en une date qui correspond à 1 année, 7 mois et 15 jours dans le futur, 01/23/21.', 4, 2, '2021-01-11 16:28:00', 'O'),
(5, 7, 'Test demande plus information', 'Plan_Action_Campagne21-12-2020-17_184.xls,IMG_20200909_0812054.jpg,Facture-110194.pdf,runTests4.sh', '<p>Bonjour,</p>\r\n\r\n<p>Un&nbsp;<strong>texte</strong>&nbsp;est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une&nbsp;langue&nbsp;(conjugaisons, construction et association des phrases&hellip;)&nbsp;Un texte n&#39;a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de&nbsp;po&egrave;mes&nbsp;&agrave; forme fixe comme le&nbsp;sonnet&nbsp;ou le&nbsp;ha&iuml;ku.</p>\r\n\r\n<p>&laquo;&nbsp;Texte&nbsp;&raquo; est issu du mot latin &laquo;&nbsp;textum&nbsp;&raquo;, d&eacute;riv&eacute; du verbe &laquo;&nbsp;texere&nbsp;&raquo; qui signifie &laquo;&nbsp;tisser&nbsp;&raquo;. Le mot s&#39;applique &agrave; l&#39;entrelacement des fibres utilis&eacute;es dans le tissage, voir par exemple&nbsp;Ovide&nbsp;: &laquo;&nbsp;Quo super iniecit textum rude sedula Baucis = (un si&egrave;ge) sur lequel Baucis empress&eacute;e avait jet&eacute; un tissu grossier&nbsp;&raquo;&nbsp;ou au tressage (exemple chez&nbsp;Martial&nbsp;&laquo;&nbsp;Vimineum textum = panier d&#39;osier tress&eacute;&nbsp;&raquo;). Le verbe a aussi le sens large de construire comme dans &laquo;&nbsp;basilicam texere = construire une basilique&nbsp;&raquo; chez&nbsp;Cic&eacute;ron.</p>\r\n\r\n<p>Le&nbsp;sens figur&eacute;&nbsp;d&#39;&eacute;l&eacute;ments de langage organis&eacute;s et encha&icirc;n&eacute;s appara&icirc;t avant l&#39;Empire romain&nbsp;: il d&eacute;signe un agencement particulier du discours. Exemple&nbsp;: &laquo;&nbsp;epistolas texere = composer des &eacute;p&icirc;tres&nbsp;&raquo; - Cic&eacute;ron (ier&nbsp;si&egrave;cle&nbsp;av. J.-C.)&nbsp;ou plus nettement chez&nbsp;Quintilien&nbsp;(ier&nbsp;si&egrave;cle&nbsp;apr. J.-C.)&nbsp;: &laquo;&nbsp;verba in textu jungantur = l&#39;agencement des mots dans la phrase&nbsp;&raquo;.</p>\r\n\r\n<p>Les formes anciennes du&nbsp;Moyen &Acirc;ge&nbsp;d&eacute;signent au&nbsp;xiie&nbsp;si&egrave;cle le volume qui contient le texte sacr&eacute; des &Eacute;vangiles, puis au&nbsp;xiiie&nbsp;si&egrave;cle, le texte original d&#39;un livre saint ou des propos de quelqu&#39;un. Au&nbsp;xviie&nbsp;si&egrave;cle le mot s&rsquo;applique au passage d&#39;un ouvrage pris comme r&eacute;f&eacute;rence et au d&eacute;but du&nbsp;xixe&nbsp;si&egrave;cle le mot texte a son sens g&eacute;n&eacute;ral d&#39;&laquo;&nbsp;&eacute;crit&nbsp;&raquo;.</p>\r\n', 4, 2, '2021-01-15 10:51:29', 'O'),
(6, 7, 'Test 2 echange', NULL, '', 3, 2, '2021-01-19 10:06:42', 'O'),
(7, 7, 'Rdfqgzhsfduiqgi', 'a.sql', '<p>dazereazdfadfaazeadazd</p>\r\n\r\n<p>zaea ea</p>\r\n\r\n<p>eazeaeaea</p>\r\n\r\n<p>ezaeaea</p>\r\n', 3, 2, '2021-11-05 20:27:23', 'O'),
(8, 8, 'Ceci est un test', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 4, 2, '2021-12-07 14:31:38', 'O');

--
-- Déclencheurs `echange`
--
DROP TRIGGER IF EXISTS `Insertion_box_echange`;
DELIMITER $$
CREATE TRIGGER `Insertion_box_echange` AFTER INSERT ON `echange` FOR EACH ROW BEGIN
	INSERT INTO echangeBox (idUtilisateurBox, idTicketBox, idEchange, statutbox, statutEchangebox)
    SELECT idUtilisateur_1, idTicket, idEchange, 'O', statutEchange FROM echange WHERE idEchange = NEW.idEchange;
    
	INSERT INTO echangeBox (idUtilisateurBox, idTicketBox, idEchange, statutbox, statutEchangebox)
    SELECT idUtilisateur_2, idTicket, idEchange, 'I', statutEchange FROM echange WHERE idEchange = NEW.idEchange;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `echangebox`
--

DROP TABLE IF EXISTS `echangebox`;
CREATE TABLE IF NOT EXISTS `echangebox` (
  `idEchangebox` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateurBox` int(11) DEFAULT NULL,
  `idTicketBox` int(11) DEFAULT NULL,
  `idEchange` int(11) DEFAULT NULL,
  `statutbox` varchar(1) DEFAULT NULL COMMENT 'in ''I'' / out ''O''',
  `statutEchangebox` varchar(1) DEFAULT NULL COMMENT 'Ouvert ''O'' / Fermé ''F''',
  PRIMARY KEY (`idEchangebox`),
  KEY `fk_box_utilisateur` (`idUtilisateurBox`),
  KEY `fk_box_ticket` (`idTicketBox`),
  KEY `fk_box_echange` (`idEchange`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `echangebox`
--

INSERT INTO `echangebox` (`idEchangebox`, `idUtilisateurBox`, `idTicketBox`, `idEchange`, `statutbox`, `statutEchangebox`) VALUES
(1, 4, 1, 1, 'O', 'O'),
(2, 2, 1, 1, 'I', 'O'),
(5, 4, 7, 5, 'O', 'O'),
(6, 2, 7, 5, 'I', 'O'),
(7, 3, 7, 6, 'O', 'O'),
(8, 2, 7, 6, 'I', 'O'),
(9, 3, 7, 7, 'O', 'O'),
(10, 2, 7, 7, 'I', 'O'),
(11, 4, 8, 8, 'O', 'O'),
(12, 2, 8, 8, 'I', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `echange_message`
--

DROP TABLE IF EXISTS `echange_message`;
CREATE TABLE IF NOT EXISTS `echange_message` (
  `idEchangeMessage` int(11) NOT NULL AUTO_INCREMENT,
  `pj_message` text DEFAULT NULL,
  `message` text NOT NULL,
  `idEchange_echange` int(11) NOT NULL,
  `idUtilisateur_message` int(11) NOT NULL,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`idEchangeMessage`),
  KEY `fk_message_utilisateur` (`idUtilisateur_message`),
  KEY `fk_message_echange` (`idEchange_echange`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `echange_message`
--

INSERT INTO `echange_message` (`idEchangeMessage`, `pj_message`, `message`, `idEchange_echange`, `idUtilisateur_message`, `date_message`) VALUES
(1, NULL, '<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n', 1, 4, '2021-01-13 14:15:04'),
(2, NULL, '<p>yhfvkzbfkb</p>\r\n\r\n<p>fafnjazelbfa a</p>\r\n\r\n<p>dafalfanfman&nbsp; daqslqd,md,qm, dsqmd, qm qdsmq,dm q,</p>\r\n', 1, 3, '2021-01-13 14:16:23'),
(3, NULL, '<p>ezaheoha&nbsp; jeapqap&nbsp;</p>\r\n', 1, 3, '2021-01-13 14:17:01'),
(6, NULL, '<p>Test</p>\r\n', 1, 4, '2021-01-13 16:06:56'),
(10, 'debug.log,Liste_DA.xlsx,Liste_DGE.xls', '<p>Test</p>\r\n', 1, 4, '2021-01-13 16:55:18'),
(11, 'Creation_EB.csv', '<p>Bonjour,</p>\r\n\r\n<p>D&#39;accord ca marche.</p>\r\n\r\n<p>Cordialement</p>\r\n', 1, 2, '2021-01-14 09:57:23'),
(12, NULL, '<ul>\r\n	<li><strong>Fonctionnement de la formule :</strong></li>\r\n</ul>\r\n\r\n<p>La fonction annee examine la date de la cellule a2 et renvoie 2019. Il ajoute alors 3 ans &agrave; partir de la cellule B2, ce qui donne 2022. Les fonctions mois et jour renvoient uniquement les valeurs d&rsquo;origine de la cellule a2, mais la fonction date en n&eacute;cessite. Enfin, la fonction Date combine ces trois valeurs en une date qui se trouve 3 ans &agrave; l&rsquo;avenir, 02/08/22. Ajouter ou soustraire une combinaison de jours, de mois et d&rsquo;ann&eacute;es &agrave; une date Dans cet exemple, nous ajoutons et soustrayons des ann&eacute;es, des mois et des jours &agrave; partir d&rsquo;une date de d&eacute;part avec la formule suivante :</p>\r\n\r\n<p><strong>= DATE (ANNEE (A2) + B2 ; MOIS (A2) + C2 ; JOUR (A2) + D2) </strong></p>\r\n\r\n<ul>\r\n	<li><strong>Fonctionnement de la formule :</strong></li>\r\n</ul>\r\n\r\n<p>La fonction annee examine la date de la cellule a2 et renvoie 2019. Il ajoute ensuite 1 ann&eacute;e &agrave; partir de la cellule B2, ce qui donne 2020. La fonction mois renvoie 6, puis ajoute 7 &agrave; celle de la cellule C2. Cela devient int&eacute;ressant, car 6 + 7 = 13, soit 1 ann&eacute;e et 1 mois.</p>\r\n\r\n<p>Dans ce cas, la formule reconna&icirc;t qu&rsquo;une ann&eacute;e suppl&eacute;mentaire est ajout&eacute;e au r&eacute;sultat, en l&rsquo;entra&icirc;nant de 2020 &agrave; 2021. La fonction Day renvoie 8 et ajoute 15 &agrave; celle-ci. Cela fonctionnera de la m&ecirc;me mani&egrave;re que pour la partie mois de la formule si vous d&eacute;passez le nombre de jours d&rsquo;un mois donn&eacute;. La fonction Date combine ces trois valeurs en une date qui correspond &agrave; 1 ann&eacute;e, 7 mois et 15 jours dans le futur, 01/23/21.</p>\r\n', 1, 4, '2021-01-14 10:00:10'),
(13, NULL, '<p>aaaa</p>\r\n', 6, 3, '2021-01-19 12:44:33'),
(14, NULL, '<p>a</p>', 6, 4, '2021-05-21 09:57:23'),
(15, NULL, '<p>zeea dxs a</p>', 6, 4, '2021-05-21 09:57:39'),
(16, NULL, '<p>ezae zeazed a</p>', 6, 3, '2021-05-21 10:17:23'),
(17, 'contributing.md', '', 6, 3, '2021-05-21 10:17:31'),
(18, NULL, '<p>Vdauvdja adiadfabb fa</p>', 5, 3, '2021-05-21 10:20:23'),
(19, NULL, '<p>aaaaaaaaaaaaaa</p>', 6, 3, '2021-05-21 15:08:16'),
(20, NULL, '<p>rrrrrrrrrrrrrrrrrrrrrrrr</p>', 6, 3, '2021-05-21 15:08:27'),
(21, 'JIRA_-_Configuration_-_MAJ_NEW.txt,JIRA_-_Configuration_-_Régularisation_PCTX.txt', '<p>aadda aaaa<strong>aeaze zeaeaz</strong><i><strong> ezea eaz eazezaeaze</strong></i></p>', 6, 3, '2021-05-21 15:21:00'),
(22, NULL, '<p>zaeaz</p>', 6, 4, '2021-05-21 16:54:17'),
(23, NULL, '<p>test 2</p>', 5, 4, '2021-05-31 15:43:20'),
(24, 'settings.jar', '<p>drtfghcghcvhjvhv&nbsp;</p>', 6, 4, '2021-07-27 10:17:04'),
(25, 'exemple_cps.sql', '', 1, 4, '2021-07-27 10:37:33'),
(26, 'insert.sql', '<p>a</p>', 6, 4, '2021-07-28 09:48:33'),
(27, 'exec_sql_insert_2019.10.15_12.35.11.log', '<p>ffhj</p>', 5, 4, '2021-08-18 11:19:05'),
(28, 'Demande_davance.pdf', '<p>dzfyfdjzy</p>', 7, 3, '2021-11-05 20:28:36'),
(29, NULL, '<p>rzearez</p><p>&nbsp;</p>', 7, 3, '2021-11-05 20:28:53'),
(30, NULL, '<p>a</p><p>&nbsp;</p>', 7, 4, '2021-11-05 20:31:20'),
(31, NULL, '<p>azae</p>', 7, 3, '2021-11-05 20:32:41'),
(32, NULL, '<p>Bonjour,</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 8, 4, '2021-12-07 14:32:28'),
(33, 'resultat_requette_sql_(4).csv', '<p>Bonjour,</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 8, 3, '2021-12-07 14:33:23'),
(34, NULL, 'Bonjour,\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 8, 2, '2021-12-07 14:35:26'),
(35, NULL, '', 8, 2, '2021-12-07 14:35:39'),
(36, 'resultat_requette_sql_(4)1.csv', '', 8, 2, '2021-12-07 14:36:24');

-- --------------------------------------------------------

--
-- Structure de la table `ferie`
--

DROP TABLE IF EXISTS `ferie`;
CREATE TABLE IF NOT EXISTS `ferie` (
  `idFerie` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `editable` varchar(6) NOT NULL DEFAULT 'false',
  `color` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `backgroundColor` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `textColor` varchar(25) NOT NULL DEFAULT 'white',
  PRIMARY KEY (`idFerie`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ferie`
--

INSERT INTO `ferie` (`idFerie`, `title`, `start`, `editable`, `color`, `backgroundColor`, `textColor`) VALUES
(261, 'Nouvel an', '2018-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(262, 'Journée internationale de la femme', '2018-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(263, 'Commémoration 1947', '2018-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(264, 'Fête du Travail', '2018-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(265, 'Fête de l\'independance', '2018-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(266, 'Assomption de la Sainte Vierge', '2018-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(267, 'Toussaint', '2018-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(268, 'Noël', '2018-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(269, 'Pâque', '2018-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(270, 'Lundi de Pâque', '2018-04-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(271, 'Ascension', '2018-05-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(272, 'Pentecôte', '2018-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(273, 'Lundi de Pentecôte', '2018-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(274, 'Nouvel an', '2019-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(275, 'Journée internationale de la femme', '2019-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(276, 'Commémoration 1947', '2019-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(277, 'Fête du Travail', '2019-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(278, 'Fête de l\'independance', '2019-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(279, 'Assomption de la Sainte Vierge', '2019-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(280, 'Toussaint', '2019-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(281, 'Noël', '2019-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(282, 'Pâque', '2019-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(283, 'Lundi de Pâque', '2019-04-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(284, 'Ascension', '2019-05-30', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(285, 'Pentecôte', '2019-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(286, 'Lundi de Pentecôte', '2019-06-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(287, 'Nouvel an', '2020-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(288, 'Journée internationale de la femme', '2020-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(289, 'Commémoration 1947', '2020-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(290, 'Fête du Travail', '2020-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(291, 'Fête de l\'independance', '2020-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(292, 'Assomption de la Sainte Vierge', '2020-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(293, 'Toussaint', '2020-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(294, 'Noël', '2020-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(295, 'Pâque', '2020-04-12', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(296, 'Lundi de Pâque', '2020-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(297, 'Ascension', '2020-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(298, 'Pentecôte', '2020-05-31', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(299, 'Lundi de Pentecôte', '2020-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(300, 'Nouvel an', '2021-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(301, 'Journée internationale de la femme', '2021-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(302, 'Commémoration 1947', '2021-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(303, 'Fête du Travail', '2021-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(304, 'Fête de l\'independance', '2021-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(305, 'Assomption de la Sainte Vierge', '2021-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(306, 'Toussaint', '2021-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(307, 'Noël', '2021-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(308, 'Pâque', '2021-04-04', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(309, 'Lundi de Pâque', '2021-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(310, 'Ascension', '2021-05-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(311, 'Pentecôte', '2021-05-23', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(312, 'Lundi de Pentecôte', '2021-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(313, 'Nouvel an', '2022-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(314, 'Journée internationale de la femme', '2022-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(315, 'Commémoration 1947', '2022-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(316, 'Fête du Travail', '2022-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(317, 'Fête de l\'independance', '2022-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(318, 'Assomption de la Sainte Vierge', '2022-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(319, 'Toussaint', '2022-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(320, 'Noël', '2022-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(321, 'Pâque', '2022-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(322, 'Lundi de Pâque', '2022-04-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(323, 'Ascension', '2022-05-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(324, 'Pentecôte', '2022-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(325, 'Lundi de Pentecôte', '2022-06-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(326, 'Nouvel an', '2023-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(327, 'Journée internationale de la femme', '2023-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(328, 'Commémoration 1947', '2023-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(329, 'Fête du Travail', '2023-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(330, 'Fête de l\'independance', '2023-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(331, 'Assomption de la Sainte Vierge', '2023-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(332, 'Toussaint', '2023-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(333, 'Noël', '2023-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(334, 'Pâque', '2023-04-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(335, 'Lundi de Pâque', '2023-04-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(336, 'Ascension', '2023-05-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(337, 'Pentecôte', '2023-05-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(338, 'Lundi de Pentecôte', '2023-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(339, 'Nouvel an', '2024-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(340, 'Journée internationale de la femme', '2024-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(341, 'Commémoration 1947', '2024-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(342, 'Fête du Travail', '2024-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(343, 'Fête de l\'independance', '2024-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(344, 'Assomption de la Sainte Vierge', '2024-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(345, 'Toussaint', '2024-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(346, 'Noël', '2024-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(347, 'Pâque', '2024-03-31', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(348, 'Lundi de Pâque', '2024-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(349, 'Ascension', '2024-05-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(350, 'Pentecôte', '2024-05-19', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(351, 'Lundi de Pentecôte', '2024-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(352, 'Nouvel an', '2025-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(353, 'Journée internationale de la femme', '2025-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(354, 'Commémoration 1947', '2025-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(355, 'Fête du Travail', '2025-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(356, 'Fête de l\'independance', '2025-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(357, 'Assomption de la Sainte Vierge', '2025-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(358, 'Toussaint', '2025-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(359, 'Noël', '2025-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(360, 'Pâque', '2025-04-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(361, 'Lundi de Pâque', '2025-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(362, 'Ascension', '2025-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(363, 'Pentecôte', '2025-06-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(364, 'Lundi de Pentecôte', '2025-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(365, 'Nouvel an', '2026-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(366, 'Journée internationale de la femme', '2026-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(367, 'Commémoration 1947', '2026-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(368, 'Fête du Travail', '2026-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(369, 'Fête de l\'independance', '2026-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(370, 'Assomption de la Sainte Vierge', '2026-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(371, 'Toussaint', '2026-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(372, 'Noël', '2026-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(373, 'Pâque', '2026-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(374, 'Lundi de Pâque', '2026-04-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(375, 'Ascension', '2026-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(376, 'Pentecôte', '2026-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(377, 'Lundi de Pentecôte', '2026-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(378, 'Nouvel an', '2027-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(379, 'Journée internationale de la femme', '2027-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(380, 'Commémoration 1947', '2027-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(381, 'Fête du Travail', '2027-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(382, 'Fête de l\'independance', '2027-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(383, 'Assomption de la Sainte Vierge', '2027-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(384, 'Toussaint', '2027-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(385, 'Noël', '2027-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(386, 'Pâque', '2027-03-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(387, 'Lundi de Pâque', '2027-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(388, 'Ascension', '2027-05-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(389, 'Pentecôte', '2027-05-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(390, 'Lundi de Pentecôte', '2027-05-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(391, 'Nouvel an', '2028-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(392, 'Journée internationale de la femme', '2028-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(393, 'Commémoration 1947', '2028-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(394, 'Fête du Travail', '2028-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(395, 'Fête de l\'independance', '2028-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(396, 'Assomption de la Sainte Vierge', '2028-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(397, 'Toussaint', '2028-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(398, 'Noël', '2028-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(399, 'Pâque', '2028-04-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(400, 'Lundi de Pâque', '2028-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(401, 'Ascension', '2028-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(402, 'Pentecôte', '2028-06-04', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(403, 'Lundi de Pentecôte', '2028-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(404, 'Nouvel an', '2029-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(405, 'Journée internationale de la femme', '2029-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(406, 'Commémoration 1947', '2029-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(407, 'Fête du Travail', '2029-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(408, 'Fête de l\'independance', '2029-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(409, 'Assomption de la Sainte Vierge', '2029-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(410, 'Toussaint', '2029-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(411, 'Noël', '2029-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(412, 'Pâque', '2029-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(413, 'Lundi de Pâque', '2029-04-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(414, 'Ascension', '2029-05-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(415, 'Pentecôte', '2029-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(416, 'Lundi de Pentecôte', '2029-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(417, 'Nouvel an', '2030-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(418, 'Journée internationale de la femme', '2030-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(419, 'Commémoration 1947', '2030-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(420, 'Fête du Travail', '2030-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(421, 'Fête de l\'independance', '2030-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(422, 'Assomption de la Sainte Vierge', '2030-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(423, 'Toussaint', '2030-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(424, 'Noël', '2030-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(425, 'Pâque', '2030-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(426, 'Lundi de Pâque', '2030-04-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(427, 'Ascension', '2030-05-30', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(428, 'Pentecôte', '2030-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(429, 'Lundi de Pentecôte', '2030-06-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(430, 'Nouvel an', '2031-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(431, 'Journée internationale de la femme', '2031-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(432, 'Commémoration 1947', '2031-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(433, 'Fête du Travail', '2031-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(434, 'Fête de l\'independance', '2031-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(435, 'Assomption de la Sainte Vierge', '2031-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(436, 'Toussaint', '2031-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(437, 'Noël', '2031-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(438, 'Pâque', '2031-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(439, 'Lundi de Pâque', '2031-04-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(440, 'Ascension', '2031-05-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(441, 'Pentecôte', '2031-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(442, 'Lundi de Pentecôte', '2031-06-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(443, 'Nouvel an', '2032-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(444, 'Journée internationale de la femme', '2032-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(445, 'Commémoration 1947', '2032-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(446, 'Fête du Travail', '2032-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(447, 'Fête de l\'independance', '2032-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(448, 'Assomption de la Sainte Vierge', '2032-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(449, 'Toussaint', '2032-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(450, 'Noël', '2032-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(451, 'Pâque', '2032-03-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(452, 'Lundi de Pâque', '2032-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(453, 'Ascension', '2032-05-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(454, 'Pentecôte', '2032-05-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(455, 'Lundi de Pentecôte', '2032-05-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(456, 'Nouvel an', '2033-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(457, 'Journée internationale de la femme', '2033-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(458, 'Commémoration 1947', '2033-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(459, 'Fête du Travail', '2033-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(460, 'Fête de l\'independance', '2033-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(461, 'Assomption de la Sainte Vierge', '2033-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(462, 'Toussaint', '2033-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(463, 'Noël', '2033-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(464, 'Pâque', '2033-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(465, 'Lundi de Pâque', '2033-04-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(466, 'Ascension', '2033-05-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(467, 'Pentecôte', '2033-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(468, 'Lundi de Pentecôte', '2033-06-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(469, 'Nouvel an', '2034-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(470, 'Journée internationale de la femme', '2034-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(471, 'Commémoration 1947', '2034-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(472, 'Fête du Travail', '2034-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(473, 'Fête de l\'independance', '2034-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(474, 'Assomption de la Sainte Vierge', '2034-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(475, 'Toussaint', '2034-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(476, 'Noël', '2034-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(477, 'Pâque', '2034-04-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(478, 'Lundi de Pâque', '2034-04-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(479, 'Ascension', '2034-05-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(480, 'Pentecôte', '2034-05-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(481, 'Lundi de Pentecôte', '2034-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(482, 'Nouvel an', '2035-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(483, 'Journée internationale de la femme', '2035-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(484, 'Commémoration 1947', '2035-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(485, 'Fête du Travail', '2035-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(486, 'Fête de l\'independance', '2035-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(487, 'Assomption de la Sainte Vierge', '2035-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(488, 'Toussaint', '2035-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(489, 'Noël', '2035-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(490, 'Pâque', '2035-03-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(491, 'Lundi de Pâque', '2035-03-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(492, 'Ascension', '2035-05-03', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(493, 'Pentecôte', '2035-05-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(494, 'Lundi de Pentecôte', '2035-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(495, 'Nouvel an', '2036-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(496, 'Journée internationale de la femme', '2036-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(497, 'Commémoration 1947', '2036-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(498, 'Fête du Travail', '2036-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(499, 'Fête de l\'independance', '2036-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(500, 'Assomption de la Sainte Vierge', '2036-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(501, 'Toussaint', '2036-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(502, 'Noël', '2036-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(503, 'Pâque', '2036-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(504, 'Lundi de Pâque', '2036-04-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(505, 'Ascension', '2036-05-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(506, 'Pentecôte', '2036-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(507, 'Lundi de Pentecôte', '2036-06-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(508, 'Nouvel an', '2037-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(509, 'Journée internationale de la femme', '2037-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(510, 'Commémoration 1947', '2037-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(511, 'Fête du Travail', '2037-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(512, 'Fête de l\'independance', '2037-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(513, 'Assomption de la Sainte Vierge', '2037-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(514, 'Toussaint', '2037-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(515, 'Noël', '2037-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(516, 'Pâque', '2037-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(517, 'Lundi de Pâque', '2037-04-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(518, 'Ascension', '2037-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(519, 'Pentecôte', '2037-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(520, 'Lundi de Pentecôte', '2037-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white');

-- --------------------------------------------------------

--
-- Structure de la table `historiqueticket`
--

DROP TABLE IF EXISTS `historiqueticket`;
CREATE TABLE IF NOT EXISTS `historiqueticket` (
  `idHistorique` int(11) NOT NULL AUTO_INCREMENT,
  `idTicket` int(11) NOT NULL,
  `dateStatut` datetime NOT NULL,
  `statut` varchar(50) NOT NULL,
  `saisisseur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHistorique`),
  KEY `fk_historique_ticket` (`idTicket`),
  KEY `fk_historique_Utilisateur` (`saisisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historiqueticket`
--

INSERT INTO `historiqueticket` (`idHistorique`, `idTicket`, `dateStatut`, `statut`, `saisisseur`) VALUES
(1, 1, '2021-01-05 13:41:39', 'Abandonnée', NULL),
(2, 2, '2021-01-05 14:09:16', 'Reçu', NULL),
(3, 3, '2021-01-05 14:21:16', 'Refusé', 4),
(4, 2, '2021-01-06 12:31:06', 'Encours', 3),
(5, 2, '2021-01-06 12:51:14', 'Encours', 3),
(6, 2, '2021-01-06 12:51:29', 'Encours', 3),
(7, 2, '2021-01-06 14:54:19', 'Encours', 4),
(8, 2, '2021-01-06 15:04:18', 'Encours', 3),
(9, 2, '2021-01-06 15:04:23', 'Encours', 3),
(10, 2, '2021-01-06 15:04:27', 'Encours', 3),
(11, 2, '2021-01-06 15:04:27', 'Terminé', 3),
(12, 2, '2021-01-06 17:36:32', 'Encours', 3),
(13, 2, '2021-01-08 09:36:36', 'Encours', 3),
(14, 2, '2021-01-08 09:36:45', 'Encours', 4),
(15, 2, '2021-01-08 09:37:05', 'Encours', 4),
(16, 4, '2021-01-11 14:37:59', 'Reçu', NULL),
(17, 5, '2021-01-11 14:38:05', 'Reçu', NULL),
(18, 5, '2021-01-11 14:38:13', 'Encours', 4),
(19, 5, '2021-01-11 14:38:21', 'Encours', 4),
(20, 5, '2021-01-11 14:38:21', 'A_Validé', 4),
(21, 4, '2021-01-11 14:45:09', 'Encours', 4),
(22, 4, '2021-01-11 14:45:15', 'Encours', 4),
(23, 5, '2021-01-11 14:46:24', 'A_Validé', 4),
(24, 5, '2021-01-11 14:52:20', 'A_Validé', 4),
(25, 2, '2021-01-11 14:52:44', 'Encours', 3),
(26, 2, '2021-01-11 14:52:52', 'Encours', 3),
(27, 2, '2021-01-11 14:52:58', 'Encours', 3),
(28, 2, '2021-01-11 14:52:58', 'Terminé', 3),
(29, 5, '2021-01-11 14:54:30', 'A_Validé', 4),
(30, 5, '2021-01-11 14:54:30', 'Terminé', 4),
(31, 4, '2021-01-11 14:59:05', 'Encours', 3),
(32, 4, '2021-01-11 15:00:17', 'Encours', 3),
(33, 4, '2021-01-11 15:00:17', 'Terminé', 3),
(34, 5, '2021-01-11 15:00:58', 'Terminé', 4),
(35, 2, '2021-01-11 15:01:05', 'Terminé', 3),
(36, 6, '2021-01-11 15:10:11', 'Reçu', NULL),
(37, 6, '2021-01-11 15:10:14', 'Encours', 4),
(38, 6, '2021-01-11 15:18:33', 'Encours', 4),
(39, 6, '2021-01-11 15:18:40', 'Encours', 4),
(40, 6, '2021-01-11 15:18:40', 'A_Validé', 4),
(41, 6, '2021-01-11 15:21:58', 'A_Validé', 4),
(42, 3, '2021-01-11 15:24:51', 'Révisé', 4),
(43, 6, '2021-01-11 15:25:56', 'A_Validé', 4),
(44, 6, '2021-01-11 15:26:52', 'Révisé', 4),
(45, 3, '2021-01-11 15:30:21', 'Révisé', 4),
(46, 3, '2021-01-11 15:30:32', 'Révisé', 4),
(47, 3, '2021-01-11 15:30:33', 'Révisé', 4),
(48, 3, '2021-01-11 15:30:34', 'A_Validé', 4),
(49, 3, '2021-01-11 15:31:03', 'A_Validé', 4),
(50, 3, '2021-01-11 15:31:05', 'A_Validé', 4),
(51, 3, '2021-01-11 15:31:05', 'Terminé', 4),
(52, 6, '2021-01-13 14:19:53', 'Révisé', 4),
(53, 7, '2021-01-14 11:56:32', 'Reçu', NULL),
(54, 7, '2021-01-14 12:02:56', 'Encours', 4),
(55, 7, '2021-01-14 12:08:22', 'Encours', 4),
(56, 7, '2021-01-18 10:18:49', 'Encours', 3),
(57, 7, '2021-11-05 20:25:53', 'Encours', 4),
(58, 7, '2021-11-05 20:26:05', 'Encours', 3),
(59, 7, '2021-11-05 20:26:11', 'Encours', 3),
(60, 7, '2021-11-05 20:26:18', 'Encours', 3),
(61, 4, '2021-12-07 13:28:09', 'Terminé', 3),
(62, 4, '2021-12-07 13:28:27', 'Terminé', 3),
(63, 8, '2021-12-07 14:29:04', 'Reçu', NULL),
(64, 8, '2021-12-07 14:29:22', 'Encours', 4),
(65, 8, '2021-12-07 14:30:53', 'Encours', 4),
(66, 8, '2021-12-07 14:31:02', 'Encours', 4),
(67, 8, '2021-12-07 14:31:02', 'A_Validé', 4);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `idInformation` int(11) NOT NULL AUTO_INCREMENT,
  `num_infoemation` varchar(10) NOT NULL COMMENT '2020-96D',
  `lien_partage` text NOT NULL,
  `date_reception` date NOT NULL,
  `demande` longtext NOT NULL COMMENT 'Liste des information demandé',
  `date_message_attente` int(11) NOT NULL,
  `date_reponce` date NOT NULL,
  `reponce` text DEFAULT NULL,
  `nb_client_ nonClient` int(11) NOT NULL COMMENT 'Nombre de personne demandé',
  `list_code_client` text DEFAULT NULL,
  `nb_client` int(11) NOT NULL,
  `nb_nonClient` int(11) NOT NULL,
  `delai_traitement` int(11) NOT NULL,
  `relance` text DEFAULT NULL,
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idInformation`),
  KEY `fk_information_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ldap`
--

DROP TABLE IF EXISTS `ldap`;
CREATE TABLE IF NOT EXISTS `ldap` (
  `idLdap` int(11) NOT NULL AUTO_INCREMENT,
  `ldap` int(11) NOT NULL,
  PRIMARY KEY (`idLdap`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ldap`
--

INSERT INTO `ldap` (`idLdap`, `ldap`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message_relance`
--

DROP TABLE IF EXISTS `message_relance`;
CREATE TABLE IF NOT EXISTS `message_relance` (
  `idMessage_relance` int(11) NOT NULL AUTO_INCREMENT,
  `idSiron` int(11) NOT NULL,
  `objet` text NOT NULL,
  `destinataire` int(11) NOT NULL,
  `pj_message` text DEFAULT NULL,
  `contenu` mediumtext NOT NULL,
  `date_message` date NOT NULL,
  PRIMARY KEY (`idMessage_relance`),
  KEY `fk_message_sirron` (`idSiron`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pj_traitement`
--

DROP TABLE IF EXISTS `pj_traitement`;
CREATE TABLE IF NOT EXISTS `pj_traitement` (
  `idPj` int(11) NOT NULL AUTO_INCREMENT,
  `pj` varchar(250) NOT NULL,
  `idTicket` int(11) NOT NULL,
  PRIMARY KEY (`idPj`),
  KEY `fl_Pj_Ticket` (`idTicket`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pj_traitement`
--

INSERT INTO `pj_traitement` (`idPj`, `pj`, `idTicket`) VALUES
(1, 'ASCII2.PNG', 6),
(2, 'Capture_fanasa_prorogation1.PNG', 6),
(3, 'Capturesimafri.PNG', 3),
(4, 'Creation_EB1.csv', 7);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `role`) VALUES
(1, 'Responsable CSF'),
(2, 'CSF'),
(3, 'Demandeur'),
(4, 'RCDMEI'),
(5, 'DSMR'),
(6, 'Administrateur'),
(7, 'Observateur');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire_aml`
--

DROP TABLE IF EXISTS `questionnaire_aml`;
CREATE TABLE IF NOT EXISTS `questionnaire_aml` (
  `idQuestionnaire` int(11) NOT NULL AUTO_INCREMENT,
  `dossier` varchar(100) NOT NULL,
  `demande` text DEFAULT NULL,
  `detail_demande` mediumtext DEFAULT NULL,
  `date_arrive` date NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `delai_traitement` int(11) NOT NULL,
  `observation` mediumtext DEFAULT NULL,
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idQuestionnaire`),
  KEY `fk_questionnaire_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `idRapport` int(11) NOT NULL AUTO_INCREMENT,
  `motif` longtext NOT NULL,
  `idRelationClient` int(11) NOT NULL,
  `idSurveillanceFlux` int(11) NOT NULL,
  `explication` longtext NOT NULL COMMENT 'Explication sur la surveillance des flux',
  `observation` longtext NOT NULL COMMENT 'Rmarque ou observation',
  PRIMARY KEY (`idRapport`),
  KEY `fk_rapport_relation` (`idRelationClient`),
  KEY `fk_rapport_surveillance` (`idSurveillanceFlux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relance_samifin`
--

DROP TABLE IF EXISTS `relance_samifin`;
CREATE TABLE IF NOT EXISTS `relance_samifin` (
  `idRelanceSamifin` int(11) NOT NULL AUTO_INCREMENT,
  `idinformation` int(11) NOT NULL,
  `relance` varchar(100) NOT NULL COMMENT '1ere relance, ...',
  `objet` text DEFAULT NULL,
  `contenu` mediumtext DEFAULT NULL,
  `pj` text DEFAULT NULL,
  PRIMARY KEY (`idRelanceSamifin`),
  KEY `fk_relanceSamifin_information` (`idinformation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relance_siron`
--

DROP TABLE IF EXISTS `relance_siron`;
CREATE TABLE IF NOT EXISTS `relance_siron` (
  `idRelance_siron` int(11) NOT NULL AUTO_INCREMENT,
  `idsiron` int(11) NOT NULL,
  `relande` varchar(100) NOT NULL,
  `date_relance` date NOT NULL,
  `objet_relance` text DEFAULT NULL,
  `contenu_relance` mediumtext DEFAULT NULL,
  PRIMARY KEY (`idRelance_siron`),
  KEY `fk_relanceSiron_siron` (`idsiron`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relance_unite`
--

DROP TABLE IF EXISTS `relance_unite`;
CREATE TABLE IF NOT EXISTS `relance_unite` (
  `idRelance_unite` int(11) NOT NULL AUTO_INCREMENT,
  `idInformation` int(11) NOT NULL,
  `relance` varchar(100) NOT NULL,
  `date_relance_unite` date NOT NULL,
  `objet` text NOT NULL,
  `contenu` mediumtext NOT NULL,
  PRIMARY KEY (`idRelance_unite`),
  KEY `fk_relanceUnite_information` (`idInformation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation_client`
--

DROP TABLE IF EXISTS `relation_client`;
CREATE TABLE IF NOT EXISTS `relation_client` (
  `idRelation_client` int(11) NOT NULL AUTO_INCREMENT,
  `relation` varchar(250) NOT NULL,
  PRIMARY KEY (`idRelation_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `revision_kyc`
--

DROP TABLE IF EXISTS `revision_kyc`;
CREATE TABLE IF NOT EXISTS `revision_kyc` (
  `idKyc` int(11) NOT NULL AUTO_INCREMENT,
  `code_client` int(7) NOT NULL,
  `nom_client` varchar(250) NOT NULL,
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idKyc`),
  KEY `fk_Kyc_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `siron`
--

DROP TABLE IF EXISTS `siron`;
CREATE TABLE IF NOT EXISTS `siron` (
  `idSiron` int(11) NOT NULL AUTO_INCREMENT,
  `direction` varchar(250) NOT NULL,
  `radical` int(7) NOT NULL,
  `cli` int(11) NOT NULL,
  `statutAlert` varchar(100) NOT NULL,
  `saisisseur` int(11) NOT NULL,
  `dateScoring` date NOT NULL,
  `dateDerModif` date NOT NULL,
  PRIMARY KEY (`idSiron`),
  KEY `fk_siron_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sss`
--

DROP TABLE IF EXISTS `sss`;
CREATE TABLE IF NOT EXISTS `sss` (
  `idSss` int(11) NOT NULL AUTO_INCREMENT,
  `typeSwift` text NOT NULL,
  `montant` double NOT NULL,
  `benef_donOrdre` varchar(150) NOT NULL COMMENT 'Bénéficiaire ou donneur d’ordre',
  `date_reception` date NOT NULL,
  `date_reponse` date NOT NULL,
  `hit` varchar(6) NOT NULL COMMENT 'true /false',
  `commentaire` text NOT NULL,
  `action` int(11) NOT NULL COMMENT 'Pending / Pass',
  `saisisseur` int(11) NOT NULL,
  PRIMARY KEY (`idSss`),
  KEY `fk_SSS_utilisateur` (`saisisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `surveillance_flux`
--

DROP TABLE IF EXISTS `surveillance_flux`;
CREATE TABLE IF NOT EXISTS `surveillance_flux` (
  `idSurveillance_Flux` int(11) NOT NULL AUTO_INCREMENT,
  `Surveillance` varchar(250) NOT NULL,
  PRIMARY KEY (`idSurveillance_Flux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `numTicket` varchar(250) NOT NULL,
  `idDemande` int(11) NOT NULL,
  `demandeur` int(11) NOT NULL,
  `saisisseur` int(11) DEFAULT NULL,
  `valideur` int(11) DEFAULT NULL,
  `statutTicket` varchar(100) NOT NULL,
  `motif` text DEFAULT NULL,
  `traitement` longtext DEFAULT NULL,
  `revision` longtext DEFAULT NULL,
  `dateReception` datetime NOT NULL,
  `dateEncours` datetime DEFAULT NULL,
  `dateAvantValidation` datetime DEFAULT NULL,
  `dateRevise` datetime DEFAULT NULL,
  `dateTermine` datetime DEFAULT NULL,
  `dateRefus` datetime DEFAULT NULL,
  `dateAbandon` datetime DEFAULT NULL,
  PRIMARY KEY (`idTicket`),
  KEY `fk_Ticket_Demande` (`idDemande`),
  KEY `fk_Ticket_Utilisateur_1` (`demandeur`),
  KEY `fk_Ticket_Utilisateur_2` (`valideur`),
  KEY `fk_Ticket_Utilisateur_3` (`saisisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `numTicket`, `idDemande`, `demandeur`, `saisisseur`, `valideur`, `statutTicket`, `motif`, `traitement`, `revision`, `dateReception`, `dateEncours`, `dateAvantValidation`, `dateRevise`, `dateTermine`, `dateRefus`, `dateAbandon`) VALUES
(1, 'TIK-JUR-00000000001', 1, 2, NULL, NULL, 'Abandonnée', 'Mety le abandon', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '2021-01-05 13:41:39'),
(2, 'TIK-JUR-00000000002', 2, 2, 3, 3, 'Terminé', NULL, '<p>aaaaaaaaaa</p>\r\n\r\n<p>heeeeeeeeeeeeeeeeeeeee dzaeaea azeadeazfffff zeae aea</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>fzifnhailqfklazfilhfpmaznfzkl</p>\r\n', NULL, '2021-01-05 14:09:16', '2021-01-11 14:52:44', NULL, NULL, '2021-01-11 14:52:58', NULL, NULL),
(3, 'TIK-JUR-00000000003', 3, 2, 4, 3, 'Terminé', 'zazae', '<p>sqfdqfsqf dsd qdq df dfsq</p>\r\n', 'BBQSJkfqkf', '0000-00-00 00:00:00', NULL, '2021-01-11 15:30:34', '2021-01-11 15:24:51', '2021-01-11 15:31:05', '2021-01-05 14:21:16', NULL),
(4, 'TIK-JUR-00000000004', 5, 2, 3, 3, 'Terminé', NULL, '<p>vvvvvvvvvvvvvvvvvvv</p>\r\n\r\n<p>vvvvvvvvvvvvvvvvvv</p>\r\n', NULL, '2021-01-11 14:37:59', '2021-01-11 14:59:05', NULL, NULL, '2021-01-14 00:00:00', NULL, NULL),
(5, 'TIK-JUR-00000000005', 4, 2, 4, 3, 'Terminé', NULL, '<p>Test bfskb bdjkq, znlanenzal keazeaz,eklazeaz,&nbsp; zearar</p>\r\n', NULL, '2021-01-11 14:38:05', '2021-01-11 14:38:13', '2021-01-11 14:38:21', NULL, '2021-01-11 14:54:30', NULL, NULL),
(6, 'TIK-JUR-00000000006', 6, 2, 4, NULL, 'Révisé', NULL, '<p>dzdqad sdfsfsfd azez gijdlm</p>\r\n', 'fgbuqifqjkbfjkq', '2021-01-11 15:10:11', '2021-01-11 15:10:14', '2021-01-11 15:18:40', '2021-01-11 15:26:52', NULL, NULL, NULL),
(7, 'TIK-CSF-00000000007', 7, 2, 3, NULL, 'Encours', NULL, '<p>Bonjour,</p>\r\n\r\n<p><strong>DQL </strong>as a query language has <em>SELECT</em>, <em>UPDATE </em>and <em>DELETE </em>constructs that map to their corresponding SQL statement types. INSERT statements are not allowed in DQL, because entities and their relations have to be introduced into the persistence context through&nbsp;<code>EntityManager#persist()</code>&nbsp;to ensure consistency of your object model.</p>\r\n\r\n<p>DQL SELECT statements are a very powerful way of retrieving parts of your domain model that are not accessible via associations. Additionally they allow you to retrieve entities and their associations in oneefzrr&quot;earararee single SQL select statement which can make a huge difference in performance compared to using several queries.</p>\r\n\r\n<p>DQL UPDATE and DELETE statements offer a way to execute bulk changes on the entities of your domain model. This is often necessary when you cannot load all the affected entities of a bulk update into memory.</p>\r\n\r\n<p>zaeaeaeae</p>\r\n', NULL, '2021-01-14 11:56:32', '2021-11-05 20:26:05', NULL, NULL, NULL, NULL, NULL),
(8, 'TIK-CSF-00000000008', 9, 2, 4, NULL, 'A_Validé', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', NULL, '2021-12-07 14:29:04', '2021-12-07 14:29:22', '2021-12-07 14:31:02', NULL, NULL, NULL, NULL);

--
-- Déclencheurs `ticket`
--
DROP TRIGGER IF EXISTS `insertion_historique`;
DELIMITER $$
CREATE TRIGGER `insertion_historique` AFTER INSERT ON `ticket` FOR EACH ROW BEGIN
	INSERT INTO historiqueticket (idTicket, dateStatut, statut, saisisseur)
    SELECT new.idTicket, now(), statutTicket, saisisseur
    FROM ticket
    WHERE idTicket = new.idTicket;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insertion_historique_apres_maj`;
DELIMITER $$
CREATE TRIGGER `insertion_historique_apres_maj` AFTER UPDATE ON `ticket` FOR EACH ROW BEGIN
	INSERT INTO historiqueticket (idTicket, dateStatut, statut, saisisseur)
    SELECT old.idTicket, now(), statutTicket, saisisseur
    FROM ticket
    WHERE idTicket = old.idTicket;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
CREATE TABLE IF NOT EXISTS `trimestre` (
  `idTrimestre` int(11) NOT NULL AUTO_INCREMENT,
  `trimestre` varchar(3) NOT NULL COMMENT 'T1, T2, ....',
  `annotation_csf` varchar(200) NOT NULL COMMENT 'Dossier KYC à mettre dans le circuit, information à confirmer, Information à modifier dans Amplitude,Surveillance des flux, #N/A',
  `detail` varchar(200) NOT NULL,
  `relation_client` varchar(200) DEFAULT NULL,
  `motif_relation_cli` varchar(200) DEFAULT NULL,
  `recap` varchar(4) DEFAULT NULL COMMENT 'OK / KO',
  PRIMARY KEY (`idTrimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `matricule` varchar(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `agence` int(11) NOT NULL,
  `direction` varchar(250) NOT NULL,
  `unite` varchar(100) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `statutCompte` varchar(10) NOT NULL,
  `profil` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `fk_Utilisateur_Profil` (`profil`),
  KEY `fk_Utilisateur_Agence` (`agence`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `matricule`, `email`, `agence`, `direction`, `unite`, `poste`, `statutCompte`, `profil`) VALUES
(1, 'RAVOAHANGINIAINA', 'Cedrick', '5055', 'Cedrick.RAVOAHANGINIAINA@bni.mg', 99, 'DRJC', 'DRJC - PRO', 'Chargé de projet', 'Activé', 6),
(2, 'Dadina', 'Dadi', '1234', 'Cedrick.RAVOAHANGINIAINA@bni.mg', 99, 'AAAAA', 'BBB-BBBB-BBB', 'Chargé', 'Activé', 3),
(3, 'RAJAONARISON', 'Liva Agelica', '3414', 'Cedrick.RAVOAHANGINIAINA@bni.mg', 99, 'drjc', 'csf', 'Responsable', 'Activé', 1),
(4, 'RAHARINJATOVO', 'Avotra', '4882', 'Cedrick.RAVOAHANGINIAINA@bni.mg', 99, 'drjc', 'csf', 'chargé', 'Activé', 2),
(5, 'A', 'a', '2345', 'Cedrick.RAVOAHANGINIAINA@bni.mg', 2, 'A', 'A', 'A', 'Activé', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client_sensible`
--
ALTER TABLE `client_sensible`
  ADD CONSTRAINT `fk_sensible_rapport` FOREIGN KEY (`idRapport`) REFERENCES `rapport` (`idRapport`),
  ADD CONSTRAINT `fk_sensible_trimestre` FOREIGN KEY (`idTrimestre`) REFERENCES `trimestre` (`idTrimestre`),
  ADD CONSTRAINT `fk_sensible_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande utilisateur` FOREIGN KEY (`envoyeur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `docubase`
--
ALTER TABLE `docubase`
  ADD CONSTRAINT `fk_docubase_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk_document_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `dos`
--
ALTER TABLE `dos`
  ADD CONSTRAINT `fk_dos_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `echange`
--
ALTER TABLE `echange`
  ADD CONSTRAINT `fk_echange_demandeur` FOREIGN KEY (`idUtilisateur_1`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_echange_saisisseur` FOREIGN KEY (`idUtilisateur_2`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_echange_ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Contraintes pour la table `echangebox`
--
ALTER TABLE `echangebox`
  ADD CONSTRAINT `fk_box_echange` FOREIGN KEY (`idEchange`) REFERENCES `echange` (`idEchange`),
  ADD CONSTRAINT `fk_box_ticket` FOREIGN KEY (`idTicketBox`) REFERENCES `ticket` (`idTicket`),
  ADD CONSTRAINT `fk_box_utilisateur` FOREIGN KEY (`idUtilisateurBox`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `echange_message`
--
ALTER TABLE `echange_message`
  ADD CONSTRAINT `fk_message_echange` FOREIGN KEY (`idEchange_echange`) REFERENCES `echange` (`idEchange`),
  ADD CONSTRAINT `fk_message_utilisateur` FOREIGN KEY (`idUtilisateur_message`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `historiqueticket`
--
ALTER TABLE `historiqueticket`
  ADD CONSTRAINT `fk_historique_Utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_historique_ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_information_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `message_relance`
--
ALTER TABLE `message_relance`
  ADD CONSTRAINT `fk_message_sirron` FOREIGN KEY (`idSiron`) REFERENCES `siron` (`idSiron`);

--
-- Contraintes pour la table `pj_traitement`
--
ALTER TABLE `pj_traitement`
  ADD CONSTRAINT `fl_Pj_Ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Contraintes pour la table `questionnaire_aml`
--
ALTER TABLE `questionnaire_aml`
  ADD CONSTRAINT `fk_questionnaire_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `fk_rapport_relation` FOREIGN KEY (`idRelationClient`) REFERENCES `relation_client` (`idRelation_client`),
  ADD CONSTRAINT `fk_rapport_surveillance` FOREIGN KEY (`idSurveillanceFlux`) REFERENCES `surveillance_flux` (`idSurveillance_Flux`);

--
-- Contraintes pour la table `relance_samifin`
--
ALTER TABLE `relance_samifin`
  ADD CONSTRAINT `fk_relanceSamifin_information` FOREIGN KEY (`idinformation`) REFERENCES `information` (`idInformation`);

--
-- Contraintes pour la table `relance_siron`
--
ALTER TABLE `relance_siron`
  ADD CONSTRAINT `fk_relanceSiron_siron` FOREIGN KEY (`idsiron`) REFERENCES `siron` (`idSiron`);

--
-- Contraintes pour la table `relance_unite`
--
ALTER TABLE `relance_unite`
  ADD CONSTRAINT `fk_relanceUnite_information` FOREIGN KEY (`idInformation`) REFERENCES `information` (`idInformation`);

--
-- Contraintes pour la table `revision_kyc`
--
ALTER TABLE `revision_kyc`
  ADD CONSTRAINT `fk_Kyc_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `siron`
--
ALTER TABLE `siron`
  ADD CONSTRAINT `fk_siron_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `sss`
--
ALTER TABLE `sss`
  ADD CONSTRAINT `fk_SSS_utilisateur` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_Ticket_Demande` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`idDemande`),
  ADD CONSTRAINT `fk_Ticket_Utilisateur_1` FOREIGN KEY (`demandeur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_Ticket_Utilisateur_2` FOREIGN KEY (`valideur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_Ticket_Utilisateur_3` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Agence` FOREIGN KEY (`agence`) REFERENCES `agence` (`idAgence`),
  ADD CONSTRAINT `fk_Utilisateur_Profil` FOREIGN KEY (`profil`) REFERENCES `profil` (`idProfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
