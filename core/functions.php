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
