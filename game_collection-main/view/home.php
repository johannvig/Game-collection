<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets/style/home.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
    <title>Accueil</title>
</head>
<body>

<?php require_once 'view/components/header.php'; ?>

<div class="bandeauAccueil">
    <div class="textBandeau">
        <h2>SALUT <?php echo $userName ?> !</h2>
        <h2>PRÊT À AJOUTER DES</h2>
        <h2>JEUX À TA COLLECTION ?</h2>
    </div>
</div>

<section id="game-library">
    <h2>Mes jeux</h2>
    <?php if ($alert_no_games) { ?>
        <div class="info_alert">
            <p>Vous n'avez pas encore de jeu dans votre bibliothèque ! <a href="games">Cliquez ici pour en ajouter.</a>
            </p>
        </div>
    <?php } ?>
    <div class="list">
        <?php foreach ($userGamesList as $game) { ?>
            <a href="updateGame?gameId=<?php echo $game['Id_Jeu'] ?>">
                <div class='game' style='background-image: url("<?php echo $game['Couverture_Jeu'] ?>");'>
                    <div class='game-overlay'>
                        <div class="text">
                            <h3><?php echo $game['Nom_Jeu'] ?></h3>
                            <p><?php echo $game['Plateformes'] ?></p>
                        </div>
                        <p id="temps"><?php echo $game['Heure_jouees'] ?>h</p>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>


<?php require_once 'view/components/footer.php'; ?>


</body>
</html>
