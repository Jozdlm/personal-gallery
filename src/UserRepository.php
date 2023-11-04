<?php

require_once("src/DbConnection.php");

function createUser($user): bool
{
    if (!$user["username"]) return false;
    if (!$user["email"]) return false;
    if (!$user["password"]) return false;

    $conn = getDbConnection();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");

    return $stmt->execute([
        ":username" => $user["username"],
        ":email" => $user["email"],
        ":password" => $user["password"],
    ]);
}

function getUserByEmail($email)
{
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([":email" => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}