<?php require_once $componentsFolder . "/TopbarComponent.php"; ?>

<div class="wrapper">
    <?php if (count($photos) > 0): ?>
        <div class="photos-grid">
            <?php foreach ($photos as $photo): ?>
                <div class="thumb">
                    <a href="photo.php?id=<?php echo $photo['id'] ?>">
                        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center empty-photo-msg">
            <p>Parece que no has subido ninguna fotografía aún, prueba subir tu primer foto.</p>
            <a href="upload.php">Subir foto</a>
        </div>
    <?php endif; ?>

    <div class="pagination">
        <?php if ($currentPage > 1): ?>
            <a href="index.php?p=<?php echo $currentPage - 1 ?>" class="pagination__button"><i
                    class="fa fa-long-arrow-left"></i> Pagina Anterior</a>
        <?php endif; ?>

        <?php if ($currentPage != $pagesCount && $photosCount > $photosPerPage): ?>
            <a href="index.php?p=<?php echo $currentPage + 1 ?>" class="pagination__button">Pagina Siguiente <i
                    class="fa fa-long-arrow-right"></i></a>
        <?php endif; ?>
    </div>
</div>