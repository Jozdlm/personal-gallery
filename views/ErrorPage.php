<?php
$scopedStyle = "public/css/error-page.css";
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<header>
    <div class="contenedor">
        <h1 class="titulo">ERROR</h1>
        <p>Hemos tenido un error al intentar realizar la operación</p>
    </div>
</header>

<div class="contenedor cta-wrapper">
    <a href="index.php" class="pagination-button error-cta"><i class="fa fa-long-arrow-left"></i>Página de Inicio</a>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>