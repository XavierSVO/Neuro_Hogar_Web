<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

  	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">

  <title>Insertar rol</title>
  
  <script type="text/javascript">

function getParameterByName(name) {
   
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
   
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
   
    results = regex.exec(location.search);
   
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var texto=getParameterByName('repetido');
function pregunta(){
  if(texto==="")
  {
    texto="Intente de nuevo";
  }
  else
  {
    alert(texto);
  }
}
    </script>
</head>
<body>
	 <div class="container">
    <div class="login-container">
      <div class="register">
      	<h1>Insertar un Rol:</h1>
      	<br>
<form  action="InsertarRoles.php" method="post" onclick="pregunta()">
 
 <input name="nombre"  type="text" placeholder="Nombre" />

  <input type="submit" value="Ingresar Rol"  class="submit"  >

  <a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>
</form>
</body>
</html>
<?php
include_once("prohibir_forzar_entrada.php");
?>

