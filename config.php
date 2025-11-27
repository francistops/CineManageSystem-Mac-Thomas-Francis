<?php
$protocol = isset($_SERVER['HTTPS']) && 
$_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$base_url = $protocol . $_SERVER['HTTP_HOST'] . '/';

// Paramètres de connexion à MySQL
define('DB_HOST', 'CineManageSystem-db');
define('DB_NAME', 'cinemanage_db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('BASE_URL', "$base_url");

define('MODELS_PATH', __DIR__ . '/src/app/models/');
define('CONTROLLERS_PATH', __DIR__ . '/src/app/controllers/');
define('VIEWS_PATH', __DIR__ . '/src/app/views/');
