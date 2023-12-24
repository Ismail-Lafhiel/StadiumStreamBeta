<?php
namespace App\Core;

class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $basePath = '/StadiumStream';
        $uri = $basePath . $uri;
        $this->routes[$uri]['GET'] = $callback;
        // var_dump($this->routes);
    }

    public function post($uri, $callback)
    {
        $basePath = '/StadiumStream';
        $uri = $basePath . $uri;
        $this->routes[$uri]['POST'] = $callback;
        // var_dump($this->routes);
    }

    public function run()
    {
        $basePath = '/StadiumStream';
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace($basePath, '', $uri);
        $uri = rtrim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if ($uri === '') {
            $uri = '/';
        }
        var_dump($uri);

        if (array_key_exists($uri, $this->routes) && array_key_exists($method, $this->routes[$uri])) {
            $callback = $this->routes[$uri][$method];
            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];
                $controller->$method();
            } else {
                http_response_code(500);
                echo "Server Error";
                die();
            }
        } else {
            $this->abort(404);
        }
    }

    private function abort($code = 404)
    {
        http_response_code($code);
        require __DIR__ . "/../../resources/views/{$code}.php";
        die();
    }

}