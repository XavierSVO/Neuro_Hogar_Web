<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REGISTRAR USUARIO</title>
</head>

<body>

<?php
	
	include_once("../clases/class_conexion.php");
	
	$conexion=new Database();
	
	//capturar datos
	$username=$_POST['user'];

	$password = $_POST['pass'];

	$rol=$_POST['rol'];

	$db_field['usuario']=$username;
	
	$salt = md5($password);
	
	$password_cifrado= crypt($password, $salt);

	$db_field['contra']=$password_cifrado;

	$db_field['id_rol']=$rol;

	$db_field['estado']=1;
	
	try{
		if($username == null or $password == null){
		echo "Debe llenar todos los campos para poder continuar.";
		}
			else{
			//insertar
			$result = $conexion->insert("usuario",$db_field);
			}
	}
	catch(Exception $e){				
	echo "Línea del error: " . $e->getLine();
	}
	//validacion
	if($result){

	echo "Registrado con exito $username";
	
}
	$conexion->close_db();
	header("Location: frm_insertar_usuario.php");
?>
</body>
</html>