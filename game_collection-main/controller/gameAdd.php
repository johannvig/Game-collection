<?php

if (!isset($_SESSION['userID'])) {
    header("Location: login");
    exit();
}

require_once 'model/game.php';
require_once 'model/database.php';

if (isset($_POST['game_name']) &&
    isset($_POST['game_desc']) &&
    isset($_POST['game_editor']) &&
    isset($_POST['game_release']) &&
    isset($_POST['game_cover_url']) &&
    isset($_POST['game_web_url']) &&
    isset($_POST['platforms'])
) {
    // Validation de la date
    $gameRelease = DateTime::createFromFormat('Y-m-d', $_POST['game_release']) ? $_POST['game_release'] : 1 - 11 - 1111;

    $game_name = htmlspecialchars($_POST['game_name']);
    $game_desc = htmlspecialchars($_POST['game_desc']);
    $game_editor = htmlspecialchars($_POST['game_editor']);
    $game_cover_url = filter_var($_POST['game_cover_url'], FILTER_SANITIZE_URL);
    $game_web_url = filter_var($_POST['game_web_url'], FILTER_SANITIZE_URL);
    // $_POST['platforms'] sanitized in addGame function
    addGame($game_name, $game_desc, $game_editor, $gameRelease, $game_cover_url, $game_web_url, $_POST['platforms']);

    header('Location: games');
    exit();
}

require_once 'view/gameAdd.php';
