<?php
namespace App\Models;
use App\Models\Model;
class FootballTeam extends Model
{
    public function getAllTeams()
    {
        $query = "SELECT * FROM team";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTeamById($id)
    {
        $query = "SELECT * FROM team WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createTeam($teamName, $numPlayers, $coach)
    {
        $query = "INSERT INTO team (team_name, num_players, coach) VALUES (:teamName, :numPlayers, :coach)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':teamName', $teamName);
        $stmt->bindParam(':numPlayers', $numPlayers);
        $stmt->bindParam(':coach', $coach);
        return $stmt->execute();
    }

    public function updateTeam($id, $teamName, $numPlayers, $coach)
    {
        $query = "UPDATE team SET team_name = :teamName, num_players = :numPlayers, coach = :coach WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':teamName', $teamName);
        $stmt->bindParam(':numPlayers', $numPlayers);
        $stmt->bindParam(':coach', $coach);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteTeam($id)
    {
        $query = "DELETE FROM team WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
