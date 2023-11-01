<?php

require_once 'vendor/autoload.php';

// Loads the enviroment variables
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();