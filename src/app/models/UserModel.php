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



function getAllAdmins(): array
{
    $conn = getDBConnection();

    $sql = "SELECT id, nom_utilisateur, role FROM administrateurs ORDER BY id";
    $result = $conn->query($sql);

    if (!$result) {
        return [];
    }

    $admins = [];
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }

    return $admins;
}

function updateAdminRoleById(int $id, string $role): bool
{
    $conn = getDBConnection();

    $stmt = $conn->prepare(
        "UPDATE administrateurs 
         SET role = ? 
         WHERE id = ?"
    );

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("si", $role, $id);

    return $stmt->execute();
    if (!$admin) {

        return false;
    }

    return $admin['mot_de_passe'] === $password;
}



