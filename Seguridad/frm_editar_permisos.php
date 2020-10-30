<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">
    <title>Editar permisos</title>

      <script type="text/javascript">
    function pregunta(){
    alert("Modificado Exitosamente");}
    </script>

</head>
<body>
 <div class="container1">
    <div class="login-container">
      <div class="register">
    <h1>Modificar Permisos</h1>

</body>
</html>
<?php

include_once("class_conexion.php");

$conexion=new Database("localhost","root","","internacionalizate_db");

$resultado_roles=$conexion->select_all("roles");

$rol=$_GET['rol'];

$resultado_paginas=$conexion->select_all("paginas");


$numero_paginas=$conexion->count_table("paginas");

$result_row_count=mysqli_fetch_array($numero_paginas);

$row_count=$result_row_count['COUNT(*)']; 
session_start();

$array_pag=array();

echo "<form action='editar_permisos.php?npag=".strval($row_count)."' method='POST'>";

    while ($valores = mysqli_fetch_array($resultado_paginas)) {
    
        echo "<input type='checkbox' id='".$valores['id']."' name='".$valores['id']."' value='".$valores['nombre']."'>";

        array_push($array_pag,$valores['id']);

        echo"<label for='".$valores['id']."'>".$valores['nombre']."</label>";
        
    }
$_SESSION['array_pag']=$array_pag;
$_SESSION['rol']=$rol;
echo "<br>";
echo "<br>";
echo"<input type='submit' class='submit' onclick='pregunta()' value='Editar Permisos''>";
echo'<a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>';

echo "</form>";

?>
</div>
</div>
</div>