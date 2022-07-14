<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';

    $titulo=isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']): false;
    $descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']): false;
    $categoriaId=isset($_POST['categoria']) ? (int)$_POST['categoria']: false;
    $usuario=$_SESSION['usuario']['id'];
    //array con errores
    $errores=array();

    //validacion de datos y escapar strings
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
        $sql ="INSERT INTO entradas VALUES (null,$usuario,$categoriaId,'$titulo','$descripcion',curdate());";
        $save=mysqli_query($db,$sql);

        if ($save) {
         $_SESSION['completado']='La Entrada se a registrado con exito con exito';   
        }else{
            $_SESSION['errores']['entradas']='Fallo al registrar la entrada';
        }
    }else{ 
        $_SESSION['errores']=$errores;   
    }

}
header('location:create-art.php');


?>