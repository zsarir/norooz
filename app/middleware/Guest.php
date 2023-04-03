<?php

namespace app\middleware;

use app\Login;

class Guest
{
    public function handle()
    {
        if (Login::userRole() !== 'guest') {
            header("Location: /");
            exit();
        }
    }
}
