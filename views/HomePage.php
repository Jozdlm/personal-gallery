<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php') ?>

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

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>