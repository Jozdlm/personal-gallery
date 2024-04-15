<?php require_once $componentsFolder . "/TopbarComponent.php"; ?>

<div class="wrapper">
    <h3>Mi Perfil</h1>
        <form method="POST" class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            autocomplete="off">
            <label class="form-label" for="username">Usuario:</label>
            <input type="text" id="username" name="username" class="form-field"
                value="<?php echo $clientSession['username'] ?>">

            <div class="form__actions">
                <input type="submit" class="button" value="Actualizar">
            </div>
        </form>
</div>