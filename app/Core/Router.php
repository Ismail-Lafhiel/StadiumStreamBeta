<?php
namespace App\Core;
class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->routes[$uri]['GET'] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes[$uri]['POST'] = $callback;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes) && array_key_exists($method, $this->routes[$uri])) {
            $callback = $this->routes[$uri][$method];
            if (is_callable($callback)) {
                $callback();
            } else {
                // Handle non-callable callback
                http_response_code(500);
                echo "!! server !!";
                die();
                // $this->abort(500);
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