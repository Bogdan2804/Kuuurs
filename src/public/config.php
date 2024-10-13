<?php

$db = new mysqli('localhost', 'username', 'password', 'tournament_db');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>