<?php

// création d'un titre de page
$title = "Admin creation form";

include "header.php";
include "formulaire-connexion.php";
include "information.php";

include_once "config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::USERNAME, Config::PASSWORD);

//creation de la requete
$requete = $pdo->prepare("select * from activity_sector");
//executer la requete
$requete->execute();
//recuperer le resultat sous forme d'un tableau
$activity_sector = $requete->fetchAll();


?>

<!-- Modifier le form pour que ce soit u qui crée un event. -->


<h2 class="title-creation-form">Formulaire de création d'Évenement.</h2>

<form class="formulaire-creation" action="actions/addImage.php" method="post" enctype="multipart/form-data">
    <div class="div-input-label">
        <label for="file">Ajouter une photo</label>
        <input type="file" name="file">
        <input type="submit" value="OK">
    </div>
</form>
<form class="formulaire-creation" action="actions/insertEventconfig.php" method="post">
    <div class="div-input-label">
        <label for="img">Selectionner une image :</label>
        <select name="img" id="img">
            <?php
            $images = scandir("assets/image/background/");
            foreach ($images as $img) {
                if ($img != "." && $img != ".." && $img != ".DS_Store") {
                    ?>
                    <option value="<?php echo $img ?>"><?php echo $img ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>

    <div class="div-input-label">
        <label for="title">Entrez un titre :</label>
        <input type="text" name="title" id="title">
    </div>

    <div class="div-input-label">
        <label for="description">Entrez une description :</label>
        <input type="text" name="description" id="description">
    </div>

    <div class="div-input-label">
        <label for="body">Veuillez selectionner une couleur de formulaire :</label>
        <input type="color" id="color" name="color"
               value="#f6b73c">

    </div>

    <div class="div-input-label">
        <label for="activity_sector">Secteur : </label>
        <select name="activity_sector[]" id="activity_sector" multiple>
            <?php
            foreach ($activity_sector as $as) {
                ?>
                <option value=<?php echo $as['id'] ?>><?php echo $as['name'] ?></option>
                <?php
            }

            ?>
            ?>
        </select>
    </div>
    <div class="div-input-label">
        <label for="form_title">Message du bouton : </label>
        <input type="text" name="form_title" id="form_title">
        <!-- Faire une boucle php forEach pour les options de secteur. -->
    </div>
    <input type="submit" value="Envoyer" class="btn-submit">


</form>

<?php

include "footer.php"
?>
