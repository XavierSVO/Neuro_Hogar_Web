<?php
include("conexion.php");
$nombre=$_POST['nombre'];
$rol=$_POST['rol'];
$estado=$_POST['estado'];
echo $nombre;
echo $rol;
echo $estado;
$consulta = "update usuario
set id_rol = $rol , estado=$estado
where usuario.usuario LIKE '%$nombre%'";
echo $consulta;
$resultado = mysqli_query($conexion,$consulta);
header("Location: frm_editar_usuario.php");
?>
   