<?php
if (!isset($_SESSION['userID'])) {
    header("Location: login");
    exit();
}
require_once "model/user.php";
require_once "model/database.php";


$alert_change_sucess = false;
$alert_update_error = false;
$userInfo = getUserData($_SESSION['userID']);
if (isset($_POST['disconnect']) && $_POST['disconnect'] == 1) {
    session_unset();
    header("Location: login");
} elseif (isset($_POST['remove']) && $_POST['remove'] == 1) {
    removeUser($_SESSION['userID']);
    header("Location: login");
} elseif (isset($_POST['edit']) && $_POST['edit'] == 1) {
    if (isset($_POST['nom'])
        && isset($_POST['prenom'])
        && isset($_POST['mail'])
        && isset($_POST['password'])
        && isset($_POST['password_conf'])
        && (isset($_POST['password']) == isset($_POST['password_conf']))) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($mail != $userInfo['Email_Utilisateur'] && checkMailExist($mail)) {
            $alert_update_error = true;

        } else {
            editUser($_SESSION['userID'], $nom, $prenom, $mail, $password);

            $alert_change_sucess = true;
            $userInfo = getUserData($_SESSION['userID']);
        }


    } else {
        $alert_update_error = true;
    }
}
require_once "view/userProfile.php";
