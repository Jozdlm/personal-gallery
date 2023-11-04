<?php

require_once("src/DbConnection.php");

function getUserByEmail($email)
{
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([":email" => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}