<?php

require_once APP_PATH . '/models/UserModel.php';

/**
 * Vérifie que l'utilisateur est connecté et qu'il a un des rôles demandés.
 */
function requireRole(array $roles): void
{
    if (empty($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
        header('Location: admin.php?action=login');
        exit;
    }

    if (empty($_SESSION['admin_role']) || !in_array($_SESSION['admin_role'], $roles, true)) {
        // Ici on pourrait afficher une vraie page 403
        header('Location: admin.php?action=dashboard');
        exit;
    }
}

/**
 * Connexion administrateur.
 */
function adminLogin(): void
{
<<<<<<< Updated upstream
    // 1) Si la requête est GET → juste afficher le formulaire
=======
    // Si déjà connecté, on redirige directement vers le dashboard
    if (!empty($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
        header('Location: admin.php?action=dashboard');
        exit;
    }

    // Requête GET : on affiche juste le formulaire
>>>>>>> Stashed changes
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // S'assure que la variable existe pour la vue
        if (!isset($GLOBALS['login_errors'])) {
            $GLOBALS['login_errors'] = [];
        }
        require VIEWS_PATH . '/admin/login.view.php';
        return;
    }

    // Requête POST : traitement du formulaire
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $errors = [];

    if ($username === '' || $password === '') {
        $errors[] = "Le nom d'utilisateur et le mot de passe sont obligatoires.";
    } else {
        // On va chercher l'admin dans la BD (avec rôle)
        $admin = checkAdmin($username, $password);

        if ($admin !== null) {
            // Auth OK : on stocke les infos utiles en session
            $_SESSION['is_login']       = true;
            $_SESSION['admin_id']       = $admin['id'];
            $_SESSION['admin_username'] = $admin['nom_utilisateur'];
            $_SESSION['admin_role']     = $admin['role'] ?? 'admin';

            header('Location: admin.php?action=dashboard');
            exit;
        } else {
            $errors[] = "Nom d'utilisateur ou mot de passe invalide.";
        }
    }

    // On rend les erreurs dispo pour la vue
    $GLOBALS['login_errors'] = $errors;

    // On ré-affiche le formulaire avec les messages
    require VIEWS_PATH . '/admin/login.view.php';
}

/**
 * Déconnecte l'admin.
 */
function adminLogout(): void
{
    $_SESSION = [];
    if (session_id() !== '') {
        session_destroy();
    }

    header('Location: admin.php?action=login');
    exit;
}

/**
 * Page protégée (dashboard admin).
 */
function dashboard(): void
{
<<<<<<< Updated upstream
    if (empty($_SESSION['is_login'])) {
=======
    if (empty($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
>>>>>>> Stashed changes
        header('Location: admin.php?action=login');
        exit;
    }

    // Ici, le dashboard peut récupérer les films via le contrôleur Films
    // ou juste afficher la vue si la logique est ailleurs.
    require VIEWS_PATH . '/admin/dashboard.view.php';
}

/**
 * Page de gestion des administrateurs (réservée au rôle admin).
 */
function manageAdmins(): void
{
    requireRole(['admin']);

    $admins = getAllAdmins(); // Fonction dans UserModel.php

    require VIEWS_PATH . '/admin/admins.view.php';
}

/**
 * Traitement du changement de rôle d'un administrateur (POST).
 */

function updateAdminRole(): void
{
    requireRole(['admin']);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: admin.php?action=manage_admins');
        exit;
    }

    $id   = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $role = trim($_POST['role'] ?? '');

    if ($id > 0 && $role !== '') {
        updateAdminRoleById($id, $role); // Fonction dans UserModel.php
    }

    header('Location: admin.php?action=manage_admins');
    exit;
}
