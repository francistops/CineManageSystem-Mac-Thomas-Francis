<?php
require_once __DIR__ . '/../../../config.php';
require_once MODELS_PATH . '/../models/FilmModel.php';

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
        $fichier = $_FILES['imgposter'];
        $nom_fichier = $_FILES['imgposter']['name'];
        $destination_temporaire_fichier = $_FILES['imgposter']['tmp_name'];

        $destination_upload = __DIR__ . '/../../../public/assets/img/uploads/' . $nom_fichier;

        move_uploaded_file($destination_temporaire_fichier, $destination_upload);

        insert_film($titre, $realisateur, $genre, $annee, $desc, $nom_fichier);
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
        
        $fichier = $_FILES['imgposter'];
        $nom_fichier = $_FILES['imgposter']['name'];
        $destination_temporaire_fichier = $_FILES['imgposter']['tmp_name'];

        $destination_upload = __DIR__ . '/../../../public/assets/img/uploads/' . $nom_fichier;

        move_uploaded_file($destination_temporaire_fichier, $destination_upload);


        update_film($id, $titre, $realisateur, $genre, $annee, $desc, $nom_fichier);
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
