<?php

/**
 * Ajoute un utilisateur
 *
 * @param string $userSurname Prénom de l'utilisateur
 * @param string $userName Nom de l'utilisateur
 * @param string $userMail Mail du client
 * @param string $userPassword Mot de passe du client
 * @return void
 */
function addUser($userSurname, $userName, $userMail, $userPassword)
{
    global $bdd;

    $sql = "INSERT INTO utilisateurs (Pren_Utilisateur, Nom_Utilisateur, Email_Utilisateur, Mdp_Utilisateur)
            VALUES (:prenUser, :nomUser, :mailUser, :pwdUser)";

    $stmt = $bdd->prepare($sql);
    $stmt->execute([':prenUser' => $userSurname,
        ':nomUser' => $userName,
        ':mailUser' => $userMail,
        ':pwdUser' => password_hash($userPassword, PASSWORD_DEFAULT),
    ]);
}

/**
 * Vérifie les informations de connexion et connecte l'utilisateur
 * @param $userMail
 * @param $userPassword
 * @return boolean
 */
function connectUser($userMail, $userPassword)
{
    global $bdd;
    $sql = "SELECT Id_Utilisateur,Email_Utilisateur,Mdp_Utilisateur
            FROM UTILISATEURS WHERE Email_Utilisateur = :userMail";

    $stmt = $bdd->prepare($sql);
    $stmt->execute(['userMail' => $userMail]);
    $user = $stmt->fetch();

    if ($user) {
        $pwdVerif = password_verify($userPassword, $user['Mdp_Utilisateur']);
        if ($pwdVerif) {
            // connection effectuer
            $_SESSION['userID'] = $user['Id_Utilisateur'];
            return true;
        }
    }
    return false;
}


/**
 * Vérifie si un utilisateur possède déja cette email
 * @param $userMail
 * @return boolean
 */
function checkMailExist($userMail)
{
    global $bdd;
    $sql = "SELECT utilisateurs.Email_Utilisateur FROM utilisateurs
                                      WHERE utilisateurs.Email_Utilisateur = :userMail;";

    $stmt = $bdd->prepare($sql);
    $stmt->execute(['userMail' => $userMail]);
    $userMail = $stmt->fetch();

    if ($userMail) {
        return true;
    }
    return false;
}

/**
 * Récupère les informations de l'utilisateur
 * @param int $userId identifiant de l'utilisateur
 * @return string nom de l'utilisateur
 */
function getUserData($userId)
{
    global $bdd;
    $sql = "SELECT * FROM UTILISATEURS WHERE Id_Utilisateur = :userId";

    $stmt = $bdd->prepare($sql);
    $stmt->execute(['userId' => $userId]);

    return $stmt->fetch();
}


/**
 * Supprime l'utilisateur ainsi que les jeux qu'il possède
 * @param $userId
 * @return void
 */
function removeUser($userId)
{
    global $bdd;

    $stmt = $bdd->prepare("DELETE FROM COLLECTIONS WHERE Id_Utilisateur = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $stmt = $bdd->prepare("DELETE FROM UTILISATEURS WHERE Id_Utilisateur = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
}

/**
 * Met a jour les informations de l'utilisateur
 * @param $userId
 * @param $nomUser
 * @param $preUser
 * @param $mailUser
 * @param $pwdUser
 * @return void
 */
function editUser($userId, $nomUser, $preUser, $mailUser, $pwdUser)
{
    global $bdd;
    if (password_verify('', $pwdUser)) {
        $sql = "UPDATE UTILISATEURS SET Pren_Utilisateur = :preUser, Nom_Utilisateur = :nomUser,
                Email_Utilisateur= :mailUser WHERE Id_Utilisateur = :userId";

        $stmt = $bdd->prepare($sql);
        $stmt->execute(['userId' => $userId, 'preUser' => $preUser, 'nomUser' => $nomUser, 'mailUser' => $mailUser]);
    } else {
        $sql = "UPDATE UTILISATEURS SET Pren_Utilisateur = :preUser, Nom_Utilisateur = :nomUser,
                        Email_Utilisateur= :mailUser, Mdp_Utilisateur = :pwdUser WHERE Id_Utilisateur = :userId";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(
            [
                'userId' => $userId,
                'preUser' => $preUser,
                'nomUser' => $nomUser,
                'mailUser' => $mailUser,
                'pwdUser' => $pwdUser
            ]);
    }

}


/**
 * Récupère le classement des joueurs
 *
 * @return array
 */
function getRanking()
{
    global $bdd;
    $sql = "SELECT
    CONCAT(UPPER(LEFT(Pren_Utilisateur, 1)), LOWER(SUBSTRING(Pren_Utilisateur, 2))) AS Pren_Utilisateur,
    UPPER(Nom_Utilisateur) AS Nom_Utilisateur,
	Most_Played.Nom_Jeu AS Jeu_Le_Plus_Joue,
    SUM(collections.Heure_Jouees_Collection) AS Temps_Total_Passe
    FROM UTILISATEURS
    INNER JOIN COLLECTIONS ON UTILISATEURS.Id_Utilisateur = COLLECTIONS.Id_Utilisateur
    INNER JOIN JEUX ON COLLECTIONS.Id_Jeu = JEUX.Id_Jeu
    INNER JOIN (
                SELECT collections.Id_Utilisateur, collections.Id_Jeu, collections.Heure_Jouees_Collection, jeux.Nom_Jeu FROM collections
				INNER JOIN jeux ON collections.Id_Jeu=jeux.Id_Jeu
				ORDER BY collections.Heure_Jouees_Collection DESC
				LIMIT 1)
            AS Most_Played ON Most_Played.Id_Utilisateur = UTILISATEURS.Id_Utilisateur
    GROUP BY UTILISATEURS.Id_Utilisateur
    ORDER BY Temps_Total_Passe DESC
    LIMIT 20;";


    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
