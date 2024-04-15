<?php require_once $componentsFolder . "/TopbarComponent.php"; ?>

<div class="wrapper">
    <h3>Mi Perfil</h3>
    <form method="POST" class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
        autocomplete="off">
        <input type="text" id="id" name="id" class="form-field" value="<?php echo $clientSession['id'] ?>" hidden>

        <div>
            <label class="form-label" for="username">Usuario:</label>
            <input type="text" id="username" name="username" class="form-field"
                value="<?php echo $clientSession['username'] ?>">
        </div>

        <div>
            <label class="form-label" for="email">Usuario:</label>
            <input type="text" id="email" name="email" class="form-field" value="<?php echo $clientSession['email'] ?>">
        </div>

        <div class="form__actions">
            <input type="submit" class="button" value="Actualizar">
        </div>
    </form>
</div>