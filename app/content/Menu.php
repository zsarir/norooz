<?php

namespace app\content;

use app\Login;

class Menu
{

    const MENU = [
        [
            'title' => 'Home',
            'url' => '/',
            'icon' => 'home',
            'middleware' => 'all'
        ],
        [
            'title' => 'Information',
            'url' => '/dashboard/information',
            'icon' => 'info',
            'middleware' => 'user'
        ],
        [
            'title' => 'Settings',
            'url' => '/dashboard/settings',
            'icon' => 'settings',
            'middleware' => 'user'
        ],
        [
            'title' => 'Listings',
            'url' => '/dashboard/listings',
            'icon' => 'listing',
            'middleware' => 'user'
        ],
        [
            'title' => 'Login',
            'url' => '/login',
            'icon' => 'login',
            'middleware' => 'guest'
        ],
        [
            'title' => 'Register',
            'url' => '/register',
            'icon' => 'register',
            'middleware' => 'guest'
        ],
        [
            'title' => 'Logout',
            'url' => '/logout',
            'icon' => 'logout',
            'middleware' => 'user'
        ]
    ];

    public function setMenu()
    {
        $strMenu = '';
        $middleware = Login::userRole();
        foreach (self::MENU as $menu) {

            if ($menu['middleware'] === $middleware || $menu['middleware'] === 'all') {
                $strMenu .= $this->createMenuItem($menu);
            }
        }
        $strMenu = '<div class="bd-menu">' . $strMenu . '</div>';
        return $strMenu;
    }

    public function createMenuItem($menu)
    {
        return '<a href="' . $menu['url'] . '" class="bd-menu-item">
                    <span>' . $menu['title'] . '</span>
                </a>';
    }
}
