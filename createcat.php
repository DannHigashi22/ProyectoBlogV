<?php

if (isset($_POST)) {
    require_once 'includes/conexion.php';

    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;
    //array con errores
    $errores=array();

    //validacion de datos y escapar strings
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)) {
        $nombreCat_validate=true;
    }else{
        $nombreCat_validate=false;
        $errores['nombre']='La categoria no es valida';
    } 

    if (count($errores)==0) {
        $sql ="INSERT INTO categorias VALUES (null,'$nombre');";
        $save=mysqli_query($db,$sql);

        if ($save) {
         $_SESSION['completado']='La categoria se a registrado con exito con exito';   
        }else{
            $_SESSION['errores']['categoria']='fallo al registrar categoria';
        }
    }else{ 
        $_SESSION['errores']=$errores;
    }

}
header('location:create-category.php');


?>