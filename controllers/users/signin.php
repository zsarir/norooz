<?php


use app\Validator;
use app\Login;
use app\Database;
use app\App;

$errors = [];
if (!Validator::string($_POST['user_pass'], 5, 16)) {
    $errors['user_pass'] = 'Password must be between 5 and 16 characters';
}

if (!Validator::string($_POST['user_email'], 5, 100)) {
    $errors['user_email'] = 'Email or usermane is not valid';
}


if (!empty($errors)) {
    view(
        'users',
        'login',
        [
            'errors' => $errors,
            'params' => [
                'user_email' => $_POST['user_email'],
            ]
        ]
    );
    exit();
}
$ID = '';
$user_login = '';
$user_nicename = '';
$display_name = '';
$user_email = '';
$db = App::resolve(Database::class);
$user_pass = password_hash($_POST['user_pass'], PASSWORD_BCRYPT);
if (Validator::email($_POST['user_email'])) {
    $user_email = $_POST['user_email'];
    $emailExist = $db->query('SELECT * FROM `mvcdb`.`users` where user_email = :user_email', [
        'user_email' => $user_email,
    ])->find();
    if (empty($emailExist)) {
        $errors['user_email'] = 'Email or usermane is not valid or dosent match';
    }

    if (!password_verify($_POST['user_pass'], $emailExist['user_pass'])) {
        $errors['user_email'] = 'Email or usermane is not valid or dosent match';
    }
    $ID = $emailExist['ID'];
    $user_login = $emailExist['user_login'];
    $user_nicename = $emailExist['user_nicename'];
    $display_name = $emailExist['display_name'];
} else {
    $user_login = $_POST['user_email'];
    $usernameExist = $db->query('SELECT * FROM `mvcdb`.`users` where user_login = :user_name', [
        'user_name' => $user_login,
    ])->find();
    if (empty($usernameExist)) {
        $errors['user_email'] = 'Email or usermane is not valid or dosent match';
    }

    if (!password_verify($_POST['user_pass'], $usernameExist['user_pass'])) {
        $errors['user_email'] = 'Email or usermane is not valid or dosent match';
    }
    $ID = $usernameExist['ID'];
    $user_login = $usernameExist['user_login'];
    $user_nicename = $usernameExist['user_nicename'];
    $display_name = $usernameExist['display_name'];
    $user_email = $usernameExist['user_email'];
}


if (!empty($errors)) {
    view(
        'users',
        'login',
        [
            'errors' => $errors,
            'params' => [
                'user_email' => $_POST['user_email'],
            ]
        ]
    );
    exit();
}



Login::login($ID, $user_email, $user_login, $user_nicename, $display_name);
controller('dashboard', 'information');
exit();
