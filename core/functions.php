<?php
function base_path($path)
{
    return BASE_PATH . $path;
}

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function view($folderName, $viewName, $data = [])
{
    extract($data);
    require base_path("views/{$folderName}/{$viewName}.view.php");
}

function controller($folderName, $controllerName, $data = [])
{
    extract($data);
    require base_path("controllers/{$folderName}/{$controllerName}.php");
}
