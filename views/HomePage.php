<?php
$scopedStyle = "public\css\home.css";
require_once ($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<header>
    <div class="wrapper">
        <div class="header">
            <div class="header__message">
                <h1>Mis fotos</h1>
                <p>Hola de nuevo <?php echo $_SESSION['user']['username'] ?> :)</h1>
            </div>
            <div class="header-actions">
                <a href="upload.php" class="header__button"><i class="fa fa-upload"></i>Subir Foto</a>
                <a href="logout.php" class="header__button"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>

<div class="wrapper">
    <div class="photos-grid">
        <?php foreach ($photos as $photo): ?>
            <div class="thumb">
                <a href="photo.php?id=<?php echo $photo['id'] ?>">
                    <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>

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

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>