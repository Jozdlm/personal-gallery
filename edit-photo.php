<?php
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Mi Increíble Galería en PHP</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/edit-photo.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Editar foto #
                <?php echo $photo['id'] ?>
            </h1>
        </div>
    </header>

    <div class="contenedor">
        <form class="formulario" method="POST" enctype="multipart/form-data"
            action="<?php echo htmlspecialchars("photo.php?id=$id") ?>">

            <input type="text" name="id" value="<?php echo $photo['id'] ?>" hidden>
            <input type="text" name="old_img" value="<?php echo $photo['img_url'] ?>" hidden>

            <label for="foto">Selecciona tu foto</label>
            <input type="file" id="image" name="photo">

            <label for="titulo">Imágen actual</label>
            <div class="preview-wrapper">
                <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>" id="image-preview"
                    class="image-preview">
            </div>

            <label for="titulo">Titulo de la foto</label>
            <input type="text" id="titulo" name="title" value="<?php echo $photo['title'] ?>">

            <label for="descripcion">Descripcion</label>
            <textarea name="description" id="descripcion"
                placeholder="Ingresa una descripcion"><?php echo $photo['description'] ?></textarea>

            <div class="form-buttons">
                <a href="index.php">Cancelar</a>
                <input type="submit" class="submit" value="Guardar Cambios">
            </div>
        </form>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>

    <script src="public/scripts/preview-image.js"></script>
</body>

</html>