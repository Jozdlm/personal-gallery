<?php
require_once "src/config.php";
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
        $photo = Photo::find($id);

        if ($photo) {
            $photo->update([
                'title' => $values['title'],
                'description' => $values['description'] ?? $photo->description,
                'img_url' => $values['imgUrl'] ?? $photo->img_url,
            ]);
        }
    }
}

function deletePhoto(int $id, array $photo): void
{
    if ($id > 0) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $photo['img_url']);
        Photo::destroy($id);
    }
}