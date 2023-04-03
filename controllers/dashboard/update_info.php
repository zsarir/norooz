<?php

use app\Validator;
use app\database\Database;
use app\App;

$user_email = $_SESSION['user']['user_email'];
$user_login = $_POST['user_login'];
$display_name = $_POST['display_name'];
$user_nicename = $_POST['user_nicename'];
$errors = [];
if (!Validator::string($user_login, 5, 16)) {
    $errors['user_login'] = 'User Name is required';
}
if (!Validator::string($display_name, 5, 16)) {
    $errors['display_name'] = 'Display Name is required';
}
if (!Validator::string($user_nicename, 5, 16)) {
    $errors['user_nicename'] = 'Name is required';
}

if (!empty($errors)) {
    view('dashboard', 'information', ['errors' => $errors]);
    exit();
}


$ctime = date("20y-m-d h:i:s");

$db = App::resolve(Database::class);

$query = "UPDATE `mvcdb`.`users` SET `user_login` = :user_login, `user_nicename` = :user_nicename, `display_name` = :display_name WHERE `user_email` = :user_email;";
$db->query(
    $query,
    [
        'user_login' => $user_login,
        'user_nicename' => $user_nicename,
        'display_name' => $display_name,
        'user_email' => $user_email,
    ]
);
$_SESSION['user']['user_login'] = $_POST['user_login'];
$_SESSION['user']['display_name'] = $_POST['display_name'];
$_SESSION['user']['user_nicename'] = $_POST['user_nicename'];
view('dashboard', 'information', ['success' => 'Your information has been updated successfully.']);
