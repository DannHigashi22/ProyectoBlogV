<?php require_once 'includes/redirect.php'  ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
 <!--Contenido principal-->
    <div id="main-content">
            <h1>Crear Entradas</h1><br>
            <p>
                Añade nuevas entradas al blog para que los usuarios pueda las 
                novedades sobre tus juegos favoritos y su contenido.
            </p><br>
            <!--Mostrar errores-->
            <?php if (isset($_SESSION['completado'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['entradas'])) :?>
                <div class="alerta alerta-error">
                <?=$_SESSION['errores']['entradas']?>
                </div>
            <?php endif;?>   

            <form action="createart.php" method="POST">
                <label for="nombre">Titulo</label>
                <input type="text" name="titulo">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'titulo') :'' ?>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion"cols="66" rows="10"></textarea>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'descripcion') :'' ?>

                <label for="categoria">Categoria</label>
                <select name="categoria">
                <?php $categorias=getCategorias($db);
                    if (!empty($categorias)):
                        while($categoria=mysqli_fetch_assoc($categorias)):?>
                    <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                    <?php 
                        endwhile; 
                    endif;?>
                </select>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'categoria') :'' ?>

                <input type="submit" value="Crear Entrada">
            </form>
        <?php borrarErrores();?>
    </div>
    <!---fin principal--->       
<?php require_once 'includes/footer.php';?>