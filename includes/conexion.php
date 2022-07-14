<?php
//conexion
$server='localhost';
$user='root';
$pass='';
$database='blog_master';
$port='3307';

$db=mysqli_connect($server,$user,$pass,$database,$port);

mysqli_query($db,"SET NAMES 'utf8'");

//iniciar session
if (!isset($_SESSION)) {
    session_start();
}
?>