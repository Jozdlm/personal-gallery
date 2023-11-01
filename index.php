<?php

require __DIR__ . '/vendor/autoload.php';

require_once "src/DbConnection.php";

if (!getDbConnection()) {
    header("Location: error.php");
}

require_once("home.php");