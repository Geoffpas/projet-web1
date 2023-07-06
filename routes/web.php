<?php

$routes = [
    // Accueil
    "index" => ["SiteController", "index"],

    // Info-lettre
    "infolettre-enregistrer" => ["SiteController", "enregistrer"],

    // Affichage du menu
    "menu" => ["MenuController", "menu"],

    // Formulaire création d'assiette
    "menu-creer" => ["MenuController", "creer"],

    // Traitement de l'ajout d'une assiette
    "menu-enregistrer" => ["MenuController", "enregistrer"],

    // Formulaire de modification dans le menu
    "menu-modifier" => ["MenuController", "modifier"],

    // Traitement de la modification
    "menu-reviser" => ["MenuController", "reviser"],

    // Traitement de la suppression dans le menu
    "menu-supprimer" => ["MenuController", "supprimer"],

    // Formulaire de connexion
    "connexion" => ["UtilisateurController", "connexion"],

    // Traitement de la connexion
    "connecter" => ["UtilisateurController", "connecter"],

    // Traitement de la déconnexion
    "deconnecter" => ["UtilisateurController", "deconnecter"],

    // Affichage de la liste des employés (Seulement Gaston)
    "compte" => ["CompteController", "compte"],

    // Formulaire de création de compte (Seulement Gaston)
    "compte-creer" => ["CompteController", "creer"],

    // Traitement de la création d'un compte (Seulement Gaston)
    "compte-enregistrer" => ["CompteController", "enregistrer"],

    // Formulaire de modification de compte (Seulement Gaston)
    "compte-modifier" => ["CompteController", "modifier"],

    // Traitement de la modification de compte (Seulement Gaston)
    "compte-reviser" => ["CompteController", "reviser"]
];