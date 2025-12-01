<?php
require_once APP_PATH . '/helper/db_connect.php';

function insert_user(array $newUser) : bool {
    return 'ran insert_user';    
}

function checkAdmin(string $username, string $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM administrateurs WHERE nom_utilisateur = ? AND mot_de_passe = ?");
    // ND password=SHA2(?,256)"
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    var_dump($result);
    var_dump($_SESSION);
    return $result->num_rows === 1;
} 