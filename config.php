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
?>
