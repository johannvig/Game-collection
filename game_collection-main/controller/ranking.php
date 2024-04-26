<?php
if (!isset($_SESSION['userID'])) {
    header("Location: login");
    exit();
}
require_once 'model/user.php';
require_once 'model/database.php';
$alert_no_player = false;
$players = getRanking();
if (!$players) {
    $alert_no_player = true;
}
require_once 'view\ranking.php';
