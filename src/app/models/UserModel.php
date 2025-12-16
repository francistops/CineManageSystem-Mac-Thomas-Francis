<?php

require_once APP_PATH . '/helper/db_connect.php';

function checkAdmin(string $username, string $password)
{
    $conn = getDBConnection();
    //var_dump($username, $password, SHA2($password, 256));
    $sql = "SELECT *
            FROM administrateurs
            WHERE nom_utilisateur = ? AND mot_de_passe=SHA2(?,256)
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    if (!$admin) return false;

    return $admin;
}
