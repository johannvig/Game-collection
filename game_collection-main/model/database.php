<?php

$bdd = createDBConnection($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

/**
 * Génère la connexion PDO a la bdd
 * @param $host
 * @param $dbName
 * @param $userName
 * @param $pwd
 * @return PDO
 */
function createDBConnection($host, $dbName, $userName, $pwd)
{
    return new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $userName, $pwd);
}

