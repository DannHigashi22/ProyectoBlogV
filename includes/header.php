<?php
require_once 'conexion.php';
require_once 'includes/helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog De Videojuegos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <!--Cabecera-->
    <header id="header">
        <!-- logo-->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!--Menu-->
        <nav id="nav">
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php $categorias=getCategorias($db); 
                  if($categorias !== false):       ?>
                <?php while ($categoria=mysqli_fetch_assoc($categorias)):?>
                    <li><a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a></li>
                <?php
                        endwhile;
                    endif;  
                ?>
            <li><a href="index.php">Sobre Mi</a></li>
            <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="container">
        