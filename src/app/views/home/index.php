<?php  
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');
$films = get_films();
?>
<div class="center">
<h2>Liste des films</h2>
<ul>
    <?php foreach ($films as $film): ?>
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
            <img src="/assets/img/interstellar_temp_poster.png" alt="interstellar_temp_poster.png">
                <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                <?php echo htmlspecialchars($film['realisateur']); ?>
            
            <p class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>
            <a class="btn1" href="">réserver</a>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</div>

<?php include_once (VIEWS_PATH . '/partials/footer.php'); ?>

