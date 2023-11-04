<?php

if (session_start() == PHP_SESSION_NONE) {
    header("Location: login.php");
}

require_once("src/AuthService.php");

destroyClientSession();