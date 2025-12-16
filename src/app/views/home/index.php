<?php
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');

$films = get_films();
//$film = search_films();
?>

<div class="wrapper">
    <div class="center" style="margin-top: 2em;">
        <div class="containerFlexColumn">
            <?php include_once(VIEWS_PATH . '/home/search.view.php'); ?>
        </div>
    </div>
    <div class="center">
        <div class="containerFlexColumn">
            <h2>Films à l'affiche</h2>
            <ul>
                <?php foreach ($films as $film): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
                            <img src="/assets/img/interstellar_temp_poster.png" alt="interstellar_temp_poster.png">

                            <!-- code que j'avais pour les image a revoir-->
                            <!-- <img
                                <?php if (isset($film['img_url']) && is_file($film['img_url'])): ?>
                                src="<?php echo $film['img_url']; ?>"
                                alt="Affiche de <?php echo htmlspecialchars($film['titre']); ?>
                                <?php else: ?>
                                src=" /assets/img/not_found.png" alt="Image non trouvée"
                                <?php endif; ?> />

                            <h4>
                                <?= htmlspecialchars($film['titre']) ?>
                                <span style="font-size: small;">
                                    <?= ' (' . htmlspecialchars($film['annee_sortie']) . ')' ?>
                                </span>
                            </h4> -->

                            <h4><?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?></h4>
                            <?php echo htmlspecialchars($film['realisateur']); ?>

                            <p style="text-wrap: pretty" class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>
                        </a>
                        <?php if (isset($_SESSION['is_login'])): ?>
                            <?php if ($_SESSION['is_login'] === true): ?>
                                <div class="containterFlexRow">
                                    <a class="btn1" href="admin.php?action=edit&id=<?php echo $film['id']; ?>">Modifier</a>
                                    <a class="btn2" href="admin.php?action=delete&id=<?php echo $film['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>