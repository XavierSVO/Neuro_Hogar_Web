<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
	<meta name="viewport" content="width-device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">
    <title>Insertar una pagina</title>
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
				<h2>Registro de Paginas</h2>
    <form action="insertar_pagina.php" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="url" id="url" placeholder="Url">
        <input type="submit"class="submit" onclick="pregunta()"  value="Registrar Pagina">
        <a href="frmmenu_administrador.php"><input type="button" class="vol"   name="volver " value="volver al menu"></a>
    </form>
</div>
</div>
</div>
</body>
</html>
<?php

?>
