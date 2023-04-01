<?php

use app\Database;
use app\App;

if (isset($_FILES['images'])) {
    $errors = [];
    $uploadedFiles = [];

    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {

        $imageFileType = strtolower(pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION));
        $file_name = 'profile_photo_user_' . $_SESSION['user']['user_id'] . '.' . $imageFileType;
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        $file_size = $_FILES['images']['size'][$key];
        $target_file = $uploadDir . basename($file_name);

        // Check file size
        if ($file_size > 5000000) {
            $errors[] = 'File size must be less than 5MB';
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errors[] = "Only JPG, JPEG, PNG & GIF files are allowed";
        }



        if (empty($errors)) {
            if (move_uploaded_file($file_tmp, $target_file)) {
                $uploadedFiles[] = basename($target_file);
                $db = App::resolve(Database::class);
                $query = "UPDATE `mvcdb`.`users` SET user_img = :user_img WHERE ID = {$_SESSION['user']['user_id']}";
                $db->query($query, [
                    'user_img' => $file_name
                ]);
            } else {
                $errors[] = 'Error uploading ' . $file_name;
            }
        }
    }

    if (!empty($uploadedFiles)) {
        echo "Uploaded files: " . implode(', ', $uploadedFiles);
    }
    if (!empty($errors)) {
        echo "Errors: " . implode(', ', $errors);
    }
} else {
    echo "No files to upload.";
}
