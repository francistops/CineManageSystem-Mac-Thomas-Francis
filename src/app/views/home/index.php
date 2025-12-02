<?php  
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');
$films = get_films();
?>

<h2>Liste des films</h2>
<ul>
    <?php 
    foreach($films as $film){
         echo'<li><a href="film.php?id="'.$film["id"].'">'.$film["titre"].'</a></li>';

    }
    ?>     
</ul>


<?php include_once (VIEWS_PATH . '/partials/footer.php'); ?>

