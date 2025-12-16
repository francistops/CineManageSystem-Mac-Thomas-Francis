<?php
require_once __DIR__ . '/../../../config.php';
require_once MODELS_PATH . '/../models/FilmModel.php';


function search_films() {
    $genre = $_GET['genre'] ?? '';
    $annee = $_GET['annee'] ?? '';
    $note = $_GET['note'] ?? '';
    $orderByAnnee = $_GET['orderByAnnee'] ?? '';

    $movies = filter_films($genre, $annee, $note, $orderByAnnee);

    echo $movies;

    include VIEWS_PATH . '/home/index.php';
}

function get_films()
{
    $films = read_films();
    return $films;
}

function get_film_by_id()
{
    $id = intval($_GET['id']);
    return read_film_by_id($id);
}

function add_film()
{
    // check for out of range inputs eg: date
    if (isset($_POST['add'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $annee = intval($_POST['annee_sortie']);
        $desc = $_POST['description'];

        insert_film($titre, $realisateur, $genre, $annee, $desc);
    } else {
        include VIEWS_PATH . '/admin/add_film.view.php';
        exit;
    }

    header('Location: admin.php?action=dashboard');
    exit;

    return true;
}

function edit_film()
{
    $id = intval($_GET['id']);
    if (isset($_POST['update']) && isset($_GET['id'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $annee = intval($_POST['annee_sortie']);
        $desc = $_POST['description'];

        update_film($id, $titre, $realisateur, $genre, $annee, $desc);
    } else {
        include VIEWS_PATH . '/admin/edit_film.view.php';
        exit;
    }

    header('Location: admin.php?action=dashboard');
    exit;

    return true;
}

function remove_film(): bool
{
    $id = intval($_GET['id']);
    delete_film($id);
    // some security check
    header('Location: admin.php?action=dashboard');
    exit;
}
