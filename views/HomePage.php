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
            <div class="header-wrapper">
                <h1 class="header-title">Hola, aquí están tus fotos!</h1>
                <a href="upload.php" class="header-cta"><i class="fa fa-upload"></i>Subir Foto</a>
            </div>
        </div>
    </header>

    <div class="contenedor">
        <div class="photos-grid">
            <?php foreach ($photos as $photo) { ?>
                <div class="thumb">
                    <a href="photo.php?id=<?php echo $photo['id'] ?>">
                        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="pagination">
            <?php if ($currentPage > 1) { ?>
                <a href="index.php?p=<?php echo $currentPage - 1 ?>" class="pagination-button"><i
                        class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
            <?php } ?>

            <?php if ($currentPage != $pagesCount && $photosCount > $photosPerPage) { ?>
                <a href="index.php?p=<?php echo $currentPage + 1 ?>" class="pagination-button">Pagina Siguiente <i
                        class="fa fa-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>
</body>

</html>