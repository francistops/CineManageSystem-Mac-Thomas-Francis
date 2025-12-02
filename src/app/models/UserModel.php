<?php

require_once APP_PATH . '/helper/db_connect.php';
function checkAdmin(string $username, string $password): bool
{
    $conn = getDBConnection();

    $sql = "SELECT id, nom_utilisateur, mot_de_passe
            FROM administrateurs
            WHERE nom_utilisateur = ?
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {

        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    if (!$admin) {

        return false;
    }

    return $admin['mot_de_passe'] === $password;
}
