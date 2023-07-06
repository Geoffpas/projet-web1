<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une assiette | Pub G4</title>
    <?php include("views/parts/head.inc.php"); ?>
</head>

<body>
    <main class="menu-modifier">
        <section class="conteneur-logo">
            <div class="logo">
                <a href="index" class="logo-header" title="Pub G4">
                    <img src="public/img/logo.png" alt="Logo Pub G4">
                </a>
            </div>
        </section>

        <section>
            <div class="formulaire-modifier">
                <form class="" action="menu-reviser" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $assiette->id ?>">
                    <?php if(isset($_GET["infos_absentes"])) : ?>
                        <p class="msg erreur">Tous les champs sont requis</p>
                    <?php endif; ?>

                    <?php if(isset($_GET["erreur_modification"])) : ?>
                        <p class="msg erreur">Le menu n'a pus être modifié. Réessayez plus tard.</p>
                    <?php endif; ?>

                    <h1>Modifier une assiette</h1>
                    <div>
                        <label for="nom"></label>
                        <input type="text" id="nom" name="nom" value="<?= $assiette->nom ?>" required>
                    </div>
                    <div>
                        <label for="description"></label>
                        <input type="text" id="description" name="description" value="<?= $assiette->description ?>" required>
                    </div>
                    <div>
                        <label for="prix"></label>
                        <input type="text" id="prix" name="prix" value="<?= $assiette->prix ?>" pattern="\d+(\.\d{2})?$" required>
                    </div>
                    <div>
                        <label for="categorie_id">Catégorie</label>
                        <select name="categorie_id" id="categorie_id">
                            <?php foreach($categories as $categorie) : ?>
                                <option value="<?= $categorie->id ?>"
                                    <?php if($categorie->id == $assiette->categorie_id) echo "selected"; ?>>
                                    <?= $categorie->nom ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="submit" value="Modifier">
                    <a href="menu">Retour au menu</a>
                </form>
            </div>
        </section>
    </main>
</body>

</html>