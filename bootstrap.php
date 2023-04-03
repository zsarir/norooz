<?php

use app\database\Database;
use app\Container;
use app\App;

$container = new Container();

$container->bind('app\database\Database', function () {
    $config = require base_path('config.php');

    return new Database($config);
});

App::setContainer($container);
