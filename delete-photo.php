<?php
require_once "src/PhotoRepository.php";
require_once "src/utils.php";

$id = getHttpParam('id');

if (!$id) {
    header("Location:index.php");
}

echo "Eliminando Fotografía... Espere unos segundos";

$photo = findPhotoById($id);
deletePhoto($id, $photo);

header("Location:index.php");