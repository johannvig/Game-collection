DROP TABLE IF EXISTS COLLECTIONS;
DROP TABLE IF EXISTS UTILISATEURS;
DROP TABLE IF EXISTS DISPONIBLE;
DROP TABLE IF EXISTS PLATEFORME;
DROP TABLE IF EXISTS JEUX;

-- Création de la structure
CREATE TABLE UTILISATEURS
(
    Id_Utilisateur    INT AUTO_INCREMENT,
    Pren_Utilisateur  VARCHAR(255) NOT NULL,
    Nom_Utilisateur   VARCHAR(255) NOT NULL,
    Email_Utilisateur VARCHAR(255) NOT NULL,
    Mdp_Utilisateur   VARCHAR(255) NOT NULL,
    PRIMARY KEY (Id_Utilisateur),
    UNIQUE (Email_Utilisateur)
);

CREATE TABLE JEUX
(
    Id_Jeu          INT AUTO_INCREMENT,
    Nom_Jeu         VARCHAR(255) NOT NULL,
    Desc_Jeu        TEXT,
    Editeur_Jeu     VARCHAR(255) NOT NULL,
    Date_Sortie_Jeu DATE         NOT NULL,
    Couverture_Jeu  VARCHAR(255),
    Site_Jeu        VARCHAR(255),
    PRIMARY KEY (Id_Jeu),
    UNIQUE (Nom_Jeu)
);

CREATE TABLE PLATEFORME
(
    Id_plateforme  INT AUTO_INCREMENT,
    Nom_Plateforme VARCHAR(255) NOT NULL,
    PRIMARY KEY (Id_plateforme)
);

CREATE TABLE COLLECTIONS
(
    Id_Jeu                  INT,
    Id_Utilisateur          INT,
    Heure_Jouees_Collection INT NOT NULL,
    Date_Ajout_Collection   DATE NOT NULL,
    PRIMARY KEY (Id_Jeu, Id_Utilisateur),
    FOREIGN KEY (Id_Jeu) REFERENCES JEUX (Id_Jeu),
    FOREIGN KEY (Id_Utilisateur) REFERENCES UTILISATEURS (Id_Utilisateur)
);

CREATE TABLE DISPONIBLE
(
    Id_plateforme      INT,
    Id_Jeu             INT,
    N_Ordre_Plateforme INT NOT NULL,
    PRIMARY KEY (Id_plateforme, Id_Jeu),
    FOREIGN KEY (Id_plateforme) REFERENCES PLATEFORME (Id_plateforme),
    FOREIGN KEY (Id_Jeu) REFERENCES JEUX (Id_Jeu)
);



-- Insertion des données


INSERT INTO `JEUX` (`Id_Jeu`, `Nom_Jeu`, `Desc_Jeu`, `Editeur_Jeu`, `Date_Sortie_Jeu`, `Couverture_Jeu`, `Site_Jeu`)
VALUES (1, 'The Witcher 3: Wild Hunt', 'An open-world RPG set in a gritty fantasy universe', 'CD Projekt', '2015-05-18',
        'https://th.bing.com/th/id/OIP.ESLUrniRRUtzAk-LMGNjAAAAAA?rs=1&pid=ImgDetMain',
        'https://thewitcher.com'),
       (2, 'Red Dead Redemption 2', 'An epic tale of life in America at the dawn of the modern age', 'Rockstar Games',
        '2018-10-26',
        'https://th.bing.com/th/id/OIP.ecoMHvpEDcaJGEHooAQE4QAAAA?rs=1&pid=ImgDetMain',
        'https://www.rockstargames.com/reddeadredemption2/'),
       (3, 'Super Mario Odyssey', 'Mario embarks on a new journey through unknown worlds', 'Nintendo', '2017-10-27',
        'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000001130/c42553b4fd0312c31e70ec7468c6c9bccd739f340152925b9600631f2d29f8b5',
        'https://www.nintendo.com/games/detail/super-mario-odyssey-switch'),
       (4, 'Halo Infinite', 'The next chapter of the legendary Halo series', '343 Industries', '2021-12-08',
        'https://th.bing.com/th/id/R.b88688beade9d2a55595c44a94d4051d?rik=qNwmqZp8c4mgUg&pid=ImgRaw&r=0',
        'https://www.halowaypoint.com/en-us/games/halo-infinite'),
       (5, 'Cyberpunk 2077', 'An open-world, action-adventure story set in Night City', 'CD Projekt', '2020-12-10',
        'https://th.bing.com/th/id/R.e70e98eee8f8f2eb33ca0ac0e7469e0a?rik=dlIDk%2bs642X81Q&pid=ImgRaw&r=0',
        'https://www.cyberpunk.net');


INSERT INTO `PLATEFORME` (`Id_plateforme`, `Nom_Plateforme`)
VALUES (1, 'PC'),
       (2, 'Nintendo'),
       (3, 'Mobile'),
       (4, 'Xbox'),
       (5, 'PlayStation');

INSERT INTO `disponible` (`Id_plateforme`, `Id_Jeu`, `N_Ordre_Plateforme`) VALUES
    ('1', '5', '1'),
    ('1', '2', '1'),
    ('5', '5', '2');
