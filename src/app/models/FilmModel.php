<?php
require_once APP_PATH . '/helper/db_connect.php';

function read_films()
{
    $conn = getDBConnection();
    $result = $conn->query("SELECT * FROM films ORDER BY annee_sortie DESC");
    return $result;
}

function read_film_by_id(int $id)
{
    $conn = getDBConnection();

    if (!isset($_GET['id'])) {
        echo "<p>ID de film manquant.</p>";
        require_once(VIEWS_PATH . '/partials/footer.php');
        exit;
    }

    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM films WHERE id=$id");
    $film = $result->fetch_assoc();
    return $film;
}

function insert_film($titre, $realisateur, $genre, $annee, $desc, $nom_fichier)
{
    $conn = getDBConnection();
    // add error checking later
    $conn->query("INSERT INTO films (titre,realisateur,genre,annee_sortie,description,img_url) 
                 VALUES ('$titre','$realisateur','$genre','$annee','$desc','$nom_fichier')");
    return true;
}

function update_film($id, $titre, $realisateur, $genre, $annee, $desc, $nom_fichier): bool
{
    $conn = getDBConnection();
    // add error checking later
    $conn->query("UPDATE films 
                    SET titre='$titre',
                        realisateur='$realisateur',
                        genre='$genre',
                        annee_sortie=$annee,
                        description='$desc',
                        img_url='$nom_fichier'
                    WHERE id=$id");
    return true;
}

function delete_film(int $id)
{
    $conn = getDBConnection();
    // add error checking later
    $conn->query("DELETE FROM films WHERE id=$id");
    return true;
}
