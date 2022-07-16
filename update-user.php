<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';
    
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;
    $apellidos=isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    
    $errores=array();

    //validacion de datos y escapar strings
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)) {
        $nombre_validate=true;
    }else{
        $nombre_validate=false;
        $errores['nombre']='El nombre no es valido';
    } 
    
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)) {
        $apellidos_validate=true;
    }else{
        $apellidos_validate=false;
        $errores['apellidos']='Los apellidos no son validos';
    }
    
    if (!empty($email) && FILTER_VAR($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate=true;
    }else{
        $email_validate=false;
        $errores['email']='El email no es valido';
    }

    $save_user=false;
    if (count($errores)==0) {
        $save_user=true;
        $usuario=$_SESSION['usuario'];
        //comprobar si email ya existe
        $sql="select id,email from usuarios where email='$email';";
        $isset_email=mysqli_query($db,$sql);
        $isset_user=mysqli_fetch_assoc($isset_email);

        if ($isset_user['id']==$usuario['id'] || empty($isset_user)) {
            //actualizar usuario en base de datos
            $sql ="UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos', email='$email' where id=".$usuario['id'].";";
            $save=mysqli_query($db,$sql);

            if ($save) {
                $_SESSION['usuario']['nombre']=$nombre;
                $_SESSION['usuario']['apellidos']=$apellidos;
                $_SESSION['usuario']['email']=$email
                ;
                $_SESSION['completado']='Se a actualizado sus datos con exito';   
            }else{
                $_SESSION['errores']['update']='Fallo al actualizar sus datos';
            }
        }else{
            $errores['email']='El email ya existe';
            $_SESSION['errores']=$errores;
        }

    }else{ 
        $_SESSION['errores']=$errores;
    }
}

header('location:my-profile.php');


?>