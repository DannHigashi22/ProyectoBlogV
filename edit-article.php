<?php require_once 'includes/redirect.php'  ?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
<?php $entradaAc=getEntradaById($db,$_GET['id'])?>    
    <!--Contenido principal-->
    <div id="main-content">
    <h1>Editar entrada </h1><br>
            <p>
                Edita tu entrada: "<?=$entradaAc['titulo']?>"
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

            <form action="createart.php?editar=<?=$entradaAc['id']?>" method="POST">
                <label for="nombre">Titulo</label>
                <input type="text" name="titulo" value="<?=$entradaAc['titulo']?>">
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'titulo') :'' ?>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion"cols="66" rows="10"><?=$entradaAc['descripcion']?></textarea>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'descripcion') :'' ?>

                <label for="categoria">Categoria</label>
                <select name="categoria">
                <?php $categorias=getCategorias($db);
                    if (!empty($categorias)):
                        while($categoria=mysqli_fetch_assoc($categorias)):?>
                    <option value="<?=$categoria['id']?>" 
                    <?=($categoria['id']==$entradaAc['categoria_id'])?'selected="selected"':''?>>
                    <?=$categoria['nombre']?>
                    </option>
                    <?php 
                        endwhile; 
                    endif;?>
                </select>
                <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'],'categoria') :'' ?>

                <input type="submit" value="Actualizar Entrada">
            </form>
        <?php borrarErrores();?>
    
    </div><!---fin principal--->

<?php require_once 'includes/footer.php';?>