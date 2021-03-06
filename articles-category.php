<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php'; ?>
<?php $categoriaAc=getCategoriaById($db,$_GET['id']);
    if (isset($categoriaAc['id'])) :
?>    
        <!--Contenido principal-->
        <div id="main-content">
            <h1>Todas las entradas de "<?=$categoriaAc['nombre']?>"</h1>
            <?php $entradasCat=getEntradas($db,null,$categoriaAc['id']);
                if(!empty($entradasCat) && mysqli_num_rows($entradasCat)>=1 ):?>
                <?php While($entrada=mysqli_fetch_assoc($entradasCat)):?>

                    <article class="art-recents">
                        <a href="article.php?id=<?=$entrada['id']?>">
                            <h2><?=$entrada['titulo']?></h2>
                            <p><?= substr($entrada['descripcion'],0,200)." ..."?> </p>
                            <span class="date"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                        </a>
                    </article>
            <?php 
                    endwhile;

                else:?>
                <div class="">
                <h2>Categoria sin entradas</h2>
                <strong>Que esperas para crear la tuya </strong>
                </div>
            <?php
                endif;?>
        </div><!---fin principal--->
<?php elseif (!isset($categoriaAc['id'])) :?>
<?php require_once 'includes/404.php';?>
<?php endif;?>
<?php require_once 'includes/footer.php';?>