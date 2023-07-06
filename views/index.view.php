<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pub G4</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <div>
        <header class="index">
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
                </div>
            </div>

            <section class="conteneur-heading">
                <?php if(isset($_GET["infos_absentes"])) : ?>
                    <p class="msg erreur">Toutes les informations sont requises</p>
                <?php endif; ?>

                <?php if(isset($_GET["erreur_infolettre"])) : ?>
                    <p class="msg erreur">Nous n'avons pas pu enregistrer vos informations. Réessayer plus tard.</p>
                <?php endif; ?>

                <?php if(isset($_GET["succes_infolettre"])) : ?>
                    <p class="msg succes">Nous avons bien reçu vos informations, nous vous enverrons des nouvelles au plus vite !</p>
                <?php endif; ?>

                <div class="heading">
                    <span class="titre-site">Le Pub G4</span>
                    <h1>AMBIANCE CONVIVIALE</h1>
                    <span class="suite-h1" >CHALEUREUSE ET AUTHENTIQUE</span>
                </div>
                <div class="boutons-heading">
                    <div class="bt-menu">
                        <a href="menu">Notre Menu</a>
                    </div>
                    <div class="bt-entreprise">
                        <a href="#histoire">Notre Entreprise</a>
                    </div>
                </div>
            </section>
            
            <div class="commentaires-bg">
                <div class="commentaires" id="app" v-cloak>
                    <p>{{ commentaire.texte }}</p>
                    <div>
                        <img v-for="image in commentaire.noteImages" :src="image" :alt="'Étoile ' + (commentaire.note >= 1 ? 'pleine' : 'demi')" />
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="conteneur-choix">
                <div class="choix-entrees">
                    <a href="menu#entrees" class="cadre-entrees">
                        <h2>Nos Entrées</h2>
                        <span>Découvrir</span>
                    </a>
                </div>
                <div class="choix-plats">
                    <a href="menu#plats" class="cadre-plats">
                        <h2>Nos Plats</h2>
                        <span>Découvrir</span>
                    </a>
                </div>
                <div class="choix-desserts">
                    <a href="menu#desserts" class="cadre-desserts">
                        <h2>Nos Desserts</h2>
                        <span>Découvrir</span>
                    </a>
                </div>
            </section>

            <section class="conteneur-entreprise">
                <div id="histoire">
                    <h1>le pub g4, au centre ville de st Jérôme</h1>
                    <div class="paragraphes">
                        <p>
                            Depuis maintenant 20 ans, Pub G4 vous fait découvrir des plats de tout genre avec une touche raffinée que vous n’avez goutée nulle part ailleurs.
                            Venez entre amis, pour une soirée romantique ou Florence venait d’avouer quelque chose qu’elle n’osait même pas dire à la personne concernée : David. « Son » David. Oui, elle l’aimait.
                        </p><br>
                        <p>
                            Depuis qu’il avait emménagé à côté de chez elle, il y a de ça cinq ans.
                            Depuis le premier regard, elle savait que c’était lui. Et à chaque fois la même chose : dès qu’elle parlait de lui, dès qu’elle pensait à lui, ses yeux brillaient.
                        </p><br>
                        <p>
                            Le militaire regagna sa voiture et la barrière s’ouvrit. David regardait autour de lui,
                            la base militaire où il avait passé dix mois de sa vie. Il n’y avait pas beaucoup de changement. L’herbe toujours aussi bien tondue, les allées toujours aussi propres. Les mêmes bâtiments. Juste les décors avaient changés. Il s’agissait de chars.
                        </p><br>
                        <p>
                            C’étaient les chars que David avait eu l’occasion de voir fonctionner et qui, maintenant, avaient remplacé les vieux chars qui servaient de décors. Cela fit sourire David.
                            Il prend sa sacoche remplie de papiers divers, de livres, de magazines, de crayons... « Le poids de mes connaissances. » comme il aime dire.
                        </p><br>
                        <p>
                            En fait, la plupart des livres n’ont jamais été ouverts, les papiers sont, pour la plupart,
                            des notes prises sur le vif depuis l’achat de cette sacoche et sont plus proches de la décomposition.
                        </p>
                    </div>
                    <div class="bt-visitez">
                        <a href="#map">Visitez-Nous</a>
                    </div>
                </div>
                <div class="image-histoire">
                    <img src="public/img/repas/salade/salade.png" alt="">
                </div>
            </section>

            <section id="contact" class="conteneur-contact">
                <h4>Nous contacter</h4>
                <hr class="separateur">
                <form action="message" method="POST">
                    <div class="input-nom">
                        <input type="text" name="prenom" placeholder="Prénom" required>
                        <input type="text" name="nom" placeholder="Nom">
                    </div>
                    <div class="input-courriel">
                        <input type="email" name="courriel" placeholder="Courriel" required>
                        <input type="tel" name="telephone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Téléphone">
                    </div>
                    <textarea name="message" placeholder="Message" required></textarea>
                    <a href="index">Envoyer</a>
                </form>
            </section>

            <section class="conteneur-map">
                <div class="map" id="map">
                    <a href="https://www.google.com/maps/place/297+Rue+St+Georges,+Saint-J%C3%A9r%C3%B4me,+QC+J7Z+5A2/@45.7762684,-74.0055905,17z/data=!3m1!4b1!4m6!3m5!1s0x4ccf2ca136664c05:0x90430ecdc061500!8m2!3d45.7762647!4d-74.0030156!16s%2Fg%2F11c5l5hmqs?entry=ttu" target="_blank">
                        <img src="public/img/map.jpg" alt="Itinéraire">
                    </a>
                </div>
            </section>
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
                        <input type="text" name="nom" placeholder="Nom">
                        <input type="email" name="courriel" placeholder="Courriel">
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </footer>

    </div>
    <script src="public/js/main.js" type="module"></script>
</body>
</html>