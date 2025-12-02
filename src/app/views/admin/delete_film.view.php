<?php
require_once(CONTROLLERS_PATH . '/Films.php');

$is_deleted = remove_film();
if ($is_deleted) {
    header('Location: admin.php?action=dashboard');
    exit;
}
