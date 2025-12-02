<?php  
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');
$films = get_films();
?>

<h2>Liste des films</h2>
<ul>
<?php while($film = $films->fetch_assoc()): ?>
    <li>
        <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
            <?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?>
        </a>
    </li>
<?php endwhile; ?>
</ul>

<?php include_once (VIEWS_PATH . '/partials/footer.php'); ?>

