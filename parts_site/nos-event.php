<?php
session_start();

// création d'un titre de page
$title = "Nos events";

include "header.php";
include "formulaire-connexion.php";
include "information.php";

include_once "config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::USERNAME, Config::PASSWORD);

//creation de la requete
$requete = $pdo->prepare("select * from event");
//executer la requete
$requete->execute();
//recuperer le resultat sous forme d'un tableau
$events = $requete->fetchAll();

//?>

<section id="card-session-event" class="event-section">
    <div class="container-section-event">
        <?php
            foreach ($events as $e){
        ?>
        <div class="container-card-event" ">
            <div class="card-event" style="background-color: <?php echo $e['color']?>55">
                <h3 class="card-title-event"><?php echo $e['title'] ?></h3>
                <div class="image-selected" >
                    <p><?php echo $e['description']?></p>
                </div>
                <a href="form-event.php?id=<?php echo $e["id"] ?>" class="link-btn" ><?php echo $e['form_title'] ?></a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

</section>


<?php
include "footer.php";
?>
