<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';
    if (isset($_SESSION)) {
        session_start();
    }
    
    $nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;
    $apellidos=isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
    $password=isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

    //array con errores
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
        $errores['apellidos']='Los apellidos no son valido';
    }
    
    if (!empty($email) && FILTER_VAR($email, FILTER_VALIDATE_EMAIL)) {
        $email_validate=true;
    }else{
        $email_validate=false;
        $errores['email']='El email no es valido';
    }

    if (!empty($password)) {
        $pass_validate=true;
    }else{
        $pass_validate=false;
        $errores['password']='La contraseña esta vacia';
    }

    $save_user=false;
    //registrar en base de datos
    if (count($errores)==0) {
        $save_user=true;
        //cifrar la contraseña
        $passC=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);

        //ingreso de usuario en base de datos
        $sql ="INSERT INTO usuarios VALUES (null,'$nombre','$apellidos','$email','$passC',curdate());";
        $save=mysqli_query($db,$sql);

        if ($save) {
         $_SESSION['completado']='Se a registrado con exito';   
        }else{
            $_SESSION['errores']['general']='fallo al registrar usuario';
        }
    }else{ 
        $_SESSION['errores']=$errores;
    }
}

header('location:index.php');




?>