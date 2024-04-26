<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Ajouter un jeu à la bibliothèque</title>
    <link rel="stylesheet" href="assets/style/commun.css"/>
    <link rel="stylesheet" href="assets/style/gameAdd.css"/>
</head>
<body>
<?php require_once 'view/components/header.php'; ?>

<main>
    <h1>Ajouter un jeu à sa bibliothèque</h1>


    <form id="game-add-form" method="post">
        <p>Le jeu que vous souhaiter ajouter n'existe pas !
            Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>

        <div class="form-group">
            <label for="game-name">Nom du jeu</label>
            <input type="text" id="game-name" name="game_name" placeholder="Nom du jeu" required>
        </div>

        <div class="form-group">
            <label for="game-editor">Editeur du jeu</label>
            <input type="text" id="game-editor" name="game_editor" placeholder="Editeur du jeu" required>
        </div>

        <div class="form-group">
            <label for="game-release">Sortie du jeu</label>
            <input type="date" id="game-release" name="game_release" required>
        </div>

        <div class="form-group">
            <label>Plateformes</label>
            <div class="checkbox-group">
                <div>
                    <label for="playstation">Playstation</label>
                    <input type="checkbox" id="playstation" name="platforms[]" value="Playstation">
                </div>
                <div>
                    <label for="xbox">Xbox</label>
                    <input type="checkbox" id="xbox" name="platforms[]" value="Xbox">
                </div>
                <div>
                    <label for="nintendo">Nintendo</label>
                    <input type="checkbox" id="nintendo" name="platforms[]" value="Nintendo">
                </div>
                <div>
                    <label for="pc">PC</label>
                    <input type="checkbox" id="pc" name="platforms[]" value="PC">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="game-description">Description du jeu</label>
            <textarea id="game-description" name="game_desc" placeholder="Description du jeu"></textarea>
        </div>

        <div class="form-group">
            <label for="cover-url">URL de la cover</label>
            <input type="url" id="cover-url" name="game_cover_url" placeholder="URL de la cover">
        </div>

        <div class="form-group">
            <label for="site-url">URL du site</label>
            <input type="url" id="site-url" name="game_web_url" placeholder="URL du site"">
        </div>


        <button type="submit" class="submit-btn" name="add_game">AJOUTER LE JEU</button>

    </form>
</main>
<?php require_once 'view/components/footer.php'; ?>

</body>
</html>
