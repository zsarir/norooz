<?php

use app\Validator;
use app\Database;
use app\App;

$errors = [];
if (!Validator::string($_POST['pass'], 5, 16)) {
    $errors['pass'] = 'Password must be between 5 and 16 characters';
}
if (!Validator::string($_POST['user_name'], 5, 16)) {
    $errors['user_name'] = 'User Name must be between 5 and 16 characters';
}
if (!Validator::string($_POST['name'], 5, 16)) {
    $errors['name'] = ' Name must be between 5 and 16 characters';
}
if (!Validator::string($_POST['display_name'], 5, 16)) {
    $errors['display_name'] = ' Display Name must be between 5 and 16 characters';
}
if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Email is not valid';
}

if (!empty($errors)) {
    view(
        'users',
        'register',
        [
            'errors' => $errors,
            'params' => [
                'email' => $_POST['email'],
                'user_name' => $_POST['user_name'],
                'name' => $_POST['name'],
                'display_name' => $_POST['display_name'],
            ]
        ]
    );
    exit();
}

$db = App::resolve(Database::class);
$email = $_POST['email'];
$user_name = $_POST['user_name'];
$emailExist = $db->query('SELECT * FROM `mvcdb`.`users` where user_email = :email', [
    'email' => $email,
])->find();

$usernameExist = $db->query('SELECT * FROM `mvcdb`.`users` where user_login = :user_name', [
    'user_name' => $user_name,
])->find();

if (!empty($emailExist)) {
    $errors['email'] = 'Email already exists';
}
if (!empty($usernameExist)) {
    $errors['user_name'] = 'User Name already exists';
}


if (!empty($errors)) {
    view(
        'users',
        'register',
        [
            'errors' => $errors,
            'params' => [
                'email' => $_POST['email'],
                'user_name' => $_POST['user_name'],
                'name' => $_POST['name'],
                'display_name' => $_POST['display_name'],
            ]
        ]
    );
    exit();
}



$ctime = date("20y-m-d h:i:s");
$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$query = "INSERT INTO `mvcdb`.`users` (`user_login`, `user_pass`, `user_nicename`, `user_email`, `user_registered`, `display_name`) VALUES (:user_name, :pass, :name, :email, :ctime, :display_name);";
$db->query(
    $query,
    [
        'user_name' => $_POST['user_name'],
        'pass' => $pass,
        'name' => $_POST['name'],
        'email' => $email,
        'ctime' => $ctime,
        'display_name' => $_POST['display_name'],
    ]
);
$user_id = $db->lastInsertedId();

login($user_id, $_POST['email'], $_POST['user_name'], $_POST['name'], $_POST['display_name']);
controller('dashboard', 'information');
exit();
