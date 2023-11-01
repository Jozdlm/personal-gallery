<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once "src/DbConnection.php";

if (!getDbConnection()) {
    header("Location: error.php");
}

require_once("home.php");