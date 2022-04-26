<?php
    include_once "../config.php";

$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::USERNAME, Config::PASSWORD);

$requete = $pdo->prepare("select * from subscription");

$requete->execute();

$subscription = $requete->fetchAll();

?>

<a href="event_subscrption.csv">TELECHARGER EN FORMAT CSV</a>



