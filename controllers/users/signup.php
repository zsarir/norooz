<?php


use app\Validator;
use app\Login;
use app\database\Database;
use app\App;

$errors = [];
if (!Validator::string($_POST['user_pass'], 5, 16)) {
    $errors['user_pass'] = 'Password must be between 5 and 16 characters';
}
if (!Validator::string($_POST['user_login'], 5, 16)) {
    $errors['user_login'] = 'User Name must be between 5 and 16 characters';
}
if (!Validator::string($_POST['user_nicename'], 5, 16)) {
    $errors['user_nicename'] = ' Name must be between 5 and 16 characters';
}
if (!Validator::string($_POST['display_name'], 5, 16)) {
    $errors['display_name'] = ' Display Name must be between 5 and 16 characters';
}
if (!Validator::email($_POST['user_email'])) {
    $errors['user_email'] = 'Email is not valid';
}

if (!empty($errors)) {
    view(
        'users',
        'register',
        [
            'errors' => $errors,
            'params' => [
                'user_email' => $_POST['user_email'],
                'user_login' => $_POST['user_login'],
                'user_nicename' => $_POST['user_nicename'],
                'display_name' => $_POST['display_name'],
            ]
        ]
    );
    exit();
}

$db = App::resolve(Database::class);
$user_email = $_POST['user_email'];
$user_login = $_POST['user_login'];
$emailExist = $db->selectQuery('users', [
    'user_email' => $user_email,
])->one();

$usernameExist = $db->selectQuery('users', [
    'user_login' => $user_login,
])->one();

if (!empty($emailExist)) {
    $errors['user_email'] = 'Email already exists';
}
if (!empty($usernameExist)) {
    $errors['user_login'] = 'User Name already exists';
}


if (!empty($errors)) {
    view(
        'users',
        'register',
        [
            'errors' => $errors,
            'params' => [
                'user_email' => $_POST['user_email'],
                'user_login' => $_POST['user_login'],
                'user_nicename' => $_POST['user_nicename'],
                'display_name' => $_POST['display_name'],
            ]
        ]
    );
    exit();
}



$ctime = date("20y-m-d h:i:s");
$user_pass = password_hash($_POST['user_pass'], PASSWORD_BCRYPT);
$params = [
    'user_login' => $_POST['user_login'],
    'user_pass' => $user_pass,
    'user_nicename' => $_POST['user_nicename'],
    'user_email' => $user_email,
    'user_registered' => $ctime,
    'display_name' => $_POST['display_name'],
];
$db->insertToTable('users',  $params);

$ID = $db->lastInsertedId();

Login::login($ID, $_POST['user_email'], $_POST['user_login'], $_POST['user_nicename'], $_POST['display_name']);
controller('dashboard', 'information');
exit();
