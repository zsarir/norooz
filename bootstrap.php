<?php

use app\Database;
use app\Container;
use app\App;

$container = new Container();

$container->bind('app\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);
