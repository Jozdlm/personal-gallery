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
</head>

<body>
    <header>
        <div class="contenedor">
            <h1 class="photo-title">
                <?php if (!empty($photo['title'])) {
                    echo $photo['title'];
                } ?>
            </h1>
        </div>
    </header>
    
    <div class="contenedor">
        <div class="foto">
            <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
            <p class="texto">
                <?php if (!empty($photo['description'])) {
                    echo $photo['description'];
                } ?>
            </p>
            <div class="photo-footer">
                <a href="index.php" class="back-button"><i class="fa fa-long-arrow-left"></i>Regresar</a>
                <a href="edit-photo.php?id=<?php echo $id ?>" class="back-button"><i class="fa fa-pencil-square-o"></i>Actualizar</a>
            </div>
        </div>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>
</body>

</html>