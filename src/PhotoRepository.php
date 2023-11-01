<?php

require_once("src/DbConnection.php");

function findPhotos(int $start, int $end): array
{
    $conn = getDbConnection();
    $stm = $conn->prepare("SELECT * FROM photos LIMIT $start, $end");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function findPhotoById(int $id): array
{
    $conn = getDbConnection();
    $stm = $conn->prepare("SELECT * FROM photos WHERE id = :id");
    $stm->execute([
        ':id' => $id
    ]);

    return $stm->fetch(PDO::FETCH_ASSOC);
}