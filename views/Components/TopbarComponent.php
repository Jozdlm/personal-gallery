<header>
    <div class="wrapper">
        <div class="header">
            <div class="header__message">
                <h2>
                    <a href="index.php">Mis fotos</a>
                </h2>
                <p>Hola de nuevo <?php echo $_SESSION['user']['username'] ?> :)</p>
            </div>
            <div class="header-actions">
                <a href="upload.php" class="header__button"><i class="fa fa-upload"></i>Subir Foto</a>
                <a href="account.php" class="header__button"><i class="fa fa-user"></i>Mi Perfil</a>
                <a href="logout.php" class="header__button"><i class="fa fa-sign-out"></i>Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>