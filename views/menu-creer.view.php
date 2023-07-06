<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez une assiette | Pub G4</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <main class="menu-creer">
        <section class="conteneur-logo">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
        </section>

        <section>
            <?php if(isset($_GET["infos_absentes"])) : ?>
                <p class="msg erreur">Tous les champs sont requis</p>
            <?php endif; ?>

            <?php if(isset($_GET["erreur_creation_menu"])) : ?>
                <p class="msg erreur">L'ajout de l'assiette a échoué. Veuillez réessayer plus tard</p>
            <?php endif; ?>

            <div class="formulaire-menu">
                <form action="menu-enregistrer" method="POST" enctype="multipart/form-data">
                    <h3>Créez une assiette</h3>
                    <div>
                        <label for="nom"></label>
                        <input type="text" placeholder="Nom" id="nom" name="nom" required>
                    </div>
                    <div>
                        <label for="description"></label>
                        <input type="text" placeholder="Description" id="description" name="description" required>
                    </div>
                    <div>
                        <label for="prix"></label>
                        <input type="text" placeholder="99.99$" id="prix" name="prix" pattern="\d+(\.\d{2})?$" required>
                    </div>
                    <div>
                        <label for="categorie_id">Catégorie</label>
                        <select name="categorie_id" id="categorie_id">
                            <?php foreach($categories as $categorie) : ?>
                                <option value="<?= $categorie->id ?>">
                                    <?= $categorie->nom ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Créer">
                    <a href="menu">Retour au menu</a>
                </form>
            </div>
        </section>
    </main>
</body>

</html>