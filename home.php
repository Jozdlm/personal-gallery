<?php
require_once "src/Helpers/HttpParams.php";
require_once "src/Helpers/Router.php";
require_once "src/AuthGuard.php";
require_once "src/PhotoRepository.php";

isLoggedGuard();

$photos = [];
$photosPerPage = 8;
$photosCount = 0;
$pagesCount = 0;

$currentPage = (int) HttpParams::get('p') ?? 1;
$startItems = ($currentPage > 1) ? $currentPage * $photosPerPage - $photosPerPage : 0;

$photos = findPhotosByUser($startItems, $photosPerPage, (int) $_SESSION['user']['id']);

$photosCount = count($photos);
$pages = ceil($photosCount / $photosPerPage);

if ($photosCount == 0 && $currentPage > 1) {
    header('Location:index.php');
}

Router::renderPage([
    "page" => "HomePage",
    "layout" => "AppLayout",
    "customStyle" => "home",
    "data" => [
        "photos" => $photos,
        "currentPage" => $currentPage,
        "pagesCount" => $pagesCount,
        "photosCount" => $photosCount,
        "photosPerPage" => $photosPerPage
    ]
]);