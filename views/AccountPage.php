<header>
    <div class="wrapper">
        <div class="header">
            <div class="header__message">
                <h1>Mis fotos</h1>
                <p>Hola de nuevo <?php echo $_SESSION['user']['username'] ?> :)</h1>
            </div>
            <div class="header-actions">
                <a href="upload.php" class="header__button"><i class="fa fa-upload"></i>Subir Foto</a>
                <a href="account.php" class="header__button"><i class="fa fa-user"></i>Mi Perfil</a>
                <a href="logout.php" class="header__button"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>

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