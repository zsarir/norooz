<?php

namespace app;

use app\Database;
use app\App;



class Login
{
    public static function userRole()
    {
        if (isset($_SESSION['user'])) {
            return 'user';
        } else {
            return 'guest';
        }
    }

    public static function login($ID, $user_email, $user_login, $user_nicename, $display_name)
    {
        $_SESSION['user'] = [
            'ID' => $ID,
            'user_email' => $user_email,
            'user_login' => $user_login,
            'display_name' => $display_name,
            'user_nicename' => $user_nicename,
        ];
    }


    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function userPhoto()
    {
        if (self::userRole() === 'guest') {
            return '';
        }
        $db = App::resolve(Database::class);
        $result = $db->query('SELECT * FROM `mvcdb`.`users` where ID = :ID', [
            'ID' => $_SESSION['user']['ID'],
        ])->find();
        return $result['user_img'];
    }
}
