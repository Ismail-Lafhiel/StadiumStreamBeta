<?php
namespace App\Controllers;

class Controller
{
    protected $viewPath;

    public function __construct()
    {
        $this->viewPath = __DIR__ . "/../../resources/views";
    }

    protected function render($view, $data = [])
    {
        $file = __DIR__ . '/../../resources/views/' . str_replace('.', '/', $view) . '.php';
        if (file_exists($file)) {
            extract($data);
            include $file;
        }
    }
}