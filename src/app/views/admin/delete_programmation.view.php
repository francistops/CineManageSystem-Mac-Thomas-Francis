<?php
require_once(CONTROLLERS_PATH . '/progController.php');

$is_deleted = remove_programmation();
if ($is_deleted) {
    header('Location: programmation.php?action=programmation');
    exit;
}
