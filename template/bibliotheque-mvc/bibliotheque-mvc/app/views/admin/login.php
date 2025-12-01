<h2>Connexion Administrateur</h2>
<?php if ($message): ?>
    <p style="color:red;"><?= $message ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nom d'utilisateur :<br>
        <input type="text" name="username" required>
    </label><br><br>

    <label>Mot de passe :<br>
        <input type="password" name="password" required>
    </label><br><br>

    <button type="submit" name="login">Se connecter</button>
</form>
