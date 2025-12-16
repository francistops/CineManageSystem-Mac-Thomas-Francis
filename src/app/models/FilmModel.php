<?php
require_once APP_PATH . '/helper/db_connect.php';

// $SORT_OPTIONS = [
//     'title_asc' => 'title ASC',
//     'title_desc' => 'title DESC',
//     'year_asc' => 'year ASC',
//     'year_desc' => 'year DESC',
//     'rating_asc' => 'rating ASC',
//     'rating_desc' => 'rating DESC'
// ];

// function getAllGenres() {
//     $conn = getDBConnection();

//     $result = mysqli_query($conn, "SELECT DISTINCT genre FROM films ORDER BY genre ASC");
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }

// function filterfilms($q, $genre, $sort) {
//     $conn = getDBConnection();
//     global $SORT_OPTIONS;

//     $sql = "SELECT * FROM films WHERE 1=1";
//     $params = [];

//     if ($q !== '') {
//         $sql .= " AND title LIKE ?";
//         $params[] = '%' . $q . '%';
//     }

//     if ($genre !== '') {
//         $sql .= " AND genre = ?";
//         $params[] = $genre;
//     }

//     if (isset($SORT_OPTIONS[$sort])) {
//         $sql .= " ORDER BY " . $SORT_OPTIONS[$sort];
//     }

//     $stmt = mysqli_prepare($conn, $sql);

//     if (!empty($params)) {
//         $types = str_repeat('s', count($params));
//         mysqli_stmt_bind_param($stmt, $types, ...$params);
//     }

//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);

//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }


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

// function filter_film_by_type(string $type, string $query)
// {
//     $conn = getDBConnection();

//     if (!isset($type) && !isset($query)) {
//         echo "<p>Donnée manquante.</p>";
//         require_once(VIEWS_PATH . '/partials/footer.php');
//         exit;
//     }
// //ORDER BY annee_sortie DESC
//     $sql = "SELECT * FROM films";

//     switch ($type) {
//     case 'genre':
//         $sql .= ' WHERE genre=' . "'" . $query . "'";
//         break;
//     case 'year':
//         $sql .= " WHERE annee_sortie=$query";
//         break;
//     case 'rating':
//         $sql .= " WHERE rating=$query";
//         break;
//     default:
//         echo "<p>Recherche invalide ou film non trouvé.</p>";
//     }

//     $result = $conn->query($sql);
//     // foreach ($result->fetch_assoc() as $key => $value) {
//     //     var_dump($key, $value);
//     //     echo '<br>';
//     // }
//     return $result->fetch_assoc();
// }

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

function filter_films($genre,  $annee, $note, $orderbyannee)
{
    $conn = getDBConnection();

    $condition = "";
    if ($genre != "")
        $condition = " where genre ='$genre'";
    if ($annee != "") {
        if ($condition == "") {
            $condition = " where annee_sortie=$annee ";
        } else {
            $condition = $condition . " and annee_sortie=$annee";
        }
    }
    if ($note != "") {
        if ($condition == "") {
            $condition = " where note=$note ";
        } else {
            $condition = $condition . " and note=$note";
        }
    }

    $orderby = "";
    if ($orderbyannee == true)
        $orderby = " Order By annee_sortie DESC";


    $sql = "SELECT * FROM films " . $condition . $orderby;


    $result = $conn->query($sql);
    // foreach ($result->fetch_assoc() as $key => $value) {
    //     var_dump($key, $value);
    //     echo '<br>';
    // }
    return $result->fetch_assoc();
}
