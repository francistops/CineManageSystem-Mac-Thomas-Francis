<?php
include_once VIEWS_PATH . '/partials/header_admin.php';
require_once APP_PATH . '/controllers/Films.php';
$programmation = get_programmation_by_id();
?>

<div style="height:200px; margin:10px;"></div>
<div class="bgimgvieuxcine">
    <div class="whitebox">
        <div class="containerFlexColumn">
            <h2>Modifier la programmation</h2>
            <div class="containterFlexRow">

                <form class="bg-shadow-off" method="POST">
                    <label>Titre: <input type="text" name="film" value="<?php echo htmlspecialchars($programmation['film_id']); ?>" required></label><br>
                    <label>Salle: <input type="text" name="salle" value="<?php echo htmlspecialchars($programmation['salle_id']); ?>" required></label><br>
                    <label>Admin: <input type="text" name="admin" value="<?php echo htmlspecialchars($programmation['administrateur_id']); ?>" required></label><br>
                    <label>Date debut: <input type="date" name="date_debut" value="<?php echo htmlspecialchars($programmation['date_debut']); ?>" required></label><br>
                    <label>Date fin:<br><input type="date" name="date_fin" value="<?php echo htmlspecialchars($programmation['date_fin']); ?>" required></label><br>
                    <button type="submit" name="update">Modifier</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>