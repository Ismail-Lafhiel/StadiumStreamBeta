<?php
namespace App\Controllers;
require_once __DIR__.'/../Config/config.php'; 
use App\Config\Database;
use App\Models\FootballTeam;

class FootballTeamController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $database = new Database(HOST, USER, PASSWORD, DATABASE);
        $pdo = $database->connect();
        $this->model = new FootballTeam($pdo);
    }

    public function index()
    {
        $teams = $this->model->getAllTeams();
        $this->render('football_teams.index', ['teams' => $teams]);
    }

    public function show($id)
    {
        $team = $this->model->getTeamById($id);
        $this->render('football_teams.show', ['team' => $team]);
    }

    public function create()
    {
        $this->render('football_teams.create');
    }
    public function store($data)
    {
        $result = $this->model->createTeam($data['name'], $data['players'], $data['coach']);
        if ($result) {
            $teams = $this->model->getAllTeams();
            $this->render('football_teams.index', ['teams' => $teams, 'successMessage' => 'Team created successfully']);
        } else {
            $this->render('football_teams.index', ['errorMessage' => 'Failed to create team']);
        }
    }

    public function edit($id)
    {
        $team = $this->model->getTeamById($id);
        $this->render('football_teams.edit', ['team' => $team]);
    }
    public function update($id, $data)
    {
        $result = $this->model->updateTeam($id, $data['name'], $data['players'], $data['coach']);
        if ($result) {
            $teams = $this->model->getAllTeams();
            $this->render('football_teams.index', ['teams' => $teams, 'successMessage' => 'Team updated successfully']);
        } else {
            $this->render('football_teams.index', ['errorMessage' => 'Failed to update team']);
        }
    }

    public function delete($id)
    {
        $result = $this->model->deleteTeam($id);
        if ($result) {
            $teams = $this->model->getAllTeams();
            $this->render('football_teams.index', ['teams' => $teams, 'successMessage' => 'Team deleted successfully']);
        } else {
            $this->render('football_teams.index', ['errorMessage' => 'Failed to delete team']);
        }
    }
}
