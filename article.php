<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
<?php $entradaAc=getEntradaById($db,$_GET['id']);
    if (isset($entradaAc['id'])) :
?>    
        <!--Contenido principal-->
        <div id="main-content">
            <!--Mostrar alertas-->
            <?php if (isset($_SESSION['completado'])) :?>
                <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['entradas'])) :?>
                <div class="alerta alerta-error">
                <?=$_SESSION['errores']['entradas']?>
                </div>
            <?php endif;?>   
            <h1><?=$entradaAc['titulo']?></h1>
            <a href="articles-category.php?id=<?=$entradaAc['categoria_id']?>">
            <h2><?=$entradaAc['categoria']?></h2>
            </a>
            <h4><?=$entradaAc['fecha']?> | <?=$entradaAc['usuario']?></h4>
            <p><?=$entradaAc['descripcion']?></p>
            <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id']==$entradaAc['usuario_id']):?>
                <br>
                <a class="button button-green" href="edit-article.php?id=<?=$entradaAc['id']?>">Editar entrada</a>
                <a class="button " href="deleteart.php?id=<?=$entradaAc['id']?>">Borrar entrada</a>
            <?php endif;?>
        </div><!---fin principal--->
        <?php borrarErrores();?>
<?php elseif (!isset($categoriaAc['id'])) :?>
<?php require_once 'includes/404.php';?>
<?php endif;?>
<?php require_once 'includes/footer.php';?>