<?php
require_once __DIR__ . '/../models/LivreModel.php';

function listLivres() {
    $livres = getAllLivres();
    include __DIR__ . '/../views/livres/index.php';
}

function viewLivre($id) {
    $livre = getLivreById($id);
    include __DIR__ . '/../views/livres/view.php';
}
