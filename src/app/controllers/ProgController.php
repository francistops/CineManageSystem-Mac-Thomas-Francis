<?php
require_once __DIR__ . '/../../../config.php';
require_once MODELS_PATH . '/../models/ProgModel.php';
require_once APP_PATH . '/helper/utils.php';


function search_programmations()
{
    // echo 'in search_programmations';
    $admin = $_SESSION['admin'] ?? '';
    $film = $_GET['film'] ?? '';
    $salle = $_GET['salle'] ?? '';
    $date_debut = $_GET['date_debut'] ?? '';
    $date_fin = $_GET['date_fin'] ?? '';

    // add error if not result is returned or invalid
    $movies = filter_programmations($admin, $film, $salle, $date_debut, $date_fin);
    include_once(VIEWS_PATH . '/partials/header.php');
    include_once(VIEWS_PATH . '/home/index.php');
    //include_once(VIEWS_PATH . '/home/search.prog.view.php');
    include_once(VIEWS_PATH . '/partials/footer.php');
}

function get_programmations()
{
    $programmations = read_programmations();
    return $programmations;
}

function get_programmation_by_id()
{
    $id = intval($_GET['id']);
    return read_programmation_by_id($id);
}

function add_programmation()
{
    if ($_SESSION['is_login'] !== true && !checkRole('admin')) {
        header('Location: admin.php?action=login');
        die('<h2>Accès Refusé</h2>');
    }

    if (isset($_POST['add'])) {
        $admin = $_SESSION['admin'];
        $film = $_GET['film'];
        $salle = $_GET['salle'];
        $date_debut = $_GET['date_debut'];
        $date_fin = $_GET['date_fin'];

        insert_programmation($admin, $film, $salle, $date_debut, $date_fin);
    } else {
        include VIEWS_PATH . '/admin/add_programmation.view.php';
        exit;
    }

    header('Location: admin.php?action=dashboard');
    exit;

    return true;
}

function edit_programmation()
{
    if ($_SESSION['is_login'] !== true && !checkRole('admin')) {
        header('Location: admin.php?action=login');
        die('<h2>Accès Refusé</h2>');
    }

    $id = intval($_GET['id']);
    if (isset($_POST['update']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $film = $_GET['film'];
        $salle = $_GET['salle'];
        $date_debut = $_GET['date_debut'];
        $date_fin = $_GET['date_fin'];

        update_programmation($id, $admin, $film, $salle, $date_debut, $date_fin);
    } else {
        include VIEWS_PATH . '/admin/edit_programmation.view.php';
        exit;
    }

    header('Location: admin.php?action=dashboard');
    exit;

    return true;
}

function remove_programmation(): bool
{
    if ($_SESSION['is_login'] !== true && !checkRole('admin')) {
        header('Location: programmation.php?action=login');
        die('<h2>Accès Refusé</h2>');
    }
    $id = intval($_GET['id']);
    delete_programmation($id);
    header('Location: programmation.php?action=programmation');
    exit;
}
