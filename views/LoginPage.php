<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Head.php');
?>

<div class="contenedor login">
    <h1 class="login-title">Login</h1>
    
    <form method="POST" class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" autocomplete="off">
        <label for="email">Correo:</label>
        <input type="text" id="email" name="email">
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        
        <div class="login-cta">
            <input type="submit" class="submit" value="Iniciar Sesión">
        </div>
    </form>

    <?php if (trim($message) != '') { ?>
        <p class="login-msg">
            <?php echo $message ?>
        </p>
    <?php } ?>
    
    <p class="text-center">
        ¿No tienes cuenta?
        <a href="register.php">Crear cuenta</a>
    </p>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/Shared/Footer.php') ?>