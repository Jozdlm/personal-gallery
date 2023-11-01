<?php
require_once("src/PhotoRepository.php");

$photos = [];
$photosPerPage = 8;
$photosCount = 0;
$pagesCount = 0;

$currentPage = isset($_GET['p']) ? (int) $_GET['p'] : 1;
$startItems = ($currentPage > 1) ? $currentPage * $photosPerPage - $photosPerPage : 0;

$photos = findPhotos($startItems, $photosPerPage);

$photosCount = count($photos);
$pages = ceil($photosCount / $photosPerPage);

if ($photosCount == 0 && $currentPage > 1) {
    header('Location:index.php');
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
            <h1 class="titulo">Mi Increíble Galería en PHP y MySQL</h1>
        </div>
    </header>

    <div class="fotos">
        <div class="contenedor">
            <?php foreach ($photos as $photo) { ?>
                <div class="thumb">
                    <a href="photo.php?id=<?php echo $photo['id'] ?>">
                        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
                    </a>
                </div>
            <?php } ?>

            <div class="paginacion">
                <?php if ($currentPage > 1) { ?>
                    <a href="index.php?p=<?php echo $currentPage - 1 ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
                <?php } ?>

                <?php if ($currentPage != $pagesCount && $photosCount > $photosPerPage) { ?>
                    <a href="index.php?p=<?php echo $currentPage + 1 ?>" class="derecha">Pagina Siguiente <i class="fa fa-long-arrow-right"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>
</body>

</html>