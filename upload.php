<?php
require_once("src/AuthGuard.php");
isLoggedGuard();

require_once("src/PhotoRepository.php");
require_once("src/UploadService.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $isAnImage = getimagesize($_FILES['photo']['tmp_name']);

    if ($isAnImage && isset($_POST['title']) && isset($_POST['description'])) {
        $imgUrl = uploadPhoto();
        insertNewPhoto($_POST['title'], $_POST['description'], $imgUrl, (int)$_POST['user_id']);

        header('Location:index.php');
    }
}

require_once('views/UploadPage.php');