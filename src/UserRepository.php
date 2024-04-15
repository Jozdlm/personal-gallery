<?php
require_once "src/DbConnection.php";

function createUser(array $user): bool
{
    if (!$user["username"])
        return false;
    if (!$user["email"])
        return false;
    if (!$user["password"])
        return false;

    $conn = getDbConnection();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");

    return $stmt->execute([
        ":username" => $user["username"],
        ":email" => $user["email"],
        ":password" => $user["password"],
    ]);
}

function updateUser(int $id, array $newValues): void
{
    if (count($newValues) > 0) {
        $conn = getDbConnection();
        $stm = $conn->prepare('UPDATE users SET username = :username, email = :email WHERE id = :id');
        $stm->execute([
            ':id' => $id,
            ':username' => $newValues['username'],
            ':email' => $newValues['email'],
        ]);
    }
}

function getUserByEmail(string $email)
{
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([":email" => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}