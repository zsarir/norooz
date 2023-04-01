<?php

namespace app\middleware;

class User
{

    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}
