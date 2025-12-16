
<div>
<form method="get" action="/index.php?action=search">
    <input type="text"
        name="genre"
        placeholder="Recherche par genre"
        value="<?= htmlspecialchars($_GET['genre'] ?? '') ?>">
    <input type="number"
        name="annee"
        placeholder="Recherche par annee"
        min="1900"
        max="<?php echo date("Y"); ?>"
        value="<?= htmlspecialchars($_GET['annee'] ?? '') ?>">
    <input type="number"
        name="note"
        placeholder="Recherche par note"
        min=1
        max=5
        value="<?= htmlspecialchars($_GET['note'] ?? '') ?>">

    <!-- <select name="genre">
        <option value="">All Genres</option>
        <?php foreach ($genres as $g): ?>
            <option value="<?= $g ?>" <?= ($g === ($_GET['genre'] ?? '')) ? 'selected' : '' ?>>
                <?= $g ?>
            </option>
        <?php endforeach; ?>
    </select> -->

    <!-- <select name="orderbyannee">
        <option value="">lister par :</option>
        <option value="year_desc">Newest First</option>
        <option value="year_asc">Oldest First</option>
    </select> -->

    <button type="submit">Recherche</button>
</form>
<?php
// echo 'movies';
// var_dump($movies);
?>
<br>
<ul>
    <?php if (isset($movies)): ?>
        <?php foreach ($movies as $movie): ?>
            <li>
                <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $movie['id']); ?>">
                    <!-- code que j'avais pour les image a revoir-->
                    <img
                        <?php if (isset($movie['img_url']) && is_file($movie['img_url'])): ?>
                        src="<?php echo $movie['img_url']; ?>"
                        alt="Affiche de <?php echo htmlspecialchars($movie['titre']); ?>
                                <?php else: ?>
                                src=" /assets/img/not_found.png" alt="Image non trouvée"
                        <?php endif; ?> />

                    <h4>
                        <?= htmlspecialchars($movie['titre']) ?>
                    </h4>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

</div>