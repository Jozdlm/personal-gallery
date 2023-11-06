<?php
$scopedStyle = "public/css/error-page.css";
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>


<div class="wrapper">
    <header class="error__body">
        <h1 class="error__title">ERROR</h1>
        <p>Hemos tenido un error al intentar realizar la operación</p>
    </header>
    
    <div class="error__actions">
        <a href="index.php" class="button"><i class="fa fa-long-arrow-left"></i>Página de Inicio</a>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>