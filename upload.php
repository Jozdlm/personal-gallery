<?php
require_once("src/PhotoRepository.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $isImg = getimagesize($_FILES['photo']['tmp_name']);

    if ($isImg && isset($_POST['title']) && isset($_POST['description'])) {
        $uploadedFiles = 'uploaded/';
        $imgUploaded = $uploadedFiles . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $imgUploaded);

        insertNewPhoto($_POST['title'], $_POST['description'], $imgUploaded);

        header('Location:index.php');
    }
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
            <h1 class="titulo">Subir foto</h1>
        </div>
    </header>

    <div class="contenedor">
        <form class="formulario" method="POST" enctype="multipart/form-data"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <label for="foto">Selecciona tu foto</label>
            <input type="file" id="foto" name="photo">

            <label for="titulo">Titulo de la foto</label>
            <input type="text" id="titulo" name="title">

            <label for="descripcion">Descripcion</label>
            <textarea name="description" id="descripcion" placeholder="Ingresa una descripcion"></textarea>

            <div class="form-buttons">
                <a href="index.php">Cancelar</a>
                <input type="submit" class="submit" value="Subir foto">
            </div>
        </form>
    </div>

    <footer>
        <p class="copyright">Galeria creada por Jozuan Martínez - 2023</p>
    </footer>
</body>

</html>