<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/MenuModel.php');

class ProductListController {
    private $menuModel;

    public function __construct($db) {
        $this->menuModel = new MenuModel($db);
    }

    public function handle($get) {
        $products = $this->menuModel->getAll();
        session_start();
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header("Location: ?action=login");
            exit;
        }

        include(__DIR__ . '/../views/list_products.php');
    }

public function get_films() : array {
    read_films();
    return 'ran get_films';
}

public function get_film_by_id() : array {
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
}