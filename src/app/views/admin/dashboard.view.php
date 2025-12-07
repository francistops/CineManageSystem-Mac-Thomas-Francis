<?php
include __DIR__ . '/../partials/header.php';
require_once(CONTROLLERS_PATH . '/Films.php');

$films = get_films();

// Rôle courant (admin par défaut si non défini, pour éviter les notices)
$currentRole = $_SESSION['admin_role'] ?? 'admin';
$isAdmin     = ($currentRole === 'admin');
?>

<h1>Dashboard Admin</h1>
<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>
<p><a href="admin.php?action=logout">Se déconnecter</a></p>
<p><a href="#">Ajouter un film</a></p>
<p>
    Bonjour,
    <?= htmlspecialchars($_SESSION['admin_username'] ?? '', ENT_QUOTES, 'UTF-8') ?>
    <?php if ($isAdmin): ?>
        (rôle : administrateur)
    <?php else: ?>
        (rôle : éditeur)
    <?php endif; ?>
</p>
<p><a href="admin.php?action=logout">Se déconnecter</a></p>
<p><a href="admin.php?action=add">Ajouter un film</a></p>

<?php if ($isAdmin): ?>
    <p><a href="admin.php?action=manage_admins">Gérer les administrateurs</a></p>
<?php endif; ?>

<ul>
    <?php if (!empty($films)): ?>
    <?php foreach ($films as $film): ?>
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
                <img src="/assets/img/interstellar_temp_poster.png" alt="interstellar_temp_poster.png">
                <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                <?php echo htmlspecialchars($film['realisateur']); ?>

                <p class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>
            </a>
            <div class="containterFlexRow">
                <a class="btn1" href="admin.php?action=edit&id=<?= urlencode($film['id']); ?>">Modifier</a>
                <?php if ($isAdmin): ?>
                    <a class="btn2" href="admin.php?action=delete&id=<?= urlencode($film['id']); ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
    <?php else: ?>
        <li>Aucun film trouvé.</li>
    <?php endif; ?>
</ul>

<?php include __DIR__ . '/../partials/footer.php'; ?>