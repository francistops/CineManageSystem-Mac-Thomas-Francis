<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>CinéManage</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">

</head>

<body>
    <header>
        <div class="wrapper">
            <a href="<?php echo BASE_URL; ?>index.php?action=dashboard"><img src="assets/img/cineguestlogo.png" alt="logocinemanage.png"></a>

            <nav class="navbar">
                <ul class="nav_menu">
                    <li class="nav_item">
                        <a href="<?php echo BASE_URL; ?>admin.php?action=dashboard" class="nav_link">Tableau de bord</a>
                    </li>
                    <li class="nav_item">
                        <a href="<?php echo BASE_URL; ?>admin.php?action=programmation" class="nav_link">Programmations</a>
                    </li>
                    <li class="nav_item">
                        <a href="<?php echo BASE_URL; ?>admin.php?action=add_film" class="nav_link">Ajouter un film</a>
                    </li>
                    <li class="nav_item">
                        <a href="<?php echo BASE_URL; ?>admin.php?action=role" class="nav_link">Gestion d'utilisateur</a>
                    </li>
                    <li class="nav_item">
                        <a href="<?php echo BASE_URL; ?>index.php?action=logout" class="nav_link">Se déconnecter</a>
                    </li>

                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>
    </header>

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navmenu = document.querySelector(".nav_menu");

        hamburger.addEventListener("click", activate);

        function activate() {
            hamburger.classList.toggle("active");
            navmenu.classList.toggle("active");
        }
        document.querySelectorAll(".nav_link").forEach(n => n.addEventListener("click", remove));

        function remove() {
            hamburger.classList.remove("active");
            navmenu.classList.remove("active");
        }
    </script>