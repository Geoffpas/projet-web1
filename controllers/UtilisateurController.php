<?php

namespace Controller;

use Base\Controller;
use Model\Utilisateur;

class UtilisateurController extends Controller {

     /**
     * Affiche la page de connexion.
     * Redirige vers la page du menu si l'utilisateur est déjà connecté.
     *
     * @return void
     */
    public function connexion() {
        // Si l'utilisateur est déjà connecté, on l'amène directement au menu
        if(!empty($_SESSION["utilisateur_id"])){
            header("location: menu");
            exit();
        }

        // Sinon, on affiche la page de connexion
        include("views/connexion.view.php");
    }

     /**
     * Traite les informations de connexion.
     * Vérifie si les informations essentielles sont manquantes.
     * Récupère l'utilisateur correspondant à l'adresse email fournie.
     * Valide les informations de connexion et redirige en cas d'échec.
     * Ajoute l'ID de l'utilisateur à la session en cas de succès.
     *
     * @return void
     */
    public function connecter() {
        if(empty($_POST["courriel"]) || 
            empty($_POST["mdp"])){
            header("location: connexion?infos_absentes=1");
            exit();
        }

        // Récupération de l'utilisateur         
        $utilisateur = (new Utilisateur)->parCourriel($_POST["courriel"]);

        // Validation et redirection
        if(!$utilisateur || !password_verify($_POST["mdp"], $utilisateur->mot_de_passe)){
            header("location: connexion?echec_connexion=1");
            exit();            
        }

        // Ajout à la session
        $_SESSION["utilisateur_id"] = $utilisateur->id;       
        
        header("location: menu?succes_connexion=1");
        exit();

    }

     /**
     * Déconnecte l'utilisateur en supprimant son ID de la session.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     *
     * @return void
     */
    public function deconnecter() {
        if(empty($_SESSION["utilisateur_id"])){
            header("location: connexion");
            exit();
        }
        
        
        unset($_SESSION["utilisateur_id"]);
        header("location: connexion?succes_deconnexion=1");
        exit();

    }
}