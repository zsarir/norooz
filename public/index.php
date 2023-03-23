<?php
const BASE_PATH = __DIR__  . '/../';
require  '../core/functions.php';
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

die();


require base_path("views/partials/head.php");
require base_path("views/partials/navbar.php");
require base_path('views/index.view.php');
require base_path("views/partials/footer.php");
