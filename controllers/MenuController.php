<?php

namespace Controller;

use Base\Controller;
use Model\Menu;
use Model\Utilisateur;
use Model\Categorie;

class MenuController extends Controller {

    /**
     * Affiche la page du menu avec les plats classés par catégorie.
     * Vérifie si l'utilisateur est connecté et s'il s'agit de Gaston.
     *
     * @return void
     */
    public function menu() {
        $modele_menu = new Menu;
        $plats = $modele_menu->parCategorie('plats');
        $entrees = $modele_menu->parCategorie('entrees');
        $desserts = $modele_menu->parCategorie('desserts');

        $estConnecte = !empty($_SESSION["utilisateur_id"]);
        if($estConnecte) {
            $utilisateur = (new Utilisateur)->parId($_SESSION["utilisateur_id"]);
            $estGaston = $utilisateur->courriel == 'gastonleclient@pubg4.com';
        }
        
        include("views/menu.view.php");
    }

     /**
     * Affiche le formulaire de création d'un nouveau plat au menu.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     *
     * @return void
     */
    public function creer() {     
        if(empty($_SESSION["utilisateur_id"])){
            header("location: index");
            exit();
        }
        
        $categories = (new Categorie)->tout();        
        include("views/menu-creer.view.php");        
    }   

     /**
     * Traite les informations de création d'un nouveau plat au menu.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     * Vérifie si des informations essentielles sont manquantes.
     * Envoie les informations au modèle Menu pour l'ajout du plat.
     * Redirige en cas d'erreur ou de succès.
     *
     * @return void
     */
    public function enregistrer() {
        if(empty($_SESSION["utilisateur_id"])){
            header("location: connexion");
            exit();
        }

        if(empty($_POST["nom"]) ||
           empty($_POST["description"]) ||
           empty($_POST["prix"]) ||
           empty($_POST["categorie_id"])){
            header("location: menu-creer?infos_absentes=1");
            exit();
        }    

        // Envoi les infos au modèle Menu       
        $succes = (new Menu)->ajouter($_POST["nom"], 
                                      $_POST["description"],
                                      $_POST["prix"],
                                      $_POST["categorie_id"]);
        
        // Redirection
        if(!$succes){            
            header("location: menu-creer?erreur_creation_menu=1");
            exit();
        }

        header("location: menu?succes_creation_menu=1");
        exit();
    }

     /**
     * Affiche le formulaire de modification d'un plat du menu.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     * Vérifie si l'ID du plat à modifier est présent.
     * Vérifie si le plat spécifié existe.
     *
     * @return void
     */
    public function modifier() {
        if(empty($_SESSION["utilisateur_id"])){
            header("location: index");
            exit();
        }
    
        if(empty($_GET["id"])){
            header("location: menu?assiette_inexistante=1");
            exit();
        }
    
        $assiette = (new Menu)->parId($_GET["id"]);
    
        if(!$assiette){
            header("location: menu?assiette_inexistante=1");
            exit();
        }
    
        $categories = (new Categorie)->tout();
    
        include("views/menu-modifier.view.php");
    }

     /**
     * Traite les informations de modification d'un plat du menu.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     * Vérifie si des informations essentielles sont manquantes.
     * Envoie les informations au modèle Menu pour la mise à jour du plat.
     * Redirige en cas d'erreur ou de succès.
     *
     * @return void
     */
    public function reviser() {
        if(empty($_POST["nom"]) ||
            empty($_POST["description"]) ||
            empty($_POST["prix"]) ||
            empty($_POST["categorie_id"])) {

            header("location: menu-modifier?id=" . $_POST["id"] . "&infos_absentes=1");
            exit();
        }

        $succes = (new Menu)->modifier($_POST["id"],
                                        $_POST["nom"],
                                        $_POST["description"],
                                        $_POST["prix"],
                                        $_POST["categorie_id"]);

        if(!$succes){
            header("location: menu-modifier?id=" . $_POST["id"] . "&erreur_modification=1");
            exit();
        }

        header("location: menu?succes_modification=1");
        exit();
    }

     /**
     * Supprime un plat du menu.
     * Redirige vers la page de connexion si l'utilisateur n'est pas connecté.
     * Vérifie si l'ID du plat à supprimer est présent.
     * Envoie l'ID au modèle Menu pour la suppression du plat.
     * Redirige en cas d'erreur ou de succès.
     *
     * @return void
     */
    public function supprimer() {
        if(empty($_SESSION["utilisateur_id"])) {
            header("location: connexion");
            exit();
        }

        if(empty($_GET["id"])){
            header("location: menu?assiette_inexistante=1");
            exit();
        }
       
        $succes = (new Menu)->supprimer($_GET["id"]);

        if(!$succes){
            header("location: menu?echec_suppression=1");
            exit();
        }

        header("location: menu?succes_suppression=1");
        exit();
    }
}

