<!doctype html>
<html>
    <head>
        
       
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
    <link rel="stylesheet" href="style.css">
     <title>Registro de nuevo usuario</title>

    <script type="text/javascript">
    function pregunta(){
    alert("registrado Exitosamente");
  }
    </script>
   
    </head>
    <body>
    
      
      <div class="container">
    <div class="login-container">
      <div class="register">
    <h1>REGÍSTRA UN NUEVO USUARIO</h1>

    </body>
    
</html>
<?php
include_once("../clases/class_conexion.php");
$conexion=new Database();
$resultado_roles = $conexion->select_all("roles");
echo"<form action='insertar_usuarios.php' method='post'>";
    echo"<table><tr>";
      echo"<td>";
        echo "Usuario</td><td><input type='text' name='user' id='user'></td></tr>";
       echo "<tr>";
         echo"<td> Contraseña </td><td><input type='password' name='pass' id='pass'></td></tr>";
         echo "<tr><td><select name='rol' id='rol'>";
         while ($valores = mysqli_fetch_array($resultado_roles)) {
     
           echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
         }
     echo "</select></td></tr>";
       echo"<tr><td colspan='2'>"; 
       echo "<input type='submit' onclick='pregunta()'class='submit'name='enviando' value='Ingresar'>";
       echo'<a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>';
    echo"</td></tr></table>";
    echo"</form>"
?>
