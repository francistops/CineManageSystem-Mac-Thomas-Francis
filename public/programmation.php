<?php
require_once __DIR__ . '/../config.php';
require_once APP_PATH . '/controllers/AuthController.php';
require_once APP_PATH . '/controllers/ProgController.php';

session_start();

$action = $_GET['action'] ?? 'login';

if (!isset($_SESSION['is_login'])) {
    $_SESSION['is_login'] = false;
}

switch ($action) {
    case 'programmations':
        get_programmations();
        break;

    case 'add':
        add_programmation();
        break;

    case 'edit':
        edit_programmation();
        break;

    case 'delete':
        remove_programmation();
        break;
    case 'programmationid':
        require_once(VIEWS_PATH . '/home/programmation.view.php');
        exit();
    default:
        programmation();
}
