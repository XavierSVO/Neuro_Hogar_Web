<!DOCTYPE html>
<html lang="en">
<head>
   	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">
</head>
<body>
	<script type="text/javascript">
    function pregunta(){
    alert("Modificado Exitosamente");
}
    </script>
</body>
</html>
<div class="container">
		<div class="login-container">
			<div class="register">
<?php

include("class_conexion.php");

$conexion=new Database("localhost","root","","internacionalizate_db");

$resultado_roles = $conexion->select_all("roles");

$resultado_nombre = $conexion->select_all("usuario");

echo "<form action='editar_usuario.php' method='POST'>";

echo "<p>Seleccione el nombre del usuario:</p>";

echo "<select name='nombre' id='nombre'>";

while ($valores = mysqli_fetch_array($resultado_nombre)) {

  echo '<option value="'.$valores['usuario'].'">'.$valores['usuario'].'</option>';

}

echo "</select>";

echo "<br>";

echo "<br>";

echo "<p>Rol:</p>";

echo "<select name='rol' id='rol'>";

while ($valores = mysqli_fetch_array($resultado_roles)) {

  echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';

}

echo "</select>";

echo "<br>"; 

echo "<br>";

echo "<p>Estado:</p>";

echo "<select name='estado' id='estado'>";

  echo '<option value=0>inactivo</option>';
  
  echo '<option value=1>activo</option>';

echo "</select>";

echo "<br>";
echo "<br>";

echo"<input type='submit' class='submit' onclick='pregunta()' name='editar' value='editar'>";
echo '<a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>';
echo "</form>";

?>
</div>
</div>
</div>
