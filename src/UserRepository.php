<?php

require_once("src/DbConnection.php");

function getUserById($id)
{
    $conn = getDbConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute([":id" => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}