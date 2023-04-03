<?php
$routings->get("/", "views/index.view.php");
$routings->get("/dashboard/information", "controllers/dashboard/information.php")->only('user');

$routings->get("/register", "controllers/users/register.php")->only('guest');
$routings->post("/signup", "controllers/users/signup.php");
$routings->get("/login", "controllers/users/login.php")->only('guest');
$routings->post("/signin", "controllers/users/signin.php");
$routings->get("/logout", "controllers/users/signout.php")->only('user');


$routings->post("/update-info", "controllers/dashboard/update_info.php")->only('user');
$routings->post("/dashboard/upload.php", "upload.php");
$routings->post("/change-user-photo", "/controllers/dashboard/upload_user_photo.php");


$routings->get("/add-listing", "controllers/listings/new.php");
