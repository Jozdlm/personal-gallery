<?php

require_once("src/PhotoRepository.php");
require_once("src/UploadService.php");

$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
$photo = [];

if (!$id) {
    header("Location:index.php");
}

// Runs when it sends a POST request and before we get the photo details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $isAnImage = getimagesize($_FILES['photo']['tmp_name']);

    if ($isAnImage && isset($_POST['title']) && isset($_POST['description'])) {
        $imgUrl = uploadPhoto();

        $newValues = ['title' => $_POST['title'], 'description' => $_POST['description'], 'imgUrl' => $imgUrl];
        updatePhoto($id, $newValues);

        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $_POST['old_img']);
    }
}

$photo = findPhotoById($id);

if ($id && empty($photo)) {
    header("Location:index.php");
}

require_once("views/PhotoDetailsPage.php");