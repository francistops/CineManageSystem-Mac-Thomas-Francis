<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>CinéManage</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>

<body>
    <header>
        <img src="assets/img/cineguestlogo.png" alt="logocinemanage.png">
        <nav>
            <a href="<?php echo BASE_URL; ?>index.php"> Accueil </a>
            <?php if ($_SESSION['is_login'] === false && !isset($_SESSION['is_login'])): ?>
                <a href="<?php echo BASE_URL; ?>index.php?action=login"> Connexion Administrateur </a>
            <?php else: ?>
                <a href="<?php echo BASE_URL; ?>index.php?action=dashboard"> Tableau de bord </a>
                <a href="<?php echo BASE_URL; ?>admin.php?action=add"> Ajouter un film </a>
                <a href="<?php echo BASE_URL; ?>admin.php?action=logout"> Se déconnecter </a>
            <?php endif; ?>
        </nav>
        <hr>
    </header>

    