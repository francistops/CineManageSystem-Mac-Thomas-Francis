<?php
include __DIR__ . '/../partials/header_admin.php';
require_once(CONTROLLERS_PATH . '/Films.php');

$films = get_films();
?>

<div class="wrapper">
<h1>Dashboard Admin</h1>
<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>


<div style="height:200px;"></div>
<ul class="cartes">
    <?php foreach ($films as $film): ?>
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
                <img class="imgcarte" src="/assets/img/uploads/<?php echo rawurlencode(trim($film['img_url'])); ?>" alt="">
                <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                <p><?php echo htmlspecialchars($film['realisateur']); ?> </p>
            
            <p class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>            
            </a>
            <div class="containterFlexRow">
                <a class="btn1" href="admin.php?action=edit&id=<?php echo $film['id']; ?>">Modifier</a>
                <a class="btn2" href="admin.php?action=delete&id=<?php echo $film['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<?php
include __DIR__ . '/../partials/footer.php';
?>