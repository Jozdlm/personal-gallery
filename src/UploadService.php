<?php

function uploadPhoto(): string
{
    $uploadedPath = 'uploaded/';
    $userId = $_SESSION['user']['id'];
    $uniqueTimeStamp = uniqid();
    [, $fileExtension] = explode("/", $_FILES['photo']['type']);

    $imgUrl = "{$uploadedPath}user_{$userId}_{$uniqueTimeStamp}.{$fileExtension}";
    move_uploaded_file($_FILES['photo']['tmp_name'], $imgUrl);

    return $imgUrl;
}