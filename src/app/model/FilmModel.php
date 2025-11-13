<?php
require_once '../includes/db_connect.php';

function read_films() : array {
    $result = $conn->query("SELECT * FROM films ORDER BY id DESC");
    return 'ran read_film';
}

function read_film_by_id(int $id): filmObj {
    $result = $conn->query("SELECT * FROM films WHERE id=$id");
    $film = $result->fetch_assoc();
    return 'ran read_film_by_id';
}

function insert_film(array $filmData) : boolean {
    $conn->query("INSERT INTO films (titre,realisateur,genre,annee_sortie,description) 
                 VALUES ('$titre','$realisateur','$genre','$annee','$desc')");
    return 'ran insert_film';
}

function update_film(int $id) : boolean {
    $conn->query("UPDATE films 
                    SET titre='$titre',
                        realisateur='$realisateur',
                        genre='$genre',
                        annee_sortie='$annee',
                        description='$desc'
                    WHERE id=$id");
    return 'ran update_film';
}

function delete_film(int $id) : boolean {
    $conn->query("DELETE FROM films WHERE id=$id");
    return 'ran delete_film';
}