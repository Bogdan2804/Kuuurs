<?php

class Team {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getAll() {
        $result = $this->db->query("SELECT * FROM teams");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO teams (name, created_at) VALUES (?, NOW())");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }
}


?>