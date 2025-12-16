<?php
require_once APP_PATH . '/helper/db_connect.php';

function read_programmations()
{
    $conn = getDBConnection();
    $result = $conn->query("SELECT * FROM programmations ORDER BY annee_sortie DESC");
    return $result;
}

function read_programmation_by_id(int $id)
{
    $conn = getDBConnection();

    if (!isset($_GET['id'])) {
        echo "<p>ID de programmation manquant.</p>";
        require_once(VIEWS_PATH . '/partials/footer.php');
        exit;
    }

    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM programmations WHERE id=$id");
    $programmation = $result->fetch_assoc();
    return $programmation;
}

function insert_programmation($admin_id, $film_id , $salle_id, $date_debut, $date_fin)
{
    $conn = getDBConnection();
     
    $conn->query("INSERT INTO programmations (administrateur_id,film_id,salle_id,date_debut,date_fin) 
                 VALUES ('$admin_id','$film_id','$salle_id','$date_debut','$date_fin')");
    return true;
}

function update_programmation($id, $admin_id, $film_id , $salle_id, $date_debut, $date_fin)
{
    $conn = getDBConnection();
    $conn->query("UPDATE programmations 
                    SET admin_id='$admin_id',
                        film_id='$film_id',
                        salle_id='$salle_id',
                        date_debut=$date_debut,
                        date_fin='$date_fin',
                    WHERE id=$id");
    return true;
}

function delete_programmation(int $id)
{
    $conn = getDBConnection();

    $conn->query("DELETE FROM programmations WHERE id=$id");
    return true;
}

function filter_programmations($admin_id,  $film_id, $salle_id)
{
    $conn = getDBConnection();

    $condition = "";
    if ($admin_id != "")
        $condition = " where genre ='$admin_id'";
    if ($film_id != "") {
        if ($condition == "") {
            $condition = " where annee_sortie=$film_id ";
        } else {
            $condition = $condition . " and annee_sortie=$film_id";
        }
    }
    if ($salle_id != "") {
        if ($condition == "") {
            $condition = " where note=$salle_id ";
        } else {
            $condition = $condition . " and note=$salle_id";
        }
    }

    $sql = "SELECT * FROM programmations " . $condition;


    $result = $conn->query($sql);
    return $result;
}
