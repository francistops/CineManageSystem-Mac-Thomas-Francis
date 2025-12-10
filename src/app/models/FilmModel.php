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

function filter_film_by_type(string $type, string $query)
{
    $conn = getDBConnection();

    if (!isset($type) && !isset($query)) {
        echo "<p>Donnée manquante.</p>";
        require_once(VIEWS_PATH . '/partials/footer.php');
        exit;
    }
//ORDER BY annee_sortie DESC
    $sql = "SELECT * FROM films";
    
    switch ($type) {
    case 'genre':
        $sql .= ' WHERE genre=' . "'" . $query . "'";
        break;
    case 'year':
        $sql .= " WHERE annee_sortie=$query";
        break;
    case 'rating':
        $sql .= " WHERE rating=$query";
        break;
    default:
        echo "<p>Recherche invalide ou film non trouvé.</p>";
    }

    $result = $conn->query($sql);
    // foreach ($result->fetch_assoc() as $key => $value) {
    //     var_dump($key, $value);
    //     echo '<br>';
    // }
    return $result->fetch_assoc();
}

function insert_film($titre, $realisateur, $genre, $annee, $desc)
{
    $conn = getDBConnection();
    // add error checking later
    $conn->query("INSERT INTO films (titre,realisateur,genre,annee_sortie,description) 
                 VALUES ('$titre','$realisateur','$genre','$annee','$desc')");
    return true;
}

function update_film($id, $titre, $realisateur, $genre, $annee, $desc): bool
{
    $conn = getDBConnection();
    // add error checking later
    $conn->query("UPDATE films 
                    SET titre='$titre',
                        realisateur='$realisateur',
                        genre='$genre',
                        annee_sortie=$annee,
                        description='$desc'
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
