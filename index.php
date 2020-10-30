<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width-device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
    <link rel="stylesheet" href="estilo/style.css">
    <title>Login</title>
</head>
<body>

  <div class="container">
    <div class="login-container">
      <div class="register">
    <h1>Ingresar al sistema</h1>
    <form action="Seguridad/comprobar_usuario.php" method="post">
    <table><tr>
      <td>
        Usuario</td><td><input type="text"  name="usu" id="usu"></td></tr>
       <tr>
         <td> Contraseña </td><td><input type="password"  name="contra" id="contra"></td></tr>
       <tr><td colspan="2"> 
        <input type="submit" class="submit" name="enviando" value="Ingresar">
  
    </td></tr></table>
    </form>
      </div>
    </div>
  </div>
</body>
</html> 