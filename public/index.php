<?php
const BASE_PATH = __DIR__  . '/../';
$uri = $_SERVER['REQUEST_URI'];
require  '../core/functions.php';
require base_path("views/partials/head.php");
require base_path("views/partials/navbar.php");
require base_path("app/Router.php");
$routings = new Router;
require base_path("core/routes.php");
$routings->applyRoute($uri, $_SERVER['REQUEST_METHOD']);







require base_path("views/partials/footer.php");
