<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets/style/login.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
    <title>Connexion</title>
</head>

<body>

<div class="login">
    <h1>Se connecter à Game Collection</h1>

    <?php if ($alert_login_error) { ?>
        <div class="error_alert">
            <p>Erreur de connexion ! Identifiants invalides</p>
        </div>
    <?php } ?>

    <form action="" method="POST">
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required>
        <input id="connect" type="submit" value="SE CONNECTER"/>
    </form>
    <a href="register">S'inscrire</a>
</div>


</body>

</html>
