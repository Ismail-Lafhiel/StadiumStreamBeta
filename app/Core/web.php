<?php
use App\Controllers\UserController;
use App\Core\Router;
require __DIR__ . '/../../vendor/autoload.php';

$router = new Router();

$router->get('/home', [UserController::class, 'index']);

$router->run();

