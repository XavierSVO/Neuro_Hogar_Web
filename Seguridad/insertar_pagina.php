<?php
$server = "localhost";

$user = "root";

$pass = ""; 

$db= "internacionalizate_db";

$conexion = mysqli_connect($server, $user, $pass,$db);

$nombre=$_POST['nombre'];
$url=$_POST['url'];

$sql="INSERT INTO paginas(nombre,enlace,id_menu) VALUES('$nombre','$url',1)";

$resultado=mysqli_query($conexion,$sql);
header("Location: frm_insertar_pagina.php");
?>