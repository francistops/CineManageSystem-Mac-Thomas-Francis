<?php
require_once __DIR__ . '/../models/AdminModel.php';
require_once __DIR__ . '/../models/LivreModel.php';
require_once __DIR__ . '/../core/helpers.php';
session_start();

function adminLogin() {
    $message = "";
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (checkAdmin($user, $pass)) {
            $_SESSION['admin'] = $user;
            redirect("admin.php?action=dashboard");
        } else {
            $message = "Identifiants invalides.";
        }
    }
    include __DIR__ . '/../views/admin/login.php';
}

function adminLogout() {
    session_destroy();
    redirect("admin.php?action=login");
}

function dashboard() {
    if (!isset($_SESSION['admin'])) redirect("admin.php?action=login");
    $livres = getAllLivres();
    include __DIR__ . '/../views/admin/dashboard.php';
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
