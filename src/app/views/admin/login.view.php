<?php
include __DIR__ . '/../partials/header.php';
?>

<h1>Connexion Administrateur</h1>

<form method="POST" action="admin.php?action=login">
    <div>
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
    </div>

    <?php if (!empty($GLOBALS['login_errors'])): ?>
        <ul class="text-danger">
            <?php foreach ($GLOBALS['login_errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <button type="submit">Se connecter</button>
</form>

<?php

include __DIR__ . '/../partials/footer.php';
?>
