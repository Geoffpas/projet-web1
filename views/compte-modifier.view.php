<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur | Pub G4</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <main class="compte-modifier">
        <section class="conteneur-logo">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
        </section>

        <section>
            <div class="formulaire-modifier">
                <form action="compte-reviser" method="POST" enctype="multipart/form-data">
                    <?php if(isset($_GET["infos_absentes"])) : ?>
                        <p class="msg erreur">Toutes les informations sont requises</p>
                    <?php endif; ?>

                    <?php if(isset($_GET["confirmation_mdp"])) : ?>
                        <p class="msg erreur">Le mot de passe n'a pu être confirmé. Réessayez.</p>
                    <?php endif; ?>

                    <?php if(isset($_GET["erreur_modification"])) : ?>
                        <p class="msg erreur">Le compte n'a pus être modifié. Réessayez plus tard.</p>
                    <?php endif; ?>
                    
                    <input type="hidden" name="id" value="<?= $compte->id ?>">
                    <h3>Modifier le compte de <span><?= $compte->nom ?></span></h3>
                
                    <div>
                        <label for="nom"></label>
                        <input type="text" placeholder="Nom" id="nom" name="nom" value="<?= $compte->nom ?>" required>
                    </div>
                    <div>
                        <label for="courriel"></label>
                        <input type="text" placeholder="Courriel" id="courriel" name="courriel" value="<?= $compte->courriel ?>" required>
                    </div>
                    <div>
                        <label for="mot-de-passe"></label>
                        <div class="mdp" id="mdp">
                            <input type="password" placeholder="Mot de passe" id="mot-de-passe" name="mdp">
                        </div>
                    </div>
                    <div>
                        <label for="confirmer-mdp"></label>
                        <div class="mdp" id="confirmer">
                            <input type="password" placeholder="Confirmer le mot de passe" id="confirmer-mdp" name="confirmer_mdp">
                        </div>
                    </div>
                    <input type="submit" value="Modifier">
                    <a href="compte">Liste des employés</a>
                </form>
            </div>
        </section>
    </main>
</body>

</html>