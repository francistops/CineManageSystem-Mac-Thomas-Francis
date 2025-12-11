<?php
include_once VIEWS_PATH . '/partials/header.php';
require_once APP_PATH . '/controllers/Films.php';
$film = get_film_by_id();
?>
<div class="bgimgvieuxcine">
<div class="whitebox">    
    <div class="containerFlexColumn">
<h2>Modifier le film</h2>
<div class="containterFlexRow">
    
<div><img class="bigimg" src="/assets/img/interstellar_temp_poster.png" alt=""></div>
    <div>
<form class="bg-shadow-off" method="POST">
    <label>Titre: <input type="text" name="titre" value="<?php echo htmlspecialchars($film['titre']); ?>" required></label><br>
    <label>Réalisateur: <input type="text" name="realisateur" value="<?php echo htmlspecialchars($film['realisateur']); ?>" required></label><br>
    <label>Genre: <input type="text" name="genre" value="<?php echo htmlspecialchars($film['genre']); ?>" required></label><br>
    <label>Année: <input type="number" name="annee_sortie" value="<?php echo $film['annee_sortie']; ?>" required></label><br>
    <label>Description:<br><textarea name="description" required><?php echo htmlspecialchars($film['description']); ?></textarea></label><br>
    <button type="submit" name="update">Modifier</button>
</form>
</div>
</div>
</div>

</div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>