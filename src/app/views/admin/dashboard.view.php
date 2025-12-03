<?php
include __DIR__ . '/../partials/header.php';
<<<<<<< Updated upstream
=======
require_once(CONTROLLERS_PATH . '/Films.php');

$films = get_films();

// Rôle courant (admin par défaut si non défini, pour éviter les notices)
$currentRole = $_SESSION['admin_role'] ?? 'admin';
$isAdmin     = ($currentRole === 'admin');
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
?>

<h1>Dashboard Admin</h1>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>

<p>
    <a href="admin.php?action=logout">Se déconnecter</a>
</p>

<p>
    <a href="#">Ajouter un film</a>
</p>
=======
=======
>>>>>>> Stashed changes
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
>>>>>>> Stashed changes

<?php if ($isAdmin): ?>
    <p><a href="admin.php?action=manage_admins">Gérer les administrateurs</a></p>
<?php endif; ?>

<?php if ($isAdmin): ?>
    <p><a href="admin.php?action=manage_admins">Gérer les administrateurs</a></p>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< Updated upstream
    <?php if (!empty($films)): ?>
        <?php foreach ($films as $film): ?>
=======
        <?php if (!empty($films)): ?>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= htmlspecialchars($film['id'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($film['titre'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a href="admin.php?action=edit&id=<?= urlencode($film['id']); ?>">
                            Modifier
                        </a>

                        <?php if ($isAdmin): ?>
                            |
                            <a href="admin.php?action=delete&id=<?= urlencode($film['id']); ?>"
                               onclick="return confirm('Supprimer ?');">
                                Supprimer
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
>>>>>>> Stashed changes
            <tr>
                <td><?= htmlspecialchars($film['id']) ?></td>
                <td><?= htmlspecialchars($film['titre']) ?></td>
                <td>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Aucun film trouvé.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php
include __DIR__ . '/../partials/footer.php';
?>
