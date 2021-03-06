<?php require_once 'includes/header.php';?>
        <?php require_once 'includes/sidebar.php'; ?>
        
        <!--Contenido principal-->
        <div id="main-content">
            <h1>Todas las Entradas</h1>
            <?php $entradasLatest=getEntradas($db);
                if($entradasLatest !== false):?>
                <?php While($entrada=mysqli_fetch_assoc($entradasLatest)):?>
                    <article class="art-recents">
                        <a href="article.php?id=<?=$entrada['id']?>">
                            <h2><?=$entrada['titulo']?></h2>
                            <p><?= substr($entrada['descripcion'],0,200)." ..."?> </p>
                            <span class="date"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                        </a>
                    </article>
            <?php 
                    endwhile;
                endif;
            ?>
        </div><!---fin principal--->       
<?php require_once 'includes/footer.php';?>