<?php

class GameMatch {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getAll() {
        $result = $this->db->query("SELECT * FROM matches");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function create($tournament_id, $team_a_id, $team_b_id, $match_time) {
        $stmt = $this->db->prepare("INSERT INTO matches (tournament_id, team_a_id, team_b_id, match_time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $tournament_id, $team_a_id, $team_b_id, $match_time);
        return $stmt->execute();
    }
}

?>