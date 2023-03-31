<?php
$email = $_SESSION['user']['email'];

use app\Validator;
use app\Database;
use app\App;

$user_name = $_POST['user_name'];
$display_name = $_POST['display_name'];
$name = $_POST['name'];
$errors = [];
if (!Validator::string($user_name, 5, 16)) {
    $errors['user_name'] = 'User Name is required';
}
if (!Validator::string($display_name, 5, 16)) {
    $errors['display_name'] = 'Display Name is required';
}
if (!Validator::string($name, 5, 16)) {
    $errors['name'] = 'Name is required';
}

if (!empty($errors)) {
    view('dashboard', 'information', ['errors' => $errors]);
    exit();
}


$ctime = date("20y-m-d h:i:s");

$db = App::resolve(Database::class);

$query = "UPDATE `mvcdb`.`users` SET `user_login` = :user_name, `user_nicename` = :name, `display_name` = :display_name WHERE `user_email` = :email;";
$db->query(
    $query,
    [
        'user_name' => $user_name,
        'name' => $name,
        'display_name' => $display_name,
        'email' => $email,
    ]
);
