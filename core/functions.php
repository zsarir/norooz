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


function login($user_id, $email, $user_name, $name, $display_name)
{
    $_SESSION['user'] = [
        'user_id' => $user_id,
        'email' => $email,
        'user_name' => $user_name,
        'display_name' => $display_name,
        'name' => $name,
    ];
}
