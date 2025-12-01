<?php
require_once __DIR__ . '/../app/controllers/LivreController.php';
include __DIR__ . '/../app/views/header.php';

if (isset($_GET['id'])) {
    viewLivre($_GET['id']);
} else {
    listLivres();
}

include __DIR__ . '/../app/views/footer.php';
?>