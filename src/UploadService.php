<?php

function uploadPhoto(): string
{
    $uploadedFolder = 'uploaded/';
    $imgUrl = $uploadedFolder . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $imgUrl);

    return $imgUrl;
}