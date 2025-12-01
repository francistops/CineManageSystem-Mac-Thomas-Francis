<?php
require_once __DIR__ . '/../core/db.php';

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
