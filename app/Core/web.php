<?php
use App\Controllers\FootballTeamController;

use App\Core\Router;

$router = new Router();
$router->get('/football_teams', [FootballTeamController::class, 'index']);
$router->get('/football_teams/create', [FootballTeamController::class, 'create']);
$router->post('/football_teams', [FootballTeamController::class, 'store']);
$router->get('/football_teams/{id}/edit', [FootballTeamController::class, 'edit']);
$router->post('/football_teams/{id}', [FootballTeamController::class, 'update']);
$router->get('/football_teams/{id}', [FootballTeamController::class, 'delete']);
$router->run();
