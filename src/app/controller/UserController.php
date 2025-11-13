<?php

function register(array $userObj) : boolean {
    return 'ran register';
}

function login(string $username, string $password) : boolean {
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

function logout(string $user) : boolean {
    session_start();
    session_destroy();
    header('Location: login.php');
    exit;

    return 'ran logout';
}

function delete($username) : boolean {
    return 'ran delete'
}