<?php
require_once(__DIR__ . '/../../../../config.php');
require_once(CONTROLLERS_PATH . '/ProgController.php');
require_once(VIEWS_PATH . '/partials/header.php');
$programmation = get_programmation_by_id();
if (!empty($programmation)):
?>

<div style="height:200px;"></div>
<div class="wrapper">
<div class="containterFlexRow">
    <h2><?php echo htmlspecialchars($programmation['film']); ?></h2>
    <p><strong>Salle :</strong> <?php echo htmlspecialchars($programmation['salle']); ?></p>
    <p><strong>admin :</strong> <?php echo htmlspecialchars($programmation['admin']); ?></p>
    <p><strong>date debut :</strong> <?php echo $programmation['date_debut']; ?></p>
    <p><strong>Date fin :</strong> <?php echo htmlspecialchars($programmation['date_fin']); ?></p>
    <a href="<?php echo BASE_URL; ?>programmation.php" class="btn2">Retour</a>
</div>
<?php else: ?>
    <p>programmation introuvable.</p>
<?php endif; ?>
</div>
<?php require_once(VIEWS_PATH . '/partials/footer.php'); ?>