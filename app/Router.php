<?php

namespace app;

use app\middleware\Middleware;

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller)
    {
        return $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function applyRoute($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // check for middleware
                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path('views/reponse-code/{$code}.php');
        die();
    }
}
