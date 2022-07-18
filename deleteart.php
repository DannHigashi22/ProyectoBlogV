<?php
require_once 'includes/conexion.php';
if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
    $entrada_id=$_GET['id'];
    $usuario_id=$_SESSION['usuario']['id'];
    $sql="delete from entradas where id=$entrada_id AND usuario_id=$usuario_id" ;
    $delete=mysqli_query($db,$sql);
}
header("Location:index.php");

?>