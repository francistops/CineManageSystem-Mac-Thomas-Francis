<?php
require_once(__DIR__ . '/../../../../config.php');
require_once(CONTROLLERS_PATH . '/Films.php');
require_once(VIEWS_PATH . '/partials/header.php');
$film = get_film_by_id();
if (!empty($film)):
?>

<div style="height:200px;"></div>
<div class="wrapper">
<div class="containterFlexRow">
    <img class="bigimg" src="/assets/img/uploads/<?php 
echo !empty($film['img_url'])
    ? trim($film['img_url'])
    : 'noposter.jfif';
?>" alt="">
    <div class="alignttextleft">
    <h2><?php echo htmlspecialchars($film['titre']); ?></h2>
    <p><strong>Réalisateur :</strong> <?php echo htmlspecialchars($film['realisateur']); ?></p>
    <p><strong>Genre :</strong> <?php echo htmlspecialchars($film['genre']); ?></p>
    <p><strong>Année :</strong> <?php echo $film['annee_sortie']; ?></p>
    <p><strong>Description :</strong> <?php echo htmlspecialchars($film['description']); ?></p>
    <a href="<?php echo BASE_URL; ?>index.php" class="btn2">Retour</a>
    </div>
    
</div>
<div class="containterFlexCol">
    <h3>AJOUTEZ UNE NOTE ICI!</h3>
    <div class="note">
        
    <li ><img src="/assets/img/star.svg" alt=""> 
<img src="/assets/img/star.svg" alt=""><img src="/assets/img/star.svg" alt=""><img src="/assets/img/star.svg" alt=""><img src="/assets/img/star.svg" alt="">
</li>
    </div>
</div>
<?php else: ?>
    <p>Film introuvable.</p>
<?php endif; ?>
</div>
<?php require_once(VIEWS_PATH . '/partials/footer.php'); ?>