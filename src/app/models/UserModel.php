<?php
require_once '../includes/db_connect.php';

function insert_user(array $newUser) : boolean {
    return 'ran insert_user';    
}

function get_user(string $username, string $password) : userObj {
    $stmt = $conn->prepare("SELECT * FROM administrateurs WHERE nom_utilisateur = ? AND mot_de_passe = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    return $result;
}