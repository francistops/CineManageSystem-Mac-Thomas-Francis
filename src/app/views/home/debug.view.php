<hr>
<h2> debug section </h2>


<pre>
    result:
    <?php var_dump($result) ?>
    SESSION:
    <?php var_dump($_SESSION); ?>
    GET:
    <?php var_dump($_GET); ?>
    POST:
    <?php var_dump($_POST); ?>
</pre>


<div>
    <form method="GET" action="index.php?action=search&type=genre&query=<?php echo htmlspecialchars($_GET['query']); ?>">
        <label>Recherche par genre :<br>
            <input type="text" name="query" value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : "" ?>" required>
        </label><br>
        <a href="index.php?action=search&type=genre&query=<?php echo htmlspecialchars($_GET['query']); ?>">search</a>
    </form>

    <form method="POST">
        <label>Recherche par année :<br>
            <input type="number" name="year" value="<?= isset($_POST['year']) ? htmlspecialchars($_POST['year']) : "" ?>" required>
        </label><br>
        <button type="submit">Recherche</button>
    </form>

    <form method="POST">
        <label>Recherche par note :<br>
            <input type="number" name="rating" value="<?= isset($_POST['rating']) ? $_POST['rating'] : "" ?>" required>
        </label><br>
        <button type="submit">Recherche</button>
    </form>
</div>

<h2>Recherche de films Resultat</h2>
<hr>
<br>
<ul>
    <?php $i = 0 ?>
    <?php if (isset($result)): ?>
        <?php echo var_dump($result); ?>
        <?php foreach ($result as $k => $v): ?>
            <?php echo '$k : ' . $k . ' $v : ' . $v . '<br>'; ?> <br>
            <?= 'count:' . $i ?>
            <?php $i++ ?>
        <?php endforeach; ?>
    <?php endif ?>
</ul>