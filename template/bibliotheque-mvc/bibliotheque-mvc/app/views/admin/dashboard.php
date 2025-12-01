<h2>Dashboard Administrateur</h2>
<a href="admin.php?action=add">+ Ajouter un livre</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th><th>Titre</th><th>Auteur</th><th>Actions</th>
    </tr>
    <?php foreach($livres as $l): ?>
    <tr>
        <td><?= $l['id'] ?></td>
        <td><?= htmlspecialchars($l['titre']) ?></td>
        <td><?= htmlspecialchars($l['auteur']) ?></td>
        <td>
            <a href="admin.php?action=edit&id=<?= $l['id'] ?>">Modifier</a> |
            <a href="admin.php?action=delete&id=<?= $l['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="admin.php?action=logout">Déconnexion</a>
