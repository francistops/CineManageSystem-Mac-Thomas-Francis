<?php
include __DIR__ . '/../partials/header.php';
require_once(CONTROLLERS_PATH . '/Films.php');

$films = get_films();
?>
<div class="wrapper">
<h1>Dashboard Admin</h1>
<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>

<ul>
    <?php foreach ($films as $film): ?>
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
            <img src="/assets/img/interstellar_temp_poster.png" alt="interstellar_temp_poster.png">
                <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                <p><?php echo htmlspecialchars($film['realisateur']); ?> </p>
            
            <p class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>            
            </a>
            <div class="containterFlexRow">
                <a class="btn1" href="admin.php?action=edit&id=<?php echo $film['id']; ?>">Modifier</a>
                <a class="btn2" href="admin.php?action=delete&id=<?php echo $film['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<?php
include __DIR__ . '/../partials/footer.php';
?>