<?php
include_once(VIEWS_PATH . '/partials/header_admin.php');
require_once APP_PATH . '/controllers/ProgController.php';
?>


<div style="height:200px; margin:10px;"></div>
<div class="bgimgvieuxcine">
    <div class="whitebox">
        <div class="containerFlexColumn">
            <h2>Ajouter une programmation</h2>
            <div class="containterFlexRow">
                <div>
                    <h2>Ajouter une programmation</h2>
                    <form class="bg-shadow-off" method="POST">
                        <label>Titre: <input type="text" name="film" required></label><br>
                        <label>Salle: <input type="text" name="salle" required></label><br>
                        <label>Admin: <input type="text" name="admin" required></label><br>
                        <label>date debut: <input type="date" name="date_debut" required></label><br>
                        <label>date fin:<br><input type="date" name="date_fin" required></label><br>
                        <button type="submit" name="add" onclick="add_programmation()"> Ajouter</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once(VIEWS_PATH . '/partials/footer.php'); ?>