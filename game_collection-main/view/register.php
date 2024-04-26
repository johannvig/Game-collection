<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets/style/register.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
    <title>Inscription</title>
</head>

<body>

<div class="register">
    <h1>Inscription</h1>
    <?php if ($alert_pwd_non_identique) { ?>
        <div class="error_alert">
            <p>Erreur ! Mot de passe non identique.</p>
        </div>
    <?php } ?>

    <?php if ($alert_email_already_exist) { ?>
        <div class="error_alert">
            <p>Erreur ! Un compte avec cet email existe déjà !</p>
        </div>
    <?php } ?>

    <?php if ($alert_user_created) { ?>
        <div class="success_alert">
            <p>Votre compte a bien été crée, vous pouvez maintenant vous connecter.</p>
        </div>
    <?php } ?>
    <form action="" method="POST">

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>
        <label for="confMdp">Confirmation du mot de passe :</label>
        <input type="password" name="confMdp" id="confMdp" required>

        <input id="connect" type="submit" value="S'INSCRIRE"/>
    </form>
    <a href="login">Se connecter</a>
</div>


</body>

</html>
