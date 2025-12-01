<h2><?= isset($livre) ? "Modifier" : "Ajouter" ?> un livre</h2>

<form method="POST">
    <label>Titre :<br>
        <input type="text" name="titre" value="<?= isset($livre) ? htmlspecialchars($livre['titre']) : "" ?>" required>
    </label><br><br>

    <label>Auteur :<br>
        <input type="text" name="auteur" value="<?= isset($livre) ? htmlspecialchars($livre['auteur']) : "" ?>" required>
    </label><br><br>

    <label>Année :<br>
        <input type="number" name="annee" value="<?= isset($livre) ? $livre['annee'] : "" ?>" required>
    </label><br><br>

    <button type="submit" name="<?= isset($livre) ? "update" : "add" ?>"><?= isset($livre) ? "Modifier" : "Ajouter" ?></button>
</form>
