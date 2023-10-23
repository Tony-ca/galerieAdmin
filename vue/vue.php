<?php
include_once 'Model/Model.php';


$model = new CategorieModel();
$donnees = $model->getCategorieData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        

<?php

if (isset($_GET["page"]) && ($_GET["page"]) == "connexionAdmin") {
    echo '
        <div class="megaContainerConnexion">
        <div class="containerConnexion">
            <form  class="FormConnexion"action=""method="POST">
                <input  class="inputConnexionEmail" type="text" name="ConnexionEmail" placeholder="Email">
                <input type="text" class="inputConnexionPassword" name="ConnexionPassword" placeholder="Mot de passe">
                <input type="submit" name="inputSubmitConnexion" class="inputSubmitConnexion" value="Connexion">
                <div class="containerTexteConnexion">
                    <p><a href="?page=mot-de-passe-oublié-admin">Mot de passe oublié ?</a></p>
                </div>
            </form>
        </div>
        </div>';
}

if (isset($_GET['page']) && $_GET['page'] == 'admin') {
    echo '<h1>Gestion du site</h1>';
    echo '<li><a href="?">Ajout d\'un compte admin</a></li>';
    echo '<h2>Modification de produits</h2>';

    foreach ($donnees as $categorie => $produits) {
        echo "<h2>$categorie</h2>";

        foreach ($produits as $produit) {
            echo "<p>{$produit['Nom']}, {$produit['Tailles']}, {$produit['Couleur']}, {$produit['Bonnet']}, {$produit['Parfum']}, {$produit['Description_sans_HTML']}, {$produit['Caractéristique_Composition']}, {$produit['URLs_de_toutes_les_images']}</p>";
        }
    }
}
?>
</body>
</html>