<form method="get" action="/index.php">
    <input type="text" name="q" placeholder="Search title" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">

    <select name="genre">
        <option value="">All Genres</option>
        <?php foreach ($genres as $g): ?>
            <option value="<?= $g ?>" <?= ($g === ($_GET['genre'] ?? '')) ? 'selected' : '' ?>>
                <?= $g ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="sort">
        <option value="">Sort By</option>
        <option value="title_asc">Title A–Z</option>
        <option value="title_desc">Title Z–A</option>
        <option value="year_desc">Newest First</option>
        <option value="year_asc">Oldest First</option>
        <option value="rating_desc">Top Rated</option>
        <option value="rating_asc">Lowest Rated</option>
    </select>

    <button type="submit">Apply</button>
</form>

<?= $genres, $movies ?>