<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Game Collection</title>
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets/style/gameList.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
</head>
<body>
<?php require_once 'view/components/header.php'; ?>

<main>
    <h1>Ajouter un jeu à sa bibliothèque</h1>
    <form id="search-form" method="post">
        <div id="search-container">
            <input id="search-input" type="text" name="search" placeholder="Rechercher un jeu">
            <button type="submit" id="search-btn">
                RECHERCHER
            </button>
        </div>

    </form>


    <section id="game-library">
        <?php if ($alert_add_game) { ?>
            <div class="success_alert">
                <p>Votre jeu a bien été ajouté a votre bibliothèque !</p>
            </div>
        <?php } ?>
        <h2>Jeux disponibles</h2>
        <div class="info_alert">
            <p>Vous ne trouvez pas votre jeu ? <a href="addGame">Cliquez ici pour en ajouter un.</a></p>
        </div>
        <div class="game-container">

            <?php foreach ($games as $game) { ?>
                <form method='post' class='game-form'>
                    <input type='hidden' name='game_id' value='<?php echo $game['Id_Jeu']; ?>'>
                    <div class='game'
                         style='background-image: url("<?php echo htmlspecialchars($game['Couverture_Jeu']); ?>");'>
                        <div class='game-overlay'></div>
                        <h3><?php echo $game['Nom_Jeu']; ?></h3>
                        <p><?php echo $game['Editeur_Jeu']; ?></p>
                        <button type='submit' name='add_collection'>AJOUTER À LA BIBLIOTHÈQUE</button>
                    </div>
                </form>
            <?php } ?>


        </div>
    </section>
</main>
<?php require_once 'view/components/footer.php'; ?>


</body>
</html>
