<?php
include_once(VIEWS_PATH . '/partials/header.php');
require_once APP_PATH . '/controllers/Films.php';
?>

<h2>Ajouter un film</h2>
<form method="POST">
    <label>Titre: <input type="text" name="titre" required></label><br>
    <label>Réalisateur: <input type="text" name="realisateur" required></label><br>
    <label>Genre: <input type="text" name="genre" required></label><br>
    <label>Année: <input type="number" name="annee_sortie" required></label><br>
    <label>Description:<br><textarea name="description" required></textarea></label><br>
    <button type="submit" name="add" onclick="add_film()"> Ajouter</a></button>
</form>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>