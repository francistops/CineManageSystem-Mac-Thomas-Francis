<?php 
require_once (__DIR__ . '/../../../../config.php');
require_once (CONTROLLERS_PATH . '/Films.php');
require_once (VIEWS_PATH . '/partials/header.php');
$film = get_film_by_id();

if($film = $result->fetch_assoc()):
?>
<h2><?php echo htmlspecialchars($film['titre']); ?></h2>
<p><strong>Réalisateur :</strong> <?php echo htmlspecialchars($film['realisateur']); ?></p>
<p><strong>Genre :</strong> <?php echo htmlspecialchars($film['genre']); ?></p>
<p><strong>Année :</strong> <?php echo $film['annee_sortie']; ?></p>
<p><strong>Description :</strong> <?php echo htmlspecialchars($film['description']); ?></p>
<?php else: ?>
<p>Film introuvable.</p>
<?php endif; ?>

<?php require_once (VIEWS_PATH . '/partials/footer.php'); ?>
