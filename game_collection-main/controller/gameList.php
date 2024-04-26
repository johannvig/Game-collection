<?php

if (!isset($_SESSION['userID'])) {
    header("Location: login");
    exit();
}
$alert_add_game = false;
require_once 'model/collection.php';
require_once 'model/database.php';

if (isset($_POST['add_collection']) && isset($_POST['game_id'])) {
    $gameId = filter_var($_POST['game_id'], FILTER_SANITIZE_NUMBER_INT);


    addToCollection($gameId, $_SESSION['userID']);
    $alert_add_game = true;

}

if (!empty($_POST['search'])) {
    $search = htmlspecialchars($_POST['search']);
    $games = searchGamesByName($_SESSION['userID'], $search);
} else {
    $games = getGamesNotInCollection($_SESSION['userID']);
}

require_once 'view/gameList.php';

