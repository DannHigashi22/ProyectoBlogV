<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';

    $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']): false;
    $descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']): false;
    $categoriaId=isset($_POST['categoria']) ? (int)$_POST['categoria']: false;
    $usuario=$_SESSION['usuario']['id'];
    //array con errores
    $errores=array();

    //validacion de datos
    if (!empty($titulo)) {
        $titulo_validate=true;
    }else{
        $titulo_validate=false;
        $errores['titulo']='El titulo no valido';
    }
    
    if (!empty($descripcion)) {
        $descrip_validate=true;
    }else{
        $descrip_validate=false;
        $errores['descripcion']='La descripcion no es valida';
    }
    if (!empty($categoriaId) && is_numeric($categoriaId)) {
        $descrip_validate=true;
    }else{
        $descrip_validate=false;
        $errores['categoria']='La Categoria no es valida';
    }
    
    if (count($errores)==0) {
        if (isset($_GET['editar'])) {
            $entrada_id=$_GET['editar'];
            $sql="update entradas SET categoria_id=$categoriaId,titulo='$titulo',descripcion='$descripcion'
            where id=$entrada_id AND usuario_id=$usuario";
        }else {
            $sql ="INSERT INTO entradas VALUES (null,$usuario,$categoriaId,'$titulo','$descripcion',curdate());";
        }

        $save=mysqli_query($db,$sql);

        if ($save) {
            if (isset($_GET['editar'])) {
                $_SESSION['completado']='La entrada se a actualizado con exito';}
            else{
            $_SESSION['completado']='La entrada se a registrado con exito';}   
        }else{
            if (isset($_GET['editar'])) {
                $_SESSION['errores']['entradas']='Fallo al Actualizar la entrada';}
            else {
                $_SESSION['errores']['entradas']='Fallo al registrar la entrada';}
        }

        if (isset($_GET['editar'])) {
            header("location:article.php?id=".$_GET['editar']);
        }else{
            header('location:create-art.php');
        }
    }else{ 
        $_SESSION['errores']=$errores;
        if (isset($_GET['editar'])) {
            header("location:edit-article.php?id=".$_GET['editar']);
        }else{
            header('location:create-art.php');
        }
        
    }

}
?>