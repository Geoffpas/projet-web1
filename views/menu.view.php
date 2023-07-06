<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pub G4 - Menu -</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <header class="menu">
        <div class="banniere">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
            <div class="menu-nav">
                <div class="contact">
                    <div class="telephone">
                        <span class="material-icons-outlined">phone</span>
                        <span>450 436-1531</span>
                    </div>
                    <div class="adresse">
                        <span class="material-icons-outlined">place</span>
                        <a href="https://www.google.com/maps/place/297+Rue+St+Georges,+Saint-J%C3%A9r%C3%B4me,+QC+J7Z+5A2/@45.7762684,-74.0055905,17z/data=!3m1!4b1!4m6!3m5!1s0x4ccf2ca136664c05:0x90430ecdc061500!8m2!3d45.7762647!4d-74.0030156!16s%2Fg%2F11c5l5hmqs?entry=ttu" target="_blank"">
                            297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2
                        </a>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a class="" href="index" title="Accueil">Accueil</a>
                        </li>
                        <li>
                            <a class="" href="menu" title="Menu">Menu</a>
                        </li>
                        <li>
                            <a class="" href="index#histoire" title="Notre Entreprise">Notre Entreprise</a>
                        </li>
                        <li>
                            <a class="" href="index#contact" title="Contact">Contact</a>
                        </li>
                        <li>
                            <a class="" href="#infolettre" title="Info-Lettre">Info-Lettre</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="conteneur-menu">
        <h1>Notre Menu</h1>
        <?php if(isset($_GET["succes_creation_menu"])) : ?>
            <p class="msg succes">L'ajout de l'assiette a réussi</p>
        <?php endif; ?>

        <?php if(isset($_GET["assiette_inexistante"])) : ?>
            <p class="msg erreur">L'assiette n'existe pas.</p>
        <?php endif; ?>

        <?php if(isset($_GET["succes_modification"])) : ?>
            <p class="msg succes">L'assiette a bien été modifiée.</p>
        <?php endif; ?>

        <?php if(isset($_GET["succes_suppression"])) : ?>
            <p class="msg succes">L'assiette a bien été supprimée.</p>
        <?php endif; ?>

        <?php if(isset($_GET["echec_suppression"])) : ?>
            <p class="msg erreur">La suppression n'a pus être effectuée.</p>
        <?php endif; ?>

        <div class="menu">
            <?php if ($estConnecte) : ?> 
                <div class="btn-admin"> 
                    <a class="btn-deconnexion" href="deconnecter"><span class="material-icons-outlined">logout</span>Déconnexion</a>
                    <a href="menu-creer" class="ajouter"><span class="material-icons-outlined">add</span>Nouvelle assiette</a>               
                </div> 
            <?php endif; ?>
            <?php if ($estConnecte && $estGaston) : ?> 
                <div class="btn-admin"> 
                    <a class="btn-employes" href="compte"><span class="material-icons-outlined">people_alt</span>Liste des employés</a>                
                </div> 
            <?php endif; ?>
            <div class="image-column">
                <div id="entrees-image1"></div>
                <div id="entrees-image2"></div>
                <div id="plats-image1"></div>
                <div id="plats-image2"></div>
                <div id="plats-image3"></div>
                <div id="desserts-image"></div>
            </div>
            <div id="entrees">
                <h2>Nos entrées</h2>
                <hr class="separateur">
                <?php foreach($entrees as $entree) : ?>
                    <h4><?= $entree->nom ?></h4>
                    <p><?= $entree->description ?></p>
                    <p class="prix"><?= $entree->prix ?>$</p>
                    <?php if ($estConnecte) : ?> 
                        <div class="admin-icons"> 
                            <a class="" href="menu-supprimer?id=<?= $entree->id ?>">
                               <span class="material-icons-outlined">delete</span>
                            </a> 
                            <a class="" href="menu-modifier?id=<?= $entree->id ?>">
                                <span class="material-icons-outlined">edit</span>
                            </a>  
                        </div> 
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div id="plats">
                <h2>Nos Plats</h2>
                <hr class="separateur">
                <?php foreach($plats as $plat) : ?>
                    <h4><?= $plat->nom ?></h4>
                    <p><?= $plat->description ?></p>
                    <p class="prix"><?= $plat->prix ?>$</p>
                    <?php if ($estConnecte) : ?> 
                        <div class="admin-icons"> 
                            <a class="" href="menu-supprimer?id=<?= $plat->id ?>">
                                <span class="material-icons-outlined">delete</span>
                            </a>  
                            <a class="" href="menu-modifier?id=<?= $plat->id ?>">
                                <span class="material-icons-outlined">edit</span>
                            </a>  
                        </div> 
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div id="desserts">
                <h2>Nos Desserts</h2>
                <hr class="separateur">
                <?php foreach($desserts as $dessert) : ?>
                    <h4><?= $dessert->nom ?></h4>
                    <p><?= $dessert->description ?></p>
                    <p class="prix"><?= $dessert->prix ?>$</p>
                    <?php if ($estConnecte) : ?> 
                        <div class="admin-icons"> 
                            <a class="" href="menu-supprimer?id=<?= $dessert->id ?>">
                                <span class="material-icons-outlined">delete</span>
                            </a>  
                            <a class="" href="menu-modifier?id=<?= $dessert->id ?>">
                                <span class="material-icons-outlined">edit</span>
                            </a>  
                        </div> 
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="conteneur-footer">
            <div class="logo">
                <a href="index" class="logo-footer" title="Pub G4">
                    <img src="public/img/logo.png" alt="Pub G4">
                </a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a class="" href="index" title="Accueil">Accueil</a>
                    </li>
                    <li>
                        <a class="" href="menu" title="Menu">Menu</a>
                    </li>
                    <li>
                        <a class="" href="#histoire" title="Notre Entreprise">Notre Entreprise</a>
                    </li>
                    <li>
                        <a class="" href="#contact" title="Contact">Contact</a>
                    </li>
                    <li>
                        <a class="" href="#infolettre" title="Info-Lettre">Info-Lettre</a>
                    </li>
                </ul>
            </nav>
            <div class="contact-footer">
                <div class="telephone">
                    <span class="material-icons-outlined">phone</span>
                    <span>450 436-1531</span>
                </div>
                <div class="adresse-footer">
                    <span class="material-icons-outlined">place</span>
                    <a href="https://www.google.com/maps/place/297+Rue+St+Georges,+Saint-J%C3%A9r%C3%B4me,+QC+J7Z+5A2/@45.7762684,-74.0055905,17z/data=!3m1!4b1!4m6!3m5!1s0x4ccf2ca136664c05:0x90430ecdc061500!8m2!3d45.7762647!4d-74.0030156!16s%2Fg%2F11c5l5hmqs?entry=ttu" target="_blank"">
                        297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2
                    </a>
                </div>
                <div class="media-footer">
                    <a href="https://www.facebook.com/"  target="_blank"><img src="public/img/facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/"  target="_blank"><img src="public/img/instagram.png" alt="Instagram"></a>
                    <a href="https://twitter.com/"  target="_blank"><img src="public/img/twitter.png" alt="Twitter"></a>
                </div>
            </div>
            <div class="infolettre" id="infolettre">
                <h4>rester informé du menu</h4>
                <form action="infolettre-enregistrer" method="POST">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="email" name="courriel" placeholder="Courriel" required>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </footer>

</body>
</html>