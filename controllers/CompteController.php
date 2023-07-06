<?php

namespace Controller;

use Base\Controller;
use Model\Utilisateur;

class CompteController extends Controller {

    /**
     * Affiche la page de compte de l'utilisateur.
     *
     * Si l'utilisateur est connecté, affiche ses informations de compte.
     * Si l'utilisateur est Gaston, affiche tous les comptes utilisateurs.
     * Si l'utilisateur n'est ni connecté ni Gaston, redirige vers la page d'accueil.
     *
     * @return void
     */
    public function compte() {
        if (empty($_SESSION["utilisateur_id"])) {
            header("Location: index");
            exit();
        }
    
        $utilisateur = (new Utilisateur)->parId($_SESSION["utilisateur_id"]);
        $estGaston = $utilisateur->courriel == 'gastonleclient@pubg4.com';
    
        if (!$estGaston) {
            header("Location: index");
            exit();
        }
        
        $comptes = (new Utilisateur)->tout();
        include("views/compte.view.php");
    }

    /**
     * Affiche la page de création de compte.
     *
     * Vérifie si l'utilisateur est identifié et s'il s'agit de "Gaston". Si c'est le cas,
     * affiche la page de création de compte en incluant le fichier "views/compte-creer.view.php".
     * Sinon, redirige l'utilisateur vers la page "index".
     *
     * @return void
     */
    public function creer() {
        if (empty($_SESSION["utilisateur_id"])) {
            header("Location: index");
            exit();
        }
    
        $utilisateur = (new Utilisateur)->parId($_SESSION["utilisateur_id"]);
        $estGaston = $utilisateur->courriel == 'gastonleclient@pubg4.com';
    
        if (!$estGaston) {
            header("Location: index");
            exit();
        }
    
        include("views/compte-creer.view.php");
    }

    /**
     * Traite les informations de création de compte.
     *
     * Vérifie les données envoyées via le formulaire de création de compte.
     * Si des informations sont manquantes, redirige vers la page de création de compte avec un message d'erreur.
     * Si la confirmation du mot de passe échoue, redirige vers la page de création de compte avec un message d'erreur.
     * Si la création du compte échoue, redirige vers la page de création de compte avec un message d'erreur.
     * Si la création du compte réussit, redirige vers la page de connexion avec un message de succès.
     *
     * @return void
     */
    public function enregistrer() {
        if(empty($_POST["nom"]) ||
           empty($_POST["courriel"]) ||
           empty($_POST["mdp"]) ||
           empty($_POST["confirmer_mdp"])){
            header("location: compte-creer?infos_absentes=1");
            exit();
        }

        // Confirmation du mot de passe
        if($_POST["mdp"] != $_POST["confirmer_mdp"]){
            header("location: compte-creer?confirmation_mdp=1");
            exit();
        }

        // Encryption du mot de passe
        $mdp_encrypte = password_hash($_POST["mdp"], PASSWORD_DEFAULT);      

        // Envoi les infos au modèle        
        $succes = (new Utilisateur)->ajouter($_POST["nom"], $_POST["courriel"], $mdp_encrypte);
        
        // Redirection
        if(!$succes){            
            header("location: compte-creer?erreur_creation_compte=1");
            exit();
        }

        header("location: compte?succes_creation_compte=1");
        exit();
    }

    /**
     * Affiche le formulaire de modification de compte.
     *
     * Si l'utilisateur est connecté, affiche le formulaire de modification de son propre compte.
     * Si l'utilisateur est Gaston, affiche le formulaire de modification du compte spécifié par l'ID en paramètre.
     * Si l'utilisateur n'est ni connecté ni Gaston, redirige vers la page d'accueil.
     * Si l'ID du compte à modifier est manquant, redirige vers la page de compte avec un message d'erreur.
     * Si le compte spécifié n'existe pas, redirige vers la page de compte avec un message d'erreur.
     *
     * @return void
     */
    public function modifier() {
        if (!empty($_SESSION["utilisateur_id"])) {
            $utilisateur = (new Utilisateur)->parId($_SESSION["utilisateur_id"]);
            $estGaston = $utilisateur->courriel == 'gastonleclient@pubg4.com';
            if (!$estGaston) {
                header("Location: index");
                exit();
            }
        }
    
        if(empty($_GET["id"])){
            header("location: compte?compte_inexistant=1");
            exit();
        }
    
        $compte = (new Utilisateur)->parId($_GET["id"]);
    
        if(!$compte){
            header("location: compte?compte_inexistant=1");
            exit();
        }
    
        $comptes = (new Utilisateur)->tout();
    
        include("views/compte-modifier.view.php");
    }


     /**
     * Traite les informations de modification de compte.
     *
     * Vérifie les données envoyées via le formulaire de modification de compte.
     * Si certaines informations sont manquantes, redirige vers la page de modification de compte avec un message d'erreur.
     * Si la confirmation du mot de passe échoue, redirige vers la page de modification de compte avec un message d'erreur.
     * Si la modification du compte échoue, redirige vers la page de compte avec un message d'erreur.
     * Si la modification du compte réussit, redirige vers la page de compte avec un message de succès.
     *
     * @return void
     */
    public function reviser() {
        if (empty($_POST["nom"]) || 
            empty($_POST["courriel"])) {

            header("Location: compte-modifier?id=" . $_GET["id"] . "&infos_absentes=1");
            exit();
        }
                
        // Vérification de la validité du mot de passe
        if (!empty($_POST["mdp"]) && !empty($_POST["confirmer_mdp"])) {
            if ($_POST["mdp"] != $_POST["confirmer_mdp"]) {
                header("Location: compte-modifier?id=" . $_GET["id"] . "&confirmation_mdp=1");
                exit();
            }
            
            // Encryptage du nouveau mot de passe
            $mdp_encrypte = password_hash($_POST["mdp"], PASSWORD_DEFAULT); 
        }
        
        // Enregistrement des modifications
        $succes = (new Utilisateur)->modifier($_POST["id"],
                                              $_POST["nom"],
                                              $_POST["courriel"],
                                              $mdp_encrypte ?? null);

        if (!$succes) {
            header("Location: compte-modifier?id=" . $_GET["id"] . "&erreur_modification=1");
            exit();
        }
        
        header("Location: compte?modification_reussie=1");
        exit();
        
    }
}