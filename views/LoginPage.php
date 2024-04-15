<div class="wrapper">
    <h1 class="text-center">Login</h1>

    <form method="POST" class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
        autocomplete="off">
        <label class="form-label" for="email">Correo:</label>
        <input type="text" id="email" name="email" class="form-field">

        <label class="form-label" for="password">Contraseña:</label>
        <input type="password" name="password" id="password" class="form-field">

        <div class="form__actions">
            <input type="submit" class="button" value="Iniciar Sesión">
        </div>
    </form>

    <?php if (isset($data) && trim($data) != ''): ?>
        <p class="error-message">
            <?php echo $data ?>
        </p>
    <?php endif; ?>

    <p class="text-center">
        ¿No tienes cuenta?
        <a href="register.php">Crear cuenta</a>
    </p>
</div>