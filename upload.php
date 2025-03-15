<?php
require_once "src/utils.php";
require_once "src/AuthGuard.php";
require_once "src/PhotoRepository.php";
require_once "src/UploadService.php";

isLoggedGuard();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $isAnImage = getimagesize($_FILES['photo']['tmp_name']);

    if ($isAnImage && isset($_POST['title']) && isset($_POST['description'])) {
        $imgUrl = uploadPhoto();
        insertNewPhoto([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'img_url' => $imgUrl,
            'user_id' => (int) $_POST['user_id'],
            'upload_date' => $_POST['upload_date']
        ]);
        header('Location:index.php');
    }
}

Router::renderPage([
    "page" => "UploadPage",
    "layout" => "AppLayout",
    "scopedScript" => "preview-image"
]);