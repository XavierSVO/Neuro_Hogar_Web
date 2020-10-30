<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	
	<meta name="viewport" content="width-device-width,initial-scale=1.0">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  	<link rel="stylesheet" href="style.css">

	<title>Menu</title>

</head>

<body>
<!--
<nav class="menuCSS3">

		<ul>

			<li><a href="#">Inicio</a></li>
	
			<li><a href="#">Empleados</a>
	
				<ul>

					<li><a href="#">Juan</a></li>
	
					<li><a href="#">Paco</a></li>
	
					<li><a href="#">Ramón</a></li>
	
					<li><a href="#">María</a></li>

				</ul>

			</li>
	
			<li><a href="#">FAQ</a></li>
	
			<li><a href="#">Contacto</a>
	
				<ul>
	
					<li><a href="#">Email</a></li>
	
					<li><a href="#">Mapa</a></li>
	
				</ul>

			</li>

		</ul>

	</nav>
!-->
</body>

<style>

.menuCSS3 ul {

		display: flex;

		padding: 0;

		margin: 0;

		list-style: none;

	}

	.menuCSS3 a {

		display: block;

		padding: 2em;

		background-color: #F9B53C;

		text-decoration: none;

		color: #191C26;

	}

	.menuCSS3 a:hover {

		background-color: #CC673B;

	}

	.menuCSS3 ul li ul {

		display: none;

	}

	.menuCSS3 ul li a:hover + ul, .menuCSS3 ul li ul:hover {

		display: block;

	}

	.usuario

	{

		color :#fff;

	}

</style>

</html>
				
<?php

include('../clases/class_conexion.php');

$conexion = new Database();

$query_accesos="SELECT menu.menu_id,menu.nombre as nombre_menu,usuario.usuario,usuario.id_rol,roles.id,paginas.nombre,
paginas.enlace,paginas.id_menu,roles_paginas.id_rol,roles_paginas.id_pagina 
FROM usuario,paginas,roles,roles_paginas,menu 
WHERE usuario.usuario like 'zeratul'
AND usuario.id_rol=roles.id
AND menu.menu_id=paginas.id_menu 
and roles_paginas.id_rol=roles.id 
and roles_paginas.id_pagina=paginas.id;";

$resultado_accesos=mysqli_query($conexion->get_con(),$query_accesos);

echo "<div class='menuCSS3'>";	

echo"<nav>";

	echo"<ul>";

	while($valores=mysqli_fetch_array($resultado_accesos))
	{

		echo "<li><a href=".$valores['enlace'].">".$valores["nombre"]."</a></li>";
	}	
	echo "</ul>";

echo"</ul>";

echo"</nav>";

echo "<li><a href='cerrar_session.php'>Cerrar Session</a></li>";

echo"</div>";

?>

