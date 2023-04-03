<?php
session_start();

use app\content\Plans;
use app\Router;
use app\Login;
use app\Database\Select;
use app\Database;
use app\App;



const SITE_URL = 'https://norooz';
const BASE_PATH = __DIR__  . '/../';

$uri = $_SERVER['REQUEST_URI'];
require  '../core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});



require base_path('bootstrap.php');


$routings = new Router;
require base_path("core/routes.php");

$routings->applyRoute($uri, $_SERVER['REQUEST_METHOD']);
