<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/MenuModel.php');

function get_films() {
    $films = read_films();
    //include VIEW_DIR . '/../views/films/index.php';
    return $films;
}

function get_film_by_id() {
    $id = intval($_GET['id']);
    read_film_by_id($id);
    return 'ran get_film_by_id';
}
 function add_film(array $data) : filmObj {
    if(isset($_POST['add'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $annee = intval($_POST['annee_sortie']);
        $desc = $_POST['description'];
    }

    // call insert_film()
    // if sucess redirect to dashboard
    header('Location: dashboard.php');
    exit;

    return 'ran add_film';    
}
 function edit_film(array $data) : filmObj {
    if(isset($_POST['update'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $annee = intval($_POST['annee_sortie']);
        $desc = $_POST['description'];
    }
    
    // call update_film();
    // if sucess run below
    header('Location: dashboard.php');
    exit;
    
    return 'ran edit_film';
}
 function remove_film() : bool {
    $id = intval($_GET['id']);

    // some security check
    // call delete_film($id);
    // if sucess run below
    header('Location: dashboard.php');
    exit;

}


// Livre Controller functions from template
require_once MODELS_PATH . '/../models/FilmModel.php';


function listLivres() {
    $livres = getAllLivres();
    include VIEW_DIR . '/../views/films/index.php';
}

function viewLivre($id) {
    $livre = getLivreById($id);
    include VIEW_DIR . '/../views/films/view.php';
}
