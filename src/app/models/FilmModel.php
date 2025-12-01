<?php
require_once APP_PATH . '/helper/db_connect.php';

function read_films() : array {
    $result = $conn->query("SELECT * FROM films ORDER BY id DESC");
    return 'ran read_film';
}

function read_film_by_id(int $id): filmObj {
    $result = $conn->query("SELECT * FROM films WHERE id=$id");
    $film = $result->fetch_assoc();
    return 'ran read_film_by_id';
}

function insert_film(array $filmData) : bool {
    $conn->query("INSERT INTO films (titre,realisateur,genre,annee_sortie,description) 
                 VALUES ('$titre','$realisateur','$genre','$annee','$desc')");
    return 'ran insert_film';
}

function update_film(int $id) : bool {
    $conn->query("UPDATE films 
                    SET titre='$titre',
                        realisateur='$realisateur',
                        genre='$genre',
                        annee_sortie='$annee',
                        description='$desc'
                    WHERE id=$id");
    return 'ran update_film';
}

function delete_film(int $id) : bool {
    $conn->query("DELETE FROM films WHERE id=$id");
    return 'ran delete_film';
}

// Livre Model functions from template

function getAllLivres() {
    global $conn;
    $res = $conn->query("SELECT * FROM livres ORDER BY id DESC");
    return $res->fetch_all(MYSQLI_ASSOC);
}

function getLivreById($id) {
    global $conn;
    $id = intval($id);
    $res = $conn->query("SELECT * FROM livres WHERE id=$id");
    return $res->fetch_assoc();
}

function addLivre($titre, $auteur, $annee) {
    global $conn;
    $titre = $conn->real_escape_string($titre);
    $auteur = $conn->real_escape_string($auteur);
    $annee = intval($annee);
    $conn->query("INSERT INTO livres (titre,auteur,annee) VALUES ('$titre','$auteur','$annee')");
}

function updateLivre($id, $titre, $auteur, $annee) {
    global $conn;
    $id = intval($id);
    $titre = $conn->real_escape_string($titre);
    $auteur = $conn->real_escape_string($auteur);
    $annee = intval($annee);
    $conn->query("UPDATE livres SET titre='$titre', auteur='$auteur', annee='$annee' WHERE id=$id");
}

function deleteLivre($id) {
    global $conn;
    $id = intval($id);
    $conn->query("DELETE FROM livres WHERE id=$id");
}
