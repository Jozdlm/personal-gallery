<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<div class="wrapper">
    <h1 class="text-center">Registrarse</h1>
    <form method="POST" class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
        autocomplete="off">
        <label class="form-label" for="username">Usuario:</label>
        <input type="text" id="username" name="username" class="form-field">

        <label class="form-label" for="email">Correo:</label>
        <input type="email" id="email" name="email" class="form-field">

        <label class="form-label" for="password">Contraseña:</label>
        <input type="password" name="password" id="password" class="form-field">

        <div class="form__actions">
            <input type="submit" class="button" value="Crear Cuenta">
        </div>
    </form>

    <?php if (trim($message) != '') { ?>
        <p class="error-message">
            <?php echo $message ?>
        </p>
    <?php } ?>

    <p class="text-center">
        ¿Ya tienes cuenta?
        <a href="login.php">Iniciar Sesión</a>
    </p>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>