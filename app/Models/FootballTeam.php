<?php
namespace App\Models;
use App\Models\Model;
class FootballTeam extends Model
{
    public function getAllTeams()
    {
        $query = "SELECT * FROM teams";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTeamById($id)
    {
        $query = "SELECT * FROM teams WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createTeam($name, $players, $coach)
    {
        $query = "INSERT INTO teams (name, players, coach) VALUES (:name, :players, :coach)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':players', $players);
        $stmt->bindParam(':coach', $coach);
        return $stmt->execute();
    }

    public function updateTeam($id, $name, $players, $coach)
    {
        $query = "UPDATE teams SET name = :name, players = :players, coach = :coach WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':players', $players);
        $stmt->bindParam(':coach', $coach);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteTeam($id)
    {
        $query = "DELETE FROM teams WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
