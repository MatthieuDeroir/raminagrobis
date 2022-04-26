<?php
session_start();
//je construis la destination
$dest="../assets/image/background/";

$files_path=$dest."/".basename($_FILES["file"]["name"]);

//je bouge le fichier vers la bonne destination
move_uploaded_file($_FILES["file"]["tmp_name"], $files_path);

//je retourne a l'affichage du dossier
header("location: ../form-admin-creation-form.php");