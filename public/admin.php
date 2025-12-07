<?php
require_once __DIR__  . '/../config.php';
require_once APP_PATH . '/controllers/AuthController.php';
require_once APP_PATH . '/controllers/Films.php';

session_start();

$action = $_GET['action'] ?? 'login';

if (!isset($_SESSION['is_login'])) {
    $_SESSION['is_login'] = false;
}

switch ($action) {
    case 'login':
        adminLogin();
        break;

    case 'logout':
        adminLogout();
        break;

    case 'dashboard':
        dashboard();
        break;

    case 'add':
        add_film();
        break;

    case 'edit':
        edit_film();
        break;

    case 'delete':
        remove_film();
        break;

    case 'manage_admins':
        manageAdmins();
        break;

    case 'update_admin_role':
        updateAdminRole();
        break;

    default:
        dashboard();
}
