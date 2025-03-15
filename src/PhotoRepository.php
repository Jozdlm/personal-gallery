<?php
require_once "src/DbConnection.php";
require_once "src/Photo.php";

function findPhotosByUser(int $start, int $end, int $userId): array
{
    $photos = Photo::where('user_id', $userId)->skip($start)->take($end)->get();
    return $photos->toArray();
}

function findPhotoById(int $id): array
{
    $photo = Photo::find($id);
    return $photo?->toArray() ?? [];
}
function insertNewPhoto(array $data): void
{
    if (isset($data)) {
        Photo::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'img_url' => $data['img_url'],
            'user_id' => $data['user_id'],
            'upload_date' => $data['upload_date']
        ]);
    }
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
        Photo::destroy($id);
    }
}