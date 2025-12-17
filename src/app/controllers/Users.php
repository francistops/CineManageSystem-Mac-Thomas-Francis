<?php

require_once __DIR__ . '/../../../config.php';
require_once APP_PATH . '/models/UserModel.php';

/**
 * Inscription d'un utilisateur.
 */
function register(array $userObj): bool
{
    //implémenter réellement l'inscription si nécessaire
    return false;
}

/**
 * Tentative de connexion.
 * Retourne true si les identifiants sont valides, false sinon.
 */
function login(string $username, string $password): bool
{
    // On réutilise la logique d'admin pour le moment
    $admin = checkAdmin($username, $password);

    return $admin !== null;
}

/**
 * Déconnecte l'utilisateur courant (si session active).
 */
function logout(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = [];

    if (session_id() !== '') {
        session_destroy();
    }
}

/**
 * Suppression d'un utilisateur
 */
function delete(string $username): bool
{
    //implémenter la suppression dans la base de données
    return false;
}
