<?php
include __DIR__ . '/../partials/header.php';
?>

<div style="height:200px; background-color: #181f2f;"></div>
<div class="bgimginterieurcine">
    <div class="containterFlexCol">

<form class = "bg-shadow-off" method="POST" action="admin.php?action=login">
    
    <h1>Connexion Administrateur</h1>
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
    <button class="btn2"><a href="inscription.php" >s'inscrire</a></button>
    </div>
</form>
</div>
</div>

<?php

include __DIR__ . '/../partials/footer.php';
?>