<?php
session_start();

$id = filter_input(INPUT_GET, "id");

// création d'un titre de page
$title = "Ramina Grobis lp";

include "header.php";
include "formulaire-connexion.php";
include "information.php";

include_once "config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::USERNAME, Config::PASSWORD);

//creation de la requete
$requete = $pdo->prepare("select * from activity_sector_by_event where id_event=$id");
//executer la requete
$requete->execute();
//recuperer le resultat sous forme d'un tableau
$activity_sector_by_event = $requete->fetchAll();

$requete = $pdo->prepare("select * from activity_sector");
$requete->execute();
$activity_sector = $requete->fetchAll();

$requete = $pdo->prepare("select * from subscription where event_id=$id");
$requete->execute();
$subscription = $requete->fetchAll();

$requete = $pdo->prepare("select * from event where id=$id");
$requete->execute();
$event = $requete->fetchAll();


?>
    <style>
        .form-img {
            background-image: url('assets/image/background/<?php echo $event[0]['img']?>');
        }
    </style>


<?php

if ($_SESSION['admin'] != true) {
    ?>
    <!-- formulaire en alpha pour test -->
    <section>
        <div class="form-img">
            <h2 class="form-title-usr"><?php echo $event[0]['title'] ?></h2>
            <p class="form-desc-usr"><?php echo $event[0]['description'] ?> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam assumenda autem beatae deserunt enim nostrum nulla tempore. Atque consectetur dolorem eaque eligendi harum odio qui similique veritatis voluptate voluptatibus!</span><span>A alias aliquid at consectetur corporis, cum delectus esse fugiat ipsa ipsam labore laudantium magni, necessitatibus neque nesciunt nostrum obcaecati omnis perferendis perspiciatis qui quis quo repellat saepe sapiente sed.</span><span>Ab amet, architecto, atque commodi deserunt fuga fugit hic incidunt libero officia praesentium provident quis suscipit. Consequuntur deserunt doloremque et quos recusandae. Deserunt dolor obcaecati, odio placeat provident rem saepe!</span><span>Accusamus amet architecto dolorum, error expedita facere, hic itaque libero modi natus neque odio officia pariatur quo vero voluptate voluptatibus. Amet autem cumque cupiditate doloremque ex expedita mollitia perferendis reprehenderit.</span><span>Alias, assumenda dicta dolores eius laboriosam molestias nam totam velit? Amet dicta dolorum esse facere, fugit impedit iusto officiis repellendus? Aperiam deserunt eligendi illo ipsam molestias natus reiciendis ut voluptate!</span>
            </p>
            <form class="formulaire-creation" style="background-color: <?php echo $event[0]['color'] ?>55"
                  action="actions/insertSubscription.php" method="post">
                <div class="div-input-label">
                    <label for="sex">Civilité : </label>
                    <select type="text " name="sex" id="sex" required>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                        <option value="O">Autre</option>
                    </select>
                </div>
                <div class="div-input-label">
                    <label for="last_name">Nom : </label>
                    <input type="text" name="last_name" id="last-name" required>
                </div>
                <div class="div-input-label">
                    <label for="first_name">Prénom : </label>
                    <input type="text" name="first_name" id="first-name" required>
                </div>
                <div class="div-input-label">
                    <label for="email">Email : </label>
                    <input type="text" name="email_adress" id="email" required>
                </div>
                <div class="div-input-label">
                    <label for="group_nb">Nombre d'accompagnants : </label>
                    <input type="number" name="group_nb" id="group-nb">
                </div>
                <div class="div-input-label">
                    <label for="mobile_num">Téléphone portable : </label>
                    <input type="text" name="mobile_num" id="mobile-num">
                </div>

                <div class="div-input-label">
                    <label for="fix_num">Téléphone fixe : </label>
                    <input type="text" name="fix_num" id="fix_num">
                </div>
                <!-- Pro ? -->
                <!-- Un vrai professionel du javascript -->
                <div class="div-input-label">
                    <label for="is_professional">Je viens en tant que professionel :</label>
                    <input type="checkbox" name="is_professional" id="is-professional">
                </div>

                <div class="div-input-label hidden div-input-pro">
                    <label for="activity_sector">Secteur d'activité : </label>
                    <select name="activity_sector" id="activity-sector">
                        <option value="">Veuillez selectionner une option</option>
                        <?php
                        foreach ($activity_sector_by_event as $id_as) {

                            ?>
                            <option value="<?php echo $activity_sector[$id_as[1] - 1]['name'] ?>"><?php echo $activity_sector[$id_as[1] - 1]['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="div-input-label hidden div-input-pro">
                    <label for="company_name">Nom de l'entreprise : </label>
                    <input type="text" name="company_name" id="company_name">
                </div>

                <div class="div-input-label hidden div-input-pro">
                    <label for="job">Métier : </label>
                    <input type="text" name="job" id="job">
                </div>

                <!-- ------------------- -->

                <div class="div-input-label">
                    <label for="newsletter">Je souhaite recevoir les informations relatives à l'organisation
                        d'évènements par <b>Raminagrobis </b>.</label>
                    <input type="checkbox" name="newsletter" id="newsletter">
                </div>
                <div class="div-input-label">
                    <label for="rgpd">Je consent à ce que les données partagées ci-dessus puissent être exploitées à des
                        fins commerciales.</label>
                    <input type="checkbox" name="consent_data" id="consent_data" required>
                </div>

                <input type="hidden" value="<?php echo $id ?>" name="event_id">
                <input type="submit" value="Envoyer" class="btn-submit">

            </form>

    </section>
    <!--Tableau des inscriptions-->
    <?php
}
if ($_SESSION['admin'] == true) {
    //export csv

    $date = new DateTime();
    $time_stamp = $date->getTimestamp();

    $filename = 'assets/files/event' . $id . '_subs_' . $time_stamp . '.csv';

    foreach ($subscription as $person) {
        $i = 0;
        foreach ($person as $data)
        {
            if (!$data){
                $data = ' ';
            }
        }
        while ($person[$i] != NULL) {
            file_put_contents(
                $filename,
                $person[$i] . ',',
                $flags = FILE_APPEND,
                $context = null);
            if (!$person[$i]){
                file_put_contents(
                $filename,
                ',',
                $flags = FILE_APPEND,
                $context = null);
            }
            $i++;
        }
        file_put_contents(
            $filename,
            '\n',
            $flags = FILE_APPEND,
            $context = null);

    }
    ?>
    <section class="container-section-event">

        <div class="container-section-event">
            <div id="table_resp">
                <!--        ici - afficher les inscrits de l'event-->
                <table id="subscribers">
                    <tr>
                        <td>Civilité</td>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Adresse email</td>
                        <td>Nombre d'accompagnants</td>
                        <td>Numéro de téléphone portable</td>
                        <td>Numéro de téléphone fixe</td>
                        <td>Est un professionel</td>
                        <td>Secteur d'activité</td>
                        <td>Nom de l'entreprise</td>
                        <td>Métier</td>
                        <td>Souhaite s'abonner à la newsletter</td>
                        <td>Consent au partage de ses données</td>
                        <td>ID de l'event</td>
                        <td>Scoring</td>
                    </tr>
                    <?php
                    foreach ($subscription as $subscriptor) {
                        ?>
                        <tr>
                            <td><?php echo $subscriptor['sex'] ?></td>
                            <td><?php echo $subscriptor['last_name'] ?></td>
                            <td><?php echo $subscriptor['first_name'] ?></td>
                            <td><?php echo $subscriptor['email_adress'] ?></td>
                            <td><?php echo $subscriptor['group_nb'] ?></td>
                            <td><?php echo $subscriptor['mobile_num'] ?></td>
                            <td><?php echo $subscriptor['fix_num'] ?></td>
                            <td><?php echo $subscriptor['is_professional'] ?></td>
                            <td><?php echo $subscriptor['activity_sector'] ?></td>
                            <td><?php echo $subscriptor['company_name'] ?></td>
                            <td><?php echo $subscriptor['job'] ?></td>
                            <td><?php echo $subscriptor['newsletter'] ?></td>
                            <td><?php echo $subscriptor['consent_data'] ?></td>
                            <td><?php echo $subscriptor['event_id'] ?></td>
                            <td><?php echo $subscriptor['scoring'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td><a href="<?php echo $filename ?>">Telecharger en .csv</a></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </section>


    <?php
}
include "footer.php";
?>