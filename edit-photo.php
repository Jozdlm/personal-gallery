<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location:login.php");
}

require_once("src/PhotoRepository.php");

$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
$photo = [];

if (!$id) {
    header("Location:index.php");
}

$photo = findPhotoById($id);

if ($id && empty($photo)) {
    header("Location:index.php");
}

require_once("views/UpdatePhotoPage.php");