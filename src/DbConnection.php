<?php
require_once("src/AppConfig.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => $_ENV["DB_NAME"],
    'username' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASS"],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

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