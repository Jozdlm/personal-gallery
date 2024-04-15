<?php
require_once "src/Helpers/Router.php";
require_once "src/Helpers/HttpParams.php";
require_once "src/AuthGuard.php";
require_once "src/PhotoRepository.php";
require_once "src/UploadService.php";

isLoggedGuard();

$id = HttpParams::get("id");
$photo = [];

if (!$id) {
    header("Location:index.php");
}

// Runs when it sends a POST request and before we get the photo details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $newValues = [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];

    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name']) && isset($_POST['title'])) {
        $imgUrl = uploadPhoto();
        $newValues['imgUrl'] = $imgUrl;

        updatePhoto($id, $newValues);

        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $_POST['old_img']);
    } else {
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $newValues['imgUrl'] = $_POST['old_img'];
            updatePhoto($id, $newValues);
        }
    }
}

$photo = findPhotoById($id);

if ($id && empty($photo)) {
    header("Location:index.php");
}

Router::renderPage([
    "page" => "PhotoDetailsPage",
    "layout" => "AppLayout",
    "customStyle" => "photo-details",
    "data" => [
        "id" => $id,
        "photo" => $photo
    ]
]);