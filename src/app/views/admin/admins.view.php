<h1>Gestion des administrateurs</h1>

<p>
    <a href="admin.php?action=dashboard">Retour au tableau de bord</a>
</p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nom d'utilisateur</th>
        <th>Rôle</th>
        <th>Action</th>
    </tr>

    <?php foreach ($admins as $admin): ?>
        <tr>
            <td><?= htmlspecialchars($admin['nom_utilisateur']) ?></td>
            <td><?= htmlspecialchars($admin['role']) ?></td>
            <td>
                <form method="POST" action="admin.php?action=update_admin_role" style="display:inline-flex; gap:4px;">
                    <input type="hidden" name="id" value="<?= (int)$admin['id'] ?>">

                    <select name="role">
                        <option value="admin"  <?= $admin['role'] === 'admin'  ? 'selected' : '' ?>>admin</option>
                        <option value="editor" <?= $admin['role'] === 'editor' ? 'selected' : '' ?>>editor</option>
                    </select>

                    <button type="submit">Mettre à jour</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
