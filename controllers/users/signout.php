<?php

use app\Login;


Login::logout();
header('Location: /');
exit();
