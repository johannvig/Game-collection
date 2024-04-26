<?php

if (!isset($_SESSION['userID'])) {
    header("Location: login");
    exit();
}
require_once 'model/database.php';
require_once 'model/user.php';
require_once 'model/game.php';
$alert_no_games = false;
$userName = strtoupper(
    getUserData($_SESSION['userID'])['Pren_Utilisateur']
);
$userGamesList = getUserGames($_SESSION['userID']);

if (!$userGamesList) {
    $alert_no_games = true;
}

require_once './view/home.php';

