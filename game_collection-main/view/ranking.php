<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="charset=utf-8">
    <title>Classement des temps passés</title>
    <link rel="stylesheet" href="assets/style/commun.css"/>

    <link rel="stylesheet" href="assets/style/ranking.css">
    <link rel="stylesheet" href="assets/style/alerts.css">
</head>
<body>
<?php require_once 'view/components/header.php'; ?>
<div class="ranking-container">
    <h1>Classement des temps passés</h1>
    <?php if ($alert_no_player) { ?>
        <div class="error_alert">
            <p>Désolé, il n'y a pas encore de joueur inscrit qui ne possède de jeu !</p>
        </div>
    <?php } ?>
    <table>
        <tr>
            <th>Joueur</th>
            <th>Temps passés</th>
            <th>Jeu favori</th>
        </tr>
        <?php foreach ($players as $player): ?>
            <tr>
                <td><?php echo $player['Pren_Utilisateur'] . " " . $player['Nom_Utilisateur']; ?></td>
                <td><?php echo $player['Temps_Total_Passe']; ?> h</td>
                <td><?php echo $player['Jeu_Le_Plus_Joue']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once 'view/components/footer.php'; ?>

</body>
</html>
