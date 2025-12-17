<?php
include_once(VIEWS_PATH . '/partials/header_admin.php');
require_once APP_PATH . '/controllers/Films.php';
?>

<div style="height:200px; background-color: #e3ebf3;"></div>
<div class="bgimgvieuxcine">
<div class="whitebox">     
    <div class="containerFlexColumn">
<div class="containterFlexRow">
    
<div><img class="bigimg" src="/assets/img/uploads/<?php 
echo !empty($film['img_url'])
    ? trim($film['img_url'])
    : 'noposter.jfif';
?>" alt="">
</div>
    <div>
<form class="bg-shadow-off" method="POST" enctype="multipart/form-data">
    
    <h2>Ajouter un film</h2>    
    <label>Titre: <input type="text" name="titre" required></label><br>
    <label>Réalisateur: <input type="text" name="realisateur" required></label><br>
    <label>Genre: <input type="text" name="genre" required></label><br>
    <label>Année: <input type="number" name="annee_sortie" required></label><br>
    <label>Description:<br><textarea name="description" required></textarea></label><br>
    <input type="file" name="imgposter" id="">
    <button type="submit" name="add" onclick="add_film()"> Ajouter</a></button>
</form>
</div>
</div>
</div>
</div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>