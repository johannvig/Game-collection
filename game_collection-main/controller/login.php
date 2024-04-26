<?php

require_once 'model/user.php';
require_once 'model/database.php';
$alert_login_error = false;
if (
    isset($_POST['email']) &&
    isset($_POST['mdp'])
) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $connResult = connectUser($email, $_POST['mdp']);
    if ($connResult) {
        header("Location: home");
        exit();
    } else {
        $alert_login_error = true;

    }
}
require_once 'view/login.php';
