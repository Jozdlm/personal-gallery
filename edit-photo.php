<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthGuard.php";
require_once "src/PhotoRepository.php";
require_once "src/utils.php";

isLoggedGuard();

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