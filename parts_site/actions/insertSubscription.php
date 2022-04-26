<?php
//il faudre un code token de sécurité
//TODO antiforgerytoken

//creation et iteration de la variable de scoring
$scoring = 0;

//recuperation des donnees de l'input post dans des variables
$first_name = filter_input(INPUT_POST, "first_name");
if ($first_name != '' && $first_name != Null){
    $scoring++;
}

$last_name = filter_input(INPUT_POST, "last_name");
if ($last_name != '' && $last_name != Null){
    $scoring++;
}

$email_adress = filter_input(INPUT_POST, "email_adress");
if ($email_adress != '' && $email_adress != Null){
    $scoring++;
}

$sex = filter_input(INPUT_POST, "sex");
if ($sex != '' && $sex != Null){
    $scoring++;
}
var_dump($scoring);

$is_professional = filter_input(INPUT_POST, "is_professional");
if ($is_professional != '' && $is_professional != Null){
    $scoring++;
}
if ($is_professional == NULL){
    $is_professional = '';
}

$company_name = filter_input(INPUT_POST, "company_name");
if ($company_name != '' && $company_name != Null){
    $scoring++;
}

$job = filter_input(INPUT_POST, "job");
if ($job != '' && $job != Null){
    $scoring++;
}

$activity_sector = filter_input(INPUT_POST, "activity_sector");
if ($activity_sector != '' && $activity_sector != Null){
    $scoring++;
}

$consent_data = filter_input(INPUT_POST, "consent_data");
if ($consent_data != '' && $consent_data != Null){
    $scoring++;
}

$newsletter = filter_input(INPUT_POST, "newsletter");
if ($newsletter != '' && $newsletter != Null){
    $scoring++;
}
if ($newsletter == NULL){
    $newsletter = '';
}

$fix_num = filter_input(INPUT_POST, "fix_num");
if ($fix_num != '' && $fix_num != Null){
    $scoring++;
}

$mobile_num = filter_input(INPUT_POST, "mobile_num");
if ($mobile_num != '' && $mobile_num != Null){
    $scoring++;
}

$group_nb = filter_input(INPUT_POST, "group_nb");
if ($group_nb != '' && $group_nb != Null){
    $scoring++;
}

$event_id = filter_input(INPUT_POST, "event_id");

$scoring = $scoring / 13 * 100;


//recuperation du fichier de config qui contient toutes les infos de connexion a la base de donnee
//TODO ajouter info de connexion dans la base de donnee (admin/admin)
include_once "../config.php";

//initialisation de la connexion a la base de donnee
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::USERNAME, Config::PASSWORD);

//preparation de la requete

$requete = $pdo->prepare('insert into subscription (first_name, last_name, email_adress, sex, group_nb, mobile_num, fix_num, activity_sector, company_name, job, consent_data, newsletter, is_professional, event_id, scoring)  values (:first_name, :last_name, :email_adress, :sex, :group_nb, :mobile_num, :fix_num, :activity_sector, :company_name, :job, :consent_data, :newsletter, :is_professional, :event_id, :scoring)');


//assignation des variables aux valeurs => pour eviter les injections SQL
$requete->bindParam(":first_name", $first_name);
$requete->bindParam(":last_name", $last_name);
$requete->bindParam(":email_adress", $email_adress);
$requete->bindParam(":sex", $sex);
$requete->bindParam(":is_professional", $is_professional);
$requete->bindParam(":company_name", $company_name);
$requete->bindParam(":job", $job);
$requete->bindParam(":activity_sector", $activity_sector);
$requete->bindParam(":consent_data", $consent_data);
$requete->bindParam(":newsletter", $newsletter);
$requete->bindParam(":fix_num", $fix_num);
$requete->bindParam(":mobile_num", $mobile_num);
$requete->bindParam(":group_nb", $group_nb);
$requete->bindParam(":event_id", $event_id);
$requete->bindParam(":scoring", $scoring);

//execution de la requete
$requete->execute();

header("location: ../index.php");