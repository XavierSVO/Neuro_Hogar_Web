<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
</head>
<body>

</body>
</html>

<?php
	$repetido=" ";

	include_once("conexion.php");

	//$conexion=new Database("localhost","root","","internacionalizate_db");
	
	//capturar datos
	
	$Nombre = $_POST['nombre'];
	$Nombre =strtoupper($Nombre);
	//$db_filed['nombre']=$Nombre;

	//$result_insert_roles=$conexion->insert("roles",$db_filed);

	//$result_select_paginas=$conexion->select_all("paginas");



$nuevo_rol=("SELECT nombre from roles where nombre='$Nombre'");

$rol=mysqli_query($conexion,$nuevo_rol);

if( mysqli_num_rows($rol)>0)   
{
	$repetido="ROL REPETIDO";
	header("Location: frm_insertar_rol.php?repetido=".$repetido);
}else
{
	$repetido="ROL NUEVO";
             
	$query_insert_rol="INSERT INTO roles (nombre) values ('$Nombre')";

	$resultado_insert_rol = $conexion->query("$query_insert_rol");

	header("Location: frm_insertar_rol.php?repetido=".$repetido);
}
	
	


	
	//dar acceso a los roles 
/*
	$query_select_paginas="SELECT * FROM paginas";

	$resultado_select_paginas=$conexion->query("$query_select_paginas");

	$query_last_rol="SELECT MAX(id) AS id FROM roles";



	$resultado_last_rol=$conexion->query("$query_last_rol");

	$row_last_rol = mysqli_fetch_array($resultado_last_rol);

	
	$row_last_rol_id=$row_last_rol['id'];
	
	while ($valores = mysqli_fetch_array($resultado_select_paginas)) {
		$query_insert_rol_pagina="INSERT INTO roles_paginas(id_rol,id_pagina,estado)
		VALUES ($row_last_rol_id,".$valores['id'].",0)";
		echo $query_insert_rol_pagina;
		$resultado_insert_rol_pagina=$conexion->query("$query_insert_rol_pagina"); 
	}
*/
?>