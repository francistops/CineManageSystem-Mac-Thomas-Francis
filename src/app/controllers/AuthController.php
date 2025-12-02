<?php

require_once APP_PATH . '/models/UserModel.php';

function adminLogin(): void
{
    // 1) Si la requête est GET → juste afficher le formulaire
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        require VIEWS_PATH . '/admin/login.view.php';
        return;
    }

    // 2) On vient d'un POST
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $errors = [];

    if ($username === '' || $password === '') {
        $errors[] = "Le nom d'utilisateur et le mot de passe sont obligatoires.";
    } else {
        if (checkAdmin($username, $password)) {
            // Auth OK
            $_SESSION['is_login'] = true;
            $_SESSION['admin_username'] = $username;

            header('Location: admin.php?action=dashboard');
            exit;
        } else {
            $errors[] = "Nom d'utilisateur ou mot de passe invalide.";
        }
    }

    // On rend dispo les erreurs pour la vue
    $GLOBALS['login_errors'] = $errors;

    // Retourner sur le formulaire avec message
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
    if (empty($_SESSION['is_login'])) {
        header('Location: admin.php?action=login');
        exit;
    }

    // Pour l’instant on peut afficher une vue simple:
    require VIEWS_PATH . '/admin/dashboard.view.php';
}
