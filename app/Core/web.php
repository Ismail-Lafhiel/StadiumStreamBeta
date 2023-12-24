<?php
use App\Controllers\FootballTeamController;
// include __DIR__."/../bootstrap/bootstrap.php";
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "<br>";

switch ($requestUri) {
    case '/football_teams/index':
        if ($requestMethod === 'GET') {
            // $controller = new FootballTeamController();
            // $controller->index();
            return require __DIR__.'/../../resources/views/football_teams/index.php';
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
    default:
        http_response_code(404);
        require __DIR__ . "/../../resources/views/404.php";
        break;
}
?>