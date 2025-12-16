<?php

require_once APP_PATH . '/helper/db_connect.php';

/**
 * Vérifie les identifiants d'un administrateur.
 * Retourne un tableau (id, nom_utilisateur, role) si trouvé,
 * ou null si aucun admin ne correspond.
 */
function checkAdmin(string $username, string $password): ?array
{
    $conn = getDBConnection();

    $stmt = $conn->prepare(
        "SELECT id, nom_utilisateur, role
         FROM administrateurs
         WHERE nom_utilisateur = ? AND mot_de_passe = ?"
    );

    if (!$stmt) {
        // En cas de problème de préparation, on renvoie null
        return null;
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && ($admin = $result->fetch_assoc())) {
        // contient id, nom_utilisateur, role
        return $admin;
    }

    return null;
}

/**
 * Retourne la liste de tous les administrateurs
 * (id, nom_utilisateur, role).
 */
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

/**
 * Met à jour le rôle d'un administrateur à partir de son id.
 */
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
}
