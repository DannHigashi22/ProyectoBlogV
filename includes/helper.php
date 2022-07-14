<?php
/*Funciones a usar */

function mostrarError($errores,$campo){
    $alerta='';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta="<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores']= null;
    }
    if (isset($_SESSION['completado'])) {
        $_SESSION['completado']=null;
    }
    if (isset($_SESSION['error-login'])) {
        $_SESSION['error-login']=null;
    }
}

function getCategorias($conex){
    $sql="SELECT * FROM categorias ORDER BY id ASC;";
    $query=mysqli_query($conex,$sql);
    if ($query && mysqli_num_rows($query)>=1) {
        $categorias=$query;
    }else{
        $categorias= false;
    }
    return $categorias;
}



?>