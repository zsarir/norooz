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

function view($foldername, $viewname, $data = [])
{
    extract($data);
    require base_path("views/{$foldername}/{$viewname}.view.php");
}
