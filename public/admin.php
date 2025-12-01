<?php
require_once(__DIR__ . '/../config.php');
require_once(APP_PATH . '/controllers/Users.php');
session_start();

include_once (VIEWS_PATH . '/partials/header.php');

$action = $_GET['action'] ?? 'login';
$id = $_GET['id'] ?? null;

if (!isset($_SESSION['is_login'])) {
    $_SESSION['is_login'] = false;
    require_once(VIEWS_PATH . '/admin/login.view.php');
} else {
    switch($action) {
        case 'login': adminLogin(); break;
        case 'logout': adminLogout(); break;
        case 'dashboard': dashboard(); break;
        case 'add': addLivreAdmin(); break;
        case 'edit': editLivreAdmin($id); break;
        case 'delete': deleteLivreAdmin($id); break;
        default: dashboard();
    }
}

include_once (VIEWS_PATH . '/partials/footer.php');
