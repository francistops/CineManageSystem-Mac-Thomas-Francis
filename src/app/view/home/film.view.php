<?php 
// call get_film_by_id() in FilmController.php
?>

<?php include 'includes/header.php'; ?>

<h2><?php echo htmlspecialchars($film['titre']); ?></h2>
<p><strong>Réalisateur :</strong> <?php echo htmlspecialchars($film['realisateur']); ?></p>
<p><strong>Genre :</strong> <?php echo htmlspecialchars($film['genre']); ?></p>
<p><strong>Année :</strong> <?php echo $film['annee_sortie']; ?></p>
<p><strong>Description :</strong> <?php echo htmlspecialchars($film['description']); ?></p>
<?php else: ?>
<p>Film introuvable.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>