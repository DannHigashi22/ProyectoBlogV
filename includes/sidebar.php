<!--Barra Lateral-->
    <aside id="sidebar">
        <?php if (isset($_SESSION['usuario'])):?>
        <div id="user-login" class="block-aside">
            <h3>Bienvenido <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'] ?></h3>
            <a class="button button-green" href="">Crear Entradas</a>
            <a class="button " href="">Crear categoria</a>
            <a class="button button-orange" href="">Mis Datos</a>
            <a class="button button-red" href="logout.php">Cerrar Sesion</a>
        </div>
        <?php else :?>
        <div id="login" class="block-aside">
            <h3>Identificate</h3>
                <!--Mostrar errores-->
            <?php if (isset($_SESSION['error-login'])) :?>
                <div class="alerta alerta-error">
                <?=$_SESSION['error-login']?>
                </div>
            <?php endif;?>
            <form action="Login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Entrar">
            </form>
              
        </div>
        
        <div id="register" class="block-aside">
            <h3>Registrate</h3>
            <!--Mostrar errores-->
            <?php if (isset($_SESSION['completado'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif;?>   
            <form action="register.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'nombre') :'' ?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'apellidos') :'' ?>

                <label for="email">Email</label>
                <input type="email" name="email">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'email') :'' ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'password') :'' ?>

                <input type="submit"  name='submit' value="Entrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <?php endif;?>
    </aside>