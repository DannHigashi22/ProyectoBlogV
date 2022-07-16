<?php require_once 'includes/redirect.php'  ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
 <!--Contenido principal-->
    <div id="main-content">
        <h1>Mis Datos Personales</h1><br>
        <!--Mostrar errores-->
        <?php if (isset($_SESSION['completado'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
                </div>
        <?php elseif(isset($_SESSION['errores']['update'])) :?>
                <div class="alerta alerta-error">
                <?=$_SESSION['errores']['update']?>
                </div>
        <?php endif;?>   
        <form action="update-user.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'nombre') :'' ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'apellidos') :'' ?>

            <label for="email">Email</label>
            <input type="email" name="email" value="<?=$_SESSION['usuario']['email']?>">
            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'email') :'' ?>

            <input type="submit"  name='submit' value="Actualizar">
        </form>
        <?php borrarErrores();?>
    </div>
    <!---fin principal--->       
<?php require_once 'includes/footer.php';?>