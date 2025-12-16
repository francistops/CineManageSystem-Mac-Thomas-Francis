<?php
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');
$films = get_films();
?>

<div style="height:200px;"></div>
<div class="wrapper">
    
            <?php include_once(VIEWS_PATH . '/home/search.view.php'); ?>
    <div class="center">

        <div class="containerFlexColumn">            
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
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>
