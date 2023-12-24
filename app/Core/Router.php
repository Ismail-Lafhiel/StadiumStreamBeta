<?php
namespace App\Core;

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function run($requestMethod, $requestUri)
    {
        if (array_key_exists($requestMethod, $this->routes) && array_key_exists($requestUri, $this->routes[$requestMethod])) {
            $action = $this->routes[$requestMethod][$requestUri];
            $this->performAction($action);
        } else {
            $this->abort(404);
        }
    }

    protected function performAction($action)
    {
        if (is_callable($action)) {
            $action();
        } else {
            $viewPath = __DIR__ . "/../../resources/views/" . str_replace('.', '/', $action) . '.php';
            if (file_exists($viewPath)) {
                include $viewPath;
            } else {
                $this->abort(404);
            }
        }
    }

    private function abort($code)
    {
        http_response_code($code);
        require __DIR__ . "/../../resources/views/{$code}.php";
        die();
    }
}
