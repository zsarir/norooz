<?php

namespace app\middleware;

use app\Login;

class User
{

    public function handle()
    {
        if (Login::userRole() !== 'user') {
            header("Location: /");
            exit();
        }
    }
}
