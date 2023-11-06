<?php
$scopedStyle = "public\css\photo-details.css";
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<div class="wrapper">
    <div class="photo">
        <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>" class="photo__img">

        <div class="photo__body">
            <h1 class="photo__title">
                <?php if (!empty($photo['title'])) {
                    echo $photo['title'];
                } ?>
            </h1>
            <p>
                <?php if (!empty($photo['description'])) {
                    echo $photo['description'];
                } ?>
            </p>
        </div>

        <div class="photo__footer">
            <a href="index.php">Regresar</a>
            <a href="edit-photo.php?id=<?php echo $id ?>" class="button"><i
                    class="fa fa-pencil-square-o"></i>Actualizar</a>
        </div>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>