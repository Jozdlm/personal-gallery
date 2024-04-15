<?php
require_once "src/UserRepository.php";

function checkIfUserExist($userEmail): bool
{
    $user = getUserByEmail($userEmail);
    return ($user) ? true : false;
}

function createClientSession($id, $username, $email): void
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

function getClientSession(): array|null
{
    return $_SESSION["user"] ?? null;
}

function destroyClientSession(): void
{
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
        header("Location:login.php");
    }
}