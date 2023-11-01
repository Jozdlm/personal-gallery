<?php
require_once("src/AppConfig.php");

function getDbConnection(): PDO
{
    $host = $_ENV["DB_HOST"];
    $dbName = $_ENV["DB_NAME"];
    $username = $_ENV["DB_USER"];
    $password = $_ENV["DB_PASS"];

    try {
        return new PDO("mysql:host=$host; dbname=$dbName", $username, $password);
    } catch (\PDOException $pdoException) {
        throw $pdoException;
    }
}