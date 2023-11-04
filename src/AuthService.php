<?php

require_once("src/UserRepository.php");

function checkIfUserExist($userEmail)
{
    $user = getUserByEmail($userEmail);
    return ($user) ? true : false;
}

function createClientSession($id, $username, $email)
{
    if (!$username)
        return;
    session_start();

    $_SESSION["user"] = [
        "id" => $id,
        "username" => $username,
        "email" => $email,
    ];

    header("Location: home.php");
}

function destroyClientSession()
{
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
        header("Location:login.php");
    }
}