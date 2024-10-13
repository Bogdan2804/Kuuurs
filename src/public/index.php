<?php

require_once 'config.php';
require_once 'classes/Tournament.php';
require_once 'classes/Team.php';
require_once 'classes/Match.php';

$tournamentModel = new Tournament($db);
$teamModel = new Team($db);
$matchModel = new GameMatch($db);

$tournaments = $tournamentModel->getAll();
$teams = $teamModel->getAll();
$matches = $matchModel->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_tournament'])) {
        $tournamentModel->create($_POST['name'], $_POST['start_date'], $_POST['end_date'], $_POST['status']);
    } elseif (isset($_POST['add_team'])) {
        $teamModel->create($_POST['name']);
    } elseif (isset($_POST['add_match'])) {
        $matchModel->create($_POST['tournament_id'], $_POST['team_a_id'], $_POST['team_b_id'], $_POST['match_time']);
    }
    header('Location: index.php');
    exit;
}

?>