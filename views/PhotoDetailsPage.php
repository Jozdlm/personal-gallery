<div class="wrapper">
    <div class="photo">
        <a href="index.php">Regresar</a>
        
        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>" class="photo__img">

        <div>
            <div class="photo__body">
                <?php if (!empty($photo['title'])): ?>
                    <h1 class="photo__title">
                        <?php echo $photo['title'] ?>
                    </h1>
                <?php endif ?>
                <?php if (!empty($photo['description'])): ?>
                    <p>
                        <?php echo $photo['description'] ?>
                    </p>
                <?php endif ?>
            </div>
            <div class="photo__footer">
                <a href="delete-photo.php?id=<?php echo $id ?>" class="button button-outlined">Eliminar</a>
                <a href="edit-photo.php?id=<?php echo $id ?>" class="button">
                    <i class="fa fa-pencil-square-o"></i>
                    Actualizar
                </a>
            </div>
        </div>

    </div>
</div>