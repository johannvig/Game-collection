<?php

require_once 'model/game.php';
require_once 'model/collection.php';
require_once 'model/database.php';
require_once 'model/user.php';


if (isset($_GET['gameId'])) {
    $gameId = filter_var($_GET['gameId'], FILTER_SANITIZE_NUMBER_INT);
    if (isset($_POST['removeGame']) && $_POST['removeGame'] == $_GET['gameId']) {


        removeGameFromCollection($_SESSION['userID'], $gameId);
        header("Location: home");
    } elseif (isset($_POST['time_spent'])) {

        $gameCollectionsInfo = getUserGameData($_SESSION['userID'], $gameId);

        $time_spent = filter_var($_POST['time_spent'], FILTER_SANITIZE_NUMBER_INT);

        editGameTime($_SESSION['userID'], $gameId, $gameCollectionsInfo['Heure_jouees'] + $time_spent);
        header("Location: home");
    } else {
        $gameCollectionsInfo = getUserGameData($_SESSION['userID'], $gameId);

        require_once 'view/gameUpdate.php';

    }
} else {
    header("Location: home");
}

