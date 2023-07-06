<?php

namespace Controller;

use Base\Controller;
use Model\Infolettre;

class SiteController extends Controller {
    
     /**
     * Affiche la page d'accueil du site.
     *
     * @return void
     */
    public function index() {
        include("views/index.view.php");
    }

    public function enregistrer() {
        if(empty($_POST["nom"]) ||
           empty($_POST["courriel"])){
            header("location: index?infos_absentes=1");
            exit();
        }

        // Envoi les infos au modèle        
        $succes = (new Infolettre)->ajouter($_POST["nom"], $_POST["courriel"]);
        
        // Redirection
        if(!$succes){            
            header("location: index?erreur_infolettre=1");
            exit();
        }

        header("location: index?succes_infolettre=1");
        exit();
    }
}