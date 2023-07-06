<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <main class="connexion">
        <section class="conteneur-logo">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
        </section>
        
        <section class="formulaire-connexion">
            
            <form action="connecter" method="POST">
                <?php if(isset($_GET["infos_absentes"])) : ?>
                    <p class="msg erreur">Toutes les informations sont requises</p>
                <?php endif; ?>

                <?php if(isset($_GET["succes_deconnexion"])) : ?>
                    <p class="msg succes">Vous êtes déconnecté.</p>
                <?php endif; ?>

                <label for="courriel"></label>
                <input type="text" placeholder="Courriel" id="courriel" name="courriel">
                <label for="mdp"></label>
                <input type="password" placeholder="Mot de passe" id="mdp" name="mdp">
                <input type="submit" value="Connexion">
            </form>
        </section>
    </main>
</body>