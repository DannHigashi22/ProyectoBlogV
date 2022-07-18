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
function getCategoriaById($conex,$id){
    $sql="SELECT * FROM categorias WHERE id=$id;";
    $query=mysqli_query($conex,$sql);
    if ($query && mysqli_num_rows($query)>=1) {
        $categoria=mysqli_fetch_assoc($query);
    }else {
        $categoria=false;
    }
    return $categoria;
}

function getEntradas($conex,$limi=null,$cat_id=null,$busqueda=null){
    $sql='select e.*,c.nombre as categoria from entradas e 
    inner join categorias c ON c.id=e.categoria_id';
    if (!empty($cat_id)) {
        $sql.=" WHERE e.categoria_id=$cat_id";
    }

    if (!empty($busqueda)) {
        $sql.=" WHERE e.titulo LIKE '%$busqueda%'";
    }
    
    $sql .=" ORDER BY e.id DESC";
    
    if ($limi) {
        $sql.=" LIMIT 4";
    }
    $query=mysqli_query($conex,$sql);
    if ($query && mysqli_num_rows($query)>=1) {
        $entradas=$query;
    }else{
        $entradas=false;
    }
    return $entradas;
}

function getEntradaById($conex,$id){
    $sql="select e.*,c.nombre AS categoria, concat(u.nombre,' ',u.apellidos) AS usuario from entradas e 
    inner join categorias c ON c.id=e.categoria_id 
    inner join usuarios u ON e.usuario_id= u.id
    WHERE e.id=$id";
    $query=mysqli_query($conex,$sql);
    if ($query && mysqli_num_rows($query)>=1) {
        $entrada=mysqli_fetch_assoc($query);
    }else{
        $entrada=false;
    }
    return $entrada;
}

?>