<?php  
require_once(CONTROLLERS_PATH . '/Films.php');
include_once(VIEWS_PATH . '/partials/header.php');

$films = get_films();
echo $movies;
?>

<?php if ($_SESSION['is_login'] === true && isset($_SESSION['is_login'])): ?>
    <h1>Tableau de bord de <?= htmlspecialchars($_SESSION['admin_username'] ?? '') ?></h1>
<?php endif; ?>

<h2>Films à l'affiche</h2>
<div style="background-color: purple;">
<ul>
    <?php foreach ($films as $film): ?>
        <div style="
            background-color: red;
            margin: 1em;
        ">
        <li>
            <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
            <img
                <?php if ( isset($film['img_url']) && is_file($film['img_url']) ): ?>
                    src="<?php echo $film['img_url']; ?>"
                    alt="Affiche de <?php echo htmlspecialchars($film['titre']); ?>"
                <?php else: ?>
                    src="/assets/img/not_found.png" alt="Image non trouvée"
                <?php endif; ?>
            />

            <h4>
                <?= htmlspecialchars($film['titre']) ?>
                <span style="font-size: small;">
                    <?= ' (' . htmlspecialchars($film['annee_sortie']). ')' ?>
                </span>
            </h4>

            <?php echo htmlspecialchars($film['realisateur']); ?>
            
            <p style="text-wrap: pretty" class="desc"><?php echo  htmlspecialchars($film['description']); ?></p>
            </a>
            <?php if ($_SESSION['is_login'] === true && isset($_SESSION['is_login'])): ?>
            <div class="containterFlexRow">
                <a class="btn1" href="admin.php?action=edit&id=<?php echo $film['id']; ?>">Modifier</a>
                <a class="btn2" href="admin.php?action=delete&id=<?php echo $film['id']; ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </div>
            <?php endif; ?>
        </li>
        </div>
    <?php endforeach; ?>
</ul>
</div>

<?php include_once (VIEWS_PATH . '/partials/footer.php'); ?>