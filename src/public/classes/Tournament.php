<?php 

class Tournament {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getAll() {
        $result = $this->db->query("SELECT * FROM tournaments");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function create($name, $start_date, $end_date, $status) {
        $stmt = $this->db->prepare("INSERT INTO tournaments (name, start_date, end_date, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $start_date, $end_date, $status);
        return $stmt->execute();
    }
}

?>