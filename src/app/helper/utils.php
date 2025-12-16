<?php
function redirect($url)
{
    header("Location: $url");
    exit;
}

function renderView($viewPatchSuffix, $viewName, $data = [])
{
    extract($data);
    echo var_dump($data);
    echo VIEWS_PATH . $viewPatchSuffix . $viewName . '.view.php';
    include VIEWS_PATH . $viewPatchSuffix . $viewName . '.view.php';
}

function checkeRoles($roles)
{
// $roles =["admin","user","Membre" ]
//$_SESSION['user']['role'] ==>> admin || user || visteur
$roleSession= $_SESSION['user']['role'];
if(!in_array($roleSession, $roles))
    die("Accès Refusé");
}

function checkRole($role)
{
    $roleSession = $_SESSION['admin_role'];

    if(  $roleSession != $role ) return true;
    return false;
}