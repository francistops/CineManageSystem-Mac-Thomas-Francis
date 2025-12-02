<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . '/../config.php');
require_once(APP_PATH . '/helper/utils.php');  

require_once(APP_PATH . '/helper/db_connect.php');
require_once(APP_PATH . '/controllers/Users.php'); 
require_once(APP_PATH . '/controllers/Films.php');  

session_start();

$action = $_GET['action'] ?? 'page';

switch ($action) {
    case 'page':
        break;
    case 'films':
        require_once(VIEWS_PATH . '/home/film.view.php');
        exit;
    case 'user':
        require_once(VIEWS_PATH . '/admin/profil.php');
        break;
    case 'login':
    case 'dashboard':
    case 'logout':
        redirect("admin.php?action=$action");
        exit;
    default:
         http_response_code(404);
        require '404.php';
        exit;
}

include_once (VIEWS_PATH . '/home/index.php'); ?>