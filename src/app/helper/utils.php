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
