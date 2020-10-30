<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">
    <title>Seleccionar Rol</title>
</head>
<body>
    <div class="container">
    <div class="login-container">
      <div class="register">
    <h1>Seleccionane un Rol:</h1>
</body>
</html>
<?php
include_once("class_conexion.php");

$conexion=new Database("localhost","root","","internacionalizate_db");

$resultado_roles=$conexion->select_all("roles");
while ($valores = mysqli_fetch_array($resultado_roles)) {
    
  echo '<a href=frm_editar_permisos.php?rol="'.$valores['id'].'">'.$valores['nombre'].'</a>';

  echo"<br>";
}
echo '<a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>';
?>
</div>
</div>
</div>