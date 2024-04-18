<?php
require_once "src/DbConnection.php";

function findPhotos(int $start, int $end): array
{
    $conn = getDbConnection();
    $stm = $conn->prepare("SELECT * FROM photos LIMIT $start, $end");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function findPhotosByUser(int $start, int $end, int $userId): array
{
    $conn = getDbConnection();
    $stm = $conn->prepare("SELECT * FROM photos WHERE user_id = :id LIMIT $start, $end");
    $stm->execute([
        ":id" => $userId,
    ]);

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

function insertNewPhoto(string $title, string $description, string $imgUrl, string $date, int $userId): void
{
    $conn = getDbConnection();
    $stm = $conn->prepare('INSERT INTO photos (title, description, img_url, user_id, upload_date) VALUES (:title, :description, :img_url, :user_id, :upload_date)');
    $stm->execute([
        ':title' => $title,
        ':description' => $description,
        ':img_url' => $imgUrl,
        ':user_id' => $userId,
        ':upload_date' => $date
    ]);
}

function updatePhoto(int $id, array $values): void
{
    if (count($values) > 0 && $values['title']) {
        $conn = getDbConnection();
        $stm = $conn->prepare('UPDATE photos SET title = :title, description = :description, img_url = :img_url WHERE id = :id');
        $stm->execute([
            ':id' => $id,
            ':title' => $values['title'],
            ':description' => $values['description'],
            ':img_url' => $values['imgUrl'],
        ]);
    }
}

function deletePhoto(int $id): void
{
    if ($id > 0) {
        $conn = getDbConnection();
        $stm = $conn->prepare('DELETE FROM photos WHERE id = :id');
        $stm->execute([
            ':id' => $id,
        ]);
    }
}