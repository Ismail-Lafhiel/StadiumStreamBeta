<?php
namespace App\Controllers;

class Controller
{
    protected $viewPath;

    public function __construct()
    {
        $this->viewPath = __DIR__ . "/../../resources/views/";
    }

    protected function render($view, $data = [])
    {
        extract($data);
        include $this->viewPath . "{$view}.php";
    }
}