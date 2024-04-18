<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthGuard.php";
require_once "src/PhotoRepository.php";
require_once "src/UploadService.php";

isLoggedGuard();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $isAnImage = getimagesize($_FILES['photo']['tmp_name']);

    if ($isAnImage && isset($_POST['title']) && isset($_POST['description'])) {
        $imgUrl = uploadPhoto();
        insertNewPhoto($_POST['title'], $_POST['description'], $imgUrl, $_POST['upload_date'], (int) $_POST['user_id']);

        header('Location:index.php');
    }
}

Router::renderPage([
    "page" => "UploadPage",
    "layout" => "AppLayout",
    "scopedScript" => "preview-image"
]);