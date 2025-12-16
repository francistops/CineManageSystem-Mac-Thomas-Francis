<?php

require_once APP_PATH . '/models/UserModel.php';
require_once APP_PATH . '/helper/utils.php';

function adminLogin(): void
{
    if ($_SESSION['is_login'] === true) {
        header('Location: admin.php?action=dashboard');
        exit;
    }

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
        $admin = checkAdmin($username, $password);
        //var_dump($admin);
        if ($admin) {
            // Auth OK
            $_SESSION['is_login'] = true;
            $_SESSION['admin_username'] = $admin['nom_utilisateur'];
            $_SESSION['admin_role'] = $admin['role'];

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
    session_destroy();

    header('Location: admin.php?action=login');
    exit;
}

/**
 * Page protégée (dashboard admin).
 */
function dashboard(): void
{
    if ($_SESSION['is_login'] !== true && !checkRole('admin')) {
        header('Location: admin.php?action=login');
        exit;
    }

    // Pour l’instant on peut afficher une vue simple:
    require VIEWS_PATH . '/admin/dashboard.view.php';
}

function programmation(): void
{
    if ($_SESSION['is_login'] !== true && !checkRole('admin')) {
        header('Location: admin.php?action=login');
        exit;
    }

    // Pour l’instant on peut afficher une vue simple:
    require VIEWS_PATH . '/admin/programmation.view.php';
}