<?php
require_once 'model/user.php';
require_once 'model/database.php';

$alert_pwd_non_identique = false;
$alert_email_already_exist = false;
$alert_user_created = false;
if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['mdp']) &&
    isset($_POST['confMdp'])
) {
    $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    # si l'email existe déja
    if (checkMailExist($mail)){
        $alert_email_already_exist = true;
    }elseif ($_POST['mdp'] != $_POST['confMdp']) {
        $alert_pwd_non_identique = true;

    } else {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);

        addUser($prenom, $nom, $mail, $_POST['mdp']);
        $alert_user_created = true;
    }
}

require_once 'view/register.php';
