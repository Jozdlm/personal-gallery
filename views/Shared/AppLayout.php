<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Instant</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/topbar-component.css">

    <!-- Custom Style Files -->
    <?php if (isset($scopedStyle) && trim($scopedStyle) != ''): ?>
        <link rel="stylesheet" href="public\css\<?php echo $scopedStyle ?>.css">
    <?php endif; ?>
</head>

<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/views/$page.php";
    ?>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>

    <!-- Scoped script file for the page -->
    <?php if (isset($scopedScript) && trim($scopedScript) != ''): ?>
        <script src="public/scripts/<?php echo $scopedScript ?>.js"></script>
    <?php endif; ?>
</body>

</html>