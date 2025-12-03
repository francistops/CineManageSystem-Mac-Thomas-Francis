<?php
include __DIR__ . '/../partials/header.php';
?>

<div class="bgimginterieurcine">
<div class="smallwhitebox">    
    <div class="containterFlexCol">
<h1>Connexion Administrateur</h1>

<form class = "bg-shadow-off" method="POST" action="admin.php?action=login">
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

    <div class="containterFlexRow">
    <button class="btn1" type="submit">Se connecter</button>
    <a href="inscription.php" class="btn2">s'inscrire</a>
    </div>
</form>
</div>
</div>
</div>

<?php

include __DIR__ . '/../partials/footer.php';
?>