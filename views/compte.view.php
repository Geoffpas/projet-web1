<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pub G4 | Employés</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <main class="compte">
        <section class="conteneur-logo">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
        </section>

        <section class="liste-employes">
            <?php if(isset($_GET["succes_creation_compte"])) : ?>
                <p class="msg succes">Le compte a été créé avec succès !</p>
            <?php endif; ?>

            <?php if(isset($_GET["compte_inexistant"])) : ?>
                <p class="msg erreur">Le compte n'existe pas !</p>
            <?php endif; ?>

            <?php if(isset($_GET["modification_reussie"])) : ?>
                <p class="msg succes">La modification a réussi !</p>
            <?php endif; ?>
            
            <h1>Mes employés</h1>
            <div class="btn-admin">
                <a href="compte-creer"><span class="material-icons-outlined">add</span>Créer un nouvel utilisateur</a>
                <a class="btn-deconnexion" href="deconnecter"><span class="material-icons-outlined">logout</span>Déconnexion</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="colonne-nom">Nom</th>
                        <th  class="colonne-courriel">Courriel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comptes as $compte) : ?>
                        <tr>
                            <td>
                                <a class="nom" href="compte-modifier?id=<?= $compte->id ?>">
                                    <?= $compte->nom ?>
                                </a>
                            </td>
                            <td><?= $compte->courriel ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
