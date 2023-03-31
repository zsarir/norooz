<?php
$routings->get("/dashboard/information", "controllers/dashboard/information.php");
$routings->get("/", "views/index.view.php");

$routings->get("/register", "controllers/users/register.php");
$routings->post("/signup", "controllers/users/signup.php");

// $routings->post("/updateinformation", "controllers/dashboard/updateinformation.php");
$routings->post("/updateinformation", "controllers/dashboard/updateinformation.php");
