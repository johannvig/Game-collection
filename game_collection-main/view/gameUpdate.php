<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Mise à jour du jeu</title>
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets\style\gameUpdate.css">
</head>
<body>

<?php require_once 'view/components/header.php'; ?>


<main class="game-update-container">
    <div class="game-info">


        <h1><?php echo $gameCollectionsInfo['Nom_Jeu']; ?></h1>
        <p><?php echo $gameCollectionsInfo['Desc_Jeu']; ?></p>
        <p>Temps passé : <?php echo $gameCollectionsInfo['Heure_jouees']; ?> heures</p>


        <form class="time-add-form" method="post">
            <h2>Ajouter du temps passé sur le jeu</h2>
            <label>Temps passé sur le jeu</label>
            <input type="number" id="time-spent" name="time_spent" placeholder="xxx">
            <button type="submit">AJOUTER</button>
        </form>

        <form class="game-remove-form" method="post">
            <button type="submit" name="removeGame"
                    value="<?php echo $gameCollectionsInfo['Id_Jeu'] ?>">
                SUPPRIMER LE JEU DE MA BIBLIOTHÈQUE
            </button>
        </form>
    </div>

    <div class="game-image">
        <img src="<?php echo $gameCollectionsInfo['Couverture_Jeu']; ?>" alt="">
    </div>
</main>
<?php require_once 'view/components/footer.php'; ?>

</body>
</html>
