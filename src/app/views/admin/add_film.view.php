<?php
include_once(VIEWS_PATH . '/partials/header_admin.php');
require_once APP_PATH . '/controllers/Films.php';
?>



<div class="bgimgvieuxcine">
<div class="whitebox">    
<div class="containterFlexRow">
    <div>
<h2>Ajouter un film</h2>
<form class="bg-shadow-off" method="POST">
    <label>Titre: <input type="text" name="titre" required></label><br>
    <label>Réalisateur: <input type="text" name="realisateur" required></label><br>
    <label>Genre: <input type="text" name="genre" required></label><br>
    <label>Année: <input type="number" name="annee_sortie" required></label><br>
    <label>Description:<br><textarea name="description" required></textarea></label><br>
    <button type="submit" name="add" onclick="add_film()"> Ajouter</a></button>
</form>
</div>
<div><img class="bigimg" src="/assets/img/interstellar_temp_poster.png" alt=""></div>
</div>

</div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>