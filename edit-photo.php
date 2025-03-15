<?php
require_once "src/utils.php";
require_once "src/middlewares.php";
require_once "src/PhotoRepository.php";

privatePageMiddleware();

$id = getHttpParam('id');
$photo = [];

if (!$id) {
    header("Location:index.php");
}

$photo = findPhotoById($id);

if ($id && empty($photo)) {
    header("Location:index.php");
}

Router::renderPage([
    "page" => "UpdatePhotoPage",
    "layout" => "AppLayout",
    "customeStyle" => "edit-photo",
    "scopedScript" => "preview-image",
    "data" => [
        "photo" => $photo,
        "id" => $id
    ]
]);