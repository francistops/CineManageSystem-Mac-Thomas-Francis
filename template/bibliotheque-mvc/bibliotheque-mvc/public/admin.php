<?php
require_once __DIR__ . '/../app/controllers/AdminController.php';
include __DIR__ . '/../app/views/header.php';

$action = $_GET['action'] ?? 'login';
$id = $_GET['id'] ?? null;

switch($action) {
    case 'login': adminLogin(); break;
    case 'logout': adminLogout(); break;
    case 'dashboard': dashboard(); break;
    case 'add': addLivreAdmin(); break;
    case 'edit': editLivreAdmin($id); break;
    case 'delete': deleteLivreAdmin($id); break;
    default: dashboard();
}

include __DIR__ . '/../app/views/footer.php';
?>