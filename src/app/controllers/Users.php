<?php

require_once __DIR__ . '/../../../config.php';

function register(array $userObj) : bool {
    return 'ran register';
}

function login(string $username, string $password) : bool {
session_start();
if (isset($_POST['login'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if ($user !== '' && $pass !== '') {
        // call login model to get data from db

        if ($result->num_rows > 0) {
            $_SESSION['admin'] = $user;
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Identifiants incorrects";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

    return 'ran login';
}

function logout(string $user) : bool {
    session_start();
    session_destroy();
    header('Location: login.php');
    exit;

    return 'ran logout';
}

function delete($username) : bool {
    return 'ran delete';
}


// admin controller functions from template
require_once MODELS_PATH . '/../models/UserModel.php';
require_once MODELS_PATH . '/../models/FilmModel.php';
require_once APP_PATH . '/helper/utils.php';

function adminLogin() {
    
    $message = "";
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (checkAdmin($user, $pass)) {
            $_SESSION['admin'] = $user;
            $_SESSION['is_login'] = true;
            redirect("admin.php?action=dashboard");
        } elseif (empty($user) || empty($pass)) {
            $message = "Veuillez remplir tous les champs.";
        } elseif ($_SESSION['is_login'] === true) {
            redirect("admin.php?action=dashboard");
        } else {
            $message = "Identifiants invalides.";
        }
    }
    include VIEWS_PATH . '/admin/login.view.php';
}

function adminLogout() {
    session_destroy();
    redirect("admin.php?action=login");
}

function dashboard() {
    if (!isset($_SESSION['admin'])) redirect("admin.php?action=login");
    echo "Welcome, " . htmlspecialchars($_SESSION['admin']) . "!";
    $livres = getAllFilm();
    include VIEWS_PATH . '/admin/dashboard.php';
}

function addLivreAdmin() {
    if (!isset($_SESSION['admin'])) redirect("admin.php?action=login");
    if (isset($_POST['add'])) {
        addLivre($_POST['titre'], $_POST['auteur'], $_POST['annee']);
        redirect("admin.php?action=dashboard");
    }
    include __DIR__ . '/../views/livres/form.php';
}

function editLivreAdmin($id) {
    if (!isset($_SESSION['admin'])) redirect("admin.php?action=login");
    $livre = getLivreById($id);
    if (isset($_POST['update'])) {
        updateLivre($id, $_POST['titre'], $_POST['auteur'], $_POST['annee']);
        redirect("admin.php?action=dashboard");
    }
    include __DIR__ . '/../views/livres/form.php';
}

function deleteLivreAdmin($id) {
    if (!isset($_SESSION['admin'])) redirect("admin.php?action=login");
    deleteLivre($id);
    redirect("admin.php?action=dashboard");
}
