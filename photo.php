<?php

require_once("src/DbConnection.php");

$conn = getDbConnection();
$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
$photo = [];

if (!$conn) {
    header("Location:error.php");
}

if (!$id) {
    header("Location:index.php");
}

$stm = $conn->prepare("SELECT * FROM photos WHERE id = :id");
$stm->execute([
    ':id' => $id
]);

$photo = $stm->fetch(PDO::FETCH_ASSOC);

if ($id && empty($photo)) {
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Mi Increíble Galería en PHP</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">
                <?php if (!empty($photo['title'])) {
                    echo $photo['title'];
                } ?>
            </h1>
        </div>
    </header>

    <div class="contenedor">
        <div class="foto">
            <img src="<?php echo $photo['img_url'] ?>" alt="<?php echo $photo['title'] ?>">
            <p class="texto">
                <?php if (!empty($photo['description'])) {
                    echo $photo['description'];
                } ?>
            </p>
            <a href="index.php"><i class="fa fa-long-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>
</body>

</html>