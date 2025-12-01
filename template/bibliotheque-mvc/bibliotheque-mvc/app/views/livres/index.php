<h2>📚 Catalogue des livres</h2>

<div class="livres-container">
<?php foreach($livres as $livre): ?>
    <div class="livre-card">
        <h3><?= htmlspecialchars($livre['titre']) ?></h3>
        <p class="auteur"><?= htmlspecialchars($livre['auteur']) ?></p>
        <p class="annee">(<?= $livre['annee'] ?>)</p>
        <p><a href="index.php?id=<?= $livre['id'] ?>" class="btn-view">Voir détails</a></p>
    </div>
<?php endforeach; ?>
</div>

<div class="admin-link">
    <a href="admin.php?action=login" class="btn-admin">Connexion Administrateur</a>
</div>
