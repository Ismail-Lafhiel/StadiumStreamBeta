<?php
use App\Controllers\FootballTeamController;

// include __DIR__."/../bootstrap/bootstrap.php";
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestUri) {
    case '/football_teams/index':
        if ($requestMethod === 'GET') {
            $controller = new FootballTeamController();
            $controller->index();
        } else {
            http_response_code(405);
            echo "405 Method Not Allowed";
        }
        break;
    case '/football_teams/create':
        if ($requestMethod === 'GET') {
            $controller = new FootballTeamController();
            $controller->create();
        } elseif ($requestMethod === 'POST') {
            $data = $_POST;
            $controller = new FootballTeamController();
            $controller->store($data);
        } else {
            http_response_code(405);
            echo "405 Method Not Allowed";
        }
        break;
    case '/football_teams/{id}/edit':
        if ($requestMethod === 'GET') {
            $controller = new FootballTeamController();
            $controller->edit($_GET['id']);
        } elseif ($requestMethod === 'POST') {
            $data = $_POST;
            $controller = new FootballTeamController();
            $controller->update($_GET['id'], $data);
        } else {
            http_response_code(405);
            echo "405 Method Not Allowed";
        }
        break;
    case '/football_teams/{id}/delete':
        if ($requestMethod === 'POST') {
            $controller = new FootballTeamController();
            $controller->delete($_GET['id']);
        } else {
            http_response_code(405);
            echo "405 Method Not Allowed";
        }
        break;

    default:
        http_response_code(404);
        require __DIR__ . "/../../resources/views/404.php";
        break;
}
?>