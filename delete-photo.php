<?php
require_once "src/Helpers/HttpParams.php";
require_once "src/PhotoRepository.php";

$id = HttpParams::get('id');

if (!$id) {
    header("Location:index.php");
}

echo "Eliminando Fotografía... Espere unos segundos";

$photo = findPhotoById($id);
unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $photo['img_url']);
deletePhoto($id);

header("Location:index.php");