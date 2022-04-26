<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <script src="https://kit.fontawesome.com/da7397688c.js" crossorigin="anonymous"></script>

</head>

<body>

<?php
# Variable qui vérifie le statut de l'utilisateur (admin ou user normal).
session_start();

?>

<header id="header">
    <div class="div-title-logo">
        <a href="index.php"><i class="fad fa-cat"></i></a>
        <h1 class="title">Raminagrobis™</h1>
    </div>

    <!-- Nav pour les différentes pages/ancres -->
    <nav class="nav-header">
        <li class="list-header"><a id="btn-footer" class="link-list-header" href="#">Informations</a></li>

        <?php if ($_SESSION['admin'] == true) {
            ?>

            <li class="list-header"><a id="btn-connexion" class="link-list-header"
                                       href="actions/admin-disconnect.php"</a>Déconnexion</a></li>
            <?php
        } else {
            ?>
            <li class="list-header"><a id="btn-connexion" class="link-list-header" href="#">Connexion</a></li>
            <?php
        }
        ?>
    </nav>
</header>

<div class="background-image" id="bgimage">

