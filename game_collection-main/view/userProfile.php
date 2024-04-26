<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="assets/style/commun.css"/>
    <link rel="stylesheet" href="assets/style/userProfile.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
    <title>Profil</title>
</head>
<body>
<?php require_once 'view/components/header.php'; ?>
<main>
    <h1>Mon profil</h1>
    <?php if ($alert_change_sucess) { ?>
        <div class="success_alert" style="width: 90%">
            <p>Changements effectués avec succès !</p>
        </div>
    <?php } ?>
    <?php if ($alert_update_error) { ?>
        <div class="error_alert" style="width: 90%">
            <p>Erreur ! Un compte avec cet email existe déjà ou la confirmation de votre mot de passe n'est pas correcte !</p>
        </div>
    <?php } ?>

    <form action="profil" method="post" autocomplete="off">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" autocomplete="false"
               value="<?php echo $userInfo['Nom_Utilisateur'] ?>">

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" autocomplete="false"
               value="<?php echo $userInfo['Pren_Utilisateur'] ?>">

        <label for="mail">Email :</label>
        <input type="email" name="mail" id="mail" autocomplete="false"
               value="<?php echo $userInfo['Email_Utilisateur'] ?>">

        <label for="password">Nouveau mot de passe :</label>
        <input type="password" name="password" id="password" autocomplete="false">

        <label for="password_conf">Confirmation du nouveau mot de passe :</label>
        <input type="password" name="password_conf" id="password_conf" autocomplete="false">

        <button type="submit" name="edit" value="1">Modifier</button>
        <button type="submit" name="remove" value="1">Supprimer mon compte</button>
        <button type="submit" name="disconnect" value="1">Se déconnecter</button>

    </form>
</main>
<?php require_once 'view/components/footer.php'; ?>

</body>
</html>
