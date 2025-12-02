<?php
include __DIR__ . '/../partials/header.php';
?>

<h1>Dashboard Admin</h1>

<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>

<p>
    <a href="admin.php?action=logout">Se déconnecter</a>
</p>

<p>
    <a href="#">Ajouter un film</a>
</p>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($films)): ?>
        <?php foreach ($films as $film): ?>
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
