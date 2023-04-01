<?php
$routings->get("/dashboard/information", "controllers/dashboard/information.php")->only('user');
$routings->get("/", "views/index.view.php");

$routings->get("/register", "controllers/users/register.php")->only('guest');
$routings->post("/signup", "controllers/users/signup.php")->only('guest');

// $routings->post("/updateinformation", "controllers/dashboard/updateinformation.php");
$routings->post("/updateinformation", "controllers/dashboard/updateinformation.php");
$routings->post("/dashboard/upload.php", "upload.php");
$routings->post("/upload.php", "upload.php");
