<?php
$errors = [];
if (!Validator::string($_POST['pass'], 5, 16)) {
    $errors['pass'] = 'Password must be between 5 and 16 characters';
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
            'email' => $_POST['email']
        ]
    );
} else {
    $db = new Database;
    $email = $_POST['email'];
    $emailExist = $db->query("SELECT * FROM users where user_email = '$email'");
    if (!empty($emailExist)) {
        $errors['email'] = 'Email already exists';
        view(
            'users',
            'register',
            [
                'errors' => $errors,
                'email' => $_POST['email']
            ]
        );
    } else {

        $time = date("20y-m-d h:i:s");
        $pass = $_POST['pass'];
        $query = "INSERT INTO `mvcdb`.`users` (`user_login`, `user_pass`, `user_nicename`, `user_email`, `user_registered`, `display_name`) VALUES ('{$email}', '{$pass}', '{$email}', '{$email}', '{$time}', '{$email}');";
        $db->insert($query);

        echo 'User created successfully';
    }
}
