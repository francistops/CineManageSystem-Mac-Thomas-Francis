<?php
include __DIR__ . '/../partials/header_admin.php';
require_once(CONTROLLERS_PATH . '/Films.php');

$films = get_films();
?>

<div class="wrapper">
<div style="height:50px;"></div>
<h1>Dashboard Admin</h1>
<p>Bonjour, <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></p>


<ul class="cartes">
    <?php foreach ($films as $film): ?>
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
                <?php 
if(!empty(trim($film['img_url'] ?? ""))){
echo '<img class="imgcarte" src="/assets/img/uploads/'.trim($film['img_url']).'" alt="">';
}else{
    echo '<img class="imgcarte" src="/assets/img/uploads/'.'noposter.jfif'.'" alt="">';
}
?>
                <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                <p><?php echo htmlspecialchars($film['realisateur']); ?> </p>
            
            <p class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>            
            </a>
            <div class="containterFlexRow">
                <a class="btn1" href="admin.php?action=edit&id=<?php echo $film['id']; ?>">Modifier</a>
                <a class="btn2" href="admin.php?action=delete&id=<?php echo $film['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                <a class="btn1" href="">réserver</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<?php
include __DIR__ . '/../partials/footer.php';
?>