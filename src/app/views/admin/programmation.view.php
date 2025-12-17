<?php
include __DIR__ . '/../partials/header_admin.php';
require_once(CONTROLLERS_PATH . '/ProgController.php');
$programmations = get_programmations();
var_dump($programmations);
foreach ($programmations as $programmation) {
    echo '<h4>' . var_dump($programmation) . '</h4>';
}

?>

<div class="wrapper">
    <h1>Dashboard Admin</h1>
    <p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>


    <div style="height:200px;"></div>
    <ul class="cartes">
        <?php foreach ($programmations as $programmation): ?>
            <li>
                <a href="<?php echo htmlspecialchars('programmation.php?action=programmationid&id=' . $programmation['id']); ?>">
                    <h4><?php echo htmlspecialchars($programmation['film_id']) . ' (' . htmlspecialchars($programmation['salle_id']) . ')'; ?></h4>
                </a>
                <p><?php echo htmlspecialchars($programmation['administrateur_id']); ?></p>
                <p><?php echo htmlspecialchars($programmation['date_debut']); ?> </p>
                <p><?php echo htmlspecialchars($programmation['date_fin']); ?> </p>
                <div class="containterFlexRow">
                    <a class="btn1" href="programmation.php?action=edit&id=<?php echo $programmation['id']; ?>">Modifier</a>
                    <a class="btn2" href="programmation.php?action=delete&id=<?php echo $programmation['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php
include __DIR__ . '/../partials/footer.php';
?>