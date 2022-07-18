
DROP TABLE IF EXISTS `bn_user`;
CREATE TABLE `bn_user` (
  `id` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `adresse` varchar(600) NULL,
  `code_postal` varchar(5) NULL,
  `ville` varchar(200) NULL,
  `tel_fixe` varchar(15) NULL,
  `tel_portable` varchar(15) NULL,
  `mail` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bn_user`
--
ALTER TABLE `bn_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bn_user`
--
ALTER TABLE `bn_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


  