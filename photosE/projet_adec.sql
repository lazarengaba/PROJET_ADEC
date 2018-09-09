-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 10 sep. 2018 à 01:43
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_adec`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(100) DEFAULT NULL,
  `niveau_classe` varchar(100) DEFAULT NULL,
  `solde_ecolage_gar` int(11) NOT NULL,
  `solde_ecolage_fil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `nom_classe`, `niveau_classe`, `solde_ecolage_gar`, `solde_ecolage_fil`) VALUES
(1, '6Ã¨me I', '6Ã¨me', 70000, 60000),
(2, '6Ã¨me II', '6Ã¨me', 60000, 50000),
(3, '6Ã¨me III', '6Ã¨me', 2500, 2000),
(4, '6Ã¨me IV', '6Ã¨me', 500000, 400000),
(5, 'Tle D1', 'Tle', 25000, 2000),
(6, 'Tle D2', 'Tle', 50000, 40000),
(7, '3 Ã¨me I', '3Ã¨me', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ecolage`
--

CREATE TABLE `ecolage` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_eleve` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL,
  `auteur_versement` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecolage`
--

INSERT INTO `ecolage` (`id`, `id_eleve`, `montant`, `auteur_versement`, `date`) VALUES
(1, '1', 70000, 'Lazare', '09-09-2018'),
(2, '4', 20000, 'ADOUCIE', '09-09-2018'),
(3, '12', 20000, 'HHJHJJJHHJ', '09-09-2018'),
(4, '15', 20000, 'piak', '09-09-2018'),
(5, '16', 15000, 'OK', '09-09-2018'),
(6, '17', 45000, 'BR2', '09-09-2018');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `mle` int(10) NOT NULL,
  `classe_eleve` varchar(10) NOT NULL,
  `solde_verse` int(10) UNSIGNED NOT NULL,
  `nom_de_famille` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` varchar(255) NOT NULL,
  `lieu_de_naissance` varchar(255) NOT NULL,
  `sexe_eleve` varchar(20) NOT NULL,
  `nom_complet_tuteur` varchar(255) NOT NULL,
  `adresse_tuteur` varchar(255) NOT NULL,
  `contact_tuteur` varchar(20) NOT NULL,
  `civilite_tuteur` varchar(20) NOT NULL,
  `profession_tuteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`mle`, `classe_eleve`, `solde_verse`, `nom_de_famille`, `prenom`, `date_de_naissance`, `lieu_de_naissance`, `sexe_eleve`, `nom_complet_tuteur`, `adresse_tuteur`, `contact_tuteur`, `civilite_tuteur`, `profession_tuteur`) VALUES
(1, '1', 70000, 'TOGBA', 'Lazare', '2018-09-06', 'TCHAD', 'Masculin', 'TOGBA LAZARE', 'AGOE', '+22891985311', 'Monsieur', 'Etudiant ESGIS'),
(2, '3', 0, 'jean', 'garou', '2011-06-07', 'dsfzeed', 'Masculin', 'dsfefea', 'efa', '1231231', 'Monsieur', 'edfeda'),
(3, '1', 0, 'jojo', 'ergerge', '2018-09-05', 'rzfzff', 'Masculin', 'rezefzf', 'ertgzg', '11213', 'Monsieur', 'rezrgz'),
(4, '1', 20000, 'Adoucie', 'ezrgzer', '2018-09-13', 'zerfzer', 'FÃ©minin', 'ergzezergzeezr', 'zergzer', 'zergzer', 'Monsieur', 'fer'),
(8, '1', 0, 'HUYGIUG', 'UIGHIU', '2018-09-06', 'UIGHIU', 'Masculin', 'HUUIHIUH', 'HJBIUH', '67TT87', 'Monsieur', 'UIHIUH'),
(10, '1', 0, 'IU', 'JKHIO', '2018-09-05', 'IJUHOIJH', 'Masculin', 'JIO', 'IOJIIO', '866878', 'Monsieur', 'OKOIJNOI'),
(11, '6', 0, 'ZAJUU', 'carmÃ¨ne', '2018-09-06', 'ergterget', 'FÃ©minin', 'regfterger', '(\'tg(\'yh\'(y', '2323232', 'Monsieur', 'ergt(regrt-'),
(12, '6', 20000, 'fafbole', 'marce', '2018-08-29', 'dfssfdfd', 'Masculin', 'dfdf', 'edrzrez', '2323232', 'Monsieur', 'sdfdseedfse'),
(13, '1', 0, 'AROLE', 'MASE', '2018-09-04', 'FRZSRF', 'Masculin', 'ZERZ', 'RZEZ', '4323434', 'Monsieur', 'ZEZEZREZEEZ'),
(14, '1', 0, 'UHOIUHI', 'IUHO', '2018-09-06', 'IOHUO', 'Masculin', 'OIUH', 'IUHOIUH', 'L UIHOIBUH', 'Monsieur', 'UHOIUHO'),
(15, '6', 20000, 'PIAK', 'IUYOIU', '2018-09-13', 'O8UO98', 'Masculin', 'lboui', 'HOIUHOIUBH', 'OB8UO98U', 'Monsieur', 'UOBYO8YO'),
(16, '6', 15000, 'FILLE', 'PIOPOIJ', '2018-09-05', 'HOBIUHIU', 'FÃ©minin', 'OPNIJ', ' IJPOIJPOI', 'LI UHOIU', 'Monsieur', 'OUIPOIJP'),
(17, '6', 45000, 'GARSON', 'SDSD', '2018-09-05', 'SDSZDSZ', 'Masculin', 'EZQS', 'AZZ', '3343343', 'Monsieur', 'ZAEA');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `mle_enseignant` varchar(10) NOT NULL,
  `nom_enseignant` varchar(255) NOT NULL,
  `prenom_enseignant` varchar(255) NOT NULL,
  `sexe_enseignant` varchar(20) NOT NULL,
  `email_enseignant` varchar(50) NOT NULL,
  `telephone_enseignant` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`mle_enseignant`, `nom_enseignant`, `prenom_enseignant`, `sexe_enseignant`, `email_enseignant`, `telephone_enseignant`) VALUES
('1233', 'SADATE', 'SADATN', 'Masculin', 'ZSFZERFZERFREZ', '132E14344'),
('12366', 'DARO', 'FOF', 'Masculin', 'EZRZRER', '211322'),
('212', 'FANUEL', 'FAFA', 'Masculin', '', '121322132'),
('Ã©Ã©Ã©', 'dfdsff', 'drgerg', 'Masculin', 'rgrege', '123343545'),
('kuybiyg', 'ytfytr', 'uytfuyt', 'Masculin', '', 'trdytr');

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

CREATE TABLE `enseignement` (
  `id` int(10) UNSIGNED NOT NULL,
  `matiere` varchar(10) NOT NULL,
  `classe` int(11) NOT NULL,
  `enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignement`
--

INSERT INTO `enseignement` (`id`, `matiere`, `classe`, `enseignant`) VALUES
(1, '2', 1, 0),
(2, '1', 1, 0),
(3, '3', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `matens`
--

CREATE TABLE `matens` (
  `id` int(10) UNSIGNED NOT NULL,
  `enseignant` varchar(20) NOT NULL,
  `matiere_ens` int(11) NOT NULL,
  `classe_ens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matens`
--

INSERT INTO `matens` (`id`, `enseignant`, `matiere_ens`, `classe_ens`) VALUES
(1, '12366', 6, 1),
(2, '12366', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_classe` int(11) NOT NULL,
  `nom_matiere` varchar(255) NOT NULL,
  `coeff_matiere` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `id_classe`, `nom_matiere`, `coeff_matiere`) VALUES
(1, 2, 'MathÃ©matiques', 4),
(2, 4, 'philisophie', 3),
(3, 4, 'PHILOSOPHIE', 1),
(5, 5, 'anglais', 3),
(6, 1, 'ECM', 1),
(7, 1, 'philosophie', 7),
(8, 6, 'philosohie', 7),
(9, 7, 'HISTOIRE-GEOGRAPHIE', 2),
(10, 6, 'HISTOIRE-GEOGRAPHIE', 3),
(11, 3, 'Anglais', 3);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_env` varchar(20) NOT NULL,
  `id_recp` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `lu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `nom_niveau` varchar(100) NOT NULL,
  `num_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`nom_niveau`, `num_niveau`) VALUES
('1Ã¨re', 6),
('2nde', 5),
('3Ã¨me', 4),
('4Ã¨me', 3),
('5Ã¨me', 2),
('6Ã¨me', 1),
('Tle', 7);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(10) UNSIGNED NOT NULL,
  `mle_note` varchar(20) NOT NULL,
  `note_classe` varchar(20) NOT NULL,
  `note_matiere` int(11) NOT NULL,
  `note_semestre` varchar(20) NOT NULL,
  `note_note1` int(5) NOT NULL,
  `note_note2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `mle_note`, `note_classe`, `note_matiere`, `note_semestre`, `note_note1`, `note_note2`) VALUES
(1, '2', '3', 6, 'trimestreI', 1, 0),
(2, '4', '1', 6, 'trimestreIII', 4, 5),
(3, '13', '1', 6, 'trimestreIII', 5, 4),
(4, '8', '1', 6, 'trimestreIII', 6, 2),
(5, '10', '1', 6, 'trimestreIII', 1, 4),
(6, '3', '1', 6, 'trimestreIII', 5, 6),
(7, '1', '1', 6, 'trimestreIII', 3, 1),
(8, '14', '1', 6, 'trimestreIII', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recus_banks`
--

CREATE TABLE `recus_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_op` varchar(255) NOT NULL,
  `code_bank` varchar(255) NOT NULL,
  `num_compte` varchar(255) NOT NULL,
  `titulaire_compte` varchar(255) NOT NULL,
  `ref_recu` varchar(255) NOT NULL,
  `deposant` varchar(255) NOT NULL,
  `montant_depose` int(7) NOT NULL,
  `mle_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recus_banks`
--

INSERT INTO `recus_banks` (`id`, `date_op`, `code_bank`, `num_compte`, `titulaire_compte`, `ref_recu`, `deposant`, `montant_depose`, `mle_eleve`) VALUES
(1, '2018-09-12', '456', 'poijp', 'ipjoi', 'jpoij', '45j', 54, 1),
(2, '2018-09-21', 'code', '45lm', 'lazare', 'aa', 'lazare', 50000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `mle_user` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bp` varchar(50) NOT NULL,
  `MDP` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `accreditation` int(1) NOT NULL,
  `poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`mle_user`, `nom`, `prenom`, `user_name`, `tel`, `email`, `bp`, `MDP`, `adresse`, `accreditation`, `poste`) VALUES
('1', 'TOGBA', 'Lazare', 'lazare', '91986311', 'ngabalazare3@gmail.com', 'lazare', 'lazare', 'Agoe', 5, 'Proviseur'),
('12500l', 'piak', 'DOUTI', 'piak', 'XXX', 'XXX', 'XXX', 'piak', 'XXX', 5, 'XXX');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `ecolage`
--
ALTER TABLE `ecolage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`mle`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`mle_enseignant`);

--
-- Index pour la table `enseignement`
--
ALTER TABLE `enseignement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matens`
--
ALTER TABLE `matens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`nom_niveau`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `recus_banks`
--
ALTER TABLE `recus_banks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mle_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ecolage`
--
ALTER TABLE `ecolage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `enseignement`
--
ALTER TABLE `enseignement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `matens`
--
ALTER TABLE `matens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recus_banks`
--
ALTER TABLE `recus_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
