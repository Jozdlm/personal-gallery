<?php
$scopedStyle = "public/css/edit-photo.css";
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

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

<script src="public/scripts/preview-image.js" defer></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>