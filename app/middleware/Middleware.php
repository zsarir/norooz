<?php

namespace app\middleware;

use app\middleware\User;
use app\middleware\Guest;

class Middleware
{
    public const MAP = [
        'user' => User::class,
        'guest' => Guest::class
    ];

    public static function resolve($key)
    {

        if (!$key) {
            return;
        }
        $key = strtolower($key);
        $middleware = static::MAP[$key] ?? false;
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
            return;
        }
        (new $middleware)->handle();
    }
}
