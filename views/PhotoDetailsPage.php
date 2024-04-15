<?php
$scopedStyle = "public\css\photo-details.css";
require_once ($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<div class="wrapper">
    <div class="photo">
        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>" class="photo__img">

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
            <a href="index.php">Regresar</a>
            <a href="edit-photo.php?id=<?php echo $id ?>" class="button">
                <i class="fa fa-pencil-square-o"></i>
                Actualizar
            </a>
        </div>
    </div>
</div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>