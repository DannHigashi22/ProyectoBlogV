<?php
require_once 'includes/conexion.php';

if(isset($_POST)){
    $email=trim($_POST['email']); 
    $pass=$_POST['password'];

    $sql= "select * from usuarios where email='$email' LIMIT 1;";
    $login=mysqli_query($db,$sql);
    if ($login && mysqli_num_rows($login)==1) {
        $usuario=mysqli_fetch_assoc($login);
        
        //comprobar contraseña
        $verify=password_verify($pass,$usuario['password']);
        if ($verify) {
            $_SESSION['usuario']=$usuario;
            if (isset($_SESSION['error-login'])) {
                $_SESSION['error-login']=null;
            }
        }else{
            $_SESSION['error-login']='Contraseña incorrecta';
        }
    }else{
        $_SESSION['error-login']='Email Incorrecto';
    }

}
header("Location:index.php");






?>