<?php require_once 'includes/redirect.php'  ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
 <!--Contenido principal-->
    <div id="main-content">
            <h1>Crear Categorias</h1><br>
            <p>
                Añade nuevas categorias al blog para que los usuarios puedan
                crear sus entradas
            </p><br>
            <!--Mostrar errores-->
            <?php if (isset($_SESSION['completado'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['categoria'])) :?>
                <div class="alerta alerta-error">
                <?=$_SESSION['errores']['categoria']?>
                </div>
            <?php endif;?>   
            <form action="createcat.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <input type="submit" value="Crear">
            </form>
        <?php borrarErrores();?>
    </div>
    <!---fin principal--->       
<?php require_once 'includes/footer.php';?>